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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/header/header-nav/header-nav-list.htm */
class __TwigTemplate_b792876ec4f77ef230c2f31e9aea39dd32380e10960de12d366bac4bd486557f extends \Twig\Template
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
        $tags = array("if" => 1, "for" => 3);
        $filters = array("escape" => 2);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
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
        if (twig_get_attribute($this->env, $this->source, ($context["obCategoryList"] ?? null), "isNotEmpty", [], "method", false, false, true, 1)) {
            // line 2
            echo "    <ul class=\"header-nav__list ";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 2, $this->source), "html", null, true);
            echo "\" role=\"menubar\">
        ";
            // line 3
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["obCategoryList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["obCategory"]) {
                if ((twig_get_attribute($this->env, $this->source, $context["obCategory"], "product_count", [], "any", false, false, true, 3) > 0)) {
                    // line 4
                    echo "            <li class=\"header-nav__item ";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["itemClass"] ?? null), 4, $this->source), "html", null, true);
                    echo "\" role=\"menuitem\">
                
\t\t\t\t<a href=\"";
                    // line 6
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obCategory"], "getPageUrl", [0 => "catalog"], "method", false, false, true, 6), 6, $this->source), "html", null, true);
                    echo "\" class=\"header-nav__link ";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["linkClass"] ?? null), 6, $this->source), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obCategory"], "name", [], "any", false, false, true, 6), 6, $this->source), "html", null, true);
                    echo "</a>
\t\t\t\t
\t\t\t\t";
                    // line 8
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["obCategory"], "children", [], "any", false, false, true, 8), "isNotEmpty", [], "method", false, false, true, 8)) {
                        // line 9
                        echo "\t\t\t\t\t
\t\t\t\t\t<ul class=\"\">                
                    ";
                        // line 11
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["obCategory"], "children", [], "any", false, false, true, 11));
                        foreach ($context['_seq'] as $context["_key"] => $context["obChildCategory"]) {
                            // line 12
                            echo "\t\t\t\t\t\t<li><a href=\"";
                            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obChildCategory"], "getPageUrl", [0 => "catalog"], "method", false, false, true, 12), 12, $this->source), "html", null, true);
                            echo "\" class=\"header-nav__link ";
                            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["linkClass"] ?? null), 12, $this->source), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["obChildCategory"], "name", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
                            echo "</a></li>
                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obChildCategory'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 14
                        echo "                    </ul>
\t\t\t\t";
                    } else {
                        // line 15
                        echo "\t\t\t\t\t
\t\t\t\t";
                    }
                    // line 16
                    echo "\t\t\t
            </li>\t
        ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obCategory'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "    </ul>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/header-nav/header-nav-list.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 19,  120 => 16,  116 => 15,  112 => 14,  99 => 12,  95 => 11,  91 => 9,  89 => 8,  80 => 6,  74 => 4,  69 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if obCategoryList.isNotEmpty() %}
    <ul class=\"header-nav__list {{ wrapperClass }}\" role=\"menubar\">
        {% for obCategory in obCategoryList if obCategory.product_count > 0 %}
            <li class=\"header-nav__item {{ itemClass }}\" role=\"menuitem\">
                
\t\t\t\t<a href=\"{{ obCategory.getPageUrl('catalog') }}\" class=\"header-nav__link {{ linkClass }}\">{{ obCategory.name }}</a>
\t\t\t\t
\t\t\t\t{% if obCategory.children.isNotEmpty() %}
\t\t\t\t\t
\t\t\t\t\t<ul class=\"\">                
                    {% for obChildCategory in obCategory.children %}
\t\t\t\t\t\t<li><a href=\"{{ obChildCategory.getPageUrl('catalog') }}\" class=\"header-nav__link {{ linkClass }}\">{{ obChildCategory.name }}</a></li>
                    {% endfor %}
                    </ul>
\t\t\t\t{% else %}\t\t\t\t\t
\t\t\t\t{% endif %}\t\t\t
            </li>\t
        {% endfor %}
    </ul>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/header-nav/header-nav-list.htm", "");
    }
}
