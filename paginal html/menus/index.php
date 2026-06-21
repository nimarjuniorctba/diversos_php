<?php
	

require_once 'smarty/config.ini.php';
require_once 'classes/Autoload.class.php';



$pdo                =   MySQL_PDO::conexao();
$session            =   new Sessions();
$opc                =   new Opcoes();



$pagina = new stdClass();

$metricas = array();
$metricas['condutores_total'] = (int)$pdo->query("SELECT COUNT(*) FROM mod_condutor WHERE con_cad_status<>'e'")->fetchColumn();
$metricas['condutores_ativos'] = (int)$pdo->query("SELECT COUNT(*) FROM mod_condutor WHERE con_cad_status='a'")->fetchColumn();
$metricas['condutores_inativos'] = (int)$pdo->query("SELECT COUNT(*) FROM mod_condutor WHERE con_cad_status='i'")->fetchColumn();
$metricas['condutores_online'] = (int)$pdo->query("SELECT COUNT(*) FROM mod_condutor WHERE con_cad_status='a' AND con_app_status='a'")->fetchColumn();
$metricas['condutores_offline'] = (int)$pdo->query("SELECT COUNT(*) FROM mod_condutor WHERE con_cad_status='a' AND con_app_status='i'")->fetchColumn();
$metricas['condutores_hoje'] = (int)$pdo->query("SELECT COUNT(*) FROM mod_condutor WHERE DATE(con_dt_cadastro)=CURDATE() AND con_cad_status<>'e'")->fetchColumn();
$metricas['condutores_semana'] = (int)$pdo->query("SELECT COUNT(*) FROM mod_condutor WHERE YEARWEEK(con_dt_cadastro,1)=YEARWEEK(CURDATE(),1) AND con_cad_status<>'e'")->fetchColumn();
$metricas['condutores_mes'] = (int)$pdo->query("SELECT COUNT(*) FROM mod_condutor WHERE YEAR(con_dt_cadastro)=YEAR(CURDATE()) AND MONTH(con_dt_cadastro)=MONTH(CURDATE()) AND con_cad_status<>'e'")->fetchColumn();
$metricas['empresas_total'] = (int)$pdo->query("SELECT COUNT(*) FROM mod_empresas WHERE emp_status<>'e'")->fetchColumn();
$metricas['empresas_ativas'] = (int)$pdo->query("SELECT COUNT(*) FROM mod_empresas WHERE emp_status='a'")->fetchColumn();
$metricas['pontos_hoje'] = (int)$pdo->query("SELECT COUNT(*) FROM mod_localizacao WHERE DATE(loc_dt_cadastro)=CURDATE()")->fetchColumn();

$smarty->assign('metricas', $metricas);
$titulo_pagina = 'Dashboard';
$conteudo_template = 'dashboard.tpl';
$pagina_script = '';
$menu_ativo = 'dashboard';
require_once __DIR__.'/MODELO.php';
