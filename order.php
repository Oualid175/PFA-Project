<?php
 require_once('TCPDF-main/tcpdf.php');
 session_start();
 $database_name = "login";
 $con = mysqli_connect("localhost","root","",$database_name);
if (isset($_SESSION['cart']))
{
  $html = '
  <style>
    .orderinfo th{
      
      background-color: #ea8c2a;
      color: #FFFFFF;
    }
    .orderinfo{
      padding: 10px;
    }
    td {
    text-align: center;
}
  </style>
  <p><img style="width:45px;height:45px;" src="logo.png">
  <b><font style="color:#ea8c2a;">O</font>nline<font color="#ea8c2a"> S</font>tore</a><br>
  <table>
   <tr><td><b>Client : </b>'.$_SESSION['username'].'</td></tr>
  </table>
  <div style="border-bottom: 1px solid black;"></div>
  <table>
    <tr>
      <td><b><br>Order_Detail</b></td>
    </tr>
    <tr>
     <td><b>Date </b>'.date('d-m-Y  h:i:sa').'</td>
    </tr>
  </table>
  <div style="border-bottom: 1px solid #000000;"></div>
  <br />
  ';
  if (isset($_SESSION["cart"])){
    $html .= '<table class="orderinfo">
           <tr>
             <th width="10%">Id</th>
             <th width="40%">Name</th>
             <th width="20%">Unit Price</th>
             <th width="15%">Quantity</th>
             <th width="15%">Total</th>
           </tr>
    ';
    $total=0;
  foreach ($_SESSION["cart"] as $keys => $value){
$total1=0;
$total1=$total1 + ($value["item_quantity"] * $value["product_price"]);
   $html .= '
         <tr>
            <td>'.$value["product_id"].'</td>
            <td>'.$value["item_name"].'</td>
            <td>$'.$value["product_price"].'</td>
            <td>'.$value["item_quantity"].'</td>
            <td>'.$total1.' $</td>
         </tr>
   ';
   $total=$total + ($value["item_quantity"] * $value["product_price"]);
  }
  $html .= '<tr>
  <th ></th>
  <th ></th>
  <th > </th>
  <th >Total :</th>
  <th>'.number_format($total, 2).'$</th>
  </tr>
  </table>
  ';
  }
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Osmane');
$pdf->SetTitle('INVOICE');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords(', , , , ');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setPrintHeader(false);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->SetFont('helvetica', '', 10);
$pdf->AddPage();
$pdf->writeHTML($html, true, false, true, false, '');




// $filename= "test";

// $location = "/opt/lampp/htdocs/registration/register/2019/".$filename.".pdf";

// switch ($pdf->Output("F", $location)) {
  
//   default:
//   header("location:fakehome.php");

// }

$pdf->Output('invoice.pdf', 'I');


// header('location:fakehome.php'); // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}else{
  header('location:cart2.php');
}


