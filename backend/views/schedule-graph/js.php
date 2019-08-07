<?php
$this->registerJs(<<<JS
$(document).ready(function(){
  $("#showSearchschedulegraph").click(function(){
  $("#searchschedulegraph").slideToggle("slow");
  });
$("#searchschedulegraph").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTableschedulegraph tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

$("[class='search']").blur(function(){
$.post("/schedule-graph/index", $('#searchForm2').serialize() ,function(data){
    document.getElementById('myTableschedulegraph').innerHTML = data;
});
});

  $("#begin_date").change(function(){
        $.post("/schedule-graph/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedulegraph').innerHTML = data;
    });
    });


  $("#end_date").change(function(){
        $.post("/schedule-graph/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedulegraph').innerHTML = data;
    });
    });

});

$(document).on('pjax:complete', function() {
    $("[class='search']").blur(function( event ){
        $.post("/schedule-graph/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedulegraph').innerHTML = data;
        });
      });

      $("#begin_date").change(function( event ){
        $.post("/schedule-graph/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedulegraph').innerHTML = data;
    });
     });

      $("#end_date").change(function( event ){
        $.post("/schedule-graph/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedulegraph').innerHTML = data;
    });
     });

});
JS
);
?>