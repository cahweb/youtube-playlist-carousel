<?php
/**
 * Plugin Name: CAH - YouTube Playlist Carousel
 * Description: A plugin to pull the first few videos from CAH's Arts On! YouTube playlist and display them. (Full carousel functionality not yet implemented)
 * Author: Mike W. Leavitt
 * Version: 0.1.0
 */
defined( 'ABSPATH' ) or die( 'no direct access plzthx' );

define( 'YT_PL_CAROUSEL__VERSION', '0.1.0' );
define( 'YT_PL_CAROUSEL__PLUGIN_FILE', __FILE__ );
define( 'YT_PL_CAROUSEL__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'YT_PL_CAROUSEL__PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );

if( !class_exists( 'YouTubePlayListCarousel' ) ) {
    class YouTubePlayListCarousel
    {
        private function __construct() {} // Prevents instantiation

        public static function setup() {
            add_action( 'wp_loaded', [ __CLASS__, 'register_scripts' ], 10, 0 );
            add_action( 'the_posts', [ __CLASS__, 'maybe_load_scripts' ] );
            add_shortcode( 'youtube-playlist', [ __CLASS__, 'shortcode' ] );
        }


        public static function register_scripts() {
            wp_register_script( 'yt-playlist-chunk', YT_PL_CAROUSEL__PLUGIN_DIR_URL . 'dist/js/chunk_youtube-playlist-carousel.js', [], YT_PL_CAROUSEL__VERSION, true );
            wp_register_script( 'yt-playlist-main', YT_PL_CAROUSEL__PLUGIN_DIR_URL . 'dist/js/youtube-playlist-carousel.js', [ 'yt-playlist-chunk' ], YT_PL_CAROUSEL__VERSION, true );
            wp_register_style( 'yt-playlist-style', YT_PL_CAROUSEL__PLUGIN_DIR_URL . 'dist/css/youtube-playlist-carousel.css', [], YT_PL_CAROUSEL__VERSION, 'all' );
        }


        public static function maybe_load_scripts( $posts ) {
            foreach( $posts as $post ) {
                if( stripos( $post->post_content, '[youtube-playlist' ) !== false ) {
                    self::_load_scripts();
                    break;
                }
            }

            return $posts;
        }


        public static function shortcode( $atts ) {
            $a = shortcode_atts( [], $atts );

            ob_start();
            ?>
            <div id="yt-carousel-app"></div>
            <?php
            return ob_get_clean();
        }


        private static function _load_scripts() {
            wp_enqueue_script( 'yt-playlist-main' );
            wp_enqueue_style( 'yt-playlist-style' );
        }
    }
}

add_action( 'init', [ 'YouTubePlayListCarousel', 'setup' ] );
?>