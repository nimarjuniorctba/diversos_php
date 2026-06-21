<?php

require_once __DIR__ . '/smarty/config.ini.php';
require_once __DIR__ . '/classes/Autoload.class.php';
$pdo=MySQL_PDO::conexao(); $session=new Sessions(); $opc=new Opcoes();
$acesso=new acesso_empresa_admin(); $aempresas=new acesso_empresas();
$acao=$_GET['acao']??'listar'; $id=isset($_GET['id'])?(int)$_GET['id']:0;
if(empty($_SESSION['csrf_empresa_admin'])) $_SESSION['csrf_empresa_admin']=bin2hex(random_bytes(32));
function emaPost($c){return trim((string)($_POST[$c]??''));}
function emaRedirect($t,$x){$_SESSION['empresa_admin_mensagem']=array('tipo'=>$t,'texto'=>$x);header('Location: empresa_admin.php');exit;}

if($_SERVER['REQUEST_METHOD']==='POST'){
    if(!hash_equals($_SESSION['csrf_empresa_admin'],(string)($_POST['csrf_token']??''))){http_response_code(403);exit('Sessão expirada.');}
    $op=emaPost('operacao'); $rid=(int)emaPost('registro_id');
    if($op==='salvar'){
        $obj=new Empresa_admin(); $obj->setId($rid); $obj->setNome(emaPost('registro_nome'));
        $obj->setEmail(strtolower(emaPost('registro_email'))); $obj->setEmpresa((int)emaPost('registro_empresa'));
        $obj->setSenha($rid===0?emaPost('registro_senha'):''); $conf=emaPost('registro_senha_confirmacao'); $erros=array();
        if($obj->getNome()==='')$erros[]='Informe o nome.';
        if(!filter_var($obj->getEmail(),FILTER_VALIDATE_EMAIL))$erros[]='Informe um e-mail válido.';
        if($obj->getEmpresa()<=0)$erros[]='Selecione a empresa.';
        if($rid===0&&$obj->getSenha()==='')$erros[]='Informe a senha.';
        if($rid===0&&$obj->getSenha()!==$conf)$erros[]='As senhas não correspondem.';
        if($acesso->verificaEmailEdicao($pdo,$obj->getEmail(),$rid))$erros[]='Este e-mail já está em uso.';
        if(!$erros){$ok=$rid>0?$acesso->atualizaDados($pdo,$obj):$acesso->cadastraDados($pdo,$obj);
            if($ok)emaRedirect('sucesso',$rid>0?'Usuário alterado com sucesso.':'Usuário cadastrado com sucesso.');
            $erros[]='Não foi possível salvar o usuário.';}
        $smarty->assign('erros',$erros);$smarty->assign('registro_formulario',array('id'=>$rid,'nome'=>$obj->getNome(),'email'=>$obj->getEmail(),'empresa'=>$obj->getEmpresa()));
        $registro_formulario=true;$acao=$rid>0?'editar':'cadastrar';
    }elseif($op==='status'){$ok=$acesso->alteraStatus($pdo,$rid,emaPost('novo_status'));emaRedirect($ok?'sucesso':'erro',$ok?'Status alterado com sucesso.':'Não foi possível alterar o status.');
    }elseif($op==='excluir'){$ok=$acesso->Deletar($pdo,$rid);emaRedirect($ok?'sucesso':'erro',$ok?'Usuário excluído com sucesso.':'Não foi possível excluir.');}
}

$empresas=array();foreach($aempresas->listarDados($pdo,'todos') as $e){$empresas[]=array('id'=>$e->getId(),'nome'=>$e->getTipoCadastro()==='j'?($e->getPjFantansia()?:$e->getPjRazao()):$e->getPfNome());}
$smarty->assign('empresas_opcoes',$empresas);
$titulo_pagina='Usuários das empresas';$conteudo_template='usuarios_sistema/lista.tpl';$pagina_script='assets/js/pages/usuarios_sistema.js';$menu_ativo='empresa_admin';
if(in_array($acao,array('cadastrar','editar'),true)){
    $conteudo_template='usuarios_sistema/formulario.tpl';$titulo_pagina=$acao==='editar'?'Editar usuário da empresa':'Cadastrar usuário da empresa';
    if($acao==='editar'&&!isset($registro_formulario)){$obj=$acesso->retornaDados($pdo,'id',$id);if(!$obj||$obj->getStatus()==='e')emaRedirect('erro','Usuário não encontrado.');
        $smarty->assign('registro_formulario',array('id'=>$obj->getId(),'nome'=>$obj->getNome(),'email'=>$obj->getEmail(),'empresa'=>$obj->getEmpresa()));$registro_formulario=true;}
    if(!isset($registro_formulario))$smarty->assign('registro_formulario',array('id'=>0,'nome'=>'','email'=>'','empresa'=>''));
    $smarty->assign('modo_edicao',$acao==='editar');
}else{$registros=array();foreach($acesso->listarDados($pdo,'todos') as $obj){$empresa=$aempresas->retornaDados($pdo,'id',$obj->getEmpresa());
    $nomeEmpresa=$empresa?($empresa->getTipoCadastro()==='j'?($empresa->getPjFantansia()?:$empresa->getPjRazao()):$empresa->getPfNome()):'Empresa não encontrada';
    $registros[]=array('id'=>$obj->getId(),'id_formatado'=>str_pad($obj->getId(),6,'0',STR_PAD_LEFT),'nome'=>$obj->getNome(),'email'=>$obj->getEmail(),
        'empresa_nome'=>$nomeEmpresa,'dt_cadastro'=>$opc->inverteDateTime($obj->getDtCadastro()),'status'=>$obj->getStatus(),'status_texto'=>$obj->getStatus()==='a'?'Ativo':'Inativo');}
    $smarty->assign(array('registros'=>$registros,'qte_registros'=>count($registros)));}
if(isset($_SESSION['empresa_admin_mensagem'])){$smarty->assign('mensagem',$_SESSION['empresa_admin_mensagem']);unset($_SESSION['empresa_admin_mensagem']);}
$smarty->assign(array('csrf_token'=>$_SESSION['csrf_empresa_admin'],'modulo_titulo'=>'Usuários das empresas','modulo_url'=>'empresa_admin.php',
    'modulo_descricao'=>'Usuários vinculados às empresas cadastradas.','mostrar_empresa'=>true,'modulo_tipo_senha'=>'empresa_admin'));
require __DIR__.'/MODELO.php';
