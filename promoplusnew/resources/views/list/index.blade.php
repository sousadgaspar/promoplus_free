@extends ( 'template.master' )


@section ('pageTitle')
 - Gerir listas de distribuição
@endSection


@section ('content')

<div class="card" id="dashborad-card">
	<div id="dashBoardIconContainer">
		
		@include ('partials.contactmenu')
		
		<div id="" class="row">

			<hr>

			<ul>

				@if(count($lists) == 0)

					Sem listas de momento. <a href="/list/create"> Crie uma agora. </a>

				@endIf

				@if(isset($lists))

					@foreach($lists as $list)
					
						<li> 
							<a href="/list/tag/{{$list->name}}">
								 {{ $list->name }}
							</a>
						</li>

					@endForeach

				@endIf

			</ul>

		</div><!-- End row -->
		
		<br />
		
	</div><!-- End dashborad-card -->
</div>

@endSection