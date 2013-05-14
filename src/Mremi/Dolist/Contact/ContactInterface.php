<?php

namespace Mremi\Dolist\Contact;

interface ContactInterface
{
    /**
     * Sets the email
     *
     * @param string $email
     */
    function setEmail($email);

    /**
     * Gets the email
     *
     * @return string
     */
    function getEmail();

    /**
     * Adds the given field to the fields collection
     *
     * @param FieldInterface $field
     */
    function addField(FieldInterface $field);

    /**
     * Removes the given field from the fields collection
     *
     * @param FieldInterface $field
     *
     * @return boolean
     */
    function removeField(FieldInterface $field);

    /**
     * Returns TRUE whether the given field is contained in the fields collection
     *
     * @param FieldInterface $field
     *
     * @return boolean
     */
    function hasField(FieldInterface $field);

    /**
     * Gets the fields
     *
     * @return array
     */
    function getFields();

    /**
     * Sets the interests to add
     *
     * @param array $interestToAdd
     */
    function setInterestsToAdd(array $interestToAdd);

    /**
     * Gets the interests to add
     *
     * @return array
     */
    function getInterestsToAdd();

    /**
     * Sets the interests to delete
     *
     * @param array $interestToDelete
     */
    function setInterestsToDelete(array $interestToDelete);

    /**
     * Gets the interests to delete
     *
     * @return array
     */
    function getInterestsToDelete();

    /**
     * Sets the optout email
     *
     * @param integer $optoutEmail
     */
    function setOptoutEmail($optoutEmail);

    /**
     * Gets the optout email
     *
     * @return integer
     */
    function getOptoutEmail();

    /**
     * Sets the optout mobile
     *
     * @param integer $optoutMobile
     */
    function setOptoutMobile($optoutMobile);

    /**
     * Gets the optout mobile
     *
     * @return integer
     */
    function getOptoutMobile();

    /**
     * Gets an array representation
     *
     * @return array
     */
    function toArray();
}