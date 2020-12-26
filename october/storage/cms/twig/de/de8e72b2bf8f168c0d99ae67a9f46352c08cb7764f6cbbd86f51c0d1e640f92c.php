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

/* /sr/apache/vivankovich.com/october/themes/vi2/pages/catalog.htm */
class __TwigTemplate_90a49635f696f2be6d7139b3045fe65004cf0921efb14879f3dca46e3782add8 extends \Twig\Template
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
        $tags = array("put" => 1, "set" => 8, "component" => 11, "partial" => 13);
        $filters = array("escape" => 2);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['put', 'set', 'component', 'partial'],
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
        // line 8
        $context["arSEOParams"] = ["category" => ($context["obCategory"] ?? null)];
        // line 9
        echo "
";
        // line 10
        echo $this->env->getExtension('Cms\Twig\Extension')->startBlock('seo_tags'        );
        // line 11
        echo "    ";
        $context['__cms_component_params'] = [];
        $context['__cms_component_params']['model'] = ($context["obCategory"] ?? null)        ;
        $context['__cms_component_params']['params'] = ($context["arSEOParams"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("SeoToolbox"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 10
        echo $this->env->getExtension('Cms\Twig\Extension')->endBlock(true        );
        // line 13
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("product/catalog/catalog"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/pages/catalog.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 13,  97 => 10,  90 => 11,  88 => 10,  85 => 9,  83 => 8,  80 => 7,  78 => 4,  73 => 5,  71 => 4,  69 => 1,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% put page_style %}
    <link rel=\"stylesheet\" href=\"{{ path_page_css }}\">
{% endput %}
{% put page_script %}
    <script src=\"{{ path_page_js }}\"></script>
{% endput %}

{% set arSEOParams = {'category': obCategory} %}

{% put seo_tags %}
    {% component 'SeoToolbox' model=obCategory params=arSEOParams %}
{% endput %}
{% partial 'product/catalog/catalog' %}", "/sr/apache/vivankovich.com/october/themes/vi2/pages/catalog.htm", "");
    }
}
