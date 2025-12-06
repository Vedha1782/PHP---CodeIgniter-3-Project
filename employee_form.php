<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Add Employee</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
  <style>.address-block{border:1px solid #ddd;padding:10px;margin-bottom:10px;border-radius:6px;}</style>
</head>
<body class="p-4">
  <div class="container">
    <h3>Add Employee</h3>
    <form method="post" action="<?php echo site_url('employee/save'); ?>">
      <div class="row">
        <div class="col-md-4">
          <label>First Name</label>
          <input name="fname" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label>Middle Name</label>
          <input name="mname" class="form-control">
        </div>
        <div class="col-md-4">
          <label>Last Name</label>
          <input name="lname" class="form-control">
        </div>
      </div>

      <div class="row mt-2">
        <div class="col-md-3">
          <label>Gender</label>
          <select name="gender" class="form-select">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div class="col-md-3">
          <label>Email</label>
          <input name="mail" type="email" class="form-control" required>
        </div>
        <div class="col-md-3">
          <label>Mobile</label>
          <input name="mobile_no" class="form-control" required>
        </div>
        <div class="col-md-3">
          <label>DOB</label>
          <input name="date_of_birth" type="date" class="form-control">
        </div>
      </div>

      <hr>
      <h5>Addresses</h5>
      <div id="addressContainer">
        <div class="address-block">
          <div class="mb-2">
            <label>Address Line 1</label>
            <input name="address[0][add_line1]" class="form-control">
          </div>
          <div class="mb-2">
            <label>Address Line 2</label>
            <input name="address[0][add_line2]" class="form-control">
          </div>
          <div class="row">
            <div class="col-md-4">
              <label>State</label>
              <select name="address[0][state_id]" class="form-select state">
                <option value="">Select State</option>
                <?php if(isset($states)) foreach($states as $s): ?>
                  <option value="<?php echo $s->id; ?>"><?php echo $s->state_name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-4">
              <label>City</label>
              <select name="address[0][city_id]" class="form-select city">
                <option value="">Select City</option>
              </select>
            </div>
            <div class="col-md-4">
              <label>Pincode</label>
              <input name="address[0][pincode]" class="form-control">
            </div>
          </div>
          <div class="mt-2">
            <button type="button" class="btn btn-danger removeAddress">Remove</button>
          </div>
        </div>
      </div>

      <button type="button" id="addMore" class="btn btn-secondary mt-2">Add More Address</button>
      <div class="mt-3">
        <button class="btn btn-success">Save</button>
        <a href="<?php echo site_url('employee'); ?>" class="btn btn-link">Back</a>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
  <script>
  $(document).on('change','.state', function(){
      var state_id = $(this).val();
      var cityElem = $(this).closest('.address-block').find('.city');
      $.post('<?php echo site_url('employee/get_cities'); ?>', {state_id: state_id}, function(res){
          var data = JSON.parse(res);
          cityElem.html('<option value="">Select City</option>');
          data.forEach(function(c){
              cityElem.append('<option value="'+c.id+'">'+c.city_name+'</option>');
          });
      });
  });

  $('#addMore').on('click', function(){
      var idx = $('#addressContainer .address-block').length;
      var clone = $('#addressContainer .address-block').first().clone();
      clone.find('input,select').each(function(){
          var name = $(this).attr('name');
          if(!name) return;
          name = name.replace(/address\[0\]/, 'address['+idx+']');
          $(this).attr('name', name).val('');
      });
      $('#addressContainer').append(clone);
  });

  $(document).on('click','.removeAddress', function(){
      if($('#addressContainer .address-block').length > 1){
          $(this).closest('.address-block').remove();
      }
  });

  $(document).ready(function(){
      $('.state, .city').select2({ width: '100%' });
  });
  </script>
</body>
</html>
