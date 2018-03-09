<?php

/* slidesedit.html.twig */
class __TwigTemplate_9c04d7eebc6f8255566f01b97e71d07a3804fd98dc3162c73547aa8a004670b7 extends Twig_Template
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
        echo "<div class=\"row\" id=\"twig\">
    <br>
    <br>
    ";
        // line 4
        if ( !($context["error"] ?? null)) {
            // line 5
            echo "
        ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["slides"] ?? null), "slides_json", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["slide"]) {
                // line 7
                echo "            <div class=\"col-xs-12 col-md-4\">
                <div class=\"panel panel-default panel-products\">
                    <div class=\"panel-heading panel-image slide-panel-img\" style=\"background: url(";
                // line 9
                echo twig_escape_filter($this->env, $this->getAttribute($context["slide"], "image", array()), "html", null, true);
                echo "); background-size: cover !important; background-position: center !important\" id=\"image-slide-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\">

                    </div>
                    <div class=\"panel-body text-center\">
                        <h3>SLIDE ";
                // line 13
                echo twig_escape_filter($this->env, $this->getAttribute($context["slide"], "id", array()), "html", null, true);
                echo "</h3>
                        <hr>
                        <h4><span class=\"\">Title: </span><span id=\"title-slide-";
                // line 15
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["slide"], "title", array()), "html", null, true);
                echo " </span></h4>
                        <h5><span class=\"\">Content: </span><span id=\"content-slide-";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["slide"], "content", array()), "html", null, true);
                echo "</span></h5>
                        <h5><span class=\"\">Button Text: </span><span id=\"btntxt-slide-";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["slide"], "cta", array()), "text", array()), "html", null, true);
                echo "</span></h5>
                        <h5><span class=\"\">Button Link: </span><span id=\"btnlink-slide-";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["slide"], "cta", array()), "link", array()), "html", null, true);
                echo "</span></h5>

                        <button type=\"button\" class=\"btn btn-primary slide-modal-trigger\" id=\"button-";
                // line 20
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\" data-index=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\" name=\"button\" data-slide-data=\"";
                echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute(($context["slides"] ?? null), "slides_json", array())), "html", null, true);
                echo "\" data-current-image=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["slide"], "image", array()), "html", null, true);
                echo "\" data-title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["slide"], "title", array()), "html", null, true);
                echo "\" data-content=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["slide"], "content", array()), "html", null, true);
                echo "\" data-cta-text=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["slide"], "cta", array()), "text", array()), "html", null, true);
                echo "\" data-cta-link=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["slide"], "cta", array()), "link", array()), "html", null, true);
                echo "\">Change Slide Content</button>

                        <!-- success alert message -->

                        <div class=\"alert alert-success alert-dismissible alert-slide-update alert-slide-update-";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\" role=\"alert\" style=\"margin-top: 10px;\">
                          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                          <span id=\"alert-slide-update-msg-";
                // line 26
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slide'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "
        <!-- <br>
        <br>
        <pre>
            ";
            // line 36
            echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, ($context["slides"] ?? null)), "html", null, true);
            echo "
        </pre> -->

        <div class=\"modal fade\" id=\"slideModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
            <div class=\"modal-dialog\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                        <h4 class=\"modal-title\" id=\"myModalLabel\">Edit Slide Content</h4>
                    </div>
                    <div class=\"modal-body\">
                        <div class=\"row\">
                            <div class=\"col-xs-6\">
                                <!-- current image -->
                                <div class=\"current-img\">
                                    <img src=\"\" alt=\"\" class=\"img-responsive curr-image\">
                                </div>
                            </div>
                            <div class=\"col-xs-6\">

                                <!-- warning message -->
                                <div class=\"alert alert-warning alert-dismissible alert-single\" role=\"alert\">
                                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                  <strong>ALERT!</strong> <span id=\"alert-single-msg\"></span>
                                </div>

                                <!-- successfull image upload message -->
                                <div class=\"alert alert-success alert-dismissible alert-success-upload\" role=\"alert\">
                                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                  <strong>SUCCESS!</strong> <span id=\"alert-success-upload-msg\"></span>
                                </div>


                                <!-- wrong file type error -->
                                <div class=\"alert alert-danger alert-dismissible alert-file-error\" role=\"alert\">
                                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                  <strong>ERROR!</strong> <span id=\"alert-file-error-msg\"></span>
                                </div>

                                <!-- upload field -->
                                <input type=\"file\" id=\"slideImageUpload\" name=\"img[]\">
                                <div class=\"input-group col-xs-12\">
                                    <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-picture\"></i></span>
                                    <input type=\"text\" class=\"form-control input-lg\" placeholder=\"Upload Images\" disabled>
                                    <span class=\"input-group-btn\">
                                        <button class=\"browse2 btn btn-primary input-lg\" type=\"button\" @click=\"slideShowImageUpload\"><i class=\"glyphicon glyphicon-search\"></i> Browse</button>
                                  </span>
                                </div>

                                <!-- upload image -->
                                <div class=\"slide-preview text-center\">

                                </div>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-xs-12 edit-slide-info-col\">
                                <!-- edit text content -->
                                <hr>
                                <h4>Edit/Change Slide Content</h4>
                                <div class=\"input-group\">
                                    <span class=\"input-group-addon\" id=\"slide-title-span\">@</span>
                                    <input type=\"text\" class=\"form-control\" placeholder=\"Slide Title\" aria-describedby=\"slide-title-span\" id=\"slide-title\">
                                </div>
                                <hr>
                                <div class=\"input-group\">
                                    <span class=\"input-group-addon\" id=\"slide-content-span\">@</span>
                                    <input type=\"text\" class=\"form-control\" placeholder=\"Slide content\" aria-describedby=\"slide-content-span\" id=\"slide-content\">
                                </div>
                                <hr>
                                <div class=\"input-group\">
                                    <span class=\"input-group-addon\" id=\"slide-btn-txt-span\">@</span>
                                    <input type=\"text\" class=\"form-control\" placeholder=\"Slide Tilte\" aria-describedby=\"slide-btn-txt-span\" id=\"slide-btn-txt\">
                                </div>
                                <hr>
                                <div class=\"input-group\">
                                    <span class=\"input-group-addon\" id=\"slide-btn-link-span\">@</span>
                                    <input type=\"text\" class=\"form-control\" placeholder=\"Slide Link\" aria-describedby=\"slide-btn-link-span\" id=\"slide-btn-link\">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class=\"modal-footer\">

                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                        <button type=\"button\" class=\"btn btn-primary save-slide-changes\" @click=\"changeSlideData\">Save changes</button>

                    </div>
                </div>
            </div>
        </div>

    ";
        } else {
            // line 130
            echo "    <!-- ERROR MESSAGE -->
    <div class=\"alert alert-error alert-dismissible alert-sku\" role=\"alert\">
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
      <strong>ERROR! </strong> <span id=\"alert-sku-msg\">Error display slide data. Please refresh page or contact developer</span>
    </div>

    ";
        }
        // line 137
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "slidesedit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  247 => 137,  238 => 130,  141 => 36,  135 => 32,  115 => 26,  110 => 24,  89 => 20,  82 => 18,  76 => 17,  70 => 16,  64 => 15,  59 => 13,  50 => 9,  46 => 7,  29 => 6,  26 => 5,  24 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"row\" id=\"twig\">
    <br>
    <br>
    {% if not error %}

        {% for slide in slides.slides_json %}
            <div class=\"col-xs-12 col-md-4\">
                <div class=\"panel panel-default panel-products\">
                    <div class=\"panel-heading panel-image slide-panel-img\" style=\"background: url({{slide.image}}); background-size: cover !important; background-position: center !important\" id=\"image-slide-{{loop.index}}\">

                    </div>
                    <div class=\"panel-body text-center\">
                        <h3>SLIDE {{slide.id}}</h3>
                        <hr>
                        <h4><span class=\"\">Title: </span><span id=\"title-slide-{{loop.index}}\">{{slide.title}} </span></h4>
                        <h5><span class=\"\">Content: </span><span id=\"content-slide-{{loop.index}}\">{{slide.content}}</span></h5>
                        <h5><span class=\"\">Button Text: </span><span id=\"btntxt-slide-{{loop.index}}\">{{slide.cta.text}}</span></h5>
                        <h5><span class=\"\">Button Link: </span><span id=\"btnlink-slide-{{loop.index}}\">{{slide.cta.link}}</span></h5>

                        <button type=\"button\" class=\"btn btn-primary slide-modal-trigger\" id=\"button-{{loop.index}}\" data-index=\"{{loop.index}}\" name=\"button\" data-slide-data=\"{{slides.slides_json | json_encode()}}\" data-current-image=\"{{slide.image}}\" data-title=\"{{slide.title}}\" data-content=\"{{slide.content}}\" data-cta-text=\"{{slide.cta.text}}\" data-cta-link=\"{{slide.cta.link}}\">Change Slide Content</button>

                        <!-- success alert message -->

                        <div class=\"alert alert-success alert-dismissible alert-slide-update alert-slide-update-{{loop.index}}\" role=\"alert\" style=\"margin-top: 10px;\">
                          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                          <span id=\"alert-slide-update-msg-{{loop.index}}\"></span>
                        </div>
                    </div>
                </div>
            </div>
        {% endfor %}

        <!-- <br>
        <br>
        <pre>
            {{dump(slides)}}
        </pre> -->

        <div class=\"modal fade\" id=\"slideModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
            <div class=\"modal-dialog\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                        <h4 class=\"modal-title\" id=\"myModalLabel\">Edit Slide Content</h4>
                    </div>
                    <div class=\"modal-body\">
                        <div class=\"row\">
                            <div class=\"col-xs-6\">
                                <!-- current image -->
                                <div class=\"current-img\">
                                    <img src=\"\" alt=\"\" class=\"img-responsive curr-image\">
                                </div>
                            </div>
                            <div class=\"col-xs-6\">

                                <!-- warning message -->
                                <div class=\"alert alert-warning alert-dismissible alert-single\" role=\"alert\">
                                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                  <strong>ALERT!</strong> <span id=\"alert-single-msg\"></span>
                                </div>

                                <!-- successfull image upload message -->
                                <div class=\"alert alert-success alert-dismissible alert-success-upload\" role=\"alert\">
                                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                  <strong>SUCCESS!</strong> <span id=\"alert-success-upload-msg\"></span>
                                </div>


                                <!-- wrong file type error -->
                                <div class=\"alert alert-danger alert-dismissible alert-file-error\" role=\"alert\">
                                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                  <strong>ERROR!</strong> <span id=\"alert-file-error-msg\"></span>
                                </div>

                                <!-- upload field -->
                                <input type=\"file\" id=\"slideImageUpload\" name=\"img[]\">
                                <div class=\"input-group col-xs-12\">
                                    <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-picture\"></i></span>
                                    <input type=\"text\" class=\"form-control input-lg\" placeholder=\"Upload Images\" disabled>
                                    <span class=\"input-group-btn\">
                                        <button class=\"browse2 btn btn-primary input-lg\" type=\"button\" @click=\"slideShowImageUpload\"><i class=\"glyphicon glyphicon-search\"></i> Browse</button>
                                  </span>
                                </div>

                                <!-- upload image -->
                                <div class=\"slide-preview text-center\">

                                </div>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-xs-12 edit-slide-info-col\">
                                <!-- edit text content -->
                                <hr>
                                <h4>Edit/Change Slide Content</h4>
                                <div class=\"input-group\">
                                    <span class=\"input-group-addon\" id=\"slide-title-span\">@</span>
                                    <input type=\"text\" class=\"form-control\" placeholder=\"Slide Title\" aria-describedby=\"slide-title-span\" id=\"slide-title\">
                                </div>
                                <hr>
                                <div class=\"input-group\">
                                    <span class=\"input-group-addon\" id=\"slide-content-span\">@</span>
                                    <input type=\"text\" class=\"form-control\" placeholder=\"Slide content\" aria-describedby=\"slide-content-span\" id=\"slide-content\">
                                </div>
                                <hr>
                                <div class=\"input-group\">
                                    <span class=\"input-group-addon\" id=\"slide-btn-txt-span\">@</span>
                                    <input type=\"text\" class=\"form-control\" placeholder=\"Slide Tilte\" aria-describedby=\"slide-btn-txt-span\" id=\"slide-btn-txt\">
                                </div>
                                <hr>
                                <div class=\"input-group\">
                                    <span class=\"input-group-addon\" id=\"slide-btn-link-span\">@</span>
                                    <input type=\"text\" class=\"form-control\" placeholder=\"Slide Link\" aria-describedby=\"slide-btn-link-span\" id=\"slide-btn-link\">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class=\"modal-footer\">

                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                        <button type=\"button\" class=\"btn btn-primary save-slide-changes\" @click=\"changeSlideData\">Save changes</button>

                    </div>
                </div>
            </div>
        </div>

    {% else %}
    <!-- ERROR MESSAGE -->
    <div class=\"alert alert-error alert-dismissible alert-sku\" role=\"alert\">
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
      <strong>ERROR! </strong> <span id=\"alert-sku-msg\">Error display slide data. Please refresh page or contact developer</span>
    </div>

    {% endif %}

</div>
", "slidesedit.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/slidesedit.html.twig");
    }
}
