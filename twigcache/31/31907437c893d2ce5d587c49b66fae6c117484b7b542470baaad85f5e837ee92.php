<?php

/* blog-post-home.html.twig */
class __TwigTemplate_7ecee4724bfcaf194c27419d69b0896ff6599360c40be7fb0d77d87da3eb5691 extends Twig_Template
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
        echo "<!-- <pre>
    ";
        // line 2
        echo twig_escape_filter($this->env, twig_round($this->getAttribute($this->getAttribute($this->getAttribute(($context["posts"] ?? null), 0, array(), "array"), "date", array(), "array"), "month", array(), "array")), "html", null, true);
        echo "
    ";
        // line 3
        echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, $this->getAttribute($this->getAttribute(($context["posts"] ?? null), 0, array(), "array"), "date", array(), "array")), "html", null, true);
        echo "
</pre> -->

";
        // line 6
        if ( !($context["error"] ?? null)) {
            // line 7
            echo "
    ";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 9
                echo "
        <div class=\"post-col col-12 col-sm-6 col-lg-4 ";
                // line 10
                if (($this->getAttribute($context["loop"], "index", array()) > 2)) {
                    echo "d-none d-lg-block";
                }
                echo "\">
            <div class=\"card blog-post-card\" data-post-id=\"";
                // line 11
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "post_id", array()), "html", null, true);
                echo "\">
            <div class=\"card-img-bgrnd lazy\" style=\"background: url(";
                // line 12
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "main_img_path", array()), "html", null, true);
                echo ")\"></div>
              <div class=\"card-body\">
                 ";
                // line 14
                $context["month_num"] = (twig_round($this->getAttribute($this->getAttribute($context["post"], "date", array()), "month", array())) - 1);
                // line 15
                echo "                <h4 class=\"card-title\">";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["post"], "title", array())), "html", null, true);
                echo "</h4>
                <p class=\"card-text\">";
                // line 16
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["post"], "brief_desc", array())), "html", null, true);
                echo "</p>
                <p class=\"card-text blog-date\">";
                // line 17
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["months"] ?? null), ($context["month_num"] ?? null), array(), "array")), "html", null, true);
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["post"], "date", array()), "full", array()), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["post"], "date", array()), "time", array()), "html", null, true);
                echo "</p>
                <a href=\"/blog/";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute(($context["months"] ?? null), ($context["month_num"] ?? null), array(), "array"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "post_id", array()), "html", null, true);
                echo "\">
                    READ MORE >
                </a>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "

";
        } else {
            // line 28
            echo "
    <div class=\"col-12\">
        <h3 class=\"text-center\">ERROR RETRIEVING BLOG POSTS. REFRESH PAGE</h3>
    </div>

";
        }
    }

    public function getTemplateName()
    {
        return "blog-post-home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 28,  114 => 25,  91 => 18,  83 => 17,  79 => 16,  74 => 15,  72 => 14,  67 => 12,  63 => 11,  57 => 10,  54 => 9,  37 => 8,  34 => 7,  32 => 6,  26 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- <pre>
    {{posts[0]['date']['month'] | round }}
    {{dump(posts[0]['date'])}}
</pre> -->

{% if not error %}

    {% for post in posts %}

        <div class=\"post-col col-12 col-sm-6 col-lg-4 {% if loop.index > 2 %}d-none d-lg-block{% endif %}\">
            <div class=\"card blog-post-card\" data-post-id=\"{{post.post_id}}\">
            <div class=\"card-img-bgrnd lazy\" style=\"background: url({{post.main_img_path}})\"></div>
              <div class=\"card-body\">
                 {% set month_num = (post.date.month | round) - 1 %}
                <h4 class=\"card-title\">{{post.title | capitalize}}</h4>
                <p class=\"card-text\">{{post.brief_desc | capitalize}}</p>
                <p class=\"card-text blog-date\">{{months[month_num] | capitalize }}  {{post.date.full}} - {{post.date.time}}</p>
                <a href=\"/blog/{{months[month_num]}}/{{post.post_id}}\">
                    READ MORE >
                </a>
              </div>
            </div>
        </div>
    {% endfor %}


{% else %}

    <div class=\"col-12\">
        <h3 class=\"text-center\">ERROR RETRIEVING BLOG POSTS. REFRESH PAGE</h3>
    </div>

{% endif %}
", "blog-post-home.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/blog-post-home.html.twig");
    }
}
