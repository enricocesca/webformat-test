<?php
/*
 * creaTask.php <descrizione> <scadenza> <idManager> <idProgetto> <idsSviluppatori>
 */
require_once "bootstrap.php";

$descrizione = $argv[1];
$scadenza = $argv[2];
$idManager = $argv[3];
$idProgetto = $argv[4];
$idsSviluppatori = explode(",", $argv[5]);

$manager = $entityManager->find("Manager", $idManager);

if (!$manager) {
    echo "ERRORE: nessun Manager trovato con id " . $idManager . ".\n";
    exit(1);
}

$progetto = $entityManager->find("Progetto", $idProgetto);

if (!$progetto) {
    echo "ERRORE: nessun Progetto trovato con id " . $idProgetto . ".\n";
    exit(1);
}

$dql = "SELECT p, m FROM Progetto p JOIN p.manager m WHERE m.id = ?1";

$query = $entityManager->createQuery($dql);
$query->setParameter(1, $idManager);

$progettiGestiti = $query->getResult();

foreach ($progettiGestiti as $p) {
  if ($p->getId() == $idProgetto) {
    $erroreProgetto = true;
  }
}

if (!$erroreProgetto) {
    echo "ERRORE: il Manager con id " . $idManager . " non è responsabile del Progetto con id " . $idProgetto . ".\n";
    exit(1);
}

$task = new Task();
$task->setDescrizione($descrizione);
$task->setStato("ASSIGNED");
$task->setScadenza(new DateTime($scadenza));
$task->setManager($manager);
$task->setProgetto($progetto);

foreach ($idsSviluppatori as $idSviluppatore) {
    $sviluppatore = $entityManager->find("Sviluppatore", $idSviluppatore);

    if (!$sviluppatore) {
        echo "ERRORE: nessun Sviluppatore trovato con id " . $idSviluppatore . ".\n";
        exit(1);
    }

    $task->incaricaSviluppatore($sviluppatore);
}

$entityManager->persist($task);
$entityManager->flush();

echo "Task Creato: \n";
echo "\t id = " . $task->getId() . "\n";
echo "\t descrizione = " . $task->getDescrizione() . "\n";
echo "\t stato = " . $task->getStato() . "\n";
echo "\t scadenza = " . $task->getScadenza()->format('d.m.Y') . "\n";
echo "\t id manager responsabile = " . $manager->getId() . "\n";
echo "\t id progetto = " . $progetto->getId() . "\n";
echo "\t ids sviluppatori incaricati = " . $argv[5] . "\n";
?>
