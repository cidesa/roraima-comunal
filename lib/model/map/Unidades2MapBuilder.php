<?php



class Unidades2MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Unidades2MapBuilder';

	
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

		$tMap = $this->dbMap->addTable('unidades2');
		$tMap->setPhpName('Unidades2');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('unidades2_SEQ');

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DESUBI', 'Desubi', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STACOD', 'Stacod', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 