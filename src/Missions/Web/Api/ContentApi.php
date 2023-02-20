<?php namespace Application\Missions\Web\Api;

use Application\Entity\Content;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;

class ContentApi extends Api
{

    #[Route(self::GET, '/get/:page')]
    public function getpage(string $page)
    {
        $tmp = Content::search(Filter::where(Content::page($page))->and(Content::active(true)))->collect();
        $array = array();
        foreach ($tmp as $content) {
                $array[] = (object)[
                    'page' => $content->page,
                    'content_hu' => $content->content_hu,
                    'content_en' => $content->content_en
                ];
        }
        return $array;
    }

    #[Route(self::GET, '/get/:page/:lang')]
    public function getContentByLang(string $page, string $lang)
    {
        $tmp = Content::search(Filter::where(Content::page($page))->and(Content::active(true)))->collect();
        foreach ($tmp as $content) {
                if ($lang == "hu") return $content->content_hu;
                else if ($lang == "en") return $content->content_en;
                else return null;
        }
    }

    #[Route(self::GET, '/get/:page/:category/:lang')]
    public function getContentByLangContentPage(string $page, string $category, string $lang)
    {
        $tmp = Content::search(Filter::where(Content::page($page))->and(Content::category($category))->and(Content::active(true)));
        foreach ($tmp as $content) {
            if ($lang == "hu") return $content->content_hu;
            else if ($lang == "en") return $content->content_en;
            else return null;
        }
    }

}
