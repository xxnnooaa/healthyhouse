function toggleCheckbox(box)
    {
            var id = $(box).attr("value");

            if($(box).prop("checked") == true)
            {
                var visible = 1;
            }
            else{
                var visible = 0;
            }

            var data = {
                "search_data_admin": 1,
                "id" : id,
                "visible" : visible
            };

            $.ajax({
                type: "post",
                url: "backend.php",
                data: data,
                dataType: "dataType",
                success: function (response){
                    alert("Data Checked");
                }
            });
}