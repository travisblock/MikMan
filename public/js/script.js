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

		$('.close').on('click', function(){
			$("#notify").animate({ height: 'toggle', opacity: 'toggle' }, '200', function(){
				$('#notify').remove();
			});
		});

		window.setTimeout(function(){
			$("#notify").animate({ height: 'toggle', opacity: 'toggle' }, '500', function(){
				$('#notify').remove();
			});
		}, 4000);

    if (window.matchMedia('(max-width: 1000px)').matches){
      $(".wrapper").addClass('collapses');
      console.log('lebuoh');
    }

    $("#save").on('click', function(){
      var form = $("#formRouter").serialize();

      $.ajax({
        type: "POST",
        url: baseurl + '/ControlRouter/save',
        data: form,
        success: function(d){
          console.log(d);
          console.log(baseurl);
        }
      });
    });

		function datatable_start() {
			$('#table').DataTable();
		}

    // Info Dashboard
    if(window.location.pathname === '/router_dashboard'){

      //setInterval(function(){
        $.ajax({
          type: "POST",
          url: baseurl + '/router_dashboard/infoDashboard',
          success: function(data){
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
      //}, 1000);

			$.ajax({
				type: "POST",
				url: baseurl + '/router_dashboard/showLog',
				success: function(log){
					var log   = jQuery.parseJSON(log);
					var items = '';
					$.each(log, function(id, object){
						items += '<tr>';
						items += '<td>'+object.message+'</td>';
						items += '</tr>';
					});
					$('#log').append(items);
				}
			})

    };

    // User List

    if(window.location.pathname === '/hotspot_users'){
			$('title').text('List Hotspot User');
			datatable_start();

			$(document).on('click', '.delete', function(){
				var id = $(this).attr("id");
				if(confirm("Yakin hapus user?")){
					$.ajax({
						url: baseurl+'/hotspot_users/delete/'+id,
						type: 'GET',
						success: function(msgSuccess){
							location.reload();
						}
					})
				}
			});

			// list user click
			$(document).on('click', '#btnlist', function(){
				$('#listuser').css('display', 'block');
				$('#adduser').css('display', 'none');
				$('h4').text('List Hotspot User');
				$('title').text('List Hotspot User');
				$(this).removeClass('badge-info');
				$(this).addClass('badge-primary');
				//window.history.pushState('', '', '/hotspot_users');
			});

			// add user click
			$(document).on('click', '#btnadd', function(){
				$('#listuser').css('display', 'none');
				$('#adduser').css('display', 'block');
				$('h4').text('Add Hotspot User');
				$('title').text('Add Hotspot User');
				$(this).removeClass('badge-info');
				$(this).addClass('badge-primary');
				//window.history.pushState('', '', '/hotspot_users/add');
			});

			// add user submit
			$(document).on('click', '#btnaddsave', function(){
				$.ajax({
					url: baseurl+'/hotspot_users/add',
					type: 'POST',
					data: $('#formadduser').serialize(),
					success: function(msgadduser){
						location.reload();
						// console.log($('#formadduser').serialize());
						// $('#alert_message').html('<div class="alert alert-success">'+msgadduser+'</div>');
						// $('#listuser').css('display', 'block');
						// $('#adduser').css('display', 'none');
						// $('h4').text('List Hotspot User');
						// $('#tableUser').DataTable().destroy();
						// fetch_data();
					},
					error: function(xhr, status, err) {

             $("Terjadi error : "+status);
           }
				})
			});

			// Close add user
			$(document).on('click', '#btnaddclose', function(){
				$('#listuser').css('display', 'block');
				$('#adduser').css('display', 'none');
				$('h4').text('List Hotspot User');
			});



			setInterval(function(){
				$('#alert_message').html('');
			}, 5000);
    };

	// DHCP Lease
	if(window.location.pathname === '/dhcp_lease'){
		$('title').text('List DHCP Lease');
		datatable_start();
	};

	if(window.location.pathname === '/hotspot_user_profile'){
		$('title').text('Hotspot User Profile');
		datatable_start();
	}

});
