<?php

declare(strict_types=1);

namespace PerfectApp\Flash;

class FlashMessage
{
    private mixed $messages;
    private array $config;

    public function __construct($config)
    {
        $this->config = $config;
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = [];
        }
        $this->messages = $_SESSION['flash'];
        $_SESSION['flash'] = [];
    }

    public function set($type, $action, $icon = ''): array
    {
        $allowedTypes = ['primary', 'secondary', 'light', 'dark', 'success', 'info', 'warning', 'danger'];

        if (!in_array($type, $allowedTypes)) {
            $message = sprintf('ERROR: Invalid type "%s" provided', $type);
            $this->messages[] = ['type' => 'danger', 'message' => $message, 'icon' => ''];
            return $_SESSION['flash'] = $this->messages;
        }

        if (!isset($this->config[$type][$action])) {
            $message = sprintf('ERROR: Invalid action "%s" provided', $action);
            $this->messages[] = ['type' => 'danger', 'message' => $message, 'icon' => ''];
            return $_SESSION['flash'] = $this->messages;
        }

        $message = $this->config[$type][$action];
        $this->messages[] = ['type' => $type, 'message' => $message, 'icon' => $icon];
        return $_SESSION['flash'] = $this->messages;
    }

    public function display(): void
    {
        foreach ($this->messages as $message) {
            printf(
                '<div class="alert alert-%s alert-dismissible fade show" role="alert">%s <strong>%s</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>',
                $message['type'],
                $message['icon'],
                $message['message']
            );
        }
        $_SESSION['flash'] = [];
    }
}
