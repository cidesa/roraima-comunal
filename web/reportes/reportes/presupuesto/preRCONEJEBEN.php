<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<style type="text/css">
<!--
.Estilo1 {color: #990000}
-->
</style>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
$bd=new basedatosAdo();

?>
<form name="form1" method="post" action="">
  <table width="760" height="40"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
    <tr> 
      <td width="190" rowspan="2" bgcolor="#003399" class="cell_left_line02"><img src="../../img/tl_logo_01.gif" width="190" height="40" border="0"></a></td>
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
          <table width="88%" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF"> 
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>CONSOLIDADO DE EJECUCION POR BENEFICIARIO  
                      <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td width="27%" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="32%"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="41%">&nbsp;</td>
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
            <tr>
              <td height="20" colspan="3" valign="top" class="form_label_01"><div align="center"><font color="#000066" size="3"><strong><em>Criterios 
                de Selecci&oacute;n</em></strong></font></div></td>
            </tr>
            <tr>
              <td height="20"></td>
              <td valign="top"><strong>DESDE</strong></td>
              <td valign="top"><strong>HASTA</strong></td>
            </tr>
            
            <tr>
              <td height="26" valign="top" class="form_label_01"><strong>Per&iacute;odo:</strong></td>
              <td valign="top"><?
				  $tb1=$bd->select("SELECT DISTINCT (perpre)  FROM cpasiini ORDER BY perpre asc");
				  ?>
                  <select name="per1" class="breadcrumb" id="per1">
                    <?
				  while(!$tb1->EOF)
				  {
					?>
                    <option value="<? print $tb1->fields["perpre"];?>"><? print $tb1->fields["perpre"];?></option>
                    <?
					$tb1->MoveNext();
				  }
				  ?>
                  </select>              </td>
              <td valign="top"><?
			  $tb4=$bd->select("SELECT DISTINCT (perpre)  FROM cpasiini ORDER BY perpre DESC");
			  ?>
                  <select name="per2" class="breadcrumb" id="per2">
                    <?
			  while(!$tb4->EOF)
			  {
			  	?>
                    <option value="<? print $tb4->fields["perpre"];?>"><? print $tb4->fields["perpre"];?></option>
                    <?
				$tb4->MoveNext();
			  }
			  ?>
                  </select>              </td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Fecha:</strong></td>
              <td><div align="left"> </div>
                  <div align="left">
                    <?
	  	        
			  	$tb=$bd->select("SELECT to_char(MIN(fecdissem),'DD/MM/YYYY') as fecha FROM bndissem");
				if(!$tb->EOF)
				{
					$fecini=$tb->fields["fecha"];
				}
	  	        
			  	$tb2=$bd->select("SELECT to_char(MAX(fecdissem),'DD/MM/YYYY') as fecha FROM bndissem");
				if(!$tb2->EOF)
				{
					$fecdes=$tb2->fields["fecha"];
				}
				
				?>
                    <input name="fec1" type="text" class="breadcrumb" id="fec1" datepicker="true" value="01/01/2007">
                </div></td>
              <td><input name="fec2" type="text" class="breadcrumb" id="fec2" datepicker="true" value="<? print date('d/m/Y'); ?>"></td>
            </tr>
            <tr>
              <td height="26" valign="top" class="form_label_01"><strong>Tipo Documento :</strong></td>
              <td valign="top">
                  <select name="tip1" class="breadcrumb" id="tip1">
                    <option value="t">Todos</option>
                    <option value="prc">Precompromisos</option>
                    <option value="com">Compromisos</option>
                    <option value="cau">Causados</option>
                    <option value="pag">Pagados</option>
                                                      </select>              </td>
              <td valign="top">&nbsp;</td>
            </tr>
            
            <tr>
              <td height="32" valign="top" class="form_label_01"><strong>C&oacute;digo Presupuestario:</strong></td>
              <td valign="top"><?
			  $tb1=$bd->select("SELECT distinct codpre FROM cpasiini ORDER BY codpre ASC");
			  ?>
                  <select name="cod1" class="breadcrumb" id="cod1">
                    <?
			  while(!$tb1->EOF)
			  {
			  	?>
                    <option value="<? print $tb1->fields["codpre"];?>"><? print $tb1->fields["codpre"];?></option>
                    <!--option value="08-001-401-01-18-00">08-001-401-01-18-00</option-->
                    <?
				$tb1->MoveNext();
			  }
			  ?>
                  </select>              </td>
              <td valign="top"><?
			  $tb1=$bd->select("SELECT distinct codpre  FROM cpasiini ORDER BY codpre DESC");
			  ?>
                  <select name="cod2" class="breadcrumb" id="cod2">
                    <?
			  while(!$tb1->EOF)
			  {
			  	?>
                    <option value="<? print $tb1->fields["codpre"];?>"><? print $tb1->fields["codpre"];?></option>
                    <!--option value="23-003-401-01-99-00">23-003-401-01-99-00</option-->
                    <?
				$tb1->MoveNext();
			  }
			  ?>
                </select></td>
            </tr>
            
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
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
	f.titulo.value="CONSOLIDADO DE EJECUCION POR BENEFICIARIO";
	f.action="rforRCONEJEBEN.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1()
{
 	pagina="catalogoform.php?campo=codpre1&sql=select codpre as campo1 from cpimpcom order by codpre asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
function catalogo2()
{
 	pagina="catalogoform.php?campo=codpre2&sql=select codpre as campo1 from cpimpcom order by codpre desc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
</script>
</html>
