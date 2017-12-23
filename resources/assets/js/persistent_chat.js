$(document).ready(function(){
  // chat
  $("#toggle-chat").on("click", function(event){
      event.preventDefault();
      $(".chat-open").fadeIn("fast");
  });

  $(".contact-list a").on("click", function(event){
      event.preventDefault();
      $(".contact-list").animate({marginLeft: "-240px"});
      $(".contact-message .scroll").animate({scrollTop: $('.contact-message .scroll').get(0).scrollHeight}, 2000);
  });

  $("a.back").on("click", function(event){
      event.preventDefault();
      $('#chat_provider_id').val('');
      $('#chat_client_id').val('');
      load_contacts();
      $(".contact-list").animate({marginLeft: "0"});
  });

  $("a.close").on("click", function(event){
      event.preventDefault();
      $('#chat_provider_id').val('');
      $('#chat_client_id').val('');
      $(".contact-list").animate({marginLeft: "0"});
      $(".chat-open").fadeOut("fast");
  });
});
