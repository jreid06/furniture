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
                <li class=\"breadcrumb-item\"><a href=\"/products\">Products</a></li>
                <li class=\"breadcrumb-item\"><a href=\"/products\">cushions</a></li>
                <li class=\"breadcrumb-item active\" aria-current=\"page\">livingroom</li>
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
        // line 177
        echo twig_escape_filter($this->env, ($context["msg"] ?? null), "html", null, true);
        echo "</small></p>
                            <h4 class=\"text-center\">Showing all ";
        // line 178
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
                            ";
        // line 180
        if ($this->getAttribute(($context["queryDetails"] ?? null), "type", array(), "any", true, true)) {
            // line 181
            echo "                                <p>Type is: ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["queryDetails"] ?? null), "type", array()), "html", null, true);
            echo "</p>
                            ";
        }
        // line 183
        echo "
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
        return array (  226 => 183,  220 => 181,  218 => 180,  201 => 178,  197 => 177,  19 => 1,);
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
                <li class=\"breadcrumb-item\"><a href=\"/products\">Products</a></li>
                <li class=\"breadcrumb-item\"><a href=\"/products\">cushions</a></li>
                <li class=\"breadcrumb-item active\" aria-current=\"page\">livingroom</li>
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
                            {% if queryDetails.type is defined %}
                                <p>Type is: {{queryDetails.type}}</p>
                            {% endif %}

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
