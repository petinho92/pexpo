<?php

namespace Application\Missions\Web\Api;

use Application\Entity\Config;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;

class ConfigApi extends Api
{
    #[Route(self::GET, "/get")]
    public function getConfig(){
        $first = Config::search()->asc("id")->collect();
        return Config::pick($first[0]->id);
    }
}