<?php declare(strict_types=1);

namespace Ant\Administration\Frontpage\Controller;

use Ant\Core\Framework\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontpageController extends Controller
{
    #[Route(path: '/', name: 'ant.frontpage')]
    public function index(): Response
    {
        return new Response('Hallo');
    }

    #[Route(path: '/test', name: 'ant.frontpage_test')]
    public function test(): Response
    {
        return new Response('test');
    }
}