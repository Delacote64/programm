<?php

namespace App\DataFixtures;

use App\Entity\BodyPart;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BodyPartFixtures extends Fixture
{
    // #[Route('/BodyPart', name: 'BodyPart', methods: ["GET", "POST"])]

    public function load(ObjectManager $manager)
    {
        $bodyPartData = [
            [
                'name' => 'Biceps',
                'description' => 'Cet exercice sollicite le brachio-radial (long supinateur), le brachial antérieur, le biceps brachial, le deltoïde antérieur et dans une moindre mesure, le cora-co-bracial et le faisceau claviculaire du grand pectoral.',
                'exampleExercise' => 'Le Curl avec haltère: Assis, un haltère dans chaque main:
                -inspirer et fléchir les avant-bras sur les bras en effectuant une rotation du poignet vers l\'extérieur avant l\'arrivée des avant-bras à l\'horizontale;
                -achever la flexion en levant les coudes, expirer en fin de mouvement.'
            ],
            [
                'name' => 'Triceps',
                'description' => 'C’est le muscle le plus important en matière de volume, au niveau des bras.',
                'exampleExercise' => 'Tirage poulie: face à l’appareil, les mains sur la poignée, coudes le long du corps:
                -inspirer et effectuer une extension des avant-bras en veillant à ne pas écarter les coudes du corps. Expirer en 
                fin de mouvement. Selon le type de poignet utilisé cela sollicite davantage le chef latéral du triceps. Ce type 
                d’exercice est bien pour débuter car on gagne vite en force et cela permet de basculer vers des exercices plus 
                complexes.'
            ],
            [
                'name' => 'Biceps Brachial',
                'description' => 'Adopté par de nombreux boxeurs et grand nombre de champions du développé-couché, muscler ses avant-bras est important pour éviter les poignets de vibrer lors du port de charges lourdes',
                'exampleExercise' => 'à la barre, debout jambes légèrement écartées, bras tendus vers le bas, les mains en pronations pouces vers l’intérieur) inspirer et fléchir les bras. Puis expirer à la descente.'
            ],
            [
                'name' => 'Fléchisseur radial du carpe',
                'description' => ': Les muscles du poignet situés en profondeur, constituent l’essentiel du volume des fléchisseurs 
                de la zone.',
                'exampleExercise' => 'Assis, les avant-bras reposant sur les cuisses ou sur un banc, la barre saisie mains en 
                supination, les poignets en extensions passivent:
                -inspirer et fléchir les poignets: expirer en fin de mouvement. '
            ],
            [
                'name' => 'Epaules',
                'description' => 'A la fois la plus instable et la plus mobile du corps, elle permet des mouvements dans les trois 
                plans de l’espace et constitue une chaine cinétique permettant un guidage précis des gestes du bras et de la 
                main.',
                'exampleExercise' => '-Le développer assis avec haltère: Assis, le dos bien droit, les haltères au niveau des 
                épaules, tenues mains en pronation: inspirer et développer jusqu’à tendre les bras verticalement. Expirer en 
                fin de mouvement.'
            ],
            [
                'name' => 'Pectoraux',
                'description' => 'Les muscles pectoraux sont les muscles localisés sur la surface du thorax. Il existe deux muscles pectoraux, le petit pectoral et le grand pectoral.',
                'exampleExercise' => 'Le Développé Couché ou Bench: Allongé sur un banc horizontal, les fessiers en contact 
                avec le banc, les pieds au sol: -saisir la barre, mains en pronation en prenant un écartement supérieur à la 
                largeur des épaules, inspirer et descendre la barre en contrôlant le mouvement jusqu’à la poitrine, développer 
                en expirant en fin d’effort.'
            ],
            [
                'name' => 'Grand Dorsal',
                'description' => "Le muscle grand dorsal est un muscle plat qui se situe au niveau du tronc et de l'épaule, dans le dos. Le muscle grand dorsal est recouvert d'une membrane fibreuse.",
                'exampleExercise' => 'TRACTION: en suspension à la barre fixe, mains très écartées en pronation ou largeur d’épaules:
                -inspirer et effectuer une traction pour amener la nuque presque au contact de la barre. Expirer en fin de 
                mouvement'
            ],
            [
                'name' => 'Deltoïdes Trapèzes Grand Dorsal',
                'description' => "Il est un muscle qui reste actif chez les paraplégiques, même en cas de rupture de la moelle épinière au niveau thoraco-lombaire, grâce à son innervation au niveau du plexus cervico-brachial.",
                'exampleExercise' => 'TIRAGE HORIZONTALE A LA POULIE assis face à l’appareil, les pieds sur les cales, buste fléchi:
                -inspirer et ramener la poignée à la base du sternum en redressant le dos et en tirant les coudes en arrière le 
                plus loin possible.'
            ],
            [
                'name' => 'Dos',
                'description' => "Le dos est composé d'un grand nombre de groupes musculaires. Parmi les principaux groupes de muscles, on retrouve les muscles grands dorsaux (qui sont les plus volumineux), les muscles trapèze situé en haut du dos (composé de trois faisceaux : supérieur, moyen et inférieur) et les muscles lombaires en bas du dos.",
                'exampleExercise' => 'SOULEVE DE TERRE Debout, face à la barre, jambes légèrement écartées, le dos bien fixé et un peu cambré:
                -fléchir les jambes pour amenez les cuisses un peu près à l’horizontale (position variable selon la souplesse);
                -saisir la barre bras tendus, les mains en pronation un peu plus écartées que les épaules (on peut changer le 
                sans d’une main pour éviter que la barre roule si il y a trop de charge).
                -inspirer, bloquer la respiration, contracter la sangle abdominale et la région lombaire, et soulever la barre en 
                tendant les jambes et en la faisant glisser le long des tibias;
                -maintenir l’extension du corps deux secondes, puis reposer la barre en maintenant la sangle abdominale et la 
                région lombaire contractées. Pendant l’exécution du mouvement il est impératif de ne jamais arrondir le dos.
                Ce mouvement est très efficace et fait travailler les muscles sacro-lombaires, les trapèzes, les fessiers et les 
                quadriceps. Ce mouvement peut avoir des variantes commme la prise soumot, il s’agit d’une prise avec les 
                jambes très écartées.'
            ],
            [
                'name' => 'Quadriceps',
                'description' => "Le muscle quadriceps fémoral est dans le corps humain celui qui présente le plus gros volume. Le muscle quadriceps fémoral est localisé dans la cuisse. Il est constitué de quatre faisceaux, le muscle droit fémoral, le muscle vaste latéral, le muscle vaste médial et le muscle vaste intermédiaire.",
                'exampleExercise' => 'Le SQUAT: la barre posée sur le support, se glisser dessous et la placer sur les trapèzes 
                un peu plus haut que les deltoïdes postérieurs; saisir la barre à pleines mains avec un écartement variable 
                selon les morphologies et tirer les coudes en arrière; -inspirer fortement, cambrer légèrement le dos en effectuant une antéversion du bassin, contracter la sangle abdominale, regarder droit devant soi et décoller la 
                barre du support. Reculer d’un ou deux pas, s’accroupir en inclinant le dos vers l’avant en controlant la descente et en arrondissant jamais le dos.'
            ],
            [
                'name' => 'Ischios',
                'description' => "Un muscle ischio-jambier appartient à un groupe musculaire de la cuisse permettant l'extension de la hanche et la flexion du genou. Ce groupe rassemble des muscles polyarticulaires qui vont de la hanche jusqu'à l'arrière du tibia et de la fibula (péroné).",
                'exampleExercise' => 'LEG CURL: Allongé à plat ventre, les mains aggripées aux poignets, jambes tendues sous 
                le boudin, effectuer une flexion simultanée des jambes, en essayant de toucher les fesses avec les talons.'
            ],
            [
                'name' => 'Adducteurs',
                'description' => "Un adducteur est un muscle qui s'emploie dans le mouvement opposé à celui de l'abduction. Il permet de rapprocher du corps un membre qui en avait été éloigné. Les adducteurs sont situés à l'intérieur de la cuisse. Ils servent à verrouiller le bassin en station debout, quand on est par exemple en appui sur une jambe.",
                'exampleExercise' => 'A la machine guidée, jambes écartées: resserrer les cuisses, revenir à la position de départ en contrôlant le 
                mouvement. Il faut attendre d’avoir une sensation de brûlure pour un meilleure résultat. '
            ],
            [
                'name' => 'Mollets',
                'description' => "Le mollet est la partie bombée, localisée entre le tendon d'Achille et le jarret. Le mollet est musclé par le muscle triceps sural et les muscles péroniers latéraux, c'est-à-dire le muscle long fibulaire et le muscle court fibulaire. Ces muscles donnent son volume au mollet.",
                'exampleExercise' => 'Cet exercice sollicite essentiellement le soléaire, il a pour fonction l’extension des chevilles.
                Exemple d’exercice: à la machine guidée: assis sur l’appareil, le bas des cuisses engagé sous la partie rembourré, l’avant des pieds sur le socle, les chevilles en flexion passive:-effectuer une extension des pieds (flexion plantaire).'
            ],
            [
                'name' => 'Fessier',
                'description' => "Les fesses sont constituées principalement du muscle fessier qui est composé de trois couches : Le grand fessier : en superficie, c'est le muscle le plus gros et le plus puissant du corps. Le moyen fessier : sur le côté, en dessous du grand fessier, Le petit fessier : en profondeur et peu développé",
                'exampleExercise' => 'Installé sur le banc, les chevilles bloquées, l’axe de flexion passant par l’articulation coxo-fémorale, le pubis en dehors du banc:-buste fléchi, effectuer une extension jusqu’à l’horizontale 
                en relevant la tête, puis réaliser une hyperextension reconnaisable à l’accentuation de la courbure lombaire. 
                Flexion des cuisses avec haltères: debout, poids légèrement écartés, un haltère dans chaque main, les bras 
                relâchés:-regarder droit devant soi, inspirer, cambrer légèrement le dos et effectuer une flexion des cuisses; 
                -quand les fémurs arrivent à l’horizontale, réaliser une extension des jambes pour revenir) la position initiale'
            ],
            [
                'name' => 'Abdominaux',
                'description' => "Il sollicite principalement le droit de l’abdomen",
                'exampleExercise' => 'Exemple d’exercice: Allongé sur le dos, les mains derrière la tête les cuisses à la verticale, les genoux fléchis: 
                -inspirer et décoller les épaules du sol en rapprochant les genoux de la tête par un enroulement du rachis.'
            ],
        ];

        foreach ($bodyPartData as $bodyPartData) {
            $bodyPart = new BodyPart();
            $bodyPart->setName($bodyPartData['name']);
            $bodyPart->setDescription($bodyPartData['description']);
            $bodyPart->setExempleExercice($bodyPartData['exampleExercise']);

            $manager->persist($bodyPart);
        }

        $manager->flush();
    }
}