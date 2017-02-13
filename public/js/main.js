/* global $ */

$(document).ready(function(){
    let url = 'src/controllers/casePost.php';
    
    $('form').on('submit', function(e){
        e.preventDefault();
        
        let button = $(this);
        let values = $(this).serialize();
        values += '&action=' + $(this).attr('id');
        
        //console.log(values);
        if($(this).attr('id') == "espiar"){
            $.post(url, values, function(data){
                $("#aqui").html(data)
            })
        }else{
            $.post(url, values, function(data){
                $("#aqui").html(data)
                console.log(data);
                if(data == 1) window.location.reload();
            })
        }
    })
})