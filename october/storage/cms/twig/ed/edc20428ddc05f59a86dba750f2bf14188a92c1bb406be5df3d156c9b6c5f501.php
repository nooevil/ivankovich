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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review-add/review-add.htm */
class __TwigTemplate_445945c2f15fb33f91a6faee5736d2abf56df317c69d66207e4d4d3f28bad765 extends \Twig\Template
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
        $tags = array("partial" => 3);
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
        echo "<div class=\"review-add webkit-scroll\">
    <div class=\"review-add__container\">
        ";
        // line 3
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "review-add__title"        ;
        $context['__cms_partial_params']['text'] = "Review add"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/section-title/section-title"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 4
        echo "        <button type=\"button\" class=\"review-add__close-btn js-review-modal\" aria-label=\"Close popup\"></button>
        <div class=\"review-add__wrapper\">
            ";
        // line 6
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['product_id'] = ($context["product_id"] ?? null)        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("form/review-form/review-form"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 7
        echo "        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review-add/review-add.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 7,  76 => 6,  72 => 4,  66 => 3,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"review-add webkit-scroll\">
    <div class=\"review-add__container\">
        {% partial 'common/section-title/section-title' wrapperClass='review-add__title' text='Review add' %}
        <button type=\"button\" class=\"review-add__close-btn js-review-modal\" aria-label=\"Close popup\"></button>
        <div class=\"review-add__wrapper\">
            {% partial 'form/review-form/review-form' product_id=product_id %}
        </div>
    </div>
</div>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/review/review-add/review-add.htm", "");
    }
}
