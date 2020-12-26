<?php 
class Cms5fe669fda9a58426247622_6e0ae8e6c8261ccddd6476327cdf8db3Class extends Cms\Classes\LayoutCode
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
