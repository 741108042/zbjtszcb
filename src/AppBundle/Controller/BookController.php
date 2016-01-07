<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\ORM\Tools\Pagination\Paginator;
use AppBundle\Entity\Book;
use AppBundle\Form\BookType;
use AppBundle\Entity\Category;

/**
 * Book controller.
 *
 * @Route("/book")
 */
class BookController extends Controller
{
    /**
     * Lists all Book entities.
     *
     * @Route("/load", name="book_load")
     */
public function loadAction(){
            $em = $this->getDoctrine()->getManager();
    $url='http://prerelease.iyd.cn/mobile/dataH5/zhebaoxw/022400029';
    $data=file_get_contents($url);
    $items=json_decode($data,true);
    foreach($items['books'] as $item):
        $bookid=$item['bookId'];
        $sortid=$item['serialNum'];
        $sortname=$item['sortName'];
        $title=$item['bookName'];
        $intro=$item['summary'];
        $cover=$item['picUrl'];
        $author=$item['author'];
        $link=$item['h5DetailAddress'];

            $cate = $em->getRepository('AppBundle:Category')->findOneBy(array('category'=>$sortname));
            if(!$cate){
                $cate=new Category();
                $cate->setCategory($sortname);
                $cate->setStatus(1);
                $cate->setSortid(2);

                $em->persist($cate);
                $em->flush();
                $categoryid=$cate->getId();
            }else{
                $categoryid=$cate->getId();
            }
         $entity = $em->getRepository('AppBundle:Book')->findOneBy(array('bookid'=>$bookid));
        if(!$entity){
            $entity=new Book();
            if($categoryid){
                                $entity->setBookid($bookid);

                $entity->setCategoryid($categoryid);
                 $entity->setTitle($title);
                $entity->setAuthor($author);
                $entity->setCover($cover);
                $entity->setLink($link);
                $entity->setSortid($sortid);
                $entity->setIntro($intro);
                $em->persist($entity);
                $em->flush();
            }
         }
    endforeach;
    return new Response("本地导入图书",Response::HTTP_OK,array('Content-type'=>'application/text'));


}
    /**
     * Lists all Book entities.
     *
     * @Route("/", name="book")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $categoryid=$request->get('categoryid');
        $status=$request->get('status');
        $em = $this->getDoctrine()->getManager();

      //  $entities = $em->getRepository('AppBundle:Book')->findAll();

        $qb = $em->getRepository('AppBundle:Book')->createQueryBuilder('n')->addOrderBy('n.id', 'desc');//->addOrderBy('n.created','desc');
        if($categoryid){
            $qb->where('n.categoryid='.$categoryid);
        }
        if($status){
            $qb->where('n.status='.$status);

        }
     
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($qb, $request->query->getInt('page', 1));
        
        $cate=$em->getRepository('AppBundle:Category')->findAll();
        return array(
            'pagination' => $pagination,
            'category'=>$cate,
            'categoryid'=>$categoryid,
            'status'=>$status
        );
    }
     /**
     * Lists all Book entities.
     *
     * @Route("/list", name="book_list")
     * @Method("GET")
     * @Template()
     */
    public function listAction(Request $request)
    {
        $categoryid=$request->get('categoryid');
        $status=2;//$request->get('status');
        $em = $this->getDoctrine()->getManager();

 
        $qb = $em->getRepository('AppBundle:Book')->createQueryBuilder('n')->addOrderBy('n.sortid', 'asc')->addOrderBy('n.created','desc');
        if($categoryid){
            $qb->where('n.categoryid='.$categoryid);
        }
             $qb->where('n.status='.$status);
             $qb->where('n.rel=1');

      
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($qb, $request->query->getInt('page', 1));
        $qbc = $em->getRepository('AppBundle:Category')->createQueryBuilder('n')->addOrderBy('n.sortid', 'asc')->where('n.status=1')->getQuery();

        $cate=$qbc->getResult();
        return array(
            'pagination' => $pagination,
            'category'=>$cate,
            'categoryid'=>$categoryid,
            'status'=>$status
        );
    }
    /**
     * Lists all Book entities.
     *
     * @Route("/listmore", name="book_listmore")
     * @Method("GET")
      */
    public function listmoreAction(Request $request)
    {
        $categoryid=$request->get('categoryid');
        $rel=intval($request->get('rel'));
        $status=2;//$request->get('status');
        $em = $this->getDoctrine()->getManager();
        //$category = $em->getRepository('AppBundle:Category')->find($categoryid);

 
        $qb = $em->getRepository('AppBundle:Book')->createQueryBuilder('n')->addOrderBy('n.sortid', 'asc')->addOrderBy('n.created','desc');
              
                    $qb->where('n.rel=1');
 
             $qb->where('n.status='.$status);

         $qb->setFirstResult(0)->setMaxResults(10); 
        $paginator  = new Paginator($qb,true);
         return $this->render('AppBundle:Book:listmore.html.twig',array(
            'pagination' => $paginator        ));

     }
     /**
     * Lists all Book entities.
     *
     * @Route("/listjson", name="book_listjson")
     * @Method("GET")
     * @Template()
     */
    public function listjsonAction(Request $request)
    {
        $result=array('count'=>0,'data'=>array());
        $size=10;
        $page=intval($request->get('page'));
        if($page==0){$page=1;}
        $start=($page-1)*$size;
        $categoryid=$request->get('categoryid');
         $rel=$request->get('rel');

         $em = $this->getDoctrine()->getManager();
         if($rel){
        $entities=$em->getRepository('AppBundle:Book')->findBy(array('rel'=>1,'status'=>2),array('created'=>'desc'),$size,$start);

         }
         if($categoryid){
                    $entities=$em->getRepository('AppBundle:Book')->findBy(array('categoryid'=>$categoryid,'status'=>2),array('created'=>'desc'),$size,$start);

         }
        foreach($entities as $item):
            $result['count']++;
            $result['data'][]=array('id'=>$item->getId(),'title'=>$item->getTitle(),'author'=>$item->getAuthor(),
                'cover'=>$item->getCover(),'intro'=>mb_substr($item->getIntro(),0,36,'utf8'),'link'=>$item->getLink());
 
        endforeach;
         return new Response(json_encode($result),Response::HTTP_OK,array('Content-type'=>'application/json'));

         
    }
    /**
     * Creates a new Book entity.
     *
     * @Route("/", name="book_create")
     * @Method("POST")
     * @Template("AppBundle:Book:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Book();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('book_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Book entity.
     *
     * @param Book $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Book $entity)
    {
        $form = $this->createForm(new BookType(), $entity, array(
            'action' => $this->generateUrl('book_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Book entity.
     *
     * @Route("/new", name="book_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Book();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Book entity.
     *
     * @Route("/{id}", name="book_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Book')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Book entity.');
        }else{

        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Book entity.
     *
     * @Route("/{id}/edit", name="book_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Book')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Book entity.');
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
    * Creates a form to edit a Book entity.
    *
    * @param Book $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Book $entity)
    {
        $form = $this->createForm(new BookType(), $entity, array(
            'action' => $this->generateUrl('book_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Book entity.
     *
     * @Route("/{id}", name="book_update")
     * @Method("PUT")
     * @Template("AppBundle:Book:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Book')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Book entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
    $entity->setUpdated(time());

            $em->flush();

            return $this->redirect($this->generateUrl('book_edit', array('id' => $id,'done'=>'yes')));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Edits an existing Book entity.
     *
     * @Route("/exam/", name="book_exam")
     * @Method("POST")
      */
    public function pubAction(Request $request)
    {

        $id_array=$request->get('ids');
         $status=$request->get('status');
        if(count($id_array)==0){

                        return $this->redirect($this->generateUrl('book'));

        }
        $em = $this->getDoctrine()->getManager();
        foreach($id_array as $id):
            $id=intval($id);
            $entity = $em->getRepository('AppBundle:Book')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Book entity.');
            }
      
