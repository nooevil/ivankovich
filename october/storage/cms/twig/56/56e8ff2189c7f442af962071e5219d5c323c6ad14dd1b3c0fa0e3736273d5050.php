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

/* /sr/apache/vivankovich.com/october/themes/vi2/layouts/main.htm */
class __TwigTemplate_0ede75810b96aae4847f19d561c4e41a4ef0b88b4f727a91a2bf6c41e15d4a22 extends \Twig\Template
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
        $tags = array("spaceless" => 1, "placeholder" => 6, "component" => 7, "if" => 10, "partial" => 29, "page" => 31);
        $filters = array("raw" => 5, "media" => 11, "escape" => 20);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['spaceless', 'placeholder', 'component', 'if', 'partial', 'page'],
                ['raw', 'media', 'escape'],
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
        ob_start();
        // line 2
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    ";
        // line 5
        echo $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getHeadBegin", [], "method", false, false, true, 5), 5, $this->source);
        echo "
    ";
        // line 6
        $context['__placeholder_seo_tags_default_contents'] = null;        ob_start();        // line 7
        echo "        ";
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("SeoToolbox"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 8
        echo "    ";
        $context['__placeholder_seo_tags_default_contents'] = ob_get_clean();        // line 6
        echo $this->env->getExtension('Cms\Twig\Extension')->displayBlock('seo_tags', $context['__placeholder_seo_tags_default_contents']);
        unset($context['__placeholder_seo_tags_default_contents']);        // line 9
        echo "    <meta charset=\"utf-8\">
    ";
        // line 10
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 10), "favicon_32", [], "any", false, false, true, 10))) {
            // line 11
            echo "        <link rel=\"icon\" type=\"image/png\" href=\"";
            echo $this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 11), "favicon_32", [], "any", false, false, true, 11), 11, $this->source));
            echo "\" sizes=\"32x32\">
    ";
        }
        // line 13
        echo "    ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 13), "favicon_64", [], "any", false, false, true, 13))) {
            // line 14
            echo "        <link rel=\"icon\" type=\"image/png\" href=\"";
            echo $this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 14), "favicon_64", [], "any", false, false, true, 14), 14, $this->source));
            echo "\" sizes=\"64x64\">
    ";
        }
        // line 16
        echo "    ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 16), "favicon_180", [], "any", false, false, true, 16))) {
            // line 17
            echo "        <link rel=\"apple-touch-icon\" type=\"image/png\" href=\"";
            echo $this->extensions['System\Twig\Extension']->mediaFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, true, 17), "favicon_180", [], "any", false, false, true, 17), 17, $this->source));
            echo "\" sizes=\"64x64\">
    ";
        }
        // line 19
        echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["path_css"] ?? null), 20, $this->source), "html", null, true);
        echo "\">
    <link href=\"https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/themes/vi2/assets/css/debug.css\">
    ";
        // line 23
        $context['__placeholder_page_style_default_contents'] = null;        echo $this->env->getExtension('Cms\Twig\Extension')->displayBlock('page_style', $context['__placeholder_page_style_default_contents']);
        unset($context['__placeholder_page_style_default_contents']);        // line 24
        echo "    ";
        echo $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getHeadEnd", [], "method", false, false, true, 24), 24, $this->source);
        echo "
</head>
<body itemscope itemtype=\"http://schema.org/WebPage\" data-page-id=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, true, 26), "id", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
        echo "\">
    ";
        // line 27
        echo $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getBodyBegin", [], "method", false, false, true, 27), 27, $this->source);
        echo "
    <div class=\"wrapper grid\">
        ";
        // line 29
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("header/header"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 30
        echo "        <main class=\"main subgrid full-width\">
            ";
        // line 31
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFunction();
        // line 32
        echo "        </main>
        ";
        // line 33
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("footer/footer"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 34
        echo "    </div>
    <script src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["path_manifest_js"] ?? null), 35, $this->source), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["path_vendor_js"] ?? null), 36, $this->source), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["path_app_js"] ?? null), 37, $this->source), "html", null, true);
        echo "\"></script>
    ";
        // line 38
        $context['__placeholder_page_script_default_contents'] = null;        echo $this->env->getExtension('Cms\Twig\Extension')->displayBlock('page_script', $context['__placeholder_page_script_default_contents']);
        unset($context['__placeholder_page_script_default_contents']);        // line 39
        echo "    ";
        echo $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["SeoToolbox"] ?? null), "getBodyEnd", [], "method", false, false, true, 39), 39, $this->source);
        echo "
</body>
</html>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/layouts/main.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 39,  169 => 38,  165 => 37,  161 => 36,  157 => 35,  154 => 34,  150 => 33,  147 => 32,  145 => 31,  142 => 30,  138 => 29,  133 => 27,  129 => 26,  123 => 24,  121 => 23,  115 => 20,  112 => 19,  106 => 17,  103 => 16,  97 => 14,  94 => 13,  88 => 11,  86 => 10,  83 => 9,  81 => 6,  79 => 8,  74 => 7,  73 => 6,  69 => 5,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% spaceless %}
<!DOCTYPE html>
<html lang=\"en\">
<head>
    {{ SeoToolbox.getHeadBegin()|raw }}
    {% placeholder seo_tags default %}
        {% component 'SeoToolbox' %}
    {% endplaceholder %}
    <meta charset=\"utf-8\">
    {% if this.theme.favicon_32 is not empty %}
        <link rel=\"icon\" type=\"image/png\" href=\"{{ this.theme.favicon_32|media }}\" sizes=\"32x32\">
    {% endif %}
    {% if this.theme.favicon_64 is not empty %}
        <link rel=\"icon\" type=\"image/png\" href=\"{{ this.theme.favicon_64|media }}\" sizes=\"64x64\">
    {% endif %}
    {% if this.theme.favicon_180 is not empty %}
        <link rel=\"apple-touch-icon\" type=\"image/png\" href=\"{{ this.theme.favicon_180|media }}\" sizes=\"64x64\">
    {% endif %}
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <link rel=\"stylesheet\" href=\"{{ path_css }}\">
    <link href=\"https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/themes/vi2/assets/css/debug.css\">
    {% placeholder page_style %}
    {{ SeoToolbox.getHeadEnd()|raw }}
</head>
<body itemscope itemtype=\"http://schema.org/WebPage\" data-page-id=\"{{ this.page.id }}\">
    {{ SeoToolbox.getBodyBegin()|raw }}
    <div class=\"wrapper grid\">
        {% partial 'header/header' %}
        <main class=\"main subgrid full-width\">
            {% page %}
        </main>
        {% partial 'footer/footer' %}
    </div>
    <script src=\"{{ path_manifest_js }}\"></script>
    <script src=\"{{ path_vendor_js }}\"></script>
    <script src=\"{{ path_app_js }}\"></script>
    {% placeholder page_script %}
    {{ SeoToolbox.getBodyEnd()|raw }}
</body>
</html>
{% endspaceless %}", "/sr/apache/vivankovich.com/october/themes/vi2/layouts/main.htm", "");
    }
}
