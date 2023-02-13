<?php namespace Application\Missions\Web\Api;

use Application\Entity\Content;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;

class ContentApi extends Api{

    #[Route(self::GET,  '/getcontent/getall')]
    public function getAll(){
        return Content::search()->collect();
    }

    #[Route(self::GET,  '/get/:page')]
    public function getpage(string $page){
        return Content::search(Filter::where(Content::page($page)))->collect();
    }


}
