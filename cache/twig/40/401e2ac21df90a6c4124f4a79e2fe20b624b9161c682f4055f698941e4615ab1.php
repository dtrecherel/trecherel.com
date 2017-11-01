<?php

/* partials/base.html.twig */
class __TwigTemplate_ed9a293ca8e9d6ab04c81eef35c111b284f3cb9163388d3a047bd9fa86467b5b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'header' => array($this, 'block_header'),
            'header_extra' => array($this, 'block_header_extra'),
            'header_navigation' => array($this, 'block_header_navigation'),
            'body' => array($this, 'block_body'),
            'sidebar' => array($this, 'block_sidebar'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
            'bottom' => array($this, 'block_bottom'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"";
        // line 2
        echo (($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "language", array()), "getLanguage", array())) ? ($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "language", array()), "getLanguage", array())) : ("en"));
        echo "\">
<head>
";
        // line 4
        $context["theme_config"] = $this->getAttribute($this->getAttribute(($context["config"] ?? null), "themes", array()), $this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", array()), "pages", array()), "theme", array()));
        // line 5
        $this->displayBlock('head', $context, $blocks);
        // line 47
        echo "</head>
<body id=\"top\" class=\"";
        // line 48
        echo $this->getAttribute($this->getAttribute(($context["page"] ?? null), "header", array()), "body_classes", array());
        echo "\">
    <div id=\"sb-site\">
        ";
        // line 50
        $this->displayBlock('header', $context, $blocks);
        // line 69
        echo "        ";
        $this->displayBlock('body', $context, $blocks);
        // line 75
        echo "
        ";
        // line 76
        $this->displayBlock('footer', $context, $blocks);
        // line 80
        echo "    </div>
    <div class=\"sb-slidebar sb-left sb-width-thin\">
        <div id=\"panel\">
        ";
        // line 83
        $this->loadTemplate("partials/navigation.html.twig", "partials/base.html.twig", 83)->display($context);
        // line 84
        echo "        </div>
    </div>
    ";
        // line 86
        $this->displayBlock('bottom', $context, $blocks);
        // line 101
        echo "</body>

</html>
";
    }

    // line 5
    public function block_head($context, array $blocks = array())
    {
        // line 6
        echo "    <meta charset=\"utf-8\" />
    <title>";
        // line 7
        if ($this->getAttribute(($context["header"] ?? null), "title", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute(($context["header"] ?? null), "title", array()), "html");
            echo " | ";
        }
        echo twig_escape_filter($this->env, $this->getAttribute(($context["site"] ?? null), "title", array()), "html");
        echo "</title>
    ";
        // line 8
        $this->loadTemplate("partials/metadata.html.twig", "partials/base.html.twig", 8)->display($context);
        // line 9
        echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\">
    <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 10
        echo $this->env->getExtension('Grav\Common\Twig\TwigExtension')->urlFunc("theme://images/favicon.png", true);
        echo "\" />

    ";
        // line 12
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 32
        echo "    ";
        echo $this->getAttribute(($context["assets"] ?? null), "css", array(), "method");
        echo "
\t<link href=\"https://fonts.googleapis.com/css?family=Fira+Mono:500|Open+Sans:400,400i,700,700i|Oswald:600\" rel=\"stylesheet\">
    ";
        // line 34
        $this->displayBlock('javascripts', $context, $blocks);
        // line 44
        echo "    ";
        echo $this->getAttribute(($context["assets"] ?? null), "js", array(), "method");
        echo "

";
    }

    // line 12
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 13
        echo "        ";
        $this->getAttribute(($context["assets"] ?? null), "add", array(0 => "theme://css/pure-0.5.0/grids-min.css", 1 => 103), "method");
        // line 14
        echo "        ";
        $this->getAttribute(($context["assets"] ?? null), "add", array(0 => "theme://css-compiled/nucleus.css", 1 => 102), "method");
        // line 15
        echo "        ";
        $this->getAttribute(($context["assets"] ?? null), "add", array(0 => "theme://css-compiled/template.css", 1 => 101), "method");
        // line 16
        echo "        ";
        $this->getAttribute(($context["assets"] ?? null), "add", array(0 => "theme://css/font-awesome.min.css", 1 => 100), "method");
        // line 17
        echo "        ";
        $this->getAttribute(($context["assets"] ?? null), "add", array(0 => "theme://css/slidebars.min.css"), "method");
        // line 18
        echo "\t\t
        ";
        // line 19
        if ($this->getAttribute($this->getAttribute(($context["page"] ?? null), "header", array()), "lightbox", array())) {
            // line 20
            echo "            ";
            $this->getAttribute(($context["assets"] ?? null), "add", array(0 => "theme://css/featherlight.min.css"), "method");
            // line 21
            echo "        ";
        }
        // line 22
        echo "
        ";
        // line 23
        if ((($this->getAttribute(($context["browser"] ?? null), "getBrowser", array()) == "msie") && ($this->getAttribute(($context["browser"] ?? null), "getVersion", array()) == 10))) {
            // line 24
            echo "            ";
            $this->getAttribute(($context["assets"] ?? null), "addCss", array(0 => "theme://css/nucleus-ie10.css"), "method");
            // line 25
            echo "        ";
        }
        // line 26
        echo "
        ";
        // line 27
        if (((($this->getAttribute(($context["browser"] ?? null), "getBrowser", array()) == "msie") && ($this->getAttribute(($context["browser"] ?? null), "getVersion", array()) >= 8)) && ($this->getAttribute(($context["browser"] ?? null), "getVersion", array()) <= 9))) {
            // line 28
            echo "            ";
            $this->getAttribute(($context["assets"] ?? null), "add", array(0 => "theme://css/nucleus-ie9.css", 1 => 99), "method");
            // line 29
            echo "            ";
            $this->getAttribute(($context["assets"] ?? null), "add", array(0 => "theme://js/html5shiv-printshiv.min.js", 1 => 99), "method");
            // line 30
            echo "        ";
        }
        // line 31
        echo "    ";
    }

    // line 34
    public function block_javascripts($context, array $blocks = array())
    {
        // line 35
        echo "        ";
        $this->getAttribute(($context["assets"] ?? null), "add", array(0 => "jquery", 1 => 101), "method");
        // line 36
        echo "        ";
        $this->getAttribute(($context["assets"] ?? null), "add", array(0 => "theme://js/modernizr.custom.71422.js", 1 => 100), "method");
        // line 37
        echo "        ";
        $this->getAttribute(($context["assets"] ?? null), "add", array(0 => "theme://js/slidebars.min.js"), "method");
        // line 38
        echo "
\t\t
        ";
        // line 40
        if ($this->getAttribute($this->getAttribute(($context["page"] ?? null), "header", array()), "lightbox", array())) {
            // line 41
            echo "            ";
            $this->getAttribute(($context["assets"] ?? null), "add", array(0 => "theme://js/featherlight.min.js"), "method");
            // line 42
            echo "        ";
        }
        // line 43
        echo "    ";
    }

    // line 50
    public function block_header($context, array $blocks = array())
    {
        // line 51
        echo "        <header id=\"header\">
\t        <div class=\"container\">
                <a href=\"";
        // line 53
        echo (((($context["base_url"] ?? null) == "")) ? ("/") : (($context["base_url"] ?? null)));
        echo "\" id=\"title\">
                    > Yuriko!
                </a>
                <div id=\"navbar\">
                    ";
        // line 57
        $this->displayBlock('header_extra', $context, $blocks);
        // line 58
        echo "                    ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", array()), "langswitcher", array()), "enabled", array())) {
            // line 59
            echo "                    ";
            $this->loadTemplate("partials/langswitcher.html.twig", "partials/base.html.twig", 59)->display($context);
            // line 60
            echo "                    ";
        }
        // line 61
        echo "                    ";
        $this->displayBlock('header_navigation', $context, $blocks);
        // line 64
        echo "                    <span class=\"panel-activation sb-toggle-left navbar-left menu-btn fa fa-bars\"></span>
                </div>
