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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/form/input/input-tel.htm */
class __TwigTemplate_c6524de4d782828019bdb4e7b3a3b02985840817143ae8b5482b9ec67785c3bf extends \Twig\Template
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
        $filters = array("default" => 2);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['partial'],
                ['default'],
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
        $context['__cms_partial_params']['labelText'] = ((        // line 2
(isset($context["labelText"]) || array_key_exists("labelText", $context))) ? (_twig_default_filter(($context["labelText"] ?? null), "Phone number")) : ("Phone number"))        ;
        $context['__cms_partial_params']['type'] = "tel"        ;
        $context['__cms_partial_params']['maxLength'] = "25"        ;
        $context['__cms_partial_params']['minLength'] = "3"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("form/input/input"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/form/input/input-tel.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% partial 'form/input/input'
    labelText=labelText|default('Phone number')
    type='tel'
    maxLength='25'
    minLength='3'
%}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/form/input/input-tel.htm", "");
    }
}
