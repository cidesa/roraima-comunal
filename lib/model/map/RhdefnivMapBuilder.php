<?php



class RhdefnivMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhdefnivMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rhdefniv');
		$tMap->setPhpName('Rhdefniv');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rhdefniv_SEQ');

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESNIV', 'Desniv', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MINPUN', 'Minpun', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MAXPUN', 'Maxpun', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TOTPES', 'Totpes', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CODRAN', 'Codran', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('TIPCAL', 'Tipcal', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 