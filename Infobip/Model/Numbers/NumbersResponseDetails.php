<?php
/**
 * SmsResponseDetails
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 */

/**
 * Infobip Client API Libraries OpenAPI Specification
 *
 * OpenAPI specification containing public endpoints supported in client API libraries.
 *
 * Contact: support@infobip.com
 *
 */

namespace Infobip\Model\Numbers;

use \ArrayAccess;
use \Infobip\ObjectSerializer;

/**
 * SmsResponseDetails Class Doc Comment
 *
 * @category Class
 * @package  Infobip
 * @author   Sii
 * @link     https://www.infobip.com
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class SmsResponseDetails implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'NumbersResponseDetails';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'numberKey' => 'string',
        'number' => 'string',
        'country' => 'string',
        'type' => 'string',
        'capabilities' => 'array',
        'shared' => 'bool',
        'price' => 'Infobip\Model\Numbers\NumberPrice'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'numberKey' => null,
        'number' => null,
        'country' => null,
        'type' => null,
        'capabilities' => null,
        'shared' => null,
        'price' => null,
    ];

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
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'numberKey' => 'numberKey',
        'number' => 'number',
        'country' => 'country',
        'type' => 'type',
        'capabilities' => 'capabilities',
        'shared' => 'shared',
        'price' => 'price'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'numberKey' => 'setNumberKey',
        'number' => 'setNumber',
        'country' => 'setCountry',
        'type' => 'setType',
        'capabilities' => 'setCapabilities',
        'shared' => 'setShared',
        'price' => 'setPrice'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'numberKey' => 'getNumberKey',
        'number' => 'getNumber',
        'country' => 'getCountry',
        'type' => 'getType',
        'capabilities' => 'getCapabilities',
        'shared' => 'getShared',
        'price' => 'getPrice'
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
        $this->container['numberKey'] = $data['numberKey'] ?? null;
        $this->container['number'] = $data['number'] ?? null;
        $this->container['country'] = $data['country'] ?? null;
        $this->container['type'] = $data['type'] ?? null;
        $this->container['capabilities'] = $data['capabilities'] ?? null;
        $this->container['shared'] = $data['shared'] ?? null;
        $this->container['price'] = $data['price'] ?? null;

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
     * Gets numberKey
     *
     * @return string|null
     */
    public function getNumberKey()
    {
        return $this->container['numberKey'];
    }

    /**
     * Sets messageId
     *
     * @param string|null $messageId The ID that uniquely identifies the message sent.
     *
     * @return self
     */
    public function setNumberKey($numberKey)
    {
        $this->container['numberKey'] = $numberKey;

        return $this;
    }

    /**
     * Gets number
     *
     * @return string|null
     */
    public function getNumer()
    {
        return $this->container['number'];
    }

    /**
     * Sets number
     *
     * @return self
     */
    public function setNumber($number)
    {
        $this->container['status'] = $number;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets to
     *
     * @param string|null $country Coutry of number
     *
     * @return self
     */
    public function setCountry($country)
    {
        $this->container['country'] = $country;

        return $this;
    }


    /**
     * Gets country
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets to
     *
     * @param string|null $type  number type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->container['country'] = $type;

        return $this;
    }




    /**
     * Gets country
     *
     * @return |null
     */
    public function getCapabilities()
    {
        return $this->container['capabilities'];
    }

    /**
     * Sets to
     *
     * @param string|null $country Coutry of number
     *
     * @return self
     */
    public function setCcapabilities($capabilities)
    {
        $this->container['country'] = $capabilities;

        return $this;
    }




    /**
     * Gets info is number shared
     *
     * @return bool
     */
    public function getShared()
    {
        return $this->container['shared'];
    }

    /**
     * Sets shared
     *
     * @param bool
     *
     * @return self
     */
    public function setShared($shared)
    {
        $this->container['country'] = $shared;

        return $this;
    }


    /**
     * Gets price
     *
     * @return string|null
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param string|null $country Coutry of number
     *
     * @return self
     */
    public function setPrice($price)
    {
        $this->container['country'] = $price;

        return $this;
    }


    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
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
    public function offsetSet($offset, $value)
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
    public function offsetUnset($offset)
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
