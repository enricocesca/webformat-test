# webformat-test

Test svolto per il percorso di selezione e reclutamento dell'azienda Webformat (PN).

Requisiti: PHP e Composer (vedi https://getcomposer.org/doc/00-intro.md).

## Installazione (MacOS):

```bash
$ git clone https://github.com/enricocesca/webformat-test.git
$ cd webformat-test
$ php composer.phar install
$ vendor/bin/doctrine orm:schema-tool:create
```

## Comandi CLI:

```bash
# Inserire l'Amministratore (CEO):
$ php aggiungiAmministratore.php <codiceFiscale> <nome>
# Assumere un Manager (PM):
$ php assumiManager.php <codiceFiscale> <nome> <idAmministratore>
# Creare un Team di sviluppo:
$ php aggiungiTeam.php <acronimo> <idManager>
# Assumere uno Sviluppatore (DEV):
$ php assumiSviluppatore.php <codiceFiscale> <nome> <professione> <idTeam> <idAmministratore>
# Creare un Progetto:
$ php assegnaProgetto.php <nome> <idAmministratore> <idManager>
# Creare un Task:
$ php creaTask.php <descrizione> <scadenza> <idManager> <idProgetto> <idsSviluppatori>
# Mostrare il Manager di riferimento di uno Sviluppatore:
$ php vediManagerResponsabile.php <idSviluppatore>
# Rimuovere un Task da uno Sviluppatore:
$ php rimuoviTask.php <idTask> <idSviluppatore>
# Mostrare tutti i Task "in elaborazione" di uno Sviluppatore:
$ php vediTaskAssegnati.php <idSviluppatore>
# Mostrare i Task che hanno sforato la deadline con gli Sviluppatori che ci hanno lavorato:
$ php vediTaskScaduti.php
# Mostrare i Progetti cross-team:
$ php vediProgettiCrossTeam.php
```

## Dati iniziali per Test (vedi data-seeding.sh):

```bash
# Inserimento Amministratore:
$ php aggiungiAmministratore.php  "LWNMNP74L11D651M" "Michele"
# Assunzione Manager:
$ php assumiManager.php "WHTRWH66M65F902W" "Luca" "1"
$ php assumiManager.php "HKLQFL96B24H648Y" "Giuseppe" "1"
# Creazione Team:
$ php aggiungiTeam.php "E-COMMERCE" "1"
$ php aggiungiTeam.php "PWA" "2"
# Assunzione Sviluppatori:
$ php assumiSviluppatore.php "SQQTGS80E68I830O" "Sergio" "Senior Backend Developer" "1" "1"
$ php assumiSviluppatore.php "ZDLLCG81D21L511C" "Mario" "Junior DevOps Engineer" "1" "1"
$ php assumiSviluppatore.php "YPFMHP48H05E751N" "Enrico" "Junior Backend Developer" "1" "1"
$ php assumiSviluppatore.php "SFNZYZ36R43D862U" "Lorenzo" "Junior Backend Developer" "2" "1"
$ php assumiSviluppatore.php "CRBGLR30S10C037P" "Giacomo" "Junior Frontend Developer" "2" "1"
# Creazione Progetti:
$ php assegnaProgetto.php "Progetto Cross-Team" "1" "1"
$ php assegnaProgetto.php "Progetto Web App" "1" "2"
# Creazione Task:
$ php creaTask.php "Task Scaduto" "15-11-2021" "1" "1" "2"
$ php creaTask.php "Task di Gruppo" "25-11-2021" "1" "1" "1,2"
$ php creaTask.php "Task Personale" "28-12-2021" "1" "1" "3"
$ php creaTask.php "Task Esterno" "31-01-2022" "1" "1" "5"
$ php creaTask.php "Task" "27-11-2021" "2" "2" "4,5"
```
