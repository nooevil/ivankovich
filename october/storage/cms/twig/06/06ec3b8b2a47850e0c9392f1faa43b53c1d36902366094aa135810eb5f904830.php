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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-card/product-card.htm */
class __TwigTemplate_9561c922512ba293f9e8f9f6074e89ef937ca8ccd404291cd04c1be60a1004ed extends \Twig\Template
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
        $tags = array("set" => 1, "if" => 4, "partial" => 12);
        $filters = array("length" => 4, "escape" => 6, "theme" => 14);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'partial'],
                ['length', 'escape', 'theme'],
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
        $context["obOffer"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "offer", [], "any", false, false, true, 1), "first", [], "method", false, false, true, 1);
        // line 2
        echo "<div class=\"product-card\" itemscope itemtype=\"http://schema.org/Product\">
    <div class=\"product-card__img-wrap\">
        ";
        // line 4
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 4), "path", [], "any", false, false, true, 4)) > 0)) {
            // line 5
            echo "            <picture class=\"product-card__img-container\">
                <source media=\"(min-width:769px)\" data-srcset=\"";
            // line 6
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 6), "getThumb", [0 => 373, 1 => 600, 2 => ["quantity" => 90, "extension" => "webp"]], "method", false, false, true, 6), 6, $this->source), "html", null, true);
            echo "\" type=\"image/webp\">
                <source media=\"(min-width:769px)\" data-srcset=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 7), "getThumb", [0 => 373, 1 => 600, 2 => ["quantity" => 90]], "method", false, false, true, 7), 7, $this->source), "html", null, true);
            echo "\" type=\"image/jpeg\">
                <source media=\"(max-width:768px)\" data-srcset=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 8), "getThumb", [0 => 373, 1 => 510, 2 => ["quantity" => 90, "extension" => "webp"]], "method", false, false, true, 8), 8, $this->source), "html", null, true);
            echo "\" type=\"image/webp\">
                <source media=\"(max-width:768px)\" data-srcset=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 9), "getThumb", [0 => 373, 1 => 510, 2 => ["quantity" => 90]], "method", false, false, true, 9), 9, $this->source), "html", null, true);
            echo "\" type=\"image/jpeg\">
                <img class=\"product-card__img js-lazy-load\" data-src=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 10), "getThumb", [0 => 373, 1 => 510, 2 => ["quantity" => 90]], "method", false, false, true, 10), 10, $this->source), "html", null, true);
            echo "\" itemprop=\"image\" alt=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 10), "description", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 10), "title", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
            echo "\">
            </picture>
            ";
            // line 12
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['wrapperClass'] = "product-card__preloader"            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 13
            echo "        ";
        } else {
            // line 14
            echo "            <img class=\"product-card__img product-card__img_no-photo\" src=\"";
            echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/img/nophoto.svg");
            echo "\" itemprop=\"image\" alt=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 14), "description", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "preview_image", [], "any", false, false, true, 14), "title", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
            echo "\">
        ";
        }
        // line 16
        echo "    </div>
    <h3 class=\"product-card__title\" itemprop=\"name\">";
        // line 17
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "name", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
        echo "</h3>
    <div class=\"product-card__price-wrap\" itemscope itemprop=\"offers\" itemtype=\"http://schema.org/Offer\">
        ";
        // line 19
        if ((twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "old_price_value", [], "any", false, false, true, 19) > 0)) {
            // line 20
            echo "            <div class=\"product-card__price product-card__price_current\">
                <span class=\"product-card__price-currency\" itemprop=\"priceCurrency\" content=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "currency_code", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "currency", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
            echo "</span>
                <span class=\"product-card__price-value\" itemprop=\"price\">";
            // line 22
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "price", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
            echo "</span>
            </div>
            <div class=\"product-card__price product-card__price_old\">
                <span class=\"product-card__price-currency\" itemprop=\"priceCurrency\" content=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "currency_code", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "currency", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
            echo "</span>
                <span class=\"product-card__price-value\" itemprop=\"price\">";
            // line 26
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "old_price", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
            echo "</span>
            </div>
        ";
        } else {
            // line 29
            echo "            <div class=\"product-card__price\">
                <span class=\"product-card__price-currency\" itemprop=\"priceCurrency\" content=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "currency_code", [], "any", false, false, true, 30), 30, $this->source), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "currency", [], "any", false, false, true, 30), 30, $this->source), "html", null, true);
            echo "</span>
                <span class=\"product-card__price-value\" itemprop=\"price\">";
            // line 31
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "price", [], "any", false, false, true, 31), 31, $this->source), "html", null, true);
            echo "</span>
            </div>
        ";
        }
        // line 34
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-card/product-card.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 34,  162 => 31,  156 => 30,  153 => 29,  147 => 26,  141 => 25,  135 => 22,  129 => 21,  126 => 20,  124 => 19,  119 => 17,  116 => 16,  106 => 14,  103 => 13,  98 => 12,  89 => 10,  85 => 9,  81 => 8,  77 => 7,  73 => 6,  70 => 5,  68 => 4,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set obOffer = obProduct.offer.first() %}
<div class=\"product-card\" itemscope itemtype=\"http://schema.org/Product\">
    <div class=\"product-card__img-wrap\">
        {% if obProduct.preview_image.path|length > 0 %}
            <picture class=\"product-card__img-container\">
                <source media=\"(min-width:769px)\" data-srcset=\"{{ obProduct.preview_image.getThumb(373, 600, {'quantity': 90, 'extension': 'webp'}) }}\" type=\"image/webp\">
                <source media=\"(min-width:769px)\" data-srcset=\"{{ obProduct.preview_image.getThumb(373, 600, {'quantity': 90}) }}\" type=\"image/jpeg\">
                <source media=\"(max-width:768px)\" data-srcset=\"{{ obProduct.preview_image.getThumb(373, 510, {'quantity': 90, 'extension': 'webp'}) }}\" type=\"image/webp\">
                <source media=\"(max-width:768px)\" data-srcset=\"{{ obProduct.preview_image.getThumb(373, 510, {'quantity': 90}) }}\" type=\"image/jpeg\">
                <img class=\"product-card__img js-lazy-load\" data-src=\"{{ obProduct.preview_image.getThumb(373, 510, {'quantity': 90}) }}\" itemprop=\"image\" alt=\"{{ obProduct.preview_image.description }}\" title=\"{{ obProduct.preview_image.title }}\">
            </picture>
            {% partial 'common/preloader/preloader' wrapperClass='product-card__preloader' %}
        {% else %}
            <img class=\"product-card__img product-card__img_no-photo\" src=\"{{ 'assets/img/nophoto.svg'|theme }}\" itemprop=\"image\" alt=\"{{ obProduct.preview_image.description }}\" title=\"{{ obProduct.preview_image.title }}\">
        {% endif %}
    </div>
    <h3 class=\"product-card__title\" itemprop=\"name\">{{ obProduct.name }}</h3>
    <div class=\"product-card__price-wrap\" itemscope itemprop=\"offers\" itemtype=\"http://schema.org/Offer\">
        {% if obOffer.old_price_value > 0 %}
            <div class=\"product-card__price product-card__price_current\">
                <span class=\"product-card__price-currency\" itemprop=\"priceCurrency\" content=\"{{ obOffer.currency_code }}\">{{ obOffer.currency }}</span>
                <span class=\"product-card__price-value\" itemprop=\"price\">{{ obOffer.price }}</span>
            </div>
            <div class=\"product-card__price product-card__price_old\">
                <span class=\"product-card__price-currency\" itemprop=\"priceCurrency\" content=\"{{ obOffer.currency_code }}\">{{ obOffer.currency }}</span>
                <span class=\"product-card__price-value\" itemprop=\"price\">{{ obOffer.old_price }}</span>
            </div>
        {% else %}
            <div class=\"product-card__price\">
                <span class=\"product-card__price-currency\" itemprop=\"priceCurrency\" content=\"{{ obOffer.currency_code }}\">{{ obOffer.currency }}</span>
                <span class=\"product-card__price-value\" itemprop=\"price\">{{ obOffer.price }}</span>
            </div>
        {% endif %}
    </div>
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-card/product-card.htm", "");
    }
}
