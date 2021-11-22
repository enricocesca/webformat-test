<?php
/*
 * src/Sviluppatore.php
 */
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="sviluppatori")
 */
class Sviluppatore
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
   * @ORM\Column(type="string")
   * @var string
   */
  private $professione;

  /**
   * @ORM\ManyToOne(targetEntity="Amministratore", inversedBy="sviluppatoriAssunti")
   * @var Amministratore
   */
  private $amministratore;

  /**
   * @ORM\ManyToOne(targetEntity="Team", inversedBy="sviluppatori")
   * @var Team
   */
  private $team;

  /**
   * @ORM\ManyToMany(targetEntity="Task")
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

  public function getProfessione()
  {
      return $this->professione;
  }

  public function setProfessione(string $professione)
  {
      $this->professione = $professione;
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

  public function getTask()
  {
      return $this->task;
  }
}
?>
