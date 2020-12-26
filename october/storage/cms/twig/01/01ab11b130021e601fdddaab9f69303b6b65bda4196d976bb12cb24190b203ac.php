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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/form/button/button.htm */
class __TwigTemplate_c9f48e37065dcdb9df842dff91132abb47b5eb6a551e2c804b4f6a6f0023e100 extends \Twig\Template
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
        $tags = array("if" => 1);
        $filters = array("escape" => 2, "raw" => 3, "default" => 7);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'raw', 'default'],
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
        if ((($context["link"] ?? null) == true)) {
            // line 2
            echo "    <a  class=\"button ";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 2, $this->source), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["href"] ?? null), 2, $this->source), "html", null, true);
            echo "\" ";
            if ((($context["blank"] ?? null) == true)) {
                echo " target=\"_blank\" ";
            }
            // line 3
            echo "        ";
            echo $this->sandbox->ensureToStringAllowed(($context["attr"] ?? null), 3, $this->source);
            echo ">
        ";
            // line 4
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 4, $this->source), "html", null, true);
            echo "
    </a>
";
        } else {
            // line 7
            echo "    <button class=\"button ";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 7, $this->source), "html", null, true);
            echo "\" type=\"";
            echo twig_escape_filter($this->env, (((isset($context["type"]) || array_key_exists("type", $context))) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["type"] ?? null), 7, $this->source), "button")) : ("button")), "html", null, true);
            echo "\" ";
            echo $this->sandbox->ensureToStringAllowed(($context["attr"] ?? null), 7, $this->source);
            echo ">
        ";
            // line 8
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 8, $this->source), "html", null, true);
            echo "
    </button>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/form/button/button.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 8,  84 => 7,  78 => 4,  73 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if link == true %}
    <a  class=\"button {{ wrapperClass }}\" href=\"{{ href }}\" {% if blank==true %} target=\"_blank\" {% endif %}
        {{ attr|raw }}>
        {{ text }}
    </a>
{% else %}
    <button class=\"button {{ wrapperClass }}\" type=\"{{ type|default('button') }}\" {{ attr|raw }}>
        {{ text }}
    </button>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/form/button/button.htm", "");
    }
}
