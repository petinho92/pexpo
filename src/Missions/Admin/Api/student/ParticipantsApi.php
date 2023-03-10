<?php namespace Application\Missions\Admin\Api\student;

use Application\Entity\Student;
use Application\Entity\User;
use Atomino\Gold\Goldify;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;
use function Atomino\debug;

#[Goldify(Student::class, User::ROLE_SCANNER)]
class ParticipantsApi extends Api{

    #[Route(self::GET, '/get')]
    public function getParticipants(){
        $participants = Student::search()->collect();
        $result = array();

        foreach ($participants as $student){
            $result[] = (object)[
                'name' => $student->name,
                'neptun' => $student->neptun,
                'email' => $student->email,
                'qrcode' => $student->getQRCode()
            ];
        }
        return $result;
    }
}