<?php

namespace Kutny\FormTest;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="test_data")
 */
class TestEntity
{

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\MaxLength(3)
     * @ORM\Column(type="string", length=3)
     */
    private $note;

    /**
     * @ORM\Column(type="date")
     */
    private $dueDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $trueFalse;

    /**
     * @ORM\Column(type="integer")
     */
    private $chooseItem;

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    public function setChooseItem($chooseItem)
    {
        $this->chooseItem = $chooseItem;
    }

    public function getChooseItem()
    {
        return $this->chooseItem;
    }

    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNote($note)
    {
        $this->note = $note;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function setTrueFalse($trueFalse)
    {
        $this->trueFalse = $trueFalse;
    }

    public function getTrueFalse()
    {
        return $this->trueFalse;
    }

}