--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`answer_id`, `subject`, `question_id`, `user_id`, `creation_date`) VALUES
(10, 'Patiente, on va ouvrir une rubrique: \"Voyance et divination\" dans laquelle les questions sans aucune information recevront les réponses des plus célèbres spirites et médiums. Courage...', 34, 18, '2019-05-02 22:31:09'),
(13, 'Salut,  Il y a bien un éditeur dans Unity 3D mais qui se limite à des cubes, des sphères, des cylindres, etc.  Pour les formes plus complexes tu peux effectivement utiliser par exemple Blender et importer les objets faits sous Blender dans Unity 3D.  Sous Blender une fois que tu as terminé, il te suffit de l’enregistrer sous le même dossier que les assets de ton projet Unity..  Pour info il y a pas mal de développeurs Unity 3D ici sur le forum prog jeux : http://www.jeuxvideo.com/forums/0-31-0-1-0-1-0-creation-de-jeux.htm . Il y à un même un sujet dédié Unity 3D ici : http://www.jeuxvideo.com/forums/1-31-8674871-1-0-1-0-j-aide-les-gens-dans-unity.htm Et il existe aussi une FAQ Unity 3D : https://jeux.developpez.com/faq/unity/ Et aussi des Tutoriels Unity 3D : http://unity.developpez.com', 35, 18, '2019-05-02 22:44:04'),
(14, 'Merci infiniment pour cette réponse Bonne soirée', 35, 9, '2019-05-02 22:45:02'),
(15, 'Le livre de Goodfellow est considéré comme la reference, apres je sais pas si ca veut forcement dire qu\'il est le mieux pour apprendre mais de ce que j\'en ai entendu c\'est tres complet', 36, 10, '2019-05-02 22:48:23'),
(16, 'Le bouquin de base en IA, c\'est le russell et norvig je pense: Artificial Intelligence: A Modern Approach, Global Edition', 36, 18, '2019-05-02 22:49:00'),
(17, 'Je ne connais pas de formations spécialisée big data, mais je connais des formations qui incluent le big data dans des filières de machine learning / apprentissage automatique. Big data c\'est vaste, tu veux travailler sur le stockage des données, des algorithmes de mapreduce, ou sur l\'analyse des données stockées, ou les deux ?', 37, 11, '2019-05-02 22:56:06'),
(18, 'Plutôt l\'analyse des données et les algorithmes', 37, 18, '2019-05-02 22:56:35'),
(19, 'Pouvez-vous préciser SVP le format de ce document ?\r\n\r\nParce que pour moi, Spark est fait à la base pour traiter des données :\r\n\r\n- ligne à ligne en utilisant les RDD (Resilient Distributed Dataset)\r\n- tabulaires (en ligne et en colonne si vous préférez, comme les tables de bases de données ou les fichiers CSV) en utilisant les DataFrames\r\n\r\nAprès il existe des extensions comme Spark SQL, ou bien des connecteurs pour s\'interfacer avec un autre type de logiciel, comme par exemple des connecteurs pour se connecter à des bases de données NoSQL orientées documents JSON (come MongoDB par exemple).\r\n\r\nMerci', 38, 12, '2019-05-10 08:43:13'),
(21, 'Je ne suis pas expert du tout, mais pour moi \"extraire des mots ou des phrase à partir du web\", cela existe déjà depuis belles lurettes.\r\n\r\nC\'est une tâche faite par ce qu\'on appelle des Crawlers, en français des collecteurs. Je crois que l\'on parle d\'ailleurs de Web Scraping. De plus vous n\'avez qu\'un site Web, ce qui va faciliter la tâche.\r\n\r\nEn cherchant sur Internet, j\'ai trouvé ce logiciel Open Source en python :\r\n\r\nhttps://scrapy.org/\r\n\r\nPar contre, par rapport au mot donné comme input, ce mot sert juste à filtrer les données extraites du site Web, ou bien il y a une véritable analyse sémantique derrière ?\r\n\r\nEn tout cas, pour tout ce qui est analyse de texte, j\'ai déjà entendu parler des librairies telles que NLTK ou encore SciKit Learn :\r\n\r\nhttp://scikit-learn.org/stable/\r\n', 38, 12, '2019-05-10 08:45:01'),
(22, 'Je vous remercie pour votre aide, crawler sera une solution efficace pour cette tâche.\r\n\r\nMais, je voudrai savoir après avoir réalisé le crawler c\'est à dire l\'extraction de la page web désirée, où elle va être stockée ? et est ce que je peux par la suite accéder à cette page et extraire les mots ou les phrase que j\'en ai besoin ?\r\n\r\nle mot donné en input sert à determiner quels mots à sélectionner à partir de la page web: si un mot X (dans la page web) est lié sémantiquement au mot donné en input il sera alors extrait. Donc, cela peut être réalisé par une analyse sémantique ?', 38, 18, '2019-05-10 09:43:58'),
(25, 'Je ne peux pas vous dire, je n\'ai pas d\'expérience sur le sujet. A mon avis, c\'est le moment de tester. Pas besoin de Spark je pense. Ce qu\'il vous faut, c\'est un environnement en Python et aussi de télécharger un Crawler en Open Source.\r\n\r\nJe pense que vous allez récupérer votre page Web sous forme d\'un fichier, fichier que vous pourrez traiter par la suite.\r\n\r\nJe sais qu\'il y a des algorithmes d\'analyse sémantique. Mais après je ne sais pas ce que vous voulez faire. Il faudrait nous donner un exemple concret.\r\n\r\nPar exemple, si je vous donne le mot Gourmandise en input, et que dans la page Web figurent les mots Bonbons, Gâteaux et Chocolat, ils seront extraits ou pas ?', 38, 12, '2019-05-10 09:47:40'),
(26, 'Oui les mots \"Bonbons, Gâteaux et Chocolat\" seront extraits si on a le mot \"Gourmandise\" comme input. \r\n\r\nSi on prend un autre exemple: le mot en input est : \"Education\" et dans la page web on a les mots: { Lire, Animal , Apprendre, Livre, Jouer }.\r\nAlors, les mots qui doivent être extraits sont: \"Lire, Apprendre, Livre\". Tandis que les mots qui ne doivent pas être extraits sont: \"Animal, Jouer\".', 38, 18, '2019-05-10 09:48:18'),
(27, 'Bonjour à tout les deux,\r\n\r\nJe réponds à deux points avec l\'utilisation de Spark puis au traitement sémantique :\r\n\r\nSpark est utilisé essentiellement dans un domaine distribuer. Pour cela il faut savoir de quel ordre est ta volumétrie de donnée. Si elle nécessite plusieurs serveurs en parallèle pour un même calcul. D\'autres outils permettent de faire le même type de calcul sans passer par un système distribuer qui peut être très complexe à mettre en place.\r\nPour l\'analyse sémantique, il faut définir la langue, mais aussi le type d\'information recherché. Pour t\'aiguiller tu peux regarder du côté de l\'université de Standford avec CoreNLP par exemple. D\'autres recherches peuvent être menées sur internet selon ton besoin.\r\n\r\n\r\nAu plaisir de te lire,', 38, 11, '2019-05-10 09:48:57'),
(28, 'Super idée de site! j\'adore!', 15, 20, '2019-05-03 12:19:21'),
(29, 'Je suis d\'accord avec Jordan! d\'ailleurs, je like son commentaire!', 15, 21, '2019-05-03 12:22:11'),
(31, 'Merci Camille! J\'apprécie ton soutien!\r\n\r\nViens, marions-nous! <3 \r\n', 15, 20, '2019-05-03 12:31:34'),
(32, 'Bonjour Jordan!\r\n\r\nBien sur que tu peux! c\'est même carrément conseillé, ça t\'évite des variables à n\'en plus finir et des codes à rallonge!\r\nn\'hésite pas à te servir de cette technique de programmation. tu verras qu\'elle te sortira souvent des épines du pied!\r\n\r\nBien à toi.', 16, 18, '2019-05-03 12:36:38'),
(41, 'Bonjour \r\n\r\nPeut être du RPG ?Ou alors un paramétrage d\'un truc style BarCode400', 23, 26, '2019-05-14 17:19:15'),
(42, 'Après avoir cherché de mon côte, C\'est à mon avis de l\'EPL (Eltron Programming Language), vieux language de Zebra (maintenant on utilise le ZPL) \r\nhttps://en.wikipedia.org/wiki/Eltron...mming_Language\r\n\r\nVous avez la doc ici :\r\nhttps://web.archive.org/web/20110716...ar3=TLP%202844', 23, 26, '2019-05-14 17:19:46'),
(43, 'Hey Fusti! Merci beaucoup pour ta réponse ;-)', 23, 25, '2019-05-14 17:20:42'),
(44, 'Bonjour Nefertiti2018,\r\n\r\nJe vais devoir te demander plus d\'informations sur ton problème.\r\nDate d\'achat, carte mère, processeur, RAM,... Parce que avec ceci, nous ne pouvons pas vraiment t\'aider.\r\n\r\nEssaye de voir dans ton Gestionnaire de taches si tout se passe convenablement?', 22, 18, '2019-05-14 17:23:32'),
(45, 'Je vais regarder ça, je reviens vers toi plus tard. Merci Bruno!', 22, 24, '2019-05-14 17:24:09'),
(46, 'Merci pour ton info bruno!\r\nToujours là pour aider hein? ;-)', 16, 20, '2019-05-14 17:25:19'),
(47, 'bonjour, je ne comprends pas bien ce que tu veux compter mais si d2 est la transposée de d1 alors d2[i,j] n\'est autre que d1[j,i] donc le tableau d2 ne sert à rien. Tu peux aussi bien tester d1[m,j]==d1[j,k] au lieu de d1[m,j]==d2[k,j]', 24, 18, '2019-05-14 17:29:55'),
(48, 'Merci pour votre réponse.\r\nEn fait ce calcul en soi n\'a pas de sens. \r\nC\'est comme si je mélangeais des torchons et des serviettes.\r\nChaque ligne représente des valeurs de 0 à 2 qui expriment la représentativité de combinaisons selon des classements.\r\nCertains classements sont naturels par ordre chronologique, d\'autres sont fonctions de critères de tri, d\'autres encore sont des fonctions de type f->g et g->f.\r\n\r\nC\'est à partir d\'une observation que j\'ai voulu voir ce que donnait ce calcul.\r\nLes matrices carrés se développent à l\'infini et permettent de superposer des \"plans d\'information\".\r\n\r\nJe regarde votre solution que j\'avais d\'ailleurs expérimenté mais sans avoir le résultat escompté.\r\nJ\'ai dû faire une erreur dans mes indices.', 24, 27, '2019-05-14 17:30:52'),
(49, 'Bonjour kevin, Mon cadeau sera de ne pas répondre à ta question dupliquée. \r\nlis les règles du forum s\'il te plaît...\r\nC\'est mon dernier avertissement, le coup suivant se résultera par un ban.', 26, 18, '2019-05-14 17:36:24'),
(52, 'Je rejoins bruno sur sa réponse. c\'est très compliqué de répondre à ce genre de questions...\r\ntout dépend de ce que tu fais sur ton ordinateur en temps normal!\r\nil pourrait-être bourré de virus... quel est ton anti-virus?\r\n\r\nBien à toi', 22, 20, '2019-05-14 17:40:12'),
(53, 'Bonjour Jordan!\r\n\r\nTu dois commencer par te trouver un langage de programmation. T\'expliquer lequel choisir reviendrait à te donner le pour et le contre de tous les langages et je n\'en suis pas capable. tu dois faire tes petites recherches.\r\ncela dit, j\'ai commencé par java et tu trouveras d\'excellents cours t\'apprenants les bases de ce langage sur OpenClassRooms. je t\'encourage à fond dans ta démarche!\r\n\r\nPenses aussi à regarder le cours de php quand tu auras fini java. il t\'apprendras à créer des sites comme celui-ci!', 27, 18, '2019-05-14 17:44:55'),
(54, 'Super! merci beaucoup bruno!\r\nEncore une fois, tu apportes la solution :-)', 27, 20, '2019-05-14 17:45:24'),
(55, 'T\'as déjà entendu parler de google chrome? c\'est plus efficace que Firefox, tu sais...', 22, 22, '2019-05-14 17:47:50');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'General'),
(2, 'Algorithms'),
(3, 'AI'),
(4, 'Big Data'),
(5, '3D Graphics'),
(6, 'Web');

