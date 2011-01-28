<?php


abstract class BaseNpasipre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $codasi;


	
	protected $desasi;


	
	protected $tipasi;


	
	protected $afealibv;


	
	protected $afealibf;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getCodasi()
  {

    return trim($this->codasi);

  }
  
  public function getDesasi()
  {

    return trim($this->desasi);

  }
  
  public function getTipasi()
  {

    return trim($this->tipasi);

  }
  
  public function getAfealibv()
  {

    return trim($this->afealibv);

  }
  
  public function getAfealibf()
  {

    return trim($this->afealibf);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpasiprePeer::CODCON;
      }
  
	} 
	
	public function setCodasi($v)
	{

    if ($this->codasi !== $v) {
        $this->codasi = $v;
        $this->modifiedColumns[] = NpasiprePeer::CODASI;
      }
  
	} 
	
	public function setDesasi($v)
	{

    if ($this->desasi !== $v) {
        $this->desasi = $v;
        $this->modifiedColumns[] = NpasiprePeer::DESASI;
      }
  
	} 
	
	public function setTipasi($v)
	{

    if ($this->tipasi !== $v) {
        $this->tipasi = $v;
        $this->modifiedColumns[] = NpasiprePeer::TIPASI;
      }
  
	} 
	
	public function setAfealibv($v)
	{

    if ($this->afealibv !== $v) {
        $this->afealibv = $v;
        $this->modifiedColumns[] = NpasiprePeer::AFEALIBV;
      }
  
	} 
	
	public function setAfealibf($v)
	{

    if ($this->afealibf !== $v) {
        $this->afealibf = $v;
        $this->modifiedColumns[] = NpasiprePeer::AFEALIBF;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpasiprePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcon = $rs->getString($startcol + 0);

      $this->codasi = $rs->getString($startcol + 1);

      $this->desasi = $rs->getString($startcol + 2);

      $this->tipasi = $rs->getString($startcol + 3);

      $this->afealibv = $rs->getString($startcol + 4);

      $this->afealibf = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npasipre object", $e);
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
			$con = Propel::getConnection(NpasiprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpasiprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpasiprePeer::DATABASE_NAME);
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
					$pk = NpasiprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpasiprePeer::doUpdate($this, $con);
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


			if (($retval = NpasiprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasiprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getCodasi();
				break;
			case 2:
				return $this->getDesasi();
				break;
			case 3:
				return $this->getTipasi();
				break;
			case 4:
				return $this->getAfealibv();
				break;
			case 5:
				return $this->getAfealibf();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasiprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getCodasi(),
			$keys[2] => $this->getDesasi(),
			$keys[3] => $this->getTipasi(),
			$keys[4] => $this->getAfealibv(),
			$keys[5] => $this->getAfealibf(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasiprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setCodasi($value);
				break;
			case 2:
				$this->setDesasi($value);
				break;
			case 3:
				$this->setTipasi($value);
				break;
			case 4:
				$this->setAfealibv($value);
				break;
			case 5:
				$this->setAfealibf($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasiprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodasi($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesasi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipasi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAfealibv($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAfealibf($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpasiprePeer::DATABASE_NAME);

		if ($this->isColumnModified(NpasiprePeer::CODCON)) $criteria->add(NpasiprePeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpasiprePeer::CODASI)) $criteria->add(NpasiprePeer::CODASI, $this->codasi);
		if ($this->isColumnModified(NpasiprePeer::DESASI)) $criteria->add(NpasiprePeer::DESASI, $this->desasi);
		if ($this->isColumnModified(NpasiprePeer::TIPASI)) $criteria->add(NpasiprePeer::TIPASI, $this->tipasi);
		if ($this->isColumnModified(NpasiprePeer::AFEALIBV)) $criteria->add(NpasiprePeer::AFEALIBV, $this->afealibv);
		if ($this->isColumnModified(NpasiprePeer::AFEALIBF)) $criteria->add(NpasiprePeer::AFEALIBF, $this->afealibf);
		if ($this->isColumnModified(NpasiprePeer::ID)) $criteria->add(NpasiprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpasiprePeer::DATABASE_NAME);

		$criteria->add(NpasiprePeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodasi($this->codasi);

		$copyObj->setDesasi($this->desasi);

		$copyObj->setTipasi($this->tipasi);

		$copyObj->setAfealibv($this->afealibv);

		$copyObj->setAfealibf($this->afealibf);


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
			self::$peer = new NpasiprePeer();
		}
		return self::$peer;
	}

} 