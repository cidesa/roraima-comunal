<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/17 11:03:30
?>
<?php echo form_tag('confincomgen/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','compras/almordcom','ajax','tools','grid') ?>
<?php echo object_input_hidden_tag($contabc, 'getId') ?>

<input type="hidden" name="formulario" value=<? print $formulario; ?> />

<fieldset id="sf_fieldset_none" class="">
<? $con=$contabc->getNumcom(); ?>
<? if ($contabc->getNumcom()=='') $contabc->setNumcom($numcom); ?>
<? if ($contabc->getReftra()=='') $contabc->setReftra($reftra); ?>
<? if (($contabc->getFeccom()=='') and ($fectra<>'')) $contabc->setFeccom($fectra); ?>
<? if ($contabc->getDescom()=='') $contabc->setDescom($destra); ?>
<? if ($contabc->getMoncom()==0.00) $contabc->setMoncom($monto); ?>
<div class="form-row">
  <?php echo label_for('contabc[numcom]', __($labels['contabc{numcom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('contabc{numcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('contabc{numcom}')): ?>
    <?php echo form_error('contabc{numcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($contabc, 'getNumcom', array (
  'maxlength' => 8,
  'size' => 20,
  'control_name' => 'contabc[numcom]',
  //'readonly'  =>  $gencorrel=='S' ? true : false ,
  'readonly'  =>  true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
  <?php echo label_for('contabc[reftra]', __($labels['contabc{reftra}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('contabc{reftra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('contabc{reftra}')): ?>
    <?php echo form_error('contabc{reftra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($contabc, 'getReftra', array (
  'maxlength' => 8,
  'size' => 20,
  'control_name' => 'contabc[reftra]',
  'onKeypress' => 'llenar_codigo(event)',
  'onBlur' => 'llenar2(event)',
  'readOnly' => 'true',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('contabc[feccom]', __($labels['contabc{feccom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('contabc{feccom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('contabc{feccom}')): ?>
    <?php echo form_error('contabc{feccom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($contabc, 'getFeccom', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'contabc[feccom]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('contabc[descom]', __($labels['contabc{descom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('contabc{descom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('contabc{descom}')): ?>
    <?php echo form_error('contabc{descom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($contabc, 'getDescom', array (
  'maxlength' => 250,
  'size' => 150,
  'control_name' => 'contabc[descom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

<?php echo grid_tag($obj);?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Totales&nbsp;&nbsp;&nbsp;
<?php echo input_tag('debito', '0', 'size=15 readonly=true') ?>&nbsp;&nbsp;&nbsp;<?php echo input_tag('credito', '0','size=15 readonly=true') ?>
<?
$x=count($obj);
?>

</div>
</fieldset>


<script type="text/javascript">
<!--
  function inhabilitar_campo(e,id)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     if (col==5)
     {
       var coldebcre=col+1;
     }
     else
     {
       var coldebcre=col-1;
     }
     var debcre=name+"_"+fil+"_"+coldebcre;
     var filact = toFloat(id);

     if (filact>0)
     {
      $(debcre).value="0,00";
      $(debcre).readOnly=true;
     }
     else if (filact==0 || filact=="")
     {
      $(debcre).value="0,00";
      $(debcre).readOnly=false;
     }
   }
 }

function llenar_codigo(e)
{
  if (e.keyCode==13)
  {
    //num = document.getElementById('contabc_numcom').value;
    num = document.getElementById('contabc_reftra').value;
    i=0;
    var numfil=parseInt('<?php echo $contabc->getNumfilas()?>') +1;
    while (i<numfil)
    {
      fil= "ax_"+i+"_3";

      if (document.getElementById(fil))
      {
        document.getElementById(fil).value=num;

      }
      i++;
    }
  }
}
function llenar_fecha(e)
{
  if (e.keyCode==13)
  {
    fecha = document.getElementById('contabc_feccom').value;
    fecha=(fecha.substr(6,4)) + "-" + (fecha.substr(3,2))+ "-" + (fecha.substr(0,2));
    i=0;
    var numfil=parseInt('<?php echo $contabc->getNumfilas()?>') +1;
    while (i<numfil)
    {
      fil= "ax_"+i+"_4";

      if (document.getElementById(fil))
      {
        document.getElementById(fil).value=fecha;

      }
      i++;
    }
  }
}

function llenar2()
{
    //num = document.getElementById('contabc_numcom').value;
    num = document.getElementById('contabc_reftra').value;
    n = 7;
    i=0;
    var numfil=parseInt('<?php echo $contabc->getNumfilas()?>') +1;
    while (i<numfil)
    {
      fil= "ax_"+i+"_3";

      if (document.getElementById(fil))
      {
        document.getElementById(fil).value=num;

      }
      i++;
    }
    fecha = document.getElementById('contabc_feccom').value;
    //fecha=(fecha.substr(6,4)) + "-" + (fecha.substr(3,2))+ "-" + (fecha.substr(0,2));
    n = 7;
    i=0;
    var numfil=parseInt('<?php echo $contabc->getNumfilas()?>') +1;
    while (i<numfil)
    {
      fil= "ax_"+i+"_4";
      var catfec="trigger_ax_"+i+"_4";

      if (document.getElementById(fil))
      {
        document.getElementById(fil).value=fecha;
        var deshab='<?php echo $bloqfec; ?>';
        if (deshab=='S')
        {
        	$(catfec).hide();
        	$(fil).readOnly=true;
        } 
      }
      i++;
    }
}

function llenar3()
{
    i=0;
    var ctas='<? print $ctas;  ?>';
    var desc_ctas='<? print $desc_ctas;  ?>';
    var arreglo_mov='<? print $arreglo_mov;  ?>';
    var arreglo_montos='<? print $arreglo_montos;  ?>';
    arreglo_ctas=ctas.split("_");
    arreglo_descctas=desc_ctas.split("_");
    arreglo_mov=arreglo_mov.split("_");
    arreglo_montos=arreglo_montos.split("_");
    var reg=arreglo_ctas.length;

    while (i<reg-1)
    {
      fil1= "ax_"+i+"_1";
      fil2= "ax_"+i+"_2";
      fil5= "ax_"+i+"_5";
      fil6= "ax_"+i+"_6";

      if (document.getElementById(fil1))
      {
        document.getElementById(fil1).value=arreglo_ctas[i+1];
      }
      if (document.getElementById(fil2))
      {
        document.getElementById(fil2).value=arreglo_descctas[i+1];
      }
      if (arreglo_mov[i]=="D")
      {
        document.getElementById(fil5).value=arreglo_montos[i];
      }
      else
      {
        document.getElementById(fil6).value=arreglo_montos[i];
      }

      i++;
    }
}

function llenar4()
{
      fil= "ax_1_5";
      if (document.getElementById(fil))
      {
        document.getElementById(fil).value=0.00;

      }
      fil= "ax_0_6";
      if (document.getElementById(fil))
      {
        document.getElementById(fil).value=0.00;

      }
}

//-->
</script>
<? if ($con=='')
{
    ?><script type="text/javascript">
  llenar2();
  llenar3();
  </script><?
}
/*else
{
  ?><script type="text/javascript">
  llenar4();
  </script><?
}*/
?>
<?php include_partial('edit_actions', array('contabc' => $contabc)) ?>

</form>
<script type="text/javascript">
var deshab='<?php echo $bloqfec; ?>';
if (deshab=='S')
{
	$('trigger_contabc_feccom').hide();
	$('contabc_feccom').readOnly=true;
} 

<!--
actualizarsaldos();
//-->
</script>
<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($contabc->getId()): ?>
<?php echo button_to(__('delete'), 'confincomgen/delete?id='.$contabc->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
