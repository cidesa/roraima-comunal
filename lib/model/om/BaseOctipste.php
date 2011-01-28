<?php


abstract class BaseOctipste extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codste;


	
	protected $desste;


	
	protected $tipste;


	
	protected $staste;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodste()
  {

    return trim($this->codste);

  }
  
  public function getDesste()
  {

    return trim($this->desste);

  }
  
  public function getTipste()
  {

    return trim($this->tipste);

  }
  
  public function getStaste()
  {

    return trim($this->staste);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodste($v)
	{

    if ($this->codste !== $v) {
        $this->codste = $v;
        $this->modifiedColumns[] = OctipstePeer::CODSTE;
      }
  
	} 
	
	public function setDesste($v)
	{

    if ($this->desste !== $v) {
        $this->desste = $v;
        $this->modifiedColumns[] = OctipstePeer::DESSTE;
      }
  
	} 
	
	public function setTipste($v)
	{

    if ($this->tipste !== $v) {
        $this->tipste = $v;
        $this->modifiedColumns[] = OctipstePeer::TIPSTE;
      }
  
	} 
	
	public function setStaste($v)
	{

    if ($this->staste !== $v) {
        $this->staste = $v;
        $this->modifiedColumns[] = OctipstePeer::STASTE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OctipstePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codste = $rs->getString($startcol + 0);

      $this->desste = $rs->getString($startcol + 1);

      $this->tipste = $rs->getString($startcol + 2);

      $this->staste = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Octipste object", $e);
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
			$con = Propel::getConnection(OctipstePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OctipstePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OctipstePeer::DATABASE_NAME);
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
					$pk = OctipstePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OctipstePeer::doUpdate($this, $con);
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


			if (($retval = OctipstePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OctipstePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodste();
				break;
			case 1:
				return $this->getDesste();
				break;
			case 2:
				return $this->getTipste();
				break;
			case 3:
				return $this->getStaste();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OctipstePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodste(),
			$keys[1] => $this->getDesste(),
			$keys[2] => $this->getTipste(),
			$keys[3] => $this->getStaste(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OctipstePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodste($value);
				break;
			case 1:
				$this->setDesste($value);
				break;
			case 2:
				$this->setTipste($value);
				break;
			case 3:
				$this->setStaste($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OctipstePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodste($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesste($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipste($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStaste($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OctipstePeer::DATABASE_NAME);

		if ($this->isColumnModified(OctipstePeer::CODSTE)) $criteria->add(OctipstePeer::CODSTE, $this->codste);
		if ($this->isColumnModified(OctipstePeer::DESSTE)) $criteria->add(OctipstePeer::DESSTE, $this->desste);
		if ($this->isColumnModified(OctipstePeer::TIPSTE)) $criteria->add(OctipstePeer::TIPSTE, $this->tipste);
		if ($this->isColumnModified(OctipstePeer::STASTE)) $criteria->add(OctipstePeer::STASTE, $this->staste);
		if ($this->isColumnModified(OctipstePeer::ID)) $criteria->add(OctipstePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OctipstePeer::DATABASE_NAME);

		$criteria->add(OctipstePeer::ID, $this->id);

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

		$copyObj->setCodste($this->codste);

		$copyObj->setDesste($this->desste);

		$copyObj->setTipste($this->tipste);

		$copyObj->setStaste($this->staste);


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
			self::$peer = new OctipstePeer();
		}
		return self::$peer;
	}

} 