-- --------------------------------------------------------


--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`question_id`, `title`, `subject`, `user_id`, `solved`, `duplicated`, `category_id`, `creation_date`, `right_answer`) VALUES
(15, 'Bonjour et bienvenue!', 'Salut à toi!\r\nCe premier topic ne servira que d\'exemple concernant les différentes possibilités de ce site.\r\nDans un premier temps, sache que ici, nous te demandons uniquement d\'aider les autres. le but est de répondre aux questions le plus possible!\r\nd\'ailleurs, si toi même tu as une question, tu es totalement libre de la poser!\r\n\r\nc\'est même suggéré!\r\n\r\nChaque réponse possède un système de votes. tu peux voter pour ou contre la réponse. un vote pour signifie que tu es d\'accord avec la réponse. un vote contre signifie que tu ne l\'es pas. tu peux te servir de ce dernier type de votes dans le but de dénoncer une réponse qui cherche à nuire à celui qui a posé la question. pour dénoncer un fake, en gros. \r\n\r\nun exemple type, c\'est \"Supprime le dossier intitulé \"Windows\" et redémarre ton PC\". Ce genre de réponses mérite un max de votes négatifs. cela nous aidera, nous les admins, à suspendre un compte.\r\n\r\nen effet, les comptes ayant eu trop de votes négatifs à notre gout seront suspendus par nos soins. évidemment, ce n\'est pas automatique, nous vérifions si les votes négatifs sont justifiés ou non. quelqu\'un qui se plante et quelqu\'un qui cherche vraiment à faire du mal sont deux choses bien différentes!\r\n\r\nveille à bien choisir ta catégorie! Ne pose pas de question de développement web dans la catégorie \"intelligence artificielle\", ça n\'a pas de sens! de plus, question de structure, c\'est beaucoup plus pratique pour nous.\r\n\r\nNous te remercions d\'entrée de jeu pour ton inscription sur \"ClassNotFound\". nous espérons que ton séjour parmi nous sera des plus agréables!\r\nprends soin de toi!\r\n\r\nEn plus, je peux modifier ma question!', 19, 1, 0, 1, '2019-05-03 12:18:47', 28),
(16, 'Un souci avec le jeu guerrier', 'Bonjour à tous!\r\n\r\nVoilà, étant jeune étudiant de l\'institut Paul Lambin, je me dois de créer le fameux \"jeu guerrier\".\r\nLe souci étant que j\'ai un problème qui pourrait se simplifier assez facilement.\r\n\r\nmon code se fait en java, bien entendu, mais puis-je me servir à plusieurs reprises du séparateur \".\" pour faire des appels de méthodes sur d\'autres objets? par exemple, puis-je faire une commande du style\r\n\r\njeu.getGuerrier.attaque(Boris); ?\r\n\r\ncela ne posera-t-il pas de soucis?\r\nmerci! ', 20, 0, 0, 2, '2019-05-03 12:35:14', NULL),
(22, 'Lenteur de PC', 'Bonsoir,\r\nMon PC rame sous Windows xp édition familiale\r\nje viens de télécharger la version firefox et maintenant je peux aller sur Internet mais le problème c\'est qu\'il est lent. J\'ai effectué un nettoyage du disque mais toujours lent\r\n\r\nMerci de votre aide!', 24, 0, 0, 1, '2019-05-14 17:14:34', NULL),
(23, 'Quel langage de programmation est ce ?', 'Bonjour,\r\n\r\nJe récupère un historique venant d\'un AS400, il existe sur ce système un programme qui génère un fichier PRN, afin que les informations qui sont dedans soient imprimée par une imprimante a étiquette Zebra monochrome.\r\nL’évolution des demandes en interne veut que nous imprimions maintenant de la couleur sur nos étiquettes.\r\n\r\nNous avons donc acheté une nouvelle imprimante étiquette couleur chez epson (TM-C3500)\r\n\r\nJ\'ai testé avec printfile, logiciel utilisé actuellement pour imprimer les PRN vers l\'imprimante Zebra, mais sur l\'Epson, j\'ai le contenu du fichier PRN qui est imprimé!\r\n\r\ncela ressemble a ceci:\r\nQ400,019\r\nq831\r\nrN\r\nS4\r\nD7\r\nZT\r\nJB\r\nOD\r\nR16 , 0\r\nN\r\nA40 , 41 , 0 , 1, 2, 2, N, \"Article\"\r\n.\r\n.\r\n.\r\nP04\r\n\r\nJ\'ai pensé dans un premier temps a du PostScript, mais apres des recherches je ne retrouve pas c\'est instructions dans du PS.\r\nSavez vous a quoi cela correspond ?\r\net est ce possible de \'faire comprendre\' à l\'epson ce code ?\r\n\r\nMerci de votre aide.\r\n', 25, 0, 0, 1, '2019-05-14 17:18:20', NULL),
(24, 'Calcul d\'égalités sur matrice', 'Bonjour,\r\n\r\nJe planche sur un problème informatique.\r\nJ\'ai une matrice 5*5 dont je veux déterminer les égalités entre lignes et colonnes.\r\n\r\nExemple \r\nl1-1 0 2 0 1 \r\nl2- 0 2 0 1 1\r\nl3- 1 1 1 0 0\r\nl4- 0 1 0 1 0 \r\nl5- 2 2 0 0 1\r\n\r\nJ\'ai trouvé une solution en recopiant la matrice ci dessus en l\'inversant et en employant le code suivant\r\nen Pascal.\r\nD1 est la matrice originale\r\nD2 la matrice inversée\r\nD3 la matrice contenant les égalités de chaque ligne avec chaque colonne.\r\n\r\n\r\nMon code :\r\nm:=0;\r\nfor i:=1 to 5 do\r\nbegin\r\nm:=m+1;\r\nfor j:=1 to 5 do\r\nbegin\r\nfor k:=1 to 5 do if d1[m,j]=d2[k,j] then d3[m,k]:=d3[m,k]+1;\r\nend;\r\nend;\r\n\r\nTout juste soit elle, cette solution ne me satisfait pas. J\'aimerais en trouver une autre sans transposer la matrice. \r\n\r\nMerci pour vos réponses', 27, 0, 0, 2, '2019-05-14 17:29:31', NULL),
(26, 'Mon pc il et len', 'bongour mon pc il et lant et g acheutè au jour dwi! jeu c pa kwa fèr c un kdo pour mon aniversère g u 9 an hier kelkkun pour méD svp?\r\non dira ke c mon kdo de votr pars!', 28, 0, 1, 6, '2019-05-14 17:35:12', NULL),
(27, 'Apprendre à coder', 'Bonjour à tous!\r\nVoilà, non cette question n\'est pas un troll. je suis passionné de codage, ça me fascine, mais je ne sais pas comment ça fonctionne et je rêve d\'apprendre depuis beaucoup trop longtemps.\r\n\r\nDonc voici ma question, savez-vous où je peux aller voir pour trouver des cours efficaces pour l\'apprentissage de la programmation?\r\n\r\nMerci à tous!', 20, 0, 0, 2, '2019-05-14 17:42:41', NULL),
(33, 'Problème script protection PHP', 'Bonjour,\r\n\r\nSuite au technique de Bypass starpass, j\'ai installé un script de protection fournit par Starpass.\r\n\r\nAlors voilà, celui-ci marche niquel (protection des Bypass) et fonctionne bien lors des achats.\r\n\r\nMais quelques petit malin utilise des logiciels de scan d\'URL, il obtienne ma page de sécurité qui est sous cette forme : http://Monsite.fr/E5F5E11R51G55T56H5Y56T56R.php puis il l\'insère dans leur barre d\'URL et font entré.. Et paf ! Il arrive donc à la page d\'accès.\r\n\r\nJ\'aimerais savoir comment sécurisé cette page ?\r\n\r\nPS : Je donne mes sources si besoin.\r\n\r\nMerci d\'avance', 18, NULL, 0, 6, '2019-05-02 22:26:56', NULL),
(34, 'Besoin d\'aide en 3D (novice)', 'Salut, j\'ai besoin d\'une modélisation 3d d\'un fichier jpg. Le truc c\'est que j\'ai aucune connaissance du monde informatique. Une modélisation sur 3 centimètres.\r\n\r\nQuelqu\'un peut m\'aider ?', 10, NULL, 0, 5, '2019-05-02 22:30:22', NULL),
(35, 'Creer un jeu avec unity 3D', 'Bonjour a tous,\r\nJe voudrais créer un jeu sous unity 3D mais j\'ai un problème.\r\nPour faire les graphismes, les personnages de mon jeux il faut sue j utilise blender ou unity suffit ?\r\nSi Blender est mieux comment importer les fichiers blender vers unity ?\r\nMerci d\'avance.', 9, 1, 0, 5, '2019-05-02 22:39:28', 13),
(36, 'Un bon livre d\'IA/deep learning ?', 'Salut :(\r\nJ\'ai envie de m\'initier au deep learning et je cherche un livre sur le sujet, je suis tombé sur ces deux-là mais je ne sais pas ce qu\'ils valent vraiment :\r\nhttps://www.amazon.fr/Deep-Learning-Yoshua-Bengio/dp/0262035618/ref=sr_1_1?s=videogames&ie=UTF8&qid=1544873985&sr=8-1&keywords=deep+learning\r\n\r\nhttps://www.amazon.fr/Apprentissage-artificiel-learning-concepts-algorithmes/dp/2212675224/ref=sr_1_5?s=videogames&ie=UTF8&qid=1544873985&sr=8-5&keywords=deep+learning\r\n\r\nVous me conseilleriez lequel des deux ? Ou alors si vous en connaissez d\'autre.\r\n\r\nMerci', 9, 0, 0, 3, '2019-05-02 22:47:07', NULL),
(37, ' [Help] Faire des études dans le big data', 'Bonjour,\r\n\r\nJ\'ai un DUT GEII et je suis en train de faire une L3 informatique en Irlande (Erasmus) .\r\nJe voudrais continuez mes études dans l\'informatique afin de travailler dans le big data.\r\n\r\nCependant je m\'adresse à vous car j\'ai du mal à me retrouver avec toute les formations d’ingénieur qu\'on me propose. Peut-être que parmi vous, certain son déjà dans le monde du travail et savent d\'où sorte les gens compétent.\r\n\r\nSi vous connaissez aussi des bonnes formations en informatique général, je suis preneur, même si cela ne se trouve pas en France.\r\n\r\nCordialement SaiyajiN :p', 18, 1, 0, 4, '2019-05-02 22:52:30', 17),
(38, 'Utilisation de Spark pour extraire des données', 'Bonjour,\r\n\r\nJe suis entrain de réaliser un mini-projet avec le framework Spark\r\n\r\nL\'idée est d\'utiliser Spark pour extraire des données bien spécifiques à partir d\'un document.\r\n\r\nJe suis débutante dans le domaine et j\'aimerais bien avoir quelques recommandations d\'algorithmes qui permettent de réaliser cette tâche. J\'ai beaucoup cherché dans le net mais je n\'ai pas trouvé ce que je cherche exactement.\r\n\r\nEst ce qu\'il y a quelqu\'un qui peut m\'aider pour avoir quelques clarifications pour ce projet ?\r\n\r\nTous mes remerciements.\r\nCordialement.', 18, 1, 0, 4, '2019-05-10 08:41:16', 27),
(39, 'Concecption d\'un jeu vidéal avec Unity', 'Bonjour a tous,\r\n\r\nJe voudrais créer un jeu sous unity 3D.\r\nPour faire les graphismes, les personnages de mon jeux il faut sue j utilise Cinema4D ou unity suffit ?\r\n\r\nMerci beaucoup.', 15, NULL, 1, 5, '2019-05-10 10:28:53', NULL);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `pseudo`, `first_name`, `last_name`, `email`, `admin`, `disabled`, `password`) VALUES
(9, 'Dark666', 'YauraPasDeReponses', 'posePasDeQuestions', 'dark@666.be', 1, 0, '$2y$10$kpPh1vD6DhjI1/pQqs.7sePH7jyF49yhqtvRMmjvFxwCoUoIfKU0.'),
(10, 'Kitchee', 'Bera', 'Uyar', 'bera@uyar.be', 0, 1, '$2y$10$BDnsIova0HxkGyYfJin3I.seVb0ww.Wjjcfissu0k4SzfQT2uJKZ2'),
(11, 'Lavabo', 'Annick', 'Dupont', 'dupont@annick.ipl.be', 0, 0, '$2y$10$GsTUKGMoQJw2tLN45L4kK.Wst.0YOUo1f/wRw7dt3kvPsXI7IA706'),
(12, 'Energizor', 'Luc', 'Dupont', 'luc.dupont@gmail.com', 0, 0, '$2y$10$yaaC2vGECntmefpCumVi6u/pFWhuwEiW1nWvFfQwI1csvYR6gjXoi'),
(15, 'leFouDu93', 'Charlie', 'Smet', 'charlie@live.be', 0, 0, '$2y$10$S/nzN0s9uCaJ8dEKVEPS0OEapeoTRpyN6KiafvE548nARyEdg4Xde'),
(18, 'SaiyajiN', 'Oussama', 'ELB', 'oussamaelb@gmail.com', 1, 0, '$2y$10$UmImcsDm.q7RRap9XKTyZOMPS2L6/jqsq16wGcagK9J2zZEpIUvBm'),
(19, 'Bloverius', 'bruno', 'loverius', 'loverius.bruno@gmail.com', 1, 0, '$2y$10$LWPdxoZDQjyODsKjpKVs/.I4yMQDdAxcU1NQGBmPeupMeWzC0Bj4a'),
(20, 'jojo', 'Jordan', 'Loverius', 'jordan612@hotmail.fr', 0, 0, '$2y$10$KZB/qYox1A6uSq/8Q8xKHuVXBVzRbyKKZ9abZzOBGxbtQyOnLpZjG'),
(21, 'camso', 'Camille', 'Fourtine', 'camille.loverius@gmail.com', 0, 0, '$2y$10$Nr3cJqXn/tzk5VnyUbOTaedz2LBadi2k7GlehOxI.ycPMBvWL9gsC'),
(22, 'cvolont', 'Volont', 'céline', 'celine.volont@hotmail.com', 1, 0, '$2y$10$R3zG0IynJG6RXt84C/o7purFYtnmSatozbwkhf32RLfL5WDpWO/Ki'),
(24, 'Nefertiti2018', 'Titi', 'Nefer', 'Nefertiti2018@hotmail.fr', 0, 0, '$2y$10$rqvIyOGs/9qBDnRwPbC5NOFEVYER59IpXC3TQDd.JGcF3RwY.KWWu'),
(25, 'laurchante', 'chante', 'laur', 'laurchante@hotmail.com', 0, 0, '$2y$10$NgCV4vtRXZsyd49lVUoFguV8drZf4ExmR5RXpO9M2TdaEwMfhGmMW'),
(26, 'Fustigator', 'Gator', 'Fusti', 'Fustigator@hotmail.com', 0, 0, '$2y$10$BQaxWq.adtOU.B5yK7jcCezj15kqwMFCpZaDyerFscQgf1s10ZWaS'),
(27, 'Debutant_virtuel', 'noob', 'virtual', 'debutant_virtuel@hotmail.com', 0, 0, '$2y$10$i6rBpDpWs6pXsPCGlF04v.PjudXzRDTzzvlZZ6cLF0Bb8oSqI0M5m'),
(28, 'XxleBGdu69xX', 'delva', 'kevin', 'XxleBGdu69xX@hotmail.com', 0, 0, '$2y$10$nA8HhR5dWFYxMMEnch9Z2.UHQzDlm1yjkII9kOvfYZLzkyCvJuKK2');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `votes`
--

