undefined</div>undefined<!-- /container -->undefined<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->undefined<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>undefined<!-- Latest compiled and minified Bootstrap JavaScript -->undefined<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>undefined<!-- bootbox library -->undefined<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>undefined<script>
// JavaScript for deleting user
$(document).on('click', '.delete-object', function(){
  
    var id = $(this).attr('delete-id');
  
    bootbox.confirm({
        message: "
<h4>Are you sure?</h4>",
        buttons: {
            confirm: {
                label: '
<span class="glyphicon glyphicon-ok"></span> Yes',
                className: 'btn-danger'
            },
            cancel: {
                label: '
<span class="glyphicon glyphicon-remove"></span> No',
                className: 'btn-primary'
            }
        },
        callback: function (result) {
  
            if(result==true){
                $.post('delete_user.php', {
                    object_id: id
                }, function(data){
                    location.reload();
                }).fail(function() {
                    alert('Unable to delete.');
                });
            }
        }
    });
  
    return false;
});
undefined</script>undefined</body>undefined</html>