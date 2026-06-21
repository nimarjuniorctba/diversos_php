<?php
require_once __DIR__.'/smarty/config.ini.php';require_once __DIR__.'/classes/Autoload.class.php';
$pdo=MySQL_PDO::conexao();$session=new Sessions();$opc=new Opcoes();$acesso=new acesso_localizacoes();
$ultimaData=$acesso->ultimaData($pdo)?:date('Y-m-d');$dataInicio=$_GET['data_inicio']??$ultimaData;$dataFim=$_GET['data_fim']??$dataInicio;
$horaInicio=$_GET['hora_inicio']??'00:00';$horaFim=$_GET['hora_fim']??'23:59';$condutor=(int)($_GET['condutor']??0);
$valorKmTexto=str_replace(',','.',(string)($_GET['valor_km']??'0'));$valorKm=is_numeric($valorKmTexto)?max(0,(float)$valorKmTexto):0;
if(!preg_match('/^\d{4}-\d{2}-\d{2}$/',$dataInicio))$dataInicio=$ultimaData;if(!preg_match('/^\d{4}-\d{2}-\d{2}$/',$dataFim))$dataFim=$dataInicio;
if(!preg_match('/^\d{2}:\d{2}$/',$horaInicio))$horaInicio='00:00';if(!preg_match('/^\d{2}:\d{2}$/',$horaFim))$horaFim='23:59';
if($condutor<=0)$condutor=$acesso->primeiroCondutorComLog($pdo,$dataInicio);
$logs=$acesso->listarDados($pdo,$condutor,$dataInicio.' '.$horaInicio.':00',$dataFim.' '.$horaFim.':59');
$distancia=$acesso->calculaDistancia($logs);$valorTotal=round($distancia*$valorKm,2);$pontos=array();$velTotal=0;$velCount=0;
foreach($logs as $l){$pontos[]=array('lat'=>(float)$l->getLatitude(),'lng'=>(float)$l->getLongitude(),'velocidade'=>(float)$l->getVelocidade(),'data'=>$l->getDtCadastro());if($l->getVelocidade()!==null){$velTotal+=(float)$l->getVelocidade();$velCount++;}}
$condutores=$acesso->listarCondutores($pdo);$nome='';$placa='';foreach($condutores as $c){if((int)$c['con_id']===$condutor){$nome=$c['con_nome'];$placa=$c['con_placa'];}}
$smarty->assign(array('condutores'=>$condutores,'condutor_selecionado'=>$condutor,'nome_condutor'=>$nome,'placa_condutor'=>$placa,'data_inicio'=>$dataInicio,'data_fim'=>$dataFim,'hora_inicio'=>$horaInicio,'hora_fim'=>$horaFim,'total_pontos'=>count($logs),'distancia_km'=>number_format($distancia,2,',','.'),'distancia_valor'=>$distancia,'valor_km'=>number_format($valorKm,2,',','.'),'valor_km_input'=>number_format($valorKm,2,'.',''),'valor_total'=>number_format($valorTotal,2,',','.'),'velocidade_media'=>$velCount?number_format($velTotal/$velCount,1,',','.'):'0,0','pontos_json'=>json_encode($pontos,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)));
$titulo_pagina='Relatório de condutores';$conteudo_template='relatorios/condutores.tpl';$pagina_script='assets/js/pages/relatorio_condutores.js';$menu_ativo='relatorio_condutores';require __DIR__.'/MODELO.php';
