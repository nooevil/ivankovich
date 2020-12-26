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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-info/product-info.htm */
class __TwigTemplate_a4092f7860b7282fa2e450ba9fee50aeb3c1cf2075b6222e0f41746716c9030f extends \Twig\Template
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
        $tags = array("set" => 1, "if" => 14, "partial" => 15, "for" => 35);
        $filters = array("escape" => 7, "raw" => 30, "length" => 53, "theme" => 61, "staticPage" => 89);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'partial', 'for'],
                ['escape', 'raw', 'length', 'theme', 'staticPage'],
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
        $context["obPropertyList"] = twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "property", [], "any", false, false, true, 1);
        // line 2
        $context["obMainGroupProperty"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obPropertyList"] ?? null), "getGroupList", [], "method", false, false, true, 2), "getByCode", [0 => "main"], "method", false, false, true, 2);
        // line 3
        $context["obMainGroupPropertyList"] = twig_get_attribute($this->env, $this->source, ($context["obPropertyList"] ?? null), "group", [0 => twig_get_attribute($this->env, $this->source, ($context["obMainGroupProperty"] ?? null), "id", [], "any", false, false, true, 3)], "method", false, false, true, 3);
        // line 4
        $context["iTotalQuantity"] = twig_get_attribute($this->env, $this->source, ($context["obOfferList"] ?? null), "getTotalQuantity", [], "method", false, false, true, 4);
        // line 5
        echo "

<section class=\"product-info _shopaholic-product-wrapper\" itemscope itemtype=\"https://schema.org/Product\" data-product-id=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "id", [], "any", false, false, true, 7), 7, $this->source), "html", null, true);
        echo "\">
    <div class=\"product-info__wrapper\">
        <h1 class=\"product__info-title\" itemprop=\"name\">";
        // line 9
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "name", [], "any", false, false, true, 9), 9, $this->source), "html", null, true);
        echo "</h1>

        ";
        // line 11
        $context["iReviewCount"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "review", [], "any", false, false, true, 11), "active", [], "method", false, false, true, 11), "count", [], "method", false, false, true, 11);
        // line 12
        echo "        ";
        $context["fRating"] = twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "rating", [], "any", false, false, true, 12);
        // line 13
        echo "
        ";
        // line 14
        if (($context["bHasReviewsPlugin"] ?? null)) {
            // line 15
            echo "        ";
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['wrapperClass'] = "product-info__rating"            ;
            $context['__cms_partial_params']['rating'] =             // line 17
($context["fRating"] ?? null)            ;
            $context['__cms_partial_params']['maxRating'] = "5"            ;
            $context['__cms_partial_params']['reviewCount'] =             // line 19
($context["iReviewCount"] ?? null)            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/rating/rating"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 20
            echo "        ";
        }
        // line 21
        echo "        ";
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "product-info__price"        ;
        $context['__cms_partial_params']['obOffer'] = ($context["obOffer"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/product-price/product-price"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 22
        echo "    </div>
    ";
        // line 23
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "product-info__slider"        ;
        $context['__cms_partial_params']['obImageList'] = twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "images", [], "any", false, false, true, 23)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/product-slider/product-slider"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 24
        echo "        <div class=\"product-info__detail-wrapper\">
                ";
        // line 25
        if ((twig_get_attribute($this->env, $this->source, ($context["obMainGroupPropertyList"] ?? null), "isNotEmpty", [], "method", false, false, true, 25) ||  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_text", [], "any", false, false, true, 25)))) {
            // line 26
            echo "            <div class=\"product-info__detail\">
                <button type=\"button\" class=\"product-info__detail-btn product-info__subtitle\">Product Details</button>
                <div class=\"product-info__detail-text product-info__detail-text_visually-hidden wysiwyg\" itemprop=\"description\">
                    ";
            // line 29
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_text", [], "any", false, false, true, 29))) {
                // line 30
                echo "                        <p>";
                echo $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_text", [], "any", false, false, true, 30), 30, $this->source);
                echo "</p>
                    ";
            }
            // line 32
            echo "\t\t\t\t\t
                    ";
            // line 33
            if (twig_get_attribute($this->env, $this->source, ($context["obMainGroupPropertyList"] ?? null), "isNotEmpty", [], "method", false, false, true, 33)) {
                echo "\t\t\t\t\t
                        <ul>
                            ";
                // line 35
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["obMainGroupPropertyList"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["obProperty"]) {
                    if ((((twig_get_attribute($this->env, $this->source, $context["obProperty"], "code", [], "any", false, false, true, 35) != "color") && (twig_get_attribute($this->env, $this->source, $context["obProperty"], "code", [], "any", false, false, true, 35) != "size")) && twig_get_attribute($this->env, $this->source, $context["obProperty"], "hasValue", [], "method", false, false, true, 35))) {
                        // line 36
                        echo "                                <li>";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obProperty"], "name", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
                        echo ": ";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["obProperty"], "property_value", [], "any", false, false, true, 36), "getValueString", [], "method", false, false, true, 36), 36, $this->source), "html", null, true);
                        echo "</li>
                            ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obProperty'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 38
                echo "                        </ul>
                    ";
            }
            // line 40
            echo "                    <br>
                </div>
            </div>
        ";
        }
        // line 44
        echo "
        ";
        // line 45
        if (twig_get_attribute($this->env, $this->source, ($context["obRelatedProductList"] ?? null), "isNotEmpty", [], "method", false, false, true, 45)) {
            // line 46
            echo "            <div class=\"product-info__color\">
                <b class=\"product-info__subtitle product-info__color-heading\">
                    Select Color
                </b>
                <ul class=\"product-info__color-list\">
                    <li class=\"product-info__color-item product-info__color-item_active\">
                        <a class=\"product-info__color-link\" aria-label=\"Go to ";
            // line 52
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "name", [], "any", false, false, true, 52), 52, $this->source), "html", null, true);
            echo "\">
                           ";
            // line 53
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 53), "path", [], "any", false, false, true, 53)) > 0)) {
                // line 54
                echo "                                <picture class=\"product-info__color-img-container\">
                                    <source data-srcset=\"";
                // line 55
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 55), "getThumb", [0 => 130, 1 => 130, 2 => ["quantity" => 100, "extension" => "webp"]], "method", false, false, true, 55), 55, $this->source), "html", null, true);
                echo "\" type=\"image/webp\">
                                    <source data-srcset=\"";
                // line 56
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 56), "getThumb", [0 => 130, 1 => 130, 2 => ["quantity" => 100]], "method", false, false, true, 56), 56, $this->source), "html", null, true);
                echo "\" type=\"image/jpeg\">
                                    <img class=\"product-info__color-img js-lazy-load\" data-src=\"";
                // line 57
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 57), "getThumb", [0 => 130, 1 => 130, 2 => ["quantity" => 100]], "method", false, false, true, 57), 57, $this->source), "html", null, true);
                echo "\" itemprop=\"image\" alt=\"";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 57), "description", [], "any", false, false, true, 57), 57, $this->source), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 57), "title", [], "any", false, false, true, 57), 57, $this->source), "html", null, true);
                echo "\">
                                </picture>
                                ";
                // line 59
                $context['__cms_partial_params'] = [];
                $context['__cms_partial_params']['wrapperClass'] = "product-info__color-preloader"                ;
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 60
                echo "                            ";
            } else {
                // line 61
                echo "                                <img class=\"product-info__color-img product-info__color-img_no-photo\" src=\"";
                echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/img/nophoto.svg");
                echo "\" itemprop=\"image\" alt=\"";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 61), "description", [], "any", false, false, true, 61), 61, $this->source), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 61), "title", [], "any", false, false, true, 61), 61, $this->source), "html", null, true);
                echo "\">
                            ";
            }
            // line 63
            echo "                        </a>
                    </li>
                    ";
            // line 65
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["obRelatedProductList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["obRelatedProduct"]) {
                // line 66
                echo "                        <li class=\"product-info__color-item\">
                            <a href=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obRelatedProduct"], "getPageUrl", [0 => "product"], "method", false, false, true, 67), 67, $this->source), "html", null, true);
                echo "\"
                            class=\"product-info__color-link\" aria-label=\"Go to ";
                // line 68
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "name", [], "any", false, false, true, 68), 68, $this->source), "html", null, true);
                echo "\">
                                ";
                // line 69
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["obRelatedProduct"], "preview_image", [], "any", false, false, true, 69), "path", [], "any", false, false, true, 69)) > 0)) {
                    // line 70
                    echo "                                    <picture class=\"product-info__color-img-container\">
                                        <source data-srcset=\"";
                    // line 71
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["obRelatedProduct"], "preview_image", [], "any", false, false, true, 71), "getThumb", [0 => 130, 1 => 130, 2 => ["quantity" => 100, "extension" => "webp"]], "method", false, false, true, 71), 71, $this->source), "html", null, true);
                    echo "\" type=\"image/webp\">
                                        <source data-srcset=\"";
                    // line 72
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["obRelatedProduct"], "preview_image", [], "any", false, false, true, 72), "getThumb", [0 => 130, 1 => 130, 2 => ["quantity" => 100]], "method", false, false, true, 72), 72, $this->source), "html", null, true);
                    echo "\" type=\"image/jpeg\">
                                        <img class=\"product-info__color-img js-lazy-load\" data-src=\"";
                    // line 73
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["obRelatedProduct"], "preview_image", [], "any", false, false, true, 73), "getThumb", [0 => 130, 1 => 130, 2 => ["quantity" => 100]], "method", false, false, true, 73), 73, $this->source), "html", null, true);
                    echo "\" itemprop=\"image\" alt=\"";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["obRelatedProduct"], "preview_image", [], "any", false, false, true, 73), "description", [], "any", false, false, true, 73), 73, $this->source), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["obRelatedProduct"], "preview_image", [], "any", false, false, true, 73), "title", [], "any", false, false, true, 73), 73, $this->source), "html", null, true);
                    echo "\">
                                    </picture>
                                    ";
                    // line 75
                    $context['__cms_partial_params'] = [];
                    $context['__cms_partial_params']['wrapperClass'] = "product-info__color-preloader"                    ;
                    echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"                    , $context['__cms_partial_params']                    , true                    );
                    unset($context['__cms_partial_params']);
                    // line 76
                    echo "                                ";
                } else {
                    // line 77
                    echo "                                    <img class=\"product-info__color-img product-info__color-img_no-photo\" alt=\"No photo\" src=\"";
                    echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/img/nophoto.svg");
                    echo "\" itemprop=\"image\">
                                ";
                }
                // line 79
                echo "                            </a>
                        </li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obRelatedProduct'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 82
            echo "                </ul>
            </div>
        ";
        }
        // line 85
        echo "
        <form action=\"#\" class=\"product-info__form\">
            <div class=\"product-info__size\">
                ";
        // line 88
        if (( !twig_test_empty(($context["arChooseSize"] ?? null)) && (($context["iTotalQuantity"] ?? null) > 0))) {
            // line 89
            echo "                    ";
            $context["sizeGuidePath"] = RainLab\Pages\Classes\Page::url("size-guide");
            // line 90
            echo "                    <b class=\"product-info__subtitle\">Select Size</b>
                    ";
            // line 91
            if (($context["sizeGuidePath"] ?? null)) {
                // line 92
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sizeGuidePath"] ?? null), 92, $this->source), "html", null, true);
                echo "\" class=\"product-info__size-link\">Guide</a>
                    ";
            }
            // line 94
            echo "                    <ul class=\"product-info__size-list\">
                        ";
            // line 95
            $context["bChecked"] = true;
            // line 96
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["arChooseSize"] ?? null));
            foreach ($context['_seq'] as $context["iOfferID"] => $context["sSize"]) {
                // line 97
                echo "                            ";
                $context["obCurrenctOffer"] = twig_get_attribute($this->env, $this->source, ($context["obOfferList"] ?? null), "find", [0 => $context["iOfferID"]], "method", false, false, true, 97);
                // line 98
                echo "                            ";
                $context['__cms_partial_params'] = [];
                $context['__cms_partial_params']['wrapperClass'] = "product-info__size-item"                ;
                $context['__cms_partial_params']['id'] = ("size-" .                 // line 100
$context["iOfferID"])                ;
                $context['__cms_partial_params']['name'] = "offer_id"                ;
                $context['__cms_partial_params']['value'] =                 // line 102
$context["iOfferID"]                ;
                $context['__cms_partial_params']['labelText'] =                 // line 103
$context["sSize"]                ;
                $context['__cms_partial_params']['type'] = "radio"                ;
                $context['__cms_partial_params']['disabled'] = (twig_get_attribute($this->env, $this->source,                 // line 105
($context["obCurrenctOffer"] ?? null), "quantity", [], "any", false, false, true, 105) == 0)                ;
                $context['__cms_partial_params']['checked'] =                 // line 106
($context["bChecked"] ?? null)                ;
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/catalog/filter/filter-size/filter-size"                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 108
                echo "                            ";
                if ((($context["bChecked"] ?? null) && (twig_get_attribute($this->env, $this->source, ($context["obCurrenctOffer"] ?? null), "quantity", [], "any", false, false, true, 108) > 0))) {
                    // line 109
                    echo "                                ";
                    $context["bChecked"] = false;
                    // line 110
                    echo "                            ";
                }
                // line 111
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['iOfferID'], $context['sSize'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            echo "                    </ul>
                ";
        } else {
            // line 114
            echo "                    <input type=\"hidden\" name='offer_id' value=";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "id", [], "any", false, false, true, 114), 114, $this->source), "html", null, true);
            echo ">
                ";
        }
        // line 116
        echo "            </div>
            <div class=\"product-info__btn-block\">
                ";
        // line 118
        if ((($context["iTotalQuantity"] ?? null) > 0)) {
            // line 119
            echo "                    ";
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['text'] = "Add to cart"            ;
            $context['__cms_partial_params']['wrapperClass'] = "product-info__btn _shopaholic-cart-add"            ;
            $context['__cms_partial_params']['type'] = "submit"            ;
            $context['__cms_partial_params']['attr'] = ("data-offer-id=" . twig_get_attribute($this->env, $this->source,             // line 123
($context["obOffer"] ?? null), "id", [], "any", false, false, true, 123))            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("form/button/button"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 125
            echo "                ";
        } else {
            // line 126
            echo "                    <span class=\"button product-info__btn product-info__btn_not-available\">Out of stock</span>
                ";
        }
        // line 128
        echo "
                ";
        // line 129
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "product-info__preloader"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 130
        echo "                ";
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "product-info__tooltip"        ;
        $context['__cms_partial_params']['text'] = "Product added to cart"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/tooltip/tooltip"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 131
        echo "                ";
        if (($context["bHasWishListPlugin"] ?? null)) {
            // line 132
            echo "                    ";
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['obProduct'] = ($context["obProduct"] ?? null)            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/wish-list/wish-list-add/wish-list-add"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 133
            echo "                ";
        }
        // line 134
        echo "            </div>
        </form>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-info/product-info.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  429 => 134,  426 => 133,  420 => 132,  417 => 131,  410 => 130,  405 => 129,  402 => 128,  398 => 126,  395 => 125,  391 => 123,  385 => 119,  383 => 118,  379 => 116,  373 => 114,  369 => 112,  363 => 111,  360 => 110,  357 => 109,  354 => 108,  350 => 106,  348 => 105,  345 => 103,  343 => 102,  340 => 100,  336 => 98,  333 => 97,  328 => 96,  326 => 95,  323 => 94,  317 => 92,  315 => 91,  312 => 90,  309 => 89,  307 => 88,  302 => 85,  297 => 82,  289 => 79,  283 => 77,  280 => 76,  275 => 75,  266 => 73,  262 => 72,  258 => 71,  255 => 70,  253 => 69,  249 => 68,  245 => 67,  242 => 66,  238 => 65,  234 => 63,  224 => 61,  221 => 60,  216 => 59,  207 => 57,  203 => 56,  199 => 55,  196 => 54,  194 => 53,  190 => 52,  182 => 46,  180 => 45,  177 => 44,  171 => 40,  167 => 38,  155 => 36,  150 => 35,  145 => 33,  142 => 32,  136 => 30,  134 => 29,  129 => 26,  127 => 25,  124 => 24,  118 => 23,  115 => 22,  108 => 21,  105 => 20,  101 => 19,  98 => 17,  94 => 15,  92 => 14,  89 => 13,  86 => 12,  84 => 11,  79 => 9,  74 => 7,  70 => 5,  68 => 4,  66 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set obPropertyList = obProduct.property %}
{% set obMainGroupProperty = obPropertyList.getGroupList().getByCode('main') %}
{% set obMainGroupPropertyList = obPropertyList.group(obMainGroupProperty.id) %}
{% set iTotalQuantity = obOfferList.getTotalQuantity() %}


