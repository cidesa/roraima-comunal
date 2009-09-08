<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/10 12:00:07
?>
<?php echo form_tag('facconvenio/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fcconpag, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('fcconpag[refcon]', __($labels['fcconpag{refcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcconpag{refcon}')): ?> form-error<?php endif; ?>"></div>
  <?php if ($sf_request->hasError('fcconpag{refcon}')): ?>
    <?php echo form_error('fcconpag{refcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcconpag, 'getRefcon', array (
  'size' => 20,
  'control_name' => 'fcconpag[refcon]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Fecha del Registro</strong>
<?php $value = object_input_date_tag($fcconpag, 'getFeccon', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcconpag[feccon]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>    
</div>
</fieldset>

<br>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Datos del Contribuyente');?>
<div class="form-row">
  <?php echo label_for('fcconpag[rifcon]', __($labels['fcconpag{rifcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcconpag{rifcon}')): ?> form-error<?php endif; ?>"></div>
  <?php if ($sf_request->hasError('fcconpag{rifcon}')): ?>
    <?php echo form_error('fcconpag{rifcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcconpag, 'getRifcon', array (
  'size' => 20,
  'control_name' => 'fcconpag[rifcon]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;
<?php echo button_to('...','#')?>
&nbsp;&nbsp;
<strong>Nombre</strong>
<?php $value = object_input_tag($fcconpag, 'getNomcon', array (
  'disabled' => true,
  'control_name' => 'fcconpag[nomcon]',
)); echo $value ? $value : '&nbsp;' ?>    
</div>


<div class="form-row">
  <?php echo label_for('fcconpag[dircon]', __($labels['fcconpag{dircon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcconpag{dircon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcconpag{dircon}')): ?>
    <?php echo form_error('fcconpag{dircon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcconpag, 'getDircon', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'fcconpag[dircon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row" align="center">
<table border="0">
  <tr>
    <th><fieldset id="sf_fieldset_none" class="">
<legend>Nacionalidad</legend>
<div class="form-row">
<?
if ($fcconpag->getNaccon()=='V')	{
  ?><?php echo radiobutton_tag('fcconpag[naccon]', 'V', true, 'disabled=true')        ."Venezolano(a)".'&nbsp;&nbsp;';
		  echo radiobutton_tag('fcconpag[naccon]', 'E', false, 'disabled=true')."   Extranjero(a)";?>
		<?

}else{
	echo radiobutton_tag('fcconpag[naccon]', 'V', false, 'disabled=true')        ."Venezolano(a)".'&nbsp;&nbsp;';
	echo radiobutton_tag('fcconpag[naccon]', 'E', true, 'disabled=true')."   Extranjero(a)";

} ?> </div></fieldset></th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th><fieldset id="sf_fieldset_none" class="">
<legend>Tipo</legend>
<div class="form-row">
<?
if ($fcconpag->getTipcon()=='N')	{
  ?><?php echo radiobutton_tag('fcconpag[tipcon]', 'N', true, 'disabled=true')        ."Natural".'&nbsp;&nbsp;';
		  echo radiobutton_tag('fcconpag[tipcon]', 'J', false, 'disabled=true')."   Jurídica";?>
		<?

}else{
	echo radiobutton_tag('fcconpag[tipcon]', 'N', false, 'disabled=true')        ."Natural".'&nbsp;&nbsp;';
	echo radiobutton_tag('fcconpag[tipcon]', 'J', true, 'disabled=true')."   Jurídica";

} ?></div></fieldset></th>
  </tr>
</table> 
</div>
<?php tabInit("tp1", "0");?>

<br>


<?php tabMainJS("tp2","tabPane2", "tabPage1", 'Datos del Registro');?>
<div class="form-row">
  <?php echo label_for('fcconpag[obscon]', __($labels['fcconpag{obscon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcconpag{obscon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcconpag{obscon}')): ?>
    <?php echo form_error('fcconpag{obscon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fcconpag, 'getObscon', array (
  'size' => '80x5',
  'control_name' => 'fcconpag[obscon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <strong>Monto del Impuesto a Pagar</strong>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <?php $value = object_input_tag($fcconpag, 'getMoncon', array (
  'size' => 7,
  'control_name' => 'fcconpag[moncon]',
)); echo $value ? $value : '&nbsp;' ?>    
</div>

<?php tabPageOpenClose("tp2", "tabPage2", 'Recepción');?>
<div class="form-row">
  <?php echo label_for('fcconpag[funrec]', __($labels['fcconpag{funrec}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcconpag{funrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcconpag{funrec}')): ?>
    <?php echo form_error('fcconpag{funrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcconpag, 'getFunrec', array (
  'size' => 80,
  'control_name' => 'fcconpag[funrec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fcconpag[fecrec]', __($labels['fcconpag{fecrec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcconpag{fecrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcconpag{fecrec}')): ?>
    <?php echo form_error('fcconpag{fecrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fcconpag, 'getFecrec', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcconpag[fecrec]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<?php tabPageOpenClose("tp2", "tabPage3", 'Distribución Pago');?>

<form name="form1" id="form1">
<?
echo grid_tag($obj);
?>
</form>

<?php tabPageOpenClose("tp2", "tabPage4", 'Distribución Convenio');?>
<div class="form-row" >
<table>
<tr>
<th>
<?php echo label_for('Total a Pagar', __('Total a Pagar'), 'class="required" ') ?> 
<?php echo input_tag('totalpag', '', 'size=20 disabled=true') ?>
</th>
<th><?php echo label_for('-', __('-'), 'class="required" ') ?></th>
<th>
<?php echo label_for('Total Monto', __('Total Monto'), 'class="required" ') ?>
<?php echo input_tag('totalmon', '', 'size=20 disabled=true') ?>
</th>
<th><?php echo label_for('=', __('='), 'class="required" ') ?></th>
<th>
<?php echo label_for('Saldo', __('Saldo'), 'class="required" ') ?>
<?php echo input_tag('saldo', '', 'size=20 disabled=true') ?>
</th>
</tr>
</table>
</div>

<form name="form2" id="form2">
<?
echo grid_tag($obj2);
?>
</form>

<?php tabPageOpenClose("tp2", "tabPage5", 'Distribución por Rubro');?>

<form name="form3" id="form3">
<?
echo grid_tag($obj3);
?>
</form>

<?php tabInit("tp2");?>

<?php include_partial('edit_actions', array('fcconpag' => $fcconpag)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fcconpag->getId()): ?>
<?php echo button_to(__('delete'), 'facconvenio/delete?id='.$fcconpag->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
