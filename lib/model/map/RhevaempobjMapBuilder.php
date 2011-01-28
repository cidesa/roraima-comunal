<?php



class RhevaempobjMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhevaempobjMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rhevaempobj');
		$tMap->setPhpName('Rhevaempobj');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rhevaempobj_SEQ');

		$tMap->addColumn('CODEVDO', 'Codevdo', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODOBJ', 'Codobj', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('PLAOBJ', 'Plaobj', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ALCOBJ', 'Alcobj', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PESOBJ', 'Pesobj', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PUNOBJ', 'Punobj', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECEVAL', 'Feceval', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 