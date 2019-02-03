<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'wordpress_starter');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'GJ(za?48IGwwC;88;!|vz$<9&k%2%LxYk6uw^rk2n(K#`/[t%ow1CMf};cE6&t_4');
define('SECURE_AUTH_KEY',  'Q@ispP%gd|V^{H-UE51J6f90z3K@Oo<&&/Ma&ms xY,M!_;,8!O+KtpgtwI,J?A^');
define('LOGGED_IN_KEY',    'N}m$OC8)4D(t 0t[.f?R<`5Vc[C!5/:_JQWQn0L3m-=p0$?+u*+X`QUkGD7L)bF~');
define('NONCE_KEY',        'c1j4OV=L*y.eX~M0AQ.Z1/rU:4>l^<e_Eu_6{lIwm)I!>k6]2s<,r.RPD90)MfaN');
define('AUTH_SALT',        'Iw>dXI;h>wGI]P1tHO!G.6 <gEZN**qpS7f(n[E=Qha}x|8G+L|JJ7lFnh<,GsyJ');
define('SECURE_AUTH_SALT', 'p9mbehmZB=m,5<[*mG(#SL12YlaTPS*>f{1HK>wW3jN !o+%aze!`Wt>1.K7{ }(');
define('LOGGED_IN_SALT',   'EZ8,IltDkM?|>GJ:.+^6N#R^),k|/8W(s1Sd&&~Z<lkZ7dHRvmBY2W>h$nA>/wC&');
define('NONCE_SALT',       'O}F&.%w-7-U3cSn-uCSZHw+`~N|:1<ubhd;%,JPMNs?eP.&&UtkJpE{lcrdRZI]l');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
