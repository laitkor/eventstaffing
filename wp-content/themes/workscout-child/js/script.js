function requestdata(replace = 0)
{
    var myForm = $('#myForm').serialize();
    
            $.ajax({
                url: ajaxurl,
                type: 'post',
                data: myForm,
                beforeSend:function(){
                    $('#loadingmessage').show();
                    $(".load-more").text("Loading...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
                    //setTimeout(function() {
                        // appending posts after last post with class="post"
                    if(replace)
                        $(".talent-profile-list-data").html(response).show().fadeIn("slow");
                    else
                        $(".talent-profile-list-data").append(response).show().fadeIn("slow");
                    //}, 2000);
                    $('#loadingmessage').hide();
                    $(".load-more").text("Load more");
                }
            });
        }
$(document).ready(function(){
    requestdata();
    // Load more data
    $('.load-more').click(function(){
        var offset = Number($('#offset').val());
        offset = offset + 21; 
        $("#offset").val(offset);
        requestdata();
    });
    $('.search-data').click(function(){
        var offset = 0;
        $("#offset").val(offset);
        requestdata(1);
    });
});
function closeMe() { 
    $("body > .my-mfp-zoom-in").remove(); 
    $("body > .mfp-wrap").remove(); 
}
function openModal(index)
{
    var talentDialog = $("#talent-dialog-box-"+index).html(); 
    $("body").prepend(talentDialog); 
    jssor_1_slider_init();
}