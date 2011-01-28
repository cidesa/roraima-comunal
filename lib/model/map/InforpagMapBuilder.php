<?php



class InforpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InforpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inforpag');
		$tMap->setPhpName('Inforpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('inforpag_SEQ');

		$tMap->addColumn('CODFORPAG', 'Codforpag', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESFORPAG', 'Desforpag', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 