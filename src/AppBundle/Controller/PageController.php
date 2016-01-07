<?php

namespace AppBundle\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Page;
use AppBundle\Form\PageType;

/**
 * Page controller.
 *
 * @Route("/page")
 */
class PageController extends Controller
{

    /**
     * Lists all Page entities.
     *
     * @Route("/", name="page")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Page')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Page entity.
     *
     * @Route("/", name="page_create")
     * @Method("POST")
     * @Template("AppBundle:Page:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Page();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('page_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Page entity.
     *
     * @param Page $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Page $entity)
    {
        $form = $this->createForm(new PageType(), $entity, array(
            'action' => $this->generateUrl('page_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Page entity.
     *
     * @Route("/new", name="page_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Page();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Page entity.
     *
     * @Route("/list", name="page_list")
     * @Method("GET")
     */
    public function listAction(Request $request)
    {
        $projectid=$request->get('projectid');
        $pageid=$request->get('pageid');
        $em = $this->getDoctrine()->getManager();
        $project=$em->getRepository('AppBundle:Project')->findOneBy(array('id'=>$projectid));
         $entity = $em->getRepository('AppBundle:Page')->findBy(array('projectId'=>$projectid));
        if($pageid){
            $page=$em->getRepository('AppBundle:Page')->findOneBy(array('id'=>$pageid));

        }else{
            $page=null;
        }
         return $this->render('AppBundle:Page:list.html.twig', array(
            'page'=>$page,
            'project'=>$project,
            'pages'      => $entity        ));
 
    }
    /**
     * Finds and displays a Page entity.
     *
     * @Route("/addpage", name="project_addpage")
     * @Method("POST")
     */
    public function addpageAction(Request $request){
        $result=array('success'=>false,'pageid'=>0);
                $projectid=$request->get('projectid');
        $entity = new Page();
        $entity->setProjectId($projectid);
        $entity->setStatus(1);
        $entity->setSortid(1);
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();
        $result['pageid']=$entity->getId();
        if($result['pageid']){
            $result['success']=true;
        }
         return new Response(json_encode($result),Response::HTTP_OK,array('Content-type'=>'application/json'));
    }
    /**
     * Finds and displays a Page entity.
     *
     * @Route("/{id}", name="page_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Page')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Page entity.
     *
     * @Route("/{id}/edit", name="page_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Page')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
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
    * Creates a form to edit a Page entity.
    *
    * @param Page $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Page $entity)
    {
        $form = $this->createForm(new PageType(), $entity, array(
            'action' => $this->generateUrl('page_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Page entity.
     *
     * @Route("/{id}", name="page_update")
     * @Method("PUT")
     * @Template("AppBundle:Page:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Page')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('page_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
     /**
     * Deletes a Page entity.
     *
     * @Route("/remove/{id}", name="page_remove")
      */
    public function removeAction(Request $request, $id)
    {
  
             $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Page')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Page entity.');
            }

            $em->remove($entity);
            $em->flush();
 
        return $this->redirect($this->generateUrl('page_list',array('projectid'=>1)));
    }
    /**
     * Deletes a Page entity.
     *
     * @Route("/{id}", name="page_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Page')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Page entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('page'));
    }
/**
     * Deletes a Page entity.
     *
     * @Route("/build", name="page_build")
      */
    public function buildAction(Request $request){
        
    }
    /**
     * Creates a form to delete a Page entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('page_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
