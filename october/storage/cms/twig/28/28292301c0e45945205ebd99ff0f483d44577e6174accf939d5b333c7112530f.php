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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/header/search/search-panel/search-panel.htm */
class __TwigTemplate_fad050720041de4576268a4561a0c42846f4e43d0d7b00bd906cca16bfdf5fa5 extends \Twig\Template
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
        $tags = array("partial" => 5);
        $filters = array();
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['partial'],
                [],
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
        echo "<div class=\"search-panel search-panel_hidden webkit-scroll\">
    <button type=\"button\" class=\"search-panel__close js-search-popup\" arial-label=\"Close search popup\"></button>
    <b class=\"search-panel__title\">Search</b>
    <form action=\"#\" class=\"search-panel__form\" method='post' role='search' aria-controls=\"search-result\">
        ";
        // line 5
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "search-panel__input"        ;
        $context['__cms_partial_params']['labelClass'] = "search-panel__label"        ;
        $context['__cms_partial_params']['labelText'] = "Search"        ;
        $context['__cms_partial_params']['type'] = "text"        ;
        $context['__cms_partial_params']['id'] = "search-panel"        ;
        $context['__cms_partial_params']['name'] = "search"        ;
        $context['__cms_partial_params']['inputClass'] = "search-panel__input-field _shopaholic-search-input"        ;
        $context['__cms_partial_params']['maxLength'] = "100"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("form/input/input"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 15
        echo "        <button class=\"search-panel__button\" type=\"submit\">Search</button>
        <div class=\"search-panel__preloader\"></div>
        ";
        // line 17
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "search-panel__preloader"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 18
        echo "    </form>
    <ul class=\"search-panel__result\" id=\"search-result\" role=\"region\" aria-live=\"polite\"></ul>
</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/search/search-panel/search-panel.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 18,  84 => 17,  80 => 15,  68 => 5,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"search-panel search-panel_hidden webkit-scroll\">
    <button type=\"button\" class=\"search-panel__close js-search-popup\" arial-label=\"Close search popup\"></button>
    <b class=\"search-panel__title\">Search</b>
    <form action=\"#\" class=\"search-panel__form\" method='post' role='search' aria-controls=\"search-result\">
        {% partial 'form/input/input'
            wrapperClass='search-panel__input'
            labelClass='search-panel__label'
            labelText='Search'
            type='text'
            id='search-panel'
            name='search'
            inputClass='search-panel__input-field _shopaholic-search-input'
            maxLength='100'
        %}
        <button class=\"search-panel__button\" type=\"submit\">Search</button>
        <div class=\"search-panel__preloader\"></div>
        {% partial 'common/preloader/preloader' wrapperClass='search-panel__preloader' %}
    </form>
    <ul class=\"search-panel__result\" id=\"search-result\" role=\"region\" aria-live=\"polite\"></ul>
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/search/search-panel/search-panel.htm", "");
    }
}
