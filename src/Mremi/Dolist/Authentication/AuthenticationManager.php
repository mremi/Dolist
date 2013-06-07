<?php

namespace Mremi\Dolist\Authentication;

use Psr\Log\LoggerInterface;

/**
 * Authentication manager class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class AuthenticationManager implements AuthenticationManagerInterface
{
    /**
     * @var \SoapClient
     */
    private $soapClient;

    /**
     * @var AuthenticationRequest
     */
    private $authenticationRequest;

    /**
     * @var integer
     */
    private $retries;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var AuthenticationTokenResponse
     */
    private $authenticationTokenResponse;

    /**
     * Constructor
     *
     * @param \SoapClient           $soapClient            A Soap client instance
     * @param AuthenticationRequest $authenticationRequest An authentication request instance
     * @param integer               $retries               An integer to retry many times, optional
     * @param LoggerInterface       $logger                A logger instance, optional
     */
    public function __construct(\SoapClient $soapClient, AuthenticationRequest $authenticationRequest, $retries = 1, LoggerInterface $logger = null)
    {
        $this->soapClient            = $soapClient;
        $this->authenticationRequest = $authenticationRequest;
        $this->retries               = $retries;
        $this->logger                = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthenticationTokenContext()
    {
        if (!$this->authenticationTokenResponse || $this->authenticationTokenResponse->isDeprecated()) {
            $this->authenticationTokenResponse = $this->authenticate();
        }

        return new AuthenticationTokenContext($this->authenticationRequest->getAccountId(), $this->authenticationTokenResponse->getKey());
    }

    /**
     * Calls the authentication API
     *
     * @return AuthenticationTokenResponse
     *
     * @throws \SoapFault
     */
    private function authenticate()
    {
        $try = 0;

        while (true) {
            $try++;

            try {
                $response = $this->soapClient->__soapCall('GetAuthenticationToken', array(array(
                    'authenticationRequest' => $this->authenticationRequest->toArray(),
                )));

                return new AuthenticationTokenResponse(new \DateTime($response->GetAuthenticationTokenResult->DeprecatedDate), $response->GetAuthenticationTokenResult->Key);
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