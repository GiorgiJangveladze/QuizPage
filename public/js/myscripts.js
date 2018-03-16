$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

/* Logout Begin */
    $('#logout').click(function(){
    alertify.confirm("Logout ?", function (e) {
        if(e)
        {     
            document.location.href="/logout";
        }else
        {
            return false;
        }
        });
    });
    /*End*/

    /* Categories Begin */
     $(function()
        {
            $(".categoryEdit").on('click',function()
            {       
                    var name;
                    let id = $(this).attr("rel");
                    var otherInputs = $(this).parents('td').siblings().find('input');

                    name    = $(otherInputs[0]).val();
                    $.ajax({
                        type: "POST",
                        url: "/admin/category/edit",
                        dataType:'json',
                        data:{name:name,id:id},
                        success: function(response){
                            if(response.success)
                            {
                                alertify.alert(response.success);
                                $('#errormes').remove();
                            }
                            if(response.error)
                            {
                                alertify.alert(response.error);
                            }
                        },
                        error: function(response){
                    
                        if (response.status == 422)
                        {

                            errorsHtml = '<div class="alert alert-danger" id="errormes"><ul>';
                            responsejs = response.responseJSON
                            $.each(responsejs.errors, function (key, item){

                                 errorsHtml += '<li>' + item + '</li>';

                            });
                            errorsHtml += '</ul></di>';
                                
                            $( '#form-errors' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form
                            // Render the errors with js ...
                            }
                        }
                        
                    });
            });
        });
     /* End */

/* question form show Begin */
    function showQuestionForm()
    {
        $("#addQuestionform").removeClass('hidde');
        $("#showQbutton").addClass('hidde');
    }
/* End */

/* append question Begin */
    function myAppendFunc() {
        var size = $("#appendform > input").length;
        if(size >= 5)
        {
            alertify.alert("Can't be more than 5 questions")
        }else
        {
               $("<label>possible answer "+(size+1)+") </label>").appendTo("#appendform");
               $("<input type='text' class='form-control' name='Possibleanswer[]' placeholder='5'>").appendTo("#appendform");
        }           
    }
/* End */
/* remove question Begin */
    function myRemoveFunc() {
        var size = $("#appendform > input").length;
        if(size <=2)
        {
            $("#addAnswers").removeClass('hidde');
            alertify.alert("There should be more than two questions")
        }else
        {
            $("#appendform  label").last().remove();
            $("#appendform  input").last().remove();
        }           
    }
/* End */
/* delete request */

        function deletefunction(methodname,object)
        {        

                let id = $(object).attr("rel");
                alertify.confirm("Delete ?", function (e) {

                        if (e) {
                                $.ajax({
                                    type: "delete",
                                    url: methodname,
                                    data: {id:id},
                                    complete:function()
                                    {
                                        alertify.alert("Object Deleted",function(e)
                                            {
                                                if(e)
                                                {
                                                    location.reload();
                                                }
                                            });
                                    }
                                    });

                        } else {
                            return false;
                        }
                    });
        }

     /* End */