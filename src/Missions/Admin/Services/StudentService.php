<?php namespace Application\Missions\Admin\Services;

use Application\Entity\Student;

class StudentService{

    public function getAll(): array {
        $tmp = Student::search()->collect();
        $array = array();

        foreach ($tmp as $item){
            $array[] = (object) [
                'name' => $item->name,
                'neptun' => $item->neptun,
                'email' => $item->email,
                'qrcode' => $item->getQRCode(),
                'created' => $item->created
            ];
        }
        return $array;
    }

    public function getStudentCount(): int {
        return Student::search()->count();
    }

    public function checkByHash($id, $hash){
        $student = Student::pick($id);
        if($student){
            if($hash === md5($student->neptun)){
                return true;
            }
        }return false;
    }

    public function getStudentNameNeptunbyID($id){
        if(Student::pick($id)){
            $student = Student::pick($id);
            return array(
                'name' => $student->name,
                'neptun' => $student->neptun
            );
        }
    }

}
