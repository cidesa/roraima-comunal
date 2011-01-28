<?php


abstract class BaseCarelartsiga extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codart;


	
	protected $codartq;


	
	protected $desartq;


	
	protected $id;

	
	protected $aCaregart;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodartq()
  {

    return trim($this->codartq);

  }
  
  public function getDesartq()
  {

    return trim($this->desartq);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CarelartsigaPeer::CODART;
      }
  
		if ($this->aCaregart !== null && $this->aCaregart->getCodart() !== $v) {
			$this->aCaregart = null;
		}

	} 
	
	public function setCodartq($v)
	{

    if ($this->codartq !== $v) {
        $this->codartq = $v;
        $this->modifiedColumns[] = CarelartsigaPeer::CODARTQ;
      }
  
	} 
	
	public function setDesartq($v)
	{

    if ($this->desartq !== $v) {
        $this->desartq = $v;
        $this->modifiedColumns[] = CarelartsigaPeer::DESARTQ;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CarelartsigaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codart = $rs->getString($startcol + 0);

      $this->codartq = $rs->getString($startcol + 1);

      $this->desartq = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Carelartsiga object", $e);
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
			$con = Propel::getConnection(CarelartsigaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CarelartsigaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CarelartsigaPeer::DATABASE_NAME);
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


												
			if ($this->aCaregart !== null) {
				if ($this->aCaregart->isModified()) {
					$affectedRows += $this->aCaregart->save($con);
				}
				$this->setCaregart($this->aCaregart);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CarelartsigaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CarelartsigaPeer::doUpdate($this, $con);
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


												
			if ($this->aCaregart !== null) {
				if (!$this->aCaregart->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCaregart->getValidationFailures());
				}
			}


			if (($retval = CarelartsigaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CarelartsigaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodart();
				break;
			case 1:
				return $this->getCodartq();
				break;
			case 2:
				return $this->getDesartq();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CarelartsigaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodart(),
			$keys[1] => $this->getCodartq(),
			$keys[2] => $this->getDesartq(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CarelartsigaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodart($value);
				break;
			case 1:
				$this->setCodartq($value);
				break;
			case 2:
				$this->setDesartq($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CarelartsigaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodartq($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesartq($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CarelartsigaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CarelartsigaPeer::CODART)) $criteria->add(CarelartsigaPeer::CODART, $this->codart);
		if ($this->isColumnModified(CarelartsigaPeer::CODARTQ)) $criteria->add(CarelartsigaPeer::CODARTQ, $this->codartq);
		if ($this->isColumnModified(CarelartsigaPeer::DESARTQ)) $criteria->add(CarelartsigaPeer::DESARTQ, $this->desartq);
		if ($this->isColumnModified(CarelartsigaPeer::ID)) $criteria->add(CarelartsigaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CarelartsigaPeer::DATABASE_NAME);

		$criteria->add(CarelartsigaPeer::ID, $this->id);

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

		$copyObj->setCodart($this->codart);

		$copyObj->setCodartq($this->codartq);

		$copyObj->setDesartq($this->desartq);


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
			self::$peer = new CarelartsigaPeer();
		}
		return self::$peer;
	}

	
	public function setCaregart($v)
	{


		if ($v === null) {
			$this->setCodart(NULL);
		} else {
			$this->setCodart($v->getCodart());
		}


		$this->aCaregart = $v;
	}


	
	public function getCaregart($con = null)
	{
		if ($this->aCaregart === null && (($this->codart !== "" && $this->codart !== null))) {
						include_once 'lib/model/om/BaseCaregartPeer.php';

      $c = new Criteria();
      $c->add(CaregartPeer::CODART,$this->codart);
      
			$this->aCaregart = CaregartPeer::doSelectOne($c, $con);

			
		}
		return $this->aCaregart;
	}

} 