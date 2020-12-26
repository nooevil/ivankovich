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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review-list/review-list.htm */
class __TwigTemplate_846c22590b9f71e29bec2442ffb43b7dc0028af47eb3eba3fa73a4d1939431bd extends \Twig\Template
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
        $tags = array("set" => 1, "partial" => 5, "if" => 7);
        $filters = array();
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'partial', 'if'],
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
        $context["iPage"] = twig_get_attribute($this->env, $this->source, ($context["Pagination"] ?? null), "getPageFromRequest", [], "method", false, false, true, 1);
        // line 2
        $context["iMaxPage"] = twig_get_attribute($this->env, $this->source, ($context["Pagination"] ?? null), "getMaxPage", [0 => twig_get_attribute($this->env, $this->source, ($context["obReviewList"] ?? null), "count", [], "method", false, false, true, 2)], "method", false, false, true, 2);
        // line 3
        echo "
<ul class=\"review-list\">
    ";
        // line 5
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['obReviewList'] = ($context["obReviewList"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/review/review-list/review-list-ajax"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 6
        echo "</ul>
";
        // line 7
        if ((($context["iMaxPage"] ?? null) > ($context["iPage"] ?? null))) {
            // line 8
            echo "    <div class=\"review-list__wrapper\">
        ";
            // line 9
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['type'] = "button"            ;
            $context['__cms_partial_params']['text'] = "Load more"            ;
            $context['__cms_partial_params']['wrapperClass'] = "review-list__more"            ;
            $context['__cms_partial_params']['attr'] = (("data-max-page=\"" . ($context["iMaxPage"] ?? null)) . "\" data-page=\"1\"")            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("form/button/button"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 10
            echo "        ";
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['wrapperClass'] = "review-list__preloader"            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 11
            echo "    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review-list/review-list.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 11,  91 => 10,  83 => 9,  80 => 8,  78 => 7,  75 => 6,  70 => 5,  66 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set iPage = Pagination.getPageFromRequest() %}
{% set iMaxPage = Pagination.getMaxPage(obReviewList.count()) %}

<ul class=\"review-list\">
    {% partial 'content/review/review-list/review-list-ajax' obReviewList = obReviewList %}
</ul>
{% if iMaxPage > iPage %}
    <div class=\"review-list__wrapper\">
        {% partial 'form/button/button' type='button' text='Load more' wrapperClass='review-list__more' attr='data-max-page=\"' ~ iMaxPage ~ '\" data-page=\"1\"' %}
        {% partial 'common/preloader/preloader' wrapperClass=\"review-list__preloader\" %}
    </div>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review-list/review-list.htm", "");
    }
}
