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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-price/product-price.htm */
class __TwigTemplate_06785994c4c26f522db5a120e2438cca88c3ca58e46826e19066626f7395fa82 extends \Twig\Template
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
        $tags = array("if" => 2);
        $filters = array("escape" => 1);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
        echo "<div class=\"product-price ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 1, $this->source), "html", null, true);
        echo "\"  itemscope itemprop=\"offers\" itemtype=\"http://schema.org/Offer\">
    ";
        // line 2
        if ((twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "old_price_value", [], "any", false, false, true, 2) > 0)) {
            // line 3
            echo "        <span class=\"product-price__text product-price__text_sale\">
            <span class=\"product-price__currency\" itemprop=\"priceCurrency\" content=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "currency_code", [], "any", false, false, true, 4), 4, $this->source), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "currency", [], "any", false, false, true, 4), 4, $this->source), "html", null, true);
            echo "</span>
            <span class=\"product-price__value\" itemprop=\"price\">";
            // line 5
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "price", [], "any", false, false, true, 5), 5, $this->source), "html", null, true);
            echo "</span>
        </span>
        <span class=\"product-price__text product-price__text_old\">
            <span class=\"product-price__currency\" content=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "currency_code", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "currency", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
            echo "</span>
            <span class=\"product-price__value\">";
            // line 9
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "old_price", [], "any", false, false, true, 9), 9, $this->source), "html", null, true);
            echo "</span>
        </span>
    ";
        } else {
            // line 12
            echo "        <span class=\"product-price__text product-price__text_current\">
            <span class=\"product-price__currency\" itemprop=\"priceCurrency\" content=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "currency_code", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "currency", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
            echo "</span>
            <span class=\"product-price__value\" itemprop=\"price\">";
            // line 14
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obOffer"] ?? null), "price", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
            echo "</span>
        </span>
    ";
        }
        // line 17
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-price/product-price.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 17,  105 => 14,  99 => 13,  96 => 12,  90 => 9,  84 => 8,  78 => 5,  72 => 4,  69 => 3,  67 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"product-price {{ wrapperClass }}\"  itemscope itemprop=\"offers\" itemtype=\"http://schema.org/Offer\">
    {% if obOffer.old_price_value > 0 %}
        <span class=\"product-price__text product-price__text_sale\">
            <span class=\"product-price__currency\" itemprop=\"priceCurrency\" content=\"{{ obOffer.currency_code }}\">{{ obOffer.currency }}</span>
            <span class=\"product-price__value\" itemprop=\"price\">{{ obOffer.price }}</span>
        </span>
        <span class=\"product-price__text product-price__text_old\">
            <span class=\"product-price__currency\" content=\"{{ obOffer.currency_code }}\">{{ obOffer.currency }}</span>
            <span class=\"product-price__value\">{{ obOffer.old_price }}</span>
        </span>
    {% else %}
        <span class=\"product-price__text product-price__text_current\">
            <span class=\"product-price__currency\" itemprop=\"priceCurrency\" content=\"{{ obOffer.currency_code }}\">{{ obOffer.currency }}</span>
            <span class=\"product-price__value\" itemprop=\"price\">{{ obOffer.price }}</span>
        </span>
    {% endif %}
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-price/product-price.htm", "");
    }
}
