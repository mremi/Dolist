<?php

namespace Mremi\Dolist\Contact;

/**
 * Contact class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class Contact implements ContactInterface
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
     * {@inheritdoc}
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function addField(FieldInterface $field)
    {
        $this->fields[$field->getName()] = $field;
    }

    /**
     * {@inheritdoc}
     */
    public function removeField(FieldInterface $field)
    {
        if ($this->hasField($field)) {
            unset($this->fields[$field->getName()]);

            return true;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function hasField(FieldInterface $field)
    {
        return array_key_exists($field->getName(), $this->fields);
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * {@inheritdoc}
     */
    public function setInterestsToAdd(array $interestsToAdd)
    {
        $this->interestsToAdd = $interestsToAdd;
    }

    /**
     * {@inheritdoc}
     */
    public function getInterestsToAdd()
    {
        return $this->interestsToAdd;
    }

    /**
     * {@inheritdoc}
     */
    public function setInterestsToDelete(array $interestsToDelete)
    {
        $this->interestsToDelete = $interestsToDelete;
    }

    /**
     * {@inheritdoc}
     */
    public function getInterestsToDelete()
    {
        return $this->interestsToDelete;
    }

    /**
     * {@inheritdoc}
     */
    public function setOptoutEmail($optoutEmail)
    {
        $this->optoutEmail = $optoutEmail;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptoutEmail()
    {
        return $this->optoutEmail;
    }

    /**
     * {@inheritdoc}
     */
    public function setOptoutMobile($optoutMobile)
    {
        $this->optoutMobile = $optoutMobile;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptoutMobile()
    {
        return $this->optoutMobile;
    }

    /**
     * {@inheritdoc}
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