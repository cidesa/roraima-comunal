<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/24 10:38:50
?>
<?php echo form_tag('pagtipben/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php echo javascript_include_tag('ajax', 'tools','observe', 'dFilter') ?>
<?php echo object_input_hidden_tag($optipben, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('optipben[codtipben]', __($labels['optipben{codtipben}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('optipben{codtipben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipben{codtipben}')): ?>
    <?php echo form_error('optipben{codtipben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($optipben, 'getCodtipben', array (
  'size' => 20,
  'control_name' => 'optipben[codtipben]',
  'onBlur' => 'this.value=this.value.pad(3, "0",0);',
  'maxlength' => 3,
  'readonly'  =>  $optipben->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('optipben[destipben]', __($labels['optipben{destipben}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('optipben{destipben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipben{destipben}')): ?>
    <?php echo form_error('optipben{destipben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($optipben, 'getDestipben', array (
  'size' => '50x3',
  'maxlength' => 50,
  'control_name' => 'optipben[destipben]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('optipben' => $optipben)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($optipben->getId()): ?>
<?php echo button_to(__('delete'), 'pagtipben/delete?id='.$optipben->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
