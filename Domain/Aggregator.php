<?php

namespace Domain;
use Domain\Sorter\SocialResultSorter;

class Aggregator {
    /** @var SocialResult[] */
    private $results = [];
    /** @var \Domain\Sorter\SocialResultSorter */
    private $sorter = null;

    public function setSorter(SocialResultSorter $sorter) {
        $this->sorter = $sorter;
    }
    
    public function addResults($results) {
        $this->merge($results);
    }
    
    /** @return \Domain\SocialResult[] */
    public function aggregate() {
        return $this->results;
    }
    
    private function merge($results) {
        $this->results = array_merge($this->results, $results);
        $this->sort();
    }
    
    private function sort() {
        if(!$this->sorter) {
            return;
        }
        
        $sorter = $this->sorter;
        $result = usort($this->results, function(SocialResult $itemA, SocialResult $itemB) use($sorter) {
            return $sorter->sort($itemA, $itemB);
        });
    }
}
