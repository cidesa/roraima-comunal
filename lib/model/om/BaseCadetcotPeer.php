<?php


abstract class BaseCadetcotPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cadetcot';

	
	const CLASS_DEFAULT = 'lib.model.Cadetcot';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCOT = 'cadetcot.REFCOT';

	
	const CODART = 'cadetcot.CODART';

	
	const CANORD = 'cadetcot.CANORD';

	
	const COSTO = 'cadetcot.COSTO';

	
	const TOTDET = 'cadetcot.TOTDET';

	
	const FECENT = 'cadetcot.FECENT';

	
	const PRIORI = 'cadetcot.PRIORI';

	
	const JUSTIFICA = 'cadetcot.JUSTIFICA';

	
	const MONDES = 'cadetcot.MONDES';

	
	const OBSERVACIONES = 'cadetcot.OBSERVACIONES';


	const ID = 'cadetcot.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcot', 'Codart', 'Canord', 'Costo', 'Totdet', 'Fecent', 'Priori', 'Justifica', 'Mondes', 'Observaciones', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CadetcotPeer::REFCOT, CadetcotPeer::CODART, CadetcotPeer::CANORD, CadetcotPeer::COSTO, CadetcotPeer::TOTDET, CadetcotPeer::FECENT, CadetcotPeer::PRIORI, CadetcotPeer::JUSTIFICA, CadetcotPeer::MONDES, CadetcotPeer::OBSERVACIONES, CadetcotPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcot', 'codart', 'canord', 'costo', 'totdet', 'fecent', 'priori', 'justifica', 'mondes', 'observaciones', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcot' => 0, 'Codart' => 1, 'Canord' => 2, 'Costo' => 3, 'Totdet' => 4, 'Fecent' => 5, 'Priori' => 6, 'Justifica' => 7, 'Mondes' => 8, 'Observaciones' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (CadetcotPeer::REFCOT => 0, CadetcotPeer::CODART => 1, CadetcotPeer::CANORD => 2, CadetcotPeer::COSTO => 3, CadetcotPeer::TOTDET => 4, CadetcotPeer::FECENT => 5, CadetcotPeer::PRIORI => 6, CadetcotPeer::JUSTIFICA => 7, CadetcotPeer::MONDES => 8, CadetcotPeer::OBSERVACIONES => 9, CadetcotPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('refcot' => 0, 'codart' => 1, 'canord' => 2, 'costo' => 3, 'totdet' => 4, 'fecent' => 5, 'priori' => 6, 'justifica' => 7, 'mondes' => 8, 'observaciones' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CadetcotMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CadetcotMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CadetcotPeer::getTableMap();
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
		return str_replace(CadetcotPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CadetcotPeer::REFCOT);

		$criteria->addSelectColumn(CadetcotPeer::CODART);

		$criteria->addSelectColumn(CadetcotPeer::CANORD);

		$criteria->addSelectColumn(CadetcotPeer::COSTO);

		$criteria->addSelectColumn(CadetcotPeer::TOTDET);

		$criteria->addSelectColumn(CadetcotPeer::FECENT);

		$criteria->addSelectColumn(CadetcotPeer::PRIORI);

		$criteria->addSelectColumn(CadetcotPeer::JUSTIFICA);

		$criteria->addSelectColumn(CadetcotPeer::MONDES);

		$criteria->addSelectColumn(CadetcotPeer::OBSERVACIONES);

		$criteria->addSelectColumn(CadetcotPeer::ID);

	}

	const COUNT = 'COUNT(cadetcot.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cadetcot.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadetcotPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadetcotPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CadetcotPeer::doSelectRS($criteria, $con);
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
		$objects = CadetcotPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CadetcotPeer::populateObjects(CadetcotPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CadetcotPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CadetcotPeer::getOMClass();
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
		return CadetcotPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CadetcotPeer::ID); 

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
			$comparison = $criteria->getComparison(CadetcotPeer::ID);
			$selectCriteria->add(CadetcotPeer::ID, $criteria->remove(CadetcotPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CadetcotPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CadetcotPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cadetcot) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CadetcotPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cadetcot $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CadetcotPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CadetcotPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CadetcotPeer::DATABASE_NAME, CadetcotPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CadetcotPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CadetcotPeer::DATABASE_NAME);

		$criteria->add(CadetcotPeer::ID, $pk);


		$v = CadetcotPeer::doSelect($criteria, $con);

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
			$criteria->add(CadetcotPeer::ID, $pks, Criteria::IN);
			$objs = CadetcotPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCadetcotPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CadetcotMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CadetcotMapBuilder');
}
