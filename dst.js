// JavaScript Document
function changeSchool()
{
            $(document).ready(function() {
//alert('Document is ready');
                $('#dstSelect').change(function() {
                    var sel = $(this).val();
//alert('You picked: ' + sel);
                    $.ajax({
                        type: "POST",
                        url: "another_php_file.php", // "another_php_file.php",
                        data: 'theOption=' + sel,
                        success: function(data) {
//alert('Server-side response: ' + data);
                            $('#dd2DIV').html(data);
                            
                        }
                    });
                });
            });
}




function fetch_data()
{
      $(document).ready(function() {
//alert('Document is ready');
                $('#clik_me').click(function() {
                    var sel = $('#dstSelect').val();
                    var sel1 = $('#school').val();
//alert('You picked: ' + sel);
                    $.ajax({
                        type: "POST",
                        url: "another_php_file1.php", // "another_php_file.php",
                        data: {
                            'dist' : sel,
                            'scho' : sel1,
                            
                        },
                        success: function(data) {
//alert('Server-side response: ' + data);
                            $('#paste_here').html(data);
                            
                        }
                    });
                });
            });
}

