/**
 * Created by XVI on 21/07/14.
 */
//

$(document).ready(function(){
    $("#search").keyup(function(){

        var search = $(this).val();
        var data = 'keyWord=' + search;
        if(search.length > 2) {

            $.ajax({
                type : "GET",
                url : "src/member/model/dao/result.php",
                data : data,
                success: function(server_response){

                        $("#resultSearch").html(server_response).show();
                }
            });


        }

    });

});