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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/relative-product-slider/relative-product-slider.htm */
class __TwigTemplate_d04a98fc9e8ca1ff797ebc2128c228f82f4e8ed58df0adf18d5291b13aa419da extends \Twig\Template
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
        $tags = array("if" => 1, "partial" => 4, "for" => 8);
        $filters = array("escape" => 10);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'partial', 'for'],
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
        if ( !twig_test_empty(($context["arProductList"] ?? null))) {
            // line 2
            echo "    <section class=\"relative-product-slider\">
        ";
            // line 3
            if ( !twig_test_empty(($context["sBlockTitle"] ?? null))) {
                // line 4
                echo "            ";
                $context['__cms_partial_params'] = [];
                $context['__cms_partial_params']['text'] = ($context["sBlockTitle"] ?? null)                ;
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/section-title/section-title"                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 5
                echo "        ";
            }
            // line 6
            echo "        <div class=\"relative-product-slider__container swiper-container\">
            <ul class=\"relative-product-slider__wrapper swiper-wrapper\">
                ";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["arProductList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["obSliderProduct"]) {
                // line 9
                echo "                    <li class=\"relative-product-slider__slide swiper-slide\">
                        <a href=\"";
                // line 10
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obSliderProduct"], "getPageUrl", [0 => "product"], "method", false, false, true, 10), 10, $this->source), "html", null, true);
                echo "\" class=\"relative-product-slider__link\">
                            ";
                // line 11
                $context['__cms_partial_params'] = [];
                $context['__cms_partial_params']['obProduct'] = $context["obSliderProduct"]                ;
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/product-card/product-card"                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 12
                echo "                        </a>
                    </li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obSliderProduct'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "            </ul>
        </div>
        <div class=\"relative-product-slider__nav-wrapper\">
            <div class=\"relative-product-slider__nav relative-product-slider__nav_prev\"></div>
            <div class=\"relative-product-slider__pagination\"></div>
            <div class=\"relative-product-slider__nav relative-product-slider__nav_next\"></div>
        </div>
        ";
            // line 22
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['wrapperClass'] = "relative-product-slider__preloader"            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 23
            echo "    </section>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/relative-product-slider/relative-product-slider.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 23,  115 => 22,  106 => 15,  98 => 12,  93 => 11,  89 => 10,  86 => 9,  82 => 8,  78 => 6,  75 => 5,  69 => 4,  67 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if arProductList is not empty %}
    <section class=\"relative-product-slider\">
        {% if sBlockTitle is not empty %}
            {% partial 'common/section-title/section-title' text=sBlockTitle %}
        {% endif %}
        <div class=\"relative-product-slider__container swiper-container\">
            <ul class=\"relative-product-slider__wrapper swiper-wrapper\">
                {% for obSliderProduct in arProductList %}
                    <li class=\"relative-product-slider__slide swiper-slide\">
                        <a href=\"{{ obSliderProduct.getPageUrl('product') }}\" class=\"relative-product-slider__link\">
                            {% partial 'product/product-card/product-card' obProduct=obSliderProduct %}
                        </a>
                    </li>
                {% endfor %}
            </ul>
        </div>
        <div class=\"relative-product-slider__nav-wrapper\">
            <div class=\"relative-product-slider__nav relative-product-slider__nav_prev\"></div>
            <div class=\"relative-product-slider__pagination\"></div>
            <div class=\"relative-product-slider__nav relative-product-slider__nav_next\"></div>
        </div>
        {% partial 'common/preloader/preloader' wrapperClass='relative-product-slider__preloader' %}
    </section>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/relative-product-slider/relative-product-slider.htm", "");
    }
}
