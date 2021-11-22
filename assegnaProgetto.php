<?php
/*
 * assegnaProgetto.php <nome> <idAmministratore> <idManager>
 */
require_once "bootstrap.php";

$nome = $argv[1];
$idAmministratore = $argv[2];
$idManager = $argv[3];

$repositoryProgetto = $entityManager->getRepository('Progetto');
$erroreNome = $repositoryProgetto->findBy(array('nome' => $nome));

if ($erroreNome) {
    echo "ERRORE: Nome \"" . $nome . "\" già utilizzato.\n";
    exit(1);
}

$amministratore = $entityManager->find("Amministratore", $idAmministratore);

if (!$amministratore) {
    echo "ERRORE: nessun Amministratore trovato con id " . $idAmministratore . ".\n";
    exit(1);
}

$manager = $entityManager->find("Manager", $idManager);

if (!$manager) {
    echo "ERRORE: nessun Manager trovato con id " . $idManager . ".\n";
    exit(1);
}

$progetto = new Progetto();
$progetto->setNome($nome);
$progetto->setAmministratore($amministratore);
$progetto->setManager($manager);

$entityManager->persist($progetto);
$entityManager->flush();

echo "Progetto Creato: \n";
echo "\t id = " . $progetto->getId() . "\n";
echo "\t nome = " . $progetto->getNome() . "\n";
echo "\t id amministratore  = " . $amministratore->getId() . "\n";
echo "\t id manager responsabile = " . $amministratore->getId() . "\n";
?>
