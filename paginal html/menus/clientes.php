<?php
/**
 * CONTROLADOR DE CLIENTES
 * =======================
 * Mantém o padrão do projeto antigo:
 * - instancia as classes de acesso;
 * - recebe a ação;
 * - prepara dados para o Smarty;
 * - escolhe o template da listagem ou do formulário.
 */

require_once __DIR__ . '/smarty/config.ini.php';
require_once __DIR__ . '/classes/Autoload.class.php';

$pdo = MySQL_PDO::conexao();
$session = new Sessions();
$opc = new Opcoes();
$aclientes = new acesso_clientes();

$acao = isset($_GET['acao']) ? trim($_GET['acao']) : 'listar';
$valor = isset($_GET['id']) ? (int)$_GET['id'] : 0;

/**
 * Enquanto a autenticação desta nova base não estiver integrada, usamos o
 * primeiro administrador ativo apenas como contexto de desenvolvimento.
 * Quando o login for ligado, os valores da sessão terão prioridade.
 */
$admin_id = (int)$session->getValor('adm_id');
$empresa_id = (int)$session->getValor('adm_emp_id');

if ($admin_id <= 0 || $empresa_id <= 0) {
    $sql_contexto = "SELECT ema_id, emp_id_fk, ema_nome
                       FROM mod_empresa_admin
                      WHERE ema_status='a'
                   ORDER BY ema_id
                      LIMIT 1";
    $contexto = $pdo->query($sql_contexto)->fetch(PDO::FETCH_ASSOC);

    if ($contexto) {
        $admin_id = (int)$contexto['ema_id'];
        $empresa_id = (int)$contexto['emp_id_fk'];
        $session->setValor('adm_id', $admin_id);
        $session->setValor('adm_emp_id', $empresa_id);
        $session->setValor('USUARIO_SESSAO', $contexto['ema_nome']);
    }
}

if ($admin_id <= 0 || $empresa_id <= 0) {
    http_response_code(500);
    exit('Cadastre uma empresa e um administrador ativo antes de usar o módulo de clientes.');
}

if (empty($_SESSION['csrf_clientes'])) {
    $_SESSION['csrf_clientes'] = bin2hex(random_bytes(32));
}

function clientesTextoPost($campo)
{
    return isset($_POST[$campo]) ? trim((string)$_POST[$campo]) : '';
}

function clientesRedireciona($tipo, $texto)
{
    $_SESSION['clientes_mensagem'] = array(
        'tipo' => $tipo,
        'texto' => $texto,
    );
    header('Location: clientes.php');
    exit;
}

