<?php namespace Diskinternals\Themeconfig;

use System\Classes\PluginBase;
use Event;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
	
	public function boot()
	{
		
		
        if (!$this->app->runningInBackend()) {
            return;
        }

        // Add "master" locale switcher to static page forms
        Event::listen('backend.form.extendFields', function($widget) {
            if (!$widget->model instanceof \RainLab\Pages\Classes\Page) {
                return;
            }

			if (!$widget->isNested) {
				$widget->addFields([
					'_locale' => [
								'type'    => FormWidgets\MasterLocaleSwitcher::class
								]
				]);
			}
        });

		
		
		\Backend\Classes\Controller::extend(function($controller) {
			$controller->addJs('/plugins/diskinternals/themeconfig/assets/js/froala.js');
		});
		
		
		Event::listen('backend.form.extendFieldsBefore', function($widget) {

			$IsPage 	  = ($widget->model instanceof \Cms\Classes\Page);
			$IsStaticPage = ($widget->model instanceof \RainLab\Pages\Classes\Page);
			//trace_log(get_class($widget->model));
			if (!$widget->isNested)
			if ( $IsPage || $IsStaticPage ) 
			{
				if ($IsPage)       $prefix = 'settings';
				if ($IsStaticPage) $prefix = 'viewBag';
				
				// Remove presets to url from title
				if (array_key_exists('preset', $widget->fields[$prefix.'[url]']))
					unset($widget->fields[$prefix.'[url]']['preset']);
				
				/*
				$widget->tabs['fields'][$prefix.'[menu_title]'] = [
					'label'   => 'Menu Title',
					'tab' 	  => 'Sidebar',
					'type'    => 'text',
					'comment' => 'Menu Title for auto generated sidebars',
				];
					
				$widget->tabs['fields'][$prefix.'[sidebar_type]'] = [
					'label'   => 'Sidebar type',
					'tab' 	  => 'Sidebar',
					'type'    => 'dropdown',
					'options' => ['sbAuto'			=> 'Auto generated navigation',
								  'sbDisabled'		=> 'Disabled',
								  'sbEnabled'		=> 'Just Sidebar Content',
								  'sbMenu'			=> 'Force Menu and Content'],
					'comment' => '',
				];
				
				*/
			}
        });
		
		
		\RainLab\Pages\Classes\Page::extend(function($model) {
			$model->translatable[] = 'viewBag[menu_title]';
		}); 
				
		
		/*
		  в какойто момент перестало работать и уходит в exception.
		  так как не нужна, то отключим пока.
		  
		\Cms\Classes\Page::extend(function($model) {
			$prop = $model->translatable;			
			array_push($prop, 'menu_title');
			$model->addDynamicProperty('translatable', $prop);
		}); 
		*/
	}
	
}
