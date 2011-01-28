<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/24 18:33:08
?>
<?php echo form_tag('AlmReq/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript') ?>
<?php use_helper('PopUp') ?>
<?php use_helper('Grid') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools','observe','compras/almdesp') ?>
<?php use_helper('tabs') ?>

<?php echo object_input_hidden_tag($careqart, 'getId') ?>

<fieldset><legend><?php  echo __('Requisión')?></legend>
<div class="form-row"><?php echo label_for('careqart[reqart]', __($labels['careqart{reqart}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('careqart{reqart}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('careqart{reqart}')): ?> <?php echo form_error('careqart{reqart}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($careqart, 'getReqart', array (
'size' => 8,
'maxlength' => 8,
'readonly'  =>  $careqart->getId()!='' ? true : false ,
'control_name' => 'careqart[reqart]',
'onBlur'  => "javascript: enter(this.value);",
)); echo $value ? $value : '&nbsp;' ?>

<div class="sf_admin_edit_help"><?php echo __('Máximo 8 caracteres') ?></div>
</div>
<br>

<?php echo label_for('careqart[fecreq]', __($labels['careqart{fecreq}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('careqart{fecreq}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('careqart{fecreq}')): ?> <?php echo form_error('careqart{fecreq}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_date_tag($careqart, 'getFecreq', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'careqart[fecreq]',
  'date_format' => 'dd/MM/yyyy',
   'maxlength' => 10,
//   'readonly'  =>  $careqart->getId()!='' ? true : false ,
   'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
<?php echo label_for('careqart[desreq]', __($labels['careqart{desreq}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('careqart{desreq}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('careqart{desreq}')): ?> <?php echo form_error('careqart{desreq}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($careqart, 'getDesreq', array (
  'size' => 80,
  'maxlength' => 500,
  'control_name' => 'careqart[desreq]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>
<?php echo label_for('careqart[codcatreq]', __($labels['careqart{codcatreq}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('careqart{codcatreq}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('careqart{codcatreq}')): ?> <?php echo form_error('careqart{codcatreq}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($careqart, 'getCodcatreq', array (
  'size' => $lonubi,
  'control_name' => 'careqart[codcatreq]',
  'maxlength' => $lonubi,
  'readonly'  =>  $careqart->getId()!='' ? true : false ,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$forubi')",
  'onBlur'=> remote_function(array(
       'url'      => 'almreq/ajax',
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'condition' => "$('careqart_codcatreq').value != ''",
       'with' => "'ajax=1&cajtexmos=careqart_desubi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  &nbsp;
   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Bnubica_Pagemiord/clase/Bnubica/frame/sf_admin_edit_form/obj1/careqart_codcatreq/obj2/careqart_desubi/campo1/codubi/campo2/desubi/param1/".$lonubi,'','','botoncat')?></th>

<?php $value = object_input_tag($careqart, 'getDesubi', array (
'disabled' => true,
'size' => 65,
'control_name' => 'careqart[desubi]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>

<?php echo label_for('careqart[codcen]', __($labels['careqart{codcen}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('careqart{codcen}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('careqart{codcen}')): ?> <?php echo form_error('careqart{codcen}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($careqart, 'getCodcen', array (
  'size' => 10,
  'control_name' => 'careqart[codcen]',
  'maxlength' => 4,
  'readonly'  =>  $careqart->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
       'url'      => 'almreq/ajax',
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'condition' => "$('careqart_codcen').value != ''",
       'with' => "'ajax=4&cajtexmos=careqart_descen&cajtexcom=careqart_codcen&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  &nbsp;
   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefcen_Almsolegr/clase/Cadefcen/frame/sf_admin_edit_form/obj1/careqart_codcen/obj2/careqart_descen/campo1/codcen/campo2/descen','','','botoncat')?>
<?php $value = object_input_tag($careqart, 'getDescen', array (
'disabled' => true,
'size' => 65,
'control_name' => 'careqart[descen]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>

<?php echo label_for('careqart[monreq]', __($labels['careqart{monreq}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('careqart{monreq}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('careqart{monreq}')): ?> <?php echo form_error('careqart{monreq}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($careqart, array('getMonreq',true), array (
  'size' => 15,
  'readonly'=>true,
  'control_name' => 'careqart[monreq]',
)); echo $value ? $value : '&nbsp;' ?> &nbsp;&nbsp;&nbsp;&nbsp;


<?php
if ($careqart->getId()!="" &&  $autorizareq=='S' && $careqart->getAprreq()!='S') { ?>
<?php echo submit_to_remote('Submit2', 'Autorizar para poder ser Despachada', array(
       'url'      => 'almreq/autoriza',
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'condition' => "$('careqart_codcatreq').value != ''",
       'with' => "'id='+$('id').value")) ?>
   <? }?></div>

<br>
<ul class="sf_admin_actions">
<li class="float-rigth">
<?php if ($careqart->getId()!='') { ?>
  <input type="button" name="Submit" class="sf_admin_action_list" value="Forma Pre-Impresa" onclick="javascript:Mostrar_orden_preimpresa();" />
<? } ?>
</li>
</ul>
<br>

<?php echo grid_tag($obj);?>
</div>
</fieldset>

<?php include_partial('edit_actions', array('careqart' => $careqart)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($careqart->getId() && $oculeli!="S"): ?>
<?php echo button_to(__('delete'), 'almreq/delete?id='.$careqart->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript">

 var id='<?php echo $careqart->getId()?>';
    if (id!="")
    {
     $$('.botoncat')[0].disabled=true;
     $$('.botoncat')[1].disabled=true;
   }else{
   	     var manesolcorr='<?php echo $mansolocor; ?>';
     if (manesolcorr=='S')
     {
        $('careqart_reqart').value='########';
     	$('careqart_reqart').readOnly=true;
        $('careqart_desreq').focus();
     }
   }

  var deshab='<?php echo $bloqfec; ?>';
  if (deshab=='S')
  {
  	$('trigger_careqart_fecreq').hide();
  	$('careqart_fecreq').readOnly=true;
  }

function enter(valor)
 {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('careqart_reqart').value=valor;
     var desh='<?php echo $numdesh; ?>';
     if (desh=='S')
     {
       $('careqart_reqart').readOnly=true;
     }
 }

function calcularcosto(e,id)
{
 if (e.keyCode==13)
 {
	var aux = id.split("_");
	var name=aux[0];
	var fil=aux[1];
	var col=parseInt(aux[2]);

	var colcantrec=5;
	var colcosto=7;
    var coltotal=8;

	var canrec=name+"_"+fil+"_"+colcantrec;
	var costo=name+"_"+fil+"_"+colcosto;
	var total=name+"_"+fil+"_"+coltotal;

	 var numcanrec=toFloat(canrec);

	 var numcosto=toFloat(costo);

	 numtotal = (numcanrec * numcosto)

	 document.getElementById(canrec).value=format(numcanrec.toFixed(2),'.',',','.');
	 document.getElementById(costo).value=format(numcosto.toFixed(2),'.',',','.');
	 document.getElementById(total).value=format(numtotal.toFixed(2),'.',',','.');

	 entermonto(e,id);
}

}

  function Mostrar_orden_preimpresa()
  {
    var codreqdes=$('careqart_reqart').value;
    var codreqhas=$('careqart_reqart').value;

    var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
    pagina=ruta+"/reportes/reportes/compras/r.php=?r=carreqpre.php&codreqdes="+codreqdes+"&codreqhas="+codreqhas;
    window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")

  }

</script>
