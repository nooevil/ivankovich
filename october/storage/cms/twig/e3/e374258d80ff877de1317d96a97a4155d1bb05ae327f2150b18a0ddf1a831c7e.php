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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/article/news-slider/news-slider.htm */
class __TwigTemplate_b00b7d06a5b655d14585ec73c5ffb2df1217bb0f9c0fda268a2bac7ef5d097a9 extends \Twig\Template
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
        $tags = array("set" => 1, "if" => 3, "partial" => 6, "for" => 9);
        $filters = array("page" => 5, "escape" => 12);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'partial', 'for'],
                ['page', 'escape'],
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
        $context["obCategoryList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["ArticleCategoryList"] ?? null), "make", [], "method", false, false, true, 1), "tree", [], "method", false, false, true, 1);
        // line 2
        echo "
";
        // line 3
        if (twig_get_attribute($this->env, $this->source, ($context["obCategoryList"] ?? null), "isNotEmpty", [], "method", false, false, true, 3)) {
            // line 4
            echo "    <section class=\"news-slider\">
        <a href=\"";
            // line 5
            echo $this->extensions['Cms\Twig\Extension']->pageFilter("news-list");
            echo "\" class=\"news-slider__title-link\">
            ";
            // line 6
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['wrapperClass'] = "news-slider__title"            ;
            $context['__cms_partial_params']['text'] = "Our Blog"            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/section-title/section-title"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 7
            echo "        </a>
        <ul class=\"news-slider__tablist\" role=\"tablist\">
            ";
            // line 9
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
                // line 10
                echo "                <li class=\"news-slider__tabitem\" role=\"presentation\">
                    ";
                // line 11
                $context["isActive"] = (((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 11) == 1)) ? ("news-slider__btn_active") : (""));
                // line 12
                echo "                    <button class=\"news-slider__btn ";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["isActive"] ?? null), 12, $this->source), "html", null, true);
                echo "\" data-id=\"";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obCategory"], "id", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
                echo "\" role=\"tab\" aria-controls=\"news-slider\">";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obCategory"], "name", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
                echo "</button>
                </li>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obCategory'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "        </ul>
        ";
            // line 16
            $context["obFirstCategory"] = twig_get_attribute($this->env, $this->source, ($context["obCategoryList"] ?? null), "first", [], "method", false, false, true, 16);
            // line 17
            echo "        <div class=\"news-slider__slider\">
            ";
            // line 18
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['iCategoryID'] = twig_get_attribute($this->env, $this->source, ($context["obFirstCategory"] ?? null), "id", [], "any", false, false, true, 18)            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("article/news-slider/news-slider-ajax"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 19
            echo "        </div>
        ";
            // line 20
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['wrapperClass'] = "news-slider__preloader"            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 21
            echo "    </section>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/article/news-slider/news-slider.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 21,  146 => 20,  143 => 19,  138 => 18,  135 => 17,  133 => 16,  130 => 15,  108 => 12,  106 => 11,  103 => 10,  86 => 9,  82 => 7,  76 => 6,  72 => 5,  69 => 4,  67 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set obCategoryList = ArticleCategoryList.make().tree() %}

{% if obCategoryList.isNotEmpty() %}
    <section class=\"news-slider\">
        <a href=\"{{ 'news-list'|page }}\" class=\"news-slider__title-link\">
            {% partial 'common/section-title/section-title' wrapperClass='news-slider__title' text='Our Blog' %}
        </a>
        <ul class=\"news-slider__tablist\" role=\"tablist\">
            {% for obCategory in obCategoryList %}
                <li class=\"news-slider__tabitem\" role=\"presentation\">
                    {% set isActive = loop.index == 1 ? 'news-slider__btn_active' : '' %}
                    <button class=\"news-slider__btn {{ isActive }}\" data-id=\"{{ obCategory.id }}\" role=\"tab\" aria-controls=\"news-slider\">{{ obCategory.name }}</button>
                </li>
            {% endfor %}
        </ul>
        {% set obFirstCategory = obCategoryList.first() %}
        <div class=\"news-slider__slider\">
            {% partial 'article/news-slider/news-slider-ajax' iCategoryID = obFirstCategory.id %}
        </div>
        {% partial 'common/preloader/preloader' wrapperClass='news-slider__preloader' %}
    </section>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/article/news-slider/news-slider.htm", "");
    }
}
