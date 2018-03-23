<?php

/* navigation_list.html.twig */
class __TwigTemplate_85c5fdb3d7ffe1a98613f635f8a904af9540284fb322b2b752e988dd09993e28 extends Twig_Template
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
        if ( !($context["error"] ?? null)) {
            // line 2
            echo "
    ";
            // line 3
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["navdata"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                // line 4
                echo "        <div class=\"col-xs-6 col-md-4 nav-card-col\">
            <div class=\"card nav-card\" id=\"";
                // line 5
                echo twig_escape_filter($this->env, $this->getAttribute($context["link"], "nav_custom_id", array()), "html", null, true);
                echo "\">
                <div class=\"row\">
                    <div class=\"col col-xs-8\">
                        <h3><strong class=\"text-muted\">TITLE: </strong> ";
                // line 8
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["link"], "nav_title", array())), "html", null, true);
                echo "</h3>
                        <h5><strong class=\"text-muted\">LINK: </strong> ";
                // line 9
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["link"], "nav_json_data", array()), "address", array()), "html", null, true);
                echo "</h5>

                        <h6><strong class=\"text-muted\">SUBLINKS: </strong>";
                // line 11
                if ( !$this->getAttribute($this->getAttribute($context["link"], "nav_json_data", array()), "submenu", array())) {
                    echo "<span class=\"text-danger\">FALSE</span> ";
                } else {
                    // line 12
                    echo "                            <span class=\"text-success\">TRUE</span> ";
                }
                echo "</h6>

                        <h6><strong class=\"text-muted\">STATUS: </strong>";
                // line 14
                if (($this->getAttribute($context["link"], "nav_status", array()) == "false")) {
                    echo "<span class=\"text-danger\">Not Active
                        </span> ";
                } else {
                    // line 16
                    echo "                            <span class=\"text-success\">Active</span> ";
                }
                echo "</h6>
                    </div>

                    <div class=\"col col-xs-4 edit-link\">
                        <h2 data-link-json=\"";
                // line 20
                echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($context["link"], "nav_json_data", array())), "html", null, true);
                echo "\"><span class=\"fa fa-edit\" data-link-json=\"";
                echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($context["link"], "nav_json_data", array())), "html", null, true);
                echo "\" data-link-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["link"], "nav_custom_id", array()), "html", null, true);
                echo "\" @click=\"editNavlink\"></span></h2>
                        <br>
                        <h2><span class=\"fa fa-trash-o\"></span></h2>
                    </div>
                </div>
            </div>
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "
    <div class=\"modal fade bs-example-modal-lg edit-nav-modal\" id=\"nav-modal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"editNavModal\">
      <div class=\"modal-dialog modal-lg\" role=\"document\" style=\"width: 70%\">
        <div class=\"modal-content\">
          <div class=\"row\">

              <div class=\"col-xs-12\">
                 <h3> Edit Navigation Link </h3>
                 <hr>
              </div>

              <div class=\"col-xs-12\">
                  <div class=\"row\">
                      <div class=\"col-xs-8\">
                          <div class=\"input-group\">
                              <span class=\"input-group-addon\" id=\"update-link-title\">Link title</span>
                              <input type=\"text\" class=\"form-control link-title-update\" placeholder=\"Link title\" aria-describedby=\"update-link-title\">
                          </div>

                          <hr>

                          <p class=\"text-muted\"></p>
                          <div class=\"input-group\">
                             <div class=\"input-group-btn\">
                               <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Sub menu&nbsp;<span class=\"caret\"></span></button>
                               <ul class=\"dropdown-menu\">
                                 <li><a href=\"#\" @click.prevent=\"toggleSubmenu\" data-val=\"true\">True</a></li>
                                 <li><a href=\"#\" @click.prevent=\"toggleSubmenu\" data-val=\"false\">False</a></li>
                               </ul>
                             </div><!-- /btn-group -->
                             <input type=\"text\" class=\"form-control modal-submenu-select\" aria-label=\"...\" value=\"\" disabled>
                         </div><!-- /input-group -->

                         <hr>
                      </div>

                      <div class=\"col-xs-4\">
                          <div class=\"list-group lg-save\">
                              <template v-if=\"navigation.edit.showlink\">
                                  <div class=\"list-group-item active-published\">
                                          <strong>STATUS:&nbsp;&nbsp;&nbsp;</strong><span class=\"link-status-live\"></span>
                                  </div>
                              </template>
                              <template v-else>
                                  <div class=\"list-group-item active-draft\">
                                          <strong>STATUS:&nbsp;&nbsp;&nbsp;</strong><span class=\"link-status-offline\"></span>
                                  </div>
                              </template>

                              <div class=\"list-group-item text-center\">
                                  <button type=\"button\" class=\"btn btn-default save-offline\" @click=\"savelinkdata\" data-action=\"save-offline\">Save changes</button>
                              </div>
                              <div class=\"list-group-item text-center\">
                                  <button type=\"button\" class=\"btn btn-default\" @click=\"savelinkdata\" data-action=\"save-live\">Save & Activate Link</button>
                              </div>
                              <div class=\"list-group-item text-center\" style=\"background-color: #222;\">
                                  <button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Close & Dont save</button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <template v-if=\"navigation.edit.sublinks\">
                      <div class=\"row\">



                        <div class=\"col-xs-12\">
                            <!-- Nav tabs -->
                            <ul class=\"nav nav-tabs\" role=\"tablist\">
                                <li role=\"presentation\" class=\"active\"><a href=\"#sub-cat-links-tab\" aria-controls=\"home\" role=\"tab\" data-toggle=\"tab\">Navigation Sub-category Links</a></li>
                                <li role=\"presentation\"><a href=\"#cta-boxes-tab\" aria-controls=\"profile\" role=\"tab\" data-toggle=\"tab\">Call to Action Menu Boxes</a></li>

                            </ul>
                            <!-- Tab panes -->
                            <div class=\"tab-content\">
                                <div role=\"tabpanel\" class=\"tab-pane fade in active\" id=\"sub-cat-links-tab\">
                                    <div class=\"row\">
                                        <div class=\"col-xs-12\">
                                                <br>
                                               <div class=\"input-group\">
                                                   <input type=\"text\" class=\"form-control subcat-inp\" placeholder=\"Add sub category title\">
                                                   <span class=\"input-group-btn\">
                                                        <button class=\"btn btn-primary\" type=\"button\" @click=\"addSubcats\">Add <span class=\"fa fa-plus\"></span> </button>
                                                   </span>
                                               </div><!-- /input-group -->
                                               <br>
                                               <!-- error message for empty field -->
                                               <div class=\"alert alert-danger alert-dismissible alert-subcat-add-error\" style=\"display: none;\"role=\"alert\">
                                                 <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                                 <strong></strong> <span id=\"alert-subcat-error-msg\"></span>

                                               </div>

                                               <!-- error save warning -->
                                               <div class=\"alert alert-warning alert-dismissible alert-subcat-save-warn\" style=\"display: none;\" role=\"alert\">
                                                 <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                                 <strong></strong> <span id=\"alert-subcat-save-warnmsg\"></span>

                                               </div>

                                               <div class=\"alert alert-success alert-dismissible alert-subcat-add-success\" style=\"display: none;\" role=\"alert\">
                                                 <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                                 <strong></strong> <span id=\"alert-subcat-add-success-msg\"></span>

                                               </div>
                                               <hr>

                                        </div>

                                        <div class=\"col-xs-12 subcat-column\">
                                            <subcat-box v-for=\"(subcat, index) in navigation.edit.subcategories\"
                                                v-bind:key=\"index\"
                                                v-bind:indexcount=\"index+1\"
                                                v-bind:subcattitle=\"subcat.title\"
                                                v-bind:subcatslug=\"subcat.slug\"
                                                v-bind:subcatcat=\"subcat.cat\">

                                            </subcat-box>
                                        </div>
                                    </div>
                                </div>



                                <div role=\"tabpanel\" class=\"tab-pane fade\" id=\"cta-boxes-tab\">
                                    <br>
                                    <cta-box v-for=\"(cta, index) in navigation.edit.instance.cta_boxes\"
                                            v-bind:key=\"cta.id\"
                                            v-bind:ctaimage=\"cta.image\"
                                            v-bind:ctatitle=\"cta.title\"
                                            v-bind:ctamessage=\"cta.message\"
                                            v-bind:ctalink=\"cta.link\"
                                            v-bind:loopcount=\"index+1\">
                                    </cta-box>
                                </div>
                            </div>
                        </div>

                      </div>


                  </template>
              </div>
          </div>
          <!-- <div class=\"row\">
              <div class=\"col-xs-12\">
                  <br>
                  <div class=\"modal-footer\">
                      <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                      <button type=\"button\" class=\"btn btn-primary\">Save changes</button>
                 </div>
              </div>
          </div> -->
        </div>

      </div>
    </div>

