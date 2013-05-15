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
     * @var string
     */
    private $class;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Constructor
     *
     * @param \SoapClient                    $soapClient            A Soap client instance
     * @param AuthenticationManagerInterface $authenticationManager An authentication manager instance
     * @param string                         $class                 The namespace of contact class
     * @param integer                        $retries               An integer to retry many times, optional
     * @param LoggerInterface                $logger                A logger instance, optional
     */
    public function __construct(\SoapClient $soapClient, AuthenticationManagerInterface $authenticationManager, $class, $retries = 1, LoggerInterface $logger = null)
    {
        $this->soapClient            = $soapClient;
        $this->authenticationManager = $authenticationManager;
        $this->class                 = $class;
        $this->retries               = $retries;
        $this->logger                = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function create()
    {
        return new $this->class;
    }

    /**
     * {@inheritDoc}
     */
    public function save(ContactInterface $contact)
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
}