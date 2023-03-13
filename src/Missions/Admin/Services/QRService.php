<?php namespace Application\Missions\Admin\Services;

use Application\Entity\Eventlog;
use Atomino\Carbon\ValidationError;
use Symfony\Component\Validator\Constraints\Date;
use function Atomino\debug;

class QRService
{
    public function __construct(private StudentService $studentService)
    {
    }

    public function checkByHash($code)
    {
        //MIK51-PE-student-1-b2ef9c7b10eb0985365f913420ccb84a
        if (preg_match('(MIK51-PE-[s][a-z]*-[0-9]+-[0-9a-zA-Z]*)', $code)) {
            $data = explode("-", $code);
            if ($data[2] === 'student') {
                if ($this->studentService->checkByHash($data[3], $data[4])) {
                    return $this->studentService->getStudentNameNeptunbyID($data[3]);
                } else return false;
            }
        }
        return false;
    }

    /**
     * @throws ValidationError
     */
    public function createEventLog(array $input): Eventlog
    {
        $event = Eventlog::create();
        $event->event = "PollackExpo 2023";
        $event->date = $input['date'];
        $event->room = $input['room'];
        $event->phase = $input['phase'];
        $event->qrcode = $input['qrcode'];
        $event->save();
        return $event;
    }
}
