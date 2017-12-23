function handle_chat(data, client_id) {
    $('#provider-list').html('');
    var i;
    for (i = 0; i < data.length; i++) {
        var provider = JSON.stringify(data[0][i]);
        var provider_obj = JSON.parse(provider);
        if (provider_obj.is_online == 1) {
            var is_online = 'on'
        } else {
            var is_online = 'off'
        }
        if (data[1]) {
            var unread_messages = '<span class="unread">' + data[1] + '</span>'
        } else {
            var unread_messages = ''
        }
        $('#provider-list').append('<li onclick="open_chat_window(' + provider_obj.id + ',' + client_id + ',\'' + provider_obj.company.company_name + '\',\'' + is_online + '\')"><a class=' + is_online + ' href="#">' + provider_obj.company.company_name + unread_messages + '<i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>')
    }
}

function handle_chat_window(data, client_id) {
    var i;
    for (i = 0; i < data.length; i++) {
        var message = JSON.stringify(data[i]);
        var message_obj = JSON.parse(message);
        if (client_id == message_obj.recipient_id) {
            var fromTO = 'class="from"'
        } else {
            var fromTO = 'class="to"'
        }
        if(!$('#serial' + message_obj.id).length)
        {
          var content = '<article id="serial' + message_obj.id + '" ' + fromTO + '><div class="date">' + message_obj.created_at + '</div><p>' + message_obj.message + '</p></article>';
          $('#message-list').append(content);
        }
    }
    $(".contact-message .scroll").animate({
        scrollTop: $('.contact-message .scroll').get(0).scrollHeight
    }, 2000)
}

function append_chat_messages(data, client_id) {
    var i;
    for (i = 0; i < data.length; i++) {
        var message = JSON.stringify(data[i]);
        var message_obj = JSON.parse(message);
        if ($('#serial' + message_obj.id).length == 0) {
            if (client_id == message_obj.recipient_id) {
                var fromTO = 'class="from"'
            } else {
                var fromTO = 'class="to"'
            }
            var content = '<article id="serial' + message_obj.id + '" ' + fromTO + '><div class="date">' + message_obj.created_at + '</div><p>' + message_obj.message + '</p></article>';
            $('#message-list').append(content);
            $(".contact-message .scroll").animate({
                scrollTop: $('.contact-message .scroll').get(0).scrollHeight
            }, 2000)
        }
    }
}

function current_user_contacts(data, client_id) {
    $('#provider-list').html('');
    var i;
    for (i = 0; i < data.length; i++) {
        var provider = JSON.stringify(data[0][i]);
        var provider_obj = JSON.parse(provider);
        if (provider_obj.is_online == 1) {
            var is_online = 'on'
        } else {
            var is_online = 'off'
        }
        if (provider_obj.company == null) {
            var username = provider_obj.first_name
        } else {
            var username = provider_obj.company.company_name
        }
        if (data[1]) {
            var unread_messages = '<span class="unread">' + data[1] + '</span>'
        } else {
            var unread_messages = ''
        }
        $('#provider-list').append('<li onclick="open_chat_window(' + provider_obj.id + ',' + client_id + ',\'' + username + '\',\'' + is_online + '\')"><a class=' + is_online + ' href="#">' + username + unread_messages + '<i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>')
    }
}
