$("#up_btn").on('click', function(){
    var id= $(this).attr("data-id");
    $("#update-modal").modal('show');
    

    $.ajax({
      type: 'POST',
      url: 'ajax.php',
      data:{id:id},
      success:function(data){
        var json = JSON.parse(data);
        $('#id').val(json.id)
        $('#name').val(json.name)
      }
    })
  });