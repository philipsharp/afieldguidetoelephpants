<?php

namespace AFieldGuideToElephpants\JsonBundle;

use Sculpin\Core\Event\SourceSetEvent;
use Sculpin\Core\Source\AbstractSource;
use Sculpin\Core\Source\SourceInterface;

class JsonBuilder extends AbstractSource
{
    public function onSculpinCoreAfterFormat(SourceSetEvent $event)
    {
        // Generate elephpant data
        $elephpants = [];
        foreach ($event->sourceSet()->allSources() as $source) {
            if ($this->isElephpant($source)) {
                $key = rtrim($source->filename(), '.md');
                $elephpants[$key] = $this->elephpantToArray($source);
            }
        }

        // Create new JSON file with the elephpant data
        $json = new DynamicJsonSource('data.json');
        $json->setContent($elephpants);
        $event->sourceSet()->mergeSource($json);
    }

    private function isElephpant(SourceInterface $source)
    {
        return in_array($source->data()->get('layout'), array('elephpant', 'other'));
    }

    private function elephpantToArray(SourceInterface $source)
    {
        $data = $source->data()->export();

        return array(
            'name' => @$data['name'],
            'sponsor' => @$data['sponsor'],
            'reverse' => @$data['reverse'],
            'photos' => @$data['photos'],
            'color' => @$data['tags'][0],
            'variation' => @$data['categories'][0],
            'description' => $source->content(),
        );
    }
}
