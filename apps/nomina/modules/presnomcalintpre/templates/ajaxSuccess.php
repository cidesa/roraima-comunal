<?php
// auto-generated by sfPropelAdmin
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'Javascript', 'Grid', 'I18N', 'PopUp') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>

<?

/*if ($vargrid=='id1')
	echo grid_tag($obj);
elseif ($vargrid=='id2')
	echo grid_tag($obj2);
elseif ($vargrid=='id3')
	echo grid_tag($obj3);


*/
if ($obj){
	//$registro=$obj['datos'];
	//$cont=count($registro);
	//H::printR($registro[22]);
	//echo $registro[0]['mondia'];

//	array_pop($registro);  ///Borra la Ultima Posicion
//  array_pop($registro);  ///Borra la Ultima Posicion
//end($f);
	//H::printR($registro);
	echo grid_tag($obj);

?>
<script>
//	$('diaserrn').value = '5';
</script>

<table>
   <tr>
    <th><?php echo label_for('Totales', __('TOTALES'), 'class="required" ') ?></th>

	<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Antiguedad Acumulada
	<?php echo input_tag('totcapitalact', '', array(
	'size'=> 15,
	'class'=> 'grid_txtright',
	'readonly'=> true,
	)) ?>
   </th>

    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Dias Art.108
	<?php echo input_tag('totmonpres', '', array(
	'size'=> 15,
	'class'=> 'grid_txtright',
	'readonly'=> true,
	)) ?>
   </th>


    <th>&nbsp;&nbsp;</th>
    <th>
    Interes Acumulado
  <?php echo input_tag('totintacu', '', array(
	'size'=> 15,
	'class'=> 'grid_txtright',
	'readonly'=> true,
	)) ?></th>



	<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Adelanto Anticipo
	<?php echo input_tag('totmonant', '', array(
	'size'=> 15,
	'class'=> 'grid_txtright',
	'readonly'=> true,
	)) ?>
   </th>

    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Adelanto Intereses
    <?php echo input_tag('totmonadeint', '', array(
	'size'=> 15,
	'class'=> 'grid_txtright',
	'readonly'=> true,
	)) ?></th>


   </tr>
</table>



<?
/*
$col7->setEsTotal(true, 'totcapitalact');
$col8->setEsTotal(true, 'totmonpres');

 *  * $col12->setEsTotal(true, 'totintacu');
			$col13->setEsTotal(true, 'totmonant');
			$col14->setEsTotal(true, 'totmonadeint');

 *
 * */
}

/*

if ($aux=='si')
echo javascript_tag("
		new Ajax.Updater( 'id2', '/nomina'+$('entorno').value+'.php/presnomcalintpre/ajax', {asynchronous:true, evalScripts:true, parameters:'ajax=3'});
");
if ($aux2=='si')
echo javascript_tag("
		new Ajax.Updater( 'id3', '/nomina'+$('entorno').value+'.php/presnomcalintpre/ajax', {asynchronous:true, evalScripts:true, parameters:'ajax=4'});
");

*/
