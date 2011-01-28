<?php


abstract class BaseTsmovbanPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tsmovban';

	
	const CLASS_DEFAULT = 'lib.model.Tsmovban';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCUE = 'tsmovban.NUMCUE';

	
	const CODCTA = 'tsmovban.CODCTA';

	
	const REFBAN = 'tsmovban.REFBAN';

	
	const FECBAN = 'tsmovban.FECBAN';

	
	const TIPMOV = 'tsmovban.TIPMOV';

	
	const DESBAN = 'tsmovban.DESBAN';

	
	const MONMOV = 'tsmovban.MONMOV';

	
	const STATUS = 'tsmovban.STATUS';

	
	const STACON = 'tsmovban.STACON';

	
	const TRANSITO = 'tsmovban.TRANSITO';

	
	const STACON1 = 'tsmovban.STACON1';

	
	const ID = 'tsmovban.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue', 'Codcta', 'Refban', 'Fecban', 'Tipmov', 'Desban', 'Monmov', 'Status', 'Stacon', 'Transito', 'Stacon1', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TsmovbanPeer::NUMCUE, TsmovbanPeer::CODCTA, TsmovbanPeer::REFBAN, TsmovbanPeer::FECBAN, TsmovbanPeer::TIPMOV, TsmovbanPeer::DESBAN, TsmovbanPeer::MONMOV, TsmovbanPeer::STATUS, TsmovbanPeer::STACON, TsmovbanPeer::TRANSITO, TsmovbanPeer::STACON1, TsmovbanPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue', 'codcta', 'refban', 'fecban', 'tipmov', 'desban', 'monmov', 'status', 'stacon', 'transito', 'stacon1', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue' => 0, 'Codcta' => 1, 'Refban' => 2, 'Fecban' => 3, 'Tipmov' => 4, 'Desban' => 5, 'Monmov' => 6, 'Status' => 7, 'Stacon' => 8, 'Transito' => 9, 'Stacon1' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (TsmovbanPeer::NUMCUE => 0, TsmovbanPeer::CODCTA => 1, TsmovbanPeer::REFBAN => 2, TsmovbanPeer::FECBAN => 3, TsmovbanPeer::TIPMOV => 4, TsmovbanPeer::DESBAN => 5, TsmovbanPeer::MONMOV => 6, TsmovbanPeer::STATUS => 7, TsmovbanPeer::STACON => 8, TsmovbanPeer::TRANSITO => 9, TsmovbanPeer::STACON1 => 10, TsmovbanPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue' => 0, 'codcta' => 1, 'refban' => 2, 'fecban' => 3, 'tipmov' => 4, 'desban' => 5, 'monmov' => 6, 'status' => 7, 'stacon' => 8, 'transito' => 9, 'stacon1' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TsmovbanMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TsmovbanMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TsmovbanPeer::getTableMap();
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
		return str_replace(TsmovbanPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TsmovbanPeer::NUMCUE);

		$criteria->addSelectColumn(TsmovbanPeer::CODCTA);

		$criteria->addSelectColumn(TsmovbanPeer::REFBAN);

		$criteria->addSelectColumn(TsmovbanPeer::FECBAN);

		$criteria->addSelectColumn(TsmovbanPeer::TIPMOV);

		$criteria->addSelectColumn(TsmovbanPeer::DESBAN);

		$criteria->addSelectColumn(TsmovbanPeer::MONMOV);

		$criteria->addSelectColumn(TsmovbanPeer::STATUS);

		$criteria->addSelectColumn(TsmovbanPeer::STACON);

		$criteria->addSelectColumn(TsmovbanPeer::TRANSITO);

		$criteria->addSelectColumn(TsmovbanPeer::STACON1);

		$criteria->addSelectColumn(TsmovbanPeer::ID);

	}

	const COUNT = 'COUNT(tsmovban.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tsmovban.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsmovbanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsmovbanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TsmovbanPeer::doSelectRS($criteria, $con);
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
		$objects = TsmovbanPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TsmovbanPeer::populateObjects(TsmovbanPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TsmovbanPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TsmovbanPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinTsdefban(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsmovbanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsmovbanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TsmovbanPeer::NUMCUE, TsdefbanPeer::NUMCUE);

		$rs = TsmovbanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTstipmov(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsmovbanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsmovbanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TsmovbanPeer::TIPMOV, TstipmovPeer::CODTIP);

		$rs = TsmovbanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinTsdefban(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsmovbanPeer::addSelectColumns($c);
		$startcol = (TsmovbanPeer::NUM_COLUMNS - TsmovbanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TsdefbanPeer::addSelectColumns($c);

		$c->addJoin(TsmovbanPeer::NUMCUE, TsdefbanPeer::NUMCUE);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsmovbanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TsdefbanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTsdefban(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTsmovban($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTsmovbans();
				$obj2->addTsmovban($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTstipmov(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsmovbanPeer::addSelectColumns($c);
		$startcol = (TsmovbanPeer::NUM_COLUMNS - TsmovbanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TstipmovPeer::addSelectColumns($c);

		$c->addJoin(TsmovbanPeer::TIPMOV, TstipmovPeer::CODTIP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsmovbanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TstipmovPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTstipmov(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTsmovban($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTsmovbans();
				$obj2->addTsmovban($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsmovbanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsmovbanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(TsmovbanPeer::NUMCUE, TsdefbanPeer::NUMCUE);
	
			$criteria->addJoin(TsmovbanPeer::TIPMOV, TstipmovPeer::CODTIP);
	
		$rs = TsmovbanPeer::doSelectRS($criteria, $con);
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

		TsmovbanPeer::addSelectColumns($c);
		$startcol2 = (TsmovbanPeer::NUM_COLUMNS - TsmovbanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			TsdefbanPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + TsdefbanPeer::NUM_COLUMNS;
	
			TstipmovPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + TstipmovPeer::NUM_COLUMNS;
	
			$c->addJoin(TsmovbanPeer::NUMCUE, TsdefbanPeer::NUMCUE);
	
			$c->addJoin(TsmovbanPeer::TIPMOV, TstipmovPeer::CODTIP);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsmovbanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = TsdefbanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getTsdefban(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addTsmovban($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initTsmovbans();
					$obj2->addTsmovban($obj1);
				}
	

							
				$omClass = TstipmovPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getTstipmov(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addTsmovban($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initTsmovbans();
					$obj3->addTsmovban($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptTsdefban(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(TsmovbanPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(TsmovbanPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(TsmovbanPeer::TIPMOV, TstipmovPeer::CODTIP);
		
			$rs = TsmovbanPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptTstipmov(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(TsmovbanPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(TsmovbanPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(TsmovbanPeer::NUMCUE, TsdefbanPeer::NUMCUE);
		
			$rs = TsmovbanPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptTsdefban(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsmovbanPeer::addSelectColumns($c);
		$startcol2 = (TsmovbanPeer::NUM_COLUMNS - TsmovbanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			TstipmovPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + TstipmovPeer::NUM_COLUMNS;
	
			$c->addJoin(TsmovbanPeer::TIPMOV, TstipmovPeer::CODTIP);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsmovbanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = TstipmovPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getTstipmov(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addTsmovban($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initTsmovbans();
					$obj2->addTsmovban($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTstipmov(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsmovbanPeer::addSelectColumns($c);
		$startcol2 = (TsmovbanPeer::NUM_COLUMNS - TsmovbanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			TsdefbanPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + TsdefbanPeer::NUM_COLUMNS;
	
			$c->addJoin(TsmovbanPeer::NUMCUE, TsdefbanPeer::NUMCUE);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsmovbanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = TsdefbanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getTsdefban(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addTsmovban($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initTsmovbans();
					$obj2->addTsmovban($obj1);
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
		return TsmovbanPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TsmovbanPeer::ID); 

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
			$comparison = $criteria->getComparison(TsmovbanPeer::ID);
			$selectCriteria->add(TsmovbanPeer::ID, $criteria->remove(TsmovbanPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TsmovbanPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TsmovbanPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tsmovban) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TsmovbanPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tsmovban $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TsmovbanPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TsmovbanPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TsmovbanPeer::DATABASE_NAME, TsmovbanPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TsmovbanPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TsmovbanPeer::DATABASE_NAME);

		$criteria->add(TsmovbanPeer::ID, $pk);


		$v = TsmovbanPeer::doSelect($criteria, $con);

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
			$criteria->add(TsmovbanPeer::ID, $pks, Criteria::IN);
			$objs = TsmovbanPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTsmovbanPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TsmovbanMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TsmovbanMapBuilder');
}
