NB: dal momento che non ero assolutamente soddisfatto dei sforzi da me compiuti, ho deciso di cancellare completamente le repo precedenti e rifare tutto quanto da capo. Sono consapevole che mi sto complicando la vita ma ho bisgono di ripercorrere passo per passo tutti i passaggi altrimenti continuerò a non capirci nulla di questo esercizio.

/*CONSEGNA DEL 27-09-24*/

Esercizio di oggi:
nome repo: laravel-dc-comics
Ciao ragazzi,
oggi create un nuovo progetto Laravel 9 per gestire un archivio di fumetti.
Milestone 1
Tramite gli appositi comandi artisan create un model con relativa migration e un resource controller.
Popolate la tabella attraverso un seeder i FakerPHP
Milestone 2
Iniziate a definire le prime operazioni CRUD con le relative view:
- index()
- show()
- create()
- store()

Bonus: Per popolare la tabella utilizzate nel seeder il file in allegato.


/*CONSEGNA DEL 30-09-24*/

oggi lavorate sulla stessa repo di venerdì e completate le operazioni CRUD.
Bonus 1:
tramite javascript, quando l'utente clicca sul pulsante "delete", chiedere conferma della cancellazione, prima di eliminare l'elemento. La richiesta di cancellazione avviene tramite onclick e confirm
Bonus 2: Realizzare una modale di bootstrap attraverso la quale chiedere la conferma della cancellazione del record.

/*CONSEGNA DEL 01-10-24*/

sempre lavorando sulla repo di ieri, potete aggiungere le validazioni in modo da rendere più stabile il vostro gestionale di fumetti.

/*SOLUZIONE*/ 
- dopo aver completato le operazioni preliminari (creazione dei progetto base di laravel), modifico il nome del database in "laravel-dc-comics" e creo un omonimo database in phpMyAdnmin. 
- lancio il comando php artisan make:model Comic -mc --resource. Ciò mi permette di creare in un colpo solo  il modello per la tabella dei fumetti, la migration per la tabella e il resource controller.
- modifico la migration 2024_09_30_163634_create_comics_table.php per includere i campi necessari, dopo di che lancio il comando php artisan migrate per eseguire la migrazione.
- lancio il comando php artisan make:seeder ComicSeeder per popolare la tabella dei fumetti forniti dalla consegna.
- creo il file comics.php (da inserire nella cartella config) per la configurazione dei dati relativi ai fumetti (per una questione di tempistiche lascio perdere le informazioni relative a writers e artits).
- eseguo il comando php artisan db:seed --class=ComicSeeder
    - avendo riscontrato un errore relativo al limite dei caratteri della colonna thumb della tabella relativa ai fumetti, la modifico da "string" a "text" per aggirare il limite dei caratteri
    - lancio il comando php artisan migrate:fresh per applicare i cambiamenti rispetto alla migrazione precedente
- nel modello Comic.php, imposto i campi come "fillable" per l'inserimento dei dati di massa.
- modifico il file web.php per registrare le rotte resource per il controller ComicController.
- modifico il ComicController.php per gestire le operazioni CRUD.
    - con il metodo store del ComicController, ricevo i dati dal form e crei un nuovo record nel database.
    - col metodo index recupero tutti i fumetti, mentre col il metodo show recupero un singolo fumetto.
    - con metodo edit recupero i dati del fumetto da modificare, mentre col metodo update applico le modifiche.
    - col metodo destroy elimino un fumetto specifico dal database.
- Creo la cartella comics (all'interno della cartella views), per creare a sua volta dei file php che dei risultato video per ciacun metodo crud.
    - creo index.blade.php: per il form di creazione per per un nuovo recordo nel databse (qui imposto che il codice necessario per il metodo delete).
    - creo create.blade.php per il form di creazione.
        - dato che sono ciuccio, non avevo ancora impostato una home per tutte le views
        - dato che sono ciuccio, non mi ero accorto di non aver creato i layout comune per tutte le views
    - creo show.blade.php per visaulizzare un singolo fumetto
    - creo update.blade.php per rendere possibile la modifica di un fumetto esistente.
- modifico i file comics.php, DatabaseSeeder.php e 2024_09_30_163634_create_comics_table.php per popolare correttamente il database. Dopo di che lancio il comando php artisan       migrate:refresh --seed
- modifico il metodo store ed ci aggiungo delle regole di validazione.
- modifico il metodo update ed ci aggiungo anche qui delle regole di validazione.
