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
    function create();

    /**
     * Calls the API to save the given contact
     *
     * @param Contact $contact
     *
     * @return string
     *
     * @throws \SoapFault
     */
    function save(Contact $contact);

    /**
     * Calls the API to get the status of the given ticket
     *
     * @param string $ticket
     *
     * @return SavedContactInfo
     *
     * @throws \SoapFault
     */
    function getStatusByTicket($ticket);
}