<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContextInterface;
class DefaultController extends Controller
{
    /**
     * @Route("/read/stage", name="stage")
     */
    public function stageAction(Request $request){
        $id=$request->get('id');
        $rand=rand(0,1);
        $result=array(array('msg'=>'真可惜','class'=>'swing animated infinite'),array('msg'=>'中奖啦','class'=>'flash animated infinite'));
        return $this->render('AppBundle:Default:stage.html.twig',array('result'=>$result[$rand]));

    }
    /**
     * @Route("/admin", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $user=$this->getUser();
        // replace this example code with whatever you need
        return $this->render('AppBundle/views/default/index.html.twig');
    }
    /**
    * @Route("/")
    */
    public function adminAction(){

        $securityContext=$this->container->get('security.context');
        if(!$securityContext->isGranted('ROLE_ADMIN')){
            throw new AccessDeniedException('Only an admin can do this!!!!');
        }
                    return $this->redirect($this->generateUrl('homepage'));

    }
    /**
    * @Route("/login_new")
    */
    public function loginAction(Request $request){
       /*$session = $request->getSession();
 
        // get the login error if there is one
         
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
                 return $this->render('AppBundle:default:login.html.twig',
                    array('error'=>$error,'last_username'=>$session->get(SecurityContextInterface::LAST_USERNAME)));
                 */
   
    }  
  
    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
    }
}
