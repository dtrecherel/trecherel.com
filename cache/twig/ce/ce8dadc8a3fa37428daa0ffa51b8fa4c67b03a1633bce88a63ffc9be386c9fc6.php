<?php

/* partials/blog_item.html.twig */
class __TwigTemplate_42abeb55e8437cd9dec0ce1503411ccc211ca9182b80d88158ef8f2459b5411a extends Twig_Template
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
        echo "<div class=\"list-item\">

    ";
        // line 3
        $context["header_image"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->definedDefaultFilter($this->getAttribute($this->getAttribute(($context["page"] ?? null), "header", array()), "header_image", array()), true);
        // line 4
        echo "    ";
        $context["header_image_width"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->definedDefaultFilter($this->getAttribute($this->getAttribute(($context["page"] ?? null), "header", array()), "header_image_width", array()), 900);
        // line 5
        echo "    ";
        $context["header_image_height"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->definedDefaultFilter($this->getAttribute($this->getAttribute(($context["page"] ?? null), "header", array()), "header_image_height", array()), 300);
        // line 6
        echo "    ";
        $context["header_image_file"] = $this->getAttribute($this->getAttribute(($context["page"] ?? null), "header", array()), "header_image_file", array());
        // line 7
        echo "
    <div class=\"list-blog-header\">
        ";
        // line 9
        if ($this->getAttribute($this->getAttribute(($context["page"] ?? null), "header", array()), "link", array())) {
            // line 10
            echo "            <h1>
                ";
            // line 11
            if ( !($this->getAttribute($this->getAttribute(($context["page"] ?? null), "header", array()), "continue_link", array()) === false)) {
                // line 12
                echo "                <a href=\"";
                echo $this->getAttribute(($context["page"] ?? null), "url", array());
                echo "\"><i class=\"fa fa-angle-double-right\"></i></a>
                ";
            }
            // line 14
            echo "                <a href=\"";
            echo $this->getAttribute($this->getAttribute(($context["page"] ?? null), "header", array()), "link", array());
            echo "\">";
            echo $this->getAttribute(($context["page"] ?? null), "title", array());
            echo "</a>
            </h1>
        ";
        } else {
            // line 17
            echo "            <h1><a href=\"";
            echo $this->getAttribute(($context["page"] ?? null), "url", array());
            echo "\">";
            echo $this->getAttribute(($context["page"] ?? null), "title", array());
            echo "</a></h1>
        ";
        }
        // line 19
        echo "\t\t
\t\t";
        // line 20
        if ($this->getAttribute(($context["page"] ?? null), "date", array())) {
            // line 21
            echo "\t\t<span class=\"list-blog-date\"><i class=\"fa fa-calendar\"></i> ";
            echo twig_date_format_filter($this->env, $this->getAttribute(($context["page"] ?? null), "date", array()), "d");
            echo " ";
            echo twig_date_format_filter($this->env, $this->getAttribute(($context["page"] ?? null), "date", array()), "M");
            echo " '";
            echo twig_date_format_filter($this->env, $this->getAttribute(($context["page"] ?? null), "date", array()), "y");
            echo "</span>
\t\t";
        }
        // line 23
        echo "
        ";
        // line 24
        if ($this->getAttribute($this->getAttribute(($context["page"] ?? null), "taxonomy", array()), "category", array())) {
            // line 25
            echo "        <span class=\"tags\">
        \t<span class=\"list-blog-tag\"><i class=\"fa fa-folder-open\"></i></span>
            ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["page"] ?? null), "taxonomy", array()), "category", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 28
                echo "            <a href=\"/category";
                echo $this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", array()), "param_sep", array());
                echo $context["cat"];
                echo "\">";
                echo $context["cat"];
                echo "</a>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "        </span>
        ";
        }
        // line 32
        echo "\t\t
        ";
        // line 33
        if ($this->getAttribute($this->getAttribute(($context["page"] ?? null), "taxonomy", array()), "tag", array())) {
            // line 34
            echo "        <span class=\"tags\">
        \t<span class=\"list-blog-tag\"><i class=\"fa fa-tags\"></i></span>
            ";
            // line 36
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["page"] ?? null), "taxonomy", array()), "tag", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 37
                echo "            <a href=\"/tag";
                echo $this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", array()), "param_sep", array());
                echo $context["tag"];
                echo "\">";
                echo $context["tag"];
                echo "</a>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "        </span>
        ";
        }
        // line 41
        echo "        
        ";
        // line 42
        if (($context["header_image"] ?? null)) {
            // line 43
            echo "            ";
            if (($context["header_image_file"] ?? null)) {
                // line 44
                echo "                ";
                $context["header_image_media"] = $this->getAttribute($this->getAttribute($this->getAttribute(($context["page"] ?? null), "media", array()), "images", array()), ($context["header_image_file"] ?? null), array(), "array");
                // line 45
                echo "            ";
            } else {
                // line 46
                echo "                ";
                $context["header_image_media"] = twig_first($this->env, $this->getAttribute($this->getAttribute(($context["page"] ?? null), "media", array()), "images", array()));
                // line 47
                echo "            ";
            }
            // line 48
            echo "            ";
            echo $this->getAttribute($this->getAttribute(($context["header_image_media"] ?? null), "cropZoom", array(0 => ($context["header_image_width"] ?? null), 1 => ($context["header_image_height"] ?? null)), "method"), "html", array());
            echo "
        ";
        }
        // line 50
        echo "
    </div>

    <div class=\"list-blog-padding\">

    ";
        // line 55
        if (($this->getAttribute($this->getAttribute(($context["page"] ?? null), "header", array()), "continue_link", array()) === false)) {
            // line 56
            echo "        <p>";
            echo $this->getAttribute(($context["page"] ?? null), "content", array());
            echo "</p>
        ";
            // line 57
            if ( !($context["truncate"] ?? null)) {
                // line 58
                echo "        ";
                $context["show_prev_next"] = true;
                // line 59
                echo "        ";
            }
            // line 60
            echo "    ";
        } elseif ((($context["truncate"] ?? null) && ($this->getAttribute(($context["page"] ?? null), "summary", array()) != $this->getAttribute(($context["page"] ?? null), "content", array())))) {
            // line 61
            echo "        <p>";
            echo $this->getAttribute(($context["page"] ?? null), "summary", array());
            echo "</p>
        <p><a href=\"";
            // line 62
            echo $this->getAttribute(($context["page"] ?? null), "url", array());
            echo "\">Continue Reading...</a></p>
    ";
        } elseif (        // line 63
($context["truncate"] ?? null)) {
            // line 64
            echo "        ";
            if (($this->getAttribute(($context["page"] ?? null), "summary", array()) != $this->getAttribute(($context["page"] ?? null), "content", array()))) {
                // line 65
                echo "            <p>";
                echo \Grav\Common\Utils::truncate($this->getAttribute(($context["page"] ?? null), "content", array()), 550);
                echo "</p>
        ";
            } else {
                // line 67
                echo "            <p>";
                echo $this->getAttribute(($context["page"] ?? null), "content", array());
                echo "</p>
        ";
            }
            // line 69
            echo "        <p><a href=\"";
            echo $this->getAttribute(($context["page"] ?? null), "url", array());
            echo "\">Continue Reading...</a></p>
    ";
        } else {
            // line 71
            echo "        <p>";
            echo $this->getAttribute(($context["page"] ?? null), "content", array());
            echo "</p>
        ";
            // line 72
            $context["show_prev_next"] = true;
            // line 73
            echo "    ";
        }
        // line 74
        echo "
    ";
        // line 75
        if (($context["show_prev_next"] ?? null)) {
            // line 76
            echo "
        <p class=\"prev-next\">
            ";
            // line 78
            if ( !$this->getAttribute(($context["page"] ?? null), "isFirst", array())) {
                // line 79
                echo "                <a class=\"button\" href=\"";
                echo $this->getAttribute($this->getAttribute(($context["page"] ?? null), "nextSibling", array()), "url", array());
                echo "\"><i class=\"fa fa-chevron-left\"></i> Next Post</a>
            ";
            }
            // line 81
            echo "
            ";
            // line 82
            if ( !$this->getAttribute(($context["page"] ?? null), "isLast", array())) {
                // line 83
                echo "                <a class=\"button\" href=\"";
                echo $this->getAttribute($this->getAttribute(($context["page"] ?? null), "prevSibling", array()), "url", array());
                echo "\">Previous Post <i class=\"fa fa-chevron-right\"></i></a>
            ";
            }
            // line 85
            echo "        </p>
    ";
        }
        // line 87
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "partials/blog_item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  266 => 87,  262 => 85,  256 => 83,  254 => 82,  251 => 81,  245 => 79,  243 => 78,  239 => 76,  237 => 75,  234 => 74,  231 => 73,  229 => 72,  224 => 71,  218 => 69,  212 => 67,  206 => 65,  203 => 64,  201 => 63,  197 => 62,  192 => 61,  189 => 60,  186 => 59,  183 => 58,  181 => 57,  176 => 56,  174 => 55,  167 => 50,  161 => 48,  158 => 47,  155 => 46,  152 => 45,  149 => 44,  146 => 43,  144 => 42,  141 => 41,  137 => 39,  125 => 37,  121 => 36,  117 => 34,  115 => 33,  112 => 32,  108 => 30,  96 => 28,  92 => 27,  88 => 25,  86 => 24,  83 => 23,  73 => 21,  71 => 20,  68 => 19,  60 => 17,  51 => 14,  45 => 12,  43 => 11,  40 => 10,  38 => 9,  34 => 7,  31 => 6,  28 => 5,  25 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"list-item\">

    {% set header_image = page.header.header_image|defined(true) %}
    {% set header_image_width  = page.header.header_image_width|defined(900) %}
    {% set header_image_height = page.header.header_image_height|defined(300) %}
    {% set header_image_file = page.header.header_image_file %}

    <div class=\"list-blog-header\">
        {% if page.header.link %}
            <h1>
                {% if page.header.continue_link is not sameas(false) %}
                <a href=\"{{ page.url }}\"><i class=\"fa fa-angle-double-right\"></i></a>
                {% endif %}
                <a href=\"{{ page.header.link }}\">{{ page.title }}</a>
            </h1>
        {% else %}
            <h1><a href=\"{{ page.url }}\">{{ page.title }}</a></h1>
        {% endif %}
