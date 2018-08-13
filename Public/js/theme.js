/**
 * Created by adminstrators on 2018/7/11.
 */
$(function() {
    $(".menu-item").click(function() {$(".menu-item").removeClass("menu-item-active");$(this).addClass("menu-item-active");var itmeObj = $(".menu-item").find("img");itmeObj.each(function() {var items = $(this).attr("src");items = items.replace("_grey.png", ".png");items = items.replace(".png", "_grey.png")
            $(this).attr("src", items);});});});
$(function(){$(document).on('click','#page a',function(){var pageObj = this;var url = pageObj.href;$.ajax({type:'post', url:url, success:function(data){$('#content_table').html(data);}});return false;});})
