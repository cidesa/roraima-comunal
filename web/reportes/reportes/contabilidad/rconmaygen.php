<?
	
	require_once("pdfconmaygen.php");
	
	
	$obj= new pdfreporte();

	$obj->AddPage();
	$obj->AliasNbPages(); 
	$obj->Cuerpo();
	$obj->Output();
?>