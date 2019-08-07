<?php
$this->registerJs(<<<JS
$(document).ready(function(){
  $("#showSearchfilials").click(function(){
  $("#searchfilials").slideToggle("slow");
  });

$("#searchfilials").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTablefilials tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("[class='search']").blur(function(){
    $.post("/filials/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablefilials').innerHTML = data;
    });
  });

});

$(document).on('pjax:complete', function() {
    $("[class='search']").blur(function( event ){
        $.post("/filials/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablefilials').innerHTML = data;
        });
      });
});
JS
);
?>