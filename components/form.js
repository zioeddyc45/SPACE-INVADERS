$(document).ready(function () {
    $("form").submit(function (event) {
        $(".form-group").removeClass("has-error");
        $(".help-block").remove();
      var formData = {
        name: $("#name").val(),
        points: $("#points").val(),
      };
  
      $.ajax({
        type: "POST",
        url: "form.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
        console.log(data);

      if (!data.success) {
        if (data.errors.name) {
          $("#name-group").addClass("has-error");
          $("#name-group").append(
            '<div class="help-block"><p class="h5" style="color:red;">' + data.errors.name + "</p></div>"
          );
        }

        if (data.errors.points) {
          $("#points-group").addClass("has-error");
          $("#points-group").append(
            '<div class="help-block"><p class="h5" style="color:red;">' + data.errors.points + "</p></div>"
          );
        }
      } else {
        $("form").html(
          '<div class="alert alert-success">' + data.message + "</div>"
        );
      }

      
    })
    .fail(function (data) {
        $("form").html(
          '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
        );
      });

    
  
      event.preventDefault();
    });
  });
  