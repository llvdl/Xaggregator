<?php

namespace Domain\Sorter;
use Domain\SocialResult;

class DateSorter implements SocialResultSorter {
    
    public function sort(SocialResult $itemA, SocialResult $itemB) {
        $timestampA = $itemA->getTimestamp();
        $timestampB = $itemB->getTimestamp();
        
        return -1 * ($timestampA < $timestampB ? -1 : ($timestampB < $timestampA ? 1 : 0)); 
    }
}
