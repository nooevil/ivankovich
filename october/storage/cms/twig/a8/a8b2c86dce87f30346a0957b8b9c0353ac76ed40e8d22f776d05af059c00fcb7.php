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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review-list/review-list-ajax.htm */
class __TwigTemplate_4d62f0ef0b19b241be019dc4baded7e5d2362b7bf9af54d3ac36a64004391976 extends \Twig\Template
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
        $tags = array("if" => 1, "set" => 2, "for" => 10, "partial" => 11);
        $filters = array();
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for', 'partial'],
                [],
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
        if (twig_test_empty(($context["obReviewList"] ?? null))) {
            // line 2
            echo "    ";
            $context["obProduct"] = twig_get_attribute($this->env, $this->source, ($context["ProductPage"] ?? null), "get", [], "method", false, false, true, 2);
            // line 3
            echo "    ";
            $context["obReviewList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "review", [], "any", false, false, true, 3), "active", [], "method", false, false, true, 3), "sort", [], "method", false, false, true, 3);
            // line 4
            echo "
    ";
            // line 5
            $context["iPage"] = twig_get_attribute($this->env, $this->source, ($context["Pagination"] ?? null), "getPageFromRequest", [], "method", false, false, true, 5);
            // line 6
            echo "    ";
            $context["iMaxPage"] = twig_get_attribute($this->env, $this->source, ($context["Pagination"] ?? null), "getMaxPage", [0 => ($context["iReviewCount"] ?? null)], "method", false, false, true, 6);
        }
        // line 8
        echo "
";
        // line 9
        $context["arReviewList"] = twig_get_attribute($this->env, $this->source, ($context["obReviewList"] ?? null), "page", [0 => ($context["iPage"] ?? null), 1 => twig_get_attribute($this->env, $this->source, ($context["Pagination"] ?? null), "getCountPerPage", [], "method", false, false, true, 9)], "method", false, false, true, 9);
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["arReviewList"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["obReview"]) {
            // line 11
            echo "    ";
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['obProduct'] = ($context["obProduct"] ?? null)            ;
            $context['__cms_partial_params']['obReview'] = $context["obReview"]            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/review/review-list/review-card/review-card"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obReview'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review-list/review-list-ajax.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 11,  84 => 10,  82 => 9,  79 => 8,  75 => 6,  73 => 5,  70 => 4,  67 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if obReviewList is empty %}
    {% set obProduct = ProductPage.get() %}
    {% set obReviewList = obProduct.review.active().sort() %}

    {% set iPage = Pagination.getPageFromRequest() %}
    {% set iMaxPage = Pagination.getMaxPage(iReviewCount) %}
{% endif %}

{% set arReviewList = obReviewList.page(iPage, Pagination.getCountPerPage()) %}
{% for obReview in arReviewList %}
    {% partial 'content/review/review-list/review-card/review-card' obProduct=obProduct obReview=obReview %}
{% endfor %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review-list/review-list-ajax.htm", "");
    }
}
