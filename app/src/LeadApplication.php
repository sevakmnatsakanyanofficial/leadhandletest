<?php

namespace app;

use app\base\Application;

/**
 * Class LeadApplication
 *
 * This class is to control leads application
 *
 * @package app
 */
class LeadApplication extends Application
{
    /**
     * The method starts to receive leads
     * and for high load issue it pushes leads to que
     *
     * And other app must handle que
     */
    public function run(): void
    {
        $generator = new \LeadGenerator\Generator();

        $generator->generateLeads(10000, function (\LeadGenerator\Lead $lead) {
            $data = $lead->id . ' | ' . $lead->categoryName . ' | ' . time() . "\n";
            $this->getRedis()->rPush(self::LEADS_QUE_NAME, $data);
        });
    }
}