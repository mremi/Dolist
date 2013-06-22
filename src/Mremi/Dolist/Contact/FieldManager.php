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
     * Creates a new field instance
     *
     * @param string $name  The field name
     * @param string $value The associated value
     *
     * @return Field
     */
    public function create($name, $value)
    {
        return new Field($name, $value);
    }
}
