<?php
require_once __DIR__.'/smarty/config.ini.php';require_once __DIR__.'/classes/Autoload.class.php';
$pdo=MySQL_PDO::conexao();$session=new Sessions();$opc=new Opcoes();$acesso=new acesso_localizacoes();
$ultimaData=$acesso->ultimaData($pdo)?:date('Y-m-d');$dataInicio=$_GET['data_inicio']??$ultimaData;$dataFim=$_GET['data_fim']??$dataInicio;
$horaInicio=$_GET['hora_inicio']??'00:00';$horaFim=$_GET['hora_fim']??'23:59';$condutor=(int)($_GET['condutor']??0);
if(!preg_match('/^\d{4}-\d{2}-\d{2}$/',$dataInicio))$dataInicio=$ultimaData;if(!preg_match('/^\d{4}-\d{2}-\d{2}$/',$dataFim))$dataFim=$dataInicio;
if(!preg_match('/^\d{2}:\d{2}$/',$horaInicio))$horaInicio='00:00';if(!preg_match('/^\d{2}:\d{2}$/',$horaFim))$horaFim='23:59';
if($condutor<=0)$condutor=$acesso->primeiroCondutorComLog($pdo,$dataInicio);
$inicio=$dataInicio.' '.$horaInicio.':00';$fim=$dataFim.' '.$horaFim.':59';$logs=$acesso->listarDados($pdo,$condutor,$inicio,$fim);
$registros=array();$pontos=array();$velTotal=0;$velCount=0;
foreach($logs as $l){$registros[]=array('id'=>$l->getId(),'latitude'=>$l->getLatitude(),'longitude'=>$l->getLongitude(),'velocidade'=>$l->getVelocidade(),'data'=>$opc->inverteDateTime($l->getDtCadastro()),'data_iso'=>$l->getDtCadastro(),'condutor'=>$l->getCondutorNome());$pontos[]=array('lat'=>(float)$l->getLatitude(),'lng'=>(float)$l->getLongitude(),'velocidade'=>(float)$l->getVelocidade(),'data'=>$l->getDtCadastro());if($l->getVelocidade()!==null){$velTotal+=(float)$l->getVelocidade();$velCount++;}}
$condutores=$acesso->listarCondutores($pdo);$nomeCondutor='';foreach($condutores as $c){if((int)$c['con_id']===$condutor)$nomeCondutor=$c['con_nome'];}
$smarty->assign(array('condutores'=>$condutores,'condutor_selecionado'=>$condutor,'nome_condutor'=>$nomeCondutor,'data_inicio'=>$dataInicio,'data_fim'=>$dataFim,'hora_inicio'=>$horaInicio,'hora_fim'=>$horaFim,'logs'=>$registros,'total_logs'=>count($registros),'primeiro_log'=>count($registros)?$registros[0]:null,'ultimo_log'=>count($registros)?$registros[count($registros)-1]:null,'pontos_json'=>json_encode($pontos,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES),'velocidade_media'=>$velCount?number_format($velTotal/$velCount,1,',','.'):'0,0'));
$titulo_pagina='Logs de rastreamento';$conteudo_template='logs_rastreamento/lista.tpl';$pagina_script='assets/js/pages/logs_rastreamento.js';$menu_ativo='logs_rastreamento';require __DIR__.'/MODELO.php';
