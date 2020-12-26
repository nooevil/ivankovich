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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/footer/footer.htm */
class __TwigTemplate_3277aa3f13134ef28482452ee043863af5ccd0afe73bf3c3722957d32380374b extends \Twig\Template
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
        echo "<footer class=\"footer\">
    <div class=\"footer__col\">
        ";
        // line 3
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("footer/footer-nav/footer-nav"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 4
        echo "    </div>
    <div class=\"footer__col footer__col_2nd\">
        ";
        // line 6
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "footer__logo"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/logo/logo"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 7
        echo "        ";
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("footer/footer-info/footer-info"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 8
        echo "    </div>
</footer>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/footer/footer.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 8,  79 => 7,  74 => 6,  70 => 4,  66 => 3,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<footer class=\"footer\">
    <div class=\"footer__col\">
        {% partial 'footer/footer-nav/footer-nav' %}
    </div>
    <div class=\"footer__col footer__col_2nd\">
        {% partial 'common/logo/logo' wrapperClass='footer__logo' %}
        {% partial 'footer/footer-info/footer-info' %}
    </div>
</footer>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/footer/footer.htm", "");
    }
}
