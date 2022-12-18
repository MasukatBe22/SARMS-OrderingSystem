<div class="col-lg-3 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <div class="d-flex justify-content-between">
            <h3 wire:loading.delay.remove>{{ $productCount }}</h3>
            <div wire:loading.delay>
              <x-animations.ballbeat />
            </div>
            <select wire:change="getproductCount($event.target.value)" style="height: 2rem; outline: 2px solid transparent;" class="px-1 rounded border-0">
                <option value="">All</option>
                <option value="Available">Available</option>
                <option value="Unavailable">Unavailable</option>
            </select>
        </div>

        <p>Foods</p>
      </div>
      <a href="{{ route('admin.products') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
