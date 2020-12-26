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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/content/contact/contact-photo.htm */
class __TwigTemplate_317a302b1c5b0fc530a061bb4b000902068fcca5220517e00958aff53ed73c1e extends \Twig\Template
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
        $filters = array();
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
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
        echo "<div class=\"photos\">
\t<img src=\"https://wiki.wildberries.ru/img/2013/01/800x800x85_10013d0314ad0587fb13eaffc97438a7.jpg\" alt=\"\">
\t<img src=\"https://wiki.wildberries.ru/img/2013/01/800x800x85_10013d0314ad0587fb13eaffc97438a7.jpg\" alt=\"\">
</div>

<style>
\t.photos {
\t\tgrid-column: 4 / -1;
    \twidth: 100%;
    \tmargin: 0 0 50px;
\t}
\t.photos img {
\t\twidth: 475px;
\t\tmargin-right: 50px;
\t}
</style>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/contact/contact-photo.htm";
    }

    public function getDebugInfo()
    {
        return array (  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"photos\">
\t<img src=\"https://wiki.wildberries.ru/img/2013/01/800x800x85_10013d0314ad0587fb13eaffc97438a7.jpg\" alt=\"\">
\t<img src=\"https://wiki.wildberries.ru/img/2013/01/800x800x85_10013d0314ad0587fb13eaffc97438a7.jpg\" alt=\"\">
</div>

<style>
\t.photos {
\t\tgrid-column: 4 / -1;
    \twidth: 100%;
    \tmargin: 0 0 50px;
\t}
\t.photos img {
\t\twidth: 475px;
\t\tmargin-right: 50px;
\t}
</style>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/content/contact/contact-photo.htm", "");
    }
}
