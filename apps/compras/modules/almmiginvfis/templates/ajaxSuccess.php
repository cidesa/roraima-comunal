<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if($datos) {?>
<div id="divgriddatos">
    <br></br>    
	<?php echo grid_tag_v2($cainvfis->getObj()); ?>
</div>
<script language="Javascript">
    $('leer').hide();
    $('cargar').hide();
    $('salvar').show();
    $('diviniinv').show();
</script>
<?php }else { ?>
<script>
    $('leer').show();
    $('cargar').show();
    $('salvar').hide();
    $('diviniinv').hide();
</script>
<div id="divgriddatos">
<table width="100%" >
  <tr>
    <th><strong><font color="#CC0000" size="4" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo $mensaje;?></font></strong></th>
  </tr>
</table>
</div>
<?php } ?>

