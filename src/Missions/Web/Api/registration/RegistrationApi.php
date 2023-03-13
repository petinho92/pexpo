<?php namespace Application\Missions\Web\Api\registration;

use Application\Missions\Web\Services\EmailService;
use Application\Missions\Web\Services\StudentService;
use Atomino\Carbon\ValidationError;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationApi extends Api{
    public function __construct(private StudentService $studentService, private EmailService $emailService)
    {
    }

    #[Route(self::POST, '/save')]
    public function studentPost()
    {
        try {
           $student = $this->studentService->create($this->data->all());
           $this->emailService->create($student);
        } catch (ValidationError $error) {
            $this->setStatusCode(422);
            return $error->getMessages();
        }
        return array(
            'statusCode' => http_response_code(200),
        );
    }
}
