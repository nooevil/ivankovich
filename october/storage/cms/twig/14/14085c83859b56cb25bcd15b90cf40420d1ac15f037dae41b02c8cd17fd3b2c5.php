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

/* /sr/apache/vivankovich.com/october/themes/vi2/partials/form/review-form/review-form.htm */
class __TwigTemplate_37b777863f67a59292b1fe2b06ddcec37d52d7b2f0c991273d264ca1bcfd28ff extends \Twig\Template
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
        $tags = array("partial" => 17);
        $filters = array("escape" => 15);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['partial'],
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
        echo "<form class=\"review-form _required\">
    <div class=\"review-form__wrapper\" role=\"group\" aria-labelledby=\"star-rating\">
        <b class=\"review-form__head\" id=\"star-rating\">Rate this product</b>
        <input class=\"review-form__input\" type=\"radio\" id=\"star-rate1\" name=\"rating\" value=\"1\">
        <label class=\"review-form__label\" for=\"star-rate1\" title=\"Terrible\"></label>
        <input class=\"review-form__input\" type=\"radio\" id=\"star-rate2\" name=\"rating\" value=\"2\">
        <label class=\"review-form__label\" for=\"star-rate2\" title=\"Not good\"></label>
        <input class=\"review-form__input\" type=\"radio\" id=\"star-rate3\" name=\"rating\" value=\"3\">
        <label class=\"review-form__label\" for=\"star-rate3\" title=\"Average\"></label>
        <input class=\"review-form__input\" type=\"radio\" id=\"star-rate4\" name=\"rating\" value=\"4\" >
        <label class=\"review-form__label\" for=\"star-rate4\" title=\"Very good\"></label>
        <input class=\"review-form__input\" type=\"radio\" id=\"star-rate5\" name=\"rating\" value=\"5\" checked>
        <label class=\"review-form__label\" for=\"star-rate5\" title=\"Amazing\"></label>
    </div>
    <input type=\"hidden\" name=\"product_id\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["product_id"] ?? null), 15, $this->source), "html", null, true);
        echo "\">
    <div class=\"review-form__wrapper\" role=\"group\" aria-labelledby=\"review-person-name\">
        ";
        // line 17
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['name'] = "name"        ;
        $context['__cms_partial_params']['id'] = "review-person-name-value"        ;
        $context['__cms_partial_params']['required'] = "required"        ;
        $context['__cms_partial_params']['labelText'] = "Your name"        ;
        $context['__cms_partial_params']['validationErrorSelector'] = "review-form__error-name"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("form/input/input-text"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 24
        echo "    </div>
    <div class=\"review-form__wrapper\" role=\"group\" aria-labelledby=\"review-person-phone\">
        ";
        // line 26
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['name'] = "phone"        ;
        $context['__cms_partial_params']['id'] = "review-person-phone-number"        ;
        $context['__cms_partial_params']['required'] = "required"        ;
        $context['__cms_partial_params']['labelText'] = "Your phone number"        ;
        $context['__cms_partial_params']['validationErrorSelector'] = "review-form__error-phone"        ;
        $context['__cms_partial_params']['customErrorMessage'] = "Please use the following format: +1 29 666-66-66"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("form/input/input-tel"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 34
        echo "        ";
        // line 35
        echo "    </div>
    <div class=\"review-form__wrapper\" role=\"group\" aria-labelledby=\"review-person-text\">
        ";
        // line 37
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['name'] = "comment"        ;
        $context['__cms_partial_params']['id'] = "review-person-text-content"        ;
        $context['__cms_partial_params']['labelText'] = "Your opinion"        ;
        $context['__cms_partial_params']['required'] = "required"        ;
        $context['__cms_partial_params']['validationErrorSelector'] = "review-form__error-text"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("form/textarea/textarea"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 44
        echo "    </div>
    <div class=\"review-form__btn-wrap\">
        ";
        // line 46
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['text'] = "Add review"        ;
        $context['__cms_partial_params']['type'] = "submit"        ;
        $context['__cms_partial_params']['wrapperClass'] = "review-form__submit"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("form/button/button"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 47
        echo "        <button class=\"review-form__close\" type=\"button\">Cancel</button>
        ";
        // line 48
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "review-form__tooltip"        ;
        $context['__cms_partial_params']['error'] = true        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/tooltip/tooltip"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 49
        echo "        ";
        $context['__cms_partial_params'] = [];
        $context['__cms_partial_params']['wrapperClass'] = "review-add__preloader"        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("common/preloader/preloader"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 50
        echo "    </div>
</form>";
    }

    public function getTemplateName()
    {
        return "/sr/apache/vivankovich.com/october/themes/vi2/partials/form/review-form/review-form.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 50,  141 => 49,  135 => 48,  132 => 47,  125 => 46,  121 => 44,  112 => 37,  108 => 35,  106 => 34,  96 => 26,  92 => 24,  83 => 17,  78 => 15,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form class=\"review-form _required\">
    <div class=\"review-form__wrapper\" role=\"group\" aria-labelledby=\"star-rating\">
        <b class=\"review-form__head\" id=\"star-rating\">Rate this product</b>
        <input class=\"review-form__input\" type=\"radio\" id=\"star-rate1\" name=\"rating\" value=\"1\">
        <label class=\"review-form__label\" for=\"star-rate1\" title=\"Terrible\"></label>
        <input class=\"review-form__input\" type=\"radio\" id=\"star-rate2\" name=\"rating\" value=\"2\">
        <label class=\"review-form__label\" for=\"star-rate2\" title=\"Not good\"></label>
        <input class=\"review-form__input\" type=\"radio\" id=\"star-rate3\" name=\"rating\" value=\"3\">
        <label class=\"review-form__label\" for=\"star-rate3\" title=\"Average\"></label>
        <input class=\"review-form__input\" type=\"radio\" id=\"star-rate4\" name=\"rating\" value=\"4\" >
        <label class=\"review-form__label\" for=\"star-rate4\" title=\"Very good\"></label>
        <input class=\"review-form__input\" type=\"radio\" id=\"star-rate5\" name=\"rating\" value=\"5\" checked>
        <label class=\"review-form__label\" for=\"star-rate5\" title=\"Amazing\"></label>
    </div>
    <input type=\"hidden\" name=\"product_id\" value=\"{{ product_id }}\">
    <div class=\"review-form__wrapper\" role=\"group\" aria-labelledby=\"review-person-name\">
        {% partial 'form/input/input-text'
            name='name'
            id='review-person-name-value'
            required='required'
            labelText='Your name'
            validationErrorSelector='review-form__error-name'
        %}
    </div>
    <div class=\"review-form__wrapper\" role=\"group\" aria-labelledby=\"review-person-phone\">
        {% partial 'form/input/input-tel'
            name='phone'
            id='review-person-phone-number'
            required='required'
            labelText='Your phone number'
            validationErrorSelector='review-form__error-phone'
            customErrorMessage = 'Please use the following format: +1 29 666-66-66'
        %}
        {# pattern='^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\\s\\./0-9]*\$' #}
    </div>
    <div class=\"review-form__wrapper\" role=\"group\" aria-labelledby=\"review-person-text\">
        {% partial 'form/textarea/textarea'
            name='comment'
            id='review-person-text-content'
            labelText='Your opinion'
            required='required'
            validationErrorSelector='review-form__error-text'
        %}
    </div>
    <div class=\"review-form__btn-wrap\">
        {% partial 'form/button/button' text='Add review' type='submit' wrapperClass='review-form__submit' %}
        <button class=\"review-form__close\" type=\"button\">Cancel</button>
        {% partial 'common/tooltip/tooltip' wrapperClass='review-form__tooltip' error = true %}
        {% partial 'common/preloader/preloader' wrapperClass=\"review-add__preloader\" %}
    </div>
</form>", "/sr/apache/vivankovich.com/october/themes/vi2/partials/form/review-form/review-form.htm", "");
    }
}
