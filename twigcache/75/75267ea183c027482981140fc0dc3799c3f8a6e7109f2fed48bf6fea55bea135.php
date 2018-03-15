<?php

/* createpost.html.twig */
class __TwigTemplate_359ee1add630918fd73a621c9541433924507cc14d708fde4a966915cfe3efd5 extends Twig_Template
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
            echo "<div class=\"row blog-vue\">
    <div class=\"col-xs-12 col-md-7\">
        ";
            // line 4
            if ((($context["type"] ?? null) == "create")) {
                // line 5
                echo "
            <div class=\"input-group input-group-lg\">
                <span class=\"input-group-addon\" id=\"post-title\">Blog Title *</span>
                <input type=\"text\" class=\"form-control post-title-inp\" placeholder=\"Title ...\" aria-describedby=\"post-title\" required>
            </div>
            <hr>
            <div class=\"input-group\">
                <div class=\"input-group-btn\">
                    <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Select Category * <span class=\"caret\"></span></button>
                    <ul class=\"dropdown-menu\">
                        ";
                // line 15
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["blog_categories"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                    // line 16
                    echo "                            <li @click=\"selectCategory\"><a href=\"#\" data-cat-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], "cat_id", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], "cat_name", array()), "html", null, true);
                    echo "</a></li>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 18
                echo "                    </ul>
                </div><!-- /btn-group -->
                <input type=\"text\" class=\"form-control cat-input-box\" aria-label=\"...\" disabled value=\"\">
            </div><!-- /input-group -->
            <hr>
            <div class=\"input-group input-group\">
                <span class=\"input-group-addon\" id=\"main-post-image\">Main Image *</span>
                <input type=\"text\" class=\"form-control main-image-inp\" placeholder=\"Link to main blog image ...\" aria-describedby=\"main-post-image\" required>
            </div>
            <hr>
            <div class=\"input-group input-group\">
                <span class=\"input-group-addon\" id=\"post-brief\">Post Brief Intro *</span>
                <input type=\"text\" class=\"form-control post-brief-inp\" placeholder=\"Brief Intro ...\" aria-describedby=\"post-brief\" required>
            </div>
            <hr>
        ";
            } elseif ((            // line 33
($context["type"] ?? null) == "update")) {
                // line 34
                echo "            <div class=\"input-group input-group-lg\">
                <span class=\"input-group-addon\" id=\"post-title\">Blog Title *</span>
                <input type=\"text\" class=\"form-control post-title-inp\" placeholder=\"Title ...\" aria-describedby=\"post-title\" value=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "title", array()), "html", null, true);
                echo "\">
            </div>
            <hr>
            <div class=\"input-group\">
                <div class=\"input-group-btn\">
                    <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Select Category * <span class=\"caret\"></span></button>
                    <ul class=\"dropdown-menu\">
                        ";
                // line 43
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["blog_categories"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                    // line 44
                    echo "                            <li @click=\"selectCategory\"><a href=\"#\" data-cat-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], "cat_id", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], "cat_name", array()), "html", null, true);
                    echo "</a></li>

                            ";
                    // line 46
                    if (($this->getAttribute($context["cat"], "cat_id", array()) == $this->getAttribute(($context["post"] ?? null), "cat_id", array()))) {
                        // line 47
                        echo "                                ";
                        $context["cat_name"] = $this->getAttribute($context["cat"], "cat_name", array());
                        // line 48
                        echo "                            ";
                    }
                    // line 49
                    echo "                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 50
                echo "                    </ul>
                </div><!-- /btn-group -->

                <input type=\"text\" class=\"form-control cat-input-box\" aria-label=\"...\" disabled value=\"";
                // line 53
                echo twig_escape_filter($this->env, ($context["cat_name"] ?? null), "html", null, true);
                echo "\">
            </div><!-- /input-group -->
            <hr>
            <div class=\"input-group input-group\">
                <span class=\"input-group-addon\" id=\"main-post-image\">Main Image *</span>
                <input type=\"text\" class=\"form-control main-image-inp\" placeholder=\"Link to main blog image ...\" aria-describedby=\"main-post-image\" value=\"";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "main_img_path", array()), "html", null, true);
                echo "\">
            </div>
            <hr>
            <p style=\"width: 100%\"class=\"text-muted\">
                Maximum 200 characters long:
                <span id=\"length-count\" style=\"color: forestgreen\">";
                // line 63
                echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_split_filter($this->env, $this->getAttribute(($context["post"] ?? null), "brief_desc", array()), "")), "html", null, true);
                echo "</span>
            </p>
            <div class=\"input-group input-group\">
                <span class=\"input-group-addon\" id=\"post-brief\">Post Brief Intro *</span>
                <input type=\"text\" class=\"form-control post-brief-inp\" placeholder=\"Brief Intro ...\" aria-describedby=\"post-brief\" value=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "brief_desc", array()), "html", null, true);
                echo "\" @keyup=\"countCharacters\">
            </div>
            <hr>
        ";
            }
            // line 71
            echo "

        <h4>Blog Post Content *</h4>
        <div class=\"markdown-edit-container md-long\">

            ";
            // line 76
            if ((($context["type"] ?? null) == "create")) {
                // line 77
                echo "                <textarea name=\"name\" id=\"createPost\"></textarea>
            ";
            } else {
                // line 79
                echo "                <textarea name=\"name\" id=\"editPost\"></textarea>
            ";
            }
            // line 81
            echo "
        </div>


    </div>

    <div class=\"col-xs-12 col-md-5\">

        <div class=\"list-group lg-save\">
            <div class=\"list-group-item ";
            // line 90
            if (((($context["type"] ?? null) == "update") && ($this->getAttribute(($context["post"] ?? null), "status", array()) == "published"))) {
                echo " active-published ";
            } else {
                echo " active-draft ";
            }
            echo "\">

                ";
            // line 92
            if ((($context["type"] ?? null) == "create")) {
                // line 93
                echo "                    <strong>STATUS:&nbsp;&nbsp;&nbsp;</strong><span id=\"blog-status\">DRAFT</span>
                ";
            } else {
                // line 95
                echo "                    <strong>STATUS:&nbsp;&nbsp;&nbsp;</strong><span id=\"blog-status\">";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute(($context["post"] ?? null), "status", array())), "html", null, true);
                echo "</span>
                ";
            }
            // line 97
            echo "
            </div>
            <div class=\"list-group-item text-center\">
                <button type=\"button\" class=\"btn btn-default\" @click=\"saveDraft\" data-post-id=\"";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "post_id", array()), "html", null, true);
            echo "\">Save Draft</button>
            </div>
            <div class=\"list-group-item text-center\">
                <button type=\"button\" class=\"btn btn-default\" @click=\"savePublish\" data-post-id=\"";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "post_id", array()), "html", null, true);
            echo "\">Save & Publish</button>
            </div>
        </div>

        <br>

        <h5>All Available images are listed here. Click copy icon to use in a post</h5>
        <div class=\"list-group lg-custom\">
            ";
            // line 111
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["blog_images"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 112
                echo "                <div class=\"list-group-item text-center\"><span id=\"path-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\" class=\"path\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "path", array()), "html", null, true);
                echo "</span> &nbsp; <span class=\"fa fa-copy\" @click=\"copyPath\" data-loop-index=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\" data-image-path=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "path", array()), "html", null, true);
                echo "\" data-label-id=\".label-image-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\"></span> <span class=\"label label-success label-image-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\">copied</span></div>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 114
            echo "        </div>

        <hr>

        <div class=\"list-group lg-add-cat\">
            <h5>Add Catgegories</h5>
            <div class=\"list-group-item\">
                <div class=\"row\">
                    <div class=\"col-xs-9\">
                        <div class=\"input-group\">
                            <span class=\"input-group-addon\" id=\"sizing-addon2\">New Category</span>
                            <input type=\"text\" class=\"form-control\" placeholder=\"Add category here ...\" aria-describedby=\"sizing-addon2\">
                        </div>
                    </div>
                    <div class=\"col-xs-3 text-center\">
                        <div class=\"btn-group text-center\" role=\"group\" aria-label=\"...\">
                            <button type=\"button\" class=\"btn btn-default\"><span class=\"fa fa-plus\"></span> </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

";
        } else {
            // line 141
            echo "    <div class=\"row\">
        <div class=\"alert alert-danger alert-dismissible alert-success\" role=\"alert\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
          <strong></strong> <span id=\"alert-danger-msg\">Error retrieving data needed. refresh page or contact your developer for help</span>

        </div>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "createpost.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  292 => 141,  263 => 114,  236 => 112,  219 => 111,  208 => 103,  202 => 100,  197 => 97,  191 => 95,  187 => 93,  185 => 92,  176 => 90,  165 => 81,  161 => 79,  157 => 77,  155 => 76,  148 => 71,  141 => 67,  134 => 63,  126 => 58,  118 => 53,  113 => 50,  107 => 49,  104 => 48,  101 => 47,  99 => 46,  91 => 44,  87 => 43,  77 => 36,  73 => 34,  71 => 33,  54 => 18,  43 => 16,  39 => 15,  27 => 5,  25 => 4,  21 => 2,  19 => 1,);
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
<div class=\"row blog-vue\">
    <div class=\"col-xs-12 col-md-7\">
        {% if type == 'create' %}

            <div class=\"input-group input-group-lg\">
                <span class=\"input-group-addon\" id=\"post-title\">Blog Title *</span>
                <input type=\"text\" class=\"form-control post-title-inp\" placeholder=\"Title ...\" aria-describedby=\"post-title\" required>
            </div>
            <hr>
            <div class=\"input-group\">
                <div class=\"input-group-btn\">
                    <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Select Category * <span class=\"caret\"></span></button>
                    <ul class=\"dropdown-menu\">
                        {% for cat in blog_categories %}
                            <li @click=\"selectCategory\"><a href=\"#\" data-cat-id=\"{{cat.cat_id}}\">{{cat.cat_name}}</a></li>
                        {% endfor %}
                    </ul>
                </div><!-- /btn-group -->
                <input type=\"text\" class=\"form-control cat-input-box\" aria-label=\"...\" disabled value=\"\">
            </div><!-- /input-group -->
            <hr>
            <div class=\"input-group input-group\">
                <span class=\"input-group-addon\" id=\"main-post-image\">Main Image *</span>
                <input type=\"text\" class=\"form-control main-image-inp\" placeholder=\"Link to main blog image ...\" aria-describedby=\"main-post-image\" required>
            </div>
            <hr>
            <div class=\"input-group input-group\">
                <span class=\"input-group-addon\" id=\"post-brief\">Post Brief Intro *</span>
                <input type=\"text\" class=\"form-control post-brief-inp\" placeholder=\"Brief Intro ...\" aria-describedby=\"post-brief\" required>
            </div>
            <hr>
        {% elseif type == 'update' %}
            <div class=\"input-group input-group-lg\">
                <span class=\"input-group-addon\" id=\"post-title\">Blog Title *</span>
                <input type=\"text\" class=\"form-control post-title-inp\" placeholder=\"Title ...\" aria-describedby=\"post-title\" value=\"{{post.title}}\">
            </div>
            <hr>
            <div class=\"input-group\">
                <div class=\"input-group-btn\">
                    <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Select Category * <span class=\"caret\"></span></button>
                    <ul class=\"dropdown-menu\">
                        {% for cat in blog_categories %}
                            <li @click=\"selectCategory\"><a href=\"#\" data-cat-id=\"{{cat.cat_id}}\">{{cat.cat_name}}</a></li>

                            {% if cat.cat_id == post.cat_id %}
                                {% set cat_name = cat.cat_name %}
                            {% endif %}
                        {% endfor %}
                    </ul>
                </div><!-- /btn-group -->

                <input type=\"text\" class=\"form-control cat-input-box\" aria-label=\"...\" disabled value=\"{{cat_name}}\">
            </div><!-- /input-group -->
            <hr>
            <div class=\"input-group input-group\">
                <span class=\"input-group-addon\" id=\"main-post-image\">Main Image *</span>
                <input type=\"text\" class=\"form-control main-image-inp\" placeholder=\"Link to main blog image ...\" aria-describedby=\"main-post-image\" value=\"{{post.main_img_path}}\">
            </div>
            <hr>
            <p style=\"width: 100%\"class=\"text-muted\">
                Maximum 200 characters long:
                <span id=\"length-count\" style=\"color: forestgreen\">{{(post.brief_desc | split('') ) | length }}</span>
            </p>
            <div class=\"input-group input-group\">
                <span class=\"input-group-addon\" id=\"post-brief\">Post Brief Intro *</span>
                <input type=\"text\" class=\"form-control post-brief-inp\" placeholder=\"Brief Intro ...\" aria-describedby=\"post-brief\" value=\"{{post.brief_desc}}\" @keyup=\"countCharacters\">
            </div>
            <hr>
        {% endif %}


        <h4>Blog Post Content *</h4>
        <div class=\"markdown-edit-container md-long\">

            {% if type == 'create' %}
                <textarea name=\"name\" id=\"createPost\"></textarea>
            {% else %}
                <textarea name=\"name\" id=\"editPost\"></textarea>
            {% endif %}

        </div>


    </div>

    <div class=\"col-xs-12 col-md-5\">

        <div class=\"list-group lg-save\">
            <div class=\"list-group-item {% if type == 'update' and post.status == 'published'%} active-published {% else %} active-draft {% endif %}\">

                {% if type == 'create' %}
                    <strong>STATUS:&nbsp;&nbsp;&nbsp;</strong><span id=\"blog-status\">DRAFT</span>
                {% else %}
                    <strong>STATUS:&nbsp;&nbsp;&nbsp;</strong><span id=\"blog-status\">{{post.status | upper }}</span>
                {% endif %}

            </div>
            <div class=\"list-group-item text-center\">
                <button type=\"button\" class=\"btn btn-default\" @click=\"saveDraft\" data-post-id=\"{{post.post_id}}\">Save Draft</button>
            </div>
            <div class=\"list-group-item text-center\">
                <button type=\"button\" class=\"btn btn-default\" @click=\"savePublish\" data-post-id=\"{{post.post_id}}\">Save & Publish</button>
            </div>
        </div>

        <br>

        <h5>All Available images are listed here. Click copy icon to use in a post</h5>
        <div class=\"list-group lg-custom\">
            {% for image in blog_images %}
                <div class=\"list-group-item text-center\"><span id=\"path-{{loop.index}}\" class=\"path\">{{image.path}}</span> &nbsp; <span class=\"fa fa-copy\" @click=\"copyPath\" data-loop-index=\"{{loop.index}}\" data-image-path=\"{{image.path}}\" data-label-id=\".label-image-{{loop.index}}\"></span> <span class=\"label label-success label-image-{{loop.index}}\">copied</span></div>
            {% endfor %}
        </div>

        <hr>

        <div class=\"list-group lg-add-cat\">
            <h5>Add Catgegories</h5>
            <div class=\"list-group-item\">
                <div class=\"row\">
                    <div class=\"col-xs-9\">
                        <div class=\"input-group\">
                            <span class=\"input-group-addon\" id=\"sizing-addon2\">New Category</span>
                            <input type=\"text\" class=\"form-control\" placeholder=\"Add category here ...\" aria-describedby=\"sizing-addon2\">
                        </div>
                    </div>
                    <div class=\"col-xs-3 text-center\">
                        <div class=\"btn-group text-center\" role=\"group\" aria-label=\"...\">
                            <button type=\"button\" class=\"btn btn-default\"><span class=\"fa fa-plus\"></span> </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{% else %}
    <div class=\"row\">
        <div class=\"alert alert-danger alert-dismissible alert-success\" role=\"alert\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
          <strong></strong> <span id=\"alert-danger-msg\">Error retrieving data needed. refresh page or contact your developer for help</span>

        </div>
    </div>
{% endif %}
", "createpost.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/createpost.html.twig");
    }
}
