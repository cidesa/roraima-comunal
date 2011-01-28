<?php


abstract class BaseAtmedico extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedrifmed;


	
	protected $nombremed;


	
	protected $apellimed;


	
	protected $dirhabmed;


	
	protected $dirtramed;


	
	protected $telunomed;


	
	protected $teldosmed;


	
	protected $nrocolmed;


	
	protected $id;

	
	protected $collAtayudass;

	
	protected $lastAtayudasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedrifmed()
  {

    return trim($this->cedrifmed);

  }
  
  public function getNombremed()
  {

    return trim($this->nombremed);

  }
  
  public function getApellimed()
  {

    return trim($this->apellimed);

  }
  
  public function getDirhabmed()
  {

    return trim($this->dirhabmed);

  }
  
  public function getDirtramed()
  {

    return trim($this->dirtramed);

  }
  
  public function getTelunomed()
  {

    return trim($this->telunomed);

  }
  
  public function getTeldosmed()
  {

    return trim($this->teldosmed);

  }
  
  public function getNrocolmed()
  {

    return trim($this->nrocolmed);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedrifmed($v)
	{

    if ($this->cedrifmed !== $v) {
        $this->cedrifmed = $v;
        $this->modifiedColumns[] = AtmedicoPeer::CEDRIFMED;
      }
  
	} 
	
	public function setNombremed($v)
	{

    if ($this->nombremed !== $v) {
        $this->nombremed = $v;
        $this->modifiedColumns[] = AtmedicoPeer::NOMBREMED;
      }
  
	} 
	
	public function setApellimed($v)
	{

    if ($this->apellimed !== $v) {
        $this->apellimed = $v;
        $this->modifiedColumns[] = AtmedicoPeer::APELLIMED;
      }
  
	} 
	
	public function setDirhabmed($v)
	{

    if ($this->dirhabmed !== $v) {
        $this->dirhabmed = $v;
        $this->modifiedColumns[] = AtmedicoPeer::DIRHABMED;
      }
  
	} 
	
	public function setDirtramed($v)
	{

    if ($this->dirtramed !== $v) {
        $this->dirtramed = $v;
        $this->modifiedColumns[] = AtmedicoPeer::DIRTRAMED;
      }
  
	} 
	
	public function setTelunomed($v)
	{

    if ($this->telunomed !== $v) {
        $this->telunomed = $v;
        $this->modifiedColumns[] = AtmedicoPeer::TELUNOMED;
      }
  
	} 
	
	public function setTeldosmed($v)
	{

    if ($this->teldosmed !== $v) {
        $this->teldosmed = $v;
        $this->modifiedColumns[] = AtmedicoPeer::TELDOSMED;
      }
  
	} 
	
	public function setNrocolmed($v)
	{

    if ($this->nrocolmed !== $v) {
        $this->nrocolmed = $v;
        $this->modifiedColumns[] = AtmedicoPeer::NROCOLMED;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtmedicoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedrifmed = $rs->getString($startcol + 0);

      $this->nombremed = $rs->getString($startcol + 1);

      $this->apellimed = $rs->getString($startcol + 2);

      $this->dirhabmed = $rs->getString($startcol + 3);

      $this->dirtramed = $rs->getString($startcol + 4);

      $this->telunomed = $rs->getString($startcol + 5);

      $this->teldosmed = $rs->getString($startcol + 6);

      $this->nrocolmed = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atmedico object", $e);
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
			$con = Propel::getConnection(AtmedicoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtmedicoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtmedicoPeer::DATABASE_NAME);
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
					$pk = AtmedicoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtmedicoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtayudass !== null) {
				foreach($this->collAtayudass as $referrerFK) {
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


			if (($retval = AtmedicoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtayudass !== null) {
					foreach($this->collAtayudass as $referrerFK) {
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
		$pos = AtmedicoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedrifmed();
				break;
			case 1:
				return $this->getNombremed();
				break;
			case 2:
				return $this->getApellimed();
				break;
			case 3:
				return $this->getDirhabmed();
				break;
			case 4:
				return $this->getDirtramed();
				break;
			case 5:
				return $this->getTelunomed();
				break;
			case 6:
				return $this->getTeldosmed();
				break;
			case 7:
				return $this->getNrocolmed();
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
		$keys = AtmedicoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedrifmed(),
			$keys[1] => $this->getNombremed(),
			$keys[2] => $this->getApellimed(),
			$keys[3] => $this->getDirhabmed(),
			$keys[4] => $this->getDirtramed(),
			$keys[5] => $this->getTelunomed(),
			$keys[6] => $this->getTeldosmed(),
			$keys[7] => $this->getNrocolmed(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtmedicoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedrifmed($value);
				break;
			case 1:
				$this->setNombremed($value);
				break;
			case 2:
				$this->setApellimed($value);
				break;
			case 3:
				$this->setDirhabmed($value);
				break;
			case 4:
				$this->setDirtramed($value);
				break;
			case 5:
				$this->setTelunomed($value);
				break;
			case 6:
				$this->setTeldosmed($value);
				break;
			case 7:
				$this->setNrocolmed($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtmedicoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedrifmed($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombremed($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApellimed($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDirhabmed($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDirtramed($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelunomed($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTeldosmed($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNrocolmed($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtmedicoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtmedicoPeer::CEDRIFMED)) $criteria->add(AtmedicoPeer::CEDRIFMED, $this->cedrifmed);
		if ($this->isColumnModified(AtmedicoPeer::NOMBREMED)) $criteria->add(AtmedicoPeer::NOMBREMED, $this->nombremed);
		if ($this->isColumnModified(AtmedicoPeer::APELLIMED)) $criteria->add(AtmedicoPeer::APELLIMED, $this->apellimed);
		if ($this->isColumnModified(AtmedicoPeer::DIRHABMED)) $criteria->add(AtmedicoPeer::DIRHABMED, $this->dirhabmed);
		if ($this->isColumnModified(AtmedicoPeer::DIRTRAMED)) $criteria->add(AtmedicoPeer::DIRTRAMED, $this->dirtramed);
		if ($this->isColumnModified(AtmedicoPeer::TELUNOMED)) $criteria->add(AtmedicoPeer::TELUNOMED, $this->telunomed);
		if ($this->isColumnModified(AtmedicoPeer::TELDOSMED)) $criteria->add(AtmedicoPeer::TELDOSMED, $this->teldosmed);
		if ($this->isColumnModified(AtmedicoPeer::NROCOLMED)) $criteria->add(AtmedicoPeer::NROCOLMED, $this->nrocolmed);
		if ($this->isColumnModified(AtmedicoPeer::ID)) $criteria->add(AtmedicoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtmedicoPeer::DATABASE_NAME);

		$criteria->add(AtmedicoPeer::ID, $this->id);

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

		$copyObj->setCedrifmed($this->cedrifmed);

		$copyObj->setNombremed($this->nombremed);

		$copyObj->setApellimed($this->apellimed);

		$copyObj->setDirhabmed($this->dirhabmed);

		$copyObj->setDirtramed($this->dirtramed);

		$copyObj->setTelunomed($this->telunomed);

		$copyObj->setTeldosmed($this->teldosmed);

		$copyObj->setNrocolmed($this->nrocolmed);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtayudass() as $relObj) {
				$copyObj->addAtayudas($relObj->copy($deepCopy));
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
			self::$peer = new AtmedicoPeer();
		}
		return self::$peer;
	}

	
	public function initAtayudass()
	{
		if ($this->collAtayudass === null) {
			$this->collAtayudass = array();
		}
	}

	
	public function getAtayudass($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
			   $this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				$this->collAtayudass = AtayudasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
					$this->collAtayudass = AtayudasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtayudasCriteria = $criteria;
		return $this->collAtayudass;
	}

	
	public function countAtayudass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

		return AtayudasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtayudas(Atayudas $l)
	{
		$this->collAtayudass[] = $l;
		$l->setAtmedico($this);
	}


	
	public function getAtayudassJoinCaordcom($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinCaordcom($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinCaordcom($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtpriayu($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtpriayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtpriayu($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtciudadanoRelatedByAtsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtsolici($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtciudadanoRelatedByAtbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtbenefi($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAttipayu($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtrubros($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtrubros($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtrubros($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtestayu($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAttrasoc($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtprovee($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtprovee($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtprovee($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtunidades($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtunidades($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATMEDICO_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtunidades($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}

} 