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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/catalog-list/catalog-list.htm */
class __TwigTemplate_0bc4c9754c81419b64e5c39b9000d0205cbb30485e5f3235c6eed7a8bebf0b12 extends \Twig\Template
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
        $tags = array("if" => 1, "for" => 3, "partial" => 6, "set" => 11);
        $filters = array("escape" => 5);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'partial', 'set'],
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
        if ( !twig_test_empty(($context["arProductList"] ?? null))) {
            // line 2
            echo "<ul class=\"catalog-list\">
    ";
            // line 3
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["arProductList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["obProduct"]) {
                // line 4
                echo "        <li class=\"catalog-item\">
            <a href=\"";
                // line 5
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obProduct"], "getPageUrl", [0 => "product"], "method", false, false, true, 5), 5, $this->source), "html", null, true);
                echo "\" class=\"catalog-item__link\">
                ";
                // line 6
                $context['__cms_partial_params'] = [];
                $context['__cms_partial_params']['obProduct'] = $context["obProduct"]                ;
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/product-card/product-card"                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 7
                echo "            </a>
        </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obProduct'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 10
            echo "</ul>
";
            // line 11
            $context["arPaginationList"] = twig_get_attribute($this->env, $this->source, ($context["Pagination"] ?? null), "get", [0 => ($context["iPage"] ?? null), 1 => twig_get_attribute($this->env, $this->source, ($context["obProductList"] ?? null), "count", [], "method", false, false, true, 11)], "method", false, false, true, 11);
            // line 12
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['arPaginationList'] = ($context["arPaginationList"] ?? null)            ;
            $context['__cms_partial_params']['iMaxPage'] = ($context["iMaxPage"] ?? null)            ;
            $context['__cms_partial_params']['iPage'] = ($context["iPage"] ?? null)            ;
            $context['__cms_partial_params']['wrapperClass'] = "catalog-pagination"            ;
            $context['__cms_partial_params']['linkClass'] = "_shopaholic-pagination"            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/pagination/pagination"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
        } else {
            // line 14
            echo "    <span class=\"catalog-list__empty-message\">Products not found</span>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/catalog-list/catalog-list.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 14,  96 => 12,  94 => 11,  91 => 10,  83 => 7,  78 => 6,  74 => 5,  71 => 4,  67 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if arProductList is not empty %}
<ul class=\"catalog-list\">
    {% for obProduct in arProductList %}
        <li class=\"catalog-item\">
            <a href=\"{{ obProduct.getPageUrl('product') }}\" class=\"catalog-item__link\">
                {% partial 'product/product-card/product-card' obProduct = obProduct %}
            </a>
        </li>
    {% endfor %}
</ul>
{% set arPaginationList = Pagination.get(iPage, obProductList.count()) %}
{% partial 'common/pagination/pagination' arPaginationList=arPaginationList iMaxPage=iMaxPage iPage=iPage wrapperClass = 'catalog-pagination' linkClass='_shopaholic-pagination' %}
{% else %}
    <span class=\"catalog-list__empty-message\">Products not found</span>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/catalog-list/catalog-list.htm", "");
    }
}
