<?php

namespace app\base;

/**
 * Class LogWriter
 * @package app\base
 */
class LogWriter implements Writer
{
    protected $filePath;

    /**
     * @inheritDoc
     */
    public function __construct(string $path)
    {
        $this->filePath = $path;
    }

    /**
     * @inheritDoc
     */
    public function write(string $text): void
    {
        sleep(2);
        file_put_contents($this->filePath, $text, FILE_APPEND);
    }
}