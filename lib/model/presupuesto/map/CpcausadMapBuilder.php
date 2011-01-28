<?php



class CpcausadMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpcausadMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpcausad');
		$tMap->setPhpName('Cpcausad');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpcausad_SEQ');

		$tMap->addColumn('REFCAU', 'Refcau', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addForeignKey('TIPCAU', 'Tipcau', 'string', CreoleTypes::VARCHAR, 'cpdoccau', 'TIPCAU', true, 4);

		$tMap->addColumn('FECCAU', 'Feccau', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('ANOCAU', 'Anocau', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addForeignKey('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, 'cpcompro', 'REFCOM', false, 8);

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESCAU', 'Descau', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONCAU', 'Moncau', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALPAG', 'Salpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALAJU', 'Salaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STACAU', 'Stacau', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, 'opbenefi', 'CEDRIF', false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 