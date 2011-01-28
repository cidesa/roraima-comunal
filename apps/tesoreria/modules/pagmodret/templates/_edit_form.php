<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/17 14:19:20
?>
<?php echo form_tag('pagmodret/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($opordpag, 'getId') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools', 'observe') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Rentenciones por Orden')?></legend>
<div class="form-row">
<table>
 <tr>
  <th>
    <?php echo label_for('opordpag[numord]', __($labels['opordpag{numord}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numord}')): ?>
    <?php echo form_error('opordpag{numord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumord', array (
  'size' => 20,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'control_name' => 'opordpag[numord]',
)); echo $value ? $value : '&nbsp;' ?>
   </div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
  <?php echo label_for('opordpag[fecemi]', __($labels['opordpag{fecemi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecemi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecemi}')): ?>
    <?php echo form_error('opordpag{fecemi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecemi', array (
  'rich' => true,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecemi]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  </th>
 </tr>
</table>

<br>

  <?php echo label_for('opordpag[desord]', __($labels['opordpag{desord}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{desord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{desord}')): ?>
    <?php echo form_error('opordpag{desord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getDesord', array (
  'size' => 80,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'control_name' => 'opordpag[desord]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('opordpag[tipcau]', __($labels['opordpag{tipcau}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{tipcau}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{tipcau}')): ?>
    <?php echo form_error('opordpag{tipcau}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getTipcau', array (
  'size' => 20,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'control_name' => 'opordpag[tipcau]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php $value = object_input_tag($opordpag, 'getNomext', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[nomext]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('opordpag[cedrif]', __($labels['opordpag{cedrif}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{cedrif}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{cedrif}')): ?>
    <?php echo form_error('opordpag{cedrif}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCedrif', array (
  'size' => 20,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'control_name' => 'opordpag[cedrif]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php $value = object_input_tag($opordpag, 'getNomben', array (
  'size' => 60,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'control_name' => 'opordpag[nomben]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<div id="otro" style="display:none">
  <?php echo label_for('opordpag[numcom]', __($labels['opordpag{numcom}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numcom}')): ?>
    <?php echo form_error('opordpag{numcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumcom', array (
  'size' => 20,
  'control_name' => 'opordpag[numcom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<br>

<?php echo grid_tag($obj);?>

<br>

<table>
<tr>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th><?php echo label_for('',__('Total') , 'class="required" Style="width:100px"') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo input_tag('total', '', array(
'size'=> 20,
'class'=> 'grid_txtright',
'readonly'=> true,
)) ?></th>
</tr>
</table>
</div>
</fieldset>


<?php include_partial('edit_actions', array('opordpag' => $opordpag)) ?>

</form>


<script language="JavaScript" type="text/javascript">
actualizarsaldos();
 var ids='<?php echo $opordpag->getId()?>';
 if (ids!="")
 {
   $('trigger_opordpag_fecemi').hide();
 }
</script>
