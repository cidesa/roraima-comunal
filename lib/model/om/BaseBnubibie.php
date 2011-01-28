<?php


abstract class BaseBnubibie extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codubi;


	
	protected $desubi;


	
	protected $stacod;


	
	protected $dirubi;


	
	protected $codubiadm;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getDesubi()
  {

    return trim($this->desubi);

  }
  
  public function getStacod()
  {

    return trim($this->stacod);

  }
  
  public function getDirubi()
  {

    return trim($this->dirubi);

  }
  
  public function getCodubiadm()
  {

    return trim($this->codubiadm);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = BnubibiePeer::CODUBI;
      }
  
	} 
	
	public function setDesubi($v)
	{

    if ($this->desubi !== $v) {
        $this->desubi = $v;
        $this->modifiedColumns[] = BnubibiePeer::DESUBI;
      }
  
	} 
	
	public function setStacod($v)
	{

    if ($this->stacod !== $v) {
        $this->stacod = $v;
        $this->modifiedColumns[] = BnubibiePeer::STACOD;
      }
  
	} 
	
	public function setDirubi($v)
	{

    if ($this->dirubi !== $v) {
        $this->dirubi = $v;
        $this->modifiedColumns[] = BnubibiePeer::DIRUBI;
      }
  
	} 
	
	public function setCodubiadm($v)
	{

    if ($this->codubiadm !== $v) {
        $this->codubiadm = $v;
        $this->modifiedColumns[] = BnubibiePeer::CODUBIADM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BnubibiePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codubi = $rs->getString($startcol + 0);

      $this->desubi = $rs->getString($startcol + 1);

      $this->stacod = $rs->getString($startcol + 2);

      $this->dirubi = $rs->getString($startcol + 3);

      $this->codubiadm = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bnubibie object", $e);
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
			$con = Propel::getConnection(BnubibiePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnubibiePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnubibiePeer::DATABASE_NAME);
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
					$pk = BnubibiePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BnubibiePeer::doUpdate($this, $con);
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


			if (($retval = BnubibiePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnubibiePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodubi();
				break;
			case 1:
				return $this->getDesubi();
				break;
			case 2:
				return $this->getStacod();
				break;
			case 3:
				return $this->getDirubi();
				break;
			case 4:
				return $this->getCodubiadm();
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
		$keys = BnubibiePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodubi(),
			$keys[1] => $this->getDesubi(),
			$keys[2] => $this->getStacod(),
			$keys[3] => $this->getDirubi(),
			$keys[4] => $this->getCodubiadm(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnubibiePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodubi($value);
				break;
			case 1:
				$this->setDesubi($value);
				break;
			case 2:
				$this->setStacod($value);
				break;
			case 3:
				$this->setDirubi($value);
				break;
			case 4:
				$this->setCodubiadm($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnubibiePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodubi($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesubi($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStacod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDirubi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodubiadm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnubibiePeer::DATABASE_NAME);

		if ($this->isColumnModified(BnubibiePeer::CODUBI)) $criteria->add(BnubibiePeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(BnubibiePeer::DESUBI)) $criteria->add(BnubibiePeer::DESUBI, $this->desubi);
		if ($this->isColumnModified(BnubibiePeer::STACOD)) $criteria->add(BnubibiePeer::STACOD, $this->stacod);
		if ($this->isColumnModified(BnubibiePeer::DIRUBI)) $criteria->add(BnubibiePeer::DIRUBI, $this->dirubi);
		if ($this->isColumnModified(BnubibiePeer::CODUBIADM)) $criteria->add(BnubibiePeer::CODUBIADM, $this->codubiadm);
		if ($this->isColumnModified(BnubibiePeer::ID)) $criteria->add(BnubibiePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnubibiePeer::DATABASE_NAME);

		$criteria->add(BnubibiePeer::ID, $this->id);

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

		$copyObj->setCodubi($this->codubi);

		$copyObj->setDesubi($this->desubi);

		$copyObj->setStacod($this->stacod);

		$copyObj->setDirubi($this->dirubi);

		$copyObj->setCodubiadm($this->codubiadm);


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
			self::$peer = new BnubibiePeer();
		}
		return self::$peer;
	}

} 