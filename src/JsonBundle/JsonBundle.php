<?php

namespace AFieldGuideToElephpants\JsonBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class JsonBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container
            ->register('json.builder', 'AFieldGuideToElephpants\JsonBundle\JsonBuilder')
            ->addArgument(new Reference('sculpin.site_configuration'))
            ->addTag('kernel.event_listener', array('event' => 'sculpin.core.after_format'));
    }
}
