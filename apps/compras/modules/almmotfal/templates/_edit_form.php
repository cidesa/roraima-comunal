<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/01 11:46:12
?>
<?php echo form_tag('almmotfal/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript') ?>
<?php use_helper('SubmitClick') ?>
<?php echo javascript_include_tag('tools','observe') ?>

<?php echo object_input_hidden_tag($camotfal, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row"><?php echo label_for('camotfal[codfal]', __($labels['camotfal{codfal}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('camotfal{codfal}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('camotfal{codfal}')): ?> <?php echo form_error('camotfal{codfal}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($camotfal, 'getCodfal', array (
'size' => 5,
'maxlength' => 3,
'readonly'  =>  $camotfal->getId()!='' ? true : false ,
'control_name' => 'camotfal[codfal]',
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('camotfal_codfal').value=valor;document.getElementById('camotfal_codfal').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
  </div>
<br>
<?php echo label_for('camotfal[desfal]', __($labels['camotfal{desfal}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('camotfal{desfal}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('camotfal{desfal}')): ?> <?php echo form_error('camotfal{desfal}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($camotfal, 'getDesfal', array (
'size' => 80,
'maxlength' => 250,
'control_name' => 'camotfal[desfal]',
'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
  </div>
<br>
<?php echo label_for('camotfal[tipfal]', __($labels['camotfal{tipfal}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('camotfal{tipfal}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('camotfal{tipfal}')): ?> <?php echo form_error('camotfal{tipfal}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<?  if ($camotfal->getTipfal()=='RCP') $val=true; else $val=false; ?>
<?php echo "Recepción ".radiobutton_tag('camotfal[tipfal]', 'RCP', $val) ?>&nbsp;
<?php echo "Despacho ".radiobutton_tag('camotfal[tipfal]', 'DPH', !$val) ?>
  </div>
  <br>
</div>

</fieldset>

<?php include_partial('edit_actions', array('camotfal' => $camotfal)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($camotfal->getId()): ?>
<?php echo button_to(__('delete'), 'almmotfal/delete?id='.$camotfal->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
