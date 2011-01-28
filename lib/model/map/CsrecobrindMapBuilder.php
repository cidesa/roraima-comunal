<?php



class CsrecobrindMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CsrecobrindMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('csrecobrind');
		$tMap->setPhpName('Csrecobrind');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPROD', 'Codprod', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODFAS', 'Codfas', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODMANOBR', 'Codmanobr', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CANEMP', 'Canemp', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('HOREMP', 'Horemp', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('TIPCON', 'Tipcon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('COSTOT', 'Costot', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('JORNADA', 'Jornada', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NROORD', 'Nroord', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('COSOBR', 'Cosobr', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 