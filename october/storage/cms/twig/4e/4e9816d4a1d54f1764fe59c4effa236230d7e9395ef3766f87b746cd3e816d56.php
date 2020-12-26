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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-total.htm */
class __TwigTemplate_df8688a44f89e16567ba8be8e4102d6abd10574bb4cf19b60022b202cdec1036 extends \Twig\Template
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
        $tags = array("if" => 1, "set" => 2);
        $filters = array("escape" => 7);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
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
        if (twig_test_empty(($context["obCartList"] ?? null))) {
            // line 2
            echo "    ";
            $context["obCartList"] = twig_get_attribute($this->env, $this->source, ($context["Cart"] ?? null), "get", [], "method", false, false, true, 2);
        }
        // line 4
        echo "
";
        // line 5
        $context["obPriceData"] = twig_get_attribute($this->env, $this->source, ($context["obCartList"] ?? null), "getTotalPriceData", [], "method", false, false, true, 5);
        // line 6
        echo "<span class=\"cart__total-inner\">
    <span class=\"cart__total-currency\">";
        // line 7
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obCartList"] ?? null), "getCurrency", [], "method", false, false, true, 7), 7, $this->source), "html", null, true);
        echo "</span>
    <div class=\"cart__total-value-wrapper\">
        <span class=\"cart__total-value_old ";
        // line 9
        echo (((twig_get_attribute($this->env, $this->source, ($context["obPriceData"] ?? null), "discount_price_value", [], "any", false, false, true, 9) == 0)) ? ("_shopaholic-hide-old-price") : (""));
        echo " _shopaholic-old-price _shopaholic-cart\" data-group=\"position-total-price\" data-field=\"old-price\">";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obPriceData"] ?? null), "old_price", [], "any", false, false, true, 9), 9, $this->source), "html", null, true);
        echo "</span>
        <span class=\"cart__total-value _shopaholic-cart\" data-group=\"position-total-price\" data-field=\"price\">";
        // line 10
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obPriceData"] ?? null), "price", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
        echo "</span>
    </div>
</span>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-total.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 10,  81 => 9,  76 => 7,  73 => 6,  71 => 5,  68 => 4,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if obCartList is empty %}
    {% set obCartList = Cart.get() %}
{% endif %}

{% set obPriceData = obCartList.getTotalPriceData() %}
<span class=\"cart__total-inner\">
    <span class=\"cart__total-currency\">{{ obCartList.getCurrency() }}</span>
    <div class=\"cart__total-value-wrapper\">
        <span class=\"cart__total-value_old {{ obPriceData.discount_price_value == 0 ? '_shopaholic-hide-old-price' : '' }} _shopaholic-old-price _shopaholic-cart\" data-group=\"position-total-price\" data-field=\"old-price\">{{ obPriceData.old_price }}</span>
        <span class=\"cart__total-value _shopaholic-cart\" data-group=\"position-total-price\" data-field=\"price\">{{ obPriceData.price }}</span>
    </div>
</span>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-total.htm", "");
    }
}
