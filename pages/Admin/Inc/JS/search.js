$(document).ready(function(){
    $(".searchBar").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dataTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });


    $('a.deleteActivity').confirm({
        content: "Are you sure",
    });

    $('a.deleteActivity').confirm({
        buttons: {
        hey: function(){
        location.href = this.$target.attr('href');
    }
    }
    });

    $('a.deleteTutorials').confirm({
        content: "Are you sure",
    });

    $('a.deleteTutorials').confirm({
        buttons: {
            hey: function(){
                location.href = this.$target.attr('href');
            }
        }
    });

});
