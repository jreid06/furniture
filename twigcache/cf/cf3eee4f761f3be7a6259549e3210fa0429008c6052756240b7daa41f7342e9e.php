<?php

/* edit-product-images.html.twig */
class __TwigTemplate_c7b4e289884ded7f7c7c56fc49a5c9db63ef00fe0196bc10a96b42fdda9b7cb4 extends Twig_Template
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
        echo "<div id=\"page-wrapper\">
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <h1 class=\"page-header\">Edit/change Product images</h1>
        </div>
        <div class=\"col-xs-12\">
            <div class=\"panel panel-info\">
              <div class=\"panel-heading\">
                <h3 class=\"panel-title\">Info</h3>
              </div>
              <div class=\"panel-body\">
                Change a products images below
              </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    ";
        // line 19
        if ($this->getAttribute(($context["error"] ?? null), "status", array())) {
            // line 20
            echo "    <div class=\"row\">
        <div class=\"col-xs-12\">
            <div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
              <strong>ERROR: </strong> Unfortunately there was an error recieving the data. Please refresh the page or contact your Developer if the problem persists
            </div>
        </div>
    </div>
    ";
        } else {
            // line 29
            echo "    <div class=\"row\">
        <br>
        <!-- <pre>
            ";
            // line 32
            echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, $this->getAttribute(($context["page_info"] ?? null), "product_data", array())), "html", null, true);
            echo "
        </pre> -->
        ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["page_info"] ?? null), "product_data", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 35
                echo "            ";
                $context["inventory"] = call_user_func_array($this->env->getFilter('decode')->getCallable(), array($this->getAttribute($context["product"], "inventory", array()), true));
                // line 36
                echo "            <div class=\"col-xs-6 col-md-4 col-lg-3\">
                <div class=\"panel panel-default panel-products\">
                    <div class=\"panel-heading panel-image panelimage-";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\" style=\"background: url(";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "sku_main_image", array()), "html", null, true);
                echo "); background-size: cover !important; background-position: center !important\">

                    </div>
                    <div class=\"panel-body text-center\">
                        <h4>";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "sku_id", array()), "html", null, true);
                echo "</h4>
                        <h5>";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "sku_stripe_cat", array()), "html", null, true);
                echo "</h5>
                        <h5>";
                // line 44
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "sku_type", array()), "html", null, true);
                echo "</h5>
                        <p><strong>STOCK: </strong> ";
                // line 45
                echo twig_escape_filter($this->env, $this->getAttribute(($context["inventory"] ?? null), "quantity", array()), "html", null, true);
                echo "</p>
                        <button type=\"button\" class=\"btn btn-primary modal-trigger\" id=\"button-";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\" data-index=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\" name=\"button\" data-images=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "images", array()), "html", null, true);
                echo "\" data-sku=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "sku_id", array()), "html", null, true);
                echo "\" data-cat=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "sku_stripe_cat", array()), "html", null, true);
                echo "\">Update Product Images</button>
                        <br>
                        <!-- success alert message -->

                        <div class=\"alert alert-success alert-dismissible alert-sku-update alert-sku-update-";
                // line 50
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\" role=\"alert\">
                          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                          <span id=\"alert-sku-update-msg-";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\"></span>
                        </div>
                    </div>
                </div>
            </div>
        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "    </div>
    ";
        }
        // line 60
        echo "
    <!-- Modal -->
    <div class=\"modal fade\" id=\"imageEditModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                    <h4 class=\"modal-title edit-modal-title\" id=\"myModalLabel\"></h4>
                </div>
                <div class=\"modal-body\">
                    <div>
                      <!-- Nav tabs -->
                      <ul class=\"nav nav-tabs\" role=\"tablist\">
                        <li role=\"presentation\" class=\"active\"><a href=\"#currentImages\" aria-controls=\"currentImages\" role=\"tab\" data-toggle=\"tab\">CURRENT PRODUCT IMAGES</a></li>
                        <li role=\"presentation\"><a href=\"#changeImages\" aria-controls=\"changeImages\" role=\"tab\" data-toggle=\"tab\">CHANGE PRODUCT IMAGES</a></li>
                      </ul>

                      <!-- Tab panes -->
                      <div class=\"tab-content\">
                        <div role=\"tabpanel\" class=\"tab-pane fade in active\" id=\"currentImages\">
                            <div class=\"row current-images-display\">
                                <!-- rendered dynamically -->
                            </div>
                        </div>
                        <div role=\"tabpanel\" class=\"tab-pane fade\" id=\"changeImages\">
                            <div class=\"change-images-container\">
                                <div class=\"select-images\">
                                    <!-- rendered dynamically -->
                                    <select-image
                                            v-for=\"(image, index) in selectedImage.images\"
                                            v-bind:key=\"index+1\"
                                            v-bind:simage=\"image\"
                                            v-bind:sposition=\"index+1\">
                                    </select-image>
                                </div>
                                <div class=\"upload-image\">

                                    <!-- warning message -->
                                    <div class=\"alert alert-warning alert-dismissible alert-single\" role=\"alert\">
                                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                      <strong>ALERT!</strong> <span id=\"alert-single-msg\"></span>
                                    </div>

                                    <!-- successfull image upload message -->
                                    <div class=\"alert alert-success alert-dismissible alert-success-upload\" role=\"alert\">
                                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                      <strong>ALERT!</strong> <span id=\"alert-success-upload-msg\"></span>
                                    </div>

                                    <!-- wrong file type error -->
                                    <div class=\"alert alert-danger alert-dismissible alert-file-error\" role=\"alert\">
                                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                      <strong>ERROR!</strong> <span id=\"alert-file-error-msg\"></span>
                                    </div>

                                    <!-- upload field -->

                                    <input type=\"file\" id=\"singleUpload\" name=\"img[]\">
                                    <div class=\"input-group col-xs-12\">
                                        <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-picture\"></i></span>
                                        <input type=\"text\" class=\"form-control input-lg\" disabled placeholder=\"Upload Images\">
                                        <span class=\"input-group-btn\">
                                            <button class=\"browse2 btn btn-primary input-lg disabled\" type=\"button\" @click=\"singleUpload\"><i class=\"glyphicon glyphicon-search\"></i> Browse</button>
                                      </span>
                                    </div>
                                    <div class=\"single-preview text-center\">

                                    </div>
                                    <div class=\"save-changes-div text-center\">
                                        <br>
                                        <button type=\"button\" class=\"btn btn-success disabled save-image-change\" @click=\"saveImageChange\">SAVE CHANGES</button>
                                    </div>

                                    <div class=\"text-center\">
                                        <br>
                                        <!-- error alert after save has been clicked -->
                                        <div class=\"alert alert-danger alert-dismissible alert-save-error\" role=\"alert\">
                                          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                          <strong>ERROR!</strong> <span id=\"alert-save-error-msg\"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "edit-product-images.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 60,  151 => 58,  131 => 52,  126 => 50,  111 => 46,  107 => 45,  103 => 44,  99 => 43,  95 => 42,  86 => 38,  82 => 36,  79 => 35,  62 => 34,  57 => 32,  52 => 29,  41 => 20,  39 => 19,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"page-wrapper\">
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <h1 class=\"page-header\">Edit/change Product images</h1>
        </div>
        <div class=\"col-xs-12\">
            <div class=\"panel panel-info\">
              <div class=\"panel-heading\">
                <h3 class=\"panel-title\">Info</h3>
              </div>
              <div class=\"panel-body\">
                Change a products images below
              </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    {% if error.status %}
    <div class=\"row\">
        <div class=\"col-xs-12\">
            <div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
              <strong>ERROR: </strong> Unfortunately there was an error recieving the data. Please refresh the page or contact your Developer if the problem persists
            </div>
        </div>
    </div>
    {% else %}
    <div class=\"row\">
        <br>
        <!-- <pre>
            {{dump(page_info.product_data)}}
        </pre> -->
        {% for product in page_info.product_data %}
            {% set inventory = product.inventory | decode(true) %}
            <div class=\"col-xs-6 col-md-4 col-lg-3\">
                <div class=\"panel panel-default panel-products\">
                    <div class=\"panel-heading panel-image panelimage-{{loop.index}}\" style=\"background: url({{product.sku_main_image}}); background-size: cover !important; background-position: center !important\">

                    </div>
                    <div class=\"panel-body text-center\">
                        <h4>{{product.sku_id}}</h4>
                        <h5>{{product.sku_stripe_cat}}</h5>
                        <h5>{{product.sku_type}}</h5>
                        <p><strong>STOCK: </strong> {{ inventory.quantity }}</p>
                        <button type=\"button\" class=\"btn btn-primary modal-trigger\" id=\"button-{{loop.index}}\" data-index=\"{{loop.index}}\" name=\"button\" data-images=\"{{product.images}}\" data-sku=\"{{product.sku_id}}\" data-cat=\"{{product.sku_stripe_cat}}\">Update Product Images</button>
                        <br>
                        <!-- success alert message -->

                        <div class=\"alert alert-success alert-dismissible alert-sku-update alert-sku-update-{{loop.index}}\" role=\"alert\">
                          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                          <span id=\"alert-sku-update-msg-{{loop.index}}\"></span>
                        </div>
                    </div>
                </div>
            </div>
        {% endfor %}
    </div>
    {% endif %}

    <!-- Modal -->
    <div class=\"modal fade\" id=\"imageEditModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                    <h4 class=\"modal-title edit-modal-title\" id=\"myModalLabel\"></h4>
                </div>
                <div class=\"modal-body\">
                    <div>
                      <!-- Nav tabs -->
                      <ul class=\"nav nav-tabs\" role=\"tablist\">
                        <li role=\"presentation\" class=\"active\"><a href=\"#currentImages\" aria-controls=\"currentImages\" role=\"tab\" data-toggle=\"tab\">CURRENT PRODUCT IMAGES</a></li>
                        <li role=\"presentation\"><a href=\"#changeImages\" aria-controls=\"changeImages\" role=\"tab\" data-toggle=\"tab\">CHANGE PRODUCT IMAGES</a></li>
                      </ul>

                      <!-- Tab panes -->
                      <div class=\"tab-content\">
                        <div role=\"tabpanel\" class=\"tab-pane fade in active\" id=\"currentImages\">
                            <div class=\"row current-images-display\">
                                <!-- rendered dynamically -->
                            </div>
                        </div>
                        <div role=\"tabpanel\" class=\"tab-pane fade\" id=\"changeImages\">
                            <div class=\"change-images-container\">
                                <div class=\"select-images\">
                                    <!-- rendered dynamically -->
                                    <select-image
                                            v-for=\"(image, index) in selectedImage.images\"
                                            v-bind:key=\"index+1\"
                                            v-bind:simage=\"image\"
                                            v-bind:sposition=\"index+1\">
                                    </select-image>
                                </div>
                                <div class=\"upload-image\">

                                    <!-- warning message -->
                                    <div class=\"alert alert-warning alert-dismissible alert-single\" role=\"alert\">
                                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                      <strong>ALERT!</strong> <span id=\"alert-single-msg\"></span>
                                    </div>

                                    <!-- successfull image upload message -->
                                    <div class=\"alert alert-success alert-dismissible alert-success-upload\" role=\"alert\">
                                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                      <strong>ALERT!</strong> <span id=\"alert-success-upload-msg\"></span>
                                    </div>

                                    <!-- wrong file type error -->
                                    <div class=\"alert alert-danger alert-dismissible alert-file-error\" role=\"alert\">
                                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                      <strong>ERROR!</strong> <span id=\"alert-file-error-msg\"></span>
                                    </div>

                                    <!-- upload field -->

                                    <input type=\"file\" id=\"singleUpload\" name=\"img[]\">
                                    <div class=\"input-group col-xs-12\">
                                        <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-picture\"></i></span>
                                        <input type=\"text\" class=\"form-control input-lg\" disabled placeholder=\"Upload Images\">
                                        <span class=\"input-group-btn\">
                                            <button class=\"browse2 btn btn-primary input-lg disabled\" type=\"button\" @click=\"singleUpload\"><i class=\"glyphicon glyphicon-search\"></i> Browse</button>
                                      </span>
                                    </div>
                                    <div class=\"single-preview text-center\">

                                    </div>
                                    <div class=\"save-changes-div text-center\">
                                        <br>
                                        <button type=\"button\" class=\"btn btn-success disabled save-image-change\" @click=\"saveImageChange\">SAVE CHANGES</button>
                                    </div>

                                    <div class=\"text-center\">
                                        <br>
                                        <!-- error alert after save has been clicked -->
                                        <div class=\"alert alert-danger alert-dismissible alert-save-error\" role=\"alert\">
                                          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                          <strong>ERROR!</strong> <span id=\"alert-save-error-msg\"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
", "edit-product-images.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/edit-product-images.html.twig");
    }
}
