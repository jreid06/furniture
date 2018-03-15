<?php

/* blogimages.html.twig */
class __TwigTemplate_48b4c25cf6e2bc679d2d6960a98ecd66a84f036d874bd7b63c2449e81b70c666 extends Twig_Template
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
        echo "<div class=\"row\">
    <!-- place in twig template to render all current added images -->
    <!-- RENDER A TABLE LISTING ALL images in blog_images database -->
    <div class=\"col-xs-12\">
        <!-- <pre>
            ";
        // line 6
        echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, ($context["blog_images"] ?? null)), "html", null, true);
        echo "
        </pre> -->
        <div class=\"table-responsive\">
          <table class=\"table table-striped table-hover\">
              <thead>
                  <td>Image</td>
                  <td>ID</td>
                  <td>Name</td>
                  <td>Controls</td>
              </thead>

              ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["blog_images"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 18
            echo "                  <tr>
                      <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "path", array()), "html", null, true);
            echo "</td>
                      <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "custom_img_id", array()), "html", null, true);
            echo "</td>
                      <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "image_name", array()), "html", null, true);
            echo "</td>
                      <td class=\"blog-image-ctrls\">
                          <div @click=\"viewImage\" data-image-path=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "path", array()), "html", null, true);
            echo "\" data-image-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "image_name", array()), "html", null, true);
            echo "\">
                              <span class=\"fa fa-info\" data-image-path=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "path", array()), "html", null, true);
            echo "\" data-image-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "image_name", array()), "html", null, true);
            echo "\"@click=\"viewImage\"></span>
                          </div>
                          <div @click=\"deleteImage\" data-image-path=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "path", array()), "html", null, true);
            echo "\" data-image-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "image_name", array()), "html", null, true);
            echo "\" data-img-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "custom_img_id", array()), "html", null, true);
            echo "\">
                              <span class=\"fa fa-trash-o\" @click=\"deleteImage\" data-image-path=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "path", array()), "html", null, true);
            echo "\" data-image-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "image_name", array()), "html", null, true);
            echo "\" data-img-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "custom_img_id", array()), "html", null, true);
            echo "\"></span>
                          </div>
                      </td>
                  </tr>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "
          </table>
        </div>

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "blogimages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 32,  81 => 27,  73 => 26,  66 => 24,  60 => 23,  55 => 21,  51 => 20,  47 => 19,  44 => 18,  40 => 17,  26 => 6,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"row\">
    <!-- place in twig template to render all current added images -->
    <!-- RENDER A TABLE LISTING ALL images in blog_images database -->
    <div class=\"col-xs-12\">
        <!-- <pre>
            {{dump(blog_images)}}
        </pre> -->
        <div class=\"table-responsive\">
          <table class=\"table table-striped table-hover\">
              <thead>
                  <td>Image</td>
                  <td>ID</td>
                  <td>Name</td>
                  <td>Controls</td>
              </thead>

              {% for image in blog_images %}
                  <tr>
                      <td>{{image.path}}</td>
                      <td>{{image.custom_img_id}}</td>
                      <td>{{image.image_name}}</td>
                      <td class=\"blog-image-ctrls\">
                          <div @click=\"viewImage\" data-image-path=\"{{image.path}}\" data-image-name=\"{{image.image_name}}\">
                              <span class=\"fa fa-info\" data-image-path=\"{{image.path}}\" data-image-name=\"{{image.image_name}}\"@click=\"viewImage\"></span>
                          </div>
                          <div @click=\"deleteImage\" data-image-path=\"{{image.path}}\" data-image-name=\"{{image.image_name}}\" data-img-id=\"{{image.custom_img_id}}\">
                              <span class=\"fa fa-trash-o\" @click=\"deleteImage\" data-image-path=\"{{image.path}}\" data-image-name=\"{{image.image_name}}\" data-img-id=\"{{image.custom_img_id}}\"></span>
                          </div>
                      </td>
                  </tr>
              {% endfor %}

          </table>
        </div>

    </div>
</div>
", "blogimages.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/blogimages.html.twig");
    }
}
