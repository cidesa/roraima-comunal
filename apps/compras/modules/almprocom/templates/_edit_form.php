<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/23 09:35:11
?>
<?php echo form_tag('almprocom/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($caprocom, 'getId') ?>
<?php echo javascript_include_tag('tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('caprocom[codprocom]', __($labels['caprocom{codprocom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caprocom{codprocom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprocom{codprocom}')): ?>
    <?php echo form_error('caprocom{codprocom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caprocom, 'getCodprocom', array (
  'size' => 4,
  'maxlength' => 4,
  'control_name' => 'caprocom[codprocom]',
  'readonly'  =>  $caprocom->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('caprocom_codprocom').value=valor;document.getElementById('caprocom_codprocom').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>

    </div>
</div>

<div class="form-row">
  <?php echo label_for('caprocom[desprocom]', __($labels['caprocom{desprocom}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caprocom{desprocom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprocom{desprocom}')): ?>
    <?php echo form_error('caprocom{desprocom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caprocom, 'getDesprocom', array (
  'size' => 80,
  'control_name' => 'caprocom[desprocom]',
  'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>

    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('caprocom' => $caprocom)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($caprocom->getId()): ?>
<?php echo button_to(__('delete'), 'almprocom/delete?id='.$caprocom->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
