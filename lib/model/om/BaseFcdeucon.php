<?php


abstract class BaseFcdeucon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcon;


	
	protected $numdec;


	
	protected $numero;


	
	protected $fecven;


	
	protected $fueing;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefcon()
  {

    return trim($this->refcon);

  }
  
  public function getNumdec()
  {

    return trim($this->numdec);

  }
  
  public function getNumero()
  {

    return trim($this->numero);

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

  
  public function getFueing()
  {

    return trim($this->fueing);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefcon($v)
	{

    if ($this->refcon !== $v) {
        $this->refcon = $v;
        $this->modifiedColumns[] = FcdeuconPeer::REFCON;
      }
  
	} 
	
	public function setNumdec($v)
	{

    if ($this->numdec !== $v) {
        $this->numdec = $v;
        $this->modifiedColumns[] = FcdeuconPeer::NUMDEC;
      }
  
	} 
	
	public function setNumero($v)
	{

    if ($this->numero !== $v) {
        $this->numero = $v;
        $this->modifiedColumns[] = FcdeuconPeer::NUMERO;
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
      $this->modifiedColumns[] = FcdeuconPeer::FECVEN;
    }

	} 
	
	public function setFueing($v)
	{

    if ($this->fueing !== $v) {
        $this->fueing = $v;
        $this->modifiedColumns[] = FcdeuconPeer::FUEING;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdeuconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refcon = $rs->getString($startcol + 0);

      $this->numdec = $rs->getString($startcol + 1);

      $this->numero = $rs->getString($startcol + 2);

      $this->fecven = $rs->getDate($startcol + 3, null);

      $this->fueing = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdeucon object", $e);
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
			$con = Propel::getConnection(FcdeuconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdeuconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdeuconPeer::DATABASE_NAME);
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
					$pk = FcdeuconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdeuconPeer::doUpdate($this, $con);
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


			if (($retval = FcdeuconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdeuconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcon();
				break;
			case 1:
				return $this->getNumdec();
				break;
			case 2:
				return $this->getNumero();
				break;
			case 3:
				return $this->getFecven();
				break;
			case 4:
				return $this->getFueing();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdeuconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcon(),
			$keys[1] => $this->getNumdec(),
			$keys[2] => $this->getNumero(),
			$keys[3] => $this->getFecven(),
			$keys[4] => $this->getFueing(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdeuconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcon($value);
				break;
			case 1:
				$this->setNumdec($value);
				break;
			case 2:
				$this->setNumero($value);
				break;
			case 3:
				$this->setFecven($value);
				break;
			case 4:
				$this->setFueing($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdeuconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumdec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumero($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecven($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFueing($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdeuconPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdeuconPeer::REFCON)) $criteria->add(FcdeuconPeer::REFCON, $this->refcon);
		if ($this->isColumnModified(FcdeuconPeer::NUMDEC)) $criteria->add(FcdeuconPeer::NUMDEC, $this->numdec);
		if ($this->isColumnModified(FcdeuconPeer::NUMERO)) $criteria->add(FcdeuconPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(FcdeuconPeer::FECVEN)) $criteria->add(FcdeuconPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FcdeuconPeer::FUEING)) $criteria->add(FcdeuconPeer::FUEING, $this->fueing);
		if ($this->isColumnModified(FcdeuconPeer::ID)) $criteria->add(FcdeuconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdeuconPeer::DATABASE_NAME);

		$criteria->add(FcdeuconPeer::ID, $this->id);

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

		$copyObj->setRefcon($this->refcon);

		$copyObj->setNumdec($this->numdec);

		$copyObj->setNumero($this->numero);

		$copyObj->setFecven($this->fecven);

		$copyObj->setFueing($this->fueing);


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
			self::$peer = new FcdeuconPeer();
		}
		return self::$peer;
	}

} 