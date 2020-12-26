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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/header/lang/lang.htm */
class __TwigTemplate_94d6e1e181be48d650876ac58751cdee370b9131fbcd341ff38a41274769c902 extends \Twig\Template
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
        echo "<ul style=\"list-style-type: none; margin-right: 20px;\" class=\"lang-lang\">
    <li>
        <a href=\"https://ru.victoriaivankovich.com\" class=\"header-nav__link \">RU</a>
    </li>
    <li>
        <a href=\"https://en.victoriaivankovich.com\" class=\"header-nav__link \">EN</a>
    </li>
</ul>

<style>
\t@media (max-width: 450px) {
\t\t.lang-lang {
\t\t\tdisplay: none;
\t\t}
\t\t.lang-lang-menu{
\t\t\tdisplay: block;
\t\t}
\t}
\t@media (min-width: 450px) {
\t\t.lang-lang {
\t\t\tdisplay: block;
\t\t}
\t\t.lang-lang-menu{
\t\t\tdisplay: none;
\t\t}
\t}
</style>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/lang/lang.htm";
    }

    public function getDebugInfo()
    {
        return array (  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<ul style=\"list-style-type: none; margin-right: 20px;\" class=\"lang-lang\">
    <li>
        <a href=\"https://ru.victoriaivankovich.com\" class=\"header-nav__link \">RU</a>
    </li>
    <li>
        <a href=\"https://en.victoriaivankovich.com\" class=\"header-nav__link \">EN</a>
    </li>
</ul>

<style>
\t@media (max-width: 450px) {
\t\t.lang-lang {
\t\t\tdisplay: none;
\t\t}
\t\t.lang-lang-menu{
\t\t\tdisplay: block;
\t\t}
\t}
\t@media (min-width: 450px) {
\t\t.lang-lang {
\t\t\tdisplay: block;
\t\t}
\t\t.lang-lang-menu{
\t\t\tdisplay: none;
\t\t}
\t}
</style>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/header/lang/lang.htm", "");
    }
}
