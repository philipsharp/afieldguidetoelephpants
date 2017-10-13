<?php

namespace AFieldGuideToElephpants\JsonBundle;

use Dflydev\DotAccessData\Data;
use Sculpin\Core\Event\SourceSetEvent;
use Sculpin\Core\Permalink\Permalink;
use Sculpin\Core\Source\AbstractSource;
use Sculpin\Core\Source\SourceInterface;

class JsonBuilder extends AbstractSource
{
    private $elephants = [];

    public function __construct()
    {
        $this->data = new Data();
        $this->isGenerated = true;
        $this->canBeFormatted = false;
        $this->sourceId = 'data.json';
        $this->permalink = new Permalink('data.json', 'data.json');
    }

    public function onSculpinCoreAfterFormat(SourceSetEvent $event)
    {
        // Add self to the list of sources
        $event->sourceSet()->mergeSource($this);

        // Generate elephpant data
        foreach ($event->sourceSet()->allSources() as $source) {
            if ($this->isElephpant($source)) {
                $this->addElephpant($source);
            }
        }

        $this->setFormattedContent(json_encode($this->elephants, JSON_PRETTY_PRINT));
        $this->hasChanged = true;
    }

    private function isElephpant(SourceInterface $source)
    {
        return in_array($source->data()->get('layout'), array('elephpant', 'other'));
    }

    private function addElephpant(SourceInterface $source)
    {
        $data = $source->data()->export();
        $key = $data['url'];

        $this->elephants[$key] = array(
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
