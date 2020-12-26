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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/header/menu.htm */
class __TwigTemplate_4b9b0488f9cc430d17c89ebce118ad49a0cc2b37db4ed829d1a5697ae43bee03 extends \Twig\Template
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
        $tags = array("set" => 2, "if" => 9, "for" => 11);
        $filters = array("escape" => 6);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
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
        // line 2
        $context["wrapperClass"] = "header-nav_desktop";
        // line 3
        $context["itemClass"] = "header-nav__item_desktop";
        // line 4
        $context["classid_counter"] = 1;
        // line 5
        echo "
<nav class=\"header-nav ";
        // line 6
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 6, $this->source), "html", null, true);
        echo "\" aria-labelledby=\"header-catalog-nav\">
    <b class=\"header-nav__title header-nav__title_sr-only\" id=\"header-catalog-nav\">Category</b>
        
    ";
        // line 9
        if (twig_get_attribute($this->env, $this->source, ($context["obCategoryList"] ?? null), "isNotEmpty", [], "method", false, false, true, 9)) {
            // line 10
            echo "        <ul class=\"header-nav__list ";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 10, $this->source), "html", null, true);
            echo " menu\" role=\"menubar\">
            ";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["obCategoryList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["obCategory"]) {
                if ((twig_get_attribute($this->env, $this->source, $context["obCategory"], "product_count", [], "any", false, false, true, 11) > 0)) {
                    echo " 
    \t\t";
                    // line 12
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["obCategory"], "children", [], "any", false, false, true, 12), "isNotEmpty", [], "method", false, false, true, 12)) {
                        echo "    \t\t\t\t
    \t\t\t<li class=\"header-nav__item ";
                        // line 13
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["itemClass"] ?? null), 13, $this->source), "html", null, true);
                        echo " drop-down\" role=\"menuitem\">
    \t\t\t    ";
                        // line 14
                        $context["classid"] = ("check0" . $this->sandbox->ensureToStringAllowed(($context["classid_counter"] ?? null), 14, $this->source));
                        // line 15
                        echo "    \t\t\t    ";
                        $context["classid_counter"] = (($context["classid_counter"] ?? null) + 1);
                        // line 16
                        echo "\t                <input id=\"";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["classid"] ?? null), 16, $this->source), "html", null, true);
                        echo "\" type=\"checkbox\" name=\"menu\"/>
\t                <label class=\"header-nav__link\" for=\"";
                        // line 17
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["classid"] ?? null), 17, $this->source), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obCategory"], "name", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
                        echo "</label>    \t\t\t    
    \t\t\t    <ul>                
                        ";
                        // line 19
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["obCategory"], "children", [], "any", false, false, true, 19));
                        foreach ($context['_seq'] as $context["_key"] => $context["obChildCategory"]) {
                            // line 20
                            echo "                            
    \t\t\t\t\t    <li><a href=\"";
                            // line 21
                            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obChildCategory"], "getPageUrl", [0 => "catalog"], "method", false, false, true, 21), 21, $this->source), "html", null, true);
                            echo "\" class=\"header-nav__link ";
                            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["linkClass"] ?? null), 21, $this->source), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obChildCategory"], "name", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
                            echo "</a></li>
                        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obChildCategory'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 23
                        echo "                    </ul>
                </li>
    \t\t";
                    } else {
                        // line 25
                        echo "\t\t\t\t\t
    \t\t\t<li class=\"header-nav__item ";
                        // line 26
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["itemClass"] ?? null), 26, $this->source), "html", null, true);
                        echo "\" role=\"menuitem\">
    \t\t\t    <a href=\"";
                        // line 27
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obCategory"], "getPageUrl", [0 => "catalog"], "method", false, false, true, 27), 27, $this->source), "html", null, true);
                        echo "\" class=\"header-nav__link ";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["linkClass"] ?? null), 27, $this->source), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obCategory"], "name", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                        echo "</a>
    \t\t\t</li>
    \t\t";
                    }
                    // line 29
                    echo "\t\t\t
            ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obCategory'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "        </ul>
    ";
        }
        // line 33
        echo "</nav>

