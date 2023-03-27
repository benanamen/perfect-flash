![Code Coverage](https://raw.githubusercontent.com/benanamen/perfect-flash/master/.github/badges/coverage.svg)

[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash&metric=bugs)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash&metric=security_rating)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash&metric=sqale_rating)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash&metric=vulnerabilities)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash)
[![Duplicated Lines (%)](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash&metric=duplicated_lines_density)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/benanamen/perfect-flash/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/benanamen/perfect-flash/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/benanamen/perfect-flash/badges/build.png?b=master)](https://scrutinizer-ci.com/g/benanamen/perfect-flash/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/benanamen/perfect-flash/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

[![CodeFactor](https://www.codefactor.io/repository/github/benanamen/perfect-flash/badge)](https://www.codefactor.io/repository/github/benanamen/perfect-flash)
[![codebeat badge](https://codebeat.co/badges/3cfe8bcd-c24f-4c68-8b94-51e8e70e1d86)](https://codebeat.co/projects/github-com-benanamen-perfect-flash-master)
[![Maintainability](https://api.codeclimate.com/v1/badges/58219adf92afec78fa2b/maintainability)](https://codeclimate.com/github/benanamen/perfect-flash/maintainability)

# FlashMessage Usage Guide:

The FlashMessage class is a convenient way to display messages to your users. It is initialized with a config array that contains messages for different types of actions. To use it, follow these steps:

(Assumes you have started a session)

Import the FlashMessage class into your code:

```php
use PerfectApp\Flash\FlashMessage;
```

Create an instance of the FlashMessage class, passing the config array to its constructor:

```php
$config = [
    'success' => [
        'create' => 'Item created successfully!',
        'update' => 'Item updated successfully!'
    ],
    'danger' => [
        'create' => 'Failed to create item.',
        'update' => 'Failed to update item.'
    ]
];
$flash = new FlashMessage($config);
```
To display a message, call the `set()` method on the `$flash` object. Pass the type of message ('success', 'danger', etc.), the action performed ('create', 'update', etc.), and optionally an icon to display with the message:

```php
$flash->set('success', 'create', '<i class="fas fa-check"></i>');
```

To display all messages, call the `display()` method on the `$flash` object:

```php
$flash->display();
```

That's it! You can call `set()` and `display()` methods as many times as you need to display different messages to your users. The messages will be displayed in the order they were added, and will automatically be cleared after they are displayed.
