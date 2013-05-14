<?php

namespace Mremi\Dolist\Api\Authentication;

/**
 * Authentication token response class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class AuthenticationTokenResponse implements AuthenticationTokenResponseInterface
{
    /**
     * @var \DateTime
     */
    private $deprecatedDate;

    /**
     * @var string
     */
    private $key;

    /**
     * Constructor
     *
     * @param \DateTime $deprecatedDate A deprecated date
     * @param string    $key            An authentication key
     */
    public function __construct(\DateTime $deprecatedDate, $key)
    {
        $this->deprecatedDate = $deprecatedDate;
        $this->key            = $key;
    }

    /**
     * {@inheritdoc}
     */
    public function getDeprecatedDate()
    {
        return $this->deprecatedDate;
    }

    /**
     * {@inheritdoc}
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function isDeprecated()
    {
        return time() > $this->deprecatedDate->getTimestamp();
    }
}