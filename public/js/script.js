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

    // Info Dashboard
    if(window.location.pathname === '/RouterDashboard'){

      //setInterval(function(){
        $.ajax({
          type: "POST",
          url: baseurl + '/RouterDashboard/infoDashboard',
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
				url: baseurl + '/RouterDashboard/showLog',
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

    if(window.location.pathname === '/HotspotUsers'){

			fetch_data();

			function fetch_data() {
				$('#tableUser').DataTable({
					"processing" : true,
					"serverSide" : true,
					"ordering"	 : false,
					"ajax"			 : baseurl + "/HotspotUsers/list"
				});
			}

			$(document).on('click', '.delete', function(){
				var id = $(this).attr("id");
				if(confirm("Are you sure you want to remove this?")){
					$.ajax({
						url: baseurl+'/HotspotUsers/delete/'+id,
						method: 'GET',
						success: function(msgSuccess){
							$('#alert_message').html('<div class="alert alert-success">'+msgSuccess+'</div>');
      				$('#tableUser').DataTable().destroy();
							fetch_data();
						}
					})
				}
			});

			setInterval(function(){
				$('#alert_message').html('');
			}, 5000);
    };

	// DHCP Lease
	if(window.location.pathname === '/DhcpLease'){
		$.ajax({
			type: "POST",
	        url: baseurl + '/DhcpLease/list',
	        success: function(data){
				var json = jQuery.parseJSON(data);
	            var items = '';
				$.each(json, function(id, obj){
	            items += '<tr>';
	            items += '<td>'+obj.server+'</td>';
	            items += '<td>'+obj.address+'</td>';
	            items += '<td>'+obj.mac+'</td>';
	            items += '</tr>';
	            });

	            $('#tableData').append(items);
	        }
    	});
	};

});
