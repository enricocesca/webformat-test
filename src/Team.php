<?php
/*
 * src/Team.php
 */
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="team")
 */
class Team
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
  private $acronimo;

  /**
   * @ORM\OneToOne(targetEntity="Manager")
   * @var Manager
   */
  private $manager;

  /**
   * @ORM\OneToMany(targetEntity="Sviluppatore", mappedBy="team")
   * @var Sviluppatore[]
   */
  private $sviluppatori;

  public function __construct()
  {
      $this->task = new ArrayCollection();
  }

  public function getId()
  {
      return $this->id;
  }

  public function getAcronimo()
  {
      return $this->acronimo;
  }

  public function setAcronimo(string $acronimo)
  {
      $this->acronimo = $acronimo;
  }

  public function getManager()
  {
      return $this->manager;
  }

  public function setManager(Manager $manager)
  {
      $this->manager = $manager;
  }

  public function getSviluppatori()
  {
      return $this->sviluppatori;
  }
}
?>
