<?php
/**
 * LinkFormulaColumnColumnData
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
 * The version of the OpenAPI document: 4.4
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.5.0-SNAPSHOT
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
 * LinkFormulaColumnColumnData Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class LinkFormulaColumnColumnData implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'link_formula_column_column_data';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'formula' => 'string',
        'link_column' => 'string',
        'level1_linked_column' => 'string',
        'summary_column' => 'string',
        'summary_method' => 'string',
        'searched_column' => 'string',
        'comparison_column' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'formula' => null,
        'link_column' => null,
        'level1_linked_column' => null,
        'summary_column' => null,
        'summary_method' => null,
        'searched_column' => null,
        'comparison_column' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'formula' => false,
        'link_column' => false,
        'level1_linked_column' => false,
        'summary_column' => false,
        'summary_method' => false,
        'searched_column' => false,
        'comparison_column' => false
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
        'formula' => 'formula',
        'link_column' => 'link_column',
        'level1_linked_column' => 'level1_linked_column',
        'summary_column' => 'summary_column',
        'summary_method' => 'summary_method',
        'searched_column' => 'searched_column',
        'comparison_column' => 'comparison_column'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'formula' => 'setFormula',
        'link_column' => 'setLinkColumn',
        'level1_linked_column' => 'setLevel1LinkedColumn',
        'summary_column' => 'setSummaryColumn',
        'summary_method' => 'setSummaryMethod',
        'searched_column' => 'setSearchedColumn',
        'comparison_column' => 'setComparisonColumn'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'formula' => 'getFormula',
        'link_column' => 'getLinkColumn',
        'level1_linked_column' => 'getLevel1LinkedColumn',
        'summary_column' => 'getSummaryColumn',
        'summary_method' => 'getSummaryMethod',
        'searched_column' => 'getSearchedColumn',
        'comparison_column' => 'getComparisonColumn'
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

    public const FORMULA_FINDMIN = 'findmin';
    public const SUMMARY_METHOD_AVERAGE = 'average';
    public const SUMMARY_METHOD_CONCATENATE = 'concatenate';
    public const SUMMARY_METHOD_MAX = 'max';
    public const SUMMARY_METHOD_MIN = 'min';
    public const SUMMARY_METHOD_SUM = 'sum';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFormulaAllowableValues()
    {
        return [
            self::FORMULA_FINDMIN,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSummaryMethodAllowableValues()
    {
        return [
            self::SUMMARY_METHOD_AVERAGE,
            self::SUMMARY_METHOD_CONCATENATE,
            self::SUMMARY_METHOD_MAX,
            self::SUMMARY_METHOD_MIN,
            self::SUMMARY_METHOD_SUM,
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
        $this->setIfExists('formula', $data ?? [], null);
        $this->setIfExists('link_column', $data ?? [], null);
        $this->setIfExists('level1_linked_column', $data ?? [], null);
        $this->setIfExists('summary_column', $data ?? [], null);
        $this->setIfExists('summary_method', $data ?? [], null);
        $this->setIfExists('searched_column', $data ?? [], null);
        $this->setIfExists('comparison_column', $data ?? [], null);
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

        if ($this->container['formula'] === null) {
            $invalidProperties[] = "'formula' can't be null";
        }
        $allowedValues = $this->getFormulaAllowableValues();
        if (!is_null($this->container['formula']) && !in_array($this->container['formula'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'formula', must be one of '%s'",
                $this->container['formula'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['link_column'] === null) {
            $invalidProperties[] = "'link_column' can't be null";
        }
        if ($this->container['level1_linked_column'] === null) {
            $invalidProperties[] = "'level1_linked_column' can't be null";
        }
        if ($this->container['summary_column'] === null) {
            $invalidProperties[] = "'summary_column' can't be null";
        }
        if ($this->container['summary_method'] === null) {
            $invalidProperties[] = "'summary_method' can't be null";
        }
        $allowedValues = $this->getSummaryMethodAllowableValues();
        if (!is_null($this->container['summary_method']) && !in_array($this->container['summary_method'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'summary_method', must be one of '%s'",
                $this->container['summary_method'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['searched_column'] === null) {
            $invalidProperties[] = "'searched_column' can't be null";
        }
        if ($this->container['comparison_column'] === null) {
            $invalidProperties[] = "'comparison_column' can't be null";
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
     * Gets formula
     *
     * @return string
     */
    public function getFormula()
    {
        return $this->container['formula'];
    }

    /**
     * Sets formula
     *
     * @param string $formula The formula of this column.
     *
     * @return self
     */
    public function setFormula($formula)
    {
        if (is_null($formula)) {
            throw new \InvalidArgumentException('non-nullable formula cannot be null');
        }
        $allowedValues = $this->getFormulaAllowableValues();
        if (!in_array($formula, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'formula', must be one of '%s'",
                    $formula,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['formula'] = $formula;

        return $this;
    }

    /**
     * Gets link_column
     *
     * @return string
     */
    public function getLinkColumn()
    {
        return $this->container['link_column'];
    }

    /**
     * Sets link_column
     *
     * @param string $link_column Name of the link column.
     *
     * @return self
     */
    public function setLinkColumn($link_column)
    {
        if (is_null($link_column)) {
            throw new \InvalidArgumentException('non-nullable link_column cannot be null');
        }
        $this->container['link_column'] = $link_column;

        return $this;
    }

    /**
     * Gets level1_linked_column
     *
     * @return string
     */
    public function getLevel1LinkedColumn()
    {
        return $this->container['level1_linked_column'];
    }

    /**
     * Sets level1_linked_column
     *
     * @param string $level1_linked_column Name of the column in the linked table to look up.
     *
     * @return self
     */
    public function setLevel1LinkedColumn($level1_linked_column)
    {
        if (is_null($level1_linked_column)) {
            throw new \InvalidArgumentException('non-nullable level1_linked_column cannot be null');
        }
        $this->container['level1_linked_column'] = $level1_linked_column;

        return $this;
    }

    /**
     * Gets summary_column
     *
     * @return string
     */
    public function getSummaryColumn()
    {
        return $this->container['summary_column'];
    }

    /**
     * Sets summary_column
     *
     * @param string $summary_column The column in the linked table to be summarized.
     *
     * @return self
     */
    public function setSummaryColumn($summary_column)
    {
        if (is_null($summary_column)) {
            throw new \InvalidArgumentException('non-nullable summary_column cannot be null');
        }
        $this->container['summary_column'] = $summary_column;

        return $this;
    }

    /**
     * Gets summary_method
     *
     * @return string
     */
    public function getSummaryMethod()
    {
        return $this->container['summary_method'];
    }

    /**
     * Sets summary_method
     *
     * @param string $summary_method summary_method
     *
     * @return self
     */
    public function setSummaryMethod($summary_method)
    {
        if (is_null($summary_method)) {
            throw new \InvalidArgumentException('non-nullable summary_method cannot be null');
        }
        $allowedValues = $this->getSummaryMethodAllowableValues();
        if (!in_array($summary_method, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'summary_method', must be one of '%s'",
                    $summary_method,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['summary_method'] = $summary_method;

        return $this;
    }

    /**
     * Gets searched_column
     *
     * @return string
     */
    public function getSearchedColumn()
    {
        return $this->container['searched_column'];
    }

    /**
     * Sets searched_column
     *
     * @param string $searched_column The column in the linked table to look up.
     *
     * @return self
     */
    public function setSearchedColumn($searched_column)
    {
        if (is_null($searched_column)) {
            throw new \InvalidArgumentException('non-nullable searched_column cannot be null');
        }
        $this->container['searched_column'] = $searched_column;

        return $this;
    }

    /**
     * Gets comparison_column
     *
     * @return string
     */
    public function getComparisonColumn()
    {
        return $this->container['comparison_column'];
    }

    /**
     * Sets comparison_column
     *
     * @param string $comparison_column The column in the linked table to be evaluated.
     *
     * @return self
     */
    public function setComparisonColumn($comparison_column)
    {
        if (is_null($comparison_column)) {
            throw new \InvalidArgumentException('non-nullable comparison_column cannot be null');
        }
        $this->container['comparison_column'] = $comparison_column;

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

