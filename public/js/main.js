// chat
function handle_chat(data,client_id)
{
  $('#provider-list').html('');
  var i;
  for(i=0; i < data.length; i++)
  {
    var provider=JSON.stringify(data[i]);
    var provider_obj=JSON.parse(provider);
    if(provider_obj.is_online==1){var is_online='on';}else{var is_online='off';}
    $('#provider-list').append('<li onclick="open_chat_window('+provider_obj.id+','+client_id+',\''+provider_obj.company.company_name+'\',\''+is_online+'\')"><a class='+is_online+' href="#">'+provider_obj.company.company_name+'<span class="unread">2</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>');
  }
}
function handle_chat_window(data)
{
  $('#message-list').html('');
  var i;
  for(i=0; i < data.length; i++)
  {
    var message=JSON.stringify(data[i]);
    var message_obj=JSON.parse(message);
    var content='<article class="to"><div class="date">'+message_obj.created_at+'</div><p>'+message_obj.message+'</p></article>';
    $('#message-list').append(content);
  }
}
