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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/common/rating/rating.htm */
class __TwigTemplate_596742f02828ea2d05a7afc9c8ef910a7eee379a7a81a89155c854e84dfd4dd1 extends \Twig\Template
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
        $tags = array("partial" => 3);
        $filters = array("escape" => 1, "round" => 10);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['partial'],
                ['escape', 'round'],
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
        echo "<div class=\"rating ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 1, $this->source), "html", null, true);
        echo "\" itemprop=\"aggregateRating\" itemscope itemtype=\"http://schema.org/AggregateRating\">
    <span class=\"rating__value\" aria-label=\"Rating ";
        // line 2
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["rating"] ?? null), 2, $this->source), "html", null, true);
        echo " from ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["maxRating"] ?? null), 2, $this->source), "html", null, true);
        echo " based on ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["reviewCount"] ?? null), 2, $this->source), "html", null, true);
        echo " reviews\">
        ";
        // line 3
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['maxRating'] = ($context["maxRating"] ?? null)        ;
        $context['__cms_partial_params']['rating'] = ($context["rating"] ?? null)        ;
        $context['__cms_partial_params']['unique_id'] = "product"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/rating/rating-image"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 4
        echo "    </span>
    <a class=\"rating__review-count-wrap\" href=\"#see-all-reviews\" aria-label=\"See all reviews\">
        <span class=\"rating__review-count\" itemProp=\"reviewCount\" aria-hidden=\"true\">";
        // line 6
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["reviewCount"] ?? null), 6, $this->source), "html", null, true);
        echo "</span>
        <span class=\"rating__review-count-text\" aria-hidden=\"true\">reviews</span>
    </a>
    <meta itemProp=\"bestRating\" content=\"5\">
    <meta itemProp=\"worstRating\" content=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_round($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "rating", [], "any", false, false, true, 10), 10, $this->source)), "html", null, true);
        echo "\">
    <meta itemProp=\"ratingValue\" content=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "rating", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
        echo "\">
</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/common/rating/rating.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 11,  93 => 10,  86 => 6,  82 => 4,  75 => 3,  67 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"rating {{ wrapperClass }}\" itemprop=\"aggregateRating\" itemscope itemtype=\"http://schema.org/AggregateRating\">
    <span class=\"rating__value\" aria-label=\"Rating {{ rating }} from {{ maxRating }} based on {{ reviewCount }} reviews\">
        {% partial 'common/rating/rating-image' maxRating=maxRating rating=rating unique_id='product' %}
    </span>
    <a class=\"rating__review-count-wrap\" href=\"#see-all-reviews\" aria-label=\"See all reviews\">
        <span class=\"rating__review-count\" itemProp=\"reviewCount\" aria-hidden=\"true\">{{ reviewCount }}</span>
        <span class=\"rating__review-count-text\" aria-hidden=\"true\">reviews</span>
    </a>
    <meta itemProp=\"bestRating\" content=\"5\">
    <meta itemProp=\"worstRating\" content=\"{{ obProduct.rating|round }}\">
    <meta itemProp=\"ratingValue\" content=\"{{ obProduct.rating }}\">
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/common/rating/rating.htm", "");
    }
}
