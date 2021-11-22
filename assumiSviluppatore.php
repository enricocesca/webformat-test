<?php
/*
 * assumiSviluppatore.php <codiceFiscale> <nome> <professione> <idTeam> <idAmministratore>
 */
require_once "bootstrap.php";

$codiceFiscale = $argv[1];
$nome = $argv[2];
$professione = $argv[3];
$idTeam = $argv[4];
$idAmministratore = $argv[5];

$repositorySviluppatori = $entityManager->getRepository('Sviluppatore');
$erroreCodiceFiscale = $repositorySviluppatori->findBy(array('codiceFiscale' => $codiceFiscale));

if ($erroreCodiceFiscale) {
    echo "ERRORE: Codice Fiscale \"" . $codiceFiscale . "\" già utilizzato.\n";
    exit(1);
}

$team = $entityManager->find("Team", $idTeam);

if (!$team) {
    echo "ERRORE: nessun Team trovato con id " . $idTeam . ".\n";
    exit(1);
}

$amministratore = $entityManager->find("Amministratore", $idAmministratore);

if (!$amministratore) {
    echo "ERRORE: nessun Amministratore trovato con id " . $idAmministratore . ".\n";
    exit(1);
}

$sviluppatore = new Sviluppatore();
$sviluppatore->setCodiceFiscale($codiceFiscale);
$sviluppatore->setNome($nome);
$sviluppatore->setProfessione($professione);
$sviluppatore->setTeam($team);
$sviluppatore->setAmministratore($amministratore);

$entityManager->persist($sviluppatore);
$entityManager->flush();

echo "Sviluppatore Aggiunto: \n";
echo "\t id = " . $sviluppatore->getId() . "\n";
echo "\t codice fiscale = " . $sviluppatore->getCodiceFiscale() . "\n";
echo "\t nome = " . $sviluppatore->getNome() . "\n";
echo "\t professione = " . $sviluppatore->getProfessione() . "\n";
echo "\t id team = " . $team->getId() . "\n";
echo "\t id amministratore assunzione = " . $amministratore->getId() . "\n";
?>
