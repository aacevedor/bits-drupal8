<?php

/* modules/bitsamericas/templates/artist.html.twig */
class __TwigTemplate_fe0ab0510e250445c2e3d21ae09dfc1ea4641ee285ad838fced2c5a038418516 extends Twig_Template
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
        $tags = array("for" => 33);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('for'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "<div class=\"container-fluid\">
  <div class=\"jumbotron text-center\">
    <h1>";
        // line 3
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["artist"] ?? null), "name", array()), "html", null, true));
        echo "</h1>
  </div>
  <div class=\"container\">

      <div class=\"row\">
        <div class=\"col-md-12\">
          <div class=\"row\">
            <div class=\"col-md-4\">
              <img src='";
        // line 11
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["artist"] ?? null), "images", array()), 1, array(), "array"), "url", array()), "html", null, true));
        echo "' alt=\"...\" class=\"img-thumbnail\">
            </div>
            <div class=\"col-md-8\">
              <span>Followers: ";
        // line 14
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["artist"] ?? null), "followers", array()), "total", array()), "html", null, true));
        echo "</span>
              <br>
              <span>Musical Genres</span>
              <ul>
                <li *ngFor=\"let gen of artist.genres\"> ";
        // line 18
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["gen"] ?? null), "html", null, true));
        echo " </li>
              </ul>
              <a href=\"";
        // line 20
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["artist"] ?? null), "external_urls", array()), "spotify", array()), "html", null, true));
        echo "\">Ver en Spotify</a>
            </div>
          </div>
        </div>
        <table class=\"table table-hover table-dark\">
          <thead>
            <tr>
              <th scope=\"col\">Photography</th>
              <th scope=\"col\">Album</th>
              <th scope=\"col\">Name</th>
            </tr>
          </thead>
          <tbody>
            ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tracks"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["track"]) {
            // line 34
            echo "            <tr>
              <td> <img src='";
            // line 35
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["track"], "album", array()), "images", array()), 1, array(), "array"), "url", array()), "html", null, true));
            echo "' width=\"100\" alt=\"...\" class=\"img-thumbnail\"> </td>
              <td>";
            // line 36
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["track"], "album", array()), "name", array()), "html", null, true));
            echo "</td>
              <td>";
            // line 37
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["track"], "name", array()), "html", null, true));
            echo "</td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['track'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "          </tbody>
        </table>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/bitsamericas/templates/artist.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 40,  107 => 37,  103 => 36,  99 => 35,  96 => 34,  92 => 33,  76 => 20,  71 => 18,  64 => 14,  58 => 11,  47 => 3,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/bitsamericas/templates/artist.html.twig", "/home/ariel/projects/web/bitsamericas/drupal/modules/bitsamericas/templates/artist.html.twig");
    }
}
