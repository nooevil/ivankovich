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

/* /sr/apache/vivankovich.com/october/themes/vi2/pages/product.htm */
class __TwigTemplate_d6b3ca82fafc47abe06bcd2241ed3a3866aa7282dbdcb896a19d55653ea23d14 extends \Twig\Template
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
        $tags = array("put" => 1, "set" => 8, "component" => 10, "partial" => 18, "if" => 22);
        $filters = array("escape" => 2);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['put', 'set', 'component', 'partial', 'if'],
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
        echo $this->env->getExtension('Cms\Twig\Extension')->startBlock('page_style'        );
        // line 2
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["path_page_css"] ?? null), 2, $this->source), "html", null, true);
        echo "\">
";
        // line 1
        echo $this->env->getExtension('Cms\Twig\Extension')->endBlock(true        );
        // line 4
        echo $this->env->getExtension('Cms\Twig\Extension')->startBlock('page_script'        );
        // line 5
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["path_page_js"] ?? null), 5, $this->source), "html", null, true);
        echo "\"></script>
";
        // line 4
        echo $this->env->getExtension('Cms\Twig\Extension')->endBlock(true        );
        // line 7
        echo "
";
        // line 8
        $context["arSEOParams"] = ["product" => ($context["obProduct"] ?? null), "category" => twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "category", [], "any", false, false, true, 8)];
        // line 9
        echo $this->env->getExtension('Cms\Twig\Extension')->startBlock('seo_tags'        );
        // line 10
        echo "    ";
        $context['__cms_component_params'] = [];
        $context['__cms_component_params']['model'] = ($context["obProduct"] ?? null)        ;
        $context['__cms_component_params']['params'] = ($context["arSEOParams"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("SeoToolbox"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 9
        echo $this->env->getExtension('Cms\Twig\Extension')->endBlock(true        );
        // line 12
        echo "
";
        // line 13
        $context["arBreadcrumbs"] = [0 => ["slug" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 14
($context["obProduct"] ?? null), "category", [], "any", false, false, true, 14), "getPageUrl", [0 => "catalog"], "method", false, false, true, 14), "name" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "category", [], "any", false, false, true, 14), "name", [], "any", false, false, true, 14)], 1 => ["active" => true, "name" => twig_get_attribute($this->env, $this->source,         // line 15
($context["obProduct"] ?? null), "name", [], "any", false, false, true, 15)]];
        // line 17
        echo "
";
        // line 18
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "product-info__breadcrumbs"        ;
        $context['__cms_partial_params']['arBreadcrumbs'] = ($context["arBreadcrumbs"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/breadcrumbs/breadcrumbs"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 19
        echo "\t\t\t\t
";
        // line 20
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['obProduct'] = ($context["obProduct"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/product-info/product-info"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 21
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['obProduct'] = ($context["obProduct"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/product-description/product-description"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 22
        if (($context["bHasReviewsPlugin"] ?? null)) {
            // line 23
            echo "    ";
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['obProduct'] = ($context["obProduct"] ?? null)            ;
            $context['__cms_partial_params']['obReviewList'] = ($context["obReviewList"] ?? null)            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/review/review"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 24
            echo "    ";
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['obProduct'] = ($context["obProduct"] ?? null)            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/review/total-rating/total-rating"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
        }
        // line 26
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['arProductList'] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["ProductList"] ?? null), "make", [], "method", false, false, true, 26), "active", [], "method", false, false, true, 26), "category", [0 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "category", [], "any", false, false, true, 26), "id", [], "any", false, false, true, 26)], "method", false, false, true, 26), "random", [0 => 5], "method", false, false, true, 26)        ;
        $context['__cms_partial_params']['sBlockTitle'] = "You May Also Like"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/relative-product-slider/relative-product-slider"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 27
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['arProductList'] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "accessory", [], "any", false, false, true, 27), "active", [], "method", false, false, true, 27), "random", [0 => 5], "method", false, false, true, 27)        ;
        $context['__cms_partial_params']['sBlockTitle'] = "Accessories"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/relative-product-slider/relative-product-slider"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 28
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "seo-text_bottom"        ;
        $context['__cms_partial_params']['text'] = twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getPageDescription", [0 => ($context["obProduct"] ?? null), 1 => ($context["arSEOParams"] ?? null)], "method", false, false, true, 28)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/seo-text/seo-text"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/pages/product.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 28,  147 => 27,  141 => 26,  134 => 24,  127 => 23,  125 => 22,  120 => 21,  115 => 20,  112 => 19,  106 => 18,  103 => 17,  101 => 15,  100 => 14,  99 => 13,  96 => 12,  94 => 9,  87 => 10,  85 => 9,  83 => 8,  80 => 7,  78 => 4,  73 => 5,  71 => 4,  69 => 1,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% put page_style %}
    <link rel=\"stylesheet\" href=\"{{ path_page_css }}\">
{% endput %}
{% put page_script %}
    <script src=\"{{ path_page_js }}\"></script>
{% endput %}

{% set arSEOParams = {'product': obProduct, 'category': obProduct.category} %}
{% put seo_tags %}
    {% component 'SeoToolbox' model=obProduct params=arSEOParams %}
{% endput %}

{% set arBreadcrumbs = [
    {'slug': obProduct.category.getPageUrl('catalog'), 'name': obProduct.category.name},
    {'active': true, 'name': obProduct.name}
] %}

{% partial 'common/breadcrumbs/breadcrumbs' wrapperClass='product-info__breadcrumbs' arBreadcrumbs=arBreadcrumbs  %}
\t\t\t\t
{% partial 'product/product-info/product-info' obProduct=obProduct %}
{% partial 'product/product-description/product-description' obProduct=obProduct %}
{% if bHasReviewsPlugin %}
    {% partial 'content/review/review' obProduct=obProduct obReviewList=obReviewList %}
    {% partial 'content/review/total-rating/total-rating' obProduct=obProduct %}
{% endif %}
{% partial 'product/relative-product-slider/relative-product-slider' arProductList=ProductList.make().active().category(obProduct.category.id).random(5) sBlockTitle='You May Also Like' %}
{% partial 'product/relative-product-slider/relative-product-slider' arProductList=obProduct.accessory.active().random(5) sBlockTitle='Accessories' %}
{% partial 'content/seo-text/seo-text' wrapperClass='seo-text_bottom' text=SeoToolbox.getPageDescription(obProduct, arSEOParams) %}", "/sr/apache/vivankovich.com/october/themes/vi2/pages/product.htm", "");
    }
}
