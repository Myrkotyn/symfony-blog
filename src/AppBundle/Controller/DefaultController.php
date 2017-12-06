<?php
/**
 * Created by PhpStorm.
 * User: andrew
 * Date: 12/4/17
 * Time: 8:35 PM
 */
namespace App\AppBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 * @package App\AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('description', TextType::class)
            ->getForm();

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}