<?php namespace Application\Missions\Admin\Api\scanner;

use Application\Entity\Eventlog;
use Application\Entity\User;
use Application\Missions\Admin\Services\QRService;
use Atomino\Gold\Goldify;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;
use function Atomino\debug;

#[Goldify(Eventlog::class, User::ROLE_SCANNER)]
class ScannerApi extends Api{

    public function __construct(private QRService $qrService)
    {
    }

    #[Route(self::POST, '/save')]
    public function processingQR(): array
    {
        if($this->data->get('date') != "" && $this->data->get('qrcode') != "" && $this->data->get("room") !== "" && $this->data->get("phase") != ""){
            $code = $this->qrService->checkByHash($this->data->get("qrcode"));
            if($code){
                $result = $this->qrService->createEventLog($this->data->all());
                return array(
                    'statusCode' => 200,
                    'qrcode' => $result->qrcode,
                    'name' => $code["name"],
                    'neptun' => $code["neptun"]
                );
            }
            else return array(
                'statusCode' => 422,
                'message' => "Nem található ilyen vonalkód!"
            );

        }

        else return array(
            'statusCode' => 422,
            'message' => "Mezők kitöltése kötelező!"
        );
    }
}