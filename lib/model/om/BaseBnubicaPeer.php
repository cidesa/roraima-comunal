<?php


abstract class BaseBnubicaPeer {


	const DATABASE_NAME = 'propel';


	const TABLE_NAME = 'bnubica';


	const CLASS_DEFAULT = 'lib.model.Bnubica';


	const NUM_COLUMNS = 8;


	const NUM_LAZY_LOAD_COLUMNS = 0;



	const CODUBI = 'bnubica.CODUBI';


	const DESUBI = 'bnubica.DESUBI';


	const STACOD = 'bnubica.STACOD';


	const CEDEMP = 'bnubica.CEDEMP';

	
	const NOMEMP = 'bnubica.NOMEMP';


	const NOMCAR = 'bnubica.NOMCAR';


	const NOMJEF = 'bnubica.NOMJEF';


	const ID = 'bnubica.ID';


	private static $phpNameMap = null;



	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codubi', 'Desubi', 'Stacod', 'Cedemp', 'Nomemp', 'Nomcar', 'Nomjef', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BnubicaPeer::CODUBI, BnubicaPeer::DESUBI, BnubicaPeer::STACOD, BnubicaPeer::CEDEMP, BnubicaPeer::NOMEMP, BnubicaPeer::NOMCAR, BnubicaPeer::NOMJEF, BnubicaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codubi', 'desubi', 'stacod', 'cedemp', 'nomemp', 'nomcar', 'nomjef', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);


	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codubi' => 0, 'Desubi' => 1, 'Stacod' => 2, 'Cedemp' => 3, 'Nomemp' => 4, 'Nomcar' => 5, 'Nomjef' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (BnubicaPeer::CODUBI => 0, BnubicaPeer::DESUBI => 1, BnubicaPeer::STACOD => 2, BnubicaPeer::CEDEMP => 3, BnubicaPeer::NOMEMP => 4, BnubicaPeer::NOMCAR => 5, BnubicaPeer::NOMJEF => 6, BnubicaPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codubi' => 0, 'desubi' => 1, 'stacod' => 2, 'cedemp' => 3, 'nomemp' => 4, 'nomcar' => 5, 'nomjef' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);


	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BnubicaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BnubicaMapBuilder');
	}

	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BnubicaPeer::getTableMap();
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
		return str_replace(BnubicaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}


	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BnubicaPeer::CODUBI);

		$criteria->addSelectColumn(BnubicaPeer::DESUBI);

		$criteria->addSelectColumn(BnubicaPeer::STACOD);

		$criteria->addSelectColumn(BnubicaPeer::CEDEMP);

		$criteria->addSelectColumn(BnubicaPeer::NOMEMP);

		$criteria->addSelectColumn(BnubicaPeer::NOMCAR);

		$criteria->addSelectColumn(BnubicaPeer::NOMJEF);

		$criteria->addSelectColumn(BnubicaPeer::ID);

	}

	const COUNT = 'COUNT(bnubica.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bnubica.ID)';


	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BnubicaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BnubicaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BnubicaPeer::doSelectRS($criteria, $con);
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
		$objects = BnubicaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}

	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BnubicaPeer::populateObjects(BnubicaPeer::doSelectRS($criteria, $con));
	}

	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BnubicaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}

	public static function populateObjects(ResultSet $rs)
	{
		$results = array();

				$cls = BnubicaPeer::getOMClass();
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
		return BnubicaPeer::CLASS_DEFAULT;
	}


	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BnubicaPeer::ID);

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
			$comparison = $criteria->getComparison(BnubicaPeer::ID);
			$selectCriteria->add(BnubicaPeer::ID, $criteria->remove(BnubicaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BnubicaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BnubicaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bnubica) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BnubicaPeer::ID, (array) $values, Criteria::IN);
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


	public static function doValidate(Bnubica $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BnubicaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BnubicaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BnubicaPeer::DATABASE_NAME, BnubicaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BnubicaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BnubicaPeer::DATABASE_NAME);

		$criteria->add(BnubicaPeer::ID, $pk);


		$v = BnubicaPeer::doSelect($criteria, $con);

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
			$criteria->add(BnubicaPeer::ID, $pks, Criteria::IN);
			$objs = BnubicaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

}
if (Propel::isInit()) {
			try {
		BaseBnubicaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BnubicaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BnubicaMapBuilder');
}
