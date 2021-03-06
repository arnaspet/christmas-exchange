var App = {
    init: function() {
        this.initReceiversAddition();
        this.initFormSubmit();
    },

    initFormSubmit: function(){
      $('.senders-form').on('submit', function(e){
          e.preventDefault();
          Loader.startLoader();
          $.post($(this).attr('action'), $(this).serialize(), function(response){
            console.log(response);
              swal({
                  title: "Good job!",
                  text: "You clicked the button!",
                  type: "success",
                  containerClass: 'success'
              });
          }).error(function(){
              swal({
                  title: "error !",
                  text: "You clicked the button!",
                  type: "error",
                  containerClass: 'error'
              });
          }).always(function(){
              Loader.stopLoader();
          });
      });
    },

    initReceiversAddition: function() {
        // christmas_gift_receivers[receivers][0][name]
        function updateNewInputName($input){
            var receivers = $('.receiver-row').size();

            $input.attr('name', $input.attr('name')
                .replace(/(christmas_gift_receivers\[receivers\]\[)\d+(\].+)/, '$1'+receivers+'$2'));
        }
        // christmas_gift_receivers_receivers_0_name
        function updateNewInputId($input){
            var receivers = $('.receiver-row').size();

            $input.attr('id', $input.attr('id')
                .replace(/(christmas_gift_receivers_receivers_)\d+(.+)/, '$1'+receivers+'$2'));
        }

        $('body').on('click', '#add-more-receivers', function(e){
            e.preventDefault();
            var $receiverRow = $('.receiver-row:first').clone(),
                $receiverName = $receiverRow.find('input.name'),
                $receiverEmail = $receiverRow.find('input.email');

            updateNewInputName($receiverName);
            updateNewInputName($receiverEmail);
            updateNewInputId($receiverName);
            updateNewInputId($receiverEmail);

            $receiverRow.css("display","none");
            $('.receivers-container').append($receiverRow);
            $receiverRow.slideDown();
        });
    }
};
$(function(){
   App.init();
});