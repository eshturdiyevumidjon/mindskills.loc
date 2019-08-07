<?php
$this->registerJs(<<<JS
$(document).ready(function(){
  $("#showSearchscheduleusers").click(function(){
  $("#searchscheduleusers").slideToggle("slow");
  });

$("#searchscheduleusers").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTablescheduleusers tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("[class='search']").blur(function(){
    $.post("/schedule-users/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablescheduleusers').innerHTML = data;
    });
  });
  
});

$(document).on('pjax:complete', function() {
    $("[class='search']").blur(function( event ){
        $.post("/schedule-users/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablescheduleusers').innerHTML = data;
        });
      });
});
JS
);
?>