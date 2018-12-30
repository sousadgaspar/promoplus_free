
@if(session('message'))

	<!-- successNotificationCard -->
	<div class="card notificationCard" id="successNotificationCard">

		{{ session('message') }}

	</div><!-- End Sucess-notification-card -->


@endIf

