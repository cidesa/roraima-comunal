<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/01 10:02:45
?>
<?php echo form_tag('almconpag/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php use_helper('SubmitClick') ?>
<?php echo object_input_hidden_tag($caconpag, 'getId') ?>

<fieldset id="sf_fieldset_none" class=""><legend><?php echo __('Condición de Pago');?></legend>

<div class="form-row"><?php echo label_for('caconpag[codconpag]', __($labels['caconpag{codconpag}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caconpag{codconpag}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caconpag{codconpag}')): ?> <?php echo form_error('caconpag{codconpag}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($caconpag, 'getCodconpag', array (
    'size' => 5,
    'maxlength' => 4,
    'readonly'  =>  $caconpag->getId()!='' ? true : false ,
    'control_name' => 'caconpag[codconpag]',
    'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('caconpag_codconpag').value=valor;",
    )); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<?php echo label_for('caconpag[desconpag]', __($labels['caconpag{desconpag}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caconpag{desconpag}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caconpag{desconpag}')): ?> <?php echo form_error('caconpag{desconpag}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caconpag, 'getDesconpag', array (
  'size' => 80,
'maxlength' => 255,
  'control_name' => 'caconpag[desconpag]',
    'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>

</div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('caconpag' => $caconpag)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($caconpag->getId()): ?>
<?php echo button_to(__('delete'), 'almconpag/delete?id='.$caconpag->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
