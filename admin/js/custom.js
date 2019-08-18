
$(document).ready(function(){
  MainCategorie();
  viewMainOptions();
  viewServices();
  viewgallery();
  viewOffer();

  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you Sure To Delete Package."))
   {
    $.ajax({
     url:"resources/getdata.php",
     method:"get",
     data:{'MCateDel':id},
     success:function(data){
    // alert(data);
      if (data == 0) {
        $('#msgDiv').addClass("alert alert-danger").html("You Cannot remove this Package, It contains Offer.");
      }
      MainCategorie();
      viewMainOptions();
      viewServices();
     }
    });
    setInterval(function(){
     $('#msgDiv').removeClass().html('');
    }, 5000);
   }
  });
});

// Message Box
function showAlert(v,m,vr) {
    if (confirm(m)) {
        window.location.href = "resources/getdata.php?"+ vr +"="+ v;
    }
}

// Sub Category
$(function () {
    $('#sub_cate_frm').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: 'resources/getdata.php',
        data: $('#sub_cate_frm').serialize(),
        success: function (response) {
            window.location.href = "services.php";
        } 
      });
    });

    $('#sub_cate_frm_edit').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: 'resources/getdata.php',
        data: $('#sub_cate_frm_edit').serialize(),
        success: function (response) {
            window.location.href = "services.php";
        }
      });
    });
});

// Main Category
$(function () {
    $('#main_cate_frm').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: 'resources/getdata.php',
        data: $('#main_cate_frm').serialize(),
        success: function (response) {
            if (response==1) {
                $('#msgDiv').html("Category have been Added to list.").addClass("alert alert-success");
                MainCategorie();
                viewMainOptions();
                viewServices()
            }else{
                $('#msgDiv').html("you cannot update this Category.").addClass("alert alert-danger");
            }
            $("#main_cate_frm")[0].reset();
            setInterval(function(){
             $('#msgDiv').removeClass().html('');
            }, 5000);
        }  
      });
    });

    $('#main_cate_frm_Edit').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: 'resources/getdata.php',
        data: $('#main_cate_frm_Edit').serialize(),
        success: function (response) {
            MainCategorie();
            viewMainOptions();
            viewServices();
        }  
      });
    });
});

function viewServices() {
  $(function () {
    $.ajax({
        type: 'post',
        url: 'resources/viewdata.php',
        data: {'action':'viewServices'},
        success: function (response) {
            $( '#viewServices' ).html(response);
        }
    });
    });
}

function viewMainOptions() {
  $(function () {
    $.ajax({
        type: 'post',
        url: 'resources/viewdata.php',
        data: {'action':'viewMainOptions'},
        success: function (response) {
            $( '#viewMainOptions' ).html(response);
        }
    });
    });
}

function MainCategorie() {
  $(function () {
    $.ajax({
        type: 'post',
        url: 'resources/viewdata.php',
        data: {'action':'MainCategorie'},
        success: function (response) {
            $( '#MainCategorie' ).html(response);
        }
    });
    });
}

// Gallery
function viewgallery() {

  $(function () {
    $.ajax({
        type: 'post',
        url: 'resources/viewdata.php',
        data: {'action':'viewgallery'},
        success: function (response) {
            $( '#viewgallery' ).html(response);
        }
    });
  });
}

$(document).on("click","#btngallery",function(e){  
   //Prevent Instant Click  
  e.preventDefault();
  
  // Create an FormData object 
      var formData = $("#galleryFrm").submit(function(e){
          return ;
      });
      var formData = new FormData(formData[0]);
      $.ajax({
          url: "resources/getdata.php",
          type: 'POST',
          data: formData,
          success: function(response) {
              $('#msgDiv').html(response).addClass("alert alert-success");
              $('#galleryFrm')[0].reset();
              viewgallery();
              setInterval(function(){
               $('#msgDiv').removeClass().html('');
              }, 5000);
          },
          contentType: false,
          processData: false,
          cache: false
      });
      return false;
});

// Offer
$(function () {
    $('#add_offer_frm').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: 'resources/getdata.php',
        data: $('#add_offer_frm').serialize(),
        success: function (response) {
            if (response==1) {
                $('#msgDiv').html("Offer Has been Set.").addClass("alert alert-success");
                viewOffer();

            }else{
                $('#msgDiv').html("Try Again!!!").addClass("alert alert-danger");
            }
            $("#add_offer_frm")[0].reset();
            setInterval(function(){
             $('#msgDiv').removeClass().html('');
            }, 5000);
        }  
      });
    });
});

function viewOffer() {

  $(function () {
    $.ajax({
        type: 'post',
        url: 'resources/viewdata.php',
        data: {'action':'viewoffer'},
        success: function (response) {
            $( '#viewoffer' ).html(response);
        }
    });
  });
}

// Profile
$(function () {
    $('#profile_frm').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: 'resources/getdata.php',
        data: $('#profile_frm').serialize(),
        success: function (response) {
            if (response == '0') {
                $('#msgDiv').html("You Entered Wrong Password").removeClass().addClass("alert alert-danger");
            } else if (response == '1') {
                $('#msgDiv').html("Successfully Updated").removeClass().addClass("alert alert-success");
            } else if (response == '2') {
                $('#msgDiv').html("Your New Password doesn't match").removeClass().addClass("alert alert-warning");
            }
            $("#profile_frm")[0].reset();
            // alert(response);
            setInterval(function(){
             $('#msgDiv').removeClass().html('');
            }, 5000);
        }  
      });
    });
});
  