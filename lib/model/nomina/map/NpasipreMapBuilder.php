<?php



class NpasipreMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpasipreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npasipre');
		$tMap->setPhpName('Npasipre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npasipre_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODASI', 'Codasi', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESASI', 'Desasi', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('TIPASI', 'Tipasi', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFEALIBV', 'Afealibv', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('AFEALIBF', 'Afealibf', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 