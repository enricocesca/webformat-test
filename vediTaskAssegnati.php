<?php
/*
 * vediTaskAssegnati.php <idSviluppatore>
 */
use Doctrine\Common\Collections\ArrayCollection;
require_once "bootstrap.php";

$idSviluppatore = $argv[1];

$sviluppatore = $entityManager->find("Sviluppatore", $idSviluppatore);

if (!$sviluppatore) {
    echo "ERRORE: nessuno Sviluppatore trovato con id " . $idSviluppatore . ".\n";
    exit(1);
}

$repositoryTask = $entityManager->getRepository('Task');
$taskInElaborazione = $repositoryTask->findBy(array('stato' => 'ASSIGNED'));

$taskAssegnati = new ArrayCollection();
foreach ($taskInElaborazione as $t) {
  $sviluppatori = $t->getSviluppatori();

  $sviluppatorePresente = false;
  foreach ($sviluppatori as $s) {
      if ($s == $sviluppatore) {
          $sviluppatorePresente = true;
      }
  }

  if ($sviluppatorePresente) {
      $taskAssegnati[] = $t;
  }
}

if (count($taskAssegnati->toArray())!=0) {
    echo "Lo Sviluppatore con id " . $idSviluppatore . " sta elaborando i seguenti task:\n";
    foreach ($taskAssegnati as $t) {
        echo "\t task con id " . $t->getId() . "\n";
    }
} else {
    echo "Attualmente lo Sviluppatore con id " . $idSviluppatore . " non ha Task in elaborazione.\n";
}
?>
