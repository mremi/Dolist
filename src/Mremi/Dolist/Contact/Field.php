<?php

namespace Mremi\Dolist\Contact;

/**
 * Field class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class Field
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * Constructor
     *
     * @param string $name  The field name
     * @param string $value The associated value
     */
    public function __construct($name, $value)
    {
        $this->name  = $name;
        $this->value = $value;
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

    /**
     * Gets an array representation
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'Name'  => $this->name,
            'Value' => $this->value,
        );
    }
}
