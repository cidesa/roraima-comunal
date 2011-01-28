<?php



class FordetorggobMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordetorggobMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordetorggob');
		$tMap->setPhpName('Fordetorggob');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODORG', 'Codorg', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECPRE', 'Fecpre', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('MONACO', 'Monaco', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 