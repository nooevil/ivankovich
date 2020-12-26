<?php

namespace Diskinternals\LanguageDomain\Classes;
use System\Classes\PluginBase;
use RainLab\Translate\Classes\Translator;
use Cms\Classes\Controller;
use Illuminate\Support\Facades\Response;
use Session;

class LangMiddleware
{
	static public function DomainLocale($domain, $locale='') {
		$locale_from_domain['en'] = 'www.victoriaivankovich.com';
		$locale_from_domain['ua'] = 'ua.victoriaivankovich.com';
		$locale_from_domain['ru'] = 'ru.victoriaivankovich.com';

		
		if ($locale=='') {
			foreach ($locale_from_domain as $l => $d){
				if (strcasecmp($domain, $d)==0) return $l;
			}

			return "en";
		} else {			
			return $locale_from_domain[$locale];
		}
	}	
	
    const SESSION_LOCALE = 'rainlab.translate.locale';

    public function handle($request, $next)
    {		
		$uri = $request->segment(1);
		if (($uri!=='go') && ($uri!=='cp'))
			if (strlen($uri)==2) {
				trace_log('In path lang removed '.$request->url());	
				$page404 = (new Controller())->render('404');
				return response($page404, 404);
			}
		

		
        $serverName = $request->server->get('SERVER_NAME');		
		$locale = self::DomainLocale($serverName);
				
		$translator = Translator::instance();
		$translator->isConfigured();	
		$translator->setLocale($locale);
		
		// force overwrite locale in session
        //Session::put('bob', $locale);
		//dd(Session::all());					
		
        $x = $next($request);
		
		// в редиких случаях (когда в куках остоется локаль)
		// нужно поставить ее второй раз. хз почему так, но работает
		
		$translator->setLocale($locale);
		
		return $x;
    }
}