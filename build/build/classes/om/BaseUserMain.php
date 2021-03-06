<?php


/**
 * Base class that represents a row from the 'user_main' table.
 *
 *
 *
 * @package    propel.generator..om
 */
abstract class BaseUserMain extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'UserMainPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        UserMainPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the user_id field.
     * @var        int
     */
    protected $user_id;

    /**
     * The value for the user_name field.
     * @var        string
     */
    protected $user_name;

    /**
     * The value for the user_pass field.
     * @var        string
     */
    protected $user_pass;

    /**
     * The value for the user_email field.
     * @var        string
     */
    protected $user_email;

    /**
     * @var        PropelObjectCollection|CmsArticle[] Collection to store aggregation of CmsArticle objects.
     */
    protected $collCmsArticles;
    protected $collCmsArticlesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $cmsArticlesScheduledForDeletion = null;

    /**
     * Get the [user_id] column value.
     *
     * @return int
     */
    public function getUserId()
    {

        return $this->user_id;
    }

    /**
     * Get the [user_name] column value.
     *
     * @return string
     */
    public function getUserName()
    {

        return $this->user_name;
    }

    /**
     * Get the [user_pass] column value.
     *
     * @return string
     */
    public function getUserPass()
    {

        return $this->user_pass;
    }

    /**
     * Get the [user_email] column value.
     *
     * @return string
     */
    public function getUserEmail()
    {

        return $this->user_email;
    }

    /**
     * Set the value of [user_id] column.
     *
     * @param  int $v new value
     * @return UserMain The current object (for fluent API support)
     */
    public function setUserId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->user_id !== $v) {
            $this->user_id = $v;
            $this->modifiedColumns[] = UserMainPeer::USER_ID;
        }


        return $this;
    } // setUserId()

    /**
     * Set the value of [user_name] column.
     *
     * @param  string $v new value
     * @return UserMain The current object (for fluent API support)
     */
    public function setUserName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->user_name !== $v) {
            $this->user_name = $v;
            $this->modifiedColumns[] = UserMainPeer::USER_NAME;
        }


        return $this;
    } // setUserName()

    /**
     * Set the value of [user_pass] column.
     *
     * @param  string $v new value
     * @return UserMain The current object (for fluent API support)
     */
    public function setUserPass($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->user_pass !== $v) {
            $this->user_pass = $v;
            $this->modifiedColumns[] = UserMainPeer::USER_PASS;
        }


        return $this;
    } // setUserPass()

    /**
     * Set the value of [user_email] column.
     *
     * @param  string $v new value
     * @return UserMain The current object (for fluent API support)
     */
    public function setUserEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->user_email !== $v) {
            $this->user_email = $v;
            $this->modifiedColumns[] = UserMainPeer::USER_EMAIL;
        }


        return $this;
    } // setUserEmail()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->user_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->user_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->user_pass = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->user_email = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = UserMainPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating UserMain object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(UserMainPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = UserMainPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collCmsArticles = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(UserMainPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = UserMainQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(UserMainPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                UserMainPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->cmsArticlesScheduledForDeletion !== null) {
                if (!$this->cmsArticlesScheduledForDeletion->isEmpty()) {
                    CmsArticleQuery::create()
                        ->filterByPrimaryKeys($this->cmsArticlesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->cmsArticlesScheduledForDeletion = null;
                }
            }

            if ($this->collCmsArticles !== null) {
                foreach ($this->collCmsArticles as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = UserMainPeer::USER_ID;
        if (null !== $this->user_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UserMainPeer::USER_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UserMainPeer::USER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`user_id`';
        }
        if ($this->isColumnModified(UserMainPeer::USER_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`user_name`';
        }
        if ($this->isColumnModified(UserMainPeer::USER_PASS)) {
            $modifiedColumns[':p' . $index++]  = '`user_pass`';
        }
        if ($this->isColumnModified(UserMainPeer::USER_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`user_email`';
        }

        $sql = sprintf(
            'INSERT INTO `user_main` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`user_id`':
                        $stmt->bindValue($identifier, $this->user_id, PDO::PARAM_INT);
                        break;
                    case '`user_name`':
                        $stmt->bindValue($identifier, $this->user_name, PDO::PARAM_STR);
                        break;
                    case '`user_pass`':
                        $stmt->bindValue($identifier, $this->user_pass, PDO::PARAM_STR);
                        break;
                    case '`user_email`':
                        $stmt->bindValue($identifier, $this->user_email, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setUserId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = UserMainPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCmsArticles !== null) {
                    foreach ($this->collCmsArticles as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = UserMainPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getUserId();
                break;
            case 1:
                return $this->getUserName();
                break;
            case 2:
                return $this->getUserPass();
                break;
            case 3:
                return $this->getUserEmail();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['UserMain'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['UserMain'][$this->getPrimaryKey()] = true;
        $keys = UserMainPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getUserId(),
            $keys[1] => $this->getUserName(),
            $keys[2] => $this->getUserPass(),
            $keys[3] => $this->getUserEmail(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collCmsArticles) {
                $result['CmsArticles'] = $this->collCmsArticles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = UserMainPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setUserId($value);
                break;
            case 1:
                $this->setUserName($value);
                break;
            case 2:
                $this->setUserPass($value);
                break;
            case 3:
                $this->setUserEmail($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = UserMainPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setUserId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setUserName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setUserPass($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setUserEmail($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(UserMainPeer::DATABASE_NAME);

        if ($this->isColumnModified(UserMainPeer::USER_ID)) $criteria->add(UserMainPeer::USER_ID, $this->user_id);
        if ($this->isColumnModified(UserMainPeer::USER_NAME)) $criteria->add(UserMainPeer::USER_NAME, $this->user_name);
        if ($this->isColumnModified(UserMainPeer::USER_PASS)) $criteria->add(UserMainPeer::USER_PASS, $this->user_pass);
        if ($this->isColumnModified(UserMainPeer::USER_EMAIL)) $criteria->add(UserMainPeer::USER_EMAIL, $this->user_email);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(UserMainPeer::DATABASE_NAME);
        $criteria->add(UserMainPeer::USER_ID, $this->user_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getUserId();
    }

    /**
     * Generic method to set the primary key (user_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setUserId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getUserId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of UserMain (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUserName($this->getUserName());
        $copyObj->setUserPass($this->getUserPass());
        $copyObj->setUserEmail($this->getUserEmail());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getCmsArticles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCmsArticle($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setUserId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return UserMain Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return UserMainPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new UserMainPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('CmsArticle' == $relationName) {
            $this->initCmsArticles();
        }
    }

    /**
     * Clears out the collCmsArticles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return UserMain The current object (for fluent API support)
     * @see        addCmsArticles()
     */
    public function clearCmsArticles()
    {
        $this->collCmsArticles = null; // important to set this to null since that means it is uninitialized
        $this->collCmsArticlesPartial = null;

        return $this;
    }

    /**
     * reset is the collCmsArticles collection loaded partially
     *
     * @return void
     */
    public function resetPartialCmsArticles($v = true)
    {
        $this->collCmsArticlesPartial = $v;
    }

    /**
     * Initializes the collCmsArticles collection.
     *
     * By default this just sets the collCmsArticles collection to an empty array (like clearcollCmsArticles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCmsArticles($overrideExisting = true)
    {
        if (null !== $this->collCmsArticles && !$overrideExisting) {
            return;
        }
        $this->collCmsArticles = new PropelObjectCollection();
        $this->collCmsArticles->setModel('CmsArticle');
    }

    /**
     * Gets an array of CmsArticle objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this UserMain is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|CmsArticle[] List of CmsArticle objects
     * @throws PropelException
     */
    public function getCmsArticles($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCmsArticlesPartial && !$this->isNew();
        if (null === $this->collCmsArticles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCmsArticles) {
                // return empty collection
                $this->initCmsArticles();
            } else {
                $collCmsArticles = CmsArticleQuery::create(null, $criteria)
                    ->filterByUserMain($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCmsArticlesPartial && count($collCmsArticles)) {
                      $this->initCmsArticles(false);

                      foreach ($collCmsArticles as $obj) {
                        if (false == $this->collCmsArticles->contains($obj)) {
                          $this->collCmsArticles->append($obj);
                        }
                      }

                      $this->collCmsArticlesPartial = true;
                    }

                    $collCmsArticles->getInternalIterator()->rewind();

                    return $collCmsArticles;
                }

                if ($partial && $this->collCmsArticles) {
                    foreach ($this->collCmsArticles as $obj) {
                        if ($obj->isNew()) {
                            $collCmsArticles[] = $obj;
                        }
                    }
                }

                $this->collCmsArticles = $collCmsArticles;
                $this->collCmsArticlesPartial = false;
            }
        }

        return $this->collCmsArticles;
    }

    /**
     * Sets a collection of CmsArticle objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $cmsArticles A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return UserMain The current object (for fluent API support)
     */
    public function setCmsArticles(PropelCollection $cmsArticles, PropelPDO $con = null)
    {
        $cmsArticlesToDelete = $this->getCmsArticles(new Criteria(), $con)->diff($cmsArticles);


        $this->cmsArticlesScheduledForDeletion = $cmsArticlesToDelete;

        foreach ($cmsArticlesToDelete as $cmsArticleRemoved) {
            $cmsArticleRemoved->setUserMain(null);
        }

        $this->collCmsArticles = null;
        foreach ($cmsArticles as $cmsArticle) {
            $this->addCmsArticle($cmsArticle);
        }

        $this->collCmsArticles = $cmsArticles;
        $this->collCmsArticlesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CmsArticle objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related CmsArticle objects.
     * @throws PropelException
     */
    public function countCmsArticles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCmsArticlesPartial && !$this->isNew();
        if (null === $this->collCmsArticles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCmsArticles) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCmsArticles());
            }
            $query = CmsArticleQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserMain($this)
                ->count($con);
        }

        return count($this->collCmsArticles);
    }

    /**
     * Method called to associate a CmsArticle object to this object
     * through the CmsArticle foreign key attribute.
     *
     * @param    CmsArticle $l CmsArticle
     * @return UserMain The current object (for fluent API support)
     */
    public function addCmsArticle(CmsArticle $l)
    {
        if ($this->collCmsArticles === null) {
            $this->initCmsArticles();
            $this->collCmsArticlesPartial = true;
        }

        if (!in_array($l, $this->collCmsArticles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCmsArticle($l);

            if ($this->cmsArticlesScheduledForDeletion and $this->cmsArticlesScheduledForDeletion->contains($l)) {
                $this->cmsArticlesScheduledForDeletion->remove($this->cmsArticlesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	CmsArticle $cmsArticle The cmsArticle object to add.
     */
    protected function doAddCmsArticle($cmsArticle)
    {
        $this->collCmsArticles[]= $cmsArticle;
        $cmsArticle->setUserMain($this);
    }

    /**
     * @param	CmsArticle $cmsArticle The cmsArticle object to remove.
     * @return UserMain The current object (for fluent API support)
     */
    public function removeCmsArticle($cmsArticle)
    {
        if ($this->getCmsArticles()->contains($cmsArticle)) {
            $this->collCmsArticles->remove($this->collCmsArticles->search($cmsArticle));
            if (null === $this->cmsArticlesScheduledForDeletion) {
                $this->cmsArticlesScheduledForDeletion = clone $this->collCmsArticles;
                $this->cmsArticlesScheduledForDeletion->clear();
            }
            $this->cmsArticlesScheduledForDeletion[]= clone $cmsArticle;
            $cmsArticle->setUserMain(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this UserMain is new, it will return
     * an empty collection; or if this UserMain has previously
     * been saved, it will retrieve related CmsArticles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in UserMain.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|CmsArticle[] List of CmsArticle objects
     */
    public function getCmsArticlesJoinCmsCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CmsArticleQuery::create(null, $criteria);
        $query->joinWith('CmsCategory', $join_behavior);

        return $this->getCmsArticles($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->user_id = null;
        $this->user_name = null;
        $this->user_pass = null;
        $this->user_email = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collCmsArticles) {
                foreach ($this->collCmsArticles as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collCmsArticles instanceof PropelCollection) {
            $this->collCmsArticles->clearIterator();
        }
        $this->collCmsArticles = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UserMainPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
