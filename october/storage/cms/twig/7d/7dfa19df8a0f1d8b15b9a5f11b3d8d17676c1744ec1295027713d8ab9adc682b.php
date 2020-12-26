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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review.htm */
class __TwigTemplate_9ed4cfd645a9ef8e6fd84a9535d4f537bd552b440b594b99e6c94deeac1a67ae extends \Twig\Template
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
        $tags = array("set" => 1, "partial" => 7);
        $filters = array("escape" => 8);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'partial'],
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
        $context["obReviewList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "review", [], "any", false, false, true, 1), "active", [], "method", false, false, true, 1), "sort", [], "method", false, false, true, 1);
        // line 2
        $context["iReviewCount"] = twig_get_attribute($this->env, $this->source, ($context["obReviewList"] ?? null), "count", [], "method", false, false, true, 2);
        // line 3
        $context["fRating"] = twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "rating", [], "any", false, false, true, 3);
        // line 4
        echo "
<section class=\"review\">
    <div class=\"review__wrapper\">
        ";
        // line 7
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "review__title"        ;
        $context['__cms_partial_params']['id'] = "see-all-reviews"        ;
        $context['__cms_partial_params']['text'] = "Reviews"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/section-title/section-title"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 8
        echo "        <span class=\"review__counter\">(";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["iReviewCount"] ?? null), 8, $this->source), "html", null, true);
        echo ")</span>
        <a href=\"#review-modal\" class=\"review__add js-review-modal\">Add review</a>
    </div>
        <div class=\"review__content\">
            ";
        // line 12
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['obReviewList'] = ($context["obReviewList"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/review/review-list/review-list"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 13
        echo "        </div>
    ";
        // line 14
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['product_id'] = twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "id", [], "any", false, false, true, 14)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/review/review-add/review-add"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 15
        echo "</section>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 15,  96 => 14,  93 => 13,  88 => 12,  80 => 8,  73 => 7,  68 => 4,  66 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set obReviewList = obProduct.review.active().sort() %}
{% set iReviewCount = obReviewList.count() %}
{% set fRating = obProduct.rating %}

<section class=\"review\">
    <div class=\"review__wrapper\">
        {% partial 'common/section-title/section-title' wrapperClass='review__title' id=\"see-all-reviews\" text='Reviews' %}
        <span class=\"review__counter\">({{ iReviewCount }})</span>
        <a href=\"#review-modal\" class=\"review__add js-review-modal\">Add review</a>
    </div>
        <div class=\"review__content\">
            {% partial 'content/review/review-list/review-list' obReviewList = obReviewList %}
        </div>
    {% partial 'content/review/review-add/review-add' product_id=obProduct.id %}
</section>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review.htm", "");
    }
}
