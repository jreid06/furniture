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
            <div class=\"p-2\">
                <button class=\"btn btn-primary\" @click.prevent=\"toggleFilter\">FILTER</button>
            </div>
        </div>
        <div class=\"col-12 d-flex flex-wrap flex-row products-page-content\">
            <div class=\"p-2 filter filter-mobile closed-filter d-flex flex-wrap flex-row\">

                <div class=\"p-2\">
                    <div id=\"accordion\">

                          <div class=\"card\">
                            <div class=\"card-header\" id=\"headingOne\">
                              <h5 class=\"mb-0\">
                                <button class=\"btn btn-link\" data-toggle=\"collapse\" data-target=\"#filter1\" aria-expanded=\"true\" aria-controls=\"filter1\">
                                 Brands
                                </button>
                              </h5>
                            </div>

                            <div id=\"filter1\" class=\"collapse show\" aria-labelledby=\"headingOne\" data-parent=\"#accordion\">
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
                          <div class=\"card\">
                            <div class=\"card-header\" id=\"headingTwo\">
                              <h5 class=\"mb-0\">
                                <button class=\"btn btn-link collapsed\" data-toggle=\"collapse\" data-target=\"#filter2\" aria-expanded=\"false\" aria-controls=\"filter2\">
                                  filter-2
                                </button>
                              </h5>
                            </div>
                            <div id=\"filter2\" class=\"collapse\" aria-labelledby=\"headingTwo\" data-parent=\"#accordion\">
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
                          <div class=\"card\">
                            <div class=\"card-header\" id=\"headingThree\">
                              <h5 class=\"mb-0\">
                                <button class=\"btn btn-link collapsed\" data-toggle=\"collapse\" data-target=\"#filter3\" aria-expanded=\"false\" aria-controls=\"filter3\">
                                  filter-3
                                </button>
                              </h5>
                           </div>
                           <div id=\"filter3\" class=\"collapse\" aria-labelledby=\"headingThree\" data-parent=\"#accordion\">
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
                         <div class=\"card\">
                           <div class=\"card-header\" id=\"headingThree\">
                             <h5 class=\"mb-0\">
                               <button class=\"btn btn-link collapsed\" data-toggle=\"collapse\" data-target=\"#filter4\" aria-expanded=\"false\" aria-controls=\"filter4\">
                                 filter-4
                               </button>
                             </h5>
                          </div>
                          <div id=\"filter4\" class=\"collapse\" aria-labelledby=\"headingThree\" data-parent=\"#accordion\">
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
                        <div class=\"card\">
                          <div class=\"card-header\" id=\"headingThree\">
                            <h5 class=\"mb-0\">
                              <button class=\"btn btn-link collapsed\" data-toggle=\"collapse\" data-target=\"#filter5\" aria-expanded=\"false\" aria-controls=\"filter5\">
                                filter-5
                              </button>
                            </h5>
                         </div>
                         <div id=\"filter5\" class=\"collapse\" aria-labelledby=\"headingThree\" data-parent=\"#accordion\">
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
                    </div>
                    <!-- end of accordion-->
                </div>

                <div class=\"p-2\">
                    <div class=\"filter-close\">
                        <span class=\"fa fa-close\"></span>
                    </div>
                </div>

            </div>
            <div class=\"p-2 products-page-container\">
                <div class=\"row\">
                    <!-- NOTE: COLUMN WILL GO IN A FOR LOOP  -->
                        <div class=\"col-12\">
                            <p class=\"text-center\"><small>";
        // line 203
        echo twig_escape_filter($this->env, ($context["msg"] ?? null), "html", null, true);
        echo "</small></p>
                            <h4 class=\"text-center\">Showing all ";
        // line 204
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

                        ";
        // line 209
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "all")) {
            // line 210
            echo "
                            ";
            // line 211
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 212
                echo "
                                ";
                // line 213
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 214
                    echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                    // line 217
                    echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                    echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h5 class=\"card-title\">
                                                    <a href=\"/product/";
                    // line 221
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
                    echo "</a>
                                                </h5>
                                                <h6 class=\"card-subtitle mb-2 text-muted\">";
                    // line 223
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "color", array())), "html", null, true);
                    echo " - ";
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array())), "html", null, true);
                    echo "</h6>
                                                <h6 class=\"\">";
                    // line 224
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()))), "html", null, true);
                    echo "</h6>
                                                <hr>
                                                <p><strong>£ ";
                    // line 226
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
                // line 231
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 233
            echo "
                        ";
        }
        // line 235
        echo "
                        ";
        // line 236
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "all-cat")) {
            // line 237
            echo "
                            ";
            // line 238
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 239
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 240
                    echo "                                    ";
                    if (($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "category", array()))) {
                        // line 241
                        echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <!-- <p>";
                        // line 242
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                        echo "</p> -->
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                        // line 245
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                        echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h5 class=\"card-title\">
                                                    <a href=\"/product/";
                        // line 249
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
                        echo "</a>
                                                </h5>
                                                <h6 class=\"card-subtitle mb-2 text-muted\">";
                        // line 251
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "color", array())), "html", null, true);
                        echo " - ";
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array())), "html", null, true);
                        echo "</h6>
                                                <hr>
                                                <p><strong>£ ";
                        // line 253
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                        echo "</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                    }
                    // line 258
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 259
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 260
            echo "
                        ";
        }
        // line 262
        echo "
                        ";
        // line 263
        if (($this->getAttribute(($context["queryDetails"] ?? null), "num_of_products", array()) == "specific")) {
            // line 264
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 265
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["product"], "skus", array()), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sku"]) {
                    // line 266
                    echo "                                    ";
                    if ((($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "category", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "category", array())) && ($this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "type", array()) == $this->getAttribute(($context["queryDetails"] ?? null), "type", array())))) {
                        // line 267
                        echo "                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <!-- <p>";
                        // line 268
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "id", array()), "html", null, true);
                        echo "</p> -->
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"";
                        // line 271
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sku"], "image", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "caption", array()), "html", null, true);
                        echo "\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h5 class=\"card-title\">
                                                    <a href=\"/product/";
                        // line 275
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
                        echo "</a>
                                                </h5>
                                                <h6 class=\"card-subtitle mb-2 text-muted\">";
                        // line 277
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "color", array())), "html", null, true);
                        echo " - ";
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["sku"], "attributes", array()), "size", array())), "html", null, true);
                        echo "</h6>
                                                <hr>
                                                <p><strong>£ ";
                        // line 279
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["sku"], "price", array()) / 100), 2), "html", null, true);
                        echo "</strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                    }
                    // line 284
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sku'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 285
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 286
            echo "

                        ";
        }
        // line 289
        echo "
                        <!-- <product-card></product-card> -->

                </div>

                ";
        // line 294
        if ($this->getAttribute($this->getAttribute(($context["queryDetails"] ?? null), "products", array()), "has_more", array())) {
            // line 295
            echo "                    <div class=\"row\">
                        <div class=\"col-12 text-center\">
                            <br>
                            <button class=\"btn btn-primary\">Show more</button>
                        </div>
                    </div>
                ";
        }
        // line 302
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
        return array (  560 => 302,  551 => 295,  549 => 294,  542 => 289,  537 => 286,  531 => 285,  525 => 284,  517 => 279,  510 => 277,  491 => 275,  482 => 271,  476 => 268,  473 => 267,  470 => 266,  465 => 265,  460 => 264,  458 => 263,  455 => 262,  451 => 260,  445 => 259,  439 => 258,  431 => 253,  424 => 251,  405 => 249,  396 => 245,  390 => 242,  387 => 241,  384 => 240,  379 => 239,  375 => 238,  372 => 237,  370 => 236,  367 => 235,  363 => 233,  356 => 231,  345 => 226,  340 => 224,  334 => 223,  315 => 221,  306 => 217,  301 => 214,  297 => 213,  294 => 212,  290 => 211,  287 => 210,  285 => 209,  265 => 204,  261 => 203,  97 => 41,  91 => 39,  89 => 38,  79 => 30,  73 => 28,  71 => 27,  68 => 26,  60 => 23,  57 => 22,  55 => 21,  52 => 20,  46 => 18,  44 => 17,  41 => 16,  37 => 14,  33 => 12,  31 => 11,  19 => 1,);
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
            <div class=\"p-2\">
                <button class=\"btn btn-primary\" @click.prevent=\"toggleFilter\">FILTER</button>
            </div>
        </div>
        <div class=\"col-12 d-flex flex-wrap flex-row products-page-content\">
            <div class=\"p-2 filter filter-mobile closed-filter d-flex flex-wrap flex-row\">

                <div class=\"p-2\">
                    <div id=\"accordion\">

                          <div class=\"card\">
                            <div class=\"card-header\" id=\"headingOne\">
                              <h5 class=\"mb-0\">
                                <button class=\"btn btn-link\" data-toggle=\"collapse\" data-target=\"#filter1\" aria-expanded=\"true\" aria-controls=\"filter1\">
                                 Brands
                                </button>
                              </h5>
                            </div>

                            <div id=\"filter1\" class=\"collapse show\" aria-labelledby=\"headingOne\" data-parent=\"#accordion\">
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
                          <div class=\"card\">
                            <div class=\"card-header\" id=\"headingTwo\">
                              <h5 class=\"mb-0\">
                                <button class=\"btn btn-link collapsed\" data-toggle=\"collapse\" data-target=\"#filter2\" aria-expanded=\"false\" aria-controls=\"filter2\">
                                  filter-2
                                </button>
                              </h5>
                            </div>
                            <div id=\"filter2\" class=\"collapse\" aria-labelledby=\"headingTwo\" data-parent=\"#accordion\">
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
                          <div class=\"card\">
                            <div class=\"card-header\" id=\"headingThree\">
                              <h5 class=\"mb-0\">
                                <button class=\"btn btn-link collapsed\" data-toggle=\"collapse\" data-target=\"#filter3\" aria-expanded=\"false\" aria-controls=\"filter3\">
                                  filter-3
                                </button>
                              </h5>
                           </div>
                           <div id=\"filter3\" class=\"collapse\" aria-labelledby=\"headingThree\" data-parent=\"#accordion\">
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
                         <div class=\"card\">
                           <div class=\"card-header\" id=\"headingThree\">
                             <h5 class=\"mb-0\">
                               <button class=\"btn btn-link collapsed\" data-toggle=\"collapse\" data-target=\"#filter4\" aria-expanded=\"false\" aria-controls=\"filter4\">
                                 filter-4
                               </button>
                             </h5>
                          </div>
                          <div id=\"filter4\" class=\"collapse\" aria-labelledby=\"headingThree\" data-parent=\"#accordion\">
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
                        <div class=\"card\">
                          <div class=\"card-header\" id=\"headingThree\">
                            <h5 class=\"mb-0\">
                              <button class=\"btn btn-link collapsed\" data-toggle=\"collapse\" data-target=\"#filter5\" aria-expanded=\"false\" aria-controls=\"filter5\">
                                filter-5
                              </button>
                            </h5>
                         </div>
                         <div id=\"filter5\" class=\"collapse\" aria-labelledby=\"headingThree\" data-parent=\"#accordion\">
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
                    </div>
                    <!-- end of accordion-->
                </div>

                <div class=\"p-2\">
                    <div class=\"filter-close\">
                        <span class=\"fa fa-close\"></span>
                    </div>
                </div>

            </div>
            <div class=\"p-2 products-page-container\">
                <div class=\"row\">
                    <!-- NOTE: COLUMN WILL GO IN A FOR LOOP  -->
                        <div class=\"col-12\">
                            <p class=\"text-center\"><small>{{msg}}</small></p>
                            <h4 class=\"text-center\">Showing all {% if queryDetails.category is defined and queryDetails.type is defined %} {{queryDetails.category}} {{queryDetails.type}} {% elseif queryDetails.category is defined and not queryDetails.type is defined %} {{queryDetails.category}} products {% else %} Products {% endif %}</h4>
                            <br>

                        </div>

                        {% if queryDetails.num_of_products == 'all' %}

                            {% for product in queryDetails.products.data %}

                                {% for sku in product.skus.data %}
                                    <div class=\"col-6 col-md-4 col-lg-3 product-card-col\">
                                        <div class=\"card product-card\" style=\"\">
                                            <div class=\"product-image\">
                                                <img class=\"card-img-top\" src=\"{{sku.image}}\" alt=\"{{product.caption}}\">
                                            </div>
                                            <div class=\"card-body\">
                                                <h5 class=\"card-title\">
                                                    <a href=\"/product/{{sku.attributes.category}}/{{sku.attributes.type}}/{{product.metadata.slug}}-{{sku.attributes.color}}-{{sku.attributes.size}}/{{product.id}}/{{sku.id}}\">{{product.name}}</a>
                                                </h5>
                                                <h6 class=\"card-subtitle mb-2 text-muted\">{{sku.attributes.color | capitalize}} - {{sku.attributes.size | capitalize}}</h6>
                                                <h6 class=\"\">{{sku.attributes.category | camel_case()}}</h6>
                                                <hr>
                                                <p><strong>£ {{(sku.price / 100) | number_format(2)}}</strong> </p>
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
                                                <h5 class=\"card-title\">
                                                    <a href=\"/product/{{sku.attributes.category}}/{{sku.attributes.type}}/{{product.metadata.slug}}-{{sku.attributes.color}}-{{sku.attributes.size}}/{{product.id}}/{{sku.id}}\">{{product.name}}</a>
                                                </h5>
                                                <h6 class=\"card-subtitle mb-2 text-muted\">{{sku.attributes.color | capitalize}} - {{sku.attributes.size | capitalize}}</h6>
                                                <hr>
                                                <p><strong>£ {{(sku.price / 100) | number_format(2)}}</strong> </p>
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
                                                <h5 class=\"card-title\">
                                                    <a href=\"/product/{{sku.attributes.category}}/{{sku.attributes.type}}/{{product.metadata.slug}}-{{sku.attributes.color}}-{{sku.attributes.size}}/{{product.id}}/{{sku.id}}\">{{product.name}}</a>
                                                </h5>
                                                <h6 class=\"card-subtitle mb-2 text-muted\">{{sku.attributes.color | capitalize}} - {{sku.attributes.size | capitalize}}</h6>
                                                <hr>
                                                <p><strong>£ {{(sku.price / 100) | number_format(2)}}</strong> </p>
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
