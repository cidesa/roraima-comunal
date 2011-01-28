<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/19 16:41:52
?>
<?php echo form_tag('almcontrato/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($caordcon, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('caordcon[ordcon]', __($labels['caordcon{ordcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcon{ordcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcon{ordcon}')): ?>
    <?php echo form_error('caordcon{ordcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcon, 'getOrdcon', array (
  'size' => 20,
  'control_name' => 'caordcon[ordcon]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
&nbsp;
&nbsp;
<strong>Fecha</strong>
&nbsp;
<?php $value = object_input_date_tag($caordcon, 'getFeccon', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caordcon[feccon]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('caordcon[tipcon]', __($labels['caordcon{tipcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcon{tipcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcon{tipcon}')): ?>
    <?php echo form_error('caordcon{tipcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcon, 'getTipcon', array (
  'size' => 20,
  'control_name' => 'caordcon[tipcon]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo button_to('...','#')?>
&nbsp;
<?php echo input_tag('doctip',$doctip,'size=50,disabled=true') ?>
    </div>
</div>
<div class="form-row">
<strong>Referencia</strong>
&nbsp;
<?php echo input_tag('almacena','','size=20') ?>
&nbsp;
<?php echo button_to('...','#')?>
&nbsp;
<?php echo input_tag('almacena','','size=50,disabled=true') ?>
</div>

<div class="form-row">
  <?php echo label_for('caordcon[codpro]', __($labels['caordcon{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcon{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcon{codpro}')): ?>
    <?php echo form_error('caordcon{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcon, 'getCodpro', array (
  'size' => 20,
  'control_name' => 'caordcon[codpro]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo button_to('...','#')?>
&nbsp;
<?php echo input_tag('enom',$enom,'size=50,disabled=true') ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('caordcon[descon]', __($labels['caordcon{descon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcon{descon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcon{descon}')): ?>
    <?php echo form_error('caordcon{descon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($caordcon, 'getDescon', array (
  'size' => '80x5',
  'control_name' => 'caordcon[descon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('caordcon[objcon]', __($labels['caordcon{objcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcon{objcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcon{objcon}')): ?>
    <?php echo form_error('caordcon{objcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcon, 'getObjcon', array (
  'size' => 80,
  'control_name' => 'caordcon[objcon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<table width="100%" height="117" border="0">
  <tr>
    <td width="50%">
    <fieldset id="sf_fieldset_none" class="">
    <legend>Inicio de los Trabajos</legend>
    <div class="form-row">
  <?php echo label_for('caordcon[fecini]', __($labels['caordcon{fecini}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcon{fecini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcon{fecini}')): ?>
    <?php echo form_error('caordcon{fecini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($caordcon, 'getFecini', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caordcon[fecini]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<div class="form-row">
  <?php echo label_for('caordcon[mulatrini]', __($labels['caordcon{mulatrini}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcon{mulatrini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcon{mulatrini}')): ?>
    <?php echo form_error('caordcon{mulatrini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcon, 'getMulatrini', array (
  'size' => 7,
  'control_name' => 'caordcon[mulatrini]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    &nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</div>
</fieldset>
</td>
    <td width="50%">
    <fieldset id="sf_fieldset_none" class="">
    <legend>Culminacion de los Trabajos</legend>
    <div class="form-row">
  <?php echo label_for('caordcon[feccul]', __($labels['caordcon{feccul}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcon{feccul}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcon{feccul}')): ?>
    <?php echo form_error('caordcon{feccul}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($caordcon, 'getFeccul', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caordcon[feccul]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('caordcon[mulatrcul]', __($labels['caordcon{mulatrcul}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcon{mulatrcul}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcon{mulatrcul}')): ?>
    <?php echo form_error('caordcon{mulatrcul}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcon, 'getMulatrcul', array (
  'size' => 7,
  'control_name' => 'caordcon[mulatrcul]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</div>
</fieldset>
</td>
  </tr>
</table>

<div class="form-row">
<strong>Duracion en D&iacute;as</strong>
&nbsp;
<?php echo input_tag('almacena','','size=20,disabled=true') ?>
&nbsp;
&nbsp;
&nbsp;
  <strong>Lapso de Garant&iacute;a</strong>
  <?php $value = object_input_tag($caordcon, 'getLapgar', array (
  'size' => 7,
  'control_name' => 'caordcon[lapgar]',
)); echo $value ? $value : '&nbsp;' ?><strong>D&iacute;as</strong>
&nbsp;
&nbsp;
&nbsp;
<strong>Nro. de Cuotas</strong>
<?php $value = object_input_tag($caordcon, 'getCancuo', array (
  'size' => 7,
  'control_name' => 'caordcon[cancuo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<div class="grid01" id="grid01">
<fieldset>
<legend>Detalles de Solicitud</legend>
<table border="0" class="sf_admin_list">
<? 
$titulo=array(0 => 'Codigo Presupuestario', 1 => 'Descripcion', 2 => 'Cantidad', 3 => 'Monto');

if ( count($rs)>0){
$i=0;
foreach ($rs as $k=>$fila) {
    $i++;
    if($i==1){?>
      <thead><tr>
    <? foreach ($fila as $key => $value){?>
        <th><?=$titulo[$key]?></th>
    <? }?>
      </tr> </thead>
    <? }?>
<tr>
<? foreach ($fila as $key => $value){?>
    <td><?=$value?></td>
<? }?>
</tr>
<? }
  }
?></table>
</fieldset>
</div>

<?php include_partial('edit_actions', array('caordcon' => $caordcon)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($caordcon->getId()): ?>
<?php echo button_to(__('delete'), 'almcontrato/delete?id='.$caordcon->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
