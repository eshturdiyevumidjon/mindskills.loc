<?php
$this->registerJs(<<<JS
$(document).ready(function(){
  $("#showSearchcompany").click(function(){
  $("#searchcompany").slideToggle("slow");
  });

$("#searchcompany").on("keyup", function() {
    var value = $(this).val().toLowerCase();
  $("#myTablecompanies tr").filter(function() {
  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("[class='search']").blur(function(){
    $.post("/companies/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablecompanies').innerHTML = data;
    });
  });
  
});

$(document).on('pjax:complete', function() {
    $("[class='search']").blur(function( event ){
        $.post("/companies/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablecompanies').innerHTML = data;
        });
      });
});
JS
);
?>