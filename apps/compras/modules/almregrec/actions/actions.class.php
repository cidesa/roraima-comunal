<?php

/**
 * almregrec actions.
 *
 * @package    Roraima
 * @subpackage almregrec
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almregrecActions extends autoalmregrecActions
{
   private $coderror = -1;
   
  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $resp=-1;    
    
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {       
      $this->carecaud = $this->getCarecaudOrCreate();
       $carecaud = $this->getRequestParameter('carecaud');
       $valor = $carecaud['codrec'];
       $campo='codrec';

       $resp=Herramientas::ValidarCodigo($valor,$this->carecaud,$campo);
       
      if($resp!=-1)
      {
        $this->coderror = $resp; 
        return false;
      } else return true;
    }else return true;  
 }
	
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	  {
	    $this->carecaud = $this->getCarecaudOrCreate();
	    $this->mansolocor="";
	    $varemp = $this->getUser()->getAttribute('configemp');
	    if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('compras',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
		     if(array_key_exists('almregrec',$varemp['aplicacion']['compras']['modulos']))
		       if(array_key_exists('mansolocor',$varemp['aplicacion']['compras']['modulos']['almregrec']))
		       {
		       	$this->mansolocor=$varemp['aplicacion']['compras']['modulos']['almregrec']['mansolocor'];
		       }
        if ($this->mansolocor=='S') {
		    if (!$this->carecaud->getId())
		    {
		       $t= new Criteria();
		       $t->setLimit(1);
		       $t->addDescendingOrderByColumn(CarecaudPeer::CODREC);
		       $reg= CarecaudPeer::doSelectOne($t);
		       if ($reg)
		       {
		           $this->carecaud->setCodrec(str_pad(($reg->getCodrec()+1),10,'0',STR_PAD_LEFT));
		       }else $this->carecaud->setCodrec('0000000001');
		    }
        }


	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateCarecaudFromRequest();
	
	      $this->saveCarecaud($this->carecaud);
	
	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');
	
	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('almregrec/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('almregrec/list');
	      }
	      else
	      {
	        return $this->redirect('almregrec/edit?id='.$this->carecaud->getId());
	      }
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }
	  }
	  
  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();
        
    $this->carecaud = $this->getCarecaudOrCreate();
    $this->updateCarecaudFromRequest();    
    
        
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1)
      {
        $err = Herramientas::obtenerMensajeError($this->coderror);	    
        $this->getRequest()->setError('',$err);	
      }
    }
    return sfView::SUCCESS;

  }
  
	  
  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	  		$dato=CatiprecPeer::getDestip($this->getRequestParameter('codigo'));	  			 
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';		 			 	    
	    } 	    		  	    

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')'); 
	    return sfView::HEADER_ONLY;
	}	 
 
	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODTIPREC','Catiprec','codtiprec',$this->getRequestParameter('carecaud[codtiprec]'));
	    }	   
	}	  

	protected function getLabels()
	  {
	    return array(
	      'carecaud{codrec}' => 'Código',
	      'carecaud{desrec}' => 'Descripción',
	      'carecaud{limrec}' => 'Limitante',
	      'carecaud{canutr}' => 'Apartir de',
	      'carecaud{codtiprec}' => 'Grupo',
	      'carecaud{destiprec}' => 'Descripción',
	      'carecaud{observ}' => 'Observación',
	    );
	  }

  protected function updateCarecaudFromRequest()
  {
    $carecaud = $this->getRequestParameter('carecaud');

    $this->mansolocor="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almregrec',$varemp['aplicacion']['compras']['modulos']))
	       if(array_key_exists('mansolocor',$varemp['aplicacion']['compras']['modulos']['almregrec']))
	       {
	       	$this->mansolocor=$varemp['aplicacion']['compras']['modulos']['almregrec']['mansolocor'];
	       }

    if (isset($carecaud['codrec']))
    {
      $this->carecaud->setCodrec($carecaud['codrec']);
    }
    if (isset($carecaud['desrec']))
    {
      $this->carecaud->setDesrec($carecaud['desrec']);
    }
    if (isset($carecaud['limrec']))
    {
      $this->carecaud->setLimrec($carecaud['limrec']);
    }
    if (isset($carecaud['canutr']))
    {
      $this->carecaud->setCanutr($carecaud['canutr']);
    }
    if (isset($carecaud['codtiprec']))
    {
    $this->carecaud->setCodtiprec($carecaud['codtiprec'] ? $carecaud['codtiprec'] : null);
    }
    if (isset($carecaud['destiprec']))
    {
      $this->carecaud->setDestiprec($carecaud['destiprec']);
    }
    if (isset($carecaud['observ']))
    {
      $this->carecaud->setObserv($carecaud['observ']);
    }
  }

}
