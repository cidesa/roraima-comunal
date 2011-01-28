<?php


abstract class BaseFcconPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fccon';

	
	const CLASS_DEFAULT = 'lib.model.Fccon';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const RIFCON = 'fccon.RIFCON';

	
	const REPCON = 'fccon.REPCON';

	
	const NITCON = 'fccon.NITCON';

	
	const NOMCON = 'fccon.NOMCON';

	
	const NACCON = 'fccon.NACCON';

	
	const DIRCON = 'fccon.DIRCON';

	
	const CODPAR = 'fccon.CODPAR';

	
	const CIUCON = 'fccon.CIUCON';

	
	const CPOCON = 'fccon.CPOCON';

	
	const APOCON = 'fccon.APOCON';

	
	const TIPCON = 'fccon.TIPCON';

	
	const TELCON = 'fccon.TELCON';

	
	const FAXCON = 'fccon.FAXCON';

	
	const EMACON = 'fccon.EMACON';

	
	const URLCON = 'fccon.URLCON';

	
	const CODMUN = 'fccon.CODMUN';

	
	const CODEDO = 'fccon.CODEDO';

	
	const CODPAI = 'fccon.CODPAI';

	
	const ID = 'fccon.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Rifcon', 'Repcon', 'Nitcon', 'Nomcon', 'Naccon', 'Dircon', 'Codpar', 'Ciucon', 'Cpocon', 'Apocon', 'Tipcon', 'Telcon', 'Faxcon', 'Emacon', 'Urlcon', 'Codmun', 'Codedo', 'Codpai', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcconPeer::RIFCON, FcconPeer::REPCON, FcconPeer::NITCON, FcconPeer::NOMCON, FcconPeer::NACCON, FcconPeer::DIRCON, FcconPeer::CODPAR, FcconPeer::CIUCON, FcconPeer::CPOCON, FcconPeer::APOCON, FcconPeer::TIPCON, FcconPeer::TELCON, FcconPeer::FAXCON, FcconPeer::EMACON, FcconPeer::URLCON, FcconPeer::CODMUN, FcconPeer::CODEDO, FcconPeer::CODPAI, FcconPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('rifcon', 'repcon', 'nitcon', 'nomcon', 'naccon', 'dircon', 'codpar', 'ciucon', 'cpocon', 'apocon', 'tipcon', 'telcon', 'faxcon', 'emacon', 'urlcon', 'codmun', 'codedo', 'codpai', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Rifcon' => 0, 'Repcon' => 1, 'Nitcon' => 2, 'Nomcon' => 3, 'Naccon' => 4, 'Dircon' => 5, 'Codpar' => 6, 'Ciucon' => 7, 'Cpocon' => 8, 'Apocon' => 9, 'Tipcon' => 10, 'Telcon' => 11, 'Faxcon' => 12, 'Emacon' => 13, 'Urlcon' => 14, 'Codmun' => 15, 'Codedo' => 16, 'Codpai' => 17, 'Id' => 18, ),
		BasePeer::TYPE_COLNAME => array (FcconPeer::RIFCON => 0, FcconPeer::REPCON => 1, FcconPeer::NITCON => 2, FcconPeer::NOMCON => 3, FcconPeer::NACCON => 4, FcconPeer::DIRCON => 5, FcconPeer::CODPAR => 6, FcconPeer::CIUCON => 7, FcconPeer::CPOCON => 8, FcconPeer::APOCON => 9, FcconPeer::TIPCON => 10, FcconPeer::TELCON => 11, FcconPeer::FAXCON => 12, FcconPeer::EMACON => 13, FcconPeer::URLCON => 14, FcconPeer::CODMUN => 15, FcconPeer::CODEDO => 16, FcconPeer::CODPAI => 17, FcconPeer::ID => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('rifcon' => 0, 'repcon' => 1, 'nitcon' => 2, 'nomcon' => 3, 'naccon' => 4, 'dircon' => 5, 'codpar' => 6, 'ciucon' => 7, 'cpocon' => 8, 'apocon' => 9, 'tipcon' => 10, 'telcon' => 11, 'faxcon' => 12, 'emacon' => 13, 'urlcon' => 14, 'codmun' => 15, 'codedo' => 16, 'codpai' => 17, 'id' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcconMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcconMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcconPeer::getTableMap();
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
		return str_replace(FcconPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcconPeer::RIFCON);

		$criteria->addSelectColumn(FcconPeer::REPCON);

		$criteria->addSelectColumn(FcconPeer::NITCON);

		$criteria->addSelectColumn(FcconPeer::NOMCON);

		$criteria->addSelectColumn(FcconPeer::NACCON);

		$criteria->addSelectColumn(FcconPeer::DIRCON);

		$criteria->addSelectColumn(FcconPeer::CODPAR);

		$criteria->addSelectColumn(FcconPeer::CIUCON);

		$criteria->addSelectColumn(FcconPeer::CPOCON);

		$criteria->addSelectColumn(FcconPeer::APOCON);

		$criteria->addSelectColumn(FcconPeer::TIPCON);

		$criteria->addSelectColumn(FcconPeer::TELCON);

		$criteria->addSelectColumn(FcconPeer::FAXCON);

		$criteria->addSelectColumn(FcconPeer::EMACON);

		$criteria->addSelectColumn(FcconPeer::URLCON);

		$criteria->addSelectColumn(FcconPeer::CODMUN);

		$criteria->addSelectColumn(FcconPeer::CODEDO);

		$criteria->addSelectColumn(FcconPeer::CODPAI);

		$criteria->addSelectColumn(FcconPeer::ID);

	}

	const COUNT = 'COUNT(fccon.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fccon.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcconPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcconPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcconPeer::doSelectRS($criteria, $con);
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
		$objects = FcconPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcconPeer::populateObjects(FcconPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcconPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcconPeer::getOMClass();
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
		return FcconPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcconPeer::ID); 

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
			$comparison = $criteria->getComparison(FcconPeer::ID);
			$selectCriteria->add(FcconPeer::ID, $criteria->remove(FcconPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcconPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcconPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fccon) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcconPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fccon $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcconPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcconPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcconPeer::DATABASE_NAME, FcconPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcconPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcconPeer::DATABASE_NAME);

		$criteria->add(FcconPeer::ID, $pk);


		$v = FcconPeer::doSelect($criteria, $con);

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
			$criteria->add(FcconPeer::ID, $pks, Criteria::IN);
			$objs = FcconPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcconPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcconMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcconMapBuilder');
}