<section class=\"product-info _shopaholic-product-wrapper\" itemscope itemtype=\"https://schema.org/Product\" data-product-id=\"{{ obProduct.id }}\">
    <div class=\"product-info__wrapper\">
        <h1 class=\"product__info-title\" itemprop=\"name\">{{ obProduct.name }}</h1>

        {% set iReviewCount = obProduct.review.active().count() %}
        {% set fRating = obProduct.rating %}

        {% if bHasReviewsPlugin %}
        {% partial 'common/rating/rating'
            wrapperClass='product-info__rating'
            rating=fRating
            maxRating='5'
            reviewCount=iReviewCount %}
        {% endif %}
        {% partial 'product/product-price/product-price' wrapperClass='product-info__price' obOffer=obOffer %}
    </div>
    {% partial 'product/product-slider/product-slider' wrapperClass='product-info__slider' obImageList = obProduct.images %}
        <div class=\"product-info__detail-wrapper\">
                {% if obMainGroupPropertyList.isNotEmpty() or obProduct.preview_text is not empty %}
            <div class=\"product-info__detail\">
                <button type=\"button\" class=\"product-info__detail-btn product-info__subtitle\">Product Details</button>
                <div class=\"product-info__detail-text product-info__detail-text_visually-hidden wysiwyg\" itemprop=\"description\">
                    {% if obProduct.preview_text is not empty %}
                        <p>{{ obProduct.preview_text|raw }}</p>
                    {% endif %}
