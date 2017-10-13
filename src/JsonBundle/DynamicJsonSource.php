<?php

namespace AFieldGuideToElephpants\JsonBundle;

use Dflydev\DotAccessData\Data;
use Sculpin\Core\Permalink\Permalink;
use Sculpin\Core\Source\AbstractSource;

/**
 * A dynamically-generated JSON feed of data
 */
class DynamicJsonSource extends AbstractSource
{
    /**
     * @param string $filename Desired name of the file; used for the permalink
     */
    public function __construct($filename)
    {
        $this->data = new Data();
        $this->isGenerated = true;
        $this->canBeFormatted = false;
        $this->sourceId = $filename;
        $this->permalink = new Permalink($filename, $filename);
    }

    /**
     * @param array|mixed $content Content to render as JSON
     */
    public function setContent($content = null)
    {
        parent::setContent($content);
        $this->setFormattedContent(json_encode($content, JSON_PRETTY_PRINT));

        $this->hasChanged = true;
    }
}
