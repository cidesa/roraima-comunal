<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/01 12:54:31
?>
<?php echo form_tag('almramart/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php use_helper('SubmitClick') ?>
<?php echo object_input_hidden_tag($caramart, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('caramart[ramart]', __($labels['caramart{ramart}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('caramart{ramart}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caramart{ramart}')): ?> <?php echo form_error('caramart{ramart}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


  <?php $value = object_input_tag($caramart, 'getRamart', array (
  'size' => 7,
  'maxlength' => 6,
  'control_name' => 'caramart[ramart]',
  'readonly'  =>  $caramart->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(6, '0',0);document.getElementById('caramart_ramart').value=valor;document.getElementById('caramart_ramart').disabled=false;",
  )); echo $value ? $value : '&nbsp;' ?>
	</div>
<br>
  <?php echo label_for('caramart[nomram]', __($labels['caramart{nomram}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caramart{nomram}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caramart{nomram}')): ?>
    <?php echo form_error('caramart{nomram}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caramart, 'getNomram', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'caramart[nomram]',
  'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
	</div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('caramart' => $caramart)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($caramart->getId()): ?>
<?php echo button_to(__('delete'), 'almramart/delete?id='.$caramart->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
