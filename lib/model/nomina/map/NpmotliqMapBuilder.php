<?php



class NpmotliqMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpmotliqMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npmotliq');
		$tMap->setPhpName('Npmotliq');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npmotliq_SEQ');

		$tMap->addColumn('CODMOTLIQ', 'Codmotliq', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESMOTLIQ', 'Desmotliq', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 