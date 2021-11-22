<?php
/*
 * vediManagerResponsabile.php <idSviluppatore>
 */
require_once "bootstrap.php";

$idSviluppatore = $argv[1];

$sviluppatore = $entityManager->find("Sviluppatore", $idSviluppatore);

if (!$idSviluppatore) {
    echo "ERRORE: nessun Sviluppatore trovato con id " . $idSviluppatore . ".\n";
    exit(1);
}

$team = $sviluppatore->getTeam();
$manager = $team->getManager();

echo "Il Manager di riferimento per lo Sviluppatore con id " . $idSviluppatore . " è il seguente:\n";
echo "\t id = " . $manager->getId() . "\n";
echo "\t codice fiscale = " . $manager->getCodiceFiscale() . "\n";
echo "\t nome = " . $manager->getNome() . "\n";
echo "\t id team = " . $team->getId() . "\n";
?>
