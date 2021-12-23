jQuery(function(){
    //Get de local value saved
    var ls = localStorage.getItem("opcao");
    //remove the active class form nav-itens
    jQuery('.nav-link').removeClass('active');

        //Set the current page get from localstorage as active
        jQuery('a[href="'+ls+'"]').addClass('active')
        jQuery('a[href="'+ls+'"]').css({
            "text-decoration": "underline",
        })
        

        // SideMenu active effect
        let active = jQuery('.menu').hasClass('active');
        if(active){
            jQuery('.menu.active').css({
                "background-color": "#034cb9",
                "color": "#fff"
            })
        }
        


        /* ----------------------- Top Navmenu manage----------------------- */

        //get the href attribute from nav-link and save in localstorage
        jQuery('.nav-link').click(function(){
            let op = jQuery(this).attr('href');
            
            localStorage.setItem("opcao", op);
           
        })
})