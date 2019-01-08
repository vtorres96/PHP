<?php	

	include_once("conexao.php");
	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Código do Produto</th>';
	$html .= '<th>Descricao</th>';
	$html .= '<th>Barcode</th>';
	$html .= '<th>Grupo</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$result = "SELECT * FROM cadpro";
	$resultado = mysqli_query($conn, $result);
	while($row= mysqli_fetch_assoc($resultado)){
		$html .= '<tr><td>'.$row['id'] . "</td>";
		$html .= '<td>'.$row['cod_produto'] . "</td>";
		$html .= '<td>'.$row['descricao'] . "</td>";
		$html .= '<td>'.$row['barcode'] . "</td>";
		$html .= '<td>'.$row['grupo'] . "</td></tr>";		
	}
	
	$html .= '</tbody>';
	$html .= '</table';

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">Relatório de Produtos</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a pÃ¡gina
	$dompdf->stream(
		"relatorio.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>