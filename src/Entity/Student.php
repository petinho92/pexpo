<?php namespace Application\Entity;

use Atomino\Carbon\Attributes\Modelify;
use Application\Atoms\Entity\_Student;
use Atomino\Carbon\Attributes\Validator;
use Atomino\Carbon\Plugins\Created\Created;
use Atomino\Carbon\Plugins\Guid\Guid;
use Atomino\Carbon\Validation\UniqueEntity;
use Symfony\Component\Validator\Constraints\NotBlank;


#[Created]
#[Guid]
#[Validator('name', NotBlank::class, ['message' => 'Please enter your name!'])]
#[Validator('neptun', NotBlank::class, ['message' => 'Please enter your Neptun code!'])]
#[Validator('email', NotBlank::class, ['message' => 'Please enter your email address!'])]
#[Validator('major', NotBlank::class, ['message' => 'Please select major!'])]
#[Validator('semester', NotBlank::class, ['message' => 'Please select semester!'])]
#[Validator(null, UniqueEntity::class, ['fields'=>['neptun']])]
#[Validator(null, UniqueEntity::class, ['fields'=>['email']])]

#[Modelify(\Application\Database\DefaultConnection::class, 'student', true)]
class Student extends _Student{
    public function getQRCode(){
        return "MIK51-PE-student-".$this->id.'-'.md5($this->guid);
    }
}