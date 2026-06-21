<?php
require_once __DIR__.'/classes/Autoload.class.php';
require_once __DIR__.'/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$pdo=MySQL_PDO::conexao();$opc=new Opcoes();$localizacoes=new acesso_localizacoes();$sistemas=new acesso_sistema();
$condutor=(int)($_POST['condutor']??0);$di=(string)($_POST['data_inicio']??date('Y-m-d'));$df=(string)($_POST['data_fim']??$di);
$hi=(string)($_POST['hora_inicio']??'00:00');$hf=(string)($_POST['hora_fim']??'23:59');$valorKm=(float)str_replace(',','.',(string)($_POST['valor_km']??'0'));
$incluirCabecalho=isset($_POST['incluir_cabecalho']);$incluirResumo=isset($_POST['incluir_resumo']);$incluirMapa=isset($_POST['incluir_mapa']);$incluirDetalhes=isset($_POST['incluir_detalhes']);
$logs=$localizacoes->listarDados($pdo,$condutor,$di.' '.$hi.':00',$df.' '.$hf.':59',5000);$distancia=$localizacoes->calculaDistancia($logs);$total=$distancia*$valorKm;
$nome=count($logs)?$logs[0]->getCondutorNome():'Condutor sem registros';$vel=0;$velN=0;foreach($logs as $l){if($l->getVelocidade()!==null){$vel+=(float)$l->getVelocidade();$velN++;}}$velMedia=$velN?$vel/$velN:0;

