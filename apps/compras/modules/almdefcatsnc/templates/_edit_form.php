<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/22 14:50:45
?>
<?php echo form_tag('almdefcatsnc/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($cacatsnc, 'getId') ?>
<?php echo javascript_include_tag('ajax', 'tools', 'observe', 'dFilter') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('cacatsnc[codsnc]', __($labels['cacatsnc{codsnc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cacatsnc{codsnc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacatsnc{codsnc}')): ?>
    <?php echo form_error('cacatsnc{codsnc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


 <?php $value = object_input_tag($cacatsnc, 'getCodsnc', array (
  'size' => $longsnc,
  'control_name' => 'cacatsnc[codsnc]',
  'maxlength' => $longsnc,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$formatosnc');",
  'readonly'  =>  $cacatsnc->getId()!='' ? true : false ,
  'onKeyUp' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();$('cacatsnc_codsnc').value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>

    </div>
</div>

<div class="form-row">
  <?php echo label_for('cacatsnc[dessnc]', __($labels['cacatsnc{dessnc}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('cacatsnc{dessnc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacatsnc{dessnc}')): ?>
    <?php echo form_error('cacatsnc{dessnc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cacatsnc, 'getDessnc', array (
  'size' => 80,
  'control_name' => 'cacatsnc[dessnc]',
  'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('cacatsnc' => $cacatsnc)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($cacatsnc->getId()): ?>
<?php echo button_to(__('delete'), 'almdefcatsnc/delete?id='.$cacatsnc->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
