if (typeof Array.prototype.forEach != 'function') {
    Array.prototype.forEach = function(callback){
      for (var i = 0; i < this.length; i++){
        callback.apply(this, [this[i], i, this]);
      }
    };
}

(function($) {  
    $(document).ready(function() { 
        $('.main-visual-adverts').each(function() {
            $(this).height($(this).find('.visual-adverts.add').outerHeight());
        });
        
        if (ajax_rpadv.refreshTime > 0 && ajax_rpadv.advertCount > 1 ) {
            setTimeout(advertsRefresh, ajax_rpadv.refreshTime);   
        }
        
        function advertsRefresh() {
            $('.visual-adverts').removeClass('add');  
            var data = {};
            data.action = 'advertsRefresh';
            data.nonce = ajax_rpadv.ajax_nonce,
               
            $.ajax({
                url: ajax_rpadv.ajax_url,
                type: 'POST' ,
                data: data,
                dataType: 'html',
                cache: false,
                success: function(data) {
                    $('.visual-adverts').addClass('remove');
                    
                    $('.visual-adverts').each(function() {
                        $(this).closest('.main-visual-adverts').append(data);
                    });
                    $('.visual-adverts.add').each(function() {
                        $(this).fadeIn(ajax_rpadv.animationSpeed, function () {
                            $(this).closest('.main-visual-adverts').height($(this).outerHeight());
                        });                    
                    });
                    
                    $('.visual-adverts.remove').each(function() {
                        $(this).fadeOut(ajax_rpadv.animationSpeed, function() {
                            $(this).remove();  
                        });
                    });                    
                    
                    setTimeout(advertsRefresh, ajax_rpadv.refreshTime);   
                }
            });                   
        }
        
    });
    
})(jQuery);


