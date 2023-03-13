<?php namespace Application\Missions\Web\Services;

class QRService{
    public function __construct(private StudentService $studentService)
    {
    }

    public function checkByHash($code)
    {
        //MIK51-PE-student-4-fd096763ed3e12a95713912cf66a40ee
        if(preg_match('(MIK51-PE-[s|g][a-z]*-[0-9]+-[0-9a-zA-Z]*)', $code)){
            $data = explode("-", $code);
            if($data[1] === 'student'){
                if($this->studentService->checkByHash($data[3],$data[4])){
                    return $this->studentService->getStudentNameByID($data[3]);
                }else{
                    return false;
                }
            }
//            if($data[1] === 'guest'){
//                if($this->guestService->checkByHash($data[2],$data[3])){
//                    return $this->guestService->getGuestNamebyID($data[2]);
//                }else{
//                    return false;
//                }
//            }
            return false;
        }
    }
}