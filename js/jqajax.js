$('#ajax').click(function() {
    var msg = tinyMCE.get('msg').getContent();
    $.post(base_url+'index.php/addmsg', {msg: msg}, function(data){
        if (data!=0){
            data = JSON.parse(data);
            data.msg = msg;
            var template = $('#message_block').html();
            for(var key in data) {
               template = template.replace('{' + key + '}', data[key]);
            }
            $(template).appendTo($("#commentBlock"));
            $('#message').trigger( 'reset' );
        } else {
            location.reload();
        }
    })    
})