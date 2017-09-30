<?php

class ElephpantTwigExtension extends Twig_Extension
{
    public function getFilters()
    {
        $filters = array(
             new Twig_SimpleFilter('merge_recursive', [$this, 'filterMergeRecursive']),
             new Twig_SimpleFilter('sortby', [$this, 'filterSortBy']),
        );
        return $filters;
    }

    public function getName()
    {
        return 'elephpant';
    }

    public function filterMergeRecursive($array1, $array2)
    {
        return array_merge_recursive($array1, $array2);
    }

    public function filterSortBy($array, $column) {
        uasort($array, function($a, $b) use ($column) {
            return $a[$column] > $b[$column] ? 1 : -1;
        });

        return $array;
    }
}
