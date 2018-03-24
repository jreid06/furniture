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

    <!-- <div class=\"display-box\">
        <pre>
            ";
        // line 5
        echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, $this->getAttribute(($context["queryDetails"] ?? null), "all_brands", array())), "html", null, true);
        echo "
        </pre>
    </div> -->

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
                            <a href=\"/products/";
                // line 35
                echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
                echo "</a>
                        </li>
                    ";
            }
            // line 38
            echo "
                    ";
            // line 39
            if ($this->getAttribute(($context["breadcrumb"] ?? null), "two", array(), "any", true, true)) {
                // line 40
                echo "                        <li class=\"breadcrumb-item active\" aria-current=\"page\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "two", array()), "html", null, true);
                echo "</li>
                    ";
            }
            // line 42
            echo "
                ";
        }
        // line 44
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
        // line 61
        if ((($context["pagelocation"] ?? null) == "/products/gifts")) {
            // line 62
            echo "                <br>
                <h4 class=\"text-center filter-title-display\">Showing all Gift products</h4>
                <br>

            ";
        } else {
            // line 67
            echo "
                <p class=\"text-center\"><small>";
            // line 68
            echo twig_escape_filter($this->env, ($context["msg"] ?? null), "html", null, true);
            echo "</small></p>
                <h4 class=\"text-center filter-title-display\">Showing ";
            // line 69
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
        // line 73
        echo "

        </div>


        <div class=\"col-12 d-flex flex-wrap flex-row products-page-content\">

            ";
        // line 80
        if ((($context["pagelocation"] ?? null) == "/products/gifts")) {
            // line 81
            echo "                ";
            $context["hideFilter"] = true;
            // line 82
            echo "            ";
        } else {
            // line 83
            echo "                ";
            $context["hideFilter"] = false;
            // line 84
            echo "            ";
        }
        // line 85
        echo "
            <div class=\"p-2 filter filter-mobile closed-filter d-flex flex-wrap flex-row\" style=\"";
        // line 86
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
        // line 117
        if (($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "all")) {
            // line 118
            echo "
                                        ";
            // line 119
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["queryDetails"] ?? null), "all_cats", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["cats"]) {
                // line 120
                echo "                                        <template v-if=\"loaded.filter_list\">
                                            <template v-for=\"(prodtype, index) in products['";
                // line 121
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
            // line 131
            echo "
                                    ";
        } else {
            // line 133
            echo "
                                        <!--
                                            list specific product types
                                        -->

                                        <template v-if=\"loaded.filter_list\">
                                            <template v-for=\"(prodtype, index) in products['";
            // line 139
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
        // line 149
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
        // line 170
        if (($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "all")) {
            // line 171
            echo "
                                      ";
            // line 172
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["queryDetails"] ?? null), "all_cats", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["cats"]) {
                // line 173
                echo "                                          <li>
                                              <div class=\"input-group mb-0 filter-input-group\">
                                                  <div class=\"input-group-prepend filter-input-box\">
                                                      <div class=\"input-group-text filter-input d-flex flex-row\">
                                                          <div class=\"p-2 fltr-inp\">
                                                              <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"cat-";
                // line 178
                echo twig_escape_filter($this->env, $context["cats"], "html", null, true);
                echo "\" type=\"checkbox\" data-category=\"";
                echo twig_escape_filter($this->env, $context["cats"], "html", null, true);
                echo "\" aria-label=\"Checkbox for following text input\">
                                                          </div>

                                                          <div class=\"p-2 fltr-inp\">
                                                              <p>";
                // line 182
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
            // line 190
            echo "
                                      ";
        } else {
            // line 192
            echo "
                                      <li>
                                          <div class=\"input-group mb-0 filter-input-group\">
                                              <div class=\"input-group-prepend filter-input-box\">
                                                  <div class=\"input-group-text filter-input d-flex flex-row\">
                                                      <div class=\"p-2 fltr-inp\">
                                                          <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"cat-";
            // line 198
            echo twig_escape_filter($this->env, $this->getAttribute(($context["queryDetails"] ?? null), "category", array()), "html", null, true);
            echo "\" type=\"checkbox\" data-category=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["queryDetails"] ?? null), "category", array()), "html", null, true);
            echo "\" aria-label=\"Checkbox for following text input\" checked>
                                                      </div>

                                                      <div class=\"p-2 fltr-inp\">
                                                          <p>";
            // line 202
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["queryDetails"] ?? null), "category", array())), "html", null, true);
            echo "</p>
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>
                                      </li>

                                      ";
        }
        // line 211
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
        // line 229
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["queryDetails"] ?? null), "all_brands", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["brands"]) {
            // line 230
            echo "
                                      <!-- loop through brand_letter_array -->
                                          ";
            // line 232
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["brands"], "brand_array", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
                // line 233
                echo "                                          <li>
                                              <div class=\"input-group mb-0 filter-input-group\">
                                                  <div class=\"input-group-prepend filter-input-box\">
                                                      <div class=\"input-group-text filter-input d-flex flex-row\">
                                                          <div class=\"p-2 fltr-inp\">
                                                              <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"brand-";
                // line 238
                echo twig_escape_filter($this->env, $this->getAttribute($context["brand"], "slug", array()), "html", null, true);
                echo "\" type=\"checkbox\" data-category=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["brand"], "slug", array()), "html", null, true);
                echo "\" aria-label=\"Checkbox for following text input\">
                                                          </div>

                                                          <div class=\"p-2 fltr-inp\">
                                                              <p>";
                // line 242
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
            // line 250
            echo "                                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brands'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 251
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
        // line 280
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
        // line 298
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
        // line 321
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
        // line 331
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "gifts")) {
            // line 332
            echo "
                            ";
            // line 333
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 334
                echo "
                                ";
                // line 335
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 336
                    echo "
                                    ";
                    // line 337
                    if (($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "gift", array()) == "true")) {
                        // line 338
                        echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                        // line 341
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                        echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                        // line 344
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
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array())), "html", null, true);
                        echo "</a></h6>
                                                <h6 class=\"\">";
                        // line 345
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()))), "html", null, true);
                        echo "</h6>
                                                <p class=\"product-price-p\"><strong>£ ";
                        // line 346
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                        echo "</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                    }
                    // line 351
                    echo "
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 353
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 355
            echo "
                        ";
        }
        // line 357
        echo "

                        ";
        // line 359
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "all")) {
            // line 360
            echo "
                            ";
            // line 361
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 362
                echo "
                                ";
                // line 363
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 364
                    echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                    // line 367
                    echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                    echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                    // line 370
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
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array())), "html", null, true);
                    echo "</a></h6>
                                                <h6 class=\"\">";
                    // line 371
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()))), "html", null, true);
                    echo "</h6>
                                                <p class=\"product-price-p\"><strong>£ ";
                    // line 372
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
                // line 377
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 379
            echo "
                        ";
        }
        // line 381
        echo "
                        ";
        // line 382
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "all-cat")) {
            // line 383
            echo "
                            ";
            // line 384
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 385
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 386
                    echo "                                    ";
                    if (($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "category", array()))) {
                        // line 387
                        echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <!-- <p>";
                        // line 388
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                        echo "</p> -->
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                        // line 391
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                        echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                        // line 394
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
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array())), "html", null, true);
                        echo "</a></h6>
                                                <p class=\"product-price-p\"><strong>£ ";
                        // line 395
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                        echo "</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                    }
                    // line 400
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 401
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 402
            echo "
                        ";
        }
        // line 404
        echo "
                        ";
        // line 405
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "specific")) {
            // line 406
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 407
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 408
                    echo "                                    ";
                    if ((($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "category", array())) && ($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "type", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "type", array())))) {
                        // line 409
                        echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <!-- <p>";
                        // line 410
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                        echo "</p> -->
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                        // line 413
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                        echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                        // line 416
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
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array())), "html", null, true);
                        echo "</a> </h6>
                                                <p class=\"product-price-p\"><strong>£ ";
                        // line 417
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                        echo "</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                    }
                    // line 422
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 423
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 424
            echo "

                        ";
        }
        // line 427
        echo "
                        <!-- <product-card></product-card> -->

                </div>

                ";
        // line 432
        if ($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "has_more", array())) {
            // line 433
            echo "                    <div class=\"row\">
                        <div class=\"col-12 text-center\">
                            <br>
                            <button class=\"btn btn-primary\">Show more</button>
                        </div>
                    </div>
                ";
        }
        // line 440
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
        return array (  878 => 440,  869 => 433,  867 => 432,  860 => 427,  855 => 424,  849 => 423,  843 => 422,  835 => 417,  813 => 416,  805 => 413,  799 => 410,  796 => 409,  793 => 408,  788 => 407,  783 => 406,  781 => 405,  778 => 404,  774 => 402,  768 => 401,  762 => 400,  754 => 395,  732 => 394,  724 => 391,  718 => 388,  715 => 387,  712 => 386,  707 => 385,  703 => 384,  700 => 383,  698 => 382,  695 => 381,  691 => 379,  684 => 377,  673 => 372,  669 => 371,  647 => 370,  639 => 367,  634 => 364,  630 => 363,  627 => 362,  623 => 361,  620 => 360,  618 => 359,  614 => 357,  610 => 355,  603 => 353,  596 => 351,  588 => 346,  584 => 345,  562 => 344,  554 => 341,  549 => 338,  547 => 337,  544 => 336,  540 => 335,  537 => 334,  533 => 333,  530 => 332,  528 => 331,  513 => 321,  487 => 298,  466 => 280,  435 => 251,  429 => 250,  415 => 242,  406 => 238,  399 => 233,  395 => 232,  391 => 230,  387 => 229,  367 => 211,  355 => 202,  346 => 198,  338 => 192,  334 => 190,  320 => 182,  311 => 178,  304 => 173,  300 => 172,  297 => 171,  295 => 170,  272 => 149,  259 => 139,  251 => 133,  247 => 131,  231 => 121,  228 => 120,  224 => 119,  221 => 118,  219 => 117,  183 => 86,  180 => 85,  177 => 84,  174 => 83,  171 => 82,  168 => 81,  166 => 80,  157 => 73,  138 => 69,  134 => 68,  131 => 67,  124 => 62,  122 => 61,  103 => 44,  99 => 42,  93 => 40,  91 => 39,  88 => 38,  80 => 35,  77 => 34,  75 => 33,  72 => 32,  66 => 30,  64 => 29,  61 => 28,  57 => 26,  53 => 24,  51 => 23,  48 => 22,  41 => 17,  39 => 16,  25 => 5,  19 => 1,);
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

    <!-- <div class=\"display-box\">
        <pre>
            {{dump(queryDetails.all_brands)}}
        </pre>
    </div> -->

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
                            <a href=\"/products/{{breadcrumb.one}}\">{{breadcrumb.one}}</a>
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

                                    {% if queryDetails.category == 'all' %}

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
                                                              <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"brand-{{brand.slug}}\" type=\"checkbox\" data-category=\"{{brand.slug}}\" aria-label=\"Checkbox for following text input\">
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
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/{{sku.attributes.category}}/{{sku.attributes.type}}/{{product.metadata.slug}}-{{sku.attributes.color}}-{{sku.attributes.size}}/{{product.id}}/{{sku.id}}\">{{product.name}} - {{sku.attributes.color | capitalize}} - {{sku.attributes.size | capitalize}}</a></h6>
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
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/{{sku.attributes.category}}/{{sku.attributes.type}}/{{product.metadata.slug}}-{{sku.attributes.color}}-{{sku.attributes.size}}/{{product.id}}/{{sku.id}}\">{{product.name}} - {{sku.attributes.color | capitalize}} - {{sku.attributes.size | capitalize}}</a></h6>
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
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/{{sku.attributes.category}}/{{sku.attributes.type}}/{{product.metadata.slug}}-{{sku.attributes.color}}-{{sku.attributes.size}}/{{product.id}}/{{sku.id}}\">{{product.name}} - {{sku.attributes.color | capitalize}} - {{sku.attributes.size | capitalize}}</a></h6>
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
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/{{sku.attributes.category}}/{{sku.attributes.type}}/{{product.metadata.slug}}-{{sku.attributes.color}}-{{sku.attributes.size}}/{{product.id}}/{{sku.id}}\">{{product.name}} - {{sku.attributes.color | capitalize}} - {{sku.attributes.size | capitalize}}</a> </h6>
                                                <p class=\"product-price-p\"><strong>£ {{(sku.price / 100) | number_format(2)}}</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    {% endif %}
                                {% endfor %}
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
