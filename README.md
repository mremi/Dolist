Dolist library
==============

This library allows you to interact with the API of Dolist CRM.

```php
<?php

use Mremi\Dolist\Authentication\AuthenticationManager;
use Mremi\Dolist\Authentication\AuthenticationRequest;
use Mremi\Dolist\Contact\ContactManager;
use Mremi\Dolist\Contact\FieldManager;
use Mremi\Dolist\Contact\GetContactRequest;

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

// retrieve contacts
$request = new GetContactRequest;
$request->setOffset(50);
// ...
$contacts = $contactManager->getContacts($request);
// ...
```