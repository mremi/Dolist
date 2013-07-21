Dolist library
==============

[![Build Status](https://api.travis-ci.org/mremi/Dolist.png?branch=master)](https://travis-ci.org/mremi/Dolist)
[![Total Downloads](https://poser.pugx.org/mremi/Dolist/downloads.png)](https://packagist.org/packages/mremi/Dolist)
[![Latest Stable Version](https://poser.pugx.org/mremi/Dolist/v/stable.png)](https://packagist.org/packages/mremi/Dolist)

This library allows you to interact with the API of Dolist CRM.

**Basic Docs**

* [Installation](#installation)
* [Add a contact](#add-contact)
* [Retrieve contacts](#retrieve-contacts)

<a name="installation"></a>

## Installation

Only 1 step:

### Download Dolist using composer

Add Dolist in your composer.json:

```js
{
    "require": {
        "mremi/dolist": "dev-master"
    }
}
```

Now tell composer to download the library by running the command:

``` bash
$ php composer.phar update mremi/dolist
```

Composer will install the library to your project's `vendor/mremi` directory.

<a name="add-contact"></a>

## Add/update a contact

```php
<?php

use Mremi\Dolist\Authentication\AuthenticationManager;
use Mremi\Dolist\Authentication\AuthenticationRequest;
use Mremi\Dolist\Contact\ContactManager;
use Mremi\Dolist\Contact\FieldManager;

$contactSoapClient = new \SoapClient('http://api.dolist.net/v2/ContactManagementService.svc?wsdl', array(
    'soap_version'       => SOAP_1_1,
    'trace'              => true,
    'connection_timeout' => 2,
    // ...
));
$authSoapClient = new \SoapClient('http://api.dolist.net/v2/AuthenticationService.svc?wsdl', array(
    'soap_version'       => SOAP_1_1,
    'trace'              => true,
    'connection_timeout' => 2,
    // ...
));
$authRequest = new AuthenticationRequest('YOUR_ACCOUNT_IDENTIFIER', 'YOUR_AUTHENTICATION_KEY');
$authManager = new AuthenticationManager($authSoapClient, $authRequest, 3);

$contactManager = new ContactManager($contactSoapClient, $authManager, 3);
$fieldManager   = new FieldManager;

$contact = $contactManager->create();
$contact->setEmail('test@example.com');
$contact->addField($fieldManager->create('firstname', 'Firstname'));
$contact->addField($fieldManager->create('lastname', 'Lastname'));

$ticket = $contactManager->save($contact);

$saved = $contactManager->getStatusByTicket($ticket);

if ($saved->isOk()) {
    // contact has been saved...
} else {
    // something is wrong...
    echo sprintf('Returned code: %s, description: %s', $saved->getReturnCode(), $saved->getDescription());
}
```

<a name="retrieve-contacts"></a>

## Retrieve contacts

```php
<?php

use Mremi\Dolist\Contact\GetContactRequest;

$request = new GetContactRequest;
$request->setOffset(50);
// ...
$contacts = $contactManager->getContacts($request);
// ...
```
