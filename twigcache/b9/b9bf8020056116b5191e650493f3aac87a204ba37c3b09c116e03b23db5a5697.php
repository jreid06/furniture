<?php

/* shipping-options.html.twig */
class __TwigTemplate_4f5667c7ee3f90d52d13a899eddd99f3a868f388f2fd759f75de9eda51773b17 extends Twig_Template
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
    <p><span class=\"font-weight-cold\">NOTE: </span><span class=\"text-muted\">All items will be dispatched within 2 working days. Delivery days are from when order has been dispatched</span> </p>
    <br>
    <form id=\"shipping-method-radios\">
        ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["shipping_methods"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rates"]) {
            // line 6
            echo "        <div class=\"input-group\">
            <div class=\"input-group-prepend\">
                <div class=\"input-group-text\">
                    <input type=\"radio\" class=\"rate-radio\" aria-label=\"Radio button for following text input\" data-rate-id=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($context["rates"], "id", array()), "html", null, true);
            echo "\" data-order-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["order"] ?? null), "id", array()), "html", null, true);
            echo "\" ";
            if ((($context["default_shipping"] ?? null) == $this->getAttribute($context["rates"], "id", array()))) {
                echo "checked=\"checked\"";
            }
            echo ">
                </div>
            </div>
            <p>&nbsp;&nbsp;&nbsp;&nbsp; <strong>£";
            // line 12
            echo twig_escape_filter($this->env, ($this->getAttribute($context["rates"], "amount", array()) / twig_number_format_filter($this->env, 100, 2)), "html", null, true);
            echo "</strong> - ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["rates"], "description", array()), "html", null, true);
            echo "</p>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rates'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "shipping-options.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 15,  46 => 12,  34 => 9,  29 => 6,  25 => 5,  19 => 1,);
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
    <p><span class=\"font-weight-cold\">NOTE: </span><span class=\"text-muted\">All items will be dispatched within 2 working days. Delivery days are from when order has been dispatched</span> </p>
    <br>
    <form id=\"shipping-method-radios\">
        {% for rates in shipping_methods %}
        <div class=\"input-group\">
            <div class=\"input-group-prepend\">
                <div class=\"input-group-text\">
                    <input type=\"radio\" class=\"rate-radio\" aria-label=\"Radio button for following text input\" data-rate-id=\"{{rates.id}}\" data-order-id=\"{{order.id}}\" {% if default_shipping == rates.id %}checked=\"checked\"{% endif %}>
                </div>
            </div>
            <p>&nbsp;&nbsp;&nbsp;&nbsp; <strong>£{{rates.amount / 100 | number_format(2)}}</strong> - {{rates.description}}</p>
        </div>
        {% endfor %}
    </form>
</div>
", "shipping-options.html.twig", "/Users/jasonreid/Sites/furniture/twig_templates/shipping-options.html.twig");
    }
}
