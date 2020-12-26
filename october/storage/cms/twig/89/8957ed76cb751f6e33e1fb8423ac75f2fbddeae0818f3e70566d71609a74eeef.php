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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter-checkbox/filter-checkbox.htm */
class __TwigTemplate_8bc53c0b8ee7e54156ee683ce69835d005a94e65d20bfc9e58dfbca5ab71a3ec extends \Twig\Template
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
        $tags = array("partial" => 1);
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
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "filter__checkbox"        ;
        $context['__cms_partial_params']['id'] =         // line 3
($context["id"] ?? null)        ;
        $context['__cms_partial_params']['labelClass'] = "filter-checkbox__label"        ;
        $context['__cms_partial_params']['labelText'] =         // line 5
($context["text"] ?? null)        ;
        $context['__cms_partial_params']['name'] =         // line 6
($context["name"] ?? null)        ;
        $context['__cms_partial_params']['checked'] =         // line 7
($context["checked"] ?? null)        ;
        $context['__cms_partial_params']['disabled'] =         // line 8
($context["disabled"] ?? null)        ;
        $context['__cms_partial_params']['hintText'] =         // line 9
($context["hintText"] ?? null)        ;
        $context['__cms_partial_params']['hintClass'] = "filter__checkbox-hint"        ;
        $context['__cms_partial_params']['value'] =         // line 11
($context["value"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("form/checkbox/checkbox"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter-checkbox/filter-checkbox.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 11,  76 => 9,  74 => 8,  72 => 7,  70 => 6,  68 => 5,  65 => 3,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% partial 'form/checkbox/checkbox'
    wrapperClass='filter__checkbox'
    id=id
    labelClass='filter-checkbox__label'
    labelText=text
    name=name
    checked=checked
    disabled=disabled
    hintText=hintText
    hintClass='filter__checkbox-hint'
    value=value
%}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter-checkbox/filter-checkbox.htm", "");
    }
}
