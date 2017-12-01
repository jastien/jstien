$(document).ready(function(){
    $('#submit').click(function(event){
        event.preventDefault();
        $.ajax({
            type: "get",
            url: "//cst352-chan1443.c9users.io/project/movieSearch.php",
            // dataType: "json",
            data: {"title": $('#title').val()},
            success: function(data, status) {
                alert ("Success:" + data);   // display what feedback from server php code
                var records = JSON.parse(data);
                // alert ("Title: " + records['title']);
                $('#title').val(records['title']);
                // alert ("Year: " + records['year']);
                $('#year').text(records['year']);
                // alert ("Rated: " + records['rated']);
                $('#rated').text(records['rated']);
                // alert ("Category: " + records['category']);
                $('#category').text(records['category']);
                
            },
            complete: function(data, status) {
                // alert ("Complete:" + status);
            }
            
        });    
            
    });
});
