<?php
/**
 * Created by PhpStorm.
 * User: andrew
 * Date: 12/4/17
 * Time: 8:35 PM
 */
namespace App\AppBundle\Controller;

use App\AppBundle\Entity\Category;
use App\AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     *@param Request $request
     *
     * @Route("/", name="home")
     *
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $post = new Post();
        $form = $this->createFormBuilder($post)
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('content', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('category', EntityType::class, [
                'class' => 'App\AppBundle\Entity\Category',
                'choice_label' => 'name'
            ])
            ->add('imageFile', FileType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Send',
                'attr' => [
                    'class' => 'btn btn-default'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $formData = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($formData);
            $em->flush();

            return $this->redirect($this->generateUrl('home'));
        }

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}