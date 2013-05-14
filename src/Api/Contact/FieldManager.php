<?php

namespace Mremi\Dolist\Api\Contact;

/**
 * Field manager class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class FieldManager implements FieldManagerInterface
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
     * {@inheritDoc}
     */
    public function create($name, $value)
    {
        return new $this->class($name, $value);
    }
}