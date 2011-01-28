<?php


abstract class BaseCpmovajuPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpmovaju';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpmovaju';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFAJU = 'cpmovaju.REFAJU';

	
	const CODPRE = 'cpmovaju.CODPRE';

	
	const MONAJU = 'cpmovaju.MONAJU';

	
	const STAMOV = 'cpmovaju.STAMOV';

	
	const REFPRC = 'cpmovaju.REFPRC';

	
	const REFCOM = 'cpmovaju.REFCOM';

	
	const REFCAU = 'cpmovaju.REFCAU';

	
	const REFPAG = 'cpmovaju.REFPAG';

	
	const ID = 'cpmovaju.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refaju', 'Codpre', 'Monaju', 'Stamov', 'Refprc', 'Refcom', 'Refcau', 'Refpag', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpmovajuPeer::REFAJU, CpmovajuPeer::CODPRE, CpmovajuPeer::MONAJU, CpmovajuPeer::STAMOV, CpmovajuPeer::REFPRC, CpmovajuPeer::REFCOM, CpmovajuPeer::REFCAU, CpmovajuPeer::REFPAG, CpmovajuPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refaju', 'codpre', 'monaju', 'stamov', 'refprc', 'refcom', 'refcau', 'refpag', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refaju' => 0, 'Codpre' => 1, 'Monaju' => 2, 'Stamov' => 3, 'Refprc' => 4, 'Refcom' => 5, 'Refcau' => 6, 'Refpag' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (CpmovajuPeer::REFAJU => 0, CpmovajuPeer::CODPRE => 1, CpmovajuPeer::MONAJU => 2, CpmovajuPeer::STAMOV => 3, CpmovajuPeer::REFPRC => 4, CpmovajuPeer::REFCOM => 5, CpmovajuPeer::REFCAU => 6, CpmovajuPeer::REFPAG => 7, CpmovajuPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refaju' => 0, 'codpre' => 1, 'monaju' => 2, 'stamov' => 3, 'refprc' => 4, 'refcom' => 5, 'refcau' => 6, 'refpag' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpmovajuMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpmovajuMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpmovajuPeer::getTableMap();
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
		return str_replace(CpmovajuPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpmovajuPeer::REFAJU);

		$criteria->addSelectColumn(CpmovajuPeer::CODPRE);

		$criteria->addSelectColumn(CpmovajuPeer::MONAJU);

		$criteria->addSelectColumn(CpmovajuPeer::STAMOV);

		$criteria->addSelectColumn(CpmovajuPeer::REFPRC);

		$criteria->addSelectColumn(CpmovajuPeer::REFCOM);

		$criteria->addSelectColumn(CpmovajuPeer::REFCAU);

		$criteria->addSelectColumn(CpmovajuPeer::REFPAG);

		$criteria->addSelectColumn(CpmovajuPeer::ID);

	}

	const COUNT = 'COUNT(cpmovaju.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpmovaju.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpmovajuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpmovajuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpmovajuPeer::doSelectRS($criteria, $con);
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
		$objects = CpmovajuPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpmovajuPeer::populateObjects(CpmovajuPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpmovajuPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpmovajuPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCpajuste(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpmovajuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpmovajuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpmovajuPeer::REFAJU, CpajustePeer::REFAJU);

		$rs = CpmovajuPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCpdeftit(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpmovajuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpmovajuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpmovajuPeer::CODPRE, CpdeftitPeer::CODPRE);

		$rs = CpmovajuPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCpajuste(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpmovajuPeer::addSelectColumns($c);
		$startcol = (CpmovajuPeer::NUM_COLUMNS - CpmovajuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpajustePeer::addSelectColumns($c);

		$c->addJoin(CpmovajuPeer::REFAJU, CpajustePeer::REFAJU);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovajuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpajustePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpajuste(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpmovaju($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpmovajus();
				$obj2->addCpmovaju($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCpdeftit(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpmovajuPeer::addSelectColumns($c);
		$startcol = (CpmovajuPeer::NUM_COLUMNS - CpmovajuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpdeftitPeer::addSelectColumns($c);

		$c->addJoin(CpmovajuPeer::CODPRE, CpdeftitPeer::CODPRE);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovajuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpdeftitPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpdeftit(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpmovaju($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpmovajus();
				$obj2->addCpmovaju($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpmovajuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpmovajuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CpmovajuPeer::REFAJU, CpajustePeer::REFAJU);
	
			$criteria->addJoin(CpmovajuPeer::CODPRE, CpdeftitPeer::CODPRE);
	
		$rs = CpmovajuPeer::doSelectRS($criteria, $con);
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

		CpmovajuPeer::addSelectColumns($c);
		$startcol2 = (CpmovajuPeer::NUM_COLUMNS - CpmovajuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpajustePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpajustePeer::NUM_COLUMNS;
	
			CpdeftitPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CpdeftitPeer::NUM_COLUMNS;
	
			$c->addJoin(CpmovajuPeer::REFAJU, CpajustePeer::REFAJU);
	
			$c->addJoin(CpmovajuPeer::CODPRE, CpdeftitPeer::CODPRE);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovajuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CpajustePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpajuste(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpmovaju($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCpmovajus();
					$obj2->addCpmovaju($obj1);
				}
	

							
				$omClass = CpdeftitPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCpdeftit(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCpmovaju($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCpmovajus();
					$obj3->addCpmovaju($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCpajuste(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpmovajuPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpmovajuPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpmovajuPeer::CODPRE, CpdeftitPeer::CODPRE);
		
			$rs = CpmovajuPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCpdeftit(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpmovajuPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpmovajuPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpmovajuPeer::REFAJU, CpajustePeer::REFAJU);
		
			$rs = CpmovajuPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCpajuste(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpmovajuPeer::addSelectColumns($c);
		$startcol2 = (CpmovajuPeer::NUM_COLUMNS - CpmovajuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpdeftitPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpdeftitPeer::NUM_COLUMNS;
	
			$c->addJoin(CpmovajuPeer::CODPRE, CpdeftitPeer::CODPRE);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovajuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpdeftitPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpdeftit(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpmovaju($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpmovajus();
					$obj2->addCpmovaju($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCpdeftit(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpmovajuPeer::addSelectColumns($c);
		$startcol2 = (CpmovajuPeer::NUM_COLUMNS - CpmovajuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpajustePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpajustePeer::NUM_COLUMNS;
	
			$c->addJoin(CpmovajuPeer::REFAJU, CpajustePeer::REFAJU);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovajuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpajustePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpajuste(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpmovaju($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpmovajus();
					$obj2->addCpmovaju($obj1);
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
		return CpmovajuPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpmovajuPeer::ID); 

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
			$comparison = $criteria->getComparison(CpmovajuPeer::ID);
			$selectCriteria->add(CpmovajuPeer::ID, $criteria->remove(CpmovajuPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpmovajuPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpmovajuPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpmovaju) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpmovajuPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpmovaju $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpmovajuPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpmovajuPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpmovajuPeer::DATABASE_NAME, CpmovajuPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpmovajuPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpmovajuPeer::DATABASE_NAME);

		$criteria->add(CpmovajuPeer::ID, $pk);


		$v = CpmovajuPeer::doSelect($criteria, $con);

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
			$criteria->add(CpmovajuPeer::ID, $pks, Criteria::IN);
			$objs = CpmovajuPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpmovajuPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpmovajuMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpmovajuMapBuilder');
}
