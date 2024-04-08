<?php
/**
 * TriggerRunPeriodicallyPerDayTrigger
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Account Operations - User
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
 * TriggerRunPeriodicallyPerDayTrigger Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class TriggerRunPeriodicallyPerDayTrigger implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'trigger_run_periodically_per_day_trigger';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'rule_name' => 'string',
        'table_id' => 'string',
        'view_id' => 'string',
        'condition' => '\SeaTable\Client\Model\TriggerRunPeriodicallyCondition',
        'date_column_name' => 'string',
        'notify_hour' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'rule_name' => null,
        'table_id' => null,
        'view_id' => null,
        'condition' => null,
        'date_column_name' => null,
        'notify_hour' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'rule_name' => false,
        'table_id' => false,
        'view_id' => false,
        'condition' => false,
        'date_column_name' => false,
        'notify_hour' => false
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
        'rule_name' => 'rule_name',
        'table_id' => 'table_id',
        'view_id' => 'view_id',
        'condition' => 'condition',
        'date_column_name' => 'date_column_name',
        'notify_hour' => 'notify_hour'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'rule_name' => 'setRuleName',
        'table_id' => 'setTableId',
        'view_id' => 'setViewId',
        'condition' => 'setCondition',
        'date_column_name' => 'setDateColumnName',
        'notify_hour' => 'setNotifyHour'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'rule_name' => 'getRuleName',
        'table_id' => 'getTableId',
        'view_id' => 'getViewId',
        'condition' => 'getCondition',
        'date_column_name' => 'getDateColumnName',
        'notify_hour' => 'getNotifyHour'
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
        $this->setIfExists('rule_name', $data ?? [], null);
        $this->setIfExists('table_id', $data ?? [], null);
        $this->setIfExists('view_id', $data ?? [], null);
        $this->setIfExists('condition', $data ?? [], null);
        $this->setIfExists('date_column_name', $data ?? [], null);
        $this->setIfExists('notify_hour', $data ?? [], null);
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
     * Gets rule_name
     *
     * @return string|null
     */
    public function getRuleName()
    {
        return $this->container['rule_name'];
    }

    /**
     * Sets rule_name
     *
     * @param string|null $rule_name rule_name
     *
     * @return self
     */
    public function setRuleName($rule_name)
    {
        if (is_null($rule_name)) {
            throw new \InvalidArgumentException('non-nullable rule_name cannot be null');
        }
        $this->container['rule_name'] = $rule_name;

        return $this;
    }

    /**
     * Gets table_id
     *
     * @return string|null
     */
    public function getTableId()
    {
        return $this->container['table_id'];
    }

    /**
     * Sets table_id
     *
     * @param string|null $table_id table_id
     *
     * @return self
     */
    public function setTableId($table_id)
    {
        if (is_null($table_id)) {
            throw new \InvalidArgumentException('non-nullable table_id cannot be null');
        }
        $this->container['table_id'] = $table_id;

        return $this;
    }

    /**
     * Gets view_id
     *
     * @return string|null
     */
    public function getViewId()
    {
        return $this->container['view_id'];
    }

    /**
     * Sets view_id
     *
     * @param string|null $view_id view_id
     *
     * @return self
     */
    public function setViewId($view_id)
    {
        if (is_null($view_id)) {
            throw new \InvalidArgumentException('non-nullable view_id cannot be null');
        }
        $this->container['view_id'] = $view_id;

        return $this;
    }

    /**
     * Gets condition
     *
     * @return \SeaTable\Client\Model\TriggerRunPeriodicallyCondition|null
     */
    public function getCondition()
    {
        return $this->container['condition'];
    }

    /**
     * Sets condition
     *
     * @param \SeaTable\Client\Model\TriggerRunPeriodicallyCondition|null $condition condition
     *
     * @return self
     */
    public function setCondition($condition)
    {
        if (is_null($condition)) {
            throw new \InvalidArgumentException('non-nullable condition cannot be null');
        }
        $this->container['condition'] = $condition;

        return $this;
    }

    /**
     * Gets date_column_name
     *
     * @return string|null
     */
    public function getDateColumnName()
    {
        return $this->container['date_column_name'];
    }

    /**
     * Sets date_column_name
     *
     * @param string|null $date_column_name date_column_name
     *
     * @return self
     */
    public function setDateColumnName($date_column_name)
    {
        if (is_null($date_column_name)) {
            throw new \InvalidArgumentException('non-nullable date_column_name cannot be null');
        }
        $this->container['date_column_name'] = $date_column_name;

        return $this;
    }

    /**
     * Gets notify_hour
     *
     * @return int|null
     */
    public function getNotifyHour()
    {
        return $this->container['notify_hour'];
    }

    /**
     * Sets notify_hour
     *
     * @param int|null $notify_hour notify_hour
     *
     * @return self
     */
    public function setNotifyHour($notify_hour)
    {
        if (is_null($notify_hour)) {
            throw new \InvalidArgumentException('non-nullable notify_hour cannot be null');
        }
        $this->container['notify_hour'] = $notify_hour;

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


