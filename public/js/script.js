$(document).ready(function () {
    var path      = window.location.href;
    var baseurl   = window.location.protocol + '//' + window.location.host;
    $('.wrapper .sidebar ul li a.parent').each(function(){
      parrent = this;
      var nextSibling = this.nextElementSibling;
      if(nextSibling){
        child  = nextSibling.children;
        $(child).each(function(){
          anchor = this.firstElementChild;
          href   = anchor.href
          if(href === path){
            $(parrent).addClass('active');
            $(nextSibling).addClass('show');
            $(anchor).addClass('active');
          }

        });

      }
      if(this.href === path) {
        $(this).addClass("active");
      };
    });

    $(".wrapper .top_navbar .list-menu").on('click', function() {
      $(".wrapper").toggleClass('collapses');
    });


    if (window.matchMedia('(max-width: 800px)').matches){
      $(".wrapper").addClass('collapses');
      console.log('lebuoh');
    }

    // $("#formRouter").submit(function(e){
    //   e.preventDefault();
    //
    //   var form = $(this);
    //
    //   $.ajax({
    //     type: "POST",
    //     url: BASEURL + 'router/save';
    //     data: form.serialize(),
    //     success: function(){
    //       alert('success');
    //     }
    //
    //   })
    // })

    $("#save").on('click', function(){
      var form = $("#formRouter").serialize();

      $.ajax({
        type: "POST",
        url: baseurl + '/router/save',
        data: form,
        success: function(d){
          //alert('success');
          console.log(d);
          console.log(baseurl);
        }
      });
    });

});
