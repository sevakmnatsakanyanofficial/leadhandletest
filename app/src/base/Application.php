<?php

namespace app\base;

/**
 * Class Application
 *
 * @package app\base
 */
abstract class Application
{
    public const LEADS_QUE_NAME = 'leadsQue';

    private $redis;

    abstract public function run(): void;

    /**
     * Receives redis connection
     *
     * @return \Redis|null
     */
    public function getRedis(): ?\Redis
    {
        try {
            if (!$this->redis) {
                $this->redis = new \Redis();
                $this->redis->connect('127.0.0.1', 6379);

                return $this->redis;
            }

            return $this->redis;
        } catch (\Exception $e) {
            // TODO: add message
        }
    }
}