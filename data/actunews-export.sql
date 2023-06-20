-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 13 juin 2023 à 11:01
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `actunews`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `deletedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `createdAt`, `updatedAt`, `deletedAt`) VALUES
(1, 'Politique', 'politique', '2023-06-13 10:47:16', '2023-06-13 10:47:16', '2023-06-13 10:47:16'),
(2, 'Economie', 'economie', '2023-06-13 10:47:16', '2023-06-13 10:47:16', '2023-06-13 10:47:16'),
(3, 'Social', 'social', '2023-06-13 10:47:16', '2023-06-13 10:47:16', '2023-06-13 10:47:16'),
(4, 'Sport', 'sport', '2023-06-13 10:47:16', '2023-06-13 10:47:16', '2023-06-13 10:47:16'),
(5, 'Technologie', 'technologie', '2023-06-13 10:47:16', '2023-06-13 10:47:16', '2023-06-13 10:47:16'),
(6, 'Culture', 'culture', '2023-06-13 10:47:16', '2023-06-13 10:47:16', '2023-06-13 10:47:16'),
(7, 'Loisirs', 'loisirs', '2023-06-13 10:47:16', '2023-06-13 10:47:16', '2023-06-13 10:47:16');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `publishedAt` datetime NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `publishedAt`, `createdAt`, `updatedAt`, `deletedAt`, `slug`, `image`, `id_user`, `id_category`) VALUES
(1, 'Fonds Marianne : une perquisition menée au domicile du préfet Christian Gravel, qui dirigeait le comité responsable de l\'attribution des subventions', 'Les domiciles de Mohamed Sifaoui et de Cyril Karunagaran, les deux dirigeants de l\'USEPPM, l\'association ayant reçu le plus de subventions, ont aussi été perquisitionnés.\r\nCe qu\'il faut savoir\r\nUne perquisition est en cours au domicile du préfet Christian Gravel, ex-reponsable du comité interministériel de prévention de la délinquance et de la radicalisation, chargé de l\'attribution controversée des subventions du fonds Marianne contre le \"séparatisme\", ont appris France Télévisions et franceinfo de sources condordantes, mardi 13 juin. \r\n\r\nCes perquisitions \"interviennent dans le cadre de l’information judiciaire ouverte le 4 mai 2023 des chefs de \'détournement de fonds publics\', \'détournement de fonds publics par négligence\', \'abus de confiance\' et \'prise illégale d\'intérêts\' relative à la gestion du fonds Marianne\", précise à franceinfo une source judiciaire. Suivez notre direct.\r\n\r\nD\'autres perquisitions en cours. Les domiciles de Mohamed Sifaoui et de Cyril Karunagaran, les deux dirigeants de l\'USEPPM, l\'association ayant reçu le plus de subventions, ont aussi été perquisitionnés mardi matin.\r\n\r\nUn rapport accablant.  Doté à son lancement de 2,5 millions d\'euros, le fonds a été mis en place en avril 2021, après l\'assassinat de Samuel Paty, et visait à financer des associations défendant \"les valeurs de la République\" en apportant, sur les réseaux sociaux, des \"contre-discours\" à l\'islam radical. Mais un rapport de l\'inspection générale de l\'administration avait dénoncé, début juin, de nombreux \"manquements\" de l\'association, à la fois dans le processus de candidature, puis dans l\'utilisation des fonds.\r\n\r\nDémission de Christian Gravel. Après le rapport, Christian Gravel, qui était jusque-là le patron du Comité interministériel de prévention de la délinquance et de la radicalisation (CIPDR), la structure responsable de la gestion de ce fonds au ministère de l\'Intérieur, a démissionné.', '2023-06-13 10:51:17', '2023-06-13 10:51:17', NULL, NULL, 'fonds-marianne-une-perquisition-est-en-cours-au-domicile-du-prefet-christian-gravel-qui-dirigeait-le-comite-responsable-de-l-attribution-des-subventions', 'https://www.francetvinfo.fr/pictures/67vSKbsmKSIquvUO1qlRI5901bY/0x222:6936x4121/944x531/filters:format(avif):quality(50)/2023/06/13/6488281597632_000-33h927x.jpg', 1, 1),
(2, '\"L\'équipe ne tient pas la route\" : le bruit d\'un remaniement avant l\'été se propage au sein du gouvernement d\'Elisabeth Borne', 'Alors que la fin des \"100 jours\" approche, un remaniement pourrait se profiler. La Première ministre semble moins menacée qu\'il y a quelques semaines, mais d\'autres ministres risquent de perdre leur portefeuille.\r\n\r\nAlors qu\'elle défendait au perchoir de l\'Assemblée la 17e motion de censure déposée par les oppositions depuis son arrivée à Matignon, Élisabeth Borne a surpris tout le monde en s\'accrochant à son poste de Première ministre. La locataire de Matignon a commencé à poser les jalons de nouveaux chantiers, au-delà de la fameuse feuille de route des 100 jours, vantant le \"courage\" de son gouvernement.\r\n\r\n>> \"Au bout d’un an, j’ai l’impression d’un quinquennat gâché\" : ces électeurs d\'Emmanuel Macron gagnés par le doute après la réforme des retraites\r\n\r\nSi Élisabeth Borne moins menacée qu\'il y a encore quelques semaines, il y a quand même du remaniement dans l\'air. C\'est un signe qui ne trompe pas : les téléphones chauffent, les courtisans se font plus pressants, et les CV s\'accumulent sur le bureau d\'Emmanuel Macron. \"Il regarde ce qui marche et ce qui ne marche pas\", raconte un de ses fidèles, qui assure qu\'un remaniement se prépare en coulisses, \"avant le 14 juillet\". ', '2023-06-13 10:52:43', '2023-06-13 10:52:43', NULL, NULL, 'l-equipe-ne-tient-pas-la-route-le-bruit-d-un-remaniement-avant-l-ete-se-propage-au-sein-du-gouvernement-d-elisabeth-borne', 'https://www.francetvinfo.fr/pictures/qHmZLYYADggZf_Dh9AqjwMQ97EU/0x80:7994x4574/944x531/filters:format(avif):quality(50)/2023/06/12/648792f707594_000-33he7pw.jpg', 2, 1),
(3, 'Éducation : six syndicats enseignants appellent à la grève des AESH ce mardi et à un rassemblement devant le ministère', 'Les Accompagnants des élèves en situation de handicap (AESH) descendent une nouvelle fois dans la rue ce mardi, pour réclamer de meilleurs salaires et un statut non-précaire.\r\n\r\nSix syndicats appellent à la grève des Accompagnants des élèves en situation de handicap (AESH) et à un rassemblement devant le ministère de l\'Éducation nationale mardi 13 juin. Les syndicats enseignants dénoncent leur statut et revendiquent de meilleurs salaires pour les assistants qui accompagnent et soutiennent les élèves en situation de handicap en classe.', '2023-06-13 10:54:57', '2023-06-13 10:54:57', NULL, NULL, 'education-six-syndicats-enseignants-appellent-a-la-greve-des-aesh-ce-mardi-et-a-un-rassemblement-devant-le-ministere', 'https://www.francetvinfo.fr/pictures/eT9NCHhwOJiIVcdr2M4RF8Zb4cI/0x224:4300x2643/944x531/filters:format(avif):quality(50)/2023/06/13/6487fb006657c_maxnewsworldfive687461.jpg', 1, 3),
(4, 'L\'interdiction du HHC ne va pas \"supprimer totalement l\'accès\" mais \"permettra peut-être de diminuer les risques associés\", selon un psychiatre', 'Pour les addicts au HHC qui auraient du mal à s\'en passer, le psychiatre Nicolas Authier se veut rassurant : \"Ce n\'est pas mortel. C\'est très inconfortable. Mais cela passe en quelques jours.\"\r\n\r\nL\'interdiction du HHC ne va pas \"supprimer totalement l\'accès, mais ça le limite fortement\", a affirmé lundi 12 juin sur franceinfo le professeur Nicolas Authier, psychiatre, chef du service de pharmacologie médicale au CHU de Clermont-Ferrand et spécialiste de l’usage médical du cannabis, alors que le ministre de la Santé François Braun a annoncé que l\'hexahydrocannabinol (HHC), dérivé de synthèse du cannabis, a été classé lundi comme stupéfiant par l\'Agence nationale de sécurité du médicament et des produits de santé (ANSM).', '2023-06-13 10:54:57', '2023-06-13 10:54:57', NULL, NULL, 'l-interdiction-du-hhc-ne-va-pas-supprimer-totalement-l-acces-mais-permettra-peut-etre-de-diminuer-les-risques-associes-selon-un-psychiatre', 'https://www.francetvinfo.fr/pictures/vDPy3hCWubi05Z4uaiw2LrlejuA/0x213:8180x4811/944x531/filters:format(avif):quality(50)/2023/06/12/6487599b8ddeb_maxnewsworldfive968857.jpg', 2, 3),
(5, 'Casino : les élus du personnel se dirigent vers une procédure de droit d\'alerte économique', 'Le Comité social et économique central de Casino avait été convoqué lundi pour étudier la liste des magasins qui vont être cédés au concurrent Intermarché, troisième chaîne de supermarchés en France.\r\n', '2023-06-13 10:56:55', '2023-06-13 10:56:55', NULL, NULL, 'casino-les-elus-du-personnel-se-dirigent-vers-une-procedure-de-droit-d-alerte-economique', 'https://www.francetvinfo.fr/pictures/pO0WYIiEFgr2PtFcQ2s2OKp_FRg/0x53:1024x629/944x531/filters:format(avif):quality(50)/2023/06/13/648816c43e82c_080-hl-nguyonnet-2072284.jpg', 2, 2),
(6, 'Le Sénat étudie la création d\'une holding regroupant les médias de l\'audiovisuel public', 'Cette holding, nommée France Médias, serait composée de France Télévisions, Radio France, France Médias Monde et l\'INA. La ministre de la Culture n\'y est pas favorable.\r\n\r\nLe Sénat a entamé, lundi 12 juin, la discussion d\'une proposition de loi sur l\'audiovisuel dont la mesure phare reprend l\'idée controversée d\'une holding chapeautant France Télévisions et Radio France. L\'idée était déjà dans les tiroirs en 2019, alors que Franck Riester était ministre de la Culture, mais elle avait été abandonnée durant la crise sanitaire.\r\n\r\nCette holding, nommée France Médias, serait composée de quatre filiales : France Télévisions, Radio France, France Médias Monde (RFI et France 24) et l\'Institut national de l\'audiovisuel (INA). Ce dernier passerait du statut d\'établissement public à celui de société. \r\n\r\nDétenue à 100% par l\'Etat, cette holding serait mise en place au 1er janvier 2024. Arte France et TV5 Monde resteraient à part puisqu\'elles sont régies par des traités internationaux.', '2023-06-13 10:58:02', '2023-06-13 10:58:02', NULL, NULL, 'le-senat-etudie-la-creation-d-une-holding-regroupant-les-medias-de-l-audiovisuel-public', 'https://www.francetvinfo.fr/pictures/9q5Y4IqLqp9bKRJf37m3Cq5kBiU/0x53:1024x629/944x531/filters:format(avif):quality(50)/2023/06/13/64880b13664db_080-hl-bpolge-1977810.jpg', 2, 2),
(7, 'Réforme des retraites : la nouvelle motion de censure présentée par la Nupes a été rejetée par l\'Assemblée nationale', 'Seuls 239 députés ont voté lundi après-midi en faveur du texte déposé par l\'alliance de gauche. Pour être adopté, il devait recueillir la majorité absolue, soit 289 voix.\r\nCe qu\'il faut savoir\r\n>> Ce direct est désormais terminé.\r\n\r\nSans surprise, la motion de censure présentée par la Nupes a été rejetée par l\'Assemblée nationale, lundi 12 juin en fin de journée. Elle a été votée par 239 députés. Pour être adoptée, elle devait recueillir la majorité absolue, soit 289 voix sur 577 députés. Il s\'agissait de la 17e motion de censure déposée à l\'Assemblée pour tenter de renverser le gouvernement depuis l\'arrivée d\'Elisabeth Borne à Matignon. Il s\'agit aussi, et surtout, de la dernière carte des oppositions pour tenter de revenir sur la réforme des retraites, après l\'échec de la proposition de loi Liot visant à abroger le recul de l\'âge légal à 64 ans.\r\n\r\n\"Moi, je ne confonds pas le courage et les décibels.\" Avant le vote, la Première ministre a fustigé les \"incohérences\", les \"contradictions\" et la \"démagogie\" des oppositions à la tribune de l\'Assemblée nationale.\r\n\r\nLes débats ont commencé dans une atmosphère tendue. La socialiste Valérie Rabault, vice-présidente de l\'Assemblée, a donné le coup d\'envoi des débats dans l\'hémicycle à 16 heures. Et l\'ambiance n\'a pas tardé à chauffer. \"J\'ai pas de leçons à recevoir de la majorité\", a répété à plusieurs reprises le député LFI Louis Boyard pendant l\'intervention d\'Elisabeth Borne. La présidente de l\'Assemblée nationale, Yaël Braun-Pivet, a annoncé un rappel à l\'ordre avec inscription au procès-verbal pour l\'élu.\r\n\r\n\r\n', '2023-06-13 10:58:33', '2023-06-13 10:58:33', NULL, NULL, 'direct-reforme-des-retraites-la-motion-de-censure-de-la-nupes-sera-debattue-a-l-assemblee-nationale-a-partir-de-16-heures', 'https://www.francetvinfo.fr/pictures/CefaVhQ2VgeT1CYYFrKEFNa5MVA/267x0:6062x3262/944x531/filters:format(avif):quality(50)/2023/06/12/64873237b3f43_000-33j84pr.jpg', 1, 2),
(8, 'Michael Keaton, Christian Bale, Ben Affleck, Robert Pattinson... Qui a été le meilleur Batman à l\'écran depuis 1989 ?', '\"The Flash\" d\'Andy Muschietti, qui sort dans les salles françaises demain, marque le retour dans le costume du justicier aux ailes de chauve-souris du comédien Michael Keaton, qu\'il avait incarné pour Tim Burton dans les adaptations de 1989 et 1992. Depuis, une demi-douzaine d\'acteurs lui ont succédé dans le rôle, avec plus ou moins de réussite.', '2023-06-13 10:59:16', '2023-06-13 10:59:16', NULL, NULL, 'michael-keaton-christian-bale-ben-affleck-robert-pattinson-qui-a-ete-le-meilleur-batman-a-l-ecran-depuis-1989', 'https://www.francetvinfo.fr/pictures/YFVzog6uX2LfHrHAO8d4DVumxvw/0x156:3000x1844/944x531/filters:format(avif):quality(50)/2023/06/13/648804bf983cb_055-agif307339.jpg', 2, 6),
(9, 'A Lyon, le musée des Confluences met en lumière les mille et une facettes de l’art africain', '230 objets, pour la plupart issus du Nigeria et du Cameroun, sont présentés dans cette exposition. Ces masques, statuettes ou parures proviennent de la collection privée Ewa et Yves Develon, aujourd\'hui confiée au musée.\r\n\r\nDe la création aux rituels\r\nRetracer le parcours de ces trésors rassemblés pendant près d’un demi-siècle par un couple de passionnés d’art, c’est tout l’objectif de cette exposition. La première partie plonge le visiteur au plus près de leur création. Il découvre les matériaux utilisés (métal, ivoire, bois, fibres végétales…), les techniques mises en œuvre ainsi que les sources d’inspiration (humaines ou animales). Le talent des sculpteurs, forgerons, céramistes ou bronziers est également mis en valeur à travers des photos. Plus que de simples œuvres d\'art, ces objets revêtent une grande importance rituelle ou culturelle au sein des tribus. Une statuette pourra, par exemple, honorer des âmes errantes. Une parure ou un masque sera utilisé comme objet d’apparat pendant les mascarades. Des films décrivant ces cérémonies sont d\'ailleurs projetés, sur deux grands écrans, dans l’immense salle (700 m2) consacrée à l’exposition.', '2023-06-13 10:59:43', '2023-06-13 10:59:43', NULL, NULL, 'a-lyon-le-musee-des-confluences-met-en-lumiere-les-mille-et-une-facettes-de-l-art-africain', 'https://www.francetvinfo.fr/pictures/Kuc4oMbkHcvuikTf71tD1ZVD8no/40x7:849x463/944x531/filters:format(avif):quality(50)/2023/06/12/64874ef9d3a71_2023-06-12-18-58-26-backoffice-pic.png', 1, 6),
(10, 'Ligue 2 : le match Bordeaux-Rodez donné perdu aux Girondins, Metz officiellement promu et Annecy relégué', 'La commission de discipline de la LFP a tranché, lundi, en donnant la victoire à Rodez sur tapis vert. Bordeaux restera donc en Ligue 2 la saison prochaine.\r\n\r\nPlusieurs équipes étaient en sursis depuis l\'arrêt du match de la 38e journée entre Bordeaux et Rodez, prononcé le 2 juin dernier après l\'agression par un supporter girondin d\'un joueur du RAF. La commission de discipline de la Ligue de football professionnel (LFP) a fait savoir via un communiqué, lundi 12 juin, que la rencontre ne serait pas rejouée. \"La Commission, constate l’intrusion d’un supporter pour porter volontairement atteinte physiquement à un joueur [le Ruthénois Lucas Buades] qui venait d’inscrire un but\", peut-on lire.\r\n\r\nLe match a donc été donné perdu aux Girondins, entraînant l\'officialisation de la montée du FC Metz en Ligue 1, avec qui le club au scapulaire était à la lutte. Mais également la descente en National 1 du FC Annecy, qui souhaitait que la rencontre soit rejouée pour espérer prendre la place de premier non-relégable à Rodez. \r\n\r\nLes Bordelais ont également écopé du retrait d\'un point ferme pour la saison 2023-2024 et de la fermeture pour quatre matchs, dont deux fermes, de la tribune Sud du Matmut Atlantique.', '2023-06-13 11:00:47', '2023-06-13 11:00:47', NULL, NULL, 'ligue-2-le-match-bordeaux-rodez-donne-perdu-aux-girondins-metz-officiellement-promu-et-annecy-relegue', 'https://www.francetvinfo.fr/pictures/HKk4Tk1TjIh0FUKVcBqOZOiRqos/0x0:5720x3216/944x531/filters:format(avif):quality(50)/2023/06/12/648730898b245_000-33gu92y.jpg', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  `roles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `createdAt`, `updatedAt`, `deletedAt`, `roles`) VALUES
(1, 'John', 'Doe', 'john.doe@gmail.com', 'demo', '2023-06-13 10:50:09', NULL, NULL, 'ROLE_ADMIN'),
(2, 'Jane', 'Doe', 'jane.doe@gmail.com', 'demo', '2023-06-13 10:50:09', NULL, NULL, 'ROLE_USER');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_user_FK` (`id_user`),
  ADD KEY `post_category0_FK` (`id_category`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_category0_FK` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `post_user_FK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
