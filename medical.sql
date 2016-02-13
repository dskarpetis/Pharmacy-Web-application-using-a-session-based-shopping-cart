CREATE DATABASE IF NOT EXISTS medical DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

GRANT ALL PRIVILEGES ON medical.* TO 'mdadmin'@'localhost' IDENTIFIED BY '45>89pharm';
USE medical;

CREATE TABLE IF NOT EXISTS pharmacists (
idp INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
email VARCHAR( 50 ),
password VARCHAR( 50 ),
fullname VARCHAR( 50 ),
afm VARCHAR( 10 ),
phonenumber VARCHAR( 50 ),
address VARCHAR( 50 )
);

INSERT INTO pharmacists (email, password, fullname, afm, phonenumber, address) VALUES ("dskarpetis@hotmail.com", "dim12345", "Δημήτριος Σκαρπέτης", "0123456789", "6979230752", "Κίρρας 6");
INSERT INTO pharmacists (email, password, fullname, afm, phonenumber, address) VALUES ("hskarpetis@hotmail.com", "har12345", "Χαράλαμπος Σκαρπέτης", "0123456987", "6973562842", "Βίγλας 3");
INSERT INTO pharmacists (email, password, fullname, afm, phonenumber, address) VALUES ("gtomaras@hotmail.com", "geo12345", "Γιώργος Τομαράς", "0163121987", "6945232122", "Αριστείδου 30");
INSERT INTO pharmacists (email, password, fullname, afm, phonenumber, address) VALUES ("mpetrou@yahoo.com", "mar12345", "Μαρία Πέτρου", "0163336688", "6948877889", "Κωστή Παλαμά 30");
INSERT INTO pharmacists (email, password, fullname, afm, phonenumber, address) VALUES ("npapadopoulos@yahoo.com", "nik12345", "Νίκος Παπαδόπουλος", "0177736111", "6948811119", "Ριανκουρ 60");

CREATE TABLE IF NOT EXISTS medications (
idm INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
code VARCHAR( 50 ),
pname VARCHAR( 50 ),
content VARCHAR( 50 ),
description VARCHAR( 1000 ),
cost VARCHAR(50),
fpa INT(2)
);

