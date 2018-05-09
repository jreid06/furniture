<?php

/* products.html.twig */
class __TwigTemplate_fd328bab2f89461b72ffc549f36899a4f9ce14f18be044c18ebe82bdeebaed4c extends Twig_Template
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
        echo "<div class=\"container-fluid products-page-main-container home\">

    <!-- <div class=\"display-box\"> -->
        <!-- <pre>
            ";
        // line 5
        echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, $this->getAttribute(($context["queryDetails"] ?? null), "brands_page", array())), "html", null, true);
        echo "
        </pre> -->
    <!-- </div> -->

    <div class=\"row\">
        <div class=\"col-12 breadcrumb-container\">
            <nav aria-label=\"breadcrumb\" role=\"navigation\">
              <ol class=\"breadcrumb\">
                <!-- render list items dynamically based on \$_GET parameters set on products.php -->
                <li class=\"breadcrumb-item\"><a href=\"/\">Home</a></li>

                ";
        // line 16
        if ((($context["pagelocation"] ?? null) == "/products/gifts")) {
            // line 17
            echo "
                    <li class=\"breadcrumb-item\"><a href=\"/products\">Products</a></li>
                    <li class=\"breadcrumb-item active\">Gifts</li>

                ";
        } else {
            // line 22
            echo "
                    ";
            // line 23
            if (( !$this->getAttribute(($context["breadcrumb"] ?? null), "one", array()) &&  !$this->getAttribute(($context["breadcrumb"] ?? null), "two", array()))) {
                // line 24
                echo "                        <li class=\"breadcrumb-item active\">Products</li>
                    ";
            } else {
                // line 26
                echo "                        <li class=\"breadcrumb-item\"><a href=\"/products\">Products</a></li>
                    ";
            }
            // line 28
            echo "
                    ";
            // line 29
            if (($this->getAttribute(($context["breadcrumb"] ?? null), "one", array(), "any", true, true) &&  !$this->getAttribute(($context["breadcrumb"] ?? null), "two", array(), "any", true, true))) {
                // line 30
                echo "                        <li class=\"breadcrumb-item active\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
                echo "</li>
                    ";
            }
            // line 32
            echo "
                    ";
            // line 33
            if (($this->getAttribute(($context["breadcrumb"] ?? null), "one", array(), "any", true, true) && $this->getAttribute(($context["breadcrumb"] ?? null), "two", array(), "any", true, true))) {
                // line 34
                echo "                        <li class=\"breadcrumb-item \">
                            ";
                // line 35
                if ($this->getAttribute(($context["queryDetails"] ?? null), "brands_page", array())) {
                    // line 36
                    echo "                                <a href=\"/";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
                    echo "</a>
                            ";
                } else {
                    // line 38
                    echo "                                <a href=\"/products/";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
                    echo "</a>
                            ";
                }
                // line 40
                echo "
                        </li>
                    ";
            }
            // line 43
            echo "
                    ";
            // line 44
            if ($this->getAttribute(($context["breadcrumb"] ?? null), "two", array(), "any", true, true)) {
                // line 45
                echo "                        <li class=\"breadcrumb-item active\" aria-current=\"page\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "two", array()), "html", null, true);
                echo "</li>
                    ";
            }
            // line 47
            echo "
                ";
        }
        // line 49
        echo "


              </ol>
              <!--  -->
            </nav>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12 d-flex flex-wrap flex-row mobile-filter-ctrl\">
            <div class=\"p-2 d-lg-none\">
                <button class=\"btn btn-primary\" @click.prevent=\"toggleFilter\">FILTER</button>
            </div>
        </div>

        <div class=\"col-12\">
            ";
        // line 66
        if ((($context["pagelocation"] ?? null) == "/products/gifts")) {
            // line 67
            echo "                <br>
                <h4 class=\"text-center filter-title-display\">Showing all Gift products</h4>
                <br>

            ";
        } else {
            // line 72
            echo "
                <p class=\"text-center\"><small>";
            // line 73
            echo twig_escape_filter($this->env, ($context["msg"] ?? null), "html", null, true);
            echo "</small></p>
                <h4 class=\"text-center filter-title-display\">Showing ";
            // line 74
            if (($this->getAttribute(($context["queryDetails"] ?? null), "category", array(), "any", true, true) && $this->getAttribute(($context["queryDetails"] ?? null), "type", array(), "any", true, true))) {
                echo " all ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["queryDetails"] ?? null), "category", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["queryDetails"] ?? null), "type", array()), "html", null, true);
                echo " ";
            } elseif (($this->getAttribute(($context["queryDetails"] ?? null), "category", array(), "any", true, true) &&  !$this->getAttribute(($context["queryDetails"] ?? null), "type", array(), "any", true, true))) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["queryDetails"] ?? null), "category", array()), "html", null, true);
                echo " products ";
            } else {
                echo " Products ";
            }
            echo "</h4>
                <br>

            ";
        }
        // line 78
        echo "

        </div>


        <div class=\"col-12 d-flex flex-wrap flex-row products-page-content\">

            ";
        // line 85
        if ((($context["pagelocation"] ?? null) == "/products/gifts")) {
            // line 86
            echo "                ";
            $context["hideFilter"] = true;
            // line 87
            echo "            ";
        } else {
            // line 88
            echo "                ";
            $context["hideFilter"] = false;
            // line 89
            echo "            ";
        }
        // line 90
        echo "
            <div class=\"p-2 filter filter-mobile closed-filter d-flex flex-wrap flex-row\" style=\"";
        // line 91
        if (($context["hideFilter"] ?? null)) {
            echo "display: none !important;";
        }
        echo "\">

                <div class=\"p-2\">
                    <div id=\"accordion\">

                             <!-- PRODUCT TYPE FILTERS -->
                          <div class=\"card filter-card\">
                            <div class=\"card-header\" id=\"headingOne\">
                              <!-- <h5 class=\"mb-0\">
                                <button v-on:click=\"toggleSign\" class=\"btn btn-link btn-filter\" data-toggle=\"collapse\" data-target=\"#filter1\" aria-expanded=\"true\" aria-controls=\"filter1\">
                                 <span>Product type</span>
                                 <span class=\"fa fa-minus open-accordion\" id=\"desc\"></span>
                                </button>
                              </h5> -->

                              <div v-on:click=\"toggleSign\" class=\"btn btn-link collapsed btn-filter\" data-toggle=\"collapse\" data-target=\"#filter1\" aria-expanded=\"false\" aria-controls=\"filter1\" data-filter-id=\"#filter1\">

                                    <div>Product type</div>
                                    <div class=\"fa fa-minus open-accordion\" data-filter-id=\"#filte1\"></div>

                              </div>
                            </div>

                            <div id=\"filter1\" class=\"collapse show\" aria-labelledby=\"headingOne\" >
                              <div class=\"card-body\">
                                <ul>

                                    <!--
                                        list all living room product types
                                    -->

                                    ";
        // line 122
        if ((($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "all") || ($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "brands"))) {
            // line 123
            echo "
                                        ";
            // line 124
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["queryDetails"] ?? null), "all_cats", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["cats"]) {
                // line 125
                echo "                                        <template v-if=\"loaded.filter_list\">
                                            <template v-for=\"(prodtype, index) in products['";
                // line 126
                echo twig_escape_filter($this->env, $context["cats"], "html", null, true);
                echo "']\">
                                                <filter-item
                                                        v-bind:key=\"prodtype.key\"
                                                        v-bind:filtername=\"prodtype.name\"
                                                        v-bind:activetype=\"prodtype.currentPage\">
                                                </filter-item>
                                            </template>
                                        </template>

                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cats'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 136
            echo "
                                    ";
        } else {
            // line 138
            echo "
                                        <!--
                                            list specific product types
                                        -->

                                        <template v-if=\"loaded.filter_list\">
                                            <template v-for=\"(prodtype, index) in products['";
            // line 144
            echo twig_escape_filter($this->env, $this->getAttribute(($context["queryDetails"] ?? null), "category", array()), "html", null, true);
            echo "']\">
                                                <filter-item
                                                        v-bind:key=\"prodtype.key\"
                                                        v-bind:filtername=\"prodtype.name\"
                                                        v-bind:activetype=\"prodtype.currentPage\">
                                                </filter-item>
                                            </template>
                                        </template>

                                    ";
        }
        // line 154
        echo "
                                </ul>
                              </div>
                            </div>
                          </div>

                             <!-- CATEGORY FILTERS -->
                          <div class=\"card filter-card\">
                            <div class=\"card-header\" id=\"headingTwo\">

                              <div v-on:click=\"toggleSign\" class=\"btn btn-link collapsed btn-filter\" data-toggle=\"collapse\" data-target=\"#filter2\" aria-expanded=\"false\" aria-controls=\"filter2\" data-filter-id=\"#filter2\">

                                    <div>Category</div>
                                    <div class=\"fa fa-minus open-accordion\" data-filter-id=\"#filter2\"></div>

                              </div>
                            </div>
                            <div id=\"filter2\" class=\"collapse show\" aria-labelledby=\"headingTwo\" >
                              <div class=\"card-body\">
                                  <ul>

                                      ";
        // line 175
        if (($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "all")) {
            // line 176
            echo "
                                      ";
            // line 177
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["queryDetails"] ?? null), "all_cats", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["cats"]) {
                // line 178
                echo "                                          <li>
                                              <div class=\"input-group mb-0 filter-input-group\">
                                                  <div class=\"input-group-prepend filter-input-box\">
                                                      <div class=\"input-group-text filter-input d-flex flex-row\">
                                                          <div class=\"p-2 fltr-inp\">
                                                              <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"cat-";
                // line 183
                echo twig_escape_filter($this->env, $context["cats"], "html", null, true);
                echo "\" type=\"checkbox\" data-category=\"";
                echo twig_escape_filter($this->env, $context["cats"], "html", null, true);
                echo "\" aria-label=\"Checkbox for following text input\">
                                                          </div>

                                                          <div class=\"p-2 fltr-inp\">
                                                              <p>";
                // line 187
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["cats"]), "html", null, true);
                echo "</p>
                                                          </div>

                                                      </div>
                                                  </div>
                                              </div>
                                          </li>
                                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cats'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 195
            echo "
                                      ";
        } else {
            // line 197
            echo "
                                      <li>
                                          <div class=\"input-group mb-0 filter-input-group\">
                                              <div class=\"input-group-prepend filter-input-box\">
                                                  <div class=\"input-group-text filter-input d-flex flex-row\">
                                                      <div class=\"p-2 fltr-inp\">
                                                          <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"cat-";
            // line 203
            echo twig_escape_filter($this->env, $this->getAttribute(($context["queryDetails"] ?? null), "category", array()), "html", null, true);
            echo "\" type=\"checkbox\" data-category=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["queryDetails"] ?? null), "category", array()), "html", null, true);
            echo "\" aria-label=\"Checkbox for following text input\" checked>
                                                      </div>

                                                      <div class=\"p-2 fltr-inp\">
                                                          <p>";
            // line 207
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["queryDetails"] ?? null), "category", array())), "html", null, true);
            echo "</p>
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>
                                      </li>

                                      ";
        }
        // line 216
        echo "                                  </ul>
                              </div>
                            </div>
                          </div>

                            <!-- BRAND FILTERS -->
                          <div class=\"card filter-card\">
                            <div class=\"card-header\" id=\"headingThree\">
                              <div v-on:click=\"toggleSign\" class=\"btn btn-link collapsed btn-filter\" data-toggle=\"collapse\" data-target=\"#filter3\" aria-expanded=\"false\" aria-controls=\"filter3\" data-filter-id=\"#filter3\">

                                    <div>Brands</div>
                                    <div class=\"fa fa-minus open-accordion\" data-filter-id=\"#filter3\"></div>

                              </div>
                           </div>
                           <div id=\"filter3\" class=\"collapse show\" aria-labelledby=\"headingThree\" >
                              <div class=\"card-body\">
                                  <ul>
                                      ";
        // line 234
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["queryDetails"] ?? null), "all_brands", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["brands"]) {
            // line 235
            echo "
                                      <!-- loop through brand_letter_array -->
                                          ";
            // line 237
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["brands"], "brand_array", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
                // line 238
                echo "
                                          <li>
                                              <div class=\"input-group mb-0 filter-input-group\">
                                                  <div class=\"input-group-prepend filter-input-box\">
                                                      <div class=\"input-group-text filter-input d-flex flex-row\">
                                                          <div class=\"p-2 fltr-inp\">
                                                              <input @click=\"toggleBrand\" class=\"cat-checkbox\" name=\"brand-";
                // line 244
                echo twig_escape_filter($this->env, $this->getAttribute($context["brand"], "brand_slug", array()), "html", null, true);
                echo "\" type=\"checkbox\" data-brand-name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["brand"], "brand_slug", array()), "html", null, true);
                echo "\" aria-label=\"Checkbox for following text input\" ";
                if (($this->getAttribute($context["brand"], "brand_slug", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "brand_slug", array()))) {
                    echo " checked ";
                }
                echo ">
                                                          </div>

                                                          <div class=\"p-2 fltr-inp\">
                                                              <p>";
                // line 248
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["brand"], "brand_name", array())), "html", null, true);
                echo "</p>
                                                          </div>

                                                      </div>
                                                  </div>
                                              </div>
                                          </li>
                                          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 256
            echo "                                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brands'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 257
        echo "                                  </ul>
                              </div>
                            </div>
                          </div>

                            <!-- PRICE FILTERS -->
                         <div class=\"card filter-card\">
                           <div class=\"card-header\" id=\"headingThree\">

                             <div v-on:click=\"toggleSign\" class=\"btn btn-link collapsed btn-filter\" data-toggle=\"collapse\" data-target=\"#filter4\" aria-expanded=\"false\" aria-controls=\"filter4\" data-filter-id=\"#filter4\">

                                   <div>Price</div>
                                   <div class=\"fa fa-minus open-accordion\" data-filter-id=\"#filter4\"></div>

                             </div>
                          </div>
                          <div id=\"filter4\" class=\"collapse show\" aria-labelledby=\"headingThree\" >
                             <div class=\"card-body\">
                                 <ul>
                                     <li>
                                         <div class=\"input-group mb-0 filter-input-group\">
                                             <div class=\"input-group-prepend filter-input-box\">
                                                 <div class=\"input-group-text filter-input d-flex flex-row\">
                                                     <div class=\"p-2 fltr-inp\">
                                                         <input name=\"lowtohigh\" type=\"checkbox\" data-prod-type=\"price\" aria-label=\"Checkbox for following text input\">
                                                     </div>

                                                     <div class=\"p-2 fltr-inp\">
                                                         <p>
                                                         ";
        // line 286
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array("low to high")), "html", null, true);
        echo "
                                                        </p>
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>
                                     </li>

                                     <li>
                                         <div class=\"input-group mb-0 filter-input-group\">
                                             <div class=\"input-group-prepend filter-input-box\">
                                                 <div class=\"input-group-text filter-input d-flex flex-row\">
                                                     <div class=\"p-2 fltr-inp\">
                                                         <input name=\"hightolow\" type=\"checkbox\" data-prod-type=\"price\" aria-label=\"Checkbox for following text input\">
                                                     </div>

                                                     <div class=\"p-2 fltr-inp\">
                                                         <p>";
        // line 304
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array("high to low")), "html", null, true);
        echo "</p>
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>
                                     </li>
                                 </ul>
                             </div>
                           </div>
                         </div>

                    </div>
                    <!-- end of accordion-->
                </div>

                <div class=\"p-2 d-lg-none\">
                    <div class=\"filter-close\">
                        <span class=\"fa fa-close\"></span>
                    </div>
                </div>

            </div>
            <div class=\"p-2 products-page-container ";
        // line 327
        if (($context["hideFilter"] ?? null)) {
            echo "products-full-width";
        }
        echo "\">
                <div class=\"row\" id=\"products-row\">

                        <div class=\"loader-screen loader-filter\">
                            <div class=\"spinner\">
                                <div class=\"double-bounce1\"></div>
                                <div class=\"double-bounce2\"></div>
                            </div>
                        </div>

                        ";
        // line 337
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "gifts")) {
            // line 338
            echo "
                            ";
            // line 339
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 340
                echo "
                                ";
                // line 341
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 342
                    echo "
                                    ";
                    // line 343
                    if (($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "gift", array()) == "true")) {
                        // line 344
                        echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                        // line 347
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                        echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                        // line 350
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "type", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product"], "metadata", array()), "slug", array()), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "color", array()), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
                        echo " - ";
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "color", array())), "html", null, true);
                        echo " - ";
                        if (($this->getAttribute($this->getAttribute(($context["skuprod"] ?? null), "attributes", array()), "size", array()) != "none")) {
                            echo " ";
                            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array())), "html", null, true);
                            echo " ";
                        }
                        echo "</a></h6>
                                                <h6 class=\"\">";
                        // line 351
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()))), "html", null, true);
                        echo "</h6>
                                                <p class=\"product-price-p\"><strong>£ ";
                        // line 352
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                        echo "</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                    }
                    // line 357
                    echo "
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 359
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 361
            echo "
                        ";
        }
        // line 363
        echo "

                        ";
        // line 365
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "all")) {
            // line 366
            echo "
                            ";
            // line 367
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 368
                echo "
                                ";
                // line 369
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 370
                    echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                    // line 373
                    echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                    echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                    // line 376
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()), "html", null, true);
                    echo "/";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "type", array()), "html", null, true);
                    echo "/";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product"], "metadata", array()), "slug", array()), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "color", array()), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array()), "html", null, true);
                    echo "/";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", array()), "html", null, true);
                    echo "/";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
                    echo " - ";
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "color", array())), "html", null, true);
                    echo " ";
                    if (($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array()) != "none")) {
                        echo " - ";
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array())), "html", null, true);
                        echo " ";
                    }
                    echo "</a></h6>
                                                <h6 class=\"\">";
                    // line 377
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()))), "html", null, true);
                    echo "</h6>
                                                <p class=\"product-price-p\"><strong>£ ";
                    // line 378
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                    echo "</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 383
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 385
            echo "
                        ";
        }
        // line 387
        echo "
                        ";
        // line 388
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "all-cat")) {
            // line 389
            echo "
                            ";
            // line 390
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 391
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 392
                    echo "                                    ";
                    if (($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "category", array()))) {
                        // line 393
                        echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <!-- <p>";
                        // line 394
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                        echo "</p> -->
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                        // line 397
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                        echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                        // line 400
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "type", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product"], "metadata", array()), "slug", array()), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "color", array()), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
                        echo " - ";
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "color", array())), "html", null, true);
                        echo " ";
                        if (($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array()) != "none")) {
                            echo " - ";
                            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array())), "html", null, true);
                            echo " ";
                        }
                        echo "</a></h6>
                                                <p class=\"product-price-p\"><strong>£ ";
                        // line 401
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                        echo "</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                    }
                    // line 406
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 407
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 408
            echo "
                        ";
        }
        // line 410
        echo "
                        ";
        // line 411
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "specific")) {
            // line 412
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 413
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 414
                    echo "                                    ";
                    if ((($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "category", array())) && ($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "type", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "type", array())))) {
                        // line 415
                        echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <!-- <p>";
                        // line 416
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                        echo "</p> -->
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                        // line 419
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                        echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                        // line 422
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "type", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product"], "metadata", array()), "slug", array()), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "color", array()), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
                        echo " - ";
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "color", array())), "html", null, true);
                        echo " ";
                        if (($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array()) != "none")) {
                            echo " - ";
                            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array())), "html", null, true);
                            echo " ";
                        }
                        echo "</a> </h6>
                                                <p class=\"product-price-p\"><strong>£ ";
                        // line 423
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                        echo "</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                    }
                    // line 428
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 429
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 430
            echo "

                        ";
        }
        // line 433
        echo "
                        ";
        // line 434
        if ((($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "specific") && $this->getAttribute(($context["queryDetails"] ?? null), "brands_page", array()))) {
            // line 435
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 436
                echo "                                <!-- <p>";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["queryDetails"] ?? null), "brand_clean", array()), "html", null, true);
                echo "</p> -->
                                <!-- <p>";
                // line 437
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product"], "metadata", array()), "brand", array()), "html", null, true);
                echo "</p> -->
                                ";
                // line 438
                if ((twig_lower_filter($this->env, $this->getAttribute($this->getAttribute($context["product"], "metadata", array()), "brand", array())) == twig_lower_filter($this->env, $this->getAttribute(($context["queryDetails"] ?? null), "brand_clean", array())))) {
                    // line 439
                    echo "                                    ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                        // line 440
                        echo "                                        <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                            <div class=\"card product-card\" style=\"\">
                                                <div class=\"product-image\">
                                                    <img class=\"card-img-top\" src=\"";
                        // line 443
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                        echo "\">
                                                </div>
                                                <div class=\"card-body\">
                                                    <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                        // line 446
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "type", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product"], "metadata", array()), "slug", array()), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "color", array()), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
                        echo " - ";
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "color", array())), "html", null, true);
                        echo " ";
                        if (($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array()) != "none")) {
                            echo " - ";
                            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array())), "html", null, true);
                            echo " ";
                        }
                        echo "</a> </h6>
                                                    <p class=\"product-price-p\"><strong>£ ";
                        // line 447
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                        echo "</strong> </p>
                                                </div>
                                            </div>
                                        </div>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 452
                    echo "
                                ";
                }
                // line 454
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 455
            echo "

                        ";
        }
        // line 458
        echo "
                        <!-- <product-card></product-card> -->

                </div>

                ";
        // line 463
        if ($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "has_more", array())) {
            // line 464
            echo "                    <div class=\"row\">
                        <div class=\"col-12 text-center\">
                            <br>
                            <button class=\"btn btn-primary\">Show more</button>
                        </div>
                    </div>
                ";
        }
        // line 471
        echo "
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "products.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1005 => 471,  996 => 464,  994 => 463,  987 => 458,  982 => 455,  976 => 454,  972 => 452,  961 => 447,  935 => 446,  927 => 443,  922 => 440,  917 => 439,  915 => 438,  911 => 437,  906 => 436,  901 => 435,  899 => 434,  896 => 433,  891 => 430,  885 => 429,  879 => 428,  871 => 423,  845 => 422,  837 => 419,  831 => 416,  828 => 415,  825 => 414,  820 => 413,  815 => 412,  813 => 411,  810 => 410,  806 => 408,  800 => 407,  794 => 406,  786 => 401,  760 => 400,  752 => 397,  746 => 394,  743 => 393,  740 => 392,  735 => 391,  731 => 390,  728 => 389,  726 => 388,  723 => 387,  719 => 385,  712 => 383,  701 => 378,  697 => 377,  671 => 376,  663 => 373,  658 => 370,  654 => 369,  651 => 368,  647 => 367,  644 => 366,  642 => 365,  638 => 363,  634 => 361,  627 => 359,  620 => 357,  612 => 352,  608 => 351,  582 => 350,  574 => 347,  569 => 344,  567 => 343,  564 => 342,  560 => 341,  557 => 340,  553 => 339,  550 => 338,  548 => 337,  533 => 327,  507 => 304,  486 => 286,  455 => 257,  449 => 256,  435 => 248,  422 => 244,  414 => 238,  410 => 237,  406 => 235,  402 => 234,  382 => 216,  370 => 207,  361 => 203,  353 => 197,  349 => 195,  335 => 187,  326 => 183,  319 => 178,  315 => 177,  312 => 176,  310 => 175,  287 => 154,  274 => 144,  266 => 138,  262 => 136,  246 => 126,  243 => 125,  239 => 124,  236 => 123,  234 => 122,  198 => 91,  195 => 90,  192 => 89,  189 => 88,  186 => 87,  183 => 86,  181 => 85,  172 => 78,  153 => 74,  149 => 73,  146 => 72,  139 => 67,  137 => 66,  118 => 49,  114 => 47,  108 => 45,  106 => 44,  103 => 43,  98 => 40,  90 => 38,  82 => 36,  80 => 35,  77 => 34,  75 => 33,  72 => 32,  66 => 30,  64 => 29,  61 => 28,  57 => 26,  53 => 24,  51 => 23,  48 => 22,  41 => 17,  39 => 16,  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"container-fluid products-page-main-container home\">

    <!-- <div class=\"display-box\"> -->
        <!-- <pre>
            {{dump(queryDetails.brands_page)}}
        </pre> -->
    <!-- </div> -->

    <div class=\"row\">
        <div class=\"col-12 breadcrumb-container\">
            <nav aria-label=\"breadcrumb\" role=\"navigation\">
              <ol class=\"breadcrumb\">
                <!-- render list items dynamically based on \$_GET parameters set on products.php -->
                <li class=\"breadcrumb-item\"><a href=\"/\">Home</a></li>

                {% if pagelocation == '/products/gifts' %}

                    <li class=\"breadcrumb-item\"><a href=\"/products\">Products</a></li>
                    <li class=\"breadcrumb-item active\">Gifts</li>

                {% else %}

                    {% if not breadcrumb.one and not breadcrumb.two %}
                        <li class=\"breadcrumb-item active\">Products</li>
                    {% else %}
                        <li class=\"breadcrumb-item\"><a href=\"/products\">Products</a></li>
                    {% endif %}

                    {% if breadcrumb.one is defined and not breadcrumb.two is defined %}
                        <li class=\"breadcrumb-item active\">{{breadcrumb.one}}</li>
                    {% endif %}

                    {% if breadcrumb.one is defined and breadcrumb.two is defined %}
                        <li class=\"breadcrumb-item \">
                            {% if queryDetails.brands_page %}
                                <a href=\"/{{breadcrumb.one}}\">{{breadcrumb.one}}</a>
                            {% else %}
                                <a href=\"/products/{{breadcrumb.one}}\">{{breadcrumb.one}}</a>
                            {% endif %}

                        </li>
                    {% endif %}

                    {% if breadcrumb.two is defined %}
                        <li class=\"breadcrumb-item active\" aria-current=\"page\">{{breadcrumb.two}}</li>
                    {% endif %}

                {% endif %}



              </ol>
              <!--  -->
            </nav>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12 d-flex flex-wrap flex-row mobile-filter-ctrl\">
            <div class=\"p-2 d-lg-none\">
                <button class=\"btn btn-primary\" @click.prevent=\"toggleFilter\">FILTER</button>
            </div>
        </div>

        <div class=\"col-12\">
            {% if pagelocation == '/products/gifts' %}
                <br>
                <h4 class=\"text-center filter-title-display\">Showing all Gift products</h4>
                <br>

            {% else %}

                <p class=\"text-center\"><small>{{msg}}</small></p>
                <h4 class=\"text-center filter-title-display\">Showing {% if queryDetails.category is defined and queryDetails.type is defined %} all {{queryDetails.category}} {{queryDetails.type}} {% elseif queryDetails.category is defined and not queryDetails.type is defined %} {{queryDetails.category}} products {% else %} Products {% endif %}</h4>
                <br>

            {% endif %}


        </div>


        <div class=\"col-12 d-flex flex-wrap flex-row products-page-content\">

            {% if pagelocation == '/products/gifts' %}
                {% set hideFilter = true %}
            {% else %}
                {% set hideFilter = false %}
            {% endif %}

            <div class=\"p-2 filter filter-mobile closed-filter d-flex flex-wrap flex-row\" style=\"{% if hideFilter %}display: none !important;{% endif %}\">

                <div class=\"p-2\">
                    <div id=\"accordion\">

                             <!-- PRODUCT TYPE FILTERS -->
                          <div class=\"card filter-card\">
                            <div class=\"card-header\" id=\"headingOne\">
                              <!-- <h5 class=\"mb-0\">
                                <button v-on:click=\"toggleSign\" class=\"btn btn-link btn-filter\" data-toggle=\"collapse\" data-target=\"#filter1\" aria-expanded=\"true\" aria-controls=\"filter1\">
                                 <span>Product type</span>
                                 <span class=\"fa fa-minus open-accordion\" id=\"desc\"></span>
                                </button>
                              </h5> -->

                              <div v-on:click=\"toggleSign\" class=\"btn btn-link collapsed btn-filter\" data-toggle=\"collapse\" data-target=\"#filter1\" aria-expanded=\"false\" aria-controls=\"filter1\" data-filter-id=\"#filter1\">

                                    <div>Product type</div>
                                    <div class=\"fa fa-minus open-accordion\" data-filter-id=\"#filte1\"></div>

                              </div>
                            </div>

                            <div id=\"filter1\" class=\"collapse show\" aria-labelledby=\"headingOne\" >
                              <div class=\"card-body\">
                                <ul>

                                    <!--
                                        list all living room product types
                                    -->

                                    {% if queryDetails.category == 'all' or queryDetails.category == 'brands'%}

                                        {% for cats in queryDetails.all_cats %}
                                        <template v-if=\"loaded.filter_list\">
                                            <template v-for=\"(prodtype, index) in products['{{cats}}']\">
                                                <filter-item
                                                        v-bind:key=\"prodtype.key\"
                                                        v-bind:filtername=\"prodtype.name\"
                                                        v-bind:activetype=\"prodtype.currentPage\">
                                                </filter-item>
                                            </template>
                                        </template>

                                        {% endfor %}

                                    {% else %}

                                        <!--
                                            list specific product types
                                        -->

                                        <template v-if=\"loaded.filter_list\">
                                            <template v-for=\"(prodtype, index) in products['{{queryDetails.category}}']\">
                                                <filter-item
                                                        v-bind:key=\"prodtype.key\"
                                                        v-bind:filtername=\"prodtype.name\"
                                                        v-bind:activetype=\"prodtype.currentPage\">
                                                </filter-item>
                                            </template>
                                        </template>

                                    {% endif %}

                                </ul>
                              </div>
                            </div>
                          </div>

                             <!-- CATEGORY FILTERS -->
                          <div class=\"card filter-card\">
                            <div class=\"card-header\" id=\"headingTwo\">

                              <div v-on:click=\"toggleSign\" class=\"btn btn-link collapsed btn-filter\" data-toggle=\"collapse\" data-target=\"#filter2\" aria-expanded=\"false\" aria-controls=\"filter2\" data-filter-id=\"#filter2\">

                                    <div>Category</div>
                                    <div class=\"fa fa-minus open-accordion\" data-filter-id=\"#filter2\"></div>

                              </div>
                            </div>
                            <div id=\"filter2\" class=\"collapse show\" aria-labelledby=\"headingTwo\" >
                              <div class=\"card-body\">
                                  <ul>

                                      {% if queryDetails.category == 'all' %}

                                      {% for cats in queryDetails.all_cats %}
                                          <li>
                                              <div class=\"input-group mb-0 filter-input-group\">
                                                  <div class=\"input-group-prepend filter-input-box\">
                                                      <div class=\"input-group-text filter-input d-flex flex-row\">
                                                          <div class=\"p-2 fltr-inp\">
                                                              <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"cat-{{cats}}\" type=\"checkbox\" data-category=\"{{cats}}\" aria-label=\"Checkbox for following text input\">
                                                          </div>

                                                          <div class=\"p-2 fltr-inp\">
                                                              <p>{{cats | capitalize }}</p>
                                                          </div>

                                                      </div>
                                                  </div>
                                              </div>
                                          </li>
                                      {% endfor %}

                                      {% else %}

                                      <li>
                                          <div class=\"input-group mb-0 filter-input-group\">
                                              <div class=\"input-group-prepend filter-input-box\">
                                                  <div class=\"input-group-text filter-input d-flex flex-row\">
                                                      <div class=\"p-2 fltr-inp\">
                                                          <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"cat-{{queryDetails.category}}\" type=\"checkbox\" data-category=\"{{queryDetails.category}}\" aria-label=\"Checkbox for following text input\" checked>
                                                      </div>

                                                      <div class=\"p-2 fltr-inp\">
                                                          <p>{{ queryDetails.category | capitalize }}</p>
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>
                                      </li>

                                      {% endif %}
                                  </ul>
                              </div>
                            </div>
                          </div>

                            <!-- BRAND FILTERS -->
                          <div class=\"card filter-card\">
                            <div class=\"card-header\" id=\"headingThree\">
                              <div v-on:click=\"toggleSign\" class=\"btn btn-link collapsed btn-filter\" data-toggle=\"collapse\" data-target=\"#filter3\" aria-expanded=\"false\" aria-controls=\"filter3\" data-filter-id=\"#filter3\">

                                    <div>Brands</div>
                                    <div class=\"fa fa-minus open-accordion\" data-filter-id=\"#filter3\"></div>

                              </div>
                           </div>
                           <div id=\"filter3\" class=\"collapse show\" aria-labelledby=\"headingThree\" >
                              <div class=\"card-body\">
                                  <ul>
                                      {% for brands in queryDetails.all_brands %}

                                      <!-- loop through brand_letter_array -->
                                          {% for brand in brands.brand_array %}

                                          <li>
                                              <div class=\"input-group mb-0 filter-input-group\">
                                                  <div class=\"input-group-prepend filter-input-box\">
                                                      <div class=\"input-group-text filter-input d-flex flex-row\">
                                                          <div class=\"p-2 fltr-inp\">
                                                              <input @click=\"toggleBrand\" class=\"cat-checkbox\" name=\"brand-{{brand.brand_slug}}\" type=\"checkbox\" data-brand-name=\"{{brand.brand_slug}}\" aria-label=\"Checkbox for following text input\" {% if brand.brand_slug == queryDetails.brand_slug %} checked {% endif %}>
                                                          </div>

                                                          <div class=\"p-2 fltr-inp\">
                                                              <p>{{ brand.brand_name | capitalize }}</p>
                                                          </div>

                                                      </div>
                                                  </div>
                                              </div>
                                          </li>
                                          {% endfor %}
                                      {% endfor %}
                                  </ul>
                              </div>
                            </div>
                          </div>

                            <!-- PRICE FILTERS -->
                         <div class=\"card filter-card\">
                           <div class=\"card-header\" id=\"headingThree\">

                             <div v-on:click=\"toggleSign\" class=\"btn btn-link collapsed btn-filter\" data-toggle=\"collapse\" data-target=\"#filter4\" aria-expanded=\"false\" aria-controls=\"filter4\" data-filter-id=\"#filter4\">

                                   <div>Price</div>
                                   <div class=\"fa fa-minus open-accordion\" data-filter-id=\"#filter4\"></div>

                             </div>
                          </div>
                          <div id=\"filter4\" class=\"collapse show\" aria-labelledby=\"headingThree\" >
                             <div class=\"card-body\">
                                 <ul>
                                     <li>
                                         <div class=\"input-group mb-0 filter-input-group\">
                                             <div class=\"input-group-prepend filter-input-box\">
                                                 <div class=\"input-group-text filter-input d-flex flex-row\">
                                                     <div class=\"p-2 fltr-inp\">
                                                         <input name=\"lowtohigh\" type=\"checkbox\" data-prod-type=\"price\" aria-label=\"Checkbox for following text input\">
                                                     </div>

                                                     <div class=\"p-2 fltr-inp\">
                                                         <p>
                                                         {{'low to high' |camel_case()}}
                                                        </p>
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>
                                     </li>

                                     <li>
                                         <div class=\"input-group mb-0 filter-input-group\">
                                             <div class=\"input-group-prepend filter-input-box\">
                                                 <div class=\"input-group-text filter-input d-flex flex-row\">
                                                     <div class=\"p-2 fltr-inp\">
                                                         <input name=\"hightolow\" type=\"checkbox\" data-prod-type=\"price\" aria-label=\"Checkbox for following text input\">
                                                     </div>

                                                     <div class=\"p-2 fltr-inp\">
                                                         <p>{{'high to low' |camel_case()}}</p>
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>
                                     </li>
                                 </ul>
                             </div>
                           </div>
                         </div>

                    </div>
                    <!-- end of accordion-->
                </div>

                <div class=\"p-2 d-lg-none\">
                    <div class=\"filter-close\">
                        <span class=\"fa fa-close\"></span>
                    </div>
                </div>

            </div>
            <div class=\"p-2 products-page-container {% if hideFilter %}products-full-width{% endif %}\">
                <div class=\"row\" id=\"products-row\">

                        <div class=\"loader-screen loader-filter\">
                            <div class=\"spinner\">
                                <div class=\"double-bounce1\"></div>
                                <div class=\"double-bounce2\"></div>
                            </div>
                        </div>

                        {% if queryDetails.num_of_products == 'gifts' %}

                            {% for product in queryDetails.products.data %}

                                {% for sku in product.skus.data %}

                                    {% if sku.attributes.gift == 'true' %}
                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"{{sku.image}}\" alt=\"{{product.caption}}\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/{{sku.attributes.category}}/{{sku.attributes.type}}/{{product.metadata.slug}}-{{sku.attributes.color}}-{{sku.attributes.size}}/{{product.id}}/{{sku.id}}\">{{product.name}} - {{sku.attributes.color | capitalize}} - {% if skuprod.attributes.size != 'none'%} {{sku.attributes.size | capitalize}} {% endif %}</a></h6>
                                                <h6 class=\"\">{{sku.attributes.category | camel_case()}}</h6>
                                                <p class=\"product-price-p\"><strong>£ {{(sku.price / 100) | number_format(2)}}</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    {% endif %}

                                {% endfor %}

                            {% endfor %}

                        {% endif %}


                        {% if queryDetails.num_of_products == 'all' %}

                            {% for product in queryDetails.products.data %}

                                {% for sku in product.skus.data %}
                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"{{sku.image}}\" alt=\"{{product.caption}}\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/{{sku.attributes.category}}/{{sku.attributes.type}}/{{product.metadata.slug}}-{{sku.attributes.color}}-{{sku.attributes.size}}/{{product.id}}/{{sku.id}}\">{{product.name}} - {{sku.attributes.color | capitalize}} {% if sku.attributes.size != 'none'%} - {{sku.attributes.size | capitalize}} {% endif %}</a></h6>
                                                <h6 class=\"\">{{sku.attributes.category | camel_case()}}</h6>
                                                <p class=\"product-price-p\"><strong>£ {{(sku.price / 100) | number_format(2)}}</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                {% endfor %}

                            {% endfor %}

                        {% endif %}

                        {% if queryDetails.num_of_products == 'all-cat' %}

                            {% for product in queryDetails.products.data %}
                                {% for sku in product.skus.data %}
                                    {% if sku.attributes.category == queryDetails.category %}
                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <!-- <p>{{sku.id}}</p> -->
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"{{sku.image}}\" alt=\"{{product.caption}}\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/{{sku.attributes.category}}/{{sku.attributes.type}}/{{product.metadata.slug}}-{{sku.attributes.color}}-{{sku.attributes.size}}/{{product.id}}/{{sku.id}}\">{{product.name}} - {{sku.attributes.color | capitalize}} {% if sku.attributes.size != 'none'%} - {{sku.attributes.size | capitalize}} {% endif %}</a></h6>
                                                <p class=\"product-price-p\"><strong>£ {{(sku.price / 100) | number_format(2)}}</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    {% endif %}
                                {% endfor %}
                            {% endfor %}

                        {% endif %}

                        {% if queryDetails.num_of_products == 'specific' %}
                            {% for product in queryDetails.products.data %}
                                {% for sku in product.skus.data %}
                                    {% if sku.attributes.category == queryDetails.category and sku.attributes.type == queryDetails.type %}
                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <!-- <p>{{sku.id}}</p> -->
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"{{sku.image}}\" alt=\"{{product.caption}}\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/{{sku.attributes.category}}/{{sku.attributes.type}}/{{product.metadata.slug}}-{{sku.attributes.color}}-{{sku.attributes.size}}/{{product.id}}/{{sku.id}}\">{{product.name}} - {{sku.attributes.color | capitalize}} {% if sku.attributes.size != 'none'%} - {{sku.attributes.size | capitalize}} {% endif %}</a> </h6>
                                                <p class=\"product-price-p\"><strong>£ {{(sku.price / 100) | number_format(2)}}</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    {% endif %}
                                {% endfor %}
                            {% endfor %}


                        {% endif %}

                        {% if queryDetails.num_of_products == 'specific' and queryDetails.brands_page %}
                            {% for product in queryDetails.products.data %}
                                <!-- <p>{{queryDetails.brand_clean}}</p> -->
                                <!-- <p>{{product.metadata.brand}}</p> -->
                                {% if product.metadata.brand | lower == queryDetails.brand_clean | lower %}
                                    {% for sku in product.skus.data %}
                                        <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                            <div class=\"card product-card\" style=\"\">
                                                <div class=\"product-image\">
                                                    <img class=\"card-img-top\" src=\"{{sku.image}}\" alt=\"{{product.caption}}\">
                                                </div>
                                                <div class=\"card-body\">
                                                    <h6 class=\"card-subtitle mb-2\"><a href=\"/product/{{sku.attributes.category}}/{{sku.attributes.type}}/{{product.metadata.slug}}-{{sku.attributes.color}}-{{sku.attributes.size}}/{{product.id}}/{{sku.id}}\">{{product.name}} - {{sku.attributes.color | capitalize}} {% if sku.attributes.size != 'none'%} - {{sku.attributes.size | capitalize}} {% endif %}</a> </h6>
                                                    <p class=\"product-price-p\"><strong>£ {{(sku.price / 100) | number_format(2)}}</strong> </p>
                                                </div>
                                            </div>
                                        </div>
                                    {% endfor %}

                                {% endif %}
                            {% endfor %}


                        {% endif %}

                        <!-- <product-card></product-card> -->

                </div>

                {% if queryDetails.products.has_more %}
                    <div class=\"row\">
                        <div class=\"col-12 text-center\">
                            <br>
                            <button class=\"btn btn-primary\">Show more</button>
                        </div>
                    </div>
                {% endif %}

            </div>
        </div>
    </div>
</div>
", "products.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/products.html.twig");
    }
}
