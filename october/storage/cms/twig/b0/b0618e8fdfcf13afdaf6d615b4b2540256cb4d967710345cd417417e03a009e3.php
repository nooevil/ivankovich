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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/content/main-slider/main-slider.htm */
class __TwigTemplate_0b7b34b3f37905818e52a5aba1d7487e757fdd38762ca5defdcf2466e4435fc4 extends \Twig\Template
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
        $context["arSliderList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 1), "index_slider", [], "any", false, false, true, 1);
        // line 2
        echo "
";
        // line 3
        if ( !twig_test_empty(($context["arSliderList"] ?? null))) {
            // line 4
            echo "    <section class=\"main-slider swiper-container\">
        <ul class=\"main-slider__list swiper-wrapper\">
            ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["arSliderList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["arSlider"]) {
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["arSlider"], "image", [], "any", false, false, true, 6))) {
                    // line 7
                    echo "                <li class=\"main-slider__item swiper-slide\">
                    <a ";
                    // line 8
                    if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["arSlider"], "url", [], "any", false, false, true, 8))) {
                        echo "href=\"";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arSlider"], "url", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
                        echo "\"";
                    }
                    echo " class=\"main-slider__link\">
                        <picture class=\"main-slider__img-container\">
                            <source media=\"(min-width:769px)\" data-srcset=\"";
                    // line 10
                    echo call_user_func_array($this->env->getFilter('resize')->getCallable(), [$this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arSlider"], "image", [], "any", false, false, true, 10), 10, $this->source)), 1200, 570, ["quantity" => 80, "extension" => "webp"]]);
                    echo "\" type=\"image/webp\">
                            <source media=\"(min-width:769px)\" data-srcset=\"";
                    // line 11
                    echo call_user_func_array($this->env->getFilter('resize')->getCallable(), [$this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arSlider"], "image", [], "any", false, false, true, 11), 11, $this->source)), 1200, 570, ["quantity" => 80]]);
                    echo "\" type=\"image/jpeg\">
                            <source media=\"(max-width:768px)\" data-srcset=\"";
                    // line 12
                    echo call_user_func_array($this->env->getFilter('resize')->getCallable(), [$this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arSlider"], "mobile_image", [], "any", false, false, true, 12), 12, $this->source)), 768, 968, ["quantity" => 80, "extension" => "webp"]]);
                    echo "\" type=\"image/webp\">
                            <source media=\"(max-width:768px)\" data-srcset=\"";
                    // line 13
                    echo call_user_func_array($this->env->getFilter('resize')->getCallable(), [$this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arSlider"], "mobile_image", [], "any", false, false, true, 13), 13, $this->source)), 768, 968, ["quantity" => 80]]);
                    echo "\" type=\"image/jpeg\">
                            <img class=\"main-slider__img js-lazy-load\" data-src=\"";
                    // line 14
                    echo call_user_func_array($this->env->getFilter('resize')->getCallable(), [$this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arSlider"], "image", [], "any", false, false, true, 14), 14, $this->source)), 1200, 570, ["quantity" => 80]]);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arSlider"], "description", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arSlider"], "title", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
                    echo "\">
                        </picture>
                        ";
                    // line 16
                    $context['__cms_partial_params'] = [];
                    $context['__cms_partial_params']['wrapperClass'] = "main-slider__preloader"                    ;
                    echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"                    , $context['__cms_partial_params']                    , true                    );
                    unset($context['__cms_partial_params']);
                    // line 17
                    echo "                    </a>
                </li>
            ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['arSlider'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "        </ul>
        <div class=\"main-slider__btn-wrap\">
            <div class=\"main-slider__btn main-slider__btn_prev\"></div>
            <div class=\"main-slider__pagination\"></div>
            <div class=\"main-slider__btn main-slider__btn_next\"></div>
        </div>
    </section>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/main-slider/main-slider.htm";
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
        return new Source("{% set arSliderList  = this.theme.index_slider %}

{% if arSliderList is not empty %}
    <section class=\"main-slider swiper-container\">
        <ul class=\"main-slider__list swiper-wrapper\">
            {% for arSlider in arSliderList if arSlider.image is not empty %}
                <li class=\"main-slider__item swiper-slide\">
                    <a {% if arSlider.url is not empty %}href=\"{{ arSlider.url }}\"{% endif %} class=\"main-slider__link\">
                        <picture class=\"main-slider__img-container\">
                            <source media=\"(min-width:769px)\" data-srcset=\"{{ arSlider.image|media|resize(1200, 570, {'quantity': 80, 'extension': 'webp'}) }}\" type=\"image/webp\">
                            <source media=\"(min-width:769px)\" data-srcset=\"{{ arSlider.image|media|resize(1200, 570, {'quantity': 80}) }}\" type=\"image/jpeg\">
                            <source media=\"(max-width:768px)\" data-srcset=\"{{ arSlider.mobile_image|media|resize(768, 968, {'quantity': 80, 'extension': 'webp'}) }}\" type=\"image/webp\">
                            <source media=\"(max-width:768px)\" data-srcset=\"{{ arSlider.mobile_image|media|resize(768, 968, {'quantity': 80}) }}\" type=\"image/jpeg\">
                            <img class=\"main-slider__img js-lazy-load\" data-src=\"{{ arSlider.image|media|resize(1200, 570, {'quantity': 80}) }}\" alt=\"{{ arSlider.description }}\" title=\"{{ arSlider.title }}\">
                        </picture>
                        {% partial 'common/preloader/preloader' wrapperClass='main-slider__preloader' %}
                    </a>
                </li>
            {% endfor %}
        </ul>
        <div class=\"main-slider__btn-wrap\">
            <div class=\"main-slider__btn main-slider__btn_prev\"></div>
            <div class=\"main-slider__pagination\"></div>
            <div class=\"main-slider__btn main-slider__btn_next\"></div>
        </div>
    </section>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/main-slider/main-slider.htm", "");
    }
}
