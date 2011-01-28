<?php


abstract class BaseDftabtip extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipdoc;


	
	protected $nomtab;


	
	protected $vidutil;


	
	protected $clvprm;


	
	protected $clvfrn;


	
	protected $mondoc;


	
	protected $fecdoc;


	
	protected $desdoc;


	
	protected $stadoc;


	
	protected $nomtabfk;


	
	protected $nomcolloc;


	
	protected $nomcolfor;


	
	protected $infdoc1;


	
	protected $infdoc2;


	
	protected $infdoc3;


	
	protected $infdoc4;


	
	protected $valact;


	
	protected $valanu;


	
	protected $fecini;


	
	protected $refdoc;


	
	protected $id;

	
	protected $collDfatendocs;

	
	protected $lastDfatendocCriteria = null;

	
	protected $collDfrutadocs;

	
	protected $lastDfrutadocCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTipdoc()
  {

    return trim($this->tipdoc);

  }
  
  public function getNomtab()
  {

    return trim($this->nomtab);

  }
  
  public function getVidutil()
  {

    return $this->vidutil;

  }
  
  public function getClvprm()
  {

    return trim($this->clvprm);

  }
  
  public function getClvfrn()
  {

    return trim($this->clvfrn);

  }
  
  public function getMondoc()
  {

    return trim($this->mondoc);

  }
  
  public function getFecdoc()
  {

    return trim($this->fecdoc);

  }
  
  public function getDesdoc()
  {

    return trim($this->desdoc);

  }
  
  public function getStadoc()
  {

    return trim($this->stadoc);

  }
  
  public function getNomtabfk()
  {

    return trim($this->nomtabfk);

  }
  
  public function getNomcolloc()
  {

    return trim($this->nomcolloc);

  }
  
  public function getNomcolfor()
  {

    return trim($this->nomcolfor);

  }
  
  public function getInfdoc1()
  {

    return trim($this->infdoc1);

  }
  
  public function getInfdoc2()
  {

    return trim($this->infdoc2);

  }
  
  public function getInfdoc3()
  {

    return trim($this->infdoc3);

  }
  
  public function getInfdoc4()
  {

    return trim($this->infdoc4);

  }
  
  public function getValact()
  {

    return trim($this->valact);

  }
  
  public function getValanu()
  {

    return trim($this->valanu);

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

  
  public function getRefdoc()
  {

    return trim($this->refdoc);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTipdoc($v)
	{

    if ($this->tipdoc !== $v) {
        $this->tipdoc = $v;
        $this->modifiedColumns[] = DftabtipPeer::TIPDOC;
      }
  
	} 
	
	public function setNomtab($v)
	{

    if ($this->nomtab !== $v) {
        $this->nomtab = $v;
        $this->modifiedColumns[] = DftabtipPeer::NOMTAB;
      }
  
	} 
	
	public function setVidutil($v)
	{

    if ($this->vidutil !== $v) {
        $this->vidutil = $v;
        $this->modifiedColumns[] = DftabtipPeer::VIDUTIL;
      }
  
	} 
	
	public function setClvprm($v)
	{

    if ($this->clvprm !== $v) {
        $this->clvprm = $v;
        $this->modifiedColumns[] = DftabtipPeer::CLVPRM;
      }
  
	} 
	
	public function setClvfrn($v)
	{

    if ($this->clvfrn !== $v) {
        $this->clvfrn = $v;
        $this->modifiedColumns[] = DftabtipPeer::CLVFRN;
      }
  
	} 
	
	public function setMondoc($v)
	{

    if ($this->mondoc !== $v) {
        $this->mondoc = $v;
        $this->modifiedColumns[] = DftabtipPeer::MONDOC;
      }
  
	} 
	
	public function setFecdoc($v)
	{

    if ($this->fecdoc !== $v) {
        $this->fecdoc = $v;
        $this->modifiedColumns[] = DftabtipPeer::FECDOC;
      }
  
	} 
	
	public function setDesdoc($v)
	{

    if ($this->desdoc !== $v) {
        $this->desdoc = $v;
        $this->modifiedColumns[] = DftabtipPeer::DESDOC;
      }
  
	} 
	
	public function setStadoc($v)
	{

    if ($this->stadoc !== $v) {
        $this->stadoc = $v;
        $this->modifiedColumns[] = DftabtipPeer::STADOC;
      }
  
	} 
	
	public function setNomtabfk($v)
	{

    if ($this->nomtabfk !== $v) {
        $this->nomtabfk = $v;
        $this->modifiedColumns[] = DftabtipPeer::NOMTABFK;
      }
  
	} 
	
	public function setNomcolloc($v)
	{

    if ($this->nomcolloc !== $v) {
        $this->nomcolloc = $v;
        $this->modifiedColumns[] = DftabtipPeer::NOMCOLLOC;
      }
  
	} 
	
	public function setNomcolfor($v)
	{

    if ($this->nomcolfor !== $v) {
        $this->nomcolfor = $v;
        $this->modifiedColumns[] = DftabtipPeer::NOMCOLFOR;
      }
  
	} 
	
	public function setInfdoc1($v)
	{

    if ($this->infdoc1 !== $v) {
        $this->infdoc1 = $v;
        $this->modifiedColumns[] = DftabtipPeer::INFDOC1;
      }
  
	} 
	
	public function setInfdoc2($v)
	{

    if ($this->infdoc2 !== $v) {
        $this->infdoc2 = $v;
        $this->modifiedColumns[] = DftabtipPeer::INFDOC2;
      }
  
	} 
	
	public function setInfdoc3($v)
	{

    if ($this->infdoc3 !== $v) {
        $this->infdoc3 = $v;
        $this->modifiedColumns[] = DftabtipPeer::INFDOC3;
      }
  
	} 
	
	public function setInfdoc4($v)
	{

    if ($this->infdoc4 !== $v) {
        $this->infdoc4 = $v;
        $this->modifiedColumns[] = DftabtipPeer::INFDOC4;
      }
  
	} 
	
	public function setValact($v)
	{

    if ($this->valact !== $v) {
        $this->valact = $v;
        $this->modifiedColumns[] = DftabtipPeer::VALACT;
      }
  
	} 
	
	public function setValanu($v)
	{

    if ($this->valanu !== $v) {
        $this->valanu = $v;
        $this->modifiedColumns[] = DftabtipPeer::VALANU;
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
      $this->modifiedColumns[] = DftabtipPeer::FECINI;
    }

	} 
	
	public function setRefdoc($v)
	{

    if ($this->refdoc !== $v) {
        $this->refdoc = $v;
        $this->modifiedColumns[] = DftabtipPeer::REFDOC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = DftabtipPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tipdoc = $rs->getString($startcol + 0);

      $this->nomtab = $rs->getString($startcol + 1);

      $this->vidutil = $rs->getInt($startcol + 2);

      $this->clvprm = $rs->getString($startcol + 3);

      $this->clvfrn = $rs->getString($startcol + 4);

      $this->mondoc = $rs->getString($startcol + 5);

      $this->fecdoc = $rs->getString($startcol + 6);

      $this->desdoc = $rs->getString($startcol + 7);

      $this->stadoc = $rs->getString($startcol + 8);

      $this->nomtabfk = $rs->getString($startcol + 9);

      $this->nomcolloc = $rs->getString($startcol + 10);

      $this->nomcolfor = $rs->getString($startcol + 11);

      $this->infdoc1 = $rs->getString($startcol + 12);

      $this->infdoc2 = $rs->getString($startcol + 13);

      $this->infdoc3 = $rs->getString($startcol + 14);

      $this->infdoc4 = $rs->getString($startcol + 15);

      $this->valact = $rs->getString($startcol + 16);

      $this->valanu = $rs->getString($startcol + 17);

      $this->fecini = $rs->getDate($startcol + 18, null);

      $this->refdoc = $rs->getString($startcol + 19);

      $this->id = $rs->getInt($startcol + 20);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 21; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Dftabtip object", $e);
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
			$con = Propel::getConnection(DftabtipPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DftabtipPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DftabtipPeer::DATABASE_NAME);
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
					$pk = DftabtipPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DftabtipPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collDfatendocs !== null) {
				foreach($this->collDfatendocs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDfrutadocs !== null) {
				foreach($this->collDfrutadocs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = DftabtipPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDfatendocs !== null) {
					foreach($this->collDfatendocs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDfrutadocs !== null) {
					foreach($this->collDfrutadocs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DftabtipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipdoc();
				break;
			case 1:
				return $this->getNomtab();
				break;
			case 2:
				return $this->getVidutil();
				break;
			case 3:
				return $this->getClvprm();
				break;
			case 4:
				return $this->getClvfrn();
				break;
			case 5:
				return $this->getMondoc();
				break;
			case 6:
				return $this->getFecdoc();
				break;
			case 7:
				return $this->getDesdoc();
				break;
			case 8:
				return $this->getStadoc();
				break;
			case 9:
				return $this->getNomtabfk();
				break;
			case 10:
				return $this->getNomcolloc();
				break;
			case 11:
				return $this->getNomcolfor();
				break;
			case 12:
				return $this->getInfdoc1();
				break;
			case 13:
				return $this->getInfdoc2();
				break;
			case 14:
				return $this->getInfdoc3();
				break;
			case 15:
				return $this->getInfdoc4();
				break;
			case 16:
				return $this->getValact();
				break;
			case 17:
				return $this->getValanu();
				break;
			case 18:
				return $this->getFecini();
				break;
			case 19:
				return $this->getRefdoc();
				break;
			case 20:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DftabtipPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipdoc(),
			$keys[1] => $this->getNomtab(),
			$keys[2] => $this->getVidutil(),
			$keys[3] => $this->getClvprm(),
			$keys[4] => $this->getClvfrn(),
			$keys[5] => $this->getMondoc(),
			$keys[6] => $this->getFecdoc(),
			$keys[7] => $this->getDesdoc(),
			$keys[8] => $this->getStadoc(),
			$keys[9] => $this->getNomtabfk(),
			$keys[10] => $this->getNomcolloc(),
			$keys[11] => $this->getNomcolfor(),
			$keys[12] => $this->getInfdoc1(),
			$keys[13] => $this->getInfdoc2(),
			$keys[14] => $this->getInfdoc3(),
			$keys[15] => $this->getInfdoc4(),
			$keys[16] => $this->getValact(),
			$keys[17] => $this->getValanu(),
			$keys[18] => $this->getFecini(),
			$keys[19] => $this->getRefdoc(),
			$keys[20] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DftabtipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipdoc($value);
				break;
			case 1:
				$this->setNomtab($value);
				break;
			case 2:
				$this->setVidutil($value);
				break;
			case 3:
				$this->setClvprm($value);
				break;
			case 4:
				$this->setClvfrn($value);
				break;
			case 5:
				$this->setMondoc($value);
				break;
			case 6:
				$this->setFecdoc($value);
				break;
			case 7:
				$this->setDesdoc($value);
				break;
			case 8:
				$this->setStadoc($value);
				break;
			case 9:
				$this->setNomtabfk($value);
				break;
			case 10:
				$this->setNomcolloc($value);
				break;
			case 11:
				$this->setNomcolfor($value);
				break;
			case 12:
				$this->setInfdoc1($value);
				break;
			case 13:
				$this->setInfdoc2($value);
				break;
			case 14:
				$this->setInfdoc3($value);
				break;
			case 15:
				$this->setInfdoc4($value);
				break;
			case 16:
				$this->setValact($value);
				break;
			case 17:
				$this->setValanu($value);
				break;
			case 18:
				$this->setFecini($value);
				break;
			case 19:
				$this->setRefdoc($value);
				break;
			case 20:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DftabtipPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipdoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtab($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setVidutil($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setClvprm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setClvfrn($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMondoc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecdoc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesdoc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStadoc($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNomtabfk($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNomcolloc($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNomcolfor($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setInfdoc1($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setInfdoc2($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setInfdoc3($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setInfdoc4($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setValact($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setValanu($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFecini($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setRefdoc($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setId($arr[$keys[20]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DftabtipPeer::DATABASE_NAME);

		if ($this->isColumnModified(DftabtipPeer::TIPDOC)) $criteria->add(DftabtipPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(DftabtipPeer::NOMTAB)) $criteria->add(DftabtipPeer::NOMTAB, $this->nomtab);
		if ($this->isColumnModified(DftabtipPeer::VIDUTIL)) $criteria->add(DftabtipPeer::VIDUTIL, $this->vidutil);
		if ($this->isColumnModified(DftabtipPeer::CLVPRM)) $criteria->add(DftabtipPeer::CLVPRM, $this->clvprm);
		if ($this->isColumnModified(DftabtipPeer::CLVFRN)) $criteria->add(DftabtipPeer::CLVFRN, $this->clvfrn);
		if ($this->isColumnModified(DftabtipPeer::MONDOC)) $criteria->add(DftabtipPeer::MONDOC, $this->mondoc);
		if ($this->isColumnModified(DftabtipPeer::FECDOC)) $criteria->add(DftabtipPeer::FECDOC, $this->fecdoc);
		if ($this->isColumnModified(DftabtipPeer::DESDOC)) $criteria->add(DftabtipPeer::DESDOC, $this->desdoc);
		if ($this->isColumnModified(DftabtipPeer::STADOC)) $criteria->add(DftabtipPeer::STADOC, $this->stadoc);
		if ($this->isColumnModified(DftabtipPeer::NOMTABFK)) $criteria->add(DftabtipPeer::NOMTABFK, $this->nomtabfk);
		if ($this->isColumnModified(DftabtipPeer::NOMCOLLOC)) $criteria->add(DftabtipPeer::NOMCOLLOC, $this->nomcolloc);
		if ($this->isColumnModified(DftabtipPeer::NOMCOLFOR)) $criteria->add(DftabtipPeer::NOMCOLFOR, $this->nomcolfor);
		if ($this->isColumnModified(DftabtipPeer::INFDOC1)) $criteria->add(DftabtipPeer::INFDOC1, $this->infdoc1);
		if ($this->isColumnModified(DftabtipPeer::INFDOC2)) $criteria->add(DftabtipPeer::INFDOC2, $this->infdoc2);
		if ($this->isColumnModified(DftabtipPeer::INFDOC3)) $criteria->add(DftabtipPeer::INFDOC3, $this->infdoc3);
		if ($this->isColumnModified(DftabtipPeer::INFDOC4)) $criteria->add(DftabtipPeer::INFDOC4, $this->infdoc4);
		if ($this->isColumnModified(DftabtipPeer::VALACT)) $criteria->add(DftabtipPeer::VALACT, $this->valact);
		if ($this->isColumnModified(DftabtipPeer::VALANU)) $criteria->add(DftabtipPeer::VALANU, $this->valanu);
		if ($this->isColumnModified(DftabtipPeer::FECINI)) $criteria->add(DftabtipPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(DftabtipPeer::REFDOC)) $criteria->add(DftabtipPeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(DftabtipPeer::ID)) $criteria->add(DftabtipPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DftabtipPeer::DATABASE_NAME);

		$criteria->add(DftabtipPeer::ID, $this->id);

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

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setNomtab($this->nomtab);

		$copyObj->setVidutil($this->vidutil);

		$copyObj->setClvprm($this->clvprm);

		$copyObj->setClvfrn($this->clvfrn);

		$copyObj->setMondoc($this->mondoc);

		$copyObj->setFecdoc($this->fecdoc);

		$copyObj->setDesdoc($this->desdoc);

		$copyObj->setStadoc($this->stadoc);

		$copyObj->setNomtabfk($this->nomtabfk);

		$copyObj->setNomcolloc($this->nomcolloc);

		$copyObj->setNomcolfor($this->nomcolfor);

		$copyObj->setInfdoc1($this->infdoc1);

		$copyObj->setInfdoc2($this->infdoc2);

		$copyObj->setInfdoc3($this->infdoc3);

		$copyObj->setInfdoc4($this->infdoc4);

		$copyObj->setValact($this->valact);

		$copyObj->setValanu($this->valanu);

		$copyObj->setFecini($this->fecini);

		$copyObj->setRefdoc($this->refdoc);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getDfatendocs() as $relObj) {
				$copyObj->addDfatendoc($relObj->copy($deepCopy));
			}

			foreach($this->getDfrutadocs() as $relObj) {
				$copyObj->addDfrutadoc($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new DftabtipPeer();
		}
		return self::$peer;
	}

	
	public function initDfatendocs()
	{
		if ($this->collDfatendocs === null) {
			$this->collDfatendocs = array();
		}
	}

	
	public function getDfatendocs($criteria = null, $con = null)
	{
				include_once 'lib/model/documentos/om/BaseDfatendocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocs === null) {
			if ($this->isNew()) {
			   $this->collDfatendocs = array();
			} else {

				$criteria->add(DfatendocPeer::ID_DFTABTIP, $this->getId());

				DfatendocPeer::addSelectColumns($criteria);
				$this->collDfatendocs = DfatendocPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfatendocPeer::ID_DFTABTIP, $this->getId());

				DfatendocPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfatendocCriteria) || !$this->lastDfatendocCriteria->equals($criteria)) {
					$this->collDfatendocs = DfatendocPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfatendocCriteria = $criteria;
		return $this->collDfatendocs;
	}

	
	public function countDfatendocs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/documentos/om/BaseDfatendocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfatendocPeer::ID_DFTABTIP, $this->getId());

		return DfatendocPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfatendoc(Dfatendoc $l)
	{
		$this->collDfatendocs[] = $l;
		$l->setDftabtip($this);
	}

	
	public function initDfrutadocs()
	{
		if ($this->collDfrutadocs === null) {
			$this->collDfrutadocs = array();
		}
	}

	
	public function getDfrutadocs($criteria = null, $con = null)
	{
				include_once 'lib/model/documentos/om/BaseDfrutadocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfrutadocs === null) {
			if ($this->isNew()) {
			   $this->collDfrutadocs = array();
			} else {

				$criteria->add(DfrutadocPeer::ID_DFTABTIP, $this->getId());

				DfrutadocPeer::addSelectColumns($criteria);
				$this->collDfrutadocs = DfrutadocPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfrutadocPeer::ID_DFTABTIP, $this->getId());

				DfrutadocPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfrutadocCriteria) || !$this->lastDfrutadocCriteria->equals($criteria)) {
					$this->collDfrutadocs = DfrutadocPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfrutadocCriteria = $criteria;
		return $this->collDfrutadocs;
	}

	
	public function countDfrutadocs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/documentos/om/BaseDfrutadocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfrutadocPeer::ID_DFTABTIP, $this->getId());

		return DfrutadocPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfrutadoc(Dfrutadoc $l)
	{
		$this->collDfrutadocs[] = $l;
		$l->setDftabtip($this);
	}


	
	public function getDfrutadocsJoinAcunidad($criteria = null, $con = null)
	{
				include_once 'lib/model/documentos/om/BaseDfrutadocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfrutadocs === null) {
			if ($this->isNew()) {
				$this->collDfrutadocs = array();
			} else {

				$criteria->add(DfrutadocPeer::ID_DFTABTIP, $this->getId());

				$this->collDfrutadocs = DfrutadocPeer::doSelectJoinAcunidad($criteria, $con);
			}
		} else {
									
			$criteria->add(DfrutadocPeer::ID_DFTABTIP, $this->getId());

			if (!isset($this->lastDfrutadocCriteria) || !$this->lastDfrutadocCriteria->equals($criteria)) {
				$this->collDfrutadocs = DfrutadocPeer::doSelectJoinAcunidad($criteria, $con);
			}
		}
		$this->lastDfrutadocCriteria = $criteria;

		return $this->collDfrutadocs;
	}

} 
