$(document).ready(function () {
    var path = window.location.href;

    $('.wrapper .sidebar ul li a').each(function(){
      //console.log(this);
      var x = this.nextElementSibling;
      if(x){
        console.log(x.firstElementChild.firstElementChild);
      }
      if(this.href === path) {
        $(this).addClass("active");
      };
    });

    $('.wrapper .sidebar .submenu li a').each(function(){
      if(this.className === 'active'){
        console.log('aktif');
        //$('.wrapper .sidebar ul li a').addClass('active');
      }
    });

    $(".wrapper .top_navbar .list-menu").on('click', function() {
      $(".wrapper").toggleClass('collapses');
    });


    if (window.matchMedia('(max-width: 800px)').matches){
      $(".wrapper").addClass('collapses');
      console.log('lebuoh');
    }

});
