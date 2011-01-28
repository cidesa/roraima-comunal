<?php


abstract class BaseNpasiconempbck extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codcon;


	
	protected $codcar;


	
	protected $nomemp;


	
	protected $nomcon;


	
	protected $nomcar;


	
	protected $cantidad;


	
	protected $monto;


	
	protected $fecini;


	
	protected $fecexp;


	
	protected $frecon;


	
	protected $asided;


	
	protected $acucon;


	
	protected $calcon;


	
	protected $activo;


	
	protected $acumulado;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getNomemp()
  {

    return trim($this->nomemp);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getNomcar()
  {

    return trim($this->nomcar);

  }
  
  public function getCantidad($val=false)
  {

    if($val) return number_format($this->cantidad,2,',','.');
    else return $this->cantidad;

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

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

  
  public function getFecexp($format = 'Y-m-d')
  {

    if ($this->fecexp === null || $this->fecexp === '') {
      return null;
    } elseif (!is_int($this->fecexp)) {
            $ts = adodb_strtotime($this->fecexp);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecexp] as date/time value: " . var_export($this->fecexp, true));
      }
    } else {
      $ts = $this->fecexp;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFrecon()
  {

    return trim($this->frecon);

  }
  
  public function getAsided()
  {

    return trim($this->asided);

  }
  
  public function getAcucon()
  {

    return trim($this->acucon);

  }
  
  public function getCalcon()
  {

    return trim($this->calcon);

  }
  
  public function getActivo()
  {

    return trim($this->activo);

  }
  
  public function getAcumulado($val=false)
  {

    if($val) return number_format($this->acumulado,2,',','.');
    else return $this->acumulado;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpasiconempbckPeer::CODEMP;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpasiconempbckPeer::CODCON;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpasiconempbckPeer::CODCAR;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = NpasiconempbckPeer::NOMEMP;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = NpasiconempbckPeer::NOMCON;
      }
  
	} 
	
	public function setNomcar($v)
	{

    if ($this->nomcar !== $v) {
        $this->nomcar = $v;
        $this->modifiedColumns[] = NpasiconempbckPeer::NOMCAR;
      }
  
	} 
	
	public function setCantidad($v)
	{

    if ($this->cantidad !== $v) {
        $this->cantidad = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpasiconempbckPeer::CANTIDAD;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpasiconempbckPeer::MONTO;
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
      $this->modifiedColumns[] = NpasiconempbckPeer::FECINI;
    }

	} 
	
	public function setFecexp($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecexp] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecexp !== $ts) {
      $this->fecexp = $ts;
      $this->modifiedColumns[] = NpasiconempbckPeer::FECEXP;
    }

	} 
	
	public function setFrecon($v)
	{

    if ($this->frecon !== $v) {
        $this->frecon = $v;
        $this->modifiedColumns[] = NpasiconempbckPeer::FRECON;
      }
  
	} 
	
	public function setAsided($v)
	{

    if ($this->asided !== $v) {
        $this->asided = $v;
        $this->modifiedColumns[] = NpasiconempbckPeer::ASIDED;
      }
  
	} 
	
	public function setAcucon($v)
	{

    if ($this->acucon !== $v) {
        $this->acucon = $v;
        $this->modifiedColumns[] = NpasiconempbckPeer::ACUCON;
      }
  
	} 
	
	public function setCalcon($v)
	{

    if ($this->calcon !== $v) {
        $this->calcon = $v;
        $this->modifiedColumns[] = NpasiconempbckPeer::CALCON;
      }
  
	} 
	
	public function setActivo($v)
	{

    if ($this->activo !== $v) {
        $this->activo = $v;
        $this->modifiedColumns[] = NpasiconempbckPeer::ACTIVO;
      }
  
	} 
	
	public function setAcumulado($v)
	{

    if ($this->acumulado !== $v) {
        $this->acumulado = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpasiconempbckPeer::ACUMULADO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpasiconempbckPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->codcon = $rs->getString($startcol + 1);

      $this->codcar = $rs->getString($startcol + 2);

      $this->nomemp = $rs->getString($startcol + 3);

      $this->nomcon = $rs->getString($startcol + 4);

      $this->nomcar = $rs->getString($startcol + 5);

      $this->cantidad = $rs->getFloat($startcol + 6);

      $this->monto = $rs->getFloat($startcol + 7);

      $this->fecini = $rs->getDate($startcol + 8, null);

      $this->fecexp = $rs->getDate($startcol + 9, null);

      $this->frecon = $rs->getString($startcol + 10);

      $this->asided = $rs->getString($startcol + 11);

      $this->acucon = $rs->getString($startcol + 12);

      $this->calcon = $rs->getString($startcol + 13);

      $this->activo = $rs->getString($startcol + 14);

      $this->acumulado = $rs->getFloat($startcol + 15);

      $this->id = $rs->getInt($startcol + 16);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 17; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npasiconempbck object", $e);
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
			$con = Propel::getConnection(NpasiconempbckPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpasiconempbckPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpasiconempbckPeer::DATABASE_NAME);
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
					$pk = NpasiconempbckPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpasiconempbckPeer::doUpdate($this, $con);
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


			if (($retval = NpasiconempbckPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasiconempbckPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCodcon();
				break;
			case 2:
				return $this->getCodcar();
				break;
			case 3:
				return $this->getNomemp();
				break;
			case 4:
				return $this->getNomcon();
				break;
			case 5:
				return $this->getNomcar();
				break;
			case 6:
				return $this->getCantidad();
				break;
			case 7:
				return $this->getMonto();
				break;
			case 8:
				return $this->getFecini();
				break;
			case 9:
				return $this->getFecexp();
				break;
			case 10:
				return $this->getFrecon();
				break;
			case 11:
				return $this->getAsided();
				break;
			case 12:
				return $this->getAcucon();
				break;
			case 13:
				return $this->getCalcon();
				break;
			case 14:
				return $this->getActivo();
				break;
			case 15:
				return $this->getAcumulado();
				break;
			case 16:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasiconempbckPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getCodcar(),
			$keys[3] => $this->getNomemp(),
			$keys[4] => $this->getNomcon(),
			$keys[5] => $this->getNomcar(),
			$keys[6] => $this->getCantidad(),
			$keys[7] => $this->getMonto(),
			$keys[8] => $this->getFecini(),
			$keys[9] => $this->getFecexp(),
			$keys[10] => $this->getFrecon(),
			$keys[11] => $this->getAsided(),
			$keys[12] => $this->getAcucon(),
			$keys[13] => $this->getCalcon(),
			$keys[14] => $this->getActivo(),
			$keys[15] => $this->getAcumulado(),
			$keys[16] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasiconempbckPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setCodcar($value);
				break;
			case 3:
				$this->setNomemp($value);
				break;
			case 4:
				$this->setNomcon($value);
				break;
			case 5:
				$this->setNomcar($value);
				break;
			case 6:
				$this->setCantidad($value);
				break;
			case 7:
				$this->setMonto($value);
				break;
			case 8:
				$this->setFecini($value);
				break;
			case 9:
				$this->setFecexp($value);
				break;
			case 10:
				$this->setFrecon($value);
				break;
			case 11:
				$this->setAsided($value);
				break;
			case 12:
				$this->setAcucon($value);
				break;
			case 13:
				$this->setCalcon($value);
				break;
			case 14:
				$this->setActivo($value);
				break;
			case 15:
				$this->setAcumulado($value);
				break;
			case 16:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasiconempbckPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNomcar($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCantidad($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonto($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecini($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecexp($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFrecon($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAsided($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAcucon($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCalcon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setActivo($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAcumulado($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpasiconempbckPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpasiconempbckPeer::CODEMP)) $criteria->add(NpasiconempbckPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpasiconempbckPeer::CODCON)) $criteria->add(NpasiconempbckPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpasiconempbckPeer::CODCAR)) $criteria->add(NpasiconempbckPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpasiconempbckPeer::NOMEMP)) $criteria->add(NpasiconempbckPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(NpasiconempbckPeer::NOMCON)) $criteria->add(NpasiconempbckPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(NpasiconempbckPeer::NOMCAR)) $criteria->add(NpasiconempbckPeer::NOMCAR, $this->nomcar);
		if ($this->isColumnModified(NpasiconempbckPeer::CANTIDAD)) $criteria->add(NpasiconempbckPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(NpasiconempbckPeer::MONTO)) $criteria->add(NpasiconempbckPeer::MONTO, $this->monto);
		if ($this->isColumnModified(NpasiconempbckPeer::FECINI)) $criteria->add(NpasiconempbckPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(NpasiconempbckPeer::FECEXP)) $criteria->add(NpasiconempbckPeer::FECEXP, $this->fecexp);
		if ($this->isColumnModified(NpasiconempbckPeer::FRECON)) $criteria->add(NpasiconempbckPeer::FRECON, $this->frecon);
		if ($this->isColumnModified(NpasiconempbckPeer::ASIDED)) $criteria->add(NpasiconempbckPeer::ASIDED, $this->asided);
		if ($this->isColumnModified(NpasiconempbckPeer::ACUCON)) $criteria->add(NpasiconempbckPeer::ACUCON, $this->acucon);
		if ($this->isColumnModified(NpasiconempbckPeer::CALCON)) $criteria->add(NpasiconempbckPeer::CALCON, $this->calcon);
		if ($this->isColumnModified(NpasiconempbckPeer::ACTIVO)) $criteria->add(NpasiconempbckPeer::ACTIVO, $this->activo);
		if ($this->isColumnModified(NpasiconempbckPeer::ACUMULADO)) $criteria->add(NpasiconempbckPeer::ACUMULADO, $this->acumulado);
		if ($this->isColumnModified(NpasiconempbckPeer::ID)) $criteria->add(NpasiconempbckPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpasiconempbckPeer::DATABASE_NAME);

		$criteria->add(NpasiconempbckPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setNomcar($this->nomcar);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setMonto($this->monto);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecexp($this->fecexp);

		$copyObj->setFrecon($this->frecon);

		$copyObj->setAsided($this->asided);

		$copyObj->setAcucon($this->acucon);

		$copyObj->setCalcon($this->calcon);

		$copyObj->setActivo($this->activo);

		$copyObj->setAcumulado($this->acumulado);


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
			self::$peer = new NpasiconempbckPeer();
		}
		return self::$peer;
	}

} 