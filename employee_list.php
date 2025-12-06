<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Employees</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body class="p-4">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3>Employees</h3>
      <div>
        <a href="<?php echo site_url('employee/create'); ?>" class="btn btn-primary">Add Employee</a>
        <a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-secondary">Logout</a>
      </div>
    </div>

    <div class="mb-3">
      <input id="search" class="form-control" placeholder="Search by name, email, mobile...">
    </div>

    <table class="table table-bordered">
      <thead><tr><th>Name</th><th>Gender</th><th>Email</th><th>Mobile</th></tr></thead>
      <tbody id="empData"></tbody>
    </table>

    <nav>
      <ul class="pagination" id="pagination"></ul>
    </nav>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
  <script>
  function renderPagination(obj){
      var html='';
      for(var i=1;i<=obj.total;i++){
          html += '<li class="page-item '+(i==obj.current?'active':'')+'"><a class="page-link" href="#" data-page="'+i+'">'+i+'</a></li>';
      }
      $('#pagination').html(html);
  }

  function load(page){
    page = page || 1;
    $.post('<?php echo site_url('employee/fetch_employees'); ?>', {search: $('#search').val(), page: page}, function(res){
        var obj = JSON.parse(res);
        $('#empData').html(obj.rows);
        renderPagination(obj.pagination);
    });
  }

  $(document).on('click','#pagination a', function(e){
      e.preventDefault();
      var p = $(this).data('page');
      load(p);
  });

  $('#search').on('keyup', function(){ load(1); });

  $(document).ready(function(){ load(); });
  </script>
</body>
</html>
