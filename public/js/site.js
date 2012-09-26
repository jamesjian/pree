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
    bind_events: function(){
      site.unbind_events();  
      $('#test').click(site.test);
    },
    unbind_events: function(){
        
    },
    init: function(){
        console.log('aaa');
        site.bind_events();
    }
}

$(document).ready(site.init);