INSERT INTO `votes` (`author`, `answer`, `user_id`, `answer_id`, `value_vote`) VALUES
(9, 13, 9, 13, 1),
(9, 14, 9, 14, 1),
(9, 15, 9, 15, 1),
(9, 16, 9, 16, 1),
(9, 18, 9, 18, 1),
(11, 10, 11, 10, -1),
(11, 19, 11, 19, 1),
(11, 21, 11, 21, 1),
(11, 27, 11, 27, 1),
(18, 10, 18, 10, -1),
(18, 15, 18, 15, 1),
(18, 16, 18, 16, 1),
(18, 17, 18, 17, 1),
(18, 18, 18, 18, 1),
(18, 19, 18, 19, 1),
(18, 27, 18, 27, 1),
(18, 28, 18, 28, 1),
(18, 29, 18, 29, 1),
(18, 31, 18, 31, 1),
(20, 32, 20, 32, 1),
(20, 44, 20, 44, 1),
(20, 53, 20, 53, 1),
(22, 44, 22, 44, 1),
(22, 53, 22, 53, 1),
(24, 44, 24, 44, 1),
(25, 42, 25, 42, 1),
(26, 53, 26, 53, 1),
(27, 47, 27, 47, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_ibfk_3` FOREIGN KEY (`right_answer`) REFERENCES `answers` (`answer_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`answer_id`);
COMMIT;