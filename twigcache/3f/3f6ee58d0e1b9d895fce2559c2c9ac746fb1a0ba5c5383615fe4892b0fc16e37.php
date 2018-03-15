<?php

/* showallposts.html.twig */
class __TwigTemplate_7d2ce294f7ce9b361248e00a436ec9cef89f95631bd825602aa578c2b48bf5a1 extends Twig_Template
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
            echo "    <div class=\"row\">
        <div class=\"col-xs-12\">
            <div>
                <!-- Nav tabs -->
                <ul class=\"nav nav-tabs\" role=\"tablist\">
                    <li role=\"presentation\" class=\"active\"><a href=\"#all-posts\" aria-controls=\"all-posts\" role=\"tab\" data-toggle=\"tab\">All Posts</a></li>
                    <li role=\"presentation\"><a href=\"#drafts\" aria-controls=\"drafts\" role=\"tab\" data-toggle=\"tab\">Drafts</a></li>
                    <li role=\"presentation\"><a href=\"#published\" aria-controls=\"published\" role=\"tab\" data-toggle=\"tab\">Published</a></li>
                </ul>

                <!-- Tab panes -->
                <div class=\"tab-content\">
                    <div role=\"tabpanel\" class=\"tab-pane fade in active\" id=\"all-posts\">
                        <br>
                        <div class=\"table-responsive\">
                          <table class=\"table table-striped table-hover\">
                              <thead>
                                  <td>Post ID</td>
                                  <td>Title</td>
                                  <td>Created</td>
                                  <td>Modified</td>
                                  <td>Published</td>
                                  <td><span></span> </td>
                              </thead>

                              ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["blogposts"] ?? null), "all", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 28
                echo "                                  <tr>
                                      <td>";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "post_id", array()), "html", null, true);
                echo "</td>
                                      <td>";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "title", array()), "html", null, true);
                echo "</td>
                                      <td>";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "date_created", array()), "html", null, true);
                echo "</td>
                                      <td>";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "date_modified", array()), "html", null, true);
                echo "</td>
                                      <td>";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "date_published", array()), "html", null, true);
                echo "</td>
                                      <td class=\"text-center\">
                                          <a href=\"/backend/auth/admin/edit/blogpost/";
                // line 35
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "post_id", array()), "html", null, true);
                echo "\" class=\"btn btn-primary\">Edit Post</a>
                                      </td>
                                  </tr>
                              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "
                          </table>
                        </div>
                    </div>
                    <div role=\"tabpanel\" class=\"tab-pane fade\" id=\"drafts\">
                        <br>
                        <div class=\"table-responsive\">
                          <table class=\"table table-striped table-hover\">
                              <thead>
                                  <td>Post ID</td>
                                  <td>Title</td>
                                  <td>Created</td>
                                  <td>Modified</td>
                                  <td>Published</td>
                                  <td><span></span> </td>
                              </thead>

                              ";
            // line 56
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["blogposts"] ?? null), "drafts", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 57
                echo "                                  <tr>
                                      <td>";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "post_id", array()), "html", null, true);
                echo "</td>
                                      <td>";
                // line 59
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "title", array()), "html", null, true);
                echo "</td>
                                      <td>";
                // line 60
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "date_created", array()), "html", null, true);
                echo "</td>
                                      <td>";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "date_modified", array()), "html", null, true);
                echo "</td>
                                      <td>";
                // line 62
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "date_published", array()), "html", null, true);
                echo "</td>
                                      <td class=\"text-center\">
                                          <a href=\"/backend/auth/admin/edit/blogpost/";
                // line 64
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "post_id", array()), "html", null, true);
                echo "\" class=\"btn btn-primary\">Edit Post</a>
                                      </td>
                                  </tr>
                              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "
                          </table>
                        </div>
                    </div>
                    <div role=\"tabpanel\" class=\"tab-pane fade\" id=\"published\">
                        <br>
                        <div class=\"table-responsive\">
                          <table class=\"table table-striped table-hover\">
                              <thead>
                                  <td>Post ID</td>
                                  <td>Title</td>
                                  <td>Created</td>
                                  <td>Modified</td>
                                  <td>Published</td>
                                  <td><span></span> </td>
                              </thead>

                              ";
            // line 85
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["blogposts"] ?? null), "published", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 86
                echo "                                  <tr>
                                      <td>";
                // line 87
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "post_id", array()), "html", null, true);
                echo "</td>
                                      <td>";
                // line 88
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "title", array()), "html", null, true);
                echo "</td>
                                      <td>";
                // line 89
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "date_created", array()), "html", null, true);
                echo "</td>
                                      <td>";
                // line 90
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "date_modified", array()), "html", null, true);
                echo "</td>
                                      <td>";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "date_published", array()), "html", null, true);
                echo "</td>
                                      <td class=\"text-center\">
                                          <a href=\"/backend/auth/admin/edit/blogpost/";
                // line 93
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "post_id", array()), "html", null, true);
                echo "\" class=\"btn btn-primary\">Edit Post</a>
                                      </td>
                                  </tr>
                              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 97
            echo "
                          </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

