<!-- Modal Dialog -->
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Parmanently</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure about this ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirm">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- DELETE -->
@section("scripts")
<script type="text/javascript">
//Making the first  letter uppercase
String.prototype.toProperCase = function(){
    return this.toLowerCase().replace(/(^[a-z]| [a-z]|-[a-z])/g,
        function($1){
            return $1.toUpperCase();
        }
    );
};
// <!-- Dialog show event handler -->
$('#confirmDelete').on('show.bs.modal', function (e) {
    $message = 'Are you sure you want to delete this {!! $value !!}?';//$(e.relatedTarget).attr('data-message');
    $(this).find('.modal-body p').text($message);
    $title = 'Delete {!! $value !!}';//$(e.relatedTarget).attr('data-title');
    $(this).find('.modal-title').text($title.toProperCase());

    // Pass form reference to modal for submission on yes/ok
    var form = $(e.relatedTarget).closest('form');
    $(this).find('.modal-footer #confirm').data('form', form);
});

// <!-- Form confirm (yes/ok) handler, submits form -->
$('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
    $(this).data('form').submit();
    console.log("clicked");

});
$(document).ready(function() {
  $('.deleteItem').on('click', function(e){
      e.preventDefault();
      $('form').submit();
      console.log("clicked");

  });
});
</script>
@append
