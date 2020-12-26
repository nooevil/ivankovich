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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/header/search/search.htm */
class __TwigTemplate_548f71d6117c429b07f10b1d1bd2dd395335b7ea25c05a98d7b7129769eebced extends \Twig\Template
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
        $tags = array("partial" => 3);
        $filters = array("escape" => 1);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['partial'],
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
        echo "<div class=\"search ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 1, $this->source), "html", null, true);
        echo "\">
    <button type=\"button\" class=\"search__btn js-search-popup\" aria-label=\"Open search sidebar\">Search</button>
    ";
        // line 3
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("header/search/search-panel/search-panel"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 4
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/search/search.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 4,  68 => 3,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"search {{ wrapperClass }}\">
    <button type=\"button\" class=\"search__btn js-search-popup\" aria-label=\"Open search sidebar\">Search</button>
    {% partial 'header/search/search-panel/search-panel' %}
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/search/search.htm", "");
    }
}
