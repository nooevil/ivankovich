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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter.htm */
class __TwigTemplate_cd6002eeac8cd2b2ff4aa1b5c154c4793d7619918e290264ccac8c39b29bae84 extends \Twig\Template
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
        $tags = array("partial" => 2);
        $filters = array();
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['partial'],
                [],
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
        echo "<section class=\"filter\">
    ";
        // line 2
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "filter__header"        ;
        $context['__cms_partial_params']['text'] = "Filter"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/section-title/section-title"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 3
        echo "    <button type=\"button\" class=\"filter__btn-close js-filter-bar\" aria-label=\"Close Filter Panel\"></button>
    <div class=\"filter__wrapper\">
       ";
        // line 5
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['obCategory'] = ($context["obCategory"] ?? null)        ;
        $context['__cms_partial_params']['obCategoryProductList'] = ($context["obCategoryProductList"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/catalog/filter/filter-ajax"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 6
        echo "    </div>
    ";
        // line 7
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "filter__preloader"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 8
        echo "</section>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 8,  84 => 7,  81 => 6,  75 => 5,  71 => 3,  65 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<section class=\"filter\">
    {% partial 'common/section-title/section-title' wrapperClass='filter__header' text='Filter' %}
    <button type=\"button\" class=\"filter__btn-close js-filter-bar\" aria-label=\"Close Filter Panel\"></button>
    <div class=\"filter__wrapper\">
       {% partial 'product/catalog/filter/filter-ajax' obCategory=obCategory obCategoryProductList=obCategoryProductList %}
    </div>
    {% partial 'common/preloader/preloader' wrapperClass='filter__preloader' %}
</section>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter.htm", "");
    }
}
