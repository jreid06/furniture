<?php

/* editbrands.html.twig */
class __TwigTemplate_832c1d4cad2e51ded5a013fd3524ad3d501034d850606eb8600d33972944e176 extends Twig_Template
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
    <div class=\"col-lg-12\">
        <h1 class=\"page-header\">Edit / Delete Brands Info</h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class=\"col-xs-12\">
        <!-- success alert for updates or successful brand category addition -->
        ";
        // line 8
        if ($this->getAttribute(($context["session"] ?? null), "success", array())) {
            // line 9
            echo "            <div class=\"alert alert-success alert-dismissible alert-brand-edit-success\" style=\"\" role=\"alert\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
              <strong></strong> <span id=\"alert-brand-edit-success-msg\">";
            // line 11
            echo $this->getAttribute(($context["session"] ?? null), "success", array());
            echo "</span>

            </div>
        ";
        }
        // line 15
        echo "

        <!-- error alert for to many characters -->
        ";
        // line 18
        if ($this->getAttribute(($context["session"] ?? null), "error", array())) {
            // line 19
            echo "            <div class=\"alert alert-danger alert-dismissible alert-brand-edit-error\" style=\"\" role=\"alert\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
              <strong></strong> <span id=\"alert-brand-edit-error-msg\">";
            // line 21
            echo $this->getAttribute(($context["session"] ?? null), "error", array());
            echo "</span>

            </div>
        ";
        }
        // line 25
        echo "
    </div>

    ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["brands"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
            // line 29
            echo "
        ";
            // line 30
            if ((twig_length_filter($this->env, $this->getAttribute($context["brand"], "brand_array", array())) >= 1)) {
                // line 31
                echo "        <div class=\"col-xs-12 col-md-4 col-lg-4 col-xl-4 brand-columns\">
            <ul class=\"list-group\">
                <h3><strong>";
                // line 33
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["brand"], "brand_letter", array())), "html", null, true);
                echo "</strong></h3>
                ";
                // line 34
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["brand"], "brand_array", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["name"]) {
                    // line 35
                    echo "                    <li class=\"list-group-item brand-list\">
                        ";
                    // line 36
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["name"], "brand_name", array())), "html", null, true);
                    echo "
                        <div class=\"brand-controls\">
                            <span class=\"fa fa-trash\" @click=\"deleteBrand\" data-brand-category=\"";
                    // line 38
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["brand"], "brand_letter", array())), "html", null, true);
                    echo "\" data-brand-cat-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["brand"], "brand_id", array()), "html", null, true);
                    echo "\" data-brand=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["name"], "brand_name", array()), "html", null, true);
                    echo "\"></span>
                        </div>
                    </li>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['name'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 42
                echo "            </ul>
        </div>
        ";
            }
            // line 45
            echo "

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "
    <!-- <pre>
        ";
        // line 50
        echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, ($context["brands"] ?? null)), "html", null, true);
        echo "
    </pre> -->
</div>
<!-- /.row -->
";
    }

    public function getTemplateName()
    {
        return "editbrands.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 50,  120 => 48,  112 => 45,  107 => 42,  93 => 38,  88 => 36,  85 => 35,  81 => 34,  77 => 33,  73 => 31,  71 => 30,  68 => 29,  64 => 28,  59 => 25,  52 => 21,  48 => 19,  46 => 18,  41 => 15,  34 => 11,  30 => 9,  28 => 8,  19 => 1,);
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
    <div class=\"col-lg-12\">
        <h1 class=\"page-header\">Edit / Delete Brands Info</h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class=\"col-xs-12\">
        <!-- success alert for updates or successful brand category addition -->
        {% if session.success %}
            <div class=\"alert alert-success alert-dismissible alert-brand-edit-success\" style=\"\" role=\"alert\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
              <strong></strong> <span id=\"alert-brand-edit-success-msg\">{{session.success | raw}}</span>

            </div>
        {% endif %}


        <!-- error alert for to many characters -->
        {% if session.error %}
            <div class=\"alert alert-danger alert-dismissible alert-brand-edit-error\" style=\"\" role=\"alert\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
              <strong></strong> <span id=\"alert-brand-edit-error-msg\">{{session.error | raw }}</span>

            </div>
        {% endif %}

    </div>

    {% for brand in brands %}

        {% if (brand.brand_array|length) >= 1 %}
        <div class=\"col-xs-12 col-md-4 col-lg-4 col-xl-4 brand-columns\">
            <ul class=\"list-group\">
                <h3><strong>{{brand.brand_letter | capitalize}}</strong></h3>
                {% for name in brand.brand_array %}
                    <li class=\"list-group-item brand-list\">
                        {{name.brand_name | capitalize}}
                        <div class=\"brand-controls\">
                            <span class=\"fa fa-trash\" @click=\"deleteBrand\" data-brand-category=\"{{brand.brand_letter | capitalize}}\" data-brand-cat-id=\"{{brand.brand_id}}\" data-brand=\"{{name.brand_name}}\"></span>
                        </div>
                    </li>
                {% endfor %}
            </ul>
        </div>
        {% endif %}


    {% endfor %}

    <!-- <pre>
        {{dump(brands)}}
    </pre> -->
</div>
<!-- /.row -->
", "editbrands.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/editbrands.html.twig");
    }
}
