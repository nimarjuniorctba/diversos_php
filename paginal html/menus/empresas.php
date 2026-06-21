<?php

require_once __DIR__.'/smarty/config.ini.php';
require_once __DIR__.'/classes/Autoload.class.php';
$pdo=MySQL_PDO::conexao();$session=new Sessions();$opc=new Opcoes();$acesso=new acesso_empresas();
$acao=$_GET['acao']??'listar';$id=isset($_GET['id'])?(int)$_GET['id']:0;
if(empty($_SESSION['csrf_empresas']))$_SESSION['csrf_empresas']=bin2hex(random_bytes(32));
function empPost($c){return trim((string)($_POST[$c]??''));}
function empRedirect($t,$x){$_SESSION['empresas_mensagem']=array('tipo'=>$t,'texto'=>$x);header('Location: empresas.php');exit;}

$adminId=(int)$session->getValor('adm_adm_id');
if($adminId<=0){$adminId=(int)$pdo->query("SELECT adm_id FROM mod_administradores WHERE adm_status='a' ORDER BY adm_id LIMIT 1")->fetchColumn();}

function preencherEmpresaPost($obj,$adminId){
    $tipo=empPost('emp_tipo_cad')==='f'?'f':'j';$obj->setTipoCadastro($tipo);
    $obj->setPfNome($tipo==='f'?empPost('emp_pf_nome'):'');$obj->setPfCpf($tipo==='f'?empPost('emp_pf_cpf'):'');
    $obj->setPfDtNascimento($tipo==='f'?empPost('emp_pf_dt_nascimento'):'');$obj->setPjCnpj($tipo==='j'?empPost('emp_pj_cnpj'):'');
    $obj->setPjFantansia($tipo==='j'?empPost('emp_pj_fantasia'):'');$obj->setPjRazao($tipo==='j'?empPost('emp_pj_razao'):'');
    $obj->setPjIe($tipo==='j'?empPost('emp_pj_ie'):'');$obj->setPjIeIsento($tipo==='j'&&isset($_POST['emp_pj_ie_isento'])?'s':'n');
    $obj->setPjResponsavel($tipo==='j'?empPost('emp_pj_responsavel'):'');$obj->setCep(empPost('emp_cep'));$obj->setRua(empPost('emp_rua'));
    $obj->setNumero(empPost('emp_numero'));$obj->setComplemento(empPost('emp_complemento'));$obj->setBairro(empPost('emp_bairro'));
    $obj->setCidade(empPost('emp_cidade'));$obj->setEstado(strtoupper(empPost('emp_estado')));$obj->setTelefone(empPost('emp_telefone'));
    $obj->setCelular(empPost('emp_celular'));$obj->setFacebook(empPost('emp_facebook'));$obj->setInstagram(empPost('emp_instagram'));
    $obj->setEmail(strtolower(empPost('emp_email')));$obj->setValidadeSistema(empPost('emp_validade_sistema'));$obj->setAdmin($adminId);
}
function empresaArray($e){return array('id'=>$e->getId(),'tipo'=>$e->getTipoCadastro(),'pf_nome'=>$e->getPfNome(),'pf_cpf'=>$e->getPfCpf(),
    'pf_nascimento'=>$e->getPfDtNascimento(),'pj_cnpj'=>$e->getPjCnpj(),'pj_fantasia'=>$e->getPjFantansia(),'pj_razao'=>$e->getPjRazao(),
    'pj_ie'=>$e->getPjIe(),'pj_ie_isento'=>$e->getPjIeIsento(),'pj_responsavel'=>$e->getPjResponsavel(),'cep'=>$e->getCep(),'rua'=>$e->getRua(),
    'numero'=>$e->getNumero(),'complemento'=>$e->getComplemento(),'bairro'=>$e->getBairro(),'cidade'=>$e->getCidade(),'estado'=>$e->getEstado(),
    'telefone'=>$e->getTelefone(),'celular'=>$e->getCelular(),'facebook'=>$e->getFacebook(),'instagram'=>$e->getInstagram(),'email'=>$e->getEmail(),
    'validade'=>$e->getValidadeSistema());}

