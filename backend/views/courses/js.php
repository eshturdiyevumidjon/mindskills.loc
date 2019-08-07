<?php
$this->registerJs(<<<JS
$(document).ready(function(){   
   $("#showSearchuser").click(function(){
      $("#searchuser").slideToggle("slow");
    });

  $("#searchuser").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTableuser tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("[class='search']").blur(function(){
      $.post("/courses/index", $('#searchForm2').serialize() ,function(data){
          document.getElementById('myTablecourses').innerHTML = data;
      });
  });

  $("#begin_date").change(function(){
        $.post("/courses/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablecourses').innerHTML = data;
    });
  });

  $("#end_date").change(function(){
        $.post("/courses/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablecourses').innerHTML = data;
    });
  });
  
});

$(document).on('pjax:complete', function() {
     
    $("[class='search']").blur(function( event ){
        $.post("/courses/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablecourses').innerHTML = data;
        });
      });

      $("#begin_date").change(function( event ){
        $.post("/courses/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablecourses').innerHTML = data;
       });
     });

      $("#end_date").change(function( event ){
        $.post("/courses/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablecourses').innerHTML = data;
        });
     });
});
JS
);
?> 