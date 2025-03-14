<?php
/**
 * AddTeamRequest
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
 * The version of the OpenAPI document: 5.2
 * Generated by: https://openapi-generator.tech
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace SeaTable\Client\SysAdmin;

use \ArrayAccess;
use \SeaTable\Client\ObjectSerializer;

/**
 * AddTeamRequest Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AddTeamRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'addTeam_request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'org_name' => 'string',
        'admin_email' => 'string',
        'password' => 'string',
        'admin_name' => 'string',
        'with_workspace' => 'bool'
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
        'admin_email' => null,
        'password' => null,
        'admin_name' => null,
        'with_workspace' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'org_name' => false,
        'admin_email' => false,
        'password' => false,
        'admin_name' => false,
        'with_workspace' => false
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
        'admin_email' => 'admin_email',
        'password' => 'password',
        'admin_name' => 'admin_name',
        'with_workspace' => 'with_workspace'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'org_name' => 'setOrgName',
        'admin_email' => 'setAdminEmail',
        'password' => 'setPassword',
        'admin_name' => 'setAdminName',
        'with_workspace' => 'setWithWorkspace'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'org_name' => 'getOrgName',
        'admin_email' => 'getAdminEmail',
        'password' => 'getPassword',
        'admin_name' => 'getAdminName',
        'with_workspace' => 'getWithWorkspace'
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
        $this->setIfExists('admin_email', $data ?? [], null);
        $this->setIfExists('password', $data ?? [], null);
        $this->setIfExists('admin_name', $data ?? [], null);
        $this->setIfExists('with_workspace', $data ?? [], null);
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

        if ($this->container['org_name'] === null) {
            $invalidProperties[] = "'org_name' can't be null";
        }
        if ($this->container['admin_email'] === null) {
            $invalidProperties[] = "'admin_email' can't be null";
        }
        if ($this->container['password'] === null) {
            $invalidProperties[] = "'password' can't be null";
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
     * Gets org_name
     *
     * @return string
     */
    public function getOrgName()
    {
        return $this->container['org_name'];
    }

    /**
     * Sets org_name
     *
     * @param string $org_name Name of the team.
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
     * Gets admin_email
     *
     * @return string
     */
    public function getAdminEmail()
    {
        return $this->container['admin_email'];
    }

    /**
     * Sets admin_email
     *
     * @param string $admin_email Login email of the team administrator. Required. Has to be unique in the system.
     *
     * @return self
     */
    public function setAdminEmail($admin_email)
    {
        if (is_null($admin_email)) {
            throw new \InvalidArgumentException('non-nullable admin_email cannot be null');
        }
        $this->container['admin_email'] = $admin_email;

        return $this;
    }

    /**
     * Gets password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->container['password'];
    }

    /**
     * Sets password
     *
     * @param string $password Login password of the user.
     *
     * @return self
     */
    public function setPassword($password)
    {
        if (is_null($password)) {
            throw new \InvalidArgumentException('non-nullable password cannot be null');
        }
        $this->container['password'] = $password;

        return $this;
    }

    /**
     * Gets admin_name
     *
     * @return string|null
     */
    public function getAdminName()
    {
        return $this->container['admin_name'];
    }

    /**
     * Sets admin_name
     *
     * @param string|null $admin_name Full name of the team administrator. Optional.
     *
     * @return self
     */
    public function setAdminName($admin_name)
    {
        if (is_null($admin_name)) {
            throw new \InvalidArgumentException('non-nullable admin_name cannot be null');
        }
        $this->container['admin_name'] = $admin_name;

        return $this;
    }

    /**
     * Gets with_workspace
     *
     * @return bool|null
     */
    public function getWithWorkspace()
    {
        return $this->container['with_workspace'];
    }

    /**
     * Sets with_workspace
     *
     * @param bool|null $with_workspace If a workspace should be automatically created for the user. Optional. `false` by default.
     *
     * @return self
     */
    public function setWithWorkspace($with_workspace)
    {
        if (is_null($with_workspace)) {
            throw new \InvalidArgumentException('non-nullable with_workspace cannot be null');
        }
        $this->container['with_workspace'] = $with_workspace;

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


