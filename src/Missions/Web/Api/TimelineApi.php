<?php namespace Application\Missions\Web\Api;

use Application\Entity\Timeline;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;

class TimelineApi extends Api{

    #[Route(self::GET, '/get/all')]
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

    #[Route(self::GET, '/get/:year')]
    function getTimelineByYear(int $year){
        $result = Timeline::search(Filter::where(Timeline::active(true))->and(Timeline::year($year)));
        $array = array();
        foreach ($result as $data) {
            $array[] = (object)[
                'year' => $data->year,
                'hu_title' => $data->hu_title,
                'en_title' => $data->en_title,
                'hu_desc' => $data->hu_desc,
                'en_desc' => $data->en_desc
            ];
        }
        return $array;
    }

    #[Route(self::GET, '/get/:lang')]
    function getTimelineByLang(string $lang){
        $result = Timeline::search(Filter::where(Timeline::active(true))->collect());
        foreach ($result as $item){
            if($lang == 'hu') return ['year' => $item->year, 'hu_title' => $item->hu_title, 'hu_desc' => $item->hu_desc];
            else if($lang == 'en') return ['year' => $item->year, 'en_title' => $item->en_title, 'en_desc' => $item->en_desc];
            else return null;
        }
    }


}
