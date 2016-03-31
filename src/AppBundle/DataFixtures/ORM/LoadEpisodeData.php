<?php
// src/AppBundle/DataFixtures/ORM/LoadEpisodeData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Episode;
use DateTime;
//use Symfony\Component\Validator\Constraints\DateTime;

class LoadEpisodeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $epTitle = ["L'hiver", "La Route royale", "Lord", "Infirmes", " Bâtards et Choses", "Le Loup et le Lion", "Une couronne dorée",
         "Gagner ou mourir", "Frapper d'estoc", "Baelor", "Une étude en rose", "Le Banquier aveugle", "Le Grand Jeu",  "Rose",
         "La Fin du monde", "Des morts inassouvis", "L'Humanité en péril", "Troisième Guerre mondiale", "Dalek", "Un jeu interminable",
         "Fêtes des pères", "Drôle de mort", "Le Docteur danse", "L\'Explosion de Cardiff", "Le Grand Méchant Loup", "À la croisée des chemins",
     "Noël mortel ","Bart le génie", "Un atome de bon sens", "Simpsonothérapie","Terreur à la récré", "Ste Lisa Blues","L'Abominable Homme des bois","Bart a perdu la tête",
 "Marge perd la boule","L'Odyssée d'Homer","L'Espion qui venait de chez moi", "Un clown à l'ombre","Une soirée d'enfer"];
        $epSummary = ["Sur le continent de Westeros, un jeune patrouilleur de la Garde de Nuit, chargée de veiller sur le Mur, est condamné à mort pour désertion par Eddard Stark, seigneur de Winterfell et Gardien du Nord. ",
    "Daenerys Targaryen, fraîchement mariée au khal Drogo, entreprend avec les Dothrakis et son frère le long voyage vers Vaes Dothrak. Afin de mieux satisfaire son mari et de prendre du plaisir à le faire, elle prend des leçons d’amour auprès d'une de ses caméristes. ",
"À peine arrivé à Port-Réal, Eddard Stark est convoqué à une session du conseil restreint et découvre alors que le royaume est fortement endetté et doit beaucoup d'argent aux Lannister.",
"Après un bref passage à Winterfell où il constate le handicap de Bran et donne les plans d'une selle adaptée au jeune paralysé, Tyrion Lannister repart pour Port-Réal, déçu de l'accueil glacial qui lui a été prodigué chez les Stark. ",
"Catelyn Stark, qui a quitté brutalement Winterfell, mène Tyrion Lannister vers la demeure de sa sœur pour qu'il y soit jugé.",
"Winterfell a vent de la guerre à venir, et les fils Stark se préparent au combat. Bran est plus soucieux par ses rêves récurrents, mais il se console avec sa nouvelle selle. ",
"Robert a été grièvement blessé par un sanglier lors de sa partie de chasse et se meurt. ",
"Alors que Lord Eddard Stark vient d'être envoyé aux cachots, Cersei Lannister ordonne l'assassinat de l'ensemble du clan Stark. ",
"Robb Stark poursuit son avancée vers Port-Réal et décide d'organiser une diversion pour capturer Jaime Lannister pour l'utiliser comme monnaie d'échange contre son père et ses sœurs. ",
"La mort d'Eddard attise la haine dans le camp Stark. Robb et Catelyn crient vengeance contre les Lannister.",
"John Watson, un ex-médecin militaire blessé durant la guerre d'Afghanistan, fait la connaissance de Sherlock Holmes grâce à un ami commun. Ils décident de devenir colocataires, en partageant un appartement londonien situé 221B Baker Street et dont la logeuse est Mrs Hudson.",
"Au Musée national d'antiquités, une experte en poterie chinoise appelée Soo Lin Yao (Gemma Chan) voit quelque chose qui la terrifie et disparaît. Watson a pour sa part des problèmes d'argent et doit trouver un travail rémunéré.",
"Sherlock Holmes s'ennuie désespérément, car il n'a aucune affaire intéressante à se mettre sous la dent.",
"C'est une autre journée ordinaire pour la jeune londonienne Rose Tyler, employée au grand magasin Hendricks. Cependant les choses vont bientôt changer… C'est une autre journée ordinaire pour la jeune londonienne Rose Tyler, employée au grand magasin Hendricks. Cependant les choses vont bientôt changer… ",
"Le Docteur donne à Rose le choix de voir le futur ou le passé",
"Après avoir montré à Rose l'avenir (voir l'épisode La Fin du monde), le Docteur décide de lui montrer le passé. ",
"Après ses premiers voyages, Rose éprouve le besoin de retrouver sa mère, Jackie, et son petit ami Mickey",
"Suite de l'épisode 4; Les Slitheen contrôlent désormais le Royaume-Uni au niveau politique et militaire.",
"Le Docteur et Rose atterrissent en 2012 dans un bunker qui abrite la collection d'objets extra-terrestres du très riche Henry Van Statten.",
"Adam Mitchell, découvert dans l'épisode précédent, arrive avec Rose et le Docteur sur le Satellite 5 en l'an 200 000, lors du Premier Empire Glorieux de l'Humanité.",
"Rose demande au Docteur de l'emmener sur Terre en 1987, le jour de la mort de son père Pete Tyler, renversé par une voiture.",
"Le Docteur et Rose atteignent Londres en pleine Seconde Guerre Mondiale, alors que les bombardements allemands font rage.",
"Où l'on retrouve une protagoniste des épisodes 4 et 5 : Maire de Cardiff, elle encourage, malgré des avis défavorables, un projet de centrale nucléaire au centre de la ville.",
"Le Docteur se réveille, mystérieusement téléporté, dans un jeu télévisé appelé le Big Brother où les évincés subissent une désintégration immédiate",
"Suite du précédent épisode. Les Daleks sont de retour et prêts à envahir la Terre.",
"Pendant les achats de Noël, Bart se fait faire un tatouage.",
"Bart a des problèmes sur un test de Q.I. et l'échange avec celui de Martin Prince.",
"La classe de Bart visite la centrale nucléaire de Springfield, et Homer percute accidentellement une conduite radioactive avec son chariot, provoquant sa mise à pied immédiate.",
"Homer emmène sa famille au pique-nique de la compagnie au manoir de M. Burns.",
"Lisa a préparé des gâteaux pour sa classe.",
"Lisa déprimée ne trouve du réconfort qu'en jouant du blues avec son saxophone. ","Homer, jaloux du nouveau camping-car de Flanders, décide de s'en acheter un.",
"Bart raconte aux habitants furieux de la ville de Springfield les péripéties qui l'ont amené à se retrouver avec entre les mains, la tête de la statue du fondateur de la ville, Jebediah Springfield",
"l'anniversaire de Marge, Homer lui offre une boule de bowling sur laquelle il a gravé son propre nom.", "Lors d'un enterrement de vie de garçon Homer danse sur la table avec une danseuse orientale. ",
"Après avoir blessé la mère du proviseur Skinner, Bart est envoyé en France pour travailler dur dans les vignes.","Homer est témoin du braquage d'Apu au mini-marché par Krusty.",
"Homer est témoin du braquage d'Apu au mini-marché par Krusty. ", "Homer et Marge engagent Mademoiselle Boltz pour garder les enfants pendant qu'ils tentent de se réconcilier au restaurant à la suite de leur dispute. En plus de paraître étrange,"];

        for ($i=0;$i<26;$i++){
            $episode = new Episode;
            $episode->setTitle($epTitle[$i])
            ->setAirdate(new DateTime('06-04-2016'))
            ->setSeason(1)
            ->setSummary($epSummary[$i])
            ;

            $manager->persist($episode);
            $manager->flush();
        }
    }

    public function getOrder()
    {
        return 2;
    }
}
