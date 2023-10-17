<!doctype html>
<html class="no-js" lang="en-US">
@include('backend.head')


<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
            @include('backend.navbar')
			    @include('backend.sidebar')

                    @yield('content')

	
		       	@include('backend.footer')
            @include('backend.rightsite')
	</div>

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('backend/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    
    <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
     <script defer src="{{ asset('backend/fontawesome/js/all.js') }}"></script> <!--load all styles -->

  
    <script src="{{ asset('backend/dist/js/multiselect2.js') }}"></script>
    <script src="{{ asset('backend/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/chart.js/Chart.js') }}"></script>


    <script src="{{asset('backend/bower_components/moment/moment.js')}}"></script>
    <script src="{{asset('backend/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>

$(document).ready( function () {
    $('.myTable').DataTable({

        "pageLength": 100,
         "lengthChange": false

    });
} );


function validateform(este)
{    

     
    var erro = false;
      
    jQuery("input[type='text']",este).each(function()
    { 
              
        if(erro==false && jQuery(this).attr("require") == 1 && jQuery.trim(jQuery(this).val()) == "" )
        {   
                          
            erro = true;
            $(this).focus();
            $(this).next("span").text("Erro - Campo Obrigatório");
            $(this).next("span").css("display", "block").delay( 2000 ).fadeOut(); 
                       
        }


        
        
        if(erro==false && jQuery(this).attr("minl")>0 && jQuery.trim(jQuery(this).val()).length < jQuery(this).attr("minl"))
        {
        
            erro = true;
            jQuery(this).addClass('form error');
            $(this).focus();
        }
        if(erro==false && jQuery(this).attr("maxl")>0 && jQuery.trim(jQuery(this).val()).length < jQuery(this).attr("maxl"))
        {
            erro = true;
            jQuery(this).addClass('form error');
            $(this).focus();
        }
        if( erro==false && jQuery(this).attr("email") == 1 && jQuery.trim(jQuery(this).val()) == "")
        {
             
            erro = true;
            $(this).focus();
            $(this).next("span").text("Erro - Campo Obrigatório");
            $(this).next("span").css("display", "block").delay( 2000 ).fadeOut(); 
       
        }



        if( erro==false && jQuery(this).attr("email") == 1 && isEmail(jQuery.trim(jQuery(this).val())) == false)
        {
             
            erro = true;
            $(this).focus();
            $(this).next("span").text("Erro - Formato do Email");
            $(this).next("span").css("display", "block").delay( 2000 ).fadeOut(); 
       
        }



        if(erro==false && jQuery(this).attr("numerico") == 1 && isNaN(jQuery(this).val())==true)
        {
            erro = true;
            jQuery(this).addClass('form error');
            $(this).focus();
        }
        if(erro==false && jQuery(this).attr("email") == 1 && jQuery("input[name='new_email']",este).attr('name') == 'new_email' && validate_email(jQuery(this)) == false)
        {   
            
            erro = true;
            jQuery(this).addClass('form error');
            $(this).focus();
        }
        if(erro==false && jQuery(this).attr("email") == 1 && jQuery("input[name='email_newsletter']",este).attr('name') == 'email_newsletter' && validate_email_newsletter(jQuery(this)) == false)
        {
       
            erro = true;
            jQuery(this).addClass('form error');
            $(this).focus();
        }
        if(erro==false && jQuery("input[name='userlogin']",este).attr('name') == 'userlogin' && validate_email_login(jQuery(this)) == false)
        {      
                                      
            erro = true;
            jQuery(this).addClass('form error');
            $(this).focus();
        }
    })
    
    jQuery("select",este).each(function()
    {
        if(erro==false && jQuery(this).attr("require") == 1 && ( jQuery.trim(jQuery(this).val()) == "" || ( jQuery.trim(jQuery(this).val()) == 0 && jQuery(this).attr("withzero") != 1 )))
        {
            erro = true;
            jQuery(this).addClass('form error'); 
            $(this).focus();
        }
    })


    jQuery("input[type='password']",este).each(function()
    {

      
       if(erro==false && jQuery(this).attr("require") == 1 && ($("input[name=password]").val() == ""  || $("input[name=passwordconfirme]").val() == ""))
        {    
        
            erro = true;
            $(this).focus();
            $(this).next("span").text("Erro - Campo Obrigatório");
            $(this).next("span").css("display", "block").delay( 2000 ).fadeOut(); 
            
        }
         
        if (erro==false && ($("input[name=password]").val() != $("input[name=passwordconfirme]").val())) {
        
            erro = true;
            $(this).focus();
            $(this).next("span").text("Erro - Não Correspondem.");
            $(this).next("span").css("display", "block").delay( 2000 ).fadeOut(); 

        }
        
        if(erro==false && jQuery(this).attr("require") == 1 && jQuery.trim(jQuery(this).val()) == "")
        {    
        
            erro = true;
            jQuery(this).addClass('form error');
            $(this).focus();
            
        }
        if(erro==false && jQuery(this).attr("minl")>0 && jQuery.trim(jQuery(this).val()).length < jQuery(this).attr("minl") && jQuery.trim(jQuery(this).val()) != "")
        {
            erro = true;
            jQuery(this).addClass('form error');
            $(this).focus();
        }
        if(erro==false && jQuery(this).attr("maxl")>0 && jQuery.trim(jQuery(this).val()).length >= jQuery(this).attr("maxl"))
        {
            erro = true;
            jQuery(this).addClass('form error');
            $(this).focus();
        }
        if(erro==false && jQuery(this).attr("equalTo") != '' && jQuery("input[id='"+jQuery(this).attr("equalTo")+"']",este).val()==jQuery(this).val())
        {
            erro = true;
            jQuery(this).addClass('form error');
            $(this).focus();
        }
        if(erro==false && jQuery(this).attr("match") == 1 && jQuery("input[wrefo='"+jQuery(this).attr("wref")+"']",este).val()!=jQuery(this).val())
        {
            erro = true;
            jQuery(this).addClass('form error');
            $(this).focus();
        }
        if(erro==false && jQuery(this).attr("user_password") == 1 && !validate_password(jQuery(this)))
        {
            erro = true;
            jQuery(this).addClass('form error');
            $(this).focus();
        }
        
       
        if(erro==false && jQuery("input[name='password_login']",este).attr('name') == 'password_login' && validate_login(jQuery(this)) == false)
        {
        
            var msgerro2 = document.getElementById("msgerro2").value;
            erro = true;
            jQuery(this).addClass('form error');
            $(this).focus();
          

        }
   
   

     })
    
        
    jQuery("textarea",este).each(function()
    {
    
     
        if(erro==false && jQuery(this).attr("require") == 1 && jQuery.trim(jQuery(this).val()) == "")
        {
          
            erro = true;
            jQuery(this).addClass('form error');
            $(this).focus();
        }
    })


    jQuery("input[type='checkbox']",este).each(function()
    {
        if(erro==false && jQuery(this).attr("require") == 1 && !jQuery(this).is(':checked'))
        {
        
           //var hv = $('#msgterms').val(); 
            erro = true;
            $('.errorToolTip').show();
         
           
        }
    })
    
    
     jQuery("input[type='file']",este).each(function()
    {
   
        if(erro==false && jQuery(this).attr("require") == 1 && jQuery.trim(jQuery(this).val()) == "")
        {
          
            erro = true;
            jQuery(this).parents('.inputError').addClass('displayError');
            $(this).focus();
            $('.form-message .error', este).fadeIn();    
            return false;
      
        }
        
        
    }) 

    

    if(erro == false){
  
     //$('.form-message .success').show();
     return true;
    } 
    else { 
    
      
        return false;
    }
}

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}


    $(document).ready(function () {
        $('.multiplePicker').multiselect();
    });

    </script>
       @yield('scripts')

    </body>
</html>