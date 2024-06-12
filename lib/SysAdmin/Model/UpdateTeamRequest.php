<?php
/**
 * UpdateTeamRequest
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Account Operations: System admin
 *
 * The official SeaTable API Reference (OpenAPI 3.0).
 *
 * The version of the OpenAPI document: 4.4
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.6.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace SeaTable\Client\SysAdmin/Model;

use \ArrayAccess;
use \SeaTable\Client\ObjectSerializer;

/**
 * UpdateTeamRequest Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class UpdateTeamRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'updateTeam_request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'org_name' => 'string',
        'role' => 'string',
        'row_limit' => 'int',
        'max_user_number' => 'string',
        'asset_quota_mb' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'org_name' => null,
        'role' => null,
        'row_limit' => null,
        'max_user_number' => null,
        'asset_quota_mb' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'org_name' => false,
        'role' => false,
        'row_limit' => false,
        'max_user_number' => false,
        'asset_quota_mb' => false
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
        'org_name' => 'org_name',
        'role' => 'role',
        'row_limit' => 'row_limit',
        'max_user_number' => 'max_user_number',
        'asset_quota_mb' => 'asset_quota_mb'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'org_name' => 'setOrgName',
        'role' => 'setRole',
        'row_limit' => 'setRowLimit',
        'max_user_number' => 'setMaxUserNumber',
        'asset_quota_mb' => 'setAssetQuotaMb'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'org_name' => 'getOrgName',
        'role' => 'getRole',
        'row_limit' => 'getRowLimit',
        'max_user_number' => 'getMaxUserNumber',
        'asset_quota_mb' => 'getAssetQuotaMb'
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
        $this->setIfExists('org_name', $data ?? [], null);
        $this->setIfExists('role', $data ?? [], null);
        $this->setIfExists('row_limit', $data ?? [], null);
        $this->setIfExists('max_user_number', $data ?? [], null);
        $this->setIfExists('asset_quota_mb', $data ?? [], null);
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
     * Gets org_name
     *
     * @return string|null
     */
    public function getOrgName()
    {
        return $this->container['org_name'];
    }

    /**
     * Sets org_name
     *
     * @param string|null $org_name Name of the team. Required.
     *
     * @return self
     */
    public function setOrgName($org_name)
    {
        if (is_null($org_name)) {
            throw new \InvalidArgumentException('non-nullable org_name cannot be null');
        }
        $this->container['org_name'] = $org_name;

        return $this;
    }

    /**
     * Gets role
     *
     * @return string|null
     */
    public function getRole()
    {
        return $this->container['role'];
    }

    /**
     * Sets role
     *
     * @param string|null $role The class of the team. For example, on cloud.seatable.io, we have free teams (`org_default`), Plus teams (`org_plus`) and Enterprise teams (`org_enterprise`).
     *
     * @return self
     */
    public function setRole($role)
    {
        if (is_null($role)) {
            throw new \InvalidArgumentException('non-nullable role cannot be null');
        }
        $this->container['role'] = $role;

        return $this;
    }

    /**
     * Gets row_limit
     *
     * @return int|null
     */
    public function getRowLimit()
    {
        return $this->container['row_limit'];
    }

    /**
     * Sets row_limit
     *
     * @param int|null $row_limit User's total row limit in number. For example 10000.
     *
     * @return self
     */
    public function setRowLimit($row_limit)
    {
        if (is_null($row_limit)) {
            throw new \InvalidArgumentException('non-nullable row_limit cannot be null');
        }
        $this->container['row_limit'] = $row_limit;

        return $this;
    }

    /**
     * Gets max_user_number
     *
     * @return string|null
     */
    public function getMaxUserNumber()
    {
        return $this->container['max_user_number'];
    }

    /**
     * Sets max_user_number
     *
     * @param string|null $max_user_number The maximum user number.
     *
     * @return self
     */
    public function setMaxUserNumber($max_user_number)
    {
        if (is_null($max_user_number)) {
            throw new \InvalidArgumentException('non-nullable max_user_number cannot be null');
        }
        $this->container['max_user_number'] = $max_user_number;

        return $this;
    }

    /**
     * Gets asset_quota_mb
     *
     * @return string|null
     */
    public function getAssetQuotaMb()
    {
        return $this->container['asset_quota_mb'];
    }

    /**
     * Sets asset_quota_mb
     *
     * @param string|null $asset_quota_mb The asset quota in MB.
     *
     * @return self
     */
    public function setAssetQuotaMb($asset_quota_mb)
    {
        if (is_null($asset_quota_mb)) {
            throw new \InvalidArgumentException('non-nullable asset_quota_mb cannot be null');
        }
        $this->container['asset_quota_mb'] = $asset_quota_mb;

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


