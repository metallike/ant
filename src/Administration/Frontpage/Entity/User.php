<?php declare(strict_types=1);

namespace Ant\Administration\Frontpage\Entity;

use Ant\Core\Framework\DAL\Entity;
use Ant\Core\Framework\DAL\EntityIdTrait;

class User extends Entity
{
    use EntityIdTrait;

    private $name;
    private $email;
    private $bool;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getBool()
    {
        return $this->bool;
    }

    /**
     * @param mixed $bool
     */
    public function setBool($bool): void
    {
        $this->bool = $bool;
    }
}