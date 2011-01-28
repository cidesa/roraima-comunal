<?php


abstract class BaseRhevaempobj extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codevdo;


	
	protected $codniv;


	
	protected $codobj;


	
	protected $plaobj;


	
	protected $alcobj;


	
	protected $pesobj;


	
	protected $punobj;


	
	protected $feceval;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodevdo()
  {

    return trim($this->codevdo);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getCodobj()
  {

    return trim($this->codobj);

  }
  
  public function getPlaobj($val=false)
  {

    if($val) return number_format($this->plaobj,2,',','.');
    else return $this->plaobj;

  }
  
  public function getAlcobj($val=false)
  {

    if($val) return number_format($this->alcobj,2,',','.');
    else return $this->alcobj;

  }
  
  public function getPesobj($val=false)
  {

    if($val) return number_format($this->pesobj,2,',','.');
    else return $this->pesobj;

  }
  
  public function getPunobj($val=false)
  {

    if($val) return number_format($this->punobj,2,',','.');
    else return $this->punobj;

  }
  
  public function getFeceval($format = 'Y-m-d')
  {

    if ($this->feceval === null || $this->feceval === '') {
      return null;
    } elseif (!is_int($this->feceval)) {
            $ts = adodb_strtotime($this->feceval);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feceval] as date/time value: " . var_export($this->feceval, true));
      }
    } else {
      $ts = $this->feceval;
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
	
	public function setCodevdo($v)
	{

    if ($this->codevdo !== $v) {
        $this->codevdo = $v;
        $this->modifiedColumns[] = RhevaempobjPeer::CODEVDO;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = RhevaempobjPeer::CODNIV;
      }
  
	} 
	
	public function setCodobj($v)
	{

    if ($this->codobj !== $v) {
        $this->codobj = $v;
        $this->modifiedColumns[] = RhevaempobjPeer::CODOBJ;
      }
  
	} 
	
	public function setPlaobj($v)
	{

    if ($this->plaobj !== $v) {
        $this->plaobj = Herramientas::toFloat($v);
        $this->modifiedColumns[] = RhevaempobjPeer::PLAOBJ;
      }
  
	} 
	
	public function setAlcobj($v)
	{

    if ($this->alcobj !== $v) {
        $this->alcobj = Herramientas::toFloat($v);
        $this->modifiedColumns[] = RhevaempobjPeer::ALCOBJ;
      }
  
	} 
	
	public function setPesobj($v)
	{

    if ($this->pesobj !== $v) {
        $this->pesobj = Herramientas::toFloat($v);
        $this->modifiedColumns[] = RhevaempobjPeer::PESOBJ;
      }
  
	} 
	
	public function setPunobj($v)
	{

    if ($this->punobj !== $v) {
        $this->punobj = Herramientas::toFloat($v);
        $this->modifiedColumns[] = RhevaempobjPeer::PUNOBJ;
      }
  
	} 
	
	public function setFeceval($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feceval] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feceval !== $ts) {
      $this->feceval = $ts;
      $this->modifiedColumns[] = RhevaempobjPeer::FECEVAL;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RhevaempobjPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codevdo = $rs->getString($startcol + 0);

      $this->codniv = $rs->getString($startcol + 1);

      $this->codobj = $rs->getString($startcol + 2);

      $this->plaobj = $rs->getFloat($startcol + 3);

      $this->alcobj = $rs->getFloat($startcol + 4);

      $this->pesobj = $rs->getFloat($startcol + 5);

      $this->punobj = $rs->getFloat($startcol + 6);

      $this->feceval = $rs->getDate($startcol + 7, null);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Rhevaempobj object", $e);
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
			$con = Propel::getConnection(RhevaempobjPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhevaempobjPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhevaempobjPeer::DATABASE_NAME);
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
					$pk = RhevaempobjPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RhevaempobjPeer::doUpdate($this, $con);
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


			if (($retval = RhevaempobjPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhevaempobjPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodevdo();
				break;
			case 1:
				return $this->getCodniv();
				break;
			case 2:
				return $this->getCodobj();
				break;
			case 3:
				return $this->getPlaobj();
				break;
			case 4:
				return $this->getAlcobj();
				break;
			case 5:
				return $this->getPesobj();
				break;
			case 6:
				return $this->getPunobj();
				break;
			case 7:
				return $this->getFeceval();
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
		$keys = RhevaempobjPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodevdo(),
			$keys[1] => $this->getCodniv(),
			$keys[2] => $this->getCodobj(),
			$keys[3] => $this->getPlaobj(),
			$keys[4] => $this->getAlcobj(),
			$keys[5] => $this->getPesobj(),
			$keys[6] => $this->getPunobj(),
			$keys[7] => $this->getFeceval(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhevaempobjPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodevdo($value);
				break;
			case 1:
				$this->setCodniv($value);
				break;
			case 2:
				$this->setCodobj($value);
				break;
			case 3:
				$this->setPlaobj($value);
				break;
			case 4:
				$this->setAlcobj($value);
				break;
			case 5:
				$this->setPesobj($value);
				break;
			case 6:
				$this->setPunobj($value);
				break;
			case 7:
				$this->setFeceval($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhevaempobjPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodevdo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodniv($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodobj($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPlaobj($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAlcobj($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPesobj($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPunobj($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFeceval($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhevaempobjPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhevaempobjPeer::CODEVDO)) $criteria->add(RhevaempobjPeer::CODEVDO, $this->codevdo);
		if ($this->isColumnModified(RhevaempobjPeer::CODNIV)) $criteria->add(RhevaempobjPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(RhevaempobjPeer::CODOBJ)) $criteria->add(RhevaempobjPeer::CODOBJ, $this->codobj);
		if ($this->isColumnModified(RhevaempobjPeer::PLAOBJ)) $criteria->add(RhevaempobjPeer::PLAOBJ, $this->plaobj);
		if ($this->isColumnModified(RhevaempobjPeer::ALCOBJ)) $criteria->add(RhevaempobjPeer::ALCOBJ, $this->alcobj);
		if ($this->isColumnModified(RhevaempobjPeer::PESOBJ)) $criteria->add(RhevaempobjPeer::PESOBJ, $this->pesobj);
		if ($this->isColumnModified(RhevaempobjPeer::PUNOBJ)) $criteria->add(RhevaempobjPeer::PUNOBJ, $this->punobj);
		if ($this->isColumnModified(RhevaempobjPeer::FECEVAL)) $criteria->add(RhevaempobjPeer::FECEVAL, $this->feceval);
		if ($this->isColumnModified(RhevaempobjPeer::ID)) $criteria->add(RhevaempobjPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhevaempobjPeer::DATABASE_NAME);

		$criteria->add(RhevaempobjPeer::ID, $this->id);

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

		$copyObj->setCodevdo($this->codevdo);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setCodobj($this->codobj);

		$copyObj->setPlaobj($this->plaobj);

		$copyObj->setAlcobj($this->alcobj);

		$copyObj->setPesobj($this->pesobj);

		$copyObj->setPunobj($this->punobj);

		$copyObj->setFeceval($this->feceval);


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
			self::$peer = new RhevaempobjPeer();
		}
		return self::$peer;
	}

} 