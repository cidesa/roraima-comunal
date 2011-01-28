<?php


abstract class BaseOptipben extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipben;


	
	protected $destipben;


	
	protected $id;

	
	protected $collOpbenefis;

	
	protected $lastOpbenefiCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtipben()
  {

    return trim($this->codtipben);

  }
  
  public function getDestipben()
  {

    return trim($this->destipben);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtipben($v)
	{

    if ($this->codtipben !== $v) {
        $this->codtipben = $v;
        $this->modifiedColumns[] = OptipbenPeer::CODTIPBEN;
      }
  
	} 
	
	public function setDestipben($v)
	{

    if ($this->destipben !== $v) {
        $this->destipben = $v;
        $this->modifiedColumns[] = OptipbenPeer::DESTIPBEN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OptipbenPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtipben = $rs->getString($startcol + 0);

      $this->destipben = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Optipben object", $e);
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
			$con = Propel::getConnection(OptipbenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OptipbenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OptipbenPeer::DATABASE_NAME);
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
					$pk = OptipbenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OptipbenPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collOpbenefis !== null) {
				foreach($this->collOpbenefis as $referrerFK) {
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


			if (($retval = OptipbenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collOpbenefis !== null) {
					foreach($this->collOpbenefis as $referrerFK) {
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
		$pos = OptipbenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipben();
				break;
			case 1:
				return $this->getDestipben();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OptipbenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipben(),
			$keys[1] => $this->getDestipben(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OptipbenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipben($value);
				break;
			case 1:
				$this->setDestipben($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OptipbenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipben($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestipben($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OptipbenPeer::DATABASE_NAME);

		if ($this->isColumnModified(OptipbenPeer::CODTIPBEN)) $criteria->add(OptipbenPeer::CODTIPBEN, $this->codtipben);
		if ($this->isColumnModified(OptipbenPeer::DESTIPBEN)) $criteria->add(OptipbenPeer::DESTIPBEN, $this->destipben);
		if ($this->isColumnModified(OptipbenPeer::ID)) $criteria->add(OptipbenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OptipbenPeer::DATABASE_NAME);

		$criteria->add(OptipbenPeer::ID, $this->id);

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

		$copyObj->setCodtipben($this->codtipben);

		$copyObj->setDestipben($this->destipben);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getOpbenefis() as $relObj) {
				$copyObj->addOpbenefi($relObj->copy($deepCopy));
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
			self::$peer = new OptipbenPeer();
		}
		return self::$peer;
	}

	
	public function initOpbenefis()
	{
		if ($this->collOpbenefis === null) {
			$this->collOpbenefis = array();
		}
	}

	
	public function getOpbenefis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOpbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOpbenefis === null) {
			if ($this->isNew()) {
			   $this->collOpbenefis = array();
			} else {

				$criteria->add(OpbenefiPeer::CODTIPBEN, $this->getCodtipben());

				OpbenefiPeer::addSelectColumns($criteria);
				$this->collOpbenefis = OpbenefiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OpbenefiPeer::CODTIPBEN, $this->getCodtipben());

				OpbenefiPeer::addSelectColumns($criteria);
				if (!isset($this->lastOpbenefiCriteria) || !$this->lastOpbenefiCriteria->equals($criteria)) {
					$this->collOpbenefis = OpbenefiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOpbenefiCriteria = $criteria;
		return $this->collOpbenefis;
	}

	
	public function countOpbenefis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseOpbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OpbenefiPeer::CODTIPBEN, $this->getCodtipben());

		return OpbenefiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addOpbenefi(Opbenefi $l)
	{
		$this->collOpbenefis[] = $l;
		$l->setOptipben($this);
	}

} 