\t\t
\t\t{% if page.date %}
\t\t<span class=\"list-blog-date\"><i class=\"fa fa-calendar\"></i> {{ page.date|date('d') }} {{ page.date|date('M') }} '{{ page.date|date('y') }}</span>
\t\t{% endif %}

        {% if page.taxonomy.category %}
        <span class=\"tags\">
        \t<span class=\"list-blog-tag\"><i class=\"fa fa-folder-open\"></i></span>
            {% for cat in page.taxonomy.category %}
            <a href=\"/category{{ config.system.param_sep }}{{ cat }}\">{{ cat }}</a>
            {% endfor %}
        </span>
        {% endif %}
\t\t
        {% if page.taxonomy.tag %}
        <span class=\"tags\">
        \t<span class=\"list-blog-tag\"><i class=\"fa fa-tags\"></i></span>
            {% for tag in page.taxonomy.tag %}
            <a href=\"/tag{{ config.system.param_sep }}{{ tag }}\">{{ tag }}</a>
            {% endfor %}
        </span>
        {% endif %}
        
        {% if header_image %}
            {% if header_image_file %}
                {% set header_image_media = page.media.images[header_image_file] %}
            {% else %}
                {% set header_image_media = page.media.images|first %}
            {% endif %}
            {{ header_image_media.cropZoom(header_image_width, header_image_height).html }}
        {% endif %}

    </div>

    <div class=\"list-blog-padding\">

    {% if page.header.continue_link is sameas(false) %}
        <p>{{ page.content }}</p>
        {% if not truncate %}
        {% set show_prev_next = true %}
        {% endif %}
    {% elseif truncate and page.summary != page.content %}
        <p>{{ page.summary }}</p>
        <p><a href=\"{{ page.url }}\">Continue Reading...</a></p>
    {% elseif truncate %}
        {% if page.summary != page.content %}
            <p>{{ page.content|truncate(550) }}</p>
        {% else %}
            <p>{{ page.content }}</p>
        {% endif %}
        <p><a href=\"{{ page.url }}\">Continue Reading...</a></p>
    {% else %}
        <p>{{ page.content }}</p>
        {% set show_prev_next = true %}
    {% endif %}

    {% if show_prev_next %}

        <p class=\"prev-next\">
            {% if not page.isFirst %}
                <a class=\"button\" href=\"{{ page.nextSibling.url }}\"><i class=\"fa fa-chevron-left\"></i> Next Post</a>
            {% endif %}

            {% if not page.isLast %}
                <a class=\"button\" href=\"{{ page.prevSibling.url }}\">Previous Post <i class=\"fa fa-chevron-right\"></i></a>
            {% endif %}
        </p>
    {% endif %}


    </div>
</div>
", "partials/blog_item.html.twig", "/var/www/www/user/themes/afterburner2/templates/partials/blog_item.html.twig");
    }
}
