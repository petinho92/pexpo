<?php namespace Application\Missions\Web;

use Application\Missions\Web\Api\ConfigApi;
use Application\Missions\Web\Api\HotelApi;
use Application\Missions\Web\Api\ContentApi;
use Application\Missions\Web\Api\GalleryApi;
use Application\Missions\Web\Api\ProgramguideApi;
use Application\Missions\Web\Api\SponsorApi;
use Application\Missions\Web\Api\TimelineApi;
use Atomino\Bundle\Authenticate\SessionAuthenticator;
use Atomino\Mercury\Responder\Smart\Cache\Middleware\Cache;

class Router extends \Atomino\Mercury\Router\Router {

	public function __construct(protected SessionAuthenticator $authenticator) { }

	public function route():void{
		$this(method: 'GET', path: '/')?->pipe(Cache::class)->pipe(Page\Index::class);
		$this(method: 'GET', path: '/gallery/**')?->pipe(Cache::class)->pipe(GalleryApi::class);
        $this(method: 'GET', path: '/content/**')?->pipe(Cache::class)->pipe(ContentApi::class);
        $this(method: 'GET', path: '/hotel/**')?->pipe(Cache::class)->pipe(HotelApi::class);
        $this(method: 'GET', path: '/sponsor/**')?->pipe(Cache::class)->pipe(SponsorApi::class);
        $this(method: 'GET', path: '/programguide/**')?->pipe(Cache::class)->pipe(ProgramguideApi::class);
        $this(method: 'GET', path: '/timeline/**')?->pipe(Cache::class)->pipe(TimelineApi::class);
        $this(method: 'GET', path: '/config/**')?->pipe(Cache::class)->pipe(ConfigApi::class);
		$this()?->pipe(Page\Error404::class);
	}

}
