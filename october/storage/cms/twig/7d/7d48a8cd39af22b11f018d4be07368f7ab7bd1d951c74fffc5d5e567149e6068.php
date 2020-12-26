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

/* /sr/apache/vivankovich.com/october/plugins/lovata/mightyseo/components/seotoolbox/default.htm */
class __TwigTemplate_68a7950d7e0405ea8e520b838db51c47821c910de7f807398950aa064be42619 extends \Twig\Template
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
        $tags = array("set" => 4, "if" => 5);
        $filters = array("raw" => 1, "escape" => 6);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['raw', 'escape'],
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
        echo "<title>";
        echo $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["__SELF__"] ?? null), "getTitle", [], "method", false, false, true, 1), 1, $this->source);
        echo "</title>
<meta name=\"description\" content=\"";
        // line 2
        echo $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["__SELF__"] ?? null), "get", [0 => "seo_description"], "method", false, false, true, 2), 2, $this->source);
        echo "\">
<meta name=\"keywords\" content=\"";
        // line 3
        echo $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["__SELF__"] ?? null), "get", [0 => "seo_keywords"], "method", false, false, true, 3), 3, $this->source);
        echo "\">
";
        // line 4
        $context["sRobotsTag"] = twig_get_attribute($this->env, $this->source, ($context["__SELF__"] ?? null), "getRobotsMeta", [], "method", false, false, true, 4);
        // line 5
        if ( !twig_test_empty(($context["sRobotsTag"] ?? null))) {
            // line 6
            echo "    <meta name=\"robots\" content=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sRobotsTag"] ?? null), 6, $this->source), "html", null, true);
            echo "\">
";
        }
        // line 8
        $context["sCanonicalURL"] = twig_get_attribute($this->env, $this->source, ($context["__SELF__"] ?? null), "get", [0 => "canonical_url"], "method", false, false, true, 8);
        // line 9
        if ( !twig_test_empty(($context["sCanonicalURL"] ?? null))) {
            // line 10
            echo "    <link rel=\"canonical\" href=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sCanonicalURL"] ?? null), 10, $this->source), "html", null, true);
            echo "\">
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/plugins/lovata/mightyseo/components/seotoolbox/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 10,  87 => 9,  85 => 8,  79 => 6,  77 => 5,  75 => 4,  71 => 3,  67 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<title>{{ __SELF__.getTitle()|raw }}</title>
<meta name=\"description\" content=\"{{ __SELF__.get('seo_description')|raw }}\">
<meta name=\"keywords\" content=\"{{ __SELF__.get('seo_keywords')|raw }}\">
{% set sRobotsTag = __SELF__.getRobotsMeta() %}
{% if sRobotsTag is not empty %}
    <meta name=\"robots\" content=\"{{ sRobotsTag }}\">
{% endif %}
{% set sCanonicalURL = __SELF__.get('canonical_url') %}
{% if sCanonicalURL is not empty %}
    <link rel=\"canonical\" href=\"{{ sCanonicalURL }}\">
{% endif %}", "/sr/apache/vivankovich.com/october/plugins/lovata/mightyseo/components/seotoolbox/default.htm", "");
    }
}
