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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/two-level-slider/two-level-slider.htm */
class __TwigTemplate_7ebbe4d1cee40194111cdd7ed11a34d62392eadd6b1478f3bbeed78798fa4818 extends \Twig\Template
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
        $tags = array("set" => 1, "if" => 4, "partial" => 7, "for" => 10);
        $filters = array("default" => 2, "escape" => 13);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'partial', 'for'],
                ['default', 'escape'],
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
        $context["obCategoryList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["CategoryList"] ?? null), "make", [], "method", false, false, true, 1), "tree", [], "method", false, false, true, 1);
        // line 2
        $context["sBlockTitle"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, true, true, 2), "index_product_tabs_title", [], "any", true, true, true, 2)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, true, true, 2), "index_product_tabs_title", [], "any", false, false, true, 2), 2, $this->source), "New items")) : ("New items"));
        // line 3
        echo "
";
        // line 4
        if (twig_get_attribute($this->env, $this->source, ($context["obCategoryList"] ?? null), "isNotEmpty", [], "method", false, false, true, 4)) {
            // line 5
            echo "    <section class=\"two-level-slider\">
        ";
            // line 6
            if ( !twig_test_empty(($context["sBlockTitle"] ?? null))) {
                // line 7
                echo "            ";
                $context['__cms_partial_params'] = [];
                $context['__cms_partial_params']['text'] = ($context["sBlockTitle"] ?? null)                ;
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/section-title/section-title"                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 8
                echo "        ";
            }
            // line 9
            echo "        <ul class=\"two-level-slider__tablist\" role=\"tablist\">
            ";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["obCategoryList"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["obCategory"]) {
                // line 11
                echo "                <li class=\"two-level-slider__tabitem\" role=\"presentation\">
                    ";
                // line 12
                $context["isActive"] = (((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 12) == 1)) ? ("two-level-slider__btn_active") : (""));
                // line 13
                echo "                    <button class=\"two-level-slider__btn ";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["isActive"] ?? null), 13, $this->source), "html", null, true);
                echo "\" data-id=";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obCategory"], "id", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
                echo " role=\"tab\" aria-controls=\"trending-slider\">";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obCategory"], "name", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
                echo "</button>
                </li>
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obCategory'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "        </ul>
        ";
            // line 17
            $context["obFirstCategory"] = twig_get_attribute($this->env, $this->source, ($context["obCategoryList"] ?? null), "first", [], "method", false, false, true, 17);
            // line 18
            echo "        <div class=\"two-level-slider__slider\">
            ";
            // line 19
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['iCategoryID'] = twig_get_attribute($this->env, $this->source, ($context["obFirstCategory"] ?? null), "id", [], "any", false, false, true, 19)            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/two-level-slider/two-level-slider-ajax"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 20
            echo "        </div>
        ";
            // line 21
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['wrapperClass'] = "two-level-slider__preloader"            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 22
            echo "    </section>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/two-level-slider/two-level-slider.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 22,  148 => 21,  145 => 20,  140 => 19,  137 => 18,  135 => 17,  132 => 16,  110 => 13,  108 => 12,  105 => 11,  88 => 10,  85 => 9,  82 => 8,  76 => 7,  74 => 6,  71 => 5,  69 => 4,  66 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set obCategoryList  = CategoryList.make().tree() %}
{% set sBlockTitle = this.theme.index_product_tabs_title|default('New items') %}

{% if obCategoryList.isNotEmpty() %}
    <section class=\"two-level-slider\">
        {% if sBlockTitle is not empty %}
            {% partial 'common/section-title/section-title' text=sBlockTitle %}
        {% endif %}
        <ul class=\"two-level-slider__tablist\" role=\"tablist\">
            {% for obCategory in obCategoryList %}
                <li class=\"two-level-slider__tabitem\" role=\"presentation\">
                    {% set isActive = loop.index == 1 ? 'two-level-slider__btn_active' : '' %}
                    <button class=\"two-level-slider__btn {{ isActive }}\" data-id={{ obCategory.id }} role=\"tab\" aria-controls=\"trending-slider\">{{ obCategory.name }}</button>
                </li>
            {% endfor %}
        </ul>
        {% set obFirstCategory = obCategoryList.first() %}
        <div class=\"two-level-slider__slider\">
            {% partial 'product/two-level-slider/two-level-slider-ajax' iCategoryID=obFirstCategory.id %}
        </div>
        {% partial 'common/preloader/preloader' wrapperClass='two-level-slider__preloader' %}
    </section>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/two-level-slider/two-level-slider.htm", "");
    }
}
