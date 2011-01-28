<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/19 14:52:03
?>
<?php echo form_tag('tesmovconban/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript','Grid','wait','tabs') ?>
<?php echo javascript_include_tag('tools','ajax','dFilter','Observe') ?>
<?php echo input_hidden_tag('tsconcil[ano]', $tsconcil->getAno()) ?>

<?php echo object_input_hidden_tag($tsconcil, 'getId') ?>
<fieldset id="sf_fieldset_none" class="">
<h2><?php echo __('Datos de la Conciliación')?></h2>
<div class="form-row">
  <?php echo label_for('labelnrocuenta', __('Numero de Cuenta'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nrocuenta')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nrocuenta')): ?>
    <?php echo form_error('nrocuenta', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


<?php echo input_auto_complete_tag('nrocuenta', '',
    'tesmovconban/autocomplete?ajax=1',  array('autocomplete' => 'off','size' => 25, 'maxlength' => 20,
	'onBlur'=> remote_function(array(
			  'url'      => 'tesmovconban/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('nrocuenta').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&cajtexmos=descta&cajtexcom=nrocuenta&codigo='+this.value",

			  ))),
     array('use_style' => 'true')
  )
?>
&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsconcil_tesmovconban/clase/Tsdefban/frame/sf_admin_edit_form/obj1/descta/obj2/nrocuenta/campo1/nomcue/campo2/numcue/param1/1')?>

  <?php $value = input_tag('descta', '', array (
  'disabled' => true,
  'control_name' => 'descta',
  'size' => 50,
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>

    </div>

<br>

  <?php echo label_for('labelmes', __('Mes a Cerrar'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('labelmes')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('labelmes')): ?>
    <?php echo form_error('labelmes', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <select name="combomes" id="combomes">
	  <option value="01">Enero</option>
	  <option value="02">Febrero</option>
	  <option value="03">Marzo</option>
	  <option value="04">Abril</option>
	  <option value="05">Mayo</option>
	  <option value="06">Junio</option>
	  <option value="07">Julio</option>
	  <option value="08">Agosto</option>
	  <option value="09">Septiembre</option>
	  <option value="10">Octubre</option>
	  <option value="11">Noviembre</option>
	  <option value="12">Diciembre</option>
  </select>

    </div>

<br>

  <?php echo label_for('labelano', __('Del Año'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('labelano')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('labelano')): ?>
    <?php echo form_error('labelano', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<? echo input_tag('ano','',array (
  'control_name' => 'ano',
  'size' => 5,
  'maxlength' => 4,
)); ?>

    </div>

<br>

  <?php echo label_for('labeltxt', __('Movimientos TXT'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('labeltxt')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('labeltxt')): ?>
    <?php echo form_error('labeltxt', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
      
  <?php $value = object_checkbox_tag($tsconcil, 'getMovtxt', array (
  'control_name' => 'tsconcil[movtxt]',
)); echo $value ? $value : '&nbsp;' ?>

    </div>

<ul  class="sf_admin_actions"  align="center">
	<input type="button" value="Hacer" onClick="hacer()">
	<input type="button" value="Anular" onClick="anular()">
</ul>

</fieldset>

<?php include_partial('edit_actions', array('tsconcil' => $tsconcil)) ?>

</form>

<script type="text/javascript">
    var ano='<?php echo $tsconcil->getAno() ?>';
    $('ano').value=ano;
<!--
function hacer()
{

  if ($('nrocuenta').value!='')
  {
  if ($('ano').value!='')
  {
	f=document.sf_admin_edit_form;

	f.action="hacer";
	f.submit();
  }
  else
  {
  	alert('No puede Hacer la Conciliación debe introducir el Año');
  }
  }
  else
  {
  	alert('No puede Hacer la Conciliación debe introducir el Numero de Cuenta ');
  }
}

function anular()
{
   if ($('nrocuenta').value!='')
  {
  if ($('ano').value!='')
  {
	f=document.sf_admin_edit_form;

	f.action="anular";
	f.submit();
   }
	else
  {
  	alert('No puede Anular la Conciliación debe introducir el Año');
  }
  }
  else
  {
  	alert('No puede Anular la Conciliación debe introducir el Numero de Cuenta ');
  }
}
//-->
</script>


<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($tsconcil->getId()): ?>
<?php echo button_to(__('delete'), 'tesmovconban/delete?id='.$tsconcil->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
