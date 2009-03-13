<?php



class FcprolicdetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcprolicdetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcprolicdet');
		$tMap->setPhpName('Fcprolicdet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcprolicdet_SEQ');

		$tMap->addColumn('NROCON', 'Nrocon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, true, 14);

		$tMap->addColumn('TIPPRO', 'Tippro', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CAMPO', 'Campo', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('VALOR', 'Valor', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 