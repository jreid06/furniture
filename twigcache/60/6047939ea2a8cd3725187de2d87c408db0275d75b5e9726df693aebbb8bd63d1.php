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
                <li class=\"breadcrumb-item active\" aria-current=\"page\">";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('start_case')->getCallable(), array($this->getAttribute(($context["product"] ?? null), "name", array()))), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('start_case')->getCallable(), array($this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array()), "color", array()))), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array()), "size", array()), "html", null, true);
        echo "</li>
              </ol>
              <!--  -->
            </nav>
        </div>
        <div class=\"col-12 col-md-6 d-flex flex-row flex-wrap\" id=\"product-page-image\">
            <!-- <pre>
                ";
        // line 17
        echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, ($context["skuprod"] ?? null)), "html", null, true);
        echo "
            </pre> -->
            <div class=\"p-2 product-image-main\">
                <img src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute(($context["skuprod"] ?? null), "image", array()), "html", null, true);
        echo "\" id=\"main\" alt=\"product image 1\">
            </div>
            <div class=\"p-2 prodimg-box\">
                <img src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute(($context["skuprod"] ?? null), "image", array()), "html", null, true);
        echo "\" alt=\"product image 2\">
                <img src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute(($context["skuprod"] ?? null), "image", array()), "html", null, true);
        echo "\" alt=\"product image 2\">
                <img src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute(($context["skuprod"] ?? null), "image", array()), "html", null, true);
        echo "\" alt=\"product image 2\">
                <img src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute(($context["skuprod"] ?? null), "image", array()), "html", null, true);
        echo "\" alt=\"product image 2\">
            </div>


        </div>

        <div class=\"col-12 col-md-6\">
            <div class=\"row d-flex flex-row flex-wrap\">
                <div class=\"p-2 product-info-sp\">

                    <ul>
                        <li><h4>";
        // line 37
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('start_case')->getCallable(), array($this->getAttribute(($context["product"] ?? null), "name", array()))), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('start_case')->getCallable(), array($this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array()), "color", array()))), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('start_case')->getCallable(), array($this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array()), "size", array()))), "html", null, true);
        echo "</h4></li>
                        <li>£&nbsp;";
        // line 38
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
        // line 49
        echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["skuprod"] ?? null)), "html", null, true);
        echo "\" v-on:click=\"addToBasket\">
                                    &plus;&nbsp;Add to Bag
                                </div>
                                <div class=\"box\">
                                    <p id=\"wishlist-heart\" data-product-info=\"";
        // line 53
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
                                <strong>";
        // line 88
        echo twig_escape_filter($this->env, $this->getAttribute(($context["product"] ?? null), "description", array()), "html", null, true);
        echo "</strong>

                                ";
        // line 90
        if ($this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array(), "any", false, true), "detail_bullets", array(), "any", true, true)) {
            // line 91
            echo "                                    <ul>
                                        ";
            // line 92
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array()), "detail_bullets", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["bullet"]) {
                // line 93
                echo "                                            <li>&nbsp;";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array($context["bullet"])), "html", null, true);
                echo "</li>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bullet'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "                                    </ul>
                                ";
        }
        // line 97
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
        // line 117
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
                <!-- <featured
                        v-for=\"(featured, index) in featuredProducts\"
                        v-bind:key=\"index\"
                        v-bind:indexkey=\"index\"
                        v-bind:productid=\"featured.id\"
                        v-bind:productskuid=\"featured.skus.data[0].id\"
                        v-bind:productimage=\"featured.images[0]\"
                        v-bind:producttitle=\"featured.name\"
                        v-bind:productnameslug=\"featured.metadata.slug\"
                        v-bind:productcolorslug=\"featured.skus.data[0].attributes.color\"
                        v-bind:productsizeslug=\"featured.skus.data[0].attributes.size\"
                        v-bind:productprice=\"featured.skus.data[0].price\"
                        v-bind:productcat = \"featured.skus.data[0].attributes.category\"
                        v-bind:productcattype=\"featured.skus.data[0].attributes.type\">
                </featured> -->
                <!-- <featured
                        v-for=\"(featured, index) in featuredProducts\"
                        v-bind:key=\"index\"
                        v-bind:indexkey=\"index\"
                        v-bind:productdbid=\"featured.id\"
                        v-bind:productid=\"featured.product_id\"
                        v-bind:productimage=\"featured.product_image.image1\"
                        v-bind:producttitle=\"featured.product_name\"
                        v-bind:productnameslug=\"featured.name_slug\"
                        v-bind:productprice=\"featured.price\"
                        v-bind:productcat=\"featured.product_category\"
                        v-bind:productcattype=\"featured.inner_cat_slug\">
                </featured> -->
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
        return array (  212 => 117,  190 => 97,  186 => 95,  177 => 93,  173 => 92,  170 => 91,  168 => 90,  163 => 88,  123 => 53,  116 => 49,  102 => 38,  94 => 37,  80 => 26,  76 => 25,  72 => 24,  68 => 23,  62 => 20,  56 => 17,  42 => 10,  34 => 9,  28 => 8,  19 => 1,);
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
                <li class=\"breadcrumb-item active\" aria-current=\"page\">{{product.name |start_case}} - {{skuprod.attributes.color |start_case()}} - {{skuprod.attributes.size}}</li>
              </ol>
              <!--  -->
            </nav>
        </div>
        <div class=\"col-12 col-md-6 d-flex flex-row flex-wrap\" id=\"product-page-image\">
            <!-- <pre>
                {{dump(skuprod)}}
            </pre> -->
            <div class=\"p-2 product-image-main\">
                <img src=\"{{skuprod.image}}\" id=\"main\" alt=\"product image 1\">
            </div>
            <div class=\"p-2 prodimg-box\">
                <img src=\"{{skuprod.image}}\" alt=\"product image 2\">
                <img src=\"{{skuprod.image}}\" alt=\"product image 2\">
                <img src=\"{{skuprod.image}}\" alt=\"product image 2\">
                <img src=\"{{skuprod.image}}\" alt=\"product image 2\">
            </div>


        </div>

        <div class=\"col-12 col-md-6\">
            <div class=\"row d-flex flex-row flex-wrap\">
                <div class=\"p-2 product-info-sp\">

                    <ul>
                        <li><h4>{{product.name |start_case}} - {{skuprod.attributes.color |start_case()}} - {{skuprod.attributes.size |start_case()}}</h4></li>
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
                                <strong>{{product.description}}</strong>

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
                <!-- <featured
                        v-for=\"(featured, index) in featuredProducts\"
                        v-bind:key=\"index\"
                        v-bind:indexkey=\"index\"
                        v-bind:productid=\"featured.id\"
                        v-bind:productskuid=\"featured.skus.data[0].id\"
                        v-bind:productimage=\"featured.images[0]\"
                        v-bind:producttitle=\"featured.name\"
                        v-bind:productnameslug=\"featured.metadata.slug\"
                        v-bind:productcolorslug=\"featured.skus.data[0].attributes.color\"
                        v-bind:productsizeslug=\"featured.skus.data[0].attributes.size\"
                        v-bind:productprice=\"featured.skus.data[0].price\"
                        v-bind:productcat = \"featured.skus.data[0].attributes.category\"
                        v-bind:productcattype=\"featured.skus.data[0].attributes.type\">
                </featured> -->
                <!-- <featured
                        v-for=\"(featured, index) in featuredProducts\"
                        v-bind:key=\"index\"
                        v-bind:indexkey=\"index\"
                        v-bind:productdbid=\"featured.id\"
                        v-bind:productid=\"featured.product_id\"
                        v-bind:productimage=\"featured.product_image.image1\"
                        v-bind:producttitle=\"featured.product_name\"
                        v-bind:productnameslug=\"featured.name_slug\"
                        v-bind:productprice=\"featured.price\"
                        v-bind:productcat=\"featured.product_category\"
                        v-bind:productcattype=\"featured.inner_cat_slug\">
                </featured> -->
            </div>
        </div>
    </div>
</div>
", "product.html.twig", "/Users/jasonreid/Sites/furniture/twig_templates/product.html.twig");
    }
}
