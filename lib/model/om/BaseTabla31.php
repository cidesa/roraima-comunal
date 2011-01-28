<?php


abstract class BaseTabla31 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcau;


	
	protected $tipcau;


	
	protected $feccau;


	
	protected $anocau;


	
	protected $refcom;


	
	protected $tipcom;


	
	protected $descau;


	
	protected $desanu;


	
	protected $moncau;


	
	protected $salpag;


	
	protected $salaju;


	
	protected $stacau;


	
	protected $fecanu;


	
	protected $cedrif;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefcau()
  {

    return trim($this->refcau);

  }
  
  public function getTipcau()
  {

    return trim($this->tipcau);

  }
  
  public function getFeccau($format = 'Y-m-d')
  {

    if ($this->feccau === null || $this->feccau === '') {
      return null;
    } elseif (!is_int($this->feccau)) {
            $ts = adodb_strtotime($this->feccau);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccau] as date/time value: " . var_export($this->feccau, true));
      }
    } else {
      $ts = $this->feccau;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnocau()
  {

    return trim($this->anocau);

  }
  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getDescau()
  {

    return trim($this->descau);

  }
  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getMoncau($val=false)
  {

    if($val) return number_format($this->moncau,2,',','.');
    else return $this->moncau;

  }
  
  public function getSalpag($val=false)
  {

    if($val) return number_format($this->salpag,2,',','.');
    else return $this->salpag;

  }
  
  public function getSalaju($val=false)
  {

    if($val) return number_format($this->salaju,2,',','.');
    else return $this->salaju;

  }
  
  public function getStacau()
  {

    return trim($this->stacau);

  }
  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefcau($v)
	{

    if ($this->refcau !== $v) {
        $this->refcau = $v;
        $this->modifiedColumns[] = Tabla31Peer::REFCAU;
      }
  
	} 
	
	public function setTipcau($v)
	{

    if ($this->tipcau !== $v) {
        $this->tipcau = $v;
        $this->modifiedColumns[] = Tabla31Peer::TIPCAU;
      }
  
	} 
	
	public function setFeccau($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccau] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccau !== $ts) {
      $this->feccau = $ts;
      $this->modifiedColumns[] = Tabla31Peer::FECCAU;
    }

	} 
	
	public function setAnocau($v)
	{

    if ($this->anocau !== $v) {
        $this->anocau = $v;
        $this->modifiedColumns[] = Tabla31Peer::ANOCAU;
      }
  
	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = Tabla31Peer::REFCOM;
      }
  
	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = Tabla31Peer::TIPCOM;
      }
  
	} 
	
	public function setDescau($v)
	{

    if ($this->descau !== $v) {
        $this->descau = $v;
        $this->modifiedColumns[] = Tabla31Peer::DESCAU;
      }
  
	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = Tabla31Peer::DESANU;
      }
  
	} 
	
	public function setMoncau($v)
	{

    if ($this->moncau !== $v) {
        $this->moncau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla31Peer::MONCAU;
      }
  
	} 
	
	public function setSalpag($v)
	{

    if ($this->salpag !== $v) {
        $this->salpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla31Peer::SALPAG;
      }
  
	} 
	
	public function setSalaju($v)
	{

    if ($this->salaju !== $v) {
        $this->salaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla31Peer::SALAJU;
      }
  
	} 
	
	public function setStacau($v)
	{

    if ($this->stacau !== $v) {
        $this->stacau = $v;
        $this->modifiedColumns[] = Tabla31Peer::STACAU;
      }
  
	} 
	
	public function setFecanu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = Tabla31Peer::FECANU;
    }

	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = Tabla31Peer::CEDRIF;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Tabla31Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refcau = $rs->getString($startcol + 0);

      $this->tipcau = $rs->getString($startcol + 1);

      $this->feccau = $rs->getDate($startcol + 2, null);

      $this->anocau = $rs->getString($startcol + 3);

      $this->refcom = $rs->getString($startcol + 4);

      $this->tipcom = $rs->getString($startcol + 5);

      $this->descau = $rs->getString($startcol + 6);

      $this->desanu = $rs->getString($startcol + 7);

      $this->moncau = $rs->getFloat($startcol + 8);

      $this->salpag = $rs->getFloat($startcol + 9);

      $this->salaju = $rs->getFloat($startcol + 10);

      $this->stacau = $rs->getString($startcol + 11);

      $this->fecanu = $rs->getDate($startcol + 12, null);

      $this->cedrif = $rs->getString($startcol + 13);

      $this->id = $rs->getInt($startcol + 14);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 15; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tabla31 object", $e);
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
			$con = Propel::getConnection(Tabla31Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Tabla31Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Tabla31Peer::DATABASE_NAME);
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
					$pk = Tabla31Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Tabla31Peer::doUpdate($this, $con);
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


			if (($retval = Tabla31Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla31Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcau();
				break;
			case 1:
				return $this->getTipcau();
				break;
			case 2:
				return $this->getFeccau();
				break;
			case 3:
				return $this->getAnocau();
				break;
			case 4:
				return $this->getRefcom();
				break;
			case 5:
				return $this->getTipcom();
				break;
			case 6:
				return $this->getDescau();
				break;
			case 7:
				return $this->getDesanu();
				break;
			case 8:
				return $this->getMoncau();
				break;
			case 9:
				return $this->getSalpag();
				break;
			case 10:
				return $this->getSalaju();
				break;
			case 11:
				return $this->getStacau();
				break;
			case 12:
				return $this->getFecanu();
				break;
			case 13:
				return $this->getCedrif();
				break;
			case 14:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla31Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcau(),
			$keys[1] => $this->getTipcau(),
			$keys[2] => $this->getFeccau(),
			$keys[3] => $this->getAnocau(),
			$keys[4] => $this->getRefcom(),
			$keys[5] => $this->getTipcom(),
			$keys[6] => $this->getDescau(),
			$keys[7] => $this->getDesanu(),
			$keys[8] => $this->getMoncau(),
			$keys[9] => $this->getSalpag(),
			$keys[10] => $this->getSalaju(),
			$keys[11] => $this->getStacau(),
			$keys[12] => $this->getFecanu(),
			$keys[13] => $this->getCedrif(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla31Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcau($value);
				break;
			case 1:
				$this->setTipcau($value);
				break;
			case 2:
				$this->setFeccau($value);
				break;
			case 3:
				$this->setAnocau($value);
				break;
			case 4:
				$this->setRefcom($value);
				break;
			case 5:
				$this->setTipcom($value);
				break;
			case 6:
				$this->setDescau($value);
				break;
			case 7:
				$this->setDesanu($value);
				break;
			case 8:
				$this->setMoncau($value);
				break;
			case 9:
				$this->setSalpag($value);
				break;
			case 10:
				$this->setSalaju($value);
				break;
			case 11:
				$this->setStacau($value);
				break;
			case 12:
				$this->setFecanu($value);
				break;
			case 13:
				$this->setCedrif($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla31Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcau($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipcau($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccau($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnocau($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefcom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipcom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDescau($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesanu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMoncau($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSalpag($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSalaju($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStacau($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCedrif($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Tabla31Peer::DATABASE_NAME);

		if ($this->isColumnModified(Tabla31Peer::REFCAU)) $criteria->add(Tabla31Peer::REFCAU, $this->refcau);
		if ($this->isColumnModified(Tabla31Peer::TIPCAU)) $criteria->add(Tabla31Peer::TIPCAU, $this->tipcau);
		if ($this->isColumnModified(Tabla31Peer::FECCAU)) $criteria->add(Tabla31Peer::FECCAU, $this->feccau);
		if ($this->isColumnModified(Tabla31Peer::ANOCAU)) $criteria->add(Tabla31Peer::ANOCAU, $this->anocau);
		if ($this->isColumnModified(Tabla31Peer::REFCOM)) $criteria->add(Tabla31Peer::REFCOM, $this->refcom);
		if ($this->isColumnModified(Tabla31Peer::TIPCOM)) $criteria->add(Tabla31Peer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(Tabla31Peer::DESCAU)) $criteria->add(Tabla31Peer::DESCAU, $this->descau);
		if ($this->isColumnModified(Tabla31Peer::DESANU)) $criteria->add(Tabla31Peer::DESANU, $this->desanu);
		if ($this->isColumnModified(Tabla31Peer::MONCAU)) $criteria->add(Tabla31Peer::MONCAU, $this->moncau);
		if ($this->isColumnModified(Tabla31Peer::SALPAG)) $criteria->add(Tabla31Peer::SALPAG, $this->salpag);
		if ($this->isColumnModified(Tabla31Peer::SALAJU)) $criteria->add(Tabla31Peer::SALAJU, $this->salaju);
		if ($this->isColumnModified(Tabla31Peer::STACAU)) $criteria->add(Tabla31Peer::STACAU, $this->stacau);
		if ($this->isColumnModified(Tabla31Peer::FECANU)) $criteria->add(Tabla31Peer::FECANU, $this->fecanu);
		if ($this->isColumnModified(Tabla31Peer::CEDRIF)) $criteria->add(Tabla31Peer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(Tabla31Peer::ID)) $criteria->add(Tabla31Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Tabla31Peer::DATABASE_NAME);

		$criteria->add(Tabla31Peer::ID, $this->id);

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

		$copyObj->setRefcau($this->refcau);

		$copyObj->setTipcau($this->tipcau);

		$copyObj->setFeccau($this->feccau);

		$copyObj->setAnocau($this->anocau);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setDescau($this->descau);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setMoncau($this->moncau);

		$copyObj->setSalpag($this->salpag);

		$copyObj->setSalaju($this->salaju);

		$copyObj->setStacau($this->stacau);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCedrif($this->cedrif);


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
			self::$peer = new Tabla31Peer();
		}
		return self::$peer;
	}

} 