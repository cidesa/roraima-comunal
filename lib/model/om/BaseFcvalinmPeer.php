<?php


abstract class BaseFcvalinmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcvalinm';

	
	const CLASS_DEFAULT = 'lib.model.Fcvalinm';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODZON = 'fcvalinm.CODZON';

	
	const DESZON = 'fcvalinm.DESZON';

	
	const CODTIP = 'fcvalinm.CODTIP';

	
	const DESTIP = 'fcvalinm.DESTIP';

	
	const VALMTR = 'fcvalinm.VALMTR';

	
	const VALFIS = 'fcvalinm.VALFIS';

	
	const ALITIP = 'fcvalinm.ALITIP';

	
	const ANUAL = 'fcvalinm.ANUAL';

	
	const ALITIPT = 'fcvalinm.ALITIPT';

	
	const ANUALT = 'fcvalinm.ANUALT';

	
	const ANOVIG = 'fcvalinm.ANOVIG';

	
	const PORVALFIS = 'fcvalinm.PORVALFIS';

	
	const ID = 'fcvalinm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codzon', 'Deszon', 'Codtip', 'Destip', 'Valmtr', 'Valfis', 'Alitip', 'Anual', 'Alitipt', 'Anualt', 'Anovig', 'Porvalfis', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcvalinmPeer::CODZON, FcvalinmPeer::DESZON, FcvalinmPeer::CODTIP, FcvalinmPeer::DESTIP, FcvalinmPeer::VALMTR, FcvalinmPeer::VALFIS, FcvalinmPeer::ALITIP, FcvalinmPeer::ANUAL, FcvalinmPeer::ALITIPT, FcvalinmPeer::ANUALT, FcvalinmPeer::ANOVIG, FcvalinmPeer::PORVALFIS, FcvalinmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codzon', 'deszon', 'codtip', 'destip', 'valmtr', 'valfis', 'alitip', 'anual', 'alitipt', 'anualt', 'anovig', 'porvalfis', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codzon' => 0, 'Deszon' => 1, 'Codtip' => 2, 'Destip' => 3, 'Valmtr' => 4, 'Valfis' => 5, 'Alitip' => 6, 'Anual' => 7, 'Alitipt' => 8, 'Anualt' => 9, 'Anovig' => 10, 'Porvalfis' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (FcvalinmPeer::CODZON => 0, FcvalinmPeer::DESZON => 1, FcvalinmPeer::CODTIP => 2, FcvalinmPeer::DESTIP => 3, FcvalinmPeer::VALMTR => 4, FcvalinmPeer::VALFIS => 5, FcvalinmPeer::ALITIP => 6, FcvalinmPeer::ANUAL => 7, FcvalinmPeer::ALITIPT => 8, FcvalinmPeer::ANUALT => 9, FcvalinmPeer::ANOVIG => 10, FcvalinmPeer::PORVALFIS => 11, FcvalinmPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('codzon' => 0, 'deszon' => 1, 'codtip' => 2, 'destip' => 3, 'valmtr' => 4, 'valfis' => 5, 'alitip' => 6, 'anual' => 7, 'alitipt' => 8, 'anualt' => 9, 'anovig' => 10, 'porvalfis' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcvalinmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcvalinmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcvalinmPeer::getTableMap();
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
		return str_replace(FcvalinmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcvalinmPeer::CODZON);

		$criteria->addSelectColumn(FcvalinmPeer::DESZON);

		$criteria->addSelectColumn(FcvalinmPeer::CODTIP);

		$criteria->addSelectColumn(FcvalinmPeer::DESTIP);

		$criteria->addSelectColumn(FcvalinmPeer::VALMTR);

		$criteria->addSelectColumn(FcvalinmPeer::VALFIS);

		$criteria->addSelectColumn(FcvalinmPeer::ALITIP);

		$criteria->addSelectColumn(FcvalinmPeer::ANUAL);

		$criteria->addSelectColumn(FcvalinmPeer::ALITIPT);

		$criteria->addSelectColumn(FcvalinmPeer::ANUALT);

		$criteria->addSelectColumn(FcvalinmPeer::ANOVIG);

		$criteria->addSelectColumn(FcvalinmPeer::PORVALFIS);

		$criteria->addSelectColumn(FcvalinmPeer::ID);

	}

	const COUNT = 'COUNT(fcvalinm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcvalinm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcvalinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcvalinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcvalinmPeer::doSelectRS($criteria, $con);
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
		$objects = FcvalinmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcvalinmPeer::populateObjects(FcvalinmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcvalinmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcvalinmPeer::getOMClass();
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
		return FcvalinmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcvalinmPeer::ID); 

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
			$comparison = $criteria->getComparison(FcvalinmPeer::ID);
			$selectCriteria->add(FcvalinmPeer::ID, $criteria->remove(FcvalinmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcvalinmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcvalinmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcvalinm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcvalinmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcvalinm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcvalinmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcvalinmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcvalinmPeer::DATABASE_NAME, FcvalinmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcvalinmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcvalinmPeer::DATABASE_NAME);

		$criteria->add(FcvalinmPeer::ID, $pk);


		$v = FcvalinmPeer::doSelect($criteria, $con);

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
			$criteria->add(FcvalinmPeer::ID, $pks, Criteria::IN);
			$objs = FcvalinmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcvalinmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcvalinmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcvalinmMapBuilder');
}
