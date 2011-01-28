<?php


abstract class BaseCpdoccom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipcom;


	
	protected $nomext;


	
	protected $nomabr;


	
	protected $refprc;


	
	protected $afeprc;


	
	protected $afecom;


	
	protected $afedis;


	
	protected $reqaut;


	
	protected $id;

	
	protected $collCpcompros;

	
	protected $lastCpcomproCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getNomext()
  {

    return trim($this->nomext);

  }
  
  public function getNomabr()
  {

    return trim($this->nomabr);

  }
  
  public function getRefprc()
  {

    return trim($this->refprc);

  }
  
  public function getAfeprc()
  {

    return trim($this->afeprc);

  }
  
  public function getAfecom()
  {

    return trim($this->afecom);

  }
  
  public function getAfedis()
  {

    return trim($this->afedis);

  }
  
  public function getReqaut()
  {

    return trim($this->reqaut);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = CpdoccomPeer::TIPCOM;
      }
  
	} 
	
	public function setNomext($v)
	{

    if ($this->nomext !== $v) {
        $this->nomext = $v;
        $this->modifiedColumns[] = CpdoccomPeer::NOMEXT;
      }
  
	} 
	
	public function setNomabr($v)
	{

    if ($this->nomabr !== $v) {
        $this->nomabr = $v;
        $this->modifiedColumns[] = CpdoccomPeer::NOMABR;
      }
  
	} 
	
	public function setRefprc($v)
	{

    if ($this->refprc !== $v) {
        $this->refprc = $v;
        $this->modifiedColumns[] = CpdoccomPeer::REFPRC;
      }
  
	} 
	
	public function setAfeprc($v)
	{

    if ($this->afeprc !== $v) {
        $this->afeprc = $v;
        $this->modifiedColumns[] = CpdoccomPeer::AFEPRC;
      }
  
	} 
	
	public function setAfecom($v)
	{

    if ($this->afecom !== $v) {
        $this->afecom = $v;
        $this->modifiedColumns[] = CpdoccomPeer::AFECOM;
      }
  
	} 
	
	public function setAfedis($v)
	{

    if ($this->afedis !== $v) {
        $this->afedis = $v;
        $this->modifiedColumns[] = CpdoccomPeer::AFEDIS;
      }
  
	} 
	
	public function setReqaut($v)
	{

    if ($this->reqaut !== $v) {
        $this->reqaut = $v;
        $this->modifiedColumns[] = CpdoccomPeer::REQAUT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpdoccomPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tipcom = $rs->getString($startcol + 0);

      $this->nomext = $rs->getString($startcol + 1);

      $this->nomabr = $rs->getString($startcol + 2);

      $this->refprc = $rs->getString($startcol + 3);

      $this->afeprc = $rs->getString($startcol + 4);

      $this->afecom = $rs->getString($startcol + 5);

      $this->afedis = $rs->getString($startcol + 6);

      $this->reqaut = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpdoccom object", $e);
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
			$con = Propel::getConnection(CpdoccomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpdoccomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpdoccomPeer::DATABASE_NAME);
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
					$pk = CpdoccomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpdoccomPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCpcompros !== null) {
				foreach($this->collCpcompros as $referrerFK) {
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


			if (($retval = CpdoccomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCpcompros !== null) {
					foreach($this->collCpcompros as $referrerFK) {
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
		$pos = CpdoccomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipcom();
				break;
			case 1:
				return $this->getNomext();
				break;
			case 2:
				return $this->getNomabr();
				break;
			case 3:
				return $this->getRefprc();
				break;
			case 4:
				return $this->getAfeprc();
				break;
			case 5:
				return $this->getAfecom();
				break;
			case 6:
				return $this->getAfedis();
				break;
			case 7:
				return $this->getReqaut();
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
		$keys = CpdoccomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipcom(),
			$keys[1] => $this->getNomext(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getRefprc(),
			$keys[4] => $this->getAfeprc(),
			$keys[5] => $this->getAfecom(),
			$keys[6] => $this->getAfedis(),
			$keys[7] => $this->getReqaut(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdoccomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipcom($value);
				break;
			case 1:
				$this->setNomext($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setRefprc($value);
				break;
			case 4:
				$this->setAfeprc($value);
				break;
			case 5:
				$this->setAfecom($value);
				break;
			case 6:
				$this->setAfedis($value);
				break;
			case 7:
				$this->setReqaut($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdoccomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomext($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefprc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAfeprc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAfecom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAfedis($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setReqaut($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpdoccomPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpdoccomPeer::TIPCOM)) $criteria->add(CpdoccomPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(CpdoccomPeer::NOMEXT)) $criteria->add(CpdoccomPeer::NOMEXT, $this->nomext);
		if ($this->isColumnModified(CpdoccomPeer::NOMABR)) $criteria->add(CpdoccomPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(CpdoccomPeer::REFPRC)) $criteria->add(CpdoccomPeer::REFPRC, $this->refprc);
		if ($this->isColumnModified(CpdoccomPeer::AFEPRC)) $criteria->add(CpdoccomPeer::AFEPRC, $this->afeprc);
		if ($this->isColumnModified(CpdoccomPeer::AFECOM)) $criteria->add(CpdoccomPeer::AFECOM, $this->afecom);
		if ($this->isColumnModified(CpdoccomPeer::AFEDIS)) $criteria->add(CpdoccomPeer::AFEDIS, $this->afedis);
		if ($this->isColumnModified(CpdoccomPeer::REQAUT)) $criteria->add(CpdoccomPeer::REQAUT, $this->reqaut);
		if ($this->isColumnModified(CpdoccomPeer::ID)) $criteria->add(CpdoccomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpdoccomPeer::DATABASE_NAME);

		$criteria->add(CpdoccomPeer::ID, $this->id);

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

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setNomext($this->nomext);

		$copyObj->setNomabr($this->nomabr);

		$copyObj->setRefprc($this->refprc);

		$copyObj->setAfeprc($this->afeprc);

		$copyObj->setAfecom($this->afecom);

		$copyObj->setAfedis($this->afedis);

		$copyObj->setReqaut($this->reqaut);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCpcompros() as $relObj) {
				$copyObj->addCpcompro($relObj->copy($deepCopy));
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
			self::$peer = new CpdoccomPeer();
		}
		return self::$peer;
	}

	
	public function initCpcompros()
	{
		if ($this->collCpcompros === null) {
			$this->collCpcompros = array();
		}
	}

	
	public function getCpcompros($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpcomproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpcompros === null) {
			if ($this->isNew()) {
			   $this->collCpcompros = array();
			} else {

				$criteria->add(CpcomproPeer::TIPCOM, $this->getTipcom());

				CpcomproPeer::addSelectColumns($criteria);
				$this->collCpcompros = CpcomproPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpcomproPeer::TIPCOM, $this->getTipcom());

				CpcomproPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpcomproCriteria) || !$this->lastCpcomproCriteria->equals($criteria)) {
					$this->collCpcompros = CpcomproPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpcomproCriteria = $criteria;
		return $this->collCpcompros;
	}

	
	public function countCpcompros($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpcomproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpcomproPeer::TIPCOM, $this->getTipcom());

		return CpcomproPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpcompro(Cpcompro $l)
	{
		$this->collCpcompros[] = $l;
		$l->setCpdoccom($this);
	}


	
	public function getCpcomprosJoinCpprecom($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpcomproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpcompros === null) {
			if ($this->isNew()) {
				$this->collCpcompros = array();
			} else {

				$criteria->add(CpcomproPeer::TIPCOM, $this->getTipcom());

				$this->collCpcompros = CpcomproPeer::doSelectJoinCpprecom($criteria, $con);
			}
		} else {
									
			$criteria->add(CpcomproPeer::TIPCOM, $this->getTipcom());

			if (!isset($this->lastCpcomproCriteria) || !$this->lastCpcomproCriteria->equals($criteria)) {
				$this->collCpcompros = CpcomproPeer::doSelectJoinCpprecom($criteria, $con);
			}
		}
		$this->lastCpcomproCriteria = $criteria;

		return $this->collCpcompros;
	}


	
	public function getCpcomprosJoinOpbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpcomproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpcompros === null) {
			if ($this->isNew()) {
				$this->collCpcompros = array();
			} else {

				$criteria->add(CpcomproPeer::TIPCOM, $this->getTipcom());

				$this->collCpcompros = CpcomproPeer::doSelectJoinOpbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CpcomproPeer::TIPCOM, $this->getTipcom());

			if (!isset($this->lastCpcomproCriteria) || !$this->lastCpcomproCriteria->equals($criteria)) {
				$this->collCpcompros = CpcomproPeer::doSelectJoinOpbenefi($criteria, $con);
			}
		}
		$this->lastCpcomproCriteria = $criteria;

		return $this->collCpcompros;
	}

} 