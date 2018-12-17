$(document).ready(function(){
    $('#pfc-link').on('click',function(){
    $('#pcd').hide();
    $('#pcd-link').removeClass('active');
    $('#pfc-link').addClass('active');
    $('#pfc').show();
    });

    $('#pcd-link').on('click',function(){
    $('#pfc').hide();
    $('#pfc-link').removeClass('active');
    $('#pcd-link').addClass('active');
    $('#pcd').show();
    });
});