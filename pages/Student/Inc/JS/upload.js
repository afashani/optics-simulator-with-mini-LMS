$(document).ready(function(){
    $(".dropzone").dropzone({
        url: 'activitySubmisson.php',
        width: 300,
        height: 300,
        progressBarWidth: '100%',
        maxFileSize: '5MB'
    })
});