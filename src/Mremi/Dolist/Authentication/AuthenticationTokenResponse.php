<?php

namespace Mremi\Dolist\Authentication;

/**
 * Authentication token response class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class AuthenticationTokenResponse
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
     * Gets the end date of validity
     *
     * @return \DateTime
     */
    public function getDeprecatedDate()
    {
        return $this->deprecatedDate;
    }

    /**
     * Gets the token key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Returns TRUE whether this token is deprecated
     *
     * @return boolean
     */
    public function isDeprecated()
    {
        return time() > $this->deprecatedDate->getTimestamp();
    }
}
