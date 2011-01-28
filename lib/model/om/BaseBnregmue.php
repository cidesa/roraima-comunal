<?php


abstract class BaseBnregmue extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $codmue;


	
	protected $desmue;


	
	protected $codpro;


	
	protected $ordcom;


	
	protected $fecreg;


	
	protected $feccom;


	
	protected $fecdep;


	
	protected $fecaju;


	
	protected $fecact;


	
	protected $fecexp;


	
	protected $ordrcp;


	
	protected $fotmue;


	
	protected $marmue;


	
	protected $modmue;


	
	protected $anomue;


	
	protected $colmue;


	
	protected $codubi;


	
	protected $pesmue;


	
	protected $capmue;


	
	protected $tipmue;


	
	protected $viduti;


	
	protected $lngmue;


	
	protected $nropie;


	
	protected $sermue;


	
	protected $usomue;


	
	protected $altmue;


	
	protected $larmue;


	
	protected $ancmue;


	
	protected $coddis;


	
	protected $detmue;


	
	protected $edomue;


	
	protected $munmue;


	
	protected $depmue;


	
	protected $dirmue;


	
	protected $ubimue;


	
	protected $mesdep;


	
	protected $valini;


	
	protected $valres;


	
	protected $vallib;


	
	protected $valrex;


	
	protected $cosrep;


	
	protected $depmen;


	
	protected $depacu;


	
	protected $stamue;


	
	protected $codalt;


	
	protected $fecrcp;


	
	protected $valadi;


	
	protected $aumviduti;


	
	protected $dimviduti;


	
	protected $stasem;


	
	protected $stainm;


	
	protected $codresuso;


	
	protected $codrespat;


	
	protected $tippro;


	
	protected $logusu;



	protected $numord;



	protected $codubiadm;



	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getCodmue()
  {

    return trim($this->codmue);

  }
  
  public function getDesmue()
  {

    return trim($this->desmue);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getOrdcom()
  {

    return trim($this->ordcom);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccom($format = 'Y-m-d')
  {

    if ($this->feccom === null || $this->feccom === '') {
      return null;
    } elseif (!is_int($this->feccom)) {
            $ts = adodb_strtotime($this->feccom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
      }
    } else {
      $ts = $this->feccom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecdep($format = 'Y-m-d')
  {

    if ($this->fecdep === null || $this->fecdep === '') {
      return null;
    } elseif (!is_int($this->fecdep)) {
            $ts = adodb_strtotime($this->fecdep);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdep] as date/time value: " . var_export($this->fecdep, true));
      }
    } else {
      $ts = $this->fecdep;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecaju($format = 'Y-m-d')
  {

    if ($this->fecaju === null || $this->fecaju === '') {
      return null;
    } elseif (!is_int($this->fecaju)) {
            $ts = adodb_strtotime($this->fecaju);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaju] as date/time value: " . var_export($this->fecaju, true));
      }
    } else {
      $ts = $this->fecaju;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecact($format = 'Y-m-d')
  {

    if ($this->fecact === null || $this->fecact === '') {
      return null;
    } elseif (!is_int($this->fecact)) {
            $ts = adodb_strtotime($this->fecact);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecact] as date/time value: " . var_export($this->fecact, true));
      }
    } else {
      $ts = $this->fecact;
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

  
  public function getOrdrcp()
  {

    return trim($this->ordrcp);

  }
  
  public function getFotmue()
  {

    return trim($this->fotmue);

  }
  
  public function getMarmue()
  {

    return trim($this->marmue);

  }
  
  public function getModmue()
  {

    return trim($this->modmue);

  }
  
  public function getAnomue()
  {

    return trim($this->anomue);

  }
  
  public function getColmue()
  {

    return trim($this->colmue);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getPesmue()
  {

    return trim($this->pesmue);

  }
  
  public function getCapmue()
  {

    return trim($this->capmue);

  }
  
  public function getTipmue()
  {

    return trim($this->tipmue);

  }
  
  public function getViduti()
  {

    return trim($this->viduti);

  }
  
  public function getLngmue()
  {

    return trim($this->lngmue);

  }
  
  public function getNropie()
  {

    return trim($this->nropie);

  }
  
  public function getSermue()
  {

    return trim($this->sermue);

  }
  
  public function getUsomue()
  {

    return trim($this->usomue);

  }
  
  public function getAltmue()
  {

    return trim($this->altmue);

  }
  
  public function getLarmue()
  {

    return trim($this->larmue);

  }
  
  public function getAncmue()
  {

    return trim($this->ancmue);

  }
  
  public function getCoddis()
  {

    return trim($this->coddis);

  }
  
  public function getDetmue()
  {

    return trim($this->detmue);

  }
  
  public function getEdomue()
  {

    return trim($this->edomue);

  }
  
  public function getMunmue()
  {

    return trim($this->munmue);

  }
  
  public function getDepmue()
  {

    return trim($this->depmue);

  }
  
  public function getDirmue()
  {

    return trim($this->dirmue);

  }
  
  public function getUbimue()
  {

    return trim($this->ubimue);

  }
  
  public function getMesdep($val=false)
  {

    if($val) return number_format($this->mesdep,2,',','.');
    else return $this->mesdep;

  }
  
  public function getValini($val=false)
  {

    if($val) return number_format($this->valini,2,',','.');
    else return $this->valini;

  }
  
  public function getValres($val=false)
  {

    if($val) return number_format($this->valres,2,',','.');
    else return $this->valres;

  }
  
  public function getVallib($val=false)
  {

    if($val) return number_format($this->vallib,2,',','.');
    else return $this->vallib;

  }
  
  public function getValrex($val=false)
  {

    if($val) return number_format($this->valrex,2,',','.');
    else return $this->valrex;

  }
  
  public function getCosrep($val=false)
  {

    if($val) return number_format($this->cosrep,2,',','.');
    else return $this->cosrep;

  }
  
  public function getDepmen($val=false)
  {

    if($val) return number_format($this->depmen,2,',','.');
    else return $this->depmen;

  }
  
  public function getDepacu($val=false)
  {

    if($val) return number_format($this->depacu,2,',','.');
    else return $this->depacu;

  }
  
  public function getStamue()
  {

    return trim($this->stamue);

  }
  
  public function getCodalt()
  {

    return trim($this->codalt);

  }
  
  public function getFecrcp($format = 'Y-m-d')
  {

    if ($this->fecrcp === null || $this->fecrcp === '') {
      return null;
    } elseif (!is_int($this->fecrcp)) {
            $ts = adodb_strtotime($this->fecrcp);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrcp] as date/time value: " . var_export($this->fecrcp, true));
      }
    } else {
      $ts = $this->fecrcp;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getValadi($val=false)
  {

    if($val) return number_format($this->valadi,2,',','.');
    else return $this->valadi;

  }
  
  public function getAumviduti($val=false)
  {

    if($val) return number_format($this->aumviduti,2,',','.');
    else return $this->aumviduti;

  }
  
  public function getDimviduti($val=false)
  {

    if($val) return number_format($this->dimviduti,2,',','.');
    else return $this->dimviduti;

  }
  
  public function getStasem()
  {

    return trim($this->stasem);

  }
  
  public function getStainm()
  {

    return trim($this->stainm);

  }
  
  public function getCodresuso()
  {

    return trim($this->codresuso);

  }
  
  public function getCodrespat()
  {

    return trim($this->codrespat);

  }
  
  public function getTippro()
  {

    return trim($this->tippro);

  }
  
  public function getLogusu()
  {

    return trim($this->logusu);

  }

  public function getNumord()
  {

    return trim($this->numord);

  }

  public function getCodubiadm()
  {

    return trim($this->codubiadm);

  }

  public function getId()
  {

    return $this->id;

  }
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = BnregmuePeer::CODACT;
      }
  
	} 
	
	public function setCodmue($v)
	{

    if ($this->codmue !== $v) {
        $this->codmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::CODMUE;
      }
  
	} 
	
	public function setDesmue($v)
	{

    if ($this->desmue !== $v) {
        $this->desmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::DESMUE;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = BnregmuePeer::CODPRO;
      }
  
	} 
	
	public function setOrdcom($v)
	{

    if ($this->ordcom !== $v) {
        $this->ordcom = $v;
        $this->modifiedColumns[] = BnregmuePeer::ORDCOM;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = BnregmuePeer::FECREG;
    }

	} 
	
	public function setFeccom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccom !== $ts) {
      $this->feccom = $ts;
      $this->modifiedColumns[] = BnregmuePeer::FECCOM;
    }

	} 
	
	public function setFecdep($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdep] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdep !== $ts) {
      $this->fecdep = $ts;
      $this->modifiedColumns[] = BnregmuePeer::FECDEP;
    }

	} 
	
	public function setFecaju($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaju] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaju !== $ts) {
      $this->fecaju = $ts;
      $this->modifiedColumns[] = BnregmuePeer::FECAJU;
    }

	} 
	
	public function setFecact($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecact] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecact !== $ts) {
      $this->fecact = $ts;
      $this->modifiedColumns[] = BnregmuePeer::FECACT;
    }

	} 
	
	public function setFecexp($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecexp] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecexp !== $ts) {
      $this->fecexp = $ts;
      $this->modifiedColumns[] = BnregmuePeer::FECEXP;
    }

	} 
	
	public function setOrdrcp($v)
	{

    if ($this->ordrcp !== $v) {
        $this->ordrcp = $v;
        $this->modifiedColumns[] = BnregmuePeer::ORDRCP;
      }
  
	} 
	
	public function setFotmue($v)
	{

    if ($this->fotmue !== $v) {
        $this->fotmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::FOTMUE;
      }
  
	} 
	
	public function setMarmue($v)
	{

    if ($this->marmue !== $v) {
        $this->marmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::MARMUE;
      }
  
	} 
	
	public function setModmue($v)
	{

    if ($this->modmue !== $v) {
        $this->modmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::MODMUE;
      }
  
	} 
	
	public function setAnomue($v)
	{

    if ($this->anomue !== $v) {
        $this->anomue = $v;
        $this->modifiedColumns[] = BnregmuePeer::ANOMUE;
      }
  
	} 
	
	public function setColmue($v)
	{

    if ($this->colmue !== $v) {
        $this->colmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::COLMUE;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = BnregmuePeer::CODUBI;
      }
  
	} 
	
	public function setPesmue($v)
	{

    if ($this->pesmue !== $v) {
        $this->pesmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::PESMUE;
      }
  
	} 
	
	public function setCapmue($v)
	{

    if ($this->capmue !== $v) {
        $this->capmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::CAPMUE;
      }
  
	} 
	
	public function setTipmue($v)
	{

    if ($this->tipmue !== $v) {
        $this->tipmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::TIPMUE;
      }
  
	} 
	
	public function setViduti($v)
	{

    if ($this->viduti !== $v) {
        $this->viduti = $v;
        $this->modifiedColumns[] = BnregmuePeer::VIDUTI;
      }
  
	} 
	
	public function setLngmue($v)
	{

    if ($this->lngmue !== $v) {
        $this->lngmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::LNGMUE;
      }
  
	} 
	
	public function setNropie($v)
	{

    if ($this->nropie !== $v) {
        $this->nropie = $v;
        $this->modifiedColumns[] = BnregmuePeer::NROPIE;
      }
  
	} 
	
	public function setSermue($v)
	{

    if ($this->sermue !== $v) {
        $this->sermue = $v;
        $this->modifiedColumns[] = BnregmuePeer::SERMUE;
      }
  
	} 
	
	public function setUsomue($v)
	{

    if ($this->usomue !== $v) {
        $this->usomue = $v;
        $this->modifiedColumns[] = BnregmuePeer::USOMUE;
      }
  
	} 
	
	public function setAltmue($v)
	{

    if ($this->altmue !== $v) {
        $this->altmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::ALTMUE;
      }
  
	} 
	
	public function setLarmue($v)
	{

    if ($this->larmue !== $v) {
        $this->larmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::LARMUE;
      }
  
	} 
	
	public function setAncmue($v)
	{

    if ($this->ancmue !== $v) {
        $this->ancmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::ANCMUE;
      }
  
	} 
	
	public function setCoddis($v)
	{

    if ($this->coddis !== $v) {
        $this->coddis = $v;
        $this->modifiedColumns[] = BnregmuePeer::CODDIS;
      }
  
	} 
	
	public function setDetmue($v)
	{

    if ($this->detmue !== $v) {
        $this->detmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::DETMUE;
      }
  
	} 
	
	public function setEdomue($v)
	{

    if ($this->edomue !== $v) {
        $this->edomue = $v;
        $this->modifiedColumns[] = BnregmuePeer::EDOMUE;
      }
  
	} 
	
	public function setMunmue($v)
	{

    if ($this->munmue !== $v) {
        $this->munmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::MUNMUE;
      }
  
	} 
	
	public function setDepmue($v)
	{

    if ($this->depmue !== $v) {
        $this->depmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::DEPMUE;
      }
  
	} 
	
	public function setDirmue($v)
	{

    if ($this->dirmue !== $v) {
        $this->dirmue = $v;
        $this->modifiedColumns[] = BnregmuePeer::DIRMUE;
      }
  
	} 
	
	public function setUbimue($v)
	{

    if ($this->ubimue !== $v) {
        $this->ubimue = $v;
        $this->modifiedColumns[] = BnregmuePeer::UBIMUE;
      }
  
	} 
	
	public function setMesdep($v)
	{

    if ($this->mesdep !== $v) {
        $this->mesdep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregmuePeer::MESDEP;
      }
  
	} 
	
	public function setValini($v)
	{

    if ($this->valini !== $v) {
        $this->valini = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregmuePeer::VALINI;
      }
  
	} 
	
	public function setValres($v)
	{

    if ($this->valres !== $v) {
        $this->valres = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregmuePeer::VALRES;
      }
  
	} 
	
	public function setVallib($v)
	{

    if ($this->vallib !== $v) {
        $this->vallib = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregmuePeer::VALLIB;
      }
  
	} 
	
	public function setValrex($v)
	{

    if ($this->valrex !== $v) {
        $this->valrex = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregmuePeer::VALREX;
      }
  
	} 
	
	public function setCosrep($v)
	{

    if ($this->cosrep !== $v) {
        $this->cosrep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregmuePeer::COSREP;
      }
  
	} 
	
	public function setDepmen($v)
	{

    if ($this->depmen !== $v) {
        $this->depmen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregmuePeer::DEPMEN;
      }
  
	} 
	
	public function setDepacu($v)
	{

    if ($this->depacu !== $v) {
        $this->depacu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregmuePeer::DEPACU;
      }
  
	} 
	
	public function setStamue($v)
	{

    if ($this->stamue !== $v) {
        $this->stamue = $v;
        $this->modifiedColumns[] = BnregmuePeer::STAMUE;
      }
  
	} 
	
	public function setCodalt($v)
	{

    if ($this->codalt !== $v) {
        $this->codalt = $v;
        $this->modifiedColumns[] = BnregmuePeer::CODALT;
      }
  
	} 
	
	public function setFecrcp($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrcp] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrcp !== $ts) {
      $this->fecrcp = $ts;
      $this->modifiedColumns[] = BnregmuePeer::FECRCP;
    }

	} 
	
	public function setValadi($v)
	{

    if ($this->valadi !== $v) {
        $this->valadi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregmuePeer::VALADI;
      }
  
	} 
	
	public function setAumviduti($v)
	{

    if ($this->aumviduti !== $v) {
        $this->aumviduti = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregmuePeer::AUMVIDUTI;
      }
  
	} 
	
	public function setDimviduti($v)
	{

    if ($this->dimviduti !== $v) {
        $this->dimviduti = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnregmuePeer::DIMVIDUTI;
      }
  
	} 
	
	public function setStasem($v)
	{

    if ($this->stasem !== $v) {
        $this->stasem = $v;
        $this->modifiedColumns[] = BnregmuePeer::STASEM;
      }
  
	} 
	
	public function setStainm($v)
	{

    if ($this->stainm !== $v) {
        $this->stainm = $v;
        $this->modifiedColumns[] = BnregmuePeer::STAINM;
      }
  
	} 
	
	public function setCodresuso($v)
	{

    if ($this->codresuso !== $v) {
        $this->codresuso = $v;
        $this->modifiedColumns[] = BnregmuePeer::CODRESUSO;
      }
  
	} 
	
	public function setCodrespat($v)
	{

    if ($this->codrespat !== $v) {
        $this->codrespat = $v;
        $this->modifiedColumns[] = BnregmuePeer::CODRESPAT;
      }
  
	} 
	
	public function setTippro($v)
	{

    if ($this->tippro !== $v) {
        $this->tippro = $v;
        $this->modifiedColumns[] = BnregmuePeer::TIPPRO;
      }
  
	} 
	
	public function setLogusu($v)
	{

    if ($this->logusu !== $v) {
        $this->logusu = $v;
        $this->modifiedColumns[] = BnregmuePeer::LOGUSU;
      }

	}

	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = BnregmuePeer::NUMORD;
      }

	}

	public function setCodubiadm($v)
	{

    if ($this->codubiadm !== $v) {
        $this->codubiadm = $v;
        $this->modifiedColumns[] = BnregmuePeer::CODUBIADM;
      }

	}

	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BnregmuePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codact = $rs->getString($startcol + 0);

      $this->codmue = $rs->getString($startcol + 1);

      $this->desmue = $rs->getString($startcol + 2);

      $this->codpro = $rs->getString($startcol + 3);

      $this->ordcom = $rs->getString($startcol + 4);

      $this->fecreg = $rs->getDate($startcol + 5, null);

      $this->feccom = $rs->getDate($startcol + 6, null);

      $this->fecdep = $rs->getDate($startcol + 7, null);

      $this->fecaju = $rs->getDate($startcol + 8, null);

      $this->fecact = $rs->getDate($startcol + 9, null);

      $this->fecexp = $rs->getDate($startcol + 10, null);

      $this->ordrcp = $rs->getString($startcol + 11);

      $this->fotmue = $rs->getString($startcol + 12);

      $this->marmue = $rs->getString($startcol + 13);

      $this->modmue = $rs->getString($startcol + 14);

      $this->anomue = $rs->getString($startcol + 15);

      $this->colmue = $rs->getString($startcol + 16);

      $this->codubi = $rs->getString($startcol + 17);

      $this->pesmue = $rs->getString($startcol + 18);

      $this->capmue = $rs->getString($startcol + 19);

      $this->tipmue = $rs->getString($startcol + 20);

      $this->viduti = $rs->getString($startcol + 21);

      $this->lngmue = $rs->getString($startcol + 22);

      $this->nropie = $rs->getString($startcol + 23);

      $this->sermue = $rs->getString($startcol + 24);

      $this->usomue = $rs->getString($startcol + 25);

      $this->altmue = $rs->getString($startcol + 26);

      $this->larmue = $rs->getString($startcol + 27);

      $this->ancmue = $rs->getString($startcol + 28);

      $this->coddis = $rs->getString($startcol + 29);

      $this->detmue = $rs->getString($startcol + 30);

      $this->edomue = $rs->getString($startcol + 31);

      $this->munmue = $rs->getString($startcol + 32);

      $this->depmue = $rs->getString($startcol + 33);

      $this->dirmue = $rs->getString($startcol + 34);

      $this->ubimue = $rs->getString($startcol + 35);

      $this->mesdep = $rs->getFloat($startcol + 36);

      $this->valini = $rs->getFloat($startcol + 37);

      $this->valres = $rs->getFloat($startcol + 38);

      $this->vallib = $rs->getFloat($startcol + 39);

      $this->valrex = $rs->getFloat($startcol + 40);

      $this->cosrep = $rs->getFloat($startcol + 41);

      $this->depmen = $rs->getFloat($startcol + 42);

      $this->depacu = $rs->getFloat($startcol + 43);

      $this->stamue = $rs->getString($startcol + 44);

      $this->codalt = $rs->getString($startcol + 45);

      $this->fecrcp = $rs->getDate($startcol + 46, null);

      $this->valadi = $rs->getFloat($startcol + 47);

      $this->aumviduti = $rs->getFloat($startcol + 48);

      $this->dimviduti = $rs->getFloat($startcol + 49);

      $this->stasem = $rs->getString($startcol + 50);

      $this->stainm = $rs->getString($startcol + 51);

      $this->codresuso = $rs->getString($startcol + 52);

      $this->codrespat = $rs->getString($startcol + 53);

      $this->tippro = $rs->getString($startcol + 54);

      $this->logusu = $rs->getString($startcol + 55);

      $this->numord = $rs->getString($startcol + 56);

      $this->codubiadm = $rs->getString($startcol + 57);

      $this->id = $rs->getInt($startcol + 58);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 59;
    } catch (Exception $e) {
      throw new PropelException("Error populating Bnregmue object", $e);
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
			$con = Propel::getConnection(BnregmuePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnregmuePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnregmuePeer::DATABASE_NAME);
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
					$pk = BnregmuePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BnregmuePeer::doUpdate($this, $con);
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


			if (($retval = BnregmuePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnregmuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getCodmue();
				break;
			case 2:
				return $this->getDesmue();
				break;
			case 3:
				return $this->getCodpro();
				break;
			case 4:
				return $this->getOrdcom();
				break;
			case 5:
				return $this->getFecreg();
				break;
			case 6:
				return $this->getFeccom();
				break;
			case 7:
				return $this->getFecdep();
				break;
			case 8:
				return $this->getFecaju();
				break;
			case 9:
				return $this->getFecact();
				break;
			case 10:
				return $this->getFecexp();
				break;
			case 11:
				return $this->getOrdrcp();
				break;
			case 12:
				return $this->getFotmue();
				break;
			case 13:
				return $this->getMarmue();
				break;
			case 14:
				return $this->getModmue();
				break;
			case 15:
				return $this->getAnomue();
				break;
			case 16:
				return $this->getColmue();
				break;
			case 17:
				return $this->getCodubi();
				break;
			case 18:
				return $this->getPesmue();
				break;
			case 19:
				return $this->getCapmue();
				break;
			case 20:
				return $this->getTipmue();
				break;
			case 21:
				return $this->getViduti();
				break;
			case 22:
				return $this->getLngmue();
				break;
			case 23:
				return $this->getNropie();
				break;
			case 24:
				return $this->getSermue();
				break;
			case 25:
				return $this->getUsomue();
				break;
			case 26:
				return $this->getAltmue();
				break;
			case 27:
				return $this->getLarmue();
				break;
			case 28:
				return $this->getAncmue();
				break;
			case 29:
				return $this->getCoddis();
				break;
			case 30:
				return $this->getDetmue();
				break;
			case 31:
				return $this->getEdomue();
				break;
			case 32:
				return $this->getMunmue();
				break;
			case 33:
				return $this->getDepmue();
				break;
			case 34:
				return $this->getDirmue();
				break;
			case 35:
				return $this->getUbimue();
				break;
			case 36:
				return $this->getMesdep();
				break;
			case 37:
				return $this->getValini();
				break;
			case 38:
				return $this->getValres();
				break;
			case 39:
				return $this->getVallib();
				break;
			case 40:
				return $this->getValrex();
				break;
			case 41:
				return $this->getCosrep();
				break;
			case 42:
				return $this->getDepmen();
				break;
			case 43:
				return $this->getDepacu();
				break;
			case 44:
				return $this->getStamue();
				break;
			case 45:
				return $this->getCodalt();
				break;
			case 46:
				return $this->getFecrcp();
				break;
			case 47:
				return $this->getValadi();
				break;
			case 48:
				return $this->getAumviduti();
				break;
			case 49:
				return $this->getDimviduti();
				break;
			case 50:
				return $this->getStasem();
				break;
			case 51:
				return $this->getStainm();
				break;
			case 52:
				return $this->getCodresuso();
				break;
			case 53:
				return $this->getCodrespat();
				break;
			case 54:
				return $this->getTippro();
				break;
			case 55:
				return $this->getLogusu();
				break;
			case 56:
				return $this->getNumord();
				break;
			case 57:
				return $this->getCodubiadm();
				break;
			case 58:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnregmuePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getCodmue(),
			$keys[2] => $this->getDesmue(),
			$keys[3] => $this->getCodpro(),
			$keys[4] => $this->getOrdcom(),
			$keys[5] => $this->getFecreg(),
			$keys[6] => $this->getFeccom(),
			$keys[7] => $this->getFecdep(),
			$keys[8] => $this->getFecaju(),
			$keys[9] => $this->getFecact(),
			$keys[10] => $this->getFecexp(),
			$keys[11] => $this->getOrdrcp(),
			$keys[12] => $this->getFotmue(),
			$keys[13] => $this->getMarmue(),
			$keys[14] => $this->getModmue(),
			$keys[15] => $this->getAnomue(),
			$keys[16] => $this->getColmue(),
			$keys[17] => $this->getCodubi(),
			$keys[18] => $this->getPesmue(),
			$keys[19] => $this->getCapmue(),
			$keys[20] => $this->getTipmue(),
			$keys[21] => $this->getViduti(),
			$keys[22] => $this->getLngmue(),
			$keys[23] => $this->getNropie(),
			$keys[24] => $this->getSermue(),
			$keys[25] => $this->getUsomue(),
			$keys[26] => $this->getAltmue(),
			$keys[27] => $this->getLarmue(),
			$keys[28] => $this->getAncmue(),
			$keys[29] => $this->getCoddis(),
			$keys[30] => $this->getDetmue(),
			$keys[31] => $this->getEdomue(),
			$keys[32] => $this->getMunmue(),
			$keys[33] => $this->getDepmue(),
			$keys[34] => $this->getDirmue(),
			$keys[35] => $this->getUbimue(),
			$keys[36] => $this->getMesdep(),
			$keys[37] => $this->getValini(),
			$keys[38] => $this->getValres(),
			$keys[39] => $this->getVallib(),
			$keys[40] => $this->getValrex(),
			$keys[41] => $this->getCosrep(),
			$keys[42] => $this->getDepmen(),
			$keys[43] => $this->getDepacu(),
			$keys[44] => $this->getStamue(),
			$keys[45] => $this->getCodalt(),
			$keys[46] => $this->getFecrcp(),
			$keys[47] => $this->getValadi(),
			$keys[48] => $this->getAumviduti(),
			$keys[49] => $this->getDimviduti(),
			$keys[50] => $this->getStasem(),
			$keys[51] => $this->getStainm(),
			$keys[52] => $this->getCodresuso(),
			$keys[53] => $this->getCodrespat(),
			$keys[54] => $this->getTippro(),
			$keys[55] => $this->getLogusu(),
			$keys[56] => $this->getNumord(),
			$keys[57] => $this->getCodubiadm(),
			$keys[58] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnregmuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setCodmue($value);
				break;
			case 2:
				$this->setDesmue($value);
				break;
			case 3:
				$this->setCodpro($value);
				break;
			case 4:
				$this->setOrdcom($value);
				break;
			case 5:
				$this->setFecreg($value);
				break;
			case 6:
				$this->setFeccom($value);
				break;
			case 7:
				$this->setFecdep($value);
				break;
			case 8:
				$this->setFecaju($value);
				break;
			case 9:
				$this->setFecact($value);
				break;
			case 10:
				$this->setFecexp($value);
				break;
			case 11:
				$this->setOrdrcp($value);
				break;
			case 12:
				$this->setFotmue($value);
				break;
			case 13:
				$this->setMarmue($value);
				break;
			case 14:
				$this->setModmue($value);
				break;
			case 15:
				$this->setAnomue($value);
				break;
			case 16:
				$this->setColmue($value);
				break;
			case 17:
				$this->setCodubi($value);
				break;
			case 18:
				$this->setPesmue($value);
				break;
			case 19:
				$this->setCapmue($value);
				break;
			case 20:
				$this->setTipmue($value);
				break;
			case 21:
				$this->setViduti($value);
				break;
			case 22:
				$this->setLngmue($value);
				break;
			case 23:
				$this->setNropie($value);
				break;
			case 24:
				$this->setSermue($value);
				break;
			case 25:
				$this->setUsomue($value);
				break;
			case 26:
				$this->setAltmue($value);
				break;
			case 27:
				$this->setLarmue($value);
				break;
			case 28:
				$this->setAncmue($value);
				break;
			case 29:
				$this->setCoddis($value);
				break;
			case 30:
				$this->setDetmue($value);
				break;
			case 31:
				$this->setEdomue($value);
				break;
			case 32:
				$this->setMunmue($value);
				break;
			case 33:
				$this->setDepmue($value);
				break;
			case 34:
				$this->setDirmue($value);
				break;
			case 35:
				$this->setUbimue($value);
				break;
			case 36:
				$this->setMesdep($value);
				break;
			case 37:
				$this->setValini($value);
				break;
			case 38:
				$this->setValres($value);
				break;
			case 39:
				$this->setVallib($value);
				break;
			case 40:
				$this->setValrex($value);
				break;
			case 41:
				$this->setCosrep($value);
				break;
			case 42:
				$this->setDepmen($value);
				break;
			case 43:
				$this->setDepacu($value);
				break;
			case 44:
				$this->setStamue($value);
				break;
			case 45:
				$this->setCodalt($value);
				break;
			case 46:
				$this->setFecrcp($value);
				break;
			case 47:
				$this->setValadi($value);
				break;
			case 48:
				$this->setAumviduti($value);
				break;
			case 49:
				$this->setDimviduti($value);
				break;
			case 50:
				$this->setStasem($value);
				break;
			case 51:
				$this->setStainm($value);
				break;
			case 52:
				$this->setCodresuso($value);
				break;
			case 53:
				$this->setCodrespat($value);
				break;
			case 54:
				$this->setTippro($value);
				break;
			case 55:
				$this->setLogusu($value);
				break;
			case 56:
				$this->setNumord($value);
				break;
			case 57:
				$this->setCodubiadm($value);
				break;
			case 58:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnregmuePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesmue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOrdcom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecreg($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFeccom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecdep($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecaju($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecact($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecexp($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setOrdrcp($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFotmue($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMarmue($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setModmue($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAnomue($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setColmue($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodubi($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPesmue($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCapmue($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setTipmue($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setViduti($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setLngmue($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setNropie($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setSermue($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setUsomue($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setAltmue($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setLarmue($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setAncmue($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCoddis($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setDetmue($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setEdomue($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setMunmue($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setDepmue($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setDirmue($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setUbimue($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setMesdep($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setValini($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setValres($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setVallib($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setValrex($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setCosrep($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setDepmen($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setDepacu($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setStamue($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setCodalt($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setFecrcp($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setValadi($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setAumviduti($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setDimviduti($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setStasem($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setStainm($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setCodresuso($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setCodrespat($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setTippro($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setLogusu($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setNumord($arr[$keys[56]]);
		if (array_key_exists($keys[57], $arr)) $this->setCodubiadm($arr[$keys[57]]);
		if (array_key_exists($keys[58], $arr)) $this->setId($arr[$keys[58]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnregmuePeer::DATABASE_NAME);

		if ($this->isColumnModified(BnregmuePeer::CODACT)) $criteria->add(BnregmuePeer::CODACT, $this->codact);
		if ($this->isColumnModified(BnregmuePeer::CODMUE)) $criteria->add(BnregmuePeer::CODMUE, $this->codmue);
		if ($this->isColumnModified(BnregmuePeer::DESMUE)) $criteria->add(BnregmuePeer::DESMUE, $this->desmue);
		if ($this->isColumnModified(BnregmuePeer::CODPRO)) $criteria->add(BnregmuePeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(BnregmuePeer::ORDCOM)) $criteria->add(BnregmuePeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(BnregmuePeer::FECREG)) $criteria->add(BnregmuePeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(BnregmuePeer::FECCOM)) $criteria->add(BnregmuePeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(BnregmuePeer::FECDEP)) $criteria->add(BnregmuePeer::FECDEP, $this->fecdep);
		if ($this->isColumnModified(BnregmuePeer::FECAJU)) $criteria->add(BnregmuePeer::FECAJU, $this->fecaju);
		if ($this->isColumnModified(BnregmuePeer::FECACT)) $criteria->add(BnregmuePeer::FECACT, $this->fecact);
		if ($this->isColumnModified(BnregmuePeer::FECEXP)) $criteria->add(BnregmuePeer::FECEXP, $this->fecexp);
		if ($this->isColumnModified(BnregmuePeer::ORDRCP)) $criteria->add(BnregmuePeer::ORDRCP, $this->ordrcp);
		if ($this->isColumnModified(BnregmuePeer::FOTMUE)) $criteria->add(BnregmuePeer::FOTMUE, $this->fotmue);
		if ($this->isColumnModified(BnregmuePeer::MARMUE)) $criteria->add(BnregmuePeer::MARMUE, $this->marmue);
		if ($this->isColumnModified(BnregmuePeer::MODMUE)) $criteria->add(BnregmuePeer::MODMUE, $this->modmue);
		if ($this->isColumnModified(BnregmuePeer::ANOMUE)) $criteria->add(BnregmuePeer::ANOMUE, $this->anomue);
		if ($this->isColumnModified(BnregmuePeer::COLMUE)) $criteria->add(BnregmuePeer::COLMUE, $this->colmue);
		if ($this->isColumnModified(BnregmuePeer::CODUBI)) $criteria->add(BnregmuePeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(BnregmuePeer::PESMUE)) $criteria->add(BnregmuePeer::PESMUE, $this->pesmue);
		if ($this->isColumnModified(BnregmuePeer::CAPMUE)) $criteria->add(BnregmuePeer::CAPMUE, $this->capmue);
		if ($this->isColumnModified(BnregmuePeer::TIPMUE)) $criteria->add(BnregmuePeer::TIPMUE, $this->tipmue);
		if ($this->isColumnModified(BnregmuePeer::VIDUTI)) $criteria->add(BnregmuePeer::VIDUTI, $this->viduti);
		if ($this->isColumnModified(BnregmuePeer::LNGMUE)) $criteria->add(BnregmuePeer::LNGMUE, $this->lngmue);
		if ($this->isColumnModified(BnregmuePeer::NROPIE)) $criteria->add(BnregmuePeer::NROPIE, $this->nropie);
		if ($this->isColumnModified(BnregmuePeer::SERMUE)) $criteria->add(BnregmuePeer::SERMUE, $this->sermue);
		if ($this->isColumnModified(BnregmuePeer::USOMUE)) $criteria->add(BnregmuePeer::USOMUE, $this->usomue);
		if ($this->isColumnModified(BnregmuePeer::ALTMUE)) $criteria->add(BnregmuePeer::ALTMUE, $this->altmue);
		if ($this->isColumnModified(BnregmuePeer::LARMUE)) $criteria->add(BnregmuePeer::LARMUE, $this->larmue);
		if ($this->isColumnModified(BnregmuePeer::ANCMUE)) $criteria->add(BnregmuePeer::ANCMUE, $this->ancmue);
		if ($this->isColumnModified(BnregmuePeer::CODDIS)) $criteria->add(BnregmuePeer::CODDIS, $this->coddis);
		if ($this->isColumnModified(BnregmuePeer::DETMUE)) $criteria->add(BnregmuePeer::DETMUE, $this->detmue);
		if ($this->isColumnModified(BnregmuePeer::EDOMUE)) $criteria->add(BnregmuePeer::EDOMUE, $this->edomue);
		if ($this->isColumnModified(BnregmuePeer::MUNMUE)) $criteria->add(BnregmuePeer::MUNMUE, $this->munmue);
		if ($this->isColumnModified(BnregmuePeer::DEPMUE)) $criteria->add(BnregmuePeer::DEPMUE, $this->depmue);
		if ($this->isColumnModified(BnregmuePeer::DIRMUE)) $criteria->add(BnregmuePeer::DIRMUE, $this->dirmue);
		if ($this->isColumnModified(BnregmuePeer::UBIMUE)) $criteria->add(BnregmuePeer::UBIMUE, $this->ubimue);
		if ($this->isColumnModified(BnregmuePeer::MESDEP)) $criteria->add(BnregmuePeer::MESDEP, $this->mesdep);
		if ($this->isColumnModified(BnregmuePeer::VALINI)) $criteria->add(BnregmuePeer::VALINI, $this->valini);
		if ($this->isColumnModified(BnregmuePeer::VALRES)) $criteria->add(BnregmuePeer::VALRES, $this->valres);
		if ($this->isColumnModified(BnregmuePeer::VALLIB)) $criteria->add(BnregmuePeer::VALLIB, $this->vallib);
		if ($this->isColumnModified(BnregmuePeer::VALREX)) $criteria->add(BnregmuePeer::VALREX, $this->valrex);
		if ($this->isColumnModified(BnregmuePeer::COSREP)) $criteria->add(BnregmuePeer::COSREP, $this->cosrep);
		if ($this->isColumnModified(BnregmuePeer::DEPMEN)) $criteria->add(BnregmuePeer::DEPMEN, $this->depmen);
		if ($this->isColumnModified(BnregmuePeer::DEPACU)) $criteria->add(BnregmuePeer::DEPACU, $this->depacu);
		if ($this->isColumnModified(BnregmuePeer::STAMUE)) $criteria->add(BnregmuePeer::STAMUE, $this->stamue);
		if ($this->isColumnModified(BnregmuePeer::CODALT)) $criteria->add(BnregmuePeer::CODALT, $this->codalt);
		if ($this->isColumnModified(BnregmuePeer::FECRCP)) $criteria->add(BnregmuePeer::FECRCP, $this->fecrcp);
		if ($this->isColumnModified(BnregmuePeer::VALADI)) $criteria->add(BnregmuePeer::VALADI, $this->valadi);
		if ($this->isColumnModified(BnregmuePeer::AUMVIDUTI)) $criteria->add(BnregmuePeer::AUMVIDUTI, $this->aumviduti);
		if ($this->isColumnModified(BnregmuePeer::DIMVIDUTI)) $criteria->add(BnregmuePeer::DIMVIDUTI, $this->dimviduti);
		if ($this->isColumnModified(BnregmuePeer::STASEM)) $criteria->add(BnregmuePeer::STASEM, $this->stasem);
		if ($this->isColumnModified(BnregmuePeer::STAINM)) $criteria->add(BnregmuePeer::STAINM, $this->stainm);
		if ($this->isColumnModified(BnregmuePeer::CODRESUSO)) $criteria->add(BnregmuePeer::CODRESUSO, $this->codresuso);
		if ($this->isColumnModified(BnregmuePeer::CODRESPAT)) $criteria->add(BnregmuePeer::CODRESPAT, $this->codrespat);
		if ($this->isColumnModified(BnregmuePeer::TIPPRO)) $criteria->add(BnregmuePeer::TIPPRO, $this->tippro);
		if ($this->isColumnModified(BnregmuePeer::LOGUSU)) $criteria->add(BnregmuePeer::LOGUSU, $this->logusu);
		if ($this->isColumnModified(BnregmuePeer::NUMORD)) $criteria->add(BnregmuePeer::NUMORD, $this->numord);
		if ($this->isColumnModified(BnregmuePeer::CODUBIADM)) $criteria->add(BnregmuePeer::CODUBIADM, $this->codubiadm);
		if ($this->isColumnModified(BnregmuePeer::ID)) $criteria->add(BnregmuePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnregmuePeer::DATABASE_NAME);

		$criteria->add(BnregmuePeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setCodmue($this->codmue);

		$copyObj->setDesmue($this->desmue);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setOrdcom($this->ordcom);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setFecdep($this->fecdep);

		$copyObj->setFecaju($this->fecaju);

		$copyObj->setFecact($this->fecact);

		$copyObj->setFecexp($this->fecexp);

		$copyObj->setOrdrcp($this->ordrcp);

		$copyObj->setFotmue($this->fotmue);

		$copyObj->setMarmue($this->marmue);

		$copyObj->setModmue($this->modmue);

		$copyObj->setAnomue($this->anomue);

		$copyObj->setColmue($this->colmue);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setPesmue($this->pesmue);

		$copyObj->setCapmue($this->capmue);

		$copyObj->setTipmue($this->tipmue);

		$copyObj->setViduti($this->viduti);

		$copyObj->setLngmue($this->lngmue);

		$copyObj->setNropie($this->nropie);

		$copyObj->setSermue($this->sermue);

		$copyObj->setUsomue($this->usomue);

		$copyObj->setAltmue($this->altmue);

		$copyObj->setLarmue($this->larmue);

		$copyObj->setAncmue($this->ancmue);

		$copyObj->setCoddis($this->coddis);

		$copyObj->setDetmue($this->detmue);

		$copyObj->setEdomue($this->edomue);

		$copyObj->setMunmue($this->munmue);

		$copyObj->setDepmue($this->depmue);

		$copyObj->setDirmue($this->dirmue);

		$copyObj->setUbimue($this->ubimue);

		$copyObj->setMesdep($this->mesdep);

		$copyObj->setValini($this->valini);

		$copyObj->setValres($this->valres);

		$copyObj->setVallib($this->vallib);

		$copyObj->setValrex($this->valrex);

		$copyObj->setCosrep($this->cosrep);

		$copyObj->setDepmen($this->depmen);

		$copyObj->setDepacu($this->depacu);

		$copyObj->setStamue($this->stamue);

		$copyObj->setCodalt($this->codalt);

		$copyObj->setFecrcp($this->fecrcp);

		$copyObj->setValadi($this->valadi);

		$copyObj->setAumviduti($this->aumviduti);

		$copyObj->setDimviduti($this->dimviduti);

		$copyObj->setStasem($this->stasem);

		$copyObj->setStainm($this->stainm);

		$copyObj->setCodresuso($this->codresuso);

		$copyObj->setCodrespat($this->codrespat);

		$copyObj->setTippro($this->tippro);

		$copyObj->setLogusu($this->logusu);

		$copyObj->setNumord($this->numord);

		$copyObj->setCodubiadm($this->codubiadm);


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
			self::$peer = new BnregmuePeer();
		}
		return self::$peer;
	}

} 