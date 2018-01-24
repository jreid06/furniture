<?php

/* orders.html.twig */
class __TwigTemplate_c755b30d12b6d35804a09eb46afd537efa3629c2e339c219dc58cd73da1aadfe extends Twig_Template
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
        echo "<div class=\"col-12\">
    <div class=\"table-responsive\">
        <table class=\"table\">
            <thead class=\"thead-dark\">
                <tr>
                  <th scope=\"col\">Order #No.</th>
                  <th scope=\"col\">Items</th>
                  <th scope=\"col\">Created</th>
                  <th scope=\"col\">Status</th>
                  <th scope=\"col\">Date Paid</th>
                  <th scope=\"col\" colspan=\"2\">Total</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["orderSQL"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 16
            echo "                    <tr>
                        <th scope=\"row\" style=\"vertical-align: middle;\">";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["order"], "real_json", array()), "id", array()), "html", null, true);
            echo "</th>
                        <td>";
            // line 18
            echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["itemCount"] ?? null)), "html", null, true);
            echo "</td>
                        <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute(call_user_func_array($this->env->getFilter('timestamp_format')->getCallable(), array($this->getAttribute($this->getAttribute($context["order"], "real_json", array()), "created", array()))), "full_date", array(), "array"), "html", null, true);
            echo "</td>
                        <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["order"], "real_json", array()), "status", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute(call_user_func_array($this->env->getFilter('timestamp_format')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute($context["order"], "real_json", array()), "status_transitions", array()), "paid", array()))), "full_date", array(), "array"), "html", null, true);
            echo "</td>
                        <td>£";
            // line 22
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($context["order"], "real_json", array()), "amount", array()) / 100), "html", null, true);
            echo "</td>
                        <td class=\"text-center\"><button class=\"btn btn-primary\" @click.prevent>View</button> </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "            </tbody>
        </table>
    </div>
</div>

<div class=\"col-12\">
    <!-- <pre>
        ";
        // line 33
        echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, ($context["orderSQL"] ?? null)), "html", null, true);
        echo "
    </pre> -->
</div>
";
    }

    public function getTemplateName()
    {
        return "orders.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 33,  72 => 26,  62 => 22,  58 => 21,  54 => 20,  50 => 19,  46 => 18,  42 => 17,  39 => 16,  35 => 15,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"col-12\">
    <div class=\"table-responsive\">
        <table class=\"table\">
            <thead class=\"thead-dark\">
                <tr>
                  <th scope=\"col\">Order #No.</th>
                  <th scope=\"col\">Items</th>
                  <th scope=\"col\">Created</th>
                  <th scope=\"col\">Status</th>
                  <th scope=\"col\">Date Paid</th>
                  <th scope=\"col\" colspan=\"2\">Total</th>
                </tr>
            </thead>
            <tbody>
                {% for order in orderSQL %}
                    <tr>
                        <th scope=\"row\" style=\"vertical-align: middle;\">{{order.real_json.id}}</th>
                        <td>{{itemCount |length}}</td>
                        <td>{{order.real_json.created |timestamp_format()['full_date']}}</td>
                        <td>{{order.real_json.status}}</td>
                        <td>{{order.real_json.status_transitions.paid |timestamp_format()['full_date']}}</td>
                        <td>£{{order.real_json.amount / 100}}</td>
                        <td class=\"text-center\"><button class=\"btn btn-primary\" @click.prevent>View</button> </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>

<div class=\"col-12\">
    <!-- <pre>
        {{dump(orderSQL)}}
    </pre> -->
</div>
", "orders.html.twig", "/Users/jasonreid/Sites/furniture/twig_templates/orders.html.twig");
    }
}
