<?php


abstract class BaseCareqartPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'careqart';

	
	const CLASS_DEFAULT = 'lib.model.Careqart';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REQART = 'careqart.REQART';

	
	const FECREQ = 'careqart.FECREQ';

	
	const DESREQ = 'careqart.DESREQ';

	
	const MONREQ = 'careqart.MONREQ';

	
	const STAREQ = 'careqart.STAREQ';

	
	const UNISOL = 'careqart.UNISOL';

	
	const CODCATREQ = 'careqart.CODCATREQ';

	
	const APRREQ = 'careqart.APRREQ';

	
	const NUMMEMO = 'careqart.NUMMEMO';

	
	const JUSTIF = 'careqart.JUSTIF';

	
	const CODCEN = 'careqart.CODCEN';

	
	const ID = 'careqart.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reqart', 'Fecreq', 'Desreq', 'Monreq', 'Stareq', 'Unisol', 'Codcatreq', 'Aprreq', 'Nummemo', 'Justif', 'Codcen', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CareqartPeer::REQART, CareqartPeer::FECREQ, CareqartPeer::DESREQ, CareqartPeer::MONREQ, CareqartPeer::STAREQ, CareqartPeer::UNISOL, CareqartPeer::CODCATREQ, CareqartPeer::APRREQ, CareqartPeer::NUMMEMO, CareqartPeer::JUSTIF, CareqartPeer::CODCEN, CareqartPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reqart', 'fecreq', 'desreq', 'monreq', 'stareq', 'unisol', 'codcatreq', 'aprreq', 'nummemo', 'justif', 'codcen', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reqart' => 0, 'Fecreq' => 1, 'Desreq' => 2, 'Monreq' => 3, 'Stareq' => 4, 'Unisol' => 5, 'Codcatreq' => 6, 'Aprreq' => 7, 'Nummemo' => 8, 'Justif' => 9, 'Codcen' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (CareqartPeer::REQART => 0, CareqartPeer::FECREQ => 1, CareqartPeer::DESREQ => 2, CareqartPeer::MONREQ => 3, CareqartPeer::STAREQ => 4, CareqartPeer::UNISOL => 5, CareqartPeer::CODCATREQ => 6, CareqartPeer::APRREQ => 7, CareqartPeer::NUMMEMO => 8, CareqartPeer::JUSTIF => 9, CareqartPeer::CODCEN => 10, CareqartPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('reqart' => 0, 'fecreq' => 1, 'desreq' => 2, 'monreq' => 3, 'stareq' => 4, 'unisol' => 5, 'codcatreq' => 6, 'aprreq' => 7, 'nummemo' => 8, 'justif' => 9, 'codcen' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CareqartMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CareqartMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CareqartPeer::getTableMap();
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
		return str_replace(CareqartPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CareqartPeer::REQART);

		$criteria->addSelectColumn(CareqartPeer::FECREQ);

		$criteria->addSelectColumn(CareqartPeer::DESREQ);

		$criteria->addSelectColumn(CareqartPeer::MONREQ);

		$criteria->addSelectColumn(CareqartPeer::STAREQ);

		$criteria->addSelectColumn(CareqartPeer::UNISOL);

		$criteria->addSelectColumn(CareqartPeer::CODCATREQ);

		$criteria->addSelectColumn(CareqartPeer::APRREQ);

		$criteria->addSelectColumn(CareqartPeer::NUMMEMO);

		$criteria->addSelectColumn(CareqartPeer::JUSTIF);

		$criteria->addSelectColumn(CareqartPeer::CODCEN);

		$criteria->addSelectColumn(CareqartPeer::ID);

	}

	const COUNT = 'COUNT(careqart.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT careqart.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CareqartPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CareqartPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CareqartPeer::doSelectRS($criteria, $con);
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
		$objects = CareqartPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CareqartPeer::populateObjects(CareqartPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CareqartPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CareqartPeer::getOMClass();
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
		return CareqartPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CareqartPeer::ID); 

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
			$comparison = $criteria->getComparison(CareqartPeer::ID);
			$selectCriteria->add(CareqartPeer::ID, $criteria->remove(CareqartPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CareqartPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CareqartPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Careqart) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CareqartPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Careqart $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CareqartPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CareqartPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CareqartPeer::DATABASE_NAME, CareqartPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CareqartPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CareqartPeer::DATABASE_NAME);

		$criteria->add(CareqartPeer::ID, $pk);


		$v = CareqartPeer::doSelect($criteria, $con);

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
			$criteria->add(CareqartPeer::ID, $pks, Criteria::IN);
			$objs = CareqartPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCareqartPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CareqartMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CareqartMapBuilder');
}
