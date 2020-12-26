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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/common/error/error.htm */
class __TwigTemplate_1124806267a950ee3300264d3a722ed8cf0d85831f21a3f3e867550c43cb9e1c extends \Twig\Template
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
        $tags = array("set" => 11, "partial" => 14);
        $filters = array("escape" => 3, "raw" => 6, "page" => 12);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'partial'],
                ['escape', 'raw', 'page'],
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
        echo "<div class=\"error\">
    <h1 class=\"error__title\">
        ";
        // line 3
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 3, $this->source), "html", null, true);
        echo "
    </h1>
    <span class=\"error__descr\">
        ";
        // line 6
        echo $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 6, $this->source);
        echo "
    </span>
    <span class=\"error__hint\">
        ";
        // line 9
        echo $this->sandbox->ensureToStringAllowed(($context["hint"] ?? null), 9, $this->source);
        echo "
    </span>
    ";
        // line 11
        $context["errorType"] = (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, true, 11), "id", [], "any", false, false, true, 11) == "404");
        // line 12
        echo "    ";
        $context["href"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, true, 12), "id", [], "any", false, false, true, 12) == "404")) ? ($this->extensions['Cms\Twig\Extension']->pageFilter("index")) : (""));
        // line 13
        echo "    ";
        $context["class"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, true, 13), "id", [], "any", false, false, true, 13) == "404")) ? ("error__btn error__link-back") : ("error__btn"));
        // line 14
        echo "    ";
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['link'] = ($context["errorType"] ?? null)        ;
        $context['__cms_partial_params']['wrapperClass'] = ($context["class"] ?? null)        ;
        $context['__cms_partial_params']['text'] = ($context["buttonText"] ?? null)        ;
        $context['__cms_partial_params']['href'] = ($context["href"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("form/button/button"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 15
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/common/error/error.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 15,  91 => 14,  88 => 13,  85 => 12,  83 => 11,  78 => 9,  72 => 6,  66 => 3,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"error\">
    <h1 class=\"error__title\">
        {{ title }}
    </h1>
    <span class=\"error__descr\">
        {{ description|raw }}
    </span>
    <span class=\"error__hint\">
        {{ hint|raw }}
    </span>
    {% set errorType = this.page.id=='404' %}
    {% set href = this.page.id=='404' ? 'index'|page : '' %}
    {% set class = this.page.id=='404' ? 'error__btn error__link-back' : 'error__btn' %}
    {% partial 'form/button/button' link=errorType wrapperClass=class text=buttonText href=href %}
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/common/error/error.htm", "");
    }
}
