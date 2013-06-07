<?php

namespace Mremi\Dolist\Contact;

/**
 * Field manager class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class FieldManager
{
    /**
     * @var string
     */
    private $class;

    /**
     * Constructor
     *
     * @param string $class The namespace of field class
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * Creates a new field instance
     *
     * @param string $name  The field name
     * @param string $value The associated value
     *
     * @return Field
     */
    public function create($name, $value)
    {
        return new $this->class($name, $value);
    }
}