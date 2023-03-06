<?php namespace Application\Missions\Admin\Api;

use Application\Entity\Config;
use Application\Entity\User;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Carbon\ValidationError;
use Atomino\Gold\Goldify;
use Atomino\Mercury\Responder\Api\Api;
use Atomino\Mercury\Responder\Api\Attributes\Route;
use function Atomino\debug;


#[Goldify(Config::class, User::ROLE_WEBMASTER)]
class ConfigApi extends Api
{
    /**
     * @throws ValidationError
     */
    #[Route(self::POST, "/save")]
    public function saveConfig()
    {
        $input = $this->data->all();
        $first = Config::search()->asc("id")->collect();
        $first !== null && $first[0]->id !== null ? $config = Config::pick($first[0]->id) : $config = Config::create();
        $config->counter = $input["counter1"];
        $config->registration = $input['registration1'];
        $config->save();

    }

    #[Route(self::GET, "/get")]
    public function getConfig()
    {
        $first = Config::search()->asc("id")->collect();
        debug($first);
        return Config::pick($first[0]->id);
    }
}