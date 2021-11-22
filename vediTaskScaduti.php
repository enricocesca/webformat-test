<?php
/*
 * vediTaskScaduti.php
 */
use Doctrine\Common\Collections\ArrayCollection;
require_once "bootstrap.php";

$query = $entityManager->createQuery("SELECT t FROM Task t");
$task = $query->getResult();

$taskScaduti = new ArrayCollection();
foreach ($task as $t) {
    $stato = $t->getStato();

    if ($stato == "EXPIRED") {
        $taskScaduti[] = $t;
    }
}

if (count($taskScaduti->toArray())!=0) {
    echo "Task scaduti:";
    foreach ($taskScaduti as $t) {
        echo "\n\t il Task con id " . $t->getId() . " assegnato agli Sviluppatori con id ";

        foreach ($t->getSviluppatori() as $s) {
            echo $s->getId() . ", ";
        }

        echo "\n";
    }
} else {
    echo "Per il momento nessun Task è scaduto.\n";
}
?>
