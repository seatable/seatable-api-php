<?php
/**
 * HasAllOf
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
 * The version of the OpenAPI document: 4.4
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.5.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace SeaTable\Client\User;

use \ArrayAccess;
use \SeaTable\Client\ObjectSerializer;

/**
 * HasAllOf Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class HasAllOf implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'has_all_of';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'column_key' => 'string',
        'filter_predicate' => 'string',
        'filter_term' => 'string[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'column_key' => null,
        'filter_predicate' => null,
        'filter_term' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'column_key' => false,
        'filter_predicate' => false,
        'filter_term' => false
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
        'column_key' => 'column_key',
        'filter_predicate' => 'filter_predicate',
        'filter_term' => 'filter_term'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'column_key' => 'setColumnKey',
        'filter_predicate' => 'setFilterPredicate',
        'filter_term' => 'setFilterTerm'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'column_key' => 'getColumnKey',
        'filter_predicate' => 'getFilterPredicate',
        'filter_term' => 'getFilterTerm'
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

    public const FILTER_PREDICATE_HAS_ALL_OF = 'has_all_of';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFilterPredicateAllowableValues()
    {
        return [
            self::FILTER_PREDICATE_HAS_ALL_OF,
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
        $this->setIfExists('column_key', $data ?? [], null);
        $this->setIfExists('filter_predicate', $data ?? [], null);
        $this->setIfExists('filter_term', $data ?? [], null);
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

        $allowedValues = $this->getFilterPredicateAllowableValues();
        if (!is_null($this->container['filter_predicate']) && !in_array($this->container['filter_predicate'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'filter_predicate', must be one of '%s'",
                $this->container['filter_predicate'],
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
     * Gets column_key
     *
     * @return string|null
     */
    public function getColumnKey()
    {
        return $this->container['column_key'];
    }

    /**
     * Sets column_key
     *
     * @param string|null $column_key column_key
     *
     * @return self
     */
    public function setColumnKey($column_key)
    {
        if (is_null($column_key)) {
            throw new \InvalidArgumentException('non-nullable column_key cannot be null');
        }
        $this->container['column_key'] = $column_key;

        return $this;
    }

    /**
     * Gets filter_predicate
     *
     * @return string|null
     */
    public function getFilterPredicate()
    {
        return $this->container['filter_predicate'];
    }

    /**
     * Sets filter_predicate
     *
     * @param string|null $filter_predicate filter_predicate
     *
     * @return self
     */
    public function setFilterPredicate($filter_predicate)
    {
        if (is_null($filter_predicate)) {
            throw new \InvalidArgumentException('non-nullable filter_predicate cannot be null');
        }
        $allowedValues = $this->getFilterPredicateAllowableValues();
        if (!in_array($filter_predicate, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'filter_predicate', must be one of '%s'",
                    $filter_predicate,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['filter_predicate'] = $filter_predicate;

        return $this;
    }

    /**
     * Gets filter_term
     *
     * @return string[]|null
     */
    public function getFilterTerm()
    {
        return $this->container['filter_term'];
    }

    /**
     * Sets filter_term
     *
     * @param string[]|null $filter_term filter_term
     *
     * @return self
     */
    public function setFilterTerm($filter_term)
    {
        if (is_null($filter_term)) {
            throw new \InvalidArgumentException('non-nullable filter_term cannot be null');
        }
        $this->container['filter_term'] = $filter_term;

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

