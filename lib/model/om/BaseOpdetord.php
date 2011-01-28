<?php


abstract class BaseOpdetord extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numord;


	
	protected $refcom;


	
	protected $codpre;


	
	protected $moncau;


	
	protected $mondes;


	
	protected $monret;


	
	protected $refsal;


	
	protected $reffon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getMoncau($val=false)
  {

    if($val) return number_format($this->moncau,2,',','.');
    else return $this->moncau;

  }
  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getMonret($val=false)
  {

    if($val) return number_format($this->monret,2,',','.');
    else return $this->monret;

  }
  
  public function getRefsal()
  {

    return trim($this->refsal);

  }
  
  public function getReffon()
  {

    return trim($this->reffon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = OpdetordPeer::NUMORD;
      }
  
	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = OpdetordPeer::REFCOM;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = OpdetordPeer::CODPRE;
      }
  
	} 
	
	public function setMoncau($v)
	{

    if ($this->moncau !== $v) {
        $this->moncau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpdetordPeer::MONCAU;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpdetordPeer::MONDES;
      }
  
	} 
	
	public function setMonret($v)
	{

    if ($this->monret !== $v) {
        $this->monret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpdetordPeer::MONRET;
      }
  
	} 
	
	public function setRefsal($v)
	{

    if ($this->refsal !== $v) {
        $this->refsal = $v;
        $this->modifiedColumns[] = OpdetordPeer::REFSAL;
      }
  
	} 
	
	public function setReffon($v)
	{

    if ($this->reffon !== $v) {
        $this->reffon = $v;
        $this->modifiedColumns[] = OpdetordPeer::REFFON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpdetordPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numord = $rs->getString($startcol + 0);

      $this->refcom = $rs->getString($startcol + 1);

      $this->codpre = $rs->getString($startcol + 2);

      $this->moncau = $rs->getFloat($startcol + 3);

      $this->mondes = $rs->getFloat($startcol + 4);

      $this->monret = $rs->getFloat($startcol + 5);

      $this->refsal = $rs->getString($startcol + 6);

      $this->reffon = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opdetord object", $e);
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
			$con = Propel::getConnection(OpdetordPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpdetordPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpdetordPeer::DATABASE_NAME);
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
					$pk = OpdetordPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpdetordPeer::doUpdate($this, $con);
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


			if (($retval = OpdetordPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdetordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumord();
				break;
			case 1:
				return $this->getRefcom();
				break;
			case 2:
				return $this->getCodpre();
				break;
			case 3:
				return $this->getMoncau();
				break;
			case 4:
				return $this->getMondes();
				break;
			case 5:
				return $this->getMonret();
				break;
			case 6:
				return $this->getRefsal();
				break;
			case 7:
				return $this->getReffon();
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
		$keys = OpdetordPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumord(),
			$keys[1] => $this->getRefcom(),
			$keys[2] => $this->getCodpre(),
			$keys[3] => $this->getMoncau(),
			$keys[4] => $this->getMondes(),
			$keys[5] => $this->getMonret(),
			$keys[6] => $this->getRefsal(),
			$keys[7] => $this->getReffon(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdetordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumord($value);
				break;
			case 1:
				$this->setRefcom($value);
				break;
			case 2:
				$this->setCodpre($value);
				break;
			case 3:
				$this->setMoncau($value);
				break;
			case 4:
				$this->setMondes($value);
				break;
			case 5:
				$this->setMonret($value);
				break;
			case 6:
				$this->setRefsal($value);
				break;
			case 7:
				$this->setReffon($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpdetordPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumord($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRefcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoncau($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMondes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonret($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRefsal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setReffon($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpdetordPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpdetordPeer::NUMORD)) $criteria->add(OpdetordPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(OpdetordPeer::REFCOM)) $criteria->add(OpdetordPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(OpdetordPeer::CODPRE)) $criteria->add(OpdetordPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(OpdetordPeer::MONCAU)) $criteria->add(OpdetordPeer::MONCAU, $this->moncau);
		if ($this->isColumnModified(OpdetordPeer::MONDES)) $criteria->add(OpdetordPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(OpdetordPeer::MONRET)) $criteria->add(OpdetordPeer::MONRET, $this->monret);
		if ($this->isColumnModified(OpdetordPeer::REFSAL)) $criteria->add(OpdetordPeer::REFSAL, $this->refsal);
		if ($this->isColumnModified(OpdetordPeer::REFFON)) $criteria->add(OpdetordPeer::REFFON, $this->reffon);
		if ($this->isColumnModified(OpdetordPeer::ID)) $criteria->add(OpdetordPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpdetordPeer::DATABASE_NAME);

		$criteria->add(OpdetordPeer::ID, $this->id);

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

		$copyObj->setNumord($this->numord);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMoncau($this->moncau);

		$copyObj->setMondes($this->mondes);

		$copyObj->setMonret($this->monret);

		$copyObj->setRefsal($this->refsal);

		$copyObj->setReffon($this->reffon);


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
			self::$peer = new OpdetordPeer();
		}
		return self::$peer;
	}

} 
