<?php

namespace App\Controller;

use App\Form\OrderImportType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OrderImportController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(OrderImportType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if ($form->getClickedButton() === $form->get('amazon')){
                echo 'Amazon <br />';
            }

            if ($form->getClickedButton() === $form->get('etsy')){
                echo 'Etsy <br />';
            }

            // use specific service for parse json to Order
            // $order = $service->parse($data['json']);

            // $em = $this->getDoctrine()->getManager();
            // $em->persist($order);
            // $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('order_import/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
