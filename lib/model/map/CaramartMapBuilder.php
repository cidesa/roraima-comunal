<?php



class CaramartMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaramartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caramart');
		$tMap->setPhpName('Caramart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caramart_SEQ');

		$tMap->addColumn('RAMART', 'Ramart', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('NOMRAM', 'Nomram', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 