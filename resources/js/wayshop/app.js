$('.remove').click(function () {
  let id = $(this).attr('rel');
  $.ajax({
    header: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: 'post',
    url: `delete-cart/${id}`,
    data: {
      _token: '{!! csrf_token() !!}',
    },
    success: function (data) {
      $('.cart'+id).html('');  
      $('.mess').html('<span class="alert alert-success">Delete Cart Success</span>');
    },
    error: function () {
      alert('Error, Please try again!');
    }

  })
});