<?php


abstract class BaseCadetentPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cadetent';

	
	const CLASS_DEFAULT = 'lib.model.Cadetent';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const RCPART = 'cadetent.RCPART';

	
	const CODART = 'cadetent.CODART';

	
	const CANREC = 'cadetent.CANREC';

	
	const MONTOT = 'cadetent.MONTOT';

	
	const COSART = 'cadetent.COSART';

	
	const CODALM = 'cadetent.CODALM';

	
	const CODUBI = 'cadetent.CODUBI';

	
	const FECVEN = 'cadetent.FECVEN';

	
	const NUMJAU = 'cadetent.NUMJAU';

	
	const TAMMET = 'cadetent.TAMMET';

	
	const NUMLOT = 'cadetent.NUMLOT';

	
	const ID = 'cadetent.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Rcpart', 'Codart', 'Canrec', 'Montot', 'Cosart', 'Codalm', 'Codubi', 'Fecven', 'Numjau', 'Tammet', 'Numlot', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CadetentPeer::RCPART, CadetentPeer::CODART, CadetentPeer::CANREC, CadetentPeer::MONTOT, CadetentPeer::COSART, CadetentPeer::CODALM, CadetentPeer::CODUBI, CadetentPeer::FECVEN, CadetentPeer::NUMJAU, CadetentPeer::TAMMET, CadetentPeer::NUMLOT, CadetentPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('rcpart', 'codart', 'canrec', 'montot', 'cosart', 'codalm', 'codubi', 'fecven', 'numjau', 'tammet', 'numlot', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Rcpart' => 0, 'Codart' => 1, 'Canrec' => 2, 'Montot' => 3, 'Cosart' => 4, 'Codalm' => 5, 'Codubi' => 6, 'Fecven' => 7, 'Numjau' => 8, 'Tammet' => 9, 'Numlot' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (CadetentPeer::RCPART => 0, CadetentPeer::CODART => 1, CadetentPeer::CANREC => 2, CadetentPeer::MONTOT => 3, CadetentPeer::COSART => 4, CadetentPeer::CODALM => 5, CadetentPeer::CODUBI => 6, CadetentPeer::FECVEN => 7, CadetentPeer::NUMJAU => 8, CadetentPeer::TAMMET => 9, CadetentPeer::NUMLOT => 10, CadetentPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('rcpart' => 0, 'codart' => 1, 'canrec' => 2, 'montot' => 3, 'cosart' => 4, 'codalm' => 5, 'codubi' => 6, 'fecven' => 7, 'numjau' => 8, 'tammet' => 9, 'numlot' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CadetentMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CadetentMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CadetentPeer::getTableMap();
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
		return str_replace(CadetentPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CadetentPeer::RCPART);

		$criteria->addSelectColumn(CadetentPeer::CODART);

		$criteria->addSelectColumn(CadetentPeer::CANREC);

		$criteria->addSelectColumn(CadetentPeer::MONTOT);

		$criteria->addSelectColumn(CadetentPeer::COSART);

		$criteria->addSelectColumn(CadetentPeer::CODALM);

		$criteria->addSelectColumn(CadetentPeer::CODUBI);

		$criteria->addSelectColumn(CadetentPeer::FECVEN);

		$criteria->addSelectColumn(CadetentPeer::NUMJAU);

		$criteria->addSelectColumn(CadetentPeer::TAMMET);

		$criteria->addSelectColumn(CadetentPeer::NUMLOT);

		$criteria->addSelectColumn(CadetentPeer::ID);

	}

	const COUNT = 'COUNT(cadetent.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cadetent.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadetentPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadetentPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CadetentPeer::doSelectRS($criteria, $con);
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
		$objects = CadetentPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CadetentPeer::populateObjects(CadetentPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CadetentPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CadetentPeer::getOMClass();
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
		return CadetentPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CadetentPeer::ID); 

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
			$comparison = $criteria->getComparison(CadetentPeer::ID);
			$selectCriteria->add(CadetentPeer::ID, $criteria->remove(CadetentPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CadetentPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CadetentPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cadetent) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CadetentPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cadetent $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CadetentPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CadetentPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CadetentPeer::DATABASE_NAME, CadetentPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CadetentPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CadetentPeer::DATABASE_NAME);

		$criteria->add(CadetentPeer::ID, $pk);


		$v = CadetentPeer::doSelect($criteria, $con);

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
			$criteria->add(CadetentPeer::ID, $pks, Criteria::IN);
			$objs = CadetentPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCadetentPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CadetentMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CadetentMapBuilder');
}
