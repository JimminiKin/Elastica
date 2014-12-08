<?php

namespace Elastica\Aggregation;


use Elastica\Filter\AbstractFilter;

/**
 * Class Filter
 * @package Elastica\Aggregation
 * @link http://www.elasticsearch.org/guide/en/elasticsearch/reference/master/search-aggregations-bucket-filters-aggregation.html
 */
class Filters extends AbstractAggregation
{

    private $_filters = null;
    /**
     * Add a filter for this aggregation
     * @param string $name
     * @param AbstractFilter $filter
     * @return Filter
     */
    public function addFilter($name, AbstractFilter $filter)
    {
        return $this->_filters[$name] = $filter->toArray();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = array(
            "filters" => array('filters' => $this->_filters)
        );

        if($this->_aggs)
        {
            $array['aggs'] = $this->_aggs;
        }

        return $array;
    }
}