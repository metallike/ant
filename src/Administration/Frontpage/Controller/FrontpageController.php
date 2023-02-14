<?php declare(strict_types=1);

namespace Ant\Administration\Frontpage\Controller;

use Ant\Administration\Frontpage\Entity\TestDefinition;
use Ant\Administration\Frontpage\Entity\TestEntity;
use Ant\Core\Framework\Controller;
use Ant\Core\Framework\DAL\Connection;
use Ant\Core\Framework\DAL\EntityManager;
use Ant\Core\Framework\DAL\Search\Criteria;
use Ant\Core\Framework\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontpageController extends Controller
{
    #[Route(path: '/', name: 'ant.frontpage')]
    public function index(Connection $connection, EntityManager $manager): Response
    {
        $testRepo = $manager->getDefinition(TestDefinition::class);

        $test = new TestEntity();

        #$test->setId(Uuid::randomBytes());
        #$test->setId();

        $test->setStringField('Empty');
        $test->setEmailField('f.brandl@jenpix.de');
        $test->setBoolField(true);
        $test->setIntField(16);
        $test->setFloatField(2.56);


        $neu = $testRepo->create($test);

        $criteria = new Criteria();
        //$search = $testRepo->search($criteria);

        //dd($search);

        /** @var TestEntity $neu */
        dd($neu->getEmailField());

        return new Response('<body>Frontpage</body>');
    }

    #[Route(path: '/test', name: 'ant.frontpage_test')]
    public function test(): Response
    {
        return new Response('test');
    }
}