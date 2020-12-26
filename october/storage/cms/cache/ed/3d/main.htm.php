<?php 
class Cms5fe1b2f41e8ed291059702_874562c1f9af89437f3481d89e82983fClass extends Cms\Classes\LayoutCode
{
public function onStart()
{
    $this['path_css'] = mix('css/common.css', 'themes/lovata-shopaholic-sneakers/assets');
    $this['path_app_js'] = mix('js/common.js', 'themes/lovata-shopaholic-sneakers/assets');
    $this['path_manifest_js'] = mix('js/manifest.js', 'themes/lovata-shopaholic-sneakers/assets');
    $this['path_vendor_js'] = mix('js/vendor.js', 'themes/lovata-shopaholic-sneakers/assets');
}
public function onInit()
{
    $this['bHasWishListPlugin'] = \System\Classes\PluginManager::instance()->hasPlugin('Lovata.WishListShopaholic') && !\System\Classes\PluginManager::instance()->isDisabled('Lovata.WishListShopaholic');
}
}
