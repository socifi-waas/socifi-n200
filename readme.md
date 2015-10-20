# SOCIFI N200 API SDK


PHP library for [N200](http://www.n200.com/) API.


## Installation

The SOCIFI N200 can be installed with [Composer](https://getcomposer.org/). Run this command:

```sh
composer require socifi/n200
```

Please note you need to add custom repository to your `composer.json` file for now:

```sh
{
    ...
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
use Socifi\N200 as N200;

// ...

$n200 = new N200\N200('the-api-key');
```

### Using resource classes

```php
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
$eventCodes = $n200->get('events');

$event1 = $n200->get('events/' . $eventCodes[0]['code']);
```

Do not forget to catch exceptions!
