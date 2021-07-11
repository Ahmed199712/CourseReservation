$(document).ready(function(){


  // Image Preview ..
  
  $(".image").change(function() {
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('.image-preview').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(this.files[0]);
    }
  });


  // Image Preview Edit..
  function readURL(input) {
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(this.files[0]);
    }
  }
  
  $("#imgInp").change(function() {
    readURL(this);
  });


  $('.confirmDelete').click(function(){
    return confirm("Are you sure to delete ?");
  });

  $('.confirmActive').click(function(){
    return confirm("Are you sure to accept ?");
  });


  $('#myTable').DataTable();


  // Treats With Countto plugin ..
  $('.count').countTo();



});
