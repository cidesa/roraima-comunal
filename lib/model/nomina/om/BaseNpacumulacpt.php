<?php


abstract class BaseNpacumulacpt extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codacu;


	
	protected $nomacu;


	
	protected $codcon;


	
	protected $codnom;


	
	protected $tipacu;


	
	protected $factor = 1;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodacu()
  {

    return trim($this->codacu);

  }
  
  public function getNomacu()
  {

    return trim($this->nomacu);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getTipacu()
  {

    return trim($this->tipacu);

  }
  
  public function getFactor($val=false)
  {

    if($val) return number_format($this->factor,2,',','.');
    else return $this->factor;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodacu($v)
	{

    if ($this->codacu !== $v) {
        $this->codacu = $v;
        $this->modifiedColumns[] = NpacumulacptPeer::CODACU;
      }
  
	} 
	
	public function setNomacu($v)
	{

    if ($this->nomacu !== $v) {
        $this->nomacu = $v;
        $this->modifiedColumns[] = NpacumulacptPeer::NOMACU;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpacumulacptPeer::CODCON;
      }
  
	} 
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpacumulacptPeer::CODNOM;
      }
  
	} 
	
	public function setTipacu($v)
	{

    if ($this->tipacu !== $v) {
        $this->tipacu = $v;
        $this->modifiedColumns[] = NpacumulacptPeer::TIPACU;
      }
  
	} 
	
	public function setFactor($v)
	{

    if ($this->factor !== $v || $v === 1) {
        $this->factor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpacumulacptPeer::FACTOR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpacumulacptPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codacu = $rs->getString($startcol + 0);

      $this->nomacu = $rs->getString($startcol + 1);

      $this->codcon = $rs->getString($startcol + 2);

      $this->codnom = $rs->getString($startcol + 3);

      $this->tipacu = $rs->getString($startcol + 4);

      $this->factor = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npacumulacpt object", $e);
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
			$con = Propel::getConnection(NpacumulacptPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpacumulacptPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpacumulacptPeer::DATABASE_NAME);
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
					$pk = NpacumulacptPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpacumulacptPeer::doUpdate($this, $con);
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


			if (($retval = NpacumulacptPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpacumulacptPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodacu();
				break;
			case 1:
				return $this->getNomacu();
				break;
			case 2:
				return $this->getCodcon();
				break;
			case 3:
				return $this->getCodnom();
				break;
			case 4:
				return $this->getTipacu();
				break;
			case 5:
				return $this->getFactor();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpacumulacptPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodacu(),
			$keys[1] => $this->getNomacu(),
			$keys[2] => $this->getCodcon(),
			$keys[3] => $this->getCodnom(),
			$keys[4] => $this->getTipacu(),
			$keys[5] => $this->getFactor(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpacumulacptPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodacu($value);
				break;
			case 1:
				$this->setNomacu($value);
				break;
			case 2:
				$this->setCodcon($value);
				break;
			case 3:
				$this->setCodnom($value);
				break;
			case 4:
				$this->setTipacu($value);
				break;
			case 5:
				$this->setFactor($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpacumulacptPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodacu($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomacu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodnom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipacu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFactor($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpacumulacptPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpacumulacptPeer::CODACU)) $criteria->add(NpacumulacptPeer::CODACU, $this->codacu);
		if ($this->isColumnModified(NpacumulacptPeer::NOMACU)) $criteria->add(NpacumulacptPeer::NOMACU, $this->nomacu);
		if ($this->isColumnModified(NpacumulacptPeer::CODCON)) $criteria->add(NpacumulacptPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpacumulacptPeer::CODNOM)) $criteria->add(NpacumulacptPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpacumulacptPeer::TIPACU)) $criteria->add(NpacumulacptPeer::TIPACU, $this->tipacu);
		if ($this->isColumnModified(NpacumulacptPeer::FACTOR)) $criteria->add(NpacumulacptPeer::FACTOR, $this->factor);
		if ($this->isColumnModified(NpacumulacptPeer::ID)) $criteria->add(NpacumulacptPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpacumulacptPeer::DATABASE_NAME);

		$criteria->add(NpacumulacptPeer::ID, $this->id);

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

		$copyObj->setCodacu($this->codacu);

		$copyObj->setNomacu($this->nomacu);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setTipacu($this->tipacu);

		$copyObj->setFactor($this->factor);


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
			self::$peer = new NpacumulacptPeer();
		}
		return self::$peer;
	}

} 