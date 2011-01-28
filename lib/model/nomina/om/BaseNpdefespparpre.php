<?php


abstract class BaseNpdefespparpre extends BaseObject  implements Persistent {



	protected static $peer;



	protected $codnom;



	protected $numdiames;



	protected $numdiamaxano;



	protected $tipsalajunodep;



	protected $tipsalbonfinanofra;



	protected $factorbonfinanofra;



	protected $tipsalbonvacfra;



	protected $factorbonvacfra;



	protected $tipsalvacven;



	protected $factorvacven;



	protected $descripclau;



	protected $codret;



	protected $numdiaant;



	protected $poranoant;



	protected $tipsaldiaant;



	protected $codpar;



	protected $aguicom;



	protected $apartirmes;



	protected $id;


	protected $alreadyInSave = false;


	protected $alreadyInValidation = false;


  public function getCodnom()
  {

    return trim($this->codnom);

  }

  public function getNumdiames()
  {

    return $this->numdiames;

  }

  public function getNumdiamaxano()
  {

    return $this->numdiamaxano;

  }

  public function getTipsalajunodep()
  {

    return trim($this->tipsalajunodep);

  }

  public function getTipsalbonfinanofra()
  {

    return trim($this->tipsalbonfinanofra);

  }

  public function getFactorbonfinanofra($val=false)
  {

    if($val) return number_format($this->factorbonfinanofra,2,',','.');
    else return $this->factorbonfinanofra;

  }

  public function getTipsalbonvacfra()
  {

    return trim($this->tipsalbonvacfra);

  }

  public function getFactorbonvacfra($val=false)
  {

    if($val) return number_format($this->factorbonvacfra,2,',','.');
    else return $this->factorbonvacfra;

  }

  public function getTipsalvacven()
  {

    return trim($this->tipsalvacven);

  }

  public function getFactorvacven($val=false)
  {

    if($val) return number_format($this->factorvacven,2,',','.');
    else return $this->factorvacven;

  }

  public function getDescripclau()
  {

    return trim($this->descripclau);

  }

  public function getCodret()
  {

    return trim($this->codret);

  }

  public function getNumdiaant($val=false)
  {

    if($val) return number_format($this->numdiaant,2,',','.');
    else return $this->numdiaant;

  }

  public function getPoranoant()
  {

    return trim($this->poranoant);

  }

  public function getTipsaldiaant()
  {

    return trim($this->tipsaldiaant);

  }

  public function getCodpar()
  {

    return trim($this->codpar);

  }

  public function getAguicom()
  {

    return trim($this->aguicom);

  }

  public function getApartirmes()
  {

    return $this->apartirmes;

  }

