<?php


abstract class BaseOpcheperPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'opcheper';

	
	const CLASS_DEFAULT = 'lib.model.Opcheper';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFOPP = 'opcheper.REFOPP';

	
	const REFCUO = 'opcheper.REFCUO';

	
	const MONPAG = 'opcheper.MONPAG';

	
	const FECPAG = 'opcheper.FECPAG';

	
	const NUMORD = 'opcheper.NUMORD';

	
	const CTABAN = 'opcheper.CTABAN';

	
	const NUMCHE = 'opcheper.NUMCHE';

	
	const TIPMOV = 'opcheper.TIPMOV';

	
	const ID = 'opcheper.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refopp', 'Refcuo', 'Monpag', 'Fecpag', 'Numord', 'Ctaban', 'Numche', 'Tipmov', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OpcheperPeer::REFOPP, OpcheperPeer::REFCUO, OpcheperPeer::MONPAG, OpcheperPeer::FECPAG, OpcheperPeer::NUMORD, OpcheperPeer::CTABAN, OpcheperPeer::NUMCHE, OpcheperPeer::TIPMOV, OpcheperPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refopp', 'refcuo', 'monpag', 'fecpag', 'numord', 'ctaban', 'numche', 'tipmov', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refopp' => 0, 'Refcuo' => 1, 'Monpag' => 2, 'Fecpag' => 3, 'Numord' => 4, 'Ctaban' => 5, 'Numche' => 6, 'Tipmov' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (OpcheperPeer::REFOPP => 0, OpcheperPeer::REFCUO => 1, OpcheperPeer::MONPAG => 2, OpcheperPeer::FECPAG => 3, OpcheperPeer::NUMORD => 4, OpcheperPeer::CTABAN => 5, OpcheperPeer::NUMCHE => 6, OpcheperPeer::TIPMOV => 7, OpcheperPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refopp' => 0, 'refcuo' => 1, 'monpag' => 2, 'fecpag' => 3, 'numord' => 4, 'ctaban' => 5, 'numche' => 6, 'tipmov' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OpcheperMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OpcheperMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OpcheperPeer::getTableMap();
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
		return str_replace(OpcheperPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OpcheperPeer::REFOPP);

		$criteria->addSelectColumn(OpcheperPeer::REFCUO);

		$criteria->addSelectColumn(OpcheperPeer::MONPAG);

		$criteria->addSelectColumn(OpcheperPeer::FECPAG);

		$criteria->addSelectColumn(OpcheperPeer::NUMORD);

		$criteria->addSelectColumn(OpcheperPeer::CTABAN);

		$criteria->addSelectColumn(OpcheperPeer::NUMCHE);

		$criteria->addSelectColumn(OpcheperPeer::TIPMOV);

		$criteria->addSelectColumn(OpcheperPeer::ID);

	}

	const COUNT = 'COUNT(opcheper.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT opcheper.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpcheperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpcheperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OpcheperPeer::doSelectRS($criteria, $con);
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
		$objects = OpcheperPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OpcheperPeer::populateObjects(OpcheperPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OpcheperPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OpcheperPeer::getOMClass();
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
		return OpcheperPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OpcheperPeer::ID); 

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
			$comparison = $criteria->getComparison(OpcheperPeer::ID);
			$selectCriteria->add(OpcheperPeer::ID, $criteria->remove(OpcheperPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OpcheperPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OpcheperPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Opcheper) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OpcheperPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Opcheper $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OpcheperPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OpcheperPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OpcheperPeer::DATABASE_NAME, OpcheperPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OpcheperPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OpcheperPeer::DATABASE_NAME);

		$criteria->add(OpcheperPeer::ID, $pk);


		$v = OpcheperPeer::doSelect($criteria, $con);

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
			$criteria->add(OpcheperPeer::ID, $pks, Criteria::IN);
			$objs = OpcheperPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOpcheperPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OpcheperMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OpcheperMapBuilder');
}
