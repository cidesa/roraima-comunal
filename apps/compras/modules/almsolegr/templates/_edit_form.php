

<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/16 17:37:55
?>
<?php echo form_tag('almsolegr/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php echo object_input_hidden_tag($casolart, 'getId') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'compras/almsolegr', 'tools') ?>
<?php echo input_hidden_tag('generapre', '') ?>
<?php echo input_hidden_tag('haydesp', $haydespacho) ?>
<?php echo input_hidden_tag('modifi', $modifico) ?>
<?php echo input_hidden_tag('tiporecarg', $tiporec) ?>
<?php echo object_input_hidden_tag($casolart, 'getPrecom') ?>
<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo $casolart->getEtiqueta() ;?></font></strong></th>
  </tr>
</table>
<fieldset id="sf_fieldset_none" class="">
<legend>
<?php if ($cambiareti=="") {?>
<?php echo __('Solicitud de Egreso') ?>
<?php }else {?>
<?php echo __($nometifor) ?>
<?php }?>
</legend>
<div class="form-row">
  <table>
   <tr>
    <th><?php echo label_for('casolart[reqart]', __($labels['casolart{reqart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{reqart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{reqart}')): ?>
    <?php echo form_error('casolart{reqart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getReqart', array (
  'size' => 8,
  'maxlength' => 8,
  'readonly'  =>  $casolart->getId()!='' ? true : false ,
  'control_name' => 'casolart[reqart]',
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){document.getElementById('casolart_fecreq').focus();}",
  'onBlur'  => "javascript:event.keyCode=13; enters(event,this.value);",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('casolart[fecreq]', __($labels['casolart{fecreq}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{fecreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{fecreq}')): ?>
    <?php echo form_error('casolart{fecreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($casolart, 'getFecreq', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'size' => '10',
  'control_name' => 'casolart[fecreq]',
  'date_format' => 'dd/MM/yy',
  'readonly'  =>  $casolart->getId()!='' ? true : false ,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'almsolegr/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('casolart_fecreq').value != '' && $('id').value == ''",
        'with' => "'ajax=7&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>

<?php echo input_hidden_tag('valfec', '') ?><?php echo input_hidden_tag('valfec2', '') ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('casolart[tipmon]', __($labels['casolart{tipmon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{tipmon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{tipmon}')): ?>
    <?php echo form_error('casolart{tipmon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php if ($casolart->getTipmon()=='') $var='001'; else $var=$casolart->getTipmon();?>
  <?php echo select_tag('casolart[tipmon]', objects_for_select(TsdesmonPeer::doSelect(new Criteria()),'getCodmon','getNommon',$var,'include_custom=Seleccione')) ?>
    </div></th>
   </tr>
  </table>

<br>

  <?php echo label_for('casolart[desreq]', __($labels['casolart{desreq}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{desreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{desreq}')): ?>
    <?php echo form_error('casolart{desreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($casolart, 'getDesreq', array (
  'size' => '80x2',
  'maxlength' => 1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'casolart[desreq]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
  <table>
   <tr>
    <th><?php echo label_for('casolart[monreq]', __($labels['casolart{monreq}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{monreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{monreq}')): ?>
    <?php echo form_error('casolart{monreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getMonreq', array (
  'size' => 15,
  'readonly' => true,
  'control_name' => 'casolart[monreq]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('casolart[unires]', __($labels['casolart{unires}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{unires}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{unires}')): ?>
    <?php echo form_error('casolart{unires}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getUnires', array (
  'size' => $loncat,
  'maxlength' => $loncat,
  'control_name' => 'casolart[unires]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracategoria')",
  'onBlur'=> remote_function(array(
        'url'      => 'almsolegr/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=casolart_nomcat&cajtexcom=casolart_unires&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
</div></th>
<th>&nbsp;</th>
<th>
<?php if ($catbnubica!='S') {?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npcatpre_Almsolegr/clase/Npcatpre/frame/sf_admin_edit_form/obj1/casolart_unires/obj2/casolart_nomcat/campo1/codcat/campo2/nomcat/param1/'.$loncat.'/param2/almsolegr')?>
<?php } else  {?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubica_Pagemiord/clase/Bnubica/frame/sf_admin_edit_form/obj1/casolart_unires/obj2/casolart_nomcat/campo1/codubi/campo2/desubi/param1/'.$loncat)?>
<?php } ?>

    </th>
    <th>&nbsp;&nbsp;&nbsp;</th>
    <th>  <?php $value = object_input_tag($casolart, 'getNomcat', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'casolart[nomcat]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

<br>

  <table>
   <tr>
   <th>
   <?php echo label_for('casolart[tipreq]', __($labels['casolart{tipreq}']), 'class="required" style="width:50px"') ?>
    <?php if ($casolart->getTipreq()=='') $vartipreq='C'; else $vartipreq=$casolart->getTipreq();?>
   <?php echo select_tag('casolart[tipreq]', options_for_select($listatipo,$vartipreq, 'include_custom=Seleccione Uno')); ?></th>
   <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   <th> <?php echo label_for('casolart[tipfin]', __($labels['casolart{tipfin}']), 'class="required" style="width:100px') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{tipfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{tipfin}')): ?>
    <?php echo form_error('casolart{tipfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('casolart[tipfin]', $casolart->getTipfin(),
    'almsolegr/autocomplete?ajax=2',  array('autocomplete' => 'off','size' => 4, 'maxlength' => 4, 'onBlur'=> remote_function(array(
        'url'      => 'almsolegr/ajax',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=2&cajtexmos=casolart_nomext&cajtexcom=casolart_tipfin&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
?></div></th>
<th>
&nbsp;</th>
<th>
<?php echo  button_to_popup_('...','/metodo/Fortipfin_Almsolegr/clase/Fortipfin/frame/sf_admin_edit_form/obj1/casolart_tipfin/obj2/casolart_nomext/campo1/codfin/campo2/nomext')?>
    </th>
   <th>&nbsp;&nbsp;&nbsp;</th>
   <th>  <?php $value = object_input_tag($casolart, 'getNomext', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'casolart[nomext]',
)); echo $value ? $value : '&nbsp;' ?></th>
<th><?php if ($casolart->getId()!="" && $precompromete=='S' && $autorizaprecom=='S' && $casolart->getPrecom()=='N') { ?>
<?php echo button_to(__('Generar Precompromiso'), 'almsolegr/generarcompromiso?id='.$casolart->getId()) ?>
   <? }?></th>
      <th>&nbsp;&nbsp;&nbsp;</th>
   <th>
     <?php if ($casolart->getId()!='') { ?>
  <input type="button" name="Submit" class="sf_admin_action_list" value="      Forma Pre-Impresa" onclick="javascript:Mostrar_orden_preimpresa();" />
<? } ?>
   </th>
   </tr>
  </table>

<br>

<table>
    <tr>
   <th> <?php echo label_for('casolart[codcen]', __($labels['casolart{codcen}']), 'class="required" style="width:100px') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{codcen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{codcen}')): ?>
    <?php echo form_error('casolart{codcen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getCodcen', array (
  'size' => 10,
  'maxlength' => 4,
  'control_name' => 'casolart[codcen]',
  'onBlur'=> remote_function(array(
        'url'      => 'almsolegr/ajax',
        'complete' => 'AjaxJSON(request, json)',
         'condition' => "$('casolart_codcen').value != ''",
         'script' => true,
        'with' => "'ajax=10&cajtexmos=casolart_descen&cajtexcom=casolart_codcen&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  </div></th>
<th>
&nbsp;</th>
<th>
<?php echo  button_to_popup_('...','/metodo/Cadefcen_Almsolegr/clase/Cadefcen/frame/sf_admin_edit_form/obj1/casolart_codcen/obj2/casolart_descen/campo1/codcen/campo2/descen')?>
    </th>
   <th>&nbsp;&nbsp;&nbsp;</th>
   <th>  <?php $value = object_input_tag($casolart, 'getDescen', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'casolart[descen]',
)); echo $value ? $value : '&nbsp;' ?></th>
    </tr>

</table>

</div>
</fieldset>

<br>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Detalle Solicitud');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<div id="recargos" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?
 echo input_hidden_tag('totartsinrec', '0');
 echo input_hidden_tag('actualfila', '0');
?>
<div id="grid_recargo">
<?
echo grid_tag($obj2);
?>
</div>
<div align="center">
<table>
<tr>
<th>
<?php echo label_for('',__('Total') , 'class="required" Style="width:100px"') ?>
<?php echo input_tag('totrecar','0,00', 'size=15 class=grid_txtright readonly=true') ?>
</th>
</tr>
</table>
</div>


<div align="right">
<?php if ($modifico=='S'){ ?>
<?php echo link_to_function(image_tag('/images/salir.gif'), "salvarmontorecargos()")?>
<?php }
else
{?>
 <?php echo link_to_function(image_tag('/images/salir.gif'), "$('recargos').hide();")?>
<?php }?>
</div>
</div>
</fieldset>
</div>

<!--
<ul class="sf_admin_actions">
<li class="float-rigth">
<input type="button" name="Submit" value="Recargos" onClick="javascript:$('recargos').toggle();"/>
</li>
</ul>Boton para aplicar recargos(llama al div recargos) -->
<?php if ($modifico=='S'){ ?>
<div align="left" id="botonesmarcar">
<table>
<tr>
<th>
<input type="button" name="Submit" value="Marcar" onClick="marcarTodo();"/>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<input type="button" name="Submit" value="Desmarcar" onClick="desmarcarTodo();"/>
</th>
</tr>
</table>
</div>
<?php } else {?>
<div align="left" id="botonesmarcar">
</div>
	<?php } ?>
<?
echo grid_tag($obj);
?>
<?php echo input_hidden_tag('totmarcadas', '0,00') ?>

</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Motivo');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <div align ="left" class="content<?php if ($sf_request->hasError('casolart{motreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{motreq}')): ?>
    <?php echo form_error('casolart{motreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($casolart, 'getMotreq', array (
  'size' => '80x5',
  'maxlength' => 1000,
  'control_name' => 'casolart[motreq]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Beneficio');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <div align ="left" class="content<?php if ($sf_request->hasError('casolart{benreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{benreq}')): ?>
    <?php echo form_error('casolart{benreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($casolart, 'getBenreq', array (
  'size' => '80x5',
  'maxlength' => 1000,
  'control_name' => 'casolart[benreq]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
   </div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage4", 'Observaciones');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <div align ="left" class="content<?php if ($sf_request->hasError('casolart{obsreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{obsreq}')): ?>
    <?php echo form_error('casolart{obsreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($casolart, 'getObsreq', array (
  'size' => '80x5',
  'maxlength' => 1000,
  'control_name' => 'casolart[obsreq]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage6", 'Razon de Compra');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?
echo grid_tag($obj3);
?>
</div>
</fieldset>

<?php tabInit("tp1", "0");?>

<?php include_partial('edit_actions', array('casolart' => $casolart)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-right">
      <?php if ($oculeli!="S"): ?>
      <?php if ($casolart->getId() && $haydespacho!='S' && $cotiz!='S' && $casolart->getStareq()!='N'): ?>
<?php echo button_to(__('delete'), 'almsolegr/delete?id='.$casolart->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
  'onclick' => 'elimin()',
)) ?><?php endif; ?> <?php endif; ?>
</li>
<li>
<div id="anul" style="display:none">
<input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:anular();" />
</div>
</li
  </ul>

<script language="JavaScript" type="text/javascript">
  var ids='<?php echo $casolart->getId()?>';
  var deshab='<?php echo $bloqfec; ?>';
  if (deshab=='S')
  {
  	$('trigger_casolart_fecreq').hide();
  	$('casolart_fecreq').readOnly=true;
  }
  var correla='<?php echo $mansolocor; ?>';
  if (correla=='S' && ids=='')
  {
  	$('casolart_reqart').value='########';
  	$('casolart_reqart').readOnly=true;
  }


  $('casolart_reqart').focus();

  var estatus='<?php echo $casolart->getStareq()?>';
  if (ids!="" && $('haydesp').value!='S' && estatus!='N')
  {
    $('anul').show();
  }


    function enters(e,valor)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('casolart_reqart').value=valor;
     var numsoldesh='<?php echo $numsoldesh; ?>';
     if (numsoldesh=='S')
     {
     	$('casolart_reqart').readOnly=true;
     }

   }
  }

  function anular()
  {
    var reqart=$('casolart_reqart').value;
    var fecreq=$('casolart_fecreq').value;
    window.open('/compras_dev.php/almsolegr/anular?reqart='+reqart+'&fecreq='+fecreq,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=400,resizable=yes,left=400,top=120');
  }
  function validargrid(id)
 {
    var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes=col+1;
    var descripcion=name+"_"+fila+"_"+coldes;

	if (razon_repetido(id))
	{
		alert('La Razon de Compra se encuentra repetido');
		$(id).value="";
		$(descripcion).value="";
	}

 }

 function razon_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var razon=$(id).value;

   var razonrepetido=false;
   var am=totalregistros('cx',1,10);
   var i=0;
   while (i<am)
   {
    var codigo="cx"+"_"+i+"_1";

    var razon2=$(codigo).value;

    if (i!=fila)
    {
      if (razon==razon2)
      {
        razonrepetido=true;
        break;
      }
    }
   i++;
   }
   return razonrepetido;
 }

  function recargo_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var recargo=$(id).value;

   var recargorepetido=false;
   var am=totalregistros('bx',1,20);
   var i=0;
   while (i<am)
   {
    var codigo="bx"+"_"+i+"_1";

    var recargo2=$(codigo).value;

    if (i!=fila)
    {
      if (recargo==recargo2)
      {
        recargorepetido=true;
        break;
      }
    }
   i++;
   }
   return recargorepetido;
 }

  function validargrid2(id)
 {
    var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var colmont=col+4;
    var descripcion=name+"_"+fila+"_"+coldes;
    var monto=name+"_"+fila+"_"+colmont;

	if (recargo_repetido(id))
	{
		alert('El Recargo  se encuentra repetido');
		$(id).value="";
		$(descripcion).value="";
		$(monto).value="0,00";
	}

 }

 function totalregistros(letra,posicion,filas)
  {
    var fil=0;
    var total=0;
    while (fil<filas)
    {
      var chk=letra+"_"+fil+"_"+posicion;
      if ($(chk).value!="")
      { total=total + 1; }
     fil++;
    }
    return total;
  }

  function ajax(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var descripcion=name+"_"+fil+"_"+coldes;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {

    new Ajax.Request('/compras_dev.php/almsolegr/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validargrid(id); }, parameters:'ajax=5&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
 }
 }

 function perderfocus(e,id,totcol)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   if (col!=totcol)
   {
    var colsig=col+1;
    var siguiente=name+"_"+fil+"_"+colsig;
   }
   else
   {
    var fila=fil+1;
   	var siguiente=name+"_"+fila+"_2";
   }

   if (e.keyCode==13 || e.keyCode==9)
   {
     if($(siguiente))
     {
      if (!$(siguiente).readOnly) $(siguiente).focus();
     }
   }
  }

  function validafec()
  {
    if ($('valfec2').value=='S')
  	{
  	  alert('La Fecha no se encuentra del Período Fiscal');
  	  $('casolart_fecreq').value="";
  	  $('casolart_fecreq').focus();
  	}
  	else if ($('valfec').value=='S')
  	{
  	  alert('La Fecha se encuentra dentro un Período Cerrado');
  	  $('casolart_fecreq').value="";
  	  $('casolart_fecreq').focus();
  	}
  }

  function Mostrar_orden_preimpresa()
  {
            var codreqdes=$('casolart_reqart').value;
            var codreqhas=$('casolart_reqart').value;

          var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
          pagina=ruta+"/reportes/reportes/compras/r.php=?r=carsolegrpre.php&codreqdes="+codreqdes+"&codreqhas="+codreqhas;
          window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")

  }

</script>
