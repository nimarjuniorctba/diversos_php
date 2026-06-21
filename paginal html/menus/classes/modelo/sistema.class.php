<?php
class Sistema {
    private $id,$cnpj,$nomeFantasia,$razao,$ie,$ieIsento,$responsavel,$cep,$rua,$numero,$complemento,$bairro,$cidade,$estado,$telefone,$celular,$whatsapp,$facebook,$instagram,$email,$status;
    public function __call($nome,$args){
        $map=array('Id'=>'id','Cnpj'=>'cnpj','NomeFantasia'=>'nomeFantasia','Razao'=>'razao','Ie'=>'ie','IeIsento'=>'ieIsento','Responsavel'=>'responsavel','Cep'=>'cep','Rua'=>'rua','Numero'=>'numero','Complemento'=>'complemento','Bairro'=>'bairro','Cidade'=>'cidade','Estado'=>'estado','Telefone'=>'telefone','Celular'=>'celular','Whatsapp'=>'whatsapp','Facebook'=>'facebook','Instagram'=>'instagram','Email'=>'email','Status'=>'status');
        foreach($map as $sufixo=>$campo){
            if($nome==='get'.$sufixo)return $this->$campo;
            if($nome==='set'.$sufixo){$this->$campo=$args[0]??null;return;}
        }
        throw new BadMethodCallException($nome);
    }
}
