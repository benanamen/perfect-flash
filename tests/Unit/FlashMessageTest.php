<?php
declare(strict_types=1);

namespace Unit;

use PerfectApp\Flash\FlashMessage;
use PHPUnit\Framework\TestCase;

final class FlashMessageTest extends TestCase
{
    private array $config = [
        'primary' => [
            'created' => 'Item created successfully'
        ],
        'secondary' => [
            'updated' => 'Item updated successfully'
        ],
        'light' => [
            'viewed' => 'Item viewed successfully'
        ],
        'dark' => [
            'deleted' => 'Item deleted successfully'
        ],
        'success' => [
            'saved' => 'Item saved successfully'
        ],
        'info' => [
            'found' => 'Item found successfully'
        ],
        'warning' => [
            'missing' => 'Item missing'
        ],
        'danger' => [
            'error' => 'An error occurred'
        ]
    ];

    public function testConstructor(): void
    {
        $flashMessage = new FlashMessage($this->config);
        $this->assertInstanceOf(FlashMessage::class, $flashMessage);
    }

    public function testSetValidTypeAndAction(): void
    {
        $flashMessage = new FlashMessage($this->config);
        $flashMessage->set('success', 'saved');
        $this->expectOutputString('<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Item saved successfully</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        $flashMessage->display();
    }

    public function testSetInvalidType(): void
    {
        $flashMessage = new FlashMessage($this->config);
        $flashMessage->set('invalid', 'created');
        $this->expectOutputString('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>ERROR: Invalid type "invalid" provided</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        $flashMessage->display();
    }

    public function testSetInvalidAction(): void
    {
        $flashMessage = new FlashMessage($this->config);
        $flashMessage->set('primary', 'invalid');
        $this->expectOutputString('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>ERROR: Invalid action "invalid" provided</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        $flashMessage->display();
    }

    public function testSetInvalidTypeAndAction(): void
    {
        $flashMessage = new FlashMessage($this->config);
        $flashMessage->set('invalid', 'invalid');
        $this->expectOutputString('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>ERROR: Invalid type "invalid" provided</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        $flashMessage->display();
    }
}
