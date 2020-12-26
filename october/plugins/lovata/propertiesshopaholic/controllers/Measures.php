<?php namespace Lovata\PropertiesShopaholic\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;

/**
 * Class Measures
 * @package Lovata\PropertiesShopaholic\Controllers
 * @author Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class Measures extends Controller
{
    public $implement = [
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.FormController',
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    /**
     * Measures constructor.
     */
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('October.System', 'system', 'settings');
        SettingsManager::setContext('Lovata.PropertiesShopaholic', 'shopaholic-menu-measure');
    }
}