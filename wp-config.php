<?php
/**
 * In dieser Datei werden die Grundeinstellungen für WordPress vorgenommen.
 *
 * Zu diesen Einstellungen gehören: MySQL-Zugangsdaten, Tabellenpräfix,
 * Secret-Keys, Sprache und ABSPATH. Mehr Informationen zur wp-config.php gibt es
 * auf der {@link http://codex.wordpress.org/Editing_wp-config.php wp-config.php editieren}
 * Seite im Codex. Die Informationen für die MySQL-Datenbank bekommst du von deinem Webhoster.
 *
 * Diese Datei wird von der wp-config.php-Erzeugungsroutine verwendet. Sie wird ausgeführt,
 * wenn noch keine wp-config.php (aber eine wp-config-sample.php) vorhanden ist,
 * und die Installationsroutine (/wp-admin/install.php) aufgerufen wird.
 * Man kann aber auch direkt in dieser Datei alle Eingaben vornehmen und sie von
 * wp-config-sample.php in wp-config.php umbenennen und die Installation starten.
 *
 * @package WordPress
 */

/**  MySQL Einstellungen - diese Angaben bekommst du von deinem Webhoster. */
/**  Ersetze database_name_here mit dem Namen der Datenbank, die du verwenden möchtest. */
define( 'DB_NAME', 'zeitmanagement_tool' );

/** Ersetze username_here mit deinem MySQL-Datenbank-Benutzernamen */
define( 'DB_USER', 'root' );

/** Ersetze password_here mit deinem MySQL-Passwort */
define( 'DB_PASSWORD', '' );

/** Ersetze localhost mit der MySQL-Serveradresse */
define( 'DB_HOST', 'localhost' );

/** Der Datenbankzeichensatz der beim Erstellen der Datenbanktabellen verwendet werden soll */
define( 'DB_CHARSET', 'utf8mb4' );

/** Der collate type sollte nicht geändert werden */
define('DB_COLLATE', '');

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden KEY in eine beliebige, möglichst einzigartige Phrase.
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * kannst du dir alle KEYS generieren lassen.
 * Bitte trage für jeden KEY eine eigene Phrase ein. Du kannst die Schlüssel jederzeit wieder ändern,
 * alle angemeldeten Benutzer müssen sich danach erneut anmelden.
 *
 * @seit 2.6.0
 */
define( 'AUTH_KEY',         'A-aX-@+_/)5yUg6=T^eP5;+k,jfV<n[)?(T%lw}#dnalVUgL}^w.~E3r/DeWY`AG' );
define( 'SECURE_AUTH_KEY',  'n@t[/D%>losDvdCXl(GEcN@h*Ek`DL=S?kO.f(cR5NEZz~$5(zZ+M4i}*Sa,%A%E' );
define( 'LOGGED_IN_KEY',    '8 [[UR=jd,?+.De=M0rG `Z_(Dgq*qDU%a1 @!{YfMbh!p$wnktmL6vguJR|4DsA' );
define( 'NONCE_KEY',        '6cq.s&htTa7E6/>fiue@ROLP}c*ZD}uN0:TMhM W^^!gbLwt]/wqIn+[U(H8X.L4' );
define( 'AUTH_SALT',        '(J}ZnWD~fRHyU>EwK}*t:,[>:8-rIyqkoDjGu8~6E.u_I^KAw?elnku2&%]&{9Id' );
define( 'SECURE_AUTH_SALT', '0sib{{|@wpH.P^v835:4+i@Tk=g2k{brOVPquYKAz,)02KjyMA?soa3U>XWb`6Lg' );
define( 'LOGGED_IN_SALT',   'si]#e&*W`rpAk *<>k764*r#Yyo7X:S!U0w4g +[|NWm9CYCw*v`UU]]AmdSUJGN' );
define( 'NONCE_SALT',       'vyQqAAiV]t,BHa`X5<;J*S%XC8u.JlqOBKF[RK)uyT/|c1P&W:Z-$]Y2tOxd3 +$' );

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 *  Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 *  verschiedene WordPress-Installationen betreiben. Nur Zahlen, Buchstaben und Unterstriche bitte!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
