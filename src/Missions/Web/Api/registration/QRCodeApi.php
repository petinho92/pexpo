<?php namespace Application\Missions\Web\Api;

use Application\Missions\Web\Services\QRService;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;

class QRCodeApi extends Api
{
    public function __construct(private QRService $qrService)
    {
    }

    #[Route(self::GET, '/qr/:code(MIK51-PE-[s|g][a-z]*-[0-9]+-[0-9a-zA-Z]*)')]
    public function qrGet(string $code)
    {
        //MIK51-PE-student-4-fd096763ed3e12a95713912cf66a40ee
        $result = $this->qrService->checkByHash($code);
        if($result){
            return $code;
        }else return false;

    }
}