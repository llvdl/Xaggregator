<?php

namespace Factory;
use \Service\Impl\MobiPictureSearchService;
use \Service\Impl\TwitterSearchService;
use Domain\Aggregator;
use Domain\Sorter\DateSorter;
use Service\Impl\XAggregatorService;

class SearchServiceFactory {

    public function createTwitterSearchService() {
        return new TwitterSearchService(
                '4225062051-BIpaPesLOJdMvYLp0qvDrjnUzgl26b0qMovevxT', 
                '4y9XV7bhPE5Lkb3UhXj2LEGkV7K9qslVbroHtOiZVvs5M', 
                '5rH5BfAMEncvUS0FAVrfESahI', 
                'K9y1kgVRIjSTkwttSCJM871wOXkN15rlhkWC5WZuYxpdZau5SN'
        );
    }

    public function createMobiPictureSearchService() {
        return new MobiPictureSearchService();
    }
    
    public function createAggregatorSearchService() {
        $aggregator = new Aggregator();
        $aggregator->setSorter(new DateSorter());

        $aggregatorService = new XAggregatorService([
            $this->createTwitterSearchService(),
            $this->createMobiPictureSearchService()
                ], $aggregator);
        return $aggregatorService;
    }

}
