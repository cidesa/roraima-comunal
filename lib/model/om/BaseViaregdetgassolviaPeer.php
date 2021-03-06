<?php


abstract class BaseViaregdetgassolviaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'viaregdetgassolvia';

	
	const CLASS_DEFAULT = 'lib.model.Viaregdetgassolvia';

	
	const NUM_COLUMNS = 4;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const VIAREGDETSOLVIA_ID = 'viaregdetgassolvia.VIAREGDETSOLVIA_ID';

	
	const VIAREGTIPSER_ID = 'viaregdetgassolvia.VIAREGTIPSER_ID';

	
	const DETGASMONT = 'viaregdetgassolvia.DETGASMONT';

	
	const ID = 'viaregdetgassolvia.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('ViaregdetsolviaId', 'ViaregtipserId', 'Detgasmont', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID, ViaregdetgassolviaPeer::VIAREGTIPSER_ID, ViaregdetgassolviaPeer::DETGASMONT, ViaregdetgassolviaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('viaregdetsolvia_id', 'viaregtipser_id', 'detgasmont', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('ViaregdetsolviaId' => 0, 'ViaregtipserId' => 1, 'Detgasmont' => 2, 'Id' => 3, ),
		BasePeer::TYPE_COLNAME => array (ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID => 0, ViaregdetgassolviaPeer::VIAREGTIPSER_ID => 1, ViaregdetgassolviaPeer::DETGASMONT => 2, ViaregdetgassolviaPeer::ID => 3, ),
		BasePeer::TYPE_FIELDNAME => array ('viaregdetsolvia_id' => 0, 'viaregtipser_id' => 1, 'detgasmont' => 2, 'id' => 3, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ViaregdetgassolviaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ViaregdetgassolviaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ViaregdetgassolviaPeer::getTableMap();
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
		return str_replace(ViaregdetgassolviaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID);

		$criteria->addSelectColumn(ViaregdetgassolviaPeer::VIAREGTIPSER_ID);

		$criteria->addSelectColumn(ViaregdetgassolviaPeer::DETGASMONT);

		$criteria->addSelectColumn(ViaregdetgassolviaPeer::ID);

	}

	const COUNT = 'COUNT(viaregdetgassolvia.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT viaregdetgassolvia.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetgassolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetgassolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ViaregdetgassolviaPeer::doSelectRS($criteria, $con);
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
		$objects = ViaregdetgassolviaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ViaregdetgassolviaPeer::populateObjects(ViaregdetgassolviaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ViaregdetgassolviaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ViaregdetgassolviaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinViaregdetsolvia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetgassolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetgassolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID, ViaregdetsolviaPeer::ID);

		$rs = ViaregdetgassolviaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinViaregtipser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetgassolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetgassolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregdetgassolviaPeer::VIAREGTIPSER_ID, ViaregtipserPeer::ID);

		$rs = ViaregdetgassolviaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinViaregdetsolvia(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViaregdetgassolviaPeer::addSelectColumns($c);
		$startcol = (ViaregdetgassolviaPeer::NUM_COLUMNS - ViaregdetgassolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ViaregdetsolviaPeer::addSelectColumns($c);

		$c->addJoin(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID, ViaregdetsolviaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregdetgassolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregdetsolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getViaregdetsolvia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addViaregdetgassolvia($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initViaregdetgassolvias();
				$obj2->addViaregdetgassolvia($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinViaregtipser(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViaregdetgassolviaPeer::addSelectColumns($c);
		$startcol = (ViaregdetgassolviaPeer::NUM_COLUMNS - ViaregdetgassolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ViaregtipserPeer::addSelectColumns($c);

		$c->addJoin(ViaregdetgassolviaPeer::VIAREGTIPSER_ID, ViaregtipserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregdetgassolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregtipserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getViaregtipser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addViaregdetgassolvia($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initViaregdetgassolvias();
				$obj2->addViaregdetgassolvia($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetgassolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetgassolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID, ViaregdetsolviaPeer::ID);

		$criteria->addJoin(ViaregdetgassolviaPeer::VIAREGTIPSER_ID, ViaregtipserPeer::ID);

		$rs = ViaregdetgassolviaPeer::doSelectRS($criteria, $con);
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

		ViaregdetgassolviaPeer::addSelectColumns($c);
		$startcol2 = (ViaregdetgassolviaPeer::NUM_COLUMNS - ViaregdetgassolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ViaregdetsolviaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ViaregdetsolviaPeer::NUM_COLUMNS;

		ViaregtipserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ViaregtipserPeer::NUM_COLUMNS;

		$c->addJoin(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID, ViaregdetsolviaPeer::ID);

		$c->addJoin(ViaregdetgassolviaPeer::VIAREGTIPSER_ID, ViaregtipserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregdetgassolviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ViaregdetsolviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getViaregdetsolvia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addViaregdetgassolvia($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initViaregdetgassolvias();
				$obj2->addViaregdetgassolvia($obj1);
			}


					
			$omClass = ViaregtipserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getViaregtipser(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addViaregdetgassolvia($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initViaregdetgassolvias();
				$obj3->addViaregdetgassolvia($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptViaregdetsolvia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetgassolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetgassolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregdetgassolviaPeer::VIAREGTIPSER_ID, ViaregtipserPeer::ID);

		$rs = ViaregdetgassolviaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptViaregtipser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregdetgassolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregdetgassolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID, ViaregdetsolviaPeer::ID);

		$rs = ViaregdetgassolviaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptViaregdetsolvia(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViaregdetgassolviaPeer::addSelectColumns($c);
		$startcol2 = (ViaregdetgassolviaPeer::NUM_COLUMNS - ViaregdetgassolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ViaregtipserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ViaregtipserPeer::NUM_COLUMNS;

		$c->addJoin(ViaregdetgassolviaPeer::VIAREGTIPSER_ID, ViaregtipserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregdetgassolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregtipserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getViaregtipser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addViaregdetgassolvia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initViaregdetgassolvias();
				$obj2->addViaregdetgassolvia($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptViaregtipser(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViaregdetgassolviaPeer::addSelectColumns($c);
		$startcol2 = (ViaregdetgassolviaPeer::NUM_COLUMNS - ViaregdetgassolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ViaregdetsolviaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ViaregdetsolviaPeer::NUM_COLUMNS;

		$c->addJoin(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID, ViaregdetsolviaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregdetgassolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregdetsolviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getViaregdetsolvia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addViaregdetgassolvia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initViaregdetgassolvias();
				$obj2->addViaregdetgassolvia($obj1);
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
		return ViaregdetgassolviaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ViaregdetgassolviaPeer::ID); 

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
			$comparison = $criteria->getComparison(ViaregdetgassolviaPeer::ID);
			$selectCriteria->add(ViaregdetgassolviaPeer::ID, $criteria->remove(ViaregdetgassolviaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ViaregdetgassolviaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ViaregdetgassolviaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Viaregdetgassolvia) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ViaregdetgassolviaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Viaregdetgassolvia $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ViaregdetgassolviaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ViaregdetgassolviaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ViaregdetgassolviaPeer::DATABASE_NAME, ViaregdetgassolviaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ViaregdetgassolviaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ViaregdetgassolviaPeer::DATABASE_NAME);

		$criteria->add(ViaregdetgassolviaPeer::ID, $pk);


		$v = ViaregdetgassolviaPeer::doSelect($criteria, $con);

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
			$criteria->add(ViaregdetgassolviaPeer::ID, $pks, Criteria::IN);
			$objs = ViaregdetgassolviaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseViaregdetgassolviaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ViaregdetgassolviaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ViaregdetgassolviaMapBuilder');
}
