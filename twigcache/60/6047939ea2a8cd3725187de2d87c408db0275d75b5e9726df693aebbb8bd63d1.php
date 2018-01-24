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
                <li class=\"breadcrumb-item active\" aria-current=\"page\">";
        // line 8
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('start_case')->getCallable(), array($this->getAttribute(($context["product"] ?? null), "product_name", array()))), "html", null, true);
        echo "</li>
              </ol>
              <!--  -->
            </nav>
        </div>
        <div class=\"col-12 col-md-6 d-flex flex-row flex-wrap\" id=\"product-page-image\">

            <div class=\"p-2 product-image-main\">
                <img src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["product"] ?? null), "product_image", array()), "image1", array()), "html", null, true);
        echo "\" id=\"main\" alt=\"product image 1\">
            </div>
            <div class=\"p-2 prodimg-box\">
                <img src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["product"] ?? null), "product_image", array()), "image1", array()), "html", null, true);
        echo "\" alt=\"product image 2\">
                <img src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["product"] ?? null), "product_image", array()), "image3", array()), "html", null, true);
        echo "\" alt=\"product image 2\">
                <img src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["product"] ?? null), "product_image", array()), "image2", array()), "html", null, true);
        echo "\" alt=\"product image 2\">
                <img src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["product"] ?? null), "product_image", array()), "image3", array()), "html", null, true);
        echo "\" alt=\"product image 2\">
            </div>
            <!--  -->

        </div>

        <div class=\"col-12 col-md-6\">
            <div class=\"row d-flex flex-row flex-wrap\">
                <div class=\"p-2 product-info-sp\">

                    <ul>
                        <li><h4>";
        // line 33
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('start_case')->getCallable(), array($this->getAttribute(($context["product"] ?? null), "product_name", array()))), "html", null, true);
        echo "</h4></li>
                        <li>£&nbsp;";
        // line 34
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute(($context["product"] ?? null), "price", array()), 2), "html", null, true);
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
        // line 45
        echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["product"] ?? null)), "html", null, true);
        echo "\" v-on:click=\"addToBasket\">
                                    &plus;&nbsp;Add to Bag
                                </div>
                                <div class=\"box\">
                                    <p id=\"wishlist-heart\" data-product-info=\"";
        // line 49
        echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["product"] ?? null)), "html", null, true);
        echo "\" v-on:click=\"addToWishlist\"><span data-product-info=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["product"] ?? null)), "html", null, true);
        echo "\"class=\"wishlist-heart-icon fa fa-heart-o\"></span></p>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <!-- // NOTE -->
                    <!--
                    this is the how we will get product id when user clicks view product
                        <button class=\"btn btn-info\" name=\"button\" data-product-id=\"\" v-on:click=\"updateSelected\">View Product</button>
                <div class=\"p-2\">
                        <pre>
                            ";
        // line 63
        echo "                        </pre>
                    </div> -->

                </div>
            </div>


            <div id=\"accordion\" role=\"tablist\">

                    <!--
                        cards will be used for the accordion in products description, shipping and returns information

                        quantity for item must be selected

                        add items to wishlist heart must be visible. (Only in use if user has account e.g logged in)

                    -->
                    <!--  -->
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
        // line 93
        echo twig_escape_filter($this->env, $this->getAttribute(($context["product"] ?? null), "product_description", array()), "html", null, true);
        echo "

                                <ul>
                                    <li>&nbsp;";
        // line 96
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array("foax fur")), "html", null, true);
        echo "</li>
                                    <li>&nbsp;";
        // line 97
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array("made with cotton")), "html", null, true);
        echo "</li>
                                    <li>&nbsp;";
        // line 98
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array("designed in london")), "html", null, true);
        echo "</li>

                                    ";
        // line 100
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["seq"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 101
            echo "                                        <li>test</li>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 103
        echo "                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--  -->

                    <!--  -->
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
                                <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->
                                <pre>
                                    ";
        // line 124
        echo twig_escape_filter($this->env, ($context["basket"] ?? null), "html", null, true);
        echo "
                                </pre>

                            </div>
                        </div>
                    </div>
                    <!--  -->

                    <!--  -->
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
                                <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->
                                <button class=\"btn btn-info payOrder\" v-on:click=\"payment\" data-customer=\"";
        // line 146
        echo twig_escape_filter($this->env, ($context["customer_details"] ?? null), "html", null, true);
        echo "\" data-shipping-address=\"true\">Confirm order & pay order</button>

                                <pre>

                                </pre>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>

        </div>
        <div class=\"col-12\">
            <div class=\"\">

            </div>
            <!-- <div class=\"\">
                <button class=\"btn btn-success\">pay for order</button>
            </div> -->
        </div>

        <div class=\"col-12 related-products\">
            <hr style=\"background-color: #222\">
            <h5 class=\"text-center\">you might also like</h5>

            <div class=\"row related-products-row\">
                <featured
                        v-for=\"(featured, index) in featuredProducts\"
                        v-bind:key=\"index\"
                        v-bind:indexkey=\"index\"
                        v-bind:productid=\"featured.id\"
                        v-bind:productimage=\"featured.product_image.image1\"
                        v-bind:producttitle=\"featured.product_name\"
                        v-bind:productprice=\"featured.price\">
                </featured>
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
        return array (  224 => 146,  199 => 124,  176 => 103,  169 => 101,  165 => 100,  160 => 98,  156 => 97,  152 => 96,  146 => 93,  114 => 63,  96 => 49,  89 => 45,  75 => 34,  71 => 33,  57 => 22,  53 => 21,  49 => 20,  45 => 19,  39 => 16,  28 => 8,  19 => 1,);
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
                <li class=\"breadcrumb-item active\" aria-current=\"page\">{{product.product_name |start_case}}</li>
              </ol>
              <!--  -->
            </nav>
        </div>
        <div class=\"col-12 col-md-6 d-flex flex-row flex-wrap\" id=\"product-page-image\">

            <div class=\"p-2 product-image-main\">
                <img src=\"{{product.product_image.image1}}\" id=\"main\" alt=\"product image 1\">
            </div>
            <div class=\"p-2 prodimg-box\">
                <img src=\"{{product.product_image.image1}}\" alt=\"product image 2\">
                <img src=\"{{product.product_image.image3}}\" alt=\"product image 2\">
                <img src=\"{{product.product_image.image2}}\" alt=\"product image 2\">
                <img src=\"{{product.product_image.image3}}\" alt=\"product image 2\">
            </div>
            <!--  -->

        </div>

        <div class=\"col-12 col-md-6\">
            <div class=\"row d-flex flex-row flex-wrap\">
                <div class=\"p-2 product-info-sp\">

                    <ul>
                        <li><h4>{{product.product_name|start_case}}</h4></li>
                        <li>£&nbsp;{{product.price|number_format(2)}}</li>

                        <li>
                            <div class=\"addBasket-row\">
                                <div class=\"box\">
                                    <p id=\"quantity-count\">1</p>
                                </div>
                                <div class=\"box\">
                                    <p @click=\"addtoQuant\"><span class=\"fa fa-plus\" ></span></p>
                                    <p @click=\"minustoQuant\"><span class=\"fa fa-minus\" ></span></p>
                                </div>
                                <div class=\"box\" data-product-info=\"{{product|json_encode()}}\" v-on:click=\"addToBasket\">
                                    &plus;&nbsp;Add to Bag
                                </div>
                                <div class=\"box\">
                                    <p id=\"wishlist-heart\" data-product-info=\"{{product|json_encode()}}\" v-on:click=\"addToWishlist\"><span data-product-info=\"{{product|json_encode()}}\"class=\"wishlist-heart-icon fa fa-heart-o\"></span></p>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <!-- // NOTE -->
                    <!--
                    this is the how we will get product id when user clicks view product
                        <button class=\"btn btn-info\" name=\"button\" data-product-id=\"\" v-on:click=\"updateSelected\">View Product</button>
                <div class=\"p-2\">
                        <pre>
                            {#{dump(product)}#}
                        </pre>
                    </div> -->

                </div>
            </div>


            <div id=\"accordion\" role=\"tablist\">

                    <!--
                        cards will be used for the accordion in products description, shipping and returns information

                        quantity for item must be selected

                        add items to wishlist heart must be visible. (Only in use if user has account e.g logged in)

                    -->
                    <!--  -->
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
                                {{product.product_description}}

                                <ul>
                                    <li>&nbsp;{{'foax fur'| camel_case()}}</li>
                                    <li>&nbsp;{{'made with cotton'| camel_case()}}</li>
                                    <li>&nbsp;{{'designed in london'| camel_case()}}</li>

                                    {% for item in seq %}
                                        <li>test</li>
                                    {% endfor %}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--  -->

                    <!--  -->
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
                                <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->
                                <pre>
                                    {{ basket }}
                                </pre>

                            </div>
                        </div>
                    </div>
                    <!--  -->

                    <!--  -->
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
                                <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->
                                <button class=\"btn btn-info payOrder\" v-on:click=\"payment\" data-customer=\"{{customer_details}}\" data-shipping-address=\"true\">Confirm order & pay order</button>

                                <pre>

                                </pre>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>

        </div>
        <div class=\"col-12\">
            <div class=\"\">

            </div>
            <!-- <div class=\"\">
                <button class=\"btn btn-success\">pay for order</button>
            </div> -->
        </div>

        <div class=\"col-12 related-products\">
            <hr style=\"background-color: #222\">
            <h5 class=\"text-center\">you might also like</h5>

            <div class=\"row related-products-row\">
                <featured
                        v-for=\"(featured, index) in featuredProducts\"
                        v-bind:key=\"index\"
                        v-bind:indexkey=\"index\"
                        v-bind:productid=\"featured.id\"
                        v-bind:productimage=\"featured.product_image.image1\"
                        v-bind:producttitle=\"featured.product_name\"
                        v-bind:productprice=\"featured.price\">
                </featured>
            </div>
        </div>
    </div>
</div>
", "product.html.twig", "/Users/jasonreid/Sites/furniture/twig_templates/product.html.twig");
    }
}
