<?php
/**
 * ApiToken
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Authentication
 *
 * The official SeaTable API Reference (OpenAPI 3.0).
 *
 * The version of the OpenAPI document: 4.4
 * Generated by: https://openapi-generator.tech
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace SeaTable\Client\Auth;

use \ArrayAccess;
use \SeaTable\Client\ObjectSerializer;

/**
 * ApiToken Class Doc Comment
 *
 * @category Class
 * @description api-token return object
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ApiToken implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ApiToken';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'app_name' => 'string',
        'api_token' => 'string',
        'generated_by' => 'string',
        'generated_at' => '\DateTime',
        'last_access' => '\DateTime',
        'permission' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'app_name' => null,
        'api_token' => null,
        'generated_by' => 'email',
        'generated_at' => 'date-time',
        'last_access' => 'date-time',
        'permission' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'app_name' => false,
        'api_token' => false,
        'generated_by' => false,
        'generated_at' => false,
        'last_access' => false,
        'permission' => false
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
        'app_name' => 'app_name',
        'api_token' => 'api_token',
        'generated_by' => 'generated_by',
        'generated_at' => 'generated_at',
        'last_access' => 'last_access',
        'permission' => 'permission'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'app_name' => 'setAppName',
        'api_token' => 'setApiToken',
        'generated_by' => 'setGeneratedBy',
        'generated_at' => 'setGeneratedAt',
        'last_access' => 'setLastAccess',
        'permission' => 'setPermission'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'app_name' => 'getAppName',
        'api_token' => 'getApiToken',
        'generated_by' => 'getGeneratedBy',
        'generated_at' => 'getGeneratedAt',
        'last_access' => 'getLastAccess',
        'permission' => 'getPermission'
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

    public const PERMISSION_EMPTY = '';
    public const PERMISSION_RW = 'rw';
    public const PERMISSION_R = 'r';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPermissionAllowableValues()
    {
        return [
            self::PERMISSION_EMPTY,
            self::PERMISSION_RW,
            self::PERMISSION_R,
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
        $this->setIfExists('app_name', $data ?? [], null);
        $this->setIfExists('api_token', $data ?? [], null);
        $this->setIfExists('generated_by', $data ?? [], null);
        $this->setIfExists('generated_at', $data ?? [], null);
        $this->setIfExists('last_access', $data ?? [], null);
        $this->setIfExists('permission', $data ?? [], null);
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

        if (!is_null($this->container['api_token']) && (mb_strlen($this->container['api_token']) > 40)) {
            $invalidProperties[] = "invalid value for 'api_token', the character length must be smaller than or equal to 40.";
        }

        if (!is_null($this->container['api_token']) && (mb_strlen($this->container['api_token']) < 40)) {
            $invalidProperties[] = "invalid value for 'api_token', the character length must be bigger than or equal to 40.";
        }

        $allowedValues = $this->getPermissionAllowableValues();
        if (!is_null($this->container['permission']) && !in_array($this->container['permission'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'permission', must be one of '%s'",
                $this->container['permission'],
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
     * Gets app_name
     *
     * @return string|null
     */
    public function getAppName()
    {
        return $this->container['app_name'];
    }

    /**
     * Sets app_name
     *
     * @param string|null $app_name app_name
     *
     * @return self
     */
    public function setAppName($app_name)
    {
        if (is_null($app_name)) {
            throw new \InvalidArgumentException('non-nullable app_name cannot be null');
        }
        $this->container['app_name'] = $app_name;

        return $this;
    }

    /**
     * Gets api_token
     *
     * @return string|null
     */
    public function getApiToken()
    {
        return $this->container['api_token'];
    }

    /**
     * Sets api_token
     *
     * @param string|null $api_token api_token
     *
     * @return self
     */
    public function setApiToken($api_token)
    {
        if (is_null($api_token)) {
            throw new \InvalidArgumentException('non-nullable api_token cannot be null');
        }
        if ((mb_strlen($api_token) > 40)) {
            throw new \InvalidArgumentException('invalid length for $api_token when calling ApiToken., must be smaller than or equal to 40.');
        }
        if ((mb_strlen($api_token) < 40)) {
            throw new \InvalidArgumentException('invalid length for $api_token when calling ApiToken., must be bigger than or equal to 40.');
        }

        $this->container['api_token'] = $api_token;

        return $this;
    }

    /**
     * Gets generated_by
     *
     * @return string|null
     */
    public function getGeneratedBy()
    {
        return $this->container['generated_by'];
    }

    /**
     * Sets generated_by
     *
     * @param string|null $generated_by generated_by
     *
     * @return self
     */
    public function setGeneratedBy($generated_by)
    {
        if (is_null($generated_by)) {
            throw new \InvalidArgumentException('non-nullable generated_by cannot be null');
        }
        $this->container['generated_by'] = $generated_by;

        return $this;
    }

    /**
     * Gets generated_at
     *
     * @return \DateTime|null
     */
    public function getGeneratedAt()
    {
        return $this->container['generated_at'];
    }

    /**
     * Sets generated_at
     *
     * @param \DateTime|null $generated_at generated_at
     *
     * @return self
     */
    public function setGeneratedAt($generated_at)
    {
        if (is_null($generated_at)) {
            throw new \InvalidArgumentException('non-nullable generated_at cannot be null');
        }
        $this->container['generated_at'] = $generated_at;

        return $this;
    }

    /**
     * Gets last_access
     *
     * @return \DateTime|null
     */
    public function getLastAccess()
    {
        return $this->container['last_access'];
    }

    /**
     * Sets last_access
     *
     * @param \DateTime|null $last_access last_access
     *
     * @return self
     */
    public function setLastAccess($last_access)
    {
        if (is_null($last_access)) {
            throw new \InvalidArgumentException('non-nullable last_access cannot be null');
        }
        $this->container['last_access'] = $last_access;

        return $this;
    }

    /**
     * Gets permission
     *
     * @return string|null
     */
    public function getPermission()
    {
        return $this->container['permission'];
    }

    /**
     * Sets permission
     *
     * @param string|null $permission permission
     *
     * @return self
     */
    public function setPermission($permission)
    {
        if (is_null($permission)) {
            throw new \InvalidArgumentException('non-nullable permission cannot be null');
        }
        $allowedValues = $this->getPermissionAllowableValues();
        if (!in_array($permission, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'permission', must be one of '%s'",
                    $permission,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['permission'] = $permission;

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


