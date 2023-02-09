<?php namespace Application\Missions\Admin;

use Application\Missions\Admin\Api\AuthApi;
use Application\Missions\Admin\Api\ContentApi;
use Application\Missions\Admin\Api\DashboardApi;
use Application\Missions\Admin\Api\GalleryApi;
use Application\Missions\Admin\Api\HotelApi;
use Application\Missions\Admin\Api\ProgramGuideApi;
use Application\Missions\Admin\Api\SponsorApi;
use Application\Missions\Admin\Api\UserApi;
use Atomino\Bundle\Authenticate\SessionAuthenticator;
use Atomino\Mercury\Responder\Smart\Cache\Middleware\Cache;

class Router extends \Atomino\Mercury\Router\Router {

	public function __construct(protected SessionAuthenticator $authenticator) { }

	public function route():void{
		$this(method: 'GET', path: '/')?->pipe(Cache::class)->pipe(Page\Index::class);
		$this(path: '/api/auth/**')?->pipe(AuthApi::class);
		$this(path: '/api/dashboard/**')?->pipe(DashboardApi::class);
		$this(path: '/api/user/**')?->pipe(UserApi::class);
		$this(path: '/api/content/**')?->pipe(ContentApi::class);
		$this(path: '/api/gallery/**')?->pipe(GalleryApi::class);
		$this(path: '/api/hotel/**')?->pipe(HotelApi::class);
        $this(path: '/api/sponsor/**')?->pipe(SponsorApi::class);
        $this(path: '/api/programguide/**')?->pipe(ProgramGuideApi::class);

	}

}
