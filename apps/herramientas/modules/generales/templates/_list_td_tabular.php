<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/30 18:33:23
?>

<?php
  $i = 0;
  $car="'";
  foreach($columnas as $c => $nomcol)
  {
  $dat='$par="var a=new Array(';
  $k=0;

  foreach ($objs as $keyobj => $obj)
  {
      $tipocol = $ctlg->getColumCreoleType($keyobj);

      if($k!=0) $dat .= ",";

      if($tipocol==5 || $tipocol==14) $info = '$infoget = $registro->get'.$keyobj.'(true);';
      elseif($tipocol==10) $info = '$infoget = $registro->get'.$keyobj.'("d/m/Y");';
      else $info = '$infoget = str_replace($car,"",$registro->get'.$keyobj.'());';

      eval($info);
      //$dat .= "'".$infoget."'";

      $infoget=eregi_replace("[\n|\r|\n\r]", "", $infoget);
      $dat .= "'".htmlspecialchars($infoget)."'";
      $k++;

  }
  $dat = $dat.');";';

  $tipocol = $ctlg->getColumCreoleType($c);

  if($tipocol==5 || $tipocol==14) $cod= '$val=$registro->get'.$c.'(true);';
  elseif($tipocol==10) $cod= '$val=$registro->get'.$c.'("d/m/Y");';
  else $cod= '$val=$registro->get'.$c.'();';

  //print $cod;
  if($c!='Id') eval($cod);

  if($i==0) {
    eval($dat);


    echo '<td class="grid_fila">'; echo link_to_function($val, $par.'javascript:aceptar(a)'); echo '</td>';
  }
  if($i!=0 && $c!='Id') {
    echo '<td class="grid_fila">'.$val.'</td>';
    //($registro->getFecdph() !== null && $registro->getFecdph() !== '') ? format_date($registro->getFecdph(), "dd/MM/yyyy") : ''
  }

  $i++;
  }

// echo link_to_function($registro->getDphart() ? $registro->getDphart() : __('-'), $par.'javascript:aceptar(a)')
// echo $registro->getDesdph()
// echo $registro->getReqart()
// echo ($registro->getFecdph() !== null && $registro->getFecdph() !== '') ? format_date($registro->getFecdph(), "dd/MM/yyyy") : ''

?>

