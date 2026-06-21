<?php
require_once __DIR__.'/smarty/config.ini.php';
require_once __DIR__.'/classes/Autoload.class.php';
$session=new Sessions();
$titulo_pagina='Rastreamento';
$conteudo_template='rastreamento.tpl';
$pagina_script='';
$menu_ativo='rastreamento';
require __DIR__.'/MODELO.php';
