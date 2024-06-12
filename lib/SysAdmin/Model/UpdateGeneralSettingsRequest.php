<?php
/**
 * UpdateGeneralSettingsRequest
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
 * UpdateGeneralSettingsRequest Class Doc Comment
 *
 * @category Class
 * @package  SeaTable\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class UpdateGeneralSettingsRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'updateGeneralSettings_request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'site_title' => 'string',
        'site_name' => 'string',
        'enable_branding_css' => 'int',
        'custom_css' => 'string',
        'activate_after_registration' => 'int',
        'registration_send_mail' => 'int',
        'login_remember_days' => 'int',
        'login_attempt_limit' => 'int',
        'freeze_user_on_login_failed' => 'int',
        'user_strong_password_required' => 'int',
        'force_password_change' => 'int',
        'user_password_min_length' => 'int',
        'user_password_strength_level' => 'int',
        'enable_two_factor_auth' => 'int',
        'enable_signup' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'site_title' => null,
        'site_name' => null,
        'enable_branding_css' => null,
        'custom_css' => null,
        'activate_after_registration' => null,
        'registration_send_mail' => null,
        'login_remember_days' => null,
        'login_attempt_limit' => null,
        'freeze_user_on_login_failed' => null,
        'user_strong_password_required' => null,
        'force_password_change' => null,
        'user_password_min_length' => null,
        'user_password_strength_level' => null,
        'enable_two_factor_auth' => null,
        'enable_signup' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'site_title' => false,
        'site_name' => false,
        'enable_branding_css' => false,
        'custom_css' => false,
        'activate_after_registration' => false,
        'registration_send_mail' => false,
        'login_remember_days' => false,
        'login_attempt_limit' => false,
        'freeze_user_on_login_failed' => false,
        'user_strong_password_required' => false,
        'force_password_change' => false,
        'user_password_min_length' => false,
        'user_password_strength_level' => false,
        'enable_two_factor_auth' => false,
        'enable_signup' => false
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
        'site_title' => 'SITE_TITLE',
        'site_name' => 'SITE_NAME',
        'enable_branding_css' => 'ENABLE_BRANDING_CSS',
        'custom_css' => 'CUSTOM_CSS',
        'activate_after_registration' => 'ACTIVATE_AFTER_REGISTRATION',
        'registration_send_mail' => 'REGISTRATION_SEND_MAIL',
        'login_remember_days' => 'LOGIN_REMEMBER_DAYS',
        'login_attempt_limit' => 'LOGIN_ATTEMPT_LIMIT',
        'freeze_user_on_login_failed' => 'FREEZE_USER_ON_LOGIN_FAILED',
        'user_strong_password_required' => 'USER_STRONG_PASSWORD_REQUIRED',
        'force_password_change' => 'FORCE_PASSWORD_CHANGE',
        'user_password_min_length' => 'USER_PASSWORD_MIN_LENGTH',
        'user_password_strength_level' => 'USER_PASSWORD_STRENGTH_LEVEL',
        'enable_two_factor_auth' => 'ENABLE_TWO_FACTOR_AUTH',
        'enable_signup' => 'ENABLE_SIGNUP'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'site_title' => 'setSiteTitle',
        'site_name' => 'setSiteName',
        'enable_branding_css' => 'setEnableBrandingCss',
        'custom_css' => 'setCustomCss',
        'activate_after_registration' => 'setActivateAfterRegistration',
        'registration_send_mail' => 'setRegistrationSendMail',
        'login_remember_days' => 'setLoginRememberDays',
        'login_attempt_limit' => 'setLoginAttemptLimit',
        'freeze_user_on_login_failed' => 'setFreezeUserOnLoginFailed',
        'user_strong_password_required' => 'setUserStrongPasswordRequired',
        'force_password_change' => 'setForcePasswordChange',
        'user_password_min_length' => 'setUserPasswordMinLength',
        'user_password_strength_level' => 'setUserPasswordStrengthLevel',
        'enable_two_factor_auth' => 'setEnableTwoFactorAuth',
        'enable_signup' => 'setEnableSignup'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'site_title' => 'getSiteTitle',
        'site_name' => 'getSiteName',
        'enable_branding_css' => 'getEnableBrandingCss',
        'custom_css' => 'getCustomCss',
        'activate_after_registration' => 'getActivateAfterRegistration',
        'registration_send_mail' => 'getRegistrationSendMail',
        'login_remember_days' => 'getLoginRememberDays',
        'login_attempt_limit' => 'getLoginAttemptLimit',
        'freeze_user_on_login_failed' => 'getFreezeUserOnLoginFailed',
        'user_strong_password_required' => 'getUserStrongPasswordRequired',
        'force_password_change' => 'getForcePasswordChange',
        'user_password_min_length' => 'getUserPasswordMinLength',
        'user_password_strength_level' => 'getUserPasswordStrengthLevel',
        'enable_two_factor_auth' => 'getEnableTwoFactorAuth',
        'enable_signup' => 'getEnableSignup'
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
        $this->setIfExists('site_title', $data ?? [], null);
        $this->setIfExists('site_name', $data ?? [], null);
        $this->setIfExists('enable_branding_css', $data ?? [], null);
        $this->setIfExists('custom_css', $data ?? [], null);
        $this->setIfExists('activate_after_registration', $data ?? [], null);
        $this->setIfExists('registration_send_mail', $data ?? [], null);
        $this->setIfExists('login_remember_days', $data ?? [], null);
        $this->setIfExists('login_attempt_limit', $data ?? [], null);
        $this->setIfExists('freeze_user_on_login_failed', $data ?? [], null);
        $this->setIfExists('user_strong_password_required', $data ?? [], null);
        $this->setIfExists('force_password_change', $data ?? [], null);
        $this->setIfExists('user_password_min_length', $data ?? [], null);
        $this->setIfExists('user_password_strength_level', $data ?? [], null);
        $this->setIfExists('enable_two_factor_auth', $data ?? [], null);
        $this->setIfExists('enable_signup', $data ?? [], null);
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
     * Gets site_title
     *
     * @return string|null
     */
    public function getSiteTitle()
    {
        return $this->container['site_title'];
    }

    /**
     * Sets site_title
     *
     * @param string|null $site_title The title of your SeaTable web interface, like appeared on the browser tab. Optional. Default value is `SeaTable Private`.
     *
     * @return self
     */
    public function setSiteTitle($site_title)
    {
        if (is_null($site_title)) {
            throw new \InvalidArgumentException('non-nullable site_title cannot be null');
        }
        $this->container['site_title'] = $site_title;

        return $this;
    }

    /**
     * Gets site_name
     *
     * @return string|null
     */
    public function getSiteName()
    {
        return $this->container['site_name'];
    }

    /**
     * Sets site_name
     *
     * @param string|null $site_name The name of your site, like appeared in the notification emails. Optional. Default value is `SeaTable`.
     *
     * @return self
     */
    public function setSiteName($site_name)
    {
        if (is_null($site_name)) {
            throw new \InvalidArgumentException('non-nullable site_name cannot be null');
        }
        $this->container['site_name'] = $site_name;

        return $this;
    }

    /**
     * Gets enable_branding_css
     *
     * @return int|null
     */
    public function getEnableBrandingCss()
    {
        return $this->container['enable_branding_css'];
    }

    /**
     * Sets enable_branding_css
     *
     * @param int|null $enable_branding_css If a custom CSS should be used. Optional, `0` by default. If set to `1`, paste your CSS into the param `CUSTOM_CSS`.
     *
     * @return self
     */
    public function setEnableBrandingCss($enable_branding_css)
    {
        if (is_null($enable_branding_css)) {
            throw new \InvalidArgumentException('non-nullable enable_branding_css cannot be null');
        }
        $this->container['enable_branding_css'] = $enable_branding_css;

        return $this;
    }

    /**
     * Gets custom_css
     *
     * @return string|null
     */
    public function getCustomCss()
    {
        return $this->container['custom_css'];
    }

    /**
     * Sets custom_css
     *
     * @param string|null $custom_css The content of your custom CSS. Optional. Empty by default.
     *
     * @return self
     */
    public function setCustomCss($custom_css)
    {
        if (is_null($custom_css)) {
            throw new \InvalidArgumentException('non-nullable custom_css cannot be null');
        }
        $this->container['custom_css'] = $custom_css;

        return $this;
    }

    /**
     * Gets activate_after_registration
     *
     * @return int|null
     */
    public function getActivateAfterRegistration()
    {
        return $this->container['activate_after_registration'];
    }

    /**
     * Sets activate_after_registration
     *
     * @param int|null $activate_after_registration If users should be automatically activated after the registration. Optional, `1` by default. If `0`, then the user need to be activated by the administrator or via the activation email.
     *
     * @return self
     */
    public function setActivateAfterRegistration($activate_after_registration)
    {
        if (is_null($activate_after_registration)) {
            throw new \InvalidArgumentException('non-nullable activate_after_registration cannot be null');
        }
        $this->container['activate_after_registration'] = $activate_after_registration;

        return $this;
    }

    /**
     * Gets registration_send_mail
     *
     * @return int|null
     */
    public function getRegistrationSendMail()
    {
        return $this->container['registration_send_mail'];
    }

    /**
     * Sets registration_send_mail
     *
     * @param int|null $registration_send_mail If an activation email should be sent after the user has registered. Optional, `0` by default.
     *
     * @return self
     */
    public function setRegistrationSendMail($registration_send_mail)
    {
        if (is_null($registration_send_mail)) {
            throw new \InvalidArgumentException('non-nullable registration_send_mail cannot be null');
        }
        $this->container['registration_send_mail'] = $registration_send_mail;

        return $this;
    }

    /**
     * Gets login_remember_days
     *
     * @return int|null
     */
    public function getLoginRememberDays()
    {
        return $this->container['login_remember_days'];
    }

    /**
     * Sets login_remember_days
     *
     * @param int|null $login_remember_days How many default days a user could be kept signed in. Optional, `7` by default.
     *
     * @return self
     */
    public function setLoginRememberDays($login_remember_days)
    {
        if (is_null($login_remember_days)) {
            throw new \InvalidArgumentException('non-nullable login_remember_days cannot be null');
        }
        $this->container['login_remember_days'] = $login_remember_days;

        return $this;
    }

    /**
     * Gets login_attempt_limit
     *
     * @return int|null
     */
    public function getLoginAttemptLimit()
    {
        return $this->container['login_attempt_limit'];
    }

    /**
     * Sets login_attempt_limit
     *
     * @param int|null $login_attempt_limit The maximum number of failed login attempts before showing CAPTCHA. Optional, `5` by default.
     *
     * @return self
     */
    public function setLoginAttemptLimit($login_attempt_limit)
    {
        if (is_null($login_attempt_limit)) {
            throw new \InvalidArgumentException('non-nullable login_attempt_limit cannot be null');
        }
        $this->container['login_attempt_limit'] = $login_attempt_limit;

        return $this;
    }

    /**
     * Gets freeze_user_on_login_failed
     *
     * @return int|null
     */
    public function getFreezeUserOnLoginFailed()
    {
        return $this->container['freeze_user_on_login_failed'];
    }

    /**
     * Sets freeze_user_on_login_failed
     *
     * @param int|null $freeze_user_on_login_failed If the user's account should be frozen when they exceed the login attempts limit. Optional, `0` by default.
     *
     * @return self
     */
    public function setFreezeUserOnLoginFailed($freeze_user_on_login_failed)
    {
        if (is_null($freeze_user_on_login_failed)) {
            throw new \InvalidArgumentException('non-nullable freeze_user_on_login_failed cannot be null');
        }
        $this->container['freeze_user_on_login_failed'] = $freeze_user_on_login_failed;

        return $this;
    }

    /**
     * Gets user_strong_password_required
     *
     * @return int|null
     */
    public function getUserStrongPasswordRequired()
    {
        return $this->container['user_strong_password_required'];
    }

    /**
     * Sets user_strong_password_required
     *
     * @param int|null $user_strong_password_required Force the users to use a strong password when signing up or changing password. Optional, `0` by default.
     *
     * @return self
     */
    public function setUserStrongPasswordRequired($user_strong_password_required)
    {
        if (is_null($user_strong_password_required)) {
            throw new \InvalidArgumentException('non-nullable user_strong_password_required cannot be null');
        }
        $this->container['user_strong_password_required'] = $user_strong_password_required;

        return $this;
    }

    /**
     * Gets force_password_change
     *
     * @return int|null
     */
    public function getForcePasswordChange()
    {
        return $this->container['force_password_change'];
    }

    /**
     * Sets force_password_change
     *
     * @param int|null $force_password_change Force newly added users to change their password, or when the admin resets their password. Optional, `1` by default.
     *
     * @return self
     */
    public function setForcePasswordChange($force_password_change)
    {
        if (is_null($force_password_change)) {
            throw new \InvalidArgumentException('non-nullable force_password_change cannot be null');
        }
        $this->container['force_password_change'] = $force_password_change;

        return $this;
    }

    /**
     * Gets user_password_min_length
     *
     * @return int|null
     */
    public function getUserPasswordMinLength()
    {
        return $this->container['user_password_min_length'];
    }

    /**
     * Sets user_password_min_length
     *
     * @param int|null $user_password_min_length The minimum length of user passwords. Optional, `6` by default.
     *
     * @return self
     */
    public function setUserPasswordMinLength($user_password_min_length)
    {
        if (is_null($user_password_min_length)) {
            throw new \InvalidArgumentException('non-nullable user_password_min_length cannot be null');
        }
        $this->container['user_password_min_length'] = $user_password_min_length;

        return $this;
    }

    /**
     * Gets user_password_strength_level
     *
     * @return int|null
     */
    public function getUserPasswordStrengthLevel()
    {
        return $this->container['user_password_strength_level'];
    }

    /**
     * Sets user_password_strength_level
     *
     * @param int|null $user_password_strength_level The level (`1`-`4`) of a password's strength. For example, `3` means password must have at least 3 of the following: a number, an upper letter, a lower letter and a special symbol. Optional, `3` by default.
     *
     * @return self
     */
    public function setUserPasswordStrengthLevel($user_password_strength_level)
    {
        if (is_null($user_password_strength_level)) {
            throw new \InvalidArgumentException('non-nullable user_password_strength_level cannot be null');
        }
        $this->container['user_password_strength_level'] = $user_password_strength_level;

        return $this;
    }

    /**
     * Gets enable_two_factor_auth
     *
     * @return int|null
     */
    public function getEnableTwoFactorAuth()
    {
        return $this->container['enable_two_factor_auth'];
    }

    /**
     * Sets enable_two_factor_auth
     *
     * @param int|null $enable_two_factor_auth If two factor authentication should be activated for the system. Optional, `0` by default.
     *
     * @return self
     */
    public function setEnableTwoFactorAuth($enable_two_factor_auth)
    {
        if (is_null($enable_two_factor_auth)) {
            throw new \InvalidArgumentException('non-nullable enable_two_factor_auth cannot be null');
        }
        $this->container['enable_two_factor_auth'] = $enable_two_factor_auth;

        return $this;
    }

    /**
     * Gets enable_signup
     *
     * @return int|null
     */
    public function getEnableSignup()
    {
        return $this->container['enable_signup'];
    }

    /**
     * Sets enable_signup
     *
     * @param int|null $enable_signup If registration on the web interface is allowed. Optional, `0` by default.
     *
     * @return self
     */
    public function setEnableSignup($enable_signup)
    {
        if (is_null($enable_signup)) {
            throw new \InvalidArgumentException('non-nullable enable_signup cannot be null');
        }
        $this->container['enable_signup'] = $enable_signup;

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


