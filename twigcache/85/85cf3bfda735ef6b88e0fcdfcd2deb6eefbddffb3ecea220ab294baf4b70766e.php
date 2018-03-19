<?php

/* brands-main.html.twig */
class __TwigTemplate_bb1711c43e8a7d09583a121941f4d24893ba9bcd4a8683799b27256ed85c321e extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["brands"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
            // line 2
            echo "    ";
            if ((twig_length_filter($this->env, $this->getAttribute($context["brand"], "brand_array", array())) > 1)) {
                // line 3
                echo "    <div class=\"col-12 col-sm-6 col-lg-4\">
        <br>
        <h4>";
                // line 5
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["brand"], "brand_letter", array())), "html", null, true);
                echo "</h4>

        <ul class=\"list-group list-group-flush\">
        ";
                // line 8
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["brand"], "brand_array", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["name"]) {
                    // line 9
                    echo "            <li class=\"list-group-item brand-title-listing\">
                <a href=\"/products/brand/";
                    // line 10
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute($context["name"], "brand_slug", array())), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["name"], "brand_name", array())), "html", null, true);
                    echo "</a>
            </li>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['name'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 13
                echo "        </ul>

        <br>
        <br>
    </div>
    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "brands-main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 13,  43 => 10,  40 => 9,  36 => 8,  30 => 5,  26 => 3,  23 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for brand in brands %}
    {% if (brand.brand_array|length) > 1 %}
    <div class=\"col-12 col-sm-6 col-lg-4\">
        <br>
        <h4>{{brand.brand_letter | capitalize}}</h4>

        <ul class=\"list-group list-group-flush\">
        {% for name in brand.brand_array %}
            <li class=\"list-group-item brand-title-listing\">
                <a href=\"/products/brand/{{name.brand_slug | lower}}\">{{name.brand_name | capitalize}}</a>
            </li>
        {% endfor %}
        </ul>

        <br>
        <br>
    </div>
    {% endif %}
{% endfor %}
", "brands-main.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/brands-main.html.twig");
    }
}
