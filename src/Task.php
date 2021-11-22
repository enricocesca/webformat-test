<?php
/*
 * src/Task.php
 */
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="task")
 */
class Task
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue
   * @var int
   */
  private $id;

  /**
   * @ORM\Column(type="string")
   * @var string
   */
  private $descrizione;

  /**
   * @ORM\Column(type="string")
   * @var string
   * UNASSIGNED, ASSIGNED, DONE, EXPIRED
   */
  private $stato;

  /**
   * @ORM\Column(type="datetime")
   * @var DateTime
   */
  private $scadenza;

  /**
   * @ORM\ManyToOne(targetEntity="Manager", inversedBy="taskCreati")
   * @var Manager
   */
  private $manager;

  /**
   * @ORM\ManyToOne(targetEntity="Progetto", inversedBy="task")
   * @var Progetto
   */
  private $progetto;

  /**
   * @ORM\ManyToMany(targetEntity="Sviluppatore")
   * @var Sviluppatore[]
   */
  private $sviluppatori;

  public function __construct()
  {
      $this->stato = "UNASSIGNED";
      $this->sviluppatori = new ArrayCollection();
  }

  public function getId()
  {
      return $this->id;
  }

  public function getDescrizione()
  {
      return $this->descrizione;
  }

  public function setDescrizione(string $descrizione)
  {
      $this->descrizione = $descrizione;
  }

  public function getStato()
  {
      $oggi = new DateTime("now");
      if ($oggi > $this->scadenza) {
          $this->stato = "EXPIRED";
      }
      return $this->stato;
  }

  public function setStato(string $stato)
  {
      $this->stato = $stato;
  }

  public function chiudiTask()
  {
      $this->stato = "DONE";
  }

  public function getScadenza()
  {
      return $this->scadenza;
  }

  public function setScadenza(DateTime $scadenza)
  {
      $this->scadenza = $scadenza;
  }

  public function getManager()
  {
      return $this->manager;
  }

  public function setManager(Manager $manager)
  {
      $this->manager = $manager;
  }

  public function getProgetto()
  {
      return $this->progetto;
  }

  public function setProgetto(Progetto $progetto)
  {
      $this->progetto = $progetto;
  }

  public function getSviluppatori()
  {
      return $this->sviluppatori;
  }

  public function incaricaSviluppatore(Sviluppatore $sviluppatore)
  {
      $this->sviluppatori[] = $sviluppatore;
  }

  public function rimuoviSviluppatore(Sviluppatore $sviluppatore)
  {
      $update = new ArrayCollection();
      foreach ($this->sviluppatori as $s) {
          if ($s != $sviluppatore) {
              $update[] = $s;
          }
      }
      $this->sviluppatori = $update;
  }
}
?>