            if($status!=NULL){
                $entity->setStatus(intval($status));
                $em->flush();
            }

        endforeach;
            return $this->redirect($this->generateUrl('book'));
          
    }
     /**
     * Edits an existing Book entity.
     *
     * @Route("/sort/{id}", name="book_sort")
     * @Method("GET")
      */
    public function sortAction(Request $request,$id)
    {

          $op=intval($request->get('op'));
         if(!$id){
                return $this->redirect($this->generateUrl('book'));
        }
        $em = $this->getDoctrine()->getManager();
             $entity = $em->getRepository('AppBundle:Book')->findOneBy(array('id'=>$id));

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Book entity.');
            }
            $sortid=$entity->getSortid();
            if($op==2){
                $sortid++;
                 $entity->setSortid(($sortid));
                 $em->flush();

            }
            if($op==1){
                if($sortid>1){
                $sortid--;
                 $entity->setSortid(($sortid));
                }
                $em->flush();

            }
 
             return $this->redirect($this->generateUrl('book'));
          
    }
/**
     * Edits an existing Book entity.
     *
     * @Route("/rel/{id}", name="book_rel")
     * @Method("GET")
      */
    public function relAction(Request $request,$id)
    {

          $op=intval($request->get('op'));
         if(!$id){
                return $this->redirect($this->generateUrl('book'));
        }
        $em = $this->getDoctrine()->getManager();
             $entity = $em->getRepository('AppBundle:Book')->findOneBy(array('id'=>$id));

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Book entity.');
            }
            
         $entity->setRel(($op));
         $em->flush();
 
             return $this->redirect($this->generateUrl('book'));
          
    }
     /**
     * Edits an existing Book entity.
     *
     * @Route("/examid/{id}", name="book_examid")
     * @Method("GET")
      */
    public function pubidAction(Request $request,$id)
    {

          $status=$request->get('status');
         
        $em = $this->getDoctrine()->getManager();
             $entity = $em->getRepository('AppBundle:Book')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Book entity.');
            }
      
            if($status!=NULL){
                $entity->setStatus(intval($status));
                $em->flush();
            }

             return $this->redirect($this->generateUrl('book'));
          
    }
    /**
     * Deletes a Book entity.
     *
     * @Route("/{id}", name="book_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Book')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Book entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('book'));
    }

    /**
     * Creates a form to delete a Book entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('book_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
