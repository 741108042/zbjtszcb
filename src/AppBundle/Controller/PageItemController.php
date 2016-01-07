<?php

namespace AppBundle\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\PageItem;
use AppBundle\Form\PageItemType;

/**
 * PageItem controller.
 *
 * @Route("/item")
 */
class PageItemController extends Controller
{

    /**
     * Lists all PageItem entities.
     *
     * @Route("/", name="item")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:PageItem')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new PageItem entity.
     *
     * @Route("/", name="item_create")
     * @Method("POST")
     * @Template("AppBundle:PageItem:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new PageItem();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('item_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a PageItem entity.
     *
     * @param PageItem $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PageItem $entity)
    {
        $form = $this->createForm(new PageItemType(), $entity, array(
            'action' => $this->generateUrl('item_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PageItem entity.
     *
     * @Route("/new", name="item_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PageItem();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a PageItem entity.
     *
     * @Route("/{id}", name="item_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:PageItem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PageItem entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PageItem entity.
     *
     * @Route("/{id}/edit", name="item_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:PageItem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PageItem entity.');
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
    * Creates a form to edit a PageItem entity.
    *
    * @param PageItem $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PageItem $entity)
    {
        $form = $this->createForm(new PageItemType(), $entity, array(
            'action' => $this->generateUrl('item_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PageItem entity.
     *
     * @Route("/{id}", name="item_update")
     * @Method("PUT")
     * @Template("AppBundle:PageItem:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:PageItem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PageItem entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('item_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a PageItem entity.
     *
     * @Route("/add", name="item_add")
     * @Method("POST")
    */
    public function addAction(Request $request){
        $pageid=intval($request->get('pageid'));
        $content=strip_tags($request->get('content'));
        $ani=strip_tags($request->get('ani'));
        $data=array('content'=>$content,'ani'=>$ani);
        $pageitem=new PageItem();
        $pageitem->setPageid($pageid);
        $pageitem->setContent(json_encode($data));
        $em = $this->getDoctrine()->getManager();
        $em->persist($pageitem);
        $em->flush();
                 return new Response(json_encode($data),Response::HTTP_OK,array('Content-type'=>'application/json'));



    }
    /**
     * Deletes a PageItem entity.
     *
     * @Route("/{id}", name="item_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:PageItem')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PageItem entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('item'));
    }

    /**
     * Creates a form to delete a PageItem entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('item_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
