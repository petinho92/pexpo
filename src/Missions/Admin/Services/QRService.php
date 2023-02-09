<?php namespace Application\Missions\Admin\Services;

class QRService {
    public function __construct(private StudentService $studentService)
    {
    }

    public function checkByHash($code){
        //"MIK51-PE-student-".$this->id.'-'.md5($this->neptun);
        if(preg_match('(MIK51-PE-[s][a-z]*-[0-9]+-[0-9a-zA-Z]*)', $code)){
            $data = explode("-", $code);
            if($data[2] === 'student'){
                if($this->studentService->checkByHash($data[3], $data[4])){
                    return $this->studentService->getStudentNameNeptunbyID($data[3]);
                }else return false;
            }
        }
        return false;
    }
}
