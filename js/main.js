/**
 * Created by wolyshaw on 15/10/21.
 */


// page ajax
var doc = $('html body');
var nextPage = $('.nextPage a');
var pageNum = nextPage.attr('data-num');
var nowPage = 2;
function pageAjax (){
    var loadUrl = window.location.href+'/page/'+nowPage;

    console.log(loadUrl);
    var loadScrollTop = $('.content').height()+$('.content').offset().top;
    $.ajax({
        type:'GET',
        url:loadUrl,
        success:function(data){
            console.log($(data).find('.postList'));
            var _html = '<div class="pegeIndex">第'+nowPage+'页</div>';
            $('.content').append(_html);
            $('.content').append($(data).find('.postList'));
            doc.animate({
                scrollTop:loadScrollTop
            },300);
            // doc.scrollTop(loadScrollTop);
            console.log(loadScrollTop);
            nowPage++;
            // console.log(nowPage);
        }
    });
}
nextPage.click(function(){
    if(pageNum > nowPage){
        pageAjax();
    }else if(pageNum == nowPage){
        pageAjax();
        nextPage.html('没有文章了');
    };
});

// login
$('.openLogin').click(function(){
    $('.loginBox').fadeIn(200)
});
$('.closeLogin').click(function(){
    $('.loginBox').fadeOut(200)
});