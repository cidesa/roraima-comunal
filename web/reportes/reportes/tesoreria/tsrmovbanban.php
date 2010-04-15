<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link  href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript" src="../../lib/general/fecha.js"></script>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
$bd=new basedatosAdo();
#$bd->validar();
function LlenarTextoSql($sql,$campo1,$con)
  {
     $tb=$con->select($sql);
	 if (!$tb->EOF)
	 {
	   print $tb->fields[$campo1];
	 }
	 else
	 {
	   print "";
	 }
  }


?>
<form name="form1" method="post" action="rtsrvoucher.php">
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
          <table width="612" align="center" cellpadding="0" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <!--DWLayoutTable-->
            <tr>
              <td width="190" height="10"></td>
              <td width="200"></td>
              <td width="209"></td>
              <td width="3"></td>
            </tr>
            <!--DWLayoutTable-->
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>MOVIMIENTOS SEGUN BANCOS POR BANCO
                      <input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
              <td></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="40"></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="25" valign="top" class="form_label_01"> <div align="left"><strong>Salida del
              Reporte:</strong></div></td>
              <td valign="top"> <div align="left"> </div>                <div align="left"> <strong>
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
              PANTALLA</strong></div></td>
              <td valign="top"> <strong>
                <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton">
              IMPRESORA</strong></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="31">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="20" colspan="3" valign="top" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios
              de Selecci&oacute;n</em></strong></font></div></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="20">&nbsp;</td>
              <td><div align="center"><strong>DESDE</strong></div></td>
              <td><div align="center"><strong>HASTA</strong></div></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="8"></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="32" valign="top" class="form_label_01"><p><strong>N&ordm; Cta Bancaria</strong><strong>:</strong></p>              </td>
              <td colspan="2" valign="top">

              	  	<input type="text" size="50px" name="numcuedes" value="<? $sql="select min(numcue) as num from tsdefban";
                LlenarTextoSql($sql,"num",$bd); ?>" id="numcuedes" class="breadcrumb"/>
  				<input type="button" name="btnCatalogo" value="..." onClick="catalogo1('numcuedes');"/> </td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="28" valign="top" class="form_label_01"><strong>Tipo de Movimiento : </strong></td>
              <td valign="top"><?
			  $sql="select distinct(codtip) as codtip from tstipmov order by codtip";


			  $tb1=$bd->select($sql);
			  ?>
                <select name="tipodes" class="breadcrumb" id="tipodes">
                  <?
			  while(!$tb1->EOF)
			  {
			  	?>
                  <option value="<? print $tb1->fields["codtip"];?>"><? print trim($tb1->fields["codtip"]);?></option>
                  <?
				$tb1->MoveNext();
			  }
			  ?>
                </select></td>
              <td valign="top"><?
			  $sql="select distinct(codtip) as codtip from tstipmov order by codtip desc";
			  $tb1=$bd->select($sql);
			  ?>
                <select name="tipohas" class="breadcrumb" id="tipohas">
                  <?
			  while(!$tb1->EOF)
			  {
			  	?>
                  <option value="<? print $tb1->fields["codtip"];?>"><? print trim($tb1->fields["codtip"]);?></option>
                  <?
				$tb1->MoveNext();
			  }
			  ?>
                </select></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="28" valign="top" class="form_label_01"><strong>Referencia:</strong></td>
              <td valign="top">
              	  	<input type="text"  name="refbancdes" value="<? $sql="SELECT min(REFBAN) as refban FROM TSMOVBAN";
                LlenarTextoSql($sql,"refban",$bd); ?>" id="refbancdes" class="breadcrumb"/>
  				<input type="button" name="btnCatalogo2" value="..." onClick="catalogo2('refbancdes');"/></td>
              <td valign="top">
              	  	<input type="text"  name="refbanchas" value="<? $sql="SELECT max(REFBAN) as refban FROM TSMOVBAN";
                LlenarTextoSql($sql,"refban",$bd); ?>" id="refbanchas" class="breadcrumb"/>
  				<input type="button" name="btnCatalogo3" value="..." onClick="catalogo2('refbanchas');"/>
                </select></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="28" valign="top" class="form_label_01"><strong>Fecha Movimiento:</strong></td>
              <td valign="top">
              <?
			  $sql="SELECT to_char(min(fecban),'dd/mm/yyyy') as fecban FROM TSMOVBAN";
			  $tb1=$bd->select($sql);
			  ?>

                <input type="text" name="fecha_tra_des" datepicker="true" id="fecha_tra_des" value="<? print $tb1->fields["fecban"];?>" class="breadcrumb">
                </td>
              <td valign="top"><?
			  $sql="SELECT to_char(max(fecban),'dd/mm/yyyy') as fecban FROM TSMOVBAN";
			  $tb1=$bd->select($sql);
			  ?>

                 <input type="text" name="fecha_tra_has" datepicker="true" id="fecha_tra_has" value="<? print $tb1->fields["fecban"];?>" class="breadcrumb">
               </td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="28" valign="top" class="form_label_01"><strong>Estatus de Movimiento : </strong></td>
              <td colspan="2" valign="top"><select name="status" class="breadcrumb" id="status">
                <option value="T">Todos</option>
                <option value="A">Anulados</option>
                <option value="C">Contabilizados</option>
                <option value="NC">No Contabilizados</option>
                <option value="TMA">Todos Menos Anulados</option>
              </select>
              </td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">Orientaci&oacute;n del Reporte: Carta/Horizontal </td>
              <td></td>
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
	f.titulo.value="MOVIMIENTOS SEGUN BANCOS POR BANCO";
	f.action="rtsrmovbanban.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct numcue,nomcue from tsdefban order by numcue";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
function catalogo2(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT distinct (REFBAN) FROM TSMOVBAN order by refban";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
</script>
<? $bd->closed(); ?>
</html>
