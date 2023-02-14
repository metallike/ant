<?php declare(strict_types=1);

namespace Ant\Administration\Frontpage\Controller;

use Ant\Core\Framework\Controller;
use Ant\Core\Framework\Routing\Route;
use Symfony\Component\HttpFoundation\Response;

class SecondController extends Controller
{
    #[Route('/zwei', name: 'ant.zwei')]
    public function index(): Response
    {
        return new Response('second one');
    }
}