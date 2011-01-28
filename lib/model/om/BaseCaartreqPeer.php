<?php


abstract class BaseCaartreqPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caartreq';

	
	const CLASS_DEFAULT = 'lib.model.Caartreq';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REQART = 'caartreq.REQART';

	
	const CODART = 'caartreq.CODART';

	
	const CODCAT = 'caartreq.CODCAT';

	
	const CANREQ = 'caartreq.CANREQ';

	
	const CANREC = 'caartreq.CANREC';

	
	const MONTOT = 'caartreq.MONTOT';

	
	const UNIMED = 'caartreq.UNIMED';

	
	const RELART = 'caartreq.RELART';

	
	const ID = 'caartreq.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reqart', 'Codart', 'Codcat', 'Canreq', 'Canrec', 'Montot', 'Unimed', 'Relart', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaartreqPeer::REQART, CaartreqPeer::CODART, CaartreqPeer::CODCAT, CaartreqPeer::CANREQ, CaartreqPeer::CANREC, CaartreqPeer::MONTOT, CaartreqPeer::UNIMED, CaartreqPeer::RELART, CaartreqPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reqart', 'codart', 'codcat', 'canreq', 'canrec', 'montot', 'unimed', 'relart', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reqart' => 0, 'Codart' => 1, 'Codcat' => 2, 'Canreq' => 3, 'Canrec' => 4, 'Montot' => 5, 'Unimed' => 6, 'Relart' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (CaartreqPeer::REQART => 0, CaartreqPeer::CODART => 1, CaartreqPeer::CODCAT => 2, CaartreqPeer::CANREQ => 3, CaartreqPeer::CANREC => 4, CaartreqPeer::MONTOT => 5, CaartreqPeer::UNIMED => 6, CaartreqPeer::RELART => 7, CaartreqPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('reqart' => 0, 'codart' => 1, 'codcat' => 2, 'canreq' => 3, 'canrec' => 4, 'montot' => 5, 'unimed' => 6, 'relart' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaartreqMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaartreqMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaartreqPeer::getTableMap();
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
		return str_replace(CaartreqPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaartreqPeer::REQART);

		$criteria->addSelectColumn(CaartreqPeer::CODART);

		$criteria->addSelectColumn(CaartreqPeer::CODCAT);

		$criteria->addSelectColumn(CaartreqPeer::CANREQ);

		$criteria->addSelectColumn(CaartreqPeer::CANREC);

		$criteria->addSelectColumn(CaartreqPeer::MONTOT);

		$criteria->addSelectColumn(CaartreqPeer::UNIMED);

		$criteria->addSelectColumn(CaartreqPeer::RELART);

		$criteria->addSelectColumn(CaartreqPeer::ID);

	}

	const COUNT = 'COUNT(caartreq.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caartreq.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaartreqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaartreqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaartreqPeer::doSelectRS($criteria, $con);
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
		$objects = CaartreqPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaartreqPeer::populateObjects(CaartreqPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaartreqPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaartreqPeer::getOMClass();
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
		return CaartreqPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CaartreqPeer::ID); 

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
			$comparison = $criteria->getComparison(CaartreqPeer::ID);
			$selectCriteria->add(CaartreqPeer::ID, $criteria->remove(CaartreqPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaartreqPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaartreqPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caartreq) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaartreqPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caartreq $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaartreqPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaartreqPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaartreqPeer::DATABASE_NAME, CaartreqPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaartreqPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaartreqPeer::DATABASE_NAME);

		$criteria->add(CaartreqPeer::ID, $pk);


		$v = CaartreqPeer::doSelect($criteria, $con);

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
			$criteria->add(CaartreqPeer::ID, $pks, Criteria::IN);
			$objs = CaartreqPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaartreqPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaartreqMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaartreqMapBuilder');
}
