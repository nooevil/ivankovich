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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/catalog.htm */
class __TwigTemplate_2f83448fa38edbfe33bc3043ef095ac7849c8297416f2e615c2d308cf2896626 extends \Twig\Template
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
        $tags = array("set" => 1, "partial" => 6, "if" => 8);
        $filters = array("escape" => 7, "default" => 7);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'partial', 'if'],
                ['escape', 'default'],
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
        $context["arBreadcrumbs"] = [0 => ["active" => true, "name" => twig_get_attribute($this->env, $this->source,         // line 2
($context["obCategory"] ?? null), "name", [], "any", false, false, true, 2)]];
        // line 4
        echo "
<div class=\"catalog grid full-width\">
    ";
        // line 6
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "catalog__breadcrumbs"        ;
        $context['__cms_partial_params']['arBreadcrumbs'] = ($context["arBreadcrumbs"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/breadcrumbs/breadcrumbs"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 7
        echo "    <h1 class=\"catalog__title\">";
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getPageTitle", [0 => ($context["obCategory"] ?? null), 1 => ($context["arSEOParams"] ?? null)], "method", true, true, true, 7)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getPageTitle", [0 => ($context["obCategory"] ?? null), 1 => ($context["arSEOParams"] ?? null)], "method", false, false, true, 7), 7, $this->source), $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obCategory"] ?? null), "name", [], "any", false, false, true, 7), 7, $this->source))) : (twig_get_attribute($this->env, $this->source, ($context["obCategory"] ?? null), "name", [], "any", false, false, true, 7))), "html", null, true);
        echo "</h1>
    ";
        // line 8
        if (((twig_get_attribute($this->env, $this->source, ($context["obCategory"] ?? null), "name", [], "any", false, false, true, 8) == "Lady Wind") || (twig_get_attribute($this->env, $this->source, ($context["obCategory"] ?? null), "name", [], "any", false, false, true, 8) == "Unlimited"))) {
            // line 9
            echo "    ";
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['text'] = ((twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getPageDescription", [0 => ($context["obCategory"] ?? null), 1 => ($context["arSEOParams"] ?? null)], "method", true, true, true, 9)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getPageDescription", [0 => ($context["obCategory"] ?? null), 1 => ($context["arSEOParams"] ?? null)], "method", false, false, true, 9), twig_get_attribute($this->env, $this->source, ($context["obCategory"] ?? null), "description", [], "any", false, false, true, 9))) : (twig_get_attribute($this->env, $this->source, ($context["obCategory"] ?? null), "description", [], "any", false, false, true, 9)))            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/seo-text/seo-text"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 10
            echo "    ";
        }
        // line 11
        echo "    <div class=\"catalog__wrapper\">
        ";
        // line 12
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/catalog/catalog-ajax"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 13
        echo "    </div>
    ";
        // line 14
        if (((twig_get_attribute($this->env, $this->source, ($context["obCategory"] ?? null), "name", [], "any", false, false, true, 14) != "Lady Wind") && (twig_get_attribute($this->env, $this->source, ($context["obCategory"] ?? null), "name", [], "any", false, false, true, 14) != "Unlimited"))) {
            // line 15
            echo "    ";
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['text'] = ((twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getPageDescription", [0 => ($context["obCategory"] ?? null), 1 => ($context["arSEOParams"] ?? null)], "method", true, true, true, 15)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getPageDescription", [0 => ($context["obCategory"] ?? null), 1 => ($context["arSEOParams"] ?? null)], "method", false, false, true, 15), twig_get_attribute($this->env, $this->source, ($context["obCategory"] ?? null), "description", [], "any", false, false, true, 15))) : (twig_get_attribute($this->env, $this->source, ($context["obCategory"] ?? null), "description", [], "any", false, false, true, 15)))            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/seo-text/seo-text"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 16
            echo "    ";
        }
        // line 17
        echo "    ";
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "catalog__preloader"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 18
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/catalog.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 18,  112 => 17,  109 => 16,  103 => 15,  101 => 14,  98 => 13,  94 => 12,  91 => 11,  88 => 10,  82 => 9,  80 => 8,  75 => 7,  69 => 6,  65 => 4,  63 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set arBreadcrumbs = [
    {'active': true, 'name': obCategory.name }
] %}

<div class=\"catalog grid full-width\">
    {% partial 'common/breadcrumbs/breadcrumbs' wrapperClass='catalog__breadcrumbs' arBreadcrumbs=arBreadcrumbs  %}
    <h1 class=\"catalog__title\">{{ SeoToolbox.getPageTitle(obCategory, arSEOParams)|default(obCategory.name) }}</h1>
    {% if obCategory.name == \"Lady Wind\" or obCategory.name == \"Unlimited\" %}
    {% partial 'content/seo-text/seo-text' text=SeoToolbox.getPageDescription(obCategory, arSEOParams)|default(obCategory.description) %}
    {% endif %}
    <div class=\"catalog__wrapper\">
        {% partial 'product/catalog/catalog-ajax' %}
    </div>
    {% if obCategory.name != \"Lady Wind\" and obCategory.name != \"Unlimited\" %}
    {% partial 'content/seo-text/seo-text' text=SeoToolbox.getPageDescription(obCategory, arSEOParams)|default(obCategory.description) %}
    {% endif %}
    {% partial 'common/preloader/preloader' wrapperClass='catalog__preloader' %}
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/catalog.htm", "");
    }
}
