<?php

namespace Service\Impl;

use Service\SocialSearchService;

class XAggregatorService implements SocialSearchService {
    
    private $aggregator;
    private $searchServices;
    
    public function __construct($searchServices, \Domain\Aggregator $aggregator) {
        $this->aggregator = $aggregator;
        $this->searchServices = $searchServices;
    }
    
    public function search($query) {
        foreach($this->searchServices as $searcher) {
            $this->aggregator->addResults($searcher->search($query));
        }
        return $this->aggregator->aggregate();
    }
    
}
