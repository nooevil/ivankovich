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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/common/breadcrumbs/breadcrumbs.htm */
class __TwigTemplate_79ea1f43834d9b8a12c9ea3f266533b5bb2d88ff93c540133c362096c655681c extends \Twig\Template
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
        $tags = array("for" => 9, "if" => 10);
        $filters = array("escape" => 1, "page" => 5);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for', 'if'],
                ['escape', 'page'],
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
        echo "<nav class=\"breadcrumbs ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 1, $this->source), "html", null, true);
        echo "\" role=\"navigation\">
    <ul class=\"breadcrumbs__list\" aria-label=\"breadcrumbs\" itemscope itemtype=\"http://schema.org/BreadcrumbList\">
        <li class=\"breadcrumbs__item\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\">
            <span itemprop=\"name\">
                <a class=\"breadcrumbs__link\" href=\"";
        // line 5
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("index");
        echo "\" itemtype=\"http://schema.org/Thing\" itemprop=\"item\">Home</a>
            </span>
            <meta itemprop=\"position\" content=\"1\" />
        </li>
        ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["arBreadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["arItem"]) {
            // line 10
            echo "            ";
            if (twig_test_empty(twig_get_attribute($this->env, $this->source, $context["arItem"], "active", [], "any", false, false, true, 10))) {
                // line 11
                echo "            <li class=\"breadcrumbs__item\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\">
                <span itemprop=\"name\">
                    <a class=\"breadcrumbs__link\" href=\"";
                // line 13
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arItem"], "slug", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
                echo "\" itemtype=\"http://schema.org/Thing\" itemprop=\"item\">";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arItem"], "name", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
                echo "</a>
                </span>
                <meta itemprop=\"position\" content=\"2\" />
            </li>
            ";
            } else {
                // line 18
                echo "                <li class=\"breadcrumbs__item breadcrumbs__item_current\">
                    <span class=\"breadcrumbs__link breadcrumbs__link_current\" aria-current=\"page\">";
                // line 19
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arItem"], "name", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
                echo "</span>
                </li>
            ";
            }
            // line 22
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['arItem'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "    </ul>
</nav>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/common/breadcrumbs/breadcrumbs.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 23,  107 => 22,  101 => 19,  98 => 18,  88 => 13,  84 => 11,  81 => 10,  77 => 9,  70 => 5,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\"breadcrumbs {{ wrapperClass }}\" role=\"navigation\">
    <ul class=\"breadcrumbs__list\" aria-label=\"breadcrumbs\" itemscope itemtype=\"http://schema.org/BreadcrumbList\">
        <li class=\"breadcrumbs__item\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\">
            <span itemprop=\"name\">
                <a class=\"breadcrumbs__link\" href=\"{{ 'index'|page }}\" itemtype=\"http://schema.org/Thing\" itemprop=\"item\">Home</a>
            </span>
            <meta itemprop=\"position\" content=\"1\" />
        </li>
        {% for arItem in arBreadcrumbs %}
            {% if arItem.active is empty %}
            <li class=\"breadcrumbs__item\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\">
                <span itemprop=\"name\">
                    <a class=\"breadcrumbs__link\" href=\"{{ arItem.slug }}\" itemtype=\"http://schema.org/Thing\" itemprop=\"item\">{{ arItem.name }}</a>
                </span>
                <meta itemprop=\"position\" content=\"2\" />
            </li>
            {% else %}
                <li class=\"breadcrumbs__item breadcrumbs__item_current\">
                    <span class=\"breadcrumbs__link breadcrumbs__link_current\" aria-current=\"page\">{{ arItem.name }}</span>
                </li>
            {% endif %}
        {% endfor %}
    </ul>
</nav>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/common/breadcrumbs/breadcrumbs.htm", "");
    }
}
