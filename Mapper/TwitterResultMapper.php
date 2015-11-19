<?php

namespace Mapper;

use Domain\SocialResult;

class TwitterResultMapper {
    /**
     * @param stdClass $item deserialized json response for twitter tweet
     * @return SocialResult
     */
    public function mapToSocialResult($item) {
        return new SocialResult(
                $item->user->name, 
                $item->user->profile_image_url_https, 
                $item->text, 
                strtotime($item->created_at)
        );
    }

}