INSERT INTO medications (code, pname, content, description, cost, fpa) VALUES ("aa-aa1", "Depon", "24 δισκία", "Το DEPON περιέχει σαν δραστική ουσία την παρακεταμόλη, που έχει ισχυρή αναλγητική και αντιπυρετική δράση, παρόμοια με αυτή του ακετυλοσαλικυλικού οξέος. Το DEPON ανακουφίζει γρήγορα και αποτελεσματικά από τους πόνους, την αδιαθεσία και τον πυρετό επειδή απορροφάται γρήγορα από το γαστρεντερικό σωλήνα", "1.00", "23");
INSERT INTO medications (code, pname, content, description, cost, fpa) VALUES ("aa-aa2", "Panadol Extra", "32 χάπια", "Τα αναβράζοντα δισκία Panadol ExtraR περιέχουν ένα συνδυασμό δύο δραστικών ουσιών: της παρακεταμόλης η οποία έχει αναλγητικές και αντιπυρετικές ιδιότητες και της καφεΐνης η οποία έχει διεγερτική δράση στο Κεντρικό Νευρικό Σύστημα", "1.50", "23");
INSERT INTO medications (code, pname, content, description, cost, fpa) VALUES ("aa-aa3", "mucosolvan", "200mg", "Ως βοηθητικό για τη ρευστοποίηση των βλεννωδών εκκρίσεων της αναπνευστικής οδού σε περιπτώσεις οξειών και χρόνιων βρογχοπνευμονικών παθήσεων βρογχίτιδα, εμφύσημα, τραχειοβρογχίτιδα, χρόνια ασθματική βρογχίτιδα", "6.00", "23");
INSERT INTO medications (code, pname, content, description, cost, fpa) VALUES ("aaaa4", "Augmentin", "375mg", "Το AUGMENTIN ενδείκνυται για βραχυχρόνια θεραπεία μικροβιακών λοιμώξεων, όταν αυτές προκαλούνται από μικροοργανισμούς που παράγουν β-λακταμάσες και είναι ευαίσθητοι σ' αυτό. Η διάρκεια της θεραπείας κυμαίνεται ανάλογα με την ένδειξη χορήγησης και δεν θα πρέπει να υπερβαίνει τις 14 ημέρες.", "9.00", "23");
INSERT INTO medications (code, pname, content, description, cost, fpa) VALUES ("aa-aa5", "Aerolin", "500mg", "Η σαλβουταμόλη προσφέρει βραχείας διάρκειας (4 ώρες) βρογχοδιαστολή με ταχεία έναρξη (5 λεπτά) σε περιπτώσεις αναστρέψιμης απόφραξης των αεροφόρων οδών που οφείλεται σε άσθμα, χρόνια βρογχίτιδα και εμφύσημα. Είναι κατάλληλη σε μακρόχρονη χρήση για την ανακούφιση και προφύλαξη από ασθματικά συμπτώματα.", "15.00", "23");
INSERT INTO medications (code, pname, content, description, cost, fpa) VALUES ("aa-aa6", "Power Health Vitamin C", "20 αναβράζοντα δισκία", "Βιταμίνη C : Η πιο αγαπημένη βιταμίνη… όλων των εποχών, γιατί οι ευεργετικές ιδιότητές της βοηθούν τον οργανισμό σας ανεξαρτήτως καιρού. Η βιταμίνη C είναι ένα από τα περισσότερο διαδεδομένα συμπληρώματα διατροφής. Χρησιμοποιείται κυρίως για την ενίσχυση της άμυνας του οργανισμού. Προστατεύει από τις ιώσεις και τα κρυολογήματα, καθώς επίσης δίνει ζωντάνια ενέργεια στον οργανισμό και ομορφαίνει το δέρμα.", "5.25", "23");
INSERT INTO medications (code, pname, content, description, cost, fpa) VALUES ("aa-aa7", "Solgar Folic Acid", "400mg", "Λειτουργεί μαζί με τη Β12 και τη βιταμίνης C στην αξιοποίηση των πρωτεϊνών και είναι απαραίτητο για τον σχηματισμό του αίματος. Βοηθάει στην μείωση των επιπέδων της βλαπτικής ομοκυστεΐνης και είναι χρήσιμο σε περιπτώσεις αναιμίας λόγω ελλείψεως φολικού οξέος, σε περιπτώσεις κατάθλιψης και στη δυσπλασία του τραχήλου της μήτρας.", "6.50", "23");
INSERT INTO medications (code, pname, content, description, cost, fpa) VALUES ("aa-aa8", "HealthAid Vitamin E", "30 δισκία", "Η Βιταμίνη Ε είναι λιποδιαλυτή βιταμίνη, γνωστή κι ως παραγωγική (d-alpha tocopherol), που δρα ως ενεργό αντιοξειδωτικό, εμποδίζοντας την οξείδωση της βιταμίνης Α, του σεληνίου, των αμινοξέων και της βιταμίνης C, βοηθώντας στη διατήρηση της υγείας των κυττάρων και του δέρματος. Η βιταμίνη Ε είναι χρήσιμη για υγιή ερυθρά αιμοσφαίρια, βοηθά στην επιβράδυνση της γήρανσης και ελαττώνει τις κράμπες και τη μυϊκή δυσκαμψία των αθλητών.", "23.60", "23");
INSERT INTO medications (code, pname, content, description, cost, fpa) VALUES ("aa-aa9", "Lamberts Vitamin K", "60 δισκία", "Με το γενικό όρο Βιταμίνη Κ ονομάζουμε ένα γκρουπ λιποδιαλυτών βιταμινών που αποτελείται από τη βιταμίνη Κ1 και τη βιταμίνη Κ2. Η Βιταμίνη Κ1, γνωστή και ως φυλλοκινόνη, ανευρίσκεται σε υψηλές ποσότητες στα πράσινα φύλλα, στο μπρόκολο, στα λαχανάκια Βρυξελλών και στα φυτικά έλαια, όπως το κραμβέλαιο και το ελαιόλαδο.", "31.00", "23");
INSERT INTO medications (code, pname, content, description, cost, fpa) VALUES ("aa-a10", "Trachisan", "20 δισκία", "Ο γιατρός ή ο φαρµακοποιός σας χορήγησε το Trachisan για να σας ανακουφίσει από τον πόνο στο στόµα ή στολαιµό σας. Το Trachisan περιέχει δραστικές ουσίες για την αντιµετώπιση των συµπτωµάτων των φλεγµονών στο στόµα και τον φάρυγγα. Οι φλεγµονές µπορεί να οφείλονται σε παθολογικούς ή άλλους παράγοντες. Τα συµπτώµατα είναι ερυθρωποί και ευερέθιστοι βλεννογόνοι µε κάψιµο στο στόµα, ή δυσκολία στην κατάποση, πονόλαιµος και βραχνάδα.", "2.50", "23");
INSERT INTO medications (code, pname, content, description, cost, fpa) VALUES ("aa-a11", "Trebon", "20 φακελάκια", "Κοκκία για πόσιμο εναιώρημα, σε συσκευασία μιας δόσης. Κάθε φακελίσκος με κοκκία για πόσιμο εναιώρημα, σε συσκευασία μιας δόσης περιέχει -100 & -200 mg ACETYLCYSTEINE, αντίστοιχα.", "5.00", "23");
INSERT INTO medications (code, pname, content, description, cost, fpa) VALUES ("aaa12", "Biotrue Multi-Purpose", "300ml", "Ένα διάλυμα πολλαπλών χρήσεων για μαλακούς φακούς επαφής από την Bausch + Lomb. Το Biotrue βασίζεται σε φυσικό λιπαντικό ματιών το οποίο ταιριάζει με το pH των δακρύων, διατηρεί ορισμένες πρωτεΐνες των δακρύων, καταπολεμά τα μικρόβια και καθαρίζει τους φακούς.", "10.00", "23");