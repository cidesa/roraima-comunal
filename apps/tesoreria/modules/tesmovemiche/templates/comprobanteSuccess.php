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
<form name="form1" id="form1">
<?
if ($msgerr=="")
{
    $x=0;
    $formu='';
    while ($x<count($formulario))
    {
      $formu=$formu.$formulario[$x].'*';
      $x++;
    }
    ?>
        <script type="text/javascript">
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
        </script>
<?php
}//if ($msgerr!="")
else //hubo un error al generar el comprobante contable
{
?>
      <script type="text/javascript">
            mens='<? print $msgerr; ?>';
            alert(mens);
        </script>
<?php
}//else //hubo un error al generar el comprobante contable
?>
</form>