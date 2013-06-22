<?php

namespace Mremi\Dolist\Contact;

/**
 * Contact manager interface
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
interface ContactManagerInterface
{
    /**
     * Creates a new contact instance
     *
     * @return Contact
     */
    public function create();

    /**
     * Calls the API to save the given contact
     *
     * @param Contact $contact
     *
     * @return string
     *
     * @throws \SoapFault
     */
    public function save(Contact $contact);

    /**
     * Calls the API to get the status of the given ticket
     *
     * @param string $ticket
     *
     * @return SavedContactInfo
     *
     * @throws \SoapFault
     */
    public function getStatusByTicket($ticket);

    /**
     * Calls the API to retrieve contacts of the given request
     *
     * @param GetContactRequest $request
     *
     * @return GetContactResponse
     *
     * @throws \SoapFault
     */
    public function getContacts(GetContactRequest $request = null);
}
