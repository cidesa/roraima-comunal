<?php


abstract class BaseFcsolvenciaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcsolvencia';

	
	const CLASS_DEFAULT = 'lib.model.Fcsolvencia';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODSOL = 'fcsolvencia.CODSOL';

	
	const CODTIP = 'fcsolvencia.CODTIP';

	
	const FECEXP = 'fcsolvencia.FECEXP';

	
	const FECVEN = 'fcsolvencia.FECVEN';

	
	const NUMLIC = 'fcsolvencia.NUMLIC';

	
	const RIFCON = 'fcsolvencia.RIFCON';

	
	const CODCAT = 'fcsolvencia.CODCAT';

	
	const NOMCON = 'fcsolvencia.NOMCON';

	
	const DIRCON = 'fcsolvencia.DIRCON';

	
	const CODFUE = 'fcsolvencia.CODFUE';

	
	const STASOL = 'fcsolvencia.STASOL';

	
	const MOTIVO = 'fcsolvencia.MOTIVO';

	
	const ID = 'fcsolvencia.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codsol', 'Codtip', 'Fecexp', 'Fecven', 'Numlic', 'Rifcon', 'Codcat', 'Nomcon', 'Dircon', 'Codfue', 'Stasol', 'Motivo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcsolvenciaPeer::CODSOL, FcsolvenciaPeer::CODTIP, FcsolvenciaPeer::FECEXP, FcsolvenciaPeer::FECVEN, FcsolvenciaPeer::NUMLIC, FcsolvenciaPeer::RIFCON, FcsolvenciaPeer::CODCAT, FcsolvenciaPeer::NOMCON, FcsolvenciaPeer::DIRCON, FcsolvenciaPeer::CODFUE, FcsolvenciaPeer::STASOL, FcsolvenciaPeer::MOTIVO, FcsolvenciaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codsol', 'codtip', 'fecexp', 'fecven', 'numlic', 'rifcon', 'codcat', 'nomcon', 'dircon', 'codfue', 'stasol', 'motivo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codsol' => 0, 'Codtip' => 1, 'Fecexp' => 2, 'Fecven' => 3, 'Numlic' => 4, 'Rifcon' => 5, 'Codcat' => 6, 'Nomcon' => 7, 'Dircon' => 8, 'Codfue' => 9, 'Stasol' => 10, 'Motivo' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (FcsolvenciaPeer::CODSOL => 0, FcsolvenciaPeer::CODTIP => 1, FcsolvenciaPeer::FECEXP => 2, FcsolvenciaPeer::FECVEN => 3, FcsolvenciaPeer::NUMLIC => 4, FcsolvenciaPeer::RIFCON => 5, FcsolvenciaPeer::CODCAT => 6, FcsolvenciaPeer::NOMCON => 7, FcsolvenciaPeer::DIRCON => 8, FcsolvenciaPeer::CODFUE => 9, FcsolvenciaPeer::STASOL => 10, FcsolvenciaPeer::MOTIVO => 11, FcsolvenciaPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('codsol' => 0, 'codtip' => 1, 'fecexp' => 2, 'fecven' => 3, 'numlic' => 4, 'rifcon' => 5, 'codcat' => 6, 'nomcon' => 7, 'dircon' => 8, 'codfue' => 9, 'stasol' => 10, 'motivo' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcsolvenciaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcsolvenciaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcsolvenciaPeer::getTableMap();
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
		return str_replace(FcsolvenciaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcsolvenciaPeer::CODSOL);

		$criteria->addSelectColumn(FcsolvenciaPeer::CODTIP);

		$criteria->addSelectColumn(FcsolvenciaPeer::FECEXP);

		$criteria->addSelectColumn(FcsolvenciaPeer::FECVEN);

		$criteria->addSelectColumn(FcsolvenciaPeer::NUMLIC);

		$criteria->addSelectColumn(FcsolvenciaPeer::RIFCON);

		$criteria->addSelectColumn(FcsolvenciaPeer::CODCAT);

		$criteria->addSelectColumn(FcsolvenciaPeer::NOMCON);

		$criteria->addSelectColumn(FcsolvenciaPeer::DIRCON);

		$criteria->addSelectColumn(FcsolvenciaPeer::CODFUE);

		$criteria->addSelectColumn(FcsolvenciaPeer::STASOL);

		$criteria->addSelectColumn(FcsolvenciaPeer::MOTIVO);

		$criteria->addSelectColumn(FcsolvenciaPeer::ID);

	}

	const COUNT = 'COUNT(fcsolvencia.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcsolvencia.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcsolvenciaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcsolvenciaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcsolvenciaPeer::doSelectRS($criteria, $con);
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
		$objects = FcsolvenciaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcsolvenciaPeer::populateObjects(FcsolvenciaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcsolvenciaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcsolvenciaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFctipsol(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcsolvenciaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcsolvenciaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcsolvenciaPeer::CODTIP, FctipsolPeer::CODTIP);

		$rs = FcsolvenciaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFctipsol(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcsolvenciaPeer::addSelectColumns($c);
		$startcol = (FcsolvenciaPeer::NUM_COLUMNS - FcsolvenciaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FctipsolPeer::addSelectColumns($c);

		$c->addJoin(FcsolvenciaPeer::CODTIP, FctipsolPeer::CODTIP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcsolvenciaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FctipsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFctipsol(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFcsolvencia($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFcsolvencias();
				$obj2->addFcsolvencia($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcsolvenciaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcsolvenciaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcsolvenciaPeer::CODTIP, FctipsolPeer::CODTIP);

		$rs = FcsolvenciaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcsolvenciaPeer::addSelectColumns($c);
		$startcol2 = (FcsolvenciaPeer::NUM_COLUMNS - FcsolvenciaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FctipsolPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FctipsolPeer::NUM_COLUMNS;

		$c->addJoin(FcsolvenciaPeer::CODTIP, FctipsolPeer::CODTIP);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcsolvenciaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = FctipsolPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFctipsol(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFcsolvencia($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initFcsolvencias();
				$obj2->addFcsolvencia($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return FcsolvenciaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcsolvenciaPeer::ID); 

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
			$comparison = $criteria->getComparison(FcsolvenciaPeer::ID);
			$selectCriteria->add(FcsolvenciaPeer::ID, $criteria->remove(FcsolvenciaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcsolvenciaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcsolvenciaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcsolvencia) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcsolvenciaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcsolvencia $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcsolvenciaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcsolvenciaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcsolvenciaPeer::DATABASE_NAME, FcsolvenciaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcsolvenciaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcsolvenciaPeer::DATABASE_NAME);

		$criteria->add(FcsolvenciaPeer::ID, $pk);


		$v = FcsolvenciaPeer::doSelect($criteria, $con);

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
			$criteria->add(FcsolvenciaPeer::ID, $pks, Criteria::IN);
			$objs = FcsolvenciaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcsolvenciaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcsolvenciaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcsolvenciaMapBuilder');
}
