<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
    switch ($ajax){
      case '1':
        include_partial('atmunicipios_id', array( 'atciudadano' => $atciudadano ));
        break;
      case '2':
        include_partial('atparroquias_id', array( 'atciudadano' => $atciudadano ));
    }

?>
