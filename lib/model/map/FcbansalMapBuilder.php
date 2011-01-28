<?php



class FcbansalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcbansalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcbansal');
		$tMap->setPhpName('Fcbansal');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcbansal_SEQ');

		$tMap->addColumn('CODDOC', 'Coddoc', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addForeignKey('CODFUN', 'Codfun', 'string', CreoleTypes::VARCHAR, 'fcdeffun', 'CODFUN', true, 3);

		$tMap->addForeignKey('CODENTEXT', 'Codentext', 'string', CreoleTypes::VARCHAR, 'fcdefentext', 'CODENTEXT', true, 3);

		$tMap->addForeignKey('CODTIPDOC', 'Codtipdoc', 'string', CreoleTypes::VARCHAR, 'fcdeftipdoc', 'CODTIPDOC', true, 3);

		$tMap->addColumn('FECDOC', 'Fecdoc', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORDOC', 'Hordoc', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ASUNTO', 'Asunto', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addForeignKey('CODUBIFIS', 'Codubifis', 'string', CreoleTypes::VARCHAR, 'fcdefubifis', 'CODUBIFIS', false, 16);

		$tMap->addColumn('FECUBIFIS', 'Fecubifis', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORUBIFIS', 'Horubifis', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('CODUBIMAG', 'Codubimag', 'string', CreoleTypes::VARCHAR, 'fcdefubimag', 'CODUBIMAG', false, 16);

		$tMap->addColumn('FECUBIMAG', 'Fecubimag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORUBIMAG', 'Horubimag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 