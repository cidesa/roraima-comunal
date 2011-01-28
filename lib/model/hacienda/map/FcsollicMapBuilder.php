<?php



class FcsollicMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcsollicMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('fcsollic');
		$tMap->setPhpName('Fcsollic');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcsollic_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('NUMLIC', 'Numlic', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('FECSOL', 'Fecsol', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECLIC', 'Feclic', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CATCON', 'Catcon', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('RIFREP', 'Rifrep', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NOMNEG', 'Nomneg', 'string', CreoleTypes::VARCHAR, false, 120);

		$tMap->addColumn('TIPINM', 'Tipinm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPEST', 'Tipest', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DIRPRI', 'Dirpri', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CODRUT', 'Codrut', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CAPSOC', 'Capsoc', 'double', CreoleTypes::NUMERIC, false, 15);

		$tMap->addColumn('HORINI', 'Horini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORCIE', 'Horcie', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DISCLI', 'Discli', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('DISBAR', 'Disbar', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('DISDIS', 'Disdis', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('DISINS', 'Disins', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('DISFUN', 'Disfun', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('DISEST', 'Disest', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('FUNRES', 'Funres', 'string', CreoleTypes::VARCHAR, false, 60);

		$tMap->addColumn('FUNREL', 'Funrel', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('FECRES', 'Fecres', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TOMO', 'Tomo', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FOLIO', 'Folio', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMERO', 'Numero', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TASLIC', 'Taslic', 'double', CreoleTypes::NUMERIC, false, 15);

		$tMap->addColumn('DEUANL', 'Deuanl', 'double', CreoleTypes::NUMERIC, false, 15);

		$tMap->addColumn('DEUACL', 'Deuacl', 'double', CreoleTypes::NUMERIC, false, 15);

		$tMap->addColumn('IMPLIC', 'Implic', 'double', CreoleTypes::NUMERIC, false, 15);

		$tMap->addColumn('DEUANP', 'Deuanp', 'double', CreoleTypes::NUMERIC, false, 15);

		$tMap->addColumn('DEUACP', 'Deuacp', 'double', CreoleTypes::NUMERIC, false, 15);

		$tMap->addColumn('STASOL', 'Stasol', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STALIC', 'Stalic', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STADEC', 'Stadec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STALIQ', 'Staliq', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DIRCON', 'Dircon', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ESTSER', 'Estser', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TELNEG', 'Telneg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CLACON', 'Clacon', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('CAPACT', 'Capact', 'double', CreoleTypes::NUMERIC, false, 15);

		$tMap->addColumn('NUMSOL1', 'Numsol1', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('NUMLIC1', 'Numlic1', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('HORAINIE', 'Horainie', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORACIEE', 'Horaciee', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('UNITRI', 'Unitri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPSOL', 'Tipsol', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('UNITRIALC', 'Unitrialc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('UNITRIOTR', 'Unitriotr', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('LICANT', 'Licant', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('DUEANT', 'Dueant', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('DIRANT', 'Dirant', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('IMPEXT', 'Impext', 'double', CreoleTypes::NUMERIC, false, 15);

		$tMap->addColumn('IMPTOTAL', 'Imptotal', 'double', CreoleTypes::NUMERIC, false, 15);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODTIPLIC', 'Codtiplic', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('FECINILIC', 'Fecinilic', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 