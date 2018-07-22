<?php

/* modules/custom/indexcol/templates/slider.html.twig */
class __TwigTemplate_707607d1277d5ac40bd4fcb2ae076665d95d60e323b836a4099fe8ab07d822fe extends Twig_Template
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
        $tags = array("for" => 5, "if" => 13);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('for', 'if'),
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
        echo "
<div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\">
  <!-- Indicators -->
  <ol class=\"carousel-indicators\">
    ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["photos"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["photo"]) {
            // line 6
            echo "      <li data-target=\"#myCarousel\" data-slide-to=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $context["key"], "html", null, true));
            echo "\" class=\"active\"></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['photo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "  </ol>

  <!-- Wrapper for slides -->
  <div class=\"carousel-inner\">
    ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["photos"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["photo"]) {
            // line 13
            echo "      <div class=\"item ";
            if (($context["key"] == 0)) {
                echo "active";
            }
            echo " \">
        <img src=\"";
            // line 14
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["photo"], "url", array()), "html", null, true));
            echo "\" width=\"100%\" height=\"400\" alt=\"photo_";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $context["key"], "html", null, true));
            echo "\">
        <div class=\"carousel-caption\">
          <h3 style=\"bottom: 120px; position: absolute;\">";
            // line 16
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["photo"], "title", array()), "html", null, true));
            echo "</h3>
        </div>
      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['photo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "  </div>


  <!-- Left and right controls -->
  <a class=\"left carousel-control\" href=\"#myCarousel\" data-slide=\"prev\">
    <span class=\"glyphicon glyphicon-chevron-left\"></span>
    <span class=\"sr-only\">Previous</span>
  </a>
  <a class=\"right carousel-control\" href=\"#myCarousel\" data-slide=\"next\">
    <span class=\"glyphicon glyphicon-chevron-right\"></span>
    <span class=\"sr-only\">Next</span>
  </a>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/indexcol/templates/slider.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 20,  86 => 16,  79 => 14,  72 => 13,  68 => 12,  62 => 8,  53 => 6,  49 => 5,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/custom/indexcol/templates/slider.html.twig", "/home/ariel/projects/web/bitsamericas/drupal/modules/custom/indexcol/templates/slider.html.twig");
    }
}
