<?php
class acesso_localizacoes extends Localizacoes {
    private function distanciaEntrePontos($lat1,$lon1,$lat2,$lon2){
        $raio=6371.0088;$dLat=deg2rad($lat2-$lat1);$dLon=deg2rad($lon2-$lon1);
        $a=sin($dLat/2)*sin($dLat/2)+cos(deg2rad($lat1))*cos(deg2rad($lat2))*sin($dLon/2)*sin($dLon/2);
        return $raio*2*atan2(sqrt($a),sqrt(1-$a));
    }
    public function calculaDistancia($logs){
        $total=0.0;$anterior=null;
        foreach($logs as $log){
            $atual=array((float)$log->getLatitude(),(float)$log->getLongitude());
            if($anterior!==null)$total+=$this->distanciaEntrePontos($anterior[0],$anterior[1],$atual[0],$atual[1]);
            $anterior=$atual;
        }
        return round($total,2);
    }
    public function listarCondutores($pdo){
        return $pdo->query("SELECT con_id,con_nome,con_placa FROM mod_condutor WHERE con_cad_status<>'e' ORDER BY con_nome")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function ultimaData($pdo){
        return $pdo->query("SELECT DATE(MAX(loc_dt_cadastro)) FROM mod_localizacao")->fetchColumn();
    }
    public function primeiroCondutorComLog($pdo,$data){
        $s=$pdo->prepare("SELECT con_id_fk FROM mod_localizacao WHERE DATE(loc_dt_cadastro)=:data AND con_id_fk>0 ORDER BY loc_dt_cadastro DESC LIMIT 1");
        $s->execute(array(':data'=>$data));return (int)$s->fetchColumn();
    }
    public function listarDados($pdo,$condutor,$inicio,$fim,$limite=5000){
        if((int)$condutor<=0)return array();
        $sql="SELECT l.loc_id,l.loc_latitude,l.loc_longitude,l.loc_velocidade,l.loc_dt_cadastro,l.con_id_fk,c.con_nome
              FROM mod_localizacao l INNER JOIN mod_condutor c ON c.con_id=l.con_id_fk
              WHERE l.con_id_fk=:condutor AND l.loc_dt_cadastro>=:inicio AND l.loc_dt_cadastro<=:fim
                AND l.loc_latitude BETWEEN -90 AND 90 AND l.loc_longitude BETWEEN -180 AND 180
              ORDER BY l.loc_dt_cadastro,l.loc_id LIMIT ".(int)$limite;
        $s=$pdo->prepare($sql);$s->execute(array(':condutor'=>$condutor,':inicio'=>$inicio,':fim'=>$fim));
        $lista=array();while($r=$s->fetch(PDO::FETCH_ASSOC)){$o=new Localizacoes();$o->setId($r['loc_id']);$o->setLatitude($r['loc_latitude']);$o->setLongitude($r['loc_longitude']);$o->setVelocidade($r['loc_velocidade']);$o->setDtCadastro($r['loc_dt_cadastro']);$o->setCondutor($r['con_id_fk']);$o->setCondutorNome($r['con_nome']);$lista[]=$o;}return $lista;
    }
}
