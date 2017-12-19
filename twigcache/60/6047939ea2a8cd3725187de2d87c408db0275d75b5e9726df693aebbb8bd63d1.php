<?php

/* product.html.twig */
class __TwigTemplate_c601bbd2fd4ac8951510c856b8e6e526a0b825de33fd9015c1fe673b1d608a52 extends Twig_Template
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
        echo "<div class=\"container products-container home\">
    <div class=\"row\">
        <div class=\"col-12 breadcrumb\">
            ";
        // line 4
        echo twig_escape_filter($this->env, ($context["test"] ?? null), "html", null, true);
        echo "
        </div>
        <div class=\"col-12 col-md-7 d-flex flex-row flex-wrap\" id=\"product-page-image\">

            ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["product"] ?? null), "product_image", array()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 9
            echo "                ";
            if (($this->getAttribute($context["loop"], "index", array()) == 1)) {
                // line 10
                echo "                    <div class=\"p-2 product-image-main\">
                        <img src=\"";
                // line 11
                echo twig_escape_filter($this->env, $context["image"], "html", null, true);
                echo "\" id=\"main\" alt=\"product image ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\">
                    </div>
                ";
            } elseif (($this->getAttribute(            // line 13
$context["loop"], "index", array()) == 2)) {
                // line 14
                echo "                    <div class=\"p-2 product-image-small\">
                        <img src=\"";
                // line 15
                echo twig_escape_filter($this->env, $context["image"], "html", null, true);
                echo "\" alt=\"product image ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\">
                    </div>
                ";
            } elseif (($this->getAttribute(            // line 17
$context["loop"], "index", array()) == 3)) {
                // line 18
                echo "                    <div class=\"p-2 product-image-small\">
                        <img src=\"";
                // line 19
                echo twig_escape_filter($this->env, $context["image"], "html", null, true);
                echo "\" alt=\"product image ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\">
                    </div>
                ";
            } else {
                // line 22
                echo "                    <div class=\"p-2 product-image-small\">
                        <img src=\"";
                // line 23
                echo twig_escape_filter($this->env, $context["image"], "html", null, true);
                echo "\" alt=\"product image ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\">
                    </div>
                ";
            }
            // line 26
            echo "
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "            <!--  -->

        </div>
        <div class=\"col-12 col-md-5 d-flex flex-row flex-wrap\" id=\"product-page-ifno\">
            <div class=\"p-2 product-heading\">

                <ul>
                    <li><h4>";
        // line 35
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('start_case')->getCallable(), array($this->getAttribute(($context["product"] ?? null), "product_name", array()))), "html", null, true);
        echo "</h4></li>
                    <li>£";
        // line 36
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute(($context["product"] ?? null), "price", array()), 2), "html", null, true);
        echo "</li>

                    <li>
                        <p> <strong>Description:</strong> </p>
                        <p>";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute(($context["product"] ?? null), "product_description", array()), "html", null, true);
        echo "</p>
                    </li>
                    <li>
                        <button class=\"btn btn-primary\" v-on:click=\"addToBasket\" data-product-info=\"";
        // line 43
        echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["product"] ?? null)), "html", null, true);
        echo "\">Add to Basket</button>
                    </li>
                </ul>

            </div>
            <div class=\"p-2\">


            <!-- this is the how we will get product id when user clicks view product -->
                <!-- <button class=\"btn btn-info\" name=\"button\" data-product-id=\"\" v-on:click=\"updateSelected\">View Product</button> -->
            </div>
            <div class=\"p-2\">
                <pre>
                    ";
        // line 56
        echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, ($context["product"] ?? null)), "html", null, true);
        echo "
                </pre>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 56,  138 => 43,  132 => 40,  125 => 36,  121 => 35,  112 => 28,  97 => 26,  89 => 23,  86 => 22,  78 => 19,  75 => 18,  73 => 17,  66 => 15,  63 => 14,  61 => 13,  54 => 11,  51 => 10,  48 => 9,  31 => 8,  24 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"container products-container home\">
    <div class=\"row\">
        <div class=\"col-12 breadcrumb\">
            {{test}}
        </div>
        <div class=\"col-12 col-md-7 d-flex flex-row flex-wrap\" id=\"product-page-image\">

            {% for image in product.product_image %}
                {% if loop.index == 1 %}
                    <div class=\"p-2 product-image-main\">
                        <img src=\"{{image}}\" id=\"main\" alt=\"product image {{loop.index}}\">
                    </div>
                {% elseif loop.index == 2 %}
                    <div class=\"p-2 product-image-small\">
                        <img src=\"{{image}}\" alt=\"product image {{loop.index}}\">
                    </div>
                {% elseif loop.index == 3 %}
                    <div class=\"p-2 product-image-small\">
                        <img src=\"{{image}}\" alt=\"product image {{loop.index}}\">
                    </div>
                {% else %}
                    <div class=\"p-2 product-image-small\">
                        <img src=\"{{image}}\" alt=\"product image {{loop.index}}\">
                    </div>
                {% endif %}

            {% endfor %}
            <!--  -->

        </div>
        <div class=\"col-12 col-md-5 d-flex flex-row flex-wrap\" id=\"product-page-ifno\">
            <div class=\"p-2 product-heading\">

                <ul>
                    <li><h4>{{product.product_name|start_case}}</h4></li>
                    <li>£{{product.price|number_format(2)}}</li>

                    <li>
                        <p> <strong>Description:</strong> </p>
                        <p>{{product.product_description}}</p>
                    </li>
                    <li>
                        <button class=\"btn btn-primary\" v-on:click=\"addToBasket\" data-product-info=\"{{product|json_encode()}}\">Add to Basket</button>
                    </li>
                </ul>

            </div>
            <div class=\"p-2\">


            <!-- this is the how we will get product id when user clicks view product -->
                <!-- <button class=\"btn btn-info\" name=\"button\" data-product-id=\"\" v-on:click=\"updateSelected\">View Product</button> -->
            </div>
            <div class=\"p-2\">
                <pre>
                    {{dump(product)}}
                </pre>
            </div>
        </div>
    </div>
</div>
", "product.html.twig", "/Users/jasonreid/Sites/furniture/twig_templates/product.html.twig");
    }
}
