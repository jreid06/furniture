<?php

/* addbrands.html.twig */
class __TwigTemplate_3e1b021298a9b2aa44a7244fa6f015a2d7c235ae0b6c7fd41b7e4606e55a1649 extends Twig_Template
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
    <div class=\"col-lg-12\">
        <h1 class=\"page-header\">Add brands</h1>
    </div>
    <!-- /.col-lg-12 -->

    <div class=\"col-xs-12 col-md-8\">
        <!-- brand initial -->
        <div class=\"input-group input-group-lg\">
            <span class=\"input-group-addon\" id=\"brand-initial\">Add letter for brand (A-Z)</span>
            <input type=\"text\" class=\"form-control brand-initial-inp\" placeholder=\"Please enter brand initial\" aria-describedby=\"brand-initial\" @keyup=\"checkLength\">
        </div>
        <br>
        <!-- error alert for to many characters -->
        <div class=\"alert alert-danger alert-dismissible alert-field-limit\" style=\"display: none;\"role=\"alert\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
          <strong></strong> <span id=\"alert-limit-msg\">Too many or enough characters. Only One letter is allowed in this field e.g 'A'</span>

        </div>

        <hr>

        <!-- add brand name. Must begin with letter that was inputed above -->
        <p class=\"text-muted\"><em>Brand name must begin with same letter added above</em></p>
        <p class=\"text-muted\"><em>To add</em><span class=\"text-uppercase\"> MULTIPLE </span><em> brands separate each brand by a comma</em> </p>
        <div class=\"input-group input-group-lg\">
            <span class=\"input-group-addon\" id=\"brand-names\">Add brand name</span>
            <input type=\"text\" class=\"form-control brand-names-inp\" placeholder=\"Please enter brand name (e.g brand1, brand2, brand3 etc ..)\" aria-describedby=\"brand-names\">
        </div>
        <br>
        <!-- error alert for invalid name entered -->
        <div class=\"alert alert-danger alert-dismissible alert-name-error\" style=\"display: none;\"role=\"alert\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
          <strong></strong> <span id=\"alert-name-error-msg\"></span>

        </div>

    </div>

    <div class=\"col-xs-12 col-md-4\">
        <div class=\"list-group lg-save\">
            <div class=\"list-group-item\" style=\"display: none;\">

                <strong>STATUS:&nbsp;&nbsp;&nbsp;</strong><span id=\"blog-status\">NOT SAVED</span>

            </div>
            <div class=\"list-group-item text-center\">
                <button type=\"button\" class=\"btn btn-default\" @click=\"saveBrandInfo\">Add Brand(s)</button>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
";
    }

    public function getTemplateName()
    {
        return "addbrands.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
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
    <div class=\"col-lg-12\">
        <h1 class=\"page-header\">Add brands</h1>
    </div>
    <!-- /.col-lg-12 -->

    <div class=\"col-xs-12 col-md-8\">
        <!-- brand initial -->
        <div class=\"input-group input-group-lg\">
            <span class=\"input-group-addon\" id=\"brand-initial\">Add letter for brand (A-Z)</span>
            <input type=\"text\" class=\"form-control brand-initial-inp\" placeholder=\"Please enter brand initial\" aria-describedby=\"brand-initial\" @keyup=\"checkLength\">
        </div>
        <br>
        <!-- error alert for to many characters -->
        <div class=\"alert alert-danger alert-dismissible alert-field-limit\" style=\"display: none;\"role=\"alert\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
          <strong></strong> <span id=\"alert-limit-msg\">Too many or enough characters. Only One letter is allowed in this field e.g 'A'</span>

        </div>

        <hr>

        <!-- add brand name. Must begin with letter that was inputed above -->
        <p class=\"text-muted\"><em>Brand name must begin with same letter added above</em></p>
        <p class=\"text-muted\"><em>To add</em><span class=\"text-uppercase\"> MULTIPLE </span><em> brands separate each brand by a comma</em> </p>
        <div class=\"input-group input-group-lg\">
            <span class=\"input-group-addon\" id=\"brand-names\">Add brand name</span>
            <input type=\"text\" class=\"form-control brand-names-inp\" placeholder=\"Please enter brand name (e.g brand1, brand2, brand3 etc ..)\" aria-describedby=\"brand-names\">
        </div>
        <br>
        <!-- error alert for invalid name entered -->
        <div class=\"alert alert-danger alert-dismissible alert-name-error\" style=\"display: none;\"role=\"alert\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
          <strong></strong> <span id=\"alert-name-error-msg\"></span>

        </div>

    </div>

    <div class=\"col-xs-12 col-md-4\">
        <div class=\"list-group lg-save\">
            <div class=\"list-group-item\" style=\"display: none;\">

                <strong>STATUS:&nbsp;&nbsp;&nbsp;</strong><span id=\"blog-status\">NOT SAVED</span>

            </div>
            <div class=\"list-group-item text-center\">
                <button type=\"button\" class=\"btn btn-default\" @click=\"saveBrandInfo\">Add Brand(s)</button>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
", "addbrands.html.twig", "/Users/jasonreid/Sites/idyldev/twig_templates/addbrands.html.twig");
    }
}
