<?php 
class Cms5fe1e87a02da6470693779_7936334129d715bfea0fb39753cf2518Class extends Cms\Classes\PageCode
{
public function onStart()
{
    $this['path_page_js'] = mix('js/product.js', 'themes/lovata-shopaholic-sneakers/assets');
    $this['path_page_css'] = mix('css/product.css', 'themes/lovata-shopaholic-sneakers/assets');

    //Get product and first offer item
    $obProductItem = $this->ProductPage->get();
    if (empty($obProductItem)) {
        dd($this->ProductPage);
        return;
    }

    $obOfferList = $obProductItem->offer;

    /* bob */
    
	$obFirstOfferItem = false;	
    foreach($obOfferList as $obOfferItem) {
        if ($obOfferItem->price >0) {
            $obFirstOfferItem = $obOfferItem;
            break;
        };
    }
    
    /* end test */
    
	// old code 
	if  (!$obFirstOfferItem)
		$obFirstOfferItem = $obOfferList->first();
		
    //Get offer list    
    //$obFirstOfferItem = $obOfferList->first();
    

    //Get size property and prepare "choose size" array    
    $arChooseSize = [];
    $obSizeProperty = $obFirstOfferItem->property->getByCode('size');
    if ($obSizeProperty->isNotEmpty()) {
        foreach($obOfferList as $obOfferItem) {
            $arChooseSize[$obOfferItem->id] = $obOfferItem->property->find($obSizeProperty->id)->property_value->getValueString();
        }
    }

    natsort($arChooseSize);

    $this['obProduct'] = $obProductItem;
    $this['obRelatedProductList'] = $obProductItem->related;
    $this['obOffer'] = $obFirstOfferItem;
    $this['obOfferList'] = $obOfferList;
    $this['arChooseSize'] = $arChooseSize;

    $this['bHasReviewsPlugin'] = \System\Classes\PluginManager::instance()->hasPlugin('Lovata.ReviewsShopaholic') && !\System\Classes\PluginManager::instance()->isDisabled('Lovata.ReviewsShopaholic');
    $this['bHasWishListPlugin'] = \System\Classes\PluginManager::instance()->hasPlugin('Lovata.WishListShopaholic') && !\System\Classes\PluginManager::instance()->isDisabled('Lovata.WishListShopaholic');
}
public function onInit()
{
    $obManager = \Cms\Classes\ComponentManager::instance();
    if ($obManager->hasComponent('Lovata\ReviewsShopaholic\Components\MakeReview')){
        $this->addComponent('Lovata\ReviewsShopaholic\Components\MakeReview', 'MakeReview', [ 'mode' => 'ajax']);
    }
}
}
