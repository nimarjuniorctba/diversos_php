<?php


require_once 'classes/autoload.class.php';

$pdo                    =   MySQL_PDO::conexao();

$aupload_imagem         =   new acesso_upload_imagem();
$pagina                 =   new stdClass();

$pagina->empresa_nome   = "Modelo 001";
$pagina->base           = "http://127.0.0.1/Alfa/portaldenoticias/";
$pagina->upload         = "imagens/uploads/";

$tipo   =   @$_POST['tipo'];
$id     =   @$_POST['id'];

switch ($tipo){

    case 'nome':
            $upload_imagem = new upload_imagem();

            if(isset($_FILES['file']))
             {
                $ext = strtolower(substr($_FILES['file']['name'],-4)); 
                $new_name = date("Ymd").md5(date("Y.m.d-H.i.s")).$ext; 
                move_uploaded_file($_FILES['file']['tmp_name'],$pagina->upload.$new_name); 
                $upload_imagem->setCaminho($new_name);
            }                

            $upload_imagem->setNome($id);                                        
            $cadastra = $aupload_imagem->cadastraDados($pdo, $upload_imagem);
            if($cadastra!=false){                      
                $retorno['status']    =   true;
            }else{
                $retorno['status']    =   false;
            }

            echo json_encode($retorno);                                      
            break;

    case 'deletar':
        
            $retorno['status']    =   false;

            $retorna_anexo  =   $aupload_imagem->retornaDados($pdo, 'id', $id);
            if(is_object($retorna_anexo)){
                
                $cadastra = $aupload_imagem->Deletar($pdo, $id);
                if($cadastra!=false){   
                    
                    $arquivo    =   $pagina->upload.$retorna_anexo->getCaminho();
                    
                    if(file_exists($arquivo)){
                        unlink($arquivo);
                        $retorno['status']    =   true;
                    }  
                                        
                }else{
                    $retorno['status']    =   false;
                }
                
            }
            echo json_encode($retorno);       
            break;  
}