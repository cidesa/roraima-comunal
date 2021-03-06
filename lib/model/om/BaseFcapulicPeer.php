<?php


abstract class BaseFcapulicPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcapulic';

	
	const CLASS_DEFAULT = 'lib.model.Fcapulic';

	
	const NUM_COLUMNS = 23;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROCON = 'fcapulic.NROCON';

	
	const FECREG = 'fcapulic.FECREG';

	
	const RIFCON = 'fcapulic.RIFCON';

	
	const TIPAPU = 'fcapulic.TIPAPU';

	
	const DESAPU = 'fcapulic.DESAPU';

	
	const DIRAPU = 'fcapulic.DIRAPU';

	
	const MONAPU = 'fcapulic.MONAPU';

	
	const MONIMP = 'fcapulic.MONIMP';

	
	const FUNREC = 'fcapulic.FUNREC';

	
	const FECREC = 'fcapulic.FECREC';

	
	const RIFREP = 'fcapulic.RIFREP';

	
	const STAAPU = 'fcapulic.STAAPU';

	
	const STADEC = 'fcapulic.STADEC';

	
	const NOMCON = 'fcapulic.NOMCON';

	
	const DIRCON = 'fcapulic.DIRCON';

	
	const SEMDIA = 'fcapulic.SEMDIA';

	
	const EXOAPU = 'fcapulic.EXOAPU';

	
	const TEXEXO = 'fcapulic.TEXEXO';

	
	const FECAPU = 'fcapulic.FECAPU';

	
	const SERAPUI = 'fcapulic.SERAPUI';

	
	const SERAPUF = 'fcapulic.SERAPUF';

	
	const HORAPU = 'fcapulic.HORAPU';

	
	const ID = 'fcapulic.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nrocon', 'Fecreg', 'Rifcon', 'Tipapu', 'Desapu', 'Dirapu', 'Monapu', 'Monimp', 'Funrec', 'Fecrec', 'Rifrep', 'Staapu', 'Stadec', 'Nomcon', 'Dircon', 'Semdia', 'Exoapu', 'Texexo', 'Fecapu', 'Serapui', 'Serapuf', 'Horapu', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcapulicPeer::NROCON, FcapulicPeer::FECREG, FcapulicPeer::RIFCON, FcapulicPeer::TIPAPU, FcapulicPeer::DESAPU, FcapulicPeer::DIRAPU, FcapulicPeer::MONAPU, FcapulicPeer::MONIMP, FcapulicPeer::FUNREC, FcapulicPeer::FECREC, FcapulicPeer::RIFREP, FcapulicPeer::STAAPU, FcapulicPeer::STADEC, FcapulicPeer::NOMCON, FcapulicPeer::DIRCON, FcapulicPeer::SEMDIA, FcapulicPeer::EXOAPU, FcapulicPeer::TEXEXO, FcapulicPeer::FECAPU, FcapulicPeer::SERAPUI, FcapulicPeer::SERAPUF, FcapulicPeer::HORAPU, FcapulicPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nrocon', 'fecreg', 'rifcon', 'tipapu', 'desapu', 'dirapu', 'monapu', 'monimp', 'funrec', 'fecrec', 'rifrep', 'staapu', 'stadec', 'nomcon', 'dircon', 'semdia', 'exoapu', 'texexo', 'fecapu', 'serapui', 'serapuf', 'horapu', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nrocon' => 0, 'Fecreg' => 1, 'Rifcon' => 2, 'Tipapu' => 3, 'Desapu' => 4, 'Dirapu' => 5, 'Monapu' => 6, 'Monimp' => 7, 'Funrec' => 8, 'Fecrec' => 9, 'Rifrep' => 10, 'Staapu' => 11, 'Stadec' => 12, 'Nomcon' => 13, 'Dircon' => 14, 'Semdia' => 15, 'Exoapu' => 16, 'Texexo' => 17, 'Fecapu' => 18, 'Serapui' => 19, 'Serapuf' => 20, 'Horapu' => 21, 'Id' => 22, ),
		BasePeer::TYPE_COLNAME => array (FcapulicPeer::NROCON => 0, FcapulicPeer::FECREG => 1, FcapulicPeer::RIFCON => 2, FcapulicPeer::TIPAPU => 3, FcapulicPeer::DESAPU => 4, FcapulicPeer::DIRAPU => 5, FcapulicPeer::MONAPU => 6, FcapulicPeer::MONIMP => 7, FcapulicPeer::FUNREC => 8, FcapulicPeer::FECREC => 9, FcapulicPeer::RIFREP => 10, FcapulicPeer::STAAPU => 11, FcapulicPeer::STADEC => 12, FcapulicPeer::NOMCON => 13, FcapulicPeer::DIRCON => 14, FcapulicPeer::SEMDIA => 15, FcapulicPeer::EXOAPU => 16, FcapulicPeer::TEXEXO => 17, FcapulicPeer::FECAPU => 18, FcapulicPeer::SERAPUI => 19, FcapulicPeer::SERAPUF => 20, FcapulicPeer::HORAPU => 21, FcapulicPeer::ID => 22, ),
		BasePeer::TYPE_FIELDNAME => array ('nrocon' => 0, 'fecreg' => 1, 'rifcon' => 2, 'tipapu' => 3, 'desapu' => 4, 'dirapu' => 5, 'monapu' => 6, 'monimp' => 7, 'funrec' => 8, 'fecrec' => 9, 'rifrep' => 10, 'staapu' => 11, 'stadec' => 12, 'nomcon' => 13, 'dircon' => 14, 'semdia' => 15, 'exoapu' => 16, 'texexo' => 17, 'fecapu' => 18, 'serapui' => 19, 'serapuf' => 20, 'horapu' => 21, 'id' => 22, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcapulicMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcapulicMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcapulicPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(FcapulicPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcapulicPeer::NROCON);

		$criteria->addSelectColumn(FcapulicPeer::FECREG);

		$criteria->addSelectColumn(FcapulicPeer::RIFCON);

		$criteria->addSelectColumn(FcapulicPeer::TIPAPU);

		$criteria->addSelectColumn(FcapulicPeer::DESAPU);

		$criteria->addSelectColumn(FcapulicPeer::DIRAPU);

		$criteria->addSelectColumn(FcapulicPeer::MONAPU);

		$criteria->addSelectColumn(FcapulicPeer::MONIMP);

		$criteria->addSelectColumn(FcapulicPeer::FUNREC);

		$criteria->addSelectColumn(FcapulicPeer::FECREC);

		$criteria->addSelectColumn(FcapulicPeer::RIFREP);

		$criteria->addSelectColumn(FcapulicPeer::STAAPU);

		$criteria->addSelectColumn(FcapulicPeer::STADEC);

		$criteria->addSelectColumn(FcapulicPeer::NOMCON);

		$criteria->addSelectColumn(FcapulicPeer::DIRCON);

		$criteria->addSelectColumn(FcapulicPeer::SEMDIA);

		$criteria->addSelectColumn(FcapulicPeer::EXOAPU);

		$criteria->addSelectColumn(FcapulicPeer::TEXEXO);

		$criteria->addSelectColumn(FcapulicPeer::FECAPU);

		$criteria->addSelectColumn(FcapulicPeer::SERAPUI);

		$criteria->addSelectColumn(FcapulicPeer::SERAPUF);

		$criteria->addSelectColumn(FcapulicPeer::HORAPU);

		$criteria->addSelectColumn(FcapulicPeer::ID);

	}

	const COUNT = 'COUNT(fcapulic.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcapulic.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcapulicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcapulicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcapulicPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = FcapulicPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcapulicPeer::populateObjects(FcapulicPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcapulicPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcapulicPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return FcapulicPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcapulicPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(FcapulicPeer::ID);
			$selectCriteria->add(FcapulicPeer::ID, $criteria->remove(FcapulicPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(FcapulicPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(FcapulicPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcapulic) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcapulicPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Fcapulic $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcapulicPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcapulicPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(FcapulicPeer::DATABASE_NAME, FcapulicPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcapulicPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(FcapulicPeer::DATABASE_NAME);

		$criteria->add(FcapulicPeer::ID, $pk);


		$v = FcapulicPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(FcapulicPeer::ID, $pks, Criteria::IN);
			$objs = FcapulicPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcapulicPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcapulicMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcapulicMapBuilder');
}
