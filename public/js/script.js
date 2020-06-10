$(document).ready(function () {
    var path      = window.location.href;
    var baseurl   = window.location.protocol + '//' + window.location.host;
		var pathname	= path.split('/');
		var pathname	= pathname[3];
		var collapse 	= window.matchMedia("(max-width: 1000px)");

		// Function function

		function customClass(removed, add)
		{
			if (removed !== 'no') {
				$.each(removed, function(id, obj) {
					$(obj).removeClass('badge-primary');
					$(obj).addClass('badge-info');
				});
			}
			$(add).removeClass('badge-info');
			$(add).addClass('badge-primary');
		}

		function generalClick(dNone, dBlock, title)
		{
			$.each(dNone, function(id, obj){
				$(obj).css('display', 'none');
			});
			$(dBlock).css('display', 'block');
			$('h4').text(title + ' Hotspot User');
			$('title').text(title + ' Hotspot User')
		}

		function collapseMenu()
		{
			if (window.matchMedia('(max-width: 1000px)').matches){
				$(".wrapper").toggleClass('collapses');
			}else{
				$('.wrapper').removeClass('collapses');
			}
		}

		function datatable_start()
		{
			$('#table').DataTable();
		}

		// Toggle active sidebar menu
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

		// Collapse menu
    $(".wrapper .top_navbar .list-menu").on('click', function() {
      $(".wrapper").toggleClass('collapses');
    });

		collapse.addListener(collapseMenu);

		// Close notification
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


    // $("#save").on('click', function(){
    //   var form = $("#formRouter").serialize();
		//
    //   $.ajax({
    //     type: "POST",
    //     url: baseurl + '/ControlRouter/save',
    //     data: form,
    //     success: function(d){
    //       console.log(d);
    //       console.log(baseurl);
    //     }
    //   });
    // });




    if (pathname === 'router_dashboard') {
    	// Info Dashboard

      $.ajax({
        type: "POST",
        url: baseurl + '/router_dashboard/infoDashboard',
        success: function(data){
          var obj = jQuery.parseJSON(data);
					console.log(data);
					console.log(obj);
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

    }else if (pathname === 'hotspot_users') {
			//hotspot_users

			datatable_start();
			customClass('no', '#btnlist');

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
				generalClick(['#adduser', '#edituser', '#generateuser'], '#listuser', 'List');
				customClass(['#btnadd', '#btngenerate'], this);
			});

			// add user click
			$(document).on('click', '#btnadd', function(){
				generalClick(['#listuser', '#edituser', '#generateuser'], '#adduser', 'Add');
				customClass(['#btnlist', '#btngenerate'], this);
			});

			// Close add user
			$(document).on('click', '#btnaddclose', function(){
				generalClick(['#adduser', '#edituser', '#generateuser'], '#listuser', 'List');
				customClass(['#btnadd', '#btngenerate'], '#btnlist');
			});

			// Edit user click
			$(document).on('click', '.btnedit', function(){
				generalClick(['#adduser', '#listuser', '#generateuser'], '#edituser', 'Edit');
				window.history.pushState('', '', '/hotspot_users/listById/' + $(this).attr('id'));
				$.ajax({
					url: baseurl+'/hotspot_users/listById/'+ $(this).attr('id'),
					type: 'GET',
					success: function(data) {
						var obj = jQuery.parseJSON(data);
						console.log(obj);
						$('#editName').val(obj['name']);
					}
				});
			});

			// add user submit
			$(document).on('click', '#btnaddsave', function(){
				$.ajax({
					url: baseurl+'/hotspot_users/add',
					type: 'POST',
					data: $('#formadduser').serialize(),
					success: function(msgadduser){
						location.reload();
					}
				});
			});


    }else if (pathname === 'dhcp_lease') {
			// dhcp_lease
			datatable_start();
		}else if (pathname === 'hotspot_user_profile') {
			//hotspot_user_profile
			datatable_start();
		}

});
