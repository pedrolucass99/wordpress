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
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'alansurfwear' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         ' oKpXBJ`0EG$@i={I@jAYR.to#=$|Jh2#+$TiP|)n9#,zudh^RUs!UZS]SMYCdNt' );
define( 'SECURE_AUTH_KEY',  'WJEvoXDD(.>viSA16taZcKqixvV@6f9P$Ddq]m9TOvb2=CN_lXGV9CL4?uK%x(U6' );
define( 'LOGGED_IN_KEY',    'O)qR)tSX1z{U:>+^1llg`^af>uf.5MLy91T1<VN $90ee5@Qp2&q9)XQ)0^iq9t ' );
define( 'NONCE_KEY',        'YY;>tYIDi3ByKi6(BqBy@,)jb*i80F-L<kr9iHIPtB]FJI8,,I#<!}&txDt=:1Mj' );
define( 'AUTH_SALT',        'En@nWBv7d8M<#SpmTV+[8McDb}{Za9RL]$$@w*E^.],^!7)UDwRo0WM+c|MV)~n^' );
define( 'SECURE_AUTH_SALT', '|Z2l$1IlMK`>M%<sx=:5qk?i,S%^i]i3Cw<F2y$P/cnf3h;9((#U^D>h#Su>CyTk' );
define( 'LOGGED_IN_SALT',   '8fU8VSGh4_7x^u6D6<d7YpTIr<B*0[ZVm4MI<pM^_R>r}W6!TFu7F-[Gml<7Fl.B' );
define( 'NONCE_SALT',       'G/y$xg4R*sq@?8}!U&~Kdl&dr/^q^zs^5Vih|8R+)`k(V{<9@&bmuY@aR{SdqP<}' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
