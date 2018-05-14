<?php
    require('../fpdf.php');
    include('../../conexion.php');   
    session_start();
    $userId = $_SESSION['userId'];

    $consulta = mysqli_query($conexion, "SELECT `username`, `address`, `phone` FROM clients where id = ".$userId."");
    $clientRow = mysqli_fetch_array($consulta);
    
    
$pdf = new FPDF();
$pdf->AliasNbPages();
$contPage = 1;
//CABECERA
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetTextColor(0, 0, 255);
$pdf->Image('../../images/icons/letras.png', 10, 8, 50);
$pdf->SetFont('Arial','B',11);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(70, 8, '', 0);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(100,10,'Aliados del software', 0);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,10,'No. Pag:  '.$pdf->PageNo().'/{nb}',0,0,'C');

$pdf->SetFont('Arial', 'B', 13);
$pdf->Ln(15); //salto de línea
$pdf->Cell(45,10,'Nombre del cliente:', 0);
$pdf->Cell(110,10, $clientRow['username'] , 0);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(30,10,'Fecha: '.date('d-m-Y').'', 100);

$pdf->SetFont('Arial', 'B', 13);
$pdf->Ln(7); //salto de línea
$pdf->Cell(45,10,'Direccion de envio:', 0);
$pdf->Cell(45,10, $clientRow['address'] , 0);

//REPORTE
$pdf->Ln(10); //salto de línea
//TITULO
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(100, 100, 100);
$pdf->Cell(80, 8, '', 0);
$pdf->Cell(120,10,'Pedido Generado', 0);
$pdf->Ln(10); //salto de línea

//COLUMNAS
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(100,100,100);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(33, 8, 'Cve. Producto', 1, 0, 'L', true);
$pdf->Cell(100, 8, 'Producto', 1, 0, 'L', true);
$pdf->Cell(30, 8, 'Cantidad', 1, 0, 'L', true);
$pdf->Cell(30, 8, 'Precio', 1, 0, 'L', true);


$pdf->Ln(8);

//FILAS
$pdf->SetFont('Arial', '', 12);
$pdf->SetFillColor(240,240,240);
$pdf->SetTextColor(0, 0, 0);


$ban = false;
$cont = 0;
$total = 0;


$consulta = mysqli_query($conexion, 'SELECT id, total from `sales` ORDER BY id DESC LIMIT 1');
$idClient = mysqli_fetch_array($consulta);

foreach ($conexion->query("SELECT * FROM sales_details where idSale = ".$idClient['id']."") as $row){
  $consulta = mysqli_query($conexion, 'SELECT `name` from `products` where id = '.$row['idProduct'].'');
  $productRow = mysqli_fetch_array($consulta);
    
    $pdf->Cell(33, 8, $row['idProduct'], 0, 0, 'L', $ban);
    $pdf->Cell(100, 8, $productRow['name'], 0, 0, 'L', $ban);
    $pdf->Cell(30, 8, $row['quantity'], 0, 0, 'R', $ban);
    $pdf->Cell(30, 8, '$ '.$row['price'], 0, 0, 'R', $ban);
    $pdf->Ln(9);
    $ban = !$ban;
    $cont+=1;
    if($cont >= 20){
        $cont=0;
        $contPage++;
        //CABECERA
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->SetTextColor(0, 0, 255);
        $pdf->Image('../../images/icons/letras.png', 10, 8, 50);
        $pdf->SetFont('Arial','B',11);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(70, 8, '', 0);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(100,10,'Aliados del software', 0);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(0,10,'No. Pag:  '.$pdf->PageNo().'/{nb}',0,0,'C');

        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Ln(15); //salto de línea
        $pdf->Cell(45,10,'Nombre del cliente:', 0);
        $pdf->Cell(110,10, $clientRow['username'] , 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(30,10,'Fecha: '.date('d-m-Y').'', 100);

        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Ln(7); //salto de línea
        $pdf->Cell(45,10,'Direccion de envio:', 0);
        $pdf->Cell(45,10, $clientRow['address'] , 0);

        //REPORTE
        $pdf->Ln(10); //salto de línea
        //TITULO
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetTextColor(100, 100, 100);
        $pdf->Cell(80, 8, '', 0);
        $pdf->Cell(120,10,'Pedido Generado', 0);
        $pdf->Ln(10); //salto de línea

        //COLUMNAS
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFillColor(100,100,100);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(33, 8, 'Cve. Producto', 1, 0, 'L', true);
        $pdf->Cell(100, 8, 'Producto', 1, 0, 'L', true);
        $pdf->Cell(30, 8, 'Cantidad', 1, 0, 'L', true);
        $pdf->Cell(30, 8, 'Precio', 1, 0, 'L', true);

        $pdf->Ln(8);

        //FILAS
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetFillColor(240,240,240);
        $pdf->SetTextColor(0, 0, 0);
    }    
}
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(168, 8, 'TOTAL:   $', 0, 0, 'R', $ban);
$pdf->Cell(25, 8, $idClient['total'], 0, 0, 'R', $ban);

//REPORTES PAGOS ADMI

$pdf->Output();

?>