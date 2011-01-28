<?php


abstract class BaseFordefsubobj extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codequ;


	
	protected $codsubobj;


	
	protected $dessubobj;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodequ()
  {

    return trim($this->codequ);

  }
  
  public function getCodsubobj()
  {

    return trim($this->codsubobj);

  }
  
  public function getDessubobj()
  {

    return trim($this->dessubobj);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodequ($v)
	{

    if ($this->codequ !== $v) {
        $this->codequ = $v;
        $this->modifiedColumns[] = FordefsubobjPeer::CODEQU;
      }
  
	} 
	
	public function setCodsubobj($v)
	{

    if ($this->codsubobj !== $v) {
        $this->codsubobj = $v;
        $this->modifiedColumns[] = FordefsubobjPeer::CODSUBOBJ;
      }
  
	} 
	
	public function setDessubobj($v)
	{

    if ($this->dessubobj !== $v) {
        $this->dessubobj = $v;
        $this->modifiedColumns[] = FordefsubobjPeer::DESSUBOBJ;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FordefsubobjPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codequ = $rs->getString($startcol + 0);

      $this->codsubobj = $rs->getString($startcol + 1);

      $this->dessubobj = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fordefsubobj object", $e);
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
			$con = Propel::getConnection(FordefsubobjPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefsubobjPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefsubobjPeer::DATABASE_NAME);
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
					$pk = FordefsubobjPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FordefsubobjPeer::doUpdate($this, $con);
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


			if (($retval = FordefsubobjPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefsubobjPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodequ();
				break;
			case 1:
				return $this->getCodsubobj();
				break;
			case 2:
				return $this->getDessubobj();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefsubobjPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodequ(),
			$keys[1] => $this->getCodsubobj(),
			$keys[2] => $this->getDessubobj(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefsubobjPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodequ($value);
				break;
			case 1:
				$this->setCodsubobj($value);
				break;
			case 2:
				$this->setDessubobj($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefsubobjPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodequ($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodsubobj($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDessubobj($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefsubobjPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefsubobjPeer::CODEQU)) $criteria->add(FordefsubobjPeer::CODEQU, $this->codequ);
		if ($this->isColumnModified(FordefsubobjPeer::CODSUBOBJ)) $criteria->add(FordefsubobjPeer::CODSUBOBJ, $this->codsubobj);
		if ($this->isColumnModified(FordefsubobjPeer::DESSUBOBJ)) $criteria->add(FordefsubobjPeer::DESSUBOBJ, $this->dessubobj);
		if ($this->isColumnModified(FordefsubobjPeer::ID)) $criteria->add(FordefsubobjPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefsubobjPeer::DATABASE_NAME);

		$criteria->add(FordefsubobjPeer::ID, $this->id);

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

		$copyObj->setCodequ($this->codequ);

		$copyObj->setCodsubobj($this->codsubobj);

		$copyObj->setDessubobj($this->dessubobj);


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
			self::$peer = new FordefsubobjPeer();
		}
		return self::$peer;
	}

} 