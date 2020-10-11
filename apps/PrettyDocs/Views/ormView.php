<section id="orm" class="doc-section">
    <h2 class="section-title">Aorm Methods</h2>
    <div class="section-block">
        <p>
            For the easier way to access to database components, born the Object-Relation-Mapping that permitted the relation of table in database
            with a class in POO.
            <br>
            How i use?
        </p>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <pre><code class="language-php">
/**
* @return string
*/
public function getTable()

/**
* @param string $table
*/
public function setTable($table)

/**
* @return string
*/
public function getPrimaryKey()

/**
 * @return array
 */
public function getColumns()

/**
 * @param array $columns
 */
public function setColumns($columns)

/**
 * @return mixed
 */
public function getLink()

/**
* @param stdClass $object
* @param boolean $areColumns if you going to get data define as 'true'
*/
public function setObjectColumns(stdClass $object, $areColumns = false)

/**
* execute all queries
* @param $sql
* @return $this
*/
public function query( $sql )

/**
* @return Aorm
*/
public function get()

/**
* @param $table
* @param array $properties field => compare field
* @param string $OPERATOR operator ('=','!=', '>', '<', etc...)(optional)
* @return $this
*/
public function inner( $table, array $properties, $OPERATOR = '=' )

/**
* @param $table
* @param array $properties field => compare field
* @param string $OPERATOR operator ('=','!=', '>', '<', etc...)(optional)
* @return $this
*/
public function left( $table, array $properties, $OPERATOR = '=' )

/**
* @param $table
* @param array $properties field => compare field
* @param string $OPERATOR operator ('=','!=', '>', '<', etc...)(optional)
* @return $this
*/
public function right( $table, array $properties, $OPERATOR = '=' )

/**
 * @param $column
 * @param $operator
 * @param $value
 * @param string $linked
 * @return Aorm
 */
public function condition( $column, $operator, $value, $linked = '')

/**
* get all data from table
* @param boolean $cascade
* @param string $type could be ( object or array )
* @return array|null
*/
public function getAll( $cascade = true, $type = "object" )

/**
* find record by primary value
* @param $value
* @param boolean $cascade
* @param string $typeResult
* @return array|null|stdClass
*/
public function find( $value, $cascade = true, $typeResult = "object" )

/**
* @param $value
* @param $column
* @param string $typeResult
* @return array|null
*/
public function findBy( $value, $column, $typeResult = "object" )

/**
 * @param boolean $cascade
 * @return int|array
 * @throws RuntimeException
 * @deprecated deprecated since version 2.3
 */
public function save( $cascade = false )

/**
 * save multiple data
 * @param bool $cascade
 * @return array|null
 */
public function saveAll( $cascade = false )

/**
 * @param string $condition
 * @param boolean $cascade
 * @return int|array
 * @throws RuntimeException
 * @deprecated deprecated since version 2.3
 */
public function update( $condition = '', $cascade = false )

/**
* @param bool $cascade
* @return array|null
*/
public function updateAll( $cascade = false )

/**
 * @param string $column
 * @param boolean $cascade
 * @return int|array
 * @throws RuntimeException
 */
public function updateBy( $column, $cascade = false )

/**
 * @param string $condition
 * @param boolean $cascade
 * @throws RuntimeException
 * @return int|array
 */
public function delete( $condition = '', $cascade = false )

/**
 * Delete by primary key value
 * @param mixed $value primary key value
 * @param boolean $cascade
 * @return int|array
 */
public function destroy( $value, $cascade = false )

/**
 * This method will be use for save or update a model, it'll depends if you define the primary key value
 * @param bool $cascade
 * @return array|int
 * @since 2.3
 */
public function process( $cascade = false )

/**
 * begin transaction in database
 * @return void
 */
protected function begin()

/**
 * commit transaction in database
 * @return void
 */
protected function commit()

/**
 * rollback transaction in database
 * @param string $_EXCEPTION_MSG message on throw exception
 * @param bool $_THROW_EXCEPTION throw exception
 */
protected function rollback( $_EXCEPTION_MSG = 'Rollback executing...', $_THROW_EXCEPTION = TRUE )

/**
 * group by group
 * @param string $fields
 * @return $this
 */
protected function groupBy( $fields )

/**
 * order by query
 * @param string $fields
 * @param string $sort type could be 'asc' or 'desc'
 * @return $this
 */
protected function orderBy( $fields, $sort = 'asc' )

/**
 * Returns the escaped string
 * @param mixed $string Required. The string to be escaped. Characters encoded are NUL (ASCII 0), \n, \r, \, ', ", and Control-Z.
 * @return mixed
 */
public function escape( $string )

/**
* execute set query, always you must call query method before this
* @return $this
*/
public function execute()

/**
 * return affected rows
 * @return int
 */
protected function getRowAffected()

/**
 * Object list by resource result from the database
 * @return array
 */
protected function getObjectList()

/**
 * array list by resource result from the database
 * @return array
 */
protected function getArrayList()

/**
 * type one result consult
 * @return stdClass database resource object
 */
protected function getObject()

/**
 * type one result consult
 * @return array
 */
protected function getArray()

/**
* sql sentences
* @return string
*/
protected function getSqlSentences( )
/**
* add object to array list to save or update
* @param stdClass $object
*/
public function addToList(stdClass $object)
/**
* Json string by object model
* @return string
*/
public function toString()
/**
* set object for save or update
* @param stdClass $object field + value of database table
* @param array $excludeKeys
* @throws RuntimeException
* @return void
*/
public function setObjectModelValue( stdClass $object, $excludeKeys = array() )
/**
 * set serialize form for save or update
 * @param array $form
 * @param array $excludeKeys
 * @throws RuntimeException
 * @return void
 */
public function setSerializeFormModelValue( array $form, $excludeKeys = array() )
/**
 * get Object value
 * @param stdClass $object
 * @param $key
 * @param bool $decodeJson return a JSON value
 * @return mixed|null
 */
public function getObjectModelValueByKey( stdClass $object, $key, $decodeJson = false )
/**
 * get serialize form value
 * @param array $form
 * @param $key
 * @param bool $decodeJson return a JSON value
 * @return mixed|null
 */
public function getSerializeFormModelValueByKey( array $form, $key, $decodeJson = false )
        </code></pre>
            </div>
        </div><!--//row-->

    </div><!--//section-block-->
</section><!--//doc-section-->