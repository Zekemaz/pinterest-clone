<?php

namespace App\Controller;

use App\Entity\Pin;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PinController extends AbstractController
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {

        $this->em = $em;
    }
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $pin = new Pin();
        $pin->setTitle('Title2');
        $pin->setDescription('Description2');
        dump($pin);

        $this->em->persist($pin);
        $this->em->flush();
        return $this->render('pin/index.html.twig');
    }

}
