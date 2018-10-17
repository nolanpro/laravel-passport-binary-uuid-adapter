<?php

namespace Yaquawa\Laravel\PassportBinaryUuidAdapter\Bridge;

use Yaquawa\Laravel\PassportBinaryUuidAdapter\Helper;
use Laravel\Passport\Bridge\AccessToken as BaseAccessToken;

class AccessToken extends BaseAccessToken
{
    public function setUserIdentifier($identifier)
    {
        if ($identifier) {
            $identifier = Helper::encodeUuid($identifier);
        }
        parent::setUserIdentifier($identifier);
    }

    public function getUserIdentifier()
    {
        if ($this->userIdentifier) {
            return Helper::decodeUuid($this->userIdentifier);
        }
        return $this->userIdentifier;
    }
}