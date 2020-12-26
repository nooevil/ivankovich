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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/header/drawer-nav/drawer-nav.htm */
class __TwigTemplate_98ef331500d9b116415b049d278697366863e88af1ecd4d9c88fed40b7e1f2cc extends \Twig\Template
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
        $tags = array("set" => 1, "partial" => 8, "if" => 14, "for" => 16);
        $filters = array("escape" => 18);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'partial', 'if', 'for'],
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
        $context["arMenuList"] = twig_get_attribute($this->env, $this->source, ($context["SideMenuLeft"] ?? null), "menuItems", [], "any", false, false, true, 1);
        // line 2
        echo "<button class=\"drawer__btn js-drawer-btn\" aria-label=\"Open sidebar menu\"></button>
<nav class=\"drawer-nav webkit-scroll\" aria-label=\"Sidebar navigation\">
    <button type=\"button\" class=\"drawer-nav__btn js-drawer-btn\" aria-label=\"Open close menu\"></button>
    <div class=\"drawer-nav__wrapper drawer-nav__wrapper_hidden\">
        <div class=\"drawer-nav__inner\" aria-labelledby=\"sidebar-category-nav\">
            <button type=\"button\" class=\"header-nav__title\" id=\"sidebar-category-nav\">Catalog</button>
            ";
        // line 8
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['obCategoryList'] =         // line 9
($context["obCategoryList"] ?? null)        ;
        $context['__cms_partial_params']['wrapperClass'] = "drawer-nav__category"        ;
        $context['__cms_partial_params']['itemClass'] = "drawer-nav__category-item"        ;
        $context['__cms_partial_params']['linkClass'] = "drawer-nav__category-link"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("header/header-nav/header-nav-list"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 13
        echo "        </div>
        ";
        // line 14
        if ( !twig_test_empty(($context["arMenuList"] ?? null))) {
            // line 15
            echo "            <ul class=\"drawer-nav__list\" role=\"menubar\">
                ";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["arMenuList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["arItemMenu"]) {
                if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["arItemMenu"], "viewBag", [], "any", false, false, true, 16), "isHidden", [], "any", false, false, true, 16)) {
                    // line 17
                    echo "                    <li class=\"drawer-nav__item\" role=\"menuitem\">
                        <a ";
                    // line 18
                    if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["arItemMenu"], "url", [], "any", false, false, true, 18))) {
                        echo "href=\"";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arItemMenu"], "url", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
                        echo "\"";
                    }
                    echo " class=\"drawer-nav__link\">";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arItemMenu"], "title", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
                    echo "</a>
                    </li>
                ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['arItemMenu'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "            </ul>
        ";
        }
        // line 23
        echo "        <ul style=\"list-style-type: none; padding: 0;\" class=\"lang-lang-menu\">
            <li style=\"display: inline-block;\">
                <a href=\"https://ru.victoriaivankovich.com\" class=\"header-nav__link \">RU</a>
            </li>
            <li style=\"display: inline-block;margin-left: 20px;\">
                <a href=\"https://en.victoriaivankovich.com\" class=\"header-nav__link \">EN</a>
            </li>
        </ul>
    </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/drawer-nav/drawer-nav.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 23,  113 => 21,  97 => 18,  94 => 17,  89 => 16,  86 => 15,  84 => 14,  81 => 13,  74 => 9,  72 => 8,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set arMenuList = SideMenuLeft.menuItems %}
<button class=\"drawer__btn js-drawer-btn\" aria-label=\"Open sidebar menu\"></button>
<nav class=\"drawer-nav webkit-scroll\" aria-label=\"Sidebar navigation\">
    <button type=\"button\" class=\"drawer-nav__btn js-drawer-btn\" aria-label=\"Open close menu\"></button>
    <div class=\"drawer-nav__wrapper drawer-nav__wrapper_hidden\">
        <div class=\"drawer-nav__inner\" aria-labelledby=\"sidebar-category-nav\">
            <button type=\"button\" class=\"header-nav__title\" id=\"sidebar-category-nav\">Catalog</button>
            {% partial 'header/header-nav/header-nav-list'
                obCategoryList=obCategoryList
                wrapperClass='drawer-nav__category'
                itemClass='drawer-nav__category-item'
                linkClass='drawer-nav__category-link' %}
        </div>
        {% if arMenuList is not empty %}
            <ul class=\"drawer-nav__list\" role=\"menubar\">
                {% for arItemMenu in arMenuList if not arItemMenu.viewBag.isHidden %}
                    <li class=\"drawer-nav__item\" role=\"menuitem\">
                        <a {% if arItemMenu.url is not empty %}href=\"{{ arItemMenu.url }}\"{% endif %} class=\"drawer-nav__link\">{{ arItemMenu.title }}</a>
                    </li>
                {% endfor %}
            </ul>
        {% endif %}
        <ul style=\"list-style-type: none; padding: 0;\" class=\"lang-lang-menu\">
            <li style=\"display: inline-block;\">
                <a href=\"https://ru.victoriaivankovich.com\" class=\"header-nav__link \">RU</a>
            </li>
            <li style=\"display: inline-block;margin-left: 20px;\">
                <a href=\"https://en.victoriaivankovich.com\" class=\"header-nav__link \">EN</a>
            </li>
        </ul>
    </div>
</nav>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/drawer-nav/drawer-nav.htm", "");
    }
}
