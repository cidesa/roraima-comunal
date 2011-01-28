<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/09 17:27:37
?>
<?php
//ORDENES DE PAGO
if ( $sf_user->getAttribute('tschemi_operacion','vacio')=='ordpag' )
{
?>
<?php if (trim($mensajeBen)!="")
{
?>
<br>
<div align="center"><strong> <?php print $mensajeBen; ?> </strong></div>
<br>
<?php
 }//if (trim($mensajeBen)!="")
 ?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Ordenes de Pago')?></legend>
<div class="form-row">
<?php if ($tscheemi->getFilnumordfec()=='S') {?>
  <?php echo label_for('numeroord', __("N° Orden de Pago"), 'class="required" ') ?>
  <?php echo input_tag('tscheemi[numeroord]', $tscheemi->getNumeroord(), array (
         'size' => 15,
          'maxlength' => 8,
          'onBlur'=> remote_function(array(
            'update'   => 'divGrid',
	        'url'      => 'tesmovemiche/ajax',
	        'complete' => 'AjaxJSON(request, json)',
	        'script'   => true,
	        'condition' => "$('tscheemi_numeroord').value != ''",
	        'with' => "'ajax=7&cajtexmos=tscheemi_numeroord&mostrardato=S&operacion='+document.getElementById('tscheemi_operacion').value+'&numord='+$('tscheemi_numeroord').value+'&tipdoc='+$('tscheemi_tipdoc').value+'&numcue='+document.getElementById('tscheemi_numcue').value+'&fecord='+$('tscheemi_fecord').value"
	        ))
          ))?>
<br><br>

  <?php echo label_for('fecord', __("Fecha de Emisión"), 'class="required" ') ?>
  <?php echo input_date_tag('tscheemi[fecord]', $tscheemi->getFecord(), array (
         'size' => 10,
          'rich' => true,
          'calendar_button_img' => '/sf/sf_admin/images/date.png',
          'date_format' => 'date_format',
          'maxlength' => 10,
          'onkeyup' => "javascript: mascara(this,'/',patron,true)",
          'onBlur'=> remote_function(array(
            'update'   => 'divGrid',
	        'url'      => 'tesmovemiche/ajax',
	        'complete' => 'AjaxJSON(request, json)',
	        'script'   => true,
	        'condition' => "$('tscheemi_fecord').value != ''",
	        'with' => "'ajax=7&cajtexmos=tscheemi_fecord&mostrardato=S&operacion='+document.getElementById('tscheemi_operacion').value+'&numord='+$('tscheemi_numeroord').value+'&tipdoc='+$('tscheemi_tipdoc').value+'&numcue='+document.getElementById('tscheemi_numcue').value+'&fecord='+this.value"
	        ))
          ))?>
<br><br>
<?php } ?>
<?php if ($tscheemi->getTippagordpag()=='S') $val=true; else $val=false ?>
   <?php echo label_for('tipopagosop', __("Tipo de Pago(s)"), 'class="required" ') ?>
 <?php if ($bloqueaopc=="S")
   {
     echo " Simple " . radiobutton_tag('tscheemi[tippagordpag]', 'S', $val, array('onClick' => 'push();')) ?>
    &nbsp;&nbsp;
    <?php echo "  Compuesto" . radiobutton_tag('tscheemi[tippagordpag]', 'C', !$val,  array('onClick' => 'push();'))?>
 <?php
   }
   else
   {
      echo " Simple " . radiobutton_tag('tscheemi[tippagordpag]', 'S', $val) ?>
    &nbsp;&nbsp;
    <?php echo "  Compuesto" . radiobutton_tag('tscheemi[tippagordpag]', 'C', !$val)?>
 <?php
   }
 ?>
<br>
<br>
<br>
  <?php echo label_for('descripcionop', __("Descripción del Pago"), 'class="required" ') ?>
  <?php echo textarea_tag('tscheemi[descriordpag]', $tscheemi->getDescriordpag(), 'size=104x3')?>
<br>
<br>
<table>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
    <?php echo label_for('montototalop', __("Monto Total"), 'class="required"') ?>
    <?php echo input_tag('tscheemi[montotordpag]', $tscheemi->getMontotordpag(),'readonly=true  size=15'  ) ?>
</th>
</tr>
<tr>
</table>
<form name="form1" id="form1">
<?
  echo grid_tag($gridOrdPag);
?>
</form>
</div>
</fieldset>
<?
}
//COMPROMISOS
if ( $sf_user->getAttribute('tschemi_operacion','vacio')=='compro' )
{
?>
<?php if (trim($mensajeBen)!="")
{
?>
<br>
<div align="center"><strong> <?php print $mensajeBen; ?> </strong></div>
<br>
<?php
 }//if (trim($mensajeBen)!="")
 ?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Compromisos Pendientes')?></legend>
<div class="form-row">
<table>
<tr>
<th colspan=4>
<form name="form1" id="form1">
<?
  echo grid_tag($gridCompro);
?>
</form>
</th>
</tr>
<tr>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
    <?php echo label_for('montotcomcom', __("Monto Total"), 'class="required"') ?>
    <?php echo input_tag('tscheemi[montotcompro]', $tscheemi->getMontotcompro(),'readonly=true  size=15'  ) ?>
</th>
</tr>
<tr>
</table>
</div>
</fieldset>
<?
}
//PRECOMPROMISOS
if ( $sf_user->getAttribute('tschemi_operacion','vacio')=='precom' )
{
?>
<?php if (trim($mensajeBen)!="")
{
?>
<br>
<div align="center"><strong> <?php print $mensajeBen; ?> </strong></div>
<br>
<?php
 }//if (trim($mensajeBen)!="")
 ?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Precompromisos Pendientes')?></legend>
<div class="form-row">
<table>
<tr>
<th colspan=4>
<form name="form1" id="form1">
<?
  echo grid_tag($gridPrecom);
?>
</form>
</th>
</tr>
<tr>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
    <?php echo label_for('montotcompre', __("Monto Total"), 'class="required"') ?>
    <?php echo input_tag('tscheemi[montotprecom]', $tscheemi->getMontotprecom(),'readonly=true  size=15'  ) ?>
</th>
</tr>
<tr>
</table>
</div>
</fieldset>
<?
}
//PAGOS NO AFECTA PRESUPUESTO
if ( $sf_user->getAttribute('tschemi_operacion','vacio')=='pagnopre' )
{
?>
<br>
<div id="sf_admin_container">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Pago que No Afecta a Presupuesto')?></legend>
<div class="form-row">
   <?php echo label_for('concepto', __("Concepto"), 'class="required" ') ?>
   <?php echo input_tag('tscheemi[conceppagnap]', $tscheemi->getConceppagnap(),'size=80'  ) ?>
<br>
<br>
<table>
<tr>
<th>
    <?php echo label_for('montocheque', __("Monto del Cheque"), 'class="required" ') ?>
  <?php echo input_tag('tscheemi[montotpagnap]', $tscheemi->getMontotpagnap(), 'size=15 onKeypress=mientermonto(event,this.id,"tscheemi_mondtopagnap","tscheemi_montotpagnap","tscheemi_totnetpagnap")'  ) ?>
</th>
<th>
&nbsp;&nbsp;&nbsp;
</th>
<th>
    <?php echo label_for('descuento', __("Descuento"), 'class="required" ') ?>
  <?php echo input_tag('tscheemi[mondtopagnap]', $tscheemi->getMondtopagnap(),'size=15  onKeypress=mientermonto(event,this.id,"tscheemi_mondtopagnap","tscheemi_montotpagnap","tscheemi_totnetpagnap")'  ) ?>
  </th>
</tr>
</table>

  <?php echo label_for('conceptodto', __("Concepto de Descuento"), 'class="required" ') ?>
    <?php echo input_tag('tscheemi[condtopagnap]', $tscheemi->getCondtopagnap(), 'size=80')?>
<br>
<br>
  <?php echo label_for('netopagar', __("Neto a Pagar"), 'class="required"') ?>
    <?php echo input_tag('tscheemi[totnetpagnap]', $tscheemi->getTotnetpagnap(),'readonly=true  size=15'  ) ?>
</div>
</fieldset>
</div>
<?
}
//PAGOS DIRECTOS
if ( $sf_user->getAttribute('tschemi_operacion','vacio')=='pagdir' )
{
?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Pago Directo')?></legend>
<div class="form-row">
   <?php echo label_for('conceptopd', __("Concepto"), 'class="required" ') ?>
   <?php echo input_tag('tscheemi[conceppagdir]', $tscheemi->getConceppagdir(),'size=124'  ) ?>
<br>
<br>
<table>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
    <?php echo label_for('netopagarpd', __("Neto a Pagar"), 'class="required"') ?>
    <?php echo input_tag('tscheemi[totnetpagdir]', $tscheemi->getTotnetpagdir(),'readonly=true  size=15'  ) ?>
</th>
</tr>
<tr>
<th colspan=3>
<form name="form1" id="form1">
<?
  echo grid_tag($gridPagdir);
?>
</form>
</th>
</tr>
<tr>
<th>
   <?php echo label_for('descuentopd', __("Descuento"), 'class="required" ') ?>
  <?php echo input_tag('tscheemi[mondtopagdir]', $tscheemi->getMondtopagdir(),'size=15  onKeypress=mientermonto(event,this.id,"tscheemi_mondtopagdir","tscheemi_totnetpagdir","tscheemi_totnetpagdir")'  ) ?>
</th>
<th colspan=2>
  <?php echo label_for('conceptodtopd', __("Concepto Descuento"), 'class="required"  style="width:135px" ') ?>
    <?php echo input_tag('tscheemi[condtopagdir]', $tscheemi->getCondtopagdir(), 'size=60')?>
</th>
</tr>
</table>
</div>
</fieldset>
<?
}
?>