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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-mini-price/cart-mini-price.htm */
class __TwigTemplate_e0e2f7cb605313a8471f9730b40f39cfe0f6846813a5f3f20702a859f0395b53 extends \Twig\Template
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
        $tags = array("set" => 1, "partial" => 9);
        $filters = array("page" => 1);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'partial'],
                ['page'],
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
        $context["href"] = $this->extensions['Cms\Twig\Extension']->pageFilter("checkout");
        // line 2
        echo "
<div class=\"cart-mini-price\">
    <div class=\"cart-mini-price__inner\">
        <b class=\"cart-mini-price__text\">
            Subtotal:&nbsp;
        </b>
        <span class=\"cart-mini-price__ajax-wrapper\">
           ";
        // line 9
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/cart/cart-total"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 10
        echo "        </span>
    </div>
    ";
        // line 12
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "cart-mini-price__checkout"        ;
        $context['__cms_partial_params']['text'] = "Checkout"        ;
        $context['__cms_partial_params']['link'] = true        ;
        $context['__cms_partial_params']['href'] = ($context["href"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("form/button/button"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 13
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-mini-price/cart-mini-price.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 13,  81 => 12,  77 => 10,  73 => 9,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set href = 'checkout'|page %}

<div class=\"cart-mini-price\">
    <div class=\"cart-mini-price__inner\">
        <b class=\"cart-mini-price__text\">
            Subtotal:&nbsp;
        </b>
        <span class=\"cart-mini-price__ajax-wrapper\">
           {% partial 'product/cart/cart-total' %}
        </span>
    </div>
    {% partial 'form/button/button' wrapperClass='cart-mini-price__checkout' text='Checkout' link=true href=href %}
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-mini-price/cart-mini-price.htm", "");
    }
}
