<?php namespace Application\Missions\Web\Services;

use Application\Entity\Student;
use Application\Entity\Config;
use Atomino\Carbon\ValidationError;
use Symfony\Component\Validator\Constraints\Date;
use function Atomino\debug;

class StudentService
{


    /**
     * @throws ValidationError
     */
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
            $student = Student::create();
            $student->name = $input['_name'];

            $email = strtolower($input['_email']);
            $emailS = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (filter_var($emailS, FILTER_VALIDATE_EMAIL) === false || $emailS != $email){
            }else{
                $student->email = $emailS;
            }
            $student->neptun = strtoupper($input['_neptun']);
            $student->major = $input['_major'];
            $student->semester = $input['_semester'];
            if (count($input['_programs']) > 1) {
                $student->programs = $input['_programs'];
            }
            $student->lang = $input['_lang'];
            $student->save();
            return $student;


            } else {
//            temporary solution
            return false;
        }
    }

}
