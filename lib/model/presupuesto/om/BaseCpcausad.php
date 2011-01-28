<?php


abstract class BaseCpcausad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcau;


	
	protected $tipcau;


	
	protected $feccau;


	
	protected $anocau;


	
	protected $refcom;


	
	protected $tipcom;


	
	protected $descau;


	
	protected $desanu;


	
	protected $moncau;


	
	protected $salpag;


	
	protected $salaju;


	
	protected $stacau;


	
	protected $fecanu;


	
	protected $cedrif;


	
	protected $id;

	
	protected $aCpdoccau;

	
	protected $aCpcompro;

	
	protected $aOpbenefi;

	
	protected $collCpimpcaus;

	
	protected $lastCpimpcauCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefcau()
  {

    return trim($this->refcau);

  }
  
  public function getTipcau()
  {

    return trim($this->tipcau);

  }
  
  public function getFeccau($format = 'Y-m-d')
  {

    if ($this->feccau === null || $this->feccau === '') {
      return null;
    } elseif (!is_int($this->feccau)) {
            $ts = adodb_strtotime($this->feccau);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccau] as date/time value: " . var_export($this->feccau, true));
      }
    } else {
      $ts = $this->feccau;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnocau()
  {

    return trim($this->anocau);

  }
  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getDescau()
  {

    return trim($this->descau);

  }
  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getMoncau($val=false)
  {

    if($val) return number_format($this->moncau,2,',','.');
    else return $this->moncau;

  }
  
  public function getSalpag($val=false)
  {

    if($val) return number_format($this->salpag,2,',','.');
    else return $this->salpag;

  }
  
  public function getSalaju($val=false)
  {

    if($val) return number_format($this->salaju,2,',','.');
    else return $this->salaju;

  }
  
  public function getStacau()
  {

    return trim($this->stacau);

  }
  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefcau($v)
	{

    if ($this->refcau !== $v) {
        $this->refcau = $v;
        $this->modifiedColumns[] = CpcausadPeer::REFCAU;
      }
  
	} 
	
	public function setTipcau($v)
	{

    if ($this->tipcau !== $v) {
        $this->tipcau = $v;
        $this->modifiedColumns[] = CpcausadPeer::TIPCAU;
      }
  
		if ($this->aCpdoccau !== null && $this->aCpdoccau->getTipcau() !== $v) {
			$this->aCpdoccau = null;
		}

	} 
	
	public function setFeccau($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccau] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccau !== $ts) {
      $this->feccau = $ts;
      $this->modifiedColumns[] = CpcausadPeer::FECCAU;
    }

	} 
	
	public function setAnocau($v)
	{

    if ($this->anocau !== $v) {
        $this->anocau = $v;
        $this->modifiedColumns[] = CpcausadPeer::ANOCAU;
      }
  
	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = CpcausadPeer::REFCOM;
      }
  
		if ($this->aCpcompro !== null && $this->aCpcompro->getRefcom() !== $v) {
			$this->aCpcompro = null;
		}

	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = CpcausadPeer::TIPCOM;
      }
  
	} 
	
	public function setDescau($v)
	{

    if ($this->descau !== $v) {
        $this->descau = $v;
        $this->modifiedColumns[] = CpcausadPeer::DESCAU;
      }
  
	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CpcausadPeer::DESANU;
      }
  
	} 
	
	public function setMoncau($v)
	{

    if ($this->moncau !== $v) {
        $this->moncau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpcausadPeer::MONCAU;
      }
  
	} 
	
	public function setSalpag($v)
	{

    if ($this->salpag !== $v) {
        $this->salpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpcausadPeer::SALPAG;
      }
  
	} 
	
	public function setSalaju($v)
	{

    if ($this->salaju !== $v) {
        $this->salaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpcausadPeer::SALAJU;
      }
  
	} 
	
	public function setStacau($v)
	{

    if ($this->stacau !== $v) {
        $this->stacau = $v;
        $this->modifiedColumns[] = CpcausadPeer::STACAU;
      }
  
	} 
	
	public function setFecanu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = CpcausadPeer::FECANU;
    }

	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = CpcausadPeer::CEDRIF;
      }
  
		if ($this->aOpbenefi !== null && $this->aOpbenefi->getCedrif() !== $v) {
			$this->aOpbenefi = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpcausadPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refcau = $rs->getString($startcol + 0);

      $this->tipcau = $rs->getString($startcol + 1);

      $this->feccau = $rs->getDate($startcol + 2, null);

      $this->anocau = $rs->getString($startcol + 3);

      $this->refcom = $rs->getString($startcol + 4);

      $this->tipcom = $rs->getString($startcol + 5);

      $this->descau = $rs->getString($startcol + 6);

      $this->desanu = $rs->getString($startcol + 7);

      $this->moncau = $rs->getFloat($startcol + 8);

      $this->salpag = $rs->getFloat($startcol + 9);

      $this->salaju = $rs->getFloat($startcol + 10);

      $this->stacau = $rs->getString($startcol + 11);

      $this->fecanu = $rs->getDate($startcol + 12, null);

      $this->cedrif = $rs->getString($startcol + 13);

      $this->id = $rs->getInt($startcol + 14);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 15; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpcausad object", $e);
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
			$con = Propel::getConnection(CpcausadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpcausadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpcausadPeer::DATABASE_NAME);
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


												
			if ($this->aCpdoccau !== null) {
				if ($this->aCpdoccau->isModified()) {
					$affectedRows += $this->aCpdoccau->save($con);
				}
				$this->setCpdoccau($this->aCpdoccau);
			}

			if ($this->aCpcompro !== null) {
				if ($this->aCpcompro->isModified()) {
					$affectedRows += $this->aCpcompro->save($con);
				}
				$this->setCpcompro($this->aCpcompro);
			}

			if ($this->aOpbenefi !== null) {
				if ($this->aOpbenefi->isModified()) {
					$affectedRows += $this->aOpbenefi->save($con);
				}
				$this->setOpbenefi($this->aOpbenefi);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CpcausadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpcausadPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCpimpcaus !== null) {
				foreach($this->collCpimpcaus as $referrerFK) {
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


												
			if ($this->aCpdoccau !== null) {
				if (!$this->aCpdoccau->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpdoccau->getValidationFailures());
				}
			}

			if ($this->aCpcompro !== null) {
				if (!$this->aCpcompro->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpcompro->getValidationFailures());
				}
			}

			if ($this->aOpbenefi !== null) {
				if (!$this->aOpbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOpbenefi->getValidationFailures());
				}
			}


			if (($retval = CpcausadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCpimpcaus !== null) {
					foreach($this->collCpimpcaus as $referrerFK) {
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
		$pos = CpcausadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcau();
				break;
			case 1:
				return $this->getTipcau();
				break;
			case 2:
				return $this->getFeccau();
				break;
			case 3:
				return $this->getAnocau();
				break;
			case 4:
				return $this->getRefcom();
				break;
			case 5:
				return $this->getTipcom();
				break;
			case 6:
				return $this->getDescau();
				break;
			case 7:
				return $this->getDesanu();
				break;
			case 8:
				return $this->getMoncau();
				break;
			case 9:
				return $this->getSalpag();
				break;
			case 10:
				return $this->getSalaju();
				break;
			case 11:
				return $this->getStacau();
				break;
			case 12:
				return $this->getFecanu();
				break;
			case 13:
				return $this->getCedrif();
				break;
			case 14:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpcausadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcau(),
			$keys[1] => $this->getTipcau(),
			$keys[2] => $this->getFeccau(),
			$keys[3] => $this->getAnocau(),
			$keys[4] => $this->getRefcom(),
			$keys[5] => $this->getTipcom(),
			$keys[6] => $this->getDescau(),
			$keys[7] => $this->getDesanu(),
			$keys[8] => $this->getMoncau(),
			$keys[9] => $this->getSalpag(),
			$keys[10] => $this->getSalaju(),
			$keys[11] => $this->getStacau(),
			$keys[12] => $this->getFecanu(),
			$keys[13] => $this->getCedrif(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpcausadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcau($value);
				break;
			case 1:
				$this->setTipcau($value);
				break;
			case 2:
				$this->setFeccau($value);
				break;
			case 3:
				$this->setAnocau($value);
				break;
			case 4:
				$this->setRefcom($value);
				break;
			case 5:
				$this->setTipcom($value);
				break;
			case 6:
				$this->setDescau($value);
				break;
			case 7:
				$this->setDesanu($value);
				break;
			case 8:
				$this->setMoncau($value);
				break;
			case 9:
				$this->setSalpag($value);
				break;
			case 10:
				$this->setSalaju($value);
				break;
			case 11:
				$this->setStacau($value);
				break;
			case 12:
				$this->setFecanu($value);
				break;
			case 13:
				$this->setCedrif($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpcausadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcau($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipcau($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccau($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnocau($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefcom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipcom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDescau($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesanu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMoncau($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSalpag($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSalaju($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStacau($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCedrif($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpcausadPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpcausadPeer::REFCAU)) $criteria->add(CpcausadPeer::REFCAU, $this->refcau);
		if ($this->isColumnModified(CpcausadPeer::TIPCAU)) $criteria->add(CpcausadPeer::TIPCAU, $this->tipcau);
		if ($this->isColumnModified(CpcausadPeer::FECCAU)) $criteria->add(CpcausadPeer::FECCAU, $this->feccau);
		if ($this->isColumnModified(CpcausadPeer::ANOCAU)) $criteria->add(CpcausadPeer::ANOCAU, $this->anocau);
		if ($this->isColumnModified(CpcausadPeer::REFCOM)) $criteria->add(CpcausadPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(CpcausadPeer::TIPCOM)) $criteria->add(CpcausadPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(CpcausadPeer::DESCAU)) $criteria->add(CpcausadPeer::DESCAU, $this->descau);
		if ($this->isColumnModified(CpcausadPeer::DESANU)) $criteria->add(CpcausadPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CpcausadPeer::MONCAU)) $criteria->add(CpcausadPeer::MONCAU, $this->moncau);
		if ($this->isColumnModified(CpcausadPeer::SALPAG)) $criteria->add(CpcausadPeer::SALPAG, $this->salpag);
		if ($this->isColumnModified(CpcausadPeer::SALAJU)) $criteria->add(CpcausadPeer::SALAJU, $this->salaju);
		if ($this->isColumnModified(CpcausadPeer::STACAU)) $criteria->add(CpcausadPeer::STACAU, $this->stacau);
		if ($this->isColumnModified(CpcausadPeer::FECANU)) $criteria->add(CpcausadPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CpcausadPeer::CEDRIF)) $criteria->add(CpcausadPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CpcausadPeer::ID)) $criteria->add(CpcausadPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpcausadPeer::DATABASE_NAME);

		$criteria->add(CpcausadPeer::ID, $this->id);

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

		$copyObj->setRefcau($this->refcau);

		$copyObj->setTipcau($this->tipcau);

		$copyObj->setFeccau($this->feccau);

		$copyObj->setAnocau($this->anocau);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setDescau($this->descau);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setMoncau($this->moncau);

		$copyObj->setSalpag($this->salpag);

		$copyObj->setSalaju($this->salaju);

		$copyObj->setStacau($this->stacau);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCedrif($this->cedrif);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCpimpcaus() as $relObj) {
				$copyObj->addCpimpcau($relObj->copy($deepCopy));
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
			self::$peer = new CpcausadPeer();
		}
		return self::$peer;
	}

	
	public function setCpdoccau($v)
	{


		if ($v === null) {
			$this->setTipcau(NULL);
		} else {
			$this->setTipcau($v->getTipcau());
		}


		$this->aCpdoccau = $v;
	}


	
	public function getCpdoccau($con = null)
	{
		if ($this->aCpdoccau === null && (($this->tipcau !== "" && $this->tipcau !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCpdoccauPeer.php';

      $c = new Criteria();
      $c->add(CpdoccauPeer::TIPCAU,$this->tipcau);
      
			$this->aCpdoccau = CpdoccauPeer::doSelectOne($c, $con);

			
		}
		return $this->aCpdoccau;
	}

	
	public function setCpcompro($v)
	{


		if ($v === null) {
			$this->setRefcom(NULL);
		} else {
			$this->setRefcom($v->getRefcom());
		}


		$this->aCpcompro = $v;
	}


	
	public function getCpcompro($con = null)
	{
		if ($this->aCpcompro === null && (($this->refcom !== "" && $this->refcom !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCpcomproPeer.php';

      $c = new Criteria();
      $c->add(CpcomproPeer::REFCOM,$this->refcom);
      
			$this->aCpcompro = CpcomproPeer::doSelectOne($c, $con);

			
		}
		return $this->aCpcompro;
	}

	
	public function setOpbenefi($v)
	{


		if ($v === null) {
			$this->setCedrif(NULL);
		} else {
			$this->setCedrif($v->getCedrif());
		}


		$this->aOpbenefi = $v;
	}


	
	public function getOpbenefi($con = null)
	{
		if ($this->aOpbenefi === null && (($this->cedrif !== "" && $this->cedrif !== null))) {
						include_once 'lib/model/om/BaseOpbenefiPeer.php';

      $c = new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$this->cedrif);
      
			$this->aOpbenefi = OpbenefiPeer::doSelectOne($c, $con);

			
		}
		return $this->aOpbenefi;
	}

	
	public function initCpimpcaus()
	{
		if ($this->collCpimpcaus === null) {
			$this->collCpimpcaus = array();
		}
	}

	
	public function getCpimpcaus($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpimpcauPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpimpcaus === null) {
			if ($this->isNew()) {
			   $this->collCpimpcaus = array();
			} else {

				$criteria->add(CpimpcauPeer::REFCAU, $this->getRefcau());

				CpimpcauPeer::addSelectColumns($criteria);
				$this->collCpimpcaus = CpimpcauPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpimpcauPeer::REFCAU, $this->getRefcau());

				CpimpcauPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpimpcauCriteria) || !$this->lastCpimpcauCriteria->equals($criteria)) {
					$this->collCpimpcaus = CpimpcauPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpimpcauCriteria = $criteria;
		return $this->collCpimpcaus;
	}

	
	public function countCpimpcaus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpimpcauPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpimpcauPeer::REFCAU, $this->getRefcau());

		return CpimpcauPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpimpcau(Cpimpcau $l)
	{
		$this->collCpimpcaus[] = $l;
		$l->setCpcausad($this);
	}

} 