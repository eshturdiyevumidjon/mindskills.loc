<?php
$this->registerJs(<<<JS
$(document).ready(function(){
  $("#showSearchclassroom").click(function(){
    $("#searchclassroom").slideToggle("slow");
  });

$("#searchclassroom").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  $("#myTableclassroom tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

$("[class='search']").blur(function(){
    $.post("/classroom/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableclassroom').innerHTML = data;
    });
  });
});

$(document).on('pjax:complete', function() {
    $("[class='search']").blur(function( event ){
        $.post("/classroom/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableclassroom').innerHTML = data;
        });
      });
});
JS
);
?>