\t\t\t\t\t
                    {% if obMainGroupPropertyList.isNotEmpty() %}\t\t\t\t\t
                        <ul>
                            {% for obProperty in obMainGroupPropertyList if obProperty.code != 'color' and obProperty.code != 'size' and obProperty.hasValue() %}
                                <li>{{ obProperty.name }}: {{ obProperty.property_value.getValueString() }}</li>
                            {% endfor %}
                        </ul>
                    {% endif %}
                    <br>
                </div>
            </div>
        {% endif %}

        {% if obRelatedProductList.isNotEmpty() %}
            <div class=\"product-info__color\">
                <b class=\"product-info__subtitle product-info__color-heading\">
                    Select Color
                </b>
                <ul class=\"product-info__color-list\">
                    <li class=\"product-info__color-item product-info__color-item_active\">
                        <a class=\"product-info__color-link\" aria-label=\"Go to {{ obProduct.name }}\">
                           {% if obProduct.preview_image.path|length > 0 %}
                                <picture class=\"product-info__color-img-container\">
                                    <source data-srcset=\"{{ obProduct.preview_image.getThumb(130, 130, {'quantity': 100, 'extension': 'webp'}) }}\" type=\"image/webp\">
                                    <source data-srcset=\"{{ obProduct.preview_image.getThumb(130, 130, {'quantity': 100}) }}\" type=\"image/jpeg\">
                                    <img class=\"product-info__color-img js-lazy-load\" data-src=\"{{ obProduct.preview_image.getThumb(130, 130, {'quantity': 100}) }}\" itemprop=\"image\" alt=\"{{ obProduct.preview_image.description }}\" title=\"{{ obProduct.preview_image.title }}\">
                                </picture>
                                {% partial 'common/preloader/preloader' wrapperClass='product-info__color-preloader' %}
                            {% else %}
                                <img class=\"product-info__color-img product-info__color-img_no-photo\" src=\"{{ 'assets/img/nophoto.svg'|theme }}\" itemprop=\"image\" alt=\"{{ obProduct.preview_image.description }}\" title=\"{{ obProduct.preview_image.title }}\">
                            {% endif %}
                        </a>
                    </li>
                    {% for obRelatedProduct in obRelatedProductList %}
                        <li class=\"product-info__color-item\">
                            <a href=\"{{ obRelatedProduct.getPageUrl('product') }}\"
                            class=\"product-info__color-link\" aria-label=\"Go to {{ obProduct.name }}\">
                                {% if obRelatedProduct.preview_image.path|length > 0 %}
                                    <picture class=\"product-info__color-img-container\">
                                        <source data-srcset=\"{{ obRelatedProduct.preview_image.getThumb(130, 130, {'quantity': 100, 'extension': 'webp'}) }}\" type=\"image/webp\">
                                        <source data-srcset=\"{{ obRelatedProduct.preview_image.getThumb(130, 130, {'quantity': 100}) }}\" type=\"image/jpeg\">
                                        <img class=\"product-info__color-img js-lazy-load\" data-src=\"{{ obRelatedProduct.preview_image.getThumb(130, 130, {'quantity': 100}) }}\" itemprop=\"image\" alt=\"{{ obRelatedProduct.preview_image.description }}\" title=\"{{ obRelatedProduct.preview_image.title }}\">
                                    </picture>
                                    {% partial 'common/preloader/preloader' wrapperClass='product-info__color-preloader' %}
                                {% else %}
                                    <img class=\"product-info__color-img product-info__color-img_no-photo\" alt=\"No photo\" src=\"{{ 'assets/img/nophoto.svg'|theme }}\" itemprop=\"image\">
                                {% endif %}
                            </a>
                        </li>
                    {% endfor %}
                </ul>
            </div>
        {% endif %}

        <form action=\"#\" class=\"product-info__form\">
            <div class=\"product-info__size\">
                {% if arChooseSize is not empty and iTotalQuantity > 0 %}
                    {% set sizeGuidePath = 'size-guide'|staticPage %}
                    <b class=\"product-info__subtitle\">Select Size</b>
                    {% if sizeGuidePath %}
                        <a href=\"{{ sizeGuidePath }}\" class=\"product-info__size-link\">Guide</a>
                    {% endif %}
                    <ul class=\"product-info__size-list\">
                        {% set bChecked = true %}
                        {% for iOfferID,sSize in arChooseSize %}
                            {% set obCurrenctOffer = obOfferList.find(iOfferID) %}
                            {% partial 'product/catalog/filter/filter-size/filter-size'
                                wrapperClass='product-info__size-item'
                                id='size-' ~ iOfferID
                                name='offer_id'
                                value=iOfferID
                                labelText=sSize
                                type='radio'
                                disabled=obCurrenctOffer.quantity == 0
                                checked = bChecked
                            %}
                            {% if bChecked and obCurrenctOffer.quantity > 0 %}
                                {% set bChecked = false %}
                            {% endif %}
                        {% endfor %}
                    </ul>
                {% else %}
                    <input type=\"hidden\" name='offer_id' value={{ obOffer.id }}>
                {% endif %}
            </div>
            <div class=\"product-info__btn-block\">
                {% if iTotalQuantity > 0 %}
                    {% partial 'form/button/button'
                        text='Add to cart'
                        wrapperClass='product-info__btn _shopaholic-cart-add'
                        type='submit'
                        attr='data-offer-id='~obOffer.id
                    %}
                {% else %}
                    <span class=\"button product-info__btn product-info__btn_not-available\">Out of stock</span>
                {% endif %}

                {% partial 'common/preloader/preloader' wrapperClass=\"product-info__preloader\" %}
                {% partial 'common/tooltip/tooltip' wrapperClass=\"product-info__tooltip\" text=\"Product added to cart\"  %}
                {% if bHasWishListPlugin %}
                    {% partial 'product/wish-list/wish-list-add/wish-list-add' obProduct=obProduct %}
                {% endif %}
            </div>
        </form>
    </div>
</section>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-info/product-info.htm", "");
    }
}
