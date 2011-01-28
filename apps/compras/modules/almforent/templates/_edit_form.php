<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/01 10:27:28
?>
<?php echo form_tag('almforent/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php use_helper('SubmitClick') ?>
<?php echo object_input_hidden_tag($caforent, 'getId') ?>

<fieldset id="sf_fieldset_none" class=""><legend><?php echo __('Tiempo de Entrega')?></legend>

<div class="form-row"><?php echo label_for('caforent[codforent]', __($labels['caforent{codforent}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caforent{codforent}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caforent{codforent}')): ?> <?php echo form_error('caforent{codforent}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($caforent, 'getCodforent', array (
  'size' => 5,
  'maxlength' => 4,
  'readonly'  =>  $caforent->getId()!='' ? true : false ,
  'control_name' => 'caforent[codforent]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('caforent_codforent').value=valor;document.getElementById('caforent_codforent').disabled=false;",
  )); echo $value ? $value : '&nbsp;' ?>
</div>

<br>
<?php echo label_for('caforent[desforent]', __($labels['caforent{desforent}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caforent{desforent}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caforent{desforent}')): ?> <?php echo form_error('caforent{desforent}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caforent, 'getDesforent', array (
  'size' => 80,
  'maxlength' => 255,
  'control_name' => 'caforent[desforent]',
  'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
</div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('caforent' => $caforent)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($caforent->getId()): ?>
<?php echo button_to(__('delete'), 'almforent/delete?id='.$caforent->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
