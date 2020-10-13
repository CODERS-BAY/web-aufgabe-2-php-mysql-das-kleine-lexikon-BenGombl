$(document).ready(function () {


  $("#closeModal").click(function () {
    $("#discardChanges").hide();
    $(".editEntry").show();
    $("#modalStuff").show();
    $(".editEntryForm").hide();
    $("#modal").hide();
  });

  $(".teaserCard:not(#addEntryCard)").click(function () {

    var lexiconId = $(this).attr("id");
    $.ajax({
      url: "inc/loadModal.inc.php",
      type: "post",
      data: {
        lexikonId: lexiconId
      },
      success: function (response) {

        $(".modalContent").html(response);
        $("#modal").show();

      }
    });

  });
 $("#discardChanges").click(function(){
    $(this).hide();
    $(".editEntry").show();
    $("#modalStuff").show();
    $(".editEntryForm").hide();
  });
  $(".editEntry").click(function(){
    $(this).hide();
    $("#discardChanges").show();
    $(".editEntryForm").show();
    $("#modalStuff").hide();
  });

 
});