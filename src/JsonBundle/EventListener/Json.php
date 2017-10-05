<?php

namespace AFieldGuideToElephpants\JsonBundle\EventListener;

use AFieldGuideToElephpants\JsonBundle\Source\JsonSource;
use Sculpin\Core\Event\SourceSetEvent;

class Json
{
    public function onSculpinCoreAfterFormat(SourceSetEvent $event)
    {
        $event->sourceSet()->mergeSource(new JsonSource($event->sourceSet()));
    }
}
