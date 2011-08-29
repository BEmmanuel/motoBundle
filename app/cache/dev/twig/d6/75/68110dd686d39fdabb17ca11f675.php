<?php

/* ApplicationMotoBundle:Vehicule:show.html.twig */
class __TwigTemplate_d67568110dd686d39fdabb17ca11f675 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<h1>Vehicule</h1>

<table class=\"record_properties\">
    <tbody>
        <tr>
            <th>Id</th>                <td>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false), "html");
        echo "</td>        </tr>
        <tr>
            <th>Nom_proprietaire</th>                <td>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "nomproprietaire", array(), "any", false), "html");
        echo "</td>        </tr>
        <tr>
            <th>Prenom_proprietaire</th>                <td>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "prenomproprietaire", array(), "any", false), "html");
        echo "</td>        </tr>
        <tr>
            <th>Nom_vehicule</th>                <td>";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "nomvehicule", array(), "any", false), "html");
        echo "</td>        </tr>
\t\t<tr>
            <th>Cat&eacute;gorie</th>                <td>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "categorie", array(), "any", false), "html");
        echo "</td>        </tr>
\t\t <tr>
            <th>Pieces</th> </tr>
\t\t
\t                    ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, 'entity'), "piece", array(), "any", false));
        foreach ($context['_seq'] as $context['_key'] => $context['piece']) {
            // line 19
            echo "\t\t\t<tr><td>";
            echo twig_escape_filter($this->env, $this->getContext($context, 'piece'), "html");
            echo "</td></tr> 
\t 
\t                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['piece'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 22
        echo "\t                </tr>
    </tbody>
</table>

<ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("vehicule"), "html");
        echo "\">
            Back to the list
        </a>
    </li>
    <li>
        <a href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("vehicule_edit", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
        echo "\">
            Edit
        </a>
    </li>
    <li>
        <form action=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("vehicule_delete", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
        echo "\" method=\"post\">
            ";
        // line 39
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, 'delete_form'));
        echo "
            <button type=\"submit\">Delete</button>
        </form>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "ApplicationMotoBundle:Vehicule:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
