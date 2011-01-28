<?php



class NptipdedMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NptipdedMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptipded');
		$tMap->setPhpName('Nptipded');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptipded_SEQ');

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIP', 'Destip', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 