<?php



class Tabla15MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Tabla15MapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tabla15');
		$tMap->setPhpName('Tabla15');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tabla15_SEQ');

		$tMap->addColumn('REFAJU', 'Refaju', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('MONAJU', 'Monaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAMOV', 'Stamov', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REFPRC', 'Refprc', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('REFCAU', 'Refcau', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('REFPAG', 'Refpag', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 