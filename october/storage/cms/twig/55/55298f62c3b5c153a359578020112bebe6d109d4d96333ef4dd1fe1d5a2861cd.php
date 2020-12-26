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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-info/cart-info-empty.htm */
class __TwigTemplate_487d3b8666ecfa846fad0e520bcca2726952a419b7b3d44c811ab6b5e21f8b15 extends \Twig\Template
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
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
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
        echo "<button type=\"button\" class=\"cart-info cart-info_empty js-cart-mini\" aria-label=\"You have no products in your shopping cart\" tabindex=\"-1\">
    <span class=\"cart-info__counter\" aria-hidden=\"true\"></span>
</button>
<div class=\"cart-info__panel webkit-scroll\"></div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-info/cart-info-empty.htm";
    }

    public function getDebugInfo()
    {
        return array (  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<button type=\"button\" class=\"cart-info cart-info_empty js-cart-mini\" aria-label=\"You have no products in your shopping cart\" tabindex=\"-1\">
    <span class=\"cart-info__counter\" aria-hidden=\"true\"></span>
</button>
<div class=\"cart-info__panel webkit-scroll\"></div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-info/cart-info-empty.htm", "");
    }
}
