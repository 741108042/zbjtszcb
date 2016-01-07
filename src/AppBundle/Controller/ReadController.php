<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\ORM\Tools\Pagination\Paginator;
use AppBundle\Entity\Book;
use AppBundle\Entity\Category;

/**
 * Book controller.
 *
 * @Route("/read")
 */
class ReadController extends Controller
{
     
     /**
     * Lists all Book entities.
     *
     * @Route("/list", name="book_list")
     * @Method("GET")
      */
    public function listAction(Request $request)
    {
        $categoryid=$request->get('categoryid');
        $status=2;//$request->get('status');
        $em = $this->getDoctrine()->getManager();

 
        $qb = $em->getRepository('AppBundle:Book')->createQueryBuilder('n')->addOrderBy('n.id','desc');
        if($categoryid){
            $qb->where('n.categoryid='.$categoryid);
        }
             $qb->where('n.status='.$status);
             //$qb->where('n.rel=1');

      
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($qb, $request->query->getInt('page', 1),5);
        $qbc = $em->getRepository('AppBundle:Category')->createQueryBuilder('n')->addOrderBy('n.sortid', 'asc')->where('n.status=1')->getQuery();

        $cate=$qbc->getResult();
         return $this->render('AppBundle:Book:list.html.twig',array(
            'pagination' => $pagination,
            'category'=>$cate,
            'categoryid'=>$categoryid,
            'status'=>$status
        ));
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

 
        $qb = $em->getRepository('AppBundle:Book')->createQueryBuilder('n')->addOrderBy('n.id','desc');
              
                   // $qb->where('n.rel=1');
 
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
         if($rel&&!$categoryid){
        $entities=$em->getRepository('AppBundle:Book')->findBy(array('status'=>2),array('created'=>'desc'),$size,$start);

         }
         if($categoryid){
                    $entities=$em->getRepository('AppBundle:Book')->findBy(array('categoryid'=>$categoryid,'status'=>2),array('created'=>'desc'),$size,$start);

         }
        foreach($entities as $item):
            $result['count']++;
            $result['data'][]=array('id'=>$item->getId(),'title'=>$item->getTitle(),'author'=>$item->getAuthor(),
                'cover'=>$item->getCover(),'intro'=>mb_substr($item->getIntro(),0,30,'utf8'),'link'=>$item->getLink());
 
        endforeach;
         return new Response(json_encode($result),Response::HTTP_OK,array('Content-type'=>'application/json'));

         
    } 
}
