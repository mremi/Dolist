<?php

/*
 * This file is part of the Mremi\Dolist library.
 *
 * (c) Rémi Marseille <marseille.remi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mremi\Dolist\Contact;

/**
 * GetContactRequest class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class GetContactRequest
{
    /**
     * @var boolean
     */
    private $allFields = true;

    /**
     * @var boolean
     */
    private $interest = true;

    /**
     * @var boolean
     */
    private $lastModifiedOnly = false;

    /**
     * @var integer
     */
    private $offset = 0;

    /**
     * @var RequestFilter
     */
    private $requestFilter;

    /**
     * @var array
     */
    private $returnFields = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->requestFilter = new RequestFilter;
    }

    /**
     * TRUE to return all fields
     *
     * @param boolean $allFields
     */
    public function setAllFields($allFields)
    {
        $this->allFields = (boolean) $allFields;
    }

    /**
     * Returns TRUE whether all fields have to be returned
     *
     * @return boolean
     */
    public function getAllFields()
    {
        return $this->allFields;
    }

    /**
     * TRUE to return interests
     *
     * @param boolean $interest
     */
    public function setInterest($interest)
    {
        $this->interest = (boolean) $interest;
    }

    /**
     * Returns TRUE whether interests have to be returned
     *
     * @return boolean
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * TRUE to return last modified contacts
     *
     * @param boolean $lastModifiedOnly
     */
    public function setLastModifiedOnly($lastModifiedOnly)
    {
        $this->lastModifiedOnly = (boolean) $lastModifiedOnly;
    }

    /**
     * Returns TRUE whether only the last modified contacts have to be returned
     *
     * @return boolean
     */
    public function getLastModifiedOnly()
    {
        return $this->lastModifiedOnly;
    }

    /**
     * Sets the offset of the first returned contact
     *
     * @param integer $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    /**
     * Gets the offset of the first returned contact
     *
     * @return integer
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Sets the request filters
     *
     * @param RequestFilter $requestFilter
     */
    public function setRequestFilter(RequestFilter $requestFilter)
    {
        $this->requestFilter = $requestFilter;
    }

    /**
     * Gets the request filters
     *
     * @return RequestFilter
     */
    public function getRequestFilter()
    {
        return $this->requestFilter;
    }

    /**
     * Sets the fields to return
     *
     * @param array $returnFields
     */
    public function setReturnFields(array $returnFields)
    {
        $this->returnFields = $returnFields;
    }

    /**
     * Gets the fields to return
     *
     * @return array
     */
    public function getReturnFields()
    {
        return $this->returnFields;
    }

    /**
     * Gets an array representation
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'AllFields'        => $this->allFields,
            'Interest'         => $this->interest,
            'LastModifiedOnly' => $this->lastModifiedOnly,
            'Offset'           => $this->offset,
            'RequestFilter'    => $this->requestFilter->toArray(),
            'ReturnFields'     => $this->returnFields,
        );
    }
}
