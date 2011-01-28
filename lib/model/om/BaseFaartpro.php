<?php


abstract class BaseFaartpro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codalm;


	
	protected $codart;


	
	protected $comisi;


	
	protected $tipper;


	
	protected $codcta;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getComisi($val=false)
  {

    if($val) return number_format($this->comisi,2,',','.');
    else return $this->comisi;

  }
  
  public function getTipper()
  {

    return trim($this->tipper);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = FaartproPeer::CODPRO;
      }
  
	} 
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = FaartproPeer::CODALM;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FaartproPeer::CODART;
      }
  
	} 
	
	public function setComisi($v)
	{

    if ($this->comisi !== $v) {
        $this->comisi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartproPeer::COMISI;
      }
  
	} 
	
	public function setTipper($v)
	{

    if ($this->tipper !== $v) {
        $this->tipper = $v;
        $this->modifiedColumns[] = FaartproPeer::TIPPER;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = FaartproPeer::CODCTA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaartproPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpro = $rs->getString($startcol + 0);

      $this->codalm = $rs->getString($startcol + 1);

      $this->codart = $rs->getString($startcol + 2);

      $this->comisi = $rs->getFloat($startcol + 3);

      $this->tipper = $rs->getString($startcol + 4);

      $this->codcta = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faartpro object", $e);
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
			$con = Propel::getConnection(FaartproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaartproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaartproPeer::DATABASE_NAME);
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
					$pk = FaartproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaartproPeer::doUpdate($this, $con);
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


			if (($retval = FaartproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getCodalm();
				break;
			case 2:
				return $this->getCodart();
				break;
			case 3:
				return $this->getComisi();
				break;
			case 4:
				return $this->getTipper();
				break;
			case 5:
				return $this->getCodcta();
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
		$keys = FaartproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodalm(),
			$keys[2] => $this->getCodart(),
			$keys[3] => $this->getComisi(),
			$keys[4] => $this->getTipper(),
			$keys[5] => $this->getCodcta(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setCodalm($value);
				break;
			case 2:
				$this->setCodart($value);
				break;
			case 3:
				$this->setComisi($value);
				break;
			case 4:
				$this->setTipper($value);
				break;
			case 5:
				$this->setCodcta($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaartproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodalm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setComisi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipper($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodcta($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaartproPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaartproPeer::CODPRO)) $criteria->add(FaartproPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FaartproPeer::CODALM)) $criteria->add(FaartproPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(FaartproPeer::CODART)) $criteria->add(FaartproPeer::CODART, $this->codart);
		if ($this->isColumnModified(FaartproPeer::COMISI)) $criteria->add(FaartproPeer::COMISI, $this->comisi);
		if ($this->isColumnModified(FaartproPeer::TIPPER)) $criteria->add(FaartproPeer::TIPPER, $this->tipper);
		if ($this->isColumnModified(FaartproPeer::CODCTA)) $criteria->add(FaartproPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(FaartproPeer::ID)) $criteria->add(FaartproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaartproPeer::DATABASE_NAME);

		$criteria->add(FaartproPeer::ID, $this->id);

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

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCodart($this->codart);

		$copyObj->setComisi($this->comisi);

		$copyObj->setTipper($this->tipper);

		$copyObj->setCodcta($this->codcta);


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
			self::$peer = new FaartproPeer();
		}
		return self::$peer;
	}

} 