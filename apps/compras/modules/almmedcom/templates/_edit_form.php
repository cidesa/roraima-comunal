<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/22 18:33:05
?>
<?php echo form_tag('almmedcom/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($camedcom, 'getId') ?>
<?php echo javascript_include_tag('tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('camedcom[codmedcom]', __($labels['camedcom{codmedcom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('camedcom{codmedcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('camedcom{codmedcom}')): ?>
    <?php echo form_error('camedcom{codmedcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($camedcom, 'getCodmedcom', array (
  'size' => 4,
  'maxlength' => 4,
  'control_name' => 'camedcom[codmedcom]',
  'readonly'  =>  $camedcom->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('camedcom_codmedcom').value=valor;document.getElementById('camedcom_codmedcom').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>

    </div>
</div>

<div class="form-row">
  <?php echo label_for('camedcom[desmedcom]', __($labels['camedcom{desmedcom}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('camedcom{desmedcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('camedcom{desmedcom}')): ?>
    <?php echo form_error('camedcom{desmedcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($camedcom, 'getDesmedcom', array (
  'size' => 80,
  'control_name' => 'camedcom[desmedcom]',
   'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('camedcom' => $camedcom)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($camedcom->getId()): ?>
<?php echo button_to(__('delete'), 'almmedcom/delete?id='.$camedcom->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