";
        } else {
            // line 108
            echo "    <div class=\"\">
        <h3>ERROR</h3>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "showallposts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  213 => 108,  200 => 97,  190 => 93,  185 => 91,  181 => 90,  177 => 89,  173 => 88,  169 => 87,  166 => 86,  162 => 85,  143 => 68,  133 => 64,  128 => 62,  124 => 61,  120 => 60,  116 => 59,  112 => 58,  109 => 57,  105 => 56,  86 => 39,  76 => 35,  71 => 33,  67 => 32,  63 => 31,  59 => 30,  55 => 29,  52 => 28,  48 => 27,  21 => 2,  19 => 1,);
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
    <div class=\"row\">
        <div class=\"col-xs-12\">
            <div>
                <!-- Nav tabs -->
                <ul class=\"nav nav-tabs\" role=\"tablist\">
                    <li role=\"presentation\" class=\"active\"><a href=\"#all-posts\" aria-controls=\"all-posts\" role=\"tab\" data-toggle=\"tab\">All Posts</a></li>
                    <li role=\"presentation\"><a href=\"#drafts\" aria-controls=\"drafts\" role=\"tab\" data-toggle=\"tab\">Drafts</a></li>
                    <li role=\"presentation\"><a href=\"#published\" aria-controls=\"published\" role=\"tab\" data-toggle=\"tab\">Published</a></li>
                </ul>

                <!-- Tab panes -->
                <div class=\"tab-content\">
                    <div role=\"tabpanel\" class=\"tab-pane fade in active\" id=\"all-posts\">
                        <br>
                        <div class=\"table-responsive\">
                          <table class=\"table table-striped table-hover\">
                              <thead>
                                  <td>Post ID</td>
                                  <td>Title</td>
                                  <td>Created</td>
                                  <td>Modified</td>
                                  <td>Published</td>
                                  <td><span></span> </td>
                              </thead>

                              {% for post in blogposts.all %}
                                  <tr>
                                      <td>{{post.post_id}}</td>
                                      <td>{{post.title}}</td>
                                      <td>{{post.date_created}}</td>
                                      <td>{{post.date_modified}}</td>
                                      <td>{{post.date_published}}</td>
                                      <td class=\"text-center\">
                                          <a href=\"/backend/auth/admin/edit/blogpost/{{post.post_id}}\" class=\"btn btn-primary\">Edit Post</a>
                                      </td>
                                  </tr>
                              {% endfor %}

                          </table>
                        </div>
                    </div>
                    <div role=\"tabpanel\" class=\"tab-pane fade\" id=\"drafts\">
                        <br>
                        <div class=\"table-responsive\">
                          <table class=\"table table-striped table-hover\">
                              <thead>
                                  <td>Post ID</td>
                                  <td>Title</td>
                                  <td>Created</td>
                                  <td>Modified</td>
                                  <td>Published</td>
                                  <td><span></span> </td>
                              </thead>

                              {% for post in blogposts.drafts %}
                                  <tr>
                                      <td>{{post.post_id}}</td>
                                      <td>{{post.title}}</td>
                                      <td>{{post.date_created}}</td>
                                      <td>{{post.date_modified}}</td>
                                      <td>{{post.date_published}}</td>
                                      <td class=\"text-center\">
                                          <a href=\"/backend/auth/admin/edit/blogpost/{{post.post_id}}\" class=\"btn btn-primary\">Edit Post</a>
                                      </td>
                                  </tr>
                              {% endfor %}

                          </table>
                        </div>
                    </div>
                    <div role=\"tabpanel\" class=\"tab-pane fade\" id=\"published\">
                        <br>
                        <div class=\"table-responsive\">
                          <table class=\"table table-striped table-hover\">
                              <thead>
                                  <td>Post ID</td>
                                  <td>Title</td>
                                  <td>Created</td>
                                  <td>Modified</td>
                                  <td>Published</td>
                                  <td><span></span> </td>
                              </thead>

                              {% for post in blogposts.published %}
                                  <tr>
                                      <td>{{post.post_id}}</td>
                                      <td>{{post.title}}</td>
                                      <td>{{post.date_created}}</td>
                                      <td>{{post.date_modified}}</td>
                                      <td>{{post.date_published}}</td>
                                      <td class=\"text-center\">
                                          <a href=\"/backend/auth/admin/edit/blogpost/{{post.post_id}}\" class=\"btn btn-primary\">Edit Post</a>
                                      </td>
                                  </tr>
                              {% endfor %}

                          </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

{% else %}
    <div class=\"\">
        <h3>ERROR</h3>
    </div>
{% endif %}
", "showallposts.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/showallposts.html.twig");
    }
}
