<div class="grid-x grid-padding-x">
	<div class="cell">
		<div class="grid-x medium-up-4 goals">
			
			@for ($i = 1; $i <= 4; $i++)
				<div class="
						cell goal 
						@if ($progress >= ($i * 25)) on-progress @endif
				">
					@if ($progress >= ($i * 25)) 
						<div class="bar" style="width: {{ $progress }}%"></div> 
					@endif

					<p>
						@if ($i == 1)
							0 IDR
						@elseif ($i == 4)
							{{ number_format($donation->target) }} IDR
						@endif

						<br>

						<small>
							{{ $i * 25 }} % Goal Reached
						</small>
					</p>
				</div>
			@endfor

		</div>
	</div>
</div>

<div class="grid-x grid-padding-x hide">
	<div class="cell">
		<div class="grid-x medium-up-4 goals">
			<div class="cell goal reached">
				<p>10.000.000 IDR<br><small>Goal Reached</small></p>
			</div>
			
			<div class="cell goal on-progress">
				<div class="bar" style="width: 75%"></div>
				
				<p>20.000.000 IDR<br><small>Target Goal</small></p>
			</div>
			
			<div class="cell goal">
				<p>30.000.000 IDR<br><small>Stretched Goal</small></p>
			</div>
			
			<div class="cell goal">
				<p>50.000.000 IDR<br><small>Super stretched Goal</small></p>
			</div>
		</div>
	</div>
</div>