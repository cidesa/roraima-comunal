<?php


abstract class BaseCaentalmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caentalm';

	
	const CLASS_DEFAULT = 'lib.model.Caentalm';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const RCPART = 'caentalm.RCPART';

	
	const FECRCP = 'caentalm.FECRCP';

	
	const DESRCP = 'caentalm.DESRCP';

	
	const CODPRO = 'caentalm.CODPRO';

	
	const MONRCP = 'caentalm.MONRCP';

	
	const STARCP = 'caentalm.STARCP';

	
	const CODALM = 'caentalm.CODALM';

	
	const CODUBI = 'caentalm.CODUBI';

	
	const TIPMOV = 'caentalm.TIPMOV';

	
	const CODCEN = 'caentalm.CODCEN';

	
	const DPHART = 'caentalm.DPHART';

	
	const ID = 'caentalm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Rcpart', 'Fecrcp', 'Desrcp', 'Codpro', 'Monrcp', 'Starcp', 'Codalm', 'Codubi', 'Tipmov', 'Codcen', 'Dphart', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaentalmPeer::RCPART, CaentalmPeer::FECRCP, CaentalmPeer::DESRCP, CaentalmPeer::CODPRO, CaentalmPeer::MONRCP, CaentalmPeer::STARCP, CaentalmPeer::CODALM, CaentalmPeer::CODUBI, CaentalmPeer::TIPMOV, CaentalmPeer::CODCEN, CaentalmPeer::DPHART, CaentalmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('rcpart', 'fecrcp', 'desrcp', 'codpro', 'monrcp', 'starcp', 'codalm', 'codubi', 'tipmov', 'codcen', 'dphart', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Rcpart' => 0, 'Fecrcp' => 1, 'Desrcp' => 2, 'Codpro' => 3, 'Monrcp' => 4, 'Starcp' => 5, 'Codalm' => 6, 'Codubi' => 7, 'Tipmov' => 8, 'Codcen' => 9, 'Dphart' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (CaentalmPeer::RCPART => 0, CaentalmPeer::FECRCP => 1, CaentalmPeer::DESRCP => 2, CaentalmPeer::CODPRO => 3, CaentalmPeer::MONRCP => 4, CaentalmPeer::STARCP => 5, CaentalmPeer::CODALM => 6, CaentalmPeer::CODUBI => 7, CaentalmPeer::TIPMOV => 8, CaentalmPeer::CODCEN => 9, CaentalmPeer::DPHART => 10, CaentalmPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('rcpart' => 0, 'fecrcp' => 1, 'desrcp' => 2, 'codpro' => 3, 'monrcp' => 4, 'starcp' => 5, 'codalm' => 6, 'codubi' => 7, 'tipmov' => 8, 'codcen' => 9, 'dphart' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaentalmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaentalmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaentalmPeer::getTableMap();
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
		return str_replace(CaentalmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaentalmPeer::RCPART);

		$criteria->addSelectColumn(CaentalmPeer::FECRCP);

		$criteria->addSelectColumn(CaentalmPeer::DESRCP);

		$criteria->addSelectColumn(CaentalmPeer::CODPRO);

		$criteria->addSelectColumn(CaentalmPeer::MONRCP);

		$criteria->addSelectColumn(CaentalmPeer::STARCP);

		$criteria->addSelectColumn(CaentalmPeer::CODALM);

		$criteria->addSelectColumn(CaentalmPeer::CODUBI);

		$criteria->addSelectColumn(CaentalmPeer::TIPMOV);

		$criteria->addSelectColumn(CaentalmPeer::CODCEN);

		$criteria->addSelectColumn(CaentalmPeer::DPHART);

		$criteria->addSelectColumn(CaentalmPeer::ID);

	}

	const COUNT = 'COUNT(caentalm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caentalm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaentalmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaentalmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaentalmPeer::doSelectRS($criteria, $con);
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
		$objects = CaentalmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaentalmPeer::populateObjects(CaentalmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaentalmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaentalmPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCatipent(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaentalmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaentalmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CaentalmPeer::TIPMOV, CatipentPeer::CODTIPENT);

		$rs = CaentalmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCatipent(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CaentalmPeer::addSelectColumns($c);
		$startcol = (CaentalmPeer::NUM_COLUMNS - CaentalmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatipentPeer::addSelectColumns($c);

		$c->addJoin(CaentalmPeer::TIPMOV, CatipentPeer::CODTIPENT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CaentalmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatipentPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatipent(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCaentalm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCaentalms();
				$obj2->addCaentalm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaentalmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaentalmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CaentalmPeer::TIPMOV, CatipentPeer::CODTIPENT);
	
		$rs = CaentalmPeer::doSelectRS($criteria, $con);
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

		CaentalmPeer::addSelectColumns($c);
		$startcol2 = (CaentalmPeer::NUM_COLUMNS - CaentalmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CatipentPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CatipentPeer::NUM_COLUMNS;
	
			$c->addJoin(CaentalmPeer::TIPMOV, CatipentPeer::CODTIPENT);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CaentalmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CatipentPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCatipent(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCaentalm($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCaentalms();
					$obj2->addCaentalm($obj1);
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
		return CaentalmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CaentalmPeer::ID); 

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
			$comparison = $criteria->getComparison(CaentalmPeer::ID);
			$selectCriteria->add(CaentalmPeer::ID, $criteria->remove(CaentalmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaentalmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaentalmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caentalm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaentalmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caentalm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaentalmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaentalmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaentalmPeer::DATABASE_NAME, CaentalmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaentalmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaentalmPeer::DATABASE_NAME);

		$criteria->add(CaentalmPeer::ID, $pk);


		$v = CaentalmPeer::doSelect($criteria, $con);

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
			$criteria->add(CaentalmPeer::ID, $pks, Criteria::IN);
			$objs = CaentalmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaentalmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaentalmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaentalmMapBuilder');
}
