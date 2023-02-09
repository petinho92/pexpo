<?php namespace Application\Missions\Admin\Api;

use Application\Missions\Admin\Services\QRService;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Auth;
use Atomino\Mercury\Responder\Api\Attributes\Route;

class ScannerApi extends Api {
    public function __construct(private QRService $qrService)
    {
    }

//    #[Auth]
//    #[Route(self::POST, '/processingQRCode')]


}
