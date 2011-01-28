<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 41824 2010-12-22 21:50:52Z cramirez $
 */
// date: 2007/06/12 13:02:49
?>
<?php echo form_tag('almpriori/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','compras/almordcom','ajax','tools') ?>
<?php echo object_input_hidden_tag($casolart, 'getId') ?>
<?php /*echo input_hidden_tag('actualizar', $actualiza)*/ ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo _('Datos de la Solicitud de Egresos') ?></h2></legend>
<div class="form-row">
<table>
<tr>
<th>
  <?php echo label_for('casolart[reqart]', __($labels['casolart{reqart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{reqart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{reqart}')): ?>
    <?php echo form_error('casolart{reqart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getReqart', array (
  'size' => 20,
  'control_name' => 'casolart[reqart]',
  'maxlength' => 8,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
  <?php echo label_for('casolart[fecreq]', __($labels['casolart{fecreq}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{fecreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{fecreq}')): ?>
    <?php echo form_error('casolart{fecreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_tag('carcpart[fecord]',date("d/m/Y",strtotime($casolart->getFecreq())),'disabled=true', 'size=10'); ?>
    </div>
</th>
</tr>
</table>

  <?php echo label_for('casolart[desreq]', __($labels['casolart{desreq}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{desreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{desreq}')): ?>
    <?php echo form_error('casolart{desreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($casolart, 'getDesreq', array (
  'control_name' => 'casolart[desreq]',
  'maxlength' => 1000,
  'size' => '90x2',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
 </div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo _('Asignación de Prioridad General') ?></h2></legend>
<div class="form-row">
  <table>
    <tr>
   <th>
<?php echo label_for('casolart[porcostart]', __($labels['casolart{porcostart}']), 'class="required"  Style="width:150px"') ?>
	  <div class="content<?php if ($sf_request->hasError('casolart{porcostart}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('casolart{porcostart}')): ?>
	    <?php echo form_error('casolart{porcostart}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	<?php $value = object_checkbox_tag($casolart, 'getPorcostart', array (
	  'control_name' => 'casolart[porcostart]',
	  'onClick' => 'desmarcar(1)'
	)); echo $value ? $value : '&nbsp;' ?>
   </th>
   <th>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
      <th>
<?php echo label_for('casolart[pormoncot]', __($labels['casolart{pormoncot}']), 'class="required"  Style="width:150px"') ?>
	  <div class="content<?php if ($sf_request->hasError('casolart{pormoncot}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('casolart{pormoncot}')): ?>
	    <?php echo form_error('casolart{pormoncot}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	<?php $value = object_checkbox_tag($casolart, 'getPormoncot', array (
	  'control_name' => 'casolart[pormoncot]',
	  'onClick' => 'desmarcar(2)'
	)); echo $value ? $value : '&nbsp;' ?>
   </th>
   <th>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
   <th>
<?php echo label_for('casolart[portimeent]', __($labels['casolart{portimeent}']), 'class="required"  Style="width:150px"') ?>
	  <div class="content<?php if ($sf_request->hasError('casolart{portimeent}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('casolart{portimeent}')): ?>
	    <?php echo form_error('casolart{portimeent}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	<?php $value = object_checkbox_tag($casolart, 'getPortimeent', array (
	  'control_name' => 'casolart[portimeent]',
	  'onClick' => 'desmarcar(3)'
	)); echo $value ? $value : '&nbsp;' ?>
   </th>
   <th>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
      <th>
	   <?php echo label_for('casolart[actsolegr]', __($labels['casolart{actsolegr}']), 'class="required"  Style="width:150px"') ?>
	  <div class="content<?php if ($sf_request->hasError('casolart{actsolegr}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('casolart{actsolegr}')): ?>
	    <?php echo form_error('casolart{actsolegr}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	<?php $value = object_checkbox_tag($casolart, 'getActsolegr', array (
	  'control_name' => 'casolart[actsolegr]',
      /*'onBlur'=> remote_function(array(
        'url'      => 'almpriori/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&reqart='+$('casolart_reqart').value+'&codigo='+this.value"
        ))*/
	)); echo $value ? $value : '&nbsp;' ?>
    </div>
   </th>

    </tr>
  </table>
 </div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo _('Asignación por Proveedores') ?></h2></legend>
<div class="form-row">
<?php echo label_for('casolart[porprovee]', __($labels['casolart{porprovee}']), 'class="required"  Style="width:150px"') ?>
	  <div class="content<?php if ($sf_request->hasError('casolart{porprovee}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('casolart{porprovee}')): ?>
	    <?php echo form_error('casolart{porprovee}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	<?php $value = object_checkbox_tag($casolart, 'getPorprovee', array (
	  'control_name' => 'casolart[porprovee]',
	  'onClick' => remote_function(array(
		'update'   => 'divGrid2',
	    'script'   => true,
		'url'      => 'almpriori/ajax?ajax=2',
		'with'   => "'reqart='+document.getElementById('casolart_reqart').value"
	  )))); echo $value ? $value : '&nbsp;' ?>

<br> <br>

<div id="divGrid2">
</div>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo _('Asignación de Prioridad Detallada') ?></h2></legend>
<div class="form-row">
  <table>
  <tr>
   <strong><?php echo __('Leyenda: Nº 1 es la prioridad y el Nº 2 es la segunda opción para comprar el producto.')?></strong>
   <tr>
   <tr>
    <th>
     <?php echo label_for('casolart[articulo]', __($labels['casolart{articulo}']), 'class="required"  style="width: 200px"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{articulo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{articulo}')): ?>
    <?php echo form_error('casolart{articulo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<div id="divCombo">
 <?php echo select_tag('casolart[articulo]', options_for_select($articulos,$casolart->getArticulo(),'include_custom=Seleccione un Artículo'),array('onChange'=> remote_function(array(
	'update'   => 'divGrid',
    'script'   => true,
	'url'      => 'almpriori/grid?ajax=1',
	'with'   => "'reqart='+document.getElementById('casolart_reqart').value+'&codart='+this.value"
  )))); ?></div></div>
   </th>
   <th>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
   <th>
   <ul class="sf_admin_actions">
     <li class="float-rigth">
         <?php echo submit_to_remote('genpri', 'Mostrar todos los Artículos', array(
         'url'      => 'almpriori/ajax',
		 'update'   => 'divCombo',
         'script'   => true,
         'with'   => "'reqart='+document.getElementById('casolart_reqart').value"
      ),array('class' => "sf_admin_action_list")) ?>
    </li>
    <li>
    </li>
    <li class="float-rigth">
     <?php if ($elimina=='S') { ?>
  <input type="button" name="Submit" class="sf_admin_action_list" value="Forma Pre-Impresa" onclick="javascript:Mostrar_orden_preimpresa();" />
<? } ?>
    </li>
   </ul>
   </th>
   </tr>
  </table>
<br>

<div id="divGrid">
</div>

</div>
</fieldset>

    <br>
  <?php echo label_for('casolart[observaciones]', __($labels['casolart{observaciones}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{observaciones}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{observaciones}')): ?>
    <?php echo form_error('casolart{observaciones}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($casolart, 'getObservaciones', array (
  'control_name' => 'casolart[observaciones]',
  'maxlength' => 5000,
  'size' => '90x5',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('casolart' => $casolart)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($casolart->getId() && $elimina=='S'): ?>
<?php echo button_to(__('delete'), 'almpriori/delete?id='.$casolart->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript">
 function colocar_prioridad()
 {
		var filas=obtener_filas_grid('a','3');

		for( var i=0; i<filas; i++ )
		{
		    	var caja_texto_prioridad="ax_"+i+"_3";
		    	var valor=parseInt($(caja_texto_prioridad).value);
		        if (valor<=0)  $(caja_texto_prioridad).value=i+1;
	    }


	    return true;
 }


 function verificar_prioridad()
 {
		var filas=obtener_filas_grid('a','3');
		var prioridades = new Array();
		for( var i=0; i<filas; i++ )
		{
			cantidad="ax_"+i+"_3";
			validarEntero($(cantidad));
	    	prioridades[i] = $(cantidad).value;
	    }
		a=0;
	    i=0;
	    seguir=true;
	    while(i<prioridades.length && seguir)
	    {
	    	prioridad=prioridades[i];
		    j=1;
		    while(j<prioridades.length && seguir)
		    {
		    	var valor_siguiente=prioridades[j];
				if (i!=j)
				{
					if (prioridad==valor_siguiente && valor_siguiente!="")
					{
							alert('Prioridades Repetidas, verifique prioridades!');
							seguir=false;
							break;
					}
				}
		    	j++;
		    }
	    	i++;
	    }
 }



	function validarEntero(id)
	{
	     valor = $(id).value;

	     if (valor!='')
	     {
		     valor = parseInt(valor);

		      if (isNaN(valor))
		      {
		            alert('El Valor Introducido Debe ser un Numero');
		            $(id).value='';
		            $(id).focus();
		      }
		      else
		      {
		         $(id).value=valor;
		      }
		 }
	}

  function desmarcar(valor)
  {
    if (valor==1){
  	$('casolart_pormoncot').checked=false;
  	$('casolart_portimeent').checked=false;
  	}else if (valor==2) {
  	$('casolart_porcostart').checked=false;
  	$('casolart_portimeent').checked=false;
  	}
  	else {
  	 $('casolart_pormoncot').checked=false;
  	 $('casolart_porcostart').checked=false;
  	 }
  }

    function Mostrar_orden_preimpresa()
  {
      var codreqdes=$('casolart_reqart').value;

      var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
      pagina=ruta+"/reportes/reportes/compras/r.php=?r=carsolegr.php&codreqdes="+codreqdes;
      window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")

  }


</script>

