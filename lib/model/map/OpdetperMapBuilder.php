<?php



class OpdetperMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpdetperMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opdetper');
		$tMap->setPhpName('Opdetper');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opdetper_SEQ');

		$tMap->addColumn('REFOPP', 'Refopp', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('REFCUO', 'Refcuo', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECINICUO', 'Fecinicuo', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECFINCUO', 'Fecfincuo', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MONCUO', 'Moncuo', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CTABAN', 'Ctaban', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 