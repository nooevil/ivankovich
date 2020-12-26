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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/content/big-slider/big-slider.htm */
class __TwigTemplate_b55427f4480eb3cadaad0f02158d27ee6d5e599122a26a9ee6309d42951357a3 extends \Twig\Template
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
        $tags = array("set" => 1, "if" => 3, "for" => 6, "partial" => 16);
        $filters = array("escape" => 8, "resize" => 10, "media" => 10);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for', 'partial'],
                ['escape', 'resize', 'media'],
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
        $context["arBannerList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 1), "index_banner_slider", [], "any", false, false, true, 1);
        // line 2
        echo "
";
        // line 3
        if ( !twig_test_empty(($context["arBannerList"] ?? null))) {
            // line 4
            echo "    <section class=\"big-slider swiper-container\">
        <ul class=\"big-slider__list swiper-wrapper\">
            ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["arBannerList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["arBanner"]) {
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["arBanner"], "image", [], "any", false, false, true, 6))) {
                    // line 7
                    echo "                <li class=\"big-slider__item swiper-slide\">
                    <a ";
                    // line 8
                    if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["arBanner"], "url", [], "any", false, false, true, 8))) {
                        echo "href=\"";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arBanner"], "url", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
                        echo "\"";
                    }
                    echo " class=\"big-slider__link\">
                        <picture class=\"big-slider__img-container\">
                            <source media=\"(min-width:769px)\" data-srcset=\"";
                    // line 10
                    echo call_user_func_array($this->env->getFilter('resize')->getCallable(), [$this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arBanner"], "image", [], "any", false, false, true, 10), 10, $this->source)), 1200, 510, ["quantity" => 80, "extension" => "webp"]]);
                    echo "\" type=\"image/webp\">
                            <source media=\"(min-width:769px)\" data-srcset=\"";
                    // line 11
                    echo call_user_func_array($this->env->getFilter('resize')->getCallable(), [$this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arBanner"], "image", [], "any", false, false, true, 11), 11, $this->source)), 1200, 510, ["quantity" => 80]]);
                    echo "\" type=\"image/jpeg\">
                            <source media=\"(max-width:768px)\" data-srcset=\"";
                    // line 12
                    echo call_user_func_array($this->env->getFilter('resize')->getCallable(), [$this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arBanner"], "mobile_image", [], "any", false, false, true, 12), 12, $this->source)), 728, 682, ["quantity" => 80, "extension" => "webp"]]);
                    echo "\" type=\"image/webp\">
                            <source media=\"(max-width:768px)\" data-srcset=\"";
                    // line 13
                    echo call_user_func_array($this->env->getFilter('resize')->getCallable(), [$this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arBanner"], "mobile_image", [], "any", false, false, true, 13), 13, $this->source)), 728, 682, ["quantity" => 80]]);
                    echo "\" type=\"image/jpeg\">
                            <img class=\"big-slider__img js-lazy-load\" data-src=\"";
                    // line 14
                    echo call_user_func_array($this->env->getFilter('resize')->getCallable(), [$this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arBanner"], "image", [], "any", false, false, true, 14), 14, $this->source)), 1200, 510]);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arBanner"], "description", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arBanner"], "title", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
                    echo "\">
                        </picture>
                        ";
                    // line 16
                    $context['__cms_partial_params'] = [];
                    $context['__cms_partial_params']['wrapperClass'] = "big-slider__preloader"                    ;
                    echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"                    , $context['__cms_partial_params']                    , true                    );
                    unset($context['__cms_partial_params']);
                    // line 17
                    echo "                    </a>
                </li>
            ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['arBanner'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "        </ul>
        <div class=\"big-slider__btn-wrap\">
            <div class=\"big-slider__btn big-slider__btn_prev\"></div>
            <div class=\"big-slider__btn big-slider__btn_next\"></div>
        </div>
    </section>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/big-slider/big-slider.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 20,  120 => 17,  115 => 16,  106 => 14,  102 => 13,  98 => 12,  94 => 11,  90 => 10,  81 => 8,  78 => 7,  73 => 6,  69 => 4,  67 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set arBannerList   = this.theme.index_banner_slider %}

{% if arBannerList is not empty %}
    <section class=\"big-slider swiper-container\">
        <ul class=\"big-slider__list swiper-wrapper\">
            {% for arBanner in arBannerList if arBanner.image is not empty %}
                <li class=\"big-slider__item swiper-slide\">
                    <a {% if arBanner.url is not empty %}href=\"{{ arBanner.url }}\"{% endif %} class=\"big-slider__link\">
                        <picture class=\"big-slider__img-container\">
                            <source media=\"(min-width:769px)\" data-srcset=\"{{ arBanner.image|media|resize(1200, 510, {'quantity': 80, 'extension': 'webp'}) }}\" type=\"image/webp\">
                            <source media=\"(min-width:769px)\" data-srcset=\"{{ arBanner.image|media|resize(1200, 510, {'quantity': 80}) }}\" type=\"image/jpeg\">
                            <source media=\"(max-width:768px)\" data-srcset=\"{{ arBanner.mobile_image|media|resize(728, 682, {'quantity': 80, 'extension': 'webp'}) }}\" type=\"image/webp\">
                            <source media=\"(max-width:768px)\" data-srcset=\"{{ arBanner.mobile_image|media|resize(728, 682, {'quantity': 80}) }}\" type=\"image/jpeg\">
                            <img class=\"big-slider__img js-lazy-load\" data-src=\"{{ arBanner.image|media|resize(1200, 510) }}\" alt=\"{{ arBanner.description }}\" title=\"{{ arBanner.title }}\">
                        </picture>
                        {% partial 'common/preloader/preloader' wrapperClass='big-slider__preloader' %}
                    </a>
                </li>
            {% endfor %}
        </ul>
        <div class=\"big-slider__btn-wrap\">
            <div class=\"big-slider__btn big-slider__btn_prev\"></div>
            <div class=\"big-slider__btn big-slider__btn_next\"></div>
        </div>
    </section>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/big-slider/big-slider.htm", "");
    }
}
