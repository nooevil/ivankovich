<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter-ajax.htm */
class __TwigTemplate_173176729b3bc960c479c03b7b2e247e973d59185a8a753ace7c90f5907080ae extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = array("partial" => 7, "if" => 25, "for" => 28, "set" => 29);
        $filters = array("escape" => 46);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['partial', 'if', 'for', 'set'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<form class=\"filter__form\" aria-labelledby=\"filter__form-label\">
    <span class=\"filter__form-label\" id=\"filter__form-label\">Select options for filtering. After change of any input element page will refresh</span>
    <div class=\"filter__form-wrapper webkit-scroll\">
         ";
        // line 5
        echo "    <div class=\"filter__group\" role=\"group\" aria-labelledby=\"price-input-section\">
            <b class=\"filter__group-legend\" id=\"price-input-section\">Price</b>
            ";
        // line 7
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['min_value'] =         // line 8
($context["fMinPriceFilterValue"] ?? null)        ;
        $context['__cms_partial_params']['max_value'] =         // line 9
($context["fMaxPriceFilterValue"] ?? null)        ;
        $context['__cms_partial_params']['currency'] = twig_get_attribute($this->env, $this->source,         // line 10
($context["obOfferMinPrice"] ?? null), "currency", [], "any", false, false, true, 10)        ;
        $context['__cms_partial_params']['min'] = twig_get_attribute($this->env, $this->source,         // line 11
($context["obOfferMinPrice"] ?? null), "price", [], "any", false, false, true, 11)        ;
        $context['__cms_partial_params']['max'] = twig_get_attribute($this->env, $this->source,         // line 12
($context["obOfferMaxPrice"] ?? null), "price", [], "any", false, false, true, 12)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/catalog/filter/filter-price/filter-price"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 13
        echo "        </div>
        <div class=\"filter__group _shopaholic-sale-filter-wrapper\" data-filter-type=\"checkbox\" role=\"group\" aria-labelledby=\"sale-filter\">
            ";
        // line 15
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['text'] = "Sale"        ;
        $context['__cms_partial_params']['id'] = "sale-filter"        ;
        $context['__cms_partial_params']['name'] = "sale"        ;
        $context['__cms_partial_params']['checked'] = ((        // line 19
($context["bSaleFilter"] ?? null)) ? ("checked") : (""))        ;
        $context['__cms_partial_params']['value'] = 1        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/catalog/filter/filter-checkbox/filter-checkbox"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 22
        echo "        </div>

        ";
        // line 25
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["obBrandList"] ?? null), "isNotEmpty", [], "method", false, false, true, 25)) {
            // line 26
            echo "            <div class=\"filter__group _shopaholic-brand-filter-wrapper\" data-filter-type=\"checkbox\" role=\"group\" aria-labelledby=\"brand-filter\">
                <b class=\"filter__group-legend\" id=\"brand-filter\">Brand</b>
                ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["obBrandList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["obBrand"]) {
                // line 29
                echo "                    ";
                $context["obBrandProductList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obCategoryProductList"] ?? null), "copy", [], "method", false, false, true, 29), "brand", [0 => twig_get_attribute($this->env, $this->source, $context["obBrand"], "id", [], "any", false, false, true, 29)], "method", false, false, true, 29);
                // line 30
                echo "                    ";
                $context['__cms_partial_params'] = [];
                $context['__cms_partial_params']['text'] = twig_get_attribute($this->env, $this->source,                 // line 31
$context["obBrand"], "name", [], "any", false, false, true, 31)                ;
                $context['__cms_partial_params']['id'] = ("brand-" . twig_get_attribute($this->env, $this->source,                 // line 32
$context["obBrand"], "slug", [], "any", false, false, true, 32))                ;
                $context['__cms_partial_params']['name'] = "brand[]"                ;
                $context['__cms_partial_params']['checked'] = ((twig_in_filter(twig_get_attribute($this->env, $this->source,                 // line 34
$context["obBrand"], "id", [], "any", false, false, true, 34), ($context["arFilterBrandIDList"] ?? null))) ? ("checked") : (""))                ;
                $context['__cms_partial_params']['value'] = twig_get_attribute($this->env, $this->source,                 // line 35
$context["obBrand"], "slug", [], "any", false, false, true, 35)                ;
                $context['__cms_partial_params']['disabled'] = (((twig_get_attribute($this->env, $this->source,                 // line 36
($context["obBrandProductList"] ?? null), "count", [], "method", false, false, true, 36) == 0)) ? ("disabled") : (""))                ;
                $context['__cms_partial_params']['hintText'] = (("(" . twig_get_attribute($this->env, $this->source,                 // line 37
($context["obBrandProductList"] ?? null), "count", [], "method", false, false, true, 37)) . ")")                ;
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/catalog/filter/filter-checkbox/filter-checkbox"                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 38
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obBrand'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "            </div>
        ";
        }
        // line 41
        echo "
        ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["obProductPropertyList"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["obProperty"]) {
            if (twig_get_attribute($this->env, $this->source, $context["obProperty"], "hasValue", [], "method", false, false, true, 42)) {
                // line 43
                echo "
            ";
                // line 44
                if ((((twig_get_attribute($this->env, $this->source, $context["obProperty"], "filter_type", [], "any", false, false, true, 44) == "checkbox") && (twig_get_attribute($this->env, $this->source, $context["obProperty"], "code", [], "any", false, false, true, 44) != "size")) && (twig_get_attribute($this->env, $this->source, $context["obProperty"], "code", [], "any", false, false, true, 44) != "color"))) {
                    // line 45
                    echo "                ";
                    $context["obPropertyValueList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["obProperty"], "property_value", [], "any", false, false, true, 45), "sort", [], "method", false, false, true, 45);
                    // line 46
                    echo "                <div class=\"filter__group _shopaholic-filter-wrapper\" data-filter-type=\"checkbox\" data-property-id=\"";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obProperty"], "id", [], "any", false, false, true, 46), 46, $this->source), "html", null, true);
                    echo "\" role=\"group\" aria-labelledby=\"property-filter-label-";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obProperty"], "id", [], "any", false, false, true, 46), 46, $this->source), "html", null, true);
                    echo "\">
                    <b class=\"filter__group-legend\" id=\"property-filter-label-";
                    // line 47
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obProperty"], "id", [], "any", false, false, true, 47), 47, $this->source), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obProperty"], "filter_name", [], "any", false, false, true, 47), 47, $this->source), "html", null, true);
                    echo "</b>
                    ";
                    // line 48
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["obPropertyValueList"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["obValue"]) {
                        // line 49
                        echo "                        ";
                        $context["bChecked"] = ( !twig_test_empty((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["arFilterValue"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[twig_get_attribute($this->env, $this->source, $context["obProperty"], "id", [], "any", false, false, true, 49)] ?? null) : null)) && twig_in_filter(twig_get_attribute($this->env, $this->source, $context["obValue"], "slug", [], "any", false, false, true, 49), (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["arFilterValue"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[twig_get_attribute($this->env, $this->source, $context["obProperty"], "id", [], "any", false, false, true, 49)] ?? null) : null)));
                        // line 50
                        echo "                        ";
                        $context["bDisabled"] = false;
                        // line 51
                        echo "                        ";
                        if (((($context["bChecked"] ?? null) == false) &&  !twig_test_empty((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["arFilterValueWithoutProperty"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[twig_get_attribute($this->env, $this->source, $context["obProperty"], "id", [], "any", false, false, true, 51)] ?? null) : null)))) {
                            // line 52
                            echo "                            ";
                            $context["obProductListTemp"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obFilteredProductList"] ?? null), "copy", [], "method", false, false, true, 52), "filterByProperty", [0 => (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["arFilterValueWithoutProperty"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002[twig_get_attribute($this->env, $this->source, $context["obProperty"], "id", [], "any", false, false, true, 52)] ?? null) : null), 1 => ($context["obProductPropertyList"] ?? null)], "method", false, false, true, 52), "filterByProperty", [0 => (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = ($context["arFilterValueWithoutProperty"] ?? null)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4[twig_get_attribute($this->env, $this->source, $context["obProperty"], "id", [], "any", false, false, true, 52)] ?? null) : null), 1 => ($context["obOfferPropertyList"] ?? null)], "method", false, false, true, 52);
                            // line 53
                            echo "                            ";
                            $context["bDisabled"] = twig_get_attribute($this->env, $this->source, $context["obValue"], "isDisabled", [0 => ($context["obProductListTemp"] ?? null)], "method", false, false, true, 53);
                            // line 54
                            echo "                        ";
                        }
                        // line 55
                        echo "
                        ";
                        // line 56
                        $context['__cms_partial_params'] = [];
                        $context['__cms_partial_params']['text'] = twig_get_attribute($this->env, $this->source,                         // line 57
$context["obValue"], "value", [], "any", false, false, true, 57)                        ;
                        $context['__cms_partial_params']['id'] = ("property-value-" . twig_get_attribute($this->env, $this->source,                         // line 58
$context["obValue"], "slug", [], "any", false, false, true, 58))                        ;
                        $context['__cms_partial_params']['name'] = (("property[" . twig_get_attribute($this->env, $this->source,                         // line 59
$context["obProperty"], "id", [], "any", false, false, true, 59)) . "][]")                        ;
                        $context['__cms_partial_params']['disabled'] = ((                        // line 60
($context["bDisabled"] ?? null)) ? ("disabled") : (""))                        ;
                        $context['__cms_partial_params']['checked'] = ((                        // line 61
($context["bChecked"] ?? null)) ? ("checked") : (""))                        ;
                        $context['__cms_partial_params']['value'] = twig_get_attribute($this->env, $this->source,                         // line 62
$context["obValue"], "slug", [], "any", false, false, true, 62)                        ;
                        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/catalog/filter/filter-checkbox/filter-checkbox"                        , $context['__cms_partial_params']                        , true                        );
                        unset($context['__cms_partial_params']);
                        // line 64
                        echo "                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obValue'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 65
                    echo "                </div>
            ";
                }
                // line 67
                echo "
            ";
                // line 68
                if ((((twig_get_attribute($this->env, $this->source, $context["obProperty"], "filter_type", [], "any", false, false, true, 68) == "select") && (twig_get_attribute($this->env, $this->source, $context["obProperty"], "code", [], "any", false, false, true, 68) != "size")) && (twig_get_attribute($this->env, $this->source, $context["obProperty"], "code", [], "any", false, false, true, 68) != "color"))) {
                    // line 69
                    echo "                ";
                    $context["obPropertyValueList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["obProperty"], "property_value", [], "any", false, false, true, 69), "sort", [], "method", false, false, true, 69);
                    // line 70
                    echo "                <div  class=\"filter__group _shopaholic-filter-wrapper\" data-property-id=\"";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obProperty"], "id", [], "any", false, false, true, 70), 70, $this->source), "html", null, true);
                    echo "\" data-filter-type=\"select\" role=\"group\" aria-labelledby=\"property-filter-label-";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obProperty"], "id", [], "any", false, false, true, 70), 70, $this->source), "html", null, true);
                    echo "\">
                    <b class=\"filter__group-legend\" id=\"property-filter-label-";
                    // line 71
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obProperty"], "id", [], "any", false, false, true, 71), 71, $this->source), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obProperty"], "filter_name", [], "any", false, false, true, 71), 71, $this->source), "html", null, true);
                    echo "</b>
                    ";
                    // line 72
                    $context['__cms_partial_params'] = [];
                    $context['__cms_partial_params']['obProperty'] =                     // line 73
