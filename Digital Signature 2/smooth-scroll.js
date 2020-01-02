$(document).ready(function() {
    
    $(function() {
        $('.smooth-scroll').on('click', function(event) {
            const target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top
                }, 1200);
            }
        });
    });
});

