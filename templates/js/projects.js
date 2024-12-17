(function($){
    $(document).ready(function (){

            $(".btnShowTree").click(function(){
            var id = $(this).data("id");

            $('.TreeLayot[data-btnid='+id+']').slideToggle(200);

        })

        $(".chkSubrubric").click(function(){
            var subrubric_id = $(this).data("idrubric");
            var checked = $(this).prop("checked");
            var  projects_id= $("#id_projects_inp").val();

            $.ajax({
                method: 'post',
                url  : 'updaterubric',
                data: {subrubric_id: subrubric_id,
                    checked: checked,
                    projects_id: projects_id,
                    _csrf: yii.getCsrfToken()
                },
                cache: false,
                success  : function(response) {
                    var obj = $.parseJSON(response);


                    if (obj.responce==true)
                    {


                    }
                    else
                    {
                      alert(obj.message);

                    }
                },
                error  : function() {
                    alert("Ошибка, неверный запрос");

                }
            });
        })


        $("#addProjectsUgroups").click(function(){


            var ugroups_id= $('#ugroups_notin').val();
            var projects_id= $('#projects-projects_id').val();

            if (ugroups_id != parseInt(ugroups_id)) return;
         if (projects_id!= parseInt(projects_id)) return;

            $.ajax({
                method: 'post',
                url  : 'addprojectsugroups',
                data: {
                    ugroups_id: ugroups_id,
                    projects_id: projects_id,
                    _csrf: yii.getCsrfToken()
                },
                cache: false,
                success  : function(response) {
                    var obj = $.parseJSON(response);


                    if (obj.responce==true)
                    {
                        $("#ugroups_in").append($("#ugroups_notin option:selected"));
                    }
                    else
                    {
                        alert(obj.message);

                    }
                },
                error  : function() {
                    alert("Ошибка, неверный запрос");

                }
            });
        })

        $("#removeProjectsUgroups").click(function(){


            var ugroups_id= $('#ugroups_in').val();
            var projects_id= $('#projects-projects_id').val();

            if (ugroups_id != parseInt(ugroups_id)) return;
            if (projects_id!= parseInt(projects_id)) return;

            $.ajax({
                method: 'post',
                url  : 'removeprojectsugroups',
                data: {
                    ugroups_id: ugroups_id,
                    projects_id: projects_id,
                    _csrf: yii.getCsrfToken()
                },
                cache: false,
                success  : function(response) {
                    var obj = $.parseJSON(response);


                    if (obj.responce==true)
                    {
                        $("#ugroups_notin").append($("#ugroups_in option:selected"));
                    }
                    else
                    {
                        alert(obj.message);

                    }
                },
                error  : function() {
                    alert("Ошибка, неверный запрос");

                }
            });
        })

    });







    /* optional triggers

     $(window).load(function() {

     });

     $(window).resize(function() {

     });

     */

})(window.jQuery);