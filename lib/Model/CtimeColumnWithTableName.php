<?php
/**
 * CtimeColumnWithTableName
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Base Operations
 *
 * The official SeaTable API Reference (OpenAPI 3.0).
 *
 * The version of the OpenAPI document: 4.3
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.5.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace SeaTable\Client\Model;

use \ArrayAccess;
use \SeaTable\Client\ObjectSerializer;

/**
 * CtimeColumnWithTableName Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CtimeColumnWithTableName implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ctime_column_with_table_name';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'table_name' => 'string',
        'column_name' => 'string',
        'column_type' => 'string',
        'anchor_column' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'table_name' => null,
        'column_name' => null,
        'column_type' => null,
        'anchor_column' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'table_name' => false,
        'column_name' => false,
        'column_type' => false,
        'anchor_column' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'table_name' => 'table_name',
        'column_name' => 'column_name',
        'column_type' => 'column_type',
        'anchor_column' => 'anchor_column'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'table_name' => 'setTableName',
        'column_name' => 'setColumnName',
        'column_type' => 'setColumnType',
        'anchor_column' => 'setAnchorColumn'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'table_name' => 'getTableName',
        'column_name' => 'getColumnName',
        'column_type' => 'getColumnType',
        'anchor_column' => 'getAnchorColumn'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    public const COLUMN_TYPE_CTIME = 'ctime';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getColumnTypeAllowableValues()
    {
        return [
            self::COLUMN_TYPE_CTIME,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('table_name', $data ?? [], null);
        $this->setIfExists('column_name', $data ?? [], null);
        $this->setIfExists('column_type', $data ?? [], null);
        $this->setIfExists('anchor_column', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['table_name'] === null) {
            $invalidProperties[] = "'table_name' can't be null";
        }
        if ($this->container['column_name'] === null) {
            $invalidProperties[] = "'column_name' can't be null";
        }
        if (!preg_match("/^[^.}{`]*$/", $this->container['column_name'])) {
            $invalidProperties[] = "invalid value for 'column_name', must be conform to the pattern /^[^.}{`]*$/.";
        }

        if ($this->container['column_type'] === null) {
            $invalidProperties[] = "'column_type' can't be null";
        }
        $allowedValues = $this->getColumnTypeAllowableValues();
        if (!is_null($this->container['column_type']) && !in_array($this->container['column_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'column_type', must be one of '%s'",
                $this->container['column_type'],
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets table_name
     *
     * @return string
     */
    public function getTableName()
    {
        return $this->container['table_name'];
    }

    /**
     * Sets table_name
     *
     * @param string $table_name The name of the table.
     *
     * @return self
     */
    public function setTableName($table_name)
    {
        if (is_null($table_name)) {
            throw new \InvalidArgumentException('non-nullable table_name cannot be null');
        }
        $this->container['table_name'] = $table_name;

        return $this;
    }

    /**
     * Gets column_name
     *
     * @return string
     */
    public function getColumnName()
    {
        return $this->container['column_name'];
    }

    /**
     * Sets column_name
     *
     * @param string $column_name The name of the column.
     *
     * @return self
     */
    public function setColumnName($column_name)
    {
        if (is_null($column_name)) {
            throw new \InvalidArgumentException('non-nullable column_name cannot be null');
        }

        if ((!preg_match("/^[^.}{`]*$/", ObjectSerializer::toString($column_name)))) {
            throw new \InvalidArgumentException("invalid value for \$column_name when calling CtimeColumnWithTableName., must conform to the pattern /^[^.}{`]*$/.");
        }

        $this->container['column_name'] = $column_name;

        return $this;
    }

    /**
     * Gets column_type
     *
     * @return string
     */
    public function getColumnType()
    {
        return $this->container['column_type'];
    }

    /**
     * Sets column_type
     *
     * @param string $column_type column_type
     *
     * @return self
     */
    public function setColumnType($column_type)
    {
        if (is_null($column_type)) {
            throw new \InvalidArgumentException('non-nullable column_type cannot be null');
        }
        $allowedValues = $this->getColumnTypeAllowableValues();
        if (!in_array($column_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'column_type', must be one of '%s'",
                    $column_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['column_type'] = $column_type;

        return $this;
    }

    /**
     * Gets anchor_column
     *
     * @return string|null
     */
    public function getAnchorColumn()
    {
        return $this->container['anchor_column'];
    }

    /**
     * Sets anchor_column
     *
     * @param string|null $anchor_column Give the name or the key of a column after you would like to add this new column. If you leave this empty, the new column will be created at the end.
     *
     * @return self
     */
    public function setAnchorColumn($anchor_column)
    {
        if (is_null($anchor_column)) {
            throw new \InvalidArgumentException('non-nullable anchor_column cannot be null');
        }
        $this->container['anchor_column'] = $anchor_column;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


