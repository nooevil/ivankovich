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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-mini-panel/cart-mini-panel.htm */
class __TwigTemplate_d1879a30d69775c5a38f3642220400259fca56d8370cc33d49b814c3b0ff0b2a extends \Twig\Template
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
        $tags = array("partial" => 5);
        $filters = array();
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['partial'],
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
        echo "<div class=\"cart-mini-panel webkit-scroll\" id=\"cart-mini-content\" role=\"region\" aria-live=\"polite\" aria-busy=\"true\">
    <button type=\"button\" class=\"cart-mini-panel__close js-cart-mini\" arial-label=\"Close cart popup\"></button>
    <b class=\"cart-mini-panel__title\">Shopping Cart</b>
    <ul class=\"cart-mini-panel__list\">
        ";
        // line 5
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/cart/cart-mini/cart-mini-panel/cart-mini-panel-ajax"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 6
        echo "    </ul>
    ";
        // line 7
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "cart-mini-panel__preloader"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 8
        echo "    ";
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/cart/cart-mini/cart-mini-price/cart-mini-price"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 9
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-mini-panel/cart-mini-panel.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 9,  80 => 8,  75 => 7,  72 => 6,  68 => 5,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"cart-mini-panel webkit-scroll\" id=\"cart-mini-content\" role=\"region\" aria-live=\"polite\" aria-busy=\"true\">
    <button type=\"button\" class=\"cart-mini-panel__close js-cart-mini\" arial-label=\"Close cart popup\"></button>
    <b class=\"cart-mini-panel__title\">Shopping Cart</b>
    <ul class=\"cart-mini-panel__list\">
        {% partial 'product/cart/cart-mini/cart-mini-panel/cart-mini-panel-ajax' %}
    </ul>
    {% partial 'common/preloader/preloader' wrapperClass='cart-mini-panel__preloader' %}
    {% partial 'product/cart/cart-mini/cart-mini-price/cart-mini-price' %}
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-mini-panel/cart-mini-panel.htm", "");
    }
}
