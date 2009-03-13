<?php


abstract class BaseContabc1ConvPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'contabc1_conv';

	
	const CLASS_DEFAULT = 'lib.model.Contabc1Conv';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCOM = 'contabc1_conv.NUMCOM';

	
	const FECCOM = 'contabc1_conv.FECCOM';

	
	const DEBCRE = 'contabc1_conv.DEBCRE';

	
	const CODCTA = 'contabc1_conv.CODCTA';

	
	const NUMASI = 'contabc1_conv.NUMASI';

	
	const REFASI = 'contabc1_conv.REFASI';

	
	const DESASI = 'contabc1_conv.DESASI';

	
	const MONASI = 'contabc1_conv.MONASI';

	
	const ID = 'contabc1_conv.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcom', 'Feccom', 'Debcre', 'Codcta', 'Numasi', 'Refasi', 'Desasi', 'Monasi', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Contabc1ConvPeer::NUMCOM, Contabc1ConvPeer::FECCOM, Contabc1ConvPeer::DEBCRE, Contabc1ConvPeer::CODCTA, Contabc1ConvPeer::NUMASI, Contabc1ConvPeer::REFASI, Contabc1ConvPeer::DESASI, Contabc1ConvPeer::MONASI, Contabc1ConvPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcom', 'feccom', 'debcre', 'codcta', 'numasi', 'refasi', 'desasi', 'monasi', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcom' => 0, 'Feccom' => 1, 'Debcre' => 2, 'Codcta' => 3, 'Numasi' => 4, 'Refasi' => 5, 'Desasi' => 6, 'Monasi' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (Contabc1ConvPeer::NUMCOM => 0, Contabc1ConvPeer::FECCOM => 1, Contabc1ConvPeer::DEBCRE => 2, Contabc1ConvPeer::CODCTA => 3, Contabc1ConvPeer::NUMASI => 4, Contabc1ConvPeer::REFASI => 5, Contabc1ConvPeer::DESASI => 6, Contabc1ConvPeer::MONASI => 7, Contabc1ConvPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('numcom' => 0, 'feccom' => 1, 'debcre' => 2, 'codcta' => 3, 'numasi' => 4, 'refasi' => 5, 'desasi' => 6, 'monasi' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Contabc1ConvMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Contabc1ConvMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Contabc1ConvPeer::getTableMap();
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
		return str_replace(Contabc1ConvPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Contabc1ConvPeer::NUMCOM);

		$criteria->addSelectColumn(Contabc1ConvPeer::FECCOM);

		$criteria->addSelectColumn(Contabc1ConvPeer::DEBCRE);

		$criteria->addSelectColumn(Contabc1ConvPeer::CODCTA);

		$criteria->addSelectColumn(Contabc1ConvPeer::NUMASI);

		$criteria->addSelectColumn(Contabc1ConvPeer::REFASI);

		$criteria->addSelectColumn(Contabc1ConvPeer::DESASI);

		$criteria->addSelectColumn(Contabc1ConvPeer::MONASI);

		$criteria->addSelectColumn(Contabc1ConvPeer::ID);

	}

	const COUNT = 'COUNT(contabc1_conv.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT contabc1_conv.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Contabc1ConvPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Contabc1ConvPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Contabc1ConvPeer::doSelectRS($criteria, $con);
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
		$objects = Contabc1ConvPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Contabc1ConvPeer::populateObjects(Contabc1ConvPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Contabc1ConvPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Contabc1ConvPeer::getOMClass();
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
		return Contabc1ConvPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(Contabc1ConvPeer::ID);
			$selectCriteria->add(Contabc1ConvPeer::ID, $criteria->remove(Contabc1ConvPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Contabc1ConvPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Contabc1ConvPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Contabc1Conv) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Contabc1ConvPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Contabc1Conv $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Contabc1ConvPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Contabc1ConvPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Contabc1ConvPeer::DATABASE_NAME, Contabc1ConvPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Contabc1ConvPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Contabc1ConvPeer::DATABASE_NAME);

		$criteria->add(Contabc1ConvPeer::ID, $pk);


		$v = Contabc1ConvPeer::doSelect($criteria, $con);

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
			$criteria->add(Contabc1ConvPeer::ID, $pks, Criteria::IN);
			$objs = Contabc1ConvPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseContabc1ConvPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Contabc1ConvMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Contabc1ConvMapBuilder');
}
