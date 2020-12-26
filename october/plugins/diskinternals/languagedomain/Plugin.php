<?php namespace Diskinternals\LanguageDomain;

use App;
use Request;
use Response;
use Cms\Classes\Controller;
use Config;
use System\Classes\PluginBase;
use RainLab\Translate\Classes\Translator;
use Cms\Classes\Page;
use RainLab\Sitemap\Models\Definition;
use System\Classes\SettingsManager;
use \Backend\Facades\BackendAuth as BackendAuth;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
           'Diskinternals\LanguageDomain\Components\LangHelper' => 'langhelper',
        ];
    }
	

	public function registerSettings()
	{
		return [
			'settings' => [
				'label'       => 'Lang By Domain',
				'description' => 'Lang By Domain Settings',
				'category'    => SettingsManager::CATEGORY_CMS,
				'icon'        => 'icon-save',
				'class'       => 'Diskinternals\LanguageDomain\Models\Settings',
				'order'       => 500,
			]
		];
	}    
	
	private function isBackendRequest()
    {
        return starts_with(
            trim(Request::path(), '/'),
            trim(Config::get('cms.backendUri', 'backend'), '/')
        );
    }

	
    public function boot()
    {
        //add RouteCacheMiddleware as a global middleware to intercept all routes
        $this->app['Illuminate\Contracts\Http\Kernel']->pushMiddleware('Diskinternals\LanguageDomain\Classes\LangMiddleware');
		
		if (Config::get('app.debug')) {
			$is_public_access = \Diskinternals\LanguageDomain\Models\Settings::PublicAccessToDebugDomains();
			
			if ($is_public_access) {
				// do nothing
			} else {
				\Event::listen('cms.page.start', function ($controller) {
					$is_user_logged   = BackendAuth::check();
					$is_backend		  = $this->isBackendRequest();	
				
					if ($is_user_logged || $is_backend) {
						// do nothing
					} else {
						// make 404
						$page404 = 'Page Not found';
						return Response($page404, 404);
					}
				});				
			}
		}		
    }
  

	public function registerMarkupTags() {
        return [
            'filters' 	=>[
							'localefix' => [$this, 'localefix'],							
						],
						
			'functions' => [
							'log_timing' => [$this, 'log_timing'],
						],
        ];
    }

	public function log_timing($time, $comment='') {
		$time = microtime(true) - $time;		
		$url  = Request::url();
		trace_log($comment.' time: '.$time.' for '.\url::to($url).' params: '.json_encode(Request::all()));
	}
		
    public function localefix($url) {		
		$result = $url;
		$e = explode('/', trim($url, '/'));

		
		if ((count($e)>1) && (strlen($e[0])==2)) {
			array_shift($e);
		
			$result='';
			foreach ($e as $slug) {
				$result .='/'.$slug;
			}
			
		}
		
        return $result.'/';
    }  
	

}
