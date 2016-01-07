<?php

namespace AppBundle\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Topic;
use AppBundle\Form\TopicType;

/**
 * Topic controller.
 *
 * @Route("/topic")
 */
class TopicController extends Controller
{

    /**
     * Lists all Topic entities.
     *
     * @Route("/", name="topic")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Topic')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Topic entity.
     *
     * @Route("/", name="topic_create")
     * @Method("POST")
     * @Template("AppBundle:Topic:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Topic();
        $entity->setCreated(time());
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('topic_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Topic entity.
     *
     * @param Topic $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Topic $entity)
    {
        $form = $this->createForm(new TopicType(), $entity, array(
            'action' => $this->generateUrl('topic_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Topic entity.
     *
     * @Route("/new", name="topic_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Topic();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Topic entity.
     *
     * @Route("/{id}", name="topic_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Topic')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Topic entity.');
        }
         $query = $em->getRepository('AppBundle:Subject')->createQueryBuilder('p')
                ->where('p.topicId ='.$id)
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
         $deleteForm = $this->createDeleteForm($id);

        return array(
            'pagination' => $pagination,
            'entity'      => $entity,
            'img_entities'=>$img_entities,
            'delete_form' => $deleteForm->createView(),
        );
    }
     /**
     * Finds and displays a Topic entity.
     *
     * @Route("/slide/{id}", name="topic_show_slide")
     * @Method("GET")
     * @Template()
     */
    public function slideshowAction(Request $request,$id)
    {
        $id=intval($request->get('id'));
        $result=array('type'=>0,'page'=>1,'data'=>array());
        $size=10;
        $page=intval($request->get('page'));
        if($page==0){$page=1;}
        $start=($page-1)*$size;
        $em = $this->getDoctrine()->getManager();

        $result['page']=1;
        $entities=$em->getRepository('AppBundle:Subject')->findBy(array('topicId'=>$id),array('istop'=>'desc','created'=>'desc'),$size,$start);
        foreach($entities as $item):
            $pics=array();
            $query = $em->getRepository('AppBundle:Image')->createQueryBuilder('p')
                ->where('p.id in('.$item->getPicids().')')
                ->getQuery();
            $img_entities = $query->getResult();
            foreach($img_entities as $img):
                    $pics[]=array('src'=>$img->getImage(),'size'=>$img->getWidth().'x'.$img->getHeight());;
                break;
            endforeach;
             $result['data'][]=array('id'=>$item->getId(),'title'=>$item->getTitle(),
                'content'=>$item->getIntro(),'isTop'=>$item->getIsTop(),'addtime'=>date("Y-m-d H:i:s",$item->getCreated()),'editor'=>'','pics'=>$pics);
 
        endforeach;
        return array('entity'=>$result['data']);
    }
    /**
     * Finds and displays a Topic entity.
     *
     * @Route("/view/{id}", name="topic_view")
     * @Method("GET")
      */
    public function viewAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Topic')->find($id);
                return $this->render('AppBundle:Topic:view.html.twig',array('entity'=> $entity));

     }/**
     * Finds and displays a Topic entity.
     *
     * @Route("/ajax", name="topic_ajax_show")
     * @Method("POST")
     * @Template()
     */
    public function ajaxshowAction(Request $request)
    {
        $id=intval($request->get('id'));
        $result=array('type'=>0,'page'=>1,'data'=>array());
        $size=10;
        $page=intval($request->get('page'));
        if($page==0){$page=1;}
        $start=($page-1)*$size;
        $em = $this->getDoctrine()->getManager();

        $result['page']=1;
        $entities=$em->getRepository('AppBundle:Subject')->findBy(array('topicId'=>$id),array('istop'=>'desc','created'=>'desc'),$size,$start);
        foreach($entities as $item):
            $pics=array();
            $query = $em->getRepository('AppBundle:Image')->createQueryBuilder('p')
                ->where('p.id in('.$item->getPicids().')')
                ->getQuery();
            $img_entities = $query->getResult();
            foreach($img_entities as $img):
                    $pics[]=array('src'=>$img->getImage(),'size'=>$img->getWidth().'x'.$img->getHeight());;
            endforeach;
             $result['data'][]=array('id'=>$item->getId(),'title'=>$item->getTitle(),
                'content'=>$item->getIntro(),'isTop'=>$item->getIsTop(),'addtime'=>date("Y-m-d H:i:s",$item->getCreated()),'editor'=>'','pics'=>$pics);
 
        endforeach;
                 return new Response(json_encode($result),Response::HTTP_OK,array('Content-type'=>'application/json'));

    }
    /**
     * Displays a form to edit an existing Topic entity.
     *
     * @Route("/{id}/edit", name="topic_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Topic')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Topic entity.');
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
    * Creates a form to edit a Topic entity.
    *
    * @param Topic $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Topic $entity)
    {
        $form = $this->createForm(new TopicType(), $entity, array(
            'action' => $this->generateUrl('topic_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Topic entity.
     *
     * @Route("/{id}", name="topic_update")
     * @Method("PUT")
     * @Template("AppBundle:Topic:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Topic')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Topic entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('topic_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Topic entity.
     *
     * @Route("/{id}", name="topic_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Topic')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Topic entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('topic'));
    }

    /**
     * Creates a form to delete a Topic entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('topic_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
