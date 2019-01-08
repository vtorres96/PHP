<?php

class Export{

    public function excel($descricao, $fileName, $data){
        // nome do arquivo
        $fileName = $fileName . '.xls';
        // Abrindo tag tabela e criando título da tabela
        $html = '';
        $html .= '<table border="1">';
        $html .= '<tr>';
        $html .= '<th colspan="' . count($data) . '">' . $descricao . '</th>';
        $html .= '</tr>';
        // criando cabeçalho
        $html .= '<tr>';
        foreach ($data[0] as $k => $v){
            $html .= '<th>' . ucfirst($k) . '</th>';
        }
        $html .= '</tr>';
        // criando o conteúdo da tabela
        for($i=0; $i < count($data); $i++){
            $html .= '<tr>';
            foreach ($data[$i] as $k => $v){
                $html .= '<td>' . $v . '</td>';
            }
                $html .= '</tr>';
            }
                $html .= '</table>';

        // configurando header para download excel
        header("Content-Description: PHP Generated Data");
        header("Content-Type: application/x-msexcel");
        header("Content-Disposition: attachment; filename=\"{$fileName}\"");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
        // envio conteúdo
        echo $html;
        exit;
    }
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
?>