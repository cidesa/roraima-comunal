<?php



class FarecargMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FarecargMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('farecarg');
		$tMap->setPhpName('Farecarg');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('farecarg_SEQ');

		$tMap->addColumn('CODRGO', 'Codrgo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMRGO', 'Nomrgo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('TIPRGO', 'Tiprgo', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('MONRGO', 'Monrgo', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CALCUL', 'Calcul', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 