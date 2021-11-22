$(document).ready(function (e) {
  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#image').change(function(){
      
        let reader = new FileReader();

        reader.onload = (e) => { 
          $('#image_preview_container').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 

    });

    
$("#item_image").change(function(){

    $('#image_preview').html("");
 
    var total_file=document.getElementById("item_image").files.length;
 
    for(var i=0;i<total_file;i++)
 
    {
 
     $('#image_preview').append("<img style='width:200px;height:auto;display:inline-block;margin-right:5px;margin-top:5px;' src='"+URL.createObjectURL(event.target.files[i])+"'>");
 
    }
 
 });

    
});