<?php



class CobdetforMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CobdetforMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cobdetfor');
		$tMap->setPhpName('Cobdetfor');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cobdetfor_SEQ');

		$tMap->addColumn('NUMTRA', 'Numtra', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CORREL', 'Correl', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NUMIDE', 'Numide', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODBAN', 'Codban', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('FATIPPAG_ID', 'FatippagId', 'int', CreoleTypes::INTEGER, 'fatippag', 'ID', true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 