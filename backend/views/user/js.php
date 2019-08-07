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
      var type=$("#type").val();
       if(type==1){
        $.post("/user/admin", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==2){
        $.post("/user/teacher", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==3){
        $.post("/user/pupil", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
  });
  $(".drop").on("click",function(){
    alert();
      $("#statuslist").css("display:block");
  });
  $("#birtday").change(function(){
       var type=$("#type").val();
       if(type==1){
        $.post("/user/admin", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==2){
        $.post("/user/teacher", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==3){
        $.post("/user/pupil", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
    });
});
$(document).on('pjax:complete', function() {
 $("[class='search']").blur(function( event ){
      var type=$("#type").val();
       if(type==1){
        $.post("/user/admin", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==2){
        $.post("/user/teacher", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==3){
        $.post("/user/pupil", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
    });
  
  $("#birtday").change(function( event ){
      var type=$("#type").val();
       if(type==1){
        $.post("/user/admin", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==2){
        $.post("/user/teacher", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==3){
        $.post("/user/pupil", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
    });
});
JS
);

?>  
