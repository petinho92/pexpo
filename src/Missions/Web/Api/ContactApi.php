<?php namespace Application\Missions\Web\Api;
use Application\Entity\Contact;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;
use function Atomino\debug;

class ContactApi extends Api{

    #[Route(self::GET, '/category/hu')]
    public function getCategoryHU(){
        $tmp = Contact::search(Filter::where(Contact::active(true)))->collect();
        $array = [];
        foreach ($tmp as $item){
            if(!in_array($item->section_hu, $array, true)){
                $array[] = $item->section_hu;
            }
        }
        sort($array);
        return $array;
    }
    #[Route(self::GET, '/category/en')]
    public function getCategoryEN(){
        $tmp = Contact::search(Filter::where(Contact::active(true)))->collect();
        $array = [];
        foreach ($tmp as $item){
            if(!in_array($item->section_en, $array, true)){
                $array[] = $item->section_en;
            }
        }
        sort($array);
        return $array;
    }

    #[Route(self::GET, '/')]
    public function getContact(){
        $array = array();
        $tmp = Contact::search(Filter::where(Contact::active(true)))->asc(Contact::section_hu)->collect();
        foreach ($tmp as $item){
            $array[] = (object)[
                'hu_name' => $item->prefix . " " . $item->lastname . " " . $item->firstname,
                'en_name' => $item->prefix . " " . $item->firstname . " " . $item->lastname,
                'email' => $item->email,
                'hu_section' => $item->section_hu,
                'en_section' => $item->section_en,
                'hu_major' => $item->major_hu,
                'en_major' => $item->major_en,
                'telephone' => $item->telephone,
                'mobile' => $item->mobile,
                'thumbnail' => $item?->picture?->first?->image->crop(150,150)->png
            ];
        }
        return $array;
    }

}