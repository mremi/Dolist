<?php

namespace Mremi\Dolist\Contact;

/**
 * GetContactResponse class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class GetContactResponse
{
    /**
     * @var array
     */
    private $contactList;

    /**
     * @var integer
     */
    private $returnContactsCount;

    /**
     * @var integer
     */
    private $totalContactsCount;

    /**
     * Adds the given contact to the contacts collection
     *
     * @param ContactData $contact
     */
    public function addContact(ContactData $contact)
    {
        $this->contactList[] = $contact;
    }

    /**
     * Gets the contact list
     *
     * @return array
     */
    public function getContactList()
    {
        return $this->contactList;
    }

    /**
     * Sets the count of returned contacts
     *
     * @param integer $returnContactsCount
     */
    public function setReturnContactsCount($returnContactsCount)
    {
        $this->returnContactsCount = $returnContactsCount;
    }

    /**
     * Gets the count of returned contacts
     *
     * @return integer
     */
    public function getReturnContactsCount()
    {
        return $this->returnContactsCount;
    }

    /**
     * Sets the total count of contacts matching request
     *
     * @param integer $totalContactsCount
     */
    public function setTotalContactsCount($totalContactsCount)
    {
        $this->totalContactsCount = $totalContactsCount;
    }

    /**
     * Gets the total count of contacts matching request
     *
     * @return integer
     */
    public function getTotalContactsCount()
    {
        return $this->totalContactsCount;
    }
}
