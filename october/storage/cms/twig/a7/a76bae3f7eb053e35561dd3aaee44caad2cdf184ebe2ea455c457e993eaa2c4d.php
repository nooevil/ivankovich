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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/content/contact/contact-list.htm */
class __TwigTemplate_47b588d3649292df1182fb47c2b0a49a08786908449b437002d87825af93d696 extends \Twig\Template
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
        $tags = array("set" => 1, "if" => 8);
        $filters = array("escape" => 10, "page" => 11);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'page'],
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
        $context["sAddressValue"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 1), "address", [], "any", false, false, true, 1);
        // line 2
        $context["sAddressDescription"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 2), "address_description", [], "any", false, false, true, 2);
        // line 3
        $context["sPhoneValue"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 3), "phone", [], "any", false, false, true, 3);
        // line 4
        $context["sPhoneDescription"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 4), "phone_description", [], "any", false, false, true, 4);
        // line 5
        $context["sEmailValue"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 5), "email", [], "any", false, false, true, 5);
        // line 6
        $context["sEmailDescription"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 6), "email_description", [], "any", false, false, true, 6);
        // line 7
        echo "
";
        // line 8
        if ((( !twig_test_empty(($context["sAddressValue"] ?? null)) ||  !twig_test_empty(($context["sPhoneValue"] ?? null))) ||  !twig_test_empty(($context["sEmailValue"] ?? null)))) {
            // line 9
            echo "    <ul class=\"contact__list\" itemscope itemtype=\"http://schema.org/Organization\">
        <meta itemprop=\"name\" content=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 10), "company_name", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
            echo "\">
        <link itemprop=\"url\" href=\"";
            // line 11
            echo $this->extensions['Cms\Twig\Extension']->pageFilter("index");
            echo "\">
        ";
            // line 12
            if ( !twig_test_empty(($context["sAddressValue"] ?? null))) {
                // line 13
                echo "            <li class=\"contact__item\" itemprop=\"address\" itemscope itemtype=\"http://schema.org/PostalAddress\">
                <b class=\"contact__item-heading\">Address</b>
                <span class=\"contact__item-content\" itemprop=\"streetAddress\">";
                // line 15
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sAddressValue"] ?? null), 15, $this->source), "html", null, true);
                echo "</span>
                ";
                // line 16
                if ( !twig_test_empty(($context["sAddressDescription"] ?? null))) {
                    // line 17
                    echo "                    <span class=\"contact__item-hint\">";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sAddressDescription"] ?? null), 17, $this->source), "html", null, true);
                    echo "</span>
                ";
                }
                // line 19
                echo "            </li>
        ";
            }
            // line 21
            echo "        ";
            if ( !twig_test_empty(($context["sPhoneValue"] ?? null))) {
                // line 22
                echo "            <li class=\"contact__item\">
                <b class=\"contact__item-heading\">Phone</b>
                <a href=\"tel: ";
                // line 24
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sPhoneValue"] ?? null), 24, $this->source), "html", null, true);
                echo "\" class=\"contact__item-content\">
                    <span itemprop=\"telephone\">
                        ";
                // line 26
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sPhoneValue"] ?? null), 26, $this->source), "html", null, true);
                echo "
                    </span>
                </a>
                ";
                // line 29
                if ( !twig_test_empty(($context["sPhoneDescription"] ?? null))) {
                    // line 30
                    echo "                    <span class=\"contact__item-hint\">";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sPhoneDescription"] ?? null), 30, $this->source), "html", null, true);
                    echo "</span>
                ";
                }
                // line 32
                echo "            </li>
        ";
            }
            // line 34
            echo "        ";
            if ( !twig_test_empty(($context["sEmailValue"] ?? null))) {
                // line 35
                echo "            <li class=\"contact__item\">
                <b class=\"contact__item-heading\">E-mail</b>
                <a href=\"mailto: ";
                // line 37
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sEmailValue"] ?? null), 37, $this->source), "html", null, true);
                echo "\" class=\"contact__item-content\">
                    <span itemprop=\"email\">
                        ";
                // line 39
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sEmailValue"] ?? null), 39, $this->source), "html", null, true);
                echo "
                    </span>
                </a>
                ";
                // line 42
                if ( !twig_test_empty(($context["sEmailDescription"] ?? null))) {
                    // line 43
                    echo "                    <span class=\"contact__item-hint\">";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sEmailDescription"] ?? null), 43, $this->source), "html", null, true);
                    echo "</span>
                ";
                }
                // line 45
                echo "            </li>
        ";
            }
            // line 47
            echo "    </ul>
";
        }
        // line 49
        echo "
<style>
    .breadcrumbs {
        grid-column: 4 / -1;
    }
</style>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/contact/contact-list.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 49,  172 => 47,  168 => 45,  162 => 43,  160 => 42,  154 => 39,  149 => 37,  145 => 35,  142 => 34,  138 => 32,  132 => 30,  130 => 29,  124 => 26,  119 => 24,  115 => 22,  112 => 21,  108 => 19,  102 => 17,  100 => 16,  96 => 15,  92 => 13,  90 => 12,  86 => 11,  82 => 10,  79 => 9,  77 => 8,  74 => 7,  72 => 6,  70 => 5,  68 => 4,  66 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set sAddressValue       = this.theme.address %}
{% set sAddressDescription = this.theme.address_description %}
{% set sPhoneValue         = this.theme.phone %}
{% set sPhoneDescription   = this.theme.phone_description %}
{% set sEmailValue         = this.theme.email %}
{% set sEmailDescription   = this.theme.email_description %}

{% if sAddressValue is not empty or sPhoneValue is not empty or sEmailValue is not empty %}
    <ul class=\"contact__list\" itemscope itemtype=\"http://schema.org/Organization\">
        <meta itemprop=\"name\" content=\"{{ this.theme.company_name }}\">
        <link itemprop=\"url\" href=\"{{ 'index'|page }}\">
        {% if sAddressValue is not empty %}
            <li class=\"contact__item\" itemprop=\"address\" itemscope itemtype=\"http://schema.org/PostalAddress\">
                <b class=\"contact__item-heading\">Address</b>
                <span class=\"contact__item-content\" itemprop=\"streetAddress\">{{ sAddressValue }}</span>
                {% if sAddressDescription is not empty %}
                    <span class=\"contact__item-hint\">{{ sAddressDescription }}</span>
                {% endif %}
            </li>
        {% endif %}
        {% if sPhoneValue is not empty %}
            <li class=\"contact__item\">
                <b class=\"contact__item-heading\">Phone</b>
                <a href=\"tel: {{ sPhoneValue }}\" class=\"contact__item-content\">
                    <span itemprop=\"telephone\">
                        {{ sPhoneValue }}
                    </span>
                </a>
                {% if sPhoneDescription is not empty %}
                    <span class=\"contact__item-hint\">{{ sPhoneDescription }}</span>
                {% endif %}
            </li>
        {% endif %}
        {% if sEmailValue is not empty %}
            <li class=\"contact__item\">
                <b class=\"contact__item-heading\">E-mail</b>
                <a href=\"mailto: {{ sEmailValue }}\" class=\"contact__item-content\">
                    <span itemprop=\"email\">
                        {{ sEmailValue }}
                    </span>
                </a>
                {% if sEmailDescription is not empty %}
                    <span class=\"contact__item-hint\">{{ sEmailDescription }}</span>
                {% endif %}
            </li>
        {% endif %}
    </ul>
{% endif %}

<style>
    .breadcrumbs {
        grid-column: 4 / -1;
    }
</style>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/contact/contact-list.htm", "");
    }
}
