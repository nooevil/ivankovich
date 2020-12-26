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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/two-level-slider/two-level-slider-ajax.htm */
class __TwigTemplate_193d980a6ef60d70293b8469bc3915f8a1fbc39d08c8ca654d080f27de9537c9 extends \Twig\Template
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
        $tags = array("if" => 1, "set" => 2, "for" => 9, "partial" => 12);
        $filters = array("escape" => 11);
        $functions = array("input" => 2);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for', 'partial'],
                ['escape'],
                ['input']
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
        if (twig_test_empty(($context["iCategoryID"] ?? null))) {
            // line 2
            echo "    ";
            $context["iCategoryID"] = input("category_id");
        }
        // line 4
        echo "
";
        // line 5
        $context["arProductList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["ProductList"] ?? null), "make", [], "method", false, false, true, 5), "category", [0 => ($context["iCategoryID"] ?? null), 1 => true], "method", false, false, true, 5), "sort", [0 => "popularity|desc"], "method", false, false, true, 5), "active", [], "method", false, false, true, 5), "take", [0 => 18], "method", false, false, true, 5);
        // line 6
        if ( !twig_test_empty(($context["arProductList"] ?? null))) {
            // line 7
            echo "    <div class=\"two-level-slider__container swiper-container\" id=\"trending-slider\" role=\"region\" aria-live=\"polite\">
        <ul class=\"two-level-slider__wrapper swiper-wrapper\">
            ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["arProductList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["obProduct"]) {
                // line 10
                echo "                <li class=\"two-level-slider__slide swiper-slide\">
                    <a href=\"";
                // line 11
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obProduct"], "getPageUrl", [0 => "product"], "method", false, false, true, 11), 11, $this->source), "html", null, true);
                echo "\" class=\"two-level-slider__link\">
                        ";
                // line 12
                $context['__cms_partial_params'] = [];
                $context['__cms_partial_params']['obProduct'] = $context["obProduct"]                ;
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/product-card/product-card"                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 13
                echo "                    </a>
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obProduct'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "        </ul>
    </div>
    <div class=\"two-level-slider__nav-wrapper\">
        <div class=\"two-level-slider__nav two-level-slider__nav_prev\"></div>
        <div class=\"two-level-slider__pagination\"></div>
        <div class=\"two-level-slider__nav two-level-slider__nav_next\"></div>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/two-level-slider/two-level-slider-ajax.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 16,  95 => 13,  90 => 12,  86 => 11,  83 => 10,  79 => 9,  75 => 7,  73 => 6,  71 => 5,  68 => 4,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if iCategoryID is empty %}
    {% set iCategoryID = input('category_id') %}
{% endif %}

{% set arProductList = ProductList.make().category(iCategoryID, true).sort('popularity|desc').active().take(18) %}
{% if arProductList is not empty %}
    <div class=\"two-level-slider__container swiper-container\" id=\"trending-slider\" role=\"region\" aria-live=\"polite\">
        <ul class=\"two-level-slider__wrapper swiper-wrapper\">
            {% for obProduct in arProductList %}
                <li class=\"two-level-slider__slide swiper-slide\">
                    <a href=\"{{ obProduct.getPageUrl('product') }}\" class=\"two-level-slider__link\">
                        {% partial 'product/product-card/product-card' obProduct=obProduct %}
                    </a>
                </li>
            {% endfor %}
        </ul>
    </div>
    <div class=\"two-level-slider__nav-wrapper\">
        <div class=\"two-level-slider__nav two-level-slider__nav_prev\"></div>
        <div class=\"two-level-slider__pagination\"></div>
        <div class=\"two-level-slider__nav two-level-slider__nav_next\"></div>
    </div>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/two-level-slider/two-level-slider-ajax.htm", "");
    }
}