if($_SERVER['REQUEST_METHOD']==='POST'){
    if(!hash_equals($_SESSION['csrf_empresas'],(string)($_POST['csrf_token']??''))){http_response_code(403);exit('Sessão expirada.');}
    $op=empPost('operacao');$rid=(int)empPost('emp_id');
    if($op==='salvar'){
        $obj=new Empresas();$obj->setId($rid);preencherEmpresaPost($obj,$adminId);$erros=array();
        $documento=$obj->getTipoCadastro()==='j'?$obj->getPjCnpj():$obj->getPfCpf();
        $nome=$obj->getTipoCadastro()==='j'?$obj->getPjRazao():$obj->getPfNome();
        if($nome==='')$erros[]='Informe o nome ou razão social.';if($documento==='')$erros[]='Informe o CPF ou CNPJ.';
        if($obj->getEmail()!==''&&!filter_var($obj->getEmail(),FILTER_VALIDATE_EMAIL))$erros[]='Informe um e-mail válido.';
        if($obj->getValidadeSistema()==='')$erros[]='Informe a validade do sistema.';
        if($acesso->verificaDocumentoEdicao($pdo,$obj->getTipoCadastro(),$documento,$rid))$erros[]='Este CPF ou CNPJ já está cadastrado.';
        if(!$erros){$ok=$rid>0?$acesso->atualizaDados($pdo,$obj):$acesso->cadastraDados($pdo,$obj);
            if($ok)empRedirect('sucesso',$rid>0?'Empresa alterada com sucesso.':'Empresa cadastrada com sucesso.');$erros[]='Não foi possível salvar a empresa.';}
        $smarty->assign('erros',$erros);$smarty->assign('empresa_formulario',empresaArray($obj));$empresa_formulario=true;$acao=$rid>0?'editar':'cadastrar';
    }elseif($op==='status'){$ok=$acesso->alteraStatus($pdo,$rid,empPost('novo_status'));empRedirect($ok?'sucesso':'erro',$ok?'Status alterado com sucesso.':'Não foi possível alterar o status.');
    }elseif($op==='excluir'){$ok=$acesso->Deletar($pdo,$rid);empRedirect($ok?'sucesso':'erro',$ok?'Empresa excluída com sucesso.':'Não foi possível excluir.');}
}

$titulo_pagina='Empresas';$conteudo_template='empresas/lista.tpl';$pagina_script='assets/js/pages/empresas.js';$menu_ativo='empresas';
if(in_array($acao,array('cadastrar','editar'),true)){
    $conteudo_template='empresas/formulario.tpl';$titulo_pagina=$acao==='editar'?'Editar empresa':'Cadastrar empresa';
    if($acao==='editar'&&!isset($empresa_formulario)){$obj=$acesso->retornaDados($pdo,'id',$id);if(!$obj)empRedirect('erro','Empresa não encontrada.');
        $smarty->assign('empresa_formulario',empresaArray($obj));$empresa_formulario=true;}
    if(!isset($empresa_formulario))$smarty->assign('empresa_formulario',array('id'=>0,'tipo'=>'j','pf_nome'=>'','pf_cpf'=>'','pf_nascimento'=>'','pj_cnpj'=>'',
        'pj_fantasia'=>'','pj_razao'=>'','pj_ie'=>'','pj_ie_isento'=>'n','pj_responsavel'=>'','cep'=>'','rua'=>'','numero'=>'','complemento'=>'',
        'bairro'=>'','cidade'=>'','estado'=>'','telefone'=>'','celular'=>'','facebook'=>'','instagram'=>'','email'=>'','validade'=>date('Y-m-d',strtotime('+1 year'))));
    $smarty->assign('modo_edicao',$acao==='editar');
}else{$registros=array();foreach($acesso->listarDados($pdo,'todos') as $e){$registros[]=array('id'=>$e->getId(),'id_formatado'=>str_pad($e->getId(),6,'0',STR_PAD_LEFT),
    'tipo'=>$e->getTipoCadastro()==='j'?'PJ':'PF','nome'=>$e->getTipoCadastro()==='j'?($e->getPjFantansia()?:$e->getPjRazao()):$e->getPfNome(),
    'documento'=>$e->getTipoCadastro()==='j'?$e->getPjCnpj():$e->getPfCpf(),'email'=>$e->getEmail(),'cidade'=>$e->getCidade(),'estado'=>$e->getEstado(),
    'validade'=>$e->getValidadeSistema(),'dt_cadastro'=>$opc->inverteDateTime($e->getDtCadastro()),'status'=>$e->getStatus(),'status_texto'=>$e->getStatus()==='a'?'Ativa':'Inativa');}
    $smarty->assign(array('registros'=>$registros,'qte_registros'=>count($registros)));}
if(isset($_SESSION['empresas_mensagem'])){$smarty->assign('mensagem',$_SESSION['empresas_mensagem']);unset($_SESSION['empresas_mensagem']);}
$smarty->assign('csrf_token',$_SESSION['csrf_empresas']);require __DIR__.'/MODELO.php';

