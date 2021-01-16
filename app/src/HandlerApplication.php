<?php

namespace app;

use app\base\Application;

/**
 * Class HandlerApplication
 *
 * This class is to handle leads from que
 *
 * @package app
 */
class HandlerApplication extends Application
{
    /**
     * The methods start endless loop to listen que for new messages and saves in logs
     */
    public function run(): void
    {
        while (true) {
            $data = $this->getRedis()->lPop(self::LEADS_QUE_NAME);
            /*
             * if data is not isset it means que is empty
             * So we need pause to wait for new messages
             *
             * But for this task we will stop loop
             */
            if (!$data) {
                //sleep(1);
                //continue;
                break;
            }

            // write data to log file
            $log = new \app\base\LogWriter('log.txt');
            $log->write($data);
        }
    }
}