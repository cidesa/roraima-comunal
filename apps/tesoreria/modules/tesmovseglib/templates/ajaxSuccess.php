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
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<!-- ////////////////   AJAX 3 /////////////////////-->
<? if ($ajax=='3') { ?>
<form name="form1" id="form1">
<?
	if ($error=='')
	{
		$x=0;
		$formu='';
		while ($x<count($formulario))
		{
			$formu=$formu.$formulario[$x].'*';
			$x++;
		}
	}
?>
<script type="text/javascript">
var error='<? print $error; ?>';
	if (error=='')
	{
		j=0;
		i='<? print $i; ?>';
		i=parseInt(i);
		formu='<? print $formu; ?>';
		formulario=formu.split('*');
		while (j<=i)
		{
			comprobante(formulario[j]);
			j++;
		}
	}
	else
	{
		alert(error);
	}
</script>
</form>
<? } ?>
<!-- ////////////////   AJAX 3 /////////////////////-->

<!-- ////////////////   AJAX 4 /////////////////////-->
<? if ($ajax=='4') { ?>


<? } ?>