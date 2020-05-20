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


    if(window.location.pathname === '/admin'){

      setInterval(function(){
        $.ajax({
          type: "POST",
          url: baseurl + '/admin/infoDashboard',
          success: function(data){

            //console.log(data);
            var obj = jQuery.parseJSON(data);
            $('#date').html(obj['date']);
            $('#time').html(obj['time']);
            $('#cpu_load').html(obj['cpu_load']);
            $('#free_hdd').html(obj['free_hdd']);
            $('#free_memory').html(obj['free_memory']);
            $('#version').html(obj['version']);
            $('#uptime').html(obj['uptime']);
            $('#board_name').html(obj['board_name']);
            $('#model').html(obj['model']);
          }
        });
      }, 1000);

    };

});
