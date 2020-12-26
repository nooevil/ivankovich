<?php namespace Lovata\PropertiesShopaholic\Classes\Item;

use Lovata\PropertiesShopaholic\Models\Measure;

use Lovata\Toolbox\Classes\Item\ElementItem;

/**
 * Class MeasureItem
 * @package Lovata\PropertiesShopaholic\Classes\Item
 * @author Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 *
 * @see \Lovata\PropertiesShopaholic\Tests\Unit\Item\MeasureItemTest
 *
 * @property int    $id
 * @property string $name
 */
class MeasureItem extends ElementItem
{
    const MODEL_CLASS = Measure::class;

    /** @var Measure */
    protected $obElement = null;
}
