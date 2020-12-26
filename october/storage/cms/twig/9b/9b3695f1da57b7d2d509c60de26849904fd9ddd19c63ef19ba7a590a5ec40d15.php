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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/content/seo-text/seo-text.htm */
class __TwigTemplate_32630a705216a9071cadc5d8a8fd9077a062bdea3efcf23777071298b4d47855 extends \Twig\Template
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
        $filters = array("escape" => 2, "raw" => 2);
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
        if ( !twig_test_empty(($context["text"] ?? null))) {
            // line 2
            echo "<div class=\"seo-text ";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 2, $this->source), "html", null, true);
            echo " wysiwyg\">";
            echo $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 2, $this->source);
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/seo-text/seo-text.htm";
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
        return new Source("{% if text is not empty %}
<div class=\"seo-text {{ wrapperClass }} wysiwyg\">{{ text|raw }}</div>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/seo-text/seo-text.htm", "");
    }
}
