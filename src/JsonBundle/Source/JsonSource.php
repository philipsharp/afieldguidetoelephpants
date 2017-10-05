<?php

namespace AFieldGuideToElephpants\JsonBundle\Source;

use Dflydev\DotAccessData\Data;
use Sculpin\Core\Permalink\Permalink;
use Sculpin\Core\Source\AbstractSource;
use Sculpin\Core\Source\FileSource;
use Sculpin\Core\Source\SourceInterface;
use Sculpin\Core\Source\SourceSet;

class JsonSource extends AbstractSource
{
    protected $sourceId = 'data.json';
    protected $canBeFormatted = false;

    private $elephants = [];

    public function __construct(SourceSet $sourceSet)
    {
        foreach ($sourceSet->allSources() as $source) {
            if ($this->isElephpant($source)) {
                $this->addElephpant($source);
            }
        }

        $this->data = new Data();

        $this->setFormattedContent(json_encode($this->elephants, JSON_PRETTY_PRINT));
        $this->isGenerated = true;
        $this->hasChanged = true;
        $this->permalink = new Permalink('data.json', 'data.json');
    }


    private function isElephpant(SourceInterface $source)
    {
        if (!$source instanceof FileSource) {
            return false;
        }

        return in_array($source->data()->get('layout'), array('elephpant', 'other'));
    }

    private function addElephpant(SourceInterface $source)
    {
        $fields = array('name', 'sponsor', 'reverse', 'photos', 'tags', 'categories');
        $data = array_intersect_key($source->data()->export(), array_flip($fields));
        $data['description'] = $source->content();

        $key = $this->getElementId($source);
        $this->elephants[$key] = $data;
    }

    private function getElementId(SourceInterface $source)
    {
        return sprintf(
            'e-%s-%s-%s',
            implode('.', $source->data()->get('categories')),
            implode('.', $source->data()->get('tags')),
            $source->data()->get('date')
        );
    }
}
