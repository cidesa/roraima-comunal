<?php



class CpdeftitMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpdeftitMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpdeftit');
		$tMap->setPhpName('Cpdeftit');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpdeftit_SEQ');

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NOMPRE', 'Nompre', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addForeignKey('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, 'contabb', 'CODCTA', false, 32);

		$tMap->addColumn('STACOD', 'Stacod', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('ESTATUS', 'Estatus', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 