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
        debug($startDate->format($timeFormat));

        $endDate = new \DateTime($encoded["end_date"]);
        $activeRegistraton = $encoded['active'];

        if ($activeRegistraton && $startDate->format($timeFormat) < $now->format($timeFormat) && $endDate->format($timeFormat) > $now->format($timeFormat)) {
            $student = Student::create();
            $student->name = $input['name'];

            debug($input);
            $email = strtolower($input['email']);
            $emailS = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (filter_var($emailS, FILTER_VALIDATE_EMAIL) === false || $emailS != $email){
            }else{
                $student->email = $emailS;
            }
            $student->neptun = strtoupper($input['neptun']);
            $student->major = $input['major'];
            $student->semester = $input['semester'];
            $student->lang = $input['lang'];
            $student->gender = $input['gender'];
            $interested1 = $input['interested1'];
            $interested2 = $input['interested2'];
            debug($interested1);
            debug($interested2);
            $student->programs = array_merge($interested1, $interested2);
//            if (count($input['programs']) > 1) {
//                $student->programs = $input['programs'];
//            }
//            $student->lang = $input['lang'];
            $student->save();
            return $student;


            } else {
//            temporary solution
            return false;
        }
    }

}
