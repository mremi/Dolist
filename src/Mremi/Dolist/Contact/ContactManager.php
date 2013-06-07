<?php

namespace Mremi\Dolist\Contact;

use Mremi\Dolist\Authentication\AuthenticationManagerInterface;

use Psr\Log\LoggerInterface;

/**
 * Contact manager class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class ContactManager implements ContactManagerInterface
{
    /**
     * @var \SoapClient
     */
    private $soapClient;

    /**
     * @var AuthenticationManagerInterface
     */
    private $authenticationManager;

    /**
     * @var integer
     */
    private $retries;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Constructor
     *
     * @param \SoapClient                    $soapClient            A Soap client instance
     * @param AuthenticationManagerInterface $authenticationManager An authentication manager instance
     * @param integer                        $retries               An integer to retry many times, optional
     * @param LoggerInterface                $logger                A logger instance, optional
     */
    public function __construct(\SoapClient $soapClient, AuthenticationManagerInterface $authenticationManager, $retries = 1, LoggerInterface $logger = null)
    {
        $this->soapClient            = $soapClient;
        $this->authenticationManager = $authenticationManager;
        $this->retries               = $retries;
        $this->logger                = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function create()
    {
        return new Contact;
    }

    /**
     * {@inheritDoc}
     */
    public function save(Contact $contact)
    {
        $try = 0;

        while (true) {
            $try++;

            try {
                $response = $this->soapClient->__soapCall('SaveContact', array(array(
                    'token'   => $this->authenticationManager->getAuthenticationTokenContext()->toArray(),
                    'contact' => $contact->toArray(),
                )));

                return $response->SaveContactResult;
            } catch (\SoapFault $e) {
                if (null !== $this->logger) {
                    $this->logger->critical(sprintf('[%] %s', __CLASS__, $e->getMessage()));
                }

                if ($try >= $this->retries) {
                    throw $e;
                }

                // waiting 500ms before next call
                usleep(500000);
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getStatusByTicket($ticket)
    {
        $try = 0;

        while (true) {
            $try++;

            try {
                $response = $this->soapClient->__soapCall('GetStatusByTicket', array(array(
                    'token'  => $this->authenticationManager->getAuthenticationTokenContext()->toArray(),
                    'ticket' => $ticket,
                )));

                $saved = new SavedContactInfo(
                    $response->GetStatusByTicketResult->Description,
                    $response->GetStatusByTicketResult->Email,
                    $response->GetStatusByTicketResult->MemberId,
                    $response->GetStatusByTicketResult->ReturnCode
                );

                if ($saved->isPending() && $try < $this->retries) {
                    // waiting 1.5s before next call
                    usleep(1500000);

                    continue;
                }

                return $saved;
            } catch (\SoapFault $e) {
                if (null !== $this->logger) {
                    $this->logger->critical(sprintf('[%] %s', __CLASS__, $e->getMessage()));
                }

                if ($try >= $this->retries) {
                    throw $e;
                }

                // waiting 500ms before next call
                usleep(500000);
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getContacts(GetContactRequest $request = null)
    {
        if (!$request) {
            $request = new GetContactRequest;
        }

        $try = 0;

        while (true) {
            $try++;

            try {
                $response = $this->soapClient->__soapCall('GetContact', array(array(
                    'token'   => $this->authenticationManager->getAuthenticationTokenContext()->toArray(),
                    'request' => $request->toArray(),
                )));

                $contacts = new GetContactResponse;

                foreach ($response->GetContactResult->ContactList->ContactData as $contactData) {
                    $contact = new ContactData;

                    foreach ($contactData->CustomFields->CustomField as $customField) {
                        $field = new CustomField;
                        $field->setCustomName($customField->CustomName);
                        $field->setFieldType($customField->FieldType);
                        $field->setName($customField->Name);
                        $field->setValue($customField->Value);

                        $contact->addCustomField($field);
                    }

                    $contact->setEmail($contactData->Email);
                    $contact->setError($contactData->Error);

                    if (property_exists($contactData->Interests, 'Interest')) {
                        $contactInterest = $contactData->Interests->Interest;

                        $interest = new Interest;
                        $interest->setGroup(new InterestGroup($contactInterest->Group->Id, $contactInterest->Group->Name));
                        $interest->setInterestDate(new \DateTime($contactInterest->InterestDate));
                        $interest->setValue(new InterestValue($contactInterest->Value->Id, $contactInterest->Value->Name));

                        $contact->addInterest($interest);
                    }

                    $contact->setMemberId($contactData->MemberId);
                    $contact->setOptoutEmail($contactData->OptoutEmail);
                    $contact->setOptoutMobile($contactData->OptoutMobile);
                    $contact->setReadOnly($contactData->ReadOnly);
                    $contact->setStatus($contactData->Status);
                    $contact->setSubscribeDate(new \DateTime($contactData->SubscribeDate));
                    $contact->setUnsubscribeDate(new \DateTime($contactData->UnsubscribeDate));
                    $contact->setUpdateDate(new \DateTime($contactData->UpdateDate));

                    $contacts->addContact($contact);
                }

                $contacts->setReturnContactsCount($response->GetContactResult->ReturnContactsCount);
                $contacts->setTotalContactsCount($response->GetContactResult->TotalContactsCount);

                return $contacts;
            } catch (\SoapFault $e) {
                if (null !== $this->logger) {
                    $this->logger->critical(sprintf('[%] %s', __CLASS__, $e->getMessage()));
                }

                if ($try >= $this->retries) {
                    throw $e;
                }

                // waiting 500ms before next call
                usleep(500000);
            }
        }
    }
}