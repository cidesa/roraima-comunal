<?php


abstract class BaseFormetfinotrPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'formetfinotr';

	
	const CLASS_DEFAULT = 'lib.model.Formetfinotr';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODMET = 'formetfinotr.CODMET';

	
	const CODPRO = 'formetfinotr.CODPRO';

	
	const CODACT = 'formetfinotr.CODACT';

	
	const CODPAREGR = 'formetfinotr.CODPAREGR';

	
	const CODPARING = 'formetfinotr.CODPARING';

	
	const MONFIN = 'formetfinotr.MONFIN';

	
	const ID = 'formetfinotr.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codmet', 'Codpro', 'Codact', 'Codparegr', 'Codparing', 'Monfin', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FormetfinotrPeer::CODMET, FormetfinotrPeer::CODPRO, FormetfinotrPeer::CODACT, FormetfinotrPeer::CODPAREGR, FormetfinotrPeer::CODPARING, FormetfinotrPeer::MONFIN, FormetfinotrPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codmet', 'codpro', 'codact', 'codparegr', 'codparing', 'monfin', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codmet' => 0, 'Codpro' => 1, 'Codact' => 2, 'Codparegr' => 3, 'Codparing' => 4, 'Monfin' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (FormetfinotrPeer::CODMET => 0, FormetfinotrPeer::CODPRO => 1, FormetfinotrPeer::CODACT => 2, FormetfinotrPeer::CODPAREGR => 3, FormetfinotrPeer::CODPARING => 4, FormetfinotrPeer::MONFIN => 5, FormetfinotrPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codmet' => 0, 'codpro' => 1, 'codact' => 2, 'codparegr' => 3, 'codparing' => 4, 'monfin' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FormetfinotrMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FormetfinotrMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FormetfinotrPeer::getTableMap();
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
		return str_replace(FormetfinotrPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FormetfinotrPeer::CODMET);

		$criteria->addSelectColumn(FormetfinotrPeer::CODPRO);

		$criteria->addSelectColumn(FormetfinotrPeer::CODACT);

		$criteria->addSelectColumn(FormetfinotrPeer::CODPAREGR);

		$criteria->addSelectColumn(FormetfinotrPeer::CODPARING);

		$criteria->addSelectColumn(FormetfinotrPeer::MONFIN);

		$criteria->addSelectColumn(FormetfinotrPeer::ID);

	}

	const COUNT = 'COUNT(formetfinotr.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT formetfinotr.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FormetfinotrPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FormetfinotrPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FormetfinotrPeer::doSelectRS($criteria, $con);
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
		$objects = FormetfinotrPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FormetfinotrPeer::populateObjects(FormetfinotrPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FormetfinotrPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FormetfinotrPeer::getOMClass();
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
		return FormetfinotrPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FormetfinotrPeer::ID); 

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
			$comparison = $criteria->getComparison(FormetfinotrPeer::ID);
			$selectCriteria->add(FormetfinotrPeer::ID, $criteria->remove(FormetfinotrPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FormetfinotrPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FormetfinotrPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Formetfinotr) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FormetfinotrPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Formetfinotr $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FormetfinotrPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FormetfinotrPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FormetfinotrPeer::DATABASE_NAME, FormetfinotrPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FormetfinotrPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FormetfinotrPeer::DATABASE_NAME);

		$criteria->add(FormetfinotrPeer::ID, $pk);


		$v = FormetfinotrPeer::doSelect($criteria, $con);

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
			$criteria->add(FormetfinotrPeer::ID, $pks, Criteria::IN);
			$objs = FormetfinotrPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFormetfinotrPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FormetfinotrMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FormetfinotrMapBuilder');
}
