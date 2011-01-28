<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/14 16:31:55
?>
<?php echo form_tag('tesdeftipren/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($tstipren, 'getId') ?>

<?php echo javascript_include_tag('tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><? echo __('Datos del Tipo de Rendimiento') ?> </legend>
<div class="form-row">
  <?php echo label_for('tstipren[codtip]', __($labels['tstipren{codtip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tstipren{codtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tstipren{codtip}')): ?>
    <?php echo form_error('tstipren{codtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tstipren, 'getCodtip', array (
  'size' => 4,
  'control_name' => 'tstipren[codtip]',
  'readonly'  =>  $tstipren->getId()!='' ? true : false ,
  'maxlength' => 3,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('tstipren_codtip').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>

    <div class="sf_admin_edit_help"><?php echo __('Máximo 3 caracteres') ?></div>  </div>
<br>
  <?php echo label_for('tstipren[destip]', __($labels['tstipren{destip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tstipren{destip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tstipren{destip}')): ?>
    <?php echo form_error('tstipren{destip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tstipren, 'getDestip', array (
  'size' => 50,
  'maxlength' => 50,
  'control_name' => 'tstipren[destip]',
)); echo $value ? $value : '&nbsp;' ?>
   <div class="sf_admin_edit_help"><?php echo __('Solo Texto') ?></div>  </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('tstipren' => $tstipren)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($tstipren->getId()): ?>
<?php echo button_to(__('delete'), 'tesdeftipren/delete?id='.$tstipren->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
