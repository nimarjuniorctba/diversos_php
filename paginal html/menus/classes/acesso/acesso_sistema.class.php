<?php
class acesso_sistema extends Sistema {
    public function retornaDados($pdo){
        $r=$pdo->query("SELECT * FROM mod_sistema ORDER BY sis_id LIMIT 1")->fetch(PDO::FETCH_ASSOC);
        if(!$r)return false;
        $o=new Sistema();$o->setId($r['sis_id']);$o->setCnpj($r['sis_cnpj']);$o->setNomeFantasia($r['sis_nome_fantasia']);$o->setRazao($r['sis_razao']);
        $o->setIe($r['sis_ie']);$o->setIeIsento($r['sis_ie_isento']);$o->setResponsavel($r['sis_responsavel']);$o->setCep($r['sis_end_cep']);
        $o->setRua($r['sis_end_rua']);$o->setNumero($r['sis_end_numero']);$o->setComplemento($r['sis_end_complemento']);$o->setBairro($r['sis_end_bairro']);
        $o->setCidade($r['sis_end_cidade']);$o->setEstado($r['sis_end_estado']);$o->setTelefone($r['emp_telefone']);$o->setCelular($r['sis_celular']);
        $o->setWhatsapp($r['sis_whatsapp']);$o->setFacebook($r['sis_facebook']);$o->setInstagram($r['sis_instagram']);$o->setEmail($r['sis_email']);$o->setStatus($r['sis_status']);return $o;
    }
    public function salvaDados($pdo,Sistema $o){
        if((int)$o->getId()>0){$sql="UPDATE mod_sistema SET sis_cnpj=:cnpj,sis_nome_fantasia=:fantasia,sis_razao=:razao,sis_ie=:ie,sis_ie_isento=:isento,sis_responsavel=:responsavel,sis_end_cep=:cep,sis_end_rua=:rua,sis_end_numero=:numero,sis_end_complemento=:complemento,sis_end_bairro=:bairro,sis_end_cidade=:cidade,sis_end_estado=:estado,emp_telefone=:telefone,sis_celular=:celular,sis_whatsapp=:whatsapp,sis_facebook=:facebook,sis_instagram=:instagram,sis_email=:email WHERE sis_id=:id";}
        else{$sql="INSERT INTO mod_sistema(sis_cnpj,sis_nome_fantasia,sis_razao,sis_ie,sis_ie_isento,sis_responsavel,sis_end_cep,sis_end_rua,sis_end_numero,sis_end_complemento,sis_end_bairro,sis_end_cidade,sis_end_estado,emp_telefone,sis_celular,sis_whatsapp,sis_facebook,sis_instagram,sis_email,sis_status) VALUES(:cnpj,:fantasia,:razao,:ie,:isento,:responsavel,:cep,:rua,:numero,:complemento,:bairro,:cidade,:estado,:telefone,:celular,:whatsapp,:facebook,:instagram,:email,'a')";}
        $s=$pdo->prepare($sql);$dados=array(':cnpj'=>$o->getCnpj(),':fantasia'=>$o->getNomeFantasia(),':razao'=>$o->getRazao(),':ie'=>$o->getIe(),':isento'=>$o->getIeIsento(),':responsavel'=>$o->getResponsavel(),':cep'=>$o->getCep(),':rua'=>$o->getRua(),':numero'=>$o->getNumero(),':complemento'=>$o->getComplemento(),':bairro'=>$o->getBairro(),':cidade'=>$o->getCidade(),':estado'=>$o->getEstado(),':telefone'=>$o->getTelefone(),':celular'=>$o->getCelular(),':whatsapp'=>$o->getWhatsapp(),':facebook'=>$o->getFacebook(),':instagram'=>$o->getInstagram(),':email'=>$o->getEmail());
        if((int)$o->getId()>0)$dados[':id']=$o->getId();return $s->execute($dados);
    }
}
