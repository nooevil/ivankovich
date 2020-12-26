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

/* /sr/apache/vivankovich.com/october/themes/vi2/pages/index.htm */
class __TwigTemplate_7a015507aef2159c6100a4919cdea03f83086c61cdff56ca99947dd27e9618b4 extends \Twig\Template
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
        $tags = array("put" => 1, "partial" => 9);
        $filters = array("escape" => 2);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['put', 'partial'],
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
        echo $this->env->getExtension('Cms\Twig\Extension')->startBlock('page_style'        );
        // line 2
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["path_page_css"] ?? null), 2, $this->source), "html", null, true);
        echo "\">
";
        // line 1
        echo $this->env->getExtension('Cms\Twig\Extension')->endBlock(true        );
        // line 4
        echo $this->env->getExtension('Cms\Twig\Extension')->startBlock('page_script'        );
        // line 5
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["path_page_js"] ?? null), 5, $this->source), "html", null, true);
        echo "\"></script>
";
        // line 4
        echo $this->env->getExtension('Cms\Twig\Extension')->endBlock(true        );
        // line 7
        echo "

";
        // line 9
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/main-slider/main-slider"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 10
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/two-level-slider/two-level-slider"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 11
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("content/big-slider/big-slider"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 12
        echo "
";
        // line 13
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("article/news-slider/news-slider"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 14
        echo "
";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/pages/index.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 14,  99 => 13,  96 => 12,  92 => 11,  88 => 10,  84 => 9,  80 => 7,  78 => 4,  73 => 5,  71 => 4,  69 => 1,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% put page_style %}
    <link rel=\"stylesheet\" href=\"{{ path_page_css }}\">
{% endput %}
{% put page_script %}
    <script src=\"{{ path_page_js }}\"></script>
{% endput %}


{% partial 'content/main-slider/main-slider' %}
{% partial 'product/two-level-slider/two-level-slider' %}
{% partial 'content/big-slider/big-slider' %}

{% partial 'article/news-slider/news-slider' %}

{#
{% partial 'content/brand-slider/brand-slider' %}
{% partial 'form/subscribe/subscribe' %}
#}", "/sr/apache/vivankovich.com/october/themes/vi2/pages/index.htm", "");
    }
}
