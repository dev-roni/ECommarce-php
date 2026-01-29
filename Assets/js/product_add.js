    $(document).ready(function(){
        $('#parent_category').on('change', function(){
            var categoryID = $(this).val();
            if(categoryID){
                $.ajax({
                    type: 'POST',
                    url: 'get_sub_categories.php',
                    data: { category_id: categoryID },
                    success: function(html){
                        $('#sub_category').html(html);
                    }
                }); 
            }else{
                $('#sub_category').html('<option value="">Select Category first</option>'); 
            }
        });
    });