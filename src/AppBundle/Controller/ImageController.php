<?php

namespace AppBundle\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Image;
use AppBundle\Form\ImageType;

/**
 * Image controller.
 *
 * @Route("/image")
 */
class ImageController extends Controller
{

    /**
     * Lists all Image entities.
     *
     * @Route("/", name="image")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Image')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Image entity.
     *
     * @Route("/", name="image_create")
     * @Method("POST")
     * @Template("AppBundle:Image:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Image();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('image_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Creates a new Image entity.
     *
     * @Route("/upload", name="image_upload")
     * @Method("POST")
      */
    public function uploadAction(Request $request)
    {
        $result=array('id'=>0,'url'=>'');
        $thumbnail=$request->get('thumbnail');
         $file= $request->files->get('file');
        $ext=$file->guessExtension();
        $title=$file->getClientOriginalName();
        $size=$file->getClientSize();
        $filename=md5($title.$size.time()).".".$file->guessExtension();
        $filename_thumbnail=md5($title.$size.time())."_small.".$file->guessExtension();
        
        $target=$this->getUploadRootDir();
        $target_url=$this->getUploadDir();

        $file->move($target,$filename);
        if($thumbnail){
            $twidth=intval($thumbnail['width']);
            $theight=intval($thumbnail['height']);
            try{
                $image = new \Imagick($target."/".$filename);  
                $image->thumbnailImage($twidth,$theight); 
                $image->writeImage($target."/".$filename_thumbnail);
            }catch(Exception $e){

            }
        }
        $fileinfo=getimagesize($target."/".$filename);

        $width=$fileinfo[0];
        $height=$fileinfo[1];
        $entity = new Image();
        $entity->setImage($target_url."/".$filename);
        $entity->setType($ext);
        $entity->setTitle($title);
        $entity->setWidth($width);
        $entity->setHeight($height);

        $entity->setSize($size);
        $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $result['id']=$entity->getId();

        $result['url']=$target_url."/".$filename;
        return new Response($result['id'],Response::HTTP_OK,array('Content-type'=>'application/text'));
    }
    /**
     * Deletes a Image entity.
     *
     * @Route("/remove", name="image_remove")
     * @Method("post")
     */
    public function removeAction(Request $request){
            $id=$request->get('id');
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Image')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Image entity.');
            }

            $em->remove($entity);
            $em->flush();
                    return new Response('ok',Response::HTTP_OK,array('Content-type'=>'application/text'));

    }
    /**
     * Creates a form to create a Image entity.
     *
     * @param Image $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Image $entity)
    {
        $form = $this->createForm(new ImageType(), $entity, array(
            'action' => $this->generateUrl('image_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Image entity.
     *
     * @Route("/new", name="image_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Image')->findAll();
 
       /* $entity = new Image();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );*/
        return $this->render('AppBundle:image:multinew.html.twig',array('entities'=>$entities));

    }

    /**
     * Finds and displays a Image entity.
     *
     * @Route("/{id}", name="image_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Image')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Image entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Image entity.
     *
     * @Route("/{id}/edit", name="image_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Image')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Image entity.');
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
    * Creates a form to edit a Image entity.
    *
    * @param Image $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Image $entity)
    {
        $form = $this->createForm(new ImageType(), $entity, array(
            'action' => $this->generateUrl('image_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Image entity.
     *
     * @Route("/{id}", name="image_update")
     * @Method("PUT")
     * @Template("AppBundle:Image:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Image')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Image entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('image_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Image entity.
     *
     * @Route("/{id}", name="image_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Image')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Image entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('image'));
    }

    /**
     * Creates a form to delete a Image entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('image_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    /**
    *  getrootDir
    */
    private function getRootDir(){
        return __DIR__.'/../../../web';
    }
    private function getUploadRootDir()
    {
        $uploaddir=$this->getRootDir().$this->getUploadDir();
        if(!file_exists($uploaddir)){
            @mkdir($uploaddir,0777,true);
        }
        // the absolute directory path where uploaded
        // documents should be saved
        return $this->getRootDir().$this->getUploadDir();
    }
    private function getUploadDir()
    { 
        $now=time();
        $subfold=date("Y",$now)."/".date("Ymd",$now);
        return '/upload/images/'.$subfold;
    }
}
