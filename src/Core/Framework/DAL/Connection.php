<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL;

use Ant\Core\Framework\Parameter\Exception\InvalidParameterException;
use Doctrine\DBAL\Connection as DoctrineConnection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class Connection
{
    private string $databaseUrl;

    /**
     * @throws \Exception
     */
    public function __construct(ParameterBagInterface $parameterBag)
    {
        if (empty($parameterBag->get('database_url'))) {
            throw new InvalidParameterException(sprintf('Environment variable "%s" must not be empty', 'DB_URL'));
        }

        $this->databaseUrl = $parameterBag->get('database_url');
    }

    /**
     * @return DoctrineConnection
     * @throws Exception
     */
    public function getConnection(): DoctrineConnection
    {
        return DriverManager::getConnection(['url' => $this->databaseUrl]);
    }
}