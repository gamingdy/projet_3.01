<?php
require_once __DIR__ . '/../../vendor/autoload.php';

class CustomTemplate extends Smarty{
    private string $file;

    public function __construct (string $file) {
        $this->file = $file;
        parent::__construct();
        $this->setTemplateDir(__DIR__ . '/../template/');
    }

    public function show (): void {
        $this->display($this->file);
    }
}