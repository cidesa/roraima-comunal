<?php


abstract class BaseNpseghcm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codcon;


	
	protected $codconapo;


	
	protected $tippar;


	
	protected $edaddes;


	
	protected $edadhas;


	
	protected $monto;


	
	protected $cuota;


	
	protected $montototal;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getCodconapo()
  {

    return trim($this->codconapo);

  }
  
  public function getTippar()
  {

    return trim($this->tippar);

  }
  
  public function getEdaddes($val=false)
  {

    if($val) return number_format($this->edaddes,2,',','.');
    else return $this->edaddes;

  }
  
  public function getEdadhas($val=false)
  {

    if($val) return number_format($this->edadhas,2,',','.');
    else return $this->edadhas;

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getCuota()
  {

    return $this->cuota;

  }
  
  public function getMontototal($val=false)
  {

    if($val) return number_format($this->montototal,2,',','.');
    else return $this->montototal;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpseghcmPeer::CODNOM;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpseghcmPeer::CODCON;
      }
  
	} 
	
	public function setCodconapo($v)
	{

    if ($this->codconapo !== $v) {
        $this->codconapo = $v;
        $this->modifiedColumns[] = NpseghcmPeer::CODCONAPO;
      }
  
	} 
	
	public function setTippar($v)
	{

    if ($this->tippar !== $v) {
        $this->tippar = $v;
        $this->modifiedColumns[] = NpseghcmPeer::TIPPAR;
      }
  
	} 
	
	public function setEdaddes($v)
	{

    if ($this->edaddes !== $v) {
        $this->edaddes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpseghcmPeer::EDADDES;
      }
  
	} 
	
	public function setEdadhas($v)
	{

    if ($this->edadhas !== $v) {
        $this->edadhas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpseghcmPeer::EDADHAS;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpseghcmPeer::MONTO;
      }
  
	} 
	
	public function setCuota($v)
	{

    if ($this->cuota !== $v) {
        $this->cuota = $v;
        $this->modifiedColumns[] = NpseghcmPeer::CUOTA;
      }
  
	} 
	
	public function setMontototal($v)
	{

    if ($this->montototal !== $v) {
        $this->montototal = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpseghcmPeer::MONTOTOTAL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpseghcmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->codcon = $rs->getString($startcol + 1);

      $this->codconapo = $rs->getString($startcol + 2);

      $this->tippar = $rs->getString($startcol + 3);

      $this->edaddes = $rs->getFloat($startcol + 4);

      $this->edadhas = $rs->getFloat($startcol + 5);

      $this->monto = $rs->getFloat($startcol + 6);

      $this->cuota = $rs->getInt($startcol + 7);

      $this->montototal = $rs->getFloat($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npseghcm object", $e);
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
			$con = Propel::getConnection(NpseghcmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpseghcmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpseghcmPeer::DATABASE_NAME);
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
					$pk = NpseghcmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpseghcmPeer::doUpdate($this, $con);
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


			if (($retval = NpseghcmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpseghcmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCodcon();
				break;
			case 2:
				return $this->getCodconapo();
				break;
			case 3:
				return $this->getTippar();
				break;
			case 4:
				return $this->getEdaddes();
				break;
			case 5:
				return $this->getEdadhas();
				break;
			case 6:
				return $this->getMonto();
				break;
			case 7:
				return $this->getCuota();
				break;
			case 8:
				return $this->getMontototal();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpseghcmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getCodconapo(),
			$keys[3] => $this->getTippar(),
			$keys[4] => $this->getEdaddes(),
			$keys[5] => $this->getEdadhas(),
			$keys[6] => $this->getMonto(),
			$keys[7] => $this->getCuota(),
			$keys[8] => $this->getMontototal(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpseghcmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setCodconapo($value);
				break;
			case 3:
				$this->setTippar($value);
				break;
			case 4:
				$this->setEdaddes($value);
				break;
			case 5:
				$this->setEdadhas($value);
				break;
			case 6:
				$this->setMonto($value);
				break;
			case 7:
				$this->setCuota($value);
				break;
			case 8:
				$this->setMontototal($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpseghcmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodconapo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTippar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEdaddes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEdadhas($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonto($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCuota($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMontototal($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpseghcmPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpseghcmPeer::CODNOM)) $criteria->add(NpseghcmPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpseghcmPeer::CODCON)) $criteria->add(NpseghcmPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpseghcmPeer::CODCONAPO)) $criteria->add(NpseghcmPeer::CODCONAPO, $this->codconapo);
		if ($this->isColumnModified(NpseghcmPeer::TIPPAR)) $criteria->add(NpseghcmPeer::TIPPAR, $this->tippar);
		if ($this->isColumnModified(NpseghcmPeer::EDADDES)) $criteria->add(NpseghcmPeer::EDADDES, $this->edaddes);
		if ($this->isColumnModified(NpseghcmPeer::EDADHAS)) $criteria->add(NpseghcmPeer::EDADHAS, $this->edadhas);
		if ($this->isColumnModified(NpseghcmPeer::MONTO)) $criteria->add(NpseghcmPeer::MONTO, $this->monto);
		if ($this->isColumnModified(NpseghcmPeer::CUOTA)) $criteria->add(NpseghcmPeer::CUOTA, $this->cuota);
		if ($this->isColumnModified(NpseghcmPeer::MONTOTOTAL)) $criteria->add(NpseghcmPeer::MONTOTOTAL, $this->montototal);
		if ($this->isColumnModified(NpseghcmPeer::ID)) $criteria->add(NpseghcmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpseghcmPeer::DATABASE_NAME);

		$criteria->add(NpseghcmPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodconapo($this->codconapo);

		$copyObj->setTippar($this->tippar);

		$copyObj->setEdaddes($this->edaddes);

		$copyObj->setEdadhas($this->edadhas);

		$copyObj->setMonto($this->monto);

		$copyObj->setCuota($this->cuota);

		$copyObj->setMontototal($this->montototal);


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
			self::$peer = new NpseghcmPeer();
		}
		return self::$peer;
	}

} 