function h($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
function criaMapaSvg($logs){
    $w=1000;$h=430;$pad=45;$pts=array();foreach($logs as $l)$pts[]=array((float)$l->getLongitude(),(float)$l->getLatitude());
    if(!$pts)return '<div class="empty-map">Nenhum ponto de localização no período.</div>';
    $lngs=array_column($pts,0);$lats=array_column($pts,1);$minX=min($lngs);$maxX=max($lngs);$minY=min($lats);$maxY=max($lats);
    if($maxX==$minX)$maxX=$minX+0.001;if($maxY==$minY)$maxY=$minY+0.001;
    if(count($pts)>700){$step=(int)ceil(count($pts)/700);$pts=array_values(array_filter($pts,fn($v,$k)=>$k%$step===0,ARRAY_FILTER_USE_BOTH));}
    $coords=array();foreach($pts as $p){$x=$pad+(($p[0]-$minX)/($maxX-$minX))*($w-2*$pad);$y=$h-$pad-(($p[1]-$minY)/($maxY-$minY))*($h-2*$pad);$coords[]=round($x,1).','.round($y,1);}
    $grid='';for($x=50;$x<$w;$x+=100)$grid.='<line x1="'.$x.'" y1="0" x2="'.$x.'" y2="'.$h.'" />';for($y=50;$y<$h;$y+=75)$grid.='<line x1="0" y1="'.$y.'" x2="'.$w.'" y2="'.$y.'" />';
    [$sx,$sy]=explode(',',$coords[0]);[$ex,$ey]=explode(',',$coords[count($coords)-1]);
    $svg='<svg xmlns="http://www.w3.org/2000/svg" width="'.$w.'" height="'.$h.'" viewBox="0 0 '.$w.' '.$h.'"><rect width="100%" height="100%" fill="#f1f3f5"/><g stroke="#dfe3e8" stroke-width="1">'.$grid.'</g><polyline points="'.implode(' ',$coords).'" fill="none" stroke="#ef2437" stroke-width="7" stroke-linecap="round" stroke-linejoin="round"/><circle cx="'.$sx.'" cy="'.$sy.'" r="11" fill="#20966d" stroke="#fff" stroke-width="4"/><circle cx="'.$ex.'" cy="'.$ey.'" r="11" fill="#d94856" stroke="#fff" stroke-width="4"/><text x="'.($sx+15).'" y="'.($sy-12).'" font-family="Arial" font-size="18" fill="#187d5a">Início</text><text x="'.($ex+15).'" y="'.($ey-12).'" font-family="Arial" font-size="18" fill="#c93140">Fim</text><text x="30" y="410" font-family="Arial" font-size="13" fill="#697181">Trajeto baseado nas coordenadas GPS filtradas</text></svg>';
    return '<img class="route-map" src="data:image/svg+xml;base64,'.base64_encode($svg).'">';
}

$sis=$sistemas->retornaDados($pdo);$fantasia=$sis&&$sis->getNomeFantasia()?$sis->getNomeFantasia():'OK MotoBoy Express';$cnpj=$sis?$sis->getCnpj():'';$email=$sis?$sis->getEmail():'';$whatsapp=$sis?$sis->getWhatsapp():'';
$logoPath=__DIR__.'/imagens/logo/logo_pdf.jpg';$logo=file_exists($logoPath)?'data:image/jpeg;base64,'.base64_encode(file_get_contents($logoPath)):'';
$html='<!doctype html><html><head><meta charset="utf-8"><style>@page{margin:28px 34px}body{font-family:DejaVu Sans,sans-serif;color:#292c31;font-size:10px}.header{width:100%;border-bottom:3px solid #ef2437;padding-bottom:12px;margin-bottom:18px}.header td{vertical-align:middle}.logo{width:78px;height:78px;object-fit:contain;border-radius:10px}.company h1{margin:0 0 5px;font-size:20px}.company p{margin:2px 0;color:#626975}.title{margin:0 0 4px;font-size:22px}.subtitle{color:#687086;margin-bottom:16px}.summary{width:100%;border-collapse:separate;border-spacing:7px}.summary td{padding:13px;border:1px solid #e1e4e9;border-radius:8px;background:#f7f8fa}.summary span{display:block;color:#7c8491;font-size:8px;text-transform:uppercase}.summary strong{display:block;margin-top:5px;font-size:15px}.total{color:#c91828}.section{margin-top:18px;page-break-inside:avoid}.section h2{font-size:15px;margin:0 0 10px}.route-map{width:100%;height:auto;border:1px solid #dfe3e8}.empty-map{padding:50px;text-align:center;background:#f3f4f6}.details{width:100%;border-collapse:collapse;font-size:8px}.details th{background:#303236;color:#fff}.details th,.details td{padding:5px;border:1px solid #ddd;text-align:left}.details tr:nth-child(even){background:#f7f7f8}.footer{margin-top:15px;color:#808692;font-size:8px}</style></head><body>';
if($incluirCabecalho){$html.='<table class="header"><tr><td style="width:95px">'.($logo?'<img class="logo" src="'.$logo.'">':'').'</td><td class="company"><h1>'.h($fantasia).'</h1><p>CNPJ: '.h($cnpj?:'Não informado').'</p><p>E-mail: '.h($email?:'Não informado').' | WhatsApp: '.h($whatsapp?:'Não informado').'</p></td></tr></table>';}
$html.='<h1 class="title">Relatório de condutor</h1><div class="subtitle"><strong>'.h($nome).'</strong> - Período de '.h(date('d/m/Y',strtotime($di)).' '.$hi).' até '.h(date('d/m/Y',strtotime($df)).' '.$hf).'</div>';
if($incluirResumo){$html.='<table class="summary"><tr><td><span>Pontos GPS</span><strong>'.count($logs).'</strong></td><td><span>Distância</span><strong>'.number_format($distancia,2,',','.').' km</strong></td><td><span>Velocidade média</span><strong>'.number_format($velMedia,1,',','.').' km/h</strong></td><td><span>Valor por km</span><strong>R$ '.number_format($valorKm,2,',','.').'</strong></td><td><span>Valor calculado</span><strong class="total">R$ '.number_format($total,2,',','.').'</strong></td></tr></table>';}
if($incluirMapa){$html.='<div class="section"><h2>Mapa do trajeto</h2>'.criaMapaSvg($logs).'</div>';}
if($incluirDetalhes){$rows='';foreach($logs as $l)$rows.='<tr><td>'.h($l->getId()).'</td><td>'.h($l->getLatitude()).'</td><td>'.h($l->getLongitude()).'</td><td>'.h($l->getVelocidade()).' km/h</td><td>'.h($opc->inverteDateTime($l->getDtCadastro())).'</td></tr>';$html.='<div class="section"><h2>Detalhamento dos pontos</h2><table class="details"><thead><tr><th>ID</th><th>Latitude</th><th>Longitude</th><th>Velocidade</th><th>Data/Hora</th></tr></thead><tbody>'.$rows.'</tbody></table></div>';}
$html.='<div class="footer">Gerado em '.date('d/m/Y H:i:s').' - Um único condutor por relatório.</div></body></html>';
$opt=new Options();$opt->set('isRemoteEnabled',false);$opt->set('isHtml5ParserEnabled',true);$pdf=new Dompdf($opt);$pdf->loadHtml($html,'UTF-8');$pdf->setPaper('A4','landscape');$pdf->render();$pdf->stream('relatorio-condutor-'.$condutor.'-'.$di.'.pdf',array('Attachment'=>false));
