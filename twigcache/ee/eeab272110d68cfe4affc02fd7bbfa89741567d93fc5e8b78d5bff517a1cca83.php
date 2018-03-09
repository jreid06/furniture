<?php

/* blogimages.html.twig */
class __TwigTemplate_48b4c25cf6e2bc679d2d6960a98ecd66a84f036d874bd7b63c2449e81b70c666 extends Twig_Template
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
        echo "<div class=\"row\">
    <hr>
    <h3>View All blog images</h3>
    <!-- place in twig template to render all current added images -->
    <div class=\"col-xs-12\">
        <p>";
        // line 6
        echo twig_escape_filter($this->env, ($context["data"] ?? null), "html", null, true);
        echo "</p>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "blogimages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 6,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"row\">
    <hr>
    <h3>View All blog images</h3>
    <!-- place in twig template to render all current added images -->
    <div class=\"col-xs-12\">
        <p>{{data}}</p>
    </div>
</div>
", "blogimages.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/blogimages.html.twig");
    }
}
