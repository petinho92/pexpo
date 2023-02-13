<?php namespace Application\Entity;

use Atomino\Carbon\Attributes\Modelify;
use Application\Atoms\Entity\_Eventlog;


#[Modelify(\Application\Database\DefaultConnection::class, 'eventlog', true)]
class Eventlog extends _Eventlog{

}