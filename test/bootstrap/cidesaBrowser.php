<?php

require_once('simpletest/web_tester.php');
require_once('simpletest/reporter.php');

class cidesaBrowser extends WebTestCase {

    private $ruta ="/reportes/reportes/";
    private $page;
    private $minombre;
    private $mimodulo;
    private $contadorbuenos;
    private $contadormalos;
    private $hostname;

  function cidesaBrowser($modulo,$nombre, $hostname='localhost'){
    $this->minombre = $nombre;
    $this->mimodulo = $modulo;
    $this->hostname = $hostname;
  }

  function setRuta($r)
  {
    $this->ruta = $r;
  }

  function setLime($l)
  {
    $this->lime = $l;
  }

  function testContact() {

    $this->page='http://'.$this->hostname.'/'.$this->ruta.$this->mimodulo.'/'.$this->minombre;

    $this->get($this->page);

    $ok= $this->assertText('Criterios');
    if ($ok==1){
      $this->lime->ok(true,'status code is 200');
    }else{
      $this->lime->ok(false,'error in request');
    }
    if($ok==1){
      $this->submitFormById('form1');
      $ok2=$this->assertNoText('Fatal error:');
      if ($ok2==1){
        $this->lime->ok(true,'submit executed');
      }else{
        $this->lime->ok(false,'error in submit');
      }
    }


  }


 }

?>