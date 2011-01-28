<?php


abstract class BaseFcbansalPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcbansal';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fcbansal';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODDOC = 'fcbansal.CODDOC';

	
	const CODFUN = 'fcbansal.CODFUN';

	
	const CODENTEXT = 'fcbansal.CODENTEXT';

	
	const CODTIPDOC = 'fcbansal.CODTIPDOC';

	
	const FECDOC = 'fcbansal.FECDOC';

	
	const HORDOC = 'fcbansal.HORDOC';

	
	const ASUNTO = 'fcbansal.ASUNTO';

	
	const CODUBIFIS = 'fcbansal.CODUBIFIS';

	
	const FECUBIFIS = 'fcbansal.FECUBIFIS';

	
	const HORUBIFIS = 'fcbansal.HORUBIFIS';

	
	const CODUBIMAG = 'fcbansal.CODUBIMAG';

	
	const FECUBIMAG = 'fcbansal.FECUBIMAG';

	
	const HORUBIMAG = 'fcbansal.HORUBIMAG';

	
	const ID = 'fcbansal.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Coddoc', 'Codfun', 'Codentext', 'Codtipdoc', 'Fecdoc', 'Hordoc', 'Asunto', 'Codubifis', 'Fecubifis', 'Horubifis', 'Codubimag', 'Fecubimag', 'Horubimag', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcbansalPeer::CODDOC, FcbansalPeer::CODFUN, FcbansalPeer::CODENTEXT, FcbansalPeer::CODTIPDOC, FcbansalPeer::FECDOC, FcbansalPeer::HORDOC, FcbansalPeer::ASUNTO, FcbansalPeer::CODUBIFIS, FcbansalPeer::FECUBIFIS, FcbansalPeer::HORUBIFIS, FcbansalPeer::CODUBIMAG, FcbansalPeer::FECUBIMAG, FcbansalPeer::HORUBIMAG, FcbansalPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('coddoc', 'codfun', 'codentext', 'codtipdoc', 'fecdoc', 'hordoc', 'asunto', 'codubifis', 'fecubifis', 'horubifis', 'codubimag', 'fecubimag', 'horubimag', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Coddoc' => 0, 'Codfun' => 1, 'Codentext' => 2, 'Codtipdoc' => 3, 'Fecdoc' => 4, 'Hordoc' => 5, 'Asunto' => 6, 'Codubifis' => 7, 'Fecubifis' => 8, 'Horubifis' => 9, 'Codubimag' => 10, 'Fecubimag' => 11, 'Horubimag' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (FcbansalPeer::CODDOC => 0, FcbansalPeer::CODFUN => 1, FcbansalPeer::CODENTEXT => 2, FcbansalPeer::CODTIPDOC => 3, FcbansalPeer::FECDOC => 4, FcbansalPeer::HORDOC => 5, FcbansalPeer::ASUNTO => 6, FcbansalPeer::CODUBIFIS => 7, FcbansalPeer::FECUBIFIS => 8, FcbansalPeer::HORUBIFIS => 9, FcbansalPeer::CODUBIMAG => 10, FcbansalPeer::FECUBIMAG => 11, FcbansalPeer::HORUBIMAG => 12, FcbansalPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('coddoc' => 0, 'codfun' => 1, 'codentext' => 2, 'codtipdoc' => 3, 'fecdoc' => 4, 'hordoc' => 5, 'asunto' => 6, 'codubifis' => 7, 'fecubifis' => 8, 'horubifis' => 9, 'codubimag' => 10, 'fecubimag' => 11, 'horubimag' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FcbansalMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FcbansalMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcbansalPeer::getTableMap();
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
		return str_replace(FcbansalPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcbansalPeer::CODDOC);

		$criteria->addSelectColumn(FcbansalPeer::CODFUN);

		$criteria->addSelectColumn(FcbansalPeer::CODENTEXT);

		$criteria->addSelectColumn(FcbansalPeer::CODTIPDOC);

		$criteria->addSelectColumn(FcbansalPeer::FECDOC);

		$criteria->addSelectColumn(FcbansalPeer::HORDOC);

		$criteria->addSelectColumn(FcbansalPeer::ASUNTO);

		$criteria->addSelectColumn(FcbansalPeer::CODUBIFIS);

		$criteria->addSelectColumn(FcbansalPeer::FECUBIFIS);

		$criteria->addSelectColumn(FcbansalPeer::HORUBIFIS);

		$criteria->addSelectColumn(FcbansalPeer::CODUBIMAG);

		$criteria->addSelectColumn(FcbansalPeer::FECUBIMAG);

		$criteria->addSelectColumn(FcbansalPeer::HORUBIMAG);

		$criteria->addSelectColumn(FcbansalPeer::ID);

	}

	const COUNT = 'COUNT(fcbansal.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcbansal.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcbansalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcbansalPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcbansalPeer::doSelectRS($criteria, $con);
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
		$objects = FcbansalPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcbansalPeer::populateObjects(FcbansalPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcbansalPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcbansalPeer::getOMClass();
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
		return FcbansalPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcbansalPeer::ID); 

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
			$comparison = $criteria->getComparison(FcbansalPeer::ID);
			$selectCriteria->add(FcbansalPeer::ID, $criteria->remove(FcbansalPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcbansalPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcbansalPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcbansal) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcbansalPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcbansal $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcbansalPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcbansalPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcbansalPeer::DATABASE_NAME, FcbansalPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcbansalPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcbansalPeer::DATABASE_NAME);

		$criteria->add(FcbansalPeer::ID, $pk);


		$v = FcbansalPeer::doSelect($criteria, $con);

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
			$criteria->add(FcbansalPeer::ID, $pks, Criteria::IN);
			$objs = FcbansalPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcbansalPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FcbansalMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FcbansalMapBuilder');
}