$context["obProperty"]                    ;
                    $context['__cms_partial_params']['arFilterValueWithoutProperty'] =                     // line 74
($context["arFilterValueWithoutProperty"] ?? null)                    ;
                    $context['__cms_partial_params']['obProductPropertyList'] =                     // line 75
($context["obProductPropertyList"] ?? null)                    ;
                    $context['__cms_partial_params']['obOfferPropertyList'] =                     // line 76
($context["obOfferPropertyList"] ?? null)                    ;
                    $context['__cms_partial_params']['obFilteredProductList'] =                     // line 77
($context["obFilteredProductList"] ?? null)                    ;
                    $context['__cms_partial_params']['obPropertyValueList'] =                     // line 78
($context["obPropertyValueList"] ?? null)                    ;
                    $context['__cms_partial_params']['arFilterValue'] =                     // line 79
($context["arFilterValue"] ?? null)                    ;
                    $context['__cms_partial_params']['text'] = "Any"                    ;
                    echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/catalog/filter/filter-select/filter-select"                    , $context['__cms_partial_params']                    , true                    );
                    unset($context['__cms_partial_params']);
                    // line 82
                    echo "                </div>
            ";
                }
                // line 84
                echo "        ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obProperty'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 85
        echo "
        ";
        // line 86
        $context["obPropertySize"] = twig_get_attribute($this->env, $this->source, ($context["obOfferPropertyList"] ?? null), "getByCode", [0 => "belts-size"], "method", false, false, true, 86);
        // line 87
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "property_value", [], "any", false, false, true, 87), "isNotEmpty", [], "method", false, false, true, 87)) {
            // line 88
            echo "            ";
            $context["obPropertyValueList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "property_value", [], "any", false, false, true, 88), "sort", [], "method", false, false, true, 88);
            // line 89
            echo "            <div class=\"filter__group _shopaholic-filter-wrapper\" data-filter-type=\"checkbox\" data-property-id=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 89), 89, $this->source), "html", null, true);
            echo "\" role=\"group\" aria-labelledby=\"property-filter-label-";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 89), 89, $this->source), "html", null, true);
            echo "\">
                <b class=\"filter__group-legend\" id=\"property-filter-label-";
            // line 90
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 90), 90, $this->source), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "filter_name", [], "any", false, false, true, 90), 90, $this->source), "html", null, true);
            echo "</b>
                <ul class=\"filter__group-list filter-size\">
                    ";
            // line 92
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["obPropertyValueList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["obValue"]) {
                // line 93
                echo "                        ";
                $context["bChecked"] = ( !twig_test_empty((($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = ($context["arFilterValue"] ?? null)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 93)] ?? null) : null)) && twig_in_filter(twig_get_attribute($this->env, $this->source, $context["obValue"], "slug", [], "any", false, false, true, 93), (($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = ($context["arFilterValue"] ?? null)) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 93)] ?? null) : null)));
                // line 94
                echo "                        ";
                $context["bDisabled"] = false;
                // line 95
                echo "                        ";
                if (((($context["bChecked"] ?? null) == false) &&  !twig_test_empty((($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = ($context["arFilterValueWithoutProperty"] ?? null)) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 95)] ?? null) : null)))) {
                    // line 96
                    echo "                            ";
                    $context["obProductListTemp"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obFilteredProductList"] ?? null), "copy", [], "method", false, false, true, 96), "filterByProperty", [0 => (($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = ($context["arFilterValueWithoutProperty"] ?? null)) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 96)] ?? null) : null), 1 => ($context["obProductPropertyList"] ?? null)], "method", false, false, true, 96), "filterByProperty", [0 => (($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 = ($context["arFilterValueWithoutProperty"] ?? null)) && is_array($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386) || $__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 instanceof ArrayAccess ? ($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 96)] ?? null) : null), 1 => ($context["obOfferPropertyList"] ?? null)], "method", false, false, true, 96);
                    // line 97
                    echo "                            ";
                    $context["bDisabled"] = twig_get_attribute($this->env, $this->source, $context["obValue"], "isDisabled", [0 => ($context["obProductListTemp"] ?? null)], "method", false, false, true, 97);
                    // line 98
                    echo "                        ";
                }
                // line 99
                echo "                        ";
                $context['__cms_partial_params'] = [];
                $context['__cms_partial_params']['id'] = ("property-value-" . twig_get_attribute($this->env, $this->source,                 // line 100
$context["obValue"], "slug", [], "any", false, false, true, 100))                ;
                $context['__cms_partial_params']['name'] = (("property[" . twig_get_attribute($this->env, $this->source,                 // line 101
($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 101)) . "][]")                ;
                $context['__cms_partial_params']['value'] = twig_get_attribute($this->env, $this->source,                 // line 102
$context["obValue"], "slug", [], "any", false, false, true, 102)                ;
                $context['__cms_partial_params']['disabled'] = ((                // line 103
($context["bDisabled"] ?? null)) ? ("disabled") : (""))                ;
                $context['__cms_partial_params']['checked'] = ((                // line 104
($context["bChecked"] ?? null)) ? ("checked") : (""))                ;
                $context['__cms_partial_params']['labelText'] = twig_get_attribute($this->env, $this->source,                 // line 105
$context["obValue"], "value", [], "any", false, false, true, 105)                ;
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/catalog/filter/filter-size/filter-size"                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 106
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obValue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 107
            echo "                </ul>
            </div>
        ";
        }
        // line 110
        echo "
        ";
        // line 111
        $context["obPropertySize"] = twig_get_attribute($this->env, $this->source, ($context["obOfferPropertyList"] ?? null), "getByCode", [0 => "brasize"], "method", false, false, true, 111);
        // line 112
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "property_value", [], "any", false, false, true, 112), "isNotEmpty", [], "method", false, false, true, 112)) {
            // line 113
            echo "            ";
            $context["obPropertyValueList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "property_value", [], "any", false, false, true, 113), "sort", [], "method", false, false, true, 113);
            // line 114
            echo "            <div class=\"filter__group _shopaholic-filter-wrapper\" data-filter-type=\"checkbox\" data-property-id=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 114), 114, $this->source), "html", null, true);
            echo "\" role=\"group\" aria-labelledby=\"property-filter-label-";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 114), 114, $this->source), "html", null, true);
            echo "\">
                <b class=\"filter__group-legend\" id=\"property-filter-label-";
            // line 115
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 115), 115, $this->source), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "filter_name", [], "any", false, false, true, 115), 115, $this->source), "html", null, true);
            echo "</b>
                <ul class=\"filter__group-list filter-size\">
                    ";
            // line 117
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["obPropertyValueList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["obValue"]) {
                // line 118
                echo "                        ";
                $context["bChecked"] = ( !twig_test_empty((($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 = ($context["arFilterValue"] ?? null)) && is_array($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9) || $__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 instanceof ArrayAccess ? ($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 118)] ?? null) : null)) && twig_in_filter(twig_get_attribute($this->env, $this->source, $context["obValue"], "slug", [], "any", false, false, true, 118), (($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae = ($context["arFilterValue"] ?? null)) && is_array($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae) || $__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae instanceof ArrayAccess ? ($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 118)] ?? null) : null)));
                // line 119
                echo "                        ";
                $context["bDisabled"] = false;
                // line 120
                echo "                        ";
                if (((($context["bChecked"] ?? null) == false) &&  !twig_test_empty((($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f = ($context["arFilterValueWithoutProperty"] ?? null)) && is_array($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f) || $__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f instanceof ArrayAccess ? ($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 120)] ?? null) : null)))) {
                    // line 121
                    echo "                            ";
                    $context["obProductListTemp"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obFilteredProductList"] ?? null), "copy", [], "method", false, false, true, 121), "filterByProperty", [0 => (($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 = ($context["arFilterValueWithoutProperty"] ?? null)) && is_array($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40) || $__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 instanceof ArrayAccess ? ($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 121)] ?? null) : null), 1 => ($context["obProductPropertyList"] ?? null)], "method", false, false, true, 121), "filterByProperty", [0 => (($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f = ($context["arFilterValueWithoutProperty"] ?? null)) && is_array($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f) || $__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f instanceof ArrayAccess ? ($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 121)] ?? null) : null), 1 => ($context["obOfferPropertyList"] ?? null)], "method", false, false, true, 121);
                    // line 122
                    echo "                            ";
                    $context["bDisabled"] = twig_get_attribute($this->env, $this->source, $context["obValue"], "isDisabled", [0 => ($context["obProductListTemp"] ?? null)], "method", false, false, true, 122);
                    // line 123
                    echo "                        ";
                }
                // line 124
                echo "                        ";
                $context['__cms_partial_params'] = [];
                $context['__cms_partial_params']['id'] = ("property-value-" . twig_get_attribute($this->env, $this->source,                 // line 125
$context["obValue"], "slug", [], "any", false, false, true, 125))                ;
                $context['__cms_partial_params']['name'] = (("property[" . twig_get_attribute($this->env, $this->source,                 // line 126
($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 126)) . "][]")                ;
                $context['__cms_partial_params']['value'] = twig_get_attribute($this->env, $this->source,                 // line 127
$context["obValue"], "slug", [], "any", false, false, true, 127)                ;
                $context['__cms_partial_params']['disabled'] = ((                // line 128
($context["bDisabled"] ?? null)) ? ("disabled") : (""))                ;
                $context['__cms_partial_params']['checked'] = ((                // line 129
($context["bChecked"] ?? null)) ? ("checked") : (""))                ;
                $context['__cms_partial_params']['labelText'] = twig_get_attribute($this->env, $this->source,                 // line 130
$context["obValue"], "value", [], "any", false, false, true, 130)                ;
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/catalog/filter/filter-size/filter-size"                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 131
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obValue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 132
            echo "                </ul>
            </div>
        ";
        }
        // line 135
        echo "
        ";
        // line 136
        $context["obPropertySize"] = twig_get_attribute($this->env, $this->source, ($context["obOfferPropertyList"] ?? null), "getByCode", [0 => "size"], "method", false, false, true, 136);
        // line 137
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "property_value", [], "any", false, false, true, 137), "isNotEmpty", [], "method", false, false, true, 137)) {
            // line 138
            echo "            ";
            $context["obPropertyValueList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "property_value", [], "any", false, false, true, 138), "sort", [], "method", false, false, true, 138);
            // line 139
            echo "            <div class=\"filter__group _shopaholic-filter-wrapper\" data-filter-type=\"checkbox\" data-property-id=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 139), 139, $this->source), "html", null, true);
            echo "\" role=\"group\" aria-labelledby=\"property-filter-label-";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 139), 139, $this->source), "html", null, true);
            echo "\">
                <b class=\"filter__group-legend\" id=\"property-filter-label-";
            // line 140
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 140), 140, $this->source), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "filter_name", [], "any", false, false, true, 140), 140, $this->source), "html", null, true);
            echo "</b>
                <ul class=\"filter__group-list filter-size\">
                    ";
            // line 142
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["obPropertyValueList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["obValue"]) {
                // line 143
                echo "                        ";
                $context["bChecked"] = ( !twig_test_empty((($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 = ($context["arFilterValue"] ?? null)) && is_array($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760) || $__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 instanceof ArrayAccess ? ($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 143)] ?? null) : null)) && twig_in_filter(twig_get_attribute($this->env, $this->source, $context["obValue"], "slug", [], "any", false, false, true, 143), (($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce = ($context["arFilterValue"] ?? null)) && is_array($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce) || $__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce instanceof ArrayAccess ? ($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 143)] ?? null) : null)));
                // line 144
                echo "                        ";
                $context["bDisabled"] = false;
                // line 145
                echo "                        ";
                if (((($context["bChecked"] ?? null) == false) &&  !twig_test_empty((($__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b = ($context["arFilterValueWithoutProperty"] ?? null)) && is_array($__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b) || $__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b instanceof ArrayAccess ? ($__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 145)] ?? null) : null)))) {
                    // line 146
                    echo "                            ";
                    $context["obProductListTemp"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obFilteredProductList"] ?? null), "copy", [], "method", false, false, true, 146), "filterByProperty", [0 => (($__internal_73db8eef4d2582468dab79a6b09c77ce3b48675a610afd65a1f325b68804a60c = ($context["arFilterValueWithoutProperty"] ?? null)) && is_array($__internal_73db8eef4d2582468dab79a6b09c77ce3b48675a610afd65a1f325b68804a60c) || $__internal_73db8eef4d2582468dab79a6b09c77ce3b48675a610afd65a1f325b68804a60c instanceof ArrayAccess ? ($__internal_73db8eef4d2582468dab79a6b09c77ce3b48675a610afd65a1f325b68804a60c[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 146)] ?? null) : null), 1 => ($context["obProductPropertyList"] ?? null)], "method", false, false, true, 146), "filterByProperty", [0 => (($__internal_d8ad5934f1874c52fa2ac9a4dfae52038b39b8b03cfc82eeb53de6151d883972 = ($context["arFilterValueWithoutProperty"] ?? null)) && is_array($__internal_d8ad5934f1874c52fa2ac9a4dfae52038b39b8b03cfc82eeb53de6151d883972) || $__internal_d8ad5934f1874c52fa2ac9a4dfae52038b39b8b03cfc82eeb53de6151d883972 instanceof ArrayAccess ? ($__internal_d8ad5934f1874c52fa2ac9a4dfae52038b39b8b03cfc82eeb53de6151d883972[twig_get_attribute($this->env, $this->source, ($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 146)] ?? null) : null), 1 => ($context["obOfferPropertyList"] ?? null)], "method", false, false, true, 146);
                    // line 147
                    echo "                            ";
                    $context["bDisabled"] = twig_get_attribute($this->env, $this->source, $context["obValue"], "isDisabled", [0 => ($context["obProductListTemp"] ?? null)], "method", false, false, true, 147);
                    // line 148
                    echo "                        ";
                }
                // line 149
                echo "                        ";
                $context['__cms_partial_params'] = [];
                $context['__cms_partial_params']['id'] = ("property-value-" . twig_get_attribute($this->env, $this->source,                 // line 150
$context["obValue"], "slug", [], "any", false, false, true, 150))                ;
                $context['__cms_partial_params']['name'] = (("property[" . twig_get_attribute($this->env, $this->source,                 // line 151
($context["obPropertySize"] ?? null), "id", [], "any", false, false, true, 151)) . "][]")                ;
                $context['__cms_partial_params']['value'] = twig_get_attribute($this->env, $this->source,                 // line 152
$context["obValue"], "slug", [], "any", false, false, true, 152)                ;
                $context['__cms_partial_params']['disabled'] = ((                // line 153
($context["bDisabled"] ?? null)) ? ("disabled") : (""))                ;
                $context['__cms_partial_params']['checked'] = ((                // line 154
($context["bChecked"] ?? null)) ? ("checked") : (""))                ;
                $context['__cms_partial_params']['labelText'] = twig_get_attribute($this->env, $this->source,                 // line 155
$context["obValue"], "value", [], "any", false, false, true, 155)                ;
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/catalog/filter/filter-size/filter-size"                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 156
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obValue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 157
            echo "                </ul>
            </div>
        ";
        }
        // line 160
        echo "
        ";
        // line 185
        echo "    </div>
    <div class=\"filter__btn-section\">
        ";
        // line 187
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['type'] = "submit"        ;
        $context['__cms_partial_params']['wrapperClass'] = "filter__submit"        ;
        $context['__cms_partial_params']['text'] = "Apply"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("form/button/button"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 188
        echo "        <button type=\"reset\" class=\"filter__reset\">Reset</button>
    </div>
</form>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter-ajax.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  515 => 188,  508 => 187,  504 => 185,  501 => 160,  496 => 157,  490 => 156,  486 => 155,  484 => 154,  482 => 153,  480 => 152,  478 => 151,  476 => 150,  473 => 149,  470 => 148,  467 => 147,  464 => 146,  461 => 145,  458 => 144,  455 => 143,  451 => 142,  444 => 140,  437 => 139,  434 => 138,  431 => 137,  429 => 136,  426 => 135,  421 => 132,  415 => 131,  411 => 130,  409 => 129,  407 => 128,  405 => 127,  403 => 126,  401 => 125,  398 => 124,  395 => 123,  392 => 122,  389 => 121,  386 => 120,  383 => 119,  380 => 118,  376 => 117,  369 => 115,  362 => 114,  359 => 113,  356 => 112,  354 => 111,  351 => 110,  346 => 107,  340 => 106,  336 => 105,  334 => 104,  332 => 103,  330 => 102,  328 => 101,  326 => 100,  323 => 99,  320 => 98,  317 => 97,  314 => 96,  311 => 95,  308 => 94,  305 => 93,  301 => 92,  294 => 90,  287 => 89,  284 => 88,  281 => 87,  279 => 86,  276 => 85,  269 => 84,  265 => 82,  260 => 79,  258 => 78,  256 => 77,  254 => 76,  252 => 75,  250 => 74,  248 => 73,  246 => 72,  240 => 71,  233 => 70,  230 => 69,  228 => 68,  225 => 67,  221 => 65,  215 => 64,  211 => 62,  209 => 61,  207 => 60,  205 => 59,  203 => 58,  201 => 57,  199 => 56,  196 => 55,  193 => 54,  190 => 53,  187 => 52,  184 => 51,  181 => 50,  178 => 49,  174 => 48,  168 => 47,  161 => 46,  158 => 45,  156 => 44,  153 => 43,  148 => 42,  145 => 41,  141 => 39,  135 => 38,  131 => 37,  129 => 36,  127 => 35,  125 => 34,  122 => 32,  120 => 31,  117 => 30,  114 => 29,  110 => 28,  106 => 26,  103 => 25,  99 => 22,  94 => 19,  89 => 15,  85 => 13,  81 => 12,  79 => 11,  77 => 10,  75 => 9,  73 => 8,  71 => 7,  67 => 5,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form class=\"filter__form\" aria-labelledby=\"filter__form-label\">
    <span class=\"filter__form-label\" id=\"filter__form-label\">Select options for filtering. After change of any input element page will refresh</span>
    <div class=\"filter__form-wrapper webkit-scroll\">
         {# Price filter #}
    <div class=\"filter__group\" role=\"group\" aria-labelledby=\"price-input-section\">
            <b class=\"filter__group-legend\" id=\"price-input-section\">Price</b>
            {% partial 'product/catalog/filter/filter-price/filter-price'
                min_value=fMinPriceFilterValue
                max_value=fMaxPriceFilterValue
                currency=obOfferMinPrice.currency
                min=obOfferMinPrice.price
                max=obOfferMaxPrice.price %}
        </div>
        <div class=\"filter__group _shopaholic-sale-filter-wrapper\" data-filter-type=\"checkbox\" role=\"group\" aria-labelledby=\"sale-filter\">
            {% partial 'product/catalog/filter/filter-checkbox/filter-checkbox'
                text='Sale'
                id='sale-filter'
                name='sale'
                checked=bSaleFilter ? 'checked' : ''
                value=1
            %}
        </div>

        {# Brand filter #}
        {% if obBrandList.isNotEmpty() %}
            <div class=\"filter__group _shopaholic-brand-filter-wrapper\" data-filter-type=\"checkbox\" role=\"group\" aria-labelledby=\"brand-filter\">
                <b class=\"filter__group-legend\" id=\"brand-filter\">Brand</b>
                {% for obBrand in obBrandList %}
                    {% set obBrandProductList = obCategoryProductList.copy().brand(obBrand.id) %}
                    {% partial 'product/catalog/filter/filter-checkbox/filter-checkbox'
                        text=obBrand.name
                        id='brand-'~obBrand.slug
                        name='brand[]'
                        checked=obBrand.id in arFilterBrandIDList ? 'checked' : ''
                        value=obBrand.slug
                        disabled=obBrandProductList.count() == 0 ? 'disabled' : ''
                        hintText='(' ~ obBrandProductList.count() ~ ')' %}
                {% endfor %}
            </div>
        {% endif %}

        {% for obProperty in obProductPropertyList if obProperty.hasValue() %}

            {% if obProperty.filter_type == 'checkbox' and obProperty.code != 'size' and obProperty.code != 'color' %}
                {% set obPropertyValueList = obProperty.property_value.sort() %}
                <div class=\"filter__group _shopaholic-filter-wrapper\" data-filter-type=\"checkbox\" data-property-id=\"{{ obProperty.id }}\" role=\"group\" aria-labelledby=\"property-filter-label-{{ obProperty.id }}\">
                    <b class=\"filter__group-legend\" id=\"property-filter-label-{{ obProperty.id }}\">{{ obProperty.filter_name }}</b>
                    {% for obValue in obPropertyValueList %}
                        {% set bChecked = arFilterValue[obProperty.id] is not empty and obValue.slug in arFilterValue[obProperty.id] %}
                        {% set bDisabled = false %}
                        {% if bChecked == false and arFilterValueWithoutProperty[obProperty.id] is not empty %}
                            {% set obProductListTemp = obFilteredProductList.copy().filterByProperty(arFilterValueWithoutProperty[obProperty.id], obProductPropertyList).filterByProperty(arFilterValueWithoutProperty[obProperty.id], obOfferPropertyList) %}
                            {% set bDisabled = obValue.isDisabled(obProductListTemp) %}
                        {% endif %}

                        {% partial 'product/catalog/filter/filter-checkbox/filter-checkbox'
                            text=obValue.value
                            id='property-value-'~obValue.slug
                            name='property['~ obProperty.id ~ '][]'
                            disabled=bDisabled ? 'disabled' : ''
                            checked=bChecked ? 'checked' : ''
                            value=obValue.slug
                        %}
                    {% endfor %}
                </div>
            {% endif %}

            {% if obProperty.filter_type == 'select' and obProperty.code != 'size' and obProperty.code != 'color' %}
                {% set obPropertyValueList = obProperty.property_value.sort() %}
                <div  class=\"filter__group _shopaholic-filter-wrapper\" data-property-id=\"{{ obProperty.id }}\" data-filter-type=\"select\" role=\"group\" aria-labelledby=\"property-filter-label-{{ obProperty.id }}\">
                    <b class=\"filter__group-legend\" id=\"property-filter-label-{{ obProperty.id }}\">{{ obProperty.filter_name }}</b>
                    {% partial 'product/catalog/filter/filter-select/filter-select'
                        obProperty=obProperty
                        arFilterValueWithoutProperty=arFilterValueWithoutProperty
                        obProductPropertyList=obProductPropertyList
                        obOfferPropertyList=obOfferPropertyList
                        obFilteredProductList=obFilteredProductList
                        obPropertyValueList=obPropertyValueList
                        arFilterValue=arFilterValue
                        text=\"Any\"
                    %}
                </div>
            {% endif %}
        {% endfor %}

        {% set obPropertySize = obOfferPropertyList.getByCode('belts-size') %}
        {% if obPropertySize.property_value.isNotEmpty() %}
            {% set obPropertyValueList = obPropertySize.property_value.sort() %}
            <div class=\"filter__group _shopaholic-filter-wrapper\" data-filter-type=\"checkbox\" data-property-id=\"{{ obPropertySize.id }}\" role=\"group\" aria-labelledby=\"property-filter-label-{{ obPropertySize.id }}\">
                <b class=\"filter__group-legend\" id=\"property-filter-label-{{ obPropertySize.id }}\">{{ obPropertySize.filter_name }}</b>
                <ul class=\"filter__group-list filter-size\">
                    {% for obValue in obPropertyValueList %}
                        {% set bChecked = arFilterValue[obPropertySize.id] is not empty and obValue.slug in arFilterValue[obPropertySize.id] %}
                        {% set bDisabled = false %}
                        {% if bChecked == false and arFilterValueWithoutProperty[obPropertySize.id] is not empty %}
                            {% set obProductListTemp = obFilteredProductList.copy().filterByProperty(arFilterValueWithoutProperty[obPropertySize.id], obProductPropertyList).filterByProperty(arFilterValueWithoutProperty[obPropertySize.id], obOfferPropertyList) %}
                            {% set bDisabled = obValue.isDisabled(obProductListTemp) %}
                        {% endif %}
                        {% partial 'product/catalog/filter/filter-size/filter-size'
                            id='property-value-'~obValue.slug
                            name='property['~ obPropertySize.id ~ '][]'
                            value=obValue.slug
                            disabled=bDisabled ? 'disabled' : ''
                            checked=bChecked ? 'checked' : ''
                            labelText=obValue.value %}
                    {% endfor %}
                </ul>
            </div>
        {% endif %}

        {% set obPropertySize = obOfferPropertyList.getByCode('brasize') %}
        {% if obPropertySize.property_value.isNotEmpty() %}
            {% set obPropertyValueList = obPropertySize.property_value.sort() %}
            <div class=\"filter__group _shopaholic-filter-wrapper\" data-filter-type=\"checkbox\" data-property-id=\"{{ obPropertySize.id }}\" role=\"group\" aria-labelledby=\"property-filter-label-{{ obPropertySize.id }}\">
                <b class=\"filter__group-legend\" id=\"property-filter-label-{{ obPropertySize.id }}\">{{ obPropertySize.filter_name }}</b>
                <ul class=\"filter__group-list filter-size\">
                    {% for obValue in obPropertyValueList %}
                        {% set bChecked = arFilterValue[obPropertySize.id] is not empty and obValue.slug in arFilterValue[obPropertySize.id] %}
                        {% set bDisabled = false %}
                        {% if bChecked == false and arFilterValueWithoutProperty[obPropertySize.id] is not empty %}
                            {% set obProductListTemp = obFilteredProductList.copy().filterByProperty(arFilterValueWithoutProperty[obPropertySize.id], obProductPropertyList).filterByProperty(arFilterValueWithoutProperty[obPropertySize.id], obOfferPropertyList) %}
                            {% set bDisabled = obValue.isDisabled(obProductListTemp) %}
                        {% endif %}
                        {% partial 'product/catalog/filter/filter-size/filter-size'
                            id='property-value-'~obValue.slug
                            name='property['~ obPropertySize.id ~ '][]'
                            value=obValue.slug
                            disabled=bDisabled ? 'disabled' : ''
                            checked=bChecked ? 'checked' : ''
                            labelText=obValue.value %}
                    {% endfor %}
                </ul>
            </div>
        {% endif %}

        {% set obPropertySize = obOfferPropertyList.getByCode('size') %}
        {% if obPropertySize.property_value.isNotEmpty() %}
            {% set obPropertyValueList = obPropertySize.property_value.sort() %}
            <div class=\"filter__group _shopaholic-filter-wrapper\" data-filter-type=\"checkbox\" data-property-id=\"{{ obPropertySize.id }}\" role=\"group\" aria-labelledby=\"property-filter-label-{{ obPropertySize.id }}\">
                <b class=\"filter__group-legend\" id=\"property-filter-label-{{ obPropertySize.id }}\">{{ obPropertySize.filter_name }}</b>
                <ul class=\"filter__group-list filter-size\">
                    {% for obValue in obPropertyValueList %}
                        {% set bChecked = arFilterValue[obPropertySize.id] is not empty and obValue.slug in arFilterValue[obPropertySize.id] %}
                        {% set bDisabled = false %}
                        {% if bChecked == false and arFilterValueWithoutProperty[obPropertySize.id] is not empty %}
                            {% set obProductListTemp = obFilteredProductList.copy().filterByProperty(arFilterValueWithoutProperty[obPropertySize.id], obProductPropertyList).filterByProperty(arFilterValueWithoutProperty[obPropertySize.id], obOfferPropertyList) %}
                            {% set bDisabled = obValue.isDisabled(obProductListTemp) %}
                        {% endif %}
                        {% partial 'product/catalog/filter/filter-size/filter-size'
                            id='property-value-'~obValue.slug
                            name='property['~ obPropertySize.id ~ '][]'
                            value=obValue.slug
                            disabled=bDisabled ? 'disabled' : ''
                            checked=bChecked ? 'checked' : ''
                            labelText=obValue.value %}
                    {% endfor %}
                </ul>
            </div>
        {% endif %}

        {# {% set obPropertyColor = obProductPropertyList.getByCode('color') %}
        {% if obPropertyColor.property_value.isNotEmpty() %}
            {% set obPropertyValueList = obPropertyColor.property_value.sort() %}
            <div data-kek class=\"filter__group _shopaholic-filter-wrapper\" data-filter-type=\"checkbox\" data-property-id=\"{{ obPropertyColor.id }}\" role=\"group\" aria-labelledby=\"property-filter-{{ obPropertyColor.id }}\">
                <b class=\"filter__group-legend\" id=\"property-filter-{{ obPropertyColor.id }}\">{{ obPropertyColor.filter_name }}</b>
                <ul class=\"filter__group-list filter-color\">
                    {% for obValue in obPropertyValueList %}
                        {% set bChecked = arFilterValue[obPropertyColor.id] is not empty and obValue.slug in arFilterValue[obPropertyColor.id] %}
                        {% set bDisabled = false %}
                        {% if bChecked == false and arFilterValueWithoutProperty[obPropertyColor.id] is not empty %}
                            {% set obProductListTemp = obFilteredProductList.copy().filterByProperty(arFilterValueWithoutProperty[obPropertyColor.id], obProductPropertyList).filterByProperty(arFilterValueWithoutProperty[obPropertyColor.id], obOfferPropertyList) %}
                            {% set bDisabled = obValue.isDisabled(obProductListTemp) %}
                        {% endif %}
                        {% partial 'product/catalog/filter/filter-color/filter-color'
                            id='property-value-'~obValue.slug
                            name='property['~ obPropertyColor.id ~ '][]'
                            value=obValue.slug
                            disabled=bDisabled ? 'disabled' : ''
                            checked=bChecked ? 'checked' : ''
                            bgColor=obValue.value %}
                    {% endfor %}
                </ul>
            </div>
        {% endif %} #}
    </div>
    <div class=\"filter__btn-section\">
        {% partial 'form/button/button' type='submit' wrapperClass='filter__submit' text='Apply' %}
        <button type=\"reset\" class=\"filter__reset\">Reset</button>
    </div>
</form>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter-ajax.htm", "");
    }
}
