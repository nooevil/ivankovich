<?php namespace Diskinternals\LanguageDomain\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'diskinternals_languagedomain_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
	
	
	public static function DisabledLocales()
    {
		$s = self::get('disabled_locales');
		$locales = explode("\n", $s);
		
		$result = [];
		
		foreach ($locales as &$locale) {
			$locale = trim($locale);
			$result[$locale]=true;
		}
		
		return $result;
	}
	
	public static function PublicAccessToDebugDomains()
	{
		return self::get('dev_domains_public_access_enabled');
	}	
}