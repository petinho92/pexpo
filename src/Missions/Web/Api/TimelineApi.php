<?php namespace Application\Missions\Web\Api;

use Application\Entity\Timeline;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;

class TimelineApi extends Api{

    #[Route(self::GET, '/')]
    function getTimeline(){
        $result = Timeline::search(Filter::where(Timeline::active(true)))->desc(Timeline::year)->collect();
        $array = array();
        foreach ($result as $data) {
            $array[] = (object)[
                'id' => $data->id,
                'year' => $data->year,
                'hu_title' => $data->hu_title,
                'en_title' => $data->en_title,
                'hu_desc' => $data->hu_desc,
                'en_desc' => $data->en_desc,
            ];
        }
        return $array;
    }
}
