<?php

namespace app\base;

/**
 * Interface Writer
 * @package app\base
 */
interface Writer
{
    /**
     * Writer constructor.
     * @param string $path
     */
    public function __construct(string $path);

    /**
     * Writes data in log file by path from constructor
     *
     * @param string $text
     */
    public function write(string $text): void;
}