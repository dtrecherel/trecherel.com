<?php

/* partials/aboutme.html.twig */
class __TwigTemplate_8fad1938a9d3aaa1f3c7d6f770b7897d3b5c719400c5070273395044343c843e extends Twig_Template
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
        echo "<div id=\"about-me\" class=\"sidebar-content\">
\t<h1>About me</h1>
\t<div>
\t\t";
        // line 4
        $context["src"] = ($context["aboutme_picture_src"] ?? null);
        // line 5
        echo "\t\t";
        if ( !$this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", array()), "aboutme", array()), "gravatar", array()), "enabled", array())) {
            // line 6
            echo "\t\t\t";
            $context["src"] = (($this->getAttribute(($context["uri"] ?? null), "rootUrl", array(0 => false), "method") . ((($this->getAttribute(($context["uri"] ?? null), "rootUrl", array(0 => false), "method") == "/")) ? ("") : ("/"))) . ($context["aboutme_picture_src"] ?? null));
            // line 7
            echo "\t\t";
        }
        // line 8
        echo "\t\t<img src=\"";
        echo ($context["src"] ?? null);
        echo "\" title=\"";
        echo ($context["aboutme_name"] ?? null);
        echo "\" alt=\"My pretty face :3\" id=\"avatar\" class=\"u-photo\" />

\t\t<h2>";
        // line 10
        echo ($context["aboutme_name"] ?? null);
        echo "</h2>

                <div class=\"social-pages\">
                ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["aboutme_pages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 14
            echo "                        ";
            if (twig_length_filter($this->env, $this->getAttribute($context["page"], "url", array()))) {
                // line 15
                echo "                                <a href=\"";
                echo $this->getAttribute($context["page"], "url", array());
                echo "\" ";
                echo (($this->getAttribute($context["page"], "title", array())) ? ((("title=\"" . $this->getAttribute($context["page"], "title", array())) . "\"")) : (""));
                echo " target=\"_blank\" rel=\"me\" class=\"sn\"><i class=\"fa fa-2x fa-";
                echo $this->getAttribute($context["page"], "icon", array());
                echo "\"></i></a>
                        ";
            }
            // line 17
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "                </div>
\t\t<span style=\"clear:both;\"></span>
\t\t<div class=\"description\">
\t\t\t<p class=\"p-note\">";
        // line 21
        echo $this->env->getExtension('Grav\Common\Twig\TwigExtension')->markdownFilter(nl2br(twig_escape_filter($this->env, ($context["aboutme_description"] ?? null), "html", null, true)));
        echo "</p>
\t\t\t<p>Check the <a href=\"https://www.trecherel.com/about\">About</a> page to know more!</p>
\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "partials/aboutme.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 21,  72 => 18,  66 => 17,  56 => 15,  53 => 14,  49 => 13,  43 => 10,  35 => 8,  32 => 7,  29 => 6,  26 => 5,  24 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"about-me\" class=\"sidebar-content\">
\t<h1>About me</h1>
\t<div>
\t\t{% set src = aboutme_picture_src %}
\t\t{% if not config.plugins.aboutme.gravatar.enabled %}
\t\t\t{% set src = uri.rootUrl(false) ~ (uri.rootUrl(false) == '/' ? '' : '/') ~ aboutme_picture_src %}
\t\t{% endif %}
\t\t<img src=\"{{ src }}\" title=\"{{ aboutme_name }}\" alt=\"My pretty face :3\" id=\"avatar\" class=\"u-photo\" />

\t\t<h2>{{ aboutme_name }}</h2>

                <div class=\"social-pages\">
                {% for page in aboutme_pages %}
                        {% if page.url|length %}
                                <a href=\"{{ page.url }}\" {{ page.title ? 'title=\"' ~ page.title ~ '\"' }} target=\"_blank\" rel=\"me\" class=\"sn\"><i class=\"fa fa-2x fa-{{ page.icon }}\"></i></a>
                        {% endif %}
                {% endfor %}
                </div>
\t\t<span style=\"clear:both;\"></span>
\t\t<div class=\"description\">
\t\t\t<p class=\"p-note\">{{ aboutme_description|nl2br|markdown|raw }}</p>
\t\t\t<p>Check the <a href=\"https://www.trecherel.com/about\">About</a> page to know more!</p>
\t\t</div>
\t</div>
</div>
", "partials/aboutme.html.twig", "/var/www/www/user/plugins/aboutme/templates/partials/aboutme.html.twig");
    }
}
