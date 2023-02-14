<?php declare(strict_types=1);

namespace Ant\Administration\Frontpage\Entity;

use Ant\Core\Framework\DAL\Entity;
use Ant\Core\Framework\DAL\EntityIdTrait;

class TestEntity extends Entity
{
    use EntityIdTrait;

    private $stringField;
    private $emailField;
    private $intField;
    private $floatField;
    private $boolField;

    /**
     * @return mixed
     */
    public function getStringField()
    {
        return $this->stringField;
    }

    /**
     * @param mixed $stringField
     */
    public function setStringField($stringField): void
    {
        $this->stringField = $stringField;
    }

    /**
     * @return mixed
     */
    public function getEmailField()
    {
        return $this->emailField;
    }

    /**
     * @param mixed $emailField
     */
    public function setEmailField($emailField): void
    {
        $this->emailField = $emailField;
    }

    /**
     * @return mixed
     */
    public function getIntField()
    {
        return $this->intField;
    }

    /**
     * @param mixed $intField
     */
    public function setIntField($intField): void
    {
        $this->intField = $intField;
    }

    /**
     * @return mixed
     */
    public function getFloatField()
    {
        return $this->floatField;
    }

    /**
     * @param mixed $floatField
     */
    public function setFloatField($floatField): void
    {
        $this->floatField = $floatField;
    }

    /**
     * @return mixed
     */
    public function getBoolField()
    {
        return $this->boolField;
    }

    /**
     * @param mixed $boolField
     */
    public function setBoolField($boolField): void
    {
        $this->boolField = $boolField;
    }
}