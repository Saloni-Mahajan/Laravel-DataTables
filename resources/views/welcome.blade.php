<!DOCTYPE html>
<html>
<head>
    <title>Student Datatable</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid">
    <form>
      <h3>Filter By Fees</h3>
        <div class="d-flex align-items-center mt-4 pb-1">
          <div class="md-form md-outline my-0">
            <input id="min" name="min" type="text" class="form-control">
            <label for="min">Min price</label>
          </div>
          <p class="ml-2 mb-4 text-muted"> - </p>
          <div class="md-form md-outline my-0">
            <input id="max" type="text" name="max" class="form-control ml-3">
            <label for="max" class="ml-3">Max price</label>
          </div>
          <div class="md-form md-outline my-0">
            <button type="button" name="filter" id="filter" class="btn btn-primary mb-4 ml-4 ">Filter</button>
          </div>
          </div>
      </form>
    </div>
<div class="container mt-5">
    <h2 class="mb-4">Student Datatable</h2>
    <table class="table table-bordered yajra-datatable" id="student_table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Phone</th>
                {{-- <th>DOB</th> --}}
                <th>Fees</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
</body>
<script type="text/javascript">
  $(function () {

    load_data();

 function load_data(min = '', max = '')
 {
  $('#student_table').DataTable({
   processing: true,
   serverSide: true,
   ajax: {
    url: "{{ route('students.index') }}",
    data:{min:min,max:max}
   },
   columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'username', name: 'username'},
            {data: 'phone', name: 'phone'},
            // {data: 'dob', name: 'dob'},
            {data: 'price', name: 'price'},
           
        ]
  });
 }

$('#filter').click(function(){
  var min = $('#min').val();
  var max = $('#max').val();
  if(min != '' &&  max != '')
  {
   $('#student_table').DataTable().destroy();
   load_data(min, max);
  }
  else
  {
   alert('Both field is required');
  }
 });

});
</script>
</html>