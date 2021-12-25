$(document).ready(function (){
        $("#open-nav").click( function (){
            $(".admin-nav").toggleClass('animate');
        });

        $("#nav-student").click( function (){
            $(".student-group").toggleClass('remove-hidden');
        });

        $("#nav-resources").click( function (){
            $(".resources-group").toggleClass('remove-hidden');
        });

});
