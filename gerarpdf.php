<?php

require 'repositorio_pedidos.php';

require 'lib/fpdf.php';
$pdf = new FPDF('P','pt','A4');
$pdf->AddPage();
//$pdf->Image('imagens/logo.jpg');
$pdf->SetFont('arial','',12);
$pdf->Cell(0,30,"PEDIDO ALFPARF",0,1,'L');
$pdf->Cell(0,1,"","B",1,'C');
$pdf->ln(20);
// echo "<pre>";
//     var_dump($pdf);
//     die;
if(isset($_GET['codigo'])){
    $codigo = $_GET['codigo']; //Guardamos o codigo enviado na variável $codigo
    //Obtemos o objeto pedido relativo ao código
    $pedido = $repositorio->buscarPedido($codigo);
    $pedidos = $repositorio->getListaPedido();
}
//início do da estrutura de repetição
foreach ($pedido as $pedidoTemporario ) {
 
    $pdf->SetFont('arial','B',12);
    $pdf->Cell(30,20,"ID: ",0,0,'L');
    $pdf->setFont('arial','',12);
    $pdf->Cell(0,20,$pedidoTemporario,['codigo'],0,1,'L');
     
    // $pdf->SetFont('arial','B',12);
    // $pdf->Cell(100,20,"Nome do Cliente: ",0,0,'L');
    // $pdf->setFont('arial','',12);
    // $pdf->Cell(0,20,"$pedidoTemporario",0,1,'L');
    
    // $pdf->SetFont('arial','B',12);
    // $pdf->Cell(100,20,"Nome do Salão: ",0,0,'L');
    // $pdf->setFont('arial','',12);
    // $pdf->Cell(0,20,$pedidoTemporario['nomeDoSalao'],0,1,'L');
    
    // $pdf->Ln(20);
    
    // $pdf->SetFont('arial','B',12);
    // $pdf->Cell(100,20,"Data do Pedido: ",0,0,'L');
    // $pdf->setFont('arial','',12);
    // $pdf->Cell(0,20,date('d/m/Y',  strtotime($pedidoTemporario['dataDoPedido'])),0,1,'L');

    // $pdf->SetFont('arial','B',12);
    // $pdf->Cell(100,20,"Bairo do Salão: ",0,0,'L');
    // $pdf->setFont('arial','',12);
    // $pdf->Cell(0,20,$pedidoTemporario['bairroDoSalao'],0,1,'L');

    // $pdf->SetFont('arial','B',12);
    // $pdf->Cell(100,20,"Descrição do Pedido: ",0,0,'L');
    // $pdf->setFont('arial','',12);
    // $pdf->Cell(0,20,$pedidoTemporario['descricaoDoPedido'],0,1,'L');
   
    // $pdf->SetFont('arial','B',12);
    // $pdf->Cell(100,20,"Metodo de Pagamento: ",0,0,'L');
    // $pdf->setFont('arial','',12);
    // $pdf->Cell(0,20,$pedidoTemporario['metodoDePagamento'],0,1,'L');

    // $pdf->SetFont('arial','B',12);
    // $pdf->Cell(100,20,"Parcelamento: ",0,0,'L');
    // $pdf->setFont('arial','',12);
    // $pdf->Cell(0,20,$pedidoTemporario['parcelamento'],0,1,'L');

}
    //gerando o arquivo pedidoAlfparf.pdf
    $pdf->Output('pedidoAlfparf.pdf', 'I');
   ?>
