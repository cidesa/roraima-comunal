<?php


abstract class BaseNpseghcmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npseghcm';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npseghcm';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'npseghcm.CODNOM';

	
	const CODCON = 'npseghcm.CODCON';

	
	const CODCONAPO = 'npseghcm.CODCONAPO';

	
	const TIPPAR = 'npseghcm.TIPPAR';

	
	const EDADDES = 'npseghcm.EDADDES';

	
	const EDADHAS = 'npseghcm.EDADHAS';

	
	const MONTO = 'npseghcm.MONTO';

	
	const CUOTA = 'npseghcm.CUOTA';

	
	const MONTOTOTAL = 'npseghcm.MONTOTOTAL';

	
	const ID = 'npseghcm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Codcon', 'Codconapo', 'Tippar', 'Edaddes', 'Edadhas', 'Monto', 'Cuota', 'Montototal', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpseghcmPeer::CODNOM, NpseghcmPeer::CODCON, NpseghcmPeer::CODCONAPO, NpseghcmPeer::TIPPAR, NpseghcmPeer::EDADDES, NpseghcmPeer::EDADHAS, NpseghcmPeer::MONTO, NpseghcmPeer::CUOTA, NpseghcmPeer::MONTOTOTAL, NpseghcmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'codcon', 'codconapo', 'tippar', 'edaddes', 'edadhas', 'monto', 'cuota', 'montototal', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Codcon' => 1, 'Codconapo' => 2, 'Tippar' => 3, 'Edaddes' => 4, 'Edadhas' => 5, 'Monto' => 6, 'Cuota' => 7, 'Montototal' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (NpseghcmPeer::CODNOM => 0, NpseghcmPeer::CODCON => 1, NpseghcmPeer::CODCONAPO => 2, NpseghcmPeer::TIPPAR => 3, NpseghcmPeer::EDADDES => 4, NpseghcmPeer::EDADHAS => 5, NpseghcmPeer::MONTO => 6, NpseghcmPeer::CUOTA => 7, NpseghcmPeer::MONTOTOTAL => 8, NpseghcmPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'codcon' => 1, 'codconapo' => 2, 'tippar' => 3, 'edaddes' => 4, 'edadhas' => 5, 'monto' => 6, 'cuota' => 7, 'montototal' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpseghcmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpseghcmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpseghcmPeer::getTableMap();
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
		return str_replace(NpseghcmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpseghcmPeer::CODNOM);

		$criteria->addSelectColumn(NpseghcmPeer::CODCON);

		$criteria->addSelectColumn(NpseghcmPeer::CODCONAPO);

		$criteria->addSelectColumn(NpseghcmPeer::TIPPAR);

		$criteria->addSelectColumn(NpseghcmPeer::EDADDES);

		$criteria->addSelectColumn(NpseghcmPeer::EDADHAS);

		$criteria->addSelectColumn(NpseghcmPeer::MONTO);

		$criteria->addSelectColumn(NpseghcmPeer::CUOTA);

		$criteria->addSelectColumn(NpseghcmPeer::MONTOTOTAL);

		$criteria->addSelectColumn(NpseghcmPeer::ID);

	}

	const COUNT = 'COUNT(npseghcm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npseghcm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpseghcmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpseghcmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpseghcmPeer::doSelectRS($criteria, $con);
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
		$objects = NpseghcmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpseghcmPeer::populateObjects(NpseghcmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpseghcmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpseghcmPeer::getOMClass();
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
		return NpseghcmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpseghcmPeer::ID); 

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
			$comparison = $criteria->getComparison(NpseghcmPeer::ID);
			$selectCriteria->add(NpseghcmPeer::ID, $criteria->remove(NpseghcmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpseghcmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpseghcmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npseghcm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpseghcmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npseghcm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpseghcmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpseghcmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpseghcmPeer::DATABASE_NAME, NpseghcmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpseghcmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpseghcmPeer::DATABASE_NAME);

		$criteria->add(NpseghcmPeer::ID, $pk);


		$v = NpseghcmPeer::doSelect($criteria, $con);

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
			$criteria->add(NpseghcmPeer::ID, $pks, Criteria::IN);
			$objs = NpseghcmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpseghcmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpseghcmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpseghcmMapBuilder');
}
