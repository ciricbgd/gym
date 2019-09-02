-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 04:16 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `name`) VALUES
(16, 7, 'Losing weight'),
(17, 7, 'Gaining muscle'),
(18, 7, 'Being more attractive'),
(19, 7, 'Health reasons'),
(20, 8, 'Fitness'),
(21, 8, 'Lifting'),
(22, 9, 'Once or twice a week'),
(23, 9, '3-5 times a week'),
(24, 9, 'As often as i can'),
(25, 10, 'Diet'),
(26, 10, 'Workout'),
(27, 11, 'asddas'),
(28, 11, 'asddas');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `header` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `header`, `img`, `alt`, `text`) VALUES
(1, 'Yoga - it\'s a lifestyle', 'yoga.jpg', 'yoga', 'Yoga is a group of physical, mental, and spiritual practices or disciplines which originated in ancient India. There is a broad variety of yoga schools, practices, and goals[2] in Hinduism, Buddhism, and Jainism.[3][4][5] Among the most well-known types of yoga are Hatha yoga and Rāja yoga.[6] The origins of yoga have been speculated to date back to pre-Vedic Indian traditions; it is mentioned in the Rigveda,[note 1] but most likely developed around the sixth and fifth centuries BCE,[8] in ancient India\'s ascetic and śramaṇa movements.[9][note 2] The chronology of earliest texts describing yoga-practices is unclear, varyingly credited to Hindu Upanishads.[10] The Yoga Sutras of Patanjali date from the first half of the 1st millennium CE,[11][12] but only gained prominence in the West in the 20th century.[13] Hatha yoga texts emerged around the 11th century with origins in tantra.[14][15] Yoga gurus from India later introduced yoga to the West,[16] following the success of Swami Vivekananda in the late 19th and early 20th century.[16] In the 1980s, yoga became popular as a system of physical exercise across the Western world.[15] Yoga in Indian traditions, however, is more than physical exercise; it has a meditative and spiritual core.[17] One of the six major orthodox schools of Hinduism is also called Yoga, which has its own epistemology and metaphysics, and is closely related to Hindu Samkhya philosophy.[18] Many studies have tried to determine the effectiveness of yoga as a complementary intervention for cancer, schizophrenia, asthma, and heart disease.[19][20] The results of these studies have been mixed and inconclusive.[19][20] On December 1, 2016, yoga was listed by UNESCO as an Intangible cultural heritage.[21]'),
(2, 'Boxing - the best cardio?', '1521043353.jpg', 'boxing', 'Boxing is a combat sport in which two people, usually wearing protective gloves, throw punches at each other for a predetermined set of time in a boxing ring.\r\n\r\nAmateur boxing is both an Olympic and Commonwealth Games sport and is a common fixture in most international games—it also has its own World Championships. Boxing is supervised by a referee over a series of one- to three-minute intervals called rounds. The result is decided when an opponent is deemed incapable to continue by a referee, is disqualified for breaking a rule, resigns by throwing in a towel, or is pronounced the winner or loser based on the judges\' scorecards at the end of the contest. In the event that both fighters gain equal scores from the judges, the fight is considered a draw (professional boxing). In Olympic boxing, due to the fact that a winner must be declared, in the case of a draw - the judges use technical criteria to choose the most deserving winner of the bout.\r\n\r\nWhile humans have fought in hand-to-hand combat since before the dawn of history, boxing as an organized sport may have its origin in the ancient Greeks as an Olympic game in 688 BC. Boxing evolved from 16th- and 18th-century prizefights, largely in Great Britain, to the forerunner of modern boxing in the mid-19th century with the 1867 introduction of the Marquess of Queensberry Rules.'),
(3, 'Jumprope - not just for girls?', '1521043544.jpg', 'jumprope', 'No matter what equipment you have available, from a fully-stocked supergym to a pair of mismatched dumbbells in your garage, or nothing but your body weight alone, you can build muscle, lose fat, and sculpt the physique you\'ve always wanted.\r\n\r\nBlock out any association you have with jump ropes and school children—the jump rope is an incredibly efficient, versatile workout tool. Carry it in your backpack or briefcase, bring it with you on vacations and weekend trips for work because this is one of the easiest ways to build cardio fitness, agility, and strength on the go. \r\n\r\nNot that that’s settled (and we extinguished your excuse for skipping workouts on business trips), take a look at how to make the most of your jump rope workout. It’s time you were reacquainted with the convenient cardio tool. Here’s everything you need to know to stay well-conditioned for life.'),
(4, 'Powerlifting - do you have what it takes?', '1521043747.jpg', 'powerlifting', 'Powerlifting is a strength sport that consists of three attempts at maximal weight on three lifts: squat, bench press, and deadlift. As in the sport of Olympic weightlifting, it involves the athlete attempting a maximal weight single lift of a barbell loaded with weight plates.[1] Powerlifting evolved from a sport known as \"odd lifts\", which followed the same three-attempt format but used a wider variety of events, akin to strongman competition. Eventually odd lifts became standardized to the current three.\r\n\r\nIn competition, lifts may be performed equipped or un-equipped (typically referred to as \'raw\' lifting or \'classic\' in the IPF specifically). Equipment in this context refers to a supportive bench shirt or squat/deadlift suit or briefs. In some federations, knee wraps are permitted in the equipped but not un-equipped division; in others, they may be used in both equipped and un-equipped lifting. Weight belts, knee sleeves, wrist wraps and special footwear may also be used, but are not considered when distinguishing equipped from un-equipped lifting.[2]\r\n\r\nCompetitions take place across the world but mostly in the United States, Australia, Canada, United Kingdom, Colombia, Iceland, South Africa, Poland, Sweden, Norway, Finland, Russia, Taiwan, Japan and Ukraine. Powerlifting has been a Paralympic sport (bench press only) since 1984 and, under the IPF, is also a World Games sport. Local, national and international competitions have also been sanctioned by other federations operating independently of the IPF.'),
(5, 'What is the best diet for you?', '1521044133.jpg', 'food', 'A healthy diet is one that helps to maintain or improve overall health. A healthy diet provides the body with essential nutrition: fluid, adequate amino acids from protein,[1] essential fatty acids, vitamins, minerals, fibre and adequate calories.\r\n\r\nThe requirements for a healthy diet can be met from a variety of plant-based and animal-based foods, although a non-animal source of vitamin B12 is needed for those following a vegan diet.[2] A healthy diet supports energy needs and provides for human nutrition without exposure to toxicity or excessive weight gain from consuming more calories than the body requires. A healthy diet, in addition to exercise, is thought to be important for lowering health risks, such as obesity, heart disease, type 2 diabetes, hypertension and cancer.[3]\r\n\r\nVarious nutrition guides are published by medical and governmental institutions to educate individuals on what they should be eating to promote health. Nutrition facts labels are also mandatory in some countries to allow consumers to choose between foods based on the components relevant to health.[4]\r\n\r\nThe idea of dietary therapy (using dietary choices to maintain health and improve poor health) is quite old and thus has both modern scientific forms (medical nutrition therapy) and prescientific forms (such as dietary therapy in traditional Chinese medicine).'),
(6, 'Fitness or Lifting?', '1521044626.jpg', 'running', 'Running is a method of terrestrial locomotion allowing humans and other animals to move rapidly on foot. Running is a type of gait characterized by an aerial phase in which all feet are above the ground (though there are exceptions[1]). This is in contrast to walking, where one foot is always in contact with the ground, the legs are kept mostly straight and the center of gravity vaults over the stance leg or legs in an inverted pendulum fashion.[2] A characteristic feature of a running body from the viewpoint of spring-mass mechanics is that changes in kinetic and potential energy within a stride occur simultaneously, with energy storage accomplished by springy tendons and passive muscle elasticity.[3] The term running can refer to any of a variety of speeds ranging from jogging to sprinting.\r\n\r\nIt is assumed that the ancestors of humankind developed the ability to run for long distances about 2.6 million years ago, probably in order to hunt animals.[4] Competitive running grew out of religious festivals in various areas. Records of competitive racing date back to the Tailteann Games in Ireland in 1829 BCE,[5][citation needed] while the first recorded Olympic Games took place in 776 BCE. Running has been described as the world\'s most accessible sport.[6]'),
(7, 'All you need to know about Creatine', '1521044710.jpg', 'creatine', 'Creatine is a nitrogenous organic acid that occurs naturally in vertebrates. Its main role is to facilitate recycling of adenosine triphosphate (ATP), the energy currency of the cell, primarily in muscle and brain tissue. This is achieved by recycling adenosine diphosphate (ADP) to ATP via donation of phosphate groups. Creatine also acts as a pH buffer in tissues.[3]\r\n\r\nCreatine synthesis primarily occurs in the liver and kidneys.[3][4] On average, it is produced endogenously at an estimated rate of about 8.3 mmol or 1 gram per day in young adults.[4][5] Creatine is also obtained through the diet at a rate of about 1 gram per day from an omnivorous diet.[4][6] Most of the human body\'s total creatine and phosphocreatine stores are found in skeletal muscle, while the remainder is distributed in the blood, brain, and other tissues.[5][6]\r\n\r\nCreatine was identified in 1832 when Michel Eugène Chevreul isolated it from the basified water-extract of skeletal muscle. He later named the crystallized precipitate after the Greek word for meat, κρέας (kreas). In solution, creatine is in equilibrium with creatinine.[7] Creatine is a derivative of the guanidinium cation.'),
(8, 'Just how important is Sleep?', '1521044818.jpg', 'sleep', 'Sleep is a naturally recurring state of mind and body, characterized by altered consciousness, relatively inhibited sensory activity, inhibition of nearly all voluntary muscles, and reduced interactions with surroundings.[1] It is distinguished from wakefulness by a decreased ability to react to stimuli, but is more easily reversed than the state of being comatose. Sleep occurs in repeating periods, in which the body alternates between two distinct modes: REM sleep and non-REM sleep. Although REM stands for \"rapid eye movement\", this mode of sleep has many other aspects, including virtual paralysis of the body. A well-known feature of sleep is the dream, an experience typically recounted in narrative form, which resembles waking life while in progress, but which usually can later be distinguished as fantasy.\r\n\r\nDuring sleep, most of the body\'s systems are in an anabolic state, helping to restore the immune, nervous, skeletal, and muscular systems; these are vital processes that maintain mood, memory, and cognitive performance, and play a large role in the function of the endocrine and immune systems.[2] The internal circadian clock promotes sleep daily at night. The diverse purposes and mechanisms of sleep are the subject of substantial ongoing research.[3] The advent of artificial light has substantially altered sleep timing in industrialized countries.[4]\r\n\r\nHumans may suffer from various sleep disorders, including dyssomnias, such as insomnia, hypersomnia, narcolepsy, and sleep apnea; parasomnias, such as sleepwalking and REM behavior disorder; bruxism; and circadian rhythm sleep disorders.'),
(9, 'Bodybuilding icons', '1521044935.jpg', 'bodybuilding', 'Bodybuilding is the use of progressive resistance exercise to control and develop one\'s musculature.[1] An individual who engages in this activity is referred to as a bodybuilder. In professional bodybuilding, bodybuilders appear in lineups and perform specified poses (and later individual posing routines) for a panel of judges who rank the competitors based on criteria such as symmetry, muscularity, and conditioning. Bodybuilders prepare for competitions through a combination of intentional dehydration, elimination of nonessential body fat, and carbohydrate loading to achieve maximum vascularity, as well as tanning to accentuate muscular definition. Bodybuilders may use anabolic steroids to build muscles.\r\n\r\nThe winner of the annual IFBB Mr. Olympia contest is generally recognized as the world\'s top male professional bodybuilder. The title is currently held by Phil Heath, who has won every year from 2011 to 2017. The winner of the Women\'s Physique portion of the competition is widely regarded as the world\'s top female professional bodybuilder. The title is currently held by Juliana Malacarne, who has won every year since 2014. Since 1950, the NABBA Universe Championships have been considered the top, amateur-bodybuilding contests, with notable winners such as Reg Park, Lee Priest, Steve Reeves, and Arnold Schwarzenegger.'),
(10, 'Leg day, why is it so important, and why you hate it so much', '1521045090.jpg', 'leg day', 'TRAINING YOUR LEGS is vital to any fitness goal, whether you want to build total-body strength, gain weight and increase your lean muscle mass, improve athletic performance, lose extra body fat, or elevate your levels of free testosterone, says Drew Little, C.S.C.S., a performance specialist at Michael Johnson Performance, a training facility in McKinney, Texas, where athletes go to train for the NFL Combine, NFL, MLB, MLS, NBA, and more. You need to train intensely; but you also have to train smart.\r\n\r\n\"It\'s important to have a balance [in your workout] of your lower body\'s fundamental movement patterns: vertical drive (squat variations), horizontal drive (single-leg knee-dominant variations, like lateral lunges), vertical draw (deadlift and Olympic lifting variations), and horizontal draw (posterior chain-dominant variations lying on your back or stomach, like glute bridges),\" Little says. \"These movements ensure there\'s no over-dominance of one muscle group, so everything works synergistically, and you have a balance that reduces the likelihood of injury,\" he explains.\r\n\r\nWhile the majority of the workouts below are lower body-focused, they contain accessory exercises that train your upper, middle, and lower back to provide a base for your upper body to handle more weight for squats, deadlifts, and Olympic lift variations. There are also moves that train your core, which is important for increasing your trunk stability during leg-heavy workouts. And there are moves that work small muscle groups, like your traps and forearms, both of which are necessary for getting stronger and throwing around more weight.');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `perks` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `name`, `color`, `price`, `perks`) VALUES
(1, 'Blue membership', 'blue', '20.99', '<tr><td>Full access to equipment</td></tr><tr><td>Access to lockers and storage</td></tr><tr><td>10 Workouts</td></tr>'),
(2, 'Green membership', 'green', '26.99', '<tr><td>Full access to equipment</td></tr><tr><td>Access to lockers and storage</td></tr><tr><td>20 Workouts</td></tr>\r\n</tr><tr><td>Cardio</td></tr>\r\n</tr><tr><td>Punching bags</td></tr>'),
(3, 'Red membership', 'red', '32.99', '<tr><td>Full access to equipment</td></tr><tr><td>Access to lockers and storage</td></tr><tr><td>Unlimited Workouts</td></tr>\r\n</tr><tr><td>Cardio</td></tr>\r\n</tr><tr><td>Punching bags</td></tr>\r\n</tr><tr><td>Group trainings</td></tr>');

