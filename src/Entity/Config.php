<?php namespace Application\Entity;

use Atomino\Carbon\Attributes\Modelify;
use Application\Atoms\Entity\_Config;
use Atomino\Carbon\Plugins\Created\Created;
use Atomino\Carbon\Plugins\Updated\Updated;

#[Created]
#[Updated]
#[Modelify(\Application\Database\DefaultConnection::class, 'config', true)]
class Config extends _Config{

}