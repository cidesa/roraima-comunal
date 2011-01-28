<?php


abstract class BaseNpinfcur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $nomtit;


	
	protected $descur;


	
	protected $instit;


	
	protected $durcur;


	
	protected $anocul;


	
	protected $codprofes;


	
	protected $activo;


	
	protected $fecenttit;


	
	protected $fecini;


	
	protected $fecfin;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getNomtit()
  {

    return trim($this->nomtit);

  }
  
  public function getDescur()
  {

    return trim($this->descur);

  }
  
  public function getInstit()
  {

    return trim($this->instit);

  }
  
  public function getDurcur()
  {

    return trim($this->durcur);

  }
  
  public function getAnocul()
  {

    return trim($this->anocul);

  }
  
  public function getCodprofes()
  {

    return trim($this->codprofes);

  }
  
  public function getActivo()
  {

    return trim($this->activo);

  }
  
  public function getFecenttit($format = 'Y-m-d')
  {

    if ($this->fecenttit === null || $this->fecenttit === '') {
      return null;
    } elseif (!is_int($this->fecenttit)) {
            $ts = adodb_strtotime($this->fecenttit);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecenttit] as date/time value: " . var_export($this->fecenttit, true));
      }
    } else {
      $ts = $this->fecenttit;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecfin($format = 'Y-m-d')
  {

    if ($this->fecfin === null || $this->fecfin === '') {
      return null;
    } elseif (!is_int($this->fecfin)) {
            $ts = adodb_strtotime($this->fecfin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfin] as date/time value: " . var_export($this->fecfin, true));
      }
    } else {
      $ts = $this->fecfin;
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
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpinfcurPeer::CODEMP;
      }
  
	} 
	
	public function setNomtit($v)
	{

    if ($this->nomtit !== $v) {
        $this->nomtit = $v;
        $this->modifiedColumns[] = NpinfcurPeer::NOMTIT;
      }
  
	} 
	
	public function setDescur($v)
	{

    if ($this->descur !== $v) {
        $this->descur = $v;
        $this->modifiedColumns[] = NpinfcurPeer::DESCUR;
      }
  
	} 
	
	public function setInstit($v)
	{

    if ($this->instit !== $v) {
        $this->instit = $v;
        $this->modifiedColumns[] = NpinfcurPeer::INSTIT;
      }
  
	} 
	
	public function setDurcur($v)
	{

    if ($this->durcur !== $v) {
        $this->durcur = $v;
        $this->modifiedColumns[] = NpinfcurPeer::DURCUR;
      }
  
	} 
	
	public function setAnocul($v)
	{

    if ($this->anocul !== $v) {
        $this->anocul = $v;
        $this->modifiedColumns[] = NpinfcurPeer::ANOCUL;
      }
  
	} 
	
	public function setCodprofes($v)
	{

    if ($this->codprofes !== $v) {
        $this->codprofes = $v;
        $this->modifiedColumns[] = NpinfcurPeer::CODPROFES;
      }
  
	} 
	
	public function setActivo($v)
	{

    if ($this->activo !== $v) {
        $this->activo = $v;
        $this->modifiedColumns[] = NpinfcurPeer::ACTIVO;
      }
  
	} 
	
	public function setFecenttit($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecenttit] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecenttit !== $ts) {
      $this->fecenttit = $ts;
      $this->modifiedColumns[] = NpinfcurPeer::FECENTTIT;
    }

	} 
	
	public function setFecini($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = NpinfcurPeer::FECINI;
    }

	} 
	
	public function setFecfin($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfin !== $ts) {
      $this->fecfin = $ts;
      $this->modifiedColumns[] = NpinfcurPeer::FECFIN;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinfcurPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->nomtit = $rs->getString($startcol + 1);

      $this->descur = $rs->getString($startcol + 2);

      $this->instit = $rs->getString($startcol + 3);

      $this->durcur = $rs->getString($startcol + 4);

      $this->anocul = $rs->getString($startcol + 5);

      $this->codprofes = $rs->getString($startcol + 6);

      $this->activo = $rs->getString($startcol + 7);

      $this->fecenttit = $rs->getDate($startcol + 8, null);

      $this->fecini = $rs->getDate($startcol + 9, null);

      $this->fecfin = $rs->getDate($startcol + 10, null);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinfcur object", $e);
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
			$con = Propel::getConnection(NpinfcurPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinfcurPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinfcurPeer::DATABASE_NAME);
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
					$pk = NpinfcurPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpinfcurPeer::doUpdate($this, $con);
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


			if (($retval = NpinfcurPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfcurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getNomtit();
				break;
			case 2:
				return $this->getDescur();
				break;
			case 3:
				return $this->getInstit();
				break;
			case 4:
				return $this->getDurcur();
				break;
			case 5:
				return $this->getAnocul();
				break;
			case 6:
				return $this->getCodprofes();
				break;
			case 7:
				return $this->getActivo();
				break;
			case 8:
				return $this->getFecenttit();
				break;
			case 9:
				return $this->getFecini();
				break;
			case 10:
				return $this->getFecfin();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfcurPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getNomtit(),
			$keys[2] => $this->getDescur(),
			$keys[3] => $this->getInstit(),
			$keys[4] => $this->getDurcur(),
			$keys[5] => $this->getAnocul(),
			$keys[6] => $this->getCodprofes(),
			$keys[7] => $this->getActivo(),
			$keys[8] => $this->getFecenttit(),
			$keys[9] => $this->getFecini(),
			$keys[10] => $this->getFecfin(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfcurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setNomtit($value);
				break;
			case 2:
				$this->setDescur($value);
				break;
			case 3:
				$this->setInstit($value);
				break;
			case 4:
				$this->setDurcur($value);
				break;
			case 5:
				$this->setAnocul($value);
				break;
			case 6:
				$this->setCodprofes($value);
				break;
			case 7:
				$this->setActivo($value);
				break;
			case 8:
				$this->setFecenttit($value);
				break;
			case 9:
				$this->setFecini($value);
				break;
			case 10:
				$this->setFecfin($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfcurPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtit($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescur($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setInstit($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDurcur($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAnocul($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodprofes($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setActivo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecenttit($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecini($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecfin($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinfcurPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinfcurPeer::CODEMP)) $criteria->add(NpinfcurPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinfcurPeer::NOMTIT)) $criteria->add(NpinfcurPeer::NOMTIT, $this->nomtit);
		if ($this->isColumnModified(NpinfcurPeer::DESCUR)) $criteria->add(NpinfcurPeer::DESCUR, $this->descur);
		if ($this->isColumnModified(NpinfcurPeer::INSTIT)) $criteria->add(NpinfcurPeer::INSTIT, $this->instit);
		if ($this->isColumnModified(NpinfcurPeer::DURCUR)) $criteria->add(NpinfcurPeer::DURCUR, $this->durcur);
		if ($this->isColumnModified(NpinfcurPeer::ANOCUL)) $criteria->add(NpinfcurPeer::ANOCUL, $this->anocul);
		if ($this->isColumnModified(NpinfcurPeer::CODPROFES)) $criteria->add(NpinfcurPeer::CODPROFES, $this->codprofes);
		if ($this->isColumnModified(NpinfcurPeer::ACTIVO)) $criteria->add(NpinfcurPeer::ACTIVO, $this->activo);
		if ($this->isColumnModified(NpinfcurPeer::FECENTTIT)) $criteria->add(NpinfcurPeer::FECENTTIT, $this->fecenttit);
		if ($this->isColumnModified(NpinfcurPeer::FECINI)) $criteria->add(NpinfcurPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(NpinfcurPeer::FECFIN)) $criteria->add(NpinfcurPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(NpinfcurPeer::ID)) $criteria->add(NpinfcurPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinfcurPeer::DATABASE_NAME);

		$criteria->add(NpinfcurPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNomtit($this->nomtit);

		$copyObj->setDescur($this->descur);

		$copyObj->setInstit($this->instit);

		$copyObj->setDurcur($this->durcur);

		$copyObj->setAnocul($this->anocul);

		$copyObj->setCodprofes($this->codprofes);

		$copyObj->setActivo($this->activo);

		$copyObj->setFecenttit($this->fecenttit);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecfin($this->fecfin);


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
			self::$peer = new NpinfcurPeer();
		}
		return self::$peer;
	}

} 
