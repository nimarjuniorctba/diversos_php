<?php


$aempresas   =   new acesso_empresas();

if(($session->getValor('USUARIO_SESSAO')!='') && ($session->getValor('adm_id')!='')){
    if(isset($_POST['submit'])){

        $ieIsento = isset($_POST['emp_pj_ie_isento'])?  $_POST['emp_pj_ie_isento'] :'n';    

        $empresa = new Empresas();
        $empresa->setId($session->getValor('adm_emp_id'));
        $empresa->setPfNome($_POST['emp_pf_nome']);
        $empresa->setPfCpf($_POST['emp_pf_cpf']);
        $empresa->setPfDtNascimento($_POST['emp_pf_dt_nascimento']);
        $empresa->setPjCnpj($_POST['emp_pj_cnpj']);
        $empresa->setPjFantansia($_POST['emp_pj_fantasia']);
        $empresa->setPjRazao($_POST['emp_pj_razao']);
        $empresa->setPjIe($_POST['emp_pj_ie']);
        $empresa->setPjIeIsento($ieIsento);
        $empresa->setPjResponsavel($_POST['emp_pj_responsavel']);
        $empresa->setCep($_POST['emp_cep']);
        $empresa->setRua($_POST['emp_rua']);
        $empresa->setNumero($_POST['emp_numero']);
        $empresa->setComplemento($_POST['emp_complemento']);
        $empresa->setBairro($_POST['emp_bairro']);
        $empresa->setCidade($_POST['emp_cidade']);
        $empresa->setEstado($_POST['emp_estado']);
        $empresa->setTelefone($_POST['emp_telefone']);
        $empresa->setCelular($_POST['emp_celular']);
        $empresa->setFacebook($_POST['emp_facebook']);
        $empresa->setInstagram($_POST['emp_instagram']);
        $empresa->setEmail($_POST['emp_emails']);

            $altera_empresa  =   $aempresas->atualizaDados($pdo, $empresa); 
            if($altera_empresa){
                 $msg    =   '<div class="alert alert-success" role="alert"><div><span>Alterado com sucesso.</span></div></div>';
            }else{
                 $msg     =   '<div class="alert alert-danger" role="alert">Não foi possivel realizar o alteração verifique os dados.</div>';
            }                  
    }

    $retorna_empresa = $aempresas->retornaDados($pdo, 'id', $session->getValor('adm_emp_id'));
    if(is_object($retorna_empresa)){       
        $smarty->assign('usu_id',$retorna_empresa->getId());
        $smarty->assign('emp_tipo_cadastro',$retorna_empresa->getTipoCadastro());
        $smarty->assign('emp_pf_nome',$retorna_empresa->getPfNome());         
        $smarty->assign('emp_pf_cpf',$retorna_empresa->getPfCpf());         
        $smarty->assign('emp_pf_dt_nascimento',$retorna_empresa->getPfDtNascimento());         
        $smarty->assign('emp_pj_cnpj',$retorna_empresa->getPjCnpj());         
        $smarty->assign('emp_pj_fantasia',$retorna_empresa->getPjFantansia());         
        $smarty->assign('emp_pj_razao',$retorna_empresa->getPjRazao());         
        $smarty->assign('emp_pj_ie',$retorna_empresa->getPjIe());         
        $smarty->assign('emp_pj_ie_isento',$retorna_empresa->getPjIeIsento());         
        $smarty->assign('emp_pj_responsavel',$retorna_empresa->getPjResponsavel());         
        $smarty->assign('emp_cep',$retorna_empresa->getCep());         
        $smarty->assign('emp_rua',$retorna_empresa->getRua());         
        $smarty->assign('emp_numero',$retorna_empresa->getNumero());         
        $smarty->assign('emp_complemento',$retorna_empresa->getComplemento());         
        $smarty->assign('emp_bairro',$retorna_empresa->getBairro());         
        $smarty->assign('emp_cidade',$retorna_empresa->getCidade());         
        $smarty->assign('emp_estado',$retorna_empresa->getEstado());         
        $smarty->assign('emp_telefone',$retorna_empresa->getTelefone());         
        $smarty->assign('emp_celular',$retorna_empresa->getCelular());         
        $smarty->assign('emp_facebook',$retorna_empresa->getFacebook());         
        $smarty->assign('emp_instagram',$retorna_empresa->getInstagram());         
        $smarty->assign('emp_emails',$retorna_empresa->getEmail());         
    }

    if(isset($msg)){
        $smarty->assign("mensagem", $msg);        
    }
    $pagina->titulo = "Meus dados";
    $smarty->assign('pagina',$pagina);
    $smarty->display('meus_dados/formulario.tpl');

}