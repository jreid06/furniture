<?php

/* address.html.twig */
class __TwigTemplate_b74c70075f3bedc468a21f94f36c829be160e5428df31718d3a81fa6f9c978c1 extends Twig_Template
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
    <div class=\"col-12 text-center\">
        <br>
        <a href=\"/myaccount/addaddress\" class=\"btn btn-primary\">Add Delivery Address</a>
    </div>
    ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["user_details"] ?? null), "address", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["address"]) {
            // line 7
            echo "    <div class=\"col-12 col-md-6 col-lg-4\">
        <div class=\"card address-card\" style=\"width: 100%; margin-top: 50px; ";
            // line 8
            if (($this->getAttribute($context["address"], "status", array()) == "true")) {
                echo "background-color: #d2d2d2; ";
            }
            echo "\">
          <div class=\"card-body\" data-index=\"";
            // line 9
            echo twig_escape_filter($this->env, ($this->getAttribute($context["loop"], "index", array()) - 1), "html", null, true);
            echo "\">
             ";
            // line 10
            if (($this->getAttribute($context["address"], "status", array()) == "true")) {
                // line 11
                echo "                <h5><span class=\"badge badge-success\">ACTIVE ADDRESS</span></h5>
                <br>
             ";
            }
            // line 14
            echo "            <h5 class=\"card-title\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["address"], "title", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["address"], "first_name", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["address"], "last_name", array()), "html", null, true);
            echo "</h5>
            <h6 class=\"card-subtitle mb-2 text-muted\">Address ";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "</h6>
            <p class=\"card-text\">";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($context["address"], "address1", array()), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["address"], "city_town", array()), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["address"], "post_code", array()), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["address"], "country", array()), "html", null, true);
            echo "</p>
            <a href=\"/myaccount/editaddress/";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["address"], "address_id", array()), "html", null, true);
            echo "\" class=\"card-link\" @click.prevent=\"editaddressDirect\">Edit address</a>
            <a href=\"\" class=\"card-link\" @click.prevent=\"deleteAddress\">Delete Address</a>
          </div>
        </div>
    </div>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['address'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "
    <div class=\"col-12\">
        <!-- <pre>
            ";
        // line 26
        echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, ($context["user_details"] ?? null)), "html", null, true);
        echo "
        </pre> -->
    </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "address.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 26,  106 => 23,  86 => 17,  76 => 16,  72 => 15,  63 => 14,  58 => 11,  56 => 10,  52 => 9,  46 => 8,  43 => 7,  26 => 6,  19 => 1,);
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
    <div class=\"col-12 text-center\">
        <br>
        <a href=\"/myaccount/addaddress\" class=\"btn btn-primary\">Add Delivery Address</a>
    </div>
    {% for address in user_details.address %}
    <div class=\"col-12 col-md-6 col-lg-4\">
        <div class=\"card address-card\" style=\"width: 100%; margin-top: 50px; {% if address.status == 'true' %}background-color: #d2d2d2; {% endif %}\">
          <div class=\"card-body\" data-index=\"{{loop.index-1}}\">
             {% if address.status == 'true' %}
                <h5><span class=\"badge badge-success\">ACTIVE ADDRESS</span></h5>
                <br>
             {% endif %}
            <h5 class=\"card-title\">{{address.title}} {{address.first_name}} {{address.last_name}}</h5>
            <h6 class=\"card-subtitle mb-2 text-muted\">Address {{loop.index}}</h6>
            <p class=\"card-text\">{{address.address1}}, {{address.city_town}}, {{address.post_code}}, {{address.country}}</p>
            <a href=\"/myaccount/editaddress/{{address.address_id}}\" class=\"card-link\" @click.prevent=\"editaddressDirect\">Edit address</a>
            <a href=\"\" class=\"card-link\" @click.prevent=\"deleteAddress\">Delete Address</a>
          </div>
        </div>
    </div>
    {% endfor %}

    <div class=\"col-12\">
        <!-- <pre>
            {{dump(user_details)}}
        </pre> -->
    </div>

</div>
", "address.html.twig", "/Users/jasonreid/Sites/furniture/twig_templates/address.html.twig");
    }
}
