jQuery(function(){
    //Get de local value saved
    var ls = localStorage.getItem("opcao");
    //remove the active class form nav-itens
    jQuery('.nav-link').removeClass('active');

        //Set the current page get from localstorage as active
        jQuery('a[href="'+ls+'"]').addClass('active')
        

        // SideMenu active effect
        let active = jQuery('.menu').hasClass('active');
        if(active){
            jQuery('.menu.active').css({
                "background-color": "#fff",
                "color": "rgb(233, 192, 89)"
            })
        }
        


        /* ----------------------- Top Navmenu manage----------------------- */

        //get the href attribute from nav-link and save in localstorage
        jQuery('.nav-link').click(function(){
            let op = jQuery(this).attr('href');
            
            localStorage.setItem("opcao", op);
           
        })
})