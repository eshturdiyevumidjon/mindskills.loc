<?php
$this->registerJs(<<<JS
$(document).ready(function(){
  $("#showSearchsubjects").click(function(){
  $("#searchsubjects").slideToggle("slow");
  });

$("#searchsubjects").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTablesubjects tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

$("[class='search']").blur(function(){
    $.post("/subjects/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablesubjects').innerHTML = data;
    });
  });
  
});
  
$(document).on('pjax:complete', function() {
    $("[class='search']").blur(function( event ){
        $.post("/subjects/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablesubjects').innerHTML = data;
        });
      });
});
JS
);
?>  