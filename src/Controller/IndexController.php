<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
    /**
     * @Route("/", name="home")
     */
    public function home(Request $request){
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createFormBuilder($user)
                     ->add('Email', EmailType::class, [
                         'attr'=>[
                             'placeholder'=> "Email"
                         ]
        ])
                     ->add('Password', TextareaType::class, [
                         'attr'=>[
                             'placeholder'=> "Mot de passe"
                         ]
        ])
                     ->getForm();


        return $this->render("index/home.html.twig", [
            'formUser' => $form->createView()
        ]);
    }

}
