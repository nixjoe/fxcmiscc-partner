<?php


abstract class BaseMlmPlacementPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_placement';

	
	const CLASS_DEFAULT = 'lib.model.MlmPlacement';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const PLACEMENT_ID = 'mlm_placement.PLACEMENT_ID';

	
	const DIST_ID = 'mlm_placement.DIST_ID';

	
	const DIST_CODE = 'mlm_placement.DIST_CODE';

	
	const UPLINE_DIST_ID = 'mlm_placement.UPLINE_DIST_ID';

	
	const UPLINE_DIST_CODE = 'mlm_placement.UPLINE_DIST_CODE';

	
	const PLACE_POSITION = 'mlm_placement.PLACE_POSITION';

	
	const CREATED_BY = 'mlm_placement.CREATED_BY';

	
	const CREATED_ON = 'mlm_placement.CREATED_ON';

	
	const UPDATED_BY = 'mlm_placement.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_placement.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('PlacementId', 'DistId', 'DistCode', 'UplineDistId', 'UplineDistCode', 'PlacePosition', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmPlacementPeer::PLACEMENT_ID, MlmPlacementPeer::DIST_ID, MlmPlacementPeer::DIST_CODE, MlmPlacementPeer::UPLINE_DIST_ID, MlmPlacementPeer::UPLINE_DIST_CODE, MlmPlacementPeer::PLACE_POSITION, MlmPlacementPeer::CREATED_BY, MlmPlacementPeer::CREATED_ON, MlmPlacementPeer::UPDATED_BY, MlmPlacementPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('placement_id', 'dist_id', 'dist_code', 'upline_dist_id', 'upline_dist_code', 'place_position', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('PlacementId' => 0, 'DistId' => 1, 'DistCode' => 2, 'UplineDistId' => 3, 'UplineDistCode' => 4, 'PlacePosition' => 5, 'CreatedBy' => 6, 'CreatedOn' => 7, 'UpdatedBy' => 8, 'UpdatedOn' => 9, ),
		BasePeer::TYPE_COLNAME => array (MlmPlacementPeer::PLACEMENT_ID => 0, MlmPlacementPeer::DIST_ID => 1, MlmPlacementPeer::DIST_CODE => 2, MlmPlacementPeer::UPLINE_DIST_ID => 3, MlmPlacementPeer::UPLINE_DIST_CODE => 4, MlmPlacementPeer::PLACE_POSITION => 5, MlmPlacementPeer::CREATED_BY => 6, MlmPlacementPeer::CREATED_ON => 7, MlmPlacementPeer::UPDATED_BY => 8, MlmPlacementPeer::UPDATED_ON => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('placement_id' => 0, 'dist_id' => 1, 'dist_code' => 2, 'upline_dist_id' => 3, 'upline_dist_code' => 4, 'place_position' => 5, 'created_by' => 6, 'created_on' => 7, 'updated_by' => 8, 'updated_on' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmPlacementMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmPlacementMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmPlacementPeer::getTableMap();
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
		return str_replace(MlmPlacementPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmPlacementPeer::PLACEMENT_ID);

		$criteria->addSelectColumn(MlmPlacementPeer::DIST_ID);

		$criteria->addSelectColumn(MlmPlacementPeer::DIST_CODE);

		$criteria->addSelectColumn(MlmPlacementPeer::UPLINE_DIST_ID);

		$criteria->addSelectColumn(MlmPlacementPeer::UPLINE_DIST_CODE);

		$criteria->addSelectColumn(MlmPlacementPeer::PLACE_POSITION);

		$criteria->addSelectColumn(MlmPlacementPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmPlacementPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmPlacementPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmPlacementPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_placement.PLACEMENT_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_placement.PLACEMENT_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		
		$criteria = clone $criteria;

		
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmPlacementPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmPlacementPeer::COUNT);
		}

		
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmPlacementPeer::doSelectRS($criteria, $con);
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
		$objects = MlmPlacementPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmPlacementPeer::populateObjects(MlmPlacementPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmPlacementPeer::addSelectColumns($criteria);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		
		
		return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		
		$cls = MlmPlacementPeer::getOMClass();
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
		return MlmPlacementPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} else {
			$criteria = $values->buildCriteria(); 
		}

		$criteria->remove(MlmPlacementPeer::PLACEMENT_ID); 


		
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

			$comparison = $criteria->getComparison(MlmPlacementPeer::PLACEMENT_ID);
			$selectCriteria->add(MlmPlacementPeer::PLACEMENT_ID, $criteria->remove(MlmPlacementPeer::PLACEMENT_ID), $comparison);

		} else { 
			$criteria = $values->buildCriteria(); 
			$selectCriteria = $values->buildPkeyCriteria(); 
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 
		try {
			
			
			$con->begin();
			$affectedRows += BasePeer::doDeleteAll(MlmPlacementPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmPlacementPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} elseif ($values instanceof MlmPlacement) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmPlacementPeer::PLACEMENT_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmPlacement $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmPlacementPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmPlacementPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmPlacementPeer::DATABASE_NAME, MlmPlacementPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmPlacementPeer::DATABASE_NAME);

		$criteria->add(MlmPlacementPeer::PLACEMENT_ID, $pk);


		$v = MlmPlacementPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmPlacementPeer::PLACEMENT_ID, $pks, Criteria::IN);
			$objs = MlmPlacementPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 


if (Propel::isInit()) {
	
	
	try {
		BaseMlmPlacementPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	
	
	require_once 'lib/model/map/MlmPlacementMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmPlacementMapBuilder');
}
