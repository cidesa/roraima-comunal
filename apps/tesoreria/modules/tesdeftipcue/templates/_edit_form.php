<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/15 08:29:43
?>
<?php echo form_tag('tesdeftipcue/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($tstipcue, 'getId') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<fieldset id="sf_fieldset_editable" class="">

<div class="form-row">
  <?php echo label_for('tstipcue[codtip]', __($labels['tstipcue{codtip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tstipcue{codtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tstipcue{codtip}')): ?>
    <?php echo form_error('tstipcue{codtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tstipcue, 'getCodtip', array (
  'size' => 20,
  'readonly'  =>  $tstipcue->getId()!='' ? true : false ,
  'control_name' => 'tstipcue[codtip]', 'maxlength' => 3,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('tstipcue_codtip').value=cadena",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('tstipcue_codtip').value=valor;",
  )); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

  <?php echo label_for('tstipcue[destip]', __($labels['tstipcue{destip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tstipcue{destip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tstipcue{destip}')): ?>
    <?php echo form_error('tstipcue{destip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tstipcue, 'getDestip', array (
  'size' => 40,
  'maxlength' => 40,
  'control_name' => 'tstipcue[destip]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('tstipcue' => $tstipcue)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($tstipcue->getId()): ?>
<?php echo button_to(__('delete'), 'tesdeftipcue/delete?id='.$tstipcue->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
