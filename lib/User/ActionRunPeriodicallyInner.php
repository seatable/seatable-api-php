<?php
/**
 * ActionRunPeriodicallyInner
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
 * ActionRunPeriodicallyInner Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ActionRunPeriodicallyInner implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'action_run_periodically_inner';

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
        'row' => 'array<string,string>',
        'link_id' => 'string',
        'linked_table_id' => 'string',
        'match_conditions' => '\SeaTable\Client\User\ActionLinkRecordMatchConditionsInner[]',
        'script_name' => 'string',
        'workspace_id' => 'int',
        'owner' => 'string',
        'org_id' => 'int',
        'repo_id' => 'string',
        'result_column' => 'string',
        'calculate_column' => 'string',
        'extract_column_key' => 'string',
        'result_column_key' => 'string',
        'table_condition' => '\SeaTable\Client\User\ActionLookupAndCopyTableCondition',
        'equal_column_conditions' => '\SeaTable\Client\User\ActionLookupAndCopyEqualColumnConditionsInner[]',
        'fill_column_conditions' => '\SeaTable\Client\User\ActionLookupAndCopyEqualColumnConditionsInner[]'
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
        'row' => null,
        'link_id' => null,
        'linked_table_id' => null,
        'match_conditions' => null,
        'script_name' => null,
        'workspace_id' => null,
        'owner' => null,
        'org_id' => null,
        'repo_id' => null,
        'result_column' => null,
        'calculate_column' => null,
        'extract_column_key' => null,
        'result_column_key' => null,
        'table_condition' => null,
        'equal_column_conditions' => null,
        'fill_column_conditions' => null
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
        'row' => false,
        'link_id' => false,
        'linked_table_id' => false,
        'match_conditions' => false,
        'script_name' => false,
        'workspace_id' => false,
        'owner' => false,
        'org_id' => false,
        'repo_id' => false,
        'result_column' => false,
        'calculate_column' => false,
        'extract_column_key' => false,
        'result_column_key' => false,
        'table_condition' => false,
        'equal_column_conditions' => false,
        'fill_column_conditions' => false
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
        'row' => 'row',
        'link_id' => 'link_id',
        'linked_table_id' => 'linked_table_id',
        'match_conditions' => 'match_conditions',
        'script_name' => 'script_name',
        'workspace_id' => 'workspace_id',
        'owner' => 'owner',
        'org_id' => 'org_id',
        'repo_id' => 'repo_id',
        'result_column' => 'result_column',
        'calculate_column' => 'calculate_column',
        'extract_column_key' => 'extract_column_key',
        'result_column_key' => 'result_column_key',
        'table_condition' => 'table_condition',
        'equal_column_conditions' => 'equal_column_conditions',
        'fill_column_conditions' => 'fill_column_conditions'
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
        'row' => 'setRow',
        'link_id' => 'setLinkId',
        'linked_table_id' => 'setLinkedTableId',
        'match_conditions' => 'setMatchConditions',
        'script_name' => 'setScriptName',
        'workspace_id' => 'setWorkspaceId',
        'owner' => 'setOwner',
        'org_id' => 'setOrgId',
        'repo_id' => 'setRepoId',
        'result_column' => 'setResultColumn',
        'calculate_column' => 'setCalculateColumn',
        'extract_column_key' => 'setExtractColumnKey',
        'result_column_key' => 'setResultColumnKey',
        'table_condition' => 'setTableCondition',
        'equal_column_conditions' => 'setEqualColumnConditions',
        'fill_column_conditions' => 'setFillColumnConditions'
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
        'row' => 'getRow',
        'link_id' => 'getLinkId',
        'linked_table_id' => 'getLinkedTableId',
        'match_conditions' => 'getMatchConditions',
        'script_name' => 'getScriptName',
        'workspace_id' => 'getWorkspaceId',
        'owner' => 'getOwner',
        'org_id' => 'getOrgId',
        'repo_id' => 'getRepoId',
        'result_column' => 'getResultColumn',
        'calculate_column' => 'getCalculateColumn',
        'extract_column_key' => 'getExtractColumnKey',
        'result_column_key' => 'getResultColumnKey',
        'table_condition' => 'getTableCondition',
        'equal_column_conditions' => 'getEqualColumnConditions',
        'fill_column_conditions' => 'getFillColumnConditions'
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
    public const TYPE_ADD_RECORD = 'add_record';
    public const TYPE_LINK_RECORDS = 'link_records';
    public const TYPE_RUN_PYTHON_SCRIPT = 'run_python_script';
    public const TYPE_CALCULATE_ACCUMULATED_VALUE = 'calculate_accumulated_value';
    public const TYPE_CALCULATE_DELTA = 'calculate_delta';
    public const TYPE_CALCULATE_PERCENTAGE = 'calculate_percentage';
    public const TYPE_CALCULATE_RANK = 'calculate_rank';
    public const TYPE_EXTRACT_USER_NAME = 'extract_user_name';
    public const TYPE_LOOKUP_AND_COPY = 'lookup_and_copy';

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
            self::TYPE_ADD_RECORD,
            self::TYPE_LINK_RECORDS,
            self::TYPE_RUN_PYTHON_SCRIPT,
            self::TYPE_CALCULATE_ACCUMULATED_VALUE,
            self::TYPE_CALCULATE_DELTA,
            self::TYPE_CALCULATE_PERCENTAGE,
            self::TYPE_CALCULATE_RANK,
            self::TYPE_EXTRACT_USER_NAME,
            self::TYPE_LOOKUP_AND_COPY,
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
        $this->setIfExists('row', $data ?? [], null);
        $this->setIfExists('link_id', $data ?? [], null);
        $this->setIfExists('linked_table_id', $data ?? [], null);
        $this->setIfExists('match_conditions', $data ?? [], null);
        $this->setIfExists('script_name', $data ?? [], null);
        $this->setIfExists('workspace_id', $data ?? [], null);
        $this->setIfExists('owner', $data ?? [], null);
        $this->setIfExists('org_id', $data ?? [], null);
        $this->setIfExists('repo_id', $data ?? [], null);
        $this->setIfExists('result_column', $data ?? [], null);
        $this->setIfExists('calculate_column', $data ?? [], null);
        $this->setIfExists('extract_column_key', $data ?? [], null);
        $this->setIfExists('result_column_key', $data ?? [], null);
        $this->setIfExists('table_condition', $data ?? [], null);
        $this->setIfExists('equal_column_conditions', $data ?? [], null);
        $this->setIfExists('fill_column_conditions', $data ?? [], null);
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
     * Gets row
     *
     * @return array<string,string>|null
     */
    public function getRow()
    {
        return $this->container['row'];
    }

    /**
     * Sets row
     *
     * @param array<string,string>|null $row Is an object including the column key and desired content of each field that you would like to add in the new record.
     *
     * @return self
     */
    public function setRow($row)
    {
        if (is_null($row)) {
            throw new \InvalidArgumentException('non-nullable row cannot be null');
        }
        $this->container['row'] = $row;

        return $this;
    }

    /**
     * Gets link_id
     *
     * @return string|null
     */
    public function getLinkId()
    {
        return $this->container['link_id'];
    }

    /**
     * Sets link_id
     *
     * @param string|null $link_id link_id
     *
     * @return self
     */
    public function setLinkId($link_id)
    {
        if (is_null($link_id)) {
            throw new \InvalidArgumentException('non-nullable link_id cannot be null');
        }
        $this->container['link_id'] = $link_id;

        return $this;
    }

    /**
     * Gets linked_table_id
     *
     * @return string|null
     */
    public function getLinkedTableId()
    {
        return $this->container['linked_table_id'];
    }

    /**
     * Sets linked_table_id
     *
     * @param string|null $linked_table_id linked_table_id
     *
     * @return self
     */
    public function setLinkedTableId($linked_table_id)
    {
        if (is_null($linked_table_id)) {
            throw new \InvalidArgumentException('non-nullable linked_table_id cannot be null');
        }
        $this->container['linked_table_id'] = $linked_table_id;

        return $this;
    }

    /**
     * Gets match_conditions
     *
     * @return \SeaTable\Client\User\ActionLinkRecordMatchConditionsInner[]|null
     */
    public function getMatchConditions()
    {
        return $this->container['match_conditions'];
    }

    /**
     * Sets match_conditions
     *
     * @param \SeaTable\Client\User\ActionLinkRecordMatchConditionsInner[]|null $match_conditions match_conditions
     *
     * @return self
     */
    public function setMatchConditions($match_conditions)
    {
        if (is_null($match_conditions)) {
            throw new \InvalidArgumentException('non-nullable match_conditions cannot be null');
        }
        $this->container['match_conditions'] = $match_conditions;

        return $this;
    }

    /**
     * Gets script_name
     *
     * @return string|null
     */
    public function getScriptName()
    {
        return $this->container['script_name'];
    }

    /**
     * Sets script_name
     *
     * @param string|null $script_name script_name
     *
     * @return self
     */
    public function setScriptName($script_name)
    {
        if (is_null($script_name)) {
            throw new \InvalidArgumentException('non-nullable script_name cannot be null');
        }
        $this->container['script_name'] = $script_name;

        return $this;
    }

    /**
     * Gets workspace_id
     *
     * @return int|null
     */
    public function getWorkspaceId()
    {
        return $this->container['workspace_id'];
    }

    /**
     * Sets workspace_id
     *
     * @param int|null $workspace_id workspace_id
     *
     * @return self
     */
    public function setWorkspaceId($workspace_id)
    {
        if (is_null($workspace_id)) {
            throw new \InvalidArgumentException('non-nullable workspace_id cannot be null');
        }
        $this->container['workspace_id'] = $workspace_id;

        return $this;
    }

    /**
     * Gets owner
     *
     * @return string|null
     */
    public function getOwner()
    {
        return $this->container['owner'];
    }

    /**
     * Sets owner
     *
     * @param string|null $owner owner
     *
     * @return self
     */
    public function setOwner($owner)
    {
        if (is_null($owner)) {
            throw new \InvalidArgumentException('non-nullable owner cannot be null');
        }
        $this->container['owner'] = $owner;

        return $this;
    }

    /**
     * Gets org_id
     *
     * @return int|null
     */
    public function getOrgId()
    {
        return $this->container['org_id'];
    }

    /**
     * Sets org_id
     *
     * @param int|null $org_id org_id
     *
     * @return self
     */
    public function setOrgId($org_id)
    {
        if (is_null($org_id)) {
            throw new \InvalidArgumentException('non-nullable org_id cannot be null');
        }
        $this->container['org_id'] = $org_id;

        return $this;
    }

    /**
     * Gets repo_id
     *
     * @return string|null
     */
    public function getRepoId()
    {
        return $this->container['repo_id'];
    }

    /**
     * Sets repo_id
     *
     * @param string|null $repo_id repo_id
     *
     * @return self
     */
    public function setRepoId($repo_id)
    {
        if (is_null($repo_id)) {
            throw new \InvalidArgumentException('non-nullable repo_id cannot be null');
        }
        $this->container['repo_id'] = $repo_id;

        return $this;
    }

    /**
     * Gets result_column
     *
     * @return string|null
     */
    public function getResultColumn()
    {
        return $this->container['result_column'];
    }

    /**
     * Sets result_column
     *
     * @param string|null $result_column result_column
     *
     * @return self
     */
    public function setResultColumn($result_column)
    {
        if (is_null($result_column)) {
            throw new \InvalidArgumentException('non-nullable result_column cannot be null');
        }
        $this->container['result_column'] = $result_column;

        return $this;
    }

    /**
     * Gets calculate_column
     *
     * @return string|null
     */
    public function getCalculateColumn()
    {
        return $this->container['calculate_column'];
    }

    /**
     * Sets calculate_column
     *
     * @param string|null $calculate_column calculate_column
     *
     * @return self
     */
    public function setCalculateColumn($calculate_column)
    {
        if (is_null($calculate_column)) {
            throw new \InvalidArgumentException('non-nullable calculate_column cannot be null');
        }
        $this->container['calculate_column'] = $calculate_column;

        return $this;
    }

    /**
     * Gets extract_column_key
     *
     * @return string|null
     */
    public function getExtractColumnKey()
    {
        return $this->container['extract_column_key'];
    }

    /**
     * Sets extract_column_key
     *
     * @param string|null $extract_column_key extract_column_key
     *
     * @return self
     */
    public function setExtractColumnKey($extract_column_key)
    {
        if (is_null($extract_column_key)) {
            throw new \InvalidArgumentException('non-nullable extract_column_key cannot be null');
        }
        $this->container['extract_column_key'] = $extract_column_key;

        return $this;
    }

    /**
     * Gets result_column_key
     *
     * @return string|null
     */
    public function getResultColumnKey()
    {
        return $this->container['result_column_key'];
    }

    /**
     * Sets result_column_key
     *
     * @param string|null $result_column_key result_column_key
     *
     * @return self
     */
    public function setResultColumnKey($result_column_key)
    {
        if (is_null($result_column_key)) {
            throw new \InvalidArgumentException('non-nullable result_column_key cannot be null');
        }
        $this->container['result_column_key'] = $result_column_key;

        return $this;
    }

    /**
     * Gets table_condition
     *
     * @return \SeaTable\Client\User\ActionLookupAndCopyTableCondition|null
     */
    public function getTableCondition()
    {
        return $this->container['table_condition'];
    }

    /**
     * Sets table_condition
     *
     * @param \SeaTable\Client\User\ActionLookupAndCopyTableCondition|null $table_condition table_condition
     *
     * @return self
     */
    public function setTableCondition($table_condition)
    {
        if (is_null($table_condition)) {
            throw new \InvalidArgumentException('non-nullable table_condition cannot be null');
        }
        $this->container['table_condition'] = $table_condition;

        return $this;
    }

    /**
     * Gets equal_column_conditions
     *
     * @return \SeaTable\Client\User\ActionLookupAndCopyEqualColumnConditionsInner[]|null
     */
    public function getEqualColumnConditions()
    {
        return $this->container['equal_column_conditions'];
    }

    /**
     * Sets equal_column_conditions
     *
     * @param \SeaTable\Client\User\ActionLookupAndCopyEqualColumnConditionsInner[]|null $equal_column_conditions equal_column_conditions
     *
     * @return self
     */
    public function setEqualColumnConditions($equal_column_conditions)
    {
        if (is_null($equal_column_conditions)) {
            throw new \InvalidArgumentException('non-nullable equal_column_conditions cannot be null');
        }
        $this->container['equal_column_conditions'] = $equal_column_conditions;

        return $this;
    }

    /**
     * Gets fill_column_conditions
     *
     * @return \SeaTable\Client\User\ActionLookupAndCopyEqualColumnConditionsInner[]|null
     */
    public function getFillColumnConditions()
    {
        return $this->container['fill_column_conditions'];
    }

    /**
     * Sets fill_column_conditions
     *
     * @param \SeaTable\Client\User\ActionLookupAndCopyEqualColumnConditionsInner[]|null $fill_column_conditions fill_column_conditions
     *
     * @return self
     */
    public function setFillColumnConditions($fill_column_conditions)
    {
        if (is_null($fill_column_conditions)) {
            throw new \InvalidArgumentException('non-nullable fill_column_conditions cannot be null');
        }
        $this->container['fill_column_conditions'] = $fill_column_conditions;

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

