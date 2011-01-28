<?php



class ForperotrcreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForperotrcreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forperotrcre');
		$tMap->setPhpName('Forperotrcre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forperotrcre_SEQ');

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODPAREGR', 'Codparegr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('PERPRE', 'Perpre', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('MONPER', 'Monper', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
