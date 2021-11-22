<?php
/*
 * aggiungiTeam.php <acronimo> <idManager>
 */
require_once "bootstrap.php";

$acronimo = $argv[1];
$idManager = $argv[2];

$repositoryTeam = $entityManager->getRepository('Team');
$erroreAcronimo = $repositoryTeam->findBy(array('acronimo' => $acronimo));

if ($erroreAcronimo) {
    echo "ERRORE: Acronimo \"" . $acronimo . "\" già utilizzato.\n";
    exit(1);
}

$manager = $entityManager->find("Manager", $idManager);

if (!$manager) {
    echo "ERRORE: nessun Manager trovato con id " . $idManager . ".\n";
    exit(1);
}

$team = new Team();
$team->setAcronimo($acronimo);
$team->setManager($manager);

$entityManager->persist($team);
$entityManager->flush();

echo "Team Aggiunto: \n";
echo "\t id = " . $team->getId() . "\n";
echo "\t acronimo = " . $team->getAcronimo() . "\n";
echo "\t id manager responsabile = " . $manager->getId() . "\n";
?>
