<?php namespace Application\Missions\Web\Api;

use Application\Entity\Accommodation;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;

class HotelApi extends Api
{

    #[Route(self::GET, '/getcollection/gethotels')]
    public function getHotels()
    {
        $result = Accommodation::search(Filter::where(Accommodation::active(true)))->collect();
        $array = array();
        foreach ($result as $data) {
            if ($data->picture->files) {
                $array[] = (object)[
                    'id' => $data->id,
                    'name' => $data->name,
                    'star' => $data->star,
                    'location' => $data->location,
                    'email' => $data->email,
                    'hu_description' => $data->hu_desc,
                    'en_description' => $data->en_desc,
                    'hu_type' => $data->hu_type,
                    'en_type' => $data->en_type,
                    'hu_services' => $data->hu_services,
                    'en_services' => $data->en_services,
                    'telephone' => $data->telephone,
                    'website' => $data->website,
                    'maps' => $data->maps,
                    'picture' => ($data->getAttachmentStorage()->url) . ($data->picture->first->filename)
                ];
            }
        }
        return $array;
    }
}
