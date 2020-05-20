jQuery(document).ready(function($){
var path = window.location.pathname.split("/").pop();
if(path == '') {
    path = 'index.html';
}
var target = $('#navbar a[href="'+path+'"]');
target.addClass('active');
console.log(path);
console.log(target);
});
