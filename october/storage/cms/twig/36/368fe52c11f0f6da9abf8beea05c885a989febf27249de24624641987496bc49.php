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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/form/input/input.htm */
class __TwigTemplate_198731a0d4741366860e24524e5c4bd999e0d2a80dc5c1b0aa78bf483c92d438 extends \Twig\Template
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
        $tags = array("set" => 3, "if" => 13);
        $filters = array("escape" => 4, "raw" => 40);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'raw'],
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
        // line 2
        echo "
";
        // line 3
        $context["labelStateClass"] = (( !twig_test_empty(($context["labelStateClass"] ?? null))) ? ("input__label_elevated") : (""));
        // line 4
        echo "<div class=\"input ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 4, $this->source), "html", null, true);
        echo "\">
    <label for=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 5, $this->source), "html", null, true);
        echo "\" class=\"input__label ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["labelStateClass"] ?? null), 5, $this->source), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["labelClass"] ?? null), 5, $this->source), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["labelText"] ?? null), 5, $this->source), "html", null, true);
        echo "</label>
    <input
        type=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["type"] ?? null), 7, $this->source), "html", null, true);
        echo "\"
        id=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 8, $this->source), "html", null, true);
        echo "\"
        name=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null), 9, $this->source), "html", null, true);
        echo "\"
        class=\"input__field ";
        // line 10
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["inputClass"] ?? null), 10, $this->source), "html", null, true);
        echo "\"
        data-was-change=\"false\"
        ";
        // line 12
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["required"] ?? null), 12, $this->source), "html", null, true);
        echo "
        ";
        // line 13
        if ( !(($context["value"] ?? null) === null)) {
            // line 14
            echo "            value=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["value"] ?? null), 14, $this->source), "html", null, true);
            echo "\"
        ";
        }
        // line 16
        echo "        ";
        if ((($context["disabled"] ?? null) == true)) {
            // line 17
            echo "            disabled=\"disabled\"
        ";
        }
        // line 19
        echo "        ";
        if ( !(($context["min"] ?? null) === null)) {
            // line 20
            echo "            min=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["min"] ?? null), 20, $this->source), "html", null, true);
            echo "\"
        ";
        }
        // line 22
        echo "        ";
        if ( !(($context["max"] ?? null) === null)) {
            // line 23
            echo "            max=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["max"] ?? null), 23, $this->source), "html", null, true);
            echo "\"
        ";
        }
        // line 25
        echo "        ";
        if ( !(($context["maxLength"] ?? null) === null)) {
            // line 26
            echo "            maxlength=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["maxLength"] ?? null), 26, $this->source), "html", null, true);
            echo "\"
        ";
        }
        // line 28
        echo "        ";
        if ( !(($context["minLength"] ?? null) === null)) {
            // line 29
            echo "            minlength=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["minLength"] ?? null), 29, $this->source), "html", null, true);
            echo "\"
        ";
        }
        // line 31
        echo "        ";
        if ( !(($context["pattern"] ?? null) === null)) {
            // line 32
            echo "           pattern=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["pattern"] ?? null), 32, $this->source), "html", null, true);
            echo "\"
        ";
        }
        // line 34
        echo "        ";
        if ( !(($context["validationErrorSelector"] ?? null) === null)) {
            // line 35
            echo "            data-bouncer-target=\".";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["validationErrorSelector"] ?? null), 35, $this->source), "html", null, true);
            echo "\"
        ";
        }
        // line 37
        echo "        ";
        if ( !(($context["customErrorMessage"] ?? null) === null)) {
            // line 38
            echo "            data-bouncer-message=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["customErrorMessage"] ?? null), 38, $this->source), "html", null, true);
            echo "\"
        ";
        }
        // line 40
        echo "        ";
        echo $this->sandbox->ensureToStringAllowed(($context["attribute"] ?? null), 40, $this->source);
        echo "
    >
    ";
        // line 42
        if ( !(($context["validationErrorSelector"] ?? null) === null)) {
            // line 43
            echo "        <span class=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["validationErrorSelector"] ?? null), 43, $this->source), "html", null, true);
            echo "\"></span>
    ";
        }
        // line 45
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/form/input/input.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  196 => 45,  190 => 43,  188 => 42,  182 => 40,  176 => 38,  173 => 37,  167 => 35,  164 => 34,  158 => 32,  155 => 31,  149 => 29,  146 => 28,  140 => 26,  137 => 25,  131 => 23,  128 => 22,  122 => 20,  119 => 19,  115 => 17,  112 => 16,  106 => 14,  104 => 13,  100 => 12,  95 => 10,  91 => 9,  87 => 8,  83 => 7,  72 => 5,  67 => 4,  65 => 3,  62 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# TODO: Set a unique ID for a correct work of partial #}

{% set labelStateClass = labelStateClass is not empty ? 'input__label_elevated' : '' %}
<div class=\"input {{ wrapperClass }}\">
    <label for=\"{{ id }}\" class=\"input__label {{ labelStateClass }} {{ labelClass }}\">{{ labelText }}</label>
    <input
        type=\"{{ type }}\"
        id=\"{{ id }}\"
        name=\"{{ name }}\"
        class=\"input__field {{ inputClass }}\"
        data-was-change=\"false\"
        {{ required }}
        {% if value is not same as(null) %}
            value=\"{{ value }}\"
        {% endif %}
        {% if disabled == true %}
            disabled=\"disabled\"
        {% endif %}
        {% if min is not same as(null) %}
            min=\"{{ min }}\"
        {% endif %}
        {% if max is not same as(null) %}
            max=\"{{ max }}\"
        {% endif %}
        {% if maxLength is not same as(null) %}
            maxlength=\"{{ maxLength }}\"
        {% endif %}
        {% if minLength is not same as(null) %}
            minlength=\"{{ minLength }}\"
        {% endif %}
        {% if pattern is not same as(null) %}
           pattern=\"{{ pattern }}\"
        {% endif %}
        {% if validationErrorSelector is not same as(null) %}
            data-bouncer-target=\".{{ validationErrorSelector }}\"
        {% endif %}
        {% if customErrorMessage is not same as(null) %}
            data-bouncer-message=\"{{ customErrorMessage }}\"
        {% endif %}
        {{ attribute|raw }}
    >
    {% if validationErrorSelector is not same as(null) %}
        <span class=\"{{ validationErrorSelector }}\"></span>
    {% endif %}
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/form/input/input.htm", "");
    }
}
