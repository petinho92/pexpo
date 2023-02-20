<?php namespace Application\Missions\Web\Api;

use Application\Entity\Sponsor;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;

class SponsorApi extends Api
{

    #[Route(self::GET, '/')]
    function getSponsor()
    {
        $result = Sponsor::search(Filter::where(Sponsor::active(true)))->collect();
        $array = array();
        foreach ($result as $data) {
            if ($data->picture->files) {
                $array[] = (object)[
                    'id' => $data->id,
                    'name' => $data->name,
                    'website' => $data->website,
                    'logo' => ($data->getAttachmentStorage()->url) . ($data->picture->first->filename)
                ];
            }
        }
        return $array;
    }
}