-- --------------------------------------------------------

--
-- Table structure for table `nav`
--

CREATE TABLE `nav` (
  `id` int(11) NOT NULL,
  `name` varchar(244) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(244) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nav`
--

INSERT INTO `nav` (`id`, `name`, `route`) VALUES
(1, 'Home', 'home'),
(2, 'Admin panel', 'admin'),
(3, 'Logout', 'logout'),
(4, 'Join', '#page_home'),
(5, 'Survey', '#page_survey'),
(6, 'Articles', '#page_articles'),
(7, 'Showcase', '#page_showcase'),
(12, 'Dokumentacija', 'dokumentacija.pdf'),
(13, 'Autor', 'autor');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer_format` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `survey_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `name`, `answer_format`, `survey_id`) VALUES
(7, 'Why did you join the gym?', 'checkbox', 7),
(8, 'What do you do more?', 'radio', 7),
(9, 'How often do you go to the gym?', 'radio', 7),
(10, 'What do you pay more attention to?', 'radio', 7),
(11, 'deletqqwe', 'radio', 8);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(0, 'user'),
(1, 'moderator'),
(2, 'admin'),
(3, 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `showcase`
--

CREATE TABLE `showcase` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `showcase`
--

INSERT INTO `showcase` (`id`, `title`, `img`, `alt`) VALUES
(1, 'Our first trainging', 'img1.jpg', 'squats'),
(3, 'Meet our new trainer', '1521058441.jpg', 'teamwork training'),
(4, 'High five', '1521060663.jpg', 'high five pushup'),
(5, 'Group training', '1521060690.jpg', 'group training');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `name`) VALUES
(7, 'A survey for members');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(255) DEFAULT NULL,
  `role_id` tinyint(1) NOT NULL DEFAULT '0',
  `trainer` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `date`, `email`, `phone`, `role_id`, `trainer`) VALUES
(2, 'Uroš', 'Ćirić', 'uki123', '3c693fd95a2fe93bd9ec82fdeff3f0d6', '1996-01-08', 'ciricbgd@gmail.com', 654188978, 3, 0),
(7, 'Pera', 'Peric', 'pera', '923352284767451ab158a387a283df26', '1975-04-03', 'pera@peric.com', 987488978, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `user_id`, `survey_id`, `question_id`, `answer_id`) VALUES
(1, 2, 7, 7, 16),
(2, 2, 7, 7, 18),
(3, 2, 7, 8, 20),
(4, 2, 7, 9, 23),
(5, 2, 7, 10, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showcase`
--
ALTER TABLE `showcase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nav`
--
ALTER TABLE `nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `showcase`
--
ALTER TABLE `showcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
