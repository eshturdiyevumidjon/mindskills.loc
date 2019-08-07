<?php
$this->registerJs(<<<JS
$(document).ready(function(){
  $("#showsearchschedule").click(function(){
  $("#searchschedule").slideToggle("slow");
  });
$("#searchschedule").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTableschedule tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("[class='search']").blur(function(){
$.post("/schedule/index", $('#searchForm2').serialize() ,function(data){
    
    document.getElementById('myTableschedule').innerHTML = data;
});
});

  $("#begin_date").change(function(){
        $.post("/schedule/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedule').innerHTML = data;
    });
    });


  $("#end_date").change(function(){
        $.post("/schedule/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedule').innerHTML = data;
    });
    });

});

$(document).on('pjax:complete', function() {
    $("[class='search']").blur(function( event ){
        $.post("/schedule/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedule').innerHTML = data;
        });
      });

      $("#begin_date").change(function( event ){
        $.post("/schedule/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedule').innerHTML = data;
    });
     });

      $("#end_date").change(function( event ){
        $.post("/schedule/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedule').innerHTML = data;
    });
     });

});
JS
);
?>