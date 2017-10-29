/**
 * Created by dittops on 24-08-2017.
 */

function person_prev()
{
    $('.blocks').removeClass('active');
    $(this).addClass('active');

    var id = $(this).attr('data-id');

    $('.wraps_common').css({'display': 'none'});
    $(id).css({'display': 'block'});


}
function company_next()
{
    $('.documents_wrap').css({'display':'block'});
    $('.company_wrap').css({'display':'none'});
    $('.personal_wrap').css({'display':'none'});
    $('.comp_blk').addClass("green_bg");
    $('.req_blk').addClass("green");
}
function doc_prev()
{
    if ($('.indiv').hasClass('indv_active')) {
        $('.documents_wrap').css({'display':'none'});
        $('.company_wrap').css({'display':'none'});
        $('.personal_wrap').css({'display':'block'});
    }
    else
    {
        $('.documents_wrap').css({'display':'none'});
        $('.company_wrap').css({'display':'block'});
        $('.personal_wrap').css({'display':'none'});
        $('.comp_blk').removeClass("green_bg");
        $('.req_blk').removeClass("green");
    }
}
function rad_act()
{
    $(".radio").removeClass('active');
    $(this).addClass('active');
}
function top_mov()
{
    $('html, body').animate({scrollTop: '0px'}, 300);
}
function navig()
{
    $('.content_wrap').css({'display':'block'});
    $('.content_navigation').css({'display':'none'});
}
function individual()
{
    $(this).addClass('indv_active');
    $('.comp_blk_dis').css({'display':'none'});
}



function go() {
    var id = $(this).attr('data-id');

    $('.wraps_common').addClass('none');
    $(id).closest('.wraps_common').removeClass('none');
    $(id).closest('.wraps_common').addClass('block');
    $('.blocks').removeClass('active');
    $(this).addClass('active');
}


function init() {
    $('.blocks ').click(go);

    $('.company').click(company_next);
    $('.pr_doc').click(doc_prev);
    $('.radio').click(rad_act);
    $('.to_top').click(top_mov);
    $('.to_nav_tab').click(navig);navig();
    $('.indiv').click(individual);
}
$(document).ready(init);