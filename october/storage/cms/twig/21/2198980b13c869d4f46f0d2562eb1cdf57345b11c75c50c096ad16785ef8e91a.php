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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-description/product-description.htm */
class __TwigTemplate_6f504cabdfeec3e6ca8b8059e3446f529fd6f4cff00d880dc13c81f93e397a09 extends \Twig\Template
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
        $tags = array("set" => 1, "if" => 6, "for" => 26);
        $filters = array("raw" => 22, "escape" => 28);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
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
        $context["obPropertyList"] = twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "property", [], "any", false, false, true, 1);
        // line 2
        $context["obPropertyGroupList"] = twig_get_attribute($this->env, $this->source, ($context["obPropertyList"] ?? null), "getGroupList", [], "method", false, false, true, 2);
        // line 3
        echo "
<section class=\"product-descr\">
    <ul class=\"product-descr__tablist\" role=\"tablist\">
        ";
        // line 6
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "description", [], "any", false, false, true, 6))) {
            // line 7
            echo "            <li class=\"product-descr__tabitem\" role=\"presentation\">
                <a class=\"product-descr__link product-descr__link_active\"  href=\"#product-descr-block\" id=\"descr-tab\" role=\"tab\">
                    Description
                </a>
            </li>
        ";
        }
        // line 13
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["obPropertyList"] ?? null), "isNotEmpty", [], "method", false, false, true, 13)) {
            // line 14
            echo "        <li class=\"product-descr__tabitem\" role=\"presentation\">
            <a class=\"product-descr__link\" role=\"tab\" href=\"#product-feature-block\" id=\"feature-tab\">
                Features
            </a>
        </li>
        ";
        }
        // line 20
        echo "    </ul>
    ";
        // line 21
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "description", [], "any", false, false, true, 21))) {
            // line 22
            echo "        <div class=\"product-descr__content wysiwyg\" id=\"product-descr-block\" role=\"tabpanel\" aria-labelledby=\"descr-tab\">";
            echo $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "description", [], "any", false, false, true, 22), 22, $this->source);
            echo "</div>
    ";
        }
        // line 24
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["obPropertyList"] ?? null), "isNotEmpty", [], "method", false, false, true, 24)) {
            // line 25
            echo "    <div class=\"product-descr__content product-descr__content_visually-hidden wysiwyg\" id=\"product-feature-block\" role=\"tabpanel\" aria-labelledby=\"feature-tab\">
        ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["obPropertyGroupList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["obPropertyGroup"]) {
                if ((twig_get_attribute($this->env, $this->source, $context["obPropertyGroup"], "code", [], "any", false, false, true, 26) != "main")) {
                    // line 27
                    echo "            ";
                    if (twig_get_attribute($this->env, $this->source, ($context["obPropertyList"] ?? null), "isNotEmpty", [], "method", false, false, true, 27)) {
                        // line 28
                        echo "                <h4>";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obPropertyGroup"], "name", [], "any", false, false, true, 28), 28, $this->source), "html", null, true);
                        echo "</h4>
                <ul>
                    ";
                        // line 30
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["obPropertyList"] ?? null));
                        foreach ($context['_seq'] as $context["_key"] => $context["obProperty"]) {
                            if (twig_get_attribute($this->env, $this->source, $context["obProperty"], "hasValue", [], "method", false, false, true, 30)) {
                                // line 31
                                echo "                        <li>";
                                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obProperty"], "name", [], "any", false, false, true, 31), 31, $this->source), "html", null, true);
                                echo ": ";
                                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["obProperty"], "property_value", [], "any", false, false, true, 31), "getValueString", [], "method", false, false, true, 31), 31, $this->source), "html", null, true);
                                echo "</li>
                    ";
                            }
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obProperty'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 33
                        echo "                </ul>
            ";
                    }
                    // line 35
                    echo "        ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obPropertyGroup'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "    </div>
    ";
        }
        // line 38
        echo "</section>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-description/product-description.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 38,  151 => 36,  144 => 35,  140 => 33,  128 => 31,  123 => 30,  117 => 28,  114 => 27,  109 => 26,  106 => 25,  103 => 24,  97 => 22,  95 => 21,  92 => 20,  84 => 14,  81 => 13,  73 => 7,  71 => 6,  66 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set obPropertyList = obProduct.property %}
{% set obPropertyGroupList = obPropertyList.getGroupList() %}

<section class=\"product-descr\">
    <ul class=\"product-descr__tablist\" role=\"tablist\">
        {% if obProduct.description is not empty %}
            <li class=\"product-descr__tabitem\" role=\"presentation\">
                <a class=\"product-descr__link product-descr__link_active\"  href=\"#product-descr-block\" id=\"descr-tab\" role=\"tab\">
                    Description
                </a>
            </li>
        {% endif %}
        {% if obPropertyList.isNotEmpty() %}
        <li class=\"product-descr__tabitem\" role=\"presentation\">
            <a class=\"product-descr__link\" role=\"tab\" href=\"#product-feature-block\" id=\"feature-tab\">
                Features
            </a>
        </li>
        {% endif %}
    </ul>
    {% if obProduct.description is not empty %}
        <div class=\"product-descr__content wysiwyg\" id=\"product-descr-block\" role=\"tabpanel\" aria-labelledby=\"descr-tab\">{{ obProduct.description|raw() }}</div>
    {% endif %}
    {% if obPropertyList.isNotEmpty() %}
    <div class=\"product-descr__content product-descr__content_visually-hidden wysiwyg\" id=\"product-feature-block\" role=\"tabpanel\" aria-labelledby=\"feature-tab\">
        {% for obPropertyGroup in obPropertyGroupList if obPropertyGroup.code != 'main' %}
            {% if obPropertyList.isNotEmpty() %}
                <h4>{{ obPropertyGroup.name }}</h4>
                <ul>
                    {% for obProperty in obPropertyList if obProperty.hasValue() %}
                        <li>{{ obProperty.name }}: {{ obProperty.property_value.getValueString() }}</li>
                    {% endfor %}
                </ul>
            {% endif %}
        {% endfor %}
    </div>
    {% endif %}
</section>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-description/product-description.htm", "");
    }
}
