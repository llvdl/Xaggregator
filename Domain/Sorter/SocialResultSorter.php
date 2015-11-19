<?php

namespace Domain\Sorter;
use Domain\SocialResult;

interface SocialResultSorter {
    public function sort(SocialResult $itemA, SocialResult $itemB);
}
