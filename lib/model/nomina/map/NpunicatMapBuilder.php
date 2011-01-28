<?php



class NpunicatMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpunicatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npunicat');
		$tMap->setPhpName('Npunicat');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npunicat_SEQ');

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 