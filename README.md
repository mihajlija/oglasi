# 📃Aplikacija za oglašavanje poslova

# 1. Uvod
## 1.1 Cilj razvoja

Aplikacija treba da omogući firmi da raspisuje konkurse za poslove i da prima prijave kandidata sa njihovim biografijama, propratnim pismima i kontakt podacima.

## 1.2 Obim sistema
- Pregled aktivnih oglasa za posao
- Slanje prijave za posao sa traženim podacima
- Filtriranje oglasa po lokaciji
- Responsive dizajn, prilagođava se uređaju
- Logovanje u administratorski deo (samo admin)
- Pregled oglasa i prijava (samo admin)
- Predloženi status prijave i mogućnost promene statusa (samo admin)
## 1.3 Softverska i hardverska zahtevnost

Za izradu web aplikacije su korišćene aktuelne web tehnologije.

- HTML5
- CSS3
- PHP7
- mySQL
- Tachyons CSS framework

Razvojno okruženje i softverski alati:

- Netbeans
- Xampp
- MySQL Workbench
- Github
- Now
## Prikaz proizvoda

**1.3.1** **Perspektiva proizvoda**
I krajnji korisnik i administrator mogu pristupiti sistemu pomoću različitih uređaja sa internet konekcijom, od telefona, preko tableta, računara i televizora.

**1.3.2** **Funkcije proizvoda**

![](https://d2mxuefqeaa7sj.cloudfront.net/s_7F330F7D4EC70FFE0375E1AA0A6006874104C94B4EE5C0784152B2DE01065861_1505771044154_21849113_2071431772882548_2017098811_n.png)


**1.3.3** **Karakteristike korisnika**
Postojaće dve vrste korisnika:

1. Administrator
2. Krajnji korisnik

Administrator je zaposlen u kompaniji, moze da unosi oglase, pregleda prijave i autorizovan je da odredi status prijave na oglas. On će biti obučen za rad u skladu sa svojom ulogom od strane člana razvojnog tima.

Krajnji korisnik ima mogućnost pregleda oglasa i slanja prijave na oglas.


# 2. Funkcije
![](https://d2mxuefqeaa7sj.cloudfront.net/s_7F330F7D4EC70FFE0375E1AA0A6006874104C94B4EE5C0784152B2DE01065861_1505772369202_screenshot-creately.com+2017-09-19+00-04-06-563.png)


**Administrator**
Administrator je korisnik koji ima privilegije za postavljanje oglasa. Administrator moze da se uloguje na sistem i nakon toga pristupa svom nalogu odakle može da postavlja oglase. Administrator ima prikaz svih postavljenih oglasa. Administrator pored dodavanja, može da izmeni svoj oglas ili da ga obriše iz sistema. Nakon završetka svih aktivnosti na sajtu, administrator treba da se odjavi(logout).

**Neregistrovani korisnik**
Posetioci sajta imaju prikaz svih oglasa, mogu da vrše filtriranje oglasa po gradovima i mogu da posalju prijavu na oglas.


# 3. Arhitektura sistema

Sistem treba da bude realizovan u MVC arhitekturi. MVC arhitektura je softverski patern *Model-view-controller* koji odvaja prikaz informacija od interakcije korisnika sa tim informacijama. 

![](https://www.codeproject.com/KB/aspnet/344292/mvc.PNG)


[https://www.codeproject.com/KB/aspnet/344292/mvc.PNG](https://www.codeproject.com/KB/aspnet/344292/mvc.PNG)


# 4. Struktura baze podataka
![](https://d2mxuefqeaa7sj.cloudfront.net/s_7F330F7D4EC70FFE0375E1AA0A6006874104C94B4EE5C0784152B2DE01065861_1505769641559_21903654_2071219542903771_1940730140_n.png)


Tabela “Position” sadrzi sledeca polja:

      `position_id` INT UNSIGNED NOT NULL AUTO_INCREMENT - primarni kljuc
      `location_id` INT UNSIGNED NOT NULL - strani kljuc referencira `location` tabelu
      `title` VARCHAR(128) NOT NULL - refrencira user tabelu
      `description` VARCHAR(250) NOT NULL - opis oglasa
      `requirements` VARCHAR(45) NOT NULL - potrebna znanja i vestine
      `responsibilities` VARCHAR(45) NOT NULL - zaduzenja
      `languages` VARCHAR(45) NULL - pozeljno znanje stranih jezika
      `education` ENUM('4', '5', '6', '7', '8') NULL - pozeljan nivo obrazovanja
      `budget` INT UNSIGNED NULL - budzet za platu
      `age` ENUM('20-30', '30-40', '40-50') NULL - pozeljan uzrast kandidata
      `start_date` DATE NOT NULL - datum pocetka prikazivanja oglasa
      `end_date` DATE NOT NULL - datum isteka prikazivanja oglasa
      `user_id` INT UNSIGNED NOT NULL - strani kljuc, ukazuje na user tabelu
      INDEX `fk_position_1_idx` (`location_id` ASC)
      INDEX `fk_user_idx` (`user_id` ASC)


# 4. Dizajn aplikacije
![](https://d2mxuefqeaa7sj.cloudfront.net/s_7B45FD19AAE11EEF5A53A8904F908F4D67B68EB38FD03308CABD4844C77F05C8_1505810929387_U-kbMbcjQpqVyAt8a2cSEg.png)


https://wwwjob-addev-oiarfsrmzn.now.sh/

# 4. Pogodnost za upotrebu

Potrebno je da i administratori i krajnji korisnici budu u mogućnosti da pristupe sajtu i koriste ga pomoću mobilnih uređaja sa slabom internet konekcijom.

# 5. Projektna ograničenja

Zbog kratkog roka za isporuku, projekat se izvodi u dve faze, pri cemu prva MVP faza treba samo da omoguci funkcionalnosti postavljanja i pregledanja oglasa.



