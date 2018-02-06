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
        // line 11
        if (( !$this->getAttribute(($context["breadcrumb"] ?? null), "one", array()) &&  !$this->getAttribute(($context["breadcrumb"] ?? null), "two", array()))) {
            // line 12
            echo "                    <li class=\"breadcrumb-item active\">Products</li>
                ";
        } else {
            // line 14
            echo "                    <li class=\"breadcrumb-item\"><a href=\"/products\">Products</a></li>
                ";
        }
        // line 16
        echo "
                ";
        // line 17
        if (($this->getAttribute(($context["breadcrumb"] ?? null), "one", array(), "any", true, true) &&  !$this->getAttribute(($context["breadcrumb"] ?? null), "two", array(), "any", true, true))) {
            // line 18
            echo "                    <li class=\"breadcrumb-item active\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
            echo "</li>
                ";
        }
        // line 20
        echo "
                ";
        // line 21
        if (($this->getAttribute(($context["breadcrumb"] ?? null), "one", array(), "any", true, true) && $this->getAttribute(($context["breadcrumb"] ?? null), "two", array(), "any", true, true))) {
            // line 22
            echo "                    <li class=\"breadcrumb-item \">
                        <a href=\"/products/";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
            echo "</a>
                    </li>
                ";
        }
        // line 26
        echo "
                ";
        // line 27
        if ($this->getAttribute(($context["breadcrumb"] ?? null), "two", array(), "any", true, true)) {
            // line 28
            echo "                    <li class=\"breadcrumb-item active\" aria-current=\"page\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "two", array()), "html", null, true);
            echo "</li>
                ";
        }
        // line 30
        echo "
              </ol>
              <!--  -->
            </nav>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-12\">
            ";
        // line 38
        if ($this->getAttribute(($context["queryDetails"] ?? null), "products", array(), "any", true, true)) {
            // line 39
            echo "                <!-- <pre>";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "html", null, true);
            echo "</pre> -->
            ";
        }
        // line 41
        echo "        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12 d-flex flex-wrap flex-row mobile-filter-ctrl\">
            <div class=\"p-2 d-lg-none\">
                <button class=\"btn btn-primary\" @click.prevent=\"toggleFilter\">FILTER</button>
            </div>
        </div>

        <div class=\"col-12\">
            <p class=\"text-center\"><small>";
        // line 52
        echo twig_escape_filter($this->env, ($context["msg"] ?? null), "html", null, true);
        echo "</small></p>
            <h4 class=\"text-center\">Showing all ";
        // line 53
        if (($this->getAttribute(($context["queryDetails"] ?? null), "category", array(), "any", true, true) && $this->getAttribute(($context["queryDetails"] ?? null), "type", array(), "any", true, true))) {
            echo " ";
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

        </div>
        <div class=\"col-12 d-flex flex-wrap flex-row products-page-content\">
            <div class=\"p-2 filter filter-mobile closed-filter d-flex flex-wrap flex-row\">

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
                                    <template v-for=\"(prodtype, index) in products.livingroom\">
                                        <template v-if=\"prodtype.name == 'all products'\">

                                        </template>
                                        <template v-else>
                                            <filter-item
                                                    v-bind:key=\"prodtype.key\"
                                                    v-bind:filtername=\"prodtype.name\">
                                            </filter-item>
                                        </template>
                                    </template>

                                    <!--
                                        list all kitchen product types
                                    -->
                                    <template v-for=\"(prodtype, index) in products.kitchen\">
                                        <template v-if=\"prodtype.name == 'all products'\">

                                        </template>
                                        <template v-else>
                                            <filter-item
                                                    v-bind:key=\"prodtype.key\"
                                                    v-bind:filtername=\"prodtype.name\">
                                            </filter-item>
                                        </template>
                                    </template>


                                    <!--
                                        list all bedroom product types
                                    -->
                                    <template v-for=\"(prodtype, index) in products.bedroom\">
                                        <template v-if=\"prodtype.name == 'all products'\">

                                        </template>
                                        <template v-else>
                                            <filter-item
                                                    v-bind:key=\"prodtype.key\"
                                                    v-bind:filtername=\"prodtype.name\">
                                            </filter-item>
                                        </template>
                                    </template>


                                    <!--
                                        list all bathroom product types
                                    -->
                                    <template v-for=\"(prodtype, index) in products.bath\">
                                        <template v-if=\"prodtype.name == 'all products'\">

                                        </template>
                                        <template v-else>
                                            <filter-item
                                                    v-bind:key=\"prodtype.key\"
                                                    v-bind:filtername=\"prodtype.name\">
                                            </filter-item>
                                        </template>
                                    </template>

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
                                      <template v-for=\"(category, index) in categories\">
                                          <filter-item
                                                  v-bind:key=\"category.key\"
                                                  v-bind:filtername=\"category.name\">
                                          </filter-item>
                                      </template>
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
                                         <div class=\"input-group mb-3 filter-input-group\">
                                             <div class=\"input-group-prepend filter-input-box\">
                                                 <div class=\"input-group-text filter-input d-flex flex-row\">
                                                     <div class=\"p-2 fltr-inp\">
                                                         <input name=\"lowtohigh\" type=\"checkbox\" data-prod-type=\"price\" aria-label=\"Checkbox for following text input\">
                                                     </div>

                                                     <div class=\"p-2 fltr-inp\">
                                                         <p>
                                                         ";
        // line 228
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array("low to high")), "html", null, true);
        echo "
                                                        </p>
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>
                                     </li>

                                     <li>
                                         <div class=\"input-group mb-3 filter-input-group\">
                                             <div class=\"input-group-prepend filter-input-box\">
                                                 <div class=\"input-group-text filter-input d-flex flex-row\">
                                                     <div class=\"p-2 fltr-inp\">
                                                         <input name=\"hightolow\" type=\"checkbox\" data-prod-type=\"price\" aria-label=\"Checkbox for following text input\">
                                                     </div>

                                                     <div class=\"p-2 fltr-inp\">
                                                         <p>";
        // line 246
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
            <div class=\"p-2 products-page-container\">
                <div class=\"row\">
                    <!-- NOTE: COLUMN WILL GO IN A FOR LOOP  -->
                        <!-- <div class=\"col-12\">
                            <p class=\"text-center\"><small>";
        // line 274
        echo twig_escape_filter($this->env, ($context["msg"] ?? null), "html", null, true);
        echo "</small></p>
                            <h4 class=\"text-center\">Showing all ";
        // line 275
        if (($this->getAttribute(($context["queryDetails"] ?? null), "category", array(), "any", true, true) && $this->getAttribute(($context["queryDetails"] ?? null), "type", array(), "any", true, true))) {
            echo " ";
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

                        </div> -->

                        ";
        // line 280
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "all")) {
            // line 281
            echo "
                            ";
            // line 282
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 283
                echo "
                                ";
                // line 284
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 285
                    echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                    // line 288
                    echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                    echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                    // line 291
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
                    // line 292
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()))), "html", null, true);
                    echo "</h6>
                                                <p class=\"product-price-p\"><strong>£ ";
                    // line 293
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
                // line 298
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 300
            echo "
                        ";
        }
        // line 302
        echo "
                        ";
        // line 303
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "all-cat")) {
            // line 304
            echo "
                            ";
            // line 305
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 306
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 307
                    echo "                                    ";
                    if (($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "category", array()))) {
                        // line 308
                        echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <!-- <p>";
                        // line 309
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                        echo "</p> -->
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                        // line 312
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                        echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                        // line 315
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
                        // line 316
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                        echo "</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                    }
                    // line 321
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 322
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 323
            echo "
                        ";
        }
        // line 325
        echo "
                        ";
        // line 326
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "specific")) {
            // line 327
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 328
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 329
                    echo "                                    ";
                    if ((($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "category", array())) && ($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "type", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "type", array())))) {
                        // line 330
                        echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <!-- <p>";
                        // line 331
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                        echo "</p> -->
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                        // line 334
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                        echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h6 class=\"card-subtitle mb-2\"><a href=\"/product/";
                        // line 337
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
                        // line 338
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                        echo "</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                    }
                    // line 343
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 344
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 345
            echo "

                        ";
        }
        // line 348
        echo "
                        <!-- <product-card></product-card> -->

                </div>

                ";
        // line 353
        if ($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "has_more", array())) {
            // line 354
            echo "                    <div class=\"row\">
                        <div class=\"col-12 text-center\">
                            <br>
                            <button class=\"btn btn-primary\">Show more</button>
                        </div>
                    </div>
                ";
        }
        // line 361
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
        return array (  640 => 361,  631 => 354,  629 => 353,  622 => 348,  617 => 345,  611 => 344,  605 => 343,  597 => 338,  575 => 337,  567 => 334,  561 => 331,  558 => 330,  555 => 329,  550 => 328,  545 => 327,  543 => 326,  540 => 325,  536 => 323,  530 => 322,  524 => 321,  516 => 316,  494 => 315,  486 => 312,  480 => 309,  477 => 308,  474 => 307,  469 => 306,  465 => 305,  462 => 304,  460 => 303,  457 => 302,  453 => 300,  446 => 298,  435 => 293,  431 => 292,  409 => 291,  401 => 288,  396 => 285,  392 => 284,  389 => 283,  385 => 282,  382 => 281,  380 => 280,  360 => 275,  356 => 274,  325 => 246,  304 => 228,  114 => 53,  110 => 52,  97 => 41,  91 => 39,  89 => 38,  79 => 30,  73 => 28,  71 => 27,  68 => 26,  60 => 23,  57 => 22,  55 => 21,  52 => 20,  46 => 18,  44 => 17,  41 => 16,  37 => 14,  33 => 12,  31 => 11,  19 => 1,);
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

              </ol>
              <!--  -->
            </nav>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-12\">
            {% if queryDetails.products is defined %}
                <!-- <pre>{{ queryDetails.products}}</pre> -->
            {% endif %}
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12 d-flex flex-wrap flex-row mobile-filter-ctrl\">
            <div class=\"p-2 d-lg-none\">
                <button class=\"btn btn-primary\" @click.prevent=\"toggleFilter\">FILTER</button>
            </div>
        </div>

        <div class=\"col-12\">
            <p class=\"text-center\"><small>{{msg}}</small></p>
            <h4 class=\"text-center\">Showing all {% if queryDetails.category is defined and queryDetails.type is defined %} {{queryDetails.category}} {{queryDetails.type}} {% elseif queryDetails.category is defined and not queryDetails.type is defined %} {{queryDetails.category}} products {% else %} Products {% endif %}</h4>
            <br>

        </div>
        <div class=\"col-12 d-flex flex-wrap flex-row products-page-content\">
            <div class=\"p-2 filter filter-mobile closed-filter d-flex flex-wrap flex-row\">

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
                                    <template v-for=\"(prodtype, index) in products.livingroom\">
                                        <template v-if=\"prodtype.name == 'all products'\">

                                        </template>
                                        <template v-else>
                                            <filter-item
                                                    v-bind:key=\"prodtype.key\"
                                                    v-bind:filtername=\"prodtype.name\">
                                            </filter-item>
                                        </template>
                                    </template>

                                    <!--
                                        list all kitchen product types
                                    -->
                                    <template v-for=\"(prodtype, index) in products.kitchen\">
                                        <template v-if=\"prodtype.name == 'all products'\">

                                        </template>
                                        <template v-else>
                                            <filter-item
                                                    v-bind:key=\"prodtype.key\"
                                                    v-bind:filtername=\"prodtype.name\">
                                            </filter-item>
                                        </template>
                                    </template>


                                    <!--
                                        list all bedroom product types
                                    -->
                                    <template v-for=\"(prodtype, index) in products.bedroom\">
                                        <template v-if=\"prodtype.name == 'all products'\">

                                        </template>
                                        <template v-else>
                                            <filter-item
                                                    v-bind:key=\"prodtype.key\"
                                                    v-bind:filtername=\"prodtype.name\">
                                            </filter-item>
                                        </template>
                                    </template>


                                    <!--
                                        list all bathroom product types
                                    -->
                                    <template v-for=\"(prodtype, index) in products.bath\">
                                        <template v-if=\"prodtype.name == 'all products'\">

                                        </template>
                                        <template v-else>
                                            <filter-item
                                                    v-bind:key=\"prodtype.key\"
                                                    v-bind:filtername=\"prodtype.name\">
                                            </filter-item>
                                        </template>
                                    </template>

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
                                      <template v-for=\"(category, index) in categories\">
                                          <filter-item
                                                  v-bind:key=\"category.key\"
                                                  v-bind:filtername=\"category.name\">
                                          </filter-item>
                                      </template>
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
                                         <div class=\"input-group mb-3 filter-input-group\">
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
                                         <div class=\"input-group mb-3 filter-input-group\">
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
            <div class=\"p-2 products-page-container\">
                <div class=\"row\">
                    <!-- NOTE: COLUMN WILL GO IN A FOR LOOP  -->
                        <!-- <div class=\"col-12\">
                            <p class=\"text-center\"><small>{{msg}}</small></p>
                            <h4 class=\"text-center\">Showing all {% if queryDetails.category is defined and queryDetails.type is defined %} {{queryDetails.category}} {{queryDetails.type}} {% elseif queryDetails.category is defined and not queryDetails.type is defined %} {{queryDetails.category}} products {% else %} Products {% endif %}</h4>
                            <br>

                        </div> -->

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
