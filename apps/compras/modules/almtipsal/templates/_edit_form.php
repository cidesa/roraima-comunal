<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/01 10:47:26
?>
<?php echo form_tag('almtipsal/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript','SubmitClick') ?>
<?php echo javascript_include_tag('tools','observe') ?>

<?php echo object_input_hidden_tag($catipsal, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend> <?php echo __('Tipo de Salida')?> </legend>
<div class="form-row">
  <?php echo label_for('catipsal[codtipsal]', __($labels['catipsal{codtipsal}']), 'class=required') ?>
  <div class="content<?php if ($sf_request->hasError('catipsal{codtipsal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catipsal{codtipsal}')): ?>
    <?php echo form_error('catipsal{codtipsal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($catipsal, 'getCodtipsal', array (
  'size' => 4,
  'control_name' => 'catipsal[codtipsal]',
  'readonly'  =>  $catipsal->getId()!='' ? true : false ,
  'maxlength' => 3,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('catipsal_codtipsal').value=valor;document.getElementById('catipsal_codtipsal').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
  </div>
<br>
  <?php echo label_for('catipsal[destipsal]', __($labels['catipsal{destipsal}']), 'class=required') ?>
  <div class="content<?php if ($sf_request->hasError('catipsal{destipsal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catipsal{destipsal}')): ?>
    <?php echo form_error('catipsal{destipsal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($catipsal, 'getDestipsal', array (
  'size' => 50,
  'control_name' => 'catipsal[destipsal]',
  'maxlength' => 50,
  'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('catipsal' => $catipsal)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($catipsal->getId()): ?>
<?php echo button_to(__('delete'), 'almtipsal/delete?id='.$catipsal->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
