<?php

namespace Mremi\Dolist\Contact;

/**
 * Field manager interface
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
interface FieldManagerInterface
{
    /**
     * Creates a new field instance
     *
     * @param string $name  The field name
     * @param string $value The associated value
     *
     * @return FieldInterface
     */
    function create($name, $value);
}