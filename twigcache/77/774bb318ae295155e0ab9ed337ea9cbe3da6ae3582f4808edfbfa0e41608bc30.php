<?php

/* details.html.twig */
class __TwigTemplate_0ee62586d41581e69b71f592cc221edd2e2b35d2998404475e1f4a20ec8ff0bb extends Twig_Template
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
    <div class=\"col-12 col-md-6\">
        <div class=\"edit-details myDetails\">
            <h4>About me</h4>
            <hr>
            <form id=\"myDetails\" data-uid=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute(($context["current_details"] ?? null), "cus_id", array()), "html", null, true);
        echo "\">
                <div class=\"form-group\">
                    <label for=\"inputTitleUpdate\">Title</label>
                    <select class=\"inputTitleUpdate\" name=\"user-title\" required>
                        <option value=\"default\" ";
        // line 10
        if (($this->getAttribute(($context["current_details"] ?? null), "title", array()) == "default")) {
            echo "selected";
        }
        echo ">Please select option</option>
                        <option value=\"Mr.\" ";
        // line 11
        if (($this->getAttribute(($context["current_details"] ?? null), "title", array()) == "Mr.")) {
            echo "selected";
        }
        echo ">Mr.</option>
                        <option value=\"Miss.\" ";
        // line 12
        if (($this->getAttribute(($context["current_details"] ?? null), "title", array()) == "Miss.")) {
            echo "selected";
        }
        echo ">Miss.</option>
                        <option value=\"Mrs.\" ";
        // line 13
        if (($this->getAttribute(($context["current_details"] ?? null), "title", array()) == "Mrs.")) {
            echo "selected";
        }
        echo ">Mrs.</option>
                        <option value=\"Ms.\" ";
        // line 14
        if (($this->getAttribute(($context["current_details"] ?? null), "title", array()) == "Ms.")) {
            echo "selected";
        }
        echo ">Ms.</option>
                    </select>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputFnameUpdate\">First name</label>
                    <input type=\"text\" class=\"form-control\" id=\"inputFnameUpdate\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute(($context["current_details"] ?? null), "fname", array()), "html", null, true);
        echo "\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputLnameUpdate\">Last name</label>
                    <input type=\"text\" class=\"form-control\" id=\"inputLnameUpdate\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute(($context["current_details"] ?? null), "lname", array()), "html", null, true);
        echo "\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputDateUpdate\">D.O.B</label>
                    <input type=\"date\" class=\"form-control\" id=\"inputDateUpdate\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute(($context["current_details"] ?? null), "dob", array()), "html", null, true);
        echo "\" required>
                </div>

                <input type=\"submit\" class=\"btn btn-primary btn-block btn-large update-user-details\" value=\"Update details\" v-on:click.prevent=\"updateDetails\">
                <p class=\"text-center\"><small id=\"details-success\"></small></p>


            </form>

        </div>
    </div>
    <div class=\"col-12 col-md-6\">
        <div class=\"edit-details loginDetails\">
            <h4>Login details</h4>
            <hr>
            <h5>Current Email: <strong><span id=\"user-email\">";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute(($context["current_details"] ?? null), "email", array()), "html", null, true);
        echo "</span> </strong></h5>
            <hr>
            <form id=\"loginDetails\" data-uid=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute(($context["current_details"] ?? null), "cus_id", array()), "html", null, true);
        echo "\">
                <div class=\"form-group\">
                    <label for=\"inputEmailUpdate\">Email address</label>
                    <input type=\"email\" class=\"form-control\" id=\"inputEmailUpdate\" aria-describedby=\"emailHelp\" placeholder=\"Enter email\" required>
                    <small id=\"emailHelp\" class=\"form-text text-muted\">We'll never share your email with anyone else.</small>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputreEmailUpdate\">Re-enter email address</label>
                    <input type=\"email\" class=\"form-control\" id=\"inputreEmailUpdate\" aria-describedby=\"emailHelp\" placeholder=\"Enter email\" required>
                    <p class=\"text-center\"><small id=\"email-check\"></small></p>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputPasswordUpdate\">Password</label>
                    <input type=\"password\" class=\"form-control\" id=\"inputPasswordUpdate\" placeholder=\"Password\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputrePasswordUpdate\">Re-enter Password</label>
                    <input type=\"password\" class=\"form-control\" id=\"inputrePasswordUpdate\" placeholder=\"Password\" required>
                    <p class=\"text-center\"><small id=\"pass-check\"></small></p>
                </div>

                <input type=\"submit\" class=\"btn btn-primary btn-block btn-large update-user-login\" value=\"Save changes\" v-on:click.prevent=\"updateLoginDetails\">
                <p class=\"text-center\"><small id=\"login-details-message\"></small></p>
            </form>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 44,  99 => 42,  81 => 27,  74 => 23,  67 => 19,  57 => 14,  51 => 13,  45 => 12,  39 => 11,  33 => 10,  26 => 6,  19 => 1,);
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
    <div class=\"col-12 col-md-6\">
        <div class=\"edit-details myDetails\">
            <h4>About me</h4>
            <hr>
            <form id=\"myDetails\" data-uid=\"{{current_details.cus_id}}\">
                <div class=\"form-group\">
                    <label for=\"inputTitleUpdate\">Title</label>
                    <select class=\"inputTitleUpdate\" name=\"user-title\" required>
                        <option value=\"default\" {% if current_details.title == 'default' %}selected{% endif %}>Please select option</option>
                        <option value=\"Mr.\" {% if current_details.title == 'Mr.' %}selected{% endif %}>Mr.</option>
                        <option value=\"Miss.\" {% if current_details.title == 'Miss.' %}selected{% endif %}>Miss.</option>
                        <option value=\"Mrs.\" {% if current_details.title == 'Mrs.' %}selected{% endif %}>Mrs.</option>
                        <option value=\"Ms.\" {% if current_details.title == 'Ms.' %}selected{% endif %}>Ms.</option>
                    </select>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputFnameUpdate\">First name</label>
                    <input type=\"text\" class=\"form-control\" id=\"inputFnameUpdate\" value=\"{{current_details.fname}}\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputLnameUpdate\">Last name</label>
                    <input type=\"text\" class=\"form-control\" id=\"inputLnameUpdate\" value=\"{{current_details.lname}}\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputDateUpdate\">D.O.B</label>
                    <input type=\"date\" class=\"form-control\" id=\"inputDateUpdate\" value=\"{{current_details.dob}}\" required>
                </div>

                <input type=\"submit\" class=\"btn btn-primary btn-block btn-large update-user-details\" value=\"Update details\" v-on:click.prevent=\"updateDetails\">
                <p class=\"text-center\"><small id=\"details-success\"></small></p>


            </form>

        </div>
    </div>
    <div class=\"col-12 col-md-6\">
        <div class=\"edit-details loginDetails\">
            <h4>Login details</h4>
            <hr>
            <h5>Current Email: <strong><span id=\"user-email\">{{current_details.email}}</span> </strong></h5>
            <hr>
            <form id=\"loginDetails\" data-uid=\"{{current_details.cus_id}}\">
                <div class=\"form-group\">
                    <label for=\"inputEmailUpdate\">Email address</label>
                    <input type=\"email\" class=\"form-control\" id=\"inputEmailUpdate\" aria-describedby=\"emailHelp\" placeholder=\"Enter email\" required>
                    <small id=\"emailHelp\" class=\"form-text text-muted\">We'll never share your email with anyone else.</small>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputreEmailUpdate\">Re-enter email address</label>
                    <input type=\"email\" class=\"form-control\" id=\"inputreEmailUpdate\" aria-describedby=\"emailHelp\" placeholder=\"Enter email\" required>
                    <p class=\"text-center\"><small id=\"email-check\"></small></p>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputPasswordUpdate\">Password</label>
                    <input type=\"password\" class=\"form-control\" id=\"inputPasswordUpdate\" placeholder=\"Password\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputrePasswordUpdate\">Re-enter Password</label>
                    <input type=\"password\" class=\"form-control\" id=\"inputrePasswordUpdate\" placeholder=\"Password\" required>
                    <p class=\"text-center\"><small id=\"pass-check\"></small></p>
                </div>

                <input type=\"submit\" class=\"btn btn-primary btn-block btn-large update-user-login\" value=\"Save changes\" v-on:click.prevent=\"updateLoginDetails\">
                <p class=\"text-center\"><small id=\"login-details-message\"></small></p>
            </form>
        </div>
    </div>
</div>
", "details.html.twig", "/Users/jasonreid/Sites/furniture/twig_templates/details.html.twig");
    }
}
