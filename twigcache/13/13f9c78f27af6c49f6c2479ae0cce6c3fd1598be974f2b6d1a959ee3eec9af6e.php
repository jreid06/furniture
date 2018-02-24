<?php

/* order-confirmation.html.twig */
class __TwigTemplate_23af4b8ea8993aea80ead4e76c763591f90f092094903549355e40cbc2d9b872 extends Twig_Template
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
    <div class=\"col-12 col-lg-12\">
        <table class=\"table confirm-order-table\">
            <thead class=\"thead-dark\">
                <tr>
                  <th scope=\"col\">Item Name</th>
                  <th scope=\"col\">type</th>
                  <th scope=\"col\">SKU ID / Shipping ID</th>
                  <th scope=\"col\">Quantity</th>
                  <th scope=\"col\">Price</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["order"] ?? null), "items", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 15
            echo "                    <tr>
                        <th scope=\"row\" style=\"vertical-align: middle;\">";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "description", array()), "html", null, true);
            echo "</th>
                        <td>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "type", array()), "html", null, true);
            echo "</td>
                        <td>
                            ";
            // line 19
            if (($this->getAttribute($context["item"], "parent", array()) == "null")) {
                // line 20
                echo "                                N/A
                            ";
            } else {
                // line 22
                echo "                                ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "parent", array()), "html", null, true);
                echo "
                            ";
            }
            // line 24
            echo "
                        </td>
                        <td>
                            ";
            // line 27
            if (($this->getAttribute($context["item"], "quantity", array()) == "null")) {
                // line 28
                echo "                                0
                            ";
            } else {
                // line 30
                echo "                                ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "quantity", array()), "html", null, true);
                echo "
                            ";
            }
            // line 32
            echo "
                        </td>
                        <td>
                            £ ";
            // line 35
            echo twig_escape_filter($this->env, ($this->getAttribute($context["item"], "amount", array()) / twig_number_format_filter($this->env, 100, 2)), "html", null, true);
            echo "
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "            </tbody>
        </table>
        <hr>
    </div>
    <div class=\"col-12 col-lg-12\">
        <div class=\"row\">
            <div class=\"col-12 col-md-6\">

            </div>
            <div class=\"col-12 col-md-6\">
                <h4 class=\"text-right\">Total: £ ";
        // line 49
        echo twig_escape_filter($this->env, ($this->getAttribute(($context["order"] ?? null), "amount", array()) / twig_number_format_filter($this->env, 100, 2)), "html", null, true);
        echo "</h4>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "order-confirmation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 49,  94 => 39,  84 => 35,  79 => 32,  73 => 30,  69 => 28,  67 => 27,  62 => 24,  56 => 22,  52 => 20,  50 => 19,  45 => 17,  41 => 16,  38 => 15,  34 => 14,  19 => 1,);
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
    <div class=\"col-12 col-lg-12\">
        <table class=\"table confirm-order-table\">
            <thead class=\"thead-dark\">
                <tr>
                  <th scope=\"col\">Item Name</th>
                  <th scope=\"col\">type</th>
                  <th scope=\"col\">SKU ID / Shipping ID</th>
                  <th scope=\"col\">Quantity</th>
                  <th scope=\"col\">Price</th>
                </tr>
            </thead>
            <tbody>
                {% for item in order.items %}
                    <tr>
                        <th scope=\"row\" style=\"vertical-align: middle;\">{{item.description}}</th>
                        <td>{{item.type}}</td>
                        <td>
                            {% if item.parent == 'null' %}
                                N/A
                            {% else %}
                                {{item.parent}}
                            {% endif %}

                        </td>
                        <td>
                            {% if item.quantity == 'null' %}
                                0
                            {% else %}
                                {{item.quantity}}
                            {% endif %}

                        </td>
                        <td>
                            £ {{item.amount / 100 | number_format(2)}}
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
        <hr>
    </div>
    <div class=\"col-12 col-lg-12\">
        <div class=\"row\">
            <div class=\"col-12 col-md-6\">

            </div>
            <div class=\"col-12 col-md-6\">
                <h4 class=\"text-right\">Total: £ {{order.amount / 100 | number_format(2)}}</h4>
            </div>
        </div>
    </div>
</div>
", "order-confirmation.html.twig", "/Users/jasonreid/Sites/furniture/twig_templates/order-confirmation.html.twig");
    }
}
