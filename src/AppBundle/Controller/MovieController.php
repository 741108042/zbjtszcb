<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Movie;
use AppBundle\Form\MovieType;

/**
 * Movie controller.
 *
 * @Route("/m")
 */
class MovieController extends Controller
{

    /**
     * Lists all Movie entities.
     *
     * @Route("/", name="m")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('AppBundle:Movie')->findBy(array('nodeId'=>22));
        /*$qb = $em->getRepository('AppBundle:Movie')->createQueryBuilder('m');
        $qb->setFirstResult( 100 );
        $qb->setMaxResults( 20 );
        $query = $qb->getQuery();
        $entities=$query->getResult();
        return array(
            'entities' => $entities,
        );*/
         $em = $this->getDoctrine()->getManager();
 
        $qb = $em->getRepository('AppBundle:Movie')->createQueryBuilder('n');
     
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($qb, $request->query->getInt('page', 1));
        return array(
            //'entities' => $entities,
            'pagination' => $pagination
        ); 
    }
    /**
     * Creates a new Movie entity.
     *
     * @Route("/", name="m_create")
     * @Method("POST")
     * @Template("AppBundle:Movie:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Movie();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('m_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Movie entity.
     *
     * @param Movie $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Movie $entity)
    {
        $form = $this->createForm(new MovieType(), $entity, array(
            'action' => $this->generateUrl('m_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Movie entity.
     *
     * @Route("/new", name="m_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Movie();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Movie entity.
     *
     * @Route("/{id}", name="m_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Movie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Movie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Movie entity.
     *
     * @Route("/{id}/edit", name="m_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Movie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Movie entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Movie entity.
    *
    * @param Movie $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Movie $entity)
    {
        $form = $this->createForm(new MovieType(), $entity, array(
            'action' => $this->generateUrl('m_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Movie entity.
     *
     * @Route("/{id}", name="m_update")
     * @Method("PUT")
     * @Template("AppBundle:Movie:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Movie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Movie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('m_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Movie entity.
     *
     * @Route("/{id}", name="m_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Movie')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Movie entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('m'));
    }

    /**
     * Creates a form to delete a Movie entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('m_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
