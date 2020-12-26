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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/content/contact/contact-popup.htm */
class __TwigTemplate_de4940cb4ca2bd8f4388afda78dbb8bfcf4d18deb274523f3db1cf7848a8ffba extends \Twig\Template
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
        $tags = array("set" => 1, "if" => 7);
        $filters = array("escape" => 8);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
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
        $context["sTitle"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 1), "map_popup_title", [], "any", false, false, true, 1);
        // line 2
        $context["sAddressValue"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 2), "address", [], "any", false, false, true, 2);
        // line 3
        $context["sAddressDescription"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 3), "address_description", [], "any", false, false, true, 3);
        // line 4
        $context["sPhoneValue"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 4), "phone", [], "any", false, false, true, 4);
        // line 5
        echo "
<div class=\"map-popup contact__popup\">
    ";
        // line 7
        if ( !twig_test_empty(($context["sTitle"] ?? null))) {
            // line 8
            echo "        <h4 class=\"map-popup__title\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sTitle"] ?? null), 8, $this->source), "html", null, true);
            echo "</h4>
    ";
        }
        // line 10
        echo "    ";
        if ( !twig_test_empty(($context["sAddressValue"] ?? null))) {
            // line 11
            echo "        <b class=\"map-popup__address\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sAddressValue"] ?? null), 11, $this->source), "html", null, true);
            echo "</b>
    ";
        }
        // line 13
        echo "    ";
        if ( !twig_test_empty(($context["sPhoneValue"] ?? null))) {
            // line 14
            echo "        <span class=\"map-popup__tel\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sPhoneValue"] ?? null), 14, $this->source), "html", null, true);
            echo "</span>
    ";
        }
        // line 16
        echo "    ";
        if ( !twig_test_empty(($context["sAddressDescription"] ?? null))) {
            // line 17
            echo "        <span class=\"map-popup__working-hours\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sAddressDescription"] ?? null), 17, $this->source), "html", null, true);
            echo "</span>
    ";
        }
        // line 19
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/contact/contact-popup.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 19,  103 => 17,  100 => 16,  94 => 14,  91 => 13,  85 => 11,  82 => 10,  76 => 8,  74 => 7,  70 => 5,  68 => 4,  66 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set sTitle              = this.theme.map_popup_title %}
{% set sAddressValue       = this.theme.address %}
{% set sAddressDescription = this.theme.address_description %}
{% set sPhoneValue         = this.theme.phone %}

<div class=\"map-popup contact__popup\">
    {% if sTitle is not empty %}
        <h4 class=\"map-popup__title\">{{ sTitle }}</h4>
    {% endif %}
    {% if sAddressValue is not empty %}
        <b class=\"map-popup__address\">{{ sAddressValue }}</b>
    {% endif %}
    {% if sPhoneValue is not empty %}
        <span class=\"map-popup__tel\">{{ sPhoneValue }}</span>
    {% endif %}
    {% if sAddressDescription is not empty %}
        <span class=\"map-popup__working-hours\">{{ sAddressDescription }}</span>
    {% endif %}
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/contact/contact-popup.htm", "");
    }
}
