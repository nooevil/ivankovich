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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter-bar/filter-bar.htm */
class __TwigTemplate_3a6d8c75710e087b75c100a0a04b19ecbd52b6a23f3d0e80b338c1fdc40bef6f extends \Twig\Template
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
        $tags = array("set" => 11, "if" => 12, "partial" => 16);
        $filters = array("length" => 11);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'partial'],
                ['length'],
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
        echo "<div class=\"filter-bar\">
    <div class=\"filter-bar__sort\">
        <label class=\"select__label\" for=\"sort-select\">Sort</label>
        <select class=\"select select_no-border _shopaholic-sorting\" id=\"sort-select\" name=\"sort\">
            <option value=\"popularity|desc\" ";
        // line 5
        echo ((((($context["sActiveSorting"] ?? null) == "popularity|desc") || twig_test_empty(($context["sActiveSorting"] ?? null)))) ? ("selected") : (""));
        echo " >Popular</option>
            <option value=\"price|desc\" ";
        // line 6
        echo (((($context["sActiveSorting"] ?? null) == "price|desc")) ? ("selected") : (""));
        echo " >Expensive</option>
            <option value=\"price|asc\" ";
        // line 7
        echo (((($context["sActiveSorting"] ?? null) == "price|asc")) ? ("selected") : (""));
        echo ">Cheap</option>
            <option value=\"new\" ";
        // line 8
        echo (((($context["sActiveSorting"] ?? null) == "new")) ? ("selected") : (""));
        echo " >New</option>
        </select>
    </div>
    ";
        // line 11
        $context["iFilterCount"] = (twig_length_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["arFilterValue"] ?? null), 11, $this->source)) + twig_length_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["arFilterBrandIDList"] ?? null), 11, $this->source)));
        // line 12
        echo "    ";
        if (((($context["fMinPriceFilterValue"] ?? null) > 0) || (($context["fMaxPriceFilterValue"] ?? null) > 0))) {
            // line 13
            echo "        ";
            $context["iFilterCount"] = (($context["iFilterCount"] ?? null) + 1);
            // line 14
            echo "    ";
        }
        // line 15
        echo "    ";
        if ((($context["iFilterCount"] ?? null) > 0)) {
            // line 16
            echo "        ";
            $context['__cms_partial_params'] = [];
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/catalog/filter-bar/filter-checked/filter-checked"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 17
            echo "    ";
        }
        // line 18
        echo "    <div class=\"filter-bar__filter-btn-wrapper\">
        ";
        // line 19
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['arFilterValue'] = ($context["arFilterValue"] ?? null)        ;
        $context['__cms_partial_params']['arFilterBrandIDList'] = ($context["arFilterBrandIDList"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/catalog/filter-bar/filter-bar-btn-ajax"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 20
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter-bar/filter-bar.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 20,  111 => 19,  108 => 18,  105 => 17,  100 => 16,  97 => 15,  94 => 14,  91 => 13,  88 => 12,  86 => 11,  80 => 8,  76 => 7,  72 => 6,  68 => 5,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"filter-bar\">
    <div class=\"filter-bar__sort\">
        <label class=\"select__label\" for=\"sort-select\">Sort</label>
        <select class=\"select select_no-border _shopaholic-sorting\" id=\"sort-select\" name=\"sort\">
            <option value=\"popularity|desc\" {{ (sActiveSorting == 'popularity|desc' or sActiveSorting is empty) ? 'selected' : '' }} >Popular</option>
            <option value=\"price|desc\" {{ sActiveSorting == 'price|desc' ? 'selected' : '' }} >Expensive</option>
            <option value=\"price|asc\" {{ sActiveSorting == 'price|asc' ? 'selected' : '' }}>Cheap</option>
            <option value=\"new\" {{ sActiveSorting == 'new' ? 'selected' : '' }} >New</option>
        </select>
    </div>
    {% set iFilterCount = arFilterValue|length + arFilterBrandIDList|length %}
    {% if fMinPriceFilterValue > 0 or fMaxPriceFilterValue > 0 %}
        {% set iFilterCount = iFilterCount + 1 %}
    {% endif %}
    {% if iFilterCount > 0 %}
        {% partial 'product/catalog/filter-bar/filter-checked/filter-checked' %}
    {% endif %}
    <div class=\"filter-bar__filter-btn-wrapper\">
        {% partial 'product/catalog/filter-bar/filter-bar-btn-ajax' arFilterValue=arFilterValue arFilterBrandIDList=arFilterBrandIDList %}
    </div>
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter-bar/filter-bar.htm", "");
    }
}
