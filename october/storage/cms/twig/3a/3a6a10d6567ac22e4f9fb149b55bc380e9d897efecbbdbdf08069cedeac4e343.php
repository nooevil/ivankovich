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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review-list/review-card/review-card.htm */
class __TwigTemplate_4da20c6044e86b084dd87488f1a7ab21ae5c58092ef97a86baae4deb3907cc2c extends \Twig\Template
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
        $tags = array("if" => 4, "partial" => 9);
        $filters = array("escape" => 3);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'partial'],
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
        echo "<li class=\"review-card\" itemscope itemtype=\"http://schema.org/Review\">
    <div class=\"review-card__col\">
        <meta itemprop=\"itemReviewed\" content=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "name", [], "any", false, false, true, 3), 3, $this->source), "html", null, true);
        echo "\">
        ";
        // line 4
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["obReview"] ?? null), "name", [], "any", false, false, true, 4))) {
            // line 5
            echo "            <b class=\"review-card__author\" itemprop=\"author\">";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obReview"] ?? null), "name", [], "any", false, false, true, 5), 5, $this->source), "html", null, true);
            echo "</b>
        ";
        }
        // line 7
        echo "        <span class=\"review-card__rating\" itemprop=\"reviewRating\" itemscope itemtype=\"http://schema.org/Rating\">
            <meta itemprop=\"ratingValue\" content=";
        // line 8
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obReview"] ?? null), "rating", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
        echo ">
            ";
        // line 9
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['maxRating'] = "5"        ;
        $context['__cms_partial_params']['rating'] = twig_get_attribute($this->env, $this->source, ($context["obReview"] ?? null), "rating", [], "any", false, false, true, 9)        ;
        $context['__cms_partial_params']['unique_id'] = ("rating-" . twig_get_attribute($this->env, $this->source, ($context["obReview"] ?? null), "id", [], "any", false, false, true, 9))        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/rating/rating-image"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 10
        echo "        </span>
    </div>
    <div class=\"review-card__col\">
        ";
        // line 13
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["obReview"] ?? null), "comment", [], "any", false, false, true, 13))) {
            // line 14
            echo "            <p itemprop=\"reviewBody\" class=\"review-card__text\">
                ";
            // line 15
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obReview"] ?? null), "comment", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "
            </p>
        ";
        }
        // line 18
        echo "        <time class=\"review-card__time\" itemprop=\"datePublished\" datetime=\"";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obReview"] ?? null), "created_at", [], "any", false, false, true, 18), "format", [0 => "Y-m-d"], "method", false, false, true, 18), 18, $this->source), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obReview"] ?? null), "created_at", [], "any", false, false, true, 18), "format", [0 => "F d, Y"], "method", false, false, true, 18), 18, $this->source), "html", null, true);
        echo "</time>
    </div>
</li>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review-list/review-card/review-card.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 18,  102 => 15,  99 => 14,  97 => 13,  92 => 10,  85 => 9,  81 => 8,  78 => 7,  72 => 5,  70 => 4,  66 => 3,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<li class=\"review-card\" itemscope itemtype=\"http://schema.org/Review\">
    <div class=\"review-card__col\">
        <meta itemprop=\"itemReviewed\" content=\"{{ obProduct.name }}\">
        {% if obReview.name is not empty %}
            <b class=\"review-card__author\" itemprop=\"author\">{{ obReview.name }}</b>
        {% endif %}
        <span class=\"review-card__rating\" itemprop=\"reviewRating\" itemscope itemtype=\"http://schema.org/Rating\">
            <meta itemprop=\"ratingValue\" content={{ obReview.rating }}>
            {% partial 'common/rating/rating-image' maxRating='5' rating=obReview.rating unique_id='rating-' ~ obReview.id %}
        </span>
    </div>
    <div class=\"review-card__col\">
        {% if obReview.comment is not empty %}
            <p itemprop=\"reviewBody\" class=\"review-card__text\">
                {{ obReview.comment }}
            </p>
        {% endif %}
        <time class=\"review-card__time\" itemprop=\"datePublished\" datetime=\"{{ obReview.created_at.format('Y-m-d') }}\">{{ obReview.created_at.format('F d, Y') }}</time>
    </div>
</li>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review-list/review-card/review-card.htm", "");
    }
}
