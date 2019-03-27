<?php

include_once("../fpdf/fpdf.php");

if($_GET["order_date"])
{

	 
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont("ARIAL","B",16);
	$pdf->Cell(190,20,"Inventary Management System",0,1,"C");
	$pdf->SetFont("ARIAL",null,12);
	$pdf->Cell(40,10,"Order Date :",0,0);
	$pdf->Cell(40,10,$_GET["order_date"],0,1);

	$pdf->Cell(40,10,"Customer Name: ",0,0);
	$pdf->Cell(40,10,$_GET["cust_name"],0,1);
	$pdf->Cell(50,10,"",0,1);


	$pdf->Cell(10,10,"#",1,0,"C");
	$pdf->Cell(70,10,"Product Name",1,0,"C");
	$pdf->Cell(30,10,"Quantity",1,0,"C");
	$pdf->Cell(40,10,"Price",1,0,"C");
	$pdf->Cell(40,10,"Total",1,1,"C");

    $arr_prod=$_GET["product_name"]; 
    $arr_qty =$_GET["qty"];
    $arr_price = $_GET["price"];

	for($i=0;$i<count($arr_prod);$i++)
	{
		$pdf->Cell(10,10,($i+1),1,0,"C");
		$pdf->Cell(70,10,$arr_prod[$i],1,0,"C");
		$pdf->Cell(30,10,$arr_qty[$i],1,0,"C");
		$pdf->Cell(40,10,$arr_price[$i],1,0,"C");
		$pdf->Cell(40,10,$arr_qty[$i]*$arr_price[$i],1,1,"C");
	}

	$pdf->Cell(50,10,"",0,1);


    $pdf->Cell(40,10,"SubTotal",0,0);
    $pdf->Cell(40,10,$_GET["subtotal"],0,1);

    $pdf->Cell(40,10,"GST",0,0);
    $pdf->Cell(40,10,$_GET["GST"],0,1);

    $pdf->Cell(40,10,"Discount",0,0);
    $pdf->Cell(40,10,$_GET["Discount"],0,1);

    $pdf->Cell(40,10,"Net Total",0,0);
    $pdf->Cell(40,10,$_GET["nettotal"],0,1);

    $pdf->Cell(40,10,"paid",0,0);
    $pdf->Cell(40,10,$_GET["paidAmount"],0,1);

    $pdf->Cell(40,10,"due",0,0);
    $pdf->Cell(40,10,$_GET["due"],0,1);

    $pdf->Cell(180,10,"Signature",0,1,"R");

	$pdf->Output();
}

?>