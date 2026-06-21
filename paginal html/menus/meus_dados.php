<?php
require_once __DIR__.'/smarty/config.ini.php';require_once __DIR__.'/classes/Autoload.class.php';
$pdo=MySQL_PDO::conexao();$session=new Sessions();$acesso=new acesso_sistema();
if(empty($_SESSION['csrf_sistema']))$_SESSION['csrf_sistema']=bin2hex(random_bytes(32));
function sisPost($c){return trim((string)($_POST[$c]??''));}
if($_SERVER['REQUEST_METHOD']==='POST'){
 if(!hash_equals($_SESSION['csrf_sistema'],(string)($_POST['csrf_token']??''))){http_response_code(403);exit('Sessão expirada.');}
 $o=new Sistema();$o->setId((int)sisPost('sis_id'));$o->setCnpj(sisPost('sis_cnpj'));$o->setNomeFantasia(sisPost('sis_nome_fantasia'));$o->setRazao(sisPost('sis_razao'));$o->setIe(sisPost('sis_ie'));$o->setIeIsento(isset($_POST['sis_ie_isento'])?'s':'n');$o->setResponsavel(sisPost('sis_responsavel'));$o->setCep(sisPost('sis_cep'));$o->setRua(sisPost('sis_rua'));$o->setNumero(sisPost('sis_numero'));$o->setComplemento(sisPost('sis_complemento'));$o->setBairro(sisPost('sis_bairro'));$o->setCidade(sisPost('sis_cidade'));$o->setEstado(strtoupper(sisPost('sis_estado')));$o->setTelefone(sisPost('sis_telefone'));$o->setCelular(sisPost('sis_celular'));$o->setWhatsapp(sisPost('sis_whatsapp'));$o->setFacebook(sisPost('sis_facebook'));$o->setInstagram(sisPost('sis_instagram'));$o->setEmail(strtolower(sisPost('sis_email')));
 if($acesso->salvaDados($pdo,$o)){$smarty->assign('mensagem',array('tipo'=>'sucesso','texto'=>'Dados do sistema salvos com sucesso.'));}
}
$o=$acesso->retornaDados($pdo);$d=array('id'=>0,'cnpj'=>'','fantasia'=>'','razao'=>'','ie'=>'','isento'=>'n','responsavel'=>'','cep'=>'','rua'=>'','numero'=>'','complemento'=>'','bairro'=>'','cidade'=>'','estado'=>'','telefone'=>'','celular'=>'','whatsapp'=>'','facebook'=>'','instagram'=>'','email'=>'');
if($o)$d=array('id'=>$o->getId(),'cnpj'=>$o->getCnpj(),'fantasia'=>$o->getNomeFantasia(),'razao'=>$o->getRazao(),'ie'=>$o->getIe(),'isento'=>$o->getIeIsento(),'responsavel'=>$o->getResponsavel(),'cep'=>$o->getCep(),'rua'=>$o->getRua(),'numero'=>$o->getNumero(),'complemento'=>$o->getComplemento(),'bairro'=>$o->getBairro(),'cidade'=>$o->getCidade(),'estado'=>$o->getEstado(),'telefone'=>$o->getTelefone(),'celular'=>$o->getCelular(),'whatsapp'=>$o->getWhatsapp(),'facebook'=>$o->getFacebook(),'instagram'=>$o->getInstagram(),'email'=>$o->getEmail());
$smarty->assign(array('sistema'=>$d,'csrf_token'=>$_SESSION['csrf_sistema']));$titulo_pagina='Meus dados';$conteudo_template='meus_dados/formulario.tpl';$pagina_script='assets/js/pages/empresas.js';$menu_ativo='meus_dados';require __DIR__.'/MODELO.php';
