<?php
$this->registerJs(<<<JS
$(document).ready(function(){
  $("#showSearchfeadback").click(function(){
  $("#searchfeadback").slideToggle("slow");
  });

$("#searchfeadback").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTablefeadback tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

 $("[class='search']").blur(function(){
    $.post("/feadback/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablefeadback').innerHTML = data;
    });
  });

});

$(document).on('pjax:complete', function() {
    $("[class='search']").blur(function( event ){
        $.post("/feadback/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablefeadback').innerHTML = data;
        });
      });
});
JS
);
?>