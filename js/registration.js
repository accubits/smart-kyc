/**
 * Created by hp on 24-08-2017.
 */


/*edited by athul */

function go(dataid) {
    var id = $(this).attr('data-id') || dataid;
    var closest = $(id).closest('.wraps_common');
    var navid = $(closest).attr('data-id');
    var lineid = $(navid).attr('data-id');
   if (id){
       $('.wraps_common').addClass('none');
       $(id).closest('.wraps_common').removeClass('none');
       $(closest).addClass('block');
       $(navid).closest('.blocks_no').addClass('green_bg');
       $(lineid).closest('.blocks_no').addClass('green');
   }
}
function changeTab(){

    var id = $(this).attr('data-id');
    $('.tab_wrap li').removeClass('active');
    $(this).addClass('active');

    $('.tab_content').removeClass('active');
    $(id).addClass('active');
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
    if ( $(this).hasClass('indiv')){
        $(this).addClass('indv_active');
        $('.comp_blk_dis').css({'display':'none'});
        $('.req_blk').html('2');

        $('.personal').attr("data-id","#personal_3");
        $('.pr_doc').attr("data-id","#personal_1");
        $('#personal_3').attr("data-id","#one");
        $('#one').attr("data-id","#three");
    }
}
function menu_tab()
{
    $(".nav_bar").toggleClass("active");
}
function addinput() {
    $('.file_upload').append("<input name=\"file\" type=\"file\" multiple id=\"files\" class=\"uploadFile\" onchange=\"angular.element(this).scope().imageUpload()\"/>")
}
function datepicker() {
    $('.datepicker-here').datepicker({
        language: 'en',
        dateFormat: 'yyyy-mm-dd'
    });
    $('#dob').datepicker({
        maxDate: new Date,
        minDate: new Date(1950, 1, 1)
    });
    $('#issueDate').datepicker({
        maxDate: new Date
    });
    $('#validTo').datepicker({
        minDate: new Date
    });
}
function trigetr() {
    $('.content_wrap_log, .reset_pass_wrap').keydown(function(event){
        var keyCode = (event.keyCode ? event.keyCode : event.which);
        if (keyCode == 13) {
            $('.login_btn').trigger('click');
        }
    });
}
function init() {
    trigetr();
    datepicker();
    $('.prev_button ').click(go);
    $('.radio').click(rad_act);
    $('.to_top').click(top_mov);
    $('.to_nav_tab').click(navig);
    $('.tab_wrap li').click(changeTab);
    $('.ham_icon').click(menu_tab);
    $('.add_new').click(addinput);

}
$(document).ready(init);
