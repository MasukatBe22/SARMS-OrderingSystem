<div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3 wire:loading.delay.remove>{{ $customerCount }}</h3>
        <div wire:loading.delay>
          <x-animations.ballbeat />
        </div>
        <p>Customers</p>
      </div>
      <a href="{{ route('admin.users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
