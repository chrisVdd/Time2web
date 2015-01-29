Accéder à mon dossier de travail:
    ==> cd /Users/christina/Sites/perso/TFE
*
***********************************************
*********************************************************************************************

1. Vider le cacher
---------------------------------------
    => php app/console cache:clear

********************************************************************************

2. Générer un Bundle:
---------------------------------------

    => php app/console generate:bundle
    => namespace: Site/TutoBundle
    => bundle name: ENTER
    => directory: ENTER
    => format: YML
    => structure: YES

********************************************************************************

3. Générer une entité
---------------------------------------

    => php app/console generate:doctrine:entity
    => shortcut name: FrontTutoBundle:Tutorial
    => format: ENTER (pour annotations)
    => repository generate: YES

********************************************************************************

4. Générer un CRUD
---------------------------------------

    => php app/console generate:doctrine:crud
    => entity shortchut name: FrontTutoBundle:Tutorial
    => write actions: YES
    => format: YML
    => prefix: ENTER
    => ENTER

********************************************************************************

5. Générer la DB
---------------------------------------

    => php app/console doctrine:database:create

********************************************************************************

6. Générer les tables
---------------------------------------

    => php app/console doctrine:schema:update --dump-sql

    => php app/console doctrine:schema:update --force

********************************************************************************

7. Update des entités
---------------------------------------

    => php app/console doctrine:generate:entities SiteUserBundle:User
       php app/console doctrine:generate:entities SiteFrontBundle:Tutorial

********************************************************************************

8. Voir les routes
---------------------------------------

    => php app/console router:debug

********************************************************************************

9. Générer un USER
---------------------------------------

    => php app/console fos:user:create



POUR LES VUES:
-----------------------

- Twig reconnait deux syntaxe:

    * {{ ...... }} : "dit quelque chose", en gros pour écrire quelque chose.
    * {% ...... %} : "fait quelque chose", comme pour les boucles par exemple.

- L'héritage des templates et des layout:

    Avec ce système, un template peut être décoré par un autre.

    Ainsi, on a donc un template de base (dans APP), qui contient tous
    les éléments communs à notre site, mais qui contient aussi 
    des blocs.
    Donc dans le dossier app, le layout de base contient le squelette.

    Les blocs défini dans app/base, on va pouvoir les surcharger 
    grâce à un template enfant.

    Pour le template enfant, il est à placer dans (par exemple) 
    /views/Blog/index.html.twig.
    Et on oublie pas de mettre {% extends '::base.html.twig' %}

    Par contre pour appeller le template de base D'UN BUNDLE 
    (avec tous les blocs spécifique à un bundle donc), on met
    {% extends 'AcmeBlogBundle::layout.html.twig' %}

------------------------------------------------------------------------------------
------------------------------------------------

Pas de souci avec le formulaire de modification d'un USER
Par contre, il y a des merdes avec les fomulaures de mise à jour des AUTHOR et READER.

==> le souci: le label et l'input devraient être entouré d'une div form-group, comme ceci:

<div class="form-group">
    {{ form_label(edit_form.email, 'Email : ', { 'label_attr': {'class': 'col-md-4 control-label'} }) }}

    <div class="col-md-8">
        {{ form_errors(edit_form.email) }}
        {{ form_widget(edit_form.email, {'attr': {'class': 'form-control'}}) }}
    </div>
</div>  

Mais je n'arrive pas à le faire... 
Si je réalise ceci dans le fichier edit du reader par exemple, ça ne semble pas être
pris en compte dans le formulaire user edit qui imbrique user et reader
(ou user et author selon le cas).

-----------------------------------------------------------------------------------------------------------------------

POUR LES IMAGES:

On a 3 entités:

    * image: on va utiliser ceci pour "centraliser" toutes les images et aussi pour l'avatar de l'utilisateur
            donc à chaque user correspond UNE image
    * category_image: à chaque catégorie correspond UNE image
    * tutorial_image: à chaque tutoriel correspond UNE image



Le lien entre image et user est fait, et le crud image aussi.



A un tutoriel peuvent correspondrent plusieurs commentaires (reviews)

OneToMany



Version save 24.09-17h52
 <!--
L'ajout de commentaires se fait bien, il met bien le bon user_id.
Maintenant, il faut juste qu'il ajoute le bon tutorial_id et c'est OK!
-->

Version save 25.09-20H55
 <!--
Il y a juste l'affichage des reviews qui ne fonctionne pas encore. 

-->

Version save 27.09-17H20
 <!--
Tous les reviews fonctionnent.
Je vais essayer de mettre en place les notes, et il faudra aussi penser aux images!

-->

Version save 30.09-20H47
 <!--
Les images sont OK pour les tutos. Il y a juste un souci lors de la redirection, juste après avoir envoyé un nouveau tuto.
Il faut essayer de mettre en place avalanche/image pour faire des thumbnails

-->

Version save 04.10-13H44
 <!--
Les images sont OK pour les tutos et les users.
Il faut essayer de mettre en place avalanche/image pour faire des thumbnails
Il y a juste un souci lors de la redirection, juste après avoir envoyé un nouveau tuto.
-->


Version save 07.10-20H30
 <!--
L'admin marche, mais il faudra bien vérifier le design qui est tout pourri.
On va essater de mettre en place le SEO.
-->

Version save 09.10-19H53
 <!--
Il faut toujours mettre le SEO. 
Il faut aussi gérer le formulaire de contact si possible.
Je test le paypal
-->

Version save 21.10-10h38
 <!--
Le title, le suffixe et les meta sont OK mais A AMELIORER. Mais ça s'affiche.
NEXT: mise en place de la gestion des pages accueil (texte de présentation), à propos (texte about) et contact (text de contact: tel, mail blablabla...)
-->

Version save 22.10 - 15h05
 <!--
Le title, le suffixe et les meta sont OK mais A AMELIORER. Mais ça s'affiche.
NEXT: créer le formulaire de contact
le paypal à faire,
le design aussi pour les user qui est tout moche
-->
        "jms/security-extra-bundle": "1.5.*@dev",
        "jms/di-extra-bundle": "1.4.*@dev",
        "jms/payment-paypal-bundle": "dev-master",
        "jms/payment-core-bundle": "1.0.*@dev",
        "jms/aop-bundle": "1.1.*@dev"

Version save 03.12 - 10h57
 <!--
Sauvegarde juste avant de tenter de transférer la note donnée. 
AVANT la note était liée au commentaire
APRES elle doit être liée au tutoriel
-->

Version save 05.12 - 13h
 <!--
avant de tenter le paypal.
les acl ne fonctionnent pas
-->

Version save 15.12 - 16h08
 <!--
Les deletes fonctionnent.

Il faut:
    * protection des forms
    * acl
    * social
-->

Version save 23.12 - 16h55
 <!--
On tente le RSS
-->













------------------------
Il faut récupérer LA ligne des favoris où:
    * favorite.tutorial == tutorial.id
    * favorite.user == app.user.id
    

il faut récupérer l'id du tutorial dans l'action qui affiche les favoris.

showTuto ==> render du controller favorite/index.
Cette action ne récupère que les favoris qui ont le même tutorial_id
dans favorite/index => render de show qui n'affiche que le favoris qui correspond à l'user_id