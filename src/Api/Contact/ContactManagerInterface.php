<?php

namespace Mremi\Dolist\Api\Contact;

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
     * @return ContactInterface
     */
    function create();

    /**
     * Calls the API to save the given contact
     *
     * @param ContactInterface $contact
     *
     * @return string
     *
     * @throws \SoapFault
     */
    function save(ContactInterface $contact);

    /**
     * Calls the API to get the status of the given ticket
     *
     * @param string $ticket
     *
     * @return SavedContactInfoInterface
     *
     * @throws \SoapFault
     */
    function getStatusByTicket($ticket);
}