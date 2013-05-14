<?php

namespace Mremi\Dolist\Api\Contact;

/**
 * Field class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class Field implements FieldInterface
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
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array(
            'Name'  => $this->name,
            'Value' => $this->value,
        );
    }
}