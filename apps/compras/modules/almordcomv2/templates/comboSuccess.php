<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: comboSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'PopUp', 'Helper') ?>

<?php echo '<strong>Tipo:</strong>   '. select_tag('caordcom[tipord]', options_for_select($listatipocompra,$tipo_ord));

?>