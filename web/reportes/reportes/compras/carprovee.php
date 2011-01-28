<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link  href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript" src="../../lib/general/fecha.js"></script>
<style type="text/css">
<!--
.style1 {color: #0000CC}
-->
</style>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
$bd=new basedatosAdo();

$bd->validar();

?>

<form name="form1" method="post" action="">
  <table width="760" height="40"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
    <tr>
      <td width="190" rowspan="2" bgcolor="#003399" class="cell_left_line02"><img src="../../img/tl_logo_01.gif" width="190" height="40" border="0"></a></td>
      <td colspan="2" class="cell_date" align="right">
		<?
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S&aacute;bado");
		$mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$me=$mes[date('n')];
		echo $dias[date('w')].strftime(", %d de $me del %Y")."<br>";
		?>
		</td>
    </tr>
    <tr>
      <td width="313">&nbsp; </td>
      <td width="257" align="right" valign="middle" class="cell_logout">&nbsp;</td>
    </tr>
  </table>
  <table width="760"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td width="6" align="left" valign="top" class="cell_left_line02"><img src="../../img/center02_tl.gif" width="6" height="6"></td>
      <td rowspan="2" valign="top" class="cell_padding_01"> <p class="breadcrumb">Reportes
        </p>
        <fieldset>

        <div align="left">&nbsp;
          <table width="644" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Catalogo de Proveedores
                      <input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="180" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="180"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="270">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly="true"></td>
              <td> <div align="right"> </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Salida del
                  Reporte:</strong></div></td>
              <td> <div align="left"> </div>
                <div align="left"> <strong>
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
                  PANTALLA</strong></div></td>
              <td> <strong>
                <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton">
                IMPRESORA</strong></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios
                  de Selecci&oacute;n</em></strong></font></div></td>
                <tr bordercolor="#6699CC">
              <td height="23" bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>   HASTA</strong></td>
            </tr>
		<tr>
              <td class="form_label_01"> <div align="left"><strong>Ramo:</strong></div></td>
              <td> <div align="left">
			  <input name="ramodesde" id="ramodesde" class="breadcrumb"
			  		value="<?$sql="SELECT min(RAMART) as cod FROM CARAMART";
			  		LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button5" value="..." onClick=" catalogo2('ramodesde');">

                </div></td>

			  <td> <div align="left">
                  <input name="ramohasta" id="ramohasta" class="breadcrumb"
			  		value="<?$sql="SELECT max(RAMART) as cod FROM CARAMART";
			  		LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button5" value="..." onClick=" catalogo2('ramohasta');">
                    </div></td>
		</tr>
             <tr>
              <td class="form_label_01"> <div align="left"><strong>Rif Proveedor:</strong></div></td>
             <td> <div align="left">
               	<input name="rifdesde" type="text" class="breadcrumb" id="rifdesde"
                   value="<?$sql="SELECT min(RIFPRO) as cod FROM CAPROVEE";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button5" value="..." onClick=" catalogo4('rifdesde');">
 			      </div></td>

              <td> <div align="left">
               	<input name="rifhasta" type="text" class="breadcrumb" id="rifhasta"
                   value="<?$sql="SELECT max(RIFPRO) as cod FROM CAPROVEE";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button6" value="..." onClick=" catalogo4('rifhasta');">
 			      </div></td>

            </tr>
	 <tr>
              <td class="form_label_01"> <div align="left"><strong>Grupo Proveedor:</strong></div></td>
             <td> <div align="left">
               	<input name="codgruprodes" type="text" class="breadcrumb" id="codgruprodes"
                   value="<?$sql="SELECT MIN(CODTIPREC) as cod FROM CATIPREC ";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button5" value="..." onClick=" catalogo5('codgruprodes');">
 			      </div></td>

              <td> <div align="left">
               	<input name="codgruprohas" type="text" class="breadcrumb" id="codgruprohas"
                   value="<?$sql="SELECT Max(CODTIPREC) as cod FROM CATIPREC";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button6" value="..." onClick=" catalogo5('codgruprohas');">
 			      </div></td>

            </tr>

            	<tr bordercolor="#6699CC">
			  <td class="form_label_01"><strong>Ordenado Por: </strong></td>
			  <td colspan="2"><select name="orden" class="breadcrumb">
			    <option selected>CODIGO PROVEEDOR</option>
			    <option>NOMBRE PROVEEDOR</option>
		      </select></td>
		    </tr>



			   <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">&nbsp;</td>
            </tr>
          </table>
        </div>
        <div align="left">&nbsp; </div>
        </fieldset>
        <table width="356"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
          <tr>
            <td width="38" rowspan="3" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="258"><img src="../../img/box01_tl.gif" width="6" height="6"></td>
            <td width="60" align="right"><img src="../../img/box01_tr.gif" width="6" height="6"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input name="Button" type="button" class="form_button01" value="Generar" onClick="enviar()">
              <input name="Button" type="button" class="form_button01" value="   Salir    " onClick="cerrar()"> </td>
          </tr>
          <tr>
            <td><img src="../../img/box01_bl.gif" width="6" height="6"></td>
            <td align="right"><img src="../../img/box01_br.gif" width="6" height="6"></td>
          </tr>
        </table></td>
      <td width="6" align="right" valign="top"><img src="../../img/center01_tr.gif" width="6" height="6"></td>
      <td width="40" rowspan="2" align="center" bgcolor="#EEEEEE">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="bottom" class="cell_left_line02"><img src="../../img/center02_bl.gif" width="6" height="6"></td>
      <td align="right" valign="bottom"><img src="../../img/center01_br.gif" width="6" height="6"></td>
    </tr>
  </table>
</form>
</body>
<script language="javascript">
function enviar()
{
	f=document.form1;
	f.titulo.value="Catalogo de Proveedores";
	f.action="r.php?m=<?php echo TraerModuloReporte()?>&r=<?php echo TraerNombreReporte()?>";
	f.submit();
}
function cerrar()
{
	window.close();
}

function catalogo1(campo)
   {
      mysql='SELECT DISTINCT(UPPER(NOMPRO)) as CODIGO FROM CAPROVEE ORDER BY UPPER(NOMPRO)';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }
function catalogo2(campo)
   {
      mysql='SELECT DISTINCT(RAMART) as CODIGO, NOMRAM as nombre FROM CARAMART ORDER BY RAMART';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

function catalogo3(campo)
   {
      mysql='SELECT distinct(CODPRO) as CODIGO FROM CAPROVEE order by CODPRO';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

   function catalogo4(campo)
   {
      mysql='SELECT RIFPRO as codigo,nompro as Nombre FROM CAPROVEE order by RIFPRO';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }
   function catalogo5(campo)
   {
      mysql='SELECT CODTIPREC AS CODIGO, DESTIPREC AS DESCRIPCION FROM CATIPREC ORDER BY CODTIPREC ASC';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }


</script>
<?$bd->closed();?>
	</html>

	