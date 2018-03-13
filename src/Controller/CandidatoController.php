<?php

namespace App\Controller;

use App\Entity\Candidato;
use App\Form\CandidatoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CandidatoController extends Controller
{
    /**
     * @Route("/candidato", name="candidato")
     * @Template("candidato/index.html.twig")
     */
    public function index(Request $request)
    {
        $candidato = new Candidato();
        $form = $this->createForm(CandidatoType::class, $candidato);

        $form->handleRequest($request);

        return [
            'form' => $form->createView()
        ];
    }
}
