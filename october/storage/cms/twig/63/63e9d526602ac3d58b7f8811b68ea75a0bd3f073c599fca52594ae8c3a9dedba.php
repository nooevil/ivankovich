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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/footer/footer-info/footer-info.htm */
class __TwigTemplate_88f06230fd86bfe7f91a2029d8ad3dfb4a89ca57cf3fbe8a3722065445c6e583 extends \Twig\Template
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
        $tags = array("set" => 1, "if" => 6, "partial" => 9);
        $filters = array("raw" => 7, "escape" => 11);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'partial'],
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
        $context["sDescription"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 1), "description_footer", [], "any", false, false, true, 1);
        // line 2
        $context["sPrivacyPolicyUrl"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 2), "privacy_policy_url", [], "any", false, false, true, 2);
        // line 3
        $context["sCopyright"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 3), "copyright", [], "any", false, false, true, 3);
        // line 4
        echo "
<div class=\"footer-info\">
    ";
        // line 6
        if ( !twig_test_empty(($context["sDescription"] ?? null))) {
            // line 7
            echo "        <div class=\"footer-info__descr wysiwyg\">";
            echo $this->sandbox->ensureToStringAllowed(($context["sDescription"] ?? null), 7, $this->source);
            echo "</div>
    ";
        }
        // line 9
        echo "    ";
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("footer/footer-social/footer-social"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 10
        echo "    ";
        if ( !twig_test_empty(($context["sPrivacyPolicyUrl"] ?? null))) {
            // line 11
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sPrivacyPolicyUrl"] ?? null), 11, $this->source), "html", null, true);
            echo "\" class=\"footer-info__policy\">Privacy Policy</a>
    ";
        }
        // line 13
        echo "    ";
        if ( !twig_test_empty(($context["sCopyright"] ?? null))) {
            // line 14
            echo "        <span class=\"footer-info__copyright\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sCopyright"] ?? null), 14, $this->source), "html", null, true);
            echo "</span>
    ";
        }
        // line 16
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/footer/footer-info/footer-info.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 16,  97 => 14,  94 => 13,  88 => 11,  85 => 10,  80 => 9,  74 => 7,  72 => 6,  68 => 4,  66 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set sDescription        = this.theme.description_footer %}
{% set sPrivacyPolicyUrl   = this.theme.privacy_policy_url %}
{% set sCopyright          = this.theme.copyright %}

<div class=\"footer-info\">
    {% if sDescription is not empty %}
        <div class=\"footer-info__descr wysiwyg\">{{ sDescription|raw() }}</div>
    {% endif %}
    {% partial 'footer/footer-social/footer-social' %}
    {% if sPrivacyPolicyUrl is not empty %}
        <a href=\"{{ sPrivacyPolicyUrl }}\" class=\"footer-info__policy\">Privacy Policy</a>
    {% endif %}
    {% if sCopyright is not empty %}
        <span class=\"footer-info__copyright\">{{ sCopyright }}</span>
    {% endif %}
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/footer/footer-info/footer-info.htm", "");
    }
}
