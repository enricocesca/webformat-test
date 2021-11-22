<?php
/*
 * aggiungiAmministratore.php <codiceFiscale> <nome>
 */
require_once "bootstrap.php";

$codiceFiscale = $argv[1];
$nome = $argv[2];

$repositoryAmministratori = $entityManager->getRepository('Amministratore');
$erroreCodiceFiscale = $repositoryAmministratori->findBy(array('codiceFiscale' => $codiceFiscale));

if ($erroreCodiceFiscale) {
    echo "ERRORE: Codice Fiscale \"" . $codiceFiscale . "\" già utilizzato.\n";
    exit(1);
}

$amministratore = new Amministratore();
$amministratore->setCodiceFiscale($codiceFiscale);
$amministratore->setNome($nome);

$entityManager->persist($amministratore);
$entityManager->flush();

echo "Amministratore Aggiunto: \n";
echo "\t id = " . $amministratore->getId() . "\n";
echo "\t codice fiscale = " . $amministratore->getCodiceFiscale() . "\n";
echo "\t nome = " . $amministratore->getNome() . "\n";
?>
