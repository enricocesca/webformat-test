<?php
/*
 * src/Amministratore.php
 */
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="amministratori")
 */
class Amministratore
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
   * @ORM\OneToMany(targetEntity="Manager", mappedBy="amministratore")
   * @var Manager[]
   */
  private $managerAssunti;

  /**
   * @ORM\OneToMany(targetEntity="Sviluppatore", mappedBy="amministratore")
   * @var Sviluppatore[]
   */
  private $sviluppatoriAssunti;

  /**
   * @ORM\OneToMany(targetEntity="Progetto", mappedBy="amministratore")
   * @var Progetto[]
   */
  private $progettiAssegnati;

  public function __construct()
  {
      $this->managerAssunti = new ArrayCollection();
      $this->sviluppatoriAssunti = new ArrayCollection();
      $this->progettiAssegnati = new ArrayCollection();
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

  public function getManagerAssunti()
  {
      return $this->managerAssunti;
  }

  public function getSviluppatoriAssunti()
  {
      return $this->sviluppatoriAssunti;
  }

  public function getProgettiAssegnati()
  {
      return $this->progettiAssegnati;
  }
}
?>
