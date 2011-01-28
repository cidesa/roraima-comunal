<?php


abstract class BaseFcinmcam extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nroinm;


	
	protected $codcatfis;


	
	protected $coduso;


	
	protected $codcarinm;


	
	protected $codsitinm;


	
	protected $rifcon;


	
	protected $fecpag;


	
	protected $feccal;


	
	protected $fecreg;


	
	protected $dirinm;


	
	protected $linnor;


	
	protected $linsur;


	
	protected $linest;


	
	protected $linoes;


	
	protected $mtrter;


	
	protected $mtrcon;


	
	protected $bster;


	
	protected $bscon;


	
	protected $docpro;


	
	protected $rifrep;


	
	protected $funrec;


	
	protected $fecrec;


	
	protected $estinm;


	
	protected $estdec;


	
	protected $codcatinm;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $clacon;


	
	protected $fecadq;


	
	protected $valinm;


	
	protected $codman;


	
	protected $codsec;


	
	protected $codpar;


	
	protected $nroinmant;


	
	protected $totter;


	
	protected $totcon;


	
	protected $total;


	
	protected $codtip;


	
	protected $codzon;


	
	protected $destip;


	
	protected $deszon;


	
	protected $anual;


	
	protected $folio;


	
	protected $tomo;


	
	protected $numdoc;


	
	protected $fecdoc;


	
	protected $usoinm;


	
	protected $desde;


	
	protected $hasta;


	
	protected $ord;


	
	protected $art;


	
	protected $fecdir;


	
	protected $fecava;


	
	protected $dirinm1;


	
	protected $fecela;


	
	protected $tri;


	
	protected $prot;


	
	protected $tipobol;


	
	protected $nomsitinm;


	
	protected $impanu;


	
	protected $imptri;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNroinm()
  {

    return trim($this->nroinm);

  }
  
  public function getCodcatfis()
  {

    return trim($this->codcatfis);

  }
  
  public function getCoduso()
  {

    return trim($this->coduso);

  }
  
  public function getCodcarinm()
  {

    return trim($this->codcarinm);

  }
  
  public function getCodsitinm()
  {

    return trim($this->codsitinm);

  }
  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getFecpag($format = 'Y-m-d')
  {

    if ($this->fecpag === null || $this->fecpag === '') {
      return null;
    } elseif (!is_int($this->fecpag)) {
            $ts = adodb_strtotime($this->fecpag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpag] as date/time value: " . var_export($this->fecpag, true));
      }
    } else {
      $ts = $this->fecpag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccal($format = 'Y-m-d')
  {

    if ($this->feccal === null || $this->feccal === '') {
      return null;
    } elseif (!is_int($this->feccal)) {
            $ts = adodb_strtotime($this->feccal);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccal] as date/time value: " . var_export($this->feccal, true));
      }
    } else {
      $ts = $this->feccal;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
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

  
  public function getDirinm()
  {

    return trim($this->dirinm);

  }
  
  public function getLinnor()
  {

    return trim($this->linnor);

  }
  
  public function getLinsur()
  {

    return trim($this->linsur);

  }
  
  public function getLinest()
  {

    return trim($this->linest);

  }
  
  public function getLinoes()
  {

    return trim($this->linoes);

  }
  
  public function getMtrter($val=false)
  {

    if($val) return number_format($this->mtrter,2,',','.');
    else return $this->mtrter;

  }
  
  public function getMtrcon($val=false)
  {

    if($val) return number_format($this->mtrcon,2,',','.');
    else return $this->mtrcon;

  }
  
  public function getBster($val=false)
  {

    if($val) return number_format($this->bster,2,',','.');
    else return $this->bster;

  }
  
  public function getBscon($val=false)
  {

    if($val) return number_format($this->bscon,2,',','.');
    else return $this->bscon;

  }
  
  public function getDocpro()
  {

    return trim($this->docpro);

  }
  
  public function getRifrep()
  {

    return trim($this->rifrep);

  }
  
  public function getFunrec()
  {

    return trim($this->funrec);

  }
  
  public function getFecrec($format = 'Y-m-d')
  {

    if ($this->fecrec === null || $this->fecrec === '') {
      return null;
    } elseif (!is_int($this->fecrec)) {
            $ts = adodb_strtotime($this->fecrec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
      }
    } else {
      $ts = $this->fecrec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getEstinm()
  {

    return trim($this->estinm);

  }
  
  public function getEstdec()
  {

    return trim($this->estdec);

  }
  
  public function getCodcatinm()
  {

    return trim($this->codcatinm);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getDircon()
  {

    return trim($this->dircon);

  }
  
  public function getClacon()
  {

    return trim($this->clacon);

  }
  
  public function getFecadq($format = 'Y-m-d')
  {

    if ($this->fecadq === null || $this->fecadq === '') {
      return null;
    } elseif (!is_int($this->fecadq)) {
            $ts = adodb_strtotime($this->fecadq);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecadq] as date/time value: " . var_export($this->fecadq, true));
      }
    } else {
      $ts = $this->fecadq;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getValinm($val=false)
  {

    if($val) return number_format($this->valinm,2,',','.');
    else return $this->valinm;

  }
  
  public function getCodman()
  {

    return trim($this->codman);

  }
  
  public function getCodsec()
  {

    return trim($this->codsec);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getNroinmant()
  {

    return trim($this->nroinmant);

  }
  
  public function getTotter($val=false)
  {

    if($val) return number_format($this->totter,2,',','.');
    else return $this->totter;

  }
  
  public function getTotcon($val=false)
  {

    if($val) return number_format($this->totcon,2,',','.');
    else return $this->totcon;

  }
  
  public function getTotal($val=false)
  {

    if($val) return number_format($this->total,2,',','.');
    else return $this->total;

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getCodzon($val=false)
  {

    if($val) return number_format($this->codzon,2,',','.');
    else return $this->codzon;

  }
  
  public function getDestip()
  {

    return trim($this->destip);

  }
  
  public function getDeszon()
  {

    return trim($this->deszon);

  }
  
  public function getAnual($val=false)
  {

    if($val) return number_format($this->anual,2,',','.');
    else return $this->anual;

  }
  
  public function getFolio()
  {

    return trim($this->folio);

  }
  
  public function getTomo()
  {

    return trim($this->tomo);

  }
  
  public function getNumdoc($val=false)
  {

    if($val) return number_format($this->numdoc,2,',','.');
    else return $this->numdoc;

  }
  
  public function getFecdoc($format = 'Y-m-d')
  {

    if ($this->fecdoc === null || $this->fecdoc === '') {
      return null;
    } elseif (!is_int($this->fecdoc)) {
            $ts = adodb_strtotime($this->fecdoc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdoc] as date/time value: " . var_export($this->fecdoc, true));
      }
    } else {
      $ts = $this->fecdoc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUsoinm()
  {

    return trim($this->usoinm);

  }
  
  public function getDesde()
  {

    return trim($this->desde);

  }
  
  public function getHasta()
  {

    return trim($this->hasta);

  }
  
  public function getOrd()
  {

    return trim($this->ord);

  }
  
  public function getArt()
  {

    return trim($this->art);

  }
  
  public function getFecdir($format = 'Y-m-d')
  {

    if ($this->fecdir === null || $this->fecdir === '') {
      return null;
    } elseif (!is_int($this->fecdir)) {
            $ts = adodb_strtotime($this->fecdir);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdir] as date/time value: " . var_export($this->fecdir, true));
      }
    } else {
      $ts = $this->fecdir;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecava($format = 'Y-m-d')
  {

    if ($this->fecava === null || $this->fecava === '') {
      return null;
    } elseif (!is_int($this->fecava)) {
            $ts = adodb_strtotime($this->fecava);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecava] as date/time value: " . var_export($this->fecava, true));
      }
    } else {
      $ts = $this->fecava;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDirinm1()
  {

    return trim($this->dirinm1);

  }
  
  public function getFecela($format = 'Y-m-d')
  {

    if ($this->fecela === null || $this->fecela === '') {
      return null;
    } elseif (!is_int($this->fecela)) {
            $ts = adodb_strtotime($this->fecela);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecela] as date/time value: " . var_export($this->fecela, true));
      }
    } else {
      $ts = $this->fecela;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTri()
  {

    return trim($this->tri);

  }
  
  public function getProt()
  {

    return trim($this->prot);

  }
  
  public function getTipobol()
  {

    return trim($this->tipobol);

  }
  
  public function getNomsitinm()
  {

    return trim($this->nomsitinm);

  }
  
  public function getImpanu($val=false)
  {

    if($val) return number_format($this->impanu,2,',','.');
    else return $this->impanu;

  }
  
  public function getImptri($val=false)
  {

    if($val) return number_format($this->imptri,2,',','.');
    else return $this->imptri;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNroinm($v)
	{

    if ($this->nroinm !== $v) {
        $this->nroinm = $v;
        $this->modifiedColumns[] = FcinmcamPeer::NROINM;
      }
  
	} 
	
	public function setCodcatfis($v)
	{

    if ($this->codcatfis !== $v) {
        $this->codcatfis = $v;
        $this->modifiedColumns[] = FcinmcamPeer::CODCATFIS;
      }
  
	} 
	
	public function setCoduso($v)
	{

    if ($this->coduso !== $v) {
        $this->coduso = $v;
        $this->modifiedColumns[] = FcinmcamPeer::CODUSO;
      }
  
	} 
	
	public function setCodcarinm($v)
	{

    if ($this->codcarinm !== $v) {
        $this->codcarinm = $v;
        $this->modifiedColumns[] = FcinmcamPeer::CODCARINM;
      }
  
	} 
	
	public function setCodsitinm($v)
	{

    if ($this->codsitinm !== $v) {
        $this->codsitinm = $v;
        $this->modifiedColumns[] = FcinmcamPeer::CODSITINM;
      }
  
	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcinmcamPeer::RIFCON;
      }
  
	} 
	
	public function setFecpag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpag !== $ts) {
      $this->fecpag = $ts;
      $this->modifiedColumns[] = FcinmcamPeer::FECPAG;
    }

	} 
	
	public function setFeccal($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccal] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccal !== $ts) {
      $this->feccal = $ts;
      $this->modifiedColumns[] = FcinmcamPeer::FECCAL;
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
      $this->modifiedColumns[] = FcinmcamPeer::FECREG;
    }

	} 
	
	public function setDirinm($v)
	{

    if ($this->dirinm !== $v) {
        $this->dirinm = $v;
        $this->modifiedColumns[] = FcinmcamPeer::DIRINM;
      }
  
	} 
	
	public function setLinnor($v)
	{

    if ($this->linnor !== $v) {
        $this->linnor = $v;
        $this->modifiedColumns[] = FcinmcamPeer::LINNOR;
      }
  
	} 
	
	public function setLinsur($v)
	{

    if ($this->linsur !== $v) {
        $this->linsur = $v;
        $this->modifiedColumns[] = FcinmcamPeer::LINSUR;
      }
  
	} 
	
	public function setLinest($v)
	{

    if ($this->linest !== $v) {
        $this->linest = $v;
        $this->modifiedColumns[] = FcinmcamPeer::LINEST;
      }
  
	} 
	
	public function setLinoes($v)
	{

    if ($this->linoes !== $v) {
        $this->linoes = $v;
        $this->modifiedColumns[] = FcinmcamPeer::LINOES;
      }
  
	} 
	
	public function setMtrter($v)
	{

    if ($this->mtrter !== $v) {
        $this->mtrter = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcinmcamPeer::MTRTER;
      }
  
	} 
	
	public function setMtrcon($v)
	{

    if ($this->mtrcon !== $v) {
        $this->mtrcon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcinmcamPeer::MTRCON;
      }
  
	} 
	
	public function setBster($v)
	{

    if ($this->bster !== $v) {
        $this->bster = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcinmcamPeer::BSTER;
      }
  
	} 
	
	public function setBscon($v)
	{

    if ($this->bscon !== $v) {
        $this->bscon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcinmcamPeer::BSCON;
      }
  
	} 
	
	public function setDocpro($v)
	{

    if ($this->docpro !== $v) {
        $this->docpro = $v;
        $this->modifiedColumns[] = FcinmcamPeer::DOCPRO;
      }
  
	} 
	
	public function setRifrep($v)
	{

    if ($this->rifrep !== $v) {
        $this->rifrep = $v;
        $this->modifiedColumns[] = FcinmcamPeer::RIFREP;
      }
  
	} 
	
	public function setFunrec($v)
	{

    if ($this->funrec !== $v) {
        $this->funrec = $v;
        $this->modifiedColumns[] = FcinmcamPeer::FUNREC;
      }
  
	} 
	
	public function setFecrec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrec !== $ts) {
      $this->fecrec = $ts;
      $this->modifiedColumns[] = FcinmcamPeer::FECREC;
    }

	} 
	
	public function setEstinm($v)
	{

    if ($this->estinm !== $v) {
        $this->estinm = $v;
        $this->modifiedColumns[] = FcinmcamPeer::ESTINM;
      }
  
	} 
	
	public function setEstdec($v)
	{

    if ($this->estdec !== $v) {
        $this->estdec = $v;
        $this->modifiedColumns[] = FcinmcamPeer::ESTDEC;
      }
  
	} 
	
	public function setCodcatinm($v)
	{

    if ($this->codcatinm !== $v) {
        $this->codcatinm = $v;
        $this->modifiedColumns[] = FcinmcamPeer::CODCATINM;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = FcinmcamPeer::NOMCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = FcinmcamPeer::DIRCON;
      }
  
	} 
	
	public function setClacon($v)
	{

    if ($this->clacon !== $v) {
        $this->clacon = $v;
        $this->modifiedColumns[] = FcinmcamPeer::CLACON;
      }
  
	} 
	
	public function setFecadq($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecadq] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecadq !== $ts) {
      $this->fecadq = $ts;
      $this->modifiedColumns[] = FcinmcamPeer::FECADQ;
    }

	} 
	
	public function setValinm($v)
	{

    if ($this->valinm !== $v) {
        $this->valinm = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcinmcamPeer::VALINM;
      }
  
	} 
	
	public function setCodman($v)
	{

    if ($this->codman !== $v) {
        $this->codman = $v;
        $this->modifiedColumns[] = FcinmcamPeer::CODMAN;
      }
  
	} 
	
	public function setCodsec($v)
	{

    if ($this->codsec !== $v) {
        $this->codsec = $v;
        $this->modifiedColumns[] = FcinmcamPeer::CODSEC;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = FcinmcamPeer::CODPAR;
      }
  
	} 
	
	public function setNroinmant($v)
	{

    if ($this->nroinmant !== $v) {
        $this->nroinmant = $v;
        $this->modifiedColumns[] = FcinmcamPeer::NROINMANT;
      }
  
	} 
	
	public function setTotter($v)
	{

    if ($this->totter !== $v) {
        $this->totter = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcinmcamPeer::TOTTER;
      }
  
	} 
	
	public function setTotcon($v)
	{

    if ($this->totcon !== $v) {
        $this->totcon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcinmcamPeer::TOTCON;
      }
  
	} 
	
	public function setTotal($v)
	{

    if ($this->total !== $v) {
        $this->total = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcinmcamPeer::TOTAL;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = FcinmcamPeer::CODTIP;
      }
  
	} 
	
	public function setCodzon($v)
	{

    if ($this->codzon !== $v) {
        $this->codzon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcinmcamPeer::CODZON;
      }
  
	} 
	
	public function setDestip($v)
	{

    if ($this->destip !== $v) {
        $this->destip = $v;
        $this->modifiedColumns[] = FcinmcamPeer::DESTIP;
      }
  
	} 
	
	public function setDeszon($v)
	{

    if ($this->deszon !== $v) {
        $this->deszon = $v;
        $this->modifiedColumns[] = FcinmcamPeer::DESZON;
      }
  
	} 
	
	public function setAnual($v)
	{

    if ($this->anual !== $v) {
        $this->anual = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcinmcamPeer::ANUAL;
      }
  
	} 
	
	public function setFolio($v)
	{

    if ($this->folio !== $v) {
        $this->folio = $v;
        $this->modifiedColumns[] = FcinmcamPeer::FOLIO;
      }
  
	} 
	
	public function setTomo($v)
	{

    if ($this->tomo !== $v) {
        $this->tomo = $v;
        $this->modifiedColumns[] = FcinmcamPeer::TOMO;
      }
  
	} 
	
	public function setNumdoc($v)
	{

    if ($this->numdoc !== $v) {
        $this->numdoc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcinmcamPeer::NUMDOC;
      }
  
	} 
	
	public function setFecdoc($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdoc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdoc !== $ts) {
      $this->fecdoc = $ts;
      $this->modifiedColumns[] = FcinmcamPeer::FECDOC;
    }

	} 
	
	public function setUsoinm($v)
	{

    if ($this->usoinm !== $v) {
        $this->usoinm = $v;
        $this->modifiedColumns[] = FcinmcamPeer::USOINM;
      }
  
	} 
	
	public function setDesde($v)
	{

    if ($this->desde !== $v) {
        $this->desde = $v;
        $this->modifiedColumns[] = FcinmcamPeer::DESDE;
      }
  
	} 
	
	public function setHasta($v)
	{

    if ($this->hasta !== $v) {
        $this->hasta = $v;
        $this->modifiedColumns[] = FcinmcamPeer::HASTA;
      }
  
	} 
	
	public function setOrd($v)
	{

    if ($this->ord !== $v) {
        $this->ord = $v;
        $this->modifiedColumns[] = FcinmcamPeer::ORD;
      }
  
	} 
	
	public function setArt($v)
	{

    if ($this->art !== $v) {
        $this->art = $v;
        $this->modifiedColumns[] = FcinmcamPeer::ART;
      }
  
	} 
	
	public function setFecdir($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdir] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdir !== $ts) {
      $this->fecdir = $ts;
      $this->modifiedColumns[] = FcinmcamPeer::FECDIR;
    }

	} 
	
	public function setFecava($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecava] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecava !== $ts) {
      $this->fecava = $ts;
      $this->modifiedColumns[] = FcinmcamPeer::FECAVA;
    }

	} 
	
	public function setDirinm1($v)
	{

    if ($this->dirinm1 !== $v) {
        $this->dirinm1 = $v;
        $this->modifiedColumns[] = FcinmcamPeer::DIRINM1;
      }
  
	} 
	
	public function setFecela($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecela] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecela !== $ts) {
      $this->fecela = $ts;
      $this->modifiedColumns[] = FcinmcamPeer::FECELA;
    }

	} 
	
	public function setTri($v)
	{

    if ($this->tri !== $v) {
        $this->tri = $v;
        $this->modifiedColumns[] = FcinmcamPeer::TRI;
      }
  
	} 
	
	public function setProt($v)
	{

    if ($this->prot !== $v) {
        $this->prot = $v;
        $this->modifiedColumns[] = FcinmcamPeer::PROT;
      }
  
	} 
	
	public function setTipobol($v)
	{

    if ($this->tipobol !== $v) {
        $this->tipobol = $v;
        $this->modifiedColumns[] = FcinmcamPeer::TIPOBOL;
      }
  
	} 
	
	public function setNomsitinm($v)
	{

    if ($this->nomsitinm !== $v) {
        $this->nomsitinm = $v;
        $this->modifiedColumns[] = FcinmcamPeer::NOMSITINM;
      }
  
	} 
	
	public function setImpanu($v)
	{

    if ($this->impanu !== $v) {
        $this->impanu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcinmcamPeer::IMPANU;
      }
  
	} 
	
	public function setImptri($v)
	{

    if ($this->imptri !== $v) {
        $this->imptri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcinmcamPeer::IMPTRI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcinmcamPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nroinm = $rs->getString($startcol + 0);

      $this->codcatfis = $rs->getString($startcol + 1);

      $this->coduso = $rs->getString($startcol + 2);

      $this->codcarinm = $rs->getString($startcol + 3);

      $this->codsitinm = $rs->getString($startcol + 4);

      $this->rifcon = $rs->getString($startcol + 5);

      $this->fecpag = $rs->getDate($startcol + 6, null);

      $this->feccal = $rs->getDate($startcol + 7, null);

      $this->fecreg = $rs->getDate($startcol + 8, null);

      $this->dirinm = $rs->getString($startcol + 9);

      $this->linnor = $rs->getString($startcol + 10);

      $this->linsur = $rs->getString($startcol + 11);

      $this->linest = $rs->getString($startcol + 12);

      $this->linoes = $rs->getString($startcol + 13);

      $this->mtrter = $rs->getFloat($startcol + 14);

      $this->mtrcon = $rs->getFloat($startcol + 15);

      $this->bster = $rs->getFloat($startcol + 16);

      $this->bscon = $rs->getFloat($startcol + 17);

      $this->docpro = $rs->getString($startcol + 18);

      $this->rifrep = $rs->getString($startcol + 19);

      $this->funrec = $rs->getString($startcol + 20);

      $this->fecrec = $rs->getDate($startcol + 21, null);

      $this->estinm = $rs->getString($startcol + 22);

      $this->estdec = $rs->getString($startcol + 23);

      $this->codcatinm = $rs->getString($startcol + 24);

      $this->nomcon = $rs->getString($startcol + 25);

      $this->dircon = $rs->getString($startcol + 26);

      $this->clacon = $rs->getString($startcol + 27);

      $this->fecadq = $rs->getDate($startcol + 28, null);

      $this->valinm = $rs->getFloat($startcol + 29);

      $this->codman = $rs->getString($startcol + 30);

      $this->codsec = $rs->getString($startcol + 31);

      $this->codpar = $rs->getString($startcol + 32);

      $this->nroinmant = $rs->getString($startcol + 33);

      $this->totter = $rs->getFloat($startcol + 34);

      $this->totcon = $rs->getFloat($startcol + 35);

      $this->total = $rs->getFloat($startcol + 36);

      $this->codtip = $rs->getString($startcol + 37);

      $this->codzon = $rs->getFloat($startcol + 38);

      $this->destip = $rs->getString($startcol + 39);

      $this->deszon = $rs->getString($startcol + 40);

      $this->anual = $rs->getFloat($startcol + 41);

      $this->folio = $rs->getString($startcol + 42);

      $this->tomo = $rs->getString($startcol + 43);

      $this->numdoc = $rs->getFloat($startcol + 44);

      $this->fecdoc = $rs->getDate($startcol + 45, null);

      $this->usoinm = $rs->getString($startcol + 46);

      $this->desde = $rs->getString($startcol + 47);

      $this->hasta = $rs->getString($startcol + 48);

      $this->ord = $rs->getString($startcol + 49);

      $this->art = $rs->getString($startcol + 50);

      $this->fecdir = $rs->getDate($startcol + 51, null);

      $this->fecava = $rs->getDate($startcol + 52, null);

      $this->dirinm1 = $rs->getString($startcol + 53);

      $this->fecela = $rs->getDate($startcol + 54, null);

      $this->tri = $rs->getString($startcol + 55);

      $this->prot = $rs->getString($startcol + 56);

      $this->tipobol = $rs->getString($startcol + 57);

      $this->nomsitinm = $rs->getString($startcol + 58);

      $this->impanu = $rs->getFloat($startcol + 59);

      $this->imptri = $rs->getFloat($startcol + 60);

      $this->id = $rs->getInt($startcol + 61);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 62; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcinmcam object", $e);
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
			$con = Propel::getConnection(FcinmcamPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcinmcamPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcinmcamPeer::DATABASE_NAME);
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
					$pk = FcinmcamPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcinmcamPeer::doUpdate($this, $con);
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


			if (($retval = FcinmcamPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcinmcamPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNroinm();
				break;
			case 1:
				return $this->getCodcatfis();
				break;
			case 2:
				return $this->getCoduso();
				break;
			case 3:
				return $this->getCodcarinm();
				break;
			case 4:
				return $this->getCodsitinm();
				break;
			case 5:
				return $this->getRifcon();
				break;
			case 6:
				return $this->getFecpag();
				break;
			case 7:
				return $this->getFeccal();
				break;
			case 8:
				return $this->getFecreg();
				break;
			case 9:
				return $this->getDirinm();
				break;
			case 10:
				return $this->getLinnor();
				break;
			case 11:
				return $this->getLinsur();
				break;
			case 12:
				return $this->getLinest();
				break;
			case 13:
				return $this->getLinoes();
				break;
			case 14:
				return $this->getMtrter();
				break;
			case 15:
				return $this->getMtrcon();
				break;
			case 16:
				return $this->getBster();
				break;
			case 17:
				return $this->getBscon();
				break;
			case 18:
				return $this->getDocpro();
				break;
			case 19:
				return $this->getRifrep();
				break;
			case 20:
				return $this->getFunrec();
				break;
			case 21:
				return $this->getFecrec();
				break;
			case 22:
				return $this->getEstinm();
				break;
			case 23:
				return $this->getEstdec();
				break;
			case 24:
				return $this->getCodcatinm();
				break;
			case 25:
				return $this->getNomcon();
				break;
			case 26:
				return $this->getDircon();
				break;
			case 27:
				return $this->getClacon();
				break;
			case 28:
				return $this->getFecadq();
				break;
			case 29:
				return $this->getValinm();
				break;
			case 30:
				return $this->getCodman();
				break;
			case 31:
				return $this->getCodsec();
				break;
			case 32:
				return $this->getCodpar();
				break;
			case 33:
				return $this->getNroinmant();
				break;
			case 34:
				return $this->getTotter();
				break;
			case 35:
				return $this->getTotcon();
				break;
			case 36:
				return $this->getTotal();
				break;
			case 37:
				return $this->getCodtip();
				break;
			case 38:
				return $this->getCodzon();
				break;
			case 39:
				return $this->getDestip();
				break;
			case 40:
				return $this->getDeszon();
				break;
			case 41:
				return $this->getAnual();
				break;
			case 42:
				return $this->getFolio();
				break;
			case 43:
				return $this->getTomo();
				break;
			case 44:
				return $this->getNumdoc();
				break;
			case 45:
				return $this->getFecdoc();
				break;
			case 46:
				return $this->getUsoinm();
				break;
			case 47:
				return $this->getDesde();
				break;
			case 48:
				return $this->getHasta();
				break;
			case 49:
				return $this->getOrd();
				break;
			case 50:
				return $this->getArt();
				break;
			case 51:
				return $this->getFecdir();
				break;
			case 52:
				return $this->getFecava();
				break;
			case 53:
				return $this->getDirinm1();
				break;
			case 54:
				return $this->getFecela();
				break;
			case 55:
				return $this->getTri();
				break;
			case 56:
				return $this->getProt();
				break;
			case 57:
				return $this->getTipobol();
				break;
			case 58:
				return $this->getNomsitinm();
				break;
			case 59:
				return $this->getImpanu();
				break;
			case 60:
				return $this->getImptri();
				break;
			case 61:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcinmcamPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNroinm(),
			$keys[1] => $this->getCodcatfis(),
			$keys[2] => $this->getCoduso(),
			$keys[3] => $this->getCodcarinm(),
			$keys[4] => $this->getCodsitinm(),
			$keys[5] => $this->getRifcon(),
			$keys[6] => $this->getFecpag(),
			$keys[7] => $this->getFeccal(),
			$keys[8] => $this->getFecreg(),
			$keys[9] => $this->getDirinm(),
			$keys[10] => $this->getLinnor(),
			$keys[11] => $this->getLinsur(),
			$keys[12] => $this->getLinest(),
			$keys[13] => $this->getLinoes(),
			$keys[14] => $this->getMtrter(),
			$keys[15] => $this->getMtrcon(),
			$keys[16] => $this->getBster(),
			$keys[17] => $this->getBscon(),
			$keys[18] => $this->getDocpro(),
			$keys[19] => $this->getRifrep(),
			$keys[20] => $this->getFunrec(),
			$keys[21] => $this->getFecrec(),
			$keys[22] => $this->getEstinm(),
			$keys[23] => $this->getEstdec(),
			$keys[24] => $this->getCodcatinm(),
			$keys[25] => $this->getNomcon(),
			$keys[26] => $this->getDircon(),
			$keys[27] => $this->getClacon(),
			$keys[28] => $this->getFecadq(),
			$keys[29] => $this->getValinm(),
			$keys[30] => $this->getCodman(),
			$keys[31] => $this->getCodsec(),
			$keys[32] => $this->getCodpar(),
			$keys[33] => $this->getNroinmant(),
			$keys[34] => $this->getTotter(),
			$keys[35] => $this->getTotcon(),
			$keys[36] => $this->getTotal(),
			$keys[37] => $this->getCodtip(),
			$keys[38] => $this->getCodzon(),
			$keys[39] => $this->getDestip(),
			$keys[40] => $this->getDeszon(),
			$keys[41] => $this->getAnual(),
			$keys[42] => $this->getFolio(),
			$keys[43] => $this->getTomo(),
			$keys[44] => $this->getNumdoc(),
			$keys[45] => $this->getFecdoc(),
			$keys[46] => $this->getUsoinm(),
			$keys[47] => $this->getDesde(),
			$keys[48] => $this->getHasta(),
			$keys[49] => $this->getOrd(),
			$keys[50] => $this->getArt(),
			$keys[51] => $this->getFecdir(),
			$keys[52] => $this->getFecava(),
			$keys[53] => $this->getDirinm1(),
			$keys[54] => $this->getFecela(),
			$keys[55] => $this->getTri(),
			$keys[56] => $this->getProt(),
			$keys[57] => $this->getTipobol(),
			$keys[58] => $this->getNomsitinm(),
			$keys[59] => $this->getImpanu(),
			$keys[60] => $this->getImptri(),
			$keys[61] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcinmcamPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNroinm($value);
				break;
			case 1:
				$this->setCodcatfis($value);
				break;
			case 2:
				$this->setCoduso($value);
				break;
			case 3:
				$this->setCodcarinm($value);
				break;
			case 4:
				$this->setCodsitinm($value);
				break;
			case 5:
				$this->setRifcon($value);
				break;
			case 6:
				$this->setFecpag($value);
				break;
			case 7:
				$this->setFeccal($value);
				break;
			case 8:
				$this->setFecreg($value);
				break;
			case 9:
				$this->setDirinm($value);
				break;
			case 10:
				$this->setLinnor($value);
				break;
			case 11:
				$this->setLinsur($value);
				break;
			case 12:
				$this->setLinest($value);
				break;
			case 13:
				$this->setLinoes($value);
				break;
			case 14:
				$this->setMtrter($value);
				break;
			case 15:
				$this->setMtrcon($value);
				break;
			case 16:
				$this->setBster($value);
				break;
			case 17:
				$this->setBscon($value);
				break;
			case 18:
				$this->setDocpro($value);
				break;
			case 19:
				$this->setRifrep($value);
				break;
			case 20:
				$this->setFunrec($value);
				break;
			case 21:
				$this->setFecrec($value);
				break;
			case 22:
				$this->setEstinm($value);
				break;
			case 23:
				$this->setEstdec($value);
				break;
			case 24:
				$this->setCodcatinm($value);
				break;
			case 25:
				$this->setNomcon($value);
				break;
			case 26:
				$this->setDircon($value);
				break;
			case 27:
				$this->setClacon($value);
				break;
			case 28:
				$this->setFecadq($value);
				break;
			case 29:
				$this->setValinm($value);
				break;
			case 30:
				$this->setCodman($value);
				break;
			case 31:
				$this->setCodsec($value);
				break;
			case 32:
				$this->setCodpar($value);
				break;
			case 33:
				$this->setNroinmant($value);
				break;
			case 34:
				$this->setTotter($value);
				break;
			case 35:
				$this->setTotcon($value);
				break;
			case 36:
				$this->setTotal($value);
				break;
			case 37:
				$this->setCodtip($value);
				break;
			case 38:
				$this->setCodzon($value);
				break;
			case 39:
				$this->setDestip($value);
				break;
			case 40:
				$this->setDeszon($value);
				break;
			case 41:
				$this->setAnual($value);
				break;
			case 42:
				$this->setFolio($value);
				break;
			case 43:
				$this->setTomo($value);
				break;
			case 44:
				$this->setNumdoc($value);
				break;
			case 45:
				$this->setFecdoc($value);
				break;
			case 46:
				$this->setUsoinm($value);
				break;
			case 47:
				$this->setDesde($value);
				break;
			case 48:
				$this->setHasta($value);
				break;
			case 49:
				$this->setOrd($value);
				break;
			case 50:
				$this->setArt($value);
				break;
			case 51:
				$this->setFecdir($value);
				break;
			case 52:
				$this->setFecava($value);
				break;
			case 53:
				$this->setDirinm1($value);
				break;
			case 54:
				$this->setFecela($value);
				break;
			case 55:
				$this->setTri($value);
				break;
			case 56:
				$this->setProt($value);
				break;
			case 57:
				$this->setTipobol($value);
				break;
			case 58:
				$this->setNomsitinm($value);
				break;
			case 59:
				$this->setImpanu($value);
				break;
			case 60:
				$this->setImptri($value);
				break;
			case 61:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcinmcamPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNroinm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcatfis($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoduso($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcarinm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodsitinm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRifcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecpag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFeccal($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecreg($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDirinm($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setLinnor($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setLinsur($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setLinest($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setLinoes($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMtrter($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setMtrcon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setBster($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setBscon($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDocpro($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setRifrep($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFunrec($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFecrec($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setEstinm($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setEstdec($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCodcatinm($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setNomcon($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setDircon($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setClacon($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setFecadq($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setValinm($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCodman($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCodsec($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCodpar($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setNroinmant($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setTotter($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setTotcon($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setTotal($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setCodtip($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setCodzon($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setDestip($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setDeszon($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setAnual($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setFolio($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setTomo($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setNumdoc($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setFecdoc($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setUsoinm($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setDesde($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setHasta($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setOrd($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setArt($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setFecdir($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setFecava($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setDirinm1($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setFecela($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setTri($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setProt($arr[$keys[56]]);
		if (array_key_exists($keys[57], $arr)) $this->setTipobol($arr[$keys[57]]);
		if (array_key_exists($keys[58], $arr)) $this->setNomsitinm($arr[$keys[58]]);
		if (array_key_exists($keys[59], $arr)) $this->setImpanu($arr[$keys[59]]);
		if (array_key_exists($keys[60], $arr)) $this->setImptri($arr[$keys[60]]);
		if (array_key_exists($keys[61], $arr)) $this->setId($arr[$keys[61]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcinmcamPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcinmcamPeer::NROINM)) $criteria->add(FcinmcamPeer::NROINM, $this->nroinm);
		if ($this->isColumnModified(FcinmcamPeer::CODCATFIS)) $criteria->add(FcinmcamPeer::CODCATFIS, $this->codcatfis);
		if ($this->isColumnModified(FcinmcamPeer::CODUSO)) $criteria->add(FcinmcamPeer::CODUSO, $this->coduso);
		if ($this->isColumnModified(FcinmcamPeer::CODCARINM)) $criteria->add(FcinmcamPeer::CODCARINM, $this->codcarinm);
		if ($this->isColumnModified(FcinmcamPeer::CODSITINM)) $criteria->add(FcinmcamPeer::CODSITINM, $this->codsitinm);
		if ($this->isColumnModified(FcinmcamPeer::RIFCON)) $criteria->add(FcinmcamPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcinmcamPeer::FECPAG)) $criteria->add(FcinmcamPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(FcinmcamPeer::FECCAL)) $criteria->add(FcinmcamPeer::FECCAL, $this->feccal);
		if ($this->isColumnModified(FcinmcamPeer::FECREG)) $criteria->add(FcinmcamPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(FcinmcamPeer::DIRINM)) $criteria->add(FcinmcamPeer::DIRINM, $this->dirinm);
		if ($this->isColumnModified(FcinmcamPeer::LINNOR)) $criteria->add(FcinmcamPeer::LINNOR, $this->linnor);
		if ($this->isColumnModified(FcinmcamPeer::LINSUR)) $criteria->add(FcinmcamPeer::LINSUR, $this->linsur);
		if ($this->isColumnModified(FcinmcamPeer::LINEST)) $criteria->add(FcinmcamPeer::LINEST, $this->linest);
		if ($this->isColumnModified(FcinmcamPeer::LINOES)) $criteria->add(FcinmcamPeer::LINOES, $this->linoes);
		if ($this->isColumnModified(FcinmcamPeer::MTRTER)) $criteria->add(FcinmcamPeer::MTRTER, $this->mtrter);
		if ($this->isColumnModified(FcinmcamPeer::MTRCON)) $criteria->add(FcinmcamPeer::MTRCON, $this->mtrcon);
		if ($this->isColumnModified(FcinmcamPeer::BSTER)) $criteria->add(FcinmcamPeer::BSTER, $this->bster);
		if ($this->isColumnModified(FcinmcamPeer::BSCON)) $criteria->add(FcinmcamPeer::BSCON, $this->bscon);
		if ($this->isColumnModified(FcinmcamPeer::DOCPRO)) $criteria->add(FcinmcamPeer::DOCPRO, $this->docpro);
		if ($this->isColumnModified(FcinmcamPeer::RIFREP)) $criteria->add(FcinmcamPeer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(FcinmcamPeer::FUNREC)) $criteria->add(FcinmcamPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcinmcamPeer::FECREC)) $criteria->add(FcinmcamPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(FcinmcamPeer::ESTINM)) $criteria->add(FcinmcamPeer::ESTINM, $this->estinm);
		if ($this->isColumnModified(FcinmcamPeer::ESTDEC)) $criteria->add(FcinmcamPeer::ESTDEC, $this->estdec);
		if ($this->isColumnModified(FcinmcamPeer::CODCATINM)) $criteria->add(FcinmcamPeer::CODCATINM, $this->codcatinm);
		if ($this->isColumnModified(FcinmcamPeer::NOMCON)) $criteria->add(FcinmcamPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcinmcamPeer::DIRCON)) $criteria->add(FcinmcamPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcinmcamPeer::CLACON)) $criteria->add(FcinmcamPeer::CLACON, $this->clacon);
		if ($this->isColumnModified(FcinmcamPeer::FECADQ)) $criteria->add(FcinmcamPeer::FECADQ, $this->fecadq);
		if ($this->isColumnModified(FcinmcamPeer::VALINM)) $criteria->add(FcinmcamPeer::VALINM, $this->valinm);
		if ($this->isColumnModified(FcinmcamPeer::CODMAN)) $criteria->add(FcinmcamPeer::CODMAN, $this->codman);
		if ($this->isColumnModified(FcinmcamPeer::CODSEC)) $criteria->add(FcinmcamPeer::CODSEC, $this->codsec);
		if ($this->isColumnModified(FcinmcamPeer::CODPAR)) $criteria->add(FcinmcamPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(FcinmcamPeer::NROINMANT)) $criteria->add(FcinmcamPeer::NROINMANT, $this->nroinmant);
		if ($this->isColumnModified(FcinmcamPeer::TOTTER)) $criteria->add(FcinmcamPeer::TOTTER, $this->totter);
		if ($this->isColumnModified(FcinmcamPeer::TOTCON)) $criteria->add(FcinmcamPeer::TOTCON, $this->totcon);
		if ($this->isColumnModified(FcinmcamPeer::TOTAL)) $criteria->add(FcinmcamPeer::TOTAL, $this->total);
		if ($this->isColumnModified(FcinmcamPeer::CODTIP)) $criteria->add(FcinmcamPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(FcinmcamPeer::CODZON)) $criteria->add(FcinmcamPeer::CODZON, $this->codzon);
		if ($this->isColumnModified(FcinmcamPeer::DESTIP)) $criteria->add(FcinmcamPeer::DESTIP, $this->destip);
		if ($this->isColumnModified(FcinmcamPeer::DESZON)) $criteria->add(FcinmcamPeer::DESZON, $this->deszon);
		if ($this->isColumnModified(FcinmcamPeer::ANUAL)) $criteria->add(FcinmcamPeer::ANUAL, $this->anual);
		if ($this->isColumnModified(FcinmcamPeer::FOLIO)) $criteria->add(FcinmcamPeer::FOLIO, $this->folio);
		if ($this->isColumnModified(FcinmcamPeer::TOMO)) $criteria->add(FcinmcamPeer::TOMO, $this->tomo);
		if ($this->isColumnModified(FcinmcamPeer::NUMDOC)) $criteria->add(FcinmcamPeer::NUMDOC, $this->numdoc);
		if ($this->isColumnModified(FcinmcamPeer::FECDOC)) $criteria->add(FcinmcamPeer::FECDOC, $this->fecdoc);
		if ($this->isColumnModified(FcinmcamPeer::USOINM)) $criteria->add(FcinmcamPeer::USOINM, $this->usoinm);
		if ($this->isColumnModified(FcinmcamPeer::DESDE)) $criteria->add(FcinmcamPeer::DESDE, $this->desde);
		if ($this->isColumnModified(FcinmcamPeer::HASTA)) $criteria->add(FcinmcamPeer::HASTA, $this->hasta);
		if ($this->isColumnModified(FcinmcamPeer::ORD)) $criteria->add(FcinmcamPeer::ORD, $this->ord);
		if ($this->isColumnModified(FcinmcamPeer::ART)) $criteria->add(FcinmcamPeer::ART, $this->art);
		if ($this->isColumnModified(FcinmcamPeer::FECDIR)) $criteria->add(FcinmcamPeer::FECDIR, $this->fecdir);
		if ($this->isColumnModified(FcinmcamPeer::FECAVA)) $criteria->add(FcinmcamPeer::FECAVA, $this->fecava);
		if ($this->isColumnModified(FcinmcamPeer::DIRINM1)) $criteria->add(FcinmcamPeer::DIRINM1, $this->dirinm1);
		if ($this->isColumnModified(FcinmcamPeer::FECELA)) $criteria->add(FcinmcamPeer::FECELA, $this->fecela);
		if ($this->isColumnModified(FcinmcamPeer::TRI)) $criteria->add(FcinmcamPeer::TRI, $this->tri);
		if ($this->isColumnModified(FcinmcamPeer::PROT)) $criteria->add(FcinmcamPeer::PROT, $this->prot);
		if ($this->isColumnModified(FcinmcamPeer::TIPOBOL)) $criteria->add(FcinmcamPeer::TIPOBOL, $this->tipobol);
		if ($this->isColumnModified(FcinmcamPeer::NOMSITINM)) $criteria->add(FcinmcamPeer::NOMSITINM, $this->nomsitinm);
		if ($this->isColumnModified(FcinmcamPeer::IMPANU)) $criteria->add(FcinmcamPeer::IMPANU, $this->impanu);
		if ($this->isColumnModified(FcinmcamPeer::IMPTRI)) $criteria->add(FcinmcamPeer::IMPTRI, $this->imptri);
		if ($this->isColumnModified(FcinmcamPeer::ID)) $criteria->add(FcinmcamPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcinmcamPeer::DATABASE_NAME);

		$criteria->add(FcinmcamPeer::ID, $this->id);

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

		$copyObj->setNroinm($this->nroinm);

		$copyObj->setCodcatfis($this->codcatfis);

		$copyObj->setCoduso($this->coduso);

		$copyObj->setCodcarinm($this->codcarinm);

		$copyObj->setCodsitinm($this->codsitinm);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setFeccal($this->feccal);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDirinm($this->dirinm);

		$copyObj->setLinnor($this->linnor);

		$copyObj->setLinsur($this->linsur);

		$copyObj->setLinest($this->linest);

		$copyObj->setLinoes($this->linoes);

		$copyObj->setMtrter($this->mtrter);

		$copyObj->setMtrcon($this->mtrcon);

		$copyObj->setBster($this->bster);

		$copyObj->setBscon($this->bscon);

		$copyObj->setDocpro($this->docpro);

		$copyObj->setRifrep($this->rifrep);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setEstinm($this->estinm);

		$copyObj->setEstdec($this->estdec);

		$copyObj->setCodcatinm($this->codcatinm);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setClacon($this->clacon);

		$copyObj->setFecadq($this->fecadq);

		$copyObj->setValinm($this->valinm);

		$copyObj->setCodman($this->codman);

		$copyObj->setCodsec($this->codsec);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setNroinmant($this->nroinmant);

		$copyObj->setTotter($this->totter);

		$copyObj->setTotcon($this->totcon);

		$copyObj->setTotal($this->total);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setCodzon($this->codzon);

		$copyObj->setDestip($this->destip);

		$copyObj->setDeszon($this->deszon);

		$copyObj->setAnual($this->anual);

		$copyObj->setFolio($this->folio);

		$copyObj->setTomo($this->tomo);

		$copyObj->setNumdoc($this->numdoc);

		$copyObj->setFecdoc($this->fecdoc);

		$copyObj->setUsoinm($this->usoinm);

		$copyObj->setDesde($this->desde);

		$copyObj->setHasta($this->hasta);

		$copyObj->setOrd($this->ord);

		$copyObj->setArt($this->art);

		$copyObj->setFecdir($this->fecdir);

		$copyObj->setFecava($this->fecava);

		$copyObj->setDirinm1($this->dirinm1);

		$copyObj->setFecela($this->fecela);

		$copyObj->setTri($this->tri);

		$copyObj->setProt($this->prot);

		$copyObj->setTipobol($this->tipobol);

		$copyObj->setNomsitinm($this->nomsitinm);

		$copyObj->setImpanu($this->impanu);

		$copyObj->setImptri($this->imptri);


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
			self::$peer = new FcinmcamPeer();
		}
		return self::$peer;
	}

} 