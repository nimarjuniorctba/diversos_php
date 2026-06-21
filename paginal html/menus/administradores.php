<?php

require_once __DIR__ . '/smarty/config.ini.php';
require_once __DIR__ . '/classes/Autoload.class.php';

$pdo = MySQL_PDO::conexao();
$session = new Sessions();
$opc = new Opcoes();
$acesso = new acesso_administradores();
$acao = $_GET['acao'] ?? 'listar';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (empty($_SESSION['csrf_administradores'])) {
    $_SESSION['csrf_administradores'] = bin2hex(random_bytes(32));
}

function admPost($campo) { return trim((string)($_POST[$campo] ?? '')); }
function admRedirect($tipo, $texto) {
    $_SESSION['administradores_mensagem'] = compact('tipo', 'texto');
    header('Location: administradores.php'); exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_administradores'], (string)($_POST['csrf_token'] ?? ''))) {
        http_response_code(403); exit('Sessão expirada.');
    }
    $operacao = admPost('operacao');
    $registroId = (int)admPost('registro_id');

    if ($operacao === 'salvar') {
        $obj = new Administradores();
        $obj->setId($registroId);
        $obj->setNome(admPost('registro_nome'));
        $obj->setEmail(strtolower(admPost('registro_email')));
        $obj->setSenha($registroId === 0 ? admPost('registro_senha') : '');
        $confirmacao = admPost('registro_senha_confirmacao');
        $erros = array();
        if ($obj->getNome() === '') $erros[] = 'Informe o nome.';
        if (!filter_var($obj->getEmail(), FILTER_VALIDATE_EMAIL)) $erros[] = 'Informe um e-mail válido.';
        if ($registroId === 0 && $obj->getSenha() === '') $erros[] = 'Informe a senha.';
        if ($registroId === 0 && $obj->getSenha() !== $confirmacao) $erros[] = 'As senhas não correspondem.';
        if ($acesso->verificaEmailEdicao($pdo, $obj->getEmail(), $registroId)) $erros[] = 'Este e-mail já está em uso.';

        if (!$erros) {
            $ok = $registroId > 0 ? $acesso->atualizaDados($pdo, $obj) : $acesso->cadastraDados($pdo, $obj);
            if ($ok) admRedirect('sucesso', $registroId > 0 ? 'Administrador alterado com sucesso.' : 'Administrador cadastrado com sucesso.');
            $erros[] = 'Não foi possível salvar o administrador.';
        }
        $smarty->assign('erros', $erros);
        $smarty->assign('registro_formulario', array('id'=>$registroId,'nome'=>$obj->getNome(),'email'=>$obj->getEmail(),'empresa'=>0));
        $registro_formulario = true;
        $acao = $registroId > 0 ? 'editar' : 'cadastrar';
    } elseif ($operacao === 'status') {
        $ok = $acesso->alteraStatus($pdo, $registroId, admPost('novo_status'));
        admRedirect($ok?'sucesso':'erro', $ok?'Status alterado com sucesso.':'Não foi possível alterar o status.');
    } elseif ($operacao === 'excluir') {
        $ok = $acesso->Deletar($pdo, $registroId);
        admRedirect($ok?'sucesso':'erro', $ok?'Administrador excluído com sucesso.':'Não foi possível excluir.');
    }
}

$titulo_pagina = 'Administradores';
$conteudo_template = 'usuarios_sistema/lista.tpl';
$pagina_script = 'assets/js/pages/usuarios_sistema.js';
$menu_ativo = 'administradores';

if (in_array($acao, array('cadastrar','editar'), true)) {
    $conteudo_template = 'usuarios_sistema/formulario.tpl';
    $titulo_pagina = $acao === 'editar' ? 'Editar administrador' : 'Cadastrar administrador';
    if ($acao === 'editar' && !isset($registro_formulario)) {
        $obj = $acesso->retornaDados($pdo, 'id', $id);
        if (!$obj || $obj->getStatus() === 'e') admRedirect('erro', 'Administrador não encontrado.');
        $smarty->assign('registro_formulario', array('id'=>$obj->getId(),'nome'=>$obj->getNome(),'email'=>$obj->getEmail(),'empresa'=>0));
        $registro_formulario = true;
    }
    if (!isset($registro_formulario)) $smarty->assign('registro_formulario', array('id'=>0,'nome'=>'','email'=>'','empresa'=>0));
    $smarty->assign('modo_edicao', $acao === 'editar');
} else {
    $registros = array();
    foreach ($acesso->listarDados($pdo, 'todos') as $obj) {
        $registros[] = array('id'=>$obj->getId(),'id_formatado'=>str_pad($obj->getId(),6,'0',STR_PAD_LEFT),
            'nome'=>$obj->getNome(),'email'=>$obj->getEmail(),'empresa_nome'=>'',
            'dt_cadastro'=>$opc->inverteDateTime($obj->getDtCadastro()),'status'=>$obj->getStatus(),
            'status_texto'=>$obj->getStatus()==='a'?'Ativo':'Inativo');
    }
    $smarty->assign(array('registros'=>$registros,'qte_registros'=>count($registros)));
}

if (isset($_SESSION['administradores_mensagem'])) {
    $smarty->assign('mensagem', $_SESSION['administradores_mensagem']); unset($_SESSION['administradores_mensagem']);
}
$smarty->assign(array('csrf_token'=>$_SESSION['csrf_administradores'],'modulo_titulo'=>'Administradores',
    'modulo_url'=>'administradores.php','modulo_descricao'=>'Usuários com acesso administrativo ao sistema.',
    'mostrar_empresa'=>false,'modulo_tipo_senha'=>'administrador'));
require __DIR__ . '/MODELO.php';
