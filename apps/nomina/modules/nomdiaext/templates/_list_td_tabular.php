<?php
// auto-generated by sfPropelAdmin
// date: 2007/11/20 16:31:56
?>
    <td><?php echo link_to($npdiaext->getCodnom() ? $npdiaext->getCodnom() : __('-'), 'nomdiaext/edit?id='.$npdiaext->getId().'&codnom='.$npdiaext->getCodnom().'&fecha='.$npdiaext->getFecha()) ?></td>
    <td><?php echo $npdiaext->getNomnom() ?></td>
      <td><?php echo ($npdiaext->getFecha() !== null && $npdiaext->getFecha() !== '') ? format_date($npdiaext->getFecha(), "dd/MM/yy") : '' ?></td>
