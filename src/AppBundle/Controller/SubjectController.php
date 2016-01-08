<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Subject;
use AppBundle\Form\SubjectType;

/**
 * Subject controller.
 *
 * @Route("/topic_subject")
 */
class SubjectController extends Controller
{

    /**
     * Lists all Subject entities.
     *
     * @Route("/", name="topic_subject")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $topic_id=$request->get('topic_id');
        $topic_id=intval($topic_id);

        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('AppBundle:Subject')->createQueryBuilder('p')->addOrderBy('p.istop','desc')->addOrderBy('p.created','desc')
                ->where('p.topicId ='.$topic_id)
                ->getQuery();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1));
        $img_entities=array();
        foreach($pagination as $item):
            $query = $em->getRepository('AppBundle:Image')->createQueryBuilder('img')
                ->where('img.id in('.$item->getPicids().')')
                ->getQuery();
                $img_entities[$item->getId()] = $query->getResult();
         endforeach;
         return array(
            'pagination' => $pagination,
            'img_entities'=>$img_entities,
            'topic_id'=>$topic_id  
        );
    }
    /**
     * Creates a new Subject entity.
     *
     * @Route("/", name="topic_subject_create")
     * @Method("POST")
     * @Template("AppBundle:Subject:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Subject();
        $entity->setCreated(time());
        $entity->setStatus(0);
         $entity->setIstop(0);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            if($form->get('saveAndContinue')->isClicked()){
                            return $this->redirect($this->generateUrl('topic_subject_new', array('topic_id' => $entity->getTopicId())));

            }else{
                            return $this->redirect($this->generateUrl('topic_subject_show', array('id' => $entity->getId())));

            }
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Subject entity.
     *
     * @param Subject $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Subject $entity)
    {
        $form = $this->createForm(new SubjectType(), $entity, array(
            'action' => $this->generateUrl('topic_subject_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Subject entity.
     *
     * @Route("/new", name="topic_subject_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $topic_id=intval($request->get('topic_id'));
        $entity = new Subject();
        $entity->setPicids(0);
        if($topic_id){
            $entity->setTopicId($topic_id);
        }
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Subject entity.
     *
     * @Route("/{id}", name="topic_subject_show",requirements = { "id" = "\d+" } )
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Subject')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subject entity.');
        }
        $img_entities=array();
        if($entity->getPicids()!='0'){
         $query = $em->getRepository('AppBundle:Image')->createQueryBuilder('p')
                ->where('p.id in('.$entity->getPicids().')')
                ->getQuery();
                $img_entities = $query->getResult();
            }
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'img_entities'=>$img_entities,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Subject entity.
     *
     * @Route("/{id}/edit", name="topic_subject_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Subject')->find($id);
        $img_entities=array();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subject entity.');
        }else{
            if($entity->getPicids()){
                $query = $em->getRepository('AppBundle:Image')->createQueryBuilder('p')
                ->where('p.id in('.$entity->getPicids().')')
                ->getQuery();
                $img_entities = $query->getResult();
            }
             
 
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
 
        return array(
            'entity'      => $entity,
            'img_entities'=>$img_entities,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Displays a form to edit an existing Subject entity.
     *
     * @Route("/op", name="topic_subject_op")
     * @Method("GET")
     */
    public function opAction(Request $request){
        $allow_op=array('top','untop','pub','unpub');
        $op=$request->get('op');
        $id=$request->get('id');
        if(!in_array($op,$allow_op)){
            throw $this->createNotFoundException('Unable to find allow operation.');

        }
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Subject')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable 1to find Subject entity.');
        }else{
            switch($op){
                case 'top':
                    $entity->setIstop(1);
                break;
                case 'untop':
                    $entity->setIstop(0);
                break;
                case 'pub':
                    $entity->setStatus(1);
                break;
                case 'unpub':
                    $entity->setStatus(0);
                break;
            }
                $em->flush();
        }
        return $this->redirect($this->generateUrl('topic_subject', array('topic_id' => $entity->getTopicId())));


    }

    /**
    * Creates a form to edit a Subject entity.
    *
    * @param Subject $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Subject $entity)
    {
        $form = $this->createForm(new SubjectType(), $entity, array(
            'action' => $this->generateUrl('topic_subject_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Subject entity.
     *
     * @Route("/{id}", name="topic_subject_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Subject')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subject entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('topic_subject', array('topic_id' => $entity->getTopicid())));
        }else{
            return $this->redirect($this->generateUrl('topic_subject_edit', array('id' => $id)));

        }
/*
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );*/
    }
    /**
     * Deletes a Subject entity.
     *
     * @Route("/{id}", name="topic_subject_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Subject')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Subject entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('topic_subject'));
    }

    /**
     * Creates a form to delete a Subject entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('topic_subject_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
