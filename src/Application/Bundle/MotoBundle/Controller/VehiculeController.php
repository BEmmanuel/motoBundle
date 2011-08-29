<?php

namespace Application\Bundle\MotoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Application\Bundle\MotoBundle\Entity\Vehicule;
use Application\Bundle\MotoBundle\Form\VehiculeType;

/**
 * Vehicule controller.
 *
 * @Route("/vehicule")
 */
class VehiculeController extends Controller
{
    /**
     * Lists all Vehicule entities.
     *
     * @Route("/", name="vehicule")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ApplicationMotoBundle:Vehicule')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Vehicule entity.
     *
     * @Route("/{id}/show", name="vehicule_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ApplicationMotoBundle:Vehicule')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehicule entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Vehicule entity.
     *
     * @Route("/new", name="vehicule_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Vehicule();
        $form   = $this->createForm(new VehiculeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Vehicule entity.
     *
     * @Route("/create", name="vehicule_create")
     * @Method("post")
     * @Template("ApplicationMotoBundle:Vehicule:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Vehicule();
        $request = $this->getRequest();
        $form    = $this->createForm(new VehiculeType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('vehicule_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Vehicule entity.
     *
     * @Route("/{id}/edit", name="vehicule_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ApplicationMotoBundle:Vehicule')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehicule entity.');
        }

        $editForm = $this->createForm(new VehiculeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Vehicule entity.
     *
     * @Route("/{id}/update", name="vehicule_update")
     * @Method("post")
     * @Template("ApplicationMotoBundle:Vehicule:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ApplicationMotoBundle:Vehicule')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehicule entity.');
        }

        $editForm   = $this->createForm(new VehiculeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('vehicule_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Vehicule entity.
     *
     * @Route("/{id}/delete", name="vehicule_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ApplicationMotoBundle:Vehicule')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Vehicule entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('vehicule'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
   
}
