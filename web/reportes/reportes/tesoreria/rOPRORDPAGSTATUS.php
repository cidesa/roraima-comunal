<?
	
	require_once("pdfOPRORDPAGSTATUS.php");
	
		
	$obj= new pdfreporte();
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>