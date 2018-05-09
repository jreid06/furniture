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
        echo "<div class=\"container-fluid products-container home\">
    <div class=\"row\">
        <div class=\"col-12 breadcrumb-container\">
            <nav aria-label=\"breadcrumb\" role=\"navigation\">
              <ol class=\"breadcrumb\">
                <li class=\"breadcrumb-item\"><a href=\"/\">Home</a></li>
                <li class=\"breadcrumb-item\"><a href=\"/products\">Products</a></li>
                <li class=\"breadcrumb-item\"><a href=\"/products/";
        // line 8
        echo twig_escape_filter($this->env, ($context["category"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ($context["category"] ?? null), "html", null, true);
        echo "</a></li>
                <li class=\"breadcrumb-item\"><a href=\"/products/";
        // line 9
        echo twig_escape_filter($this->env, ($context["category"] ?? null), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
        echo "</a></li>
                <li class=\"breadcrumb-item active\" aria-current=\"page\">
                ";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('start_case')->getCallable(), array($this->getAttribute(($context["product"] ?? null), "name", array()))), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('start_case')->getCallable(), array($this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array()), "color", array()))), "html", null, true);
        echo " ";
        if (($this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array()), "size", array()) != "none")) {
            echo "- ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array()), "size", array()), "html", null, true);
            echo " ";
        }
        echo "</li>
              </ol>
              <!--  -->
            </nav>
        </div>
        <div class=\"col-12 col-md-6 d-flex flex-row flex-wrap\" id=\"product-page-image\">
            <!-- <pre>
                ";
        // line 18
        echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, ($context["test"] ?? null)), "html", null, true);
        echo "
            </pre> -->

            ";
        // line 21
        if (($context["images"] ?? null)) {
            // line 22
            echo "                <div class=\"p-2 product-image-main\">
                    <img src=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute(($context["images"] ?? null), 0, array(), "array"), "html", null, true);
            echo "\" id=\"main\" alt=\"product image 1\">
                </div>
                <div class=\"p-2 prodimg-box\">
                    <img src=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute(($context["images"] ?? null), 0, array(), "array"), "html", null, true);
            echo "\" id=\"p-img-1\" class=\"active-img\" alt=\"product image 1\" @click=\"toggleMainImage\">
                    <img src=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute(($context["images"] ?? null), 1, array(), "array"), "html", null, true);
            echo "\" id=\"p-img-2\" alt=\"product image 2\" @click=\"toggleMainImage\">
                    <img src=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute(($context["images"] ?? null), 2, array(), "array"), "html", null, true);
            echo "\" id=\"p-img-3\" alt=\"product image 3\" @click=\"toggleMainImage\">
                    <img src=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute(($context["images"] ?? null), 3, array(), "array"), "html", null, true);
            echo "\" id=\"p-img-4\" alt=\"product image 4\" @click=\"toggleMainImage\">
                </div>
            ";
        } else {
            // line 32
            echo "                <div class=\"p-2 product-image-main\">
                    <img src=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute(($context["skuprod"] ?? null), "image", array()), "html", null, true);
            echo "\" id=\"main\" alt=\"product image 1\">
                </div>

            ";
        }
        // line 37
        echo "


        </div>

        <div class=\"col-12 col-md-6\">
            <div class=\"row d-flex flex-row flex-wrap\">
                <div class=\"p-2 product-info-sp\">

                    <ul>
                        <li><h4>";
        // line 47
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('start_case')->getCallable(), array($this->getAttribute(($context["product"] ?? null), "name", array()))), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('start_case')->getCallable(), array($this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array()), "color", array()))), "html", null, true);
        echo " ";
        if (($this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array()), "size", array()) != "none")) {
            echo "- ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('start_case')->getCallable(), array($this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array()), "size", array()))), "html", null, true);
            echo " ";
        }
        echo "</h4></li>
                        <li>£&nbsp;";
        // line 48
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute(($context["skuprod"] ?? null), "price", array()) / 100), 2), "html", null, true);
        echo "</li>

                        <li>
                            <div class=\"addBasket-row\">
                                <div class=\"box\">
                                    <p id=\"quantity-count\">1</p>
                                </div>
                                <div class=\"box\">
                                    <p @click=\"addtoQuant\"><span class=\"fa fa-plus\" ></span></p>
                                    <p @click=\"minustoQuant\"><span class=\"fa fa-minus\" ></span></p>
                                </div>
                                <div class=\"box\" data-product-info=\"";
        // line 59
        echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["skuprod"] ?? null)), "html", null, true);
        echo "\" v-on:click=\"addToBasket\">
                                    &plus;&nbsp;Add to Bag
                                </div>
                                <div class=\"box\">
                                    <p id=\"wishlist-heart\" data-product-info=\"";
        // line 63
        echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["skuprod"] ?? null)), "html", null, true);
        echo "\" v-on:click=\"addToWishlist\"><span data-product-info=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["skuprod"] ?? null)), "html", null, true);
        echo "\"class=\"wishlist-heart-icon fa fa-heart-o\"></span></p>
                                </div>
                            </div>
                        </li>

                    </ul>


                </div>
            </div>


            <div id=\"accordion\" role=\"tablist\">


                        <!-- cards will be used for the accordion in products description, shipping and returns information

                        quantity for item must be selected

                        add items to wishlist heart must be visible. (Only in use if user has account e.g logged in) -->



                    <div class=\"card pr-info-card\">
                        <div class=\"card-header\" role=\"tab\" id=\"pr_description\">
                            <h5 class=\"mb-0\">
                                <a class=\"pr-info-link\" data-toggle=\"collapse\" href=\"#prod-description\" role=\"button\" aria-expanded=\"true\" aria-control=\"prod_description\">
                                    description
                                    <span class=\"fa fa-minus open-accordion\" id=\"desc\"></span>
                                </a>
                            </h5>
                        </div>

                        <div id=\"prod-description\" class=\"collapse show\" role=\"tabpanel\" aria-labelledby=\"description\" data-parent=\"#accordion\">
                            <div class=\"card-body\">
                                ";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute(($context["product"] ?? null), "description", array()), "html", null, true);
        echo "

                                ";
        // line 100
        if ($this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array(), "any", false, true), "detail_bullets", array(), "any", true, true)) {
            // line 101
            echo "                                    <ul>
                                        ";
            // line 102
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array()), "detail_bullets", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["bullet"]) {
                // line 103
                echo "                                            <li>&nbsp;";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array($context["bullet"])), "html", null, true);
                echo "</li>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bullet'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 105
            echo "                                    </ul>
                                ";
        }
        // line 107
        echo "
                            </div>
                        </div>
                    </div>


                    <div class=\"card pr-info-card\">
                        <div class=\"card-header\" role=\"tab\" id=\"pr_shipping\">
                            <h5 class=\"mb-0\">
                                <a class=\"pr-info-link\" data-toggle=\"collapse\" href=\"#prod-shipping\" role=\"button\" aria-expanded=\"true\" aria-control=\"prod_description\">
                                    shipping
                                    <span class=\"fa fa-plus closed-accordion\" id=\"shipping\"></span>
                                </a>
                            </h5>
                        </div>

                        <div id=\"prod-shipping\" class=\"collapse\" role=\"tabpanel\" aria-labelledby=\"description\" data-parent=\"#accordion\">
                            <div class=\"card-body\">

                                <pre>
                                    ";
        // line 127
        echo twig_escape_filter($this->env, ($context["basket"] ?? null), "html", null, true);
        echo "
                                </pre>

                            </div>
                        </div>
                    </div>

                    <div class=\"card pr-info-card\">
                        <div class=\"card-header\" role=\"tab\" id=\"pr_returns\">
                            <h5 class=\"mb-0\">
                                <a class=\"pr-info-link\"data-toggle=\"collapse\" href=\"#prod-returns\" role=\"button\" aria-expanded=\"true\" aria-control=\"prod_description\">
                                    returns
                                    <span class=\"fa fa-plus closed-accordion\" id=\"return\"></span>
                                </a>
                            </h5>
                        </div>

                        <div id=\"prod-returns\" class=\"collapse\" role=\"tabpanel\" aria-labelledby=\"description\" data-parent=\"#accordion\">
                            <div class=\"card-body\">

                                <!-- <button class=\"btn btn-info payOrder\" v-on:click=\"payment\" data-customer=\"\" data-shipping-address=\"true\">Confirm order & pay order</button> -->

                                <pre>

                                </pre>
                            </div>
                        </div>
                    </div>

                </div>

        </div>

        <!-- <div class=\"col-12\">
            <div class=\"\">

            </div>

        </div> -->

        <div class=\"col-12 related-products\">
            <hr style=\"background-color: #222\">
            <h5 class=\"text-center\">you might also like</h5>

            <div class=\"row related-products-row\">
                ";
        // line 172
        $this->loadTemplate("featured.html.twig", "product.html.twig", 172)->display($context);
        // line 173
        echo "            </div>
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
        return array (  290 => 173,  288 => 172,  240 => 127,  218 => 107,  214 => 105,  205 => 103,  201 => 102,  198 => 101,  196 => 100,  191 => 98,  151 => 63,  144 => 59,  130 => 48,  118 => 47,  106 => 37,  99 => 33,  96 => 32,  90 => 29,  86 => 28,  82 => 27,  78 => 26,  72 => 23,  69 => 22,  67 => 21,  61 => 18,  43 => 11,  34 => 9,  28 => 8,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"container-fluid products-container home\">
    <div class=\"row\">
        <div class=\"col-12 breadcrumb-container\">
            <nav aria-label=\"breadcrumb\" role=\"navigation\">
              <ol class=\"breadcrumb\">
                <li class=\"breadcrumb-item\"><a href=\"/\">Home</a></li>
                <li class=\"breadcrumb-item\"><a href=\"/products\">Products</a></li>
                <li class=\"breadcrumb-item\"><a href=\"/products/{{category}}\">{{category}}</a></li>
                <li class=\"breadcrumb-item\"><a href=\"/products/{{category}}/{{type}}\">{{type}}</a></li>
                <li class=\"breadcrumb-item active\" aria-current=\"page\">
                {{product.name |start_case}} - {{skuprod.attributes.color |start_case()}} {% if skuprod.attributes.size != 'none' %}- {{skuprod.attributes.size}} {% endif %}</li>
              </ol>
              <!--  -->
            </nav>
        </div>
        <div class=\"col-12 col-md-6 d-flex flex-row flex-wrap\" id=\"product-page-image\">
            <!-- <pre>
                {{dump(test)}}
            </pre> -->

            {% if images %}
                <div class=\"p-2 product-image-main\">
                    <img src=\"{{images[0]}}\" id=\"main\" alt=\"product image 1\">
                </div>
                <div class=\"p-2 prodimg-box\">
                    <img src=\"{{images[0]}}\" id=\"p-img-1\" class=\"active-img\" alt=\"product image 1\" @click=\"toggleMainImage\">
                    <img src=\"{{images[1]}}\" id=\"p-img-2\" alt=\"product image 2\" @click=\"toggleMainImage\">
                    <img src=\"{{images[2]}}\" id=\"p-img-3\" alt=\"product image 3\" @click=\"toggleMainImage\">
                    <img src=\"{{images[3]}}\" id=\"p-img-4\" alt=\"product image 4\" @click=\"toggleMainImage\">
                </div>
            {% else %}
                <div class=\"p-2 product-image-main\">
                    <img src=\"{{skuprod.image}}\" id=\"main\" alt=\"product image 1\">
                </div>

            {% endif %}



        </div>

        <div class=\"col-12 col-md-6\">
            <div class=\"row d-flex flex-row flex-wrap\">
                <div class=\"p-2 product-info-sp\">

                    <ul>
                        <li><h4>{{product.name |start_case}} - {{skuprod.attributes.color |start_case()}} {% if skuprod.attributes.size != 'none' %}- {{skuprod.attributes.size |start_case()}} {% endif %}</h4></li>
                        <li>£&nbsp;{{(skuprod.price/100)|number_format(2)}}</li>

                        <li>
                            <div class=\"addBasket-row\">
                                <div class=\"box\">
                                    <p id=\"quantity-count\">1</p>
                                </div>
                                <div class=\"box\">
                                    <p @click=\"addtoQuant\"><span class=\"fa fa-plus\" ></span></p>
                                    <p @click=\"minustoQuant\"><span class=\"fa fa-minus\" ></span></p>
                                </div>
                                <div class=\"box\" data-product-info=\"{{skuprod|json_encode()}}\" v-on:click=\"addToBasket\">
                                    &plus;&nbsp;Add to Bag
                                </div>
                                <div class=\"box\">
                                    <p id=\"wishlist-heart\" data-product-info=\"{{skuprod|json_encode()}}\" v-on:click=\"addToWishlist\"><span data-product-info=\"{{skuprod|json_encode()}}\"class=\"wishlist-heart-icon fa fa-heart-o\"></span></p>
                                </div>
                            </div>
                        </li>

                    </ul>


                </div>
            </div>


            <div id=\"accordion\" role=\"tablist\">


                        <!-- cards will be used for the accordion in products description, shipping and returns information

                        quantity for item must be selected

                        add items to wishlist heart must be visible. (Only in use if user has account e.g logged in) -->



                    <div class=\"card pr-info-card\">
                        <div class=\"card-header\" role=\"tab\" id=\"pr_description\">
                            <h5 class=\"mb-0\">
                                <a class=\"pr-info-link\" data-toggle=\"collapse\" href=\"#prod-description\" role=\"button\" aria-expanded=\"true\" aria-control=\"prod_description\">
                                    description
                                    <span class=\"fa fa-minus open-accordion\" id=\"desc\"></span>
                                </a>
                            </h5>
                        </div>

                        <div id=\"prod-description\" class=\"collapse show\" role=\"tabpanel\" aria-labelledby=\"description\" data-parent=\"#accordion\">
                            <div class=\"card-body\">
                                {{product.description}}

                                {% if skuprod.attributes.detail_bullets is defined %}
                                    <ul>
                                        {% for bullet in skuprod.attributes.detail_bullets %}
                                            <li>&nbsp;{{bullet | camel_case()}}</li>
                                        {% endfor %}
                                    </ul>
                                {% endif %}

                            </div>
                        </div>
                    </div>


                    <div class=\"card pr-info-card\">
                        <div class=\"card-header\" role=\"tab\" id=\"pr_shipping\">
                            <h5 class=\"mb-0\">
                                <a class=\"pr-info-link\" data-toggle=\"collapse\" href=\"#prod-shipping\" role=\"button\" aria-expanded=\"true\" aria-control=\"prod_description\">
                                    shipping
                                    <span class=\"fa fa-plus closed-accordion\" id=\"shipping\"></span>
                                </a>
                            </h5>
                        </div>

                        <div id=\"prod-shipping\" class=\"collapse\" role=\"tabpanel\" aria-labelledby=\"description\" data-parent=\"#accordion\">
                            <div class=\"card-body\">

                                <pre>
                                    {{ basket }}
                                </pre>

                            </div>
                        </div>
                    </div>

                    <div class=\"card pr-info-card\">
                        <div class=\"card-header\" role=\"tab\" id=\"pr_returns\">
                            <h5 class=\"mb-0\">
                                <a class=\"pr-info-link\"data-toggle=\"collapse\" href=\"#prod-returns\" role=\"button\" aria-expanded=\"true\" aria-control=\"prod_description\">
                                    returns
                                    <span class=\"fa fa-plus closed-accordion\" id=\"return\"></span>
                                </a>
                            </h5>
                        </div>

                        <div id=\"prod-returns\" class=\"collapse\" role=\"tabpanel\" aria-labelledby=\"description\" data-parent=\"#accordion\">
                            <div class=\"card-body\">

                                <!-- <button class=\"btn btn-info payOrder\" v-on:click=\"payment\" data-customer=\"\" data-shipping-address=\"true\">Confirm order & pay order</button> -->

                                <pre>

                                </pre>
                            </div>
                        </div>
                    </div>

                </div>

        </div>

        <!-- <div class=\"col-12\">
            <div class=\"\">

            </div>

        </div> -->

        <div class=\"col-12 related-products\">
            <hr style=\"background-color: #222\">
            <h5 class=\"text-center\">you might also like</h5>

            <div class=\"row related-products-row\">
                {% include 'featured.html.twig' %}
            </div>
        </div>
    </div>
</div>
", "product.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/product.html.twig");
    }
}
