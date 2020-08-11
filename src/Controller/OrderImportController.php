<?php

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderImportType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OrderImportController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $form = $this->createForm(OrderImportType::class);

        return $this->render('order_import/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
