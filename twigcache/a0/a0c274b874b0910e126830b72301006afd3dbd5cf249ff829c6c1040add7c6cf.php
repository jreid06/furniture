<?php

/* featured.html.twig */
class __TwigTemplate_56e832bf05e6427e6387e2d05649b1602f0097dc2b8f2e12b6311abefb456ad3 extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["featured_products"] ?? null), "product", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["featured"]) {
            // line 2
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["featured"], "skus", array()), "data", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["featured_sku"]) {
                // line 3
                echo "        <div
            class=\"col-6 col-sm-3 col-lg-2\"
            data-product-link=\"/product/";
                // line 5
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured_sku"], "attributes", array()), "category", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured_sku"], "attributes", array()), "type", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured"], "metadata", array()), "slug", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured_sku"], "attributes", array()), "color", array()), "html", null, true);
                if (($this->getAttribute($this->getAttribute($context["featured_sku"], "attributes", array()), "size", array()) != "none")) {
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured_sku"], "attributes", array()), "size", array()), "html", null, true);
                }
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["featured_sku"], "product", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["featured_sku"], "id", array()), "html", null, true);
                echo "\"
            id=\"'featuredproduct-";
                // line 6
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\"
            å=\"å\">
            <div class=\"card featured-prod-card\" data-product-id=\"";
                // line 8
                echo twig_escape_filter($this->env, $this->getAttribute($context["featured"], "id", array()), "html", null, true);
                echo "\">

                <div class=\"product-image\">
                    <img class=\"card-img-top lazy\" src=\"";
                // line 11
                echo twig_escape_filter($this->env, $this->getAttribute($context["featured_sku"], "image", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["featured"], "caption", array()), "html", null, true);
                echo "\">
                </div>
                <div class=\"card-body\">
                    <h6 class=\"card-subtitle mb-2\">
                        <a
                            href=\"/product/";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured_sku"], "attributes", array()), "category", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured_sku"], "attributes", array()), "type", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured"], "metadata", array()), "slug", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured_sku"], "attributes", array()), "color", array()), "html", null, true);
                if (($this->getAttribute($this->getAttribute($context["featured_sku"], "attributes", array()), "size", array()) != "none")) {
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured_sku"], "attributes", array()), "size", array()), "html", null, true);
                }
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["featured_sku"], "product", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["featured_sku"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["featured"], "name", array()), "html", null, true);
                echo "
                            -
                            ";
                // line 18
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array($this->getAttribute($this->getAttribute($context["featured_sku"], "attributes", array()), "color", array()))), "html", null, true);
                echo "
                            ";
                // line 19
                if (($this->getAttribute($this->getAttribute($context["featured_sku"], "attributes", array()), "size", array()) != "none")) {
                    echo "-
                                ";
                    // line 20
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('camel_case')->getCallable(), array($this->getAttribute($this->getAttribute($context["featured_sku"], "attributes", array()), "size", array()))), "html", null, true);
                    echo "
                            ";
                }
                // line 22
                echo "                        </a>
                    </h6>
                    <p class=\"product-price-p\">
                        £";
                // line 25
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["featured_sku"], "price", array()) / 100), 2), "html", null, true);
                echo "
                    </p>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['featured_sku'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['featured'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "featured.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 25,  118 => 22,  113 => 20,  109 => 19,  105 => 18,  84 => 16,  74 => 11,  68 => 8,  63 => 6,  45 => 5,  41 => 3,  23 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for featured in featured_products.product %}
    {% for featured_sku in featured.skus.data %}
        <div
            class=\"col-6 col-sm-3 col-lg-2\"
            data-product-link=\"/product/{{featured_sku.attributes.category}}/{{featured_sku.attributes.type}}/{{featured.metadata.slug}}-{{featured_sku.attributes.color}}{% if featured_sku.attributes.size != 'none' %}-{{featured_sku.attributes.size}}{% endif %}/{{featured_sku.product}}/{{featured_sku.id}}\"
            id=\"'featuredproduct-{{loop.index}}\"
            å=\"å\">
            <div class=\"card featured-prod-card\" data-product-id=\"{{featured.id}}\">

                <div class=\"product-image\">
                    <img class=\"card-img-top lazy\" src=\"{{ featured_sku.image }}\" alt=\"{{featured.caption}}\">
                </div>
                <div class=\"card-body\">
                    <h6 class=\"card-subtitle mb-2\">
                        <a
                            href=\"/product/{{featured_sku.attributes.category}}/{{featured_sku.attributes.type}}/{{featured.metadata.slug}}-{{featured_sku.attributes.color}}{% if featured_sku.attributes.size != 'none' %}-{{featured_sku.attributes.size}}{% endif %}/{{featured_sku.product}}/{{featured_sku.id}}\">{{featured.name}}
                            -
                            {{featured_sku.attributes.color | camel_case()}}
                            {% if featured_sku.attributes.size != 'none' %}-
                                {{ featured_sku.attributes.size | camel_case() }}
                            {% endif %}
                        </a>
                    </h6>
                    <p class=\"product-price-p\">
                        £{{(featured_sku.price / 100) | number_format(2) }}
                    </p>
                </div>

            </div>
        </div>
    {% endfor %}
{% endfor %}
", "featured.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/featured.html.twig");
    }
}
