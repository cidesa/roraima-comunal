<?php


abstract class BaseCaartalmubi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codalm;


	
	protected $codart;


	
	protected $codubi;


	
	protected $exiact;


	
	protected $numlot;


	
	protected $fecela;


	
	protected $fecven;


	
	protected $id;

	
	protected $aCadefubi;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getExiact($val=false)
  {

    if($val) return number_format($this->exiact,2,',','.');
    else return $this->exiact;

  }
  
  public function getNumlot()
  {

    return trim($this->numlot);

  }
  
  public function getFecela($format = 'Y-m-d')
  {

    if ($this->fecela === null || $this->fecela === '') {
      return null;
    } elseif (!is_int($this->fecela)) {
            $ts = adodb_strtotime($this->fecela);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecela] as date/time value: " . var_export($this->fecela, true));
      }
    } else {
      $ts = $this->fecela;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CaartalmubiPeer::CODALM;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CaartalmubiPeer::CODART;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = CaartalmubiPeer::CODUBI;
      }
  
		if ($this->aCadefubi !== null && $this->aCadefubi->getCodubi() !== $v) {
			$this->aCadefubi = null;
		}

	} 
	
	public function setExiact($v)
	{

    if ($this->exiact !== $v) {
        $this->exiact = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaartalmubiPeer::EXIACT;
      }
  
	} 
	
	public function setNumlot($v)
	{

    if ($this->numlot !== $v) {
        $this->numlot = $v;
        $this->modifiedColumns[] = CaartalmubiPeer::NUMLOT;
      }
  
	} 
	
	public function setFecela($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecela] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecela !== $ts) {
      $this->fecela = $ts;
      $this->modifiedColumns[] = CaartalmubiPeer::FECELA;
    }

	} 
	
	public function setFecven($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = CaartalmubiPeer::FECVEN;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CaartalmubiPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codalm = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codubi = $rs->getString($startcol + 2);

      $this->exiact = $rs->getFloat($startcol + 3);

      $this->numlot = $rs->getString($startcol + 4);

      $this->fecela = $rs->getDate($startcol + 5, null);

      $this->fecven = $rs->getDate($startcol + 6, null);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Caartalmubi object", $e);
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
			$con = Propel::getConnection(CaartalmubiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaartalmubiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaartalmubiPeer::DATABASE_NAME);
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


												
			if ($this->aCadefubi !== null) {
				if ($this->aCadefubi->isModified()) {
					$affectedRows += $this->aCadefubi->save($con);
				}
				$this->setCadefubi($this->aCadefubi);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CaartalmubiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CaartalmubiPeer::doUpdate($this, $con);
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


												
			if ($this->aCadefubi !== null) {
				if (!$this->aCadefubi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCadefubi->getValidationFailures());
				}
			}


			if (($retval = CaartalmubiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartalmubiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodalm();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodubi();
				break;
			case 3:
				return $this->getExiact();
				break;
			case 4:
				return $this->getNumlot();
				break;
			case 5:
				return $this->getFecela();
				break;
			case 6:
				return $this->getFecven();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartalmubiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodalm(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodubi(),
			$keys[3] => $this->getExiact(),
			$keys[4] => $this->getNumlot(),
			$keys[5] => $this->getFecela(),
			$keys[6] => $this->getFecven(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartalmubiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodalm($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodubi($value);
				break;
			case 3:
				$this->setExiact($value);
				break;
			case 4:
				$this->setNumlot($value);
				break;
			case 5:
				$this->setFecela($value);
				break;
			case 6:
				$this->setFecven($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartalmubiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodalm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodubi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setExiact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumlot($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecela($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecven($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaartalmubiPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaartalmubiPeer::CODALM)) $criteria->add(CaartalmubiPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CaartalmubiPeer::CODART)) $criteria->add(CaartalmubiPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaartalmubiPeer::CODUBI)) $criteria->add(CaartalmubiPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(CaartalmubiPeer::EXIACT)) $criteria->add(CaartalmubiPeer::EXIACT, $this->exiact);
		if ($this->isColumnModified(CaartalmubiPeer::NUMLOT)) $criteria->add(CaartalmubiPeer::NUMLOT, $this->numlot);
		if ($this->isColumnModified(CaartalmubiPeer::FECELA)) $criteria->add(CaartalmubiPeer::FECELA, $this->fecela);
		if ($this->isColumnModified(CaartalmubiPeer::FECVEN)) $criteria->add(CaartalmubiPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(CaartalmubiPeer::ID)) $criteria->add(CaartalmubiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaartalmubiPeer::DATABASE_NAME);

		$criteria->add(CaartalmubiPeer::ID, $this->id);

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

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setExiact($this->exiact);

		$copyObj->setNumlot($this->numlot);

		$copyObj->setFecela($this->fecela);

		$copyObj->setFecven($this->fecven);


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
			self::$peer = new CaartalmubiPeer();
		}
		return self::$peer;
	}

	
	public function setCadefubi($v)
	{


		if ($v === null) {
			$this->setCodubi(NULL);
		} else {
			$this->setCodubi($v->getCodubi());
		}


		$this->aCadefubi = $v;
	}


	
	public function getCadefubi($con = null)
	{
		if ($this->aCadefubi === null && (($this->codubi !== "" && $this->codubi !== null))) {
						include_once 'lib/model/om/BaseCadefubiPeer.php';

      $c = new Criteria();
      $c->add(CadefubiPeer::CODUBI,$this->codubi);
      
			$this->aCadefubi = CadefubiPeer::doSelectOne($c, $con);

			
		}
		return $this->aCadefubi;
	}

} 
