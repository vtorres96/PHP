<?php
require_once('conn.php');
$sql = "SELECT * FROM produtos";
$stmt = mysqli_query($conn, $sql);
$data = [];
$i = 0;
while($row = mysqli_fetch_assoc($stmt)){
    $data[$i]['id'] = $row['id'];
    $data[$i]['descricao'] = $row['descricao'];
    $data[$i]['codpro'] = $row['codpro'];
    $data[$i]['unimed'] = $row['unimed'];
    $i++;
}
$export = new Export();
class Export{
    public function xml($fileName, $data){
        $file = $fileName . '.xml';
        
        $xml ="<?xml version='1.0' encoding='UTF-8'?>";
        $xml .="<{$fileName}>";
        
        for($i = 0; $i < count($data); $i++){
            $xml .= "<row>";
            foreach ($data[$i] as $k => $v){
                $xml .= "<{$k}>$v</{$k}>";
            }
            $xml .= "</row>";
        }
        
        $xml .="</{$fileName}>";
        
        // configurando header para download xml
        header("Content-Description: PHP Generated Data");
        header("Content-Type: application/xml");
        header("Content-Disposition: attachment; filename=\"{$file}\"");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
        
        echo $xml;
        exit;
        }  
}

if(isset($_GET['export']) && $_GET['export'] == 'xml'){
    $export->xml($_GET['fileName'], $data);
}
?>
