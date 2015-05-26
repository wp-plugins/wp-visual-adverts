(function($) {  
    $(window).load(function() {
        $('.main-visual-adverts').each(function() {
            var id = $(this).closest('.widget_rpadv_widget').eq(0).attr('id');
            $(this).attr('data-id', id);            
            $(this).height($(this).find('.visual-adverts.add').outerHeight());
        });
    });
    
    $(document).ready(function() { 
        $('.main-visual-adverts').each(function() {
            var id = $(this).closest('.widget_rpadv_widget').eq(0).attr('id');
            $(this).attr('data-id', id);            
            
            $(this).height($(this).find('.visual-adverts.add').outerHeight());

            advertsRefresh(id);
        });
        
        function advertsRefresh(id) {
            var owner = $('[data-id=' + id + ']');
            
            $(owner).find('.visual-adverts').removeClass('add');  

            var data = {};
            data.action = 'advertsRefresh';
            data.nonce = ajax_rpadv.ajax_nonce;
            data.id = id;
                    

            $.ajax({
                url: ajax_rpadv.ajax_url,
                type: 'POST' ,
                data: data,
                dataType: 'html',
                cache: false,
                success: function(data) {
                    $(owner).find('.visual-adverts').addClass('remove');

                    $(owner).append(data);
                    
                    $(owner).find('.visual-adverts.add').fadeIn(ajax_rpadv.animationSpeed[id], function () {
                        $(owner).height($(this).outerHeight());
                    });                    

                    $(owner).find('.visual-adverts.remove').fadeOut(ajax_rpadv.animationSpeed[id], function() {
                        $(this).remove();  
                    });                    

                    if (ajax_rpadv.refreshTime[id] > 0 && ajax_rpadv.advertCount[id] > ajax_rpadv.advertCountPage[id] ) {
                        setTimeout(function() {advertsRefresh(id)}, ajax_rpadv.refreshTime[id]);   
                    }
                },
                error: function (request, status, error) {
                    setTimeout(function() {advertsRefresh(id)}, 3000);   
                }
            });                   
        };
    });
    
})(jQuery);


