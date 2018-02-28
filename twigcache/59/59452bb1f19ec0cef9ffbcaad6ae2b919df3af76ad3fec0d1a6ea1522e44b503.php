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

    <div class=\"row\">
        <div class=\"col-12 breadcrumb-container\">
            <nav aria-label=\"breadcrumb\" role=\"navigation\">
              <ol class=\"breadcrumb\">
                <!-- render list items dynamically based on \$_GET parameters set on products.php -->
                <li class=\"breadcrumb-item\"><a href=\"/\">Home</a></li>

                ";
        // line 10
        if ((($context["pagelocation"] ?? null) == "/products/gifts")) {
            // line 11
            echo "
                    <li class=\"breadcrumb-item\"><a href=\"/products\">Products</a></li>
                    <li class=\"breadcrumb-item active\">Gifts</li>

                ";
        } else {
            // line 16
            echo "
                    ";
            // line 17
            if (( !$this->getAttribute(($context["breadcrumb"] ?? null), "one", array()) &&  !$this->getAttribute(($context["breadcrumb"] ?? null), "two", array()))) {
                // line 18
                echo "                        <li class=\"breadcrumb-item active\">Products</li>
                    ";
            } else {
                // line 20
                echo "                        <li class=\"breadcrumb-item\"><a href=\"/products\">Products</a></li>
                    ";
            }
            // line 22
            echo "
                    ";
            // line 23
            if (($this->getAttribute(($context["breadcrumb"] ?? null), "one", array(), "any", true, true) &&  !$this->getAttribute(($context["breadcrumb"] ?? null), "two", array(), "any", true, true))) {
                // line 24
                echo "                        <li class=\"breadcrumb-item active\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
                echo "</li>
                    ";
            }
            // line 26
            echo "
                    ";
            // line 27
            if (($this->getAttribute(($context["breadcrumb"] ?? null), "one", array(), "any", true, true) && $this->getAttribute(($context["breadcrumb"] ?? null), "two", array(), "any", true, true))) {
                // line 28
                echo "                        <li class=\"breadcrumb-item \">
                            <a href=\"/products/";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
                echo "</a>
                        </li>
                    ";
            }
            // line 32
            echo "
                    ";
            // line 33
            if ($this->getAttribute(($context["breadcrumb"] ?? null), "two", array(), "any", true, true)) {
                // line 34
                echo "                        <li class=\"breadcrumb-item active\" aria-current=\"page\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "two", array()), "html", null, true);
                echo "</li>
                    ";
            }
            // line 36
            echo "
                ";
        }
        // line 38
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
        // line 55
        if ((($context["pagelocation"] ?? null) == "/products/gifts")) {
            // line 56
            echo "                <br>
                <h4 class=\"text-center filter-title-display\">Showing all Gift products</h4>
                <br>

            ";
        } else {
            // line 61
            echo "
                <p class=\"text-center\"><small>";
            // line 62
            echo twig_escape_filter($this->env, ($context["msg"] ?? null), "html", null, true);
            echo "</small></p>
                <h4 class=\"text-center filter-title-display\">Showing ";
            // line 63
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
        // line 67
        echo "

        </div>




        <div class=\"col-12 d-flex flex-wrap flex-row products-page-content\">

            ";
        // line 76
        if ((($context["pagelocation"] ?? null) == "/products/gifts")) {
            // line 77
            echo "                ";
            $context["hideFilter"] = true;
            // line 78
            echo "            ";
        } else {
            // line 79
            echo "                ";
            $context["hideFilter"] = false;
            // line 80
            echo "            ";
        }
        // line 81
        echo "
            <div class=\"p-2 filter filter-mobile closed-filter d-flex flex-wrap flex-row\" style=\"";
        // line 82
        if (($context["hideFilter"] ?? null)) {
            echo "display: none !important;";
        }
        echo "\">

                <div class=\"p-2\">
                    <div id=\"accordion\">

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
        // line 112
        if ((($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "livingroom") || ($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "all"))) {
            // line 113
            echo "                                        <template v-for=\"(prodtype, index) in products.livingroom\">
                                            <template v-if=\"prodtype.name == 'all products'\">

                                            </template>
                                            <template v-else>
                                                <filter-item
                                                        v-bind:key=\"prodtype.key\"
                                                        v-bind:filtername=\"prodtype.name\"
                                                        v-bind:activetype=\"prodtype.currentPage\">
                                                </filter-item>
                                            </template>
                                        </template>
                                    ";
        }
        // line 126
        echo "
                                    <!--
                                        list all kitchen product types
                                    -->

                                    ";
        // line 131
        if ((($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "kitchen") || ($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "all"))) {
            // line 132
            echo "                                    <template v-for=\"(prodtype, index) in products.kitchen\">
                                        <template v-if=\"prodtype.name == 'all products'\">

                                        </template>
                                        <template v-else>
                                            <filter-item
                                                    v-bind:key=\"prodtype.key\"
                                                    v-bind:filtername=\"prodtype.name\"
                                                    v-bind:activetype=\"prodtype.currentPage\">
                                            </filter-item>
                                        </template>
                                    </template>
                                    ";
        }
        // line 145
        echo "

                                    <!--
                                        list all bedroom product types
                                    -->

                                    ";
        // line 151
        if ((($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "bedroom") || ($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "all"))) {
            // line 152
            echo "                                    <template v-for=\"(prodtype, index) in products.bedroom\">
                                        <template v-if=\"prodtype.name == 'all products'\">

                                        </template>
                                        <template v-else>
                                            <filter-item
                                                    v-bind:key=\"prodtype.key\"
                                                    v-bind:filtername=\"prodtype.name\"
                                                    v-bind:activetype=\"prodtype.currentPage\">
                                            </filter-item>
                                        </template>
                                    </template>
                                    ";
        }
        // line 165
        echo "
                                    <!--
                                        list all bathroom product types
                                    -->

                                    ";
        // line 170
        if ((($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "bath") || ($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "all"))) {
            // line 171
            echo "                                    <template v-for=\"(prodtype, index) in products.bath\">
                                        <template v-if=\"prodtype.name == 'all products'\">

                                        </template>
                                        <template v-else>
                                            <filter-item
                                                    v-bind:key=\"prodtype.key\"
                                                    v-bind:filtername=\"prodtype.name\"
                                                    v-bind:activetype=\"prodtype.currentPage\">
                                            </filter-item>
                                        </template>
                                    </template>
                                    ";
        }
        // line 184
        echo "
                                </ul>
                              </div>
                            </div>
                          </div>

                          <!--  -->
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
        // line 205
        if ((($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "livingroom") || ($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "all"))) {
            // line 206
            echo "                                      <li>
                                          <div class=\"input-group mb-0 filter-input-group\">
                                              <div class=\"input-group-prepend filter-input-box\">
                                                  <div class=\"input-group-text filter-input d-flex flex-row\">
                                                      <div class=\"p-2 fltr-inp\">
                                                          <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"cat-livingroom\" type=\"checkbox\" data-category=\"livingroom\" aria-label=\"Checkbox for following text input\" ";
            // line 211
            if (($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "livingroom")) {
                echo " checked ";
            }
            echo ">
                                                      </div>

                                                      <div class=\"p-2 fltr-inp\">
                                                          <p>Living Room</p>
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>
                                      </li>

                                      ";
        }
        // line 224
        echo "
                                      ";
        // line 225
        if ((($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "kitchen") || ($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "all"))) {
            // line 226
            echo "                                      <li>
                                          <div class=\"input-group mb-0 filter-input-group\">
                                              <div class=\"input-group-prepend filter-input-box\">
                                                  <div class=\"input-group-text filter-input d-flex flex-row\">
                                                      <div class=\"p-2 fltr-inp\">
                                                          <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"cat-kitchen\" type=\"checkbox\" data-category=\"kitchen\" aria-label=\"Checkbox for following text input\" ";
            // line 231
            if (($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "kitchen")) {
                echo " checked ";
            }
            echo ">
                                                      </div>

                                                      <div class=\"p-2 fltr-inp\">
                                                          <p>Kitchen</p>
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>
                                      </li>

                                      ";
        }
        // line 244
        echo "
                                      ";
        // line 245
        if ((($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "bedroom") || ($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "all"))) {
            // line 246
            echo "                                      <li>
                                          <div class=\"input-group mb-0 filter-input-group\">
                                              <div class=\"input-group-prepend filter-input-box\">
                                                  <div class=\"input-group-text filter-input d-flex flex-row\">
                                                      <div class=\"p-2 fltr-inp\">
                                                          <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"cat-bedroom\" type=\"checkbox\" data-category=\"bedroom\" aria-label=\"Checkbox for following text input\" ";
            // line 251
            if (($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "bedroom")) {
                echo " checked ";
            }
            echo ">
                                                      </div>

                                                      <div class=\"p-2 fltr-inp\">
                                                          <p>Bedroom</p>
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>
                                      </li>

                                      ";
        }
        // line 264
        echo "
                                      ";
        // line 265
        if ((($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "bath") || ($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "all"))) {
            // line 266
            echo "                                      <li>
                                          <div class=\"input-group mb-0 filter-input-group\">
                                              <div class=\"input-group-prepend filter-input-box\">
                                                  <div class=\"input-group-text filter-input d-flex flex-row\">
                                                      <div class=\"p-2 fltr-inp\">
                                                          <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"cat-bath\" type=\"checkbox\" data-category=\"bath\" aria-label=\"Checkbox for following text input\" ";
            // line 271
            if (($this->getAttribute(($context["queryDetails"] ?? null), "category", array()) == "bath")) {
                echo " checked ";
            }
            echo ">
                                                      </div>

                                                      <div class=\"p-2 fltr-inp\">
                                                          <p>Bath</p>
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>
                                      </li>

                                      ";
        }
        // line 284
        echo "
                                  </ul>
                              </div>
                            </div>
                          </div>

                          <!--  -->
                          <div class=\"card filter-card\">
                            <div class=\"card-header\" id=\"headingThree\">
                              <div v-on:click=\"toggleSign\" class=\"btn btn-link collapsed btn-filter\" data-toggle=\"collapse\" data-target=\"#filter3\" aria-expanded=\"false\" aria-controls=\"filter3\" data-filter-id=\"#filter3\">

                                    <div>Brand</div>
                                    <div class=\"fa fa-minus open-accordion\" data-filter-id=\"#filter3\"></div>

                              </div>
                           </div>
                           <div id=\"filter3\" class=\"collapse show\" aria-labelledby=\"headingThree\" >
                              <div class=\"card-body\">
                                  <ul>
                                      <li>
                                          <div class=\"input-group mb-3\">
                                              <div class=\"input-group-prepend\">
                                                  <div class=\"input-group-text\">
                                                      <input type=\"checkbox\" aria-label=\"Checkbox for following text input\">
                                                  </div>
                                              </div>
                                          </div>
                                      </li>
                                  </ul>
                              </div>
                            </div>
                         </div>
                         <!--  -->

                         <!--  -->
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
        // line 342
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
        // line 360
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
                        <!--  -->

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
        // line 384
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
        // line 394
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "gifts")) {
            // line 395
            echo "
                            ";
            // line 396
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 397
                echo "
                                ";
                // line 398
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 399
                    echo "
                                    ";
                    // line 400
                    if ($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "gift", array())) {
                        // line 401
                        echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                        // line 404
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                        echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                        // line 407
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
                        // line 408
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()))), "html", null, true);
                        echo "</h6>
                                                <p class=\"product-price-p\"><strong>£ ";
                        // line 409
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                        echo "</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                    }
                    // line 414
                    echo "
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 416
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 418
            echo "
                        ";
        }
        // line 420
        echo "

                        ";
        // line 422
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "all")) {
            // line 423
            echo "
                            ";
            // line 424
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 425
                echo "
                                ";
                // line 426
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 427
                    echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                    // line 430
                    echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                    echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                    // line 433
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
                    // line 434
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()))), "html", null, true);
                    echo "</h6>
                                                <p class=\"product-price-p\"><strong>£ ";
                    // line 435
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
                // line 440
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 442
            echo "
                        ";
        }
        // line 444
        echo "
                        ";
        // line 445
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "all-cat")) {
            // line 446
            echo "
                            ";
            // line 447
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 448
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 449
                    echo "                                    ";
                    if (($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "category", array()))) {
                        // line 450
                        echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <!-- <p>";
                        // line 451
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                        echo "</p> -->
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                        // line 454
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                        echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                        // line 457
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
                        // line 458
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                        echo "</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                    }
                    // line 463
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 464
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 465
            echo "
                        ";
        }
        // line 467
        echo "
                        ";
        // line 468
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "specific")) {
            // line 469
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 470
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 471
                    echo "                                    ";
                    if ((($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "category", array())) && ($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "type", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "type", array())))) {
                        // line 472
                        echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <!-- <p>";
                        // line 473
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                        echo "</p> -->
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                        // line 476
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                        echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                        // line 479
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
                        // line 480
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                        echo "</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                    }
                    // line 485
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 486
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 487
            echo "

                        ";
        }
        // line 490
        echo "
                        <!-- <product-card></product-card> -->

                </div>

                ";
        // line 495
        if ($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "has_more", array())) {
            // line 496
            echo "                    <div class=\"row\">
                        <div class=\"col-12 text-center\">
                            <br>
                            <button class=\"btn btn-primary\">Show more</button>
                        </div>
                    </div>
                ";
        }
        // line 503
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
        return array (  914 => 503,  905 => 496,  903 => 495,  896 => 490,  891 => 487,  885 => 486,  879 => 485,  871 => 480,  849 => 479,  841 => 476,  835 => 473,  832 => 472,  829 => 471,  824 => 470,  819 => 469,  817 => 468,  814 => 467,  810 => 465,  804 => 464,  798 => 463,  790 => 458,  768 => 457,  760 => 454,  754 => 451,  751 => 450,  748 => 449,  743 => 448,  739 => 447,  736 => 446,  734 => 445,  731 => 444,  727 => 442,  720 => 440,  709 => 435,  705 => 434,  683 => 433,  675 => 430,  670 => 427,  666 => 426,  663 => 425,  659 => 424,  656 => 423,  654 => 422,  650 => 420,  646 => 418,  639 => 416,  632 => 414,  624 => 409,  620 => 408,  598 => 407,  590 => 404,  585 => 401,  583 => 400,  580 => 399,  576 => 398,  573 => 397,  569 => 396,  566 => 395,  564 => 394,  549 => 384,  522 => 360,  501 => 342,  441 => 284,  423 => 271,  416 => 266,  414 => 265,  411 => 264,  393 => 251,  386 => 246,  384 => 245,  381 => 244,  363 => 231,  356 => 226,  354 => 225,  351 => 224,  333 => 211,  326 => 206,  324 => 205,  301 => 184,  286 => 171,  284 => 170,  277 => 165,  262 => 152,  260 => 151,  252 => 145,  237 => 132,  235 => 131,  228 => 126,  213 => 113,  211 => 112,  176 => 82,  173 => 81,  170 => 80,  167 => 79,  164 => 78,  161 => 77,  159 => 76,  148 => 67,  129 => 63,  125 => 62,  122 => 61,  115 => 56,  113 => 55,  94 => 38,  90 => 36,  84 => 34,  82 => 33,  79 => 32,  71 => 29,  68 => 28,  66 => 27,  63 => 26,  57 => 24,  55 => 23,  52 => 22,  48 => 20,  44 => 18,  42 => 17,  39 => 16,  32 => 11,  30 => 10,  19 => 1,);
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

                                    {% if queryDetails.category == 'livingroom' or queryDetails.category == 'all' %}
                                        <template v-for=\"(prodtype, index) in products.livingroom\">
                                            <template v-if=\"prodtype.name == 'all products'\">

                                            </template>
                                            <template v-else>
                                                <filter-item
                                                        v-bind:key=\"prodtype.key\"
                                                        v-bind:filtername=\"prodtype.name\"
                                                        v-bind:activetype=\"prodtype.currentPage\">
                                                </filter-item>
                                            </template>
                                        </template>
                                    {% endif %}

                                    <!--
                                        list all kitchen product types
                                    -->

                                    {% if queryDetails.category == 'kitchen' or queryDetails.category == 'all' %}
                                    <template v-for=\"(prodtype, index) in products.kitchen\">
                                        <template v-if=\"prodtype.name == 'all products'\">

                                        </template>
                                        <template v-else>
                                            <filter-item
                                                    v-bind:key=\"prodtype.key\"
                                                    v-bind:filtername=\"prodtype.name\"
                                                    v-bind:activetype=\"prodtype.currentPage\">
                                            </filter-item>
                                        </template>
                                    </template>
                                    {% endif %}


                                    <!--
                                        list all bedroom product types
                                    -->

                                    {% if queryDetails.category == 'bedroom' or queryDetails.category == 'all' %}
                                    <template v-for=\"(prodtype, index) in products.bedroom\">
                                        <template v-if=\"prodtype.name == 'all products'\">

                                        </template>
                                        <template v-else>
                                            <filter-item
                                                    v-bind:key=\"prodtype.key\"
                                                    v-bind:filtername=\"prodtype.name\"
                                                    v-bind:activetype=\"prodtype.currentPage\">
                                            </filter-item>
                                        </template>
                                    </template>
                                    {% endif %}

                                    <!--
                                        list all bathroom product types
                                    -->

                                    {% if queryDetails.category == 'bath' or queryDetails.category == 'all' %}
                                    <template v-for=\"(prodtype, index) in products.bath\">
                                        <template v-if=\"prodtype.name == 'all products'\">

                                        </template>
                                        <template v-else>
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

                          <!--  -->
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

                                      {% if queryDetails.category == 'livingroom' or queryDetails.category == 'all' %}
                                      <li>
                                          <div class=\"input-group mb-0 filter-input-group\">
                                              <div class=\"input-group-prepend filter-input-box\">
                                                  <div class=\"input-group-text filter-input d-flex flex-row\">
                                                      <div class=\"p-2 fltr-inp\">
                                                          <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"cat-livingroom\" type=\"checkbox\" data-category=\"livingroom\" aria-label=\"Checkbox for following text input\" {% if queryDetails.category == 'livingroom' %} checked {% endif %}>
                                                      </div>

                                                      <div class=\"p-2 fltr-inp\">
                                                          <p>Living Room</p>
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>
                                      </li>

                                      {% endif %}

                                      {% if queryDetails.category == 'kitchen' or queryDetails.category == 'all' %}
                                      <li>
                                          <div class=\"input-group mb-0 filter-input-group\">
                                              <div class=\"input-group-prepend filter-input-box\">
                                                  <div class=\"input-group-text filter-input d-flex flex-row\">
                                                      <div class=\"p-2 fltr-inp\">
                                                          <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"cat-kitchen\" type=\"checkbox\" data-category=\"kitchen\" aria-label=\"Checkbox for following text input\" {% if queryDetails.category == 'kitchen' %} checked {% endif %}>
                                                      </div>

                                                      <div class=\"p-2 fltr-inp\">
                                                          <p>Kitchen</p>
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>
                                      </li>

                                      {% endif %}

                                      {% if queryDetails.category == 'bedroom' or queryDetails.category == 'all' %}
                                      <li>
                                          <div class=\"input-group mb-0 filter-input-group\">
                                              <div class=\"input-group-prepend filter-input-box\">
                                                  <div class=\"input-group-text filter-input d-flex flex-row\">
                                                      <div class=\"p-2 fltr-inp\">
                                                          <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"cat-bedroom\" type=\"checkbox\" data-category=\"bedroom\" aria-label=\"Checkbox for following text input\" {% if queryDetails.category == 'bedroom' %} checked {% endif %}>
                                                      </div>

                                                      <div class=\"p-2 fltr-inp\">
                                                          <p>Bedroom</p>
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>
                                      </li>

                                      {% endif %}

                                      {% if queryDetails.category == 'bath' or queryDetails.category == 'all' %}
                                      <li>
                                          <div class=\"input-group mb-0 filter-input-group\">
                                              <div class=\"input-group-prepend filter-input-box\">
                                                  <div class=\"input-group-text filter-input d-flex flex-row\">
                                                      <div class=\"p-2 fltr-inp\">
                                                          <input @click=\"toggleProducts\" class=\"cat-checkbox\" name=\"cat-bath\" type=\"checkbox\" data-category=\"bath\" aria-label=\"Checkbox for following text input\" {% if queryDetails.category == 'bath' %} checked {% endif %}>
                                                      </div>

                                                      <div class=\"p-2 fltr-inp\">
                                                          <p>Bath</p>
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

                          <!--  -->
                          <div class=\"card filter-card\">
                            <div class=\"card-header\" id=\"headingThree\">
                              <div v-on:click=\"toggleSign\" class=\"btn btn-link collapsed btn-filter\" data-toggle=\"collapse\" data-target=\"#filter3\" aria-expanded=\"false\" aria-controls=\"filter3\" data-filter-id=\"#filter3\">

                                    <div>Brand</div>
                                    <div class=\"fa fa-minus open-accordion\" data-filter-id=\"#filter3\"></div>

                              </div>
                           </div>
                           <div id=\"filter3\" class=\"collapse show\" aria-labelledby=\"headingThree\" >
                              <div class=\"card-body\">
                                  <ul>
                                      <li>
                                          <div class=\"input-group mb-3\">
                                              <div class=\"input-group-prepend\">
                                                  <div class=\"input-group-text\">
                                                      <input type=\"checkbox\" aria-label=\"Checkbox for following text input\">
                                                  </div>
                                              </div>
                                          </div>
                                      </li>
                                  </ul>
                              </div>
                            </div>
                         </div>
                         <!--  -->

                         <!--  -->
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
                        <!--  -->

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

                                    {% if sku.attributes.gift %}
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
", "products.html.twig", "/Users/jasonreid/Sites/furniture/twig_templates/products.html.twig");
    }
}
