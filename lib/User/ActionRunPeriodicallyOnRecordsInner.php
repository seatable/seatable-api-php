<?php
/**
 * ActionRunPeriodicallyOnRecordsInner
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
 * ActionRunPeriodicallyOnRecordsInner Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ActionRunPeriodicallyOnRecordsInner implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'action_run_periodically_on_records_inner';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'type' => 'string',
        'users' => 'string[]',
        'default_msg' => 'string',
        '_id' => 'string',
        'users_column_key' => 'string',
        'account_id' => 'int',
        'subject' => 'string',
        'send_to' => 'string',
        'copy_to' => 'string',
        'is_locked' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'type' => null,
        'users' => null,
        'default_msg' => null,
        '_id' => null,
        'users_column_key' => null,
        'account_id' => null,
        'subject' => null,
        'send_to' => null,
        'copy_to' => null,
        'is_locked' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'type' => false,
        'users' => false,
        'default_msg' => false,
        '_id' => false,
        'users_column_key' => false,
        'account_id' => false,
        'subject' => false,
        'send_to' => false,
        'copy_to' => false,
        'is_locked' => false
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
        'type' => 'type',
        'users' => 'users',
        'default_msg' => 'default_msg',
        '_id' => '_id',
        'users_column_key' => 'users_column_key',
        'account_id' => 'account_id',
        'subject' => 'subject',
        'send_to' => 'send_to',
        'copy_to' => 'copy_to',
        'is_locked' => 'is_locked'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'type' => 'setType',
        'users' => 'setUsers',
        'default_msg' => 'setDefaultMsg',
        '_id' => 'setId',
        'users_column_key' => 'setUsersColumnKey',
        'account_id' => 'setAccountId',
        'subject' => 'setSubject',
        'send_to' => 'setSendTo',
        'copy_to' => 'setCopyTo',
        'is_locked' => 'setIsLocked'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'type' => 'getType',
        'users' => 'getUsers',
        'default_msg' => 'getDefaultMsg',
        '_id' => 'getId',
        'users_column_key' => 'getUsersColumnKey',
        'account_id' => 'getAccountId',
        'subject' => 'getSubject',
        'send_to' => 'getSendTo',
        'copy_to' => 'getCopyTo',
        'is_locked' => 'getIsLocked'
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

    public const TYPE_NOTIFY = 'notify';
    public const TYPE_SEND_EMAIL = 'send_email';
    public const TYPE_LOCK_RECORD = 'lock_record';
    public const IS_LOCKED_TRUE = 'true';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_NOTIFY,
            self::TYPE_SEND_EMAIL,
            self::TYPE_LOCK_RECORD,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getIsLockedAllowableValues()
    {
        return [
            self::IS_LOCKED_TRUE,
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
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('users', $data ?? [], null);
        $this->setIfExists('default_msg', $data ?? [], null);
        $this->setIfExists('_id', $data ?? [], null);
        $this->setIfExists('users_column_key', $data ?? [], null);
        $this->setIfExists('account_id', $data ?? [], null);
        $this->setIfExists('subject', $data ?? [], null);
        $this->setIfExists('send_to', $data ?? [], null);
        $this->setIfExists('copy_to', $data ?? [], null);
        $this->setIfExists('is_locked', $data ?? [], null);
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

        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getIsLockedAllowableValues();
        if (!is_null($this->container['is_locked']) && !in_array($this->container['is_locked'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'is_locked', must be one of '%s'",
                $this->container['is_locked'],
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
     * Gets type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string|null $type type
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'type', must be one of '%s'",
                    $type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets users
     *
     * @return string[]|null
     */
    public function getUsers()
    {
        return $this->container['users'];
    }

    /**
     * Sets users
     *
     * @param string[]|null $users users
     *
     * @return self
     */
    public function setUsers($users)
    {
        if (is_null($users)) {
            throw new \InvalidArgumentException('non-nullable users cannot be null');
        }
        $this->container['users'] = $users;

        return $this;
    }

    /**
     * Gets default_msg
     *
     * @return string|null
     */
    public function getDefaultMsg()
    {
        return $this->container['default_msg'];
    }

    /**
     * Sets default_msg
     *
     * @param string|null $default_msg Is the content of the message.
     *
     * @return self
     */
    public function setDefaultMsg($default_msg)
    {
        if (is_null($default_msg)) {
            throw new \InvalidArgumentException('non-nullable default_msg cannot be null');
        }
        $this->container['default_msg'] = $default_msg;

        return $this;
    }

    /**
     * Gets _id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['_id'];
    }

    /**
     * Sets _id
     *
     * @param string|null $_id It's an ID of the action.  If you have multiple actions in one rule, they should carry different IDs.  You can decide which ID an action should carry.
     *
     * @return self
     */
    public function setId($_id)
    {
        if (is_null($_id)) {
            throw new \InvalidArgumentException('non-nullable _id cannot be null');
        }
        $this->container['_id'] = $_id;

        return $this;
    }

    /**
     * Gets users_column_key
     *
     * @return string|null
     */
    public function getUsersColumnKey()
    {
        return $this->container['users_column_key'];
    }

    /**
     * Sets users_column_key
     *
     * @param string|null $users_column_key Is a list of keys of columns that are the types of collaborator, creator or modifier.
     *
     * @return self
     */
    public function setUsersColumnKey($users_column_key)
    {
        if (is_null($users_column_key)) {
            throw new \InvalidArgumentException('non-nullable users_column_key cannot be null');
        }
        $this->container['users_column_key'] = $users_column_key;

        return $this;
    }

    /**
     * Gets account_id
     *
     * @return int|null
     */
    public function getAccountId()
    {
        return $this->container['account_id'];
    }

    /**
     * Sets account_id
     *
     * @param int|null $account_id Is the ID of the third party account you added in this base.
     *
     * @return self
     */
    public function setAccountId($account_id)
    {
        if (is_null($account_id)) {
            throw new \InvalidArgumentException('non-nullable account_id cannot be null');
        }
        $this->container['account_id'] = $account_id;

        return $this;
    }

    /**
     * Gets subject
     *
     * @return string|null
     */
    public function getSubject()
    {
        return $this->container['subject'];
    }

    /**
     * Sets subject
     *
     * @param string|null $subject subject
     *
     * @return self
     */
    public function setSubject($subject)
    {
        if (is_null($subject)) {
            throw new \InvalidArgumentException('non-nullable subject cannot be null');
        }
        $this->container['subject'] = $subject;

        return $this;
    }

    /**
     * Gets send_to
     *
     * @return string|null
     */
    public function getSendTo()
    {
        return $this->container['send_to'];
    }

    /**
     * Sets send_to
     *
     * @param string|null $send_to is the receiver's email address. For multiple addresses see above.
     *
     * @return self
     */
    public function setSendTo($send_to)
    {
        if (is_null($send_to)) {
            throw new \InvalidArgumentException('non-nullable send_to cannot be null');
        }
        $this->container['send_to'] = $send_to;

        return $this;
    }

    /**
     * Gets copy_to
     *
     * @return string|null
     */
    public function getCopyTo()
    {
        return $this->container['copy_to'];
    }

    /**
     * Sets copy_to
     *
     * @param string|null $copy_to is the CC receiver's email address. For multiple addresses see above.
     *
     * @return self
     */
    public function setCopyTo($copy_to)
    {
        if (is_null($copy_to)) {
            throw new \InvalidArgumentException('non-nullable copy_to cannot be null');
        }
        $this->container['copy_to'] = $copy_to;

        return $this;
    }

    /**
     * Gets is_locked
     *
     * @return string|null
     */
    public function getIsLocked()
    {
        return $this->container['is_locked'];
    }

    /**
     * Sets is_locked
     *
     * @param string|null $is_locked is_locked
     *
     * @return self
     */
    public function setIsLocked($is_locked)
    {
        if (is_null($is_locked)) {
            throw new \InvalidArgumentException('non-nullable is_locked cannot be null');
        }
        $allowedValues = $this->getIsLockedAllowableValues();
        if (!in_array($is_locked, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'is_locked', must be one of '%s'",
                    $is_locked,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['is_locked'] = $is_locked;

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

