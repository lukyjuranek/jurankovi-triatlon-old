$(document).ready(function(){
    $("#insta_glyph").click(function(){
        // $(this).toggleClass("rotate_insta");
        $(".insta-glyph-mini").toggleClass("insta-glyph-mini-hidden");
        $(".insta-link").toggleClass("insta-link-hidden");
        $(".insta-glyph > img").toggleClass("rotate_insta");
        $(".insta_cross").toggleClass("rotate_insta_cross");
    });
});