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

/* /sr/apache/vivankovich.com/october/themes/vi2/pages/contact.htm */
class __TwigTemplate_83acdd797e69a5c95010ba5065a08b9142ef462103f4ac15c823e60c845b6d0e extends \Twig\Template
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
        $tags = array("put" => 1, "set" => 8, "partial" => 14);
        $filters = array("escape" => 2, "default" => 8);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['put', 'set', 'partial'],
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
        $context["sPageTitle"] = ((twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getPageTitle", [], "method", true, true, true, 8)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getPageTitle", [], "method", false, false, true, 8), 8, $this->source), "Contacts")) : ("Contacts"));
        // line 9
        echo "
";
        // line 10
        $context["arBreadcrumbs"] = [0 => ["active" => true, "name" =>         // line 11
($context["sPageTitle"] ?? null)]];
        // line 13
        echo "
";
        // line 14
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['arBreadcrumbs'] = ($context["arBreadcrumbs"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/breadcrumbs/breadcrumbs"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 15
        echo "<h1 class=\"section-title contact__title\">";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sPageTitle"] ?? null), 15, $this->source), "html", null, true);
        echo "</h1>
";
        // line 16
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/contact/contact-photo"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 17
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/contact/contact-map"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 18
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/contact/contact-list"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/pages/contact.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 18,  108 => 17,  104 => 16,  99 => 15,  94 => 14,  91 => 13,  89 => 11,  88 => 10,  85 => 9,  83 => 8,  80 => 7,  78 => 4,  73 => 5,  71 => 4,  69 => 1,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% put page_style %}
    <link rel=\"stylesheet\" href=\"{{ path_page_css }}\">
{% endput %}
{% put page_script %}
    <script src=\"{{ path_page_js }}\"></script>
{% endput %}

{% set sPageTitle = SeoToolbox.getPageTitle()|default('Contacts') %}

{% set arBreadcrumbs = [
    {'active': true, 'name': sPageTitle }
] %}

{% partial 'common/breadcrumbs/breadcrumbs' arBreadcrumbs=arBreadcrumbs  %}
<h1 class=\"section-title contact__title\">{{ sPageTitle }}</h1>
{% partial 'content/contact/contact-photo' %}
{% partial 'content/contact/contact-map' %}
{% partial 'content/contact/contact-list' %}", "/sr/apache/vivankovich.com/october/themes/vi2/pages/contact.htm", "");
    }
}
