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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/total-rating/total-rating.htm */
class __TwigTemplate_4c0526b484e6bbc7f71a10a1ccf8b231893b57fb68152d98bf5811c0f469ee86 extends \Twig\Template
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
        $tags = array("set" => 1, "partial" => 4, "for" => 6);
        $filters = array("escape" => 8, "round" => 10);
        $functions = array("range" => 6, "choice" => 13);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'partial', 'for'],
                ['escape', 'round'],
                ['range', 'choice']
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
        $context["iRatingTotalCount"] = twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "getRatingTotalCount", [], "method", false, false, true, 1);
        // line 2
        echo "
<section class=\"total-rating\">
    ";
        // line 4
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "total-rating__title"        ;
        $context['__cms_partial_params']['text'] = "Total rating"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/section-title/section-title"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 5
        echo "    <ul class=\"total-rating__list\">
        ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 7
            echo "            ";
            $context["iCount"] = twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "getRatingCount", [0 => $context["i"]], "method", false, false, true, 7);
            // line 8
            echo "            <li class=\"total-rating__item\" ";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed($context["i"], 8, $this->source), "html", null, true);
            echo ">
                ";
            // line 9
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['maxRating'] = "5"            ;
            $context['__cms_partial_params']['rating'] = $context["i"]            ;
            $context['__cms_partial_params']['unique_id'] = ("total-rating-" . $context["i"])            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/rating/rating-image"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 10
            echo "                <span class=\"total-rating__persent\">";
            echo twig_escape_filter($this->env, twig_round($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obProduct"] ?? null), "getRatingPercent", [0 => $context["i"]], "method", false, false, true, 10), 10, $this->source), 2), "html", null, true);
            echo "%</span>
                <span class=\"total-rating__counter\">
                    <span class=\"total-rating__counter-value\">";
            // line 12
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["iCount"] ?? null), 12, $this->source), "html", null, true);
            echo "&nbsp;</span>
                    <span class=\"total-rating__counter-text\">";
            // line 13
            echo call_user_func_array($this->env->getFunction('choice')->getCallable(), ["Review|Reviews|Reviews", $this->sandbox->ensureToStringAllowed(($context["iCount"] ?? null), 13, $this->source)]);
            echo "</span>
                </span>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "    </ul>
</section>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/total-rating/total-rating.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 17,  106 => 13,  102 => 12,  96 => 10,  89 => 9,  84 => 8,  81 => 7,  77 => 6,  74 => 5,  68 => 4,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set iRatingTotalCount = obProduct.getRatingTotalCount() %}

<section class=\"total-rating\">
    {% partial 'common/section-title/section-title' wrapperClass='total-rating__title' text='Total rating' %}
    <ul class=\"total-rating__list\">
        {% for i in 1..5 %}
            {% set iCount = obProduct.getRatingCount(i) %}
            <li class=\"total-rating__item\" {{ i }}>
                {% partial 'common/rating/rating-image' maxRating='5' rating=i unique_id='total-rating-'~i %}
                <span class=\"total-rating__persent\">{{ obProduct.getRatingPercent(i)|round(2) }}%</span>
                <span class=\"total-rating__counter\">
                    <span class=\"total-rating__counter-value\">{{ iCount }}&nbsp;</span>
                    <span class=\"total-rating__counter-text\">{{ choice('Review|Reviews|Reviews', iCount) }}</span>
                </span>
            </li>
        {% endfor %}
    </ul>
</section>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/total-rating/total-rating.htm", "");
    }
}
