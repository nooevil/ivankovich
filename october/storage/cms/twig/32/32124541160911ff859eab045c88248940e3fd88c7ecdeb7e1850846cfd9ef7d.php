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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/common/rating/rating-image.htm */
class __TwigTemplate_60e3d0732884ab7a8f005f22b66637aa4f9f7cd6e93941d02d0147d127cb06b7 extends \Twig\Template
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
        $tags = array("for" => 1, "set" => 2, "if" => 3);
        $filters = array("escape" => 7);
        $functions = array("range" => 1);

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set', 'if'],
                ['escape'],
                ['range']
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, (($context["maxRating"] ?? null) - 1)));
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
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 2
            $context["id"] = ($this->sandbox->ensureToStringAllowed(($context["unique_id"] ?? null), 2, $this->source) . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 2), 2, $this->source));
            // line 3
            echo "    ";
            if ((($context["rating"] ?? null) >= twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 3))) {
                // line 4
                echo "        <svg class=\"rating__image\" aria-hidden=\"true\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"
            xmlns:sketchjs=\"https://sketch.io/dtd/\" width=\"30\" height=\"30\" viewBox=\"0 0 30 30\">
            <defs>
                <linearGradient id=\"";
                // line 7
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 7, $this->source), "html", null, true);
                echo "\" gradientUnits=\"objectBoundingBox\" x1=\"0\" y1=\"0\" x2=\"1\" y2=\"0\">
                    <stop offset=\"1\" style=\"stop-color:#ffb805;\" />
                    <stop offset=\"1\" style=\"stop-color:#dcdcdc;\" />
                </linearGradient>
            </defs>
            <g transform=\"matrix(1.0263157894736834,0,0,1,-1,-0.9999999999999986)\">
                <path d=\"M20.388,10.918L32,12.118l-8.735,7.749L25.914,
                        31.4l-9.893-6.088L6.127,31.4l2.695-11.533L0,
                        12.118l11.547-1.2L16.026,0.6L20.388,10.918z\"
                    style=\"fill: url(#";
                // line 16
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 16, $this->source), "html", null, true);
                echo "); stroke: #c09834; stroke-width: 1;\" />
            </g>
        </svg>
    ";
            } elseif (((twig_get_attribute($this->env, $this->source,             // line 19
$context["loop"], "index", [], "any", false, false, true, 19) - ($context["rating"] ?? null)) < 1)) {
                // line 20
                echo "        ";
                $context["index"] = (1 - (twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 20) - ($context["rating"] ?? null)));
                // line 21
                echo "        <svg class=\"rating__image ";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["index"] ?? null), 21, $this->source), "html", null, true);
                echo "\" aria-hidden=\"true\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"
            xmlns:sketchjs=\"https://sketch.io/dtd/\" width=\"30\" height=\"30\" viewBox=\"0 0 30 30\">
            <defs>
                <linearGradient id=\"";
                // line 24
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 24, $this->source), "html", null, true);
                echo "\" gradientUnits=\"objectBoundingBox\" x1=\"0\" y1=\"0\" x2=\"1\" y2=\"0\">
                    <stop offset=\"";
                // line 25
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["index"] ?? null), 25, $this->source), "html", null, true);
                echo "\" style=\"stop-color:#ffb805;\" />
                    <stop offset=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["index"] ?? null), 26, $this->source), "html", null, true);
                echo "\" style=\"stop-color:#dcdcdc;\" />
                </linearGradient>
            </defs>
            <g transform=\"matrix(1.0263157894736834,0,0,1,-1,-0.9999999999999986)\">
                <path d=\"M20.388,10.918L32,12.118l-8.735,7.749L25.914,
                        31.4l-9.893-6.088L6.127,31.4l2.695-11.533L0,
                        12.118l11.547-1.2L16.026,0.6L20.388,10.918z\"
                    style=\"fill: url(#";
                // line 33
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 33, $this->source), "html", null, true);
                echo "); stroke: #c09834; stroke-width: 1;\" />
            </g>
        </svg>
    ";
            } else {
                // line 37
                echo "        <svg class=\"rating__image\" aria-hidden=\"true\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"
            xmlns:sketchjs=\"https://sketch.io/dtd/\" width=\"30\" height=\"30\" viewBox=\"0 0 30 30\">
            <defs>
                <linearGradient id=\"";
                // line 40
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 40, $this->source), "html", null, true);
                echo "\" gradientUnits=\"objectBoundingBox\" x1=\"0\" y1=\"0\" x2=\"1\" y2=\"0\">
                    <stop offset=\"0\" style=\"stop-color:#ffb805;\" />
                    <stop offset=\"0\" style=\"stop-color:#dcdcdc;\" />
                </linearGradient>
            </defs>
            <g transform=\"matrix(1.0263157894736834,0,0,1,-1,-0.9999999999999986)\">
                <path d=\"M20.388,10.918L32,12.118l-8.735,7.749L25.914,
                            31.4l-9.893-6.088L6.127,31.4l2.695-11.533L0,
                            12.118l11.547-1.2L16.026,0.6L20.388,10.918z\"
                    style=\"fill: url(#";
                // line 49
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 49, $this->source), "html", null, true);
                echo "); stroke: #c09834; stroke-width: 1;\" />
            </g>
        </svg>
    ";
            }
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/common/rating/rating-image.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 49,  149 => 40,  144 => 37,  137 => 33,  127 => 26,  123 => 25,  119 => 24,  112 => 21,  109 => 20,  107 => 19,  101 => 16,  89 => 7,  84 => 4,  81 => 3,  79 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% for i in 0..maxRating-1 %}
{% set id = unique_id~loop.index %}
    {% if rating >= loop.index %}
        <svg class=\"rating__image\" aria-hidden=\"true\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"
            xmlns:sketchjs=\"https://sketch.io/dtd/\" width=\"30\" height=\"30\" viewBox=\"0 0 30 30\">
            <defs>
                <linearGradient id=\"{{ id }}\" gradientUnits=\"objectBoundingBox\" x1=\"0\" y1=\"0\" x2=\"1\" y2=\"0\">
                    <stop offset=\"1\" style=\"stop-color:#ffb805;\" />
                    <stop offset=\"1\" style=\"stop-color:#dcdcdc;\" />
                </linearGradient>
            </defs>
            <g transform=\"matrix(1.0263157894736834,0,0,1,-1,-0.9999999999999986)\">
                <path d=\"M20.388,10.918L32,12.118l-8.735,7.749L25.914,
                        31.4l-9.893-6.088L6.127,31.4l2.695-11.533L0,
                        12.118l11.547-1.2L16.026,0.6L20.388,10.918z\"
                    style=\"fill: url(#{{ id }}); stroke: #c09834; stroke-width: 1;\" />
            </g>
        </svg>
    {% elseif loop.index - rating < 1 %}
        {% set index = 1 - (loop.index - rating) %}
        <svg class=\"rating__image {{ index }}\" aria-hidden=\"true\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"
            xmlns:sketchjs=\"https://sketch.io/dtd/\" width=\"30\" height=\"30\" viewBox=\"0 0 30 30\">
            <defs>
                <linearGradient id=\"{{ id }}\" gradientUnits=\"objectBoundingBox\" x1=\"0\" y1=\"0\" x2=\"1\" y2=\"0\">
                    <stop offset=\"{{ index }}\" style=\"stop-color:#ffb805;\" />
                    <stop offset=\"{{ index }}\" style=\"stop-color:#dcdcdc;\" />
                </linearGradient>
            </defs>
            <g transform=\"matrix(1.0263157894736834,0,0,1,-1,-0.9999999999999986)\">
                <path d=\"M20.388,10.918L32,12.118l-8.735,7.749L25.914,
                        31.4l-9.893-6.088L6.127,31.4l2.695-11.533L0,
                        12.118l11.547-1.2L16.026,0.6L20.388,10.918z\"
                    style=\"fill: url(#{{ id }}); stroke: #c09834; stroke-width: 1;\" />
            </g>
        </svg>
    {% else %}
        <svg class=\"rating__image\" aria-hidden=\"true\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"
            xmlns:sketchjs=\"https://sketch.io/dtd/\" width=\"30\" height=\"30\" viewBox=\"0 0 30 30\">
            <defs>
                <linearGradient id=\"{{ id }}\" gradientUnits=\"objectBoundingBox\" x1=\"0\" y1=\"0\" x2=\"1\" y2=\"0\">
                    <stop offset=\"0\" style=\"stop-color:#ffb805;\" />
                    <stop offset=\"0\" style=\"stop-color:#dcdcdc;\" />
                </linearGradient>
            </defs>
            <g transform=\"matrix(1.0263157894736834,0,0,1,-1,-0.9999999999999986)\">
                <path d=\"M20.388,10.918L32,12.118l-8.735,7.749L25.914,
                            31.4l-9.893-6.088L6.127,31.4l2.695-11.533L0,
                            12.118l11.547-1.2L16.026,0.6L20.388,10.918z\"
                    style=\"fill: url(#{{ id }}); stroke: #c09834; stroke-width: 1;\" />
            </g>
        </svg>
    {% endif %}
{% endfor %}", "/sr/apache/vivankovich.com/october/themes/vi2/partials/common/rating/rating-image.htm", "");
    }
}
