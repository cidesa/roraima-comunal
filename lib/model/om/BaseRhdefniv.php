<?php


abstract class BaseRhdefniv extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codniv;


	
	protected $desniv;


	
	protected $minpun;


	
	protected $maxpun;


	
	protected $totpes;


	
	protected $codran;


	
	protected $tipcal;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getDesniv()
  {

    return trim($this->desniv);

  }
  
  public function getMinpun()
  {

    return $this->minpun;

  }
  
  public function getMaxpun()
  {

    return $this->maxpun;

  }
  
  public function getTotpes()
  {

    return $this->totpes;

  }
  
  public function getCodran()
  {

    return trim($this->codran);

  }
  
  public function getTipcal()
  {

    return trim($this->tipcal);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = RhdefnivPeer::CODNIV;
      }
  
	} 
	
	public function setDesniv($v)
	{

    if ($this->desniv !== $v) {
        $this->desniv = $v;
        $this->modifiedColumns[] = RhdefnivPeer::DESNIV;
      }
  
	} 
	
	public function setMinpun($v)
	{

    if ($this->minpun !== $v) {
        $this->minpun = $v;
        $this->modifiedColumns[] = RhdefnivPeer::MINPUN;
      }
  
	} 
	
	public function setMaxpun($v)
	{

    if ($this->maxpun !== $v) {
        $this->maxpun = $v;
        $this->modifiedColumns[] = RhdefnivPeer::MAXPUN;
      }
  
	} 
	
	public function setTotpes($v)
	{

    if ($this->totpes !== $v) {
        $this->totpes = $v;
        $this->modifiedColumns[] = RhdefnivPeer::TOTPES;
      }
  
	} 
	
	public function setCodran($v)
	{

    if ($this->codran !== $v) {
        $this->codran = $v;
        $this->modifiedColumns[] = RhdefnivPeer::CODRAN;
      }
  
	} 
	
	public function setTipcal($v)
	{

    if ($this->tipcal !== $v) {
        $this->tipcal = $v;
        $this->modifiedColumns[] = RhdefnivPeer::TIPCAL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RhdefnivPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codniv = $rs->getString($startcol + 0);

      $this->desniv = $rs->getString($startcol + 1);

      $this->minpun = $rs->getInt($startcol + 2);

      $this->maxpun = $rs->getInt($startcol + 3);

      $this->totpes = $rs->getInt($startcol + 4);

      $this->codran = $rs->getString($startcol + 5);

      $this->tipcal = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Rhdefniv object", $e);
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
			$con = Propel::getConnection(RhdefnivPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhdefnivPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhdefnivPeer::DATABASE_NAME);
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
					$pk = RhdefnivPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RhdefnivPeer::doUpdate($this, $con);
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


			if (($retval = RhdefnivPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdefnivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodniv();
				break;
			case 1:
				return $this->getDesniv();
				break;
			case 2:
				return $this->getMinpun();
				break;
			case 3:
				return $this->getMaxpun();
				break;
			case 4:
				return $this->getTotpes();
				break;
			case 5:
				return $this->getCodran();
				break;
			case 6:
				return $this->getTipcal();
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
		$keys = RhdefnivPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodniv(),
			$keys[1] => $this->getDesniv(),
			$keys[2] => $this->getMinpun(),
			$keys[3] => $this->getMaxpun(),
			$keys[4] => $this->getTotpes(),
			$keys[5] => $this->getCodran(),
			$keys[6] => $this->getTipcal(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdefnivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodniv($value);
				break;
			case 1:
				$this->setDesniv($value);
				break;
			case 2:
				$this->setMinpun($value);
				break;
			case 3:
				$this->setMaxpun($value);
				break;
			case 4:
				$this->setTotpes($value);
				break;
			case 5:
				$this->setCodran($value);
				break;
			case 6:
				$this->setTipcal($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhdefnivPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodniv($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesniv($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMinpun($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMaxpun($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTotpes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodran($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipcal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhdefnivPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhdefnivPeer::CODNIV)) $criteria->add(RhdefnivPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(RhdefnivPeer::DESNIV)) $criteria->add(RhdefnivPeer::DESNIV, $this->desniv);
		if ($this->isColumnModified(RhdefnivPeer::MINPUN)) $criteria->add(RhdefnivPeer::MINPUN, $this->minpun);
		if ($this->isColumnModified(RhdefnivPeer::MAXPUN)) $criteria->add(RhdefnivPeer::MAXPUN, $this->maxpun);
		if ($this->isColumnModified(RhdefnivPeer::TOTPES)) $criteria->add(RhdefnivPeer::TOTPES, $this->totpes);
		if ($this->isColumnModified(RhdefnivPeer::CODRAN)) $criteria->add(RhdefnivPeer::CODRAN, $this->codran);
		if ($this->isColumnModified(RhdefnivPeer::TIPCAL)) $criteria->add(RhdefnivPeer::TIPCAL, $this->tipcal);
		if ($this->isColumnModified(RhdefnivPeer::ID)) $criteria->add(RhdefnivPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhdefnivPeer::DATABASE_NAME);

		$criteria->add(RhdefnivPeer::ID, $this->id);

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

		$copyObj->setCodniv($this->codniv);

		$copyObj->setDesniv($this->desniv);

		$copyObj->setMinpun($this->minpun);

		$copyObj->setMaxpun($this->maxpun);

		$copyObj->setTotpes($this->totpes);

		$copyObj->setCodran($this->codran);

		$copyObj->setTipcal($this->tipcal);


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
			self::$peer = new RhdefnivPeer();
		}
		return self::$peer;
	}

} 