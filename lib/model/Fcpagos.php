<?php

/**
 * Subclass for representing a row from the 'fcpagos'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Fcpagos extends BaseFcpagos
{
	
	private $nomcon;
	private $dircon;	
	private $naccon;
	private $tipcon;
	  
	  public function getNomcon()
	  {  
        if ($this->datosContribuyenteRepresentante("C"))  
	      {
		    return $this->nomcon;
		  }		   	
      }	
      
	public function getDircon()
	  {  
	    if ($this->datosContribuyenteRepresentante("C"))  
		  {
		    return $this->dircon;
		  }		   	
	  }   
	  
	public function getNaccon()
	  {  
	    if ($this->datosContribuyenteRepresentante("C"))  
		  {
		    return $this->naccon;
		  }		  	
	  }	      

	public function getTipcon()
	  {  
		if ($this->datosContribuyenteRepresentante("C"))  
		  {
		    return $this->tipcon;
		  }		   	
      }


	public function datosContribuyenteRepresentante($tipo)
	  {
	  	  $c = new Criteria;
	  	  $c->add(FcconrepPeer::REPCON,$tipo); 
	  	  $c->add(FcconrepPeer::RIFCON,self::getRifcon());
	  	  $this->contribuyente = FcconrepPeer::doSelect($c);
	  	  if ($this->contribuyente)
		  	{
		  		$this->nomcon = $this->contribuyente[0]->getNomcon();
		  		$this->dircon = $this->contribuyente[0]->getDircon();
		  		$this->naccon = $this->contribuyente[0]->getNaccon();
		  	    $this->tipcon = $this->contribuyente[0]->getTipcon();		  	    
		  	    return true;
		  	}
		  	else
		  	{
		  		$this->nomcon = 'No encontrado';
		  		$this->dircon = 'No encontrado';
		  		$this->naccon = 'No encontrado';
		  	    $this->tipcon = 'No encontrado';		  	    
		  	    return false;
		  	}
	  }		
	
}
