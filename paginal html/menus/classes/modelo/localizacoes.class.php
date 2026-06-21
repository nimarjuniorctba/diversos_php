<?php
class Localizacoes {
    private $id,$latitude,$longitude,$velocidade,$dtCadastro,$condutor,$condutorNome;
    public function __call($nome,$args){
        $map=array('Id'=>'id','Latitude'=>'latitude','Longitude'=>'longitude','Velocidade'=>'velocidade','DtCadastro'=>'dtCadastro','Condutor'=>'condutor','CondutorNome'=>'condutorNome');
        foreach($map as $s=>$c){if($nome==='get'.$s)return $this->$c;if($nome==='set'.$s){$this->$c=$args[0]??null;return;}}
        throw new BadMethodCallException($nome);
    }
}
