<?php namespace Application\Missions\Web\Services;

use Application\Entity\Student;
use Application\Entity\Config;
use Symfony\Component\Validator\Constraints\Date;
use function Atomino\debug;

class StudentService
{


    public function create(array $input)
    {
        $now = new \DateTime();
        $timeFormat = "Y-m-d H:i:s";
        $query = Config::search()->select(Config::registration)->value();
        $encoded = json_decode($query, true);
        $startDate = new \DateTime($encoded["start_date"]);
        $endDate = new \DateTime($encoded["end_date"]);
        $activeRegistraton = $encoded['active'];

        if ($activeRegistraton && $startDate->format($timeFormat) < $now->format($timeFormat) && $endDate->format($timeFormat) > $now->format($timeFormat)) {
            debug("siker");
        } else {
            debug("beszoptad");
        }
    }

}
