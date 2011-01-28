<?php



class CiasiiniMapBuilder {

	
	const CLASS_NAME = 'lib.model.ingresos.map.CiasiiniMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ciasiini');
		$tMap->setPhpName('Ciasiini');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ciasiini_SEQ');

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 34);

		$tMap->addColumn('NOMPRE', 'Nompre', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PERPRE', 'Perpre', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('ANOPRE', 'Anopre', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('MONASI', 'Monasi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONPRC', 'Monprc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONCOM', 'Moncom', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONCAU', 'Moncau', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTRA', 'Montra', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTRN', 'Montrn', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONADI', 'Monadi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONDIM', 'Mondim', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONAJU', 'Monaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONDIS', 'Mondis', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIFERE', 'Difere', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 