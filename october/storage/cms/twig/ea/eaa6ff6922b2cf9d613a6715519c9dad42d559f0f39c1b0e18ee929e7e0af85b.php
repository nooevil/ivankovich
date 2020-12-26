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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/article/news-list/news-list.htm */
class __TwigTemplate_0ac0be45a1b7be5cf9ab122fd0e57843b687b134ed06c0a5d2cc104cdceffee9 extends \Twig\Template
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
        $tags = array("set" => 1, "partial" => 9, "if" => 10, "for" => 18);
        $filters = array("default" => 2, "escape" => 13);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'partial', 'if', 'for'],
                ['default', 'escape'],
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
        $context["obCategoryList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["ArticleCategoryList"] ?? null), "make", [], "method", false, false, true, 1), "active", [], "method", false, false, true, 1);
        // line 2
        $context["sPageTitle"] = ((twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getPageTitle", [], "method", true, true, true, 2)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getPageTitle", [], "method", false, false, true, 2), 2, $this->source), "Our Blog")) : ("Our Blog"));
        // line 3
        echo "
";
        // line 4
        $context["arBreadcrumbs"] = [0 => ["active" => true, "name" =>         // line 5
($context["sPageTitle"] ?? null)]];
        // line 7
        echo "
<section class=\"news-list\">
    ";
        // line 9
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['arBreadcrumbs'] = ($context["arBreadcrumbs"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/breadcrumbs/breadcrumbs"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 10
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["obCategoryList"] ?? null), "isNotEmpty", [], "method", false, false, true, 10)) {
            // line 11
            echo "        <div class=\"news-list__header\">
            <div class=\"new-list__header-wrapper\">
                <h1 class=\"news-list__title\">";
            // line 13
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sPageTitle"] ?? null), 13, $this->source), "html", null, true);
            echo "</h1>
                ";
            // line 14
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['wrapperClass'] = "news-list__preloader"            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 15
            echo "            </div>
            ";
            // line 16
            $context["iCategoryID"] = null;
            // line 17
            echo "            <ul class=\"news-list__tablist\" role=\"tablist\">
                ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["obCategoryList"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["obCategory"]) {
                // line 19
                echo "                    ";
                $context["isActive"] = "";
                // line 20
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 20) == 1)) {
                    // line 21
                    echo "                        ";
                    $context["isActive"] = "news-list__btn_active";
                    // line 22
                    echo "                        ";
                    $context["iCategoryID"] = twig_get_attribute($this->env, $this->source, $context["obCategory"], "id", [], "any", false, false, true, 22);
                    // line 23
                    echo "                    ";
                }
                // line 24
                echo "                    ";
                $context["obArticleList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["ArticleList"] ?? null), "make", [], "method", false, false, true, 24), "sort", [0 => "publish|desc"], "method", false, false, true, 24), "category", [0 => twig_get_attribute($this->env, $this->source, $context["obCategory"], "id", [], "any", false, false, true, 24), 1 => true], "method", false, false, true, 24), "published", [], "method", false, false, true, 24);
                // line 25
                echo "                    ";
                if ( !twig_test_empty(($context["obArticleList"] ?? null))) {
                    // line 26
                    echo "                        <li class=\"news-list__tabitem\">
                            <button class=\"news-list__btn ";
                    // line 27
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["isActive"] ?? null), 27, $this->source), "html", null, true);
                    echo "\" role=\"tab\" data-id=\"";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obCategory"], "id", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obCategory"], "name", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                    echo "</button>
                        </li>
                    ";
                }
                // line 30
                echo "                ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obCategory'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "            </ul>
        </div>
        <div class=\"news-list__wrapper\">
            ";
            // line 34
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['iCategoryID'] = ($context["iCategoryID"] ?? null)            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("article/news-list/news-list-ajax"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 35
            echo "        </div>
    ";
        } else {
            // line 37
            echo "        <div class=\"news-list__header\">
            <h1 class=\"news-list__title\">";
            // line 38
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["sPageTitle"] ?? null), 38, $this->source), "html", null, true);
            echo "</h1>
        </div>
        <div class=\"news-list__wrapper  news-list__wrapper_empty\">There are no news at this time.</div>
    ";
        }
        // line 42
        echo "</section>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/article/news-list/news-list.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 42,  187 => 38,  184 => 37,  180 => 35,  175 => 34,  170 => 31,  156 => 30,  146 => 27,  143 => 26,  140 => 25,  137 => 24,  134 => 23,  131 => 22,  128 => 21,  125 => 20,  122 => 19,  105 => 18,  102 => 17,  100 => 16,  97 => 15,  92 => 14,  88 => 13,  84 => 11,  81 => 10,  76 => 9,  72 => 7,  70 => 5,  69 => 4,  66 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set obCategoryList = ArticleCategoryList.make().active() %}
{% set sPageTitle = SeoToolbox.getPageTitle()|default('Our Blog') %}

{% set arBreadcrumbs = [
    {'active': true, 'name': sPageTitle }
] %}

<section class=\"news-list\">
    {% partial 'common/breadcrumbs/breadcrumbs' arBreadcrumbs=arBreadcrumbs  %}
    {% if obCategoryList.isNotEmpty() %}
        <div class=\"news-list__header\">
            <div class=\"new-list__header-wrapper\">
                <h1 class=\"news-list__title\">{{ sPageTitle }}</h1>
                {% partial 'common/preloader/preloader' wrapperClass='news-list__preloader' %}
            </div>
            {% set iCategoryID = null %}
            <ul class=\"news-list__tablist\" role=\"tablist\">
                {% for obCategory in obCategoryList %}
                    {% set isActive = '' %}
                    {% if loop.index == 1 %}
                        {% set isActive = 'news-list__btn_active' %}
                        {% set iCategoryID = obCategory.id %}
                    {% endif %}
                    {% set obArticleList  = ArticleList.make().sort('publish|desc').category(obCategory.id, true).published() %}
                    {% if obArticleList is not empty %}
                        <li class=\"news-list__tabitem\">
                            <button class=\"news-list__btn {{ isActive }}\" role=\"tab\" data-id=\"{{ obCategory.id }}\">{{ obCategory.name }}</button>
                        </li>
                    {% endif %}
                {% endfor %}
            </ul>
        </div>
        <div class=\"news-list__wrapper\">
            {% partial 'article/news-list/news-list-ajax' iCategoryID=iCategoryID %}
        </div>
    {% else %}
        <div class=\"news-list__header\">
            <h1 class=\"news-list__title\">{{ sPageTitle }}</h1>
        </div>
        <div class=\"news-list__wrapper  news-list__wrapper_empty\">There are no news at this time.</div>
    {% endif %}
</section>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/article/news-list/news-list.htm", "");
    }
}
