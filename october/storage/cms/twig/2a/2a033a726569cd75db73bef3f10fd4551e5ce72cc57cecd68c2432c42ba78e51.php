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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-mini-panel/cart-mini-panel-ajax.htm */
class __TwigTemplate_8474512bf670bdda0b7cf3158d07b9dbbe7997314c4bda0625137e35413de9f1 extends \Twig\Template
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
        $tags = array("set" => 1, "if" => 3, "for" => 4, "partial" => 14);
        $filters = array("escape" => 7);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for', 'partial'],
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
        $context["obCartList"] = twig_get_attribute($this->env, $this->source, ($context["Cart"] ?? null), "get", [], "method", false, false, true, 1);
        // line 2
        echo "
";
        // line 3
        if (twig_get_attribute($this->env, $this->source, ($context["obCartList"] ?? null), "isNotEmpty", [], "method", false, false, true, 3)) {
            // line 4
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["obCartList"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["obCartPosition"]) {
                // line 5
                echo "        ";
                $context["obOffer"] = twig_get_attribute($this->env, $this->source, $context["obCartPosition"], "offer", [], "any", false, false, true, 5);
                // line 6
                echo "        ";
                $context["obProduct"] = twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "product", [], "any", false, false, true, 6);
                // line 7
                echo "        <li class=\"cart-mini-panel__item _shopaholic-product-wrapper\" data-position-id=\"";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obCartPosition"], "id", [], "any", false, false, true, 7), 7, $this->source), "html", null, true);
                echo "\">
            <div class=\"cart-mini-panel__restore js-item-restore _visually-hidden\" aria-hidden=\"true\">
                <span class=\"cart-mini-panel__restore-text\" >
                    ";
                // line 10
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "name", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
                echo " has been deleted.
                </span>
                <button type=\"button\" class=\"cart-mini-panel__restore-btn _shopaholic-cart-restore\" tabindex=\"-1\">Undo</button>
            </div>
            ";
                // line 14
                $context['__cms_partial_params'] = [];
                $context['__cms_partial_params']['obCartPosition'] = $context["obCartPosition"]                ;
                $context['__cms_partial_params']['obProduct'] = ($context["obProduct"] ?? null)                ;
                $context['__cms_partial_params']['obOffer'] = ($context["obOffer"] ?? null)                ;
                $context['__cms_partial_params']['id'] = ("small-cart-order-" . twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 14))                ;
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/cart/cart-product/cart-product"                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 15
                echo "        </li>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obCartPosition'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 18
            echo "    <li class=\"cart-mini-panel__item cart-mini-panel__item_none\">
        There are no items in your cart
    </li>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-mini-panel/cart-mini-panel-ajax.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 18,  115 => 15,  107 => 14,  100 => 10,  93 => 7,  90 => 6,  87 => 5,  69 => 4,  67 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set obCartList = Cart.get() %}

{% if obCartList.isNotEmpty() %}
    {% for obCartPosition in obCartList %}
        {% set obOffer = obCartPosition.offer %}
        {% set obProduct = obOffer.product %}
        <li class=\"cart-mini-panel__item _shopaholic-product-wrapper\" data-position-id=\"{{ obCartPosition.id }}\">
            <div class=\"cart-mini-panel__restore js-item-restore _visually-hidden\" aria-hidden=\"true\">
                <span class=\"cart-mini-panel__restore-text\" >
                    {{ obProduct.name }} has been deleted.
                </span>
                <button type=\"button\" class=\"cart-mini-panel__restore-btn _shopaholic-cart-restore\" tabindex=\"-1\">Undo</button>
            </div>
            {% partial 'product/cart/cart-product/cart-product' obCartPosition=obCartPosition obProduct=obProduct obOffer=obOffer id='small-cart-order-'~loop.index %}
        </li>
    {% endfor %}
{% else %}
    <li class=\"cart-mini-panel__item cart-mini-panel__item_none\">
        There are no items in your cart
    </li>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/cart/cart-mini/cart-mini-panel/cart-mini-panel-ajax.htm", "");
    }
}