<script>
function isDescendant(parent, child) {
     var node = child.parentNode;
     while (node != null) {
         if (node == parent) {
             return true;
         }
         node = node.parentNode;
     }
     return false;
}

(function(){
\tvar drop_menus = document.querySelectorAll('.drop-down');

\tdocument.addEventListener(\"click\", function(e) {\t  \t  
\t  for (i = 0; i < drop_menus.length; ++i) {
\t\tvar menu = drop_menus[i];
\t\tvar checkbox = menu.querySelector('input');
\t\t  
\t\tif (checkbox.checked==true)
\t      if (menu != e.target && !isDescendant(menu, e.target)) {
\t\t    checkbox.checked = false;
\t      }
\t  }\t\t
\t}, false);
}());
</script>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/menu.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 33,  165 => 31,  157 => 29,  147 => 27,  143 => 26,  140 => 25,  135 => 23,  123 => 21,  120 => 20,  116 => 19,  109 => 17,  104 => 16,  101 => 15,  99 => 14,  95 => 13,  91 => 12,  84 => 11,  79 => 10,  77 => 9,  71 => 6,  68 => 5,  66 => 4,  64 => 3,  62 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# {% set obCategoryList = CategoryList.make().tree().active() %}   #}
{% set wrapperClass='header-nav_desktop' %}
{% set itemClass='header-nav__item_desktop' %}
{% set classid_counter = 1 %}

<nav class=\"header-nav {{ wrapperClass }}\" aria-labelledby=\"header-catalog-nav\">
    <b class=\"header-nav__title header-nav__title_sr-only\" id=\"header-catalog-nav\">Category</b>
        
    {% if obCategoryList.isNotEmpty() %}
        <ul class=\"header-nav__list {{ wrapperClass }} menu\" role=\"menubar\">
            {% for obCategory in obCategoryList if obCategory.product_count > 0 %} 
    \t\t{% if obCategory.children.isNotEmpty() %}    \t\t\t\t
    \t\t\t<li class=\"header-nav__item {{ itemClass }} drop-down\" role=\"menuitem\">
    \t\t\t    {%set classid = 'check0'~classid_counter %}
    \t\t\t    {%set classid_counter = classid_counter+1 %}
\t                <input id=\"{{ classid }}\" type=\"checkbox\" name=\"menu\"/>
\t                <label class=\"header-nav__link\" for=\"{{ classid }}\">{{ obCategory.name }}</label>    \t\t\t    
    \t\t\t    <ul>                
                        {% for obChildCategory in obCategory.children %}
                            
    \t\t\t\t\t    <li><a href=\"{{ obChildCategory.getPageUrl('catalog') }}\" class=\"header-nav__link {{ linkClass }}\">{{ obChildCategory.name }}</a></li>
                        {% endfor %}
                    </ul>
                </li>
    \t\t{% else %}\t\t\t\t\t
    \t\t\t<li class=\"header-nav__item {{ itemClass }}\" role=\"menuitem\">
    \t\t\t    <a href=\"{{ obCategory.getPageUrl('catalog') }}\" class=\"header-nav__link {{ linkClass }}\">{{ obCategory.name }}</a>
    \t\t\t</li>
    \t\t{% endif %}\t\t\t
            {% endfor %}
        </ul>
    {% endif %}
</nav>

<script>
function isDescendant(parent, child) {
     var node = child.parentNode;
     while (node != null) {
         if (node == parent) {
             return true;
         }
         node = node.parentNode;
     }
     return false;
}

(function(){
\tvar drop_menus = document.querySelectorAll('.drop-down');

\tdocument.addEventListener(\"click\", function(e) {\t  \t  
\t  for (i = 0; i < drop_menus.length; ++i) {
\t\tvar menu = drop_menus[i];
\t\tvar checkbox = menu.querySelector('input');
\t\t  
\t\tif (checkbox.checked==true)
\t      if (menu != e.target && !isDescendant(menu, e.target)) {
\t\t    checkbox.checked = false;
\t      }
\t  }\t\t
\t}, false);
}());
</script>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/menu.htm", "");
    }
}
