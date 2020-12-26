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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/footer/footer-social/footer-social.htm */
class __TwigTemplate_d898bac7999a2ab0ba83e6b3acfc71c59fc4c2bf97b22da46597a43dab7cc43b extends \Twig\Template
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
        $filters = array("escape" => 11, "theme" => 12);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
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
        $context["sFacebookURL"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 1), "social_networks_facebook", [], "any", false, false, true, 1);
        // line 2
        $context["sTwitterURL"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 2), "social_networks_twitter", [], "any", false, false, true, 2);
        // line 3
        $context["sInstagramURL"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 3), "social_networks_instagram", [], "any", false, false, true, 3);
        // line 4
        $context["sTelegramURL"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 4), "social_networks_telegram", [], "any", false, false, true, 4);
        // line 5
        $context["sYoutubeURL"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 5), "social_networks_youtube", [], "any", false, false, true, 5);
        // line 6
        echo "
";
        // line 7
        if ((((( !twig_test_empty(($context["sFacebookURL"] ?? null)) ||  !twig_test_empty(($context["sTwitterURL"] ?? null))) ||  !twig_test_empty(($context["sInstagramURL"] ?? null))) ||  !twig_test_empty(($context["sTelegramURL"] ?? null))) ||  !twig_test_empty(($context["sYoutubeURL"] ?? null)))) {
            // line 8
            echo "    <ul class=\"footer-social\">
        ";
            // line 9
            if ( !twig_test_empty(($context["sFacebookURL"] ?? null))) {
                // line 10
                echo "            <li class=\"footer-social__item\">
                <a href=\"";
                // line 11
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sFacebookURL"] ?? null), 11, $this->source), "html", null, true);
                echo "\" class=\"footer-social__link\" rel=\"noopener\" target=\"_blank\" >
                    <img class=\"footer-social__img\" src=\"";
                // line 12
                echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/img/icon/facebook.svg");
                echo "\" alt=\"Facebook\">
                </a>
            </li>
        ";
            }
            // line 16
            echo "        ";
            if ( !twig_test_empty(($context["sTwitterURL"] ?? null))) {
                // line 17
                echo "            <li class=\"footer-social__item\">
                <a href=\"";
                // line 18
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sTwitterURL"] ?? null), 18, $this->source), "html", null, true);
                echo "\" class=\"footer-social__link\" rel=\"noopener\" target=\"_blank\">
                    <img class=\"footer-social__img\" src=\"";
                // line 19
                echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/img/icon/twitter.svg");
                echo "\" alt=\"Twitter\">
                </a>
            </li>
        ";
            }
            // line 23
            echo "        ";
            if ( !twig_test_empty(($context["sYoutubeURL"] ?? null))) {
                // line 24
                echo "            <li class=\"footer-social__item\">
                <a href=\"";
                // line 25
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sYoutubeURL"] ?? null), 25, $this->source), "html", null, true);
                echo "\" class=\"footer-social__link\" rel=\"noopener\" target=\"_blank\">
                    <img class=\"footer-social__img\" src=\"";
                // line 26
                echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/img/icon/youtube.svg");
                echo "\" alt=\"Youtube\">
                </a>
            </li>
        ";
            }
            // line 30
            echo "        ";
            if ( !twig_test_empty(($context["sInstagramURL"] ?? null))) {
                // line 31
                echo "            <li class=\"footer-social__item\">
                <a href=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sInstagramURL"] ?? null), 32, $this->source), "html", null, true);
                echo "\" class=\"footer-social__link\" rel=\"noopener\" target=\"_blank\">
                    <img class=\"footer-social__img\" src=\"";
                // line 33
                echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/img/icon/instagram.svg");
                echo "\" alt=\"Instagram\">
                </a>
            </li>
        ";
            }
            // line 37
            echo "        ";
            if ( !twig_test_empty(($context["sTelegramURL"] ?? null))) {
                // line 38
                echo "            <li class=\"footer-social__item\">
                <a href=\"";
                // line 39
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sTelegramURL"] ?? null), 39, $this->source), "html", null, true);
                echo "\" class=\"footer-social__link\" rel=\"noopener\" target=\"_blank\">
                    <img class=\"footer-social__img\" src=\"";
                // line 40
                echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/img/icon/telegram.svg");
                echo "\" alt=\"Telegram\">
                </a>
            </li>
        ";
            }
            // line 44
            echo "    </ul>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/footer/footer-social/footer-social.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 44,  157 => 40,  153 => 39,  150 => 38,  147 => 37,  140 => 33,  136 => 32,  133 => 31,  130 => 30,  123 => 26,  119 => 25,  116 => 24,  113 => 23,  106 => 19,  102 => 18,  99 => 17,  96 => 16,  89 => 12,  85 => 11,  82 => 10,  80 => 9,  77 => 8,  75 => 7,  72 => 6,  70 => 5,  68 => 4,  66 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set sFacebookURL = this.theme.social_networks_facebook %}
{% set sTwitterURL = this.theme.social_networks_twitter %}
{% set sInstagramURL = this.theme.social_networks_instagram %}
{% set sTelegramURL = this.theme.social_networks_telegram %}
{% set sYoutubeURL = this.theme.social_networks_youtube %}

{% if sFacebookURL is not empty or sTwitterURL is not empty or sInstagramURL is not empty or sTelegramURL is not empty or sYoutubeURL is not empty %}
    <ul class=\"footer-social\">
        {% if sFacebookURL is not empty %}
            <li class=\"footer-social__item\">
                <a href=\"{{ sFacebookURL }}\" class=\"footer-social__link\" rel=\"noopener\" target=\"_blank\" >
                    <img class=\"footer-social__img\" src=\"{{ 'assets/img/icon/facebook.svg'|theme }}\" alt=\"Facebook\">
                </a>
            </li>
        {% endif %}
        {% if sTwitterURL is not empty %}
            <li class=\"footer-social__item\">
                <a href=\"{{ sTwitterURL }}\" class=\"footer-social__link\" rel=\"noopener\" target=\"_blank\">
                    <img class=\"footer-social__img\" src=\"{{ 'assets/img/icon/twitter.svg'|theme }}\" alt=\"Twitter\">
                </a>
            </li>
        {% endif %}
        {% if sYoutubeURL is not empty %}
            <li class=\"footer-social__item\">
                <a href=\"{{ sYoutubeURL }}\" class=\"footer-social__link\" rel=\"noopener\" target=\"_blank\">
                    <img class=\"footer-social__img\" src=\"{{ 'assets/img/icon/youtube.svg'|theme }}\" alt=\"Youtube\">
                </a>
            </li>
        {% endif %}
        {% if sInstagramURL is not empty %}
            <li class=\"footer-social__item\">
                <a href=\"{{ sInstagramURL }}\" class=\"footer-social__link\" rel=\"noopener\" target=\"_blank\">
                    <img class=\"footer-social__img\" src=\"{{ 'assets/img/icon/instagram.svg'|theme }}\" alt=\"Instagram\">
                </a>
            </li>
        {% endif %}
        {% if sTelegramURL is not empty %}
            <li class=\"footer-social__item\">
                <a href=\"{{ sTelegramURL }}\" class=\"footer-social__link\" rel=\"noopener\" target=\"_blank\">
                    <img class=\"footer-social__img\" src=\"{{ 'assets/img/icon/telegram.svg'|theme }}\" alt=\"Telegram\">
                </a>
            </li>
        {% endif %}
    </ul>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/footer/footer-social/footer-social.htm", "");
    }
}
