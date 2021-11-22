<?php
/*
 * src/Progetto.php
 */
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="progetti")
 */
class Progetto
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue
   * @var int
   */
  private $id;

  /**
   * @ORM\Column(type="string", unique=true)
   * @var string
   */
  private $nome;

  /**
   * @ORM\ManyToOne(targetEntity="Amministratore", inversedBy="progettiAssegnati")
   * @var Amministratore
   */
  private $amministratore;

  /**
   * @ORM\ManyToOne(targetEntity="Manager", inversedBy="progettiGestiti")
   * @var Manager
   */
  private $manager;

  /**
   * @ORM\OneToMany(targetEntity="Task", mappedBy="numero")
   * @var Task[]
   */
  private $task;

  public function __construct()
  {
      $this->task = new ArrayCollection();
  }

  public function getId()
  {
      return $this->id;
  }

  public function getNome()
  {
      return $this->nome;
  }

  public function setNome($nome)
  {
      $this->nome = $nome;
  }

  public function getAmministratore()
  {
      return $this->amministratore;
  }

  public function setAmministratore(Amministratore $amministratore)
  {
      $this->amministratore = $amministratore;
  }

  public function getManager()
  {
      return $this->manager;
  }

  public function setManager(Manager $manager)
  {
      $this->manager = $manager;
  }

  public function getTask()
  {
      return $this->task;
  }
}
?>
