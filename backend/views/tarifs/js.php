<?php
$this->registerJs(<<<JS
$(document).ready(function(){
  $("#showSearchTarifs").click(function(){
  $("#searchTarifs").slideToggle("slow");
  });
  
$("#searchTarifs").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTabletarifs tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  $("[class='search']").blur(function(){
    $.post("/tarifs/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTabletarifs').innerHTML = data;
    });
  });
});

$(document).on('pjax:complete', function() {
    $("[class='search']").blur(function( event ){
        $.post("/tarifs/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTabletarifs').innerHTML = data;
        });
      });
});
JS
);
?>