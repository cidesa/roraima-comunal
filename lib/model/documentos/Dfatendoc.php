<?php

/**
 * Subclase para representar una fila de la tabla 'dfatendoc'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.documentos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Dfatendoc extends BaseDfatendoc
{
  protected $tipdoc = '';
  protected $valact = '';
  protected $valanu = '';
  protected $objitems = '';
  protected $check = false;

  public function afterHydrate(){

    $dftabtip = $this->getDftabtip();
    $this->tipdoc = $dftabtip->getTipdoc();
    $this->valact = $dftabtip->getValact();
    $this->valanu = $dftabtip->getValanu();

  }

  public function getElestado()
  {
    if($this->valact==$this->estado) return "<font color=\"#000080\">Activo</font>";
    elseif($this->valanu==$this->estado) return "<font color=\"#FF0000\">Anulado</font>";
        else return 'Otro Estado('.$this->estado.')';
  }

  public function getAnuate($val = false)
  {
    
    $lista = Constantes::listaEstadoDocumento();
    if($this->anuate) $ret = $lista[$this->anuate];
    else $ret=''; 

    if(!$val){
        if($ret==$lista['1']) return "<font color=\"#FF0000\">$ret</font>";
        else return "<font color=\"#000080\">$ret</font>";
    }else{
        return $ret;
    }

  }

  public function estaAnulado()
  {

    if($this->anuate==0) return false;
    else return true;

  }


  public function getStatus()
  {

    $lista = Constantes::listaAtencion();

    if(parent::getStaate()=="") return "";
    else  return $lista[parent::getStaate()];

  }




}
