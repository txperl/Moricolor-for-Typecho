// pjax实现
$.pjax.defaults.timeout = 8000
$(document).pjax('a[target!=_blank]', '#all', {fragment:'#all'}); 
$(document).on('pjax:send', function() {
    NProgress.start();
});
$(document).on('submit', 'form', 'post', function(event){
    $.pjax.submit(event, '#all',{fragment:'#all'});
});
$(document).on('pjax:complete', function() {
    NProgress.done();
    respondId = '<?php $this->respondId(); ?>';
    if (typeof MathJax !== 'undefined'){
        MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
    } // MathJax重载
});