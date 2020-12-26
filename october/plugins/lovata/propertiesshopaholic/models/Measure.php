<?php namespace Lovata\PropertiesShopaholic\Models;

use Model;
use Kharanenka\Scope\NameField;
use October\Rain\Database\Traits\Validation;
use Lovata\Toolbox\Traits\Helpers\TraitCached;

/**
 * Class Measure
 * @package Lovata\PropertiesShopaholic\Models
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 *
 * @mixin \October\Rain\Database\Builder
 * @mixin \Eloquent
 *
 * @property int                                          $id
 * @property string                                       $name
 * @property \October\Rain\Argon\Argon                    $created_at
 * @property \October\Rain\Argon\Argon                    $updated_at
 *
 * @property \October\Rain\Database\Collection|Property[] $property
 * @method static \October\Rain\Database\Relations\HasMany|Property property()
 */
class Measure extends Model
{
    use NameField;
    use Validation;
    use TraitCached;

    public $table = 'lovata_properties_shopaholic_measure';

    public $implement = [
        '@RainLab.Translate.Behaviors.TranslatableModel',
    ];

    public $translatable = ['name'];

    /** @var array Validation */
    public $rules = [
        'name' => 'required',
    ];

    public $attributeNames = [
        'name' => 'lovata.toolbox::lang.field.name',
    ];

    public $dates = ['created_at', 'updated_at'];

    public $hasMany = [
        'property' => [Property::class]
    ];

    public $fillable = [
        'name',
    ];

    public $cached = [
        'id',
        'name',
    ];

    /**
     * Before delete method
     */
    public function beforeDelete()
    {
        //Clear property links
        $arProperties = $this->property;
        if ($arProperties->isEmpty()) {
            return;
        }

        foreach ($arProperties as $obProperty) {
            $obProperty->measure_id = null;
            $obProperty->save();
        }
    }
}
