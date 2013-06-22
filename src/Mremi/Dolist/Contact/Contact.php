<?php

namespace Mremi\Dolist\Contact;

/**
 * Contact class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class Contact
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var array
     */
    private $fields = array();

    /**
     * @var array
     */
    private $interestsToAdd = array();

    /**
     * @var array
     */
    private $interestsToDelete = array();

    /**
     * @var integer
     */
    private $optoutEmail = 0;

    /**
     * @var integer
     */
    private $optoutMobile = 0;

    /**
     * Sets the email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Gets the email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Adds the given field to the fields collection
     *
     * @param Field $field
     */
    public function addField(Field $field)
    {
        $this->fields[$field->getName()] = $field;
    }

    /**
     * Removes the given field from the fields collection
     *
     * @param Field $field
     *
     * @return boolean
     */
    public function removeField(Field $field)
    {
        if ($this->hasField($field)) {
            unset($this->fields[$field->getName()]);

            return true;
        }

        return false;
    }

    /**
     * Returns TRUE whether the given field is contained in the fields collection
     *
     * @param Field $field
     *
     * @return boolean
     */
    public function hasField(Field $field)
    {
        return array_key_exists($field->getName(), $this->fields);
    }

    /**
     * Gets the fields
     *
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Sets the interests to add
     *
     * @param array $interestToAdd
     */
    public function setInterestsToAdd(array $interestsToAdd)
    {
        $this->interestsToAdd = $interestsToAdd;
    }

    /**
     * Gets the interests to add
     *
     * @return array
     */
    public function getInterestsToAdd()
    {
        return $this->interestsToAdd;
    }

    /**
     * Sets the interests to delete
     *
     * @param array $interestToDelete
     */
    public function setInterestsToDelete(array $interestsToDelete)
    {
        $this->interestsToDelete = $interestsToDelete;
    }

    /**
     * Gets the interests to delete
     *
     * @return array
     */
    public function getInterestsToDelete()
    {
        return $this->interestsToDelete;
    }

    /**
     * Sets the optout email
     *
     * @param integer $optoutEmail
     */
    public function setOptoutEmail($optoutEmail)
    {
        $this->optoutEmail = $optoutEmail;
    }

    /**
     * Gets the optout email
     *
     * @return integer
     */
    public function getOptoutEmail()
    {
        return $this->optoutEmail;
    }

    /**
     * Sets the optout mobile
     *
     * @param integer $optoutMobile
     */
    public function setOptoutMobile($optoutMobile)
    {
        $this->optoutMobile = $optoutMobile;
    }

    /**
     * Gets the optout mobile
     *
     * @return integer
     */
    public function getOptoutMobile()
    {
        return $this->optoutMobile;
    }

    /**
     * Gets an array representation
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'Email'             => $this->email,
            'Fields'            => array_map(function($field) { return $field->toArray(); }, array_values($this->fields)),
            'InterestsToAdd'    => $this->interestsToAdd,
            'InterestsToDelete' => $this->interestsToDelete,
            'OptoutEmail'       => $this->optoutEmail,
            'OptoutMobile'      => $this->optoutMobile,
        );
    }
}
