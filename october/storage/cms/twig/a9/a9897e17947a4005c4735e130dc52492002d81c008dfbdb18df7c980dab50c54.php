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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter-bar/filter-bar-btn-ajax.htm */
class __TwigTemplate_2d586b541da0f10d1704ed7b81c0d9608aa52e4b46725498f0561e5efb82ab39 extends \Twig\Template
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
        $tags = array("set" => 1, "if" => 2);
        $filters = array("length" => 1, "escape" => 6);
        $functions = array("choice" => 6);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['length', 'escape'],
                ['choice']
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
        $context["iFilterCount"] = (twig_length_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["arFilterValue"] ?? null), 1, $this->source)) + twig_length_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["arFilterBrandIDList"] ?? null), 1, $this->source)));
        // line 2
        if (((($context["fMinPriceFilterValue"] ?? null) > 0) || (($context["fMaxPriceFilterValue"] ?? null) > 0))) {
            // line 3
            echo "    ";
            $context["iFilterCount"] = (($context["iFilterCount"] ?? null) + 1);
        }
        // line 5
        echo "
<button type=\"button\" class=\"filter-bar__filter-btn js-filter-bar\" aria-label=\"Open Filter Panel. ";
        // line 6
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["iFilterCount"] ?? null), 6, $this->source), "html", null, true);
        echo " ";
        echo call_user_func_array($this->env->getFunction('choice')->getCallable(), ["filter|filters|filters", $this->sandbox->ensureToStringAllowed(($context["iFilterCount"] ?? null), 6, $this->source)]);
        echo " were checked\">
    <span class=\"filter-bar__filter-text\" aria-hidden=\"true\">Filter</span>
    ";
        // line 8
        if ((($context["iFilterCount"] ?? null) > 0)) {
            // line 9
            echo "        <span class=\"filter-bar__filter-counter\" aria-hidden=\"true\">(";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["iFilterCount"] ?? null), 9, $this->source), "html", null, true);
            echo ")</span>
    ";
        } else {
            // line 11
            echo "        <span class=\"filter-bar__filter-counter\" aria-hidden=\"true\"></span>
    ";
        }
        // line 13
        echo "</button>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter-bar/filter-bar-btn-ajax.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 13,  88 => 11,  82 => 9,  80 => 8,  73 => 6,  70 => 5,  66 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set iFilterCount = arFilterValue|length + arFilterBrandIDList|length %}
{% if fMinPriceFilterValue > 0 or fMaxPriceFilterValue > 0 %}
    {% set iFilterCount = iFilterCount + 1 %}
{% endif %}

<button type=\"button\" class=\"filter-bar__filter-btn js-filter-bar\" aria-label=\"Open Filter Panel. {{ iFilterCount }} {{ choice('filter|filters|filters', iFilterCount) }} were checked\">
    <span class=\"filter-bar__filter-text\" aria-hidden=\"true\">Filter</span>
    {% if iFilterCount > 0 %}
        <span class=\"filter-bar__filter-counter\" aria-hidden=\"true\">({{ iFilterCount }})</span>
    {% else %}
        <span class=\"filter-bar__filter-counter\" aria-hidden=\"true\"></span>
    {% endif %}
</button>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter-bar/filter-bar-btn-ajax.htm", "");
    }
}
