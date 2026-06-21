<?php



    $session->unsetValor("USUARIO_SESSAO");
    $session->unsetValor("adm_id");
    $session->unsetValor("adm_emp_id");
    
    
  header("Location: ".$pagina->base);