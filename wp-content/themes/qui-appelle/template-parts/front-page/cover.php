<?php
$default_cover_title = get_bloginfo( 'name' );
$default_cover_lead = get_bloginfo( 'description' );
?>


<section class="jumbotron text-center wp-bs-4-jumbotron border-bottom">
    <div class="bg-overlay">
        <div class="container">
            <div class="jumbotron-content col-12">
                <div class="row align-items-center">
                    <div class="col-9 mx-auto text-left">
                        <div class="header-logo text-center">

                            <a href="/" class="logo">
                                <span class="logo-white-left"></span>
                                Qui appelle
                                <span class="logo-white-right"></span>
                            </a>

                        </div>
                        <div class="annuaire-inverse">
                            <div class="blk-annuaire">
                                <h2 class="content__title"><span>A qui est ce numéro ?</span></h2>
                                <div class="content__head">
                                    <p>Utilisez notre annuaire inversé afin de  savoir qui a tenté de vous appeler.<br />
                                        Il vous suffit de saisir le numéro de téléphone ci-dessous pour obtenir l’identité<br />
                                        de la personne qui vous a appelé.</p>
                                </div>
                            </div>
                            <form action="javascript:;" class="form annuaire-search-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="labelName" placeholder="0658 ..." name="monNum">
                                    <button type="submit" class="btn btn-primary find" id="send">Rechercher</button>
                                    <span id="errormsg"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
