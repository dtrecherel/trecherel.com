<?php

/* partials/sidebar.html.twig */
class __TwigTemplate_d7df73dec14e18fbf4f5e1bb0828afa3d582e2f95a94cad13aec0ddb128f02ae extends Twig_Template
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
        $context["feed_url"] = (((($this->getAttribute(($context["blog"] ?? null), "url", array()) == "/") || ($this->getAttribute(($context["blog"] ?? null), "url", array()) == ($context["base_url_relative"] ?? null)))) ? (((($context["base_url_relative"] ?? null) . "/") . $this->getAttribute(($context["blog"] ?? null), "slug", array()))) : ($this->getAttribute(($context["blog"] ?? null), "url", array())));
        // line 2
        $context["new_base_url"] = ((($this->getAttribute(($context["blog"] ?? null), "url", array()) == "/")) ? ("") : ($this->getAttribute(($context["blog"] ?? null), "url", array())));
        // line 3
        echo "
";
        // line 4
        $this->loadTemplate("partials/aboutme.html.twig", "partials/sidebar.html.twig", 4)->display($context);
        // line 5
        echo "
";
        // line 6
        if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", array()), "simplesearch", array()), "enabled", array())) {
            // line 7
            echo "<div class=\"sidebar-content\">
    <h1>SimpleSearch</h1>
    ";
            // line 9
            $this->loadTemplate("partials/simplesearch_searchbox.html.twig", "partials/sidebar.html.twig", 9)->display($context);
            // line 10
            echo "</div>
<script src=\"/user/plugins/simplesearch/js/simplesearch.js\" type=\"text/javascript\" ></script>
";
        }
        // line 13
        echo "
";
        // line 14
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", array()), "relatedpages", array()), "enabled", array()) && (twig_length_filter($this->env, ($context["related_pages"] ?? null)) > 0))) {
            // line 15
            echo "    <h4>Related Posts</h4>
    ";
            // line 16
            $this->loadTemplate("partials/relatedpages.html.twig", "partials/sidebar.html.twig", 16)->display($context);
        }
        // line 18
        echo "
";
        // line 19
        if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", array()), "random", array()), "enabled", array())) {
            // line 20
            echo "<div class=\"sidebar-content\">
    <h4>Random Article</h4>
    <a class=\"button\" href=\"";
            // line 22
            echo ($context["base_url"] ?? null);
            echo "/random\"><i class=\"fa fa-retweet\"></i> I'm Feeling Lucky!</a>
</div>
";
        }
        // line 25
        echo "
";
        // line 26
        if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", array()), "taxonomylist", array()), "enabled", array())) {
            // line 27
            echo "

<div class=\"sidebar-content\">
    <h1>Categories</h1>
    ";
            // line 31
            $this->loadTemplate("partials/taxonomylist.html.twig", "partials/sidebar.html.twig", 31)->display(array_merge($context, array("base_url" => ($context["new_base_url"] ?? null), "taxonomy" => "category")));
            // line 32
            echo "</div>


<div class=\"sidebar-content\">
    <h1>Popular Tags</h1>
    ";
            // line 37
            $this->loadTemplate("partials/taxonomylist.html.twig", "partials/sidebar.html.twig", 37)->display(array_merge($context, array("base_url" => ($context["new_base_url"] ?? null), "taxonomy" => "tag")));
            // line 38
            echo "</div>
";
        }
        // line 40
        echo "
";
        // line 41
        if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", array()), "archives", array()), "enabled", array())) {
            // line 42
            echo "<div class=\"sidebar-content\">
    <h4>Archives</h4>
    ";
            // line 44
            $this->loadTemplate("partials/archives.html.twig", "partials/sidebar.html.twig", 44)->display(array_merge($context, array("base_url" => ($context["new_base_url"] ?? null))));
            // line 45
            echo "</div>
";
        }
        // line 47
        if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", array()), "feed", array()), "enabled", array())) {
            // line 48
            echo "<div class=\"sidebar-content syndicate\">
    <h4>Syndicate</h4>
    <a class=\"button\" href=\"";
            // line 50
            echo ($context["feed_url"] ?? null);
            echo ".atom\"><i class=\"fa fa-rss-square\"></i> Atom 1.0</a>
    <a class=\"button\" href=\"";
            // line 51
            echo ($context["feed_url"] ?? null);
            echo ".rss\"><i class=\"fa fa-rss-square\"></i> RSS</a>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/sidebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 51,  117 => 50,  113 => 48,  111 => 47,  107 => 45,  105 => 44,  101 => 42,  99 => 41,  96 => 40,  92 => 38,  90 => 37,  83 => 32,  81 => 31,  75 => 27,  73 => 26,  70 => 25,  64 => 22,  60 => 20,  58 => 19,  55 => 18,  52 => 16,  49 => 15,  47 => 14,  44 => 13,  39 => 10,  37 => 9,  33 => 7,  31 => 6,  28 => 5,  26 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% set feed_url = blog.url == '/' or blog.url == base_url_relative ? (base_url_relative~'/'~blog.slug) : blog.url %}
{% set new_base_url = blog.url == '/' ? '' : blog.url %}

{% include 'partials/aboutme.html.twig' %}

{% if config.plugins.simplesearch.enabled %}
<div class=\"sidebar-content\">
    <h1>SimpleSearch</h1>
    {% include 'partials/simplesearch_searchbox.html.twig' %}
</div>
<script src=\"/user/plugins/simplesearch/js/simplesearch.js\" type=\"text/javascript\" ></script>
{% endif %}

{% if config.plugins.relatedpages.enabled and related_pages|length > 0 %}
    <h4>Related Posts</h4>
    {% include 'partials/relatedpages.html.twig' %}
{% endif %}

{% if config.plugins.random.enabled %}
<div class=\"sidebar-content\">
    <h4>Random Article</h4>
    <a class=\"button\" href=\"{{ base_url }}/random\"><i class=\"fa fa-retweet\"></i> I'm Feeling Lucky!</a>
</div>
{% endif %}

{% if config.plugins.taxonomylist.enabled %}


<div class=\"sidebar-content\">
    <h1>Categories</h1>
    {% include 'partials/taxonomylist.html.twig' with {'base_url':new_base_url, 'taxonomy':'category'} %}
</div>


<div class=\"sidebar-content\">
    <h1>Popular Tags</h1>
    {% include 'partials/taxonomylist.html.twig' with {'base_url':new_base_url, 'taxonomy':'tag'} %}
</div>
{% endif %}

{% if config.plugins.archives.enabled %}
<div class=\"sidebar-content\">
    <h4>Archives</h4>
    {% include 'partials/archives.html.twig' with {'base_url':new_base_url} %}
</div>
{% endif %}
{% if config.plugins.feed.enabled %}
<div class=\"sidebar-content syndicate\">
    <h4>Syndicate</h4>
    <a class=\"button\" href=\"{{ feed_url }}.atom\"><i class=\"fa fa-rss-square\"></i> Atom 1.0</a>
    <a class=\"button\" href=\"{{ feed_url }}.rss\"><i class=\"fa fa-rss-square\"></i> RSS</a>
</div>
{% endif %}
", "partials/sidebar.html.twig", "/var/www/www/user/themes/afterburner2/templates/partials/sidebar.html.twig");
    }
}
