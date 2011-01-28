<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp') ?>
<div id='sinsustra' style="<?if ($mansus=='N') echo 'display:block'; else  echo 'display:none'; ?>">
 <fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<tr>
<th>
 <?php echo label_for('optipret[porret]', __('Porcentaje a Retener'),'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('optipret{porret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{porret}')): ?>
    <?php echo form_error('optipret{porret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
    <?php $value = input_tag('optipret[porret]', $porret, array (
  'size' => 7,
  'control_name' => 'optipret[porret]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
   </div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
   <?php echo label_for('sobreel', __('Sobre el '),'class="required"') ?>
  <?php $value = input_tag('optipret[basimp]', $basimp, array (
  'size' => 7,
  'control_name' => 'optipret[basimp]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
  <?php echo label_for('montot', __('% del Monto Total'),'class="required"') ?>
</th>

<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
<div id="montoocul" style="display:none">
   <?php echo label_for('monbasmin', __('Monto Base Mínimo'),'class="required"') ?>
  <?php $value = input_tag('optipret[mbasmi]', $mbasmi, array (
  'size' => 7,
  'control_name' => 'optipret[mbasmi]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</div>
</th>
<th>
<div id="montoocul2" style="display:none">
  <?php echo label_for('expre', __('expresado en Unidades Tributarias'),'class="required"') ?>
</div>
</th>
</tr>
</table>
</div>
</fieldset>
</div>
<div id='consustra' style="<?if ($mansus=='S') echo 'display:block'; else echo 'display:none'; ?>">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Sustraendo') ?></legend>
<div class="form-row">
<table>
<th>
  <?php echo label_for('optipret[unitri]', __('Unidades Tributarias'),'class="required"') ?>
   <div class="content<?php if ($sf_request->hasError('optipret{unitri}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{unitri}')): ?>
    <?php echo form_error('optipret{unitri}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
    <?php $value = input_tag('optipret[unitri]', $unitri, array (
  'size' => 7,
  'control_name' => 'optipret[unitri]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
   </div>
</th>
<th>&nbsp;&nbsp;&nbsp;</th>
<th>
	<?php echo label_for('optipret[factor]', __('X '.'&nbsp;&nbsp;' .'Factor'),'class="required"') ?>
   <div class="content<?php if ($sf_request->hasError('optipret{factor}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{factor}')): ?>
    <?php echo form_error('optipret{factor}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = input_tag('optipret[factor]', $factor, array (
  'size' => 7,
  'control_name' => 'optipret[factor]',
  'onBlur' => "javascript:event.keyCode=13; return entermontofactor(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
 </div>
</th>
<th>&nbsp;&nbsp;&nbsp;</th>
<th>
  <?php echo label_for('optipret[porsus]', __('X '.'&nbsp;&nbsp;'.'Porc. Sustraendo'),'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('optipret{porsus}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{porsus}')): ?>
  <?php echo form_error('optipret{porsus}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = input_tag('optipret[porsus]', $porsus, array (
  'size' => 7,
  'control_name' => 'optipret[porsus]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
<?php echo '&nbsp;&nbsp;'.'%'?>
 </div>
</th>
</tr>
</table>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<th>
  <?php echo label_for('optipret[basimp]', __('Base  Imponible'),'class="required"') ?>
   <div class="content<?php if ($sf_request->hasError('optipret{basimp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{basimp}')): ?>
    <?php echo form_error('optipret{basimp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = input_tag('optipret[basimp1]', $basimp1, array (
  'size' => 7,
  'control_name' => 'optipret[basimp1]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
<?php echo '&nbsp;&nbsp;&nbsp;&nbsp;'.'% del Monto Total'?>
   </div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
<div id="montoocula" style="display:none">
   <?php echo label_for('monbasmin', __('Monto Base Mínimo'),'class="required"') ?>
  <?php $value = input_tag('optipret[mbasmi1]', $mbasmi1, array (
  'size' => 7,
  'control_name' => 'optipret[mbasmi1]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</div>
</th>
<th>
<div id="montoocula2" style="display:none">
  <?php echo label_for('expre', __('expresado en Unidades Tributarias'),'class="required"') ?>
</div>
</th>
</tr>
</table>
</div>
</fieldset>
</div>

<script type="text/javascript">
 var limbas='<?php echo $limbaseret; ?>';
 var mansust='<?php echo $mansus; ?>';
 if (limbas=='S')
     {
         if (mansust=='S')
         {
         $('montoocula').show();
         $('montoocula2').show();
         }else {
          $('montoocul').show();
          $('montoocul2').show();
         }
     }
</script>
