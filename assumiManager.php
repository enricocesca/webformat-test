<?php
/*
 * assumiManager.php <codiceFiscale> <nome> <idAmministratore>
 */
require_once "bootstrap.php";

$codiceFiscale = $argv[1];
$nome = $argv[2];
$idAmministratore = $argv[3];

$repositoryManager = $entityManager->getRepository('Manager');
$erroreCodiceFiscale = $repositoryManager->findBy(array('codiceFiscale' => $codiceFiscale));

if ($erroreCodiceFiscale) {
    echo "ERRORE: Codice Fiscale \"" . $codiceFiscale . "\" già utilizzato.\n";
    exit(1);
}

$amministratore = $entityManager->find("Amministratore", $idAmministratore);

if (!$amministratore) {
    echo "ERRORE: nessun Amministratore trovato con id " . $idAmministratore . ".\n";
    exit(1);
}

$manager = new Manager();
$manager->setCodiceFiscale($codiceFiscale);
$manager->setNome($nome);
$manager->setAmministratore($amministratore);

$entityManager->persist($manager);
$entityManager->flush();

echo "Manager Aggiunto: \n";
echo "\t id = " . $manager->getId() . "\n";
echo "\t codice fiscale = " . $manager->getCodiceFiscale() . "\n";
echo "\t nome = " . $manager->getNome() . "\n";
echo "\t id amministratore assunzione = " . $amministratore->getId() . "\n";
?>
