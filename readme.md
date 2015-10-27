# SOCIFI N200 API SDK


PHP library for [N200](http://www.n200.com/) API.

## Limitations

The library currently support only read access to `Visitors` and `Events` resources.

## Installation

The SOCIFI N200 can be installed with [Composer](https://getcomposer.org/). Run this command:

```sh
composer require socifi/n200:@dev
```

Please note you need to add custom repository to your `composer.json` file for now:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "git@bitbucket.org:socifi/n200"
        }
    ]
}
```

## Usage

### Initialize the N200 library

```php
<?php

use Socifi\N200 as N200;

// ...

$n200 = new N200\N200('the-api-key');
```

### Using resource classes

```php
<?php

// Pass $n200 object that you initialized before.
// It contains authentication details and API setup.
$events = new N200\Events($n200);

// Array of EventVO is returned.
$allEvents = $events->getAll();
```

### Calling the endpoints directly

Using pure events endpoint will return you only list of event codes.
You will have to call the `event/$code` to get event details.
Please note that only arrays are returned instead of VOs using those methods.

```php
<?php

$eventCodes = $n200->get('events');

$event1 = $n200->get('events/' . $eventCodes[0]['code']);
```

## Cookbook

### Checking that visitor is registered on particular event

```php
<?php

use Socifi\N200 as N200;

// ...

$visitors = new N200\Visitors(new N200\N200('the-api-key'));

try {
    $visitor = $visitors->get('visitor-code');
} catch (...) {
    // Catch the exceptions (E.g. visitor not found)
}

$isRegisteredOnEvent = $visitors->isVisitorRegisteredOnEvent(
    $visitor,
    'event-code'
); // => bool

```

### Get visitors addresses

Exception catching is removed for brevity.

```php
<?php

use Socifi\N200 as N200;

// ...

$n200 = new N200\N200('the-api-key');

$visitors = new N200\Visitors($n200);
$contacts = new N200\Contacts($n200);

$visitor = $visitors->get('visitor-code');
$contact = $contacts->get($visitor->getContact()->getCode());

$addresses = $contact->getAddresses(); // => array of AddressVO
        

```