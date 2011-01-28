<?php


abstract class BaseCatipent extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipent;


	
	protected $destipent;


	
	protected $id;

	
	protected $collCaentalms;

	
	protected $lastCaentalmCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtipent()
  {

    return trim($this->codtipent);

  }
  
  public function getDestipent()
  {

    return trim($this->destipent);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtipent($v)
	{

    if ($this->codtipent !== $v) {
        $this->codtipent = $v;
        $this->modifiedColumns[] = CatipentPeer::CODTIPENT;
      }
  
	} 
	
	public function setDestipent($v)
	{

    if ($this->destipent !== $v) {
        $this->destipent = $v;
        $this->modifiedColumns[] = CatipentPeer::DESTIPENT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatipentPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtipent = $rs->getString($startcol + 0);

      $this->destipent = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catipent object", $e);
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
			$con = Propel::getConnection(CatipentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatipentPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatipentPeer::DATABASE_NAME);
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
					$pk = CatipentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatipentPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCaentalms !== null) {
				foreach($this->collCaentalms as $referrerFK) {
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


			if (($retval = CatipentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCaentalms !== null) {
					foreach($this->collCaentalms as $referrerFK) {
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
		$pos = CatipentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipent();
				break;
			case 1:
				return $this->getDestipent();
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
		$keys = CatipentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipent(),
			$keys[1] => $this->getDestipent(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatipentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipent($value);
				break;
			case 1:
				$this->setDestipent($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatipentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipent($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestipent($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatipentPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatipentPeer::CODTIPENT)) $criteria->add(CatipentPeer::CODTIPENT, $this->codtipent);
		if ($this->isColumnModified(CatipentPeer::DESTIPENT)) $criteria->add(CatipentPeer::DESTIPENT, $this->destipent);
		if ($this->isColumnModified(CatipentPeer::ID)) $criteria->add(CatipentPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatipentPeer::DATABASE_NAME);

		$criteria->add(CatipentPeer::ID, $this->id);

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

		$copyObj->setCodtipent($this->codtipent);

		$copyObj->setDestipent($this->destipent);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCaentalms() as $relObj) {
				$copyObj->addCaentalm($relObj->copy($deepCopy));
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
			self::$peer = new CatipentPeer();
		}
		return self::$peer;
	}

	
	public function initCaentalms()
	{
		if ($this->collCaentalms === null) {
			$this->collCaentalms = array();
		}
	}

	
	public function getCaentalms($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaentalmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaentalms === null) {
			if ($this->isNew()) {
			   $this->collCaentalms = array();
			} else {

				$criteria->add(CaentalmPeer::TIPMOV, $this->getCodtipent());

				CaentalmPeer::addSelectColumns($criteria);
				$this->collCaentalms = CaentalmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CaentalmPeer::TIPMOV, $this->getCodtipent());

				CaentalmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCaentalmCriteria) || !$this->lastCaentalmCriteria->equals($criteria)) {
					$this->collCaentalms = CaentalmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCaentalmCriteria = $criteria;
		return $this->collCaentalms;
	}

	
	public function countCaentalms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCaentalmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CaentalmPeer::TIPMOV, $this->getCodtipent());

		return CaentalmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCaentalm(Caentalm $l)
	{
		$this->collCaentalms[] = $l;
		$l->setCatipent($this);
	}

} 