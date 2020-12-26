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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-info/cart-info-button.htm */
class __TwigTemplate_34454bdd9997ed4dec4402916bf28293876f7283a5e9274fb25f87ac2f68071c extends \Twig\Template
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
        $tags = array("set" => 1, "if" => 3);
        $filters = array("escape" => 4);
        $functions = array("choice" => 4);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
                ['choice']
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
        $context["iCountPosition"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Cart"] ?? null), "get", [], "method", false, false, true, 1), "count", [], "method", false, false, true, 1);
        // line 2
        echo "
";
        // line 3
        if ((($context["iCountPosition"] ?? null) > 0)) {
            // line 4
            echo "    <button type=\"button\" class=\"cart-info js-cart-mini ";
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, true, 4), "id", [], "any", false, false, true, 4) == "checkout")) ? ("cart-info_empty") : (""));
            echo "\" aria-label=\"Press to open cart. Now ";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["iCountPosition"] ?? null), 4, $this->source), "html", null, true);
            echo " ";
            echo call_user_func_array($this->env->getFunction('choice')->getCallable(), ["product|products|products", $this->sandbox->ensureToStringAllowed(($context["iCountPosition"] ?? null), 4, $this->source)]);
            echo " there\" aria-controls=\"cart-mini-content\">
        <span class=\"cart-info__counter\" aria-hidden=\"true\">";
            // line 5
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["iCountPosition"] ?? null), 5, $this->source), "html", null, true);
            echo "</span>
        <span class=\"cart-info__text\" aria-hidden=\"true\">&nbsp;";
            // line 6
            echo call_user_func_array($this->env->getFunction('choice')->getCallable(), ["item|items|items", $this->sandbox->ensureToStringAllowed(($context["iCountPosition"] ?? null), 6, $this->source)]);
            echo "</span>
    </button>
";
        } else {
            // line 9
            echo "    <button type=\"button\" class=\"cart-info cart-info_empty js-cart-mini\" aria-label=\"You have no products in your shopping cart\" tabindex=\"-1\">
        <span class=\"cart-info__counter\" aria-hidden=\"true\"></span>
        <span class=\"cart-info__text\" aria-hidden=\"true\">No items</span>
    </button>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-info/cart-info-button.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 9,  82 => 6,  78 => 5,  69 => 4,  67 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set iCountPosition = Cart.get().count() %}

{% if iCountPosition > 0 %}
    <button type=\"button\" class=\"cart-info js-cart-mini {{ this.page.id == 'checkout' ? 'cart-info_empty' : '' }}\" aria-label=\"Press to open cart. Now {{ iCountPosition }} {{ choice('product|products|products', iCountPosition) }} there\" aria-controls=\"cart-mini-content\">
        <span class=\"cart-info__counter\" aria-hidden=\"true\">{{ iCountPosition }}</span>
        <span class=\"cart-info__text\" aria-hidden=\"true\">&nbsp;{{ choice('item|items|items', iCountPosition) }}</span>
    </button>
{% else %}
    <button type=\"button\" class=\"cart-info cart-info_empty js-cart-mini\" aria-label=\"You have no products in your shopping cart\" tabindex=\"-1\">
        <span class=\"cart-info__counter\" aria-hidden=\"true\"></span>
        <span class=\"cart-info__text\" aria-hidden=\"true\">No items</span>
    </button>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-info/cart-info-button.htm", "");
    }
}
