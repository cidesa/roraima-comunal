<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2008/04/24 13:03:04
?>
<?php echo form_tag('apliuser/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($apli_user, 'getId') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de Usuario')?></legend>
<div class="form-row">
  <?php echo label_for('apli_user[cedemp]', __($labels['apli_user{cedemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{cedemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{cedemp}')): ?>
    <?php echo form_error('apli_user{cedemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('apli_user[cedemp]', $apli_user->getCedemp(),
    'apliuser/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 10,
    'readonly'  =>  $apli_user->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
        'url'      => 'apliuser/ajax',
        'condition' => "$('apli_user_cedemp').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=apli_user_nomuse&cajtexcom=apli_user_cedemp&direc=apli_user_diremp&telef=apli_user_telemp&login=apli_user_loguse&pass=apli_user_pasuse&codigo='+this.value"
        ))),
     array('use_style' => 'true',)
  )
?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Usuarios_Apliuser/clase/Usuarios/frame/sf_admin_edit_form/obj1/apli_user_cedemp/obj2/apli_user_nomuse/obj3/apli_user_diremp/obj4/apli_user_telemp/obj5/apli_user_loguse/obj6/apli_user_pasuse/campo1/cedemp/campo2/nomuse/campo3/diremp/campo4/telemp/campo5/loguse/campo6/pasuse','','','botoncat')?>
</div>

<br>

  <?php echo label_for('apli_user[nomuse]', __($labels['apli_user{nomuse}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{nomuse}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{nomuse}')): ?>
    <?php echo form_error('apli_user{nomuse}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getNomuse', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'apli_user[nomuse]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('apli_user[diremp]', __($labels['apli_user{diremp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{diremp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{diremp}')): ?>
    <?php echo form_error('apli_user{diremp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getDiremp', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'apli_user[diremp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('apli_user[telemp]', __($labels['apli_user{telemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{telemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{telemp}')): ?>
    <?php echo form_error('apli_user{telemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getTelemp', array (
  'disabled' => true,
  'size' => 20,
  'control_name' => 'apli_user[telemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('apli_user[loguse]', __($labels['apli_user{loguse}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{loguse}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{loguse}')): ?>
    <?php echo form_error('apli_user{loguse}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getLoguse', array (
  'size' => 20,
  'control_name' => 'apli_user[loguse]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

<table>
 <tr>
  <th>
  <?php echo label_for('apli_user[pasuse]', __($labels['apli_user{pasuse}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{pasuse}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{pasuse}')): ?>
    <?php echo form_error('apli_user{pasuse}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_password_tag('apli_user[pasuse]', $apli_user->getPasuse(),array( 'disabled' => true,
  'size' => 20)) ?>   </div>
  </th>
  <th>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>

   <?php echo label_for('apli_user[administrador]', __($labels['apli_user{administrador}']), 'class="required" Style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{administrador}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{administrador}')): ?>
    <?php echo form_error('apli_user{administrador}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($apli_user, 'getAdministrador', array (
  'control_name' => 'apli_user[administrador]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
  </tr>
  </table>
</div>
</fieldset>
<br>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Asignación de Perfiles')?></legend>
<div class="form-row">
  <?php echo label_for('apli_user[codapl]', __($labels['apli_user{codapl}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{codapl}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{codapl}')): ?>
    <?php echo form_error('apli_user{codapl}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo select_tag('apli_user[codapl]', options_for_select($modulos,$apli_user->getCodapl(),'include_custom=Seleccione un Módulo'),array('onChange'=> remote_function(array(
  'update'   => 'divGrid',
  'url'      => 'apliuser/ajax?ajax=1',
  //'complete' => 'AjaxJSON(request, json)',
  'script' => true,
  'with'   => "'login='+$('apli_user_loguse').value+'&id='+$('id').value+'&modulo='+this.value"
  )))); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php echo radiobutton_tag('marca', '1', false, array('onClick'=> 'marcarTodo(1);'))."Marcar Todo Opción 1".'&nbsp;&nbsp;';
		  echo radiobutton_tag('marca', '2', false, array('onClick'=> 'marcarTodo(2);'))."Marcar Todo Opción 2".'&nbsp;&nbsp;';
		  echo radiobutton_tag('marca', '3', false, array('onClick'=> 'marcarTodo(3);'))."Marcar Todo Opción 3".'&nbsp;&nbsp;';
		  echo radiobutton_tag('marca', '4', false, array('onClick'=> 'desmarcarTodo();'))."Desmarcar Todo".'&nbsp;&nbsp;';	?>
 </div>
<br>
<div id="divGrid">
<?php echo grid_tag($obj);?>
</div>


</div>
</fieldset>

</div>
</fieldset>

<?php include_partial('edit_actions', array('apli_user' => $apli_user)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($apli_user->getId()): ?>
<?php echo button_to(__('delete'), 'apliuser/delete?id='.$apli_user->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript">
  function marcarTodo(valor)
  {
  	var am=parseInt($('totalfilas').value);
    if (valor==1)
    {
     var fil=0;
	 while (fil<am)
	 {
	  var id="ax"+"_"+fil+"_3";
	  $(id).value='15';
	  fil++;
	 }
    }
    else if (valor==2)
    {
	   var fil=0;
	   while (fil<am)
	   {
	     var id="ax"+"_"+fil+"_3";
	     $(id).value='11';

	     fil++;
	   }
   }
   else
   {
	 var fil=0;
	 while (fil<am)
	 {
	  var id="ax"+"_"+fil+"_3";
	  $(id).value='8';
	  fil++;
	 }
   }
  }

  function desmarcarTodo()
  {
    var am=parseInt($('totalfilas').value);
    fil=0;
    while (fil<am)
    {
     var id="ax"+"_"+fil+"_3";
     $(id).value="";
     fil++;
    }
  }
</script>