function clientesValidaCsrf()
{
    $token = isset($_POST['csrf_token']) ? (string)$_POST['csrf_token'] : '';

    if (!hash_equals($_SESSION['csrf_clientes'], $token)) {
        http_response_code(403);
        exit('A sessão do formulário expirou. Atualize a página e tente novamente.');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    clientesValidaCsrf();
    $operacao = clientesTextoPost('operacao');

    if ($operacao === 'salvar') {
        $id = (int)clientesTextoPost('cli_id');
        $tipo_cadastro = clientesTextoPost('cli_tipo_cad') === 'j' ? 'j' : 'f';
        $cliente = new Clientes();

        $cliente->setId($id);
        $cliente->setTipoCadastro($tipo_cadastro);
        $cliente->setPfNome($tipo_cadastro === 'f' ? clientesTextoPost('cli_pf_nome') : '');
        $cliente->setPfCpf($tipo_cadastro === 'f' ? clientesTextoPost('cli_pf_cpf') : '');
        $cliente->setPfDtNascimento($tipo_cadastro === 'f' ? clientesTextoPost('cli_pf_dt_nascimento') : '');
        $cliente->setPjCnpj($tipo_cadastro === 'j' ? clientesTextoPost('cli_pj_cnpj') : '');
        $cliente->setPjFantasia($tipo_cadastro === 'j' ? clientesTextoPost('cli_pj_fantasia') : '');
        $cliente->setPjRazao($tipo_cadastro === 'j' ? clientesTextoPost('cli_pj_razao') : '');
        $cliente->setPjIe($tipo_cadastro === 'j' ? clientesTextoPost('cli_pj_ie') : '');
        $cliente->setPjIeIsento(
            $tipo_cadastro === 'j' && isset($_POST['cli_pj_ie_isento']) ? 's' : 'n'
        );
        $cliente->setResponsavel($tipo_cadastro === 'j' ? clientesTextoPost('cli_pj_responsavel') : '');
        $cliente->setTelefone(clientesTextoPost('cli_telefone'));
        $cliente->setCelular(clientesTextoPost('cli_celular'));
        $cliente->setFacebook(clientesTextoPost('cli_facebook'));
        $cliente->setInstagram(clientesTextoPost('cli_instagram'));
        $cliente->setEmail(clientesTextoPost('cli_email'));
        $cliente->setAdmin($admin_id);
        $cliente->setEmpresa($empresa_id);

        $erros = array();

        if ($tipo_cadastro === 'f') {
            if ($cliente->getPfNome() === '') {
                $erros[] = 'Informe o nome da pessoa física.';
            }
            if ($cliente->getPfCpf() === '') {
                $erros[] = 'Informe o CPF.';
            }
        } else {
            if ($cliente->getPjRazao() === '') {
                $erros[] = 'Informe a razão social.';
            }
            if ($cliente->getPjCnpj() === '') {
                $erros[] = 'Informe o CNPJ.';
            }
        }

        if ($id === 0 && $cliente->getEmail() === '') {
            $erros[] = 'Informe o e-mail.';
        }

        if ($cliente->getEmail() !== '' && !filter_var($cliente->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $erros[] = 'Informe um e-mail válido.';
        }

        if (empty($erros)) {
            if ($id > 0) {
                $cliente_atual = $aclientes->retornaDadosEmpresa($pdo, $id, $empresa_id);

                if (!$cliente_atual || $cliente_atual->getStatus() === 'e') {
                    clientesRedireciona('erro', 'Cliente não encontrado.');
                }

                $resultado = $aclientes->atualizaDados($pdo, $cliente);

                if ($resultado) {
                    clientesRedireciona('sucesso', 'Cliente alterado com sucesso.');
                }
            } else {
                $resultado = $aclientes->cadastraDados($pdo, $cliente);

                if ($resultado) {
                    clientesRedireciona('sucesso', 'Cliente cadastrado com sucesso.');
                }

                $erros[] = 'Não foi possível cadastrar. Verifique se o CPF ou CNPJ já está em uso.';
            }
        }

        $smarty->assign('erros', $erros);
        $smarty->assign('cliente_formulario', array(
            'id' => $id,
            'tipo_cadastro' => $cliente->getTipoCadastro(),
            'pf_nome' => $cliente->getPfNome(),
            'pf_cpf' => $cliente->getPfCpf(),
            'pf_dt_nascimento' => $cliente->getPfDtNascimento(),
            'pj_cnpj' => $cliente->getPjCnpj(),
            'pj_fantasia' => $cliente->getPjFantasia(),
            'pj_razao' => $cliente->getPjRazao(),
            'pj_ie' => $cliente->getPjIe(),
            'pj_ie_isento' => $cliente->getPjIeIsento(),
            'pj_responsavel' => $cliente->getResponsavel(),
            'telefone' => $cliente->getTelefone(),
            'celular' => $cliente->getCelular(),
            'facebook' => $cliente->getFacebook(),
            'instagram' => $cliente->getInstagram(),
            'email' => $cliente->getEmail(),
        ));
        // Marca que o formulário já recebeu os valores enviados pelo usuário.
        $cliente_formulario = true;
        $acao = $id > 0 ? 'editar' : 'cadastrar';
    }

    if ($operacao === 'status') {
        $id = (int)clientesTextoPost('cli_id');
        $novo_status = clientesTextoPost('novo_status');
        $resultado = $aclientes->alteraStatus($pdo, $id, $empresa_id, $novo_status);

        clientesRedireciona(
            $resultado ? 'sucesso' : 'erro',
            $resultado
                ? ($novo_status === 'a' ? 'Cliente ativado com sucesso.' : 'Cliente desativado com sucesso.')
                : 'Não foi possível alterar o status do cliente.'
        );
    }

    if ($operacao === 'excluir') {
        $id = (int)clientesTextoPost('cli_id');
        $resultado = $aclientes->deletarPorEmpresa($pdo, $id, $empresa_id);

        clientesRedireciona(
            $resultado ? 'sucesso' : 'erro',
            $resultado ? 'Cliente excluído com sucesso.' : 'Não foi possível excluir o cliente.'
        );
    }
}

$titulo_pagina = 'Clientes';
$conteudo_template = 'clientes/lista.tpl';
$pagina_script = 'assets/js/pages/clientes.js';
$menu_ativo = 'clientes';
$nome_usuario = $session->getValor('USUARIO_SESSAO') ?: 'Administrador';

if ($acao === 'cadastrar' || $acao === 'editar') {
    $titulo_pagina = $acao === 'editar' ? 'Editar cliente' : 'Cadastrar cliente';
    $conteudo_template = 'clientes/formulario.tpl';

    if ($acao === 'editar' && !isset($cliente_formulario)) {
        $cliente = $aclientes->retornaDadosEmpresa($pdo, $valor, $empresa_id);

        if (!$cliente || $cliente->getStatus() === 'e') {
            clientesRedireciona('erro', 'Cliente não encontrado.');
        }

        $smarty->assign('cliente_formulario', array(
            'id' => $cliente->getId(),
            'tipo_cadastro' => $cliente->getTipoCadastro(),
            'pf_nome' => $cliente->getPfNome(),
            'pf_cpf' => $cliente->getPfCpf(),
            'pf_dt_nascimento' => $cliente->getPfDtNascimento(),
            'pj_cnpj' => $cliente->getPjCnpj(),
            'pj_fantasia' => $cliente->getPjFantasia(),
            'pj_razao' => $cliente->getPjRazao(),
            'pj_ie' => $cliente->getPjIe(),
            'pj_ie_isento' => $cliente->getPjIeIsento(),
            'pj_responsavel' => $cliente->getResponsavel(),
            'telefone' => $cliente->getTelefone(),
            'celular' => $cliente->getCelular(),
            'facebook' => $cliente->getFacebook(),
            'instagram' => $cliente->getInstagram(),
            'email' => $cliente->getEmail(),
        ));
        // Evita que os dados carregados do banco sejam sobrescritos pelos padrões vazios.
        $cliente_formulario = true;
    }

    if (!isset($cliente_formulario)) {
        $smarty->assign('cliente_formulario', array(
            'id' => 0,
            'tipo_cadastro' => 'f',
            'pf_nome' => '',
            'pf_cpf' => '',
            'pf_dt_nascimento' => '',
            'pj_cnpj' => '',
            'pj_fantasia' => '',
            'pj_razao' => '',
            'pj_ie' => '',
            'pj_ie_isento' => 'n',
            'pj_responsavel' => '',
            'telefone' => '',
            'celular' => '',
            'facebook' => '',
            'instagram' => '',
            'email' => '',
        ));
    }

    $smarty->assign('modo_edicao', $acao === 'editar');
} else {
    $lista_clientes = $aclientes->listarDados($pdo, 'empresa', $empresa_id);
    $array_clientes = array();

    foreach ($lista_clientes as $cliente) {
        $array_clientes[] = array(
            'id' => $cliente->getId(),
            'id_formatado' => str_pad($cliente->getId(), 6, '0', STR_PAD_LEFT),
            'tipo' => $cliente->getTipoCadastro() === 'j' ? 'Pessoa jurídica' : 'Pessoa física',
            'tipo_sigla' => $cliente->getTipoCadastro() === 'j' ? 'PJ' : 'PF',
            'nome' => $cliente->getTipoCadastro() === 'j'
                ? ($cliente->getPjRazao() ?: $cliente->getPjFantasia())
                : $cliente->getPfNome(),
            'celular' => $cliente->getCelular(),
            'email' => $cliente->getEmail(),
            'dt_cadastro' => $opc->inverteDateTime($cliente->getDtCadastro()),
            'status' => $cliente->getStatus(),
            'status_texto' => $cliente->getStatus() === 'a' ? 'Ativo' : 'Inativo',
        );
    }

    $smarty->assign('array_clientes', $array_clientes);
    $smarty->assign('qte_registros', count($array_clientes));
}

if (isset($_SESSION['clientes_mensagem'])) {
    $smarty->assign('mensagem', $_SESSION['clientes_mensagem']);
    unset($_SESSION['clientes_mensagem']);
}

$smarty->assign('csrf_token', $_SESSION['csrf_clientes']);
$smarty->assign('acao_clientes', $acao);

require __DIR__ . '/MODELO.php';
