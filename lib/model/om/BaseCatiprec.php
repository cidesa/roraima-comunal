<?php


abstract class BaseCatiprec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtiprec;


	
	protected $destiprec;


	
	protected $id;

	
	protected $collCarecauds;

	
	protected $lastCarecaudCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtiprec()
  {

    return trim($this->codtiprec);

  }
  
  public function getDestiprec()
  {

    return trim($this->destiprec);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtiprec($v)
	{

    if ($this->codtiprec !== $v) {
        $this->codtiprec = $v;
        $this->modifiedColumns[] = CatiprecPeer::CODTIPREC;
      }
  
	} 
	
	public function setDestiprec($v)
	{

    if ($this->destiprec !== $v) {
        $this->destiprec = $v;
        $this->modifiedColumns[] = CatiprecPeer::DESTIPREC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatiprecPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtiprec = $rs->getString($startcol + 0);

      $this->destiprec = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catiprec object", $e);
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
			$con = Propel::getConnection(CatiprecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatiprecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatiprecPeer::DATABASE_NAME);
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
					$pk = CatiprecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatiprecPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCarecauds !== null) {
				foreach($this->collCarecauds as $referrerFK) {
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


			if (($retval = CatiprecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCarecauds !== null) {
					foreach($this->collCarecauds as $referrerFK) {
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
		$pos = CatiprecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtiprec();
				break;
			case 1:
				return $this->getDestiprec();
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
		$keys = CatiprecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtiprec(),
			$keys[1] => $this->getDestiprec(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatiprecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtiprec($value);
				break;
			case 1:
				$this->setDestiprec($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatiprecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtiprec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestiprec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatiprecPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatiprecPeer::CODTIPREC)) $criteria->add(CatiprecPeer::CODTIPREC, $this->codtiprec);
		if ($this->isColumnModified(CatiprecPeer::DESTIPREC)) $criteria->add(CatiprecPeer::DESTIPREC, $this->destiprec);
		if ($this->isColumnModified(CatiprecPeer::ID)) $criteria->add(CatiprecPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatiprecPeer::DATABASE_NAME);

		$criteria->add(CatiprecPeer::ID, $this->id);

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

		$copyObj->setCodtiprec($this->codtiprec);

		$copyObj->setDestiprec($this->destiprec);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCarecauds() as $relObj) {
				$copyObj->addCarecaud($relObj->copy($deepCopy));
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
			self::$peer = new CatiprecPeer();
		}
		return self::$peer;
	}

	
	public function initCarecauds()
	{
		if ($this->collCarecauds === null) {
			$this->collCarecauds = array();
		}
	}

	
	public function getCarecauds($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCarecaudPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCarecauds === null) {
			if ($this->isNew()) {
			   $this->collCarecauds = array();
			} else {

				$criteria->add(CarecaudPeer::CODTIPREC, $this->getCodtiprec());

				CarecaudPeer::addSelectColumns($criteria);
				$this->collCarecauds = CarecaudPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CarecaudPeer::CODTIPREC, $this->getCodtiprec());

				CarecaudPeer::addSelectColumns($criteria);
				if (!isset($this->lastCarecaudCriteria) || !$this->lastCarecaudCriteria->equals($criteria)) {
					$this->collCarecauds = CarecaudPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCarecaudCriteria = $criteria;
		return $this->collCarecauds;
	}

	
	public function countCarecauds($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCarecaudPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CarecaudPeer::CODTIPREC, $this->getCodtiprec());

		return CarecaudPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCarecaud(Carecaud $l)
	{
		$this->collCarecauds[] = $l;
		$l->setCatiprec($this);
	}

} 