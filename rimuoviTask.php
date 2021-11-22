<?php
/*
 * rimuoviTask.php <idTask> <idSviluppatore>
 */
require_once "bootstrap.php";

$idTask = $argv[1];
$idSviluppatore = $argv[2];

$task = $entityManager->find("Task", $idTask);

if (!$task) {
    echo "ERRORE: nessun Task trovato con id " . $idTask . ".\n";
    exit(1);
}

$sviluppatore = $entityManager->find("Sviluppatore", $idSviluppatore);

if (!$idSviluppatore) {
    echo "ERRORE: nessuno Sviluppatore trovato con id " . $idSviluppatore . ".\n";
    exit(1);
}

$sviluppatoriTask = $task->getSviluppatori();

foreach ($sviluppatoriTask as $s) {
    if ($s->getId() == $idSviluppatore) {
        $erroreTask = true;
    }
}

if (!$erroreTask) {
    echo "ERRORE: lo Sviluppatore con id " . $idSviluppatore . " non svolge il Task con id " . $idTask . ".\n";
    exit(1);
}

$task->rimuoviSviluppatore($sviluppatore);
$entityManager->flush();

echo "Task con id " . $idTask . " rimosso dallo Sviluppatore con id " . $idSviluppatore . "\n";
?>
