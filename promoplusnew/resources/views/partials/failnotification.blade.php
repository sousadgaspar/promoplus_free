@if ($errors->any())
	<!-- Fail notification  card -->
	<div class=" notificationCard" id="failNotificationCard">

	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>


	</div><!-- End Fail notification  card -->
@endif