";
        } else {
            // line 187
            echo "
    <!-- error message for empty field -->
    <div class=\"alert alert-danger alert-dismissible alert-navdata-error\" style=\"\"role=\"alert\">
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
      <strong></strong> <span id=\"alert-navdata-error\">Error showing nav data. Refresh page</span>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "navigation_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  248 => 187,  87 => 28,  69 => 20,  61 => 16,  56 => 14,  50 => 12,  46 => 11,  41 => 9,  37 => 8,  31 => 5,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if not error %}

    {% for link in navdata %}
        <div class=\"col-xs-6 col-md-4 nav-card-col\">
            <div class=\"card nav-card\" id=\"{{link.nav_custom_id}}\">
                <div class=\"row\">
                    <div class=\"col col-xs-8\">
                        <h3><strong class=\"text-muted\">TITLE: </strong> {{link.nav_title | capitalize }}</h3>
                        <h5><strong class=\"text-muted\">LINK: </strong> {{link.nav_json_data.address}}</h5>

                        <h6><strong class=\"text-muted\">SUBLINKS: </strong>{% if not link.nav_json_data.submenu %}<span class=\"text-danger\">FALSE</span> {% else %}
                            <span class=\"text-success\">TRUE</span> {% endif %}</h6>

                        <h6><strong class=\"text-muted\">STATUS: </strong>{% if link.nav_status == 'false' %}<span class=\"text-danger\">Not Active
                        </span> {% else %}
                            <span class=\"text-success\">Active</span> {% endif %}</h6>
                    </div>

                    <div class=\"col col-xs-4 edit-link\">
                        <h2 data-link-json=\"{{link.nav_json_data | json_encode() }}\"><span class=\"fa fa-edit\" data-link-json=\"{{link.nav_json_data | json_encode() }}\" data-link-id=\"{{link.nav_custom_id}}\" @click=\"editNavlink\"></span></h2>
                        <br>
                        <h2><span class=\"fa fa-trash-o\"></span></h2>
                    </div>
                </div>
            </div>
        </div>
    {% endfor %}

    <div class=\"modal fade bs-example-modal-lg edit-nav-modal\" id=\"nav-modal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"editNavModal\">
      <div class=\"modal-dialog modal-lg\" role=\"document\" style=\"width: 70%\">
        <div class=\"modal-content\">
          <div class=\"row\">

              <div class=\"col-xs-12\">
                 <h3> Edit Navigation Link </h3>
                 <hr>
              </div>

              <div class=\"col-xs-12\">
                  <div class=\"row\">
                      <div class=\"col-xs-8\">
                          <div class=\"input-group\">
                              <span class=\"input-group-addon\" id=\"update-link-title\">Link title</span>
                              <input type=\"text\" class=\"form-control link-title-update\" placeholder=\"Link title\" aria-describedby=\"update-link-title\">
                          </div>

                          <hr>

                          <p class=\"text-muted\"></p>
                          <div class=\"input-group\">
                             <div class=\"input-group-btn\">
                               <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Sub menu&nbsp;<span class=\"caret\"></span></button>
                               <ul class=\"dropdown-menu\">
                                 <li><a href=\"#\" @click.prevent=\"toggleSubmenu\" data-val=\"true\">True</a></li>
                                 <li><a href=\"#\" @click.prevent=\"toggleSubmenu\" data-val=\"false\">False</a></li>
                               </ul>
                             </div><!-- /btn-group -->
                             <input type=\"text\" class=\"form-control modal-submenu-select\" aria-label=\"...\" value=\"\" disabled>
                         </div><!-- /input-group -->

                         <hr>
                      </div>

                      <div class=\"col-xs-4\">
                          <div class=\"list-group lg-save\">
                              <template v-if=\"navigation.edit.showlink\">
                                  <div class=\"list-group-item active-published\">
                                          <strong>STATUS:&nbsp;&nbsp;&nbsp;</strong><span class=\"link-status-live\"></span>
                                  </div>
                              </template>
                              <template v-else>
                                  <div class=\"list-group-item active-draft\">
                                          <strong>STATUS:&nbsp;&nbsp;&nbsp;</strong><span class=\"link-status-offline\"></span>
                                  </div>
                              </template>

                              <div class=\"list-group-item text-center\">
                                  <button type=\"button\" class=\"btn btn-default save-offline\" @click=\"savelinkdata\" data-action=\"save-offline\">Save changes</button>
                              </div>
                              <div class=\"list-group-item text-center\">
                                  <button type=\"button\" class=\"btn btn-default\" @click=\"savelinkdata\" data-action=\"save-live\">Save & Activate Link</button>
                              </div>
                              <div class=\"list-group-item text-center\" style=\"background-color: #222;\">
                                  <button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Close & Dont save</button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <template v-if=\"navigation.edit.sublinks\">
                      <div class=\"row\">



                        <div class=\"col-xs-12\">
                            <!-- Nav tabs -->
                            <ul class=\"nav nav-tabs\" role=\"tablist\">
                                <li role=\"presentation\" class=\"active\"><a href=\"#sub-cat-links-tab\" aria-controls=\"home\" role=\"tab\" data-toggle=\"tab\">Navigation Sub-category Links</a></li>
                                <li role=\"presentation\"><a href=\"#cta-boxes-tab\" aria-controls=\"profile\" role=\"tab\" data-toggle=\"tab\">Call to Action Menu Boxes</a></li>

                            </ul>
                            <!-- Tab panes -->
                            <div class=\"tab-content\">
                                <div role=\"tabpanel\" class=\"tab-pane fade in active\" id=\"sub-cat-links-tab\">
                                    <div class=\"row\">
                                        <div class=\"col-xs-12\">
                                                <br>
                                               <div class=\"input-group\">
                                                   <input type=\"text\" class=\"form-control subcat-inp\" placeholder=\"Add sub category title\">
                                                   <span class=\"input-group-btn\">
                                                        <button class=\"btn btn-primary\" type=\"button\" @click=\"addSubcats\">Add <span class=\"fa fa-plus\"></span> </button>
                                                   </span>
                                               </div><!-- /input-group -->
                                               <br>
                                               <!-- error message for empty field -->
                                               <div class=\"alert alert-danger alert-dismissible alert-subcat-add-error\" style=\"display: none;\"role=\"alert\">
                                                 <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                                 <strong></strong> <span id=\"alert-subcat-error-msg\"></span>

                                               </div>

                                               <!-- error save warning -->
                                               <div class=\"alert alert-warning alert-dismissible alert-subcat-save-warn\" style=\"display: none;\" role=\"alert\">
                                                 <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                                 <strong></strong> <span id=\"alert-subcat-save-warnmsg\"></span>

                                               </div>

                                               <div class=\"alert alert-success alert-dismissible alert-subcat-add-success\" style=\"display: none;\" role=\"alert\">
                                                 <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                                 <strong></strong> <span id=\"alert-subcat-add-success-msg\"></span>

                                               </div>
                                               <hr>

                                        </div>

                                        <div class=\"col-xs-12 subcat-column\">
                                            <subcat-box v-for=\"(subcat, index) in navigation.edit.subcategories\"
                                                v-bind:key=\"index\"
                                                v-bind:indexcount=\"index+1\"
                                                v-bind:subcattitle=\"subcat.title\"
                                                v-bind:subcatslug=\"subcat.slug\"
                                                v-bind:subcatcat=\"subcat.cat\">

                                            </subcat-box>
                                        </div>
                                    </div>
                                </div>



                                <div role=\"tabpanel\" class=\"tab-pane fade\" id=\"cta-boxes-tab\">
                                    <br>
                                    <cta-box v-for=\"(cta, index) in navigation.edit.instance.cta_boxes\"
                                            v-bind:key=\"cta.id\"
                                            v-bind:ctaimage=\"cta.image\"
                                            v-bind:ctatitle=\"cta.title\"
                                            v-bind:ctamessage=\"cta.message\"
                                            v-bind:ctalink=\"cta.link\"
                                            v-bind:loopcount=\"index+1\">
                                    </cta-box>
                                </div>
                            </div>
                        </div>

                      </div>


                  </template>
              </div>
          </div>
          <!-- <div class=\"row\">
              <div class=\"col-xs-12\">
                  <br>
                  <div class=\"modal-footer\">
                      <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                      <button type=\"button\" class=\"btn btn-primary\">Save changes</button>
                 </div>
              </div>
          </div> -->
        </div>

      </div>
    </div>

{% else %}

    <!-- error message for empty field -->
    <div class=\"alert alert-danger alert-dismissible alert-navdata-error\" style=\"\"role=\"alert\">
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
      <strong></strong> <span id=\"alert-navdata-error\">Error showing nav data. Refresh page</span>
    </div>
{% endif %}
", "navigation_list.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/navigation_list.html.twig");
    }
}
