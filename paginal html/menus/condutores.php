<?php
/**
 * CONTROLADOR DE CONDUTORES
 * =========================
 * Segue o mesmo padrão do módulo de clientes e das classes antigas.
 */

require_once __DIR__ . '/smarty/config.ini.php';
require_once __DIR__ . '/classes/Autoload.class.php';

$pdo = MySQL_PDO::conexao();
$session = new Sessions();
$opc = new Opcoes();
$acondutores = new acesso_condutores();

$acao = isset($_GET['acao']) ? trim($_GET['acao']) : 'listar';
$valor = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (empty($_SESSION['csrf_condutores'])) {
    $_SESSION['csrf_condutores'] = bin2hex(random_bytes(32));
}

function condutoresTextoPost($campo)
{
    return isset($_POST[$campo]) ? trim((string)$_POST[$campo]) : '';
}

function condutoresValidaCsrf()
{
    $token = isset($_POST['csrf_token']) ? (string)$_POST['csrf_token'] : '';

    if (!hash_equals($_SESSION['csrf_condutores'], $token)) {
        http_response_code(403);
        exit('A sessão do formulário expirou. Atualize a página e tente novamente.');
    }
}

function condutoresRedireciona($tipo, $texto)
{
    $_SESSION['condutores_mensagem'] = array(
        'tipo' => $tipo,
        'texto' => $texto,
    );
    header('Location: condutores.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    condutoresValidaCsrf();
    $operacao = condutoresTextoPost('operacao');

    if ($operacao === 'salvar') {
        $id = (int)condutoresTextoPost('con_id');
        $senha = condutoresTextoPost('con_senha');
        $confirmacao_senha = condutoresTextoPost('con_senha_confirmacao');
        $condutor = new Condutores();

        $condutor->setId($id);
        $condutor->setNome(condutoresTextoPost('con_nome'));
        $condutor->setTelefone(condutoresTextoPost('con_telefone'));
        $condutor->setEmail(strtolower(condutoresTextoPost('con_email')));
        $condutor->setPlaca(strtoupper(condutoresTextoPost('con_placa')));
        $condutor->setSenha($senha);

        $erros = array();

        if ($condutor->getNome() === '') {
            $erros[] = 'Informe o nome do condutor.';
        }
        if ($condutor->getTelefone() === '') {
            $erros[] = 'Informe o telefone.';
        }
        if (!filter_var($condutor->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $erros[] = 'Informe um e-mail válido.';
        }
        if ($condutor->getPlaca() === '') {
            $erros[] = 'Informe a placa do veículo.';
        }
        if ($id === 0 && $senha === '') {
            $erros[] = 'Informe uma senha para acesso ao aplicativo.';
        }
        if ($id === 0 && $senha !== $confirmacao_senha) {
            $erros[] = 'A confirmação da senha não corresponde.';
        }
        if ($acondutores->verificaEmail($pdo, $condutor->getEmail(), $id)) {
            $erros[] = 'Já existe um condutor usando este e-mail.';
        }

        if (empty($erros)) {
            if ($id > 0) {
                $atual = $acondutores->retornaDados($pdo, 'id', $id);

                if (!$atual || $atual->getStatusCadastro() === 'e') {
                    condutoresRedireciona('erro', 'Condutor não encontrado.');
                }

                if ($acondutores->atualizaDados($pdo, $condutor)) {
                    condutoresRedireciona('sucesso', 'Condutor alterado com sucesso.');
                }
            } else {
                if ($acondutores->cadastraDados($pdo, $condutor)) {
                    condutoresRedireciona('sucesso', 'Condutor cadastrado com sucesso.');
                }

                $erros[] = 'Não foi possível cadastrar o condutor.';
            }
        }

        $smarty->assign('erros', $erros);
        $smarty->assign('condutor_formulario', array(
            'id' => $id,
            'nome' => $condutor->getNome(),
            'telefone' => $condutor->getTelefone(),
            'email' => $condutor->getEmail(),
            'placa' => $condutor->getPlaca(),
            'status' => isset($atual) && is_object($atual) ? $atual->getStatusCadastro() : 'a',
        ));
        // Marca que o formulário já recebeu os valores enviados pelo usuário.
        $condutor_formulario = true;
        $acao = $id > 0 ? 'editar' : 'cadastrar';
    }

    if ($operacao === 'status') {
        $id = (int)condutoresTextoPost('con_id');
        $novo_status = condutoresTextoPost('novo_status');
        $resultado = $acondutores->alteraStatus($pdo, $id, $novo_status);

        condutoresRedireciona(
            $resultado ? 'sucesso' : 'erro',
            $resultado
                ? ($novo_status === 'a' ? 'Condutor ativado com sucesso.' : 'Condutor desativado com sucesso.')
                : 'Não foi possível alterar o status do condutor.'
        );
    }

    if ($operacao === 'excluir') {
        $resultado = $acondutores->Deletar($pdo, (int)condutoresTextoPost('con_id'));

        condutoresRedireciona(
            $resultado ? 'sucesso' : 'erro',
            $resultado ? 'Condutor excluído com sucesso.' : 'Não foi possível excluir o condutor.'
        );
    }
}

$titulo_pagina = 'Condutores';
$conteudo_template = 'condutores/lista.tpl';
$pagina_script = 'assets/js/pages/condutores.js';
$menu_ativo = 'condutores';
$nome_usuario = $session->getValor('USUARIO_SESSAO') ?: 'Administrador';

if ($acao === 'cadastrar' || $acao === 'editar') {
    $titulo_pagina = $acao === 'editar' ? 'Editar condutor' : 'Cadastrar condutor';
    $conteudo_template = 'condutores/formulario.tpl';

    if ($acao === 'editar' && !isset($condutor_formulario)) {
        $condutor = $acondutores->retornaDados($pdo, 'id', $valor);

        if (!$condutor || $condutor->getStatusCadastro() === 'e') {
            condutoresRedireciona('erro', 'Condutor não encontrado.');
        }

        $smarty->assign('condutor_formulario', array(
            'id' => $condutor->getId(),
            'nome' => $condutor->getNome(),
            'telefone' => $condutor->getTelefone(),
            'email' => $condutor->getEmail(),
            'placa' => $condutor->getPlaca(),
            'status' => $condutor->getStatusCadastro(),
        ));
        // Evita que os dados carregados do banco sejam sobrescritos pelos padrões vazios.
        $condutor_formulario = true;
    }

    if (!isset($condutor_formulario)) {
        $smarty->assign('condutor_formulario', array(
            'id' => 0,
            'nome' => '',
            'telefone' => '',
            'email' => '',
            'placa' => '',
            'status' => 'a',
        ));
    }

    $smarty->assign('modo_edicao', $acao === 'editar');
} else {
    $lista_condutores = $acondutores->listarDados($pdo, 'todos');
    $array_condutores = array();

    foreach ($lista_condutores as $condutor) {
        $array_condutores[] = array(
            'id' => $condutor->getId(),
            'id_formatado' => str_pad($condutor->getId(), 6, '0', STR_PAD_LEFT),
            'nome' => $condutor->getNome(),
            'telefone' => $condutor->getTelefone(),
            'telefone_formatado' => preg_replace('/^(\d{2})(\d{4,5})(\d{4})$/', '($1) $2-$3', preg_replace('/\D/', '', $condutor->getTelefone())),
            'whatsapp' => preg_replace('/\D/', '', $condutor->getTelefone()),
            'email' => $condutor->getEmail(),
            'placa' => $condutor->getPlaca(),
            'status' => $condutor->getStatusCadastro(),
            'status_texto' => $condutor->getStatusCadastro() === 'a' ? 'Ativo' : 'Inativo',
            'app_status' => $condutor->getStatusApp(),
            'app_status_texto' => $condutor->getStatusApp() === 'a' ? 'Online' : 'Offline',
            'dt_cadastro' => $opc->inverteDateTime($condutor->getDtCadastro()),
        );
    }

    $smarty->assign('array_condutores', $array_condutores);
    $smarty->assign('qte_registros', count($array_condutores));
}

if (isset($_SESSION['condutores_mensagem'])) {
    $smarty->assign('mensagem', $_SESSION['condutores_mensagem']);
    unset($_SESSION['condutores_mensagem']);
}

$smarty->assign('csrf_token', $_SESSION['csrf_condutores']);
$smarty->assign('acao_condutores', $acao);

require __DIR__ . '/MODELO.php';
