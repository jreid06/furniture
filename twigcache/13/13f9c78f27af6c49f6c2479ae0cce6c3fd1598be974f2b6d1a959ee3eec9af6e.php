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
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["item"], "amount", array()) / 100), 2), "html", null, true);
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
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute(($context["order"] ?? null), "amount", array()) / 100), 2), "html", null, true);
        echo "</h4>
            </div>
        </div>
    </div>

    ";
        // line 54
        if ((($context["metadata_length"] ?? null) < 3)) {
            // line 55
            echo "        <div class=\"col-12\">
            <br>
            <h4 class=\"text-danger\">UNFORTUNATELY THERE WAS AN ERROR RETRIEVING YOUR SHIPPING DETAILS. PLEASE CONTACT SUPPORT FOR MORE INFORMATION REFERENCING YOUR IDYL ORDER ID NUMBER</h4>
            <br>
            <hr>
            <h4>IDYL ORDER ID: #";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute(($context["order"] ?? null), "id", array()), "html", null, true);
            echo "</h4>
            <br>
        </div>
    ";
        } else {
            // line 64
            echo "        <div class=\"col-12\">
            <h4>DELIVERY ORDER ID: #";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["order"] ?? null), "metadata", array()), "easypost-order-id", array(), "array"), "html", null, true);
            echo "<span class=\"badge badge-success\"></span></h4>
            <br>
        </div>
        <div class=\"col-12 col-lg-12\">
            <table class=\"table confirm-order-table\">
                <thead class=\"thead-dark\">
                    <tr>
                      <th scope=\"col\">Shipment ID</th>
                      <th scope=\"col\">Tracking Code</th>
                      <th scope=\"col\">Carrier</th>
                      <th scope=\"col\">Item Associated</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 79
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["metadata_details"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 80
                echo "                    <tr>
                        <th scope=\"row\" style=\"vertical-align: middle;\">";
                // line 81
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["order"] ?? null), "metadata", array()), $this->getAttribute($context["item"], "shipment_id", array()), array(), "array"), "html", null, true);
                echo "</th>
                        <td>";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["order"] ?? null), "metadata", array()), $this->getAttribute($context["item"], "tracker_code", array()), array(), "array"), "html", null, true);
                echo "</td>
                        <td>";
                // line 83
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "carrier", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 84
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "</td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 87
            echo "
                </tbody>
            </table>
        </div>
    ";
        }
        // line 92
        echo "</div>
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
        return array (  185 => 92,  178 => 87,  169 => 84,  165 => 83,  161 => 82,  157 => 81,  154 => 80,  150 => 79,  133 => 65,  130 => 64,  123 => 60,  116 => 55,  114 => 54,  106 => 49,  94 => 39,  84 => 35,  79 => 32,  73 => 30,  69 => 28,  67 => 27,  62 => 24,  56 => 22,  52 => 20,  50 => 19,  45 => 17,  41 => 16,  38 => 15,  34 => 14,  19 => 1,);
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
                            £ {{(item.amount / 100) | number_format(2)}}
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
                <h4 class=\"text-right\">Total: £ {{(order.amount / 100) | number_format(2)}}</h4>
            </div>
        </div>
    </div>

    {% if metadata_length < 3 %}
        <div class=\"col-12\">
            <br>
            <h4 class=\"text-danger\">UNFORTUNATELY THERE WAS AN ERROR RETRIEVING YOUR SHIPPING DETAILS. PLEASE CONTACT SUPPORT FOR MORE INFORMATION REFERENCING YOUR IDYL ORDER ID NUMBER</h4>
            <br>
            <hr>
            <h4>IDYL ORDER ID: #{{order.id}}</h4>
            <br>
        </div>
    {% else %}
        <div class=\"col-12\">
            <h4>DELIVERY ORDER ID: #{{order.metadata['easypost-order-id']}}<span class=\"badge badge-success\"></span></h4>
            <br>
        </div>
        <div class=\"col-12 col-lg-12\">
            <table class=\"table confirm-order-table\">
                <thead class=\"thead-dark\">
                    <tr>
                      <th scope=\"col\">Shipment ID</th>
                      <th scope=\"col\">Tracking Code</th>
                      <th scope=\"col\">Carrier</th>
                      <th scope=\"col\">Item Associated</th>
                    </tr>
                </thead>
                <tbody>
                    {% for item in metadata_details %}
                    <tr>
                        <th scope=\"row\" style=\"vertical-align: middle;\">{{order.metadata[item.shipment_id]}}</th>
                        <td>{{order.metadata[item.tracker_code]}}</td>
                        <td>{{item.carrier}}</td>
                        <td>{{item.name}}</td>
                    </tr>
                    {% endfor %}

                </tbody>
            </table>
        </div>
    {% endif %}
</div>
", "order-confirmation.html.twig", "/Users/jasonreid/Sites/furniture/twig_templates/order-confirmation.html.twig");
    }
}
