<?php 
class Cms5fe1bd3fae120809168121_98e77dc498b627258ba173b8f6231eb5Class extends Cms\Classes\PageCode
{
public function onStart()
{
    $this['path_page_js'] = mix('js/catalog.js', 'themes/lovata-shopaholic-sneakers/assets');
    $this['path_page_css'] = mix('css/catalog.css', 'themes/lovata-shopaholic-sneakers/assets');
}
public function onInit()
{
    //Get category object
    $obCategory = $this->CategoryPage->get();
    if (empty($obCategory)) {
        $obMainCategory = $this->MainCategoryPage->get();
        //dd($obMainCategory);
        if (empty($obMainCategory)) {
            return;
        } else {
            $obCategory = $obMainCategory;
        }
    }
    

    //Get active sorting and page number
    $sActiveSorting = $this->ProductList->getSorting();
    $iPage = $this->Pagination->getPageFromRequest();

    //Get brand list
    $obBrandList = $this->BrandList->make()->sort()->active()->category($obCategory->id);

    $bSaleFilter = (bool) input('sale');

    //Get filter by brand from request
    $arFilterBrandList = explode('|', input('brand'));
    $arFilterBrandIDList = [];

    //Get brand ID list for filter
    if (!empty($arFilterBrandList)) {
        foreach($obBrandList as $obBrand) {
            if (in_array($obBrand->slug, $arFilterBrandList)) {
                $arFilterBrandIDList[] = $obBrand->id;
            }
        }
    }

    //Get price filter
    $arPriceFilterValue = explode('|', input('price'));
    $fMinPriceFilterValue = array_get($arPriceFilterValue, 0);
    $fMaxPriceFilterValue = array_get($arPriceFilterValue, 1);

    //Get filter by properties
    $arFilterValue = (array) input('property');
    if (!empty($arFilterValue)) {
        foreach($arFilterValue as $sKey => &$sValue) {
            $sValue = explode('|', $sValue);
        }
    }

    $arFilterValueWithoutProperty = [];

    //Get product list with filter by category
    $obCategoryProductList = $this->ProductList->make()->active()->sort($sActiveSorting)->category($obCategory->id);

    //Get property list for filter panel
    $obProductPropertyList = $obCategory->product_filter_property;
    $obOfferPropertyList = $obCategory->offer_filter_property;

    foreach($obProductPropertyList->getIDList() as $iPropertyID) {
        $arFilterValueTemp = $arFilterValue;
        if (isset($arFilterValueTemp[$iPropertyID])) {
            unset($arFilterValueTemp[$iPropertyID]);
        }

        $arFilterValueWithoutProperty[$iPropertyID] = $arFilterValueTemp;
    }

    foreach($obOfferPropertyList->getIDList() as $iPropertyID) {
        $arFilterValueTemp = $arFilterValue;
        if (isset($arFilterValueTemp[$iPropertyID])) {
        unset($arFilterValueTemp[$iPropertyID]);
        }

        $arFilterValueWithoutProperty[$iPropertyID] = $arFilterValueTemp;
    }

    //Get product list with filter by brands and properties
    $obFilteredProductList = $obCategoryProductList->copy()->filterByBrandList($arFilterBrandIDList)->filterByPrice($fMinPriceFilterValue, $fMaxPriceFilterValue);
    if ($bSaleFilter) {
        $obFilteredProductList->filterByDiscount();
    }

    $obProductList = $obFilteredProductList->copy()
        ->filterByProperty($arFilterValue, $obProductPropertyList)
        ->filterByProperty($arFilterValue, $obOfferPropertyList);

    //Get product list for page
    $arProductList = $obProductList->page($iPage, $this->Pagination->getCountPerPage());

    //Get offers with min/max prices
    $obOfferMinPrice = $obCategoryProductList->getOfferMinPrice();
    $obOfferMaxPrice = $obCategoryProductList->getOfferMaxPrice();

    //Get max page number
    $iMaxPage = $this->Pagination->getMaxPage($obProductList->count());

    //Init template variables
    $this['obCategory'] = $obCategory;
    $this['obBrandList'] = $obBrandList;

    $this['obProductPropertyList'] = $obProductPropertyList;
    $this['obOfferPropertyList'] = $obOfferPropertyList;
    $this['arFilterValue'] = $arFilterValue;
    $this['arFilterValueWithoutProperty'] = $arFilterValueWithoutProperty;

    $this['arFilterBrandIDList'] = $arFilterBrandIDList;
    $this['fMinPriceFilterValue'] = $fMinPriceFilterValue;
    $this['fMaxPriceFilterValue'] = $fMaxPriceFilterValue;
    $this['obOfferMinPrice'] = $obOfferMinPrice;
    $this['obOfferMaxPrice'] = $obOfferMaxPrice;
    $this['bSaleFilter'] = $bSaleFilter;

    $this['sActiveSorting'] = $sActiveSorting;
    $this['iMaxPage'] = $iMaxPage;
    $this['iPage'] = $iPage;
    $this['obCategoryProductList'] = $obCategoryProductList;
    $this['obFilteredProductList'] = $obFilteredProductList;
    $this['obProductList'] = $obProductList;
    $this['arProductList'] = $arProductList;
}
}