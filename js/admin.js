hostname = window.location.hostname;
HTMLROOT = '/';
ADMINHTMLROOT = '/admin/';
if (hostname == 'www' || hostname =='') {
    HTMLROOT = 'http://www./';
}
admin = {
    /**
     * template for all delete_XXX click event
     */
    confirm_delete_template: function(e){
        if (confirm('Are you sure to delete this ' + e.data.name + '?') ==  true)  {
            return true;
        } else {
            return false;
        }
    },
        /**
     * template for all view_XXX_link click event
     */
    show_template: function(e){
        //console.log(e.data.title);
        var url = $(this).attr('href');
        $('#dialog').dialog({
            title: e.data.title
            });
        $('#dialog').load(url);
        $('#dialog').dialog('open');
        return false;
    },
    /**
     * @param:  event has table name infomation
     * table_name is the table name in which status will be changed
     * such as blog, company, user, and so on
     */
    change_status: function(event){
        //console.log('aaaaaa');
        url = HTMLROOT + 'admin/'+ event.data.table_name + '/change_status';
        id = $(this) . attr('id');
        id = parseInt(id.substr(7));  //get line number 'status_XXX'
        status = $(this).val();
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: id, 
                status: status
            },
            dataType:  'json',
            success: function(data){
                //console.log(data.changed);
                if (data.changed == true){
                //no action
                } else {
                }
            }
        });   
    },    
   clear_image: function(event)
    {
        var delete_image_id = $(this).attr('id');
        var url = $(this).attr('href');
        image_id = event.data.image_id;
        //console.log(image_id);
        $.ajax({
            type: "POST",
            url: url,
            data: {},
            dataType:  'json',
            success: function(data){
                if (data.result) {
                    //remove image
                    $(image_id).css('display','none');
                    $(image_id).css('visibility','hidden');
                    //remove delete link as well
                    $('#'+delete_image_id).css('display','none');
                    $('#'+delete_image_id).css('visibility','hidden');
                }
            //transaction.get_buyer_location_list();
            }
        });   
        return false;
    },  
    /**
     * bulletin/discount/secondhand has 3 images, goods have 5 images, we will delete them seperately,
     * we need to pass image index(1,2,3,4, 5) to controller and view
     */
    clear_single_image: function()
    {
        var delete_image_id = $(this).attr('id');
        //console.log(delete_image_id);
        var image_index = parseInt(delete_image_id.substr(15)); //id="delete_image_id2"
        //console.log(image_index);
        var url = $(this).attr('href');
        image_id='#image'+image_index;
        $.ajax({
            type: "POST",
            url: url,
            data: {
                image_index: image_index
            },
            dataType:  'json',
            success: function(data){
                if (data.result) {
                    //remove image
                    $(image_id).css('display','none');
                    $(image_id).css('visibility','hidden');
                    //remove delete link as well
                    $('#'+delete_image_id).css('display','none');
                    $('#'+delete_image_id).css('visibility','hidden');
                }
            //transaction.get_buyer_location_list();
            }
        });   
        return false;
    }, 
/**
     * initialize all show event handlers
     */
    init_view_links: function(){
        
        $('.view_blog_link').bind('click', {
            title: 'Blog'
        }, index.show_template);
       
        $('.view_article_link').bind('click', {
            title: 'Article'
        }, index.show_template);
       
    },    
    init_clear_image_links: function(){
        $('.clear_article1_image').bind('click', {
            image_id:'#image'
        }, index.clear_image);
         
        $('.clear_blog_image').bind('click', {
            image_id:'#image'
        }, index.clear_image);        
        },
    /**
     * initialize all delete event handlers
     */
    init_delete_links: function(){
        $('.delete_cat').bind('click', {
            name: 'category'
        }, index.confirm_delete_template);//about us
        $('.delete_article').bind('click', {
            name: 'page'
        }, index.confirm_delete_template);//about us
    },    
    init_change_status_links: function(){
        $('.category_status').bind('change', {
            table_name: 'category'
        },index.change_status);
        $('.blog_status').bind('change', {
            table_name: 'blog'
        },index.change_status);
    },	
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
      admin.unbind_events();  
      $('#delete_').click(admin.test);
        index.init_view_links();
        index.init_clear_image_links();	  
    },
    unbind_events: function(){
        
    },
    init: function(){
        console.log('aaa');
        admin.bind_events();
 $('tr:odd').css('background-color', '#ffffee');		
$('#dialog').dialog({
            autoOpen: false,
            height: 500,
            width: 900,
            modal: true,
            buttons:{
                'Close': function(){
                    $(this).dialog('close');
                }
            }		
    }
}

$(document).ready(admin.init);
