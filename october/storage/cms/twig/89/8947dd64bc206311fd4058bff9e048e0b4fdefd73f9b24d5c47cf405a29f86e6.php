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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/header/header.htm */
class __TwigTemplate_e628ae64e66cb7fea6919bb4e9138af9472e0cb4ee3b0a01e0491899cf8e2f8f extends \Twig\Template
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
        $tags = array("set" => 1, "partial" => 5);
        $filters = array();
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'partial'],
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
        $context["obCategoryList"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["CategoryList"] ?? null), "make", [], "method", false, false, true, 1), "tree", [], "method", false, false, true, 1), "active", [], "method", false, false, true, 1);
        // line 2
        echo "
<header class=\"header\">
    <div class=\"header__wrapper\">        
        ";
        // line 5
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['obCategoryList'] = ($context["obCategoryList"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("header/drawer-nav/drawer-nav"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 6
        echo "        ";
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['obCategoryList'] = ($context["obCategoryList"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("header/menu"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 7
        echo "        ";
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "header__logo"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/logo/logo"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 8
        echo "        ";
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("header/lang/lang"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 9
        echo "        ";
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "header__search"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("header/search/search"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 10
        echo "        ";
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("header/userbar/userbar"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 11
        echo "    </div>
</header>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/header.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 11,  97 => 10,  91 => 9,  86 => 8,  80 => 7,  74 => 6,  69 => 5,  64 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set obCategoryList = CategoryList.make().tree().active() %}

<header class=\"header\">
    <div class=\"header__wrapper\">        
        {% partial 'header/drawer-nav/drawer-nav' obCategoryList=obCategoryList %}
        {% partial 'header/menu' obCategoryList=obCategoryList %}
        {% partial 'common/logo/logo' wrapperClass='header__logo' %}
        {% partial 'header/lang/lang' %}
        {% partial 'header/search/search' wrapperClass='header__search' %}
        {% partial 'header/userbar/userbar' %}
    </div>
</header>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/header.htm", "");
    }
}
