<?php

require_once 'ElephpantTwigExtension.php';

class SculpinKernel extends \Sculpin\Bundle\SculpinBundle\HttpKernel\AbstractKernel
{
    protected function getAdditionalSculpinBundles()
    {
        return ['AFieldGuideToElephpants\\JsonBundle\\JsonBundle'];
    }
}
