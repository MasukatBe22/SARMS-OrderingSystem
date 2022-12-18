<div class="col-lg-3 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <div class="d-flex justify-content-between">
            <h3 wire:loading.delay.remove>{{ $orderCount }}</h3>
            <div wire:loading.delay>
                <x-animations.ballbeat />
            </div>
            <select wire:change="getOrderCount($event.target.value)" style="height: 2rem; outline: 2px solid transparent;" class="px-1 rounded border-0">
                <option value="">All</option>
                <option value="New">New</option>
                <option value="Assigned">Assigned</option>
                <option value="Cooking">Cooking</option>
                <option value="Cooked">Cooked</option>
                <option value="Pick-up">Pick up</option>
                <option value="Cancel">Cancel</option>
            </select>
        </div>

        <p>Orders</p>
      </div>
      <a href="{{ route('admin.orders') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>