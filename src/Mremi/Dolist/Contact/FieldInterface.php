<?php

namespace Mremi\Dolist\Contact;

/**
 * Field interface
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
interface FieldInterface
{
    /**
     * Sets the field name
     *
     * @param string $name
     */
    function setName($name);

    /**
     * Gets the field name
     *
     * @return string
     */
    function getName();

    /**
     * Sets the field value
     *
     * @param string $value
     */
    function setValue($value);

    /**
     * Gets the field value
     *
     * @return string
     */
    function getValue();

    /**
     * Gets an array representation
     *
     * @return array
     */
    function toArray();
}