(function ($) {
    "use strict";

    /*-------------------------------------
    After Load All Content Add a Class
    -------------------------------------*/

    window.onload = addNewClass();

    function addNewClass() {
        $('.lrf-animation-layout').imagesLoaded().done(function (instance) {
            $('.lrf-animation-layout').addClass('loaded');
        });
    }
    
    /*-------------------------------------
    Toggle Class
    -------------------------------------*/
    $(".toggle-password").on('click', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    // Collapse accordion every time dropdown is shown
    $('.dropdown-accordion').on('show.bs.dropdown', function (event) {
      var accordion = $(this).find($(this).data('accordion'));
      accordion.find('.panel-collapse.in').collapse('hide');
    });

    // Prevent dropdown to be closed when we click on an accordion link
    $('.dropdown-accordion').on('click', 'a[data-toggle="collapse"]', function (event) {
      event.preventDefault();
      event.stopPropagation();
      $($(this).data('parent')).find('.panel-collapse.in').collapse('hide');
      $($(this).attr('href')).collapse('show');
    });

    var selectIds =$('#starredBoards,#recentBoards,#personalBoards,#developerBoards');
        $(function ($) {
        selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
            $(this).prev().find('i').toggleClass('fas fa-plus fas fa-minus');
        });
    });


    
     
})(jQuery);

function showImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#onChangeImg')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }



