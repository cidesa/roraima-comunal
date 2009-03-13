<?php


abstract class BaseCpimpcomPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpimpcom';

	
	const CLASS_DEFAULT = 'lib.model.Cpimpcom';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCOM = 'cpimpcom.REFCOM';

	
	const CODPRE = 'cpimpcom.CODPRE';

	
	const MONIMP = 'cpimpcom.MONIMP';

	
	const MONCAU = 'cpimpcom.MONCAU';

	
	const MONPAG = 'cpimpcom.MONPAG';

	
	const MONAJU = 'cpimpcom.MONAJU';

	
	const STAIMP = 'cpimpcom.STAIMP';

	
	const REFERE = 'cpimpcom.REFERE';

	
	const ID = 'cpimpcom.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom', 'Codpre', 'Monimp', 'Moncau', 'Monpag', 'Monaju', 'Staimp', 'Refere', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpimpcomPeer::REFCOM, CpimpcomPeer::CODPRE, CpimpcomPeer::MONIMP, CpimpcomPeer::MONCAU, CpimpcomPeer::MONPAG, CpimpcomPeer::MONAJU, CpimpcomPeer::STAIMP, CpimpcomPeer::REFERE, CpimpcomPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom', 'codpre', 'monimp', 'moncau', 'monpag', 'monaju', 'staimp', 'refere', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom' => 0, 'Codpre' => 1, 'Monimp' => 2, 'Moncau' => 3, 'Monpag' => 4, 'Monaju' => 5, 'Staimp' => 6, 'Refere' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (CpimpcomPeer::REFCOM => 0, CpimpcomPeer::CODPRE => 1, CpimpcomPeer::MONIMP => 2, CpimpcomPeer::MONCAU => 3, CpimpcomPeer::MONPAG => 4, CpimpcomPeer::MONAJU => 5, CpimpcomPeer::STAIMP => 6, CpimpcomPeer::REFERE => 7, CpimpcomPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom' => 0, 'codpre' => 1, 'monimp' => 2, 'moncau' => 3, 'monpag' => 4, 'monaju' => 5, 'staimp' => 6, 'refere' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CpimpcomMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CpimpcomMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpimpcomPeer::getTableMap();
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
		return str_replace(CpimpcomPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpimpcomPeer::REFCOM);

		$criteria->addSelectColumn(CpimpcomPeer::CODPRE);

		$criteria->addSelectColumn(CpimpcomPeer::MONIMP);

		$criteria->addSelectColumn(CpimpcomPeer::MONCAU);

		$criteria->addSelectColumn(CpimpcomPeer::MONPAG);

		$criteria->addSelectColumn(CpimpcomPeer::MONAJU);

		$criteria->addSelectColumn(CpimpcomPeer::STAIMP);

		$criteria->addSelectColumn(CpimpcomPeer::REFERE);

		$criteria->addSelectColumn(CpimpcomPeer::ID);

	}

	const COUNT = 'COUNT(cpimpcom.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpimpcom.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpimpcomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpimpcomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpimpcomPeer::doSelectRS($criteria, $con);
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
		$objects = CpimpcomPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpimpcomPeer::populateObjects(CpimpcomPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpimpcomPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpimpcomPeer::getOMClass();
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
		return CpimpcomPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpimpcomPeer::ID); 

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
			$comparison = $criteria->getComparison(CpimpcomPeer::ID);
			$selectCriteria->add(CpimpcomPeer::ID, $criteria->remove(CpimpcomPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpimpcomPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpimpcomPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpimpcom) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpimpcomPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpimpcom $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpimpcomPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpimpcomPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpimpcomPeer::DATABASE_NAME, CpimpcomPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpimpcomPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpimpcomPeer::DATABASE_NAME);

		$criteria->add(CpimpcomPeer::ID, $pk);


		$v = CpimpcomPeer::doSelect($criteria, $con);

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
			$criteria->add(CpimpcomPeer::ID, $pks, Criteria::IN);
			$objs = CpimpcomPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpimpcomPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CpimpcomMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CpimpcomMapBuilder');
}