\t        </div>
        </header>
        ";
    }

    // line 57
    public function block_header_extra($context, array $blocks = array())
    {
    }

    // line 61
    public function block_header_navigation($context, array $blocks = array())
    {
        // line 62
        echo "                    ";
        $this->loadTemplate("partials/navigation.html.twig", "partials/base.html.twig", 62)->display($context);
        // line 63
        echo "                    ";
    }

    // line 69
    public function block_body($context, array $blocks = array())
    {
        // line 70
        echo "        <section id=\"body\" class=\"container\">
            ";
        // line 71
        $this->displayBlock('sidebar', $context, $blocks);
        // line 72
        echo "            ";
        $this->displayBlock('content', $context, $blocks);
        // line 73
        echo "        </section>
        ";
    }

    // line 71
    public function block_sidebar($context, array $blocks = array())
    {
    }

    // line 72
    public function block_content($context, array $blocks = array())
    {
    }

    // line 76
    public function block_footer($context, array $blocks = array())
    {
        // line 77
        echo "        <footer id=\"footer\">
        </footer>
        ";
    }

    // line 86
    public function block_bottom($context, array $blocks = array())
    {
        // line 87
        echo "    <script>
    \$(function () {
        \$(document).ready(function() {
          \$.slidebars({
            hideControlClasses: true,
            scrollLock: true
          });
        });
        ";
        // line 95
        if ($this->getAttribute($this->getAttribute(($context["page"] ?? null), "header", array()), "lightbox", array())) {
            // line 96
            echo "        \$('a[rel=\"lightbox\"]').featherlight();
        ";
        }
        // line 98
        echo "    });
    </script>
    ";
    }

    public function getTemplateName()
    {
        return "partials/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  313 => 98,  309 => 96,  307 => 95,  297 => 87,  294 => 86,  288 => 77,  285 => 76,  280 => 72,  275 => 71,  270 => 73,  267 => 72,  265 => 71,  262 => 70,  259 => 69,  255 => 63,  252 => 62,  249 => 61,  244 => 57,  236 => 64,  233 => 61,  230 => 60,  227 => 59,  224 => 58,  222 => 57,  215 => 53,  211 => 51,  208 => 50,  204 => 43,  201 => 42,  198 => 41,  196 => 40,  192 => 38,  189 => 37,  186 => 36,  183 => 35,  180 => 34,  176 => 31,  173 => 30,  170 => 29,  167 => 28,  165 => 27,  162 => 26,  159 => 25,  156 => 24,  154 => 23,  151 => 22,  148 => 21,  145 => 20,  143 => 19,  140 => 18,  137 => 17,  134 => 16,  131 => 15,  128 => 14,  125 => 13,  122 => 12,  114 => 44,  112 => 34,  106 => 32,  104 => 12,  99 => 10,  96 => 9,  94 => 8,  86 => 7,  83 => 6,  80 => 5,  73 => 101,  71 => 86,  67 => 84,  65 => 83,  60 => 80,  58 => 76,  55 => 75,  52 => 69,  50 => 50,  45 => 48,  42 => 47,  40 => 5,  38 => 4,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"{{ grav.language.getLanguage ?: 'en' }}\">
<head>
{% set theme_config = attribute(config.themes, config.system.pages.theme) %}
{% block head %}
    <meta charset=\"utf-8\" />
    <title>{% if header.title %}{{ header.title|e('html') }} | {% endif %}{{ site.title|e('html') }}</title>
    {% include 'partials/metadata.html.twig' %}
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\">
    <link rel=\"icon\" type=\"image/png\" href=\"{{ url('theme://images/favicon.png', true) }}\" />

    {% block stylesheets %}
        {% do assets.add('theme://css/pure-0.5.0/grids-min.css',103) %}
        {% do assets.add('theme://css-compiled/nucleus.css',102) %}
        {% do assets.add('theme://css-compiled/template.css',101) %}
        {% do assets.add('theme://css/font-awesome.min.css',100) %}
        {% do assets.add('theme://css/slidebars.min.css') %}
\t\t
        {% if page.header.lightbox %}
            {% do assets.add('theme://css/featherlight.min.css') %}
        {% endif %}

        {% if browser.getBrowser == 'msie' and browser.getVersion == 10 %}
            {% do assets.addCss('theme://css/nucleus-ie10.css') %}
        {% endif %}

        {% if browser.getBrowser == 'msie' and browser.getVersion >= 8 and browser.getVersion <= 9 %}
            {% do assets.add('theme://css/nucleus-ie9.css',99) %}
            {% do assets.add('theme://js/html5shiv-printshiv.min.js',99) %}
        {% endif %}
    {% endblock %}
    {{ assets.css() }}
\t<link href=\"https://fonts.googleapis.com/css?family=Fira+Mono:500|Open+Sans:400,400i,700,700i|Oswald:600\" rel=\"stylesheet\">
    {% block javascripts %}
        {% do assets.add('jquery',101) %}
        {% do assets.add('theme://js/modernizr.custom.71422.js',100) %}
        {% do assets.add('theme://js/slidebars.min.js') %}

\t\t
        {% if page.header.lightbox %}
            {% do assets.add('theme://js/featherlight.min.js') %}
        {% endif %}
    {% endblock %}
    {{ assets.js() }}

{% endblock head%}
</head>
<body id=\"top\" class=\"{{ page.header.body_classes }}\">
    <div id=\"sb-site\">
        {% block header %}
        <header id=\"header\">
\t        <div class=\"container\">
                <a href=\"{{ base_url == '' ? '/' : base_url }}\" id=\"title\">
                    > Yuriko!
                </a>
                <div id=\"navbar\">
                    {% block header_extra %}{% endblock %}
                    {% if config.plugins.langswitcher.enabled %}
                    {% include 'partials/langswitcher.html.twig' %}
                    {% endif %}
                    {% block header_navigation %}
                    {% include 'partials/navigation.html.twig' %}
                    {% endblock %}
                    <span class=\"panel-activation sb-toggle-left navbar-left menu-btn fa fa-bars\"></span>
                </div>
\t        </div>
        </header>
        {% endblock %}
        {% block body %}
        <section id=\"body\" class=\"container\">
            {% block sidebar %}{% endblock %}
            {% block content %}{% endblock %}
        </section>
        {% endblock %}

        {% block footer %}
        <footer id=\"footer\">
        </footer>
        {% endblock %}
    </div>
    <div class=\"sb-slidebar sb-left sb-width-thin\">
        <div id=\"panel\">
        {% include 'partials/navigation.html.twig' %}
        </div>
    </div>
    {% block bottom %}
    <script>
    \$(function () {
        \$(document).ready(function() {
          \$.slidebars({
            hideControlClasses: true,
            scrollLock: true
          });
        });
        {% if page.header.lightbox %}
        \$('a[rel=\"lightbox\"]').featherlight();
        {% endif %}
    });
    </script>
    {% endblock %}
</body>

</html>
", "partials/base.html.twig", "/var/www/www/user/themes/afterburner2/templates/partials/base.html.twig");
    }
}
