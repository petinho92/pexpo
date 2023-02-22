<?php namespace Application\Missions\Web\Api;

use Application\Entity\Programguide;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;
use function Atomino\debug;


class ProgramguideApi extends Api
{

    #[Route(self::GET, '/')]
    public function getProgramGuide()
    {
        $result = Programguide::search(Filter::where(Programguide::active(true)))->desc(Programguide::date)->collect();
        $array = array();
        foreach ($result as $data) {
            if ($data->picture->files) {
                $array[] = (object)[
                    'id' => $data->id,
                    'name' => $data->name,
                    'hu_type' => $data->hu_type,
                    'en_type' => $data->en_type,
                    'date' => $data->date,
                    'url' => $data->getAttachmentStorage()->url,
                    'picture' => $data->picture->first->image->crop(277, 208)->png,
                    'hu_files' => $data->hu_pg->first->filename,
                    'en_files' => $data->en_pg->first->filename,
                    'stand' => $data->stand->first->filename
                ];
            }
        }
        return $array;
    }
}
