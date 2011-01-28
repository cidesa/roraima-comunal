<?php


abstract class BaseCidefniv extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $loncod;


	
	protected $rupcat;


	
	protected $ruppar;


	
	protected $nivdis;


	
	protected $forpre;


	
	protected $asiper;


	
	protected $numper;


	
	protected $peract;


	
	protected $fecper;


	
	protected $fecini;


	
	protected $feccie;


	
	protected $etadef;


	
	protected $staprc;


	
	protected $coraep;


	
	protected $cortras;


	
	protected $coraju;


	
	protected $coradi;


	
	protected $coring;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getLoncod($val=false)
  {

    if($val) return number_format($this->loncod,2,',','.');
    else return $this->loncod;

  }
  
  public function getRupcat($val=false)
  {

    if($val) return number_format($this->rupcat,2,',','.');
    else return $this->rupcat;

  }
  
  public function getRuppar($val=false)
  {

    if($val) return number_format($this->ruppar,2,',','.');
    else return $this->ruppar;

  }
  
  public function getNivdis($val=false)
  {

    if($val) return number_format($this->nivdis,2,',','.');
    else return $this->nivdis;

  }
  
  public function getForpre()
  {

    return trim($this->forpre);

  }
  
  public function getAsiper()
  {

    return trim($this->asiper);

  }
  
  public function getNumper($val=false)
  {

    if($val) return number_format($this->numper,2,',','.');
    else return $this->numper;

  }
  
  public function getPeract()
  {

    return trim($this->peract);

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

  
  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccie($format = 'Y-m-d')
  {

    if ($this->feccie === null || $this->feccie === '') {
      return null;
    } elseif (!is_int($this->feccie)) {
            $ts = adodb_strtotime($this->feccie);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccie] as date/time value: " . var_export($this->feccie, true));
      }
    } else {
      $ts = $this->feccie;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getEtadef()
  {

    return trim($this->etadef);

  }
  
  public function getStaprc()
  {

    return trim($this->staprc);

  }
  
  public function getCoraep()
  {

    return trim($this->coraep);

  }
  
  public function getCortras()
  {

    return trim($this->cortras);

  }
  
  public function getCoraju()
  {

    return trim($this->coraju);

  }
  
  public function getCoradi()
  {

    return trim($this->coradi);

  }
  
  public function getCoring()
  {

    return trim($this->coring);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = CidefnivPeer::CODEMP;
      }
  
	} 
	
	public function setLoncod($v)
	{

    if ($this->loncod !== $v) {
        $this->loncod = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CidefnivPeer::LONCOD;
      }
  
	} 
	
	public function setRupcat($v)
	{

    if ($this->rupcat !== $v) {
        $this->rupcat = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CidefnivPeer::RUPCAT;
      }
  
	} 
	
	public function setRuppar($v)
	{

    if ($this->ruppar !== $v) {
        $this->ruppar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CidefnivPeer::RUPPAR;
      }
  
	} 
	
	public function setNivdis($v)
	{

    if ($this->nivdis !== $v) {
        $this->nivdis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CidefnivPeer::NIVDIS;
      }
  
	} 
	
	public function setForpre($v)
	{

    if ($this->forpre !== $v) {
        $this->forpre = $v;
        $this->modifiedColumns[] = CidefnivPeer::FORPRE;
      }
  
	} 
	
	public function setAsiper($v)
	{

    if ($this->asiper !== $v) {
        $this->asiper = $v;
        $this->modifiedColumns[] = CidefnivPeer::ASIPER;
      }
  
	} 
	
	public function setNumper($v)
	{

    if ($this->numper !== $v) {
        $this->numper = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CidefnivPeer::NUMPER;
      }
  
	} 
	
	public function setPeract($v)
	{

    if ($this->peract !== $v) {
        $this->peract = $v;
        $this->modifiedColumns[] = CidefnivPeer::PERACT;
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
      $this->modifiedColumns[] = CidefnivPeer::FECPER;
    }

	} 
	
	public function setFecini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = CidefnivPeer::FECINI;
    }

	} 
	
	public function setFeccie($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccie !== $ts) {
      $this->feccie = $ts;
      $this->modifiedColumns[] = CidefnivPeer::FECCIE;
    }

	} 
	
	public function setEtadef($v)
	{

    if ($this->etadef !== $v) {
        $this->etadef = $v;
        $this->modifiedColumns[] = CidefnivPeer::ETADEF;
      }
  
	} 
	
	public function setStaprc($v)
	{

    if ($this->staprc !== $v) {
        $this->staprc = $v;
        $this->modifiedColumns[] = CidefnivPeer::STAPRC;
      }
  
	} 
	
	public function setCoraep($v)
	{

    if ($this->coraep !== $v) {
        $this->coraep = $v;
        $this->modifiedColumns[] = CidefnivPeer::CORAEP;
      }
  
	} 
	
	public function setCortras($v)
	{

    if ($this->cortras !== $v) {
        $this->cortras = $v;
        $this->modifiedColumns[] = CidefnivPeer::CORTRAS;
      }
  
	} 
	
	public function setCoraju($v)
	{

    if ($this->coraju !== $v) {
        $this->coraju = $v;
        $this->modifiedColumns[] = CidefnivPeer::CORAJU;
      }
  
	} 
	
	public function setCoradi($v)
	{

    if ($this->coradi !== $v) {
        $this->coradi = $v;
        $this->modifiedColumns[] = CidefnivPeer::CORADI;
      }
  
	} 
	
	public function setCoring($v)
	{

    if ($this->coring !== $v) {
        $this->coring = $v;
        $this->modifiedColumns[] = CidefnivPeer::CORING;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CidefnivPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->loncod = $rs->getFloat($startcol + 1);

      $this->rupcat = $rs->getFloat($startcol + 2);

      $this->ruppar = $rs->getFloat($startcol + 3);

      $this->nivdis = $rs->getFloat($startcol + 4);

      $this->forpre = $rs->getString($startcol + 5);

      $this->asiper = $rs->getString($startcol + 6);

      $this->numper = $rs->getFloat($startcol + 7);

      $this->peract = $rs->getString($startcol + 8);

      $this->fecper = $rs->getDate($startcol + 9, null);

      $this->fecini = $rs->getDate($startcol + 10, null);

      $this->feccie = $rs->getDate($startcol + 11, null);

      $this->etadef = $rs->getString($startcol + 12);

      $this->staprc = $rs->getString($startcol + 13);

      $this->coraep = $rs->getString($startcol + 14);

      $this->cortras = $rs->getString($startcol + 15);

      $this->coraju = $rs->getString($startcol + 16);

      $this->coradi = $rs->getString($startcol + 17);

      $this->coring = $rs->getString($startcol + 18);

      $this->id = $rs->getInt($startcol + 19);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 20; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cidefniv object", $e);
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
			$con = Propel::getConnection(CidefnivPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CidefnivPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CidefnivPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CidefnivPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CidefnivPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


			if (($retval = CidefnivPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CidefnivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getLoncod();
				break;
			case 2:
				return $this->getRupcat();
				break;
			case 3:
				return $this->getRuppar();
				break;
			case 4:
				return $this->getNivdis();
				break;
			case 5:
				return $this->getForpre();
				break;
			case 6:
				return $this->getAsiper();
				break;
			case 7:
				return $this->getNumper();
				break;
			case 8:
				return $this->getPeract();
				break;
			case 9:
				return $this->getFecper();
				break;
			case 10:
				return $this->getFecini();
				break;
			case 11:
				return $this->getFeccie();
				break;
			case 12:
				return $this->getEtadef();
				break;
			case 13:
				return $this->getStaprc();
				break;
			case 14:
				return $this->getCoraep();
				break;
			case 15:
				return $this->getCortras();
				break;
			case 16:
				return $this->getCoraju();
				break;
			case 17:
				return $this->getCoradi();
				break;
			case 18:
				return $this->getCoring();
				break;
			case 19:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CidefnivPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getLoncod(),
			$keys[2] => $this->getRupcat(),
			$keys[3] => $this->getRuppar(),
			$keys[4] => $this->getNivdis(),
			$keys[5] => $this->getForpre(),
			$keys[6] => $this->getAsiper(),
			$keys[7] => $this->getNumper(),
			$keys[8] => $this->getPeract(),
			$keys[9] => $this->getFecper(),
			$keys[10] => $this->getFecini(),
			$keys[11] => $this->getFeccie(),
			$keys[12] => $this->getEtadef(),
			$keys[13] => $this->getStaprc(),
			$keys[14] => $this->getCoraep(),
			$keys[15] => $this->getCortras(),
			$keys[16] => $this->getCoraju(),
			$keys[17] => $this->getCoradi(),
			$keys[18] => $this->getCoring(),
			$keys[19] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CidefnivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setLoncod($value);
				break;
			case 2:
				$this->setRupcat($value);
				break;
			case 3:
				$this->setRuppar($value);
				break;
			case 4:
				$this->setNivdis($value);
				break;
			case 5:
				$this->setForpre($value);
				break;
			case 6:
				$this->setAsiper($value);
				break;
			case 7:
				$this->setNumper($value);
				break;
			case 8:
				$this->setPeract($value);
				break;
			case 9:
				$this->setFecper($value);
				break;
			case 10:
				$this->setFecini($value);
				break;
			case 11:
				$this->setFeccie($value);
				break;
			case 12:
				$this->setEtadef($value);
				break;
			case 13:
				$this->setStaprc($value);
				break;
			case 14:
				$this->setCoraep($value);
				break;
			case 15:
				$this->setCortras($value);
				break;
			case 16:
				$this->setCoraju($value);
				break;
			case 17:
				$this->setCoradi($value);
				break;
			case 18:
				$this->setCoring($value);
				break;
			case 19:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CidefnivPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLoncod($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRupcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRuppar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNivdis($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setForpre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAsiper($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumper($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPeract($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecper($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecini($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFeccie($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setEtadef($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStaprc($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCoraep($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCortras($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCoraju($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCoradi($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCoring($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setId($arr[$keys[19]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CidefnivPeer::DATABASE_NAME);

		if ($this->isColumnModified(CidefnivPeer::CODEMP)) $criteria->add(CidefnivPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(CidefnivPeer::LONCOD)) $criteria->add(CidefnivPeer::LONCOD, $this->loncod);
		if ($this->isColumnModified(CidefnivPeer::RUPCAT)) $criteria->add(CidefnivPeer::RUPCAT, $this->rupcat);
		if ($this->isColumnModified(CidefnivPeer::RUPPAR)) $criteria->add(CidefnivPeer::RUPPAR, $this->ruppar);
		if ($this->isColumnModified(CidefnivPeer::NIVDIS)) $criteria->add(CidefnivPeer::NIVDIS, $this->nivdis);
		if ($this->isColumnModified(CidefnivPeer::FORPRE)) $criteria->add(CidefnivPeer::FORPRE, $this->forpre);
		if ($this->isColumnModified(CidefnivPeer::ASIPER)) $criteria->add(CidefnivPeer::ASIPER, $this->asiper);
		if ($this->isColumnModified(CidefnivPeer::NUMPER)) $criteria->add(CidefnivPeer::NUMPER, $this->numper);
		if ($this->isColumnModified(CidefnivPeer::PERACT)) $criteria->add(CidefnivPeer::PERACT, $this->peract);
		if ($this->isColumnModified(CidefnivPeer::FECPER)) $criteria->add(CidefnivPeer::FECPER, $this->fecper);
		if ($this->isColumnModified(CidefnivPeer::FECINI)) $criteria->add(CidefnivPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(CidefnivPeer::FECCIE)) $criteria->add(CidefnivPeer::FECCIE, $this->feccie);
		if ($this->isColumnModified(CidefnivPeer::ETADEF)) $criteria->add(CidefnivPeer::ETADEF, $this->etadef);
		if ($this->isColumnModified(CidefnivPeer::STAPRC)) $criteria->add(CidefnivPeer::STAPRC, $this->staprc);
		if ($this->isColumnModified(CidefnivPeer::CORAEP)) $criteria->add(CidefnivPeer::CORAEP, $this->coraep);
		if ($this->isColumnModified(CidefnivPeer::CORTRAS)) $criteria->add(CidefnivPeer::CORTRAS, $this->cortras);
		if ($this->isColumnModified(CidefnivPeer::CORAJU)) $criteria->add(CidefnivPeer::CORAJU, $this->coraju);
		if ($this->isColumnModified(CidefnivPeer::CORADI)) $criteria->add(CidefnivPeer::CORADI, $this->coradi);
		if ($this->isColumnModified(CidefnivPeer::CORING)) $criteria->add(CidefnivPeer::CORING, $this->coring);
		if ($this->isColumnModified(CidefnivPeer::ID)) $criteria->add(CidefnivPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CidefnivPeer::DATABASE_NAME);

		$criteria->add(CidefnivPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setLoncod($this->loncod);

		$copyObj->setRupcat($this->rupcat);

		$copyObj->setRuppar($this->ruppar);

		$copyObj->setNivdis($this->nivdis);

		$copyObj->setForpre($this->forpre);

		$copyObj->setAsiper($this->asiper);

		$copyObj->setNumper($this->numper);

		$copyObj->setPeract($this->peract);

		$copyObj->setFecper($this->fecper);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccie($this->feccie);

		$copyObj->setEtadef($this->etadef);

		$copyObj->setStaprc($this->staprc);

		$copyObj->setCoraep($this->coraep);

		$copyObj->setCortras($this->cortras);

		$copyObj->setCoraju($this->coraju);

		$copyObj->setCoradi($this->coradi);

		$copyObj->setCoring($this->coring);


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
			self::$peer = new CidefnivPeer();
		}
		return self::$peer;
	}

} 