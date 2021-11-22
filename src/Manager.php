<?php
/*
 * src/Manager.php
 */
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="manager")
 */
class Manager
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
  private $codiceFiscale;

  /**
   * @ORM\Column(type="string")
   * @var string
   */
  private $nome;

  /**
   * @ORM\ManyToOne(targetEntity="Amministratore", inversedBy="managerAssunti")
   * @var Amministratore
   */
  private $amministratore;

  /**
   * @ORM\OneToOne(targetEntity="Team")
   * @var Team
   */
  private $team;

  /**
   * @ORM\OneToMany(targetEntity="Progetto", mappedBy="manager")
   * @var Progetto[]
   */
  private $progettiGestiti;

  /**
   * @ORM\OneToMany(targetEntity="Task", mappedBy="manager")
   * @var Task[]
   */
  private $taskCreati;

  public function __construct()
  {
      $this->progettiGestiti = new ArrayCollection();
      $this->taskCreati = new ArrayCollection();
  }

  public function getId()
  {
      return $this->id;
  }

  public function getCodiceFiscale()
  {
      return $this->codiceFiscale;
  }

  public function setCodiceFiscale(string $codiceFiscale)
  {
      $this->codiceFiscale = $codiceFiscale;
  }

  public function getNome()
  {
      return $this->nome;
  }

  public function setNome(string $nome)
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

  public function getTeam()
  {
      return $this->team;
  }

  public function setTeam(Team $team)
  {
      $this->team = $team;
  }

  public function getProgettiGestiti()
  {
      return $this->progettiGestiti;
  }

  public function getTaskCreati()
  {
      return $this->taskCreati;
  }
}
?>
