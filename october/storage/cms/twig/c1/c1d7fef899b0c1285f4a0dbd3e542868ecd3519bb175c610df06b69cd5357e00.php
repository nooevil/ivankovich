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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/footer/footer-nav/footer-nav.htm */
class __TwigTemplate_59092d71367356b76b3c98ab3eaddcb03aa9a6c8113672bb8f3fd65520f40df8 extends \Twig\Template
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
        $tags = array("set" => 1, "for" => 6, "if" => 10);
        $filters = array("escape" => 8, "last" => 30, "split" => 30, "media" => 30, "resize" => 33);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if'],
                ['escape', 'last', 'split', 'media', 'resize'],
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
        $context["arPaymentMethodsList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 1), "payment_methods_list", [], "any", false, false, true, 1);
        // line 2
        $context["arMenuList"] = twig_get_attribute($this->env, $this->source, ($context["FooterMenu"] ?? null), "menuItems", [], "any", false, false, true, 2);
        // line 3
        echo "
<nav class=\"footer-nav\">
    <ul class=\"footer-nav__list\">
        ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["arMenuList"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["arItemMenu"]) {
            if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["arItemMenu"], "viewBag", [], "any", false, false, true, 6), "isHidden", [], "any", false, false, true, 6)) {
                // line 7
                echo "            <li class=\"footer-nav__item\">
                <b class=\"footer-nav__item-title\">";
                // line 8
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arItemMenu"], "title", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
                echo "</b>
                ";
                // line 9
                $context["arSubItemMenuList"] = twig_get_attribute($this->env, $this->source, $context["arItemMenu"], "items", [], "any", false, false, true, 9);
                // line 10
                echo "                ";
                if ( !twig_test_empty(($context["arSubItemMenuList"] ?? null))) {
                    // line 11
                    echo "                    <ul class=\"footer-nav__subnav\">
                        ";
                    // line 12
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["arSubItemMenuList"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["arSubItemMenu"]) {
                        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["arSubItemMenu"], "viewBag", [], "any", false, false, true, 12), "isHidden", [], "any", false, false, true, 12)) {
                            // line 13
                            echo "                            <li class=\"footer-nav__subitem\">
                                <a ";
                            // line 14
                            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["arSubItemMenu"], "url", [], "any", false, false, true, 14))) {
                                echo "href=\"";
                                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arSubItemMenu"], "url", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
                                echo "\"";
                            }
                            echo " class=\"footer-nav__link\">";
                            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arSubItemMenu"], "title", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
                            echo "</a>
                            </li>
                        ";
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['arSubItemMenu'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 17
                    echo "                    </ul>
                ";
                }
                // line 19
                echo "            </li>
        ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['arItemMenu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "        ";
        if ( !twig_test_empty(($context["arPaymentMethodsList"] ?? null))) {
            // line 22
            echo "            <li class=\"footer-nav__item\">
                <b class=\"footer-nav__item-title\">Payment Methods</b>
                <ul class=\"footer-nav__subnav footer-nav__subnav_payment\">
                    ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["arPaymentMethodsList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["arPaymentMethodData"]) {
                // line 26
                echo "                        ";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["arPaymentMethodData"], "image", [], "any", false, false, true, 26))) {
                    // line 27
                    echo "                            <li class=\"footer-nav__subitem\">
                                ";
                    // line 28
                    $context["htmlTag"] = (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["arPaymentMethodData"], "url", [], "any", false, false, true, 28))) ? ("a") : ("span"));
                    // line 29
                    echo "                                <";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["htmlTag"] ?? null), 29, $this->source), "html", null, true);
                    echo " ";
                    if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["arPaymentMethodData"], "url", [], "any", false, false, true, 29))) {
                        echo "href=\"";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arPaymentMethodData"], "url", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
                        echo "\"";
                    }
                    echo " class=\"footer-nav__link footer-nav__link_with-icon\" ";
                    if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["arPaymentMethodData"], "url", [], "any", false, false, true, 29))) {
                        echo "target=\"_blank\" rel=\"noopener\"";
                    }
                    echo ">
                                    ";
                    // line 30
                    $context["imageExtension"] = twig_last($this->env, twig_split_filter($this->env, $this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arPaymentMethodData"], "image", [], "any", false, false, true, 30), 30, $this->source)), "."));
                    // line 31
                    echo "                                    ";
                    if ((($context["imageExtension"] ?? null) != "svg")) {
                        // line 32
                        echo "                                        <picture class=\"footer-nav__icon-wrap\">
                                            <source data-srcset=\"";
                        // line 33
                        echo call_user_func_array($this->env->getFilter('resize')->getCallable(), [$this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arPaymentMethodData"], "image", [], "any", false, false, true, 33), 33, $this->source)), null, 144, ["quantity" => 80, "extension" => "webp"]]);
                        echo "\" type=\"image/webp\">
                                            <source data-srcset=\"";
                        // line 34
                        echo call_user_func_array($this->env->getFilter('resize')->getCallable(), [$this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arPaymentMethodData"], "image", [], "any", false, false, true, 34), 34, $this->source)), null, 144, ["quantity" => 80]]);
                        echo "\">
                                            <img class=\"footer-nav__icon js-lazy-load\" data-src=\"";
                        // line 35
                        echo $this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arPaymentMethodData"], "image", [], "any", false, false, true, 35), 35, $this->source));
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arPaymentMethodData"], "description", [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arPaymentMethodData"], "title", [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
                        echo "\">
                                        </picture>
                                    ";
                    } else {
                        // line 38
                        echo "                                        <img class=\"footer-nav__icon js-lazy-load\" data-src=\"";
                        echo $this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arPaymentMethodData"], "image", [], "any", false, false, true, 38), 38, $this->source));
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arPaymentMethodData"], "description", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arPaymentMethodData"], "title", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
                        echo "\">
                                    ";
                    }
                    // line 40
                    echo "                                </";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["htmlTag"] ?? null), 40, $this->source), "html", null, true);
                    echo ">
                            </li>
                        ";
                }
                // line 43
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['arPaymentMethodData'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "                </ul>
            </li>
        ";
        }
        // line 47
        echo "    </ul>
</nav>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/footer/footer-nav/footer-nav.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 47,  211 => 44,  205 => 43,  198 => 40,  188 => 38,  178 => 35,  174 => 34,  170 => 33,  167 => 32,  164 => 31,  162 => 30,  147 => 29,  145 => 28,  142 => 27,  139 => 26,  135 => 25,  130 => 22,  127 => 21,  119 => 19,  115 => 17,  99 => 14,  96 => 13,  91 => 12,  88 => 11,  85 => 10,  83 => 9,  79 => 8,  76 => 7,  71 => 6,  66 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set arPaymentMethodsList = this.theme.payment_methods_list %}
{% set arMenuList = FooterMenu.menuItems %}

