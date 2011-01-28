<?php


abstract class BaseCpimpcauPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpimpcau';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpimpcau';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCAU = 'cpimpcau.REFCAU';

	
	const CODPRE = 'cpimpcau.CODPRE';

	
	const MONIMP = 'cpimpcau.MONIMP';

	
	const MONPAG = 'cpimpcau.MONPAG';

	
	const MONAJU = 'cpimpcau.MONAJU';

	
	const STAIMP = 'cpimpcau.STAIMP';

	
	const REFERE = 'cpimpcau.REFERE';

	
	const REFPRC = 'cpimpcau.REFPRC';

	
	const ID = 'cpimpcau.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcau', 'Codpre', 'Monimp', 'Monpag', 'Monaju', 'Staimp', 'Refere', 'Refprc', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpimpcauPeer::REFCAU, CpimpcauPeer::CODPRE, CpimpcauPeer::MONIMP, CpimpcauPeer::MONPAG, CpimpcauPeer::MONAJU, CpimpcauPeer::STAIMP, CpimpcauPeer::REFERE, CpimpcauPeer::REFPRC, CpimpcauPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcau', 'codpre', 'monimp', 'monpag', 'monaju', 'staimp', 'refere', 'refprc', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcau' => 0, 'Codpre' => 1, 'Monimp' => 2, 'Monpag' => 3, 'Monaju' => 4, 'Staimp' => 5, 'Refere' => 6, 'Refprc' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (CpimpcauPeer::REFCAU => 0, CpimpcauPeer::CODPRE => 1, CpimpcauPeer::MONIMP => 2, CpimpcauPeer::MONPAG => 3, CpimpcauPeer::MONAJU => 4, CpimpcauPeer::STAIMP => 5, CpimpcauPeer::REFERE => 6, CpimpcauPeer::REFPRC => 7, CpimpcauPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refcau' => 0, 'codpre' => 1, 'monimp' => 2, 'monpag' => 3, 'monaju' => 4, 'staimp' => 5, 'refere' => 6, 'refprc' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpimpcauMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpimpcauMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpimpcauPeer::getTableMap();
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
		return str_replace(CpimpcauPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpimpcauPeer::REFCAU);

		$criteria->addSelectColumn(CpimpcauPeer::CODPRE);

		$criteria->addSelectColumn(CpimpcauPeer::MONIMP);

		$criteria->addSelectColumn(CpimpcauPeer::MONPAG);

		$criteria->addSelectColumn(CpimpcauPeer::MONAJU);

		$criteria->addSelectColumn(CpimpcauPeer::STAIMP);

		$criteria->addSelectColumn(CpimpcauPeer::REFERE);

		$criteria->addSelectColumn(CpimpcauPeer::REFPRC);

		$criteria->addSelectColumn(CpimpcauPeer::ID);

	}

	const COUNT = 'COUNT(cpimpcau.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpimpcau.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpimpcauPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpimpcauPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpimpcauPeer::doSelectRS($criteria, $con);
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
		$objects = CpimpcauPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpimpcauPeer::populateObjects(CpimpcauPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpimpcauPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpimpcauPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCpcausad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpimpcauPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpimpcauPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpimpcauPeer::REFCAU, CpcausadPeer::REFCAU);

		$rs = CpimpcauPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCpcausad(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpimpcauPeer::addSelectColumns($c);
		$startcol = (CpimpcauPeer::NUM_COLUMNS - CpimpcauPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpcausadPeer::addSelectColumns($c);

		$c->addJoin(CpimpcauPeer::REFCAU, CpcausadPeer::REFCAU);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpimpcauPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpcausadPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpcausad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpimpcau($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpimpcaus();
				$obj2->addCpimpcau($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpimpcauPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpimpcauPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CpimpcauPeer::REFCAU, CpcausadPeer::REFCAU);
	
		$rs = CpimpcauPeer::doSelectRS($criteria, $con);
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

		CpimpcauPeer::addSelectColumns($c);
		$startcol2 = (CpimpcauPeer::NUM_COLUMNS - CpimpcauPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpcausadPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpcausadPeer::NUM_COLUMNS;
	
			$c->addJoin(CpimpcauPeer::REFCAU, CpcausadPeer::REFCAU);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpimpcauPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CpcausadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpcausad(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpimpcau($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCpimpcaus();
					$obj2->addCpimpcau($obj1);
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
		return CpimpcauPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpimpcauPeer::ID); 

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
			$comparison = $criteria->getComparison(CpimpcauPeer::ID);
			$selectCriteria->add(CpimpcauPeer::ID, $criteria->remove(CpimpcauPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpimpcauPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpimpcauPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpimpcau) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpimpcauPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpimpcau $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpimpcauPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpimpcauPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpimpcauPeer::DATABASE_NAME, CpimpcauPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpimpcauPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpimpcauPeer::DATABASE_NAME);

		$criteria->add(CpimpcauPeer::ID, $pk);


		$v = CpimpcauPeer::doSelect($criteria, $con);

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
			$criteria->add(CpimpcauPeer::ID, $pks, Criteria::IN);
			$objs = CpimpcauPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpimpcauPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpimpcauMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpimpcauMapBuilder');
}
