<?php namespace Application\Missions\Web\Api;

use Application\Entity\Programguide;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;
use function Atomino\debug;


class ProgramguideApi extends Api
{

    #[Route(self::GET, '/getguide')]
    public function getProgramGuide()
    {
        $result = Programguide::search(Filter::where(Programguide::active(true)))->collect();
        $array = array();
        foreach ($result as $data) {
            $asd = $data->getAttachmentStorage()->url;
            $array[] = (object)[
                'id' => $data->id,
                'name' => $data->name,
                'hu_type' => $data->hu_type,
                'en_type' => $data->en_type,
                'date' => $data->date,
                'url' => $data->getAttachmentStorage()->url,
                'picture' => $data->picture->first->filename,
                'hu_files' => $data->files->files[0],
                'en_files' => $data->files->files[1]
            ];
        }
        return $array;
    }
}
