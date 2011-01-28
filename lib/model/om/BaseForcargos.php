<?php


abstract class BaseForcargos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcar;


	
	protected $nomcar;


	
	protected $suecar;


	
	protected $stacar;


	
	protected $codocp;


	
	protected $punmin;


	
	protected $graocp;


	
	protected $comcar;


	
	protected $pasocp;


	
	protected $codtip;


	
	protected $pricar;


	
	protected $canhom;


	
	protected $canmuj;


	
	protected $id;

	
	protected $collForprocars;

	
	protected $lastForprocarCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getNomcar()
  {

    return trim($this->nomcar);

  }
  
  public function getSuecar($val=false)
  {

    if($val) return number_format($this->suecar,2,',','.');
    else return $this->suecar;

  }
  
  public function getStacar()
  {

    return trim($this->stacar);

  }
  
  public function getCodocp()
  {

    return trim($this->codocp);

  }
  
  public function getPunmin($val=false)
  {

    if($val) return number_format($this->punmin,2,',','.');
    else return $this->punmin;

  }
  
  public function getGraocp()
  {

    return trim($this->graocp);

  }
  
  public function getComcar($val=false)
  {

    if($val) return number_format($this->comcar,2,',','.');
    else return $this->comcar;

  }
  
  public function getPasocp()
  {

    return trim($this->pasocp);

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getPricar($val=false)
  {

    if($val) return number_format($this->pricar,2,',','.');
    else return $this->pricar;

  }
  
  public function getCanhom($val=false)
  {

    if($val) return number_format($this->canhom,2,',','.');
    else return $this->canhom;

  }
  
  public function getCanmuj($val=false)
  {

    if($val) return number_format($this->canmuj,2,',','.');
    else return $this->canmuj;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = ForcargosPeer::CODCAR;
      }
  
	} 
	
	public function setNomcar($v)
	{

    if ($this->nomcar !== $v) {
        $this->nomcar = $v;
        $this->modifiedColumns[] = ForcargosPeer::NOMCAR;
      }
  
	} 
	
	public function setSuecar($v)
	{

    if ($this->suecar !== $v) {
        $this->suecar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForcargosPeer::SUECAR;
      }
  
	} 
	
	public function setStacar($v)
	{

    if ($this->stacar !== $v) {
        $this->stacar = $v;
        $this->modifiedColumns[] = ForcargosPeer::STACAR;
      }
  
	} 
	
	public function setCodocp($v)
	{

    if ($this->codocp !== $v) {
        $this->codocp = $v;
        $this->modifiedColumns[] = ForcargosPeer::CODOCP;
      }
  
	} 
	
	public function setPunmin($v)
	{

    if ($this->punmin !== $v) {
        $this->punmin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForcargosPeer::PUNMIN;
      }
  
	} 
	
	public function setGraocp($v)
	{

    if ($this->graocp !== $v) {
        $this->graocp = $v;
        $this->modifiedColumns[] = ForcargosPeer::GRAOCP;
      }
  
	} 
	
	public function setComcar($v)
	{

    if ($this->comcar !== $v) {
        $this->comcar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForcargosPeer::COMCAR;
      }
  
	} 
	
	public function setPasocp($v)
	{

    if ($this->pasocp !== $v) {
        $this->pasocp = $v;
        $this->modifiedColumns[] = ForcargosPeer::PASOCP;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = ForcargosPeer::CODTIP;
      }
  
	} 
	
	public function setPricar($v)
	{

    if ($this->pricar !== $v) {
        $this->pricar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForcargosPeer::PRICAR;
      }
  
	} 
	
	public function setCanhom($v)
	{

    if ($this->canhom !== $v) {
        $this->canhom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForcargosPeer::CANHOM;
      }
  
	} 
	
	public function setCanmuj($v)
	{

    if ($this->canmuj !== $v) {
        $this->canmuj = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForcargosPeer::CANMUJ;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForcargosPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcar = $rs->getString($startcol + 0);

      $this->nomcar = $rs->getString($startcol + 1);

      $this->suecar = $rs->getFloat($startcol + 2);

      $this->stacar = $rs->getString($startcol + 3);

      $this->codocp = $rs->getString($startcol + 4);

      $this->punmin = $rs->getFloat($startcol + 5);

      $this->graocp = $rs->getString($startcol + 6);

      $this->comcar = $rs->getFloat($startcol + 7);

      $this->pasocp = $rs->getString($startcol + 8);

      $this->codtip = $rs->getString($startcol + 9);

      $this->pricar = $rs->getFloat($startcol + 10);

      $this->canhom = $rs->getFloat($startcol + 11);

      $this->canmuj = $rs->getFloat($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forcargos object", $e);
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
			$con = Propel::getConnection(ForcargosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForcargosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForcargosPeer::DATABASE_NAME);
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
					$pk = ForcargosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForcargosPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collForprocars !== null) {
				foreach($this->collForprocars as $referrerFK) {
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


			if (($retval = ForcargosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collForprocars !== null) {
					foreach($this->collForprocars as $referrerFK) {
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
		$pos = ForcargosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcar();
				break;
			case 1:
				return $this->getNomcar();
				break;
			case 2:
				return $this->getSuecar();
				break;
			case 3:
				return $this->getStacar();
				break;
			case 4:
				return $this->getCodocp();
				break;
			case 5:
				return $this->getPunmin();
				break;
			case 6:
				return $this->getGraocp();
				break;
			case 7:
				return $this->getComcar();
				break;
			case 8:
				return $this->getPasocp();
				break;
			case 9:
				return $this->getCodtip();
				break;
			case 10:
				return $this->getPricar();
				break;
			case 11:
				return $this->getCanhom();
				break;
			case 12:
				return $this->getCanmuj();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForcargosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcar(),
			$keys[1] => $this->getNomcar(),
			$keys[2] => $this->getSuecar(),
			$keys[3] => $this->getStacar(),
			$keys[4] => $this->getCodocp(),
			$keys[5] => $this->getPunmin(),
			$keys[6] => $this->getGraocp(),
			$keys[7] => $this->getComcar(),
			$keys[8] => $this->getPasocp(),
			$keys[9] => $this->getCodtip(),
			$keys[10] => $this->getPricar(),
			$keys[11] => $this->getCanhom(),
			$keys[12] => $this->getCanmuj(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForcargosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcar($value);
				break;
			case 1:
				$this->setNomcar($value);
				break;
			case 2:
				$this->setSuecar($value);
				break;
			case 3:
				$this->setStacar($value);
				break;
			case 4:
				$this->setCodocp($value);
				break;
			case 5:
				$this->setPunmin($value);
				break;
			case 6:
				$this->setGraocp($value);
				break;
			case 7:
				$this->setComcar($value);
				break;
			case 8:
				$this->setPasocp($value);
				break;
			case 9:
				$this->setCodtip($value);
				break;
			case 10:
				$this->setPricar($value);
				break;
			case 11:
				$this->setCanhom($value);
				break;
			case 12:
				$this->setCanmuj($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForcargosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSuecar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStacar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodocp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPunmin($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setGraocp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setComcar($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPasocp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodtip($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPricar($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCanhom($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCanmuj($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForcargosPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForcargosPeer::CODCAR)) $criteria->add(ForcargosPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(ForcargosPeer::NOMCAR)) $criteria->add(ForcargosPeer::NOMCAR, $this->nomcar);
		if ($this->isColumnModified(ForcargosPeer::SUECAR)) $criteria->add(ForcargosPeer::SUECAR, $this->suecar);
		if ($this->isColumnModified(ForcargosPeer::STACAR)) $criteria->add(ForcargosPeer::STACAR, $this->stacar);
		if ($this->isColumnModified(ForcargosPeer::CODOCP)) $criteria->add(ForcargosPeer::CODOCP, $this->codocp);
		if ($this->isColumnModified(ForcargosPeer::PUNMIN)) $criteria->add(ForcargosPeer::PUNMIN, $this->punmin);
		if ($this->isColumnModified(ForcargosPeer::GRAOCP)) $criteria->add(ForcargosPeer::GRAOCP, $this->graocp);
		if ($this->isColumnModified(ForcargosPeer::COMCAR)) $criteria->add(ForcargosPeer::COMCAR, $this->comcar);
		if ($this->isColumnModified(ForcargosPeer::PASOCP)) $criteria->add(ForcargosPeer::PASOCP, $this->pasocp);
		if ($this->isColumnModified(ForcargosPeer::CODTIP)) $criteria->add(ForcargosPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(ForcargosPeer::PRICAR)) $criteria->add(ForcargosPeer::PRICAR, $this->pricar);
		if ($this->isColumnModified(ForcargosPeer::CANHOM)) $criteria->add(ForcargosPeer::CANHOM, $this->canhom);
		if ($this->isColumnModified(ForcargosPeer::CANMUJ)) $criteria->add(ForcargosPeer::CANMUJ, $this->canmuj);
		if ($this->isColumnModified(ForcargosPeer::ID)) $criteria->add(ForcargosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForcargosPeer::DATABASE_NAME);

		$criteria->add(ForcargosPeer::ID, $this->id);

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

		$copyObj->setCodcar($this->codcar);

		$copyObj->setNomcar($this->nomcar);

		$copyObj->setSuecar($this->suecar);

		$copyObj->setStacar($this->stacar);

		$copyObj->setCodocp($this->codocp);

		$copyObj->setPunmin($this->punmin);

		$copyObj->setGraocp($this->graocp);

		$copyObj->setComcar($this->comcar);

		$copyObj->setPasocp($this->pasocp);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setPricar($this->pricar);

		$copyObj->setCanhom($this->canhom);

		$copyObj->setCanmuj($this->canmuj);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getForprocars() as $relObj) {
				$copyObj->addForprocar($relObj->copy($deepCopy));
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
			self::$peer = new ForcargosPeer();
		}
		return self::$peer;
	}

	
	public function initForprocars()
	{
		if ($this->collForprocars === null) {
			$this->collForprocars = array();
		}
	}

	
	public function getForprocars($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseForprocarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collForprocars === null) {
			if ($this->isNew()) {
			   $this->collForprocars = array();
			} else {

				$criteria->add(ForprocarPeer::CODCAR, $this->getCodcar());

				ForprocarPeer::addSelectColumns($criteria);
				$this->collForprocars = ForprocarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ForprocarPeer::CODCAR, $this->getCodcar());

				ForprocarPeer::addSelectColumns($criteria);
				if (!isset($this->lastForprocarCriteria) || !$this->lastForprocarCriteria->equals($criteria)) {
					$this->collForprocars = ForprocarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastForprocarCriteria = $criteria;
		return $this->collForprocars;
	}

	
	public function countForprocars($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseForprocarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ForprocarPeer::CODCAR, $this->getCodcar());

		return ForprocarPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addForprocar(Forprocar $l)
	{
		$this->collForprocars[] = $l;
		$l->setForcargos($this);
	}


	
	public function getForprocarsJoinNpprofesion($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseForprocarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collForprocars === null) {
			if ($this->isNew()) {
				$this->collForprocars = array();
			} else {

				$criteria->add(ForprocarPeer::CODCAR, $this->getCodcar());

				$this->collForprocars = ForprocarPeer::doSelectJoinNpprofesion($criteria, $con);
			}
		} else {
									
			$criteria->add(ForprocarPeer::CODCAR, $this->getCodcar());

			if (!isset($this->lastForprocarCriteria) || !$this->lastForprocarCriteria->equals($criteria)) {
				$this->collForprocars = ForprocarPeer::doSelectJoinNpprofesion($criteria, $con);
			}
		}
		$this->lastForprocarCriteria = $criteria;

		return $this->collForprocars;
	}

} 