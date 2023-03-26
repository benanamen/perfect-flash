FlashMessage Usage Guide:

The FlashMessage class is a convenient way to display messages to your users. It is initialized with a config array that contains messages for different types of actions. To use it, follow these steps:

1. Import the FlashMessage class into your code:

```php
use PerfectApp\Flash\FlashMessage;
```

2. Create an instance of the FlashMessage class, passing the config array to its constructor:

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

3. To display a message, call the `set()` method on the `$flash` object. Pass the type of message ('success', 'danger', etc.), the action performed ('create', 'update', etc.), and optionally an icon to display with the message:

```php
$flash->set('success', 'create', '<i class="fas fa-check"></i>');
```

4. To display all messages, call the `display()` method on the `$flash` object:

```php
$flash->display();
```

That's it! You can call `set()` and `display()` methods as many times as you need to display different messages to your users. The messages will be displayed in the order they were added, and will automatically be cleared after they are displayed.