<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/16 10:34:17
?>
<?php echo form_tag('tesmovtraban/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('tabs','Grid','Javascript') ?>
<?php echo javascript_include_tag('tools','ajax','dFilter','observe') ?>

<?php echo object_input_hidden_tag($tsmovtra, 'getId') ?>
<script>
  function CatalogoGrid2()
  {
  	var formulario='sf_admin/tesmovtraban/confincomgen';
  	window.open('/tesoreria_dev.php/confincomgen/edit/?formulario='+formulario,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80')
  }
</script>
<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <? print $etiqueta;?></font></strong></th>
  </tr>
</table>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Transferencia')?></legend>
<div class="form-row">
  <table>
   <tr>
    <th>
    <?php echo label_for('tsmovtra[reftra]', __($labels['tsmovtra{reftra}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{reftra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{reftra}')): ?>
    <?php echo form_error('tsmovtra{reftra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovtra, 'getReftra', array (
  'size' => 20,
  'control_name' => 'tsmovtra[reftra]',
  'maxlength' => 8,
  'readonly' => $tsmovtra->getId()!='' ? true : false ,
  'onBlur'  => "javascript:event.keyCode=13; enter(event,this.value); llenar_reftra(event);",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
    <th>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
    <th>
    <?php echo label_for('tsmovtra[fectra]', __($labels['tsmovtra{fectra}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{fectra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{fectra}')): ?>
    <?php echo form_error('tsmovtra{fectra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tsmovtra, 'getFectra', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tsmovtra[fectra]',
  'date_format' => 'dd/MM/yyyy',
  'onKeypress' => 'llenar_fectracon(event)',
  'readonly' => $tsmovtra->getId()!='' ? true : false ,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
   </tr>
  </table>

<br>

  <?php echo label_for('tsmovtra[destra]', __($labels['tsmovtra{destra}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{destra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{destra}')): ?>
    <?php echo form_error('tsmovtra{destra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovtra, 'getDestra', array (
  'size' => 80,
  'control_name' => 'tsmovtra[destra]',
  'onBlur' => 'javascript:event.keyCode=13; llenar_desnumcom(event)',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('tsmovtra[montra]', __($labels['tsmovtra{montra}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{montra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{montra}')): ?>
    <?php echo form_error('tsmovtra{montra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovtra, array('getMontra',true), array (
  'size' => 25,
  'control_name' => 'tsmovtra[montra]',
  'readonly' => $tsmovtra->getId()!='' ? true : false ,
  'onKeyPress' => "javascript:return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<table>
<tr>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Códigos Bancarios')?></legend>
<div class="form-row">
<table>
 <tr>
  <th>
     <?php echo label_for('tsmovtra[ctaori]', __($labels['tsmovtra{ctaori}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{ctaori}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{ctaori}')): ?>
    <?php echo form_error('tsmovtra{ctaori}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('tsmovtra[ctaori]', $tsmovtra->getCtaori(),
    'tesmovtraban/autocomplete?ajax=1',  array('autocomplete' => 'off','size' => 25,
     'maxlength' => 20,
     'readonly' => $tsmovtra->getId()!='' ? true : false ,
	'onBlur'=> remote_function(array(
			  'url'      => 'tesmovtraban/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('tsmovtra_ctaori').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&cajtexmos=tsmovtra_nombancodesde&cajtexcom=tsmovtra_ctacon_ori&codigo='+this.value+'&montra='+$('tsmovtra_montra').value+'&fectra='+$('tsmovtra_fectra').value",

			  ))),
     array('use_style' => 'true')
  )
?>&nbsp;
  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsmovtra_tesmovtraban/clase/Tsdefban/frame/sf_admin_edit_form/obj1/tsmovtra_ctaori/obj2/tsmovtra_nombancodesde/campo1/numcue/campo2/nomcue/campo3/codcta/param1/1','','','botoncat')?>
<br>
  <?php $value = object_input_tag($tsmovtra, 'getNombancodesde', array (
  'size' => 30,
 'disabled' => true,
 'control_name' => 'tsmovtra[nombancodesde]',

)); echo $value ? $value : '&nbsp;' ?>
<?php echo input_hidden_tag('tsmovtra[ctacon_ori]', $tsmovtra->getCtacon_ori()) ?>
    </div>
  </th>
  <th>
  </th>
  <th>
  <?php echo label_for('tsmovtra[ctades]', __($labels['tsmovtra{ctades}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{ctades}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{ctades}')): ?>
    <?php echo form_error('tsmovtra{ctades}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php echo input_auto_complete_tag('tsmovtra[ctades]', $tsmovtra->getCtades(),
    'tesmovtraban/autocomplete?ajax=2',  array('autocomplete' => 'off','size' => 25,
     'maxlength' => 20,
     'readonly' => $tsmovtra->getId()!='' ? true : false ,
	 'onBlur'=> remote_function(array(
			  'url'      => 'tesmovtraban/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('tsmovtra_ctades').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&cajtexmos=tsmovtra_nombancohasta&cajtexcom=tsmovtra_ctacon_des&codigo='+this.value",

			  ))),
     array('use_style' => 'true')
  )
?>&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsmovtra_tesmovtraban/clase/Tsdefban/frame/sf_admin_edit_form/obj1/tsmovtra_nombancohasta/obj2/tsmovtra_ctades/obj3/tsmovtra_ctacon_des/campo1/nomcue/campo2/numcue/campo3/codcta/param1/1','','','botoncat')?>
<br>
  <?php $value = object_input_tag($tsmovtra, 'getNombancohasta', array (
  'size' => 30,
  'disabled' => true,
  'control_name' => 'tsmovtra[nombancohasta]',
  'maxlength' => 30,
)); echo $value ? $value : '&nbsp;' ?>
<?php echo input_hidden_tag('tsmovtra[ctacon_des]', $tsmovtra->getCtacon_des()) ?>

    </div>
  </th>
 </tr>
</table>

<br>

<?php echo label_for('tsmovtra[tipmovdesd]', __($labels['tsmovtra{tipmovdesd}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{tipmovdesd}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{tipmovdesd}')): ?>
    <?php echo form_error('tsmovtra{tipmovdesd}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

      <?php echo input_auto_complete_tag('tsmovtra[tipmovdesd]', $tsmovtra->getTipmovdesd(),
    'tesmovtraban/autocomplete?ajax=3',  array('autocomplete' => 'off','size' => 10,
     'maxlength' => 4,
     'readonly' => $tsmovtra->getId()!='' ? true : false ,
     'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('tsmovtra_tipmovdesd').value=cadena",
	 'onBlur'=> remote_function(array(
			  'url'      => 'tesmovtraban/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('tsmovtra_tipmovdesd').value != '' && $('id').value == ''",
  			  'with' => "'ajax=2&cajtexmos=tsmovtra_destipmovdeb&codigo='+this.value",

			  ))),
     array('use_style' => 'true')
  )
?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsmovtra_tesmovtraban/clase/Tstipmov/frame/sf_admin_edit_form/obj1/tsmovtra_tipmovdesd/obj2/tsmovtra_destipmovdeb/campo1/codtip/campo2/destip/param1/2','','','botoncat')?>

  <?php $value = object_input_tag($tsmovtra, 'getDestipmovdeb', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'tsmovtra[destipmovdeb]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<?php echo label_for('tsmovtra[tipmovhast]', __($labels['tsmovtra{tipmovhast}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{tipmovhast}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{tipmovhast}')): ?>
    <?php echo form_error('tsmovtra{tipmovhast}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo input_auto_complete_tag('tsmovtra[tipmovhast]', $tsmovtra->getTipmovhast(),
    'tesmovtraban/autocomplete?ajax=4',  array('autocomplete' => 'off','size' => 10,
     'maxlength' => 4,
     'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('tsmovtra_tipmovhast').value=cadena",
     'readonly' => $tsmovtra->getId()!='' ? true : false ,
	 'onBlur'=> remote_function(array(
			  'url'      => 'tesmovtraban/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('tsmovtra_tipmovhast').value != '' && $('id').value == ''",
  			  'with' => "'ajax=2&cajtexmos=tsmovtra_destipmovcre&codigo='+this.value",

			  ))),
     array('use_style' => 'true')
  )
?>
  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsmovtra_tesmovtraban/clase/Tstipmov/frame/sf_admin_edit_form/obj1/tsmovtra_tipmovhast/obj2/tsmovtra_destipmovcre/campo1/codtip/campo2/destip/param1/2','','','botoncat')?>

  <?php $value = object_input_tag($tsmovtra, 'getDestipmovcre', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'tsmovtra[destipmovcre]',
  'maxlength' => 80,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
</th>
</tr>
</table>
<div id="comprobante">
<br>

<table>
<tr>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Comprobante Contable')?></legend>
<div class="form-row">
<table>
<tr>
<th>
 <?php echo label_for('tsmovtra[numcom]', __($labels['tsmovtra{numcom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{numcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{numcom}')): ?>
    <?php echo form_error('tsmovtra{numcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovtra, 'getNumcom', array (
  'size' => 20,
  'maxlength' => 8,
  'readonly' => $tsmovtra->getId()!='' ? true : false ,
  'control_name' => 'tsmovtra[numcom]',
  //'onBlur'  => "javascript:event.keyCode=13; enter(event,this.value,this.id);",
)); echo $value ? $value : '&nbsp;' ?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('tsmovtra[fectracon]', __($labels['tsmovtra{fectracon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{fectracon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{fectracon}')): ?>
    <?php echo form_error('tsmovtra{fectracon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tsmovtra, 'getFectracon', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tsmovtra[fectracon]',
  'date_format' => 'dd/MM/yyyy',
  'readonly' => $tsmovtra->getId()!='' ? true : false ,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

<br>

 <?php echo label_for('tsmovtra[desnumcom]', __($labels['tsmovtra{desnumcom}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{desnumcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{desnumcom}')): ?>
    <?php echo form_error('tsmovtra{desnumcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovtra, 'getDesnumcom', array (
  'readonly' => true,
  'size' => 60,
  'control_name' => 'tsmovtra[desnumcom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
			   'url'      => 'tesmovtraban/ajax',
			   'script'   => true,
			   'complete' => 'CatalogoGrid2()',
			   'with' => "'ajax=3&reftra='+$('tsmovtra_reftra').value+'&numcom='+$('tsmovtra_numcom').value.replace(/#/gi,'*')+'&fectra='+document.getElementById('tsmovtra_fectra').value+'&grabar='+'N'+'&formulario='+'sf_admin/tesmovtraban/confincomgen'+'&destra='+document.getElementById('tsmovtra_destra').value+'&ctas='+document.getElementById('tsmovtra_ctacon_des').value+'_'+document.getElementById('tsmovtra_ctacon_ori').value+'&tipmov='+document.getElementById('tsmovtra_tipmovdesd').value+'_'+document.getElementById('tsmovtra_tipmovhast').value+'&mov='+'D_C'+'&montos='+document.getElementById('tsmovtra_montra').value+'_'+document.getElementById('tsmovtra_montra').value"
    ),array('class' => 'botoncat')) ?>
</th>
</tr>
</table>
</div>
</div>
</fieldset>

<script type="text/javascript">
var id='<?php echo $tsmovtra->getId()?>';
var auto='<?php echo $comprobaut;?>';
if (auto=='S')
{
$('comprobante').hide();
}
    if (id=="")
    {
		var confcorcom='<?php echo $sf_user->getAttribute('confcorcom')?>';
		 if (confcorcom=='S')
		 {
		 	$('tsmovtra_numcom').value='########';
		 	$('tsmovtra_numcom').readOnly=true;
		 }
    }


deshabilitarbotones();
function llenar_reftra(e)
{
	if (e.keyCode==13 || e.keyCode==9)
	{
		//document.getElementById('tsmovtra_numcom').value = document.getElementById('tsmovtra_reftra').value;
		document.getElementById('tsmovtra_fectracon').value = document.getElementById('tsmovtra_fectra').value;
		document.getElementById('tsmovtra_desnumcom').value = document.getElementById('tsmovtra_destra').value;
	}
}
function llenar_fectracon(e)
{
	if (e.keyCode==13)
	{
		//document.getElementById('tsmovtra_numcom').value = document.getElementById('tsmovtra_reftra').value;
		document.getElementById('tsmovtra_fectracon').value = document.getElementById('tsmovtra_fectra').value;
		document.getElementById('tsmovtra_desnumcom').value = document.getElementById('tsmovtra_destra').value;
	}
}
function llenar_desnumcom(e)
{
	if (e.keyCode==13)
	{
		//document.getElementById('tsmovtra_numcom').value = document.getElementById('tsmovtra_reftra').value;
		document.getElementById('tsmovtra_fectracon').value = document.getElementById('tsmovtra_fectra').value;
		document.getElementById('tsmovtra_desnumcom').value = document.getElementById('tsmovtra_destra').value;
	}
}

  function deshabilitarbotones()
  { var id="";
    var id='<?php echo $tsmovtra->getId()?>';
    if (id!="")
    {
     $('trigger_tsmovtra_fectra').hide();
     $('trigger_tsmovtra_fectracon').hide();
     $$('.botoncat')[0].disabled=true;
  	 $$('.botoncat')[1].disabled=true;
  	 $$('.botoncat')[2].disabled=true;
  	 $$('.botoncat')[3].disabled=true;
  	 $$('.botoncat')[4].disabled=true;
    }
  }

  function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
   	var confcorcom='<?php echo $sf_user->getAttribute('confcorcom')?>';
    valor=valor.pad(8, '0',0);
    $('tsmovtra_reftra').value=valor;
    if (confcorcom=='N')
    {
      $('tsmovtra_numcom').value=$('tsmovtra_reftra').value;
    }
   }
 }

  function Anular()
  {
  	var obj1=$('tsmovtra_reftra').value.replace(/#/gi,'*');
  	<?php if (SF_ENVIRONMENT=='dev') $dev ='_dev'; else $dev=''; ?>
    window.open('/tesoreria<?php echo $dev ?>.php/tesmovtraban/anular?obj1='+obj1,'...','menubar=no,toolbar=no,scrollbars=yes,width=500,height=300,resizable=yes,left=500,top=80')
  }
</script>

<?php include_partial('edit_actions', array('tsmovtra' => $tsmovtra,'new' => $new)) ?>

</form>

<ul class="sf_admin_actions">
<?php if ($tsmovtra->getId() && $tsmovtra->getStatus()!='N'): ?>
<li class="float-rigth">
<input type="button" name="Submit" value="Anular" onclick="javascript:Anular();" />
</li>
<li class="float-rigth">
<?php echo button_to(__('delete'), 'tesmovtraban/delete?id='.$tsmovtra->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?>
</li>
<?php endif; ?>
</ul>

