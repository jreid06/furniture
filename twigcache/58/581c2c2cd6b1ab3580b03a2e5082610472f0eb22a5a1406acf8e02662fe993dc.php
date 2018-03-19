<?php

/* post-body.html.twig */
class __TwigTemplate_46c56ea30c7e3482fc66d252a0d01bee630c021418c852716a3c090aa4243f8d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"jumbotron blog-main-image\" style=\"background: url(";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "main_img_path", array()), "html", null, true);
        echo ")\">
    <div class=\"overlay\">

    </div>
    <h1 class=\"text-center heading\">";
        // line 5
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["post"] ?? null), "title", array())), "html", null, true);
        echo "</h1>
    ";
        // line 6
        $context["month_num"] = (twig_round($this->getAttribute($this->getAttribute(($context["post"] ?? null), "date", array()), "month", array())) - 1);
        // line 7
        echo "    <h5 class=\"text-center date\">";
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["months"] ?? null), ($context["month_num"] ?? null), array(), "array")), "html", null, true);
        echo "  ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["post"] ?? null), "date", array()), "full", array()), "html", null, true);
        echo "</h5>
</div>
<div class=\"container home blog-post-body\">
    <div class=\"row\">
        <div class=\"col-12\">
            <p class=\"text-justify brief\"><strong>BRIEF:</strong> ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "brief_desc", array()), "html", null, true);
        echo " </p>
            <br>
            <br>
        </div>
        <div class=\"col-12 text-center\">
            ";
        // line 18
        echo "                ";
        echo ($context["post_body"] ?? null);
        echo "
            ";
        // line 20
        echo "        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "post-body.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 20,  52 => 18,  44 => 12,  33 => 7,  31 => 6,  27 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"jumbotron blog-main-image\" style=\"background: url({{post.main_img_path}})\">
    <div class=\"overlay\">

    </div>
    <h1 class=\"text-center heading\">{{post.title | capitalize}}</h1>
    {% set month_num = (post.date.month | round) - 1 %}
    <h5 class=\"text-center date\">{{months[month_num] | capitalize }}  {{post.date.full}}</h5>
</div>
<div class=\"container home blog-post-body\">
    <div class=\"row\">
        <div class=\"col-12\">
            <p class=\"text-justify brief\"><strong>BRIEF:</strong> {{post.brief_desc}} </p>
            <br>
            <br>
        </div>
        <div class=\"col-12 text-center\">
            {% autoescape 'html' %}
                {{post_body | raw}}
            {% endautoescape %}
        </div>
    </div>
</div>
", "post-body.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/post-body.html.twig");
    }
}
