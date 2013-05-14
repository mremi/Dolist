<?php

namespace Mremi\Dolist\Contact;

/**
 * Saved contact info interface
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
interface SavedContactInfoInterface
{
    /**
     * Possible returned codes
     */
    const CODE_PENDING                     = -1; // waiting for treatment
    const CODE_ERROR                       = 0;  // error during contact update
    const CODE_SUCCESS                     = 1;  // success
    const CODE_UNAUTHORIZED_EMAIL          = 2;  // email is not authorized
    const CODE_EMAIL_ALREADY_EXIST         = 4;  // new email already exists
    const CODE_UNAUTHORIZED_OPTOUT_EMAIL   = 5;  // update of optout email is not authorized
    const CODE_UNAUTHORIZED_OPTOUT_MOBILE  = 6;  // update of optout mobile is not authorized
    const CODE_ERROR_ON_INTEREST_TO_ADD    = 7;  // error during the addition of an interest
    const CODE_ERROR_ON_INTEREST_TO_DELETE = 8;  // error during the suppression of an interest

    /**
     * Gets the description
     *
     * @return string
     */
    function getDescription();

    /**
     * Gets the email address
     *
     * @return string
     */
    function getEmail();

    /**
     * Gets the member identifier
     *
     * @return integer
     */
    function getMemberId();

    /**
     * Gets the returned code
     *
     * @return integer
     */
    function getReturnCode();

    /**
     * Gets an array of handled codes
     *
     * @return array
     */
    function getHandledCodes();

    /**
     * Returns TRUE whether the returned code is handled
     *
     * @return boolean
     */
    function isHandledCode();

    /**
     * Returns TRUE whether the returned code is success
     *
     * @return boolean
     */
    function isOk();

    /**
     * Returns TRUE whether the returned code is pending
     *
     * @return boolean
     */
    function isPending();
}