<?php
/**
 * RenameColumn
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Base Operations (from 4.4)
 *
 * The official SeaTable API Reference (OpenAPI 3.0).
 *
 * The version of the OpenAPI document: 5.2
 * Generated by: https://openapi-generator.tech
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace SeaTable\Client\Base;

use \ArrayAccess;
use \SeaTable\Client\ObjectSerializer;

/**
 * RenameColumn Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class RenameColumn implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'rename_column';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'op_type' => 'string',
        'table_name' => 'string',
        'column' => 'string',
        'new_column_name' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'op_type' => null,
        'table_name' => null,
        'column' => null,
        'new_column_name' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'op_type' => false,
        'table_name' => false,
        'column' => false,
        'new_column_name' => false
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
        'op_type' => 'op_type',
        'table_name' => 'table_name',
        'column' => 'column',
        'new_column_name' => 'new_column_name'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'op_type' => 'setOpType',
        'table_name' => 'setTableName',
        'column' => 'setColumn',
        'new_column_name' => 'setNewColumnName'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'op_type' => 'getOpType',
        'table_name' => 'getTableName',
        'column' => 'getColumn',
        'new_column_name' => 'getNewColumnName'
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

    public const OP_TYPE_RENAME_COLUMN = 'rename_column';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getOpTypeAllowableValues()
    {
        return [
            self::OP_TYPE_RENAME_COLUMN,
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
        $this->setIfExists('op_type', $data ?? [], null);
        $this->setIfExists('table_name', $data ?? [], null);
        $this->setIfExists('column', $data ?? [], null);
        $this->setIfExists('new_column_name', $data ?? [], null);
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

        if ($this->container['op_type'] === null) {
            $invalidProperties[] = "'op_type' can't be null";
        }
        $allowedValues = $this->getOpTypeAllowableValues();
        if (!is_null($this->container['op_type']) && !in_array($this->container['op_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'op_type', must be one of '%s'",
                $this->container['op_type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['table_name'] === null) {
            $invalidProperties[] = "'table_name' can't be null";
        }
        if ($this->container['column'] === null) {
            $invalidProperties[] = "'column' can't be null";
        }
        if (!preg_match("/^[^.}{`]*$/", $this->container['column'])) {
            $invalidProperties[] = "invalid value for 'column', must be conform to the pattern /^[^.}{`]*$/.";
        }

        if ($this->container['new_column_name'] === null) {
            $invalidProperties[] = "'new_column_name' can't be null";
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
     * Gets op_type
     *
     * @return string
     */
    public function getOpType()
    {
        return $this->container['op_type'];
    }

    /**
     * Sets op_type
     *
     * @param string $op_type op_type
     *
     * @return self
     */
    public function setOpType($op_type)
    {
        if (is_null($op_type)) {
            throw new \InvalidArgumentException('non-nullable op_type cannot be null');
        }
        $allowedValues = $this->getOpTypeAllowableValues();
        if (!in_array($op_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'op_type', must be one of '%s'",
                    $op_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['op_type'] = $op_type;

        return $this;
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
     * @param string $table_name The name of the table to perform the operation on. Alternatively, you can use the `table_id` instead of `table_name`. If using `table_id`, ensure that the key in the request body is replaced accordingly.
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
     * Gets column
     *
     * @return string
     */
    public function getColumn()
    {
        return $this->container['column'];
    }

    /**
     * Sets column
     *
     * @param string $column The name of the column.
     *
     * @return self
     */
    public function setColumn($column)
    {
        if (is_null($column)) {
            throw new \InvalidArgumentException('non-nullable column cannot be null');
        }

        if ((!preg_match("/^[^.}{`]*$/", ObjectSerializer::toString($column)))) {
            throw new \InvalidArgumentException("invalid value for \$column when calling RenameColumn., must conform to the pattern /^[^.}{`]*$/.");
        }

        $this->container['column'] = $column;

        return $this;
    }

    /**
     * Gets new_column_name
     *
     * @return string
     */
    public function getNewColumnName()
    {
        return $this->container['new_column_name'];
    }

    /**
     * Sets new_column_name
     *
     * @param string $new_column_name new_column_name
     *
     * @return self
     */
    public function setNewColumnName($new_column_name)
    {
        if (is_null($new_column_name)) {
            throw new \InvalidArgumentException('non-nullable new_column_name cannot be null');
        }
        $this->container['new_column_name'] = $new_column_name;

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


