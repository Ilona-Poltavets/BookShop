// Fancybox.bind('[data-fancybox="single"]', {
//     groupAttr: false,
// });
Fancybox.bind('[data-fancybox="gallery"]', {
    //
});
Fancybox.bind('[data-fancybox="single"]', {
    groupAttr: false,
});
function showMobileMenu() {
    $("#mobileShow").hide("slow");
    $("#mobileHide").show("slow");
    $(".mobile-menu-container").show("slow");
}

function hideMobileMenu() {
    $("#mobileHide").hide("slow");
    $("#mobileShow").show("slow");
    $(".mobile-menu-container").hide("slow");
}

