<?php
/*
 * vediProgettiCrossTeam.php
 */
use Doctrine\Common\Collections\ArrayCollection;
require_once "bootstrap.php";

$query = $entityManager->createQuery("SELECT p FROM Progetto p");
$progetti = $query->getResult();

$progettiCrossTeam = new ArrayCollection();
$repositoryTask = $entityManager->getRepository('Task');

foreach ($progetti as $p) {
    $teamCoinvolti = new ArrayCollection();

    $task = $repositoryTask->findBy(array('progetto' => $p));
    foreach ($task as $t) {
        $sviluppatori = $t->getSviluppatori();

        foreach ($sviluppatori as $s) {
            $teamSviluppatore = $s->getTeam();
            $presente = false;
            foreach ($teamCoinvolti as $team) {
                if ($team == $teamSviluppatore) {
                    $presente = true;
                }
            }
            if (!$presente) {
                $teamCoinvolti[] = $teamSviluppatore;
            }
        }

    }

    if (count($teamCoinvolti->toArray())>1) {
      $progettiCrossTeam[] = $p;
    }
}

if (count($progettiCrossTeam->toArray())!=0) {
    echo "Attualmente ci sono i seguenti Progetti cross-team:\n";
    foreach ($progettiCrossTeam as $p) {
        echo "\t progetto con id " . $p->getId() . "\n";
    }
} else {
    echo "Attualmente non ci sono Progetti cross-team.\n";
}
?>
