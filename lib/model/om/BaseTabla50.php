<?php


abstract class BaseTabla50 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reftra;


	
	protected $fectra;


	
	protected $anotra;


	
	protected $pertra;


	
	protected $destra;


	
	protected $desanu;


	
	protected $tottra;


	
	protected $statra;


	
	protected $fecanu;


	
	protected $nrodec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReftra()
  {

    return trim($this->reftra);

  }
  
  public function getFectra($format = 'Y-m-d')
  {

    if ($this->fectra === null || $this->fectra === '') {
      return null;
    } elseif (!is_int($this->fectra)) {
            $ts = adodb_strtotime($this->fectra);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fectra] as date/time value: " . var_export($this->fectra, true));
      }
    } else {
      $ts = $this->fectra;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnotra()
  {

    return trim($this->anotra);

  }
  
  public function getPertra()
  {

    return trim($this->pertra);

  }
  
  public function getDestra()
  {

    return trim($this->destra);

  }
  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getTottra($val=false)
  {

    if($val) return number_format($this->tottra,2,',','.');
    else return $this->tottra;

  }
  
  public function getStatra()
  {

    return trim($this->statra);

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

  
  public function getNrodec()
  {

    return trim($this->nrodec);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReftra($v)
	{

    if ($this->reftra !== $v) {
        $this->reftra = $v;
        $this->modifiedColumns[] = Tabla50Peer::REFTRA;
      }
  
	} 
	
	public function setFectra($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fectra] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fectra !== $ts) {
      $this->fectra = $ts;
      $this->modifiedColumns[] = Tabla50Peer::FECTRA;
    }

	} 
	
	public function setAnotra($v)
	{

    if ($this->anotra !== $v) {
        $this->anotra = $v;
        $this->modifiedColumns[] = Tabla50Peer::ANOTRA;
      }
  
	} 
	
	public function setPertra($v)
	{

    if ($this->pertra !== $v) {
        $this->pertra = $v;
        $this->modifiedColumns[] = Tabla50Peer::PERTRA;
      }
  
	} 
	
	public function setDestra($v)
	{

    if ($this->destra !== $v) {
        $this->destra = $v;
        $this->modifiedColumns[] = Tabla50Peer::DESTRA;
      }
  
	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = Tabla50Peer::DESANU;
      }
  
	} 
	
	public function setTottra($v)
	{

    if ($this->tottra !== $v) {
        $this->tottra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla50Peer::TOTTRA;
      }
  
	} 
	
	public function setStatra($v)
	{

    if ($this->statra !== $v) {
        $this->statra = $v;
        $this->modifiedColumns[] = Tabla50Peer::STATRA;
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
      $this->modifiedColumns[] = Tabla50Peer::FECANU;
    }

	} 
	
	public function setNrodec($v)
	{

    if ($this->nrodec !== $v) {
        $this->nrodec = $v;
        $this->modifiedColumns[] = Tabla50Peer::NRODEC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Tabla50Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reftra = $rs->getString($startcol + 0);

      $this->fectra = $rs->getDate($startcol + 1, null);

      $this->anotra = $rs->getString($startcol + 2);

      $this->pertra = $rs->getString($startcol + 3);

      $this->destra = $rs->getString($startcol + 4);

      $this->desanu = $rs->getString($startcol + 5);

      $this->tottra = $rs->getFloat($startcol + 6);

      $this->statra = $rs->getString($startcol + 7);

      $this->fecanu = $rs->getDate($startcol + 8, null);

      $this->nrodec = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tabla50 object", $e);
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
			$con = Propel::getConnection(Tabla50Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Tabla50Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Tabla50Peer::DATABASE_NAME);
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
					$pk = Tabla50Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Tabla50Peer::doUpdate($this, $con);
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


			if (($retval = Tabla50Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla50Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReftra();
				break;
			case 1:
				return $this->getFectra();
				break;
			case 2:
				return $this->getAnotra();
				break;
			case 3:
				return $this->getPertra();
				break;
			case 4:
				return $this->getDestra();
				break;
			case 5:
				return $this->getDesanu();
				break;
			case 6:
				return $this->getTottra();
				break;
			case 7:
				return $this->getStatra();
				break;
			case 8:
				return $this->getFecanu();
				break;
			case 9:
				return $this->getNrodec();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla50Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReftra(),
			$keys[1] => $this->getFectra(),
			$keys[2] => $this->getAnotra(),
			$keys[3] => $this->getPertra(),
			$keys[4] => $this->getDestra(),
			$keys[5] => $this->getDesanu(),
			$keys[6] => $this->getTottra(),
			$keys[7] => $this->getStatra(),
			$keys[8] => $this->getFecanu(),
			$keys[9] => $this->getNrodec(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla50Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReftra($value);
				break;
			case 1:
				$this->setFectra($value);
				break;
			case 2:
				$this->setAnotra($value);
				break;
			case 3:
				$this->setPertra($value);
				break;
			case 4:
				$this->setDestra($value);
				break;
			case 5:
				$this->setDesanu($value);
				break;
			case 6:
				$this->setTottra($value);
				break;
			case 7:
				$this->setStatra($value);
				break;
			case 8:
				$this->setFecanu($value);
				break;
			case 9:
				$this->setNrodec($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla50Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReftra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFectra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnotra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPertra($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDestra($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesanu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTottra($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatra($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecanu($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNrodec($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Tabla50Peer::DATABASE_NAME);

		if ($this->isColumnModified(Tabla50Peer::REFTRA)) $criteria->add(Tabla50Peer::REFTRA, $this->reftra);
		if ($this->isColumnModified(Tabla50Peer::FECTRA)) $criteria->add(Tabla50Peer::FECTRA, $this->fectra);
		if ($this->isColumnModified(Tabla50Peer::ANOTRA)) $criteria->add(Tabla50Peer::ANOTRA, $this->anotra);
		if ($this->isColumnModified(Tabla50Peer::PERTRA)) $criteria->add(Tabla50Peer::PERTRA, $this->pertra);
		if ($this->isColumnModified(Tabla50Peer::DESTRA)) $criteria->add(Tabla50Peer::DESTRA, $this->destra);
		if ($this->isColumnModified(Tabla50Peer::DESANU)) $criteria->add(Tabla50Peer::DESANU, $this->desanu);
		if ($this->isColumnModified(Tabla50Peer::TOTTRA)) $criteria->add(Tabla50Peer::TOTTRA, $this->tottra);
		if ($this->isColumnModified(Tabla50Peer::STATRA)) $criteria->add(Tabla50Peer::STATRA, $this->statra);
		if ($this->isColumnModified(Tabla50Peer::FECANU)) $criteria->add(Tabla50Peer::FECANU, $this->fecanu);
		if ($this->isColumnModified(Tabla50Peer::NRODEC)) $criteria->add(Tabla50Peer::NRODEC, $this->nrodec);
		if ($this->isColumnModified(Tabla50Peer::ID)) $criteria->add(Tabla50Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Tabla50Peer::DATABASE_NAME);

		$criteria->add(Tabla50Peer::ID, $this->id);

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

		$copyObj->setReftra($this->reftra);

		$copyObj->setFectra($this->fectra);

		$copyObj->setAnotra($this->anotra);

		$copyObj->setPertra($this->pertra);

		$copyObj->setDestra($this->destra);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setTottra($this->tottra);

		$copyObj->setStatra($this->statra);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setNrodec($this->nrodec);


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
			self::$peer = new Tabla50Peer();
		}
		return self::$peer;
	}

} 