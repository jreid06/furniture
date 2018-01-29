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
        // line 21
        echo "
                ";
        // line 22
        if (($this->getAttribute(($context["breadcrumb"] ?? null), "one", array(), "any", true, true) && $this->getAttribute(($context["breadcrumb"] ?? null), "two", array(), "any", true, true))) {
            // line 23
            echo "                    <li class=\"breadcrumb-item \">
                        <a href=\"/products/";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "one", array()), "html", null, true);
            echo "</a>
                    </li>
                ";
        }
        // line 27
        echo "
                ";
        // line 28
        if ($this->getAttribute(($context["breadcrumb"] ?? null), "two", array(), "any", true, true)) {
            // line 29
            echo "                    <li class=\"breadcrumb-item active\" aria-current=\"page\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["breadcrumb"] ?? null), "two", array()), "html", null, true);
            echo "</li>
                ";
        }
        // line 31
        echo "

              </ol>
              <!--  -->
            </nav>
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
                            <p class=\"text-center\"><small>";
        // line 198
        echo twig_escape_filter($this->env, ($context["msg"] ?? null), "html", null, true);
        echo "</small></p>
                            <h4 class=\"text-center\">Showing all ";
        // line 199
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
                        <div class=\"col-6 col-md-4 col-lg-3\">

                            <div class=\"card product-card\" style=\"\">
                                <img class=\"card-img-top\" src=\"/assets/livingroom/cushion3.jpg\" alt=\"Card image cap\">
                                <div class=\"card-body\">
                                    <h5 class=\"card-title\">Card title</h5>
                                    <h6 class=\"card-subtitle mb-2 text-muted\">Card color & size</h6>
                                    <p><strong>£ 32.00</strong> </p>

                                </div>
                            </div>

                        </div>

                        <div class=\"col-6 col-md-4 col-lg-3\">

                            <div class=\"card product-card\" style=\"\">
                                <img class=\"card-img-top\" src=\"/assets/livingroom/cushion3.jpg\" alt=\"Card image cap\">
                                <div class=\"card-body\">
                                    <h5 class=\"card-title\">Card title</h5>
                                    <h6 class=\"card-subtitle mb-2 text-muted\">Card color & size</h6>
                                    <p><strong>£ 32.00</strong> </p>

                                </div>
                            </div>

                        </div>

                </div>
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
        return array (  253 => 199,  249 => 198,  80 => 31,  74 => 29,  72 => 28,  69 => 27,  61 => 24,  58 => 23,  56 => 22,  53 => 21,  46 => 18,  44 => 17,  41 => 16,  37 => 14,  33 => 12,  31 => 11,  19 => 1,);
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
                        <div class=\"col-6 col-md-4 col-lg-3\">

                            <div class=\"card product-card\" style=\"\">
                                <img class=\"card-img-top\" src=\"/assets/livingroom/cushion3.jpg\" alt=\"Card image cap\">
                                <div class=\"card-body\">
                                    <h5 class=\"card-title\">Card title</h5>
                                    <h6 class=\"card-subtitle mb-2 text-muted\">Card color & size</h6>
                                    <p><strong>£ 32.00</strong> </p>

                                </div>
                            </div>

                        </div>

                        <div class=\"col-6 col-md-4 col-lg-3\">

                            <div class=\"card product-card\" style=\"\">
                                <img class=\"card-img-top\" src=\"/assets/livingroom/cushion3.jpg\" alt=\"Card image cap\">
                                <div class=\"card-body\">
                                    <h5 class=\"card-title\">Card title</h5>
                                    <h6 class=\"card-subtitle mb-2 text-muted\">Card color & size</h6>
                                    <p><strong>£ 32.00</strong> </p>

                                </div>
                            </div>

                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
", "products.html.twig", "/Users/jasonreid/Sites/furniture/twig_templates/products.html.twig");
    }
}
