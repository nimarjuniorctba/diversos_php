<?php



    $session->unsetValor("ADMIN_SESSAO");
    $session->unsetValor("adm_adm_id");
    
//  echo 'dsa';exit;  
    
  header("Location: ".$pagina->base.'/admin');
  