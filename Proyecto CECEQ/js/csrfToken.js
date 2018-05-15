$(document).ready(function(){
    var csrfToken;
    $.setCsrfToken = function(data){
        csrfToken = data;
    };
    $.getCsrfToken = function(){
        return csrfToken;
    };
});
