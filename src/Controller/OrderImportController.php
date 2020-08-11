<?php

namespace App\Controller;

use App\Form\OrderImportType;
use App\Transformer\TransformerCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OrderImportController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request, TransformerCollection $transformers)
    {
        $form = $this->createForm(OrderImportType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $platform = null;
            if ($form->getClickedButton() === $form->get('amazon')){
                $platform = 'amazon';
            }

            if ($form->getClickedButton() === $form->get('etsy')){
                $platform = 'etsy';
            }

            $order = $transformers->fromArray($platform, json_decode($data['json'], true));

            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('order_import/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
