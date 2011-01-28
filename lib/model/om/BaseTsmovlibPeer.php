<?php


abstract class BaseTsmovlibPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tsmovlib';

	
	const CLASS_DEFAULT = 'lib.model.Tsmovlib';

	
	const NUM_COLUMNS = 27;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCUE = 'tsmovlib.NUMCUE';

	
	const REFLIB = 'tsmovlib.REFLIB';

	
	const FECLIB = 'tsmovlib.FECLIB';

	
	const TIPMOV = 'tsmovlib.TIPMOV';

	
	const DESLIB = 'tsmovlib.DESLIB';

	
	const MONMOV = 'tsmovlib.MONMOV';

	
	const CODCTA = 'tsmovlib.CODCTA';

	
	const NUMCOM = 'tsmovlib.NUMCOM';

	
	const FECCOM = 'tsmovlib.FECCOM';

	
	const STATUS = 'tsmovlib.STATUS';

	
	const STACON = 'tsmovlib.STACON';

	
	const FECING = 'tsmovlib.FECING';

	
	const FECANU = 'tsmovlib.FECANU';

	
	const TIPMOVPAD = 'tsmovlib.TIPMOVPAD';

	
	const REFLIBPAD = 'tsmovlib.REFLIBPAD';

	
	const TRANSITO = 'tsmovlib.TRANSITO';

	
	const NUMCOMADI = 'tsmovlib.NUMCOMADI';

	
	const FECCOMADI = 'tsmovlib.FECCOMADI';

	
	const NOMBENSUS = 'tsmovlib.NOMBENSUS';

	
	const ORDEN = 'tsmovlib.ORDEN';

	
	const HORING = 'tsmovlib.HORING';

	
	const STACON1 = 'tsmovlib.STACON1';

	
	const MOTANU = 'tsmovlib.MOTANU';

	
	const REFPAG = 'tsmovlib.REFPAG';

	
	const LOGUSE = 'tsmovlib.LOGUSE';

	
	const CEDRIF = 'tsmovlib.CEDRIF';

	
	const ID = 'tsmovlib.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue', 'Reflib', 'Feclib', 'Tipmov', 'Deslib', 'Monmov', 'Codcta', 'Numcom', 'Feccom', 'Status', 'Stacon', 'Fecing', 'Fecanu', 'Tipmovpad', 'Reflibpad', 'Transito', 'Numcomadi', 'Feccomadi', 'Nombensus', 'Orden', 'Horing', 'Stacon1', 'Motanu', 'Refpag', 'Loguse', 'Cedrif', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TsmovlibPeer::NUMCUE, TsmovlibPeer::REFLIB, TsmovlibPeer::FECLIB, TsmovlibPeer::TIPMOV, TsmovlibPeer::DESLIB, TsmovlibPeer::MONMOV, TsmovlibPeer::CODCTA, TsmovlibPeer::NUMCOM, TsmovlibPeer::FECCOM, TsmovlibPeer::STATUS, TsmovlibPeer::STACON, TsmovlibPeer::FECING, TsmovlibPeer::FECANU, TsmovlibPeer::TIPMOVPAD, TsmovlibPeer::REFLIBPAD, TsmovlibPeer::TRANSITO, TsmovlibPeer::NUMCOMADI, TsmovlibPeer::FECCOMADI, TsmovlibPeer::NOMBENSUS, TsmovlibPeer::ORDEN, TsmovlibPeer::HORING, TsmovlibPeer::STACON1, TsmovlibPeer::MOTANU, TsmovlibPeer::REFPAG, TsmovlibPeer::LOGUSE, TsmovlibPeer::CEDRIF, TsmovlibPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue', 'reflib', 'feclib', 'tipmov', 'deslib', 'monmov', 'codcta', 'numcom', 'feccom', 'status', 'stacon', 'fecing', 'fecanu', 'tipmovpad', 'reflibpad', 'transito', 'numcomadi', 'feccomadi', 'nombensus', 'orden', 'horing', 'stacon1', 'motanu', 'refpag', 'loguse', 'cedrif', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue' => 0, 'Reflib' => 1, 'Feclib' => 2, 'Tipmov' => 3, 'Deslib' => 4, 'Monmov' => 5, 'Codcta' => 6, 'Numcom' => 7, 'Feccom' => 8, 'Status' => 9, 'Stacon' => 10, 'Fecing' => 11, 'Fecanu' => 12, 'Tipmovpad' => 13, 'Reflibpad' => 14, 'Transito' => 15, 'Numcomadi' => 16, 'Feccomadi' => 17, 'Nombensus' => 18, 'Orden' => 19, 'Horing' => 20, 'Stacon1' => 21, 'Motanu' => 22, 'Refpag' => 23, 'Loguse' => 24, 'Cedrif' => 25, 'Id' => 26, ),
		BasePeer::TYPE_COLNAME => array (TsmovlibPeer::NUMCUE => 0, TsmovlibPeer::REFLIB => 1, TsmovlibPeer::FECLIB => 2, TsmovlibPeer::TIPMOV => 3, TsmovlibPeer::DESLIB => 4, TsmovlibPeer::MONMOV => 5, TsmovlibPeer::CODCTA => 6, TsmovlibPeer::NUMCOM => 7, TsmovlibPeer::FECCOM => 8, TsmovlibPeer::STATUS => 9, TsmovlibPeer::STACON => 10, TsmovlibPeer::FECING => 11, TsmovlibPeer::FECANU => 12, TsmovlibPeer::TIPMOVPAD => 13, TsmovlibPeer::REFLIBPAD => 14, TsmovlibPeer::TRANSITO => 15, TsmovlibPeer::NUMCOMADI => 16, TsmovlibPeer::FECCOMADI => 17, TsmovlibPeer::NOMBENSUS => 18, TsmovlibPeer::ORDEN => 19, TsmovlibPeer::HORING => 20, TsmovlibPeer::STACON1 => 21, TsmovlibPeer::MOTANU => 22, TsmovlibPeer::REFPAG => 23, TsmovlibPeer::LOGUSE => 24, TsmovlibPeer::CEDRIF => 25, TsmovlibPeer::ID => 26, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue' => 0, 'reflib' => 1, 'feclib' => 2, 'tipmov' => 3, 'deslib' => 4, 'monmov' => 5, 'codcta' => 6, 'numcom' => 7, 'feccom' => 8, 'status' => 9, 'stacon' => 10, 'fecing' => 11, 'fecanu' => 12, 'tipmovpad' => 13, 'reflibpad' => 14, 'transito' => 15, 'numcomadi' => 16, 'feccomadi' => 17, 'nombensus' => 18, 'orden' => 19, 'horing' => 20, 'stacon1' => 21, 'motanu' => 22, 'refpag' => 23, 'loguse' => 24, 'cedrif' => 25, 'id' => 26, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TsmovlibMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TsmovlibMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TsmovlibPeer::getTableMap();
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
		return str_replace(TsmovlibPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TsmovlibPeer::NUMCUE);

		$criteria->addSelectColumn(TsmovlibPeer::REFLIB);

		$criteria->addSelectColumn(TsmovlibPeer::FECLIB);

		$criteria->addSelectColumn(TsmovlibPeer::TIPMOV);

		$criteria->addSelectColumn(TsmovlibPeer::DESLIB);

		$criteria->addSelectColumn(TsmovlibPeer::MONMOV);

		$criteria->addSelectColumn(TsmovlibPeer::CODCTA);

		$criteria->addSelectColumn(TsmovlibPeer::NUMCOM);

		$criteria->addSelectColumn(TsmovlibPeer::FECCOM);

		$criteria->addSelectColumn(TsmovlibPeer::STATUS);

		$criteria->addSelectColumn(TsmovlibPeer::STACON);

		$criteria->addSelectColumn(TsmovlibPeer::FECING);

		$criteria->addSelectColumn(TsmovlibPeer::FECANU);

		$criteria->addSelectColumn(TsmovlibPeer::TIPMOVPAD);

		$criteria->addSelectColumn(TsmovlibPeer::REFLIBPAD);

		$criteria->addSelectColumn(TsmovlibPeer::TRANSITO);

		$criteria->addSelectColumn(TsmovlibPeer::NUMCOMADI);

		$criteria->addSelectColumn(TsmovlibPeer::FECCOMADI);

		$criteria->addSelectColumn(TsmovlibPeer::NOMBENSUS);

		$criteria->addSelectColumn(TsmovlibPeer::ORDEN);

		$criteria->addSelectColumn(TsmovlibPeer::HORING);

		$criteria->addSelectColumn(TsmovlibPeer::STACON1);

		$criteria->addSelectColumn(TsmovlibPeer::MOTANU);

		$criteria->addSelectColumn(TsmovlibPeer::REFPAG);

		$criteria->addSelectColumn(TsmovlibPeer::LOGUSE);

		$criteria->addSelectColumn(TsmovlibPeer::CEDRIF);

		$criteria->addSelectColumn(TsmovlibPeer::ID);

	}

	const COUNT = 'COUNT(tsmovlib.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tsmovlib.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsmovlibPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsmovlibPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TsmovlibPeer::doSelectRS($criteria, $con);
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
		$objects = TsmovlibPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TsmovlibPeer::populateObjects(TsmovlibPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TsmovlibPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TsmovlibPeer::getOMClass();
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
			$criteria->addSelectColumn(TsmovlibPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsmovlibPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TsmovlibPeer::NUMCUE, TsdefbanPeer::NUMCUE);

		$rs = TsmovlibPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(TsmovlibPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsmovlibPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TsmovlibPeer::TIPMOV, TstipmovPeer::CODTIP);

		$rs = TsmovlibPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinContabb(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsmovlibPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsmovlibPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TsmovlibPeer::CODCTA, ContabbPeer::CODCTA);

		$rs = TsmovlibPeer::doSelectRS($criteria, $con);
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

		TsmovlibPeer::addSelectColumns($c);
		$startcol = (TsmovlibPeer::NUM_COLUMNS - TsmovlibPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TsdefbanPeer::addSelectColumns($c);

		$c->addJoin(TsmovlibPeer::NUMCUE, TsdefbanPeer::NUMCUE);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsmovlibPeer::getOMClass();

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
										$temp_obj2->addTsmovlib($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTsmovlibs();
				$obj2->addTsmovlib($obj1); 			}
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

		TsmovlibPeer::addSelectColumns($c);
		$startcol = (TsmovlibPeer::NUM_COLUMNS - TsmovlibPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TstipmovPeer::addSelectColumns($c);

		$c->addJoin(TsmovlibPeer::TIPMOV, TstipmovPeer::CODTIP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsmovlibPeer::getOMClass();

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
										$temp_obj2->addTsmovlib($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTsmovlibs();
				$obj2->addTsmovlib($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinContabb(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsmovlibPeer::addSelectColumns($c);
		$startcol = (TsmovlibPeer::NUM_COLUMNS - TsmovlibPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ContabbPeer::addSelectColumns($c);

		$c->addJoin(TsmovlibPeer::CODCTA, ContabbPeer::CODCTA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsmovlibPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ContabbPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getContabb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTsmovlib($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTsmovlibs();
				$obj2->addTsmovlib($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsmovlibPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsmovlibPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(TsmovlibPeer::NUMCUE, TsdefbanPeer::NUMCUE);
	
			$criteria->addJoin(TsmovlibPeer::TIPMOV, TstipmovPeer::CODTIP);
	
			$criteria->addJoin(TsmovlibPeer::CODCTA, ContabbPeer::CODCTA);
	
		$rs = TsmovlibPeer::doSelectRS($criteria, $con);
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

		TsmovlibPeer::addSelectColumns($c);
		$startcol2 = (TsmovlibPeer::NUM_COLUMNS - TsmovlibPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			TsdefbanPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + TsdefbanPeer::NUM_COLUMNS;
	
			TstipmovPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + TstipmovPeer::NUM_COLUMNS;
	
			ContabbPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + ContabbPeer::NUM_COLUMNS;
	
			$c->addJoin(TsmovlibPeer::NUMCUE, TsdefbanPeer::NUMCUE);
	
			$c->addJoin(TsmovlibPeer::TIPMOV, TstipmovPeer::CODTIP);
	
			$c->addJoin(TsmovlibPeer::CODCTA, ContabbPeer::CODCTA);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsmovlibPeer::getOMClass();


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
						$temp_obj2->addTsmovlib($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initTsmovlibs();
					$obj2->addTsmovlib($obj1);
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
						$temp_obj3->addTsmovlib($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initTsmovlibs();
					$obj3->addTsmovlib($obj1);
				}
	

							
				$omClass = ContabbPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getContabb(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addTsmovlib($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initTsmovlibs();
					$obj4->addTsmovlib($obj1);
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
				$criteria->addSelectColumn(TsmovlibPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(TsmovlibPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(TsmovlibPeer::TIPMOV, TstipmovPeer::CODTIP);
		
				$criteria->addJoin(TsmovlibPeer::CODCTA, ContabbPeer::CODCTA);
		
			$rs = TsmovlibPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(TsmovlibPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(TsmovlibPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(TsmovlibPeer::NUMCUE, TsdefbanPeer::NUMCUE);
		
				$criteria->addJoin(TsmovlibPeer::CODCTA, ContabbPeer::CODCTA);
		
			$rs = TsmovlibPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptContabb(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(TsmovlibPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(TsmovlibPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(TsmovlibPeer::NUMCUE, TsdefbanPeer::NUMCUE);
		
				$criteria->addJoin(TsmovlibPeer::TIPMOV, TstipmovPeer::CODTIP);
		
			$rs = TsmovlibPeer::doSelectRS($criteria, $con);
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

		TsmovlibPeer::addSelectColumns($c);
		$startcol2 = (TsmovlibPeer::NUM_COLUMNS - TsmovlibPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			TstipmovPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + TstipmovPeer::NUM_COLUMNS;
	
			ContabbPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + ContabbPeer::NUM_COLUMNS;
	
			$c->addJoin(TsmovlibPeer::TIPMOV, TstipmovPeer::CODTIP);
	
			$c->addJoin(TsmovlibPeer::CODCTA, ContabbPeer::CODCTA);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsmovlibPeer::getOMClass();

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
						$temp_obj2->addTsmovlib($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initTsmovlibs();
					$obj2->addTsmovlib($obj1);
				}
	
				$omClass = ContabbPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getContabb(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addTsmovlib($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initTsmovlibs();
					$obj3->addTsmovlib($obj1);
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

		TsmovlibPeer::addSelectColumns($c);
		$startcol2 = (TsmovlibPeer::NUM_COLUMNS - TsmovlibPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			TsdefbanPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + TsdefbanPeer::NUM_COLUMNS;
	
			ContabbPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + ContabbPeer::NUM_COLUMNS;
	
			$c->addJoin(TsmovlibPeer::NUMCUE, TsdefbanPeer::NUMCUE);
	
			$c->addJoin(TsmovlibPeer::CODCTA, ContabbPeer::CODCTA);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsmovlibPeer::getOMClass();

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
						$temp_obj2->addTsmovlib($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initTsmovlibs();
					$obj2->addTsmovlib($obj1);
				}
	
				$omClass = ContabbPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getContabb(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addTsmovlib($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initTsmovlibs();
					$obj3->addTsmovlib($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptContabb(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TsmovlibPeer::addSelectColumns($c);
		$startcol2 = (TsmovlibPeer::NUM_COLUMNS - TsmovlibPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			TsdefbanPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + TsdefbanPeer::NUM_COLUMNS;
	
			TstipmovPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + TstipmovPeer::NUM_COLUMNS;
	
			$c->addJoin(TsmovlibPeer::NUMCUE, TsdefbanPeer::NUMCUE);
	
			$c->addJoin(TsmovlibPeer::TIPMOV, TstipmovPeer::CODTIP);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TsmovlibPeer::getOMClass();

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
						$temp_obj2->addTsmovlib($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initTsmovlibs();
					$obj2->addTsmovlib($obj1);
				}
	
				$omClass = TstipmovPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getTstipmov(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addTsmovlib($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initTsmovlibs();
					$obj3->addTsmovlib($obj1);
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
		return TsmovlibPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TsmovlibPeer::ID); 

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
			$comparison = $criteria->getComparison(TsmovlibPeer::ID);
			$selectCriteria->add(TsmovlibPeer::ID, $criteria->remove(TsmovlibPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TsmovlibPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TsmovlibPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tsmovlib) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TsmovlibPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tsmovlib $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TsmovlibPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TsmovlibPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TsmovlibPeer::DATABASE_NAME, TsmovlibPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TsmovlibPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TsmovlibPeer::DATABASE_NAME);

		$criteria->add(TsmovlibPeer::ID, $pk);


		$v = TsmovlibPeer::doSelect($criteria, $con);

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
			$criteria->add(TsmovlibPeer::ID, $pks, Criteria::IN);
			$objs = TsmovlibPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTsmovlibPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TsmovlibMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TsmovlibMapBuilder');
}
