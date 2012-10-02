site = {
    
    test: function(){
      var url = '/z2/public/admin/article/show';
 $.ajax({
            type: "POST",
            url: url,
            data: {id: 111},
            dataType:  'html',
            success: function(data){
               // index.open_action_dialog(data,title)
               $('#test_div').html(data);
            }
            });

    },
	hover_submenu: function(){
        var submenu = $(this).children('ul').first();
        if (submenu.length>0) {
            if (submenu.css('display') == 'none') {
                submenu.css({
                    display: 'block', 
                    visibility: 'visible'
                });
            } else {
                submenu.css({
                    display: 'none', 
                    visibility: 'hidden'
                });
            }
        }
    },
    bind_events: function(){
      site.unbind_events();  
      $('#test').click(site.test);
	  $('ul.mainmenu>li').hover(home1.hover_submenu);
    },
    unbind_events: function(){
        
    },
    init: function(){
        console.log('aaa');
        site.bind_events();
    }
}

$(document).ready(site.init);
