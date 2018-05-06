$(document).ready(function(){
    var permissions;
    $.setPermissions = function(data){
        permissions = data;
    };
    $.getPermissions = function(){
        return permissions;
    };
});
