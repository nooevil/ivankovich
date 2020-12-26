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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/common/pagination/pagination.htm */
class __TwigTemplate_946c59e305f7130c1212e0e028a2c63b6ec92f790236f57d1f250142b7968fc7 extends \Twig\Template
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
        $tags = array("if" => 1, "for" => 30);
        $filters = array("escape" => 2);
        $functions = array("url_current" => 4);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape'],
                ['url_current']
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
        if (( !twig_test_empty(($context["arPaginationList"] ?? null)) && (($context["iMaxPage"] ?? null) > 1))) {
            // line 2
            echo "    <nav class=\"pagination ";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapperClass"] ?? null), 2, $this->source), "html", null, true);
            echo "\" role=\"navigation\" aria-label=\"Pagination\">
        ";
            // line 3
            if ((($context["iPage"] ?? null) != 1)) {
                // line 4
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, ((call_user_func_array($this->env->getFunction('url_current')->getCallable(), ["current"]) . "?page=") . (($context["iPage"] ?? null) - 1)), "html", null, true);
                echo "\" class=\"pagination__btn pagination__btn_prev ";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["linkClass"] ?? null), 4, $this->source), "html", null, true);
                echo "\" data-page=\"";
                echo twig_escape_filter($this->env, (($context["iPage"] ?? null) - 1), "html", null, true);
                echo "\" aria-label=\"Go to previous page\">
                <svg class=\"pagination__icon\" xmlns=\"http://www.w3.org/2000/svg\"
                     xmlns:xlink=\"http://www.w3.org/1999/xlink\"
                     width=\"24\" height=\"10\" viewBox=\"0 0 24 10\" aria-hidden=\"true\" fill=\"#000000\">
                    <defs>
                        <path id=\"r2ufa\" d=\"M1193.34 457.4v-1.31h20.88v1.31z\"/>
                        <path id=\"r2ufb\" d=\"M1211.85 452.004l4.337 4.637-.867.927-4.337-4.636z\"/>
                        <path id=\"r2ufc\" d=\"M1215.218 456.103l-4.082 4.91.816.981 4.082-4.91z\"/>
                    </defs>
                    <g>
                        <g transform=\"translate(-1193 -452)\">
                            <g>
                                <use xlink:href=\"#r2ufa\"/>
                            </g>
                            <g>
                                <use xlink:href=\"#r2ufb\"/>
                            </g>
                            <g>
                                <use xlink:href=\"#r2ufc\"/>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
        ";
            }
            // line 29
            echo "        <ul class=\"pagination__list\">
            ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["arPaginationList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["arPagination"]) {
                // line 31
                echo "                <li class=\"pagination__item\">
                    <a class=\"pagination__link ";
                // line 32
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arPagination"], "class", [], "any", false, false, true, 32), 32, $this->source), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["linkClass"] ?? null), 32, $this->source), "html", null, true);
                echo "\" data-page=\"";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arPagination"], "value", [], "any", false, false, true, 32), 32, $this->source), "html", null, true);
                echo "\"
                       ";
                // line 33
                if ((twig_get_attribute($this->env, $this->source, $context["arPagination"], "value", [], "any", false, false, true, 33) != ($context["iPage"] ?? null))) {
                    echo "href=\"";
                    echo twig_escape_filter($this->env, ((call_user_func_array($this->env->getFunction('url_current')->getCallable(), ["current"]) . "?page=") . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arPagination"], "value", [], "any", false, false, true, 33), 33, $this->source)), "html", null, true);
                    echo "\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["arPagination"], "name", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
                echo "</a>
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['arPagination'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "        </ul>
        ";
            // line 37
            if ((($context["iMaxPage"] ?? null) > ($context["iPage"] ?? null))) {
                // line 38
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, ((call_user_func_array($this->env->getFunction('url_current')->getCallable(), ["current"]) . "?page=") . (($context["iPage"] ?? null) + 1)), "html", null, true);
                echo "\" class=\"pagination__btn pagination__btn_next ";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["linkClass"] ?? null), 38, $this->source), "html", null, true);
                echo "\" data-page=\"";
                echo twig_escape_filter($this->env, (($context["iPage"] ?? null) + 1), "html", null, true);
                echo "\" aria-label=\"Go to next page\">
                <svg class=\"pagination__icon\" xmlns=\"http://www.w3.org/2000/svg\"
                     xmlns:xlink=\"http://www.w3.org/1999/xlink\"
                     width=\"24\" height=\"10\" viewBox=\"0 0 24 10\" aria-hidden=\"true\" fill=\"#000000\">
                    <defs>
                        <path id=\"r2ufa\" d=\"M1193.34 457.4v-1.31h20.88v1.31z\"/>
                        <path id=\"r2ufb\" d=\"M1211.85 452.004l4.337 4.637-.867.927-4.337-4.636z\"/>
                        <path id=\"r2ufc\" d=\"M1215.218 456.103l-4.082 4.91.816.981 4.082-4.91z\"/>
                    </defs>
                    <g>
                        <g transform=\"translate(-1193 -452)\">
                            <g>
                                <use xlink:href=\"#r2ufa\"/>
                            </g>
                            <g>
                                <use xlink:href=\"#r2ufb\"/>
                            </g>
                            <g>
                                <use xlink:href=\"#r2ufc\"/>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
        ";
            }
            // line 63
            echo "    </nav>
";
        }
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/common/pagination/pagination.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 63,  142 => 38,  140 => 37,  137 => 36,  122 => 33,  114 => 32,  111 => 31,  107 => 30,  104 => 29,  71 => 4,  69 => 3,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if arPaginationList is not empty and iMaxPage > 1 %}
    <nav class=\"pagination {{ wrapperClass }}\" role=\"navigation\" aria-label=\"Pagination\">
        {% if iPage != 1 %}
            <a href=\"{{ url_current() ~ '?page=' ~ (iPage - 1) }}\" class=\"pagination__btn pagination__btn_prev {{ linkClass }}\" data-page=\"{{ iPage - 1 }}\" aria-label=\"Go to previous page\">
                <svg class=\"pagination__icon\" xmlns=\"http://www.w3.org/2000/svg\"
                     xmlns:xlink=\"http://www.w3.org/1999/xlink\"
                     width=\"24\" height=\"10\" viewBox=\"0 0 24 10\" aria-hidden=\"true\" fill=\"#000000\">
                    <defs>
                        <path id=\"r2ufa\" d=\"M1193.34 457.4v-1.31h20.88v1.31z\"/>
                        <path id=\"r2ufb\" d=\"M1211.85 452.004l4.337 4.637-.867.927-4.337-4.636z\"/>
                        <path id=\"r2ufc\" d=\"M1215.218 456.103l-4.082 4.91.816.981 4.082-4.91z\"/>
                    </defs>
                    <g>
                        <g transform=\"translate(-1193 -452)\">
                            <g>
                                <use xlink:href=\"#r2ufa\"/>
                            </g>
                            <g>
                                <use xlink:href=\"#r2ufb\"/>
                            </g>
                            <g>
                                <use xlink:href=\"#r2ufc\"/>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
        {% endif %}
        <ul class=\"pagination__list\">
            {% for arPagination in arPaginationList %}
                <li class=\"pagination__item\">
                    <a class=\"pagination__link {{ arPagination.class }} {{ linkClass }}\" data-page=\"{{ arPagination.value }}\"
                       {% if arPagination.value != iPage %}href=\"{{ url_current() ~ '?page=' ~ arPagination.value }}\"{% endif %}>{{ arPagination.name }}</a>
                </li>
            {% endfor %}
        </ul>
        {% if iMaxPage > iPage %}
            <a href=\"{{ url_current() ~ '?page=' ~ (iPage + 1) }}\" class=\"pagination__btn pagination__btn_next {{ linkClass }}\" data-page=\"{{ iPage + 1 }}\" aria-label=\"Go to next page\">
                <svg class=\"pagination__icon\" xmlns=\"http://www.w3.org/2000/svg\"
                     xmlns:xlink=\"http://www.w3.org/1999/xlink\"
                     width=\"24\" height=\"10\" viewBox=\"0 0 24 10\" aria-hidden=\"true\" fill=\"#000000\">
                    <defs>
                        <path id=\"r2ufa\" d=\"M1193.34 457.4v-1.31h20.88v1.31z\"/>
                        <path id=\"r2ufb\" d=\"M1211.85 452.004l4.337 4.637-.867.927-4.337-4.636z\"/>
                        <path id=\"r2ufc\" d=\"M1215.218 456.103l-4.082 4.91.816.981 4.082-4.91z\"/>
                    </defs>
                    <g>
                        <g transform=\"translate(-1193 -452)\">
                            <g>
                                <use xlink:href=\"#r2ufa\"/>
                            </g>
                            <g>
                                <use xlink:href=\"#r2ufb\"/>
                            </g>
                            <g>
                                <use xlink:href=\"#r2ufc\"/>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
        {% endif %}
    </nav>
{% endif %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/common/pagination/pagination.htm", "");
    }
}
