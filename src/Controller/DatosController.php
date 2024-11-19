<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\DatosType;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Datosusuario;
use App\Repository\DatosusuarioRepository;

class DatosController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    } 
    #[Route('/', name: 'app_datos')]
    public function index(Request $request): Response
    {
        $post = new Datosusuario();
        $form = $this->createForm(DatosType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($post);
            $this->em->flush();
            return $this->redirectToRoute('app_datos');
        }

        return $this->render('datos/index.html.twig', [
            'form' => $form->createView()
        ]);
    } 

    #[Route('/datos/list', name: 'app_datos_list')]
    public function listDatosusuarios(DatosusuarioRepository $datosusuarioRepository): Response
    {
        $datosusuarios = $datosusuarioRepository->findAllDatosusuarios();

        return $this->render('datos/list.html.twig', [
        'datosusuarios' => $datosusuarios,
        ]);
    }
}
