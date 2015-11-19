<?php

namespace Service\Impl;

use Domain\SocialResult;

/**
 * Description of MobiPictureSearchService
 *
 * @author Freshheads
 */
class MobiPictureSearchService implements \Service\SocialSearchService {

    public function search($query) {
        // dummy implementation
        return [
            new SocialResult(
                    'lennaert', 
                    'http://php.net/images/logo.php', 
                    'een opdracht voor #freshheads http://freshheads.nl', 
                    strtotime('2015-11-01T13:03:00+00:00')
            ),
            new SocialResult(
                    'lennaert', 
                    'http://php.net/images/logo.php', 
                    'dit komt #net #binnen #freshheads, gezocht op ' . $query, 
                    time()
            )
        ];
    }
}
