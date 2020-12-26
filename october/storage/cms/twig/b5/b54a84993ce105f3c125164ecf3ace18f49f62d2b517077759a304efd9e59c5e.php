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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-slider/product-slider.htm */
class __TwigTemplate_7544da854ac24044b2e59556c86a6c22961f12f09699654f89103ddc225df7f4 extends \Twig\Template
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
        $tags = array("for" => 4, "if" => 7, "partial" => 15);
        $filters = array("escape" => 1, "length" => 7, "theme" => 17);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for', 'if', 'partial'],
                ['escape', 'length', 'theme'],
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
        echo "<section class=\"product-slider ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 1, $this->source), "html", null, true);
        echo "\">
    <div class=\"product-nav-slider product-nav-slider_visually-hidden swiper-container\" style=\"float:left;margin-top:0;height:816px;\">
        <ul class=\"product-nav-slider__wrapper swiper-wrapper\">
            ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["obImageList"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["obImage"]) {
            // line 5
            echo "                <li class=\"product-nav-slider__slide swiper-slide\">
                    <span class=\"product-nav-slider__link\">
                        ";
            // line 7
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obImage"], "path", [], "any", false, false, true, 7)) > 0)) {
                // line 8
                echo "                            <picture class=\"product-nav-slider__img-container\">
                                <source media=\"(min-width:769px)\" data-srcset=\"";
                // line 9
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "getThumb", [0 => 160, 1 => 160, 2 => ["quantity" => 80, "extension" => "webp"]], "method", false, false, true, 9), 9, $this->source), "html", null, true);
                echo "\" type=\"image/webp\">
                                <source media=\"(min-width:769px)\" data-srcset=\"";
                // line 10
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "getThumb", [0 => 160, 1 => 160, 2 => ["quantity" => 80]], "method", false, false, true, 10), 10, $this->source), "html", null, true);
                echo "\" type=\"image/jpeg\">
                                <source media=\"(max-width:768px)\" data-srcset=\"";
                // line 11
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "getThumb", [0 => 160, 1 => 160, 2 => ["quantity" => 80, "extension" => "webp"]], "method", false, false, true, 11), 11, $this->source), "html", null, true);
                echo "\" type=\"image/webp\">
                                <source media=\"(max-width:768px)\" data-srcset=\"";
                // line 12
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "getThumb", [0 => 160, 1 => 160, 2 => ["quantity" => 80]], "method", false, false, true, 12), 12, $this->source), "html", null, true);
                echo "\" type=\"image/jpeg\">
                                <img class=\"product-nav-slider__img js-lazy-load\" data-src=\"";
                // line 13
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "getThumb", [0 => 160, 1 => 160, 2 => ["quantity" => 80]], "method", false, false, true, 13), 13, $this->source), "html", null, true);
                echo "\" itemprop=\"image\" alt=\"";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "description", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "title", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
                echo "\">
                            </picture>
                        ";
                // line 15
                $context['__cms_partial_params'] = [];
                $context['__cms_partial_params']['wrapperClass'] = "product-nav-slider__preloader"                ;
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 16
                echo "                        ";
            } else {
                // line 17
                echo "                            <img class=\"product-nav-slider__img product-nav-slider__img_no-photo\" src=\"";
                echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/img/nophoto.svg");
                echo "\" itemprop=\"image\">
                        ";
            }
            // line 19
            echo "                    </span>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obImage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "        </ul>
    </div>
    <div class=\"product-slider__container swiper-container\">
        <ul class=\"product-slider__wrapper swiper-wrapper\">
            ";
        // line 26
        if ((twig_length_filter($this->env, ($context["obImageList"] ?? null)) > 0)) {
            // line 27
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["obImageList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["obImage"]) {
                // line 28
                echo "                    <li class=\"product-slider__slide swiper-slide\">
                        <span class=\"product-slider__link\">
                            ";
                // line 30
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obImage"], "path", [], "any", false, false, true, 30)) > 0)) {
                    // line 31
                    echo "                                <picture class=\"product-slider__img-container\">
                                    <source media=\"(min-width:769px)\" data-srcset=\"";
                    // line 32
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "getThumb", [0 => 910, 1 => 588, 2 => ["quantity" => 80, "extension" => "webp"]], "method", false, false, true, 32), 32, $this->source), "html", null, true);
                    echo "\" type=\"image/webp\">
                                    <source media=\"(min-width:769px)\" data-srcset=\"";
                    // line 33
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "getThumb", [0 => 910, 1 => 588, 2 => ["quantity" => 80]], "method", false, false, true, 33), 33, $this->source), "html", null, true);
                    echo "\" type=\"image/jpeg\">
                                    <source media=\"(max-width:768px)\" data-srcset=\"";
                    // line 34
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "getThumb", [0 => 1075, 1 => 862, 2 => ["quantity" => 80, "extension" => "webp"]], "method", false, false, true, 34), 34, $this->source), "html", null, true);
                    echo "\" type=\"image/webp\">
                                    <source media=\"(max-width:768px)\" data-srcset=\"";
                    // line 35
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "getThumb", [0 => 1075, 1 => 862, 2 => ["quantity" => 80]], "method", false, false, true, 35), 35, $this->source), "html", null, true);
                    echo "\" type=\"image/jpeg\">
                                    <img class=\"product-slider__img js-lazy-load\" data-src=\"";
                    // line 36
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "getThumb", [0 => 1075, 1 => 862, 2 => ["quantity" => 80]], "method", false, false, true, 36), 36, $this->source), "html", null, true);
                    echo "\" itemprop=\"image\" alt=\"";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "description", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "title", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
                    echo "\">
                                </picture>
                                ";
                    // line 38
                    $context['__cms_partial_params'] = [];
                    $context['__cms_partial_params']['wrapperClass'] = "product-slider__preloader"                    ;
                    echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"                    , $context['__cms_partial_params']                    , true                    );
                    unset($context['__cms_partial_params']);
                    // line 39
                    echo "                            ";
                } else {
                    // line 40
                    echo "                                <img class=\"product-slider__img product-slider__img_no-photo\" src=\"";
                    echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/img/nophoto.svg");
                    echo "\" itemprop=\"image\" alt=\"";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "description", [], "any", false, false, true, 40), 40, $this->source), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obImage"], "title", [], "any", false, false, true, 40), 40, $this->source), "html", null, true);
                    echo "\">
                            ";
                }
                // line 42
                echo "                        </span>
                    </li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obImage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "            ";
        } else {
            // line 46
            echo "                 <li class=\"product-slider__slide swiper-slide\">
                    <span class=\"product-slider__link\">
                        ";
            // line 48
            $context['__cms_partial_params'] = [];
            $context['__cms_partial_params']['wrapperClass'] = "product-slider__preloader"            ;
            echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"            , $context['__cms_partial_params']            , true            );
            unset($context['__cms_partial_params']);
            // line 49
            echo "                        <img class=\"product-slider__img product-slider__img_no-photo\" src=\"";
            echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/img/nophoto.svg");
            echo "\" itemprop=\"image\" alt=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obImage"] ?? null), "description", [], "any", false, false, true, 49), 49, $this->source), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["obImage"] ?? null), "title", [], "any", false, false, true, 49), 49, $this->source), "html", null, true);
            echo "\">
                    </span>
                </li>
            ";
        }
        // line 53
        echo "        </ul>
    </div>
    <div class=\"product-slider__pagination\"></div>
</section>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-slider/product-slider.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 53,  214 => 49,  209 => 48,  205 => 46,  202 => 45,  194 => 42,  184 => 40,  181 => 39,  176 => 38,  167 => 36,  163 => 35,  159 => 34,  155 => 33,  151 => 32,  148 => 31,  146 => 30,  142 => 28,  137 => 27,  135 => 26,  129 => 22,  121 => 19,  115 => 17,  112 => 16,  107 => 15,  98 => 13,  94 => 12,  90 => 11,  86 => 10,  82 => 9,  79 => 8,  77 => 7,  73 => 5,  69 => 4,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<section class=\"product-slider {{ wrapperClass }}\">
    <div class=\"product-nav-slider product-nav-slider_visually-hidden swiper-container\" style=\"float:left;margin-top:0;height:816px;\">
        <ul class=\"product-nav-slider__wrapper swiper-wrapper\">
            {% for obImage in obImageList %}
                <li class=\"product-nav-slider__slide swiper-slide\">
                    <span class=\"product-nav-slider__link\">
                        {% if obImage.path|length > 0 %}
                            <picture class=\"product-nav-slider__img-container\">
                                <source media=\"(min-width:769px)\" data-srcset=\"{{ obImage.getThumb(160, 160, {'quantity': 80, 'extension': 'webp'}) }}\" type=\"image/webp\">
                                <source media=\"(min-width:769px)\" data-srcset=\"{{ obImage.getThumb(160, 160, {'quantity': 80}) }}\" type=\"image/jpeg\">
                                <source media=\"(max-width:768px)\" data-srcset=\"{{ obImage.getThumb(160, 160, {'quantity': 80, 'extension': 'webp'}) }}\" type=\"image/webp\">
                                <source media=\"(max-width:768px)\" data-srcset=\"{{ obImage.getThumb(160, 160, {'quantity': 80}) }}\" type=\"image/jpeg\">
                                <img class=\"product-nav-slider__img js-lazy-load\" data-src=\"{{ obImage.getThumb(160, 160, {'quantity': 80}) }}\" itemprop=\"image\" alt=\"{{ obImage.description }}\" title=\"{{ obImage.title }}\">
                            </picture>
                        {% partial 'common/preloader/preloader' wrapperClass='product-nav-slider__preloader' %}
                        {% else %}
                            <img class=\"product-nav-slider__img product-nav-slider__img_no-photo\" src=\"{{ 'assets/img/nophoto.svg'|theme }}\" itemprop=\"image\">
                        {% endif %}
                    </span>
                </li>
            {% endfor %}
        </ul>
    </div>
    <div class=\"product-slider__container swiper-container\">
        <ul class=\"product-slider__wrapper swiper-wrapper\">
            {% if obImageList|length > 0 %}
                {% for obImage in obImageList %}
                    <li class=\"product-slider__slide swiper-slide\">
                        <span class=\"product-slider__link\">
                            {% if obImage.path|length > 0 %}
                                <picture class=\"product-slider__img-container\">
                                    <source media=\"(min-width:769px)\" data-srcset=\"{{ obImage.getThumb(910, 588, {'quantity': 80, 'extension': 'webp'}) }}\" type=\"image/webp\">
                                    <source media=\"(min-width:769px)\" data-srcset=\"{{ obImage.getThumb(910, 588, {'quantity': 80}) }}\" type=\"image/jpeg\">
                                    <source media=\"(max-width:768px)\" data-srcset=\"{{ obImage.getThumb(1075, 862, {'quantity': 80, 'extension': 'webp'}) }}\" type=\"image/webp\">
                                    <source media=\"(max-width:768px)\" data-srcset=\"{{ obImage.getThumb(1075, 862, {'quantity': 80}) }}\" type=\"image/jpeg\">
                                    <img class=\"product-slider__img js-lazy-load\" data-src=\"{{ obImage.getThumb(1075, 862, {'quantity': 80}) }}\" itemprop=\"image\" alt=\"{{ obImage.description }}\" title=\"{{ obImage.title }}\">
                                </picture>
                                {% partial 'common/preloader/preloader' wrapperClass='product-slider__preloader' %}
                            {% else %}
                                <img class=\"product-slider__img product-slider__img_no-photo\" src=\"{{ 'assets/img/nophoto.svg'|theme }}\" itemprop=\"image\" alt=\"{{ obImage.description }}\" title=\"{{ obImage.title }}\">
                            {% endif %}
                        </span>
                    </li>
                {% endfor %}
            {% else %}
                 <li class=\"product-slider__slide swiper-slide\">
                    <span class=\"product-slider__link\">
                        {% partial 'common/preloader/preloader' wrapperClass='product-slider__preloader' %}
                        <img class=\"product-slider__img product-slider__img_no-photo\" src=\"{{ 'assets/img/nophoto.svg'|theme }}\" itemprop=\"image\" alt=\"{{ obImage.description }}\" title=\"{{ obImage.title }}\">
                    </span>
                </li>
            {% endif %}
        </ul>
    </div>
    <div class=\"product-slider__pagination\"></div>
</section>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/product-slider/product-slider.htm", "");
    }
}
