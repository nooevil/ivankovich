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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/common/logo/logo.htm */
class __TwigTemplate_0250e1e01a6fbd36e1bfcc67530aec5ed489f17885581335b336f1d5ddf47784 extends \Twig\Template
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
        $tags = array("set" => 1, "if" => 5);
        $filters = array("page" => 6, "escape" => 6, "media" => 7);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['page', 'escape', 'media'],
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
        $context["sLogoTitle"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 1), "logo_title", [], "any", false, false, true, 1);
        // line 2
        $context["sLogoDescription"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 2), "logo_alt", [], "any", false, false, true, 2);
        // line 3
        $context["sLogoImage"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 3), "logo_image", [], "any", false, false, true, 3);
        // line 4
        echo "
";
        // line 5
        if ( !twig_test_empty(($context["sLogoImage"] ?? null))) {
            // line 6
            echo "    <a ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, true, 6), "id", [], "any", false, false, true, 6) != "index")) {
                echo " href=\"";
                echo $this->extensions['Cms\Twig\Extension']->pageFilter("index");
                echo "\" ";
            }
            echo " class=\"logo ";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 6, $this->source), "html", null, true);
            echo "\" aria-label=\"Go to index page\">
        <img src=\"";
            // line 7
            echo $this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(($context["sLogoImage"] ?? null), 7, $this->source));
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sLogoDescription"] ?? null), 7, $this->source), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sLogoTitle"] ?? null), 7, $this->source), "html", null, true);
            echo "\" class=\"logo__img\">
    </a>
";
        } else {
            // line 10
            echo "    <div class=\"logo logo_stub\"></div>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/common/logo/logo.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 10,  84 => 7,  73 => 6,  71 => 5,  68 => 4,  66 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set sLogoTitle = this.theme.logo_title %}
{% set sLogoDescription = this.theme.logo_alt %}
{% set sLogoImage = this.theme.logo_image %}

{% if sLogoImage is not empty %}
    <a {% if this.page.id != 'index' %} href=\"{{ 'index'|page }}\" {% endif %} class=\"logo {{ wrapperClass }}\" aria-label=\"Go to index page\">
        <img src=\"{{ sLogoImage|media }}\" alt=\"{{ sLogoDescription }}\" title=\"{{ sLogoTitle }}\" class=\"logo__img\">
    </a>
{% else %}
    <div class=\"logo logo_stub\"></div>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/common/logo/logo.htm", "");
    }
}
