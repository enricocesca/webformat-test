# Dati iniziali per Test

# Inserimento Amministratore: php aggiungiAmministratore.php <codiceFiscale> <nome>
php aggiungiAmministratore.php  "LWNMNP74L11D651M" "Michele"

# Assunzione Manager: php assumiManager.php <codiceFiscale> <nome> <idAmministratore>
php assumiManager.php "WHTRWH66M65F902W" "Luca" "1"
php assumiManager.php "HKLQFL96B24H648Y" "Giuseppe" "1"

# Creazione Team: php aggiungiTeam.php <acronimo> <idManager>
php aggiungiTeam.php "E-COMMERCE" "1"
php aggiungiTeam.php "PWA" "2"

# Assunzione Sviluppatori: php assumiSviluppatore.php <codiceFiscale> <nome> <professione> <idTeam> <idAmministratore>
php assumiSviluppatore.php "SQQTGS80E68I830O" "Sergio" "Senior Backend Developer" "1" "1"
php assumiSviluppatore.php "ZDLLCG81D21L511C" "Mario" "Junior DevOps Engineer" "1" "1"
php assumiSviluppatore.php "YPFMHP48H05E751N" "Enrico" "Junior Backend Developer" "1" "1"

php assumiSviluppatore.php "SFNZYZ36R43D862U" "Lorenzo" "Junior Backend Developer" "2" "1"
php assumiSviluppatore.php "CRBGLR30S10C037P" "Giacomo" "Junior Frontend Developer" "2" "1"

# Creazione Progetto: php assegnaProgetto.php <nome> <idAmministratore> <idManager>
php assegnaProgetto.php "Progetto Cross-Team" "1" "1"
php assegnaProgetto.php "Progetto Web App" "1" "2"

# Creazione Task: php creaTask.php <descrizione> <scadenza> <idManager> <idProgetto> <idsSviluppatori>
php creaTask.php "Task Scaduto" "15-11-2021" "1" "1" "2"
php creaTask.php "Task di Gruppo" "25-11-2021" "1" "1" "1,2"
php creaTask.php "Task Personale" "28-12-2021" "1" "1" "3"
php creaTask.php "Task Esterno" "31-01-2022" "1" "1" "5"

php creaTask.php "Task" "27-11-2021" "2" "2" "4,5"

# Altri Comandi CLI:
# php vediManagerResponsabile.php <idSviluppatore>
# php rimuoviTask.php <idTask> <idSviluppatore>
# php vediTaskAssegnati.php <idSviluppatore>
# php vediTaskScaduti.php
# php vediProgettiCrossTeam.php
