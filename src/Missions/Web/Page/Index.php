<?php namespace Application\Missions\Web\Page;

use Atomino\Mercury\Responder\Smart\SmartResponder;
use Atomino\Mercury\Responder\Smart\Attributes\{Cache, Args, CSS, JS, Init};
use Symfony\Component\HttpFoundation\Response;
use function Atomino\debug;

#[Init( 'web', 'index.twig' )]
#[JS('/~web/index.js')]
#[CSS('/~web/index.css')]
#[Args( title: 'Pollack Expo' )]
#[Cache( 0 )]
class Index extends SmartResponder{
	public string $hello = "Hello Atomino!";
	protected function prepare(Response $response){	}
}

