<?php

/**
 * almcontrato actions.
 *
 * @package    Roraima
 * @subpackage almcontrato
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almcontratoActions extends autoalmcontratoActions
{
public function getMostrar_Empresa()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->caordcon->getCodpro(),10,' ');
  	  $c->add(CaproveePeer::CODPRO, $this->campo);
  	  $this->empre = CaproveePeer::doSelect($c);
	  if (count($this->empre)>0)
	  	{
	  		$this->erif = $this->empre[0]->getRifpro();
	  	    $this->enom = $this->empre[0]->getNompro();
	  	}
	  	else
	  	{
	  		$this->erif = '';
	  	    $this->enom = '';
	  	}
  }
  
public function getTipo()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->caordcon->getTipcon(),4,' ');
  	  $c->add(CpdocprcPeer::TIPPRC, $this->campo);
  	  $this->tipo = CpdocprcPeer::doSelect($c);
	  if ($this->tipo)
	  	return $this->tipo[0]->getNomext();
	  else 
	    return ' ';
  }
  
public function solicitud()    
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT cadetordc.codpre, cpdeftit.nompre, cadetordc.cancon, cadetordc.moncon FROM caordcon, cadetordc, cpdeftit where ((cadetordc.ordcon ='".($this->caordcon->getOrdcon())."') AND (cadetordc.codpre=cpdeftit.codpre))";
        $stmt = $con->createStatement();
        $stmt->setLimit(5000);
        $rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
        $resultado=array();
        //aqui lleno el array con los resultados:
           while ($rs->next())
             {
                $resultado[]=$rs->getRow();
             }
        //y la envio al template:
        $this->rs=$resultado;
        return $this->rs;
    }
	
/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->caordcon = $this->getCaordconOrCreate();
    $this->doctip = $this->getTipo();
    $this->getMostrar_Empresa();
    $this->rs = $this->solicitud();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCaordconFromRequest();

      $this->saveCaordcon($this->caordcon);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almcontrato/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almcontrato/list');
      }
      else
      {
        return $this->redirect('almcontrato/edit?id='.$this->caordcon->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
