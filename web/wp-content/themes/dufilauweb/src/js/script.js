(function($){

    var Site = {

        mobileMenu: function() {

            $('.menu-burger a.open').click(function(event){

                event.preventDefault();
                $(this).css('display', 'none');
                $('.menu-burger a.close').css('display', 'block');
                $('.menu-and-search')
                    .animate({
                        top: 35
                    });

            });

            $('.menu-burger a.close').click(function(event){

                event.preventDefault();
                $(this).css('display', 'none');
                $('.menu-burger a.open').css('display', 'block');
                $('.menu-and-search')
                    .animate({
                        top: -244
                    });

            });

        },

        filterCategory: function() {
            $('.filter form select').change(function() {
                $(this).parents('form').submit();
            });
        }

    };

    $(document).ready(function(){
        Site.mobileMenu();
        Site.filterCategory();
    });

})(jQuery);