<nav class=\"footer-nav\">
    <ul class=\"footer-nav__list\">
        {% for arItemMenu in arMenuList if not arItemMenu.viewBag.isHidden %}
            <li class=\"footer-nav__item\">
                <b class=\"footer-nav__item-title\">{{ arItemMenu.title }}</b>
                {% set arSubItemMenuList = arItemMenu.items %}
                {% if arSubItemMenuList is not empty %}
                    <ul class=\"footer-nav__subnav\">
                        {% for arSubItemMenu in arSubItemMenuList if not arSubItemMenu.viewBag.isHidden %}
                            <li class=\"footer-nav__subitem\">
                                <a {% if arSubItemMenu.url is not empty %}href=\"{{ arSubItemMenu.url }}\"{% endif %} class=\"footer-nav__link\">{{ arSubItemMenu.title }}</a>
                            </li>
                        {% endfor %}
                    </ul>
                {% endif %}
            </li>
        {% endfor %}
        {% if arPaymentMethodsList is not empty %}
            <li class=\"footer-nav__item\">
                <b class=\"footer-nav__item-title\">Payment Methods</b>
                <ul class=\"footer-nav__subnav footer-nav__subnav_payment\">
                    {% for arPaymentMethodData in arPaymentMethodsList %}
                        {% if arPaymentMethodData.image is not empty %}
                            <li class=\"footer-nav__subitem\">
                                {% set htmlTag = arPaymentMethodData.url is not empty ? 'a' : 'span' %}
                                <{{ htmlTag }} {% if arPaymentMethodData.url is not empty %}href=\"{{ arPaymentMethodData.url }}\"{% endif %} class=\"footer-nav__link footer-nav__link_with-icon\" {% if arPaymentMethodData.url is not empty %}target=\"_blank\" rel=\"noopener\"{% endif %}>
                                    {% set imageExtension =  arPaymentMethodData.image|media|split('.')|last %}
                                    {% if imageExtension != 'svg' %}
                                        <picture class=\"footer-nav__icon-wrap\">
                                            <source data-srcset=\"{{ arPaymentMethodData.image|media|resize(null,144, {'quantity': 80, 'extension': 'webp'}) }}\" type=\"image/webp\">
                                            <source data-srcset=\"{{ arPaymentMethodData.image|media|resize(null,144,{'quantity': 80}) }}\">
                                            <img class=\"footer-nav__icon js-lazy-load\" data-src=\"{{ arPaymentMethodData.image|media }}\" alt=\"{{ arPaymentMethodData.description }}\" title=\"{{ arPaymentMethodData.title }}\">
                                        </picture>
                                    {% else %}
                                        <img class=\"footer-nav__icon js-lazy-load\" data-src=\"{{ arPaymentMethodData.image|media }}\" alt=\"{{ arPaymentMethodData.description }}\" title=\"{{ arPaymentMethodData.title }}\">
                                    {% endif %}
                                </{{ htmlTag }}>
                            </li>
                        {% endif %}
                    {% endfor %}
                </ul>
            </li>
        {% endif %}
    </ul>
</nav>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/footer/footer-nav/footer-nav.htm", "");
    }
}
