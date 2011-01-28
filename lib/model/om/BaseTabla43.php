<?php


abstract class BaseTabla43 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcom;


	
	protected $feccom;


	
	protected $debcre;


	
	protected $codcta;


	
	protected $numasi;


	
	protected $refasi;


	
	protected $desasi;


	
	protected $monasi;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getFeccom($format = 'Y-m-d')
  {

    if ($this->feccom === null || $this->feccom === '') {
      return null;
    } elseif (!is_int($this->feccom)) {
            $ts = adodb_strtotime($this->feccom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
      }
    } else {
      $ts = $this->feccom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDebcre()
  {

    return trim($this->debcre);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getNumasi($val=false)
  {

    if($val) return number_format($this->numasi,2,',','.');
    else return $this->numasi;

  }
  
  public function getRefasi()
  {

    return trim($this->refasi);

  }
  
  public function getDesasi()
  {

    return trim($this->desasi);

  }
  
  public function getMonasi($val=false)
  {

    if($val) return number_format($this->monasi,2,',','.');
    else return $this->monasi;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = Tabla43Peer::NUMCOM;
      }
  
	} 
	
	public function setFeccom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccom !== $ts) {
      $this->feccom = $ts;
      $this->modifiedColumns[] = Tabla43Peer::FECCOM;
    }

	} 
	
	public function setDebcre($v)
	{

    if ($this->debcre !== $v) {
        $this->debcre = $v;
        $this->modifiedColumns[] = Tabla43Peer::DEBCRE;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = Tabla43Peer::CODCTA;
      }
  
	} 
	
	public function setNumasi($v)
	{

    if ($this->numasi !== $v) {
        $this->numasi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla43Peer::NUMASI;
      }
  
	} 
	
	public function setRefasi($v)
	{

    if ($this->refasi !== $v) {
        $this->refasi = $v;
        $this->modifiedColumns[] = Tabla43Peer::REFASI;
      }
  
	} 
	
	public function setDesasi($v)
	{

    if ($this->desasi !== $v) {
        $this->desasi = $v;
        $this->modifiedColumns[] = Tabla43Peer::DESASI;
      }
  
	} 
	
	public function setMonasi($v)
	{

    if ($this->monasi !== $v) {
        $this->monasi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla43Peer::MONASI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Tabla43Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcom = $rs->getString($startcol + 0);

      $this->feccom = $rs->getDate($startcol + 1, null);

      $this->debcre = $rs->getString($startcol + 2);

      $this->codcta = $rs->getString($startcol + 3);

      $this->numasi = $rs->getFloat($startcol + 4);

      $this->refasi = $rs->getString($startcol + 5);

      $this->desasi = $rs->getString($startcol + 6);

      $this->monasi = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tabla43 object", $e);
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
			$con = Propel::getConnection(Tabla43Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Tabla43Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Tabla43Peer::DATABASE_NAME);
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
					$pk = Tabla43Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Tabla43Peer::doUpdate($this, $con);
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


			if (($retval = Tabla43Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla43Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcom();
				break;
			case 1:
				return $this->getFeccom();
				break;
			case 2:
				return $this->getDebcre();
				break;
			case 3:
				return $this->getCodcta();
				break;
			case 4:
				return $this->getNumasi();
				break;
			case 5:
				return $this->getRefasi();
				break;
			case 6:
				return $this->getDesasi();
				break;
			case 7:
				return $this->getMonasi();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla43Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcom(),
			$keys[1] => $this->getFeccom(),
			$keys[2] => $this->getDebcre(),
			$keys[3] => $this->getCodcta(),
			$keys[4] => $this->getNumasi(),
			$keys[5] => $this->getRefasi(),
			$keys[6] => $this->getDesasi(),
			$keys[7] => $this->getMonasi(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla43Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcom($value);
				break;
			case 1:
				$this->setFeccom($value);
				break;
			case 2:
				$this->setDebcre($value);
				break;
			case 3:
				$this->setCodcta($value);
				break;
			case 4:
				$this->setNumasi($value);
				break;
			case 5:
				$this->setRefasi($value);
				break;
			case 6:
				$this->setDesasi($value);
				break;
			case 7:
				$this->setMonasi($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla43Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDebcre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcta($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumasi($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRefasi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDesasi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonasi($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Tabla43Peer::DATABASE_NAME);

		if ($this->isColumnModified(Tabla43Peer::NUMCOM)) $criteria->add(Tabla43Peer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(Tabla43Peer::FECCOM)) $criteria->add(Tabla43Peer::FECCOM, $this->feccom);
		if ($this->isColumnModified(Tabla43Peer::DEBCRE)) $criteria->add(Tabla43Peer::DEBCRE, $this->debcre);
		if ($this->isColumnModified(Tabla43Peer::CODCTA)) $criteria->add(Tabla43Peer::CODCTA, $this->codcta);
		if ($this->isColumnModified(Tabla43Peer::NUMASI)) $criteria->add(Tabla43Peer::NUMASI, $this->numasi);
		if ($this->isColumnModified(Tabla43Peer::REFASI)) $criteria->add(Tabla43Peer::REFASI, $this->refasi);
		if ($this->isColumnModified(Tabla43Peer::DESASI)) $criteria->add(Tabla43Peer::DESASI, $this->desasi);
		if ($this->isColumnModified(Tabla43Peer::MONASI)) $criteria->add(Tabla43Peer::MONASI, $this->monasi);
		if ($this->isColumnModified(Tabla43Peer::ID)) $criteria->add(Tabla43Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Tabla43Peer::DATABASE_NAME);

		$criteria->add(Tabla43Peer::ID, $this->id);

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

		$copyObj->setNumcom($this->numcom);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setDebcre($this->debcre);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setNumasi($this->numasi);

		$copyObj->setRefasi($this->refasi);

		$copyObj->setDesasi($this->desasi);

		$copyObj->setMonasi($this->monasi);


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
			self::$peer = new Tabla43Peer();
		}
		return self::$peer;
	}

} 