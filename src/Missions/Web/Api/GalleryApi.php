<?php namespace Application\Missions\Web\Api;

use Application\Entity\Gallery;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;
use function Atomino\debug;

class GalleryApi extends Api
{

    /**
     * @return array
     * Collect all galleries entity, extract values into a array, sort in descending order and return ordered array
     */
    #[Route(self::GET, '/getyears')]
    public function getYears()
    {
        $tmp = Gallery::search(Filter::where(Gallery::active(true))->andNot(Gallery::category("slider")))->collect();
        $array = [];
        foreach ($tmp as $item) {
            if (!in_array($item->year, $array, true)) {
                if ($item->picture->files) {
                    $array[] = $item->year;
                }
            }
        }
        rsort($array);
        return $array;
    }

    /**
     * @return array
     */
    #[Route(self::GET, '/')]
    public function getCollectionAllImages()
    {
        return $this->responseCreator(Gallery::search(Filter::where(Gallery::active(true))->andNot(Gallery::category("slider")))->desc(Gallery::year)->asc(Gallery::alt)->collect());
    }

    #[Route(self::GET, 'getslider')]
    public function getSlider()
    {
        return $this->responseCreator(Gallery::search(Filter::where(Gallery::active(true))->and(Gallery::category("slider")))->desc("created")->collect(1));
    }

    protected function responseCreator($data)
    {
        $array = array();
        foreach ($data as $adat) {
            if ($adat->picture->files) {
                $array[] = (object)[
                    'year' => $adat->year,
                    'category' => $adat->category,
                    'alt' => $adat->alt,
                    'url' => $adat->getAttachmentStorage()->url,
                    'imgs' => $adat->picture->files,
                    'thumbnail' => $adat->picture->first->image->crop(200, 400)->png
                ];
            }
        }
        return $array;
    }
}