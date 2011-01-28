<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/01 11:40:43
?>
<?php echo form_tag('almtipent/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript','SubmitClick') ?>
<?php echo javascript_include_tag('tools','observe') ?>

<?php echo object_input_hidden_tag($catipent, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipo de Entrada')?></legend>
<div class="form-row">
  <?php echo label_for('catipent[codtipent]', __($labels['catipent{codtipent}']), 'class=required') ?>
  <div class="content<?php if ($sf_request->hasError('catipent{codtipent}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catipent{codtipent}')): ?>
    <?php echo form_error('catipent{codtipent}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($catipent, 'getCodtipent', array (
  'size' => 4,
  'readonly'  =>  $catipent->getId()!='' ? true : false ,
  'control_name' => 'catipent[codtipent]',
  'maxlength' => 3,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('catipent_codtipent').value=valor;document.getElementById('catipent_codtipent').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('catipent[destipent]', __($labels['catipent{destipent}']),'class=required') ?>
  <div class="content<?php if ($sf_request->hasError('catipent{destipent}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catipent{destipent}')): ?>
    <?php echo form_error('catipent{destipent}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($catipent, 'getDestipent', array (
  'size' => 50,
  'control_name' => 'catipent[destipent]',
  'maxlength' => 50,
  'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('catipent' => $catipent)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($catipent->getId()): ?>
<?php echo button_to(__('delete'), 'almtipent/delete?id='.$catipent->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
