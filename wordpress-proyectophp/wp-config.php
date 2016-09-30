<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'hotel');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'k2}3GIQAhV~ov{qJ9`P9E,*WATq;UIf?fkwDHlRxAq]9.)pn#~6*z/[4GCu[ep@3');
define('SECURE_AUTH_KEY', 'lo/7FtIA<ON,F:HidKl^RZa[$K#D#b_>YHa@T;l(I*Is5kw3j_`$`N%6Trc7=@}s');
define('LOGGED_IN_KEY', '-CCIz18/sVaN?moN;/SkCHF);$(pIb%X3*L~cs[-@cv$a{RX5MUW`$jAnaAQAU W');
define('NONCE_KEY', 'MxIY=/T8s]U6)c]Ds{vLSaA7Z6gJ_*yD/.B`7^0u_][,U Ll;b)~KK:=RSW@9h`$');
define('AUTH_SALT', 'H^c+al} #/og@.x_3_x970[e7}NvWl#D6UQ}t)m,:>ENizT)b^vu9)O7wcyA|nB^');
define('SECURE_AUTH_SALT', '1v63)4Qx-aI(?@R8sDbhEQq-`+_OY9576hStvi|FV>muSgIDC3%M=TunLn9-yRsj');
define('LOGGED_IN_SALT', 'h_:+wS:h_n--[$!sxgm2YP?@e,$V<](6S6pUTo=06E3ezHa])P?Kh8%MRp[D+JJp');
define('NONCE_SALT', ')cAa!l|W/)a fy_lb3} M}X!S!dD{Dp3l=JT.GI#F?V%4@c0>1^^yrO2(zIPl_GY');
define('WP_MEMORY_LIMIT', '800M');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

