 var theme = {
    dark_theme: $('#dark_theme').val() * 1,
    semi_dark: $('#semi_dark').val() * 1,
    light: $('#light').val() * 1,
    foot: $('#foot').val() * 1,
    asside: $('#asside').val() * 1,
 };

            if(theme.dark_theme == 1){
                $("body").addClass("layout-dark");
                $("input:checkbox[name=dark_theme]").prop("checked",true);
            }
            else{
                $("body").removeClass("layout-dark"); 
                $("input:checkbox[name=dark_theme]").prop("checked",false);
            }

 
            if(theme.semi_dark == 1){
                $("input:checkbox[name=semi_dark]").prop("checked",true);
                $("body").addClass("layout-semi-dark");
            }
            else{
                $("input:checkbox[name=semi_dark]").prop("checked",false);
                $("body").removeClass("layout-semi-dark"); 
            }

            if(theme.light == 1){
                $("body").removeClass("layout-dark"); 
                $("body").removeClass("layout-semi-dark"); 
                $("body").addClass("layout-light");
                $("input:checkbox[name=dark_theme]").prop("checked",false);
                $("input:checkbox[name=light]").prop("checked",true);
                $("input:checkbox[name=semi_dark]").prop("checked",false);
                }
            else{
                $("body").removeClass("layout-light");
                $("input:checkbox[name=light]").prop("checked",false);
            }

            if(theme.foot == 1){
                $("footer").addClass("footer-fixed");
                $("input:checkbox[name=fix_foot]").prop("checked",true);
            }
            else{
                $("footer").removeClass("footer-fixed"); 
                $("input:checkbox[name=fix_foot]").prop("checked",false);
            }

            if(theme.asside == 1){
                $("aside").removeClass("nav-lock").addClass("nav-collapsed ");
                $("input:checkbox[name=coolap]").prop("checked",true);
            }
            else{
                $("aside").addClass("nav-lock").removeClass("nav-collapsed");   
                $("input:checkbox[name=coolap]").prop("checked",false);
            }

// Click  bo'lganda temani o'zgartirish boshlandi

    $("input:checkbox").click(function(){
        if($('input:checkbox[name=dark_theme]:checked').val() == 1)
            dark_theme =  1;
        else
            dark_theme =  0; 
            $.get('/site/set-theme-values', { 'dark_theme' : dark_theme}, function(data){});  
            if(dark_theme == 1)
                $("body").addClass("layout-dark");
            else
                $("body").removeClass("layout-dark"); 

            if ($('input:checkbox[name=semi_dark]:checked').val() == 1) 
                semi_dark = 1;
                else
                semi_dark = 0;
            $.get('/site/set-theme-values', { 'semi_dark' : semi_dark}, function(data){});
            if(semi_dark == 1)
                $("body").addClass("layout-semi-dark");
            else
                $("body").removeClass("layout-semi-dark"); 

            if ($('input:checkbox[name=light]:checked').val() == 1)
            light = 1;
            else
            light = 0;  
            $.get('/site/set-theme-values', { 'light' : light}, function(data){});
            if(light == 1){
                $("body").removeClass("layout-dark").removeClass("layout-semi-dark").addClass("layout-light"); 
                $("input:checkbox[name=dark_theme]").prop("checked",false);
                $("input:checkbox[name=semi_dark]").prop("checked",false);
                }
            else
                $("body").removeClass("layout-light"); 
            if ($('input:checkbox[name=fix_foot]:checked').val() == 1)
                foot = 1;  
            else
                foot = 0;
            $.get('/site/set-theme-values', { 'foot' : foot}, function(data){});
            if(foot == 1)
                $("footer").addClass("footer-fixed");
            else
                $("footer").removeClass("footer-fixed"); 
            if ($('input:checkbox[name=coolap]:checked').val() == 1)
                asside = 1;
            else
                asside = 0;
            $.get('/site/set-theme-values', { 'asside' : asside}, function(data){});
            if(asside == 1)
                $("aside").removeClass("nav-lock").addClass("nav-collapsed ");
            else
                $("aside").addClass("nav-lock").removeClass("nav-collapsed");

            });

    // Temani o'zgartirish tugadi
