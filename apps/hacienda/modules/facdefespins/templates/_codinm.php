<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcdefins,1,array(
  'getprincipal' => 'getCodfue_inm',
  'getsecundario' => 'getNomfue_inm',
  //cajitas abajo
  'campoprincipal' => 'codinm',
  'camposecundario' => 'nomfue',
  'campobase' => 'codfue'
  ), 'Facdefespins_fcdefins', 'fcfuepre'); ?>