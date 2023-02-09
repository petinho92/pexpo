<?php namespace Application\Missions\Web\Api;

use Application\Entity\Content;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;

class ContentApi extends Api{

    #[Route(self::GET,  '/getcontent/getall')]
    public function getAll(){
        return Content::search()->collect();
    }


}