  public function getId()
  {

    return $this->id;

  }

	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::CODNOM;
      }

	}

	public function setNumdiames($v)
	{

    if ($this->numdiames !== $v) {
        $this->numdiames = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::NUMDIAMES;
      }

	}

	public function setNumdiamaxano($v)
	{

    if ($this->numdiamaxano !== $v) {
        $this->numdiamaxano = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::NUMDIAMAXANO;
      }

	}

	public function setTipsalajunodep($v)
	{

    if ($this->tipsalajunodep !== $v) {
        $this->tipsalajunodep = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::TIPSALAJUNODEP;
      }

	}

	public function setTipsalbonfinanofra($v)
	{

    if ($this->tipsalbonfinanofra !== $v) {
        $this->tipsalbonfinanofra = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::TIPSALBONFINANOFRA;
      }

	}

	public function setFactorbonfinanofra($v)
	{

    if ($this->factorbonfinanofra !== $v) {
        $this->factorbonfinanofra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdefespparprePeer::FACTORBONFINANOFRA;
      }

	}

	public function setTipsalbonvacfra($v)
	{

    if ($this->tipsalbonvacfra !== $v) {
        $this->tipsalbonvacfra = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::TIPSALBONVACFRA;
      }

	}

	public function setFactorbonvacfra($v)
	{

    if ($this->factorbonvacfra !== $v) {
        $this->factorbonvacfra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdefespparprePeer::FACTORBONVACFRA;
      }

	}

	public function setTipsalvacven($v)
	{

    if ($this->tipsalvacven !== $v) {
        $this->tipsalvacven = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::TIPSALVACVEN;
      }

	}

	public function setFactorvacven($v)
	{

    if ($this->factorvacven !== $v) {
        $this->factorvacven = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdefespparprePeer::FACTORVACVEN;
      }

	}

	public function setDescripclau($v)
	{

    if ($this->descripclau !== $v) {
        $this->descripclau = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::DESCRIPCLAU;
      }

	}

	public function setCodret($v)
	{

    if ($this->codret !== $v) {
        $this->codret = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::CODRET;
      }

	}

	public function setNumdiaant($v)
	{

    if ($this->numdiaant !== $v) {
        $this->numdiaant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdefespparprePeer::NUMDIAANT;
      }

	}

	public function setPoranoant($v)
	{

    if ($this->poranoant !== $v) {
        $this->poranoant = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::PORANOANT;
      }

	}

	public function setTipsaldiaant($v)
	{

    if ($this->tipsaldiaant !== $v) {
        $this->tipsaldiaant = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::TIPSALDIAANT;
      }

	}

	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::CODPAR;
      }

	}

	public function setAguicom($v)
	{

    if ($this->aguicom !== $v) {
        $this->aguicom = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::AGUICOM;
      }

	}

	public function setApartirmes($v)
	{

    if ($this->apartirmes !== $v) {
        $this->apartirmes = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::APARTIRMES;
      }

	}

	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpdefespparprePeer::ID;
      }

	}

  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->numdiames = $rs->getInt($startcol + 1);

      $this->numdiamaxano = $rs->getInt($startcol + 2);

      $this->tipsalajunodep = $rs->getString($startcol + 3);

      $this->tipsalbonfinanofra = $rs->getString($startcol + 4);

      $this->factorbonfinanofra = $rs->getFloat($startcol + 5);

      $this->tipsalbonvacfra = $rs->getString($startcol + 6);

      $this->factorbonvacfra = $rs->getFloat($startcol + 7);

      $this->tipsalvacven = $rs->getString($startcol + 8);

      $this->factorvacven = $rs->getFloat($startcol + 9);

      $this->descripclau = $rs->getString($startcol + 10);

      $this->codret = $rs->getString($startcol + 11);

      $this->numdiaant = $rs->getFloat($startcol + 12);

      $this->poranoant = $rs->getString($startcol + 13);

      $this->tipsaldiaant = $rs->getString($startcol + 14);

      $this->codpar = $rs->getString($startcol + 15);

      $this->aguicom = $rs->getString($startcol + 16);

      $this->apartirmes = $rs->getInt($startcol + 17);

      $this->id = $rs->getInt($startcol + 18);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 19;
    } catch (Exception $e) {
      throw new PropelException("Error populating Npdefespparpre object", $e);
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
			$con = Propel::getConnection(NpdefespparprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdefespparprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdefespparprePeer::DATABASE_NAME);
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
					$pk = NpdefespparprePeer::doInsert($this, $con);
					$affectedRows += 1;
					$this->setId($pk);
					$this->setNew(false);
				} else {
					$affectedRows += NpdefespparprePeer::doUpdate($this, $con);
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


			if (($retval = NpdefespparprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}


	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefespparprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}


	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getNumdiames();
				break;
			case 2:
				return $this->getNumdiamaxano();
				break;
			case 3:
				return $this->getTipsalajunodep();
				break;
			case 4:
				return $this->getTipsalbonfinanofra();
				break;
			case 5:
				return $this->getFactorbonfinanofra();
				break;
			case 6:
				return $this->getTipsalbonvacfra();
				break;
			case 7:
				return $this->getFactorbonvacfra();
				break;
			case 8:
				return $this->getTipsalvacven();
				break;
			case 9:
				return $this->getFactorvacven();
				break;
			case 10:
				return $this->getDescripclau();
				break;
			case 11:
				return $this->getCodret();
				break;
			case 12:
				return $this->getNumdiaant();
				break;
			case 13:
				return $this->getPoranoant();
				break;
			case 14:
				return $this->getTipsaldiaant();
				break;
			case 15:
				return $this->getCodpar();
				break;
			case 16:
				return $this->getAguicom();
				break;
			case 17:
				return $this->getApartirmes();
				break;
			case 18:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}


	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefespparprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getNumdiames(),
			$keys[2] => $this->getNumdiamaxano(),
			$keys[3] => $this->getTipsalajunodep(),
			$keys[4] => $this->getTipsalbonfinanofra(),
			$keys[5] => $this->getFactorbonfinanofra(),
			$keys[6] => $this->getTipsalbonvacfra(),
			$keys[7] => $this->getFactorbonvacfra(),
			$keys[8] => $this->getTipsalvacven(),
			$keys[9] => $this->getFactorvacven(),
			$keys[10] => $this->getDescripclau(),
			$keys[11] => $this->getCodret(),
			$keys[12] => $this->getNumdiaant(),
			$keys[13] => $this->getPoranoant(),
			$keys[14] => $this->getTipsaldiaant(),
			$keys[15] => $this->getCodpar(),
			$keys[16] => $this->getAguicom(),
			$keys[17] => $this->getApartirmes(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}


	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefespparprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}


	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setNumdiames($value);
				break;
			case 2:
				$this->setNumdiamaxano($value);
				break;
			case 3:
				$this->setTipsalajunodep($value);
				break;
			case 4:
				$this->setTipsalbonfinanofra($value);
				break;
			case 5:
				$this->setFactorbonfinanofra($value);
				break;
			case 6:
				$this->setTipsalbonvacfra($value);
				break;
			case 7:
				$this->setFactorbonvacfra($value);
				break;
			case 8:
				$this->setTipsalvacven($value);
				break;
			case 9:
				$this->setFactorvacven($value);
				break;
			case 10:
				$this->setDescripclau($value);
				break;
			case 11:
				$this->setCodret($value);
				break;
			case 12:
				$this->setNumdiaant($value);
				break;
			case 13:
				$this->setPoranoant($value);
				break;
			case 14:
				$this->setTipsaldiaant($value);
				break;
			case 15:
				$this->setCodpar($value);
				break;
			case 16:
				$this->setAguicom($value);
				break;
			case 17:
				$this->setApartirmes($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}


	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefespparprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumdiames($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumdiamaxano($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipsalajunodep($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipsalbonfinanofra($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFactorbonfinanofra($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipsalbonvacfra($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFactorbonvacfra($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTipsalvacven($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFactorvacven($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDescripclau($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodret($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumdiaant($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPoranoant($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTipsaldiaant($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCodpar($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setAguicom($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setApartirmes($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}


	public function buildCriteria()
	{
		$criteria = new Criteria(NpdefespparprePeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdefespparprePeer::CODNOM)) $criteria->add(NpdefespparprePeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpdefespparprePeer::NUMDIAMES)) $criteria->add(NpdefespparprePeer::NUMDIAMES, $this->numdiames);
		if ($this->isColumnModified(NpdefespparprePeer::NUMDIAMAXANO)) $criteria->add(NpdefespparprePeer::NUMDIAMAXANO, $this->numdiamaxano);
		if ($this->isColumnModified(NpdefespparprePeer::TIPSALAJUNODEP)) $criteria->add(NpdefespparprePeer::TIPSALAJUNODEP, $this->tipsalajunodep);
		if ($this->isColumnModified(NpdefespparprePeer::TIPSALBONFINANOFRA)) $criteria->add(NpdefespparprePeer::TIPSALBONFINANOFRA, $this->tipsalbonfinanofra);
		if ($this->isColumnModified(NpdefespparprePeer::FACTORBONFINANOFRA)) $criteria->add(NpdefespparprePeer::FACTORBONFINANOFRA, $this->factorbonfinanofra);
		if ($this->isColumnModified(NpdefespparprePeer::TIPSALBONVACFRA)) $criteria->add(NpdefespparprePeer::TIPSALBONVACFRA, $this->tipsalbonvacfra);
		if ($this->isColumnModified(NpdefespparprePeer::FACTORBONVACFRA)) $criteria->add(NpdefespparprePeer::FACTORBONVACFRA, $this->factorbonvacfra);
		if ($this->isColumnModified(NpdefespparprePeer::TIPSALVACVEN)) $criteria->add(NpdefespparprePeer::TIPSALVACVEN, $this->tipsalvacven);
		if ($this->isColumnModified(NpdefespparprePeer::FACTORVACVEN)) $criteria->add(NpdefespparprePeer::FACTORVACVEN, $this->factorvacven);
		if ($this->isColumnModified(NpdefespparprePeer::DESCRIPCLAU)) $criteria->add(NpdefespparprePeer::DESCRIPCLAU, $this->descripclau);
		if ($this->isColumnModified(NpdefespparprePeer::CODRET)) $criteria->add(NpdefespparprePeer::CODRET, $this->codret);
		if ($this->isColumnModified(NpdefespparprePeer::NUMDIAANT)) $criteria->add(NpdefespparprePeer::NUMDIAANT, $this->numdiaant);
		if ($this->isColumnModified(NpdefespparprePeer::PORANOANT)) $criteria->add(NpdefespparprePeer::PORANOANT, $this->poranoant);
		if ($this->isColumnModified(NpdefespparprePeer::TIPSALDIAANT)) $criteria->add(NpdefespparprePeer::TIPSALDIAANT, $this->tipsaldiaant);
		if ($this->isColumnModified(NpdefespparprePeer::CODPAR)) $criteria->add(NpdefespparprePeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(NpdefespparprePeer::AGUICOM)) $criteria->add(NpdefespparprePeer::AGUICOM, $this->aguicom);
		if ($this->isColumnModified(NpdefespparprePeer::APARTIRMES)) $criteria->add(NpdefespparprePeer::APARTIRMES, $this->apartirmes);
		if ($this->isColumnModified(NpdefespparprePeer::ID)) $criteria->add(NpdefespparprePeer::ID, $this->id);

		return $criteria;
	}


	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdefespparprePeer::DATABASE_NAME);

		$criteria->add(NpdefespparprePeer::ID, $this->id);

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

		$copyObj->setNumdiames($this->numdiames);

		$copyObj->setNumdiamaxano($this->numdiamaxano);

		$copyObj->setTipsalajunodep($this->tipsalajunodep);

		$copyObj->setTipsalbonfinanofra($this->tipsalbonfinanofra);

		$copyObj->setFactorbonfinanofra($this->factorbonfinanofra);

		$copyObj->setTipsalbonvacfra($this->tipsalbonvacfra);

		$copyObj->setFactorbonvacfra($this->factorbonvacfra);

		$copyObj->setTipsalvacven($this->tipsalvacven);

		$copyObj->setFactorvacven($this->factorvacven);

		$copyObj->setDescripclau($this->descripclau);

		$copyObj->setCodret($this->codret);

		$copyObj->setNumdiaant($this->numdiaant);

		$copyObj->setPoranoant($this->poranoant);

		$copyObj->setTipsaldiaant($this->tipsaldiaant);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setAguicom($this->aguicom);

		$copyObj->setApartirmes($this->apartirmes);


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
			self::$peer = new NpdefespparprePeer();
		}
		return self::$peer;
	}

}