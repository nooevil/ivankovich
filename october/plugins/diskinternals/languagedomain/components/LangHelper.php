<?php

namespace DiskInternals\LanguageDomain\Components;

use Ini;
use Input;
use Redirect;
use Request;
use Session;
use Response;
use Cms\Classes\ComponentBase;
use RainLab\Translate\Classes\Translator;
use RainLab\Translate\Models\Locale as LocaleModel;
use October\Rain\Router\Router as RainRouter;
use Diskinternals\LanguageDomain\Models\Settings;

class LangHelper extends ComponentBase
{
	public $active_locale;
	protected $la; 
	
	public function getMenuTitle(){
		if ($this->active_locale)
			return $this->active_locale;
		else	
			return 'Lang';
	}
    public function componentDetails()
    {
        return [
            'name'        => 'DiskInternals Lang Helper',
            'description' => 'althref and local changer'
        ];
    }

	public function locales() {		
		if (isset($this->la)) 
			return $this->la;
		
		$this->la = $this->GetLocales();
		
		return $this->la;		
	}
	
	public function IsPageTranslated() {
		$la = $this->locales();
		foreach ($la as $lang){
			if (array_key_exists('active', $lang))
				return $lang['translated'];
		}
		
		return true;
	}
	
	public function NonTranslatedDo404($t, $do_redirect = true){		
		if (Input::get('force', 'na')=='')
			return false;
		
		if (Input::get('nonolang', 'na')=='')
			return false;
		
		if (($t->page->url!='/404') && ($t->page->url!='/nolang')) {
			if (!$this->IsPageTranslated()) {
				if ($do_redirect) {
					Session::put('non_translated', 'yes');
					Session::put('locales', $this->locales());
					Session::put('locales_menu_title', $this->getMenuTitle());
					
					$headers = ['Location' => '/nolang/'];
					return Response::make('', 302, $headers);		 			
					//return Redirect::to('nolang/');					
				} else {
					$t->setStatusCode(404);        
					return $t->controller->render('nolang', ['non_translated'=>true, 
														  'locales'=>$this->locales()]);								
				}
			}
		}
		//trace_log('translated '.$t->page->url);		
		return false;
	}
	
	public function fix_url($url){
		if (($url=='') || ($url=='/'))
			return '';
			else
				return $url.'/';
	}
	
	public function href_langs() {		
		$la  = $this->locales();
		$alt = [];
		foreach ($la as $locale => &$lang) {
			if ($lang['translated']) {
			//if ($lang['translated'] && (!array_key_exists('active', $lang))) {
				$lng['url'   ] = $lang['domain'].$this->fix_url($lang['url']);
				$lng['locale'] = $locale;
				array_push($alt, $lng);
			}
		}
		
		return $alt;
	}
	
	
    public function GetLocales()
    {	
        // Available locales
        $locales = collect(LocaleModel::listEnabled());		
		$disabled_locales = Settings::DisabledLocales();		
		
        $translator 	= Translator::instance();
		$active_locale 	= $translator->getLocale();
        $page 			= $this->getPage();

				
        // Transform it to contain the new urls
        $locales->transform(function ($item, $key) use ($page, $active_locale) {						
		    $result = $this->retrieveLocalizedUrl($key, $page, $active_locale);
			$result['name'] = $item;
			return $result;
        });
		
		$la = $locales->toArray();				
		
		// фильтруем локали для фронтенда
		$la2 = [];		
		foreach ($la as $key => $value)
			if (!array_key_exists($key, $disabled_locales))
				$la2[$key]=$value;
		
		$la = $la2;
		
		$this->active_locale = $active_locale;

		// trace_log($la);	

        return $la;
    }

	protected function KeyFromIniHeader($key, $ini){
		try {
			$a = Ini::parse($ini, false, INI_SCANNER_RAW);
			return $a[$key];
		} catch (Exception $e) {
			trace_log('LangHelper KeyFromIniHeader '.$e->getMessage());
		}

		return '';		
			//trace_log(strtok($raw_page, "\n"));
	}
	
    private function retrieveLocalizedUrl($locale, $page, $active_locale)
    {
        /*
         * Static Page
         */
        if (isset($page->apiBag['staticPage'])) {
            $staticPage = $page->apiBag['staticPage'];			
            $staticPage->rewriteTranslatablePageUrl($locale);
			
            $localeUrl   = array_get($staticPage->attributes, 'viewBag.url');

			$localeTitle     = '';		
			$obj = $staticPage;
			//$obj = $staticPage->noFallbackLocale()->lang($locale);  это глючит для страницы в статике /map, хотя так правильнее
			$localeTitle = $obj->getAttributeTranslated('viewBag[title]', $locale);	
			$page_translated = $staticPage->hasTranslation('viewBag[title]', $locale);	
			if (!$page_translated)			
				$localeTitle = '';
        }
        /*
         * CMS Page
         */
        else {
			$key = 'title';
			if ($locale=='en') {
				$raw_page    = array_get($page->attributes, 'content', '');  // Raw Page Content as in htm
				$raw_page    = strstr($raw_page, "==", true);				 // copy header before ==
				$localeTitle = $this->KeyFromIniHeader('title', $raw_page);
			}
			else {
				$locale_attr = sprintf('viewBag.locale%s.%s', ucfirst($key), $locale);			
				$localeTitle = array_get($page->attributes, $locale_attr, '');
			}
			
			$page_translated = strlen($localeTitle)>0;
			
			
            $page->rewriteTranslatablePageUrl($locale);
            $router = new RainRouter;
            $params = $this->getRouter()->getParameters();
            $localeUrl  = $router->urlFromPattern($page->url, $params);
        }

		if ($localeUrl!=='/')
			$localeUrl = rtrim($localeUrl, '/');
		
		if ($localeUrl=='/never_find_me_go/template_main.php') 
				$localeUrl = '/support';
			
		$x['url'  		] = $localeUrl;
		$x['title'      ] = $localeTitle;
		$x['translated'	] = $page_translated;
		$x['domain'     ] = \Diskinternals\LanguageDomain\Classes\LangMiddleware::DomainLocale('', $locale);
		
		if ($active_locale==$locale) 
			$x['active']=true;
		
        return $x;
    }

}
