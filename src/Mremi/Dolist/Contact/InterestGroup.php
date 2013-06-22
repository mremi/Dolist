<?php

namespace Mremi\Dolist\Contact;

/**
 * InterestGroup class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class InterestGroup
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * Constructor
     *
     * @param integer $id   The group identifier
     * @param string  $name The group name
     */
    public function __construct($id, $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    /**
     * Sets the group identifier
     *
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Gets the group identifier
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the group name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Gets the group name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
