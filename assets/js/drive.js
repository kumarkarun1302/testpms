/*
Template: Drive
Author: ANJ Webtech Pvt Ltd.
Design and Developed by: ANJ Webtech Pvt Ltd.
NOTE: This file contains the styling for responsive Template.
*/

(function(jQuery) {

    "use strict";

    jQuery(document).ready(function() {

        /*---------------------------------------------------------------------
        Tooltip
        -----------------------------------------------------------------------*/
        jQuery('[data-toggle="popover"]').popover();
        jQuery('[data-toggle="tooltip"]').tooltip();

        /*---------------------------------------------------------------------
        Fixed Nav
        -----------------------------------------------------------------------*/

        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 0) {
                $('.dd-top-navbar').addClass('fixed');
            } else {
                $('.dd-top-navbar').removeClass('fixed');
            }
        });

        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 0) {
                $('.white-bg-menu').addClass('sticky-menu');
            } else {
                $('.white-bg-menu').removeClass('sticky-menu');
            }
        });


       /*---------------------------------------------------------------------
        Sidebar Widget
        -----------------------------------------------------------------------*/

        jQuery(document).on("click", '.dd-menu > li > a', function() {
            jQuery('.dd-menu > li > a').parent().removeClass('active');
            jQuery(this).parent().addClass('active');
        });

        // Active menu
        var parents = jQuery('li.active').parents('.dd-submenu.collapse');

        parents.addClass('show');


        parents.parents('li').addClass('active');
        jQuery('li.active > a[aria-expanded="false"]').attr('aria-expanded', 'true');

        /*---------------------------------------------------------------------
       Page Loader
       -----------------------------------------------------------------------*/
        jQuery("#load").fadeOut();
        jQuery("#loading").delay().fadeOut("");


        /*---------------------------------------------------------------------
        Page Menu
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', '.wrapper-menu', function() {
            jQuery(this).toggleClass('open');
        });

        jQuery(document).on('click', ".wrapper-menu", function() {
            jQuery("body").toggleClass("sidebar-main");
        });


        /*---------------------------------------------------------------------
        Data tables
        -----------------------------------------------------------------------*/
        if($.fn.DataTable){
            $('.data-table').DataTable();
        }


        /*---------------------------------------------------------------------
        Remove collapse panel
        -----------------------------------------------------------------------*/

        jQuery(window).bind("resize", function () {
            if (jQuery(this).width() <= 1199) {
                jQuery('.dd-navbar-callapse-menu .collapse').removeClass('show');
            } else{
                jQuery('.dd-navbar-callapse-menu .collapse').addClass('show');
            }
        }).trigger('resize');


          /*---------- */
          $(".dropdown-menu li a").click(function(){
            var selHtml = $(this).html();
            var selName = $.trim($(this).text())
            $(this).parents('.btn-group').find('.search-replace').html(selHtml);
            $(this).parents('.btn-group').find('.search-query').val(selName);
          });
    });

})(jQuery);