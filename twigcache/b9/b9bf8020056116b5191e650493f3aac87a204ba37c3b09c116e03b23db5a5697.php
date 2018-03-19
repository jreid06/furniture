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
    <p><span class=\"font-weight-bold\">NOTE: </span><span class=\"text-muted\">All items will be dispatched within 2 working days. Delivery days are from when order has been dispatched</span> </p>
    <br>
    <form id=\"shipping-method-radios\">
        ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["shipping_methods"] ?? null));
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
            echo "\" data-ep-order-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["easypost_order"] ?? null), "id", array()), "html", null, true);
            echo "\" data-carrier=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["ep_shipping_methods"] ?? null), $this->getAttribute($context["loop"], "index0", array()), array(), "array"), "carrier", array()), "html", null, true);
            echo "\" data-carrier-service=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["ep_shipping_methods"] ?? null), $this->getAttribute($context["loop"], "index0", array()), array(), "array"), "service", array()), "html", null, true);
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rates'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "    </form>
</div>
<div class=\"row\" id=\"test\">
    <!-- <div class=\"col-6\" style=\"border: 2px solid green; background-color: #d2d2d2; height: 400px; overflow-y:scroll; position: relative; z-index: 10000\">
        <pre>
            ";
        // line 20
        echo twig_escape_filter($this->env, ($context["order"] ?? null), "html", null, true);
        echo "
        </pre>
    </div> -->

    <!-- <div class=\"col-6\" style=\"border: 2px solid orange; background-color: #d2d2d2; height: 400px; overflow-y:scroll; position: relative; z-index: 10000\">
        <pre>
            ";
        // line 26
        echo twig_escape_filter($this->env, ($context["easypost_order"] ?? null), "html", null, true);
        echo "
        </pre>
    </div> -->

     <!-- <div class=\"col-6\" style=\"border: 2px solid green; background-color: #d2d2d2; height: 400px; overflow-y:scroll; position: relative; z-index: 10000\">
        <pre>
            ";
        // line 32
        echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, ($context["ep_shipping_methods"] ?? null)), "html", null, true);
        echo "
        </pre>
    </div>

    <div class=\"col-6\" style=\"border: 2px solid orange; background-color: #d2d2d2; height: 400px; overflow-y:scroll; position: relative; z-index: 10000\">
        <pre>
            ";
        // line 38
        echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, ($context["shipping_methods"] ?? null)), "html", null, true);
        echo "
        </pre>
    </div> -->
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
        return array (  118 => 38,  109 => 32,  100 => 26,  91 => 20,  84 => 15,  65 => 12,  47 => 9,  42 => 6,  25 => 5,  19 => 1,);
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
    <p><span class=\"font-weight-bold\">NOTE: </span><span class=\"text-muted\">All items will be dispatched within 2 working days. Delivery days are from when order has been dispatched</span> </p>
    <br>
    <form id=\"shipping-method-radios\">
        {% for rates in shipping_methods %}
        <div class=\"input-group\">
            <div class=\"input-group-prepend\">
                <div class=\"input-group-text\">
                    <input type=\"radio\" class=\"rate-radio\" aria-label=\"Radio button for following text input\" data-rate-id=\"{{rates.id}}\" data-order-id=\"{{order.id}}\" data-ep-order-id=\"{{easypost_order.id}}\" data-carrier=\"{{ep_shipping_methods[loop.index0].carrier}}\" data-carrier-service=\"{{ep_shipping_methods[loop.index0].service}}\" {% if default_shipping == rates.id %}checked=\"checked\"{% endif %}>
                </div>
            </div>
            <p>&nbsp;&nbsp;&nbsp;&nbsp; <strong>£{{rates.amount / 100 | number_format(2)}}</strong> - {{rates.description}}</p>
        </div>
        {% endfor %}
    </form>
</div>
<div class=\"row\" id=\"test\">
    <!-- <div class=\"col-6\" style=\"border: 2px solid green; background-color: #d2d2d2; height: 400px; overflow-y:scroll; position: relative; z-index: 10000\">
        <pre>
            {{ order }}
        </pre>
    </div> -->

    <!-- <div class=\"col-6\" style=\"border: 2px solid orange; background-color: #d2d2d2; height: 400px; overflow-y:scroll; position: relative; z-index: 10000\">
        <pre>
            {{ easypost_order }}
        </pre>
    </div> -->

     <!-- <div class=\"col-6\" style=\"border: 2px solid green; background-color: #d2d2d2; height: 400px; overflow-y:scroll; position: relative; z-index: 10000\">
        <pre>
            {{ dump(ep_shipping_methods) }}
        </pre>
    </div>

    <div class=\"col-6\" style=\"border: 2px solid orange; background-color: #d2d2d2; height: 400px; overflow-y:scroll; position: relative; z-index: 10000\">
        <pre>
            {{ dump(shipping_methods) }}
        </pre>
    </div> -->
</div>
", "shipping-options.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/shipping-options.html.twig");
    }
}
