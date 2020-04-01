<?php
/*$annu_particulier_search = new WP_Advanced_Search('annu-particulier-form');
$annu_professionnel_search = new WP_Advanced_Search('annu-professionnel-form');
$num_inverse_search = new WP_Advanced_Search('num-inverse-form');*/
?>
<div id="home">
    <?php

    if ( 'posts' == get_option( 'show_on_front' ) ) {
        include( get_home_template() );
    }
    else {
        if ( ! is_page_template() ) {
            get_header();

            get_template_part( 'template-parts/front-page/cover' );

            ?>

            <?php if ( get_theme_mod( 'show_main_content', 1 ) ) : ?>
                <section class="sec-annuaire " id="sec-annuaire">
                    <div class="annuaire-overlay annuaire-overlay py-3 py-md-7">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layer-annuaire.png" title="" class="img-responsive" alt="">

                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-10 mx-auto">
                                    <div class="content__wrap">
                                        <h1 class="content__title mt-2 mb-3">
                                            <span>Bienvenue sur Qui-Appelle.fr</span>
                                        </h1>
                                        <div class="content__head  text-md-center mb-5">
                                            <p>Bienvenue sur Qui-Appelle.fr, l’annuaire téléphonique qui va vous permettre d’obtenir rapidement toutes les coordonnées des particuliers et des professionnels de France, et également d’identifier le propriétaire d’un numéro de téléphone inconnu, grâce à son incontournable annuaire inversé. </p>
                                        </div>
                                    </div>
                                    <div class="d-md-flex justify-content-center">
                                        <div class="blk-annuaire annuaire-particulier">
                                            <h3>Annuaire particuliers</h3>
                                            <form action="javascript:;" class="form annuaire-search-form" name="form-annuaire-part">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="labelNom" placeholder="Qui ?" name="labelNom">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="labelVille" placeholder="Où ?" name="labelVille">
                                                </div>
                                                <button type="submit" class="btn btn-primary find" id="sendName"><img id="loading-part" class="loading" src="<?php echo get_stylesheet_directory_uri(); ?>/images/loading.gif" title="">Rechercher</button>
                                            </form>
                                        </div>
                                        <div class="blk-annuaire annuaire-pro">
                                            <h3>Annuaire professionnels</h3>
                                            <form action="javascript:;" name="form-annuaire-pro" class="form annuaire-search-form">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="labelMetier" placeholder="Qui ?" name="labelMetier">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="labelVillePro" placeholder="Où ?" name="labelVillePro">
                                                </div>
                                                <button type="submit" class="btn btn-primary find" id="sendNamePro"><img id="loading-pro" class="loading" src="<?php echo get_stylesheet_directory_uri(); ?>/images/loading.gif" title="">Rechercher</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="content__head  text-md-center  mb-0 mt-5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="sec-about py-7">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-10 mx-auto">
                                <div class="content__wrap">
                                    <!--
                                    <h1 class="content__title mt-2 mb-3">
                                        <span>Bienvenue sur Qui-Appelle.fr</span>
                                    </h1>
                                    <div class="content__head  text-center mb-5">
                                        <p>Bienvenue sur Qui-Appelle.fr, l’annuaire téléphonique qui va vous permettre d’obtenir rapidement toutes les coordonnées des particuliers et des professionnels de France, et également d’identifier le propriétaire d’un numéro de téléphone inconnu, grâce à son incontournable annuaire inversé. </p>
                                    </div>
                                    -->
                                </div>
                            </div>
                            <div class="col-12 wysiwyg-text">
                                <p>En effet, la base de données de Qui-Appelle.fr regroupe diverses informations (noms, prénoms, numéros de téléphones, professions, adresses postales et autres coordonnées), mises à jour quotidiennement, pour une meilleure couverture annuaire du territoire français.</p>
                                <p>La fonctionnalité <strong>d’annuaire inversé</strong> permet par exemple, de trouver en temps réel, le nom, le prénom et l’adresse du propriétaire d’une ligne fixe, mobile ou d’un numéro dit « surtaxé » (SVA+, numéros courts, etc).</p>
                                <h2>Retrouvez ainsi sur un même service tous les types d’annuaires pour tout type de requêtes :</h2>
                                <p><strong  style="color: #006baf;">L’annuaire des particuliers :</strong> l’outil en ligne indispensable pour <strong>obtenir rapidement le numéro de téléphone et l’adresse postale d’un particulier en France</strong>, en ne renseignant uniquement que son nom, prénom, ville ou département de domicile.</p>
                                <p>Par exemple, en communiquant à notre service le patronyme « Martin » et la ville de « Mérignac », nos conseillers vous indiqueront la liste des particuliers portant ce nom, dans ce secteur précis, et vous proposeront une mise en relation directe, si vous le souhaitez, avec votre correspondant.</p>
                                <p><strong style="color: #006baf;">L’annuaire des professionnels :</strong> trouver un artisan, une entreprise, une association, une collectivité ou tout autre professionnel devient chose simple en renseignant le secteur d’activité ou le nom de la structure. Ainsi, vous pourrez par exemple <strong>être mis(e) en relation avec un professionnel proche de votre domicile</strong>, en renseignant « activité + ville ». L’annuaire des professionnels étant géolocalisé, vous obtiendrez plus facilement un <strong>rendez-vous avec un professionnel de votre secteur</strong> et cela, quelle que soit votre requête : « Pédiatre + Lyon », « Plombier + Strasbourg », etc.</p>
                                <p><strong  style="color: #006baf;">L’annuaire inversé :</strong> « Qui m’a appelé ? A qui est ce numéro de téléphone ? Comment obtenir un nom, un prénom, une adresse postale à partir d’un numéro de téléphone de ligne fixe, portable ou mobile ? ». Telles sont les questions auxquelles répondra l’annuaire inversé du service Qui-Appelle.fr. Contactez nos conseillers par téléphone, et indiquez juste le numéro de téléphone qui a tenté de vous joindre. Grâce à la fonction "Mise en relation directe sur répondeur mobile" disponible en appelant notre service, vous pourrez <strong>identifier le propriétaire d'un numéro de téléphone portable ou mobile</strong>, si ce dernier a bien personnalisé la messagerie de son répondeur.</p>
                                <p>Notre service vous renseignera aussi sur <strong></strong>l’identité de la société qui se cache derrière un numéro</strong> dit « spécial » qui vous aura appelé, que cet appel soit sollicité ou non sollicité, et quelle que soit la forme du numéro inconnu :</p>
                                <ul>
                                    <li><strong>Numéro de ligne fixe</strong></li>
                                    <li><strong>Numéro court</strong></li>
                                    <li><strong>Numéro de type 118</strong></li>
                                    <li><strong>Numéro azur, vert, indigo ou surtaxé (08 90, 08 92, 08 11, 08 00 ou encore 08 99 XX XX XX).</strong></li>
                                </ul>
                                <p>Vous serez alors renseigné(e) de <strong>l’identité du propriétaire de ce numéro</strong> spécial, son adresse de contact, celle de son siège social et de la tarification du numéro en question.</p>
                                <p><strong  style="color: #006baf;">N’hésitez plus et simplifiez-vous la vie : nous sommes disponibles 24 heures sur 24, 7 jours sur 7, en ligne et par téléphone, pour vous accompagner dans toutes vos recherches annuaires.</strong></p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="sec-actualites py-7">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-10 mx-auto">
                                <div class="content__wrap">
                                    <h1 class="content__title">
                                        <span>Actualités recents</span>
                                    </h1>
                                    <div class="content__head mb-4 text-center"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <?php get_template_part( 'template-parts/posts-slider' ); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="sec-contact">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-10 mx-auto">
                                <div class="content__wrap">
                                    <h1 class="content__title">
                                        <span>Obtenez l’identité d’un propriétaire de numéro de téléphone fixe et mobile</span>
                                    </h1>
                                    <div class="content__head  text-md-center">
                                        <p>L’annuaire Qui-appelle.fr vous permet de connaître les noms, prénoms et adresses postales des propriétaires de lignes fixes, en ne renseignant qu’un simple numéro de téléphone. De plus, grâce à son service de mise en relation directe et discrète sur répondeur, l’identité du détenteur d’une ligne mobile vous sera aussi révélée, si ce dernier à bien personnalisé sa messagerie.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p>Qui se cache derrière ce numéro de téléphone portable inconnu ? Qui m’a appelé plusieurs fois dans la même journée ? A qui appartient ce numéro de téléphone mobile griffonné sur un post-it de mon agenda ?</p>
                                <p>Les fonctionnalités de l’annuaire inversé de Qui-Appelle.fr vous permettront de répondre à toutes ces requêtes nécessitant un service fonctionnel, rapide et performant.</p>
                                <p>Disponibles en ligne et par téléphone, notre base annuaire ainsi que notre service d’écoute de messagerie de répondeur vont enfin répondre aux besoins les plus fréquents en termes de recherche de coordonnées : identifier l’identité d’un appelant à partir d’un simple numéro de téléphone, qu’il soit fixe, mobile, surtaxé ou spécial.</p>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <?php  get_template_part( 'template-parts/front-page/modal' ); ?>
            <?php
            get_footer();
        }
        else {
            include( get_page_template() );
        }
    }
    ?>

</div>
