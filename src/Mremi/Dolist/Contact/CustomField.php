<?php

namespace Mremi\Dolist\Contact;

/**
 * Class CustomField
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class CustomField
{
    /**
     * Possible field types
     */
    const FIELD_TYPE_STRING          = 1;
    const FIELD_TYPE_INTEGER         = 2;
    const FIELD_TYPE_DATE            = 3;
    const FIELD_TYPE_TITLE           = 4;
    const FIELD_TYPE_MESSAGE_FORMAT  = 5;
    const FIELD_TYPE_INTERESTS       = 6;
    const FIELD_TYPE_MANAGING_ENTITY = 7;
    const FIELD_TYPE_COUNTRY         = 8;
    const FIELD_TYPE_HTML            = 9;
    const FIELD_TYPE_URL             = 10;

    /**
     * @var string
     */
    private $customName;

    /**
     * @var integer
     */
    private $fieldType;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * Sets the custom name of the field
     *
     * @param string $customName
     */
    public function setCustomName($customName)
    {
        $this->customName = $customName;
    }

    /**
     * Gets the custom name of the field
     *
     * @return string
     */
    public function getCustomName()
    {
        return $this->customName;
    }

    /**
     * Sets the field type
     *
     * @param integer $fieldType
     */
    public function setFieldType($fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Gets the field type
     *
     * @return integer
     */
    public function getFieldType()
    {
        return $this->fieldType;
    }

    /**
     * Sets the field name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Gets the field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the field value
     *
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Gets the field value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}