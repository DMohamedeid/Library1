<!-- Vendor js -->
<script src="{{asset('admin/js/vendor.min.js')}}"></script>

<!-- knob plugin -->
<script src="{{asset('admin/libs/jquery-knob/jquery.knob.min.js')}}"></script>

<!--Morris Chart-->
<script src="{{asset('admin/libs/morris-js/morris.min.js')}}"></script>
<script src="{{asset('admin/libs/raphael/raphael.min.js')}}"></script>

<!-- Dashboard init js-->
<script src="{{asset('admin/js/pages/dashboard.init.js')}}"></script>

<!-- App js -->
<script src="{{asset("admin/js/app.min.js")}}"></script>

<!-- Sweet Alerts-->
<script src="assets/libs/sweetalert2/sweetalert2.min.js" aria-hidden="true" data-previous-aria-hidden="true"></script>

<script src="assets/js/pages/sweet-alerts.init.js" aria-hidden="true" data-previous-aria-hidden="true"></script>

@include('sweet::alert')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
    $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var name = button.data('myname');
        var cat_id = button.data('catid');
        var modal = $(this);

        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #cat_id').val(cat_id)
    });

    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var ctid = button.data('catid');
        var modal = $(this);

        modal.find('.modal-body #ctid').val(ctid)
    });


    $('#editbook').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var name = button.data('name');
        var author = button.data('author');
        var info = button.data('info');
        var category = button.data('category');
        var image = button.data('image');
        var book = button.data('book');
        var book_id = button.data('bookid');
        var modal = $(this);

        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #author').val(author);
        modal.find('.modal-body #info').val(info);
        modal.find('.modal-body #select').val(category);
        modal.find('.modal-body #file').val(image);
        modal.find('.modal-body #file').val(book);
        modal.find('.modal-body #book_id ').val(book_id);
    });

    $('#deletebook').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var bid = button.data('bookid');
        var modal = $(this);

        modal.find('.modal-body #bid').val(bid)
    });

    $('#editcomment').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var comment = button.data('mycomment');
        var comment_id = button.data('commentid');
        var modal = $(this);

        modal.find('.modal-body #comment').val(comment);
        modal.find('.modal-body #comment_id').val(comment_id)
    });

    $('#deletecomment').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var comment_id = button.data('commentid');
        var modal = $(this);

        modal.find('.modal-body #comment_id').val(comment_id)
    });


    // $('#exampleModal').on('show.bs.modal', function (event) {
    //     var button = $(event.relatedTarget) // Button that triggered the modal
    //     var recipient = button.data('whatever') // Extract info from data-* attributes
    //     // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    //     // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    //     var modal = $(this)
    //     modal.find('.modal-title').text('New message to ' + recipient)
    //     modal.find('.modal-body input').val(recipient)
    // })

</script>
