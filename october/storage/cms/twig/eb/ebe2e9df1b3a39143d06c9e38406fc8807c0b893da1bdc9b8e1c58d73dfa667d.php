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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/form/textarea/textarea.htm */
class __TwigTemplate_ccb10ebd74e0d94af7f785d3813fb2d824b871e2c8b1bb89d938034a149d8e04 extends \Twig\Template
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
        $tags = array("set" => 3, "if" => 11);
        $filters = array("escape" => 4, "default" => 10, "raw" => 18);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'default', 'raw'],
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
        echo "<div class=\"input textarea ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 4, $this->source), "html", null, true);
        echo "\">
    <label for=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 5, $this->source), "html", null, true);
        echo "\" class=\"textarea__label input__label ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["labelStateClass"] ?? null), 5, $this->source), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["labelClass"] ?? null), 5, $this->source), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["labelText"] ?? null), 5, $this->source), "html", null, true);
        echo "</label>
    <textarea
        id=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 7, $this->source), "html", null, true);
        echo "\"
        name=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null), 8, $this->source), "html", null, true);
        echo "\"
        class=\"textarea__field input__field ";
        // line 9
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["inputClass"] ?? null), 9, $this->source), "html", null, true);
        echo "\"
        maxlength=\"";
        // line 10
        echo twig_escape_filter($this->env, (((isset($context["maxLength"]) || array_key_exists("maxLength", $context))) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["maxLength"] ?? null), 10, $this->source), "1000")) : ("1000")), "html", null, true);
        echo "\"
        ";
        // line 11
        if ( !(($context["minLength"] ?? null) === null)) {
            // line 12
            echo "            minlength=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["minLength"] ?? null), 12, $this->source), "html", null, true);
            echo "\"
        ";
        }
        // line 14
        echo "        ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["required"] ?? null), 14, $this->source), "html", null, true);
        echo "
        ";
        // line 15
        if ( !(($context["validationErrorSelector"] ?? null) === null)) {
            // line 16
            echo "            data-bouncer-target=\".";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["validationErrorSelector"] ?? null), 16, $this->source), "html", null, true);
            echo "\"
        ";
        }
        // line 18
        echo "        ";
        echo $this->sandbox->ensureToStringAllowed(($context["attribute"] ?? null), 18, $this->source);
        echo "
    >";
        // line 19
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 19, $this->source), "html", null, true);
        echo "</textarea>
    ";
        // line 20
        if ( !(($context["validationErrorSelector"] ?? null) === null)) {
            // line 21
            echo "        <span class=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["validationErrorSelector"] ?? null), 21, $this->source), "html", null, true);
            echo "\"></span>
    ";
        }
        // line 23
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/form/textarea/textarea.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 23,  131 => 21,  129 => 20,  125 => 19,  120 => 18,  114 => 16,  112 => 15,  107 => 14,  101 => 12,  99 => 11,  95 => 10,  91 => 9,  87 => 8,  83 => 7,  72 => 5,  67 => 4,  65 => 3,  62 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# TODO: Set a unique ID for a correct work of partial #}

{% set labelStateClass = labelStateClass is not empty ? 'input__label_elevated' : '' %}
<div class=\"input textarea {{ wrapperClass }}\">
    <label for=\"{{ id }}\" class=\"textarea__label input__label {{ labelStateClass }} {{ labelClass }}\">{{ labelText }}</label>
    <textarea
        id=\"{{ id }}\"
        name=\"{{ name }}\"
        class=\"textarea__field input__field {{ inputClass }}\"
        maxlength=\"{{ maxLength|default('1000') }}\"
        {% if minLength is not same as(null) %}
            minlength=\"{{ minLength }}\"
        {% endif %}
        {{ required }}
        {% if validationErrorSelector is not same as(null) %}
            data-bouncer-target=\".{{ validationErrorSelector }}\"
        {% endif %}
        {{ attribute|raw }}
    >{{ text }}</textarea>
    {% if validationErrorSelector is not same as(null) %}
        <span class=\"{{ validationErrorSelector }}\"></span>
    {% endif %}
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/form/textarea/textarea.htm", "");
    }
}
