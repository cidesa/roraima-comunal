<?php


abstract class BaseCatusoesp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $desuso;


	
	protected $id;

	
	protected $collCatreginms;

	
	protected $lastCatreginmCriteria = null;

	
	protected $collCatusoespinms;

	
	protected $lastCatusoespinmCriteria = null;

	
	protected $collCatcosavals;

	
	protected $lastCatcosavalCriteria = null;

	
	protected $collCatdetavals;

	
	protected $lastCatdetavalCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDesuso()
  {

    return trim($this->desuso);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDesuso($v)
	{

    if ($this->desuso !== $v) {
        $this->desuso = $v;
        $this->modifiedColumns[] = CatusoespPeer::DESUSO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatusoespPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->desuso = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catusoesp object", $e);
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
			$con = Propel::getConnection(CatusoespPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatusoespPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatusoespPeer::DATABASE_NAME);
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
					$pk = CatusoespPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatusoespPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCatreginms !== null) {
				foreach($this->collCatreginms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatusoespinms !== null) {
				foreach($this->collCatusoespinms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatcosavals !== null) {
				foreach($this->collCatcosavals as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatdetavals !== null) {
				foreach($this->collCatdetavals as $referrerFK) {
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


			if (($retval = CatusoespPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCatreginms !== null) {
					foreach($this->collCatreginms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatusoespinms !== null) {
					foreach($this->collCatusoespinms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatcosavals !== null) {
					foreach($this->collCatcosavals as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatdetavals !== null) {
					foreach($this->collCatdetavals as $referrerFK) {
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
		$pos = CatusoespPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDesuso();
				break;
			case 1:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatusoespPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDesuso(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatusoespPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDesuso($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatusoespPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDesuso($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatusoespPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatusoespPeer::DESUSO)) $criteria->add(CatusoespPeer::DESUSO, $this->desuso);
		if ($this->isColumnModified(CatusoespPeer::ID)) $criteria->add(CatusoespPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatusoespPeer::DATABASE_NAME);

		$criteria->add(CatusoespPeer::ID, $this->id);

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

		$copyObj->setDesuso($this->desuso);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatreginms() as $relObj) {
				$copyObj->addCatreginm($relObj->copy($deepCopy));
			}

			foreach($this->getCatusoespinms() as $relObj) {
				$copyObj->addCatusoespinm($relObj->copy($deepCopy));
			}

			foreach($this->getCatcosavals() as $relObj) {
				$copyObj->addCatcosaval($relObj->copy($deepCopy));
			}

			foreach($this->getCatdetavals() as $relObj) {
				$copyObj->addCatdetaval($relObj->copy($deepCopy));
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
			self::$peer = new CatusoespPeer();
		}
		return self::$peer;
	}

	
	public function initCatreginms()
	{
		if ($this->collCatreginms === null) {
			$this->collCatreginms = array();
		}
	}

	
	public function getCatreginms($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
			   $this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				$this->collCatreginms = CatreginmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
					$this->collCatreginms = CatreginmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatreginmCriteria = $criteria;
		return $this->collCatreginms;
	}

	
	public function countCatreginms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

		return CatreginmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatreginm(Catreginm $l)
	{
		$this->collCatreginms[] = $l;
		$l->setCatusoesp($this);
	}


	
	public function getCatreginmsJoinCatsubprc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatprc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatprc($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatman($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatman($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatman($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatsec($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsec($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatpar($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatciu($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatest($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatest($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatbarurb($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCattramoRelatedByCattramofroId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramofroId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramofroId($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCattramoRelatedByCattramolatId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolatId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolatId($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCattramoRelatedByCattramolat2Id($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolat2Id($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolat2Id($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatcodpos($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCattipviv($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatconinm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatconsoc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatrut($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatcarterinm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatproter($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}

	
	public function initCatusoespinms()
	{
		if ($this->collCatusoespinms === null) {
			$this->collCatusoespinms = array();
		}
	}

	
	public function getCatusoespinms($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatusoespinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatusoespinms === null) {
			if ($this->isNew()) {
			   $this->collCatusoespinms = array();
			} else {

				$criteria->add(CatusoespinmPeer::CATUSOESP_ID, $this->getId());

				CatusoespinmPeer::addSelectColumns($criteria);
				$this->collCatusoespinms = CatusoespinmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatusoespinmPeer::CATUSOESP_ID, $this->getId());

				CatusoespinmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatusoespinmCriteria) || !$this->lastCatusoespinmCriteria->equals($criteria)) {
					$this->collCatusoespinms = CatusoespinmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatusoespinmCriteria = $criteria;
		return $this->collCatusoespinms;
	}

	
	public function countCatusoespinms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatusoespinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatusoespinmPeer::CATUSOESP_ID, $this->getId());

		return CatusoespinmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatusoespinm(Catusoespinm $l)
	{
		$this->collCatusoespinms[] = $l;
		$l->setCatusoesp($this);
	}


	
	public function getCatusoespinmsJoinCatreginm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatusoespinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatusoespinms === null) {
			if ($this->isNew()) {
				$this->collCatusoespinms = array();
			} else {

				$criteria->add(CatusoespinmPeer::CATUSOESP_ID, $this->getId());

				$this->collCatusoespinms = CatusoespinmPeer::doSelectJoinCatreginm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatusoespinmPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatusoespinmCriteria) || !$this->lastCatusoespinmCriteria->equals($criteria)) {
				$this->collCatusoespinms = CatusoespinmPeer::doSelectJoinCatreginm($criteria, $con);
			}
		}
		$this->lastCatusoespinmCriteria = $criteria;

		return $this->collCatusoespinms;
	}

	
	public function initCatcosavals()
	{
		if ($this->collCatcosavals === null) {
			$this->collCatcosavals = array();
		}
	}

	
	public function getCatcosavals($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatcosavalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatcosavals === null) {
			if ($this->isNew()) {
			   $this->collCatcosavals = array();
			} else {

				$criteria->add(CatcosavalPeer::CATUSOESP_ID, $this->getId());

				CatcosavalPeer::addSelectColumns($criteria);
				$this->collCatcosavals = CatcosavalPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatcosavalPeer::CATUSOESP_ID, $this->getId());

				CatcosavalPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatcosavalCriteria) || !$this->lastCatcosavalCriteria->equals($criteria)) {
					$this->collCatcosavals = CatcosavalPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatcosavalCriteria = $criteria;
		return $this->collCatcosavals;
	}

	
	public function countCatcosavals($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatcosavalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatcosavalPeer::CATUSOESP_ID, $this->getId());

		return CatcosavalPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatcosaval(Catcosaval $l)
	{
		$this->collCatcosavals[] = $l;
		$l->setCatusoesp($this);
	}

	
	public function initCatdetavals()
	{
		if ($this->collCatdetavals === null) {
			$this->collCatdetavals = array();
		}
	}

	
	public function getCatdetavals($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatdetavalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatdetavals === null) {
			if ($this->isNew()) {
			   $this->collCatdetavals = array();
			} else {

				$criteria->add(CatdetavalPeer::CATUSOESP_ID, $this->getId());

				CatdetavalPeer::addSelectColumns($criteria);
				$this->collCatdetavals = CatdetavalPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatdetavalPeer::CATUSOESP_ID, $this->getId());

				CatdetavalPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatdetavalCriteria) || !$this->lastCatdetavalCriteria->equals($criteria)) {
					$this->collCatdetavals = CatdetavalPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatdetavalCriteria = $criteria;
		return $this->collCatdetavals;
	}

	
	public function countCatdetavals($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatdetavalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatdetavalPeer::CATUSOESP_ID, $this->getId());

		return CatdetavalPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatdetaval(Catdetaval $l)
	{
		$this->collCatdetavals[] = $l;
		$l->setCatusoesp($this);
	}


	
	public function getCatdetavalsJoinCatdefaval($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatdetavalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatdetavals === null) {
			if ($this->isNew()) {
				$this->collCatdetavals = array();
			} else {

				$criteria->add(CatdetavalPeer::CATUSOESP_ID, $this->getId());

				$this->collCatdetavals = CatdetavalPeer::doSelectJoinCatdefaval($criteria, $con);
			}
		} else {
									
			$criteria->add(CatdetavalPeer::CATUSOESP_ID, $this->getId());

			if (!isset($this->lastCatdetavalCriteria) || !$this->lastCatdetavalCriteria->equals($criteria)) {
				$this->collCatdetavals = CatdetavalPeer::doSelectJoinCatdefaval($criteria, $con);
			}
		}
		$this->lastCatdetavalCriteria = $criteria;

		return $this->collCatdetavals;
	}

} 