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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter-price/filter-price.htm */
class __TwigTemplate_f4e42aea3ae7fc33cce69b3b905317e45c23dafd763fa098aa0dea784cd78afb extends \Twig\Template
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
        $tags = array();
        $filters = array("escape" => 9);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
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
        echo "<div class=\"filter-price\">
    <div class=\"filter-price__wrapper\">
        <label class=\"filter-price__label\" for=\"min-price\">Min price</label>
        <input class=\"filter-price__input _shopaholic-price-filter\"
               id=\"min-price\"
               type=\"text\"
               name=\"filter-min-price\"
               maxlength=\"7\"
               value=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["min_value"] ?? null), 9, $this->source), "html", null, true);
        echo "\"
               min=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["min"] ?? null), 10, $this->source), "html", null, true);
        echo "\"
               max=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["max"] ?? null), 11, $this->source), "html", null, true);
        echo "\"
               placeholder=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["currency"] ?? null), 12, $this->source), "html", null, true);
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["min"] ?? null), 12, $this->source), "html", null, true);
        echo "\">
    </div>
    <span class=\"filter-price__separator\" aria-hidden=\"true\"></span>
    <div class=\"filter-price__wrapper\">
        <label class=\"filter-price__label\" for=\"max-price\">Max price</label>
        <input class=\"filter-price__input _shopaholic-price-filter\"
               id=\"max-price\"
               type=\"text\"
               name=\"filter-max-price\"
               maxlength=\"7\"
               value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["max_value"] ?? null), 22, $this->source), "html", null, true);
        echo "\"
               min=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["min"] ?? null), 23, $this->source), "html", null, true);
        echo "\"
               max=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["max"] ?? null), 24, $this->source), "html", null, true);
        echo "\"
               placeholder=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["currency"] ?? null), 25, $this->source), "html", null, true);
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["max"] ?? null), 25, $this->source), "html", null, true);
        echo "\">
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter-price/filter-price.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 25,  106 => 24,  102 => 23,  98 => 22,  84 => 12,  80 => 11,  76 => 10,  72 => 9,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"filter-price\">
    <div class=\"filter-price__wrapper\">
        <label class=\"filter-price__label\" for=\"min-price\">Min price</label>
        <input class=\"filter-price__input _shopaholic-price-filter\"
               id=\"min-price\"
               type=\"text\"
               name=\"filter-min-price\"
               maxlength=\"7\"
               value=\"{{ min_value }}\"
               min=\"{{ min }}\"
               max=\"{{ max }}\"
               placeholder=\"{{ currency }}{{ min }}\">
    </div>
    <span class=\"filter-price__separator\" aria-hidden=\"true\"></span>
    <div class=\"filter-price__wrapper\">
        <label class=\"filter-price__label\" for=\"max-price\">Max price</label>
        <input class=\"filter-price__input _shopaholic-price-filter\"
               id=\"max-price\"
               type=\"text\"
               name=\"filter-max-price\"
               maxlength=\"7\"
               value=\"{{ max_value }}\"
               min=\"{{ min }}\"
               max=\"{{ max }}\"
               placeholder=\"{{ currency }}{{ max }}\">
    </div>
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/product/catalog/filter/filter-price/filter-price.htm", "");
    }
}
