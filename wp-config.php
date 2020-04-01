<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'quiappelleptfr' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'quiappelleptfr' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'wQtkHwAcujYrQAQI' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '=8%9#<Uro`.egDf)6 &YT1l%4,Z9)]FTiQWxLl2! [dp_;l&yQW5%u?L7y:HLlB}' );
define( 'SECURE_AUTH_KEY',  'Po; FAvAVBC@h#I]i?`@kB.)!eI,tKr;w{p{KUQx)[dsMV&%r0<sFv+ ~a4^*fBF' );
define( 'LOGGED_IN_KEY',    'aQgd`9H6SsV&s%vL9YcP+J~26A#4|v+Al{@]]Hic:L!Z-ZI}aKfjyrlRj7u _xi%' );
define( 'NONCE_KEY',        '~1>.qlNCdS(7eN+[4j,}|$m{jsXE`;B~DT&[N{1`k!73VDuPf.m61#!&/ jgB1X(' );
define( 'AUTH_SALT',        '!2Osjew@w2-0BA#paWFTZf}/hi,9z*5q-(rL$h6+BHV}/5;T?:*N1FO5uV*pWi;F' );
define( 'SECURE_AUTH_SALT', 'wh2u9Ta;g2lx6]U3;Ka<nV?T?0Ux1[G}.%n<23BMU7C/-,Dy)xf?PQLwn.AL1+j:' );
define( 'LOGGED_IN_SALT',   '@-7p+S)pz.<x<=c:Ck0 i9vN pX(gcL1]k%N;1/&yVF:xjz8PAJW 9#h+v!uHm@)' );
define( 'NONCE_SALT',       '785QkG/B|`HB}|:mt+J/PJ.KL`l<]K:0|S)H7N!qR4E?W8]dObl^7jxX102ndLqb' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
