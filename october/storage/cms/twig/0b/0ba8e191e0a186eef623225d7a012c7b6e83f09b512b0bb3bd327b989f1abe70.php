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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter-size/filter-size.htm */
class __TwigTemplate_844df2111afcf7b4d4c7b6766abf64e5ddd8a7b04735dc181c3b924834dc2126 extends \Twig\Template
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
        $tags = array("if" => 7);
        $filters = array("escape" => 1, "default" => 2);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
        echo "<li class=\"filter-size__item ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 1, $this->source), "html", null, true);
        echo "\">
    <input type=\"";
        // line 2
        echo twig_escape_filter($this->env, (((isset($context["type"]) || array_key_exists("type", $context))) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["type"] ?? null), 2, $this->source), "checkbox")) : ("checkbox")), "html", null, true);
        echo "\"
           class=\"filter-size__checkbox\"
           id=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 4, $this->source), "html", null, true);
        echo "\"
           name=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null), 5, $this->source), "html", null, true);
        echo "\"
           value=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["value"] ?? null), 6, $this->source), "html", null, true);
        echo "\"
           ";
        // line 7
        if ((($context["checked"] ?? null) == true)) {
            // line 8
            echo "               checked
           ";
        }
        // line 10
        echo "           ";
        if ((($context["disabled"] ?? null) == true)) {
            // line 11
            echo "               disabled
           ";
        }
        // line 13
        echo "    >
    <label for=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 14, $this->source), "html", null, true);
        echo "\" class=\"filter-size__label\">";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["labelText"] ?? null), 14, $this->source), "html", null, true);
        echo "</label>
</li>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter-size/filter-size.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 14,  97 => 13,  93 => 11,  90 => 10,  86 => 8,  84 => 7,  80 => 6,  76 => 5,  72 => 4,  67 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<li class=\"filter-size__item {{ wrapperClass }}\">
    <input type=\"{{ type|default('checkbox') }}\"
           class=\"filter-size__checkbox\"
           id=\"{{ id }}\"
           name=\"{{ name }}\"
           value=\"{{ value }}\"
           {% if checked == true %}
               checked
           {% endif %}
           {% if disabled == true %}
               disabled
           {% endif %}
    >
    <label for=\"{{ id }}\" class=\"filter-size__label\">{{ labelText }}</label>
</li>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter-size/filter-size.htm", "");
    }
}
