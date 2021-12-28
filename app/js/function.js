jQuery(function(){

    jQuery.event.special.touchstart = {
        setup: function( _, ns, handle ) {
            this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
        }
      };

      
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

        jQuery('#product_tag').multiselect({
            //this is a temporary solution to multiselect plugin run in bootstrap 5
            buttonClass: 'form-select',
            templates: {
                button: '<button type="button" class="multiselect dropdown-toggle" data-bs-toggle="dropdown"><span class="multiselect-selected-text"></span></button>',
            },
            //
            includeSelectAllOption: true,
            enableFiltering: false,
            nonSelectedText: "Selecione...",
            allSelectedText: "Todos Selecionados",
            widthSynchronizationMode: 'ifPopupIsSmaller',
            buttonWidth: '200px',
            selectAllText: 'Selecionar Tudo'
        });
        


 
})