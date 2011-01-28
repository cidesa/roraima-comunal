<?php



class FcsuscanMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcsuscanMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcsuscan');
		$tMap->setPhpName('Fcsuscan');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcsuscan_SEQ');

		$tMap->addColumn('NUMSUS', 'Numsus', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMLIC', 'Numlic', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('ESTLIC', 'Estlic', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('MOTSUS', 'Motsus', 'string', CreoleTypes::VARCHAR, true, 210);

		$tMap->addColumn('FECSUS', 'Fecsus', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('RESOLU', 'Resolu', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TOMO', 'Tomo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FOLIO', 'Folio', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NUMERO', 'Numero', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FUNSUS', 'Funsus', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 