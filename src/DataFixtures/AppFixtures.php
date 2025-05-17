<?php

namespace App\DataFixtures;

use App\Entity\Medicament;
use App\Entity\Pharmacien;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }
    public function load(ObjectManager $manager): void
    {
        $medicament = new Medicament();
        $medicament 
        -> setNomComm("Paracétamol") 
        -> setNomGen("Ibuprofen")
        -> setDosage(1000)
        -> setPrix("3.50")
        -> setForme("Comprimé")
        -> setNotice("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus efficitur pharetra metus. Nulla aliquam at mauris eu faucibus. Nunc sit amet odio id lorem gravida condimentum. Aliquam erat volutpat. Mauris rutrum vehicula commodo. Ut lacus orci, vehicula sed erat at, efficitur maximus libero. Morbi volutpat blandit erat, eget suscipit sapien. Ut luctus felis tellus, ac fringilla libero euismod non. Quisque sed facilisis est. Proin pulvinar facilisis feugiat. Suspendisse vitae eros finibus nulla congue finibus. Mauris sed velit sed lorem mattis interdum egestas a turpis. Vivamus blandit nisl quis risus hendrerit, in placerat justo suscipit. Aliquam non nulla et purus consectetur efficitur vitae sed justo.")
        -> setIndication("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus efficitur pharetra metus. Nulla aliquam at mauris eu faucibus. Nunc sit amet odio id lorem gravida condimentum. Aliquam erat volutpat. Mauris rutrum vehicula commodo. Ut lacus orci, vehicula sed erat at, efficitur maximus libero. Morbi volutpat blandit erat, eget suscipit sapien. Ut luctus felis tellus, ac fringilla libero euismod non. Quisque sed facilisis est. Proin pulvinar facilisis feugiat. Suspendisse vitae eros finibus nulla congue finibus. Mauris sed velit sed lorem mattis interdum egestas a turpis. Vivamus blandit nisl quis risus hendrerit, in placerat justo suscipit. Aliquam non nulla et purus consectetur efficitur vitae sed justo.")
        -> setContreIndication("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus efficitur pharetra metus. Nulla aliquam at mauris eu faucibus. Nunc sit amet odio id lorem gravida condimentum. Aliquam erat volutpat. Mauris rutrum vehicula commodo. Ut lacus orci, vehicula sed erat at, efficitur maximus libero. Morbi volutpat blandit erat, eget suscipit sapien. Ut luctus felis tellus, ac fringilla libero euismod non. Quisque sed facilisis est. Proin pulvinar facilisis feugiat. Suspendisse vitae eros finibus nulla congue finibus. Mauris sed velit sed lorem mattis interdum egestas a turpis. Vivamus blandit nisl quis risus hendrerit, in placerat justo suscipit. Aliquam non nulla et purus consectetur efficitur vitae sed justo.")
        -> setEffetSec("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus efficitur pharetra metus. Nulla aliquam at mauris eu faucibus. Nunc sit amet odio id lorem gravida condimentum. Aliquam erat volutpat. Mauris rutrum vehicula commodo. Ut lacus orci, vehicula sed erat at, efficitur maximus libero. Morbi volutpat blandit erat, eget suscipit sapien. Ut luctus felis tellus, ac fringilla libero euismod non. Quisque sed facilisis est. Proin pulvinar facilisis feugiat. Suspendisse vitae eros finibus nulla congue finibus. Mauris sed velit sed lorem mattis interdum egestas a turpis. Vivamus blandit nisl quis risus hendrerit, in placerat justo suscipit. Aliquam non nulla et purus consectetur efficitur vitae sed justo.")
        -> setComposition("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus efficitur pharetra metus. Nulla aliquam at mauris eu faucibus. Nunc sit amet odio id lorem gravida condimentum. Aliquam erat volutpat. Mauris rutrum vehicula commodo. Ut lacus orci, vehicula sed erat at, efficitur maximus libero. Morbi volutpat blandit erat, eget suscipit sapien. Ut luctus felis tellus, ac fringilla libero euismod non. Quisque sed facilisis est. Proin pulvinar facilisis feugiat. Suspendisse vitae eros finibus nulla congue finibus. Mauris sed velit sed lorem mattis interdum egestas a turpis. Vivamus blandit nisl quis risus hendrerit, in placerat justo suscipit. Aliquam non nulla et purus consectetur efficitur vitae sed justo.")
        -> setFabricant("Sanofi");
        $manager->persist($medicament);

        $medicament1 = new Medicament();
        $medicament1
            ->setNomComm("Doliprane")
            ->setNomGen("Paracétamol")
            ->setDosage(500)
            ->setPrix("2.00")
            ->setForme("Comprimé")
            ->setNotice("Notice Doliprane...")
            ->setIndication("Indication Doliprane...")
            ->setContreIndication("Contre-indication Doliprane...")
            ->setEffetSec("Effets secondaires Doliprane...")
            ->setComposition("Paracétamol 500mg")
            ->setFabricant("Sanofi");
        $manager->persist($medicament1);

        $medicament2 = new Medicament();
        $medicament2
            ->setNomComm("Nurofen")
            ->setNomGen("Ibuprofène")
            ->setDosage(400)
            ->setPrix("3.00")
            ->setForme("Capsule")
            ->setNotice("Notice Nurofen...")
            ->setIndication("Indication Nurofen...")
            ->setContreIndication("Contre-indication Nurofen...")
            ->setEffetSec("Effets secondaires Nurofen...")
            ->setComposition("Ibuprofène 400mg")
            ->setFabricant("Reckitt Benckiser");
        $manager->persist($medicament2);

        $medicament3 = new Medicament();
        $medicament3
            ->setNomComm("Spasfon")
            ->setNomGen("Phloroglucinol")
            ->setDosage(80)
            ->setPrix("2.50")
            ->setForme("Lyophilisat")
            ->setNotice("Notice Spasfon...")
            ->setIndication("Indication Spasfon...")
            ->setContreIndication("Contre-indication Spasfon...")
            ->setEffetSec("Effets secondaires Spasfon...")
            ->setComposition("Phloroglucinol 80mg")
            ->setFabricant("Teva Santé");
        $manager->persist($medicament3);

        $medicament4 = new Medicament();
        $medicament4
            ->setNomComm("Augmentin")
            ->setNomGen("Amoxicilline + Acide clavulanique")
            ->setDosage(875)
            ->setPrix("6.50")
            ->setForme("Comprimé pelliculé")
            ->setNotice("Notice Augmentin...")
            ->setIndication("Indication Augmentin...")
            ->setContreIndication("Contre-indication Augmentin...")
            ->setEffetSec("Effets secondaires Augmentin...")
            ->setComposition("Amoxicilline 875mg, Acide clavulanique 125mg")
            ->setFabricant("GlaxoSmithKline");
        $manager->persist($medicament4);

        $medicament5 = new Medicament();
        $medicament5
            ->setNomComm("Dafalgan")
            ->setNomGen("Paracétamol")
            ->setDosage(1000)
            ->setPrix("4.00")
            ->setForme("Suppositoire")
            ->setNotice("Notice Dafalgan...")
            ->setIndication("Indication Dafalgan...")
            ->setContreIndication("Contre-indication Dafalgan...")
            ->setEffetSec("Effets secondaires Dafalgan...")
            ->setComposition("Paracétamol 1000mg")
            ->setFabricant("UPSA");
        $manager->persist($medicament5);

        $pharmacien = new Pharmacien();
        $pharmacien
            ->setNom("Philibert")
            ->setPrenom("Dujardin")
            ->setTelephone("0645313217")
            ->setDOB(new DateTime("1997-09-24"))
            ->setNumeroLicence("10123456789")
            ->setRppsPharmacien("10123456789");
        $manager->persist($pharmacien);

        $user = new User();
        $user
            ->setCourriel("test@example.com")
            ->setRoles(["ROLE_ADMIN"])
            ->setPassword($this -> hasher -> hashPassword($user, "0000"))
            ->setPharmacien($pharmacien);
        $manager->persist($user);

        $pharmacien1 = new Pharmacien();
        $pharmacien1
            ->setNom("Lemoine")
            ->setPrenom("Sophie")
            ->setTelephone("0678123456")
            ->setDOB(new DateTime("1985-03-14"))
            ->setNumeroLicence("10198765432")
            ->setRppsPharmacien("10198765432");
        $manager->persist($pharmacien1);

        $user1 = new User();
        $user1
            ->setCourriel("sophie.lemoine@example.com")
            ->setRoles(["ROLE_USER"])
            ->setPassword($this -> hasher -> hashPassword($user, "0000"))
            ->setPharmacien($pharmacien1);
        $manager->persist($user1);

        $pharmacien2 = new Pharmacien();
        $pharmacien2
            ->setNom("Martin")
            ->setPrenom("Julien")
            ->setTelephone("0622334455")
            ->setDOB(new DateTime("1990-07-22"))
            ->setNumeroLicence("10145678901")
            ->setRppsPharmacien("10145678901");
        $manager->persist($pharmacien2);

        $user2 = new User();
        $user2
            ->setCourriel("julien.martin@example.com")
            ->setRoles(["ROLE_USER"])
            ->setPassword($this -> hasher -> hashPassword($user2, "0000"))
            ->setPharmacien($pharmacien2);
        $manager->persist($user2);

        $pharmacien3 = new Pharmacien();
        $pharmacien3
            ->setNom("Moreau")
            ->setPrenom("Claire")
            ->setTelephone("0611223344")
            ->setDOB(new DateTime("1988-12-05"))
            ->setNumeroLicence("10111223344")
            ->setRppsPharmacien("10111223344");
        $manager->persist($pharmacien3);

        $user3 = new User();
        $user3
            ->setCourriel("claire.moreau@example.com")
            ->setRoles(["ROLE_USER"])
            ->setPassword($this -> hasher -> hashPassword($user3, "0000"))
            ->setPharmacien($pharmacien3);
        $manager->persist($user3);

        $manager->flush();
    }
}
