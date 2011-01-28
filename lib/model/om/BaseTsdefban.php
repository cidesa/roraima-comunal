<?php


abstract class BaseTsdefban extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcue;


	
	protected $nomcue;


	
	protected $tipcue;


	
	protected $codcta;


	
	protected $fecreg;


	
	protected $fecven;


	
	protected $fecper;


	
	protected $renaut;


	
	protected $porint;


	
	protected $tipint;


	
	protected $numche;


	
	protected $antban;


	
	protected $debban;


	
	protected $creban;


	
	protected $antlib;


	
	protected $deblib;


	
	protected $crelib;


	
	protected $valche;


	
	protected $concil;


	
	protected $plazo;


	
	protected $fecape;


	
	protected $usocue;


	
	protected $tipren;


	
	protected $desenl;


	
	protected $porsalmin;


	
	protected $monsalmin;


	
	protected $codctaprecoo;


	
	protected $codctapreord;


	
	protected $trasitoria;


	
	protected $salact;


	
	protected $fecaper;


	
	protected $temnumcue;


	
	protected $cantdig;


	
	protected $endosable;


	
	protected $salmin;


	
	protected $nomrep;


	
	protected $id;

	
	protected $aTstipcue;

	
	protected $aTstipren;

	
	protected $collTsmovbans;

	
	protected $lastTsmovbanCriteria = null;

	
	protected $collTsmovlibs;

	
	protected $lastTsmovlibCriteria = null;

	
	protected $collTsdeffonants;

	
	protected $lastTsdeffonantCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getNomcue()
  {

    return trim($this->nomcue);

  }
  
  public function getTipcue()
  {

    return trim($this->tipcue);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecper($format = 'Y-m-d')
  {

    if ($this->fecper === null || $this->fecper === '') {
      return null;
    } elseif (!is_int($this->fecper)) {
            $ts = adodb_strtotime($this->fecper);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecper] as date/time value: " . var_export($this->fecper, true));
      }
    } else {
      $ts = $this->fecper;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRenaut()
  {

    return trim($this->renaut);

  }
  
  public function getPorint($val=false)
  {

    if($val) return number_format($this->porint,2,',','.');
    else return $this->porint;

  }
  
  public function getTipint()
  {

    return trim($this->tipint);

  }
  
  public function getNumche()
  {

    return trim($this->numche);

  }
  
  public function getAntban($val=false)
  {

    if($val) return number_format($this->antban,2,',','.');
    else return $this->antban;

  }
  
  public function getDebban($val=false)
  {

    if($val) return number_format($this->debban,2,',','.');
    else return $this->debban;

  }
  
  public function getCreban($val=false)
  {

    if($val) return number_format($this->creban,2,',','.');
    else return $this->creban;

  }
  
  public function getAntlib($val=false)
  {

    if($val) return number_format($this->antlib,2,',','.');
    else return $this->antlib;

  }
  
  public function getDeblib($val=false)
  {

    if($val) return number_format($this->deblib,2,',','.');
    else return $this->deblib;

  }
  
  public function getCrelib($val=false)
  {

    if($val) return number_format($this->crelib,2,',','.');
    else return $this->crelib;

  }
  
  public function getValche($val=false)
  {

    if($val) return number_format($this->valche,2,',','.');
    else return $this->valche;

  }
  
  public function getConcil()
  {

    return trim($this->concil);

  }
  
  public function getPlazo($val=false)
  {

    if($val) return number_format($this->plazo,2,',','.');
    else return $this->plazo;

  }
  
  public function getFecape($format = 'Y-m-d')
  {

    if ($this->fecape === null || $this->fecape === '') {
      return null;
    } elseif (!is_int($this->fecape)) {
            $ts = adodb_strtotime($this->fecape);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecape] as date/time value: " . var_export($this->fecape, true));
      }
    } else {
      $ts = $this->fecape;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUsocue()
  {

    return trim($this->usocue);

  }
  
  public function getTipren()
  {

    return trim($this->tipren);

  }
  
  public function getDesenl()
  {

    return trim($this->desenl);

  }
  
  public function getPorsalmin($val=false)
  {

    if($val) return number_format($this->porsalmin,2,',','.');
    else return $this->porsalmin;

  }
  
  public function getMonsalmin($val=false)
  {

    if($val) return number_format($this->monsalmin,2,',','.');
    else return $this->monsalmin;

  }
  
  public function getCodctaprecoo()
  {

    return trim($this->codctaprecoo);

  }
  
  public function getCodctapreord()
  {

    return trim($this->codctapreord);

  }
  
  public function getTrasitoria()
  {

    return trim($this->trasitoria);

  }
  
  public function getSalact($val=false)
  {

    if($val) return number_format($this->salact,2,',','.');
    else return $this->salact;

  }
  
  public function getFecaper($format = 'Y-m-d')
  {

    if ($this->fecaper === null || $this->fecaper === '') {
      return null;
    } elseif (!is_int($this->fecaper)) {
            $ts = adodb_strtotime($this->fecaper);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaper] as date/time value: " . var_export($this->fecaper, true));
      }
    } else {
      $ts = $this->fecaper;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTemnumcue()
  {

    return trim($this->temnumcue);

  }
  
  public function getCantdig($val=false)
  {

    if($val) return number_format($this->cantdig,2,',','.');
    else return $this->cantdig;

  }
  
  public function getEndosable()
  {

    return trim($this->endosable);

  }
  
  public function getSalmin($val=false)
  {

    if($val) return number_format($this->salmin,2,',','.');
    else return $this->salmin;

  }
  
  public function getNomrep()
  {

    return trim($this->nomrep);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = TsdefbanPeer::NUMCUE;
      }
  
	} 
	
	public function setNomcue($v)
	{

    if ($this->nomcue !== $v) {
        $this->nomcue = $v;
        $this->modifiedColumns[] = TsdefbanPeer::NOMCUE;
      }
  
	} 
	
	public function setTipcue($v)
	{

    if ($this->tipcue !== $v) {
        $this->tipcue = $v;
        $this->modifiedColumns[] = TsdefbanPeer::TIPCUE;
      }
  
		if ($this->aTstipcue !== null && $this->aTstipcue->getCodtip() !== $v) {
			$this->aTstipcue = null;
		}

	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = TsdefbanPeer::CODCTA;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = TsdefbanPeer::FECREG;
    }

	} 
	
	public function setFecven($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = TsdefbanPeer::FECVEN;
    }

	} 
	
	public function setFecper($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecper] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecper !== $ts) {
      $this->fecper = $ts;
      $this->modifiedColumns[] = TsdefbanPeer::FECPER;
    }

	} 
	
	public function setRenaut($v)
	{

    if ($this->renaut !== $v) {
        $this->renaut = $v;
        $this->modifiedColumns[] = TsdefbanPeer::RENAUT;
      }
  
	} 
	
	public function setPorint($v)
	{

    if ($this->porint !== $v) {
        $this->porint = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefbanPeer::PORINT;
      }
  
	} 
	
	public function setTipint($v)
	{

    if ($this->tipint !== $v) {
        $this->tipint = $v;
        $this->modifiedColumns[] = TsdefbanPeer::TIPINT;
      }
  
	} 
	
	public function setNumche($v)
	{

    if ($this->numche !== $v) {
        $this->numche = $v;
        $this->modifiedColumns[] = TsdefbanPeer::NUMCHE;
      }
  
	} 
	
	public function setAntban($v)
	{

    if ($this->antban !== $v) {
        $this->antban = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefbanPeer::ANTBAN;
      }
  
	} 
	
	public function setDebban($v)
	{

    if ($this->debban !== $v) {
        $this->debban = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefbanPeer::DEBBAN;
      }
  
	} 
	
	public function setCreban($v)
	{

    if ($this->creban !== $v) {
        $this->creban = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefbanPeer::CREBAN;
      }
  
	} 
	
	public function setAntlib($v)
	{

    if ($this->antlib !== $v) {
        $this->antlib = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefbanPeer::ANTLIB;
      }
  
	} 
	
	public function setDeblib($v)
	{

    if ($this->deblib !== $v) {
        $this->deblib = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefbanPeer::DEBLIB;
      }
  
	} 
	
	public function setCrelib($v)
	{

    if ($this->crelib !== $v) {
        $this->crelib = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefbanPeer::CRELIB;
      }
  
	} 
	
	public function setValche($v)
	{

    if ($this->valche !== $v) {
        $this->valche = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefbanPeer::VALCHE;
      }
  
	} 
	
	public function setConcil($v)
	{

    if ($this->concil !== $v) {
        $this->concil = $v;
        $this->modifiedColumns[] = TsdefbanPeer::CONCIL;
      }
  
	} 
	
	public function setPlazo($v)
	{

    if ($this->plazo !== $v) {
        $this->plazo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefbanPeer::PLAZO;
      }
  
	} 
	
	public function setFecape($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecape] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecape !== $ts) {
      $this->fecape = $ts;
      $this->modifiedColumns[] = TsdefbanPeer::FECAPE;
    }

	} 
	
	public function setUsocue($v)
	{

    if ($this->usocue !== $v) {
        $this->usocue = $v;
        $this->modifiedColumns[] = TsdefbanPeer::USOCUE;
      }
  
	} 
	
	public function setTipren($v)
	{

    if ($this->tipren !== $v) {
        $this->tipren = $v;
        $this->modifiedColumns[] = TsdefbanPeer::TIPREN;
      }
  
		if ($this->aTstipren !== null && $this->aTstipren->getCodtip() !== $v) {
			$this->aTstipren = null;
		}

	} 
	
	public function setDesenl($v)
	{

    if ($this->desenl !== $v) {
        $this->desenl = $v;
        $this->modifiedColumns[] = TsdefbanPeer::DESENL;
      }
  
	} 
	
	public function setPorsalmin($v)
	{

    if ($this->porsalmin !== $v) {
        $this->porsalmin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefbanPeer::PORSALMIN;
      }
  
	} 
	
	public function setMonsalmin($v)
	{

    if ($this->monsalmin !== $v) {
        $this->monsalmin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefbanPeer::MONSALMIN;
      }
  
	} 
	
	public function setCodctaprecoo($v)
	{

    if ($this->codctaprecoo !== $v) {
        $this->codctaprecoo = $v;
        $this->modifiedColumns[] = TsdefbanPeer::CODCTAPRECOO;
      }
  
	} 
	
	public function setCodctapreord($v)
	{

    if ($this->codctapreord !== $v) {
        $this->codctapreord = $v;
        $this->modifiedColumns[] = TsdefbanPeer::CODCTAPREORD;
      }
  
	} 
	
	public function setTrasitoria($v)
	{

    if ($this->trasitoria !== $v) {
        $this->trasitoria = $v;
        $this->modifiedColumns[] = TsdefbanPeer::TRASITORIA;
      }
  
	} 
	
	public function setSalact($v)
	{

    if ($this->salact !== $v) {
        $this->salact = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefbanPeer::SALACT;
      }
  
	} 
	
	public function setFecaper($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaper] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaper !== $ts) {
      $this->fecaper = $ts;
      $this->modifiedColumns[] = TsdefbanPeer::FECAPER;
    }

	} 
	
	public function setTemnumcue($v)
	{

    if ($this->temnumcue !== $v) {
        $this->temnumcue = $v;
        $this->modifiedColumns[] = TsdefbanPeer::TEMNUMCUE;
      }
  
	} 
	
	public function setCantdig($v)
	{

    if ($this->cantdig !== $v) {
        $this->cantdig = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefbanPeer::CANTDIG;
      }
  
	} 
	
	public function setEndosable($v)
	{

    if ($this->endosable !== $v) {
        $this->endosable = $v;
        $this->modifiedColumns[] = TsdefbanPeer::ENDOSABLE;
      }
  
	} 
	
	public function setSalmin($v)
	{

    if ($this->salmin !== $v) {
        $this->salmin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefbanPeer::SALMIN;
      }
  
	} 
	
	public function setNomrep($v)
	{

    if ($this->nomrep !== $v) {
        $this->nomrep = $v;
        $this->modifiedColumns[] = TsdefbanPeer::NOMREP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsdefbanPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcue = $rs->getString($startcol + 0);

      $this->nomcue = $rs->getString($startcol + 1);

      $this->tipcue = $rs->getString($startcol + 2);

      $this->codcta = $rs->getString($startcol + 3);

      $this->fecreg = $rs->getDate($startcol + 4, null);

      $this->fecven = $rs->getDate($startcol + 5, null);

      $this->fecper = $rs->getDate($startcol + 6, null);

      $this->renaut = $rs->getString($startcol + 7);

      $this->porint = $rs->getFloat($startcol + 8);

      $this->tipint = $rs->getString($startcol + 9);

      $this->numche = $rs->getString($startcol + 10);

      $this->antban = $rs->getFloat($startcol + 11);

      $this->debban = $rs->getFloat($startcol + 12);

      $this->creban = $rs->getFloat($startcol + 13);

      $this->antlib = $rs->getFloat($startcol + 14);

      $this->deblib = $rs->getFloat($startcol + 15);

      $this->crelib = $rs->getFloat($startcol + 16);

      $this->valche = $rs->getFloat($startcol + 17);

      $this->concil = $rs->getString($startcol + 18);

      $this->plazo = $rs->getFloat($startcol + 19);

      $this->fecape = $rs->getDate($startcol + 20, null);

      $this->usocue = $rs->getString($startcol + 21);

      $this->tipren = $rs->getString($startcol + 22);

      $this->desenl = $rs->getString($startcol + 23);

      $this->porsalmin = $rs->getFloat($startcol + 24);

      $this->monsalmin = $rs->getFloat($startcol + 25);

      $this->codctaprecoo = $rs->getString($startcol + 26);

      $this->codctapreord = $rs->getString($startcol + 27);

      $this->trasitoria = $rs->getString($startcol + 28);

      $this->salact = $rs->getFloat($startcol + 29);

      $this->fecaper = $rs->getDate($startcol + 30, null);

      $this->temnumcue = $rs->getString($startcol + 31);

      $this->cantdig = $rs->getFloat($startcol + 32);

      $this->endosable = $rs->getString($startcol + 33);

      $this->salmin = $rs->getFloat($startcol + 34);

      $this->nomrep = $rs->getString($startcol + 35);

      $this->id = $rs->getInt($startcol + 36);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 37; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsdefban object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TsdefbanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdefbanPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TsdefbanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aTstipcue !== null) {
				if ($this->aTstipcue->isModified()) {
					$affectedRows += $this->aTstipcue->save($con);
				}
				$this->setTstipcue($this->aTstipcue);
			}

			if ($this->aTstipren !== null) {
				if ($this->aTstipren->isModified()) {
					$affectedRows += $this->aTstipren->save($con);
				}
				$this->setTstipren($this->aTstipren);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TsdefbanPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsdefbanPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collTsmovbans !== null) {
				foreach($this->collTsmovbans as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTsmovlibs !== null) {
				foreach($this->collTsmovlibs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTsdeffonants !== null) {
				foreach($this->collTsdeffonants as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aTstipcue !== null) {
				if (!$this->aTstipcue->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTstipcue->getValidationFailures());
				}
			}

			if ($this->aTstipren !== null) {
				if (!$this->aTstipren->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTstipren->getValidationFailures());
				}
			}


			if (($retval = TsdefbanPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTsmovbans !== null) {
					foreach($this->collTsmovbans as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTsmovlibs !== null) {
					foreach($this->collTsmovlibs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTsdeffonants !== null) {
					foreach($this->collTsdeffonants as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdefbanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcue();
				break;
			case 1:
				return $this->getNomcue();
				break;
			case 2:
				return $this->getTipcue();
				break;
			case 3:
				return $this->getCodcta();
				break;
			case 4:
				return $this->getFecreg();
				break;
			case 5:
				return $this->getFecven();
				break;
			case 6:
				return $this->getFecper();
				break;
			case 7:
				return $this->getRenaut();
				break;
			case 8:
				return $this->getPorint();
				break;
			case 9:
				return $this->getTipint();
				break;
			case 10:
				return $this->getNumche();
				break;
			case 11:
				return $this->getAntban();
				break;
			case 12:
				return $this->getDebban();
				break;
			case 13:
				return $this->getCreban();
				break;
			case 14:
				return $this->getAntlib();
				break;
			case 15:
				return $this->getDeblib();
				break;
			case 16:
				return $this->getCrelib();
				break;
			case 17:
				return $this->getValche();
				break;
			case 18:
				return $this->getConcil();
				break;
			case 19:
				return $this->getPlazo();
				break;
			case 20:
				return $this->getFecape();
				break;
			case 21:
				return $this->getUsocue();
				break;
			case 22:
				return $this->getTipren();
				break;
			case 23:
				return $this->getDesenl();
				break;
			case 24:
				return $this->getPorsalmin();
				break;
			case 25:
				return $this->getMonsalmin();
				break;
			case 26:
				return $this->getCodctaprecoo();
				break;
			case 27:
				return $this->getCodctapreord();
				break;
			case 28:
				return $this->getTrasitoria();
				break;
			case 29:
				return $this->getSalact();
				break;
			case 30:
				return $this->getFecaper();
				break;
			case 31:
				return $this->getTemnumcue();
				break;
			case 32:
				return $this->getCantdig();
				break;
			case 33:
				return $this->getEndosable();
				break;
			case 34:
				return $this->getSalmin();
				break;
			case 35:
				return $this->getNomrep();
				break;
			case 36:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdefbanPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcue(),
			$keys[1] => $this->getNomcue(),
			$keys[2] => $this->getTipcue(),
			$keys[3] => $this->getCodcta(),
			$keys[4] => $this->getFecreg(),
			$keys[5] => $this->getFecven(),
			$keys[6] => $this->getFecper(),
			$keys[7] => $this->getRenaut(),
			$keys[8] => $this->getPorint(),
			$keys[9] => $this->getTipint(),
			$keys[10] => $this->getNumche(),
			$keys[11] => $this->getAntban(),
			$keys[12] => $this->getDebban(),
			$keys[13] => $this->getCreban(),
			$keys[14] => $this->getAntlib(),
			$keys[15] => $this->getDeblib(),
			$keys[16] => $this->getCrelib(),
			$keys[17] => $this->getValche(),
			$keys[18] => $this->getConcil(),
			$keys[19] => $this->getPlazo(),
			$keys[20] => $this->getFecape(),
			$keys[21] => $this->getUsocue(),
			$keys[22] => $this->getTipren(),
			$keys[23] => $this->getDesenl(),
			$keys[24] => $this->getPorsalmin(),
			$keys[25] => $this->getMonsalmin(),
			$keys[26] => $this->getCodctaprecoo(),
			$keys[27] => $this->getCodctapreord(),
			$keys[28] => $this->getTrasitoria(),
			$keys[29] => $this->getSalact(),
			$keys[30] => $this->getFecaper(),
			$keys[31] => $this->getTemnumcue(),
			$keys[32] => $this->getCantdig(),
			$keys[33] => $this->getEndosable(),
			$keys[34] => $this->getSalmin(),
			$keys[35] => $this->getNomrep(),
			$keys[36] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdefbanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcue($value);
				break;
			case 1:
				$this->setNomcue($value);
				break;
			case 2:
				$this->setTipcue($value);
				break;
			case 3:
				$this->setCodcta($value);
				break;
			case 4:
				$this->setFecreg($value);
				break;
			case 5:
				$this->setFecven($value);
				break;
			case 6:
				$this->setFecper($value);
				break;
			case 7:
				$this->setRenaut($value);
				break;
			case 8:
				$this->setPorint($value);
				break;
			case 9:
				$this->setTipint($value);
				break;
			case 10:
				$this->setNumche($value);
				break;
			case 11:
				$this->setAntban($value);
				break;
			case 12:
				$this->setDebban($value);
				break;
			case 13:
				$this->setCreban($value);
				break;
			case 14:
				$this->setAntlib($value);
				break;
			case 15:
				$this->setDeblib($value);
				break;
			case 16:
				$this->setCrelib($value);
				break;
			case 17:
				$this->setValche($value);
				break;
			case 18:
				$this->setConcil($value);
				break;
			case 19:
				$this->setPlazo($value);
				break;
			case 20:
				$this->setFecape($value);
				break;
			case 21:
				$this->setUsocue($value);
				break;
			case 22:
				$this->setTipren($value);
				break;
			case 23:
				$this->setDesenl($value);
				break;
			case 24:
				$this->setPorsalmin($value);
				break;
			case 25:
				$this->setMonsalmin($value);
				break;
			case 26:
				$this->setCodctaprecoo($value);
				break;
			case 27:
				$this->setCodctapreord($value);
				break;
			case 28:
				$this->setTrasitoria($value);
				break;
			case 29:
				$this->setSalact($value);
				break;
			case 30:
				$this->setFecaper($value);
				break;
			case 31:
				$this->setTemnumcue($value);
				break;
			case 32:
				$this->setCantdig($value);
				break;
			case 33:
				$this->setEndosable($value);
				break;
			case 34:
				$this->setSalmin($value);
				break;
			case 35:
				$this->setNomrep($value);
				break;
			case 36:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdefbanPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcue($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipcue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcta($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecreg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecven($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecper($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRenaut($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPorint($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTipint($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNumche($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAntban($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDebban($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCreban($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAntlib($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDeblib($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCrelib($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setValche($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setConcil($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setPlazo($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFecape($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setUsocue($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setTipren($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDesenl($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setPorsalmin($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setMonsalmin($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCodctaprecoo($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCodctapreord($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setTrasitoria($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setSalact($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setFecaper($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setTemnumcue($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCantdig($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setEndosable($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setSalmin($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setNomrep($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setId($arr[$keys[36]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdefbanPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdefbanPeer::NUMCUE)) $criteria->add(TsdefbanPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TsdefbanPeer::NOMCUE)) $criteria->add(TsdefbanPeer::NOMCUE, $this->nomcue);
		if ($this->isColumnModified(TsdefbanPeer::TIPCUE)) $criteria->add(TsdefbanPeer::TIPCUE, $this->tipcue);
		if ($this->isColumnModified(TsdefbanPeer::CODCTA)) $criteria->add(TsdefbanPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(TsdefbanPeer::FECREG)) $criteria->add(TsdefbanPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(TsdefbanPeer::FECVEN)) $criteria->add(TsdefbanPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(TsdefbanPeer::FECPER)) $criteria->add(TsdefbanPeer::FECPER, $this->fecper);
		if ($this->isColumnModified(TsdefbanPeer::RENAUT)) $criteria->add(TsdefbanPeer::RENAUT, $this->renaut);
		if ($this->isColumnModified(TsdefbanPeer::PORINT)) $criteria->add(TsdefbanPeer::PORINT, $this->porint);
		if ($this->isColumnModified(TsdefbanPeer::TIPINT)) $criteria->add(TsdefbanPeer::TIPINT, $this->tipint);
		if ($this->isColumnModified(TsdefbanPeer::NUMCHE)) $criteria->add(TsdefbanPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(TsdefbanPeer::ANTBAN)) $criteria->add(TsdefbanPeer::ANTBAN, $this->antban);
		if ($this->isColumnModified(TsdefbanPeer::DEBBAN)) $criteria->add(TsdefbanPeer::DEBBAN, $this->debban);
		if ($this->isColumnModified(TsdefbanPeer::CREBAN)) $criteria->add(TsdefbanPeer::CREBAN, $this->creban);
		if ($this->isColumnModified(TsdefbanPeer::ANTLIB)) $criteria->add(TsdefbanPeer::ANTLIB, $this->antlib);
		if ($this->isColumnModified(TsdefbanPeer::DEBLIB)) $criteria->add(TsdefbanPeer::DEBLIB, $this->deblib);
		if ($this->isColumnModified(TsdefbanPeer::CRELIB)) $criteria->add(TsdefbanPeer::CRELIB, $this->crelib);
		if ($this->isColumnModified(TsdefbanPeer::VALCHE)) $criteria->add(TsdefbanPeer::VALCHE, $this->valche);
		if ($this->isColumnModified(TsdefbanPeer::CONCIL)) $criteria->add(TsdefbanPeer::CONCIL, $this->concil);
		if ($this->isColumnModified(TsdefbanPeer::PLAZO)) $criteria->add(TsdefbanPeer::PLAZO, $this->plazo);
		if ($this->isColumnModified(TsdefbanPeer::FECAPE)) $criteria->add(TsdefbanPeer::FECAPE, $this->fecape);
		if ($this->isColumnModified(TsdefbanPeer::USOCUE)) $criteria->add(TsdefbanPeer::USOCUE, $this->usocue);
		if ($this->isColumnModified(TsdefbanPeer::TIPREN)) $criteria->add(TsdefbanPeer::TIPREN, $this->tipren);
		if ($this->isColumnModified(TsdefbanPeer::DESENL)) $criteria->add(TsdefbanPeer::DESENL, $this->desenl);
		if ($this->isColumnModified(TsdefbanPeer::PORSALMIN)) $criteria->add(TsdefbanPeer::PORSALMIN, $this->porsalmin);
		if ($this->isColumnModified(TsdefbanPeer::MONSALMIN)) $criteria->add(TsdefbanPeer::MONSALMIN, $this->monsalmin);
		if ($this->isColumnModified(TsdefbanPeer::CODCTAPRECOO)) $criteria->add(TsdefbanPeer::CODCTAPRECOO, $this->codctaprecoo);
		if ($this->isColumnModified(TsdefbanPeer::CODCTAPREORD)) $criteria->add(TsdefbanPeer::CODCTAPREORD, $this->codctapreord);
		if ($this->isColumnModified(TsdefbanPeer::TRASITORIA)) $criteria->add(TsdefbanPeer::TRASITORIA, $this->trasitoria);
		if ($this->isColumnModified(TsdefbanPeer::SALACT)) $criteria->add(TsdefbanPeer::SALACT, $this->salact);
		if ($this->isColumnModified(TsdefbanPeer::FECAPER)) $criteria->add(TsdefbanPeer::FECAPER, $this->fecaper);
		if ($this->isColumnModified(TsdefbanPeer::TEMNUMCUE)) $criteria->add(TsdefbanPeer::TEMNUMCUE, $this->temnumcue);
		if ($this->isColumnModified(TsdefbanPeer::CANTDIG)) $criteria->add(TsdefbanPeer::CANTDIG, $this->cantdig);
		if ($this->isColumnModified(TsdefbanPeer::ENDOSABLE)) $criteria->add(TsdefbanPeer::ENDOSABLE, $this->endosable);
		if ($this->isColumnModified(TsdefbanPeer::SALMIN)) $criteria->add(TsdefbanPeer::SALMIN, $this->salmin);
		if ($this->isColumnModified(TsdefbanPeer::NOMREP)) $criteria->add(TsdefbanPeer::NOMREP, $this->nomrep);
		if ($this->isColumnModified(TsdefbanPeer::ID)) $criteria->add(TsdefbanPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdefbanPeer::DATABASE_NAME);

		$criteria->add(TsdefbanPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNumcue($this->numcue);

		$copyObj->setNomcue($this->nomcue);

		$copyObj->setTipcue($this->tipcue);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setFecven($this->fecven);

		$copyObj->setFecper($this->fecper);

		$copyObj->setRenaut($this->renaut);

		$copyObj->setPorint($this->porint);

		$copyObj->setTipint($this->tipint);

		$copyObj->setNumche($this->numche);

		$copyObj->setAntban($this->antban);

		$copyObj->setDebban($this->debban);

		$copyObj->setCreban($this->creban);

		$copyObj->setAntlib($this->antlib);

		$copyObj->setDeblib($this->deblib);

		$copyObj->setCrelib($this->crelib);

		$copyObj->setValche($this->valche);

		$copyObj->setConcil($this->concil);

		$copyObj->setPlazo($this->plazo);

		$copyObj->setFecape($this->fecape);

		$copyObj->setUsocue($this->usocue);

		$copyObj->setTipren($this->tipren);

		$copyObj->setDesenl($this->desenl);

		$copyObj->setPorsalmin($this->porsalmin);

		$copyObj->setMonsalmin($this->monsalmin);

		$copyObj->setCodctaprecoo($this->codctaprecoo);

		$copyObj->setCodctapreord($this->codctapreord);

		$copyObj->setTrasitoria($this->trasitoria);

		$copyObj->setSalact($this->salact);

		$copyObj->setFecaper($this->fecaper);

		$copyObj->setTemnumcue($this->temnumcue);

		$copyObj->setCantdig($this->cantdig);

		$copyObj->setEndosable($this->endosable);

		$copyObj->setSalmin($this->salmin);

		$copyObj->setNomrep($this->nomrep);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getTsmovbans() as $relObj) {
				$copyObj->addTsmovban($relObj->copy($deepCopy));
			}

			foreach($this->getTsmovlibs() as $relObj) {
				$copyObj->addTsmovlib($relObj->copy($deepCopy));
			}

			foreach($this->getTsdeffonants() as $relObj) {
				$copyObj->addTsdeffonant($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new TsdefbanPeer();
		}
		return self::$peer;
	}

	
	public function setTstipcue($v)
	{


		if ($v === null) {
			$this->setTipcue(NULL);
		} else {
			$this->setTipcue($v->getCodtip());
		}


		$this->aTstipcue = $v;
	}


	
	public function getTstipcue($con = null)
	{
		if ($this->aTstipcue === null && (($this->tipcue !== "" && $this->tipcue !== null))) {
						include_once 'lib/model/om/BaseTstipcuePeer.php';

      $c = new Criteria();
      $c->add(TstipcuePeer::CODTIP,$this->tipcue);
      
			$this->aTstipcue = TstipcuePeer::doSelectOne($c, $con);

			
		}
		return $this->aTstipcue;
	}

	
	public function setTstipren($v)
	{


		if ($v === null) {
			$this->setTipren(NULL);
		} else {
			$this->setTipren($v->getCodtip());
		}


		$this->aTstipren = $v;
	}


	
	public function getTstipren($con = null)
	{
		if ($this->aTstipren === null && (($this->tipren !== "" && $this->tipren !== null))) {
						include_once 'lib/model/om/BaseTstiprenPeer.php';

      $c = new Criteria();
      $c->add(TstiprenPeer::CODTIP,$this->tipren);
      
			$this->aTstipren = TstiprenPeer::doSelectOne($c, $con);

			
		}
		return $this->aTstipren;
	}

	
	public function initTsmovbans()
	{
		if ($this->collTsmovbans === null) {
			$this->collTsmovbans = array();
		}
	}

	
	public function getTsmovbans($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovbanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsmovbans === null) {
			if ($this->isNew()) {
			   $this->collTsmovbans = array();
			} else {

				$criteria->add(TsmovbanPeer::NUMCUE, $this->getNumcue());

				TsmovbanPeer::addSelectColumns($criteria);
				$this->collTsmovbans = TsmovbanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TsmovbanPeer::NUMCUE, $this->getNumcue());

				TsmovbanPeer::addSelectColumns($criteria);
				if (!isset($this->lastTsmovbanCriteria) || !$this->lastTsmovbanCriteria->equals($criteria)) {
					$this->collTsmovbans = TsmovbanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTsmovbanCriteria = $criteria;
		return $this->collTsmovbans;
	}

	
	public function countTsmovbans($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovbanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TsmovbanPeer::NUMCUE, $this->getNumcue());

		return TsmovbanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTsmovban(Tsmovban $l)
	{
		$this->collTsmovbans[] = $l;
		$l->setTsdefban($this);
	}


	
	public function getTsmovbansJoinTstipmov($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovbanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsmovbans === null) {
			if ($this->isNew()) {
				$this->collTsmovbans = array();
			} else {

				$criteria->add(TsmovbanPeer::NUMCUE, $this->getNumcue());

				$this->collTsmovbans = TsmovbanPeer::doSelectJoinTstipmov($criteria, $con);
			}
		} else {
									
			$criteria->add(TsmovbanPeer::NUMCUE, $this->getNumcue());

			if (!isset($this->lastTsmovbanCriteria) || !$this->lastTsmovbanCriteria->equals($criteria)) {
				$this->collTsmovbans = TsmovbanPeer::doSelectJoinTstipmov($criteria, $con);
			}
		}
		$this->lastTsmovbanCriteria = $criteria;

		return $this->collTsmovbans;
	}

	
	public function initTsmovlibs()
	{
		if ($this->collTsmovlibs === null) {
			$this->collTsmovlibs = array();
		}
	}

	
	public function getTsmovlibs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovlibPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsmovlibs === null) {
			if ($this->isNew()) {
			   $this->collTsmovlibs = array();
			} else {

				$criteria->add(TsmovlibPeer::NUMCUE, $this->getNumcue());

				TsmovlibPeer::addSelectColumns($criteria);
				$this->collTsmovlibs = TsmovlibPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TsmovlibPeer::NUMCUE, $this->getNumcue());

				TsmovlibPeer::addSelectColumns($criteria);
				if (!isset($this->lastTsmovlibCriteria) || !$this->lastTsmovlibCriteria->equals($criteria)) {
					$this->collTsmovlibs = TsmovlibPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTsmovlibCriteria = $criteria;
		return $this->collTsmovlibs;
	}

	
	public function countTsmovlibs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovlibPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TsmovlibPeer::NUMCUE, $this->getNumcue());

		return TsmovlibPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTsmovlib(Tsmovlib $l)
	{
		$this->collTsmovlibs[] = $l;
		$l->setTsdefban($this);
	}


	
	public function getTsmovlibsJoinTstipmov($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovlibPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsmovlibs === null) {
			if ($this->isNew()) {
				$this->collTsmovlibs = array();
			} else {

				$criteria->add(TsmovlibPeer::NUMCUE, $this->getNumcue());

				$this->collTsmovlibs = TsmovlibPeer::doSelectJoinTstipmov($criteria, $con);
			}
		} else {
									
			$criteria->add(TsmovlibPeer::NUMCUE, $this->getNumcue());

			if (!isset($this->lastTsmovlibCriteria) || !$this->lastTsmovlibCriteria->equals($criteria)) {
				$this->collTsmovlibs = TsmovlibPeer::doSelectJoinTstipmov($criteria, $con);
			}
		}
		$this->lastTsmovlibCriteria = $criteria;

		return $this->collTsmovlibs;
	}


	
	public function getTsmovlibsJoinContabb($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovlibPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsmovlibs === null) {
			if ($this->isNew()) {
				$this->collTsmovlibs = array();
			} else {

				$criteria->add(TsmovlibPeer::NUMCUE, $this->getNumcue());

				$this->collTsmovlibs = TsmovlibPeer::doSelectJoinContabb($criteria, $con);
			}
		} else {
									
			$criteria->add(TsmovlibPeer::NUMCUE, $this->getNumcue());

			if (!isset($this->lastTsmovlibCriteria) || !$this->lastTsmovlibCriteria->equals($criteria)) {
				$this->collTsmovlibs = TsmovlibPeer::doSelectJoinContabb($criteria, $con);
			}
		}
		$this->lastTsmovlibCriteria = $criteria;

		return $this->collTsmovlibs;
	}

	
	public function initTsdeffonants()
	{
		if ($this->collTsdeffonants === null) {
			$this->collTsdeffonants = array();
		}
	}

	
	public function getTsdeffonants($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsdeffonantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsdeffonants === null) {
			if ($this->isNew()) {
			   $this->collTsdeffonants = array();
			} else {

				$criteria->add(TsdeffonantPeer::NUMCUE, $this->getNumcue());

				TsdeffonantPeer::addSelectColumns($criteria);
				$this->collTsdeffonants = TsdeffonantPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TsdeffonantPeer::NUMCUE, $this->getNumcue());

				TsdeffonantPeer::addSelectColumns($criteria);
				if (!isset($this->lastTsdeffonantCriteria) || !$this->lastTsdeffonantCriteria->equals($criteria)) {
					$this->collTsdeffonants = TsdeffonantPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTsdeffonantCriteria = $criteria;
		return $this->collTsdeffonants;
	}

	
	public function countTsdeffonants($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTsdeffonantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TsdeffonantPeer::NUMCUE, $this->getNumcue());

		return TsdeffonantPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTsdeffonant(Tsdeffonant $l)
	{
		$this->collTsdeffonants[] = $l;
		$l->setTsdefban($this);
	}


	
	public function getTsdeffonantsJoinBnubica($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsdeffonantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsdeffonants === null) {
			if ($this->isNew()) {
				$this->collTsdeffonants = array();
			} else {

				$criteria->add(TsdeffonantPeer::NUMCUE, $this->getNumcue());

				$this->collTsdeffonants = TsdeffonantPeer::doSelectJoinBnubica($criteria, $con);
			}
		} else {
									
			$criteria->add(TsdeffonantPeer::NUMCUE, $this->getNumcue());

			if (!isset($this->lastTsdeffonantCriteria) || !$this->lastTsdeffonantCriteria->equals($criteria)) {
				$this->collTsdeffonants = TsdeffonantPeer::doSelectJoinBnubica($criteria, $con);
			}
		}
		$this->lastTsdeffonantCriteria = $criteria;

		return $this->collTsdeffonants;
	}


	
	public function getTsdeffonantsJoinTsuniadm($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsdeffonantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsdeffonants === null) {
			if ($this->isNew()) {
				$this->collTsdeffonants = array();
			} else {

				$criteria->add(TsdeffonantPeer::NUMCUE, $this->getNumcue());

				$this->collTsdeffonants = TsdeffonantPeer::doSelectJoinTsuniadm($criteria, $con);
			}
		} else {
									
			$criteria->add(TsdeffonantPeer::NUMCUE, $this->getNumcue());

			if (!isset($this->lastTsdeffonantCriteria) || !$this->lastTsdeffonantCriteria->equals($criteria)) {
				$this->collTsdeffonants = TsdeffonantPeer::doSelectJoinTsuniadm($criteria, $con);
			}
		}
		$this->lastTsdeffonantCriteria = $criteria;

		return $this->collTsdeffonants;
	}


	
	public function getTsdeffonantsJoinOpbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsdeffonantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsdeffonants === null) {
			if ($this->isNew()) {
				$this->collTsdeffonants = array();
			} else {

				$criteria->add(TsdeffonantPeer::NUMCUE, $this->getNumcue());

				$this->collTsdeffonants = TsdeffonantPeer::doSelectJoinOpbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(TsdeffonantPeer::NUMCUE, $this->getNumcue());

			if (!isset($this->lastTsdeffonantCriteria) || !$this->lastTsdeffonantCriteria->equals($criteria)) {
				$this->collTsdeffonants = TsdeffonantPeer::doSelectJoinOpbenefi($criteria, $con);
			}
		}
		$this->lastTsdeffonantCriteria = $criteria;

		return $this->collTsdeffonants;
	}


	
	public function getTsdeffonantsJoinNpcatpre($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsdeffonantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsdeffonants === null) {
			if ($this->isNew()) {
				$this->collTsdeffonants = array();
			} else {

				$criteria->add(TsdeffonantPeer::NUMCUE, $this->getNumcue());

				$this->collTsdeffonants = TsdeffonantPeer::doSelectJoinNpcatpre($criteria, $con);
			}
		} else {
									
			$criteria->add(TsdeffonantPeer::NUMCUE, $this->getNumcue());

			if (!isset($this->lastTsdeffonantCriteria) || !$this->lastTsdeffonantCriteria->equals($criteria)) {
				$this->collTsdeffonants = TsdeffonantPeer::doSelectJoinNpcatpre($criteria, $con);
			}
		}
		$this->lastTsdeffonantCriteria = $criteria;

		return $this->collTsdeffonants;
	}

} 
