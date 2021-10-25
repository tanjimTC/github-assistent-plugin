<?php 

    namespace Tanjim\GithubAssistent\Frontend;

    class ShortCode {
        function __construct () {
            add_shortcode("ninja-academy" ,  [$this ,  "render_shortcode"]);
        }
        
        public function render_shortcode ($atts , $contnet = "") {
            return "<div class='academy-shortcode'>
            hello from short code
            </div>";
        }
    }