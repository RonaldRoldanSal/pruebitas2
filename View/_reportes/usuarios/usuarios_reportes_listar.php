<?php
require('fpdf2/fpdf.php');
require_once("../../_reportes/conexion.php");

class PDF extends FPDF
 {

   function Header()
   {
      $this->Image('../../_recursos/img/logologo.png',10,8,25,28);//x,y,ancho,alto
      $this->SetFont('Arial','B',16); ////el B es en negrita
      //$this->SetXY(110, 30);
      
      $this->Cell(0,40,'Reporte de Usuarios',0,1,'C');///el cero indica que la celda ocupa el ancho de la pagina

      ///datos de la empresa
      $this->SetXY(10, 30 );
      $this->SetFont('Arial','',10);
      $this->Cell(5,20,'Empresa de Transporte el Peruanito SAC');
      $this->SetXY(10, 30);
      $this->Cell(15,29,'R.U.C: 20515625349');
      $this->SetXY(10, 30);
      $this->Cell(15,38,'Chimbote');
      $this->Ln();

      ////saltos de linea       $this->Ln();//Salto de línea para generar otra fila
   }

   // utilizamos la funcion Footer() y la personalizamos para que muestre el pie de página
    function Footer()
     
    {
        // Seteamos la posicion de la proxima celda en forma fija a 1,5 cm del final de la pagina
     
        $this->SetY(-15);
        // Seteamos el tipo de letra Arial italica 10
     
        $this->SetFont('Arial','I',10);
        // Número de página
     
        $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
    }

 } /////fin del fpdf

$pdf = new PDF('L','mm','A4'); ///tamaño del reporte 

$pdf->AddPage();


/* ******************* DATOS ******************************************* */

    $cnn = conectar();
    $query = "SELECT user.user_id, tipuser.tipuser_desc, user.user_nomb, user.user_pass, user.user_email, user.user_fechalta, user.user_estd FROM user INNER JOIN tipuser ON user.tipuser_id = tipuser.tipuser_id";

    $resp = mysql_query($query, $cnn) or die(mysql_error());
   

        $pdf->SetX(60);///posicion del titulo
        
        $pdf->SetFont('Arial','B',11);
        $pdf->SetFillColor(60,168,245);//Fondo azul de celda
        $pdf->Cell(15,6,'ID',1,0,'C');
        $pdf->Cell(35,6,'TIPO USUARIO',1,0,'C');
        $pdf->Cell(30,6,'USUARIO',1,0,'C');
        $pdf->Cell(30,6,'PASSWORD',1,0,'C');
        $pdf->Cell(60,6,'EMAIL',1,0,'C');
        $pdf->Cell(30,6,'FECHA DE ALTA',1,0,'C');
        $pdf->Cell(20,6,'ESTADO',1,1,'C');
        

    while ($row=mysql_fetch_array($resp)) {
        # code...

        $pdf->SetFont('Arial','',10);
        $pdf->SetX(60);////posicion de los datos
        $pdf->Cell(15,6,$row["user_id"],1,0,'C');
        $pdf->Cell(35,6,$row["tipuser_desc"],1,0,'C');
        $pdf->Cell(30,6,$row["user_nomb"],1,0,'C');
        $pdf->Cell(30,6,$row["user_pass"],1,0,'C');
        $pdf->Cell(60,6,$row["user_email"],1,0,'C');
        $pdf->Cell(30,6,$row["user_fechalta"],1,0,'C');
        $pdf->Cell(20,6,$row["user_estd"],1,1,'C');
    }


$pdf->Output(); //Salida al navegador

?>