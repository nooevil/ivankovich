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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/header/userbar/userbar.htm */
class __TwigTemplate_fee926b3457cee8fc372abff926ab55750517a34ecd4e4d2c465e0ba587026a5 extends \Twig\Template
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
        $tags = array("partial" => 3, "if" => 5);
        $filters = array();
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['partial', 'if'],
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
        echo "<ul class=\"userbar\" aria-label=\"User area\">
    <li class=\"userbar__item userbar__item_cart _shopaholic-cart-mini-wrapper\">
        ";
        // line 3
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/cart/cart-mini/cart-info/cart-info-empty"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 4
        echo "    </li>
    ";
        // line 5
        if (($context["bHasWishListPlugin"] ?? null)) {
            // line 6
            echo "    <li class=\"userbar__item userbar__item_wish-list\">
        ";
            // line 7
            $context['__cms_partial_params'] = [];
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/wish-list/wish-list-info/wish-list-info-empty"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 8
            echo "    </li>
    ";
        }
        // line 10
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/userbar/userbar.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 10,  82 => 8,  78 => 7,  75 => 6,  73 => 5,  70 => 4,  66 => 3,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<ul class=\"userbar\" aria-label=\"User area\">
    <li class=\"userbar__item userbar__item_cart _shopaholic-cart-mini-wrapper\">
        {% partial 'product/cart/cart-mini/cart-info/cart-info-empty' %}
    </li>
    {% if bHasWishListPlugin %}
    <li class=\"userbar__item userbar__item_wish-list\">
        {% partial 'product/wish-list/wish-list-info/wish-list-info-empty' %}
    </li>
    {% endif %}
</ul>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/userbar/userbar.htm", "");
    }
}
