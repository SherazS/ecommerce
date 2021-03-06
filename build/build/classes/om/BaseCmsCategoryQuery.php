<?php


/**
 * Base class that represents a query for the 'cms_category' table.
 *
 *
 *
 * @method CmsCategoryQuery orderByCatId($order = Criteria::ASC) Order by the cat_id column
 * @method CmsCategoryQuery orderByCatName($order = Criteria::ASC) Order by the cat_name column
 *
 * @method CmsCategoryQuery groupByCatId() Group by the cat_id column
 * @method CmsCategoryQuery groupByCatName() Group by the cat_name column
 *
 * @method CmsCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CmsCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CmsCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CmsCategoryQuery leftJoinCmsArticle($relationAlias = null) Adds a LEFT JOIN clause to the query using the CmsArticle relation
 * @method CmsCategoryQuery rightJoinCmsArticle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CmsArticle relation
 * @method CmsCategoryQuery innerJoinCmsArticle($relationAlias = null) Adds a INNER JOIN clause to the query using the CmsArticle relation
 *
 * @method CmsCategory findOne(PropelPDO $con = null) Return the first CmsCategory matching the query
 * @method CmsCategory findOneOrCreate(PropelPDO $con = null) Return the first CmsCategory matching the query, or a new CmsCategory object populated from the query conditions when no match is found
 *
 * @method CmsCategory findOneByCatName(string $cat_name) Return the first CmsCategory filtered by the cat_name column
 *
 * @method array findByCatId(int $cat_id) Return CmsCategory objects filtered by the cat_id column
 * @method array findByCatName(string $cat_name) Return CmsCategory objects filtered by the cat_name column
 *
 * @package    propel.generator..om
 */
abstract class BaseCmsCategoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCmsCategoryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'mycms';
        }
        if (null === $modelName) {
            $modelName = 'CmsCategory';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CmsCategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CmsCategoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CmsCategoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CmsCategoryQuery) {
            return $criteria;
        }
        $query = new CmsCategoryQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   CmsCategory|CmsCategory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CmsCategoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CmsCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 CmsCategory A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByCatId($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 CmsCategory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `cat_id`, `cat_name` FROM `cms_category` WHERE `cat_id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new CmsCategory();
            $obj->hydrate($row);
            CmsCategoryPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return CmsCategory|CmsCategory[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|CmsCategory[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return CmsCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CmsCategoryPeer::CAT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CmsCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CmsCategoryPeer::CAT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the cat_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCatId(1234); // WHERE cat_id = 1234
     * $query->filterByCatId(array(12, 34)); // WHERE cat_id IN (12, 34)
     * $query->filterByCatId(array('min' => 12)); // WHERE cat_id >= 12
     * $query->filterByCatId(array('max' => 12)); // WHERE cat_id <= 12
     * </code>
     *
     * @param     mixed $catId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CmsCategoryQuery The current query, for fluid interface
     */
    public function filterByCatId($catId = null, $comparison = null)
    {
        if (is_array($catId)) {
            $useMinMax = false;
            if (isset($catId['min'])) {
                $this->addUsingAlias(CmsCategoryPeer::CAT_ID, $catId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($catId['max'])) {
                $this->addUsingAlias(CmsCategoryPeer::CAT_ID, $catId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CmsCategoryPeer::CAT_ID, $catId, $comparison);
    }

    /**
     * Filter the query on the cat_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCatName('fooValue');   // WHERE cat_name = 'fooValue'
     * $query->filterByCatName('%fooValue%'); // WHERE cat_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $catName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CmsCategoryQuery The current query, for fluid interface
     */
    public function filterByCatName($catName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $catName)) {
                $catName = str_replace('*', '%', $catName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CmsCategoryPeer::CAT_NAME, $catName, $comparison);
    }

    /**
     * Filter the query by a related CmsArticle object
     *
     * @param   CmsArticle|PropelObjectCollection $cmsArticle  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CmsCategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCmsArticle($cmsArticle, $comparison = null)
    {
        if ($cmsArticle instanceof CmsArticle) {
            return $this
                ->addUsingAlias(CmsCategoryPeer::CAT_ID, $cmsArticle->getArtCatId(), $comparison);
        } elseif ($cmsArticle instanceof PropelObjectCollection) {
            return $this
                ->useCmsArticleQuery()
                ->filterByPrimaryKeys($cmsArticle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCmsArticle() only accepts arguments of type CmsArticle or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CmsArticle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CmsCategoryQuery The current query, for fluid interface
     */
    public function joinCmsArticle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CmsArticle');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CmsArticle');
        }

        return $this;
    }

    /**
     * Use the CmsArticle relation CmsArticle object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CmsArticleQuery A secondary query class using the current class as primary query
     */
    public function useCmsArticleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCmsArticle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CmsArticle', 'CmsArticleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   CmsCategory $cmsCategory Object to remove from the list of results
     *
     * @return CmsCategoryQuery The current query, for fluid interface
     */
    public function prune($cmsCategory = null)
    {
        if ($cmsCategory) {
            $this->addUsingAlias(CmsCategoryPeer::CAT_ID, $cmsCategory->getCatId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
