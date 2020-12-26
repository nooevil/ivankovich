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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/content/contact/contact-map.htm */
class __TwigTemplate_7e41be589b72758245d24a9212b76db53e7451aae5b05fffad8ff8059c4e3f20 extends \Twig\Template
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
        $tags = array("set" => 1, "if" => 6, "partial" => 12);
        $filters = array("escape" => 9, "theme" => 11);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'partial'],
                ['escape', 'theme'],
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
        $context["sActive"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 1), "map_active", [], "any", false, false, true, 1);
        // line 2
        $context["sLat"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 2), "map_lat", [], "any", false, false, true, 2);
        // line 3
        $context["sLng"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 3), "map_lng", [], "any", false, false, true, 3);
        // line 4
        $context["sApiKey"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 4), "map_api_key", [], "any", false, false, true, 4);
        // line 5
        echo "
";
        // line 6
        if ((($context["sActive"] ?? null) &&  !twig_test_empty(($context["sApiKey"] ?? null)))) {
            // line 7
            echo "    <div class=\"contact__map-wrap\">
        <div class=\"map contact__map\"
            data-api-key=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sApiKey"] ?? null), 9, $this->source), "html", null, true);
            echo "\"
            data-coordinates=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sLat"] ?? null), 10, $this->source), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sLng"] ?? null), 10, $this->source), "html", null, true);
            echo "\"
            data-marker-path=";
            // line 11
            echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/img/icon/marker.png");
            echo ">
            ";
            // line 12
            $context['__cms_partial_params'] = [];
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/contact/contact-popup"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 13
            echo "        </div>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/contact/contact-map.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 13,  93 => 12,  89 => 11,  83 => 10,  79 => 9,  75 => 7,  73 => 6,  70 => 5,  68 => 4,  66 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set sActive = this.theme.map_active %}
{% set sLat    = this.theme.map_lat %}
{% set sLng    = this.theme.map_lng %}
{% set sApiKey = this.theme.map_api_key %}

{% if sActive and sApiKey is not empty %}
    <div class=\"contact__map-wrap\">
        <div class=\"map contact__map\"
            data-api-key=\"{{ sApiKey }}\"
            data-coordinates=\"{{ sLat }},{{ sLng }}\"
            data-marker-path={{ 'assets/img/icon/marker.png'|theme }}>
            {% partial 'content/contact/contact-popup' %}
        </div>
    </div>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/contact/contact-map.htm", "");
    }
}
