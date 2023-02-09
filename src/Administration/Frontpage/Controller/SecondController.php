<?php declare(strict_types=1);

namespace Ant\Administration\Frontpage\Controller;

use Ant\Core\Framework\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecondController extends Controller
{
    #[Route('/zwei', name: 'ant.zwei')]
    public function index(): Response
    {
        return new Response('second one');
    }
}