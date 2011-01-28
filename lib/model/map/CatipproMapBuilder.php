<?php



class CatipproMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CatipproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catippro');
		$tMap->setPhpName('Catippro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catippro_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESPRO', 'Despro', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('CTAORD', 'Ctaord', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAPER', 'Ctaper', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 