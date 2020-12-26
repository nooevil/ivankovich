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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/common/tooltip/tooltip.htm */
class __TwigTemplate_5833f600be10d9cac668247cff50386c4f75e9ba7a0959d915ab32d829d4f8ad extends \Twig\Template
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
        $tags = array("set" => 1);
        $filters = array("escape" => 2);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set'],
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
        $context["errorTooltip"] = (((($context["error"] ?? null) == true)) ? ("tooltip__error") : (""));
        // line 2
        echo "<div class=\"tooltip ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 2, $this->source), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["errorTooltip"] ?? null), 2, $this->source), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 2, $this->source), "html", null, true);
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/common/tooltip/tooltip.htm";
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
        return new Source("{% set errorTooltip = error == true ? 'tooltip__error' %}
<div class=\"tooltip {{ wrapperClass }} {{ errorTooltip }}\">{{ text }}</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/common/tooltip/tooltip.htm", "");
    }
}
