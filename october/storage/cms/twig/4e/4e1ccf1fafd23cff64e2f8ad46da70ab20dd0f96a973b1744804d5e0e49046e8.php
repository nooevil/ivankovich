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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/form/checkbox/checkbox.htm */
class __TwigTemplate_dfceb347ea1131aa36d4a13aea085e215a1473d60de9703f1fbc653579366823 extends \Twig\Template
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
        $tags = array("if" => 5);
        $filters = array("escape" => 1, "raw" => 17);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
        // line 1
        echo "<div class=\"checkbox ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 1, $this->source), "html", null, true);
        echo " \">
    <input type=\"checkbox\"
           class=\"checkbox__field ";
        // line 3
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["inputClass"] ?? null), 3, $this->source), "html", null, true);
        echo "\"
           id=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 4, $this->source), "html", null, true);
        echo "\"
           ";
        // line 5
        if ( !(($context["name"] ?? null) === null)) {
            // line 6
            echo "                name=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null), 6, $this->source), "html", null, true);
            echo "\"
           ";
        }
        // line 8
        echo "           ";
        if ( !(($context["value"] ?? null) === null)) {
            // line 9
            echo "                value=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["value"] ?? null), 9, $this->source), "html", null, true);
            echo "\"
           ";
        }
        // line 11
        echo "           ";
        if ((($context["checked"] ?? null) == true)) {
            // line 12
            echo "               checked
           ";
        }
        // line 14
        echo "           ";
        if ((($context["disabled"] ?? null) == true)) {
            // line 15
            echo "               disabled
           ";
        }
        // line 17
        echo "            ";
        echo $this->sandbox->ensureToStringAllowed(($context["attribute"] ?? null), 17, $this->source);
        echo "
    >
    <label for=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 19, $this->source), "html", null, true);
        echo "\" class=\"checkbox__label ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["labelClass"] ?? null), 19, $this->source), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["labelText"] ?? null), 19, $this->source), "html", null, true);
        echo "</label>
    ";
        // line 20
        if ( !(($context["hintText"] ?? null) === null)) {
            // line 21
            echo "        <span class=\"checkbox__hint ";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["hintClass"] ?? null), 21, $this->source), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["hintText"] ?? null), 21, $this->source), "html", null, true);
            echo "</span>
    ";
        }
        // line 23
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/form/checkbox/checkbox.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 23,  123 => 21,  121 => 20,  113 => 19,  107 => 17,  103 => 15,  100 => 14,  96 => 12,  93 => 11,  87 => 9,  84 => 8,  78 => 6,  76 => 5,  72 => 4,  68 => 3,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"checkbox {{ wrapperClass }} \">
    <input type=\"checkbox\"
           class=\"checkbox__field {{ inputClass }}\"
           id=\"{{ id }}\"
           {% if name is not same as(null) %}
                name=\"{{ name }}\"
           {% endif %}
           {% if value is not same as(null) %}
                value=\"{{ value }}\"
           {% endif %}
           {% if checked == true %}
               checked
           {% endif %}
           {% if disabled == true %}
               disabled
           {% endif %}
            {{ attribute|raw }}
    >
    <label for=\"{{ id }}\" class=\"checkbox__label {{ labelClass }}\">{{ labelText }}</label>
    {% if hintText is not same as(null) %}
        <span class=\"checkbox__hint {{ hintClass }}\">{{ hintText }}</span>
    {% endif %}
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/form/checkbox/checkbox.htm", "");
    }
}
