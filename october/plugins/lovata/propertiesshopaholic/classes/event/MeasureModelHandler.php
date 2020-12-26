<?php namespace Lovata\PropertiesShopaholic\Classes\Event;

use Lovata\Toolbox\Classes\Event\ModelHandler;

use Lovata\PropertiesShopaholic\Models\Measure;
use Lovata\PropertiesShopaholic\Classes\Item\MeasureItem;

/**
 * Class MeasureModelHandler
 * @package Lovata\PropertiesShopaholic\Classes\Event
 * @author Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class MeasureModelHandler extends ModelHandler
{
    /** @var Measure */
    protected $obElement;
    
    /**
     * Get model class name
     * @return string
     */
    protected function getModelClass()
    {
        return Measure::class;
    }

    /**
     * Get item class name
     * @return string
     */
    protected function getItemClass()
    {
        return MeasureItem::class;